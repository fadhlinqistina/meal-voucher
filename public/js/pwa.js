// public/js/pwa.js - PWA Registration & Utilities

// Register Service Worker
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js')
            .then(registration => {
                console.log('ServiceWorker registered: ', registration);
                
                // Check for updates
                registration.addEventListener('updatefound', () => {
                    const newWorker = registration.installing;
                    newWorker.addEventListener('statechange', () => {
                        if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
                            // New update available
                            showUpdateNotification();
                        }
                    });
                });
            })
            .catch(error => {
                console.log('ServiceWorker registration failed: ', error);
            });
    });
}

// Show update notification
function showUpdateNotification() {
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            title: 'Update Available!',
            text: 'A new version is available. Refresh to update?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#667eea',
            confirmButtonText: 'Refresh Now',
            cancelButtonText: 'Later'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.reload();
            }
        });
    }
}

// Install prompt
let deferredPrompt;
window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault();
    deferredPrompt = e;
    
    // Show install button
    const installBtn = document.getElementById('installBtn');
    if (installBtn) {
        installBtn.style.display = 'block';
        installBtn.addEventListener('click', () => {
            deferredPrompt.prompt();
            deferredPrompt.userChoice.then((choiceResult) => {
                if (choiceResult.outcome === 'accepted') {
                    console.log('User accepted install');
                }
                deferredPrompt = null;
                installBtn.style.display = 'none';
            });
        });
    }
});

// Offline detection
window.addEventListener('online', () => {
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            icon: 'success',
            title: 'Back Online!',
            text: 'Your connection has been restored',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    }
});

window.addEventListener('offline', () => {
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            icon: 'warning',
            title: 'You are offline',
            text: 'Some features may be limited',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    }
});

// Request notification permission
function requestNotificationPermission() {
    if ('Notification' in window) {
        Notification.requestPermission().then(permission => {
            if (permission === 'granted') {
                console.log('Notification permission granted');
            }
        });
    }
}

// Enable background sync for offline voucher generation
function registerBackgroundSync() {
    if ('serviceWorker' in navigator && 'SyncManager' in window) {
        navigator.serviceWorker.ready.then(registration => {
            registration.sync.register('sync-vouchers');
        });
    }
}

// Store offline voucher data
function storeOfflineVoucher(voucherData) {
    let offlineVouchers = JSON.parse(localStorage.getItem('offlineVouchers') || '[]');
    offlineVouchers.push({
        ...voucherData,
        timestamp: new Date().toISOString(),
        id: 'offline_' + Date.now()
    });
    localStorage.setItem('offlineVouchers', JSON.stringify(offlineVouchers));
    
    // Try to sync when back online
    if (navigator.onLine) {
        syncOfflineVouchers();
    }
}

// Sync offline vouchers
async function syncOfflineVouchers() {
    const offlineVouchers = JSON.parse(localStorage.getItem('offlineVouchers') || '[]');
    
    for (const voucher of offlineVouchers) {
        try {
            const response = await fetch('/admin/generate-voucher-api', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(voucher)
            });
            
            if (response.ok) {
                // Remove synced voucher
                const updated = offlineVouchers.filter(v => v.id !== voucher.id);
                localStorage.setItem('offlineVouchers', JSON.stringify(updated));
            }
        } catch (error) {
            console.error('Sync failed:', error);
        }
    }
}

// Listen for online event to sync
window.addEventListener('online', syncOfflineVouchers);

// Initialize PWA features
document.addEventListener('DOMContentLoaded', () => {
    requestNotificationPermission();
    registerBackgroundSync();
    syncOfflineVouchers();
});
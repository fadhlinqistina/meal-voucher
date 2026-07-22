<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    /* Reka bentuk latar belakang gelap khusus untuk Scanner */
    body {
        background-color: #0f2027 !important;
    }
    
    .card-modern {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3) !important;
        border-radius: 20px !important;
    }

    #reader { 
        border: none !important; 
        border-radius: 16px; 
        overflow: hidden;
        background: #000; 
        min-height: 280px;
        position: relative;
    }
    
    #reader video { 
        border-radius: 16px; 
        width: 100% !important;
        height: auto !important;
    }

    .btn-switch-cam {
        background: linear-gradient(135deg, #1a365d, #2b6cb0);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-switch-cam:hover {
        background: linear-gradient(135deg, #122846, #1e4f82);
        color: white;
    }
</style>

<div class="fade-in-up mt-4"> 
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card-modern p-4">
                <div class="text-center mb-4">
                    <div class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                         style="width: 70px; height: 70px; background: linear-gradient(135deg, #1a365d, #2b6cb0);">
                        <i class="fas fa-qrcode fa-2x text-white"></i>
                    </div>
                    <h4 class="fw-bold mt-2" style="color: #1a365d;">Scan Voucher</h4>
                    <p class="text-muted small">Position the QR code within the frame</p>
                </div>

                <div id="reader" class="shadow-sm mb-3">
                    <div class="text-white text-center p-4 w-100" id="loading-text">
                        <div class="spinner-border text-light mb-2" role="status"></div>
                        <br><small id="status-msg">Requesting camera access...</small>
                    </div>
                </div>

                <!-- Butang Switch Camera -->
                <button id="switchCamBtn" onclick="switchCamera()" class="btn btn-switch-cam w-100 py-2 mb-3" style="display: none;">
                    <i class="fas fa-camera-rotate me-2"></i> Switch Camera (Front / Rear)
                </button>

                <div class="p-3 rounded-3" style="background-color: #f8f9fa; border-left: 4px solid #2b6cb0;">
                    <small class="text-muted fw-medium d-block mb-0">
                        <i class="fas fa-lightbulb text-warning me-1"></i> 
                        <strong>Pro Tip:</strong> Keep a steady distance so the white QR frame is fully visible.
                    </small>
                </div>
                
                <div class="text-center mt-4">
                    <button onclick="history.back()" class="btn btn-outline-secondary w-100 py-2" style="border-radius: 10px; font-weight: 600;">
                        <i class="fas fa-arrow-left me-2"></i> Cancel & Return
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/html5-qrcode"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
let html5QrCode;
let cameraDevices = [];
let currentCameraIndex = 0;
let isScanning = false;
let lastScanTime = 0;
let lastScannedCode = '';

function onScanSuccess(decodedText) {
    const now = Date.now();
    if (lastScannedCode === decodedText && (now - lastScanTime) < 3000) {
        return;
    }
    
    lastScanTime = now;
    lastScannedCode = decodedText;
    
    if (navigator.vibrate) navigator.vibrate(200);
    
    html5QrCode.stop().then(() => {
        Swal.fire({
            title: 'Verifying...',
            text: 'Mengesahkan identiti QR...',
            allowOutsideClick: false,
            didOpen: () => { Swal.showLoading(); }
        });
        window.location.href = "/verify/" + decodedText;
    }).catch(() => {
        window.location.href = "/verify/" + decodedText;
    });
}

async function initScanner() {
    try {
        html5QrCode = new Html5Qrcode("reader");
        
        // Ambil senarai lengkap perkakasan kamera daripada peranti
        cameraDevices = await Html5Qrcode.getCameras();

        if (cameraDevices && cameraDevices.length > 0) {
            // Cari indeks kamera belakang (Back/Rear)
            let rearIndex = cameraDevices.findIndex(dev => 
                /back|rear|environment|main|0/i.test(dev.label)
            );
            
            // Jika jumpa kamera belakang guna indeks tersebut, jika tidak ambil kamera terakhir
            currentCameraIndex = (rearIndex !== -1) ? rearIndex : (cameraDevices.length - 1);

            if (cameraDevices.length > 1) {
                document.getElementById('switchCamBtn').style.display = 'block';
            }

            await startCamera(cameraDevices[currentCameraIndex].id);
        } else {
            showCameraError("Tiada modul kamera dikesan pada peranti ini.");
        }
    } catch (err) {
        console.warn("Failed to get camera list, falling back to constraint mode...", err);
        startFallback();
    }
}

async function startCamera(deviceId) {
    const config = { fps: 10, qrbox: { width: 220, height: 220 } };
    try {
        await html5QrCode.start(deviceId, config, onScanSuccess);
        isScanning = true;
        const loader = document.getElementById('loading-text');
        if (loader) loader.style.display = 'none';
    } catch (err) {
        console.error("Error starting camera ID:", deviceId, err);
        startFallback();
    }
}

async function startFallback() {
    const config = { fps: 10, qrbox: { width: 220, height: 220 } };
    try {
        await html5QrCode.start({ facingMode: "environment" }, config, onScanSuccess);
        isScanning = true;
        const loader = document.getElementById('loading-text');
        if (loader) loader.style.display = 'none';
    } catch (err) {
        showCameraError("Akses kamera ditolak. Sila benarkan kebenaran (permission) kamera di pelayar anda.");
    }
}

async function switchCamera() {
    const switchBtn = document.getElementById('switchCamBtn');
    switchBtn.disabled = true;
    switchBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Switching Camera...';

    try {
        if (isScanning) {
            await html5QrCode.stop();
            isScanning = false;
        }
    } catch (e) {
        console.warn("Stop warning:", e);
    }

    // Jeda masa (300ms) untuk iOS Safari melepaskan memori perkakasan kamera
    await new Promise(resolve => setTimeout(resolve, 300));

    if (cameraDevices.length > 1) {
        currentCameraIndex = (currentCameraIndex + 1) % cameraDevices.length;
        await startCamera(cameraDevices[currentCameraIndex].id);
    } else {
        startFallback();
    }

    switchBtn.disabled = false;
    switchBtn.innerHTML = '<i class="fas fa-camera-rotate me-2"></i> Switch Camera (Front / Rear)';
}

function showCameraError(msg) {
    document.getElementById('loading-text').innerHTML = `
        <i class="fas fa-video-slash fa-2x text-warning mb-2"></i><br>
        <span class="text-white fw-bold">Ralat Kamera</span><br>
        <small class="text-muted">${msg}</small>
    `;
}

document.addEventListener("DOMContentLoaded", function() {
    initScanner();
});
</script>

<?= $this->endSection() ?>
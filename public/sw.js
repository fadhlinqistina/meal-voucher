// sw.js - Service Worker for Meal Voucher PWA
const CACHE_NAME = 'meal-voucher-v1';

// Assets to cache
const urlsToCache = [
  '/',
  '/login',
  '/offline',
  'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
  'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
  'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap',
  'https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js'
];

// Install event - cache assets
self.addEventListener('install', event => {
  console.log('Service Worker installed');
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(urlsToCache);
      })
      .then(() => self.skipWaiting())
  );
});

// Activate event - clean up old caches
self.addEventListener('activate', event => {
  console.log('Service Worker activated');
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cache => {
          if (cache !== CACHE_NAME) {
            console.log('Deleting old cache:', cache);
            return caches.delete(cache);
          }
        })
      );
    })
  );
  return self.clients.claim();
});

// Fetch event - serve from cache then network
self.addEventListener('fetch', event => {
  const url = new URL(event.request.url);
  
  // Skip API calls
  if (url.pathname.includes('/api/')) {
    return;
  }
  
  // Skip POST requests
  if (event.request.method !== 'GET') {
    return;
  }
  
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        if (response) {
          return response;
        }
        
        return fetch(event.request)
          .then(response => {
            // Don't cache if not successful
            if (!response || response.status !== 200 || response.type !== 'basic') {
              return response;
            }
            
            const responseToCache = response.clone();
            caches.open(CACHE_NAME)
              .then(cache => {
                cache.put(event.request, responseToCache);
              });
            
            return response;
          })
          .catch(() => {
            // Return offline page for HTML requests
            if (event.request.headers.get('accept').includes('text/html')) {
              return caches.match('/offline');
            }
            return new Response('Offline - Please check your connection');
          });
      })
  );
});

// Background sync for offline voucher submission
self.addEventListener('sync', event => {
  if (event.tag === 'sync-vouchers') {
    event.waitUntil(syncVouchers());
  }
});

// Push notification
self.addEventListener('push', event => {
  const options = {
    body: event.data.text(),
    icon: '/icon-192x192.png',
    badge: '/icon-192x192.png',
    vibrate: [200, 100, 200],
    actions: [
      { action: 'open', title: 'Open App' }
    ]
  };
  
  event.waitUntil(
    self.registration.showNotification('Meal Voucher', options)
  );
});
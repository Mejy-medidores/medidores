// sw.js
const CACHE_NAME = 'mi-app-cache-v1';
const urlsToCache = [
  '/',
  '/login.php', // o la ruta a tu archivo principal
  '/css/estilos.css', // archivo de estilos
  '/js/scripts.js', // archivo de scripts
  '/IMG/logo.png' // logo o cualquier imagen que necesites en caché
];

self.addEventListener('install', (e) => {
    console.log('Service Worker instalado');
  });
  
  self.addEventListener('fetch', (e) => {
    console.log('Interceptando fetch para:', e.request.url);
  });
  

self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(urlsToCache);
      })
  );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        return response || fetch(event.request);
      })
  );
});

self.addEventListener('activate', event => {
  const cacheWhitelist = [CACHE_NAME];
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cacheName => {
          if (!cacheWhitelist.includes(cacheName)) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

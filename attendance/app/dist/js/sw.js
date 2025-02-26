var cacheName = 'pages-cache-v2';

self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(cacheName).then(function(cache) {
      return cache.addAll(
        [
          '..',
          '../index.html',
          '../chunk-vendors.js',
          '../app.js',
          '../app.css',
          '../img/favicon.ico',
          '../img/app-logo.png'
        ]
      );
    })
  );
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches.match(event.request)
        .then(function(response) {
            if(response){
                return response
            }
            // not in cache, return from network
            return fetch(event.request, {credentials: 'include'});
        })
    );
});

// self.addEventListener('activate', function(event) {
//   event.waitUntil(
//     caches.keys().then(function(cacheNames) {
//       return Promise.all(
//         cacheNames.map(function(cacheName) {
//           return caches.delete(cacheName);
//         })
//       );
//     })
//   );
// });

// EVENTO PARA A INSTALAÇÃO DO SW COLOCANDO OS ARQUIVOS EM CACHE
self.addEventListener('install', function (event) {

    event.waitUntil(

        caches.open('v1').then(function (cache) {
            return cache.addAll([

                'index.php',
                '../app/views/templates/head.php',
                '../app/views/login.php',
                'assets/css/style.css',
                'assets/img/logoDark.png',
                'assets/img/logoDark.png'


            ]);
        })

    );

});

// REQUISIÇÃO DOS ARQUIVOS QUE ESTAO EM CACHE 

self.addEventListener('fetch', function(event){
    event.respondWith(
        caches.match(event.request).then(function(response){
            return response || fetch(event.request);
        })
    )
})
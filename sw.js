const CACHE_STATIC_NAME  = 'static-v2';
const CACHE_DYNAMIC_NAME = 'dynamic-v1';
const CACHE_INMUTABLE_NAME = 'inmutable-v1';

const CACHE_DYNAMIC_LIMIT = 50;


function limpiarCache( cacheName, numeroItems ) {


    caches.open( cacheName )
        .then( cache => {

            return cache.keys()
                .then( keys => {
                    
                    if ( keys.length > numeroItems ) {
                        cache.delete( keys[0] )
                            .then( limpiarCache(cacheName, numeroItems) );
                    }
                });

            
        });
}




self.addEventListener('install', e => {


    const cacheProm = caches.open( CACHE_STATIC_NAME )
        .then( cache => {

            return cache.addAll([
                 // '/',
                  'index.html',
                  'css/estilos.css',
                  'css/lo.png',
                  'css/log0000.png',
                  'css/moreliap.jpg',
                  'css/morelip1.jpg',
                  'css/se.jpg',
                  'js/app.js',
                  'pages/offline.html',
                  'css/stigma.mp4'
                  
            ]);

        
        });

    const cacheInmutable = caches.open( CACHE_INMUTABLE_NAME )
            .then( cache => cache.add('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'));


    e.waitUntil( Promise.all([cacheProm, cacheInmutable]) );

});
//CACHE WITH NETWORK FALLBACK
self.addEventListener('fetch', e =>{

      const respuesta = caches.match( e.request )
        .then( res => {

            if ( res ) return res;

    //         // No existe el archivo


           return fetch( e.request ).then( newResp => {

               caches.open( CACHE_DYNAMIC_NAME )
                   .then( cache => {
                      cache.put( e.request, newResp );
                      limpiarCache( CACHE_DYNAMIC_NAME, 50 );
                    });

                 return newResp.clone();
             })

             .catch( errr => {
                     if(e.request.headers.get('accept').includes('text/html') ){
                           return caches.match('pages/offline.html');
                     }

             })


         });




     e.respondWith( respuesta );

})
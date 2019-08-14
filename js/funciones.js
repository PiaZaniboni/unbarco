$(document).ready(function(){
    /*--------------------------------------------------------------
    ## Menu Responsive
    --------------------------------------------------------------*/
        $('.btn-nav-responsive').click(function(){
            $('.main-nav').toggleClass('show');
        });
        //Cerrar menu
        $('.btn-icon-close').click(function(){
            $('.main-nav').toggleClass('show');
        });
});

$(window).on("load", function(){
    var altura = $(".caja-proyecto img").height();
    /*--------------------------------------------------------------
    ## Cajas Proyectos
    --------------------------------------------------------------*/
    $(".columna.proyectos .caja-proyecto").each(function() {
        $(this).css("height", altura);
    });
    /*--------------------------------------------------------------
    ## Cajas Tiendas
    --------------------------------------------------------------*/
    var alturaTienda = $(".caja-tienda img").height();

    $(".columna.tiendas .caja-tienda").each(function() {
        $(this).css("height", alturaTienda);
    });
});

/*--------------------------------------------------------------
## Resize Pantalla
--------------------------------------------------------------*/

//FUNCION ESPERAR QUE TERMINE DE RESIZEAR LA PANTALLA
    var waitForFinalEvent = (function () {
    var timers = {};
    return function (callback, ms, uniqueId) {
            if (!uniqueId) {
                uniqueId = "Don't call this twice without a uniqueId";
            }
            if (timers[uniqueId]) {
                clearTimeout (timers[uniqueId]);
            }
            timers[uniqueId] = setTimeout(callback, ms);
        };
})();

$(window).resize(function () {
    waitForFinalEvent(function(){
    //EVENTOS EN RESIZE
    /*--------------------------------------------------------------
    ## Cajas Proyectos
    --------------------------------------------------------------*/
    var altura = $(".caja-proyecto img").height();
    var alturaTienda = $(".caja-tienda img").height();

    $(".columna.proyectos .caja-proyecto").each(function() {
        $(this).css("height", altura);
    });

    $(".columna.tiendas .caja-tienda").each(function() {
        $(this).css("height", alturaTienda);
    });

    }, 500,'resize');

});

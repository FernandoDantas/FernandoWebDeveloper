$(function() {

//    //Navega tabs das empresas na home
//    $('.navitem li').click(function() {
//        var nav = $('.navitem li');
//        var tab = $(this).attr('id');
//        if ($(this).hasClass('tabactive')) {
//            //Aba ativa. Não faz nada
//            return false;
//        } else {
//            nav.removeClass('tabactive'); //REMOVE A CLASSE ATIVA
//            $(this).addClass('tabactive');
//            $('.tab').fadeOut('fast', function() {
//                window.setTimeout(function() {
//                    $('.' + tab).fadeIn('fast');
//                }, 350);
//            });
//        }
//    });

$(".btn-menu").click(function () {
                $(".menu").fadeIn('slow');
            });
            $(".btn-close").click(function () {
                $(".menu").fadeOut('slow');
            });

});

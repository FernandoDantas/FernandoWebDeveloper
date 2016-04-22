$(function () {
    Shadowbox.init();

    //CONTROLE DO MENU MOBILE
    $('.mobile_action').click(function () {
        if (!$(this).hasClass('active')) {
            $(this).addClass('active');
            $('.main_header_nav').animate({'left': '0px'}, 300);
        } else {
            $(this).removeClass('active');
            $('.main_header_nav').animate({'left': '-100%'}, 300);
        }
    });

    var action = setInterval(slideGo, 0);

    $('.slide_nav.go').click(function () {
        clearInterval(action);
        slideGo();
    });

    $('.slide_nav.back').click(function () {
        clearInterval(action);
        slideBack();
    });

    function slideGo() {
        if ($('.slide_item.first').next().size()) {
            $('.slide_item.first').fadeOut(6000, function () {
                $(this).removeClass('first').next().fadeIn().addClass('first');
            });
        } else {
            $('.slide_item.first').fadeOut(6000, function () {
                $('.slide_item').removeClass('first');
                $('.slide_item:eq(0)').fadeIn().addClass('first');
            });
        }
    }

    function slideBack() {
        if ($('.slide_item.first').index() >= $('.slide_item').length) {
            $('.slide_item.first').fadeOut(6000, function () {
                $(this).removeClass('first').prev().fadeIn().addClass('first');
            });
        } else {
            $('.slide_item.first').fadeOut(6000, function () {
                $('.slide_item').removeClass('first');
                $('.slide_item:last-of-type').fadeIn().addClass('first');
            });
        }
    }
});

//SHAREBOOK
$(function () {

    if ($('.sharebook').length >= 1) {
        //GET :: FACEBOOK
        var facebook = $('.facebook').find('a').attr('href');
        $.getJSON('http://graph.facebook.com/?id=' + facebook, function (data) {
            $('.sharebook').find('.facebook .count').text(data.shares);
        });

        //GET :: TWIITER
        var twitter = $('.twitter').find('a').attr('href');
        $.getJSON('http://cdn.api.twitter.com/1/urls/count.json?url=' + twitter + '/&callback=?', function (data) {
            $('.sharebook').find('.twitter .count').text(data.count);
        });

        //SHARE :: FACEBOOK
        $('.facebook a').click(function () {
            var share = 'http://www.facebook.com/sharer/sharer.php?u=';
            var urlOpen = $(this).attr('href');
            window.open(share + urlOpen, "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, width=660, height=400");
            return false;
        });

        //SHARE :: GOOGLE+
        $('.google a').click(function () {
            var share = 'http://plus.google.com/share?url=';
            var urlOpen = $(this).attr('href');
            window.open(share + urlOpen, "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, width=516, height=400");
            return false;
        });

        //SHARE :: TWITTER
        $('.twitter a').click(function () {
            var share = 'http://twitter.com/share?url=';
            var urlOpen = $(this).attr('href');
            var complement = $(this).attr('rel');
            window.open(share + urlOpen + complement, "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, width=660, height=400");
            return false;
        });
    }
});

//NOTIFICAÇÕES ESTILO FACEBOOK
document.addEventListener('DOMContentLoaded', function () {
    if (Notification.permission !== 'granted')
        Notification.requestPermission();
});

function notifyMe(icon, title, mensagem, link) {
    if (!Notification) {
        alert('O navegador que você está utilizando não possui o notifications. Tente o Chrome');
        return;
    }

    if (Notification.permission !== "granted") {
        Notification.requestPermission();
    } else {
        var notification = new Notification(title, {
            icon: icon,
            body: mensagem
        });

        notification.onclick = function () {
            window.open(link);
        };
    }
}

var icon = 'http://www.fernandowebdeveloper.com.br/img/logo.png';
var title = 'Fernando Web Developer';
var mensagem = 'Peça seu site agora ou aprenda com a gente!!';
var link = 'http://www.fernandowebdeveloper.com.br';

setTimeout(function () {
    notifyMe(icon, title, mensagem, link);
}, 5000);

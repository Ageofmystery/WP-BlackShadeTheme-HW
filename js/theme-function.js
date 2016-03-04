jQuery(function ($) {
    $('.top-menu a').addClass('text-uppercase text-center').parent('li:first-of-type').children('a').addClass('home-drop-toggle');
    $('.foot-menu a').addClass('text-foot-menu');
    $('.blog-desc').addClass(function(){
        $(this).children('p, h3').addClass('text-desc');
        $(this).children('p').has('img') ? $(this).find('img').parent().addClass('text-center blog-img') : false;
    });

    var $window = $(window);
    $window.on('resize load', function () {
        var $elemHome = $('.home-drop-toggle').parent('li');
        var $idElemHome = $('#top-menu-up');

        if ($window.innerWidth() < 768) {
            if ($idElemHome.length == 0) {
                $('button.navbar-toggle').before('<ul id="top-menu-up" class="top-menu"></ul>');
                $('#top-menu-up.top-menu').prepend($elemHome);
            }
        } else {
            $idElemHome.remove();
            $('.top-menu.nav > li:first-child').before($elemHome);
        }
    });
    $('.home-drop-toggle').on('click', function(event){
        event.preventDefault();
        $('.home-drop-menu').toggleClass('unvis vis');
        return false;
    });

});
jQuery(function ($) {
    var $blogsContainer = $('.blogs-container');
    var $window = $(window);

    $('.top-menu a').addClass('text-uppercase text-center').parent('li:first-of-type').children('a').addClass('home-drop-toggle');
    $('.foot-menu a').addClass('text-foot-menu');

    function blogTextFormat() {
        $('.blog-desc').addClass(function(){
            $(this).children('p, h3').addClass('text-desc');
            $(this).children('p').has('img') ? $(this).find('img').parent().addClass('text-center blog-img') : false;
        });
    }
    blogTextFormat();

    $('.comment .text-postdate').siblings('p').addClass('text-desc');
    $('.ssba_twitter_share').html('<span class="fa fa-twitter">');
    $('.ssba_facebook_share').html('<span class="fa fa-facebook">');
    $('.ssba_pinterest_share').html('<span class="fa fa-pinterest-p">');

    $('.home-drop-menu ul > li').hasClass('current-cat') == false ? $(this).find(".cat-item:first-of-type").addClass('current-cat') : false;

    $("#new-message").on('keydown', function (key) {
        if(key.keyCode == 13 && key.ctrlKey) {
            $('#submit').trigger('click');
            return true;
        }
    });

    $('.cat-item > a').on('click', function(event){
        event.preventDefault();
        $blogsContainer.load($(this).attr('href') + " .blogs-container > *");
        $('.cat-item').removeClass('current-cat');
        $(this).parent('.cat-item').addClass('current-cat');
        return false;
    });

    $blogsContainer.ajaxSuccess(function() {
        blogTextFormat();
    });

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
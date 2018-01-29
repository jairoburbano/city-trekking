(function($) {
    // Tamaño de la pantalla
    var $window = $(window),
        windowSize	= $window.width();
    function menu() {
        var header = $('.header'),
            scroll = $(window).scrollTop();
        if (scroll >= 20) {
            header.addClass('header--fixed');
        } else {
            header.removeClass("header--fixed");
        }
        var btn = $('.menu__icon');
        btn.on('click', function() {
            $('body').toggleClass('header--open');
            $('.header__bottom').stop().slideToggle();
        });
    }
    function testimonios() {
        var slide = $('.slide--testomonios'),
            ancho = slide.width();
        var anchoFinal = ancho,
            smooth = true;
        if( windowSize > 740 ) {
            anchoFinal = ancho / 3;
            smooth = false;
        }
        slide.flexslider({
            animation: 'slide',
            controlNav: false,
            prevText: '<svg><use xlink:href="#shape-icon-left" /></svg>',
            nextText: '<svg><use xlink:href="#shape-icon-right" /></svg>',
            itemWidth: anchoFinal,
            itemMargin: 0
        });
    }
    function item() {
        var item = $('.item');
        if($('html').hasClass('no-touch')) {
            item.mouseover(function() {
                $(this).find('.item__hover').stop().fadeIn()
            });
            item.mouseleave(function() {
                $(this).find('.item__hover').stop().fadeOut()
            });
        }
    }
    function form() {
        var input = $('.wpcf7-form input, .wpcf7-form, textarea');
        input.focusin(function() {
            $(this).parents('.group').addClass('active');
        });
        input.blur(function() {
            if( !$(this).val() ) {
                $(this).parents('.group').removeClass('active');
            }
        });
    }
    function slideSingle() {
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 140,
            itemMargin: 10,
            prevText: '<svg><use xlink:href="#shape-icon-left" /></svg>',
            nextText: '<svg><use xlink:href="#shape-icon-right" /></svg>',
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            directionNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel"
        });
    }
    function decoration() {
        var item = $('.style--tri');
        item.each(function() {
            var $this = $(this),
                altura = $this.outerHeight();
            $this.append('<div class="decoration--tri" />');
            var tri = $this.find('.decoration--tri');
            tri.css({
                "borderTopWidth":  altura,
                "borderRightWidth":  altura,
                "right": -altura
            });
        });
    }
    $(window).on('load', function() {
        menu();
        testimonios();
        item();
        form();
        slideSingle();
        decoration();
    });
    $(window).scroll(function() {
        menu();
    });
})(jQuery);

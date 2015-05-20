$(document).ready(function() {

    var curStatus = 'auto',
        phase,
        count,
        protocol,
        img_num,
        menu = jQuery('.controls').find('.btn-group'),
        supportsStorage = function(){
            try {
                return 'localStorage' in window && window['localStorage'] !== null;
            } catch (e) {
                return false;
            }
        };

    $(".animsition").animsition({

        inClass               :   'fade-in',
        outClass              :   'fade-out',
        inDuration            :    800,
        outDuration           :    600,
        linkElement           :   '.animsition-link',
        // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
        loading               :    true,
        loadingParentElement  :   'body', //animsition wrapper element
        loadingClass          :   'animsition-loading',
        unSupportCss          : [ 'animation-duration',
                                  '-webkit-animation-duration',
                                  '-o-animation-duration'
                                ],
        //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        overlay               :   false,

        overlayClass          :   'animsition-overlay-slide',
        overlayParentElement  :   'body'
    });
    
    var count = 0;
    var counter = setInterval (function(){
        jQuery('.gear_1').css('transform', 'rotate('+count/2+'deg)');
        jQuery('.gear_2').css('transform', 'rotate(-'+count*2+'deg)');
        jQuery('.gear_3').css('transform', 'rotate('+count/2+'deg)');
        jQuery('.gear_4').css('transform', 'rotate(-'+count*2.1+'deg)');
        // jQuery('.gear_5').css('transform', 'rotate('+count+'deg)');
        // jQuery('.gear_6').css('transform', 'rotate('+count*3+'deg)');
        count += 6;
        // console.log(count);
    }, 100);

    jQuery('.login-in').on('click', function() {
        jQuery('.login-in').addClass('hidden');
        jQuery('.login-form').removeClass('hidden');
        jQuery('.login-form').addClass('animated flipInX');
        // jQuery('.login-form').removeClass('hidden');
        // jQuery('.login-form').addClass('animated bounceInRight');

    });

    jQuery('.btn-status').on('click', function() {
        jQuery('.btn-status').removeClass('active');
        jQuery(this).addClass('active');
        curStatus = jQuery(this).data('status');
        // console.log(curStatus);
    });

    jQuery('.btn-start').on('click', function() {
        jQuery('.b-popup')
            .removeClass('hidden')
            .addClass('animated')
            .addClass('fadeIn');
    });

    jQuery('#menu-item-13').find('a').prepend('<span class="glyphicon glyphicon-film"></span>');
    jQuery('#menu-item-14').find('a').prepend('<span class="glyphicon glyphicon-book"></span>');
    jQuery('#menu-item-12').find('a').prepend('<span class="glyphicon glyphicon-envelope"></span>');
    jQuery('#menu-item-15').find('a').prepend('<span class="glyphicon glyphicon-log-out"></span>');
    jQuery('#menu-item-18').find('a').prepend('<span class="glyphicon glyphicon-bell"></span>');
    jQuery('#menu-item-107').find('a').prepend('<span class="glyphicon glyphicon-leaf"></span>');


    jQuery('.down, .btn-procedure').tooltip();
    jQuery('.popup-img-wrap').eq(0).removeClass('hidden');
    jQuery('.menu-toggle').on('click', function() {
        console.log(menu)
        if(menu.hasClass('slideInUp')){
            jQuery(menu)
            .removeClass('hidden')
            .removeClass('slideInUp')
            .addClass('slideInDown');
        } else {
            jQuery(menu)
            .removeClass('slideInDown')
            .addClass('slideInUp')
            .addClass('hidden');
        }
    });
    protocol = function(){
        count=0;
        img_num = jQuery('.popup-img-wrap').size();
        console.log(img_num);
        setInterval(function(){
            if (count <= img_num){                                                                         //120
                jQuery('.popup-img-wrap').addClass('hidden');
                jQuery('.popup-img-wrap').eq(count+1).removeClass('hidden');
                count += 1;
                console.log(count);
            } else {
                clearInterval();
                jQuery('.popup-img-wrap').addClass('hidden');
            }
        }, 1000);
    }
    // var count_animation_let = 0;
    // var cur_let;
    // var letters = {
    //     0: 'Б',
    //     1: 'Т',
    //     2: 'Н',
    //     3: 'М',
    //     4: 'Г',
    //     5: 'Р',
    //     6: 'В',
    //     7: 'Х',
    // };
    // jQuery('.search').on('click', function() {
    //     setInterval(function(){
    //         if (count_animation_let <= 100){
    //             cur_let = Math.round(Math.random() * (7 - 0))
    //             console.log(letters[cur_let]);
    //         }
    //         count_animation++;
    //     }, 100);
    // });
    if (jQuery('.b-popup')) {
        jQuery('.protocol_start').on('click', function() {
            protocol();
        });
    };

});

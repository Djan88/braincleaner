$(document).ready(function() {

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

});

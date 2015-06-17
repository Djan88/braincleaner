// var mySound = new buzz.sound( "/sounds/432", {
//     formats: [ "ogg", "mp3" ],
//     preload: true
// });

jQuery(document).ready(function() {
    window.addEventListener('touchstart', function() {

        // create new buffer source for playback with an already
        // loaded and decoded empty sound file
        var source = myContext.createBufferSource();
        source.buffer = myDecodedBuffer;

        // connect to output (your speakers)
        source.connect(myContext.destination);

        // play the file
        source.noteOn(0);

    }, false);

    ion.sound({
        sounds: [
            {
                name: "432"
            }
        ],
        volume: 1,
        path: "/sounds/",
        preload: true 
    });
    
    jQuery('.panel-body').find('iframe').css('height', '400px');
    var wideoHeight = function(){
        var video_w = parseFloat(jQuery('.panel-body').find('iframe').css('width'));
        jQuery('.panel-body').find('iframe').css('height', video_w/1.5+'px');
    }
    wideoHeight();
    jQuery(window).resize(function() {
      console.log(parseFloat(jQuery('.panel-body').find('iframe').css('width')));
      wideoHeight();
    });

    var curStatus = 'auto',
        phase,
        defCount = 1,
        count,
        phases,
        seconds,
        counter,
        nextImg,
        prevImg,
        protocol,
        img_num = jQuery('.popup-img-wrap').size(),
        menu = jQuery('.controls').find('.btn-group'),
        supportsStorage = function(){
            try {
                return 'localStorage' in window && window['localStorage'] !== null;
            } catch (e) {
                return false;
            }
        };

    jQuery(".animsition").animsition({

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
    
        count = 0;
        counter = setInterval (function(){
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
        jQuery('.login-form').addClass('animated bounceInDown');
        // jQuery('.login-form').removeClass('hidden');
        // jQuery('.login-form').addClass('animated bounceInRight');

    });

    jQuery('.protocol_terapy').on('click', function(event) {

    });

    jQuery('.btn-status').on('click', function() {
        if(jQuery(this).hasClass('disabled')){
            //
        } else {
            defCount = 1;
            jQuery('.popup-img-wrap').addClass('hidden');
            jQuery('.popup-img-wrap').eq(0).removeClass('hidden');
            jQuery('.btn-status').removeClass('active');
            jQuery(this).addClass('active');
            curStatus = jQuery(this).data('status');
            if(curStatus == 'auto'){
                jQuery('.btn-manualic').addClass('hidden');
                jQuery('.btn-automatic').removeClass('hidden');
            } else if(curStatus == 'manual'){
                jQuery('.btn-manualic').removeClass('hidden');
                jQuery('.btn-automatic').addClass('hidden');
            }
            console.log(curStatus);
        }
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
        // console.log(menu)
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

    jQuery('.protocol_close').on('click', function() {
        jQuery('.b-popup')
            .addClass('hidden')
            .removeClass('fadeIn');
    });
    protocol = function(){
        defCount=1;
        phases = setInterval(function(){
            if (defCount <= img_num-1){
                jQuery('.popup-img-wrap').addClass('hidden');
                jQuery('.popup-img-wrap[data-defNum='+defCount+']').removeClass('hidden');
                defCount += 1;
                if(jQuery('.popup-img-wrap[data-defNum='+(defCount-1)+']').data('formula')&&(!jQuery('.popup-img-wrap[data-defNum='+(defCount-1)+']').attr('checked'))){
                    jQuery('.popup-img-wrap[data-defNum='+(defCount-1)+']').attr('checked', 'true');;
                    defCount -= 1;
                    console.log('test'+defCount);
                }
                jQuery('.protocol_stop, .protocol_close').on('click', function() {
                    clearInterval(phases);
                    jQuery('.popup-img-wrap').addClass('hidden');
                    jQuery('.popup-img-wrap[data-defNum='+(defCount-1)+']').removeClass('hidden');
                });
            } else {
                clearInterval(phases);
                jQuery('.popup-img-wrap').addClass('hidden');
                jQuery('.popup-img-wrap').eq(0).removeClass('hidden');
                jQuery('.popup-img-wrap').removeAttr('checked');
            }
        }, 4000);
    };

    seconds = function(){
        defCount=1;
        phases = setInterval(function(){
            if (defCount <= 1){
                jQuery('.popup-img-wrap').addClass('hidden');
                jQuery('.popup-img-wrap[data-defNum='+0+']').removeClass('hidden');
                defCount += 1;
                jQuery('.protocol_stop, .protocol_close').on('click', function() {
                    clearInterval(phases);
                    jQuery('.popup-img-wrap').addClass('hidden');
                    jQuery('.popup-img-wrap[data-defNum='+(defCount-1)+']').removeClass('hidden');
                });
            } else if(defCount > 1 && defCount <= 34) {
                // mySound.play();
                ion.sound.play("432");
                jQuery('.popup-img-wrap').addClass('hidden');
                jQuery('.popup-img-wrap[data-defNum='+1+']').removeClass('hidden');
                defCount += 1;
                jQuery('.protocol_stop, .protocol_close').on('click', function() {
                    clearInterval(phases);
                    // mySound.stop();
                    ion.sound.stop("432");
                    jQuery('.popup-img-wrap').addClass('hidden');
                    jQuery('.popup-img-wrap[data-defNum='+(defCount-1)+']').removeClass('hidden');
                });
                jQuery('.btn-procedure').on('click', function(event) {
                    // mySound.stop();
                    ion.sound.stop("432");
                });
            } else {
                clearInterval(phases);
                // mySound.stop();
                ion.sound.stop("432");
                jQuery('.popup-img-wrap').addClass('hidden');
                jQuery('.popup-img-wrap').eq(0).removeClass('hidden');
                jQuery('.popup-img-wrap').removeAttr('checked');
            }
        }, 1000);
    };

    jQuery('.protocol_terapy').on('click', function(event) {
        defCount = img_num-2;
        jQuery('.popup-img-wrap').addClass('hidden');
        jQuery('.popup-img-wrap[data-defNum='+(img_num-2)+']').removeClass('hidden');
    });
    
    nextImg = function(){
        defCount += 1;
        jQuery('.popup-img-wrap').addClass('hidden');
        jQuery('.popup-img-wrap[data-defNum='+defCount+']').removeClass('hidden');
    }
    prevImg = function(){
        defCount -= 1;
        jQuery('.popup-img-wrap').addClass('hidden');
        jQuery('.popup-img-wrap[data-defNum='+defCount+']').removeClass('hidden');
    }

    jQuery('.protocol_next').on('click', function() {
        console.log(defCount+' '+img_num);
        if (defCount < (img_num-1)){
            nextImg();
            if(defCount >= 1){
                jQuery('.protocol_prev').removeClass('disabled');
            } else {
                jQuery('.protocol_prev').addClass('disabled');
            }
        } else {
            jQuery('.protocol_prev').removeClass('disabled');
            jQuery(this).addClass('disabled');
        }
    });

    jQuery('.protocol_prev').on('click', function() {
        console.log(defCount+' '+img_num);
        if (defCount > 1){
            prevImg();
            if(defCount <= (img_num-1)){
                jQuery('.protocol_next').removeClass('disabled');
            } else {
                jQuery('.protocol_next').addClass('disabled');
            }
        } else {
            jQuery('.protocol_next').removeClass('disabled');
            jQuery(this).addClass('disabled');
        }
    });
    if (jQuery('.b-popup')) {
        jQuery('.protocol_start').on('click', function() {
            protocol();
        });
        jQuery('.protocol_33').on('click', function() {
            seconds();
        });
    };

});

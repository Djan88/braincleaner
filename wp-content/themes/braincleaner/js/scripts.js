jQuery(document).ready(function() {


//617 протокол
    var cur_screen = 0,
        sex,
        cur_sex,
        cur_recep,
        faces_img,
        protocol_people,
        next_screen,
        returned_img = jQuery('body').find('.injected').attr('src'),
        supportsStorage = function(){
            try {
                return 'localStorage' in window && window['localStorage'] !== null;
            } catch (e) {
                return false;
            }
        };
    //Получение данных из локального хранилища
    if(supportsStorage && localStorage.getItem('cur_screen')){
        cur_screen = localStorage.getItem('cur_screen');
    }
    if (returned_img) {
        localStorage.setItem('returned_img', returned_img);
    };
    next_screen = function(screen){
        jQuery('.screen')
            .addClass('hidden')
            .removeClass('fadeIn')
            .eq(screen)
            .removeClass('hidden')
            .addClass('animated')
            .addClass('fadeIn');
    }
    if (returned_img){
        next_screen(1);
    };
    //Перетягивание элементов
    jQuery( ".draggable" ).draggable({ 
        snap: false
    });
    protocol_people = function(this_sex, this_recep){
        if (this_sex == 'male' && this_recep == 'female'){
            localStorage.setItem('faces_img', '/wp-content/themes/braincleaner/img/female.png');
            localStorage.setItem('circle_protocol', 'mw');
        } else if (this_sex == 'male' && this_recep == 'male') {
            localStorage.setItem('faces_img', '/wp-content/themes/braincleaner/img/male.png');
            localStorage.setItem('circle_protocol', 'mm');
        } else if (this_sex == 'female' && this_recep == 'female') {
            localStorage.setItem('faces_img', '/wp-content/themes/braincleaner/img/female.png');
            localStorage.setItem('circle_protocol', 'ww');
        } else if (this_sex == 'female' && this_recep == 'male') {
            localStorage.setItem('faces_img', '/wp-content/themes/braincleaner/img/male.png');
            localStorage.setItem('circle_protocol', 'wm');
        };
    }

    jQuery('.sex_item-client').on('click', function(event) {
        jQuery('.sex_item-client').removeClass('active');
        jQuery('.sex-recep').removeClass('hidden');
        jQuery(this).addClass('active');
    });

    jQuery('.sex_item-recep').on('click', function(event) {
        cur_sex = jQuery('.sex_item-client.active').data('sex');
        cur_recep = jQuery(this).data('usex');
        next_screen(2);
        jQuery('.sex_item-recep').removeClass('active');
        if (jQuery(window).width() <= 1200) {
            jQuery('.mobile-start').removeClass('hidden');
            jQuery('.sq1').css('left', '29.5%!important');
        } else {
            jQuery('#menu-item-646').addClass('set-prot');
        };
        jQuery(this).addClass('active');
        protocol_people(cur_sex, cur_recep);
        if(supportsStorage && localStorage.getItem('circle_protocol')){
            circle_protocol = localStorage.getItem('circle_protocol');
        }
        if(supportsStorage && localStorage.getItem('faces_img')){
            faces_img = localStorage.getItem('faces_img');
            client_img = jQuery('body').find('.injected').attr('src');
        }
        if (circle_protocol && circle_protocol == 'mw') {
            client_img = jQuery('body').find('.injected').attr('src');
            jQuery('.sq1').css('background', 'url('+client_img+') no-repeat');
            jQuery('.sq1').addClass('client_sq');
        } else if (circle_protocol && circle_protocol == 'mm') {
            client_img = jQuery('body').find('.injected').attr('src');
            jQuery('.sq3').css('background', 'url('+client_img+') no-repeat');
            jQuery('.sq3').addClass('client_sq');
        } else if (circle_protocol && circle_protocol == 'wm') {
            client_img = jQuery('body').find('.injected').attr('src');
            jQuery('.sq3').css('background', 'url('+client_img+') no-repeat');
            jQuery('.sq3').addClass('client_sq');
        } else if (circle_protocol && circle_protocol == 'ww') {
            client_img = jQuery('body').find('.injected').attr('src');
            jQuery('.sq3').css('background', 'url('+client_img+') no-repeat');
            jQuery('.sq3').addClass('client_sq');
        }
    });
//617 протокол. Конец.
    jQuery('.panel-body').find('iframe').css('height', '400px');
    var wideoHeight = function(){
        var video_w = parseFloat(jQuery('.panel-body').find('iframe').css('width'));
        jQuery('.panel-body').find('iframe').css('height', video_w/1.5+'px');
    }
    wideoHeight();
    jQuery(window).resize(function() {
      wideoHeight();
    });

    var curStatus = 'auto',
        phase,
        defCount = 1,
        defStatus,
        count,
        phases,
        seconds,
        counter,
        nextImg,
        prevImg,
        state =0,
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
        if (jQuery('.btn-manual').hasClass('active')) {
            curStatus = 'manual';
            jQuery('.btn-manualic').removeClass('hidden');
            jQuery('.btn-automatic').addClass('hidden');
        }
        console.log(curStatus);
        jQuery('.b-popup')
            .removeClass('hidden')
            .addClass('animated')
            .addClass('fadeIn');
    });

    jQuery('#menu-item-13').find('a').prepend('<span class="glyphicon glyphicon-film"></span>');
    // jQuery('#menu-item-14').find('a').prepend('<span class="glyphicon glyphicon-book"></span>');
    jQuery('#menu-item-12').find('a').prepend('<span class="glyphicon glyphicon-envelope"></span>');
    jQuery('#menu-item-15').find('a').prepend('<span class="glyphicon glyphicon-log-out"></span>');
    jQuery('#menu-item-18').find('a').prepend('<span class="glyphicon glyphicon-bell"></span>');
    // jQuery('#menu-item-648').find('a').prepend('<span class="glyphicon glyphicon-play-circle"></span>');
    jQuery('#menu-item-658').find('a:first').prepend('<span class="glyphicon glyphicon-chevron-down"></span>');
    // jQuery('#menu-item-107').find('a').prepend('<span class="glyphicon glyphicon-leaf"></span>');
    jQuery('#menu-item-646').find('a').prepend('<span class="glyphicon glyphicon-repeat"></span>');
    jQuery('#menu-item-646').find('a').addClass('prot-start');

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
        if(curStatus == 'auto'){
            jQuery('.btn-manualic').addClass('hidden');
            jQuery('.btn-automatic').removeClass('hidden');
        } else if(curStatus == 'manual'){
            jQuery('.btn-manualic').removeClass('hidden');
            jQuery('.btn-automatic').addClass('hidden');
        }
    });

    jQuery('.protocol_close').on('click', function() {
        jQuery('.b-popup')
            .addClass('hidden')
            .removeClass('fadeIn');
    });

    protocol = function(){
        defCount=1;
        defStatus=0;
        phases = setInterval(function(){
            if (defCount <= img_num-1){
                jQuery('.popup-img-wrap').addClass('hidden');
                jQuery('.popup-img-wrap[data-defNum='+defCount+']').removeClass('hidden');
                defCount += 1;
                if(jQuery('.popup-img-wrap[data-defNum='+(defCount-1)+']').data('formula')&&(!jQuery('.popup-img-wrap[data-defNum='+(defCount-1)+']').attr('checked'))){
                    if (defStatus <= 4){
                        defCount -= 1;
                        defStatus += 1;
                        console.log('test'+defCount);
                    } else {
                        jQuery('.popup-img-wrap[data-defNum='+(defCount-1)+']').attr('checked', 'true');
                        defStatus=0;
                    }                    
                }
                if(jQuery('.popup-img-wrap[data-defNum='+(defCount-1)+']').data('first_element')&&(!jQuery('.popup-img-wrap[data-defNum='+(defCount-1)+']').attr('checked'))){
                    if (defStatus <= 8){
                        defCount -= 1;
                        defStatus += 1;
                        console.log('test'+defCount);
                    } else {
                        jQuery('.popup-img-wrap[data-defNum='+(defCount-1)+']').attr('checked', 'true');
                        defStatus=0;
                    }                    
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
            var sound = new Howl({
              urls: ['/sounds/432.ogg', '/sounds/432.aac', '/sounds/432.mp3'],
              autoplay: false,
              loop: false,
              buffer: true,
              onend: function() {
                console.log('Finished!');
              }
            });
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
                    // ion.sound.play("432");
                    if(state == 0){
                        sound.play();
                    }
                    state = 1;
                    jQuery('.popup-img-wrap').addClass('hidden');
                    jQuery('.popup-img-wrap[data-defNum='+1+']').removeClass('hidden');
                    defCount += 1;
                    jQuery('.protocol_stop, .protocol_close').on('click', function() {
                        clearInterval(phases);
                        // mySound.stop();
                        // ion.sound.stop("432");
                        sound.stop();
                        state = 0;
                        jQuery('.popup-img-wrap').addClass('hidden');
                        jQuery('.popup-img-wrap[data-defNum='+(defCount-1)+']').removeClass('hidden');
                    });
                    jQuery('.btn-procedure').on('click', function(event) {
                        // mySound.stop();
                        // ion.sound.stop("432");
                        sound.stop();
                        state = 0;
                    });
                } else {
                    clearInterval(phases);
                    // mySound.stop();
                    // ion.sound.stop("432");
                    sound.stop();
                    state = 0;
                    jQuery('.protocol_stop').click();
                    jQuery('.popup-img-wrap').addClass('hidden');
                    jQuery('.popup-img-wrap').eq(0).removeClass('hidden');
                    jQuery('.popup-img-wrap').removeAttr('checked');
                }
            }, 1000);
        });
    };


    // V-SPREAD

    // CLEAN
    jQuery(".template").on('click', function(e) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to vspread_zone_50').removeAttr('style');
    });

    // S5-S6-S7
    jQuery('.vspread_zone_S5, .vspread_zone_S6, .vspread_zone_S7').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50').removeAttr('style');
        jQuery('.vspread_zone_S5, .vspread_zone_S6, .vspread_zone_S7').removeClass('vspread_zone_50').addClass('vspread_zone_from');
        jQuery('.vspread_zone_V-').removeClass('vspread_zone_50').addClass('vspread_zone_to');
    });

    // S4
    jQuery('.vspread_zone_S4').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50').removeAttr('style');
        jQuery('.vspread_zone_S4').removeClass('vspread_zone_50').addClass('vspread_zone_from');
        jQuery('.vspread_zone_V5').removeClass('vspread_zone_50').addClass('vspread_zone_to');
    });

    // S3
    jQuery('.vspread_zone_S3').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50').removeAttr('style');
        jQuery('.vspread_zone_S3').removeClass('vspread_zone_50').addClass('vspread_zone_from');
        jQuery('.vspread_zone_arrow_s').removeClass('vspread_zone_0');
        jQuery('.vspread_zone_arrow_s').css({
            left: '163px',
            top: '232px',
            transform: 'rotate(123deg)'
        });
    });

    // S2
    jQuery('.vspread_zone_S2').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50').removeAttr('style');
        jQuery('.vspread_zone_S2').removeClass('vspread_zone_50').addClass('vspread_zone_from');
        jQuery('.vspread_zone_V5').removeClass('vspread_zone_50').addClass('vspread_zone_to');
    });

    // S2_up
    jQuery('.vspread_zone_S2_up').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50').removeAttr('style');
        jQuery('.vspread_zone_S2_up').removeClass('vspread_zone_50').addClass('vspread_zone_from');
        jQuery('.vspread_zone_V5').removeClass('vspread_zone_50').addClass('vspread_zone_to');
    });

    // S1
    jQuery('.vspread_zone_S1').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50').removeAttr('style');
        jQuery('.vspread_zone_S1').removeClass('vspread_zone_50').addClass('vspread_zone_from');
        jQuery('.vspread_zone_S3').removeClass('vspread_zone_50').addClass('vspread_zone_to');
    });

    // D5-D6-D7
    jQuery('.vspread_zone_D5, .vspread_zone_D6, .vspread_zone_D7').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50').removeAttr('style');
        jQuery('.vspread_zone_D5, .vspread_zone_D6, .vspread_zone_D7').removeClass('vspread_zone_50').addClass('vspread_zone_from');
        jQuery('.vspread_zone_V5').removeClass('vspread_zone_50').addClass('vspread_zone_to');
    });

    // D4
    jQuery('.vspread_zone_D4').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50');
        jQuery('.vspread_zone_D4').removeClass('vspread_zone_50').addClass('vspread_zone_from').css('zIndex', '1000');
        jQuery('.vspread_zone_arrow_s').removeClass('vspread_zone_0');
        jQuery('.vspread_zone_arrow_s').css({
            left: '141px',
            top: '240px',
            transform: 'rotate(2deg)'
        });
    });

    // D3
    jQuery('.vspread_zone_D3').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50');
        jQuery('.vspread_zone_D3').removeClass('vspread_zone_50').addClass('vspread_zone_from').css('zIndex', '1000');
        jQuery('.vspread_zone_arrow_s').removeClass('vspread_zone_0');
        jQuery('.vspread_zone_arrow_s').css({
            left: '141px',
            top: '225px',
            transform: 'rotate(55deg)'
        });
    });

    // D2
    jQuery('.vspread_zone_D2').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50').removeAttr('style');
        jQuery('.vspread_zone_D2').removeClass('vspread_zone_50').addClass('vspread_zone_from');
        jQuery('.vspread_zone_V4').removeClass('vspread_zone_50').addClass('vspread_zone_to');
    });

    // D2_up
    jQuery('.vspread_zone_D2_up').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50').removeAttr('style');
        jQuery('.vspread_zone_D2_up').removeClass('vspread_zone_50').addClass('vspread_zone_from');
        jQuery('.vspread_zone_V5').removeClass('vspread_zone_50').addClass('vspread_zone_to');
    });

    // D1
    jQuery('.vspread_zone_D1').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50').removeAttr('style');
        jQuery('.vspread_zone_D1').removeClass('vspread_zone_50').addClass('vspread_zone_from');
        jQuery('.vspread_zone_D5, .vspread_zone_D6, .vspread_zone_D7').removeClass('vspread_zone_50').addClass('vspread_zone_to');
    });

    // V5
    jQuery('.vspread_zone_V5').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50');
        jQuery('.vspread_zone_V5').removeClass('vspread_zone_50').addClass('vspread_zone_from').css('zIndex', '1000');
        jQuery('.vspread_zone_arrow_l').removeClass('vspread_zone_0');
        jQuery('.vspread_zone_arrow_l').css({
            left: '79px',
            top: '380px',
            transform: 'rotate(90deg)'
        });
    });

    // V4
    jQuery('.vspread_zone_V4').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50');
        jQuery('.vspread_zone_V4').removeClass('vspread_zone_50').addClass('vspread_zone_from').css('zIndex', '1000');
        jQuery('.vspread_zone_arrow_s').removeClass('vspread_zone_0');
        jQuery('.vspread_zone_arrow_s').css({
            left: '153px',
            top: '230px',
            transform: 'rotate(90deg)'
        });
    });

    // V3
    jQuery('.vspread_zone_V3').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50');
        jQuery('.vspread_zone_V3').removeClass('vspread_zone_50').addClass('vspread_zone_from').css('zIndex', '1000');
        jQuery('.vspread_zone_arrow_s').removeClass('vspread_zone_0');
        jQuery('.vspread_zone_arrow_s').css({
            left: '175px',
            top: '190px',
            transform: 'rotate(45deg)'
        });
    });

    // V2
    jQuery('.vspread_zone_V2').on('click', function(event) {
        jQuery('.vspread_zone_arrow_s, .vspread_zone_arrow_l').removeAttr('style').addClass('vspread_zone_0');
        jQuery('.vspread_zone').removeClass('vspread_zone_from vspread_zone_to').addClass('vspread_zone_50');
        jQuery('.vspread_zone_V2').removeClass('vspread_zone_50').addClass('vspread_zone_from').css('zIndex', '1000');
        jQuery('.vspread_zone_arrow_s').removeClass('vspread_zone_0');
        jQuery('.vspread_zone_arrow_s').css({
            left: '175px',
            top: '190px',
            transform: 'rotate(45deg)'
        });
    });



    //CROPPING SCRIPT
        // convert bytes into friendly format
        function bytesToSize(bytes) {
            var sizes = ['Bytes', 'KB', 'MB'];
            if (bytes == 0) return 'n/a';
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
        };

        // check for selected crop region
        function checkForm() {
            if (parseInt(jQuery('#w').val())) return true;
            jQuery('.error').html('Пожалуйста выделите область').show();
            return false;
        };

        // update info by cropping (onChange and onSelect events handler)
        function updateInfo(e) {
            jQuery('#x1').val(e.x);
            jQuery('#y1').val(e.y);
            jQuery('#x2').val(e.x2);
            jQuery('#y2').val(e.y2);
            jQuery('#w').val(e.w);
            jQuery('#h').val(e.h);
        };

        // clear info by cropping (onRelease event handler)
        function clearInfo() {
            jQuery('.info #w').val('');
            jQuery('.info #h').val('');
        };

        // Create variables (in this scope) to hold the Jcrop API and image size
        var jcrop_api, boundx, boundy;

        function fileSelectHandler() {

            // get selected file
            var oFile = jQuery('#image_file')[0].files[0];
            // console.log(oFile);
            // hide all errors
            jQuery('.error').hide();

            // check for image type (jpg and png are allowed)
            var rFilter = /^(image\/jpeg|image\/png)$/i;
            if (! rFilter.test(oFile.type)) {
                jQuery('.error').html('Доспустимы изображения только в формате ".jpg" и ".png"').show();
                return;
            }

            // check for file size
            if (oFile.size > 15 * 1024 * 1024) {
                jQuery('.error').html('Вы выбрали слишком большой файл, пожалуйста выберите изображение меньшего размера.').show();
                return;
            }

            // preview element
            var oImage = document.getElementById('preview');

            // prepare HTML5 FileReader
            var oReader = new FileReader();

            oReader.onload = function(e) {

                EXIF.getData(oFile, function(){

                    var ort = this.exifdata.Orientation;

                    // e.target.result contains the DataURL which we can use as a source of the image
                    oImage.src = e.target.result;
                    oImage.onload = function () {

                        var rotateImg = function(rad, rotateCanvas, cx, cy){
                            var canvas = document.createElement('canvas'),
    //                        var canvas = document.getElementById('preview-canvas'),
                                ctx = canvas.getContext('2d');

                            if(rotateCanvas){
                                canvas.setAttribute('width', oImage.naturalHeight);
                                canvas.setAttribute('height', oImage.naturalWidth);
                            }else{
                                canvas.setAttribute('width', oImage.naturalWidth);
                                canvas.setAttribute('height', oImage.naturalHeight);
                            }

                            ctx.rotate(rad);
                            ctx.drawImage(oImage, cx, cy);

                            ort = 1;

                            oImage.src = canvas.toDataURL("image/png");
                        };

                        switch(ort){
                           case 6:
                               rotateImg(90 * Math.PI / 180, true, 0, oImage.naturalHeight * -1);
                               break;
                           case 3:
                               rotateImg(180 * Math.PI / 180, false, oImage.naturalWidth * -1, oImage.naturalHeight * -1);
                               break;
                           case 8:
                               rotateImg(-90 * Math.PI / 180, true, oImage.naturalWidth * -1, 0);
                               break;
                        }


                        // display step 2
                        jQuery('.step2').fadeIn(500);
                        jQuery('.btn__crop').removeClass('hidden');
                        jQuery('.btn__crop').addClass('btn_alert');
                        setTimeout("jQuery('.btn__crop').removeClass('btn_alert')", 3000);
                        // display some basic image info
                        var sResultFileSize = bytesToSize(oFile.size);
                        jQuery('#filesize').val(sResultFileSize);
                        jQuery('#filetype').val(oFile.type);
                        jQuery('#filedim').val(oImage.naturalWidth + ' x ' + oImage.naturalHeight);

                        // destroy Jcrop if it is existed
                        if (typeof jcrop_api != 'undefined') {
                            jcrop_api.destroy();
                            jcrop_api = null;
                            jQuery('#preview').width(oImage.naturalWidth);
                            jQuery('#preview').height(oImage.naturalHeight);
                        }

                        setTimeout(function(){
                            // initialize Jcrop
                            jQuery('#preview').Jcrop({
                                minSize: [32, 32],// keep aspect ratio 1:1
                                bgFade: true, // use fade effect
                                bgOpacity: .3, // fade opacity
                                aspectRatio: 1/1.5,
                                onChange: updateInfo,
                                onSelect: updateInfo,
                                onRelease: clearInfo
                            }, function(){

                                // use the Jcrop API to get the real image size
                                var bounds = this.getBounds();
                                boundx = bounds[0];
                                boundy = bounds[1];

                                // Store the Jcrop API in the jcrop_api variable
                                jcrop_api = this;
                            });
                        },3000);

                    };




                });

            };

            // read selected file as DataURL
            oReader.readAsDataURL(oFile);
        }
        jQuery('#image_file').on('change', fileSelectHandler);
        setTimeout(jQuery(".paranja").animate({
            opacity: 0,
            zIndex: -1
        }, 1500 ), 5000);

});

jQuery(document).ready(function() {


//617 протокол
    var cur_screen = 0,
        sex,
        cur_sex,
        faces_img,
        protocol_people,
        next_screen,
        returned_img = jQuery('body').find('.injected').attr('src');
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
        console.log(cur_screen);
    }
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
        console.log(returned_img);
        next_screen(1);
    };

    protocol_people = function(this_sex){
        if (this_sex == male){
            faces_img = '/wp-content/themes/braincleaner/img/male.png';

        } else if (this_sex == female) {
            faces_img = '/wp-content/themes/braincleaner/img/female.png';
        };

    }

    jQuery('.sex_item').on('click', function(event) {
        cur_sex = jQuery(this).data('sex');
        next_screen(2);
        jQuery('.sex_item').removeClass('active');
        jQuery(this).addClass('active');
        console.log(cur_sex);
        protocol_people(cur_sex);
    });
    
//617 протокол. Конец.
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
        defStatus=0;
        phases = setInterval(function(){
            if (defCount <= img_num-1){
                jQuery('.popup-img-wrap').addClass('hidden');
                jQuery('.popup-img-wrap[data-defNum='+defCount+']').removeClass('hidden');
                defCount += 1;
                if(jQuery('.popup-img-wrap[data-defNum='+(defCount-1)+']').data('formula')&&(!jQuery('.popup-img-wrap[data-defNum='+(defCount-1)+']').attr('checked'))){
                    if (defStatus <= 6){
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

    jQuery( ".ring" ).draggable({ 
        snap: false
    });

    jQuery( ".ring" ).resizable({
      aspectRatio: 1/ 1
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

jQuery(document).ready(function() {
    var mw,
        mm,
        wm,
        ww,
        reloadTime,
        reloadTime1,
        d12Val,
        prot_count,
        cur_faces,
        cur_animation_val,
        count_animation,
        circle_protocol,
        faces_img,
        browser_w,
        phaseSeven_one,
        circle_model,
        caliber = 1,
        client_img,
        bg_size_man,
        bg_size_woman,
        move_man,
        move_woman,
        cur_px_position,
        start_move,
        tickSound = new buzz.sound( "/sounds/tick", {
            formats: [ "ogg", "mp3" ]
        }),
        reloadSound  = new Howl({
            urls: ['/sounds/reload-2.ogg', '/sounds/reload-2.mp3'],
            autoplay: false,
            loop: false,
            buffer: true
        }),
        onEnd = function(){
            tickSound.stop();
            swal({   
                title: "Дефрагментация окончена",
                type: "success",   
                confirmButtonColor: "#DD6B56",
                confirmButtonText: "Завершить"
            }, 
            function(isConfirm){
                if (isConfirm) {
                    var protocol = undefined;    
                    jQuery(location).attr('href','/novyj-protokol');
                }
            });
            var endSound = new buzz.sound( "/sounds/fin", {
                formats: [ "ogg", "mp3" ]
            });
            endSound.play();
        },
        supportsStorage = function(){
            try {
                return 'localStorage' in window && window['localStorage'] !== null;
            } catch (e) {
                return false;
            }
        };
    browser_w = jQuery(window).width();
    if (browser_w <= 2000) {
        jQuery('.main-zone').addClass('main-zone_min');
    };
    if (jQuery('.main-zone').hasClass('main-zone_min')) {
        bg_size_man = '6450px';
        bg_size_woman = '3500px';
        move_man = 208;
        move_woman = 219;
        start_move = -55;
    } else {
        bg_size_man = '11000px';
        move_man = 356;
        move_woman = 400;
        start_move = -95;
    }
    circle_model = function(count_animation){
        if(count_animation <= 120){
            cur_animation_val += 1.5;
            d12Val+= 9;
            jQuery('.ring-formula').css('transform', 'rotate(-'+d12Val+'deg)');
            jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
            jQuery('.ring-formula').css('background', '#fff url(/wp-content/themes/braincleaner/img/lovushka.jpg) 0 0/100% no-repeat');
        } else if (count_animation >= 120 && count_animation <= 240){
            cur_animation_val -= 1.5;
            d12Val+= 9;
            jQuery('.ring-formula').css('transform', 'rotate(-'+d12Val+'deg)');
            jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
            jQuery('.ring-formula').css('background', '#fff url(/wp-content/themes/braincleaner/img/lovushka.jpg) 0 0/100% no-repeat');
        } else if (count_animation >= 240 && count_animation <= 300){
            cur_animation_val -= 1.5;
            d12Val+= 9;
            jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
            jQuery('.ring-formula').css('transform', 'rotate('+d12Val+'deg)');
            jQuery('.ring-formula').css('background', '#fff url(/wp-content/themes/braincleaner/img/daemon.png) 0 0/100% no-repeat');
        } else if (count_animation >= 300 && count_animation <= 360){
            cur_animation_val += 1.5;
            d12Val+= 9;
            jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
            jQuery('.ring-formula').css('transform', 'rotate('+d12Val+'deg)');
            jQuery('.ring-formula').css('background', '#fff url(/wp-content/themes/braincleaner/img/daemon.png) 0 0/100% no-repeat');
        } else {
            d12Val+= 9;
            cur_animation_val += 1.5;
            jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
            jQuery('.ring-formula').css('transform', 'rotate('+d12Val+'deg)');
            jQuery('.ring-formula').css('background', '#fff url(/wp-content/themes/braincleaner/img/daemon.png) 0 0/100% no-repeat');
        }
    };
    circle_model_woman = function(count_animation){
        if(count_animation <= 120){
            cur_animation_val += 1.5;
            d12Val+= 9;
            jQuery('.ring-formula').css('transform', 'rotate(-'+d12Val+'deg)');
            jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
            jQuery('.ring-formula').css('background', '#fff url(/wp-content/themes/braincleaner/img/lovushka.jpg) 0 0/100% no-repeat');
        } else {
            cur_animation_val -= 1.5;
            d12Val+= 9;
            jQuery('.ring-formula').css('transform', 'rotate(-'+d12Val+'deg)');
            jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
            jQuery('.ring-formula').css('background', '#fff url(/wp-content/themes/braincleaner/img/lovushka.jpg) 0 0/100% no-repeat');
        } 
    };
    circle_model_man = function(count_animation){
        if(count_animation <= 120){
            cur_animation_val -= 1.5;
            d12Val+= 9;
            jQuery('.ring-formula').css('transform', 'rotate('+d12Val+'deg)');
            jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
            jQuery('.ring-formula').css('background', '#fff url(/wp-content/themes/braincleaner/img/daemon.png) 0 0/100% no-repeat');
        } else {
            cur_animation_val += 1.5;
            d12Val+= 9;
            jQuery('.ring-formula').css('transform', 'rotate('+d12Val+'deg)');
            jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
            jQuery('.ring-formula').css('background', '#fff url(/wp-content/themes/braincleaner/img/daemon.png) 0 0/100% no-repeat');
        }
    };
    wm = function(){
        client_img = jQuery('body').find('.injected').attr('src');
        jQuery('.sq3').css('background', 'url('+client_img+') no-repeat');
        jQuery('.sq3').addClass('client_sq');
        reloadTime = 0;
        reloadTime1 = 0;
        d12Val = 0;
        prot_count = 1;
        cur_animation_val = 0;
        count_animation = 1;
        tickSound.play();
        jQuery('.sq1').css('background', 'url('+faces_img+') no-repeat');
        jQuery('.sq1').css('background-size', bg_size_man);
        jQuery('.sq1').css('background-position', '-52px center');
        phaseOne = setInterval(function(){
            if(count_animation <= 360){
                circle_model(count_animation);
                count_animation += 1;
            } else {
                if (prot_count <= 30) {
                    prot_count += 1;
                    tickSound.stop();
                    reloadSound.play();
                    cur_faces = jQuery('.sq1').css('background-position');
                    console.log(cur_faces);
                    cur_px_position = cur_faces.indexOf("px");
                    cur_faces = cur_faces.substr(0,cur_px_position)-move_man;
                    jQuery('.sq1').css('background-position', cur_faces+'px center');
                    tickSound.play();
                    count_animation = 1;
                    d12Val = 0;
                } else {
                    clearInterval(phaseOne);
                    onEnd();
                }
            }
        }, 250);
    };
    mw = function(){
        client_img = jQuery('body').find('.injected').attr('src');
        jQuery('.sq1').css('background', 'url('+client_img+') no-repeat');
        jQuery('.sq1').addClass('client_sq');
    //фаза 1
        reloadTime = 0;
        reloadTime1 = 0;
        d12Val = 0;
        prot_count = 1;
        cur_animation_val = 0;
        count_animation = 1;
        tickSound.play();
        jQuery('.sq3').css('background', 'url('+faces_img+') no-repeat');
        if (bg_size_woman) {
            jQuery('.sq3').css('background-size', bg_size_woman);
        };
        jQuery('.sq3').css('background-position', start_move+'px center');
        phaseOne = setInterval(function(){
            if(count_animation <= 360){
                circle_model(count_animation);
                count_animation += 1;
            } else {
                if (prot_count <= 15) {
                    prot_count += 1;
                    tickSound.stop();
                    reloadSound.play();
                    cur_faces = jQuery('.sq3').css('background-position');
                    console.log(cur_faces);
                    cur_px_position = cur_faces.indexOf("px");
                    cur_faces = cur_faces.substr(0,cur_px_position)-move_woman;
                    jQuery('.sq3').css('background-position', cur_faces+'px center');
                    tickSound.play();
                    count_animation = 1;
                    d12Val = 0;
                } else {
                    clearInterval(phaseOne);
                    onEnd();
                }
            }
        }, 250);
    };
    mm = function(){
        client_img = jQuery('body').find('.injected').attr('src');
        jQuery('.sq3').css('background', 'url('+client_img+') no-repeat');
        jQuery('.sq3').addClass('client_sq');
    //фаза 1
        reloadTime = 0;
        reloadTime1 = 0;
        d12Val = 0;
        prot_count = 1;
        cur_animation_val = 0;
        count_animation = 1;
        tickSound.play();
        jQuery('.sq4').css('background', 'url('+faces_img+') no-repeat');
        jQuery('.sq4').css('background-size', bg_size_man);
        jQuery('.sq4').css('background-position', '-52px center');
        phaseOne = setInterval(function(){
            if(count_animation <= 240){
                circle_model_man(count_animation);
                count_animation += 1;
            } else {
                if (prot_count <= 30) {
                    tickSound.stop();
                    reloadSound.play();
                    if (caliber == 1){
                        caliber = 2;
                        jQuery('.sq2').css('background', 'url('+faces_img+') no-repeat');
                        jQuery('.sq2').css('background-position', jQuery('.sq4').css('background-position'));
                        jQuery('.sq4').css('background', 'none');
                    } else {
                        caliber = 1;
                        prot_count += 1;
                        jQuery('.sq4').css('background', 'url('+faces_img+') no-repeat');
                        cur_faces = jQuery('.sq2').css('background-position');
                        console.log(cur_faces);
                        cur_px_position = cur_faces.indexOf("px");
                        cur_faces = cur_faces.substr(0,cur_px_position)-move_man;
                        jQuery('.sq4').css('background-position', cur_faces+'px center');
                        jQuery('.sq2').css('background', 'none');
                    };
                    jQuery('.sq2, .sq4').css('background-size', bg_size_man);
                    tickSound.play();
                    count_animation = 1;
                    d12Val = 0;
                } else {
                    clearInterval(phaseOne);
                    onEnd();
                }
            }
        }, 250);
    };
    ww = function(){
        client_img = jQuery('body').find('.injected').attr('src');
        jQuery('.sq3').css('background', 'url('+client_img+') no-repeat');
        jQuery('.sq2').css('background', 'url('+faces_img+') no-repeat');
        jQuery('.sq3').addClass('client_sq');
        reloadTime = 0;
        reloadTime1 = 0;
        d12Val = 0;
        prot_count = 1;
        cur_animation_val = 0;
        count_animation = 1;
        tickSound.play();
        jQuery('.sq2').css('background', 'url('+faces_img+') no-repeat');
        jQuery('.sq2').css('background-position', start_move'px center');
        if (bg_size_woman) {
            jQuery('.sq2, .sq4').css('background-size', bg_size_woman);
        };
        phaseOne = setInterval(function(){
            if(count_animation <= 240){
                circle_model_woman(count_animation);
                count_animation += 1;
            } else {
                if (prot_count <= 15) {
                    tickSound.stop();
                    reloadSound.play();
                    if (caliber == 1){
                        caliber = 2;
                        jQuery('.sq4').css('background', 'url('+faces_img+') no-repeat');
                        jQuery('.sq4').css('background-position', jQuery('.sq2').css('background-position'));
                        jQuery('.sq2').css('background', 'none');
                    } else {
                        caliber = 1;
                        prot_count += 1;
                        jQuery('.sq2').css('background', 'url('+faces_img+') no-repeat');
                        cur_faces = jQuery('.sq4').css('background-position');
                        console.log(cur_faces);
                        cur_px_position = cur_faces.indexOf("px");
                        cur_faces = cur_faces.substr(0,cur_px_position)-womove_man;
                        jQuery('.sq2').css('background-position', cur_faces+'px center');
                        jQuery('.sq4').css('background', 'none');
                    };
                    if (bg_size_woman) {
                        jQuery('.sq2, .sq4').css('background-size', bg_size_woman);
                    };
                    tickSound.play();
                    count_animation = 1;
                    d12Val = 0;
                } else {
                    clearInterval(phaseOne);
                    onEnd();
                }
            }
        }, 250);
    };
    jQuery('body').on('click', '.prot-start', function(event) {
        if(supportsStorage && localStorage.getItem('circle_protocol')){
            circle_protocol = localStorage.getItem('circle_protocol');
        }
        if(supportsStorage && localStorage.getItem('faces_img')){
            faces_img = localStorage.getItem('faces_img');
        }
        console.log(circle_protocol);
        if (circle_protocol && circle_protocol == 'mw') {
            mw();
        } else if (circle_protocol && circle_protocol == 'mm') {
            mm();
        } else if (circle_protocol && circle_protocol == 'wm') {
            wm();
        } else if (circle_protocol && circle_protocol == 'ww') {
            ww();
        }
    });
});

var mw,
    mm,
    wm,
    ww,
    reloadTime,
    reloadTime1,
    d12Val,
    cur_animation_val,
    count_animation,
    circle_protocol,
    phaseSeven_one,
    circle_model,
    client_img,
    supportsStorage = function(){
        try {
            return 'localStorage' in window && window['localStorage'] !== null;
        } catch (e) {
            return false;
        }
    };
    if(supportsStorage && localStorage.getItem('returned_img')){
        client_img = localStorage.getItem('returned_img');
        console.log(client_img);
    }
    if(supportsStorage && localStorage.getItem('circle_protocol')){
        circle_protocol = localStorage.getItem('circle_protocol');
        console.log(circle_protocol);
    }
circle_model = function(count_animation){
    console.log(count_animation);
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
}
mw = function(){
    jQuery('.sq1').css('background', 'url('+client_img+') no-repeat');
//фаза 1
    reloadTime = 0;
    reloadTime1 = 0;
    d12Val = 0;
    cur_animation_val = 0;
    count_animation = 1;
    phaseOne = setInterval(function(){
        if(count_animation <= 360){
            circle_model(count_animation);
            count_animation+=1;
        } else {
            clearInterval(phaseOne);
        }
    }, 250);
}
jQuery('#menu-item-646').on('click', function(event) {
    jQuery(this).find('a').text('started');
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

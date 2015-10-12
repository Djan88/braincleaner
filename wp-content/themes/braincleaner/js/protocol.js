var mw,
    mm,
    wm,
    ww,
    reloadTime,
    reloadTime1,
    d12Val,
    cur_animation_val,
    protocol_people,
    count_animation,
    phaseSeven_one,
    circle_model,
    client_img,
    cur_screen = 0,
    sex,
    cur_sex,
    cur_recep,
    faces_img,
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
        console.log(cur_screen);
    }
    if(supportsStorage && localStorage.getItem('returned_img')){
        client_img = localStorage.getItem('returned_img');
        console.log(client_img);
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

protocol_people = function(this_sex, this_recep){
    if (this_sex == 'male'){
        faces_img = '/wp-content/themes/braincleaner/img/male.png';
    } else if (this_sex == 'female') {
        faces_img = '/wp-content/themes/braincleaner/img/female.png';
    };
}

if (returned_img){
    console.log(returned_img);
    next_screen(1);
};

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
    jQuery(this).addClass('active');
    protocol_people(cur_sex, cur_recep);
});

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
    jQuery('.sq2').css('background', 'url('+client_img+') no-repeat');
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
//фаза 2
    jQuery('.sq2').css('background', 'none');
    jQuery('.sq3').css('background', 'url('+client_img+') no-repeat');
            reloadTime = 0;
            reloadTime1 = 0;
            d12Val = 0;
            cur_animation_val = 0;
            count_animation = 1;
            phaseTwo = setInterval(function(){
                if(count_animation <= 120){
                    circle_model(count_animation);
                    count_animation+=1;
                } else {

                }
            }, 250);
        }
    }, 250);
}

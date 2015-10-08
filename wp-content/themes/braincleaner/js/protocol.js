var mw,
    mm,
    wm,
    ww,
    reloadTime,
    reloadTime1,
    d12Val,
    cur_animation_val,
    count_animation,
    phaseSeven_one;
mw = function(){
//фаза 1
    reloadTime = 0;
    reloadTime1 = 0;
    d12Val = 0;
    cur_animation_val = 0;
    count_animation = 1;
    phaseSeven_one = setInterval(function(){
        if (count_animation <= 40){                                                                         //40
            cur_animation_val += 1.5;
            jQuery('#draggable5_1, #draggable2').css({
                transform: 'rotate(-'+cur_animation_val+'deg) scale(1)',
                background: '#fff url(/wp-content/themes/eddiemachado-bones-611c04e/library/images/mo_right.png) 0 0/100% no-repeat',
                color: 'transparent',
                borderColor: 'transparent',
                opacity: 0.8,
                borderWidth: '1px',
                paddingTop: '4px',
                zIndex: '1000'
            });
            count_animation += 1;
        } else if(count_animation <= 57) {                                                         //57
            count_animation += 1;
        } else {
            clearInterval(phaseSeven_one);
            count_animation = 1;
            jQuery('#draggable5_1, #draggable2').css({
                transform: 'rotate(-'+0+'deg) scale(0.5)',
                background: 'rgba(255,255,255, 0.5)',
                color: 'red',
                borderColor: 'red',
                opacity: 1,
                borderWidth: '2px',
                paddingTop: '2px',
                zIndex: '1'
            });
            tickSound.stop();
            jQuery('#draggableD12').addClass('hidden');
            jQuery('.box_rounded').css('transform', 'rotate(0deg) scale(1)');
            jQuery('#draggableD12').css('transform', 'rotate(0deg)');
            onEnd();
        }
    }, 1000);
}

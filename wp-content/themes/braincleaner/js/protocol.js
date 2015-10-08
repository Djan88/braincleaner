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
        if(count_animation <= 30){
            cur_animation_val += 6;
            d12Val+= 36;
            jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
        } else if (count_animation >= 30 && count_animation <= 57){
            cur_animation_val -= 6;
            d12Val+= 36;
            jQuery('#draggableD12').css('transform', 'rotate(-'+d12Val+'deg)');
            jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
        } else if (count_animation >= 57 && count_animation <= 73){
            cur_animation_val -= 6;
            d12Val+= 36;
            jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
            jQuery('#draggableD12').css('transform', 'rotate('+d12Val+'deg)');
            jQuery('#draggableD12').css('background', '#fff url(/wp-content/themes/eddiemachado-bones-611c04e/library/images/daemon.png) 0 0/100% no-repeat');
        } else if (count_animation >= 73 && count_animation <= 86){
            cur_animation_val += 6;
            d12Val+= 36;
            jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
            jQuery('#draggableD12').css('transform', 'rotate('+d12Val+'deg)');
            jQuery('#draggableD12').css('background', '#fff url(/wp-content/themes/eddiemachado-bones-611c04e/library/images/daemon.png) 0 0/100% no-repeat');
        } else {
            d12Val+= 36;
            cur_animation_val += 6;
            jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
            jQuery('#draggableD12').css('transform', 'rotate('+d12Val+'deg)');
            jQuery('#draggableD12').css('background', '#fff url(/wp-content/themes/eddiemachado-bones-611c04e/library/images/daemon.png) 0 0/100% no-repeat');
        }
    }, 1000);
}

var mw,
    mm,
    wm,
    ww,
    reloadTime,
    reloadTime1,
    d12Val,
    cur_animation_val,
    count_animation,
    phaseSeven_one,
    circle_model;
circle_model = function(count_animation){
    if(count_animation <= 120){
        cur_animation_val += 1.5;
        d12Val+= 9;
        jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
        jQuery('#draggableD12').css('background', '#fff url(/wp-content/themes/brainkleaner/img/lovushka.jpg) 0 0/100% no-repeat');
    } else if (count_animation >= 120 && count_animation <= 228){
        cur_animation_val -= 1.5;
        d12Val+= 9;
        jQuery('#draggableD12').css('transform', 'rotate(-'+d12Val+'deg)');
        jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
        jQuery('#draggableD12').css('background', '#fff url(/wp-content/themes/brainkleaner/img/lovushka.jpg) 0 0/100% no-repeat');
    } else if (count_animation >= 228 && count_animation <= 292){
        cur_animation_val -= 1.5;
        d12Val+= 9;
        jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
        jQuery('#draggableD12').css('transform', 'rotate('+d12Val+'deg)');
        jQuery('#draggableD12').css('background', '#fff url(/wp-content/themes/brainkleaner/img/daemon.png) 0 0/100% no-repeat');
    } else if (count_animation >= 292 && count_animation <= 344){
        cur_animation_val += 1.5;
        d12Val+= 9;
        jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
        jQuery('#draggableD12').css('transform', 'rotate('+d12Val+'deg)');
        jQuery('#draggableD12').css('background', '#fff url(/wp-content/themes/brainkleaner/img/daemon.png) 0 0/100% no-repeat');
    } else {
        d12Val+= 9;
        console.log('FIN');
        cur_animation_val += 1.5;
        jQuery('.box_rounded').css('transform', 'rotate('+cur_animation_val+'deg) scale(1)');
        jQuery('#draggableD12').css('transform', 'rotate('+d12Val+'deg)');
        jQuery('#draggableD12').css('background', '#fff url(/wp-content/themes/brainkleaner/img/daemon.png) 0 0/100% no-repeat');
    }
}
mw = function(){
//фаза 1
    reloadTime = 0;
    reloadTime1 = 0;
    d12Val = 0;
    cur_animation_val = 0;
    count_animation = 1;
    phaseSeven_one = setInterval(function(){
        circle_model(count_animation);
        count_animation+=1;
    }, 250);
}

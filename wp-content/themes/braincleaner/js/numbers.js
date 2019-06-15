jQuery(document).ready(function () {
  var cur_window_width,
      block_w,
      page_h,
      counter = -1,
      scroll_val,
      global_counter = 0,
      start_time,
      history_h,
      end_time,
      max_time = 0,
      curTrY,
      cur_type,
      history_returned = JSON.parse(localStorage.getItem('history')),
      history_type,
      supportsStorage = function(){
        try {
            return 'localStorage' in window && window['localStorage'] !== null;
        } catch (e) {
            return false;
        }
      },
      cur_date,
      history,
      history_item = {
        0: 0,
        1: 0,
        2: 0,
        3: 0,
        4: 0
      },
      img_position = {
        0: '0',
        1: '-178px',
        2: '-356px',
        3: '-534px',
        4: '-712px',
        5: '-890px',
        6: '-1068px',
        7: '-1246px',
        8: '-1424px',
        9: '-1602px',
        10: '-1780px',
        11: '-1958px',
        12: '-2136px',
        13: '-2314px',
        14: '-2494px',
        15: '-2671px',
        16: '-2850px',
        17: '-3026px',
        18: '-3206px',
        19: '-3385px',
        20: '-3563px',
        21: '-3740px',
        22: '-3920px',
        23: '-4098px',
        24: '-4275px',
        25: '-4454px',
        26: '-4632px',
        27: '-4810px',
        28: '-4988px',
        29: '-5166px',
        30: '-5344px',
        31: '-5523px',
        32: '-5702px',
        33: '-5880px',
        34: '-6058px',
        35: '-6235px',
        36: '-6415px',
        37: '-6593px',
        38: '-6770px',
        39: '-6950px',
      },
      setImgFromHistory,
      hist_item_date,
      hist_item_1,
      hist_item_2,
      hist_item_3,
      hist_item_4,
      hist_item_5,
      hist_item_type,
      history_update,
      cur_history_item,
      cur_history_image,
      cur_history_images,
      cur_history_images_one,
      cur_history_images_two,
      cur_history_images_three,
      cur_history_images_four,
      cur_history_images_five,
      elems_obj = {
        0: 0,
        1: 0,
        2: 0,
        3: 0,
        4: 0,
        5: 0,
        6: 0,
        7: 0,
        8: 0,
        9: 0,
      };


if (!history_returned) {
  history_returned = []; 
}

// proble diagnostic
jQuery( ".problem_range_card" ).on('click', function(event) {
  
});

// get current date
cur_date = function(){
  var formattedDate = new Date();
  var d = formattedDate.getDate();
  var m =  formattedDate.getMonth();
  var h =  formattedDate.getHours();
  var min =  formattedDate.getMinutes();
  m += 1;  // JavaScript months are 0-11
  if (m < 10) {
    m = '0'+m;
  }
  if (min < 10) {
    min = '0'+min;
  }
  var y = formattedDate.getFullYear();

  hist_item_date = (d + "." + m + "." + y+ ' ' + h + ":" + min);
}
// width of block
  cur_window_width = function(){
    jQuery('.form-group-inner').css('width', jQuery('.form-group_login').css('width'));
    block_w = parseFloat(jQuery(".marakata_sim.marakata_sim_prot").css('width'));
    page_h = jQuery("html").width();
    jQuery('.marakata_sim-wrap, .marakata_dot').height(block_w * 1.25+'px');
    jQuery('.marakata_sim_prot').height(block_w * 1.25 * 10 +'px');
    scroll_val = block_w * 1.25;
    // if (page_h < 1150) {
    //   scroll_val = block_w * 1.25;
    // } else {
    //   scroll_val = block_w * 1.8;
    // }
  };

  // onload
  cur_window_width();
  jQuery('.marakata_sim-1').addClass('marakata_sim-active');
  jQuery(window).on('resize', function(event) {
    cur_window_width();
    jQuery('.master_problem_wrapper, .save_history').addClass('hidden');
  });

// click on block
  jQuery('.marakata_sim_prot').on('click', function(event) {
    if (jQuery(this).hasClass('marakata_sim_from')&&jQuery(this).hasClass('marakata_sim-active')) {
      jQuery('.btn_reset').removeClass('hidden');
      if (counter <= 9) {
        if (counter <= -1) {
          end_time = new Date();
        } else {
          start_time = end_time;
          end_time = new Date();
          elems_obj[counter] = end_time - start_time;
          if (elems_obj[max_time] < (end_time - start_time)) {
            max_time = counter;
          }
          console.log(elems_obj);
          console.log('Лучшее: '+ max_time+', Текущее: '+(end_time - start_time));
        }
        counter += 1;
      } else {
        curTrY = parseFloat(jQuery(this).css('marginTop'));
        max_time = 9 - max_time
        history_item[global_counter] = max_time;
        curTrY = curTrY-(scroll_val*max_time);
        console.log(curTrY);
        jQuery(this).css('marginTop', curTrY+'px');
        jQuery('.marakata_sim').removeClass('marakata_sim-active');
        jQuery(this).removeClass('marakata_sim_from');
        if (global_counter <= 2) {
          cur_elem = global_counter+1
        } else {
          cur_elem = global_counter+2
        }
        jQuery('.marakata_sim-wrap').eq(cur_elem).find('.marakata_sim').addClass('marakata_sim-active');
        counter = -1;
        elems_obj = {
            0: 0,
            1: 0,
            2: 0,
            3: 0,
            4: 0,
            5: 0,
            6: 0,
            7: 0,
            8: 0,
            9: 0,
          };
        console.log(global_counter);
        global_counter += 1;
        if (global_counter >= 5) {
          // if all cards open
          jQuery('.save_history').removeClass('hidden');

        }
      }
    }
  });

// reset
  jQuery('.btn_reset').on('click', function(event) {
    jQuery(this).addClass('hidden');

    
    jQuery('.marakata_sim').css('marginTop', '0px');
    jQuery('.marakata_sim_prot').addClass('marakata_sim_from');
    jQuery('.save_history').addClass('hidden');
    jQuery('.marakata_sim').removeClass('marakata_sim-active');
    jQuery('.marakata_sim-1').addClass('marakata_sim-active');
    global_counter = 0;
    elems_obj = {
      0: 0,
      1: 0,
      2: 0,
      3: 0,
      4: 0,
      5: 0,
      6: 0,
      7: 0,
      8: 0,
      9: 0,
    };
    jQuery('.marakata_sim_prot').removeClass('marakata_sim_pents marakata_sim_wands marakata_sim_cups marakata_sim_swords marakata_sim_pents marakata_sim_cups');
    history_item = {
      0: 0,
      1: 0,
      2: 0,
      3: 0,
      4: 0
    };
  });


  // local storage


  // upload history on DOM load
  history_update = function(){
    jQuery('.history_wrapper').empty();
    history_returned = JSON.parse(localStorage.getItem('history'));
    if (!history_returned) {
      history_returned = []; 
    }
    // console.log(history_returned);
    jQuery.each(history_returned,function(key, data) {
      jQuery('.history_wrapper').append('<div class="history_item row" data-item_num="'+key+'"><div class="history_item_date col-md-2">'+data['date']+'</div><div class="history_item_code col-md-2"><div class="history_item_code_1">'+data['0']+'</div><div class="history_item_code_2">'+data['1']+'</div><div class="history_item_code_3">'+data['2']+'</div><div class="history_item_code_4">'+data['3']+'</div><div class="history_item_code_dot">.</div><div class="history_item_code_5">'+data['4']+'</div></div><div class="history_item_name col-md-4">'+data['name']+'</div><div class="history_item_open col-md-1"><div class="open_history_item" data-toggle="modal" data-target="#history_item_modal" data-item_num_history="'+key+'"><span class="glyphicon glyphicon-eye-open"></span></div></div><div class="remove_history_item col-md-1" data-name="'+data['name']+'" data-item_num_history="'+key+'"><span class="glyphicon glyphicon-remove-circle"></div></div></div>')
    });
  }
  history_update();


  // remove history item
  jQuery('.history_wrapper').on('click', '.remove_history_item', function(event) {
    var delete_item_date = jQuery(this).data('name'),
        delete_item_index = jQuery(this).data('item_num_history');
    swal({
      title:"Уверены что хотите удалить этот рецепт?",
      text: "Рецепт от: ''"+delete_item_date+"'' будет удален",
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      allowOutsideClick: false,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Да, удалить!",
      cancelButtonText: "Нет"
    },
    function(isConfirm){
      var protocol = undefined;
      if (isConfirm) {
        swal("Рецепт удален!", "Рецепт от: ''"+delete_item_date+"'' удален из истории!", "success");
        jQuery('.history_wrapper').find(jQuery('[data-item_num =' +delete_item_index+ ']')).detach();
        history_returned.splice(delete_item_index, 1)
        localStorage.setItem('history', JSON.stringify(history_returned));
      } else {    
        
      } 
    });
  });


  // history block
  history_h = jQuery("html").height()-100;
  jQuery('.history_wrapper').css('height', history_h+'px');
  jQuery('.history').css('top', "-"+history_h+'px');


  jQuery('.user_history, .btn_history').on('click', function(event) {
    if (jQuery('.history').hasClass('history_visible')) {
      jQuery('.history').removeClass('history_visible');
    } else {
      jQuery('.history').addClass('history_visible');
      history_update();
    }
  });
  jQuery('.btn-back').on('click', function(event) {
    jQuery('.history').removeClass('history_visible');
    jQuery('.btn_start_elems').addClass('hidden');
  });
  jQuery('.history_close').on('click', function(event) {
    jQuery('.history').removeClass('history_visible');
  });


  // save history
  jQuery('.save_history').on('click', function(event) {
    swal({
      title:"Сохранить рецепт?",
      text: "Вы можете сохранить этот рецепт в истории. Для этого придумайте ему краткое название.",
      type: "input",
      inputPlaceholder: "Введите краткий заголовок в это поле.",
      showCancelButton: true,
      closeOnConfirm: false,
      allowOutsideClick: false,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Да",
      cancelButtonText: "Нет"
    }, function (inputValue) {
      if (inputValue === false) {
        return false;
      };
      if (inputValue === "") {
        swal.showInputError("Коротко озаглавьте рецепт!");
        return false
      }
      cur_date();
      history_item.date = hist_item_date;
      history_item.name = inputValue;
      jQuery('.save_history').addClass('hidden');
      console.log(history_item);
      history_returned.push(history_item);
      localStorage.setItem('history', JSON.stringify(history_returned));
      swal("Рецепт сохранен в истории!", "Название: '" + inputValue + "'", "success");
    });
  });

  setImgFromHistory = function(elem, type, position){
    cur_history_image = cur_history_item[position];
    if (type == 'swords') {
      elem.css('backgroundPositionY', img_position[cur_history_image]);
      jQuery('.marakata_modal_sim-dot').css('backgroundPositionY', '-354px');
    } else if (type == 'wands') {
      cur_history_image = cur_history_item[position]+10;
      elem.css('backgroundPositionY', img_position[cur_history_image]);
      jQuery('.marakata_modal_sim-dot').css('backgroundPositionY', '-177px');
    } else if (type == 'pents') {
      cur_history_image = cur_history_item[position]+20;
      elem.css('backgroundPositionY', img_position[cur_history_image]);
      jQuery('.marakata_modal_sim-dot').css('backgroundPositionY', '-534px');
    } else {
      cur_history_image = cur_history_item[position]+30;
      elem.css('backgroundPositionY', img_position[cur_history_image]);
      jQuery('.marakata_modal_sim-dot').css('backgroundPositionY', '-711px');
    }
  }

  // open history item
  jQuery('.history_wrapper').on('click', '.open_history_item', function(event) {
    cur_history_item = history_returned[jQuery(this).data('item_num_history')];
    
    setImgFromHistory(jQuery('.marakata_modal_sim-1'), cur_history_item.type, 0);
    setImgFromHistory(jQuery('.marakata_modal_sim-2'), cur_history_item.type, 1);
    setImgFromHistory(jQuery('.marakata_modal_sim-3'), cur_history_item.type, 2);
    setImgFromHistory(jQuery('.marakata_modal_sim-4'), cur_history_item.type, 3);
    setImgFromHistory(jQuery('.marakata_modal_sim-5'), cur_history_item.type, 4);
  
    jQuery('.history_item_modal_sub_title').text(cur_history_item.name)
    jQuery('.history_item_modal_code').text(cur_history_item['0']+' '+cur_history_item['1']+' '+cur_history_item['2']+' '+cur_history_item['3']+' . '+cur_history_item['4'])
    jQuery('.history_item_modal_date').text(cur_history_item.date)
  });

  // save as img
  jQuery('.save_img').on('click', function(event) {
    jQuery('.for_print').css('display', 'block');
    html2canvas(document.querySelector("#history_item_modal_content")).then(canvas => {
      document.body.appendChild(canvas)
      jQuery('.for_print').css('display', 'none');
      jQuery(canvas).attr('id', 'history_canvas');
      var c = document.getElementById("history_canvas");
      var d = c.toDataURL("image/png");
      var temp_elem = "<img src='"+d+"' alt='from canvas'/>";
      jQuery('.saved_img').attr('href', d);
      jQuery('.saved_img')[0].click();
    });
  });
  jQuery('.history_wrapper').on('click', '.history_item_open', function(event) {
    jQuery('.saved_img').attr('href', '')
    jQuery('#history_canvas').detach();
  });

// TODO

});

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


// draggable
jQuery( ".problem_range_card" ).draggable({
    snap: false,
    containment: '.problem_range',
    axis: "x",
    stop: function() {
      cur_window_width();
      if (jQuery('.master_problem_wrapper').hasClass('shadow')) {
        swal("Выберите режим", "Нажмите на соответствующую кнопку", "info");
      } else {
        jQuery('.master_cards_wrapper').removeClass('shadow hidden');
      }
    }
});

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
    jQuery('.master_cards_wrapper').removeClass('hidden');
    block_w = parseFloat(jQuery(".marakata_sim.marakata_sim_prot").css('width'));
    page_h = jQuery("html").width();
    jQuery('.marakata_sim-wrap').height(block_w * 1.8+'px');
    jQuery('.marakata_sim_prot, .marakata_dot').height(block_w * 1.8 * 10 +'px');
    if (page_h < 1150) {
      scroll_val = block_w * 1.79;
    } else {
      scroll_val = block_w * 1.8;
    }
    jQuery('.master_cards_wrapper').addClass('hidden');
  };

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
    } else {
      if ("type" in history_item) {
        
      } else {
        swal("Намерение или действие?", "Нажмите на соответствующую кнопку", "info");
      }
    }
  });

// reset
  jQuery('.btn_reset').on('click', function(event) {
    jQuery(this).addClass('hidden');
    jQuery('.master_problem_wrapper, .master_cards_wrapper').addClass('shadow hidden');
    jQuery('.problem_finish').text('?');
    jQuery('.problem_range').css('background', '#afb1b6');
    jQuery('.problem_range_card').removeClass('problem_range_card_d, problem_range_card_n');
    jQuery('.marakata_sim').css('marginTop', '0px');
    jQuery('.marakata_sim_prot').addClass('marakata_sim_from');
    jQuery('.btn_tarot_type').removeClass('active');
    jQuery('.save_history').addClass('hidden');
    jQuery('.marakata_sim').removeClass('marakata_sim-active');
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
    history_item = {
      0: 0,
      1: 0,
      2: 0,
      3: 0,
      4: 0
    };
  });

});

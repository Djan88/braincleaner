jQuery(document).ready(function () {
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
});

<div class="col-md-6" style="border-right: 1px solid #ddd; padding-top: 15px; padding-bottom: 15px;">
    <div class="emo_img emo_util">
        <h5>Утилизатор</h5>
        <div class="emo_pelena"></div>
        <img class="emo_lovushka" src="<?php bloginfo('template_url'); ?>/img/lovushka.png" alt="lovushka">
    </div>
</div>
<div class="col-md-6" style="padding-top: 15px; padding-bottom: 15px;">
    <div class="emo_img emo_usil">
        <h5>Усилитель</h5>
        <div class="emo_pelena"></div>
        <img class="emo_usilitel" src="<?php bloginfo('template_url'); ?>/img/usilitel.png" alt="usilitel">
    </div>
</div>
<script>
jQuery(document).ready(function() {
    var count_emo = 0;
    var emo_status;
    jQuery('.emo_util').on('click', function(event) {
        count_emo = 0;
        emo_status = 2;
        jQuery('.emo_usilitel').css('transform', 'rotate(0deg)');
        var counter_util = setInterval (function(){
            jQuery('.emo_lovushka').css('transform', 'rotate(-'+count_emo/2+'deg)');
            count_emo += 1;
            if(emo_status == 1) {
                clearInterval(counter_util);
                jQuery('.emo_lovushka').css('transform', 'rotate(0deg)');
            };
        }, 100);
    });
    jQuery('.emo_usil').on('click', function(event) {
        count_emo = 0;
        emo_status = 1;
        jQuery('.emo_lovushka').css('transform', 'rotate(0deg)');
        var counter_usil = setInterval (function(){
            jQuery('.emo_usilitel').css('transform', 'rotate('+count_emo/2+'deg)');
            count_emo += 1;
            if(emo_status == 2) {
                clearInterval(counter_usil);
                jQuery('.emo_usilitel').css('transform', 'rotate(0deg)');
            };
        }, 100);
    });
});

</script>

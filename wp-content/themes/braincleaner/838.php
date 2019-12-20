<?php if(is_user_logged_in()){ ?>
    <div class="row">
        <div class="col-xs-12 vspread_wrap">
          <div class="vspread">
            <img src="<?php bloginfo('template_url'); ?>/img/template_.jpg" alt="template">
            <img src="<?php bloginfo('template_url'); ?>/img/arrow_s.png" alt="arrow_s" class="vspread_zone_arrow vspread_zone_arrow_s">
            <img src="<?php bloginfo('template_url'); ?>/img/arrow_m.png" alt="arrow_m" class="vspread_zone_arrow vspread_zone_arrow_m">
            <img src="<?php bloginfo('template_url'); ?>/img/arrow_l.png" alt="arrow_l" class="vspread_zone_arrow vspread_zone_arrow_l">
            <div class="vspread_zone vspread_zone_V0">V0</div>
            <div class="vspread_zone vspread_zone_V1">V1</div>
            <div class="vspread_zone vspread_zone_V2">V2</div>
            <div class="vspread_zone vspread_zone_V3">V3</div>
            <div class="vspread_zone vspread_zone_V4">V4</div>
            <div class="vspread_zone vspread_zone_V5">V5</div>
            <div class="vspread_zone vspread_zone_V-">V-</div>

            <div class="vspread_zone vspread_zone_D2_up">D2</div>
            <div class="vspread_zone vspread_zone_D2">D2</div>
            <div class="vspread_zone vspread_zone_D3">D3</div>
            <div class="vspread_zone vspread_zone_D4">D4</div>
            <div class="vspread_zone vspread_zone_D5">D5</div>
            <div class="vspread_zone vspread_zone_D6">D6</div>
            <div class="vspread_zone vspread_zone_D7">D7</div>

            <div class="vspread_zone vspread_zone_S2_up">S2</div>
            <div class="vspread_zone vspread_zone_S2">S2</div>
            <div class="vspread_zone vspread_zone_S3">S3</div>
            <div class="vspread_zone vspread_zone_S4">S4</div>
            <div class="vspread_zone vspread_zone_S5">S5</div>
            <div class="vspread_zone vspread_zone_S6">S6</div>
            <div class="vspread_zone vspread_zone_S7">S7</div>
          </div>
        </div>
    </div>
<?php } else { ?>
    <div class="not_logged alert alert-danger">
      <b>Закрытый раздел!</b> "V-SPREAD" таблица доступна только пользователям прошедшим семинар "Терапевтическая дефрагментация актуальных и латентных психосоматических паттернов"
    </div>
<?php } ?>


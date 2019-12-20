<?php if(is_user_logged_in()){ ?>
    <div class="row">
        <div class="vspread col-xs-6 col-xs-offset-3">
          <img src="<?php bloginfo('template_url'); ?>/img/template_.jpg" alt="template">
        </div>
    </div>
<?php } else { ?>
    <div class="not_logged alert alert-danger">
      <b>Закрытый раздел!</b> "V-SPREAD" таблица доступна только пользователям прошедшим семинар "Терапевтическая дефрагментация актуальных и латентных психосоматических паттернов"
    </div>
<?php } ?>


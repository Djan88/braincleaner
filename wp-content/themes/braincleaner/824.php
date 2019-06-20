<?php if(is_user_logged_in()){ ?>
    <div class="row cards">
        <div class="btn btn-default btn-lg btn_magician active">Маг</div>
        <div class="btn btn-default btn-lg btn_strength">Сила</div>
    </div>
    <div class="row">
        <div class="invers col-md-8 col-md-offset-2 col-xs-12">
          <div class="invers_img invers_img_magician"></div>
          <div class="invers_img invers_img_strength hidden"></div>
          <div class="btn btn-default btn-lg btn_refresh hidden">Снова</div>
        </div>
    </div>
<?php } else { ?>
    <div class="not_logged alert alert-danger">
      <b>Закрытый раздел!</b> Инверсия доступна только пользователям прошедшим семинар "Терапевтическая дефрагментация актуальных и латентных психосоматических паттернов"
    </div>
<?php } ?>


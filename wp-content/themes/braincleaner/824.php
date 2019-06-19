<?php if(is_user_logged_in()){ ?>
    <div class="row">
        <div class="invers col-md-8 col-md-offset-2 col-xs-12">
          <div class="invers_img"></div>
          <div class="btn btn-default btn-lg btn_refresh hidden">Снова</div>
        </div>
    </div>
<?php } else { ?>
    <div class="screen">Инверсия доступна только зарегистрированным пользователям</div>
<?php } ?>


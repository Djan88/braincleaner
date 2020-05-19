    <div class="container-fluid home animsition">
      <div class="gear_wrap gear_wrap_1">
        <div class="gear gear_1"></div>
        <div class="gear gear_1_1"></div>
      </div>
      <div class="gear_wrap gear_wrap_2">
        <div class="gear gear_1"></div>
        <div class="gear gear_2"></div>
        <div class="gear gear_5"></div>
      </div>
      <div class="gear_wrap gear_wrap_3">
        <div class="gear gear_3"></div>
        <div class="gear gear_4"></div>
        <!-- <div class="gear gear_6"></div> -->
      </div>
      <div class="row">
        <div class="login-form animated bounceInDown">
          <div class="panel panel-primary" style="width: 450px;padding: 10px;margin: auto;">
            <div class="panel-heading">
              <h3 class="panel-title">Вход на сайт</h3>
            </div>
            <div class="panel-body">
              <?php 
                $args = array(
                  'echo' => true,
                  'redirect' => site_url( $_SERVER['REQUEST_URI'] ), 
                  'form_id' => 'loginform',
                  'label_username' => 'Логин',
                  'label_password' => 'Пароль',
                  'label_remember' => 'Запомнить меня',
                  'label_log_in' => 'Войти',
                  'id_username' => 'user_login',
                  'id_password' => 'user_pass',
                  'id_remember' => 'rememberme',
                  'id_submit' => 'wp-submit',
                  'remember' => true,
                  'value_username' => NULL,
                  'value_remember' => false
                );
              ?>
              <?php wp_login_form( $args );?>
            </div>
          </div>
        </div>
        <div class="login-btn hidden">
          <div class="btn btn-default login-in">Войти на сайт</div>
        </div>
      </div>
    </div>
    </div>

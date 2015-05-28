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
        <div class="col-xs-4 col-md-offset-4 login-form hidden">
          <div class="panel panel-primary" style="width: 450px;padding: 10px;margin: auto;">
            <div class="panel-heading">
              <h3 class="panel-title">Вход на сайт</h3>
            </div>
            <div class="panel-body">
              <form name="loginform" id="loginform" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post" class="form-horizontal user-in" role="form">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                  <div class="input-group input-group-lg">
                    <span class="input-group-addon">@</span>
                    <input type="text" name="log" id="user_login" class="input form-control" value="<?php echo esc_attr($user_login); ?>" size="20" />
                  </div>
                </div>
                <?php
                /**
                 * Fires following the 'Password' field in the login form.
                 *
                 * @since 2.1.0
                 */
                do_action( 'login_form' );
                ?>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                  <div class="input-group input-group-lg">
                    <span class="input-group-addon">*</span>
                    <input type="password" name="pwd" id="user_pass" class="input form-control" value="" size="20" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" <?php checked( $rememberme ); ?> /> <?php esc_attr_e('Remember Me'); ?></label>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <!-- <button type="submit" class="btn btn-default">Войти</button> -->
                    <!-- <a href="inside.html" class="btn btn-default">Войти</a> -->
                            <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-default" value="<?php esc_attr_e('Log In'); ?>" />
                    <?php   if ( $interim_login ) { ?>
                            <input type="hidden" name="interim-login" value="1" />
                    <?php   } else { ?>
                            <input type="hidden" name="redirect_to" value="/" />
                    <?php   } ?>
                    <?php   if ( $customize_login ) : ?>
                            <input type="hidden" name="customize-login" value="1" />
                    <?php   endif; ?>
                            <input type="hidden" name="testcookie" value="1" />
                            <a class="btn btn-default" href="category/defragmentaciya/" style="margin-left:10px;">Бесплатный доступ</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-xs-2 col-md-offset-5 login-btn">
          <div class="btn btn-default login-in">Войти на сайт</div>
        </div>
      </div>
    </div>
    </div>

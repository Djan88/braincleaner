<?php get_header(); ?>
  <?php if(is_front_page()) { ?>
    <?php if(is_user_logged_in()){ ?>
      <div class="container-fluid inside animsition">
        <div class="row menu-wrap">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
              <a class="navbar-brand" href="#">Меню</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <?php wp_nav_menu(array('menu' => 'Меню в шапке', 'container' => false, menu_class => 'nav navbar-nav' )); ?>
              <div class="pull-right" style="width: 31.5%;margin-top: 7px;">
                <div class="input-group">
                  <input type="text" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-default search" type="button">Поиск</button>
                  </span>
                </div><!-- /input-group -->
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="container main-zone">
            <div class="col-md-8">
              <h3>Видео материалы</h3>
              <div class="content-wrap">
                <div class="panel panel-default main_heading">
                  <h4 class="panel-heading"><span class="glyphicon glyphicon-film"></span> <a href="/">Биологическое центрирование, базовые уровни в клинике Чикурова</a> <span class="pull-right date-block">01.04.2015</span></h4>
                  <div class="panel-body">
                    <p>Небольшой блок для описания видео записи. Можно не заполнять</p>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/aKs8opb3U1A" frameborder="0" allowfullscreen></iframe>
                    <a href="/" class="button"></a>
                  </div>
                </div>
                <div class="panel panel-default main_heading">
                  <h4 class="panel-heading"><span class="glyphicon glyphicon-film"></span> <a href="/">Закрытый доклад в клинике по материалам экспедиции в Центральную и Южную Америку</a> <span class="pull-right date-block">21.06.2014</span></h4>
                  <div class="panel-body">
                    <p>Небольшой блок для описания видео записи. Можно не заполнять</p>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/09sxmilzzBc" frameborder="0" allowfullscreen></iframe>
                    <a href="/" class="button"></a>
                  </div>
                </div>
                <div class="panel panel-default main_heading">
                  <h4 class="panel-heading"><span class="glyphicon glyphicon-film"></span> <a href="/">Откуда берутся мысли и для чего нужны эмоции</a> <span class="pull-right date-block">02.05.2014</span></h4>
                  <div class="panel-body">
                    <p>Небольшой блок для описания видео записи. Можно не заполнять</p>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/LGO_CSrSuNg" frameborder="0" allowfullscreen></iframe>
                    <a href="/" class="button"></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 sidebar-zone">
              <div class="list-group">
                <div class="list-group-item active">
                  <h4 class="list-group-item-heading">Ближайшие семинары</h4>
                </div>
                <div class="list-group-item">
                  <a href="#"><h4 class="list-group-item-heading">Заголовок пункта списка группы 1</h4></a>
                  <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                </div>
                <div class="list-group-item">
                  <a href="#"><h4 class="list-group-item-heading">Заголовок пункта списка группы 2</h4></a>
                  <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                </div>
                <div class="list-group-item">
                  <a href="#"><h4 class="list-group-item-heading">Заголовок пункта списка группы 3</h4></a>
                  <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row footer-wrap">
          <div class="container">
            <div class="pull-left">
              <a href="/">Braincleaner</a> 2015
            </div>
            <div class="pull-right">
              <a href="mailto:info@defra.ru">info@braincleaner.ru</a>
            </div>
          </div>
        </div>
      </div>
    <?php } else { ?>
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
            <div class="col-md-3 col-md-offset-4 login-form hidden">
              <div class="panel panel-primary">
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
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-md-offset-4 login-btn" style="margin-top: 400px;margin-left: 900px;width: 500px;">
              <div class="btn btn-default login-in">Войти на сайт</div>
            </div>
          </div>
        </div>
        </div>
    <?php } ?>
  <?php } else { ?>
    <div class="container-fluid inside animsition">
      <div class="row menu-wrap">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="#">Меню</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php wp_nav_menu(array('menu' => 'Меню в шапке', 'container' => false, menu_class => 'nav navbar-nav' )); ?>
            <div class="pull-right" style="width: 31.5%;margin-top: 7px;">
              <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                  <button class="btn btn-default search" type="button">Поиск</button>
                </span>
              </div><!-- /input-group -->
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="container main-zone">
          <div class="col-md-8">
            <h3>Видео материалы</h3>
            <div class="content-wrap">
              <div class="panel panel-default main_heading">
                <h4 class="panel-heading"><span class="glyphicon glyphicon-film"></span> <a href="/">Биологическое центрирование, базовые уровни в клинике Чикурова</a> <span class="pull-right date-block">01.04.2015</span></h4>
                <div class="panel-body">
                  <p>Небольшой блок для описания видео записи. Можно не заполнять</p>
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/aKs8opb3U1A" frameborder="0" allowfullscreen></iframe>
                  <a href="/" class="button"></a>
                </div>
              </div>
              <div class="panel panel-default main_heading">
                <h4 class="panel-heading"><span class="glyphicon glyphicon-film"></span> <a href="/">Закрытый доклад в клинике по материалам экспедиции в Центральную и Южную Америку</a> <span class="pull-right date-block">21.06.2014</span></h4>
                <div class="panel-body">
                  <p>Небольшой блок для описания видео записи. Можно не заполнять</p>
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/09sxmilzzBc" frameborder="0" allowfullscreen></iframe>
                  <a href="/" class="button"></a>
                </div>
              </div>
              <div class="panel panel-default main_heading">
                <h4 class="panel-heading"><span class="glyphicon glyphicon-film"></span> <a href="/">Откуда берутся мысли и для чего нужны эмоции</a> <span class="pull-right date-block">02.05.2014</span></h4>
                <div class="panel-body">
                  <p>Небольшой блок для описания видео записи. Можно не заполнять</p>
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/LGO_CSrSuNg" frameborder="0" allowfullscreen></iframe>
                  <a href="/" class="button"></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 sidebar-zone">
            <div class="list-group">
              <div class="list-group-item active">
                <h4 class="list-group-item-heading">Ближайшие семинары</h4>
              </div>
              <div class="list-group-item">
                <a href="#"><h4 class="list-group-item-heading">Заголовок пункта списка группы 1</h4></a>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              </div>
              <div class="list-group-item">
                <a href="#"><h4 class="list-group-item-heading">Заголовок пункта списка группы 2</h4></a>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              </div>
              <div class="list-group-item">
                <a href="#"><h4 class="list-group-item-heading">Заголовок пункта списка группы 3</h4></a>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row footer-wrap">
        <div class="container">
          <div class="pull-left">
            <a href="/">Braincleaner</a> 2015
          </div>
          <div class="pull-right">
            <a href="mailto:info@defra.ru">info@braincleaner.ru</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
<?php get_footer(); ?>

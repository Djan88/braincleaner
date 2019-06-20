<?php get_header(); ?>
  <?php if(is_front_page()) { ?>
    <?php include(TEMPLATEPATH . '/home.php'); ?>
    <?php if(is_user_logged_in()){ ?>
        <script>
            window.location.href = "/category/defragmentaciya/";
        </script>
    <?php } ?>
  <?php } else { ?>
    <div class="container-fluid inside animsition <?php if(is_page(617)){?>class_617<?php } else if (is_page(659)) { ?>class_659<?php } ?>">
      <?php include(TEMPLATEPATH . '/head-part.php'); ?>
      <div class="row">
        <div class="container main-zone">
          <?php if (is_page(617)) { ?>
            <div class="col-md-12" style="min-height: 1200px;">
          <?php } else if (is_page(659)) { ?>
            <div class="col-md-12" style="min-height: 1200px;">
          <?php } else { ?>
            <div class="col-md-12">
          <?php } ?>
          <?php if(is_archive()) { ?>
            <?php include(TEMPLATEPATH . '/arch.php'); ?>
          <?php } else { ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <?php if(is_single() || is_page()) { ?>
                <h3><?php the_title(); ?></h3>
              <?php } else { ?>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php } ?>
              <div class="content-wrap">
                <div class="panel panel-default main_heading">
                  <?php if (is_page(617)) { ?>
                    <?php include(TEMPLATEPATH . '/617.php'); ?>
                  <?php } else if (is_page(659)) { ?>
                    <div class="clearfix">
                      <?php include(TEMPLATEPATH . '/659.php'); ?>
                    </div>
                  <?php } else if (is_page(820)) { ?>
                    <div class="clearfix">
                      <?php include(TEMPLATEPATH . '/820.php'); ?>
                    </div>
                  <?php } else if (is_page(824)) { ?>
                    <div class="clearfix">
                      <?php include(TEMPLATEPATH . '/824.php'); ?>
                    </div>
                  <?php } else { ?>
                    <div class="panel-body">
                    <?php if(in_category(3)) { ?>
                      <?php if ( is_user_logged_in() ) { ?>
                        <?php if( get_the_post_thumbnail()){ ?>
                          <div class="col-md-6 thumb-wrap">
                            <?php the_post_thumbnail( 'medium' ); ?>
                          </div>
                          <div class="col-md-6">
                        <?php } else { ?>
                          <div>
                        <?php } ?>
                          <?php if( get_field('knt')){ ?>
                            <p>
                              <?php
                              the_content(__('(more...)'));
                              wp_link_pages();
                              edit_post_link(__('Edit This'));
                              ?>
                            </p>
                            <a href="<?php the_field('knt')?>" download class="down down_knt" data-toggle="tooltip" data-placement="right" title="Скачать в формате Apple Keynote"></a>
                          <?php } ?>
                          <?php if( get_field('ppt')){ ?>
                            <a href="<?php the_field('ppt')?>" download class="down down_ppt" data-toggle="tooltip" data-placement="right" title="Скачать в формате Microsoft PowerPoint"></a>
                          <?php } ?>
                        </div>
                      <?php } else { ?>
                        <div class="not_logged alert alert-danger">
                          <b>Ошибка доступа!</b> Информация в этом разделе доступна только сертифицированным пользователям!
                        </div>
                      <?php } ?>
                    <?php } else if(in_category(5)) { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                          <div class="b-popup hidden">
                            <div class="controls">
                              <div class="btn-group animated hidden slideInUp">
                                <div class="row" style="padding-top: 5px;">
                                  <div class="btn-group btn-automatic" style="width: 245px;<?php if(get_field('terapy')) { ?>width: 345px;<?php } ?> margin: auto; display: block;">
                                    <button type="button" class="btn btn-default protocol_close jp-stop"><span class="glyphicon glyphicon-arrow-left"></span> Назад</button>
                                    <button type="button" class="btn btn-default protocol_stop jp-stop">Стоп <span class="glyphicon glyphicon-minus-sign"></span></button>
                                    <?php if(get_field('terapy')) { ?><button type="button" class="btn btn-default protocol_terapy">Терапия <span class="glyphicon glyphicon-plus"></span></button><?php } ?>
                                    <?php if(get_field('33_sec')) { ?>
                                      <button type="button" class="btn btn-default protocol_33 jp-play">Старт <span class="glyphicon glyphicon-off"></span></button>
                                    <?php } else { ?>
                                      <button type="button" class="btn btn-default protocol_start">Старт <span class="glyphicon glyphicon-off"></span></button>
                                    <?php } ?>
                                  </div>
                                  <div class="btn-group btn-manualic hidden" style="width: 350px;<?php if(get_field('terapy')) { ?>width: 450px;<?php } ?> margin: auto; display: block;">
                                    <button type="button" class="btn btn-default protocol_close"><span class="glyphicon glyphicon-arrow-left"></span> Назад</button>
                                    <?php if(get_field('terapy')) { ?><button type="button" class="btn btn-default protocol_terapy">Терапия <span class="glyphicon glyphicon-plus"></span></button><?php } ?>
                                    <button type="button" class="btn btn-default protocol_prev disabled"><span class="glyphicon glyphicon-chevron-left"></span> Предыдущий</button>
                                    <button type="button" class="btn btn-default protocol_next">Следующий <span class="glyphicon glyphicon-chevron-right"></span></button>
                                  </div>
                                </div>
                              </div>
                              <button type="button" class="btn btn-default menu-toggle"><span class="glyphicon glyphicon-align-justify"></span></button>
                            </div>
                            <div class="b-popup-content clearfix">
                              <div class="row">
                                <?php $defNum = 0 ?>
                                <?php if(get_field('images')): ?>
                                  <?php while(has_sub_field('images')): ?>
                                      <div class="col-md-8 col-md-offset-2 popup-img-wrap hidden" data-defNum="<?php echo $defNum; ?>" <?php if(get_sub_field('formula')) { ?> data-formula="true" <?php } ?> <?php if(get_sub_field('first_element')) { ?> data-first_element="true" <?php } ?>>
                                        <img src="<?php the_sub_field('image') ?>" alt=""> 
                                      </div>
                                      <?php $defNum += 1 ?>
                                  <?php endwhile; ?>
                                <?php endif; ?>
                              </div>
                              <div class="row" style="padding-top: 5px;">
                                <div class="btn-group btn-automatic" style="width: 245px;<?php if(get_field('terapy')) { ?>width: 345px;<?php } ?> margin: auto; display: block;">
                                  <button type="button" class="btn btn-default protocol_close jp-stop"><span class="glyphicon glyphicon-arrow-left"></span> Назад</button>
                                  <button type="button" class="btn btn-default protocol_stop jp-stop">Стоп <span class="glyphicon glyphicon-minus-sign"></span></button>
                                  <?php if(get_field('terapy')) { ?><button type="button" class="btn btn-default protocol_terapy">Терапия <span class="glyphicon glyphicon-plus"></span></button><?php } ?>
                                  <?php if(get_field('33_sec')) { ?>
                                    <button type="button" class="btn btn-default protocol_33 jp-play">Старт <span class="glyphicon glyphicon-off"></span></button>
                                  <?php } else { ?>
                                    <button type="button" class="btn btn-default protocol_start">Старт <span class="glyphicon glyphicon-off"></span></button>
                                  <?php } ?>
                                </div>
                                <div class="btn-group btn-manualic hidden" style="width: 350px;<?php if(get_field('terapy')) { ?>width: 450px;<?php } ?> margin: auto; display: block;">
                                  <button type="button" class="btn btn-default protocol_close"><span class="glyphicon glyphicon-arrow-left"></span> Назад</button>
                                  <?php if(get_field('terapy')) { ?><button type="button" class="btn btn-default protocol_terapy">Терапия <span class="glyphicon glyphicon-plus"></span></button><?php } ?>
                                  <button type="button" class="btn btn-default protocol_prev disabled"><span class="glyphicon glyphicon-chevron-left"></span> Предыдущий</button>
                                  <button type="button" class="btn btn-default protocol_next">Следующий <span class="glyphicon glyphicon-chevron-right"></span></button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php if( get_the_post_thumbnail()){ ?>
                          <div class="col-md-6 thumb-wrap" style="margin-bottom: 15px;">
                            <?php the_post_thumbnail( 'medium' ); ?>
                          </div>
                          <div class="col-md-6" style="text-align: justify;">
                        <?php } else { ?>
                          <div>
                        <?php } ?>
                            <p>
                              <?php
                              the_content(__('(more...)'));
                              wp_link_pages();
                              edit_post_link(__('Edit This'));
                              ?>
                            </p>
                        </div>
                        <div class="col-md-12">
                          <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                              <a href="/category/defragmentaciya/" class="btn btn-default btn-procedure" data-toggle="tooltip" title="К списку протоколов"><span class="glyphicon glyphicon-arrow-left"></span> Назад</a>
                            </div>
                            <?php $only_manual = get_field('only_manual'); ?>
                            <?php $only_auto = get_field('only_auto'); ?>
                            <?php if($only_manual != true) { ?>
                              <div class="btn-group">
                                <button type="button" class="btn btn-default btn-status btn-auto active btn-procedure" data-status="auto" data-toggle="tooltip" title="Провести процедуру в автоматическом режиме">Авто режим</button>
                              </div>
                            <?php } ?>
                            <?php if($only_auto != true) { ?>
                              <div class="btn-group">
                                <?php if(is_user_logged_in()) { ?> 
                                  <button type="button" class="btn btn-default btn-status btn-manual btn-procedure<?php if($only_manual == true) { ?> active <?php } ?>" data-status="manual" data-toggle="tooltip" title="Провести процедуру в режиме ручного управления">Ручное управление</button>
                                <?php } else { ?>
                                  <button type="button" class="btn btn-default disabled btn-status btn-manual btn-procedure" data-status="manual" data-toggle="tooltip" title="Доступно только сертифицированным пользователям">Ручное управление</button>
                                <?php } ?>
                              </div>
                            <?php } ?>
                            <div class="btn-group">
                            <button type="button" class="btn btn-warning btn-start btn-procedure" data-toggle="tooltip" title="Запуск процедуры">Начать процедуру <span class="glyphicon glyphicon-arrow-right"></span></button>
                            </div>
                          </div>
                        </div>
                      <?php } else { ?>
                        <?php if(!get_field('premium')) { ?>
                            <div class="b-popup hidden">
                              <div class="controls">
                                <div class="btn-group animated hidden slideInUp">
                                  <!-- <button type="button" class="btn btn-default">Левая</button> -->
                                  <!-- <button type="button" class="btn btn-default">Центр</button> -->
                                  <button type="button" class="btn btn-default protocol_close">Завершить <span class="glyphicon glyphicon-remove-circle"></span></button>
                                  <button type="button" class="btn btn-default protocol_stop jp-stop">Стоп <span class="glyphicon glyphicon-minus-sign"></span></button>
                                  <?php if(get_field('terapy')) { ?><button type="button" class="btn btn-default protocol_terapy">Терапия <span class="glyphicon glyphicon-plus"></span></button><?php } ?>
                                  <?php if(get_field('33_sec')) { ?>
                                    <button type="button" class="btn btn-default protocol_33 jp-play">Старт <span class="glyphicon glyphicon-off"></span></button>
                                  <?php } else { ?>
                                    <button type="button" class="btn btn-default protocol_start">Старт <span class="glyphicon glyphicon-off"></span></button>
                                  <?php } ?>
                                </div>
                                <button type="button" class="btn btn-default menu-toggle"><span class="glyphicon glyphicon-align-justify"></span></button>
                              </div>
                              <div class="b-popup-content clearfix">
                                <div class="row">
                                  <?php $defNum = 0 ?>
                                  <?php if(get_field('images')): ?>
                                    <?php while(has_sub_field('images')): ?>
                                        <div class="col-md-8 col-md-offset-2 popup-img-wrap hidden" data-defNum="<?php echo $defNum; ?>" <?php if(get_sub_field('formula')) { ?> data-formula="true" <?php } ?>>
                                          <img src="<?php the_sub_field('image') ?>" alt=""> 
                                        </div>
                                        <?php $defNum += 1 ?>
                                    <?php endwhile; ?>
                                  <?php endif; ?>
                                </div>
                                <div class="row" style="padding-top: 5px;">
                                  <div class="btn-group btn-automatic" style="width: 245px; margin: auto; display: block;">
                                    <button type="button" class="btn btn-default protocol_close jp-stop"><span class="glyphicon glyphicon-arrow-left"></span> Назад</button>
                                    <button type="button" class="btn btn-default protocol_stop jp-stop">Стоп <span class="glyphicon glyphicon-minus-sign"></span></button>
                                    <?php if(get_field('33_sec')) { ?>
                                      <div id="jquery_jplayer_1" class="jp-jplayer hidden"></div>
                                      <button type="button" class="btn btn-default protocol_33 jp-play">Старт <span class="glyphicon glyphicon-off"></span></button>
                                    <?php } else { ?>
                                      <button type="button" class="btn btn-default protocol_start">Старт <span class="glyphicon glyphicon-off"></span></button>
                                    <?php } ?>
                                  </div>
                                  <div class="btn-group btn-manualic hidden" style="width: 350px; margin: auto; display: block;">
                                    <button type="button" class="btn btn-default protocol_close"><span class="glyphicon glyphicon-arrow-left"></span> Назад</button>
                                    <button type="button" class="btn btn-default protocol_prev disabled"><span class="glyphicon glyphicon-chevron-left"></span> Предыдущий</button>
                                    <button type="button" class="btn btn-default protocol_next">Следующий <span class="glyphicon glyphicon-chevron-right"></span></button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php if( get_the_post_thumbnail()){ ?>
                            <div class="col-md-6 thumb-wrap" style="margin-bottom: 15px;">
                              <?php the_post_thumbnail( 'medium' ); ?>
                            </div>
                            <div class="col-md-6" style="text-align: justify;">
                          <?php } else { ?>
                            <div>
                          <?php } ?>
                              <p>
                                <?php
                                the_content(__('(more...)'));
                                wp_link_pages();
                                edit_post_link(__('Edit This'));
                                ?>
                              </p>
                          </div>
                          <div class="col-md-12">
                            <div class="btn-group btn-group-justified">
                              <div class="btn-group">
                                <a href="/category/defragmentaciya/" class="btn btn-default btn-procedure" data-toggle="tooltip" title="К списку протоколов"><span class="glyphicon glyphicon-arrow-left"></span> Назад</a>
                              </div>
                              <div class="btn-group">
                                <button type="button" class="btn btn-default btn-status btn-auto active btn-procedure" data-status="auto" data-toggle="tooltip" title="Провести процедуру в автоматическом режиме">Авто режим</button>
                              </div>
                              <div class="btn-group">
                              <?php if(is_user_logged_in()) { ?> 
                                <button type="button" class="btn btn-default btn-status btn-manual btn-procedure" data-status="manual" data-toggle="tooltip" title="Провести процедуру в режиме ручного управления">Ручное управление</button>
                              <?php } else { ?>
                                <button type="button" class="btn btn-default disabled btn-status btn-manual btn-procedure" data-status="manual" data-toggle="tooltip" title="Доступно только сертифицированным пользователям">Ручное управление</button>
                              <?php } ?>
                              </div>
                              <div class="btn-group">
                              <button type="button" class="btn btn-warning btn-start btn-procedure" data-toggle="tooltip" title="Запуск процедуры">Начать процедуру <span class="glyphicon glyphicon-arrow-right"></span></button>
                              </div>
                            </div>
                          </div>
                        <?php } else { ?>
                          <div class="not_logged alert alert-danger">
                            <b>Ошибка доступа!</b> Информация в этом разделе доступна только сертифицированным пользователям!
                          </div>
                        <?php } ?>
                      <?php } ?>
                    <?php } else { ?>
                      <?php
                      the_content(__('(more...)'));
                      wp_link_pages();
                      edit_post_link(__('Edit This'));
                      ?>
                    <?php } ?>
                    </div>
                  <?php } ?>
                </div>
              </div>
            <?php endwhile; else: ?>
              <?php _e('Sorry, no posts matched your criteria.'); ?>
            <?php endif; ?>
            <?php posts_nav_link(' &#8212; ', __('&laquo; Более новые '), __('Более старые &raquo;')); ?>
          <?php } ?>
          </div>
        </div>
      </div>
      <div class="row footer-wrap">
        <div class="container">
          <div class="pull-left">
            <a href="/">Braincleaner</a> 2019 v 1.3
          </div>
          <a class="logout" href="http://braincleaner.ru/wp-login.php?action=logout&_wpnonce=bc0c947e8d"><span class="glyphicon glyphicon-log-out"></span> Выход</a>
          <div class="pull-right">
            <a href="mailto:wizardmachine@yandex.ru">wizardmachine@yandex.ru</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
<?php get_footer(); ?>

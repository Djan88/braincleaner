<?php get_header(); ?>
  <?php if(is_front_page()) { ?>
    <?php include(TEMPLATEPATH . '/home.php'); ?>
  <?php } else { ?>
    <?php if(!is_front_page()) { ?>
      <?php if(!is_user_logged_in()){ ?>
              <script>
                  window.location.href = "/";
              </script>
          <?php } ?>
    <?php } ?>
    <div class="container-fluid inside animsition">
      <?php include(TEMPLATEPATH . '/head-part.php'); ?>
      <div class="row">
        <div class="container main-zone">
          <div class="col-md-8">
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
                  <div class="panel-body">
                  <?php if(in_category(3)) { ?>
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
                        <a href="<?php the_field('knt')?>" class="down down_knt" data-toggle="tooltip" data-placement="right" title="Скачать в формате Apple Keynote"></a>
                      <?php } ?>
                      <?php if( get_field('ppt')){ ?>
                        <a href="<?php the_field('ppt')?>" class="down down_ppt" data-toggle="tooltip" data-placement="right" title="Скачать в формате Microsoft PowerPoint"></a>
                      <?php } ?>
                    </div>
                  <?php } else if(in_category(5)) { ?>
                      <div class="b-popup hidden">
                        <div class="controls">
                          <div class="btn-group animated hidden slideInUp">
                            <button type="button" class="btn btn-default">Левая</button>
                            <button type="button" class="btn btn-default">Центр</button>
                            <button type="button" class="btn btn-default protocol_close">Завершить <span class="glyphicon glyphicon-remove-circle"></span></button>
                          </div>
                          <button type="button" class="btn btn-default menu-toggle"><span class="glyphicon glyphicon-align-justify"></span></button>
                        </div>
                        <div class="b-popup-content clearfix">
                          <div class="row">
                            <?php $defNum = 0 ?>
                            <?php if(get_field('images')): ?>
                              <?php while(has_sub_field('images')): ?>
                                  <div class="col-md-6 col-md-offset-3 popup-img-wrap hidden" data-defNum="<?php echo $defNum; ?>" <?php if(get_sub_field('formula')) { ?> data-formula="true" <?php } ?>>
                                    <img src="<?php the_sub_field('image') ?>" alt=""> 
                                  </div>
                                  <?php $defNum += 1 ?>
                              <?php endwhile; ?>
                            <?php endif; ?>
                          </div>
                          <div class="row" style="padding-top: 20px;">
                            <div class="btn-group" style="width: 245px; margin: auto; display: block;">
                              <button type="button" class="btn btn-default protocol_close"><span class="glyphicon glyphicon-arrow-left"></span> Назад</button>
                              <button type="button" class="btn btn-default protocol_stop">Стоп <span class="glyphicon glyphicon-minus-sign"></span></button>
                              <button type="button" class="btn btn-default protocol_start">Старт <span class="glyphicon glyphicon-record"></span></button>
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
                        <button type="button" class="btn btn-default btn-status btn-manual btn-procedure" data-status="manual" data-toggle="tooltip" title="Провести процедуру в режиме ручного управления">Ручное управление</button>
                        </div>
                        <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-start btn-procedure" data-toggle="tooltip" title="Запуск процедуры">К процедуре <span class="glyphicon glyphicon-arrow-right"></span></button>
                        </div>
                      </div>
                    </div>
                  <?php } else { ?>
                    <?php
                    the_content(__('(more...)'));
                    wp_link_pages();
                    edit_post_link(__('Edit This'));
                    ?>
                  <?php } ?>
                  </div>
                </div>
              </div>
            <?php endwhile; else: ?>
              <?php _e('Sorry, no posts matched your criteria.'); ?>
            <?php endif; ?>
            <?php posts_nav_link(' &#8212; ', __('&laquo; Более новые '), __('Более старые &raquo;')); ?>
          <?php } ?>
          </div>
          <?php include(TEMPLATEPATH . '/sidebar.php'); ?>
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

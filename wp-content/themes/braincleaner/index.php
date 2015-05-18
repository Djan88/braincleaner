<?php get_header(); ?>
  <?php if(is_front_page()) { ?>
    <?php include(TEMPLATEPATH . '/home.php'); ?>
  <?php } else { ?>
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
                      <div class="col-md-6">
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
                    <?php if( get_the_post_thumbnail()){ ?>
                      <div class="col-md-6">
                        <?php the_post_thumbnail( 'medium' ); ?>
                      </div>
                      <div class="col-md-6">
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
                        <a href="/category/defragmentaciya/" class="btn btn-default pull-left"><span class="glyphicon glyphicon-arrow-left"></span> Назад</button>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-status btn-auto">Автоматический режим</button>
                          <button type="button" class="btn btn-default btn-status btn-manual">Ручное управление</button>
                        </div>
                        <button type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-leaf"></span> Старт процедуры</button>
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

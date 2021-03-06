<?php if(!is_category(5)) { ?><h3><?php single_cat_title(); ?></h3><?php } ?>
<div class="col-md-12 panel panel-default cat_description">
  <!-- <span class="glyphicon glyphicon-arrow-down"></span><span class="glyphicon glyphicon-arrow-up"> -->
  </span><?php echo category_description( ); ?>
</div>
<div class="col-md-12 panel panel-default content-wrap clearfix">
    <?php if(is_category(3)){ ?>
      <?php if ( is_user_logged_in() ) { ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <div class="panel panel-default main_heading">
            <h4 class="panel-heading">
              <span class="glyphicon glyphicon-book"></span>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="pull-right date-block"><?php the_time('j M Y'); ?></span>
            </h4>
            <div class="panel-body">
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
            </div>
          </div>
        <?php endwhile; else: ?>
          <?php _e('Sorry, no posts matched your criteria.'); ?>
        <?php endif; ?>
        <?php posts_nav_link(' &#8212; ', __('&laquo; Более новые '), __('Более старые &raquo;')); ?>
      <?php } else { ?>
        <div class="not_logged alert alert-danger">
          <b>Ошибка доступа!</b> Информация в этом разделе доступна только сертифицированным пользователям!
        </div>
      <?php } ?>
    <?php } else if(is_category(5)){ ?>
        <h3 style="margin-top: 0;">Наши проекты</h3>
      <?php if ( is_user_logged_in() ) { ?>
        <?php $counter_blocks =0; ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php $counter_blocks += 1; ?>
          <?php if ($counter_blocks == 1) { ?>
            <div class="blocks_wrapper blocks_wrapper_one">
            <h4 class="blocks_heading">Продвинутый блок</h4>
            <div class="blocks_wrapper blocks_wrapper_two">
            <h4 class="blocks_heading">Средний блок</h4>
            <div class="blocks_wrapper blocks_wrapper_three">
            <h4 class="blocks_heading">Начальный блок</h4>
          <?php } ?>
          <div class="panel panel-default main_heading">
            <h4 class="panel-heading">
              <span class="glyphicon glyphicon-leaf"></span>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
            <div class="panel-body">
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
                <div class="defra_content">
                  <?php
                  the_content(__('(more...)'));
                  wp_link_pages();
                  edit_post_link(__('Edit This'));
                  ?>
                </div>
                <div class="defra_btns">
                  <a href="<?php the_permalink(); ?>" class="btn btn-default btn-lg btn-block center-block">Выбор режима</a>
                </div>
              </div>
            </div>
          </div>
          <?php if ($counter_blocks == 3) { ?>
            </div>
          <?php } else if ($counter_blocks == 6) { ?>
            </div>
          <?php } else if ($counter_blocks == 9) { ?>
            </div>
          <?php } ?>
        <?php endwhile; else: ?>
          <?php _e('Sorry, no posts matched your criteria.'); ?>
        <?php endif; ?>
        <?php posts_nav_link(' &#8212; ', __('&laquo; Более новые '), __('Более старые &raquo;')); ?>
      <?php } else { ?>
        <div class="not_logged">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php if(!get_field('premium')) { ?> 
              <div class="panel panel-default main_heading">
                <h4 class="panel-heading">
                  <span class="glyphicon glyphicon-leaf"></span>
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h4>
                <div class="panel-body">
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
                    <div class="defra_content">
                      <?php
                      the_content(__('(more...)'));
                      wp_link_pages();
                      edit_post_link(__('Edit This'));
                      ?>
                    </div>
                    <div class="defra_btns">
                      <a href="<?php the_permalink(); ?>" class="btn btn-default btn-lg btn-block center-block">Выбор режима</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          <?php endwhile; else: ?>
            <?php _e('Sorry, no posts matched your criteria.'); ?>
          <?php endif; ?>
          <?php posts_nav_link(' &#8212; ', __('&laquo; Более новые '), __('Более старые &raquo;')); ?>
        </div>
      <?php } ?>
      
    <?php } else { ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="panel panel-default main_heading">
          <h4 class="panel-heading">
              <span class="glyphicon glyphicon-film"></span>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="pull-right date-block"><?php the_time('j M Y'); ?></span>
          </h4>
          <div class="panel-body">
              <?php
              the_content(__('(more...)'));
              wp_link_pages();
              edit_post_link(__('Edit This'));
              ?>
          </div>
        </div>
      <?php endwhile; else: ?>
        <?php _e('Sorry, no posts matched your criteria.'); ?>
      <?php endif; ?>
      <?php posts_nav_link(' &#8212; ', __('&laquo; Более новые '), __('Более старые &raquo;')); ?>
    <?php } ?>
</div>

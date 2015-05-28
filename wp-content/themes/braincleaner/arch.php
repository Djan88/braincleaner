<?php if(is_user_logged_in()){ ?>
<h3><?php single_cat_title(); ?></h3>
<div class="col-md-12 panel panel-default cat_description">
  <!-- <span class="glyphicon glyphicon-arrow-down"></span><span class="glyphicon glyphicon-arrow-up"> -->
  </span><?php echo category_description( ); ?>
</div>
<div class="content-wrap clearfix">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if(is_category(3)){ ?>
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
    <?php } else if(is_category(5)){ ?>
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
    <?php } else { ?>
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
    <?php } ?>
  <?php endwhile; else: ?>
    <?php _e('Sorry, no posts matched your criteria.'); ?>
  <?php endif; ?>
  <?php posts_nav_link(' &#8212; ', __('&laquo; Более новые '), __('Более старые &raquo;')); ?>
</div>
<?php } ?>

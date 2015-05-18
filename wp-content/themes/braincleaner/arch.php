<h3><?php single_cat_title(); ?></h3>
<div class="content-wrap">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="panel panel-default main_heading">
      <h4 class="panel-heading">
        <?php if(is_category(2)) { ?>
          <span class="glyphicon glyphicon-film"></span>
        <?php } else if(is_category(3)) { ?>
          <span class="glyphicon glyphicon-book"></span>
        <?php } else if(is_category(5)) { ?>
          <span class="glyphicon glyphicon-leaf"></span>
        <?php } ?>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="pull-right date-block"><?php the_time('j M Y'); ?></span>
      </h4>
      <div class="panel-body">
        <?php if(is_category(3)||is_category(5)) { ?>
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
            <?php if(is_category(5)) { ?>
              <div class="defra_content">
                <?php
                the_content(__('(more...)'));
                wp_link_pages();
                edit_post_link(__('Edit This'));
                ?>
              </div>
              <div class="defra_btns">
                <a href="<?php the_permalink(); ?>" class="btn btn-default btn-lg btn-block center-block">Подробнее</a>
              </div>
            <?php } ?>
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
  <?php endwhile; else: ?>
    <?php _e('Sorry, no posts matched your criteria.'); ?>
  <?php endif; ?>
  <?php posts_nav_link(' &#8212; ', __('&laquo; Более новые '), __('Более старые &raquo;')); ?>
</div>
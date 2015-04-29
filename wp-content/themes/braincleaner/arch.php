<h3><?php single_cat_title(); ?></h3>
<div class="content-wrap">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="panel panel-default main_heading">
      <h4 class="panel-heading">
        <span class="glyphicon glyphicon-film"></span> 
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="pull-right date-block"><?php the_time('j F Y'); ?></span>
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
</div>

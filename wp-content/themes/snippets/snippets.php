<?php
/*
 * Template Name: Шаблон главной
 */
?>

<?php get_header(); ?>


<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <?php
        $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        $image = vt_resize(null, $url, 220, 220, true);
        if (!$image['url']) $image['url'] = 'http://placehold.it/220x220&text=NO IMAGE';
        ?>
        <?php the_title(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
<?php else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'news',
    'posts_per_page' => '3',
    'paged' => $paged
);

$the_query = new WP_Query($args);
?>

<?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

        <?php
        $url = wp_get_attachment_url(get_post_thumbnail_id($the_query->post->ID));
        $image = vt_resize(null, $url, 220, 220, true);
        if (!$image['url']) $image['url'] = 'http://placehold.it/220x220&text=NO IMAGE';
        ?>
        <?php echo $image['url']; ?>

        <?php the_title(); ?>
        <?php the_content('Читать далее...'); ?>

    <?php endwhile; ?>

    <?php wp_corenavi($the_query); ?>
    <?php wp_reset_postdata(); ?>
<?php else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
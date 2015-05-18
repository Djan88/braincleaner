<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/
/* Отключаем админ панель для всех, кроме администраторов. */


add_theme_support('post-thumbnails');

if (function_exists('add_theme_support')) {
 add_theme_support('menus');
}

function users_redirect(){
wp_redirect(site_url('/'));
die();
}

if(!current_user_can('manage_options')){
add_action('admin_init','users_redirect');
add_filter('login_redirect', 'users_redirect');
}

// Область виджетов на странице
    register_sidebar(array(
        'name' => __('Боковая панель'),
        'id' => 'arhive-widget-area',
        'description' => __('Виджеты в сайдбар'),
        'before_widget' => '<div class="list-group-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="list-group-item-heading"><a href="#">',
        'after_title' => '</a></h4>',
    ));

    function my_function_admin_bar($content) {
    	return ( current_user_can("administrator") ) ? $content : false;
    }
    add_filter( 'show_admin_bar' , 'my_function_admin_bar');
/* DON'T DELETE THIS CLOSING TAG */ ?>

<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/
/* Отключаем админ панель для всех, кроме администраторов. */
if (!current_user_can('administrator')):
  add_filter('show_admin_bar', '__return_false');
endif;

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

/* DON'T DELETE THIS CLOSING TAG */ ?>

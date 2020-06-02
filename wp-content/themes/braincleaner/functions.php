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

//fix for cookie error while login.
setcookie(TEST_COOKIE, 'WP Cookie check', 0, COOKIEPATH, COOKIE_DOMAIN); 
if ( SITECOOKIEPATH != COOKIEPATH ) 
setcookie(TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN);

function is_user_role( $role, $user_id = null ) {
  $user = is_numeric( $user_id ) ? get_userdata( $user_id ) : wp_get_current_user();

  if( ! $user )
    return false;

  return in_array( $role, (array) $user->roles );
}

// function users_redirect(){
// wp_redirect(site_url('/'));
// die();
// }

// if(!current_user_can('manage_options')){
// add_action('admin_init','users_redirect');
// add_filter('login_redirect', 'users_redirect');
// }

// Область виджетов на странице
register_sidebar(array(
    'name' => __('Боковая панель'),
    'id' => 'arhive-widget-area',
    'description' => __('Виджеты в сайдбар'),
    'before_widget' => '<div class="list-group-item">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="sidebar-heading list-group-item-heading">',
    'after_title' => '</h4>',
));



/* DON'T DELETE THIS CLOSING TAG */ ?>

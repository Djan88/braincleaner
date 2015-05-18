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

    function hide_admin_bar_settings() {
    ?>
    	<style type="text/css">
    		.show-admin-bar {
    			display: none;
    		}
    	</style>
    <?php
    }
     
    function disable_admin_bar() {
       if ( !current_user_can("administrator") ) {
          add_filter( 'show_admin_bar', '__return_false' );
          add_action( 'admin_print_scripts-profile.php', 
              'hide_admin_bar_settings' );
       }
    }
    add_action( 'init', 'disable_admin_bar' , 9 );
/* DON'T DELETE THIS CLOSING TAG */ ?>

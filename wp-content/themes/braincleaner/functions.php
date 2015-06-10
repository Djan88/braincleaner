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
        'before_title' => '<h4 class="sidebar-heading list-group-item-heading">',
        'after_title' => '</h4>',
    ));


// Функционал добавления пользователей
     function select_master(){
         global $wpdb;
         
         if($_POST['db']){
             
             $db = $_POST['db'];
             
             $masters = $wpdb->get_results("SELECT * FROM $db");
             
             $html = "<option value=''>Выбрать мастера</option>";
             
             foreach ($masters as $master){
                 
                 $html .= "<option value='$master->id'>$master->name</option>";
                 
             }
             
             die($html);
             
         }
         
         
     }
     
     add_action( 'wp_ajax_select_master', 'select_master' );
     
     function change_master(){
         global $wpdb;
         
         if($_POST['id']){
             
             $id = $_POST['id'];        
             $db = $_POST['db'];
             
             $master = $wpdb->get_results("SELECT * FROM $db WHERE id = $id");
                      
             die(json_encode($master[0]));
             
         }
              
     }
     
     add_action( 'wp_ajax_change_master', 'change_master' );
     
     function city_filter(){
         
         if($_POST['city']){
             
             $city = $_POST['city'];
             $user_id = $_POST['id'];
             
             $group_ids =  groups_get_user_groups( $user_id );
             $groups_id = array();

             foreach( $group_ids["groups"] as $id ) {

                $city_s = groups_get_groupmeta( $id, 'group_plus_header_fieldthree');
                
                if($city_s == $city){
                   $groups_id[] = $id; 
                }

             }
             
             $html = '';
             
             foreach ($groups_id as $group_id){
                              
                 $group = groups_get_group( array( 'group_id' => $group_id ) );
                 
                 $start = groups_get_groupmeta( $group_id, 'group_plus_header_fieldone');
                 $end = groups_get_groupmeta( $group_id, 'group_plus_header_fieldtwo');
                 $start_s = strtotime($start);
                 $end_s = strtotime($end);
                 $date = strtotime(date('Y-m-d'));
                 $seminar_start = rdate('d M, Y', $start_s);
                 $seminar_end = rdate('d M, Y', $end_s);
                 $descriptions = mb_substr($group->description, 0, 222);
                 $slug = $group->slug;
                 $name = $group->name;
                 $avatar = bp_core_fetch_avatar(array('object' => 'group', 'item_id' => $group_id ) );
                 $vedushi = bp_core_get_userlink($group->admins[0]->user_id);
                 if($group->admins[1]->user_id){
                     $vedushi .= ', '.bp_core_get_userlink($group->admins[1]->user_id);
                 }
                 
                 if($start_s > $date){
                 
                 $html .= "<li>
                                <div class='item-avatar'>
                                                <a href='http://chikurov.com/seminar/$slug'>$avatar</a>
                                </div>

                                <div class='item'>
                                            <div class='item-title'><a href='http://chikurov.com/seminar/$slug'>$name</a>
                                            </div>
                                            <span class='seminar-date'>Ведуший: $vedushi <span>|</span> $city <span>|</span> $seminar_start - $seminar_end</span>

                                        <div class='item-desc'>$descriptions</div>

                                </div>

                                <div class='clear'></div>
                            </li>";
                 
                 }
                 
             }
             
             die($html);
             
         }
         
     }
     
    add_action( 'wp_ajax_city_filter', 'city_filter' );
    add_action( 'wp_ajax_nopriv_city_filter', 'city_filter' );


    function rus2translit($string) {

        $converter = array(

            'а' => 'a',   'б' => 'b',   'в' => 'v',

            'г' => 'g',   'д' => 'd',   'е' => 'e',

            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',

            'и' => 'i',   'й' => 'y',   'к' => 'k',

            'л' => 'l',   'м' => 'm',   'н' => 'n',

            'о' => 'o',   'п' => 'p',   'р' => 'r',

            'с' => 's',   'т' => 't',   'у' => 'u',

            'ф' => 'f',   'х' => 'h',   'ц' => 'c',

            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',

            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',

            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            

            'А' => 'A',   'Б' => 'B',   'В' => 'V',

            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',

            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',

            'И' => 'I',   'Й' => 'Y',   'К' => 'K',

            'Л' => 'L',   'М' => 'M',   'Н' => 'N',

            'О' => 'O',   'П' => 'P',   'Р' => 'R',

            'С' => 'S',   'Т' => 'T',   'У' => 'U',

            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',

            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',

            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',

            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',

        );

        return strtr($string, $converter);

    }

    function str2url($str) {

        // переводим в транслит

        $str = rus2translit($str);

        // в нижний регистр

        $str = strtolower($str);

        // заменям все ненужное нам на "-"

        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);

        // удаляем начальные и конечные '-'

        $str = trim($str, "-");

        return $str;

    }


    function create_new_user(){
        global $wpdb;
        
        $masters = $wpdb->get_results("SELECT * FROM reestr_masters");
           
        foreach ($masters as $master){
            
            $user = get_user_by( 'email', $master->email );
            if( !$user ) {
                
                $username = str2url($master->name);
                $password = $username.'2014';
                $email = $master->email;
                
                $user_id = wp_create_user( $username, $password, $email );
                if( is_wp_error( $user_id ) ) {
       
                } else {
                    
                    xprofile_set_field_data(1, $user_id, $master->name);
                    if($master->options){
                        xprofile_set_field_data(6, $user_id, $master->options);
                        xprofile_set_field_data(7, $user_id, $master->options);
                    }
                    xprofile_set_field_data(8, $user_id, $master->email);
                    if($master->phone){
                        xprofile_set_field_data(9, $user_id, $master->phone);
                    }
                    if($master->skype){
                        xprofile_set_field_data(10, $user_id, $master->skype);
                    }
                    if($master->www){
                        xprofile_set_field_data(11, $user_id, $master->www);
                    }
                    if($master->vkontakte){
                        xprofile_set_field_data(12, $user_id, $master->vkontakte);
                    }
                    if($master->facebook){
                        xprofile_set_field_data(13, $user_id, $master->facebook);
                    }
                    if($master->country){
                        xprofile_set_field_data(16, $user_id, $master->country);
                    }
                    if($master->state){
                        xprofile_set_field_data(17, $user_id, $master->state);
                    }
                    
                    $headers[] = 'Content-type: text/html';
                    $headers[] = 'From: Чикуров Юрий Валентинович <info@bablosstudio.ru>';
                    
                    $message = "<p>Добрый день уважаемый(я) ".$master->name."! На сайте <a href='http://chikurov.com/'>Chikurov.com</a> для вас был создан аккаунт, где вы можете редактировать свою информацию!</p>";
                    $message .= "<ul><li>Логин: $username</li>";
                    $message .= "<li>Пароль: $password</li></ul>";
                    
                    wp_mail( $master->email, "Ваш акаунт на сайте Chikurov.com", $message, $headers);
                    
                }
                
            }
            
        }
        
        
    }

    function pc_get_userrole($user_id) {

        $user = new WP_User($user_id);

        $userclean = $user->roles[0];

        return $userclean;

    }

    function similar_seminar($master_id){
        global $wpdb;
        
        $seminars = $wpdb->get_results("SELECT * FROM wp_bp_groups WHERE creator_id = '$master_id'");
        
        return $seminars;
        
    }

    function status_pledge(){
        global $wpdb;
        
        if(isset($_POST['status']) && isset($_POST['id'])){
            
            $status = $_POST['status'];
            $id = $_POST['id'];
            
            $wpdb->update( 'wp_subscription',
                    array( 'status' => $status ),
                    array( 'id' => $id ),
                    array( '%d' ),
                    array( '%d' )
            );
            
        }
        
    }

    add_action( 'wp_ajax_status_pledge', 'status_pledge' );

    function get_subscriber_user(){
        global $bp;
        
        $masters = array();
        $i = 0;
        $masters['Российская Федерация']['Москва'][0]['name'] = '';
        
        if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) :
            
            while ( bp_members() ) : bp_the_member();
        
                $username = bp_get_member_user_login();
                $userinfo = get_userdatabylogin($username);

                if($userinfo->roles[0] == "subscriber" && $username !== 'admin'){
                    
                    $country = xprofile_get_field_data(16, bp_get_member_user_id());
                    $city = xprofile_get_field_data(17, bp_get_member_user_id());
                    $image_country = get_image_country(xprofile_get_field_data(16, bp_get_member_user_id()));
                    
                    $masters[$country][$city][$i]['name'] = bp_get_member_name();
                    $masters[$country][$city][$i]['avatar'] = bp_get_member_avatar('type=full&width=125&height=125');
                    $masters[$country][$city][$i]['link'] = bp_get_member_permalink();
                    $masters[$country][$city][$i]['vk'] = xprofile_get_field_data(12, bp_get_member_user_id());
                    $masters[$country][$city][$i]['f'] = xprofile_get_field_data(13, bp_get_member_user_id());
                    $masters[$country][$city][$i]['youtube'] = xprofile_get_field_data(14, bp_get_member_user_id());
                    $masters[$country][$city][$i]['email'] = xprofile_get_field_data(8, bp_get_member_user_id());
                    $masters[$country][$city][$i]['phone'] = xprofile_get_field_data(9, bp_get_member_user_id());
                    $masters[$country][$city][$i]['description'] = xprofile_get_field_data(6, bp_get_member_user_id());
                    $masters[$country][$city][$i]['skype'] = xprofile_get_field_data(10, bp_get_member_user_id());
                    $masters[$country][$city][$i]['www'] = xprofile_get_field_data(11, bp_get_member_user_id());
                    $masters[$country][$city][$i]['city'] = xprofile_get_field_data(17, bp_get_member_user_id());
                    $masters[$country][$city][$i]['country'] = xprofile_get_field_data(16, bp_get_member_user_id());
                    $masters[$country][$city][$i]['img_country'] = $image_country;
                    
                    $i++;
                }
        
            endwhile;
            
        endif;
        
        return $masters;
        
    }

    function get_subscriber_user_def(){
        global $bp;
        
        $masters = array();
        $i = 0;
        $masters['Российская Федерация']['Москва'][0]['name'] = '';
        
        if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) :
            
            while ( bp_members() ) : bp_the_member();
        
                $username = bp_get_member_user_login();
                $userinfo = get_userdatabylogin($username);
                $status = get_the_author_meta( 'user_status_master', bp_get_member_user_id() );

                if($status == 1){
                    
                    $country = xprofile_get_field_data(16, bp_get_member_user_id());
                    $city = xprofile_get_field_data(17, bp_get_member_user_id());
                    $image_country = get_image_country(xprofile_get_field_data(16, bp_get_member_user_id()));
                    
                    $masters[$country][$city][$i]['name'] = bp_get_member_name();
                    $masters[$country][$city][$i]['avatar'] = bp_get_member_avatar('type=full&width=125&height=125');
                    $masters[$country][$city][$i]['link'] = bp_get_member_permalink();
                    $masters[$country][$city][$i]['vk'] = xprofile_get_field_data(12, bp_get_member_user_id());
                    $masters[$country][$city][$i]['f'] = xprofile_get_field_data(13, bp_get_member_user_id());
                    $masters[$country][$city][$i]['youtube'] = xprofile_get_field_data(14, bp_get_member_user_id());
                    $masters[$country][$city][$i]['email'] = xprofile_get_field_data(8, bp_get_member_user_id());
                    $masters[$country][$city][$i]['phone'] = xprofile_get_field_data(9, bp_get_member_user_id());
                    $masters[$country][$city][$i]['description'] = xprofile_get_field_data(6, bp_get_member_user_id());
                    $masters[$country][$city][$i]['skype'] = xprofile_get_field_data(10, bp_get_member_user_id());
                    $masters[$country][$city][$i]['www'] = xprofile_get_field_data(11, bp_get_member_user_id());
                    $masters[$country][$city][$i]['city'] = xprofile_get_field_data(17, bp_get_member_user_id());
                    $masters[$country][$city][$i]['country'] = xprofile_get_field_data(16, bp_get_member_user_id());
                    $masters[$country][$city][$i]['img_country'] = $image_country;
                    
                    $i++;
                }
        
            endwhile;
            
        endif;
        
        return $masters;
        
    }

    function update_activ(){
        global $wpdb;
        
        $users = $wpdb->get_results("SELECT ID FROM wp_users");
        
    //    foreach ($users as $user){
    //        
    //        add_user_meta( $user->ID, 'last_activity', '2014-07-30 11:29:14' );
    //        
    //    }
        
        
    }

    add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
    wp_clear_scheduled_hook('wp_version_check');

    function get_master_to_role($role){

        global $bp;
        
        $masters = array();
        $i = 0;
        
        if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) :
            
            while ( bp_members() ) : bp_the_member();
        
                $username = bp_get_member_user_login();
                $userinfo = get_userdatabylogin($username);
        
                if($userinfo->roles[0] == $role || $userinfo->ID == 1){
                    
                    $masters[$i]['name'] = bp_get_member_name();
                    $masters[$i]['id'] = $userinfo->ID;
                    
                    $i++;
                }
        
            endwhile;
            
        endif;
        
        return $masters;
        
    }

    function author_seminars(){
        global $wpdb, $bp;
        
        if(isset($_POST['id']) && !empty($_POST['id'])){
            
            $master_id = $_POST['id'];
            
            $seminars = $wpdb->get_results("SELECT * FROM wp_bp_groups WHERE creator_id = '$master_id'");
            
            $name = xprofile_get_field_data(1, $master_id);
            
            $html = "<option value=''>Семинары $name</option>";
            
            foreach ($seminars as $seminar){
                $html .= "<option value='$seminar->id'>$seminar->name</option>";
            }
            
            die($html);
            
        } else {
            $seminars = $wpdb->get_results("SELECT * FROM wp_bp_groups");
                 
            $html = "<option value=''>Все семинары</option>";
            
            foreach ($seminars as $seminar){
                $html .= "<option value='$seminar->id'>$seminar->name</option>";
            }
            
            die($html);
        }
            
    }


/* DON'T DELETE THIS CLOSING TAG */ ?>

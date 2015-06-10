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
    add_action( 'admin_enqueue_scripts', 'wptutsplus_admin_styles' );

    add_action( 'admin_menu', 'add_reestr_masters' );

    function add_reestr_masters() {

        //create new top-level menu
        add_menu_page('Добавить мастера', 'Добавить мастера', 'administrator', 'add_masters', 'add_masters',plugins_url('/add.png'));
    }


    function add_masters() {
        global $wpdb;
        
        $data_country = $wpdb->get_results("SELECT DISTINCT country FROM reestr_masters");
        $data_state = $wpdb->get_results("SELECT DISTINCT state FROM reestr_masters");

        if($_POST['master_submit']){
            
            $db = $_POST['select_db'];
            
            $id = $_POST['master_id'];
            $name = $_POST['name'].' '.$_POST['last_name'].' '.$_POST['midle_name'];
            $options = $_POST['options'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $skype = $_POST['skype'];
            $www = $_POST['www'];
            $vk = $_POST['vkontakte'];
            $facebook = $_POST['facebook'];
            $country_db = $_POST['select_country'];
            $state_db = $_POST['select_state'];
            
            if(empty($id)){
                
                if($db == 'reestr_masters'){
            
                    $wpdb->insert(
                            $db,
                            array( 'name' => $name, 'options' => $options, 'phone' => $phone, 'email' => $email, 'www' => $www, 'skype' => $skype, 'vkontakte' => $vk, 'facebook' => $facebook, 'country' => $country_db, 'state' => $state_db ),
                            array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
                    );

                } elseif($db == 'wp_def_masters'){

                    $wpdb->insert(
                            $db,
                            array( 'name' => $name, 'email' => $email, 'phone' => $phone, 'skype' => $skype, 'www' => $www, 'vkontakte' => $vk, 'facebook' => $facebook, 'country' => $country_db, 'state' => $state_db, 'info' => $options ),
                            array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
                    );

                }
                
            } else {
                
                if($db == 'reestr_masters'){
            
                    $wpdb->update(
                            $db,                        
                            array( 'name' => $name, 'options' => $options, 'phone' => $phone, 'email' => $email, 'www' => $www, 'skype' => $skype, 'vkontakte' => $vk, 'facebook' => $facebook, 'country' => $country_db, 'state' => $state_db ),
                            array( 'id' => $id ),
                            array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' ),
                            array( '%d' )
                    );

                } elseif($db == 'wp_def_masters'){

                    $wpdb->update(
                            $db,
                            array( 'name' => $name, 'email' => $email, 'phone' => $phone, 'skype' => $skype, 'www' => $www, 'vkontakte' => $vk, 'facebook' => $facebook, 'country' => $country_db, 'state' => $state_db, 'info' => $options ),
                            array( 'id' => $id ),
                            array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' ),
                            array( '%d' )
                    );

                }
                
            }
            
        }
        
    ?>
    <div class="wrap add-master">
        <h2>Добавить мастера</h2>
        
        <form action="" name="add-master" method="post">
            
            <input type="hidden" name="master_id" id="master-id" value="">
            
            <select name="select_db" id="select-db">
                <option value="">Выбрать базу</option>
                <option value="reestr_masters">Мастера школы</option>
                <option value="wp_def_masters">Специалисты тер. деф.</option>
            </select>
            
            <select name="select_master" id="select-master">
                <option value="">База данных не выбрана</option>
            </select>
            
            <input type="text" name="name" id="name" value="" placeholder="Имя" />
            <input type="text" name="last_name" id="last-name" value="" placeholder="Фамилия" />
            <input type="text" name="midle_name" id="midle-name" value="" placeholder="Отчество" />
             
            <textarea name="options" id="option" cols="80" rows="10" placeholder="Специализация (только для мастеров школы)" ></textarea>
            
            <input type="text" name="email" id="email" value="" placeholder="E-mail" />
            <input type="text" name="phone" id="phone" value="" placeholder="Телефон" />
            <input type="text" name="skype" id="skype" value="" placeholder="Skype" />
            <input type="text" name="www" id="www" value="" placeholder="Адрес сайта" />
            
            <div>
                <input type="text" name="vkontakte" id="vkontakte" value="" placeholder="Вконтакте" />
                <input type="text" name="facebook" id="facebook" value="" placeholder="Facebook" />
                <select name="select_country" id="select-country">
                    <option value="">Выбрать страну</option>
                    <?php foreach ($data_country as $country){ ?>

                    <option value="<?php echo $country->country; ?>"><?php echo $country->country; ?></option>

                    <?php } ?>
                </select>
            
                <select name="select_state" id="select-state">
                    <option value="">Выбрать город</option>
                    <?php foreach ($data_state as $state){ ?>

                    <option value="<?php echo $state->state; ?>"><?php echo $state->state; ?></option>

                    <?php } ?>
                </select>
            </div>
            <input type="submit" name="master_submit" id="master-submit" value="Добавить">
            
        </form>

    </div>
    <?php }

    add_action('bp_setup_nav', 'mb_bp_profile_menu_posts', 301 );

    function mb_bp_profile_menu_posts() {
        global $bp;
        bp_core_new_nav_item(
                array(
                'name' => 'Приемные дни',
                'slug' => 'reception_days', 
                'position' => 90, 
                'default_subnav_slug' => 'reception', // We add this submenu item below 
                'screen_function' => 'mb_author_posts'
                )
        );
        
        bp_core_new_nav_item(
                array(
                'name' => 'Прошедшие семинары',
                'slug' => 'past_seminars', 
                'position' => 70, 
                'default_subnav_slug' => 'past', // We add this submenu item below 
                'screen_function' => 'past_seminars'
                )
        );
        
        bp_core_new_nav_item(
                array(
                'name' => 'Новости',
                'slug' => 'author_news', 
                'position' => 80, 
                'default_subnav_slug' => 'news', // We add this submenu item below 
                'screen_function' => 'author_news'
                )
        );
        
        bp_core_new_nav_item(
                array(
                'name' => 'Книги',
                'slug' => 'author_books', 
                'position' => 95, 
                'default_subnav_slug' => 'books', // We add this submenu item below 
                'screen_function' => 'author_books'
                )
        );
        
        bp_core_new_nav_item(
                array(
                'name' => 'Записавшиеся',
                'slug' => 'logged_seminar', 
                'position' => 100, 
                'default_subnav_slug' => 'logged', // We add this submenu item below 
                'screen_function' => 'logged_seminar'
                )
        );
        
    }

    function logged_seminar(){	
    	add_action( 'bp_template_content', 'show_logged_seminar' );
    	bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
    }

    function show_logged_seminar(){
        
        global $bp, $wpdb;
        
        $assistant = bp_core_get_user_displayname(bp_displayed_user_id());
        $subscriptions = $wpdb->get_results("SELECT * FROM wp_subscription WHERE seminar_assistant = '$assistant'");
        
        $seminars = $wpdb->get_results("SELECT DISTINCT name_seminar FROM wp_subscription WHERE seminar_assistant = '$assistant'");
        $city = $wpdb->get_results("SELECT DISTINCT sity_seminar FROM wp_subscription WHERE seminar_assistant = '$assistant'");
        $master = $wpdb->get_results("SELECT DISTINCT seminar_master FROM wp_subscription WHERE seminar_assistant = '$assistant'"); 
        
        if(isset($_POST['select_submit']) && (isset($_POST['select_seminar']) || isset($_POST['select_city']) || isset($_POST['select_master']))){
            
            $sql = 'WHERE';
            
            if(!empty($_POST['select_seminar'])){           
                $select_seminar = $_POST['select_seminar'];
                $sql .= " name_seminar = '$select_seminar'";
                if(!empty($_POST['select_city']) || !empty($_POST['select_master'])){
                    $sql .= " AND";
                }
            }
            
            if(!empty($_POST['select_city'])){           
                $select_city = $_POST['select_city'];
                $sql .= " sity_seminar = '$select_city'";
                if(!empty($_POST['select_master'])){
                    $sql .= " AND";
                }
            }
            
            if(!empty($_POST['select_master'])){           
                $select_master = $_POST['select_master'];
                $sql .= " seminar_master = '$select_master'";
            }
         
            $subscriptions = $wpdb->get_results("SELECT * FROM wp_subscription $sql AND seminar_assistant = '$assistant' ORDER BY id DESC");
            
        }
        
        ?>
    <div class="wrap search_clients">
        
        <?php if($subscriptions){ ?>
        
        <h3>Записи на семинары</h3>
        
        <form action="" name="select" method="post">
            
            <select name="select_seminar" style="width: 300px;">
                <option value="">Семинары</option>
                <?php foreach ($seminars as $seminar){ ?>
                    <?php if(!empty($_POST['select_seminar']) && $_POST['select_seminar'] == $seminar->name_seminar){ 
                        
                        $selected = 'selected="selected"';
                        
                    } else { $selected = ''; } ?>
                <option value="<?php echo $seminar->name_seminar; ?>" <?php echo $selected; ?>><?php echo $seminar->name_seminar; ?></option>
                <?php } ?>
            </select>
            
            <select name="select_master">
                <option value="">Мастер</option>
                <?php foreach ($master as $m){ ?>
                    <?php if(!empty($_POST['select_master']) && $_POST['select_master'] == $m->seminar_master){ 
                        
                        $selected = 'selected="selected"';
                        
                    } else { $selected = ''; } ?>
                        <option value="<?php echo $m->seminar_master; ?>" <?php echo $selected; ?>><?php echo $m->seminar_master; ?></option>
                <?php } ?>
            </select>
                   
            <select name="select_city">
                <option value="">Город</option>
                <?php foreach ($city as $c){ ?>
                    <?php if(!empty($_POST['select_city']) && $_POST['select_city'] == $c->sity_seminar){ 
                        
                        $selected = 'selected="selected"';
                        
                    } else { $selected = ''; } ?>
                    <option value="<?php echo $c->sity_seminar; ?>" <?php echo $selected; ?>><?php echo $c->sity_seminar; ?></option>
                <?php } ?>
            </select>
            
            <input type="submit" name="select_submit" value="Фильтр">
            
        </form>
        
        <form action="" method="post" name="form-table">

            <table>
                <thead>
                    <tr>
                        <td>Семинар</td>
                        <td>Ведущий</td>
                        <td>Дата проведения</td>
                        <td>Город</td>
                        <td>Имя</td>
                        <td>E-mail</td>
                        <td>Phone</td>
                        <td>Дата регистрации</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subscriptions as $subscription){ ?>
                    <tr>
                        <td><?php echo $subscription->name_seminar; ?></td>
                        <td><?php echo $subscription->seminar_master; ?></td>
                        <td><?php echo $subscription->date_seminar; ?></td>
                        <td><?php echo $subscription->sity_seminar; ?></td>
                        <td><?php echo $subscription->name; ?></td>
                        <td><?php echo $subscription->email; ?></td>
                        <td><?php echo $subscription->phone; ?></td>
                        <td><?php echo $subscription->date_registration; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </form>
        
        <?php } else{ ?>
        
        <p>У вас нет записей на семинары!</p>
        
        <?php } ?>
        
    </div>
        
    <?php }

    function author_books(){	
    	add_action( 'bp_template_content', 'show_author_books' );
    	bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
    }

    function show_author_books(){
        
        global $bp;
        
        $news = get_posts( array(
                'author'      => bp_displayed_user_id(),
                'orderby'     => 'date',
                'category'    => 150,
                'numberposts' => -1
        )); 
        
    //    echo '<pre>';
    //    var_dump($news);
    //    echo '</pre>';
        ?>
        
    <div id="groups-dir-list" class="groups dir-list">
        
        <ul id="groups-list" class="item-list" role="main">
            <?php foreach ($news as $new){ ?>
            <li>
                <div class="item-avatar">
                    <?php if(get_the_post_thumbnail($new->ID)){ ?>
                        <a href="<?php echo $new->guid; ?>"><?php echo get_the_post_thumbnail($new->ID, array(50,50)); ?></a>
                    <?php } else { ?>
                        <?php echo get_avatar( $new->post_author, 50 ); ?>
                    <?php } ?>
                </div>

                <div class="item">
                    <div class="item-title"><a href="<?php echo $new->guid; ?>"><?php echo $new->post_title; ?></a>
                    </div>
                    <span class="seminar-date">Автор: <a href=""><?php echo the_author_meta( 'display_name', $new->post_author );?></a></span>

                    <div class="item-desc"><?php echo mb_substr($new->post_content, 0,200); ?></div>

                </div>

                <div class="clear"></div>
            </li>
            <?php } ?>
        </ul>
        
    </div>
        
    <?php }

    function author_news(){	
    	add_action( 'bp_template_content', 'show_author_news' );
    	bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
    }

    function show_author_news(){
        global $bp;
        
        $news = get_posts( array(
                'author'      => bp_displayed_user_id(),
                'orderby'     => 'date',
                'category'    => 149,
                'numberposts' => 10
        )); 
        
    //    echo '<pre>';
    //    var_dump($news);
    //    echo '</pre>';
        ?>
        
    <div id="groups-dir-list" class="groups dir-list">
        
        <ul id="groups-list" class="item-list" role="main">
            <?php foreach ($news as $new){ ?>
            <li>
                <div class="item-avatar">
                    <?php if(get_the_post_thumbnail($new->ID)){ ?>
                        <a href="<?php echo $new->guid; ?>"><?php echo get_the_post_thumbnail($new->ID, array(50,50)); ?></a>
                    <?php } else { ?>
                        <?php echo get_avatar( $new->post_author, 50 ); ?>
                    <?php } ?>
                </div>

                <div class="item">
                    <div class="item-title"><a href="<?php echo $new->guid; ?>"><?php echo $new->post_title; ?></a>
                    </div>
                    <span class="seminar-date">Автор: <a href=""><?php echo the_author_meta( 'display_name', $new->post_author );?></a></span>

                    <div class="item-desc"><?php echo mb_substr($new->post_content, 0,200); ?></div>

                </div>

                <div class="clear"></div>
            </li>
            <?php } ?>
        </ul>
        
    </div>
        
    <?php }

    function past_seminars(){	
    	add_action( 'bp_template_content', 'show_past_seminars' );
    	bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
    }
    function show_past_seminars() { 
        global $bp; ?>
        
        <div id="groups-dir-list" class="groups dir-list">
                <?php do_action( 'bp_before_groups_loop' ); ?>

    <?php if ( bp_has_groups() ) : ?>

    	<?php do_action( 'bp_before_directory_groups_list' ); ?>

    	<ul id="groups-list" class="item-list" role="main">

    	<?php while ( bp_groups() ) : bp_the_group(); ?>
                
                <?php
                    $group = groups_get_group( array( 'group_id' => bp_get_group_id() ) );
                    
                    $date_end = strtotime(groups_get_groupmeta( bp_get_group_id(), 'group_plus_header_fieldtwo'));
                    
                    $date_now = date('Y-m-d');
                    $dateNow = strtotime($date_now);
                    if($date_end < $dateNow){
                    $date_end = rdate('d M, Y', $date_end);
                    $city = groups_get_groupmeta( bp_get_group_id(), 'group_plus_header_fieldthree');
                    $date = groups_get_groupmeta( bp_get_group_id(), 'group_plus_header_fieldone');
                    $min_date = strtotime($date);
                    $date_seminar = rdate('d M, Y', $min_date);
                    if(bp_displayed_user_id() == 0 || bp_displayed_user_id() == $group->admins[0]->user_id){
                ?>

    		<li <?php bp_group_class(); ?>>
    			<div class="item-avatar">
                                    <a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar( 'type=thumb&width=50&height=50' ); ?></a>
    			</div>

    			<div class="item">
                                <div class="item-title"><a href="<?php bp_group_permalink(); ?>"><?php bp_group_name(); ?></a>
                                </div>
                                <span class="seminar-date">Ведуший: <?php echo bp_core_get_userlink($group->admins[0]->user_id); if($group->admins[1]->user_id){ echo ', '.bp_core_get_userlink($group->admins[1]->user_id); } ?> <span>|</span> <?= $city; ?> <span>|</span> <?= $date_seminar; ?> - <?= $date_end; ?></span>

    				<div class="item-desc"><?php bp_group_description_excerpt(); ?></div>

    				<?php do_action( 'bp_directory_groups_item' ); ?>

    			</div>

    			<div class="clear"></div>
    		</li>

                    <?php } } endwhile; ?>

    	</ul>

    	<?php do_action( 'bp_after_directory_groups_list' ); ?>

    <?php else: ?>

    	<div id="message" class="info">
    		<p><?php _e( 'There were no groups found.', 'buddypress' ); ?></p>
    	</div>

    <?php endif; ?>

    <?php do_action( 'bp_after_groups_loop' ); ?>

        </div><!-- #groups-dir-list -->
        
    <?php }


    function mb_author_posts(){	
    	add_action( 'bp_template_content', 'mb_show_posts' );
    	bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
    }
    function mb_show_posts() { 
        global $bp;
        
        
        
    $posts = get_posts( array(
            'author'      => bp_displayed_user_id(),
            'orderby'     => 'date',
            'category'    => 152
    ));
        
        
        // проверяем передали ли нам месяц и год
    if (isset($_GET["ym"])) {

        $year = (int) substr($_GET["ym"], 0, 4);
        $month = (int) substr($_GET["ym"], 4, 2);
    } else { // иначе выводить текущие месяц и год
        $month = date("m", mktime(0, 0, 0, date('m'), 1, date('Y')));
        $year = date("Y", mktime(0, 0, 0, date('m'), 1, date('Y')));
    }

    $skip = date("w", mktime(0, 0, 0, $month, 1, $year)) - 1; // узнаем номер дня недели
    if ($skip < 0) {
        $skip = 6;
    }
    $daysInMonth = date("t", mktime(0, 0, 0, $month, 1, $year));       // узнаем число дней в месяце
    $calendar_head = '';    // обнуляем calendar head
    $calendar_body = '';    // обнуляем calendar boday
    $day = 1;       // для цикла далее будем увеличивать значение

    for ($i = 0; $i < 6; $i++) { // Внешний цикл для недель 6 с неполыми
        $calendar_body .= '<tr>';       // открываем тэг строки
        for ($j = 0; $j < 7; $j++) {      // Внутренний цикл для дней недели
            if (($skip > 0)or ( $day > $daysInMonth)) { // выводим пустые ячейки до 1 го дня ип после полного количства дней
                $calendar_body .= '<td class="none"> </td>';
                $skip--;
            } else {
                    
                if ($j == 6)     // если воскресенье то омечаем выходной
                    $calendar_body .= '<td class="holiday" id="' . $day . '">' . $day . '</td>';
                else {   // в противном случае просто выводим день в ячейке
                    if ((date(j) == $day) && (date(m) == $month) && (date(Y) == $year)) {//проверяем на текущий день
                        $calendar_body .= '<td class="today day day-active" id="' . $day . '">' . $day . '</td>';
                    } else {
                        $calendar_body .= '<td class="day" id="' . $day . '">' . $day . '</td>';
                    }
                }               
                 
                $day++; // увеличиваем $day
            }
        }
        $calendar_body .= '</tr>'; // закрываем тэг строки
    }

    // заголовок календаря
    $calendar_head = '
      <tr>          
            <th colspan="2"><a href="?ym=' . date("Ym", mktime(0, 0, 0, $month - 1, 1, $year)) . '">« Пред</a></th>
            <th colspan="3">' . rdate("M, Y", mktime(0, 0, 0, $month, 1, $year)) . '</th>
            <th colspan="2"><a href="?ym=' . date("Ym", mktime(0, 0, 0, $month + 1, 1, $year)) . '">След »</a></th>
      </tr>
      <tr>
        <th>Пн</th>
        <th>Вт</th>
        <th>Ср</th>
        <th>Чт</th>
        <th>Пт</th>
        <th>Сб</th>
        <th>Вс</th>
      </tr>';


    if($_POST['submit-subscribe']){
            
        $md5 = md5($_POST['subscribe-name'].$_POST['subscribe-email'].$_POST['subscribe-phone']);

        if($md5 == $_POST['bot_test']){

            $name = $_POST['subscribe-name'];
            $email = $_POST['subscribe-email'];
            $phone = $_POST['subscribe-phone'];
            $title = $_POST['priem-day'];

            $to = xprofile_get_field_data(8, bp_displayed_user_id());

            //$to .= ', info@bablosstudio.ru';

            send_email($to, $email, "Запись на $title", $name, $phone);

        }
                
    }

        ?>

        <div><a href="#" class="readon" id="subscribe-seminar" style="margin: 10px 20px;">Запись на прием</a></div>
        <div class="clear"></div>
        <div id="reception-day-form" class="seminar-subscribe-form">

            <form action="" method="post" name="form-subscribe">
                <input type="text" name="subscribe-name" id="subscribe-name" value="" placeholder="Имя" />
                <input type="text" name="subscribe-email" id="subscribe-email" value="" placeholder="E-mail" />
                <input type="text" name="subscribe-phone" id="subscribe-phone" value="" placeholder="Телефон" />
                <select name="priem-day">
                    <option value="">Выбрать приемный день</option>
                    <?php foreach ($posts as $post){ ?>

                    <option value="<?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></option>

                    <?php } ?>
                </select>
                <input type="hidden" name="bot_test" id="bot_test" value="">
                <input type="submit" name="submit-subscribe" id="submit-subscribe" value="Отправить" />
            </form>

        </div>
        
    <div class="calendar-wrap">
        <!-- таблица для вывода календаря -->
                <table id="calendar" border="1" cellspacing="0" cellpadding="5">
                        <thead>
                                <?php echo $calendar_head; ?>
                        </thead>
                        <tbody>
                                <?php echo $calendar_body; ?>
                        </tbody>
                </table>
                <!-- таблица для вывода календаря -->
               
                <input type="hidden" name="master_id" id="master-id" value="<?php echo bp_displayed_user_id(); ?>" />
                <input type="hidden" name="month_year" id="month-year" value="<?php echo rdate("M, Y", mktime(0, 0, 0, $month, 1, $year)); ?>" />
                <div id="reception_today">
                    <div class="wrap-name">Сегодняшний прием</div>
                    <?php                    

                        foreach ($posts as $post){
                                                  
                            $status = get_post_meta($post->ID, 'reception_status');
                            $today = strtotime(date('Y-m-d'));
                            $value = get_post_meta( $post->ID, 'reception_value');
                            $city = get_post_meta( $post->ID, 'reception_city');
                            
                            if(isset($status[0])){
                                
                                if($status[0] == 'date'){

                                    $reception_date = strtotime($value[0]);
                                    
                                    if($today == $reception_date){ ?>
                                        
                                       <article>                   

                                            <h4><a href="<?php echo $post->guid; ?>" title="" rel="bookmark"><?php echo $post->post_title; ?></a></h4>

                                            <span class="seminar-date">
                                                <a class="url fn n" href="" title="" rel="author"></a>
                                                <?php echo $city[0]; ?>
                                                <span>|</span>
                                                <?php 
                                                    $meta_values = get_post_meta( $post->ID, 'reception_date'); 
                                                    $date = strtotime($meta_values[0]);
                                                ?>
                                                 <?php echo rdate('d M, Y', $date); ?>
                                                <span>|</span>
                                                <a href="<?php echo $post->guid; ?>">Запись на прием</a>
                                            </span>

                                            <section class="summary">
                                                    <?php echo mb_substr($post->post_content, 0, 200); ?>
                                            </section>
                                            <a href='<?php echo $post->guid; ?>' class='readon' id='subscribe-seminar' style='float:right;margin: 10px 20px;'>Запись на прием</a>
                                        </article> 
                                        
                                    <?php }
                                    
                                } elseif($status[0] == 'monthly'){
                                    if($value[0] < date('Y-m-d')){
                                        $data = date_modify(strtotime($value[0]), '+1 months');
                                    } else {
                                        $data = strtotime($value[0]);
                                    }
                                    if($today == $data){
                                     ?>
                                        
                                       <article>                   

                                            <h4><a href="<?php echo $post->guid; ?>" title="" rel="bookmark"><?php echo $post->post_title; ?></a></h4>

                                            <span class="seminar-date">
                                                <a class="url fn n" href="" title="" rel="author"></a>
                                                <?php echo $city[0]; ?>
                                                <span>|</span>
                                                 <?php echo rdate('d M, Y'); ?>
                                                <span>|</span>
                                                <a href="<?php echo $post->guid; ?>">Запись на прием</a>
                                            </span>

                                            <section class="summary">
                                                    <?php echo mb_substr($post->post_content, 0, 200); ?>
                                            </section>
                                            <a href='<?php echo $post->guid; ?>' class='readon' id='subscribe-seminar' style='float:right;margin: 10px 20px;'>Запись на прием</a>
                                        </article> 
                                        
                                <?php } } elseif($status[0] == 'weekly'){
                                    
                                    if($value[0] == date('w')){ ?>
                                        
                                       <article>                   

                                            <h4><a href="<?php echo $post->guid; ?>" title="" rel="bookmark"><?php echo $post->post_title; ?></a></h4>

                                            <span class="seminar-date">
                                                <a class="url fn n" href="" title="" rel="author"></a>
                                                <?php echo $city[0]; ?>
                                                <span>|</span>
                                                 <?php echo rdate('d M, Y'); ?>
                                                <span>|</span>
                                                <a href="<?php echo $post->guid; ?>">Запись на прием</a>
                                            </span>

                                            <section class="summary">
                                                    <?php echo mb_substr($post->post_content, 0, 200); ?>
                                            </section>
                                            <a href='<?php echo $post->guid; ?>' class='readon' id='subscribe-seminar' style='float:right;margin: 10px 20px;'>Запись на прием</a>
                                        </article> 
                                        
                                    <?php }
                                    
                                } elseif($status[0] == 'all_weekly'){
                                    
                                    if(0 < date('w') && date('w') < 6){ ?>
                                        
                                       <article>                   

                                            <h4><a href="<?php echo $post->guid; ?>" title="" rel="bookmark"><?php echo $post->post_title; ?></a></h4>

                                            <span class="seminar-date">
                                                <a class="url fn n" href="" title="" rel="author"></a>
                                                <?php echo $city[0]; ?>
                                                <span>|</span>
                                                 <?php echo rdate('d M, Y'); ?>
                                                <span>|</span>
                                                <a href="<?php echo $post->guid; ?>">Запись на прием</a>
                                            </span>

                                            <section class="summary">
                                                    <?php echo mb_substr($post->post_content, 0, 200); ?>
                                            </section>
                                            <a href='<?php echo $post->guid; ?>' class='readon' id='subscribe-seminar' style='float:right;margin: 10px 20px;'>Запись на прием</a>
                                        </article> 
                                        
                                    <?php }
                                    
                                }
                                
                            }
                                                                          
                        }
                        
                    ?>
                </div>
    </div>

        <section id="gk-mainbody-reception">
            
            <div class="wrap-name">Приемные дни</div>
            
            <div class="wrap-reception-days">

                <?php query_posts( array('category_name'=>'reception_days', 'author' => bp_displayed_user_id(), 'showposts' => 10 ) ); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
                <?php
                    $today = strtotime(date('Y-m-d'));
                    $status = get_post_meta( get_the_ID(), 'reception_status');
                    $value = get_post_meta( get_the_ID(), 'reception_value');
                    $city = get_post_meta( get_the_ID(), 'reception_city');
                                    
                    if($status[0] == 'date'){ ?>
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', GKTPLNAME ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">

                                        <?php the_title(); ?>

                                </a></h4>

                                <span class="seminar-date">
                                    <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(sprintf(__('View all posts by %s', GKTPLNAME), get_the_author())); ?>" rel="author"><?php echo get_the_author(); ?></a> 
                                    <span>|</span>
                                     <?php echo rdate('d M, Y', strtotime($value[0])); ?> 
                                    <span>|</span>
                                     <?php echo $city[0]; ?>
                                </span>

                                <span id="thumb-days"><?php get_template_part( 'layouts/content.post.featured' ); ?></span>

                                    <?php if ( (!is_single() && get_option($tpl->name . '_readmore_on_frontpage', 'Y') == 'Y') || is_search() || is_archive() || is_tag() ) : ?>
                                    <section class="summary">
                                            <?php echo mb_substr(get_the_excerpt(), 0, 175).' ...'; ?>
                                    </section>
                                    <?php else : ?>
                                    <section class="content">
                                            <?php the_content( __( 'Read more', GKTPLNAME ) ); ?>

                                            <?php gk_post_fields(); ?>
                                            <?php gk_post_links(); ?>
                                    </section>
                                    <?php endif; ?>

                                    <?php get_template_part( 'layouts/content.post.footer' ); ?>
                            </article>
                        
                    <?php } elseif ($status[0] == 'weekly') { 
                                switch ($value[0]){
                                    case '0':
                                        $data = 'Каждое Воскресенье';
                                        break;
                                    case '1':
                                        $data = 'Каждый Понедельник';
                                        break;
                                    case '2':
                                        $data = 'Каждый Вторник';
                                        break;
                                    case '3':
                                        $data = 'Каждую Среду';
                                        break;
                                    case '4':
                                        $data = 'Каждый Четверг';
                                        break;
                                    case '5':
                                        $data = 'Каждую Пятницу';
                                        break;
                                    case '6':
                                        $data = 'Каждую Субботу';
                                        break;
                                } 
                        ?>
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', GKTPLNAME ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">

                                        <?php the_title(); ?>

                                </a></h4>

                                <span class="seminar-date">
                                    <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(sprintf(__('View all posts by %s', GKTPLNAME), get_the_author())); ?>" rel="author"><?php echo get_the_author(); ?></a> 
                                    <span>|</span>
                                     <?php echo $data; ?> 
                                    <span>|</span>
                                     <?php echo $city[0]; ?>
                                </span>

                                <span id="thumb-days"><?php get_template_part( 'layouts/content.post.featured' ); ?></span>

                                    <?php if ( (!is_single() && get_option($tpl->name . '_readmore_on_frontpage', 'Y') == 'Y') || is_search() || is_archive() || is_tag() ) : ?>
                                    <section class="summary">
                                            <?php echo mb_substr(get_the_excerpt(), 0, 175).' ...'; ?>
                                    </section>
                                    <?php else : ?>
                                    <section class="content">
                                            <?php the_content( __( 'Read more', GKTPLNAME ) ); ?>

                                            <?php gk_post_fields(); ?>
                                            <?php gk_post_links(); ?>
                                    </section>
                                    <?php endif; ?>

                                    <?php get_template_part( 'layouts/content.post.footer' ); ?>
                            </article>
                        
                    <?php } elseif ($status[0] == 'monthly') { 
                            if($value[0] < date('Y-m-d')){
                                $data = date_modify(strtotime($value[0]), '+1 months');
                                $data_update = date('Y-m-d', $data);
                                $data = rdate('d M, Y', $data);
                                update_post_meta(get_the_ID(), 'reception_value', $data_update);
                            } else {
                                $data = rdate('d M, Y', $value[0]);
                            }
                        ?>
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', GKTPLNAME ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">

                                        <?php the_title(); ?>

                                </a></h4>

                                <span class="seminar-date">
                                    <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(sprintf(__('View all posts by %s', GKTPLNAME), get_the_author())); ?>" rel="author"><?php echo get_the_author(); ?></a> 
                                    <span>|</span>
                                     <?php echo $data; ?> 
                                    <span>|</span>
                                     <?php echo $city[0]; ?>
                                </span>

                                <span id="thumb-days"><?php get_template_part( 'layouts/content.post.featured' ); ?></span>

                                    <?php if ( (!is_single() && get_option($tpl->name . '_readmore_on_frontpage', 'Y') == 'Y') || is_search() || is_archive() || is_tag() ) : ?>
                                    <section class="summary">
                                            <?php echo mb_substr(get_the_excerpt(), 0, 175).' ...'; ?>
                                    </section>
                                    <?php else : ?>
                                    <section class="content">
                                            <?php the_content( __( 'Read more', GKTPLNAME ) ); ?>

                                            <?php gk_post_fields(); ?>
                                            <?php gk_post_links(); ?>
                                    </section>
                                    <?php endif; ?>

                                    <?php get_template_part( 'layouts/content.post.footer' ); ?>
                            </article>
                        
                    <?php  } elseif ($status[0] == 'all_weekly') { ?>
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', GKTPLNAME ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">

                                        <?php the_title(); ?>

                                </a></h4>

                                <span class="seminar-date">
                                    <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(sprintf(__('View all posts by %s', GKTPLNAME), get_the_author())); ?>" rel="author"><?php echo get_the_author(); ?></a> 
                                    <span>|</span>
                                     Всю неделю 
                                    <span>|</span>
                                     <?php echo $city[0]; ?>
                                </span>

                                <span id="thumb-days"><?php get_template_part( 'layouts/content.post.featured' ); ?></span>

                                    <?php if ( (!is_single() && get_option($tpl->name . '_readmore_on_frontpage', 'Y') == 'Y') || is_search() || is_archive() || is_tag() ) : ?>
                                    <section class="summary">
                                            <?php echo mb_substr(get_the_excerpt(), 0, 175).' ...'; ?>
                                    </section>
                                    <?php else : ?>
                                    <section class="content">
                                            <?php the_content( __( 'Read more', GKTPLNAME ) ); ?>

                                            <?php gk_post_fields(); ?>
                                            <?php gk_post_links(); ?>
                                    </section>
                                    <?php endif; ?>

                                    <?php get_template_part( 'layouts/content.post.footer' ); ?>
                            </article>
                        
                    <?php } ?>
                
                <?php endwhile; endif; wp_reset_query(); ?>
            </div>
    		
        </section>
        
        <div class="clear"></div>
        
    <?php }

     function reception_day(){
         
         if($_POST['day']){
             
             $id = $_POST['id'];
             
             $posts = get_posts( array(
                    'author'      => $id,
                    'orderby'     => 'date',
                    'category'    => 152
            ));
             
            $day = $_POST['day']." ".$_POST['monthyear'];
            $date = strtotime(date('Y-m-'.$_POST['day']));
            $author_url = get_author_posts_url($id);
            $user = get_userdata( $id );
            $day_weekly = '';
             
            $html = "<div class='wrap-name'>Приемный день $day</div>";
            if(!empty($posts)){
                       
                foreach ($posts as $post){
                    
                    $status = get_post_meta( $post->ID, 'reception_status');
                    $value = get_post_meta( $post->ID, 'reception_value');
                    $city = get_post_meta( $post->ID, 'reception_city');
                    $excerpt = mb_substr($post->post_content, 0, 111);
                    
                    if($status[0] == 'date'){
                        
                        if($value[0] == $day){                       

                            $html .= "<article><h4><a href='$post->guid'>$post->post_title</a></h4>"
                                . "<span class='seminar-date'>
                                    <a class='url fn n' href='$author_url'>$user->display_name</a> 
                                    <span>|</span>
                                     $day 
                                    <span>|</span>
                                     $city[0]
                                    </span>"
                                . "<section class='summary'>$excerpt
                                </section><a href='$post->guid' class='readon' id='subscribe-seminar' style='float:right;margin: 10px 20px;'>Запись на прием</a>"
                                . "</article>";
                            
                        } 
                        
                    } elseif($status[0] == 'monthly'){
                        
                        if($value[0] < date('Y-m-d')){
                            $data = date_modify(strtotime($value[0]), '+1 months');
                            $data_update = date('Y-m-d', $data);
                            $data = rdate('d M, Y', $data);
                            update_post_meta($post->ID, 'reception_value', $data_update);
                        } else {
                            $data = $value[0];
                        }
                        
                        if($data == $day){                       

                            $html .= "<article><h4><a href='$post->guid'>$post->post_title</a></h4>"
                                . "<span class='seminar-date'>
                                    <a class='url fn n' href='$author_url'>$user->display_name</a> 
                                    <span>|</span>
                                     $day 
                                    <span>|</span>
                                     $city[0]
                                    </span>"
                                . "<section class='summary'>$excerpt
                                </section><a href='$post->guid' class='readon' id='subscribe-seminar' style='float:right;margin: 10px 20px;'>Запись на прием</a>"
                                . "</article>";
                            
                        } 
                        
                    } elseif($status[0] == 'weekly'){
                        
                        $day_weekly = date('w', $date);
                        
                        if($day_weekly == $value[0]){
                            
                            $html .= "<article><h4><a href='$post->guid'>$post->post_title</a></h4>"
                                . "<span class='seminar-date'>
                                    <a class='url fn n' href='$author_url'>$user->display_name</a> 
                                    <span>|</span>
                                     $day 
                                    <span>|</span>
                                     $city[0]
                                    </span>"
                                . "<section class='summary'>$excerpt
                                </section><a href='$post->guid' class='readon' id='subscribe-seminar' style='float:right;margin: 10px 20px;'>Запись на прием</a>"
                                . "</article>";
                            
                        } 
                        
                    } elseif($status[0] == 'all_weekly'){
                        
                        $day_weekly = date('w', $date);
                        
                        if($day_weekly > 0 && $day_weekly < 6){
                            
                            $html .= "<article><h4><a href='$post->guid'>$post->post_title</a></h4>"
                                . "<span class='seminar-date'>
                                    <a class='url fn n' href='$author_url'>$user->display_name</a> 
                                    <span>|</span>
                                     $day 
                                    <span>|</span>
                                     $city[0]
                                    </span>"
                                . "<section class='summary'>$excerpt
                                </section><a href='$post->guid' class='readon' id='subscribe-seminar' style='float:right;margin: 10px 20px;'>Запись на прием</a>"
                                . "</article>";
                            
                        } 
                        
                    }

                }
            
            } else {
            
            $html .= "<p>Приемные дни отсувствуют!</p>";
            
            }
            
            die($html);
             
         }
         
     }
     
    add_action( 'wp_ajax_reception_day', 'reception_day' );
    add_action( 'wp_ajax_nopriv_reception_day', 'reception_day' );
     
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


    add_action( 'wp_ajax_author_seminars', 'author_seminars' );

/* DON'T DELETE THIS CLOSING TAG */ ?>

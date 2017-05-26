<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'u0352628_brain');

/** Имя пользователя MySQL */
define('DB_USER', 'u0352628_default');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'wZ1h8!MC');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6608rkvCdLuU{QK|4[,(INiDYco?G.9W?3#vU6XRwdX~n.)2wDM//;W6k,9={wtD');
define('SECURE_AUTH_KEY',  's0Jxlb0%oK(SbV=I8q7Eb9GM%}h!2w!7{/tHzl/2`CsMY -SbZH$UN%`^P$-:v6`');
define('LOGGED_IN_KEY',    'roG@D1t,[e?2l>=8&WVnOY^]4KMG1t8==/.RimD}($o>}DV5In*F+}%f[aZ0~Fxs');
define('NONCE_KEY',        '-O+C2 yDBy|[0gb:Q!;P6s<l|S1[[nx2b.~h9M2chSd43&3YD*r[KV~+$oF8y[Z{');
define('AUTH_SALT',        ',?KaH^i#~GFP[L-f*HlMAPMv_K .%uI>NX$3)-8D_0&uTQ_GSy?Z&3FGOWe#_cj4');
define('SECURE_AUTH_SALT', 'n KMRFTfv.Ghob?u(5_G=b6ksCad[AN!Z5}`&|K@ZNdVI_oD?zw!t_z`W4kiE7|x');
define('LOGGED_IN_SALT',   'I#+!%Ffzr_b`P26)F<,9Bd~mZt-,,>a4-Ykv|(z8{obR+14SS_AuK.<|)H?I fDu');
define('NONCE_SALT',       'fpG!X-;5Gg|[.)U35i^oSP>VL}oXS6>$43&lYx+&D/0Hm_{TJ3W-!*}RecYDFh-t');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');


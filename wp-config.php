<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/wallrgb/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'wallrgb_hd_wallpaper');


/** MySQL database username */
define('DB_USER', 'wallrgb');


/** MySQL database password */
define('DB_PASSWORD', '8ei=P=s&qRbf');


/** MySQL hostname */
define('DB_HOST', 'localhost');


/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '_+ o|+ZV>^t{`7mq|{jQe^BQYVG_3fW7?GThg>:ke@uP{msWYn3[-fL9m{Ia1,+#');

define('SECURE_AUTH_KEY',  'Vi+fiCxW?hrDhf!A*-!a%ezROFe~En%]+x/;!|J{vN4Us~YbZc.ce|:CVa}@&P*-');

define('LOGGED_IN_KEY',    'HrQ7<-HA&gLzx{<7iuSbwZ-QE@y<mt{]SH7Meqf>[8Na>]:aMIt`|S^5,@2bCd8&');

define('NONCE_KEY',        'cm51y@abe?Xu>k~O?9M7>:52k.1H0Ec9Hv]YF0:#%}+{.DJ*hD]4vVhO4ew /MA?');

define('AUTH_SALT',        '56`i:x0&#eKC^1um@o.3z`i-)+HX5,I^?8=![NDGWaEj,(9){((]u}Qwk.p$s,.$');

define('SECURE_AUTH_SALT', 'L~n#l*?x|{7>r[YBV3n(!SjyIWa.z~qIBF7or7,#}H3p,[0*@g(!&#`(Zs3@&gNI');

define('LOGGED_IN_SALT',   'mQ+_}n&$ZbwE1qk(K-JE|rrmG4vPtzuu8y]QYO${?|VXJNO_`.L~De!.^r/|E3$y');

define('NONCE_SALT',       'R+OdtmKol7@tg#2~y+EG5:)RXU~3nfn`0<T^<x+=&!4)R;%+%]yCA-([5XR+yN9Y');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_a1b2c3456_';


/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

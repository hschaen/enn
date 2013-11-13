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
define('DB_NAME', 'enn1');

/** MySQL database username */
define('DB_USER', 'enn1');

/** MySQL database password */
define('DB_PASSWORD', 'EqualityNN123!');

/** MySQL hostname */
define('DB_HOST', 'enn1.db.10201940.hostedresource.com');

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
define('AUTH_KEY',         'a#l}-9fNwM|{wz|}6|OLs0b`w_I)G^12-fea|ce(K#X0w%]x5&A)SP%b.`pO*Y-d');
define('SECURE_AUTH_KEY',  'N?ac=F+7  l+yE]4WHlJ7:`UwFq-rbCA>5vLbQGshbe6JbgryaZi6.j  <-hTv_c');
define('LOGGED_IN_KEY',    'RO7XQOl34[?0#)8+CVxS_8Wk61]!)0My:NVH[t)N:|r7v61lgoR!B47BcL>e?=(8');
define('NONCE_KEY',        ']mF+xD i5Z>$/t5Lj,vg(<AJIXSOE,;%BS|u-Fco+Y5c:f/+$SF?,=(]v2H<p!(x');
define('AUTH_SALT',        'MB_[7|x&EvYqa7Tca$|T2AM zU<fR%:lfm#*ID|uqoAFJgT3F<M*Y?(l]~|*4?V|');
define('SECURE_AUTH_SALT', 'h<]w Y(+Wui;L].Oy5VBw`M2)FS`Mul=I.Wi@=PF{0z2SRqk3ibWaT1[w7r}iBO0');
define('LOGGED_IN_SALT',   'tE+%nAjw1oKwC/3}NeH@>N,&sMsTjHpG[<(tgAzOTzK$VB-rQUx+)& (_j!x3%7H');
define('NONCE_SALT',       '0l3pu^PWz:*(h{6kp#`H:$+..<Jvk8i|zyEm3DiYY]RD,XJICY:4=GUoh}5.wi!s');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

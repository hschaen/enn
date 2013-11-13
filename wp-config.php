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
define('DB_NAME', 'ennmain');

/** MySQL database username */
define('DB_USER', 'ennmain');

/** MySQL database password */
define('DB_PASSWORD', 'EqualityNN123!');

/** MySQL hostname */
define('DB_HOST', 'ennmain.db.10201940.hostedresource.com');

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
define('AUTH_KEY',         '-Y@ul$(N|<#E|+%HsVpD  -Qs`y- pYOrT{;]VyG}5wrmkp [sqPj6(^]e0:&h.U');
define('SECURE_AUTH_KEY',  '3lv9>p5~X+5Qm#OZNP37:Qrn`<^(jkBp1XQUs@[W<&Dpphq#bRjy-.gE?n+.Fi!+');
define('LOGGED_IN_KEY',    'W2lWrtXV|%n=[cv`HW:?V%;5Nzu7Y:]-s}Dr2RWJeUS_BL*#4Q0y+L.(=,(,G&j.');
define('NONCE_KEY',        '^S&_{c-J&C?/+%gwKFfKu^R<Y79a5x`|*k(n9T(  +wTyt#-`w+L-Y!(<hw=%e5a');
define('AUTH_SALT',        'rfNTB||kP3)3?^&u]-FU%)a=FsGK%Diy*qn6$r;%Ssh-.q.i?L6l;EoC*G72W{w0');
define('SECURE_AUTH_SALT', 'P%0htF5O-z`(Z:s= SaMQLY6{_Q$VV21q>))?DY_.-887&$P-zZsG@J(Xm:fe=-H');
define('LOGGED_IN_SALT',   'D1&;t,JA{-_EM1wlRIMBDP_y)u]g2N98ma<x)cI<+ZsUOK/vVqX^i@v6R?QQ:Wf0');
define('NONCE_SALT',       '3;fIvqsnv^5MloK?f!R:V[ic{fG>q6+6/=p*AT(?Rf-}*/ 8!LPamsovWMwi[|}s');

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

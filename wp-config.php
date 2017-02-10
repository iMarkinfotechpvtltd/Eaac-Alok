<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'db665478678');

/** MySQL database username */
define('DB_USER', 'dbo665478678');

/** MySQL database password */
define('DB_PASSWORD', 'im@rk123#@');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'RNyg0VX]gpD7nC]kLs4V$m(Y1gZ:9Yqj t#z/#=_x#U?7i3nA;ejej/uiTkDEA5b');
define('SECURE_AUTH_KEY',  '8NfYbW}Z1Q`1zk]yO,gTKtk.1v|Dno{fpb6G+n/6_yY@P d*d{S/F~=)X*F}-mr<');
define('LOGGED_IN_KEY',    'msdpj<vm;A{0H#rV%7)I8|dt]cw8]aud*bAQokm*?B/PjH`O3r]Z^ogo9<I%0ce_');
define('NONCE_KEY',        'G(N{0m%l+yKtqR+&1Y>c =m7N{?I;ckzi;ad3_562K=Y&P%Y}LDqtf/TQ3yixN>1');
define('AUTH_SALT',        '<MMx),EtqH_M&av[;7]O]4CHlALw?R!8eP;ZN|hS_`h  dXN_,)fLjd$uzgKJ7%%');
define('SECURE_AUTH_SALT', '+ ce!R712!]tr.?o8(E6}<juK-aLhkDTuDCU1MI|^1r%K1c0L`^sUHkci[gQNm;V');
define('LOGGED_IN_SALT',   '4:A9U,S>^5p/r+L6kXgs m^SQ@}{JT;j;BKQnJ$=!FJA[Pa>sy@J+N??R}*6dxQK');
define('NONCE_SALT',       'd<uRtlBee UKtluq+Of+lTj*6oP`:Npr_ TUw`=3UE_wtIu6tixM0$Pi=(EYG5}}');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'im_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

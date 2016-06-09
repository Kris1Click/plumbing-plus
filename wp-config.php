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
define('DB_NAME', 'plumbing');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'qZUxFAzu#wL^Z&Ck|U$S_0db7FGi87+6M^8rmYveV[y}K^WhGQc2?e]bN8),_X5V');
define('SECURE_AUTH_KEY',  'n_5JeR=2:QS}wDV9~96lG*Ua JjQ%g*hEiOpz-uR:[|=}]lE=q|rF7{n:%I!XTAx');
define('LOGGED_IN_KEY',    'P9+23e_xm?L&{i<?{3I9@bWND^vUbGb~#Utu0+n2;D>RRGQ3$Ms#ov&5D6R|K!.g');
define('NONCE_KEY',        '$Uh1drR0PtEqdX:_9bp;9]#uK)vG21Le&)X2M!i;(.s4&:$9W=tPc}w9U&0N95YM');
define('AUTH_SALT',        'K~ONpfj+pm2wkhP[wo357-!YG]x{XTY7nOh6C(/rup&FWG0pQRu*hmSG8o_$0qH`');
define('SECURE_AUTH_SALT', ')K$L3:){BfI:oDh OVQIS~[HpV>km+0zeTWxZesss<nd{AKM<O!wR7H.y,@09/qx');
define('LOGGED_IN_SALT',   '`5LG[:V$lLa~Z}c`!5s#59Mv]i<r>3,G  f`?2/|RiTvj!YS>*9g3O/Oa8gWh/>t');
define('NONCE_SALT',       'L*.erRtPUOl-xiX,R7O!,#tMiHyq[O[rt$j#^HOpV$F T>(^@ B*[eJE<,K_Ei*f');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

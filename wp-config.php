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
define('AUTH_KEY',         '3SV3rPPM Yjk~r3^,SK87*es8cpx()o5[%wOeX*e*-<sy[ $7VZ/=gB3Z4`vG3o3');
define('SECURE_AUTH_KEY',  'GJ6foS1=BSG =VVi(g0wDZF-*-J.&NSm$L~;2wKe8E`^qWS4MylRPI$SS11%/!)u');
define('LOGGED_IN_KEY',    'hXp2_bHotO$$)h(Ku9vFQX%GE0hXR=gBGI~Mh0H#/r<4vl6/kG.YHyGr[.ld*Tp,');
define('NONCE_KEY',        'Y{SMK40v5hW(T8t7]qYscSC|0:,1b/7gk17EJUPH.}x7{VxMxyQ}:E;Id.1eF#KK');
define('AUTH_SALT',        '>aeRV,R9#Y*js&-[_k@qk@DMF*gvm%SX|{6EC@F[MDe^G8>?Gq($&IX;1,Xv@{gM');
define('SECURE_AUTH_SALT', '3/Rngj~HQlg/lZ8a>+&1$+#v`I:.u|TIcapR/Y`G2^((-v<EG?j3):X[W#bibB^K');
define('LOGGED_IN_SALT',   '#F$O95SefUf!~f>PTn_lQ?r1U4?42V.Gz-AP{:d<8N}&+cv^RiX(y3ZW}J<tJ.-N');
define('NONCE_SALT',       '<*s-/@@Wb|o_$3^3B/jlvkt1P#y8!Ua3;R@.6t$JS^}8W;#]VNf%?B<e]1FQ L:d');

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

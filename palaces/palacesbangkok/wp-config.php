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
define('DB_NAME', 'palacesbangkok');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'tbd0110');

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
define('AUTH_KEY',         '_n_x29KyGo&OV4s-%)%!z2T$*0K@:iA,&iYs= |dr?6Mp.lM/UqF&cP`*bO>Vv#f');
define('SECURE_AUTH_KEY',  ' 2(fW0`9mvEat>Gv/|N,I~=p|Um1>X_=:qw]D3RA@N7;G=1 ADZS6?L)@DlCiw:Q');
define('LOGGED_IN_KEY',    'YEU.AW5~AgjWGj&3=VV>d|x Vk5r59jP2PEHF<nuJi4)EMU?/C{qjo{iC +lu>W4');
define('NONCE_KEY',        'uA=~*o9t=j<=pV3XK%r%J>bk4/fd2`,(1d5[A,?9EQ-V_f<;f`C*+GZV*  PF27v');
define('AUTH_SALT',        '~/yJkbA28MDO&nad%##z04A }3!%jzfQGSC3>_1%?#F6$$!pxW&)^MvcMH9aedLF');
define('SECURE_AUTH_SALT', ',tYG+%A9u*EHiK(?]7g7<<_)v]1gV=)mi[j[ngX6SEs_s{8-7`2z.ON5p96F2wZ_');
define('LOGGED_IN_SALT',   'I;Q52-)Ab>m$Gbdrh=H0uoAes+6db+7J!vt$<HJTx^1ogdQ_0a<x{tg~SU{T< Xh');
define('NONCE_SALT',       'XANFc3ap92T)~`wzic*[5iqCIDru8iiDb~T_a|M764;v(ke5]1Kp3U~k!D0>HXH]');

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

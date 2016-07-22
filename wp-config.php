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
define('DB_NAME', 'wp-nuci');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'spandy');

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
define('AUTH_KEY',         'k`y>nU=#Y8r>!90cn%>f=uz9lVY^iZ`>W#|/xBtP0yg]0R(U^W$?z`-Ni>FH;8is');
define('SECURE_AUTH_KEY',  'Frew ACCQ/LT^y-(I}Tk5}%&~0Pg^G)USvAXRs;w4*|b)x63),@IcamIPn`^V])m');
define('LOGGED_IN_KEY',    '=`Ji>z1,>j%&u7 S<?2pucRn5[:EAL@^ev4>mn+@8R<zm6xkz.4(XjH)1UR1mNWQ');
define('NONCE_KEY',        'u5 D{)=lE7HUM$Y1zLqh};eL|I+Bl0GXXaL8k W}iq9 @bpE`/D7-KsJ_A+kz%Gh');
define('AUTH_SALT',        'Y:oVIn~xxzyN!r N6%*:i]@]bP-9E_V7z6NaddojmKc]aeouOgy{=-$p(z<`[hw,');
define('SECURE_AUTH_SALT', '?.ZFjPi7&;o=fL$qeVv0T(0IGEqA<bsZ6mdi.<Q,]^Uru]@}]p.kBCK#cp@^s<w,');
define('LOGGED_IN_SALT',   '-:a*-[MzxGpJH*S= |O qDm6jPu_y9& VI6t4D7OyNB{@`6efvrZ74.1@TgJ|e^s');
define('NONCE_SALT',       'jsPls/<K3D=^Fo/=u`gc[7)1#ngNDIAdg|_knG7:yK^jNad8u>kM Oja).nV&[*r');

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
// define('SAVEQUERIES', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

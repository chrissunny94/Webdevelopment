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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'mossad');

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
define('AUTH_KEY',         ' 5l<2R-$aXPh0L|EO~[pfeM =xlp[%O*$OULJkEcdCymdtgMEZ9F~*KeXcDi4!:$');
define('SECURE_AUTH_KEY',  '($YT2W1bj$$3-J%23#Lw)h_cSvRzfR=ylNUoDmH.x/,]J_>q!A{j,*wha:;t,nV?');
define('LOGGED_IN_KEY',    'xwm/9<KWAo^HdqQ30*:OZS%zys!qlu((!-1lh7z7tSw72);/FYJNU>1.i+#eE8L]');
define('NONCE_KEY',        'E8#Xe8w^^_h2JuXiL:sk!{ua/{DNcpQ+eEZ(3);QO|IY#)v];$q/LA0@ O3c5N^z');
define('AUTH_SALT',        '+9@o-R8xQc[<hp/Y8XdzF8#i6t~+;QAnQoiFG#UIG&2d!gRV:N%gYw6J5nz&JZoR');
define('SECURE_AUTH_SALT', 'Iv.UXm7%4@X.pX Q3YG{y1@aM{Gl`2W%e<73+cRye]4=w58N%$~tyRj5t=~s%mDE');
define('LOGGED_IN_SALT',   '>N>8c5x:nrGP#C[)-$_8I:*k[YvH{C%_0tRTR[$VDYlG`KT/E}a?C>cmN&rUbSqb');
define('NONCE_SALT',       'cQoX3;<^uLBeq=TVo:a+cM%o&B?+@+ADv%b-fDK@S{5&(xLz~8s=n!%~Bi!3LUaj');

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


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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sbt_web' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'bR0.E@([_*;]3$ Ky>L:VLs&?S=IR$tw8nopnWt`6bE  ]#=&#)r[v-LL4XHV0O%' );
define( 'SECURE_AUTH_KEY',  '2L|P4,[BR%f}=T(LyGe_be_43Gr-vo*Le*d*Io`j+?,Nm<-YiPPp7 |jRwcw/0|5' );
define( 'LOGGED_IN_KEY',    '1?xqGp$G/*r+vggP!@%,VD3h tY8^VX)(b&0{n^},wBGDCh79(QJHV~}RIdgh7tR' );
define( 'NONCE_KEY',        '<+zp|L8dY:rQh,)^#>|CMX/,yw{i=QkJWh6|@lUs=yA!y m5QHWd1BIvz;VsvXql' );
define( 'AUTH_SALT',        'NpA[JA_E2vKEl`?Mw*3r9w07&96$Qb|NzdPn[E!LY9:aPO[ASQ!3X&p?0nj*NW`9' );
define( 'SECURE_AUTH_SALT', 'A5Iy4tSV4TvEH#X)is{dywEn@(At>30`#r M4mv|74wv DI:tB5hYrr:@BxsF+?L' );
define( 'LOGGED_IN_SALT',   'W#sh,#g1VzIfi{8MtTQt`8]= $MG#nAoLot[-xW (JS-),8x{iB`t7* ceaB!pp%' );
define( 'NONCE_SALT',       's)??cx*]L >nAeDTa02t(bJ;tQyXU)XDq8a7ee*}1gxv1/d@.2<?1;ym*kpVZ_;Z' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

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
define( 'DB_NAME', 'monsupercv' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'U>SBZ=LS5in.{L$B@D8a>=%Ec>V-ZL~:Gt}9(I.v3YUl>6OEYG<Wf&]{o!NK$,dd' );
define( 'SECURE_AUTH_KEY',  'ZaBdS)=>|NQE$+oLl`N5;HnsRy+4ikkz;-&hsnv@pT@3jRk9<;tN?A@ZxUb[:UJ5' );
define( 'LOGGED_IN_KEY',    'N,423~].[k1z^KJVdWTvD~Vlp8}J^<-c30t!4c,[$q3mrH<L%8;hi=3X_IS*:*sk' );
define( 'NONCE_KEY',        'uMRvFA:g p%p!Cj,AU(+fpkAPGa=+IrTv5Z:o#L[!Vm^IEy5PD5/e.hfyLdwJ3.J' );
define( 'AUTH_SALT',        'aP)I8X^C,iZ0>|=ILk,x*}P6TOSUd)FZl)?<MsTIiF(O bZ`0.U_)UW)^fEbkFr?' );
define( 'SECURE_AUTH_SALT', 'upAogll/$W7}HcM_]IdhzH]>+jA1x=y)J*?mc3Qb&!xByHSuiQtL3?c 0HdSa1)O' );
define( 'LOGGED_IN_SALT',   '^D8vM@2KZ%x5`7jzL&r-8hi[e{Z5h39>zLyC]@)qGH?2.<UuM~^K/KBF7R0c.VYT' );
define( 'NONCE_SALT',       'JQ`ri9fS_OQ.vni0X8~[$%p-2jp*Pj|U/dGb:*]qS4`iG3qNk[6p9#@*qx{ZFj93' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'lh_';

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

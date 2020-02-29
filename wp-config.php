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
define( 'DB_NAME', 'test' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         'd`,|-o;Vyq}sx6;m{X*LEB*TEd5Y,%Imk4+~&EI?XqnT-KUNhPxfJg}S==L^D$mU' );
define( 'SECURE_AUTH_KEY',  'beV/2ok2.8R`WC7CyORZaXceM+0zL=l{=.]CL7p5}#&V;q+~@*ifP{$T:-v>Lwju' );
define( 'LOGGED_IN_KEY',    '+E3~?92lLXBjoaEiC]l@jk^Hy0-Ztd3T,8Xj#~)Z*]gd{[~ F+w(+(!aeNqjwu9.' );
define( 'NONCE_KEY',        '4:H^])fsVa6MIva*|,W]om|t `9`Q.a)n6d=xFL5P2Z*-mi%6Lid5c>E}PnLLQBr' );
define( 'AUTH_SALT',        'nes;1vX1).tj|vp}=UW2+%JFfk7!5APNN6<Ok:{@*gxP`:v{T/~11dgcnGe|qbYl' );
define( 'SECURE_AUTH_SALT', '+GAqyFZUjL~X(nkFPEH/2t4{A;Tl9zN23Xl~*l+e!cq&~L8/&asL:{y@+r2G-CFE' );
define( 'LOGGED_IN_SALT',   'T[}5w*8,;M); [LhOZ)IV&a{LW4LJpd.8<K=^FH9QevxYOZ4gb2>#r`osy<,I{H=' );
define( 'NONCE_SALT',       'a{(3K|b*o`Czz@vJ4V@!t/@4_iQ%&j;BTcCb/;Au@f6]Z Q=l/$99DKXQi%gNKh:' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );
define('FS_METHOD', 'direct');
define('WPCF7_AUTOP', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

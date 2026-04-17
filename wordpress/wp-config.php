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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fredericapassos' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'wordpress' );

/** Database hostname */
define( 'DB_HOST', 'db' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Y}b0$4%@D&FkVm%qA<3H1&>B2$7v(n@^wY%V[t=8T_l>vP3pD1~c!jL*6C^nO+7' );
define( 'SECURE_AUTH_KEY',  'K#o8vR9eP$1L@bT+W6&H<N2>M*x%qA(z!F^yU5jC3=D7>kY$8I~pX_mO>0V[wE@' );
define( 'LOGGED_IN_KEY',    'fD^j6O>nL*7H!qR_vW@P$1T<pI&2V=3M+xE%wA8(yY#bC9~kU[0K>4F]5G_cZ!1' );
define( 'NONCE_KEY',        'P&1C_vD!8W>bK~qN[0x(H$6I*4Y@eM<jO^7F#3U%yA+zR=2L>9T]pG_wV#mE$5' );
define( 'AUTH_SALT',        'A*zR%2K<9P_vC^8H[0T#4D@wE!1Y>bX(mF$7O&jU=3I+qL*5W>yG~pM!6N]cV_' );
define( 'SECURE_AUTH_SALT', 'L_vP&1T<9C~qW@bP[0x*8I$4O^eH#6D>jR=2M%yU+zA!7Y>wF#3F!5G_mK]cV(2' );
define( 'LOGGED_IN_SALT',   'W@3K>9U_vA&1Y<qL[0p*8C$4R^eI#6N>jO=2T%yE+zV!7D>wM#5F!5G_mL]cH(z' );
define( 'NONCE_SALT',       'E%wF#3O>nC*7L!qA_vW@P$1K<pD&2R=3I+xT%wU8(yM#bY9~jS[0H>4V]5G_cZ!' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/* Add any custom values between this line and the "stop editing" line. */

// Disable file editing in admin
define( 'DISALLOW_FILE_EDIT', true );

// Enable WP Cron
define( 'DISABLE_WP_CRON', false );

// Custom upload directory
define( 'UPLOADS', 'wp-content/uploads' );

// Memory limit
define( 'WP_MEMORY_LIMIT', '256M' );
define( 'WP_MAX_MEMORY_LIMIT', '512M' );

// FTP settings (disabled for direct file operations)
define( 'FS_METHOD', 'direct' );
define( 'FS_CHMOD_DIR', 0755 );
define( 'FS_CHMOD_FILE', 0644 );

// Security headers
define( 'WP_CACHE', false );

// Custom content directory
define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content' );

// Plugin directory
define( 'WP_PLUGIN_DIR', dirname(__FILE__) . '/wp-content/plugins' );
define( 'WP_PLUGIN_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content/plugins' );

// Theme directory
define( 'WP_THEME_DIR', dirname(__FILE__) . '/wp-content/themes' );
define( 'WP_THEME_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content/themes' );

// Admin settings
define( 'WP_ADMIN_DIR', 'wp-admin' );
define( 'ADMIN_COOKIE_PATH', '/' );

// Multisite (disabled)
define( 'WP_ALLOW_MULTISITE', false );

// Automatic updates
define( 'WP_AUTO_UPDATE_CORE', true );

// File permissions
define( 'WP_TEMP_DIR', dirname(__FILE__) . '/wp-content/temp' );

// Custom login URL (optional - uncomment if needed)
// define( 'WP_LOGIN_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/login' );

// Force SSL for admin (optional - uncomment if using SSL)
// define( 'FORCE_SSL_ADMIN', true );

// Block external requests (optional - uncomment to allow only local requests)
// define( 'WP_HTTP_BLOCK_EXTERNAL', false );
// define( 'WP_ACCESSIBLE_HOSTS', '*.wordpress.org,*.github.com,api.wordpress.org' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
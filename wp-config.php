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
//define('WP_CACHE', true); //Added by WP-Cache Manager
//define( 'WPCACHEHOME', '/home/bc254240/promate.loc/www/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'promate_new');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'Js8Vyjl7gHsW!07vBt@EG#!EFNgUJIPoLorDTg6Er^wltzNu1gvdF(Fb8J(MBHjO');
define('SECURE_AUTH_KEY',  'DCWK(5RgAM*gfVRBgJVSVCXhUP1sbc82f%KCnhoGrH)XB)cQ&tsy9&dqkN!*ubH4');
define('LOGGED_IN_KEY',    'RCKSLiu#NztUO!I9td2gFce2LdgVV&2vBQ!zO(SC97BvWx!2iYezEfbiVSH!TWdU');
define('NONCE_KEY',        'wWQ5(Z2lNoas6djugOBb5%%XwMddvM5esmMSnPVxS5SPM^46q8yWufyj2OJ4TOlD');
define('AUTH_SALT',        '9#a(HrqBycjzZA4UGHsu^v5&VGBUE)H*%Y!yG9yW&Ys1yFjbjzCzay(PmRNmXPoM');
define('SECURE_AUTH_SALT', '!KiB5FtN0z)%gIf#bnGJLxL2I!(Li5Ps*fa363!wAwE1MxYtq5DKpzE339HpJJO6');
define('LOGGED_IN_SALT',   'tv4a&EE&p1oLfIWKZDI3qNOxELyNeXkeRaRhyawtNjBT^cVH((UgY4(rYsf!mSDX');
define('NONCE_SALT',       'Ysc%(%Pf%9nr#BeM%z*qJm(CTb7f(0CEILBeQibSdKwIhMVXOjExPqgzWaGGDUu@');
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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
?>
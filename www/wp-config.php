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
define('DB_NAME', 'industry_khcentr');

/** MySQL database username */
define('DB_USER', 'industry_khcentr');

/** MySQL database password */
define('DB_PASSWORD', '5p1p3hb9');

/** MySQL hostname */
define('DB_HOST', 'industry.mysql.ukraine.com.ua');

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
define('AUTH_KEY',         '-E6]u~#(RbFk@[y0R)iU8-EjNSZ!x/@8_<CYzensI9&Al|+ut7=6OWDXAXwWV@CD');
define('SECURE_AUTH_KEY',  'DXPiI<Z-Q$-@M!$&kz$M}g3GI8]g8`@{:6#8^c/#)0D+WX]Rbko}Kjhu#tKB!|:(');
define('LOGGED_IN_KEY',    'ic15h?A6s1zRDWu;95;,DVd,)Kqb^}>AEl-UI@L*JSeHP[x%&C(Nh:_4zOCiK,T>');
define('NONCE_KEY',        'Q~+A/JU[}kY9K &m Yp-Hz[DFcD@d^6)L(zqL5Eeu59$5+OO>ZbDXR:h`ebbHl=`');
define('AUTH_SALT',        '/rLz^O,lwTdVs`w{#ffZ]%I3M}4;YAcmr:Yw7kNOX|%n(ayuZ>@Cv><ACQ{R8{8P');
define('SECURE_AUTH_SALT', 'm;uWO6QFb]bnQFe$3y_kMZ&y=H{xI~61;``hYdZ5lRdGuneNN}8JH@M:jj:>uIC_');
define('LOGGED_IN_SALT',   'uYbvl}6.3QYps|,UYvJO<GIWh}?zb0T^Q,?4=7)aSC`s[W-_LGT -UtT8IWw!VCw');
define('NONCE_SALT',       'D4XCncdLM#.I*fIJ2#[A2,;ayBozpUEoW}e;<?(~B*C(*`fi`()eZ-T0Jj0)+d0o');

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

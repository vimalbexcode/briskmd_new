<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_dev_briskmd_new' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'lXfl;RT>@KaU[;x6Z2ke@KoOTkQPJp_XNa,cEb5;?a]/eWOwPI.^DeT@WpXZ$+K.' );
define( 'SECURE_AUTH_KEY',  '5?t!eK;8q*N)AfgsrYdT0_,n,A~:9b(VpG8Ueg_W]y0XH@08{%PJKGHRh?E!8= o' );
define( 'LOGGED_IN_KEY',    'SP.(PuX=!.WGj#9f8r0Fw#W[W#m(ePV#`F*vh{:_lL?@(0lbnnX#;^<Xe7(`>zJs' );
define( 'NONCE_KEY',        'i#5@)Fo;YDiook$<l<r{/,Ti7XFSW4zz^kNy>fc}(kqs?d9h~+OsXhz``ExJ~@#u' );
define( 'AUTH_SALT',        'NU$.@%HiPs]rQKf-_Ii.$GG{dgR^L<_!`]7b[b[lx12eV5rtj]2:ll@k3[/4M2>l' );
define( 'SECURE_AUTH_SALT', '/kBhG$,KTmz{ e]-DZ2Yn`EmG*`4ibz(q_A*)P]DdwFnO**yD5yZ<wQkW?-BB23b' );
define( 'LOGGED_IN_SALT',   '( /=xf(bp> ^9=2fDFN8^!3l#H*AVRDg?jVCWbyKhbN67 EPZY)L!$z?7iJ{^-+C' );
define( 'NONCE_SALT',       '`dMS{)oC^3tCz!nX4|Z+7L7aDfs4u6u[#Pii#JlhBahx2@Hp4.U,{#?L9$$n,v|A' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

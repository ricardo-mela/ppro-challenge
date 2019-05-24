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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'rootuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'rootpasswd' );

/** MySQL hostname */
define( 'DB_HOST', 'wordpress-db.cinpgowfcttg.eu-west-1.rds.amazonaws.com' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'em2$-tc>M-`(Blq-:mW+BV+<*?1KA@{0p0,L+H;|H~m8Dx=]#uNn!1l+?NFO:_y~');
define('SECURE_AUTH_KEY',  '#f{f+U+Bnd}L` V@.^Hl,D,lmq*>}@_IDN+$zY}1#aYQFl2cxnL$izuMN-s~W#aN');
define('LOGGED_IN_KEY',    '+_&Al:CF2SUERfNx`TR#J^7IYbsyvg;a,>()b$7m1 Mc0w8nmOij3L[b0iI{metJ');
define('NONCE_KEY',        'fb_%R{v wPD#w+:6C-G_.ZjmOy|-`Dv3+$j:AxJ B=&hNu0#+byB|~/Pa,h}|X=U');
define('AUTH_SALT',        '-Oc_-mEyPE0%oM@5WZ`8t|Hw]/*3Gzp5?=+T9G&r{#Y?vD=&P>n6}_dV%|O!Q*u:');
define('SECURE_AUTH_SALT', 'o^G;PGv|y->w$Eo>R{E?eT4(65bjOZLb`.@BBaK*w}{OlXx_nt`3-b-tIwuvvals');
define('LOGGED_IN_SALT',   '`yb_L7q,rUMUJc AT4ki6Va=rgo^?S7f|H-9{`x(`ajcUpy6E1Q/k>MG.0^W*U| ');
define('NONCE_SALT',       '42_|}9| ~FNbHM{#)A1[!q42=zbL|TMW2~Z*aHbj%x@m{U$kImd1JiY:){(>R>/$');

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '948403_347d470bed46afac0b37a62a2e5508c1' );

/** Database username */
define( 'DB_USER', 'easywp_1049372' );

/** Database password */
define( 'DB_PASSWORD', 'bOmE7DLkDC1Oe9lRBiWLJ78T0wiHHyTBsZLtwHTbPAY=' );

/** Database hostname */
define( 'DB_HOST', 'mysql-cluster-2-db-mysql-master.database.svc.cluster.local' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '3dbc*}!y%=qhsd`o_`E|z;/oDf>q(EH#)n7P5lK|X6$ptCT%|)-3<?)aJ@Zs1]m&' );
define( 'SECURE_AUTH_KEY',   'F$TiAeRM2x /4F7WZv_evDUKvhEyUkKmemrx$W Mj@XGAXhL](omR7?&KsAkVXKO' );
define( 'LOGGED_IN_KEY',     'aSN5aYZf#w=:U6;mwiSlpr1y@v~P w,=<wx4>Cu*W[<|$Cb_MP*ra&>6f*%v-CO`' );
define( 'NONCE_KEY',         'f0a=CMNY3h_L2<+3j-LODukFf6*A8=Oy/Z`w7Ux!6{~@u ^<w+g3]2Hp9FVU9+Ij' );
define( 'AUTH_SALT',         'kjk`o4&}X<9C^o D3I,ZKs4`IMo@yX UFZlkZZ}Dh3~Tg~I>}0/Fo_7busqv2uuN' );
define( 'SECURE_AUTH_SALT',  '(ti2PB<B3},{ e=brG%JjJ7N;vRgz!d@.:jk~#MWKG8eSv^1]$-Hn((e+y[GdWI&' );
define( 'LOGGED_IN_SALT',    '~i~nqJ9vi~FtQBd{6Y|q52nGMm0cw;eu.6{asMZjVl >L|Nvo3{|7!|[8</x<WV=' );
define( 'NONCE_SALT',        'TT@Q}O{|y9>cq7&b@T,m&Vv(1ZxKEb/6@_,lk%5z/pEl?|Gcpkk|3+aG+di:s.2=' );
define( 'WP_CACHE_KEY_SALT', 'Uj,HH}_#_/}zocCS?9vx]JKO:MgIbt#x9OunwFb!ZiZP%Z|I,&!Rs}=v4Nu-K<TR' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */

if(isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
  if (strpos( $_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false) {
    $_SERVER['HTTPS']='on';
  }
};
define('WP_MEMORY_LIMIT','128M');
define('WP_MAX_MEMORY_LIMIT','256M');
define('FS_METHOD','direct');
define('AUTOSAVE_INTERVAL',160);
define('WP_POST_REVISIONS',5);


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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

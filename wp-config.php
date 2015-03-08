<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nff');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'dtwRF@C.e*ZNehMjzWEBkM1+?Z|`MWJoTX6h39ek2=d!1aRYEUWWv/{syHwxfNnx');
define('SECURE_AUTH_KEY',  '0]tBT%kP.{&*(c+Hvdmv/fsb3W2Oix7Xdvm(B=|+?fqCriZo;x0PkL4? -+3WM4e');
define('LOGGED_IN_KEY',    '.+x29ZSDm9K{FuJ/ZE&P.2ZeriaA{+kIzWWZ=AzHH]QJ%4SaJH#w7(m{Jk<``d+}');
define('NONCE_KEY',        '6,2ApRtp|u-/[ye?OoUrK?Q-,AB6G_G7M@+wZ26~[Av,M*/uP0^x,H7^ge*{iW?^');
define('AUTH_SALT',        '{h?b7g|bZp7F9UR:5gUQ#`+A)!IaWRy#.w-I29E~Lz:}kA(56>^sCHv5%8#AUA5c');
define('SECURE_AUTH_SALT', '>HJg!uSQCJE7:f/4kO8pFQ8CNHa656Rgd&Wn! 48&dHQj5l!9~p_NaGEQ=594SnP');
define('LOGGED_IN_SALT',   'V#?<;g:,6nrT*U+;qT>u#M`FwgYHCOV-wS:!ed AlxE`Bi=Wggk/bu*zcgv8@EGP');
define('NONCE_SALT',       'fOBVTC;1dT:/b1~Oo7~-n/^%I[tk}pQ!GcQ+;4T RstmG*e{hUA1SO^h1T@L&l 2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'nff_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

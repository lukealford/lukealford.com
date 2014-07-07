<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp-skyline');

/** MySQL database username */
define('DB_USER', 'skyline');

/** MySQL database password */
define('DB_PASSWORD', 'folio13');

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
define('AUTH_KEY',         'HbY_SdU}xI>-+TTCIL07g1ySR#]1j.%|?=BY./]w #-YhaZEq{fC|csDD.{?0`qR');
define('SECURE_AUTH_KEY',  't-s*~>im J=MCv6djQa[<~1&Wc8+@^F!Y_GycaZw2|s:~[L4JE!Jf _.-[Il{e8(');
define('LOGGED_IN_KEY',    '^|`Y:WXPK:L6-5eYb:s85~ENX[9p1q>6=XgMw[(]m|-CH:19-}MqLb;ku#>So_PN');
define('NONCE_KEY',        '%y3nUr0eI+E+3@Tq1/lUEyPFQ+2zX]dj$=DF$f8,[E~MnA&P}yW4Y,`XI!}oN|3r');
define('AUTH_SALT',        '5I-|Dkd-]QdfYn^Fn6N ZH$F(6n`Wd?FgP>U1S|t9e`h4>sk~R&,&Rds,{p:bR~x');
define('SECURE_AUTH_SALT', '+M/us|A(XF.?Wk/+V%0)yC,u_sgPlp4J;~W+>wwHt@xAI(TaWN[TQ4EjN[,-d%Yx');
define('LOGGED_IN_SALT',   '+UH5`OXM:Leev-3W,|b%A&y&{|{~Mk@g*:+27^3/nZe]PVpM3G;*|<lSIkM9F#~]');
define('NONCE_SALT',       ';&!<9G7Ya`Z/D2?IGrjveiB>UjifLI3~/+S$MfcdNj36[V~t3?=$n0_ZBrLRgx![');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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

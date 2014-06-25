<?php /**/?><?php
// ** MySQL settings ** //
define('DB_NAME', 'shookfm_wp01');    // The name of the database
define('DB_USER', 'shookfm_wp01');     // Your MySQL username
define('DB_PASSWORD', 'zgRpfrZuc6'); // ...and password
define('DB_HOST', 'localhost');    // 99% chance you won't need to change this value
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('AUTH_KEY',        '6D`FfwA1V<)yD^Em(BLu@h^ atC`qK*::rHUvyDiSuxW8AP>pj]N}IS.xsNh$lqR');
define('SECURE_AUTH_KEY', '=?He5rArt&+.W|#^+fF]s*,yO$aM-/!C d*L8r8^U!*Wpm qPPdF@G&b-Uvs4Y(*');
define('LOGGED_IN_KEY',   'Crg6<#m?kh9Jb|w{,(8aQ50J+#OX|QgZ7`I>A(.uv!|K<aDu6};:r@`.P8QI~84H');
define('NONCE_KEY',       'iZY#a3c)i|J:yn],KO*9u>^Qo8utdRx6eqi2?-^|bBL-;]F7h9zFL$E#FDXfm>5Q');

// You can have multiple installations in one database if you give each a unique prefix
$table_prefix  = '';   // Only numbers, letters, and underscores please!

// Change this to localize WordPress.  A corresponding MO file for the
// chosen language must be installed to wp-content/languages.
// For example, install de.mo to wp-content/languages and set WPLANG to 'de'
// to enable German language support.
define ('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH.'wp-settings.php');
?>

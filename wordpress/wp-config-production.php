<?php
/** ********************************************************************************************* */
/** author: SlickStack ************************************************************************** */
/** link: https://slickstack.io ***************************************************************** */
/** mirror: https://mirrors.slickstack.io/modules/wordpress/wp-config-production.txt ************ */
/** path: n/a (boilerplate) ********************************************************************* */
/** destination: /var/www/html/wp-config.php (after install) ************************************ */
/** purpose: WordPress configuration file boilerplate for SlickStack production sites *********** */
/** module version: WordPress 6.2.x ************************************************************* */
/** sourced by: wp-settings.php ***************************************************************** */
/** bash aliases: n/a (ss-install-wordpress-config) ********************************************* */
/** ********************************************************************************************* */

/** DO NOT MODIFY WP-CONFIG DIRECTLY AS CHANGES WILL BE OVERWRITTEN BY SLICKSTACK */
/** THIS BOILERPLATE FOR SINGLE SITES ONLY (ANOTHER EXISTS FOR MULTISITES) */

/** ********************************************************************************************* */
/** WP-Config (Production): Database Settings *************************************************** */
/** ********************************************************************************************* */

/** database connection settings should only be modified inside the ss-config file */
/** SlickStack will create the database and user if they do not exist yet */

define('DB_NAME', '@DB_NAME'); // ss = production
define('DB_USER', '@DB_USER'); // ss = *must be unique*
define('DB_PASSWORD', '@DB_PASSWORD'); // ss = *must be unique*
define('DB_HOST', '@DB_HOST:@DB_PORT'); // ss = 127.0.0.1:3306
define('DB_CHARSET', 'utf8mb4'); // ss = utf8mb4
define('DB_COLLATE', ''); // ss = (blank)
$table_prefix = 'wp_'; // ss = wp_

/** ********************************************************************************************* */
/** WP-Config (Production): Environment Settings ************************************************ */
/** ********************************************************************************************* */

/** SlickStack supports distinct prod/staging/dev sites so we hardcode environment */
/** each site has its own database and files so WP_LOCAL_DEV not supported */

define('WP_ENVIRONMENT_TYPE', 'production'); // ss = production
define('WP_LOCAL_DEV', false); // ss = false

/** ********************************************************************************************* */
/** WP-Config (Production): Domain Settings ***************************************************** */
/** ********************************************************************************************* */

/** all domain settings are hardcoded to avoid conflicts and maintain best practices */
/** there should never be any reason to change these settings no matter what */

define('WP_HOME', 'https://@SITE_DOMAIN'); // ss = *must be unique*
define('WP_SITEURL', 'https://@SITE_DOMAIN'); // ss = *must be unique*
define('WP_CONTENT_URL', 'https://@SITE_DOMAIN/wp-content'); // ss = *must be unique*
define('WP_PLUGIN_URL', 'https://@SITE_DOMAIN/wp-content/plugins'); // ss = *must be unique*
define('WP_CONTENT_DIR', '@PROJECT_ROOT/wp-content'); // ss = /var/www/html/wp-content
define('WP_PLUGIN_DIR', '@PROJECT_ROOT/wp-content/plugins'); // ss = /var/www/html/wp-content/plugins
define('WP_LANG_DIR', '@PROJECT_ROOT/wp-content/languages'); // ss = /var/www/html/wp-content/languages
define('WP_TEMP_DIR', '@PROJECT_ROOT/wp-content/temp'); // ss = /var/www/html/wp-content/temp
define('UPLOADS', 'wp-content/uploads'); // ss = wp-content/uploads
define('WP_CACHE_KEY_SALT', '@SITE_DOMAIN'); // ss = www.example.com

/** ********************************************************************************************* */
/** WP-Config (Production): SSL Settings ******************************************************** */
/** ********************************************************************************************* */

/** as SlickStack is HTTPS-only we hardcode SSL admin and login for WordPress here */
/** our Force HTTPS plugin is also included as a default WordPress MU plugin */

define('FORCE_SSL_ADMIN', true); // ss = true
define('FORCE_SSL_LOGIN', true); // ss = true

/** ********************************************************************************************* */
/** WP-Config (Production): Cookie Settings ***************************************************** */
/** ********************************************************************************************* */

/** for single sites prod/staging/dev use distinct cookies to avoid login conflicts */
/** but for Multisite networks each site in COOKIE_DOMAIN is auto-detected */

define('COOKIE_DOMAIN', '@SITE_DOMAIN');
define('COOKIEPATH', '/');
define('SITECOOKIEPATH', '/');
define('ADMIN_COOKIE_PATH', SITECOOKIEPATH . 'wp-admin');

/** ********************************************************************************************* */
/** WP-Config (Production): Debug Settings ****************************************************** */
/** ********************************************************************************************* */

/** most debugging and error handling is hardcoded in SlickStack for better stability */
/** for more verbose debugging use staging/dev sites as WP_DEBUG is enabled */

define('WP_DEBUG', false); // ss = false
define('WP_DEBUG_LOG', false); // ss = false (disable debug.log)
define('WP_DEBUG_DISPLAY', false); // ss = false

/** ********************************************************************************************* */
/** WP-Config (Production): Core Update Settings ************************************************ */
/** ********************************************************************************************* */

/** for security reasons SlickStack does not prevent WordPress from receiving updates */
/** minor releases (patches) will auto-update and bundled themes are skipped */

define('AUTOMATIC_UPDATER_DISABLED', false); // ss = false
define('WP_AUTO_UPDATE_CORE', 'minor'); // ss = minor
define('CORE_UPGRADE_SKIP_NEW_BUNDLED', true); // ss = true

/** ********************************************************************************************* */
/** WP-Config (Production): Salt Settings ******************************************************* */
/** ********************************************************************************************* */

/** the salt strings are used by WordPress to secure and randomize login sessions etc */
/** replace with values from https://api.wordpress.org/secret-key/1.1/salt/ */

define('AUTH_KEY', '@AUTHKEY'); // ss = *must be unique*
define('SECURE_AUTH_KEY', '@SECUREAUTHKEY'); // ss = *must be unique*
define('LOGGED_IN_KEY', '@LOGGEDINKEY'); // ss = *must be unique*
define('NONCE_KEY', '@NONCEKEY'); // ss = *must be unique*
define('AUTH_SALT', '@AUTHSALT'); // ss = *must be unique*
define('SECURE_AUTH_SALT', '@SECUREAUTHSALT'); // ss = *must be unique*
define('LOGGED_IN_SALT', '@LOGGEDINSALT'); // ss = *must be unique*
define('NONCE_SALT', '@NONCESALT'); // ss = *must be unique*

/** ********************************************************************************************* */
/** WP-Config (Production): WP Cron Settings **************************************************** */
/** ********************************************************************************************* */

/** setting WP_CRON_METHOD to server in ss-config will disable WP Cron in below field */
/** ALTERNATE_WP_CRON is force disabled and should not be needed on SlickStack */

define('DISABLE_WP_CRON', false); // ss = false
define('ALTERNATE_WP_CRON', false); // ss = false
define('WP_CRON_LOCK_TIMEOUT', 30); // ss = 30 seconds

/** ********************************************************************************************* */
/** WP-Config (Production): Default Theme ******************************************************* */
/** ********************************************************************************************* */

/** default WordPress theme for new installs or in case your other themes are broken */
/** it can also make it easier when sharing a database between multiple sites */

define('WP_DEFAULT_THEME', '@WP_DEFAULT_THEME'); // ss = hovercraft

/** ********************************************************************************************* */
/** WP-Config (Production): Cache Settings ****************************************************** */
/** ********************************************************************************************* */

/** because SlickStack uses server-level Nginx caching we disable WordPress caching */
/** any plugins or themes that require cache directory are improperly coded */

define('WP_CACHE', false); // ss = false
define('OBJECT_CACHE', true); // default = true

/** ********************************************************************************************* */
/** WP-Config: File + Upload + API Permissions Settings ***************************************** */
/** ********************************************************************************************* */

/** default file permissions */
define('FS_METHOD', 'direct'); // ss = direct
define('FS_CHMOD_DIR', (0775 & ~umask())); // ss = 0775
define('FS_CHMOD_FILE', (0664 & ~umask())); // ss = 0664

/** restrict external HTTP (API) requests */
define('WP_HTTP_BLOCK_EXTERNAL', false); // ss = false
define('WP_ACCESSIBLE_HOSTS', 'api.wordpress.org'); // ss = api.wordpress.org

/** restrict backend file modification */
define('DISALLOW_FILE_EDIT', false); // ss = false
define('DISALLOW_FILE_MODS', false); // ss = false

/** restrict file (media) uploads */
define('ALLOW_UNFILTERED_UPLOADS', true); // ss = true

define('DISALLOW_UNFILTERED_HTML', false); // ss = false

/** ********************************************************************************************* */
/** WP-Config: Various Performance Settings ***************************************************** */
/** ********************************************************************************************* */

/** optimize WordPress memory */
define('WP_MEMORY_LIMIT', '256M'); // ss = 256M
define('WP_MAX_MEMORY_LIMIT', '512M'); // ss = 512M

/** limit post revisions and drafts */
define('WP_POST_REVISIONS', 3); // ss = 3
define('AUTOSAVE_INTERVAL', 30); // ss = 30 (secs)

/** trash management */
define('MEDIA_TRASH', true); // ss = true
define('EMPTY_TRASH_DAYS', 99999999999999999999); // ss = 99999999999999999999
define('IMAGE_EDIT_OVERWRITE', true); // ss = true

/** ********************************************************************************************* */
/** WP-Config (Production): WP Admin Optimization Settings ************************************** */
/** ********************************************************************************************* */

/** keep in mind that SlickStack (Nginx) performs Gzip compression at the server-level */
/** using PHP to compress code uses more CPU and slows down the parsing speed */

define('ENFORCE_GZIP', true); // ss = true
define('COMPRESS_CSS', true); // ss = true
define('COMPRESS_SCRIPTS', true); // ss = true
define('CONCATENATE_SCRIPTS', false); // ss = false

/** ********************************************************************************************* */
/** WP-Config (Production): Clear Caches (MU Plugin) Settings *********************************** */
/** ********************************************************************************************* */

define('CLEAR_CACHES', true); // ss = true
define('CLEAR_CACHES_NGINX', true); // ss = true
define('CLEAR_CACHES_NGINX_PATH', '/var/www/cache/nginx'); // ss = /var/www/cache/nginx
define('CLEAR_CACHES_OBJECT', true); // ss = true
define('CLEAR_CACHES_OPCACHE', true); // ss = true

/** ********************************************************************************************* */
/** WP-Config (Production): Force HTTPS (MU Plugin) Settings ************************************ */
/** ********************************************************************************************* */

define('FORCE_HTTPS', true); // ss = true
define('FORCE_HTTPS_EXTERNAL_RESOURCES', true); // ss = true
define('FORCE_HTTPS_INTERNAL_LINKS', true); // ss = true
define('FORCE_HTTPS_INTERNAL_RESOURCES', true); // ss = true

// define( 'FORCE_HTTPS_EXTERNAL_LINKS', false ); // default = false

/** ********************************************************************************************* */
/** WP-Config (Production): Miscellaneous Settings ********************************************** */
/** ********************************************************************************************* */

define('DISABLE_NAG_NOTICES', true); // ss = true
define('WPCF7_UPLOADS_TMP_DIR', '@PROJECT_ROOT/wp-content/temp'); // ss = /var/www/html/wp-content/temp

/** ********************************************************************************************* */
/** WP-Config (Production): Inactive Defined Constants (Modify With Custom Functions) *********** */
/** ********************************************************************************************* */

/** the following defined constants should not be hardcoded to allow for modification */
/** modify these constants using the custom-functions.php script or otherwise */

define('WP_ALLOW_REPAIR', false); // ss = false
define('SAVEQUERIES', false); // ss = false
define('SCRIPT_DEBUG', false); // ss = false

/** ********************************************************************************************* */
/** WP-Config (Production): Require WP-Settings File (MUST APPEAR LAST) ************************* */
/** ********************************************************************************************* */

/** the wp-settings.php file is critical to WordPress Core functions and must load last */
/** below snippet also relies on ABSPATH being properly defined in this section */

if (!defined('ABSPATH'))
  define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');

/** ********************************************************************************************* */
/** SlickStack: External References Used To Improve This Script (Thanks, Interwebz) ************* */
/** ********************************************************************************************* */

// Ref: https://wordpress.org/support/article/editing-wp-config-php/
// Ref: https://wordpress.org/support/article/debugging-in-wordpress
// Ref: https://github.com/littlebizzy/custom-functions
// Ref: https://gist.github.com/jrfnl/5925642
// Ref: https://github.com/littlebizzy/slickstack/issues/27
// Ref: https://stackoverflow.com/questions/2473079/how-to-display-all-database-queries-made-by-wordpress
// Ref: https://css-tricks.com/finding-and-fixing-slow-wordpress-database-queries/
// Ref: https://my.wpnet.nz/knowledgebase/24/Tips-for-your-wp-configphp-file.html
// Ref: https://wisdmlabs.com/blog/14-least-known-wordpress-constants-an-overview/
// Ref: https://github.com/WordPress/WordPress/blob/master/wp-includes/script-loader.php
// Ref: https://gist.github.com/bhubbard/8428583
// Ref: https://wordpress.org/support/topic/problems-with-domain_current_site-value/
// Ref: https://wplang.org/translation-plugins-languages/
// Ref: https://adriahost.rs/15-useful-tips-and-tricks-for-wp-config/
// Ref: https://gist.github.com/yanknudtskov/11151189
// Ref: https://make.wordpress.org/core/2020/07/24/new-wp_get_environment_type-function-in-wordpress-5-5/
// Ref: https://wordpress.stackexchange.com/questions/130753/how-to-share-cookies-and-sessions-between-domain-and-subdomain
// Ref: https://gist.github.com/MikeNGarrett/e20d77ca8ba4ae62adf5
// Ref: https://wordpress.stackexchange.com/questions/215032/cookie-domain-setting-confusion
// Ref: https://www.bjornjohansen.com/load-scripts-php
// Ref: https://github.com/WordPress/gutenberg/issues/5697
// Ref: https://muffingroup.com/blog/jquery-is-not-defined/
// Ref: https://wordpress.2bearstudio.com/remove-doing_wp_cron-from-url/
// Ref: https://wordpress.stackexchange.com/questions/3347/my-wordpress-multisite-homepage-redirects-to-signup-page
// Ref: https://tommcfarlin.com/resolving-the-wordpress-multisite-redirect-loop/
// Ref: https://wpengine.com/support/how-to-change-a-multi-site-primary-domain/
// Ref: https://smartslider.helpscoutdocs.com/article/1983-how-to-give-access-to-smart-slider-for-non-admin-users
// Ref: https://wordpress.org/support/article/roles-and-capabilities/#unfiltered_html
// Ref: https://wordpress.stackexchange.com/questions/321923/why-is-my-staging-subdomain-not-sending-wordpress-logged-in-cookies
// Ref: https://beamtic.com/wordpress-session-cookie-path
// Ref: https://wordpress.stackexchange.com/questions/331309/why-does-it-say-cookies-are-blocked-or-not-supported
// Ref: https://arnesonium.com/2016/03/alternate-ways-to-call-wp-cron/
// Ref: https://www.inmotionhosting.com/support/edu/wordpress/change-database-port-wordpress/
// Ref: https://www.linode.com/docs/guides/configure-wordpress-remote-database/
// Ref: https://stackoverflow.com/questions/4604965/how-to-include-only-if-file-exists
// Ref: https://www.sitepoint.com/community/t/to-use-file-exists-or-not/16284
// Ref: https://wordpress.org/support/topic/add-the-wp_cache_key_salt-constant-to-the-wp-config-php/
// Ref: https://stackoverflow.com/questions/55064427/wordpress-wp-cache-key-salt-value-is-wrong-in-wp-config-php-file
// Ref: https://www.alibabacloud.com/tech-news/cache/1ma-how-to-use-memcached-with-wordpress
// Ref: https://wordpress.stackexchange.com/questions/220088/is-definewp-cache-true-needed-for-object-caching
// Ref: https://github.com/littlebizzy/slickstack/issues/168
// Ref: https://ithemes.com/blog/wordpress-wp-config-php-file-explained/
// Ref: https://wpclouddeploy.com/documentation/tips-techniques-education/all-the-possible-wp-config-php-constants-for-core-wordpress/
// Ref: https://gist.github.com/MikeNGarrett/e20d77ca8ba4ae62adf5

// SS_EOF
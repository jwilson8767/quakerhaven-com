<?php

// Detect if SSL is used.
if ((isset($_SERVER['HTTP_CLOUDFRONT_FORWARDED_PROTO']) && $_SERVER['HTTP_CLOUDFRONT_FORWARDED_PROTO'] == 'https') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) {
    $_SERVER['HTTPS'] = 'on';
}

/* Custom Directory Structure (moves dependencies out of root directory, moves plugins out of wp-content) */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/wp/'); // Absolute path to the WordPress directory.
}

$request_prefix = (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off') ? 'http://' : 'https://';

define('WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content');
define('WP_CONTENT_URL', $request_prefix . $_SERVER['HTTP_HOST'] . '/wp-content');

define('WP_PLUGIN_DIR', dirname(__FILE__) . '/plugins');
define('WP_PLUGIN_URL', $request_prefix . $_SERVER['HTTP_HOST'] . '/plugins');
define('WPMU_PLUGIN_DIR', dirname(__FILE__) . '/plugins/mustuse');
define('WPMU_PLUGIN_URL', $request_prefix . $_SERVER['HTTP_HOST'] . '/plugins/mustuse');

require_once('secrets.php');

define('WP_DEBUG', $_SERVER["WP_DEBUG"]);

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

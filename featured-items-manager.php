<?php

/**
 * Plugin Name: Featured Content Enhancer
 * Plugin URI: https://github.com/zeeshanejaz786/Featured-Items-Manager
 * Description: A plugin to manage and display featured items on your WordPress site.
 * Version: 1.0.0
 * Author: Zeeshan Qureshi
 * Author URI: https://github.com/zeeshanejaz786
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'FIM_PATH', plugin_dir_path( __FILE__ ) );
define( 'FIM_URL', plugin_dir_url( __FILE__ ) );

require_once FIM_PATH . 'includes/class-fim-plugin.php';
FIM_Plugin::init();

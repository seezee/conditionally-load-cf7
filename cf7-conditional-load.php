<?php
/**
 * Plugin Name: CF7 Conditional Load
 * Version: 1.0.2
 * Author URI: https://github.com/seezee
 * Plugin URI: https://github.com/seezee/CF7-Conditional-Load
 * Description: In its default settings, Contact Form 7 loads its JavaScript and CSS stylesheet on every page. This slows page loading and taxes server and client resources. Use this plugin to control which pages the scripts load on.
 * Author: Chris J. Zähller / Messenger Web Design
 * Author URI: https://messengerwebdesign.com/
 * Requires at least: 4.0
 * Tested up to: 5.3
 * PHP Version 7.0
 * Text Domain: cf7-conditional
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author  Chris J. Zähller
 * @since   1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load plugin files.
define( 'CF7_CONDITIONAL_PATH', plugin_dir_path( __FILE__ ) );
define( 'CF7_CONDITIONAL_URL', plugin_dir_url( __FILE__ ) );
require_once( CF7_CONDITIONAL_PATH . 'includes/cf7-conditional-load-settings.php');

// plugin uninstallation
register_uninstall_hook( __FILE__, 'cf7_conditional_uninstall' );
function cf7_conditional_uninstall() {
    delete_option( 'cf7_conditional_load' );
}

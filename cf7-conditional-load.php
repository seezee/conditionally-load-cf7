<?php
/**
 * Plugin Name: CF7 Conditional Load
 * Version: 1.0.3
 * Author URI: https://github.com/seezee
 * https://wordpress.org/plugins/cf7-conditional-load/
 * Description: In its default settings, Contact Form 7 loads its JavaScript and CSS stylesheet on every page. This slows page loading and taxes server and client resources. Use this plugin to control which pages the scripts load on.
 * Author: Chris J. Zähller / Messenger Web Design
 * Requires at least: 3.9
 * Tested up to: 5.3.2
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

// Plugin constants.
if ( ! defined('_CF7CL_VERSION_') ) {
	define ( '_CF7CL_VERSION_', '1.0.3' );
} else {
	echo '<div id="updated" class="notice notice-error is-dismissible"><span class="dashicons dashicons-no"></span> ' . __( '<abb>CF7</abbr> Conditional Load ERROR! The <abbr>PHP</abbr> constant', 'cf7-conditional-load' ) . ' &ldquo;_CF7CL_VERSION_&rdquo; ' . __( 'has already been defined. This could be due to a conflict with another plugin or theme. Please check your logs to debug.', 'cf7-conditional-load' ) . '</div>';
}
// Load plugin files.
if ( ! defined('_CF7CL_PATH_') ) {
	define( '_CF7CL_PATH_', plugin_dir_path( __FILE__ ) );
} else {
	echo '<div id="updated" class="notice notice-error is-dismissible"><span class="dashicons dashicons-no"></span> ' . __( '<abb>CF7</abbr> Conditional Load ERROR! The <abbr>PHP</abbr> constant', 'cf7-conditional-load' ) . ' &ldquo;_CF7CL_CONDITIONAL_PATH_&rdquo; ' . __( 'has already been defined. This could be due to a conflict with another plugin or theme. Please check your logs to debug.', 'cf7-conditional-load' ) . '</div>';
}
if ( ! defined('_CF7CL_URL_') ) {
	define( '_CF7CL_URL_', plugin_dir_url( __FILE__ ) );
} else {
	echo '<div id="updated" class="notice notice-error is-dismissible"><span class="dashicons dashicons-no"></span> ' . __( '<abb>CF7</abbr> Conditional Load ERROR! The <abbr>PHP</abbr> constant', 'cf7-conditional-load' ) . ' &ldquo;_CF7CL_URL_&rdquo; ' . __( 'has already been defined. This could be due to a conflict with another plugin or theme. Please check your logs to debug.', 'cf7-conditional-load' ) . '</div>';
}
require_once( _CF7CL_PATH_ . 'includes/cf7-conditional-load-settings.php');
require_once( _CF7CL_PATH_ . 'includes/class-cf7-conditional-load-meta.php');

// add menu links to the plugin entry in the plugins menu
function cf7cl_action_links($links, $file) {
	static $this_plugin;

	if (!$this_plugin) {
		$this_plugin = plugin_basename(__FILE__);
	}

	// check to make sure we are on the correct plugin
	if ($file == $this_plugin) {

		// link to what ever you want
		$plugin_links[] = '<a href="' . esc_url( 'options-general.php?page=cf7-conditional-load' ) . '">' . __( 'Settings', 'wp-foft-loader' ) . '</a>';

		// add the links to the list of links already there
		foreach($plugin_links as $link) {
			array_unshift($links, $link);
		}
	}

	return $links;
}
add_filter('plugin_action_links', 'cf7cl_action_links', 10, 2);

// plugin uninstallation
register_uninstall_hook( __FILE__, 'cf7_conditional_uninstall' );
function cf7_conditional_uninstall() {
    delete_option( 'cf7_conditional_load' );
}

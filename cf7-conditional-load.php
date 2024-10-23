<?php
/**
 * Plugin Name: Conditionally Load CF7
 * Version:  1.0.46
 * Author URI: https://github.com/seezee
 * Plugin URI: https://wordpress.org/plugins/cf7-conditional-load/
 * Description: In its default settings, Contact Form 7 loads its JavaScript and CSS stylesheet on every page. This slows page loading and taxes server and client resources. Use this plugin to control which pages the scripts load on.
 * Author: Chris J. Zähller / Messenger Web Design
 * Requires at least: 4.7.0
 * Tested up to: 6.6.2
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

$arr = array( // Allowed HTML in wp_kses().
	'abbr' => array(),
);

// Plugin constants.
$error_open  = '<div id="updated" class="notice notice-error is-dismissible"><span class="dashicons dashicons-no"></span> ';
$error_close = '</div>';

if ( ! defined( 'CF7CL_VERSION' ) ) {
	define( 'CF7CL_VERSION', '' );
} else {
	$message = __( '<abb>CF7</abbr> Conditional Load ERROR! The <abbr>PHP</abbr> constant “CF7CL_VERSION” has already been defined. This could be due to a conflict with another plugin or theme. Please check your logs to debug.', 'conditionally-load-cf7-test' );
	echo $error_open . wp_kses( $message, $arr ) . $error_close; // phpcs:ignore
}
// Load plugin files.
if ( ! defined( 'CF7CL_PATH' ) ) {
	define( 'CF7CL_PATH', plugin_dir_path( __FILE__ ) );
} else {
	$message = __( '<abb>CF7</abbr> Conditional Load ERROR! The <abbr>PHP</abbr> constant “CF7CL_CONDITIONAL_PATH” has already been defined. This could be due to a conflict with another plugin or theme. Please check your logs to debug.', 'conditionally-load-cf7-test' );
	echo $error_open . wp_kses( $message, $arr ) . $error_close; // phpcs:ignore
}
if ( ! defined( 'CF7CL_URL' ) ) {
	define( 'CF7CL_URL', plugin_dir_url( __FILE__ ) );
} else {
	$message = __( '<abb>CF7</abbr> Conditional Load ERROR! The <abbr>PHP</abbr> constant “CF7CL_URL” has already been defined. This could be due to a conflict with another plugin or theme. Please check your logs to debug.', 'conditionally-load-cf7-test' );
	echo $error_open . wp_kses( $message, $arr ) . $error_close; // phpcs:ignore
}

require_once CF7CL_PATH . 'includes/class-cf7-conditional-load.php';
require_once CF7CL_PATH . 'includes/class-cf7-conditional-load-meta.php';
require_once CF7CL_PATH . 'includes/class-cf7-conditional-load-meta-box.php';
require_once CF7CL_PATH . 'includes/cf7-conditional-load-settings.php';

/**
 * Admin enqueue style.
 *
 * @param string $hook Hook parameter.
 *
 * @return void
 */
function admin_enqueue_styles( $hook ) {
	$token = 'cf7-conditional-load';

	// Load plugin environment variables.
	$assets_url = esc_url( plugins_url( 'assets/', __FILE__ ) );

	// Use minified script.
	$script_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	global $pagenow;

	if ( ( 'plugins.php' !== $pagenow && 'settings_page_cf7-conditional-load' !== $hook ) || ! current_user_can( 'install_plugins' ) ) {
		return;
	}

	wp_register_style( $token . '-admin-style', esc_url( $assets_url ) . 'css/admin' . $script_suffix . '.css', array(), esc_html( CF7CL_VERSION ) );
	wp_enqueue_style( $token . '-admin-style' );
} // End admin_enqueue_styles ()

add_action( 'admin_enqueue_scripts', 'admin_enqueue_styles' );

/**
 * Add menu links to the plugin entry in the plugins menu.
 *
 * @param string $links Menu links.
 * @param string $file  The plugin file.
 */
function cf7cl_action_links( $links, $file ) {
	static $this_plugin;

	if ( ! $this_plugin ) {
		$this_plugin = plugin_basename( __FILE__ );
	}

	// check to make sure we are on the correct plugin.
	if ( $file === $this_plugin ) {

		// link to what ever you want.
		$plugin_links[] = '<a href="' . esc_url( 'options-general.php?page=cf7-conditional-load' ) . '">' . __( 'Settings', 'conditionally-load-cf7-test' ) . '</a>';

		// add the links to the list of links already there.
		foreach ( $plugin_links as $link ) {
			array_unshift( $links, $link );
		}
	}

	return $links;
}
add_filter( 'plugin_action_links', 'cf7cl_action_links', 10, 2 );

// plugin uninstallation.
register_uninstall_hook( __FILE__, 'cf7cl_conditional_uninstall' );

/**
 * Plugin uninstallation.
 */
function cf7cl_conditional_uninstall() {
	delete_option( 'cf7cl_conditional_load' );
}

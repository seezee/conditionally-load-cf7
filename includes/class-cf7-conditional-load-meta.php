<?php
/**
 * Plugin Meta class file.
 *
 * @package Conditionally Load CF7/Includes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add links to plugin meta
 */
class CF7_Conditional_Load_Meta {

	/**
	 * The single instance of CF7_Conditional_Load_Meta.
	 *
	 * @var     object
	 * @access  private
	 * @since   1.0.0
	 */
	private static $instance = null;

	/**
	 * The main plugin object.
	 *
	 * @var     object
	 * @access  public
	 * @since   1.0.0
	 */
	public $parent = null;

	/**
	 * Constructor function.
	 */
	public function links() {

		// Filter the plugin meta.
		add_filter( 'plugin_row_meta', array( $this, 'meta_links' ), 10, 2 );
	}

	/**
	 * Custom links.
	 *
	 * @param string $links Custom links.
	 * @param string $file Path to main plugin file.
	 */
	public function meta_links( $links, $file ) {
		$plugin = 'cf7-conditional-load.php';
		// Only for this plugin.
		if ( strpos( $file, $plugin ) !== false ) {

			$supportlink = 'https://wordpress.org/support/plugin/cf7-conditional-load';
			$donatelink  = 'https://paypal.me/messengerwebdesign?locale.x=en_US';
			$reviewlink  = 'https://wordpress.org/support/view/plugin-reviews/cf7-conditional-load?rate=5#postform';
			$twitterlink = 'https://twitter.com/czahller';
			$coffeelink  = 'https://www.buymeacoffee.com/chrisjzahller';
			$iconstyle   = 'style="-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;"';

			return array_merge(
				$links,
				array(
					'<a href="' . esc_url( $supportlink ) . '"><span class="dashicons dashicons-format-chat" ' . $iconstyle . 'title="' . esc_attr_x( 'Conditionally Load CF7 Support', 'noun', 'cf7-conditional' ) . '" aria-label="' . esc_attr_x( 'Conditionally Load CF7 Support', 'noun', 'cf7-conditional' ) . '"></span></a>',
					'<a href="' . esc_url( $twitterlink ) . '"><span class="dashicons dashicons-twitter" ' . $iconstyle . 'title="' . esc_attr__( 'Chris J. Zähller on Twitter', 'cf7-conditional' ) . '" aria-label="' . esc_attr__( 'Chris J. Zähller on Twitter', 'cf7-conditional' ) . '"></span></a>',
					'<a href="' . esc_url( $reviewlink ) . '"><span class="dashicons dashicons-star-filled"' . $iconstyle . 'title="' . esc_attr__( 'Give a 5-Star Review', 'cf7-conditional' ) . '" aria-label="' . esc_attr__( 'Give a 5-Star Review', 'cf7-conditional' ) . '"></span></a>',
					'<a href="' . esc_url( $donatelink ) . '"><span class="dashicons dashicons-heart"' . $iconstyle . 'title="' . esc_attr__( 'Donate', 'cf7-conditional' ) . '" aria-label="' . esc_attr__( 'Donate', 'cf7-conditional' ) . '"></span></a>',
					'<a href="' . esc_url( $coffeelink ) . '"><span class="dashicons dashicons-coffee"' . $iconstyle . 'title="' . esc_attr__( 'Buy the Developer a Coffee', 'cf7-conditional' ) . '" aria-label="' . esc_attr__( 'Buy the Developer a Coffee', 'cf7-conditional' ) . '"></span></a>',
				)
			);
		}

		return $links;
	}

	/**
	 * Main CF7_Conditional_Load_Meta Instance
	 *
	 * Ensures only one instance of CF7_Conditional_Load_Meta is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see CF7_Conditional_Load()
	 * @param object $parent Object instance.
	 * @return Main CF7_Conditional_Load_Meta instance
	 */
	public static function instance( $parent ) {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self( $parent );
		}
		return self::$instance;
	} // End instance()

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html_e( 'Cloning of CF7_Conditional_Load_Meta is forbidden.', 'cf7-conditional' ), esc_attr( CF7CL_VERSION ) );
	} // End __clone()

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, esc_html_e( 'Unserializing instances of CF7_Conditional_Load_Meta is forbidden.', 'cf7-conditional' ), esc_attr( CF7CL_VERSION ) );
	} // End __wakeup()

}

$meta = new CF7_Conditional_Load_Meta();
$meta->links();

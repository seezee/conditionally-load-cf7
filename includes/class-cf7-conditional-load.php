<?php
/**
 * Main plugin class file.
 *
 * @package Conditionally Load CF7/Includes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Main plugin class.
	 */
class CF7_Conditional_Load {

	/**
	 * The single instance of CF7_Conditional_Load.
	 *
	 * @var     object
	 * @access  private
	 * @since   1.0.0
	 */
	private static $instance = null;

	/**
	 * The token.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $token;

	/**
	 * The main plugin file.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $file;

	/**
	 * The main plugin directory.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $dir;

	/**
	 * The plugin assets directory.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $assets_dir;

	/**
	 * The plugin assets URL.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $assets_url;

	/**
	 * Suffix for Javascripts.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $script_suffix;

	/**
	 * Settings class object
	 *
	 * @var     object
	 * @access  public
	 * @since   1.0.0
	 */
	public $settings = null;

	/**
	 * Constructor function.
	 *
	 * @param string $file File constructor.
	 */
	public function __construct( $file = '' ) {
		$this->token = 'cf7-conditional-load';

		// Load plugin environment variables.
		$this->file       = $file;
		$this->dir        = dirname( $this->file );
		$this->assets_dir = trailingslashit( $this->dir ) . 'assets';
		$this->assets_url = esc_url( trailingslashit( plugins_url( '/assets/', $this->file ) ) );

		$this->script_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min'; // Use minified script.

		// Load admin CSS.
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_styles' ), 10, 1 );

		// Handle localisation.
		$this->load_plugin_textdomain();
		add_action( 'init', array( $this, 'load_localisation' ), 0 );

	} // End __construct ()

	/**
	 * Admin enqueue style.
	 *
	 * @param string $hook Hook parameter.
	 *
	 * @return void
	 */
	public function admin_enqueue_styles( $hook ) {
		global $pagenow;

		wp_register_style( $this->token . '-admin', esc_url( $this->assets_url ) . 'css/admin' . $this->script_suffix . '.css', array(), esc_html( CF7CL_VERSION ) );
		wp_enqueue_style( $this->token . '-admin' );
	} /// End admin_enqueue_styles ()

	/**
	 * Load plugin localisation
	 *
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function load_localisation() {
		load_plugin_textdomain( 'cf7-conditional', false, dirname( plugin_basename( $this->file ) ) . '/lang/' );
	} // End load_localisation ()

	/**
	 * Load plugin textdomain
	 *
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function load_plugin_textdomain() {
		$domain = 'cf7-conditional';

		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, false, dirname( plugin_basename( $this->file ) ) . '/lang/' );
	} // End load_plugin_textdomain ()

	/**
	 * Main CF7_Conditional_Load Instance
	 *
	 * Ensures only one instance of CF7_Conditional_Load is loaded or can be loaded.
	 *
	 * @param string $file File instance.
	 *
	 * @return Object CF7_Conditional_Load instance
	 * @since 1.0.0
	 * @static
	 */
	public static function instance( $file = '' ) {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self( $file, CF7CL_VERSION );
		}
		return self::$instance;
	} // End instance ()

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cloning of Class_CF7_Conditional_Load is forbidden.', 'cf7-conditional' ), esc_html( CF7CL_VERSION ) );
	} // End __clone ()

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Unserializing instances of Class_CF7_Conditional_Load is forbidden.', 'cf7-conditional' ), esc_html( CF7CL_VERSION ) );
	} // End __wakeup ()

}

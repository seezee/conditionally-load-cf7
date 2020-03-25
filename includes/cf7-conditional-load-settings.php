<?php
	if(!defined('ABSPATH')){
		exit;// Exit if accessed directly
	}

$parent = null;

	add_action('admin_menu', 'cf7cl_add_page');

	function cf7cl_add_page() {
		$page_title = 'Conditionally Load CF7 Settings';
		$menu_title = 'Conditionally Load CF7';
		$capability = 'manage_options';
		$menu_slug = 'cf7-conditional-load';
		$function = 'cf7cl_options_page';

		add_options_page(
			$page_title,
			$menu_title,
			$capability,
			$menu_slug,
			$function

		);
	}

	function cf7cl_options_page() {
		if( current_user_can( 'delete_pages' ) ) {
?>
<div class="wrap">
	<h2><?php _e( 'Conditionally Load CF7', 'cf7-conditional-load' ) ?></h2>
	<form action="options.php" method="post">
		<?php settings_fields( 'cf7cl_conditional' ); // Render necessary invisible fields ?>
		<?php do_settings_sections( 'cf7cl_conditional' ); ?>
		<input name="Submit" type="submit" value="<?php esc_attr_e( 'Save Changes', 'cf7-conditional-load' ); ?>" class="button button-primary" />
	</form>
</div>
<?php
		} else {
			echo '<div class="wrap">
	<h2>' . __( 'Forbidden', 'cf7cl_conditional-load' ) . '</h2>
	<p>' . __( 'Only users with Administrator or Editor privileges are permitted to change these settings. Possible reasons you are seeing this message:' , 'cf7-conditional-load' ) . '</p>
	<ul>
		<li>' . __( 'You accidentally logged in as the wrong user' , 'cf7-conditional-load' ) . '</li>
		<li>' . __( 'Your account isn&rsquo;t an Admin or Editor account' , 'cf7-conditional-load' ) . '</li>
		<li>' . __( 'An admistrator changed your account level' , 'cf7-conditional-load' ) . '</li>
	</ul>
	<p>' . __( 'Please log in as an Admin or Editor or contact the site adminstrator to resolve this issue.' , 'cf7-conditional-load' ) . '</p>
</div>';
		}
	}

	add_action( 'admin_init', 'cf7cl_admin_init' );

	function cf7cl_admin_init(){
	// Create Setting
		$section_group = 'cf7cl_conditional'; // page slug
		$section_name = 'cf7cl_conditional_load';
		register_setting( $section_group, $section_name, 'cf7cl_form_validate');

		// Create section of Page
		$settings_section = 'cf7cl_conditional_options_section'; // The name of the settings section.
		$title            = __( 'Load Contact Form 7 scripts only on pages that need them', 'cf7-conditional-load' ); // Section heading (<h2>).
		$callback         = 'cf7cl_text'; // Callback parameter to display some explanatory text.
		$page             = $section_group;
		add_settings_section(
			$settings_section,
			$title,
			$callback,
			$page
		);

		// Add fields to that section
		add_settings_field(
			$section_name,
			$title,
			'cf7cl_option_render', // Field to render
			$page,
			$settings_section
		);
	}

	function cf7cl_form_validate( $input ) {
		$validated = sanitize_textarea_field( $input );
		if ( ($validated !== $input) || ( !preg_match( '/^([a-z\d\-]([\n\r])*)*$/', $validated ) ) ) {
			$setting = 'cf7cl_conditional_load';
			$code    = esc_attr( 'settings_update_failed' );
			$type    = 'error';
			$message = __( 'Please enter page <abbr>ID</abbr>s (numerical) or page slugs (lowercase letters, numerals, &amp; hyphens) only. One <abbr>ID</abbr> per line. No spaces or other characters allowed.', 'cf7-conditional-load', 'cf7-conditional-load' );
			add_settings_error(
				$setting, // option being updated
				$code, // CSS ID attribute
				$message, // Notice content
				$type // Notice type
			);

			return '';

		} else {
			$setting = 'cf7cl_conditional_load';
			$code    = esc_attr( 'settings_updated' );
			$type    = 'success';
			$message = __( 'Congratulations! Your settings were successfully saved!', 'cf7-conditional-load' );
			add_settings_error(
				$setting, // option being updated
				$code, // CSS ID attribute
				$message, // Notice content
				$type // Notice type
			);

			return $validated;

		}

	}

	function cf7cl_form_display_notice() {
		settings_errors( 'cf7cl_conditional_load' );
	}

	add_action( 'admin_notices', 'cf7cl_form_display_notice' );

	function cf7cl_text() {
		echo '<p>'. __( 'In its default settings, Contact Form 7 loads its JavaScript and CSS stylesheet on every page. This slows page loading and taxes server and client resources. In worst case scenarios, slow page loading can ding your <abbr>SEO</abbr> or drive away potential users. This setting gives you control over which pages the scripts load on.', 'cf7-conditional-load' ) . '</p><figure><img style="max-width:100%;height:auto;border:5px solid gray;border-radius:5px;" src="'. CF7CL_URL .'images/page-id.png" alt="How to find page or post ID" width="1024" height="488" class="size-full" srcset="'. CF7CL_URL .'images/page-id.png 1024w, '. CF7CL_URL .'images/page-id-300x143.png 300w, '. CF7CL_URL .'images/page-id-768x366.png 768w, '. CF7CL_URL .'images/page-id-1024x488.png 1024w, '. CF7CL_URL .'images/page-id-586x279.png 586w" sizes="(max-width: 1188px) 100vw, 1188px"><figcaption></figcaption>' . __( 'This is the page (or post)', 'cf7-conditional-load' ) . ' <abbr>ID</abbr></figure><figure><img style="max-width:100%;height:auto;border:5px solid gray;border-radius:5px;" src="'. CF7CL_URL .'images/page-slug.png" alt="How to find page or post slug" width="1024" height="202" class="size-full" srcset="'. CF7CL_URL .'images/page-slug.png 1024w, '. CF7CL_URL .'images/page-slug-300x59.png 300w, '. CF7CL_URL .'images/page-slug-768x152.png 768w, '. CF7CL_URL .'images/page-slug-1024x202.png 1024w, '. CF7CL_URL .'images/page-slug-586x116.png 586w" sizes="(max-width: 1188px) 100vw, 1188px"><figcaption>' . __( 'This is the page (or post) slug.', 'cf7-conditional-load') .'</figcaption></figure><p>' . __( 'Enter a list of the page', 'cf7-conditional-load' ) . ' <abbr>ID</abbr>s ' . __( '(numerical) or page slugs (lowercase letters, numerals, &amp; hyphens) where you want to load the stylesheet and javascript for Contact Form 7. One page', 'cf7-conditional-load' ) . ' <abbr>ID</abbr> ' . __( 'or slug per line.', 'cf7-conditional-load' ) . '</p>';
	}

	function cf7cl_option_pages() {
		// $posts = get_option( 'cf7cl_conditional_load', '' );
		$posts = get_option( 'cf7cl_conditional_load', '' );
		return $posts; // String needed for cf7cl_option_render().
	}

	function cf7cl_option_result() {
		$posts = cf7cl_option_pages();
		$post = array_map('trim', explode(PHP_EOL, $posts)); // create array; split string at newline
		$result = implode( ', ', $post ); // reassemble as comma delimited list
		$result = rtrim($result); // get rid of extra whitespace
		return $result; // String needed for cf7cl_disable_wpcf7().
	}

	function cf7cl_option_render() {
		$result = cf7cl_option_pages();
		echo '<label for="cf7cl_conditional_load" style="display:block;margin-bottom:15px"><abbr>ID</abbr>s and/or slugs</label><textarea rows="5" cols="50" placeholder="Enter one page <abbr>ID</abbr> or slug per line." name="cf7cl_conditional_load" id="cf7cl_conditional_load" value="' . $result .'">' . $result . '</textarea>';
	}

	function cf7cl_disable_wpcf7() {
		$result = cf7cl_option_result();
		if ( ! empty( $result ) ) { 
			$result = explode( ',', $result );  // return to array
		}
		if ( !is_page( $result ) ) { // = array()
			wp_dequeue_style( 'contact-form-7' );
			wp_deregister_style( 'contact-form-7' );
			wp_dequeue_script( 'contact-form-7' );
			wp_deregister_script( 'contact-form-7' );
		}
	}

	add_action( 'wp_enqueue_scripts', 'cf7cl_disable_wpcf7', 100 ); // 100 instead of default 10 to defer this action so it fires after CF7

	function cf7cl_error_notice() {
		if ( is_plugin_active( plugin_dir_path( __FILE__ ) . "contact-form-7/wp-contact-form-7.php" ) ) {
?>
<div class="error notice is-dismissible">
	<p><?php _e( 'You have installed and activated the Contact Form 7 plugin. <a href="' .admin_url( 'options-general.php?page=cf7-conditional-load' ). '">Please configure Conditionally Load CF7 Settings</a>.', 'cf7-conditional-load' ); ?></p>
</div>
<?php
		}
	}

	add_action( 'admin_notices', 'cf7cl_error_notice' );
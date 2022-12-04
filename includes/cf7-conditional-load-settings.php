<?php
/**
 * Plugin settings.
 *
 * @package Conditionally Load CF7/Includes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;// Exit if accessed directly.
}

add_action( 'admin_menu', 'cf7cl_add_page' );

/**
 * Add the settings page to the admin menu.
 *
 * @since 1.0.0
 */
function cf7cl_add_page() {
	$page_title = esc_html__( 'Conditionally Load CF7 Settings', 'cf7-conditional' );
	$menu_title = esc_html__( 'Conditionally Load CF7', 'cf7-conditional' );
	$capability = 'manage_options';
	$menu_slug  = 'cf7-conditional-load';
	$function   = 'cf7cl_options_page';

	add_options_page(
		$page_title,
		$menu_title,
		$capability,
		$menu_slug,
		$function
	);
}

/**
 * Render the options page.
 *
 * @since 1.0.0
 */
function cf7cl_options_page() {
	if ( current_user_can( 'delete_pages' ) ) {
		?>
<div class="wrap">
	<h2><?php esc_html_e( 'Conditionally Load CF7', 'cf7-conditional' ); ?></h2>
	<form action="options.php" method="post">
		<?php settings_fields( 'cf7cl_conditional' ); // Render necessary invisible fields. ?>
		<?php do_settings_sections( 'cf7cl_conditional' ); ?>
	<input name="Submit" type="submit" value="<?php esc_attr_e( 'Save Changes', 'cf7-conditional' ); ?>" class="button button-primary" />
	</form>
</div>
		<?php
	} else {
		echo '<div class="wrap">
	<h2>' . esc_html__( 'Forbidden', 'cf7cl_conditional' ) . '</h2>
	<p>' . esc_html__( 'Only users with Administrator or Editor privileges are permitted to change these settings. Possible reasons you are seeing this message:', 'cf7-conditional' ) . '</p>
	<ul>
		<li>' . esc_html__( 'You accidentally logged in as the wrong user', 'cf7-conditional' ) . '</li>
		<li>' . esc_html__( 'Your account isn’t an Administrator or Editor account', 'cf7-conditional' ) . '</li>
		<li>' . esc_html__( 'An administrator changed your account level', 'cf7-conditional' ) . '</li>
	</ul>
	<p>' . esc_html__( 'Please log in as an Administrator or Editor or contact the site adminstrator to resolve this issue.', 'cf7-conditional' ) . '</p>
</div>';
	}
}

add_action( 'admin_menu', 'cf7cl_admin_init' );

/**
 * Render the individual options.
 *

 * @since 1.0.0
 */
function cf7cl_admin_init() {
	// Create Setting.
	$section_group = 'cf7cl_conditional'; // page slug.
	$load_pages    = 'cf7cl_conditional_load';
	$archive       = 'cf7cl_archive';
	register_setting( $section_group, $load_pages, 'cf7cl_textarea_validate' );
	register_setting( $section_group, $archive, 'cf7cl_checkbox_validate' );

	// Create section of Page.
	$settings_section = 'cf7cl_conditional_options_section'; // The name of the settings section.
	$title            = esc_html__( 'Load Contact Form 7 scripts only on pages that need them', 'cf7-conditional' ); // Section heading (<h2>).
	$callback         = 'cf7cl_text'; // Callback parameter to display some explanatory text.
	$page             = $section_group;
	add_settings_section(
		$settings_section, // Name.
		$title, // Title.
		$callback, // Explanatory text.
		$page // Slug.
	);

	// Add fields to that section.
	add_settings_field(
		$load_pages,
		$title,
		'cf7cl_option_render', // Field to render.
		$page,
		$settings_section
	);
}

/**
 * Validate textareas and save the settings.
 *
 * @param string $input The form input.
 * @since 1.0.0
 */
function cf7cl_textarea_validate( $input ) {
	$arr = array( 'abbr' => array() );

	$validated = sanitize_textarea_field( $input );

	$setting = 'cf7cl_conditional_load';
	$code    = esc_attr( 'settings_updated' );
	$type    = 'success';
	$message = __( 'Congratulations! Your settings were successfully saved!', 'cf7-conditional' );

	if ( ( $validated !== $input ) || ( ! preg_match( '/^([a-z\d\-]([\n\r])*)*$/', $validated ) ) ) {

		$validated = '';

		$setting = 'cf7cl_conditional_load';
		$code    = esc_attr( 'settings_update_failed' );
		$type    = 'error';
		$message = __( 'Please enter page <abbr>ID</abbr>s (numerical) or page slugs (lowercase letters, numerals, &amp; hyphens) only. One <abbr>ID</abbr> per line. No spaces or other characters allowed.', 'cf7-conditional' );

	}

	add_settings_error(
		$setting, // option being updated.
		$code, // CSS ID attribute.
		wp_kses( $message, $arr ), // Notice content.
		$type // Notice type.
	);

	return $validated;
}

/**
 * Validate checkboxes.
 *
 * @param string $input The form input.
 * @since 1.0.0
 */
function cf7cl_checkbox_validate( $input ) {
		return ( isset( $input ) ? true : false );
}

/**
 * Display status.
 *
 * @since 1.0.0
 */
function cf7cl_form_display_notice() {
	settings_errors( 'cf7cl_conditional_load' );
}

	add_action( 'admin_notices', 'cf7cl_form_display_notice' );

/**
 * Sanitize  and render the HTML.
 *
 * @since 1.0.25
 */
function cf7cl_text() {
	$arr = array(
		'a' => array(
			'href'   => array(),
			'rel'    => array(),
			'target' => array(),
		),
	); // Allowed html for wp_kses().

	echo '<p>' . wp_kses( __( 'In its default settings, Contact Form 7 loads its JavaScript and CSS stylesheet on every page. This slows page loading and taxes server and client resources. In worst case scenarios, slow page loading can harm your <abbr>SEO</abbr> or drive away potential users. This setting gives you control over which pages the scripts load on.', 'cf7-conditional' ), $arr ) . '</p><p>' . wp_kses( __( 'Additionally, this plugin prevents the following plugins from loading their scripts and styles:', 'cf7-conditional' ), $arr ) . '</p><ul><li>Contact Form 7 Multi-Step Forms</li><li>Drag and Drop Multiple File Upload&thinsp;&mdash;&thinsp;Contact Form 7</li><li>Contact Form 7 Conditional Fields</li><li>Contact Form 7 Multi-Step Forms</li><li>Contact Form CFDB7</li></ul></ul><p>' . wp_kses( __( 'If you are using any other plugin that extends Contact Form 7 and loads its scripts on all pages, please <a href="https://wordpress.org/support/plugin/cf7-conditional-load/" target="_blank" rel="external noopener noreferrer">open a support ticket</a> and we will look into adding it.', 'cf7-conditional' ), $arr ) . '</p><figure><img style="max-width:100%;height:auto;border:5px solid gray;border-radius:5px;" src="' . esc_url( CF7CL_URL ) . 'images/page-id.png" alt="' . esc_attr__( 'Figure 1.: How to find a page or post ID', 'cf7-conditional' ) . '" width="1024" height="488" class="size-full" srcset="' . esc_url( CF7CL_URL ) . 'images/page-id.png 1024w, ' . esc_url( CF7CL_URL ) . 'images/page-id-300x143.png 300w, ' . esc_url( CF7CL_URL ) . 'images/page-id-768x366.png 768w, ' . esc_url( CF7CL_URL ) . 'images/page-id-1024x488.png 1024w, ' . esc_url( CF7CL_URL ) . 'images/page-id-586x279.png 586w" sizes="(max-width: 1188px) 100vw, 1188px"><figcaption>' . wp_kses( __( 'Figure 1.: This is the page (or post) <abbr>ID</abbr>.', 'cf7-conditional' ), $arr ) . '</figcaption></figure><figure><img style="max-width:100%;height:auto;border:5px solid gray;border-radius:5px;" src="' . esc_url( CF7CL_URL ) . 'images/page-slug.png" alt="' . esc_attr__( 'Figure 2.: How to find a page or post slug', 'cf7-conditional' ) . '" width="1024" height="202" class="size-full" srcset="' . esc_url( CF7CL_URL ) . 'images/page-slug.png 1024w, ' . esc_url( CF7CL_URL ) . 'images/page-slug-300x59.png 300w, ' . esc_url( CF7CL_URL ) . 'images/page-slug-768x152.png 768w, ' . esc_url( CF7CL_URL ) . 'images/page-slug-1024x202.png 1024w, ' . esc_url( CF7CL_URL ) . 'images/page-slug-586x116.png 586w" sizes="(max-width: 1188px) 100vw, 1188px"><figcaption>' . wp_kses( __( 'Figure 2.: This is the page (or post) slug.', 'cf7-conditional' ), $arr ) . '</figcaption></figure><figure><img style="max-width:100%;height:auto;border:5px solid gray;border-radius:5px;" src="' . esc_url( CF7CL_URL ) . 'images/meta-box.png" alt="' . esc_attr__( 'Figure 3.: You can also load <abbr>CF7</abbr> scripts and styles by ticking the checkbox in the meta box on any page or post', 'cf7-conditional' ) . '" width="1024" height="488" class="size-full" srcset="' . esc_url( CF7CL_URL ) . 'images/meta-box.png 1024w, ' . esc_url( CF7CL_URL ) . 'images/meta-box-300x290.png 300w, ' . esc_url( CF7CL_URL ) . 'images/meta-box-768x743.png 768w, ' . esc_url( CF7CL_URL ) . 'images/meta-box-1024x743.png 1024w, ' . esc_url( CF7CL_URL ) . 'images/meta-box-586x567.png 586w" sizes="(max-width: 1188px) 100vw, 1188px"><figcaption>' . wp_kses( __( 'Figure 3.: You can also load <abbr>CF7</abbr> scripts and styles by ticking the checkbox in the meta box on any page or post.', 'cf7-conditional' ), $arr ) . '</figcaption></figure><p>' . wp_kses( __( 'Enter a list of the page <abbr>ID</abbr>s (numerical) or page slugs (lowercase letters, numerals, &amp; hyphens) where you want to load the stylesheet and javascript for Contact Form 7. One page <abbr>ID</abbr> or slug per line. See Figures 1 and 2.', 'cf7-conditional' ), $arr ) . '</p><p>' . wp_kses( __( 'Additionally, you may enable <abbr>CF7</abbr> from any individual post or page editor screen. See Figure 3.', 'cf7-conditional' ), $arr );
}

/**
 * Retrieve the allowed pages array.
 *
 * @since 1.0.0
 */
function cf7cl_option_pages() {
	$posts = get_option( 'cf7cl_conditional_load', '' );
	return $posts; // String needed for cf7cl_option_render().
}

/**
 * Which pages to load script on.
 *
 * @since 1.0.0
 */
function cf7cl_option_result() {
	$posts  = cf7cl_option_pages();
	$post   = array_map( 'trim', explode( PHP_EOL, $posts ) ); // create array; split string at newline.
	$result = implode( ',', $post ); // reassemble as comma delimited list.
	$result = rtrim( $result ); // get rid of extra whitespace.
	return $result; // String needed for cf7cl_disable_wpcf7().
}

/**
 * Display the archive option checkbox.
 * @since 1.0.25
 */
function cf7cl_archive_checkbox() {
	// Allowed HTML.
	$arr = array(
		'input' => array(
			'type'    => array(),
			'id'      => array(),
			'name'    => array(),
			'value'   => array(),
			'checked' => array(),
		),
	);

	$archive = get_option( 'cf7cl_archive' );
	// Is the option 'cf7cl_archive' set in the database?
	if ( ! isset( $archive[0] ) ) {
		// Set the option to false.
		$archive[0] = 0;
	};
	// Compare the stored value with 1. Stored value is 1 if user checks the
	// checkbox, otherwise empty string. Third parameter: true = echo; false =
	// return.
	$html = '<input type="checkbox" id="cf7cl_archive" name="cf7cl_archive[0]" value="1"' . checked( 1, $archive[0], false ) . ' />';

	echo wp_kses( $html, $arr );
}

/**
 * Ensure saved options are persistently displayed in the form textarea.
 *
 * @since 1.0.0
 */
function cf7cl_option_render() {
	$arr = array(
		'abbr' => array(),
		'em'   => array(),
	);

	$posts = cf7cl_option_pages();

	// We've already escaped this output, so ignore warnings.
	echo '<label for="cf7cl_archive">Disable on archives? </label>' . cf7cl_archive_checkbox(); // phpcs:ignore
	echo '<p>' . wp_kses( __( 'Disables Contact Form 7 on all archives, <em>including the home page</em> if it displays an archive. <em>Do not select this option</em> if you need to load contact forms on <em>any</em> archives.</p>', 'cf7-conditional' ), $arr ) . '</p><br><label for="cf7cl_conditional_load" style="display:block;margin-bottom:15px">' . wp_kses( __( '<abbr>ID</abbr>s and/or slugs', 'cf7-conditional' ), $arr ) . '</label><textarea rows="5" cols="50" placeholder="' . wp_kses( __( 'Load Contact Form 7 on these pages. Enter one page <abbr>ID</abbr> or slug per line.', 'cf7-conditional' ), $arr ) . '" name="cf7cl_conditional_load" id="cf7cl_conditional_load" value="' . esc_html( $posts ) . '">' . esc_html( $posts ) . '</textarea>';
}

/**
 * Load the Contact Form 7 scripts & styles only on the whitelisted pages.
 *
 * @since 1.0.0
 */
function cf7cl_disable_wpcf7() {
	// The string set by the textbox on the settings page.
	$archive     = get_option( 'cf7cl_archive' );
	$result      = cf7cl_option_result();
	$the_post_id = get_the_ID();
	// Needed to retrieve page ID outside of the loop; see note here:
	// https://developer.wordpress.org/reference/functions/get_the_id/.
	$object_id = get_queried_object();

	$meta = '0';
	// Does the post meta exist?
	if ( metadata_exists( 'page', $object_id, 'cf7cl_checkbox_value' ) || metadata_exists( 'post', $the_post_id, 'cf7cl_checkbox_value' ) ) {
		// The post meta, '0' or '1', set by ticking the checkbox in the metabox.
		$meta = get_post_meta( $the_post_id, 'cf7cl_checkbox_value', true );
	}

	if ( ! empty( $result ) ) {
		// Return to array.
		$result = explode( ',', $result );
	}

	// Are the scripts enqueued & registered?
	if ( ( wp_script_is( 'contact-form-7', 'enqueued' ) ) && ( wp_script_is( 'contact-form-7', 'registered' ) ) ) {
		// Is the page name, ID, or slug in the array? Is the metabox checkbox
		// "checked"? If not, deregister! Also, deregister on archives if the
		// settings checkbox is checked.
		if ( ( ! is_page( $result ) && '0' === $meta ) || ( '0' !== $archive && is_archive() ) ) {
			wp_dequeue_script( 'contact-form-7' );
			wp_deregister_script( 'contact-form-7' );
		}
	}

	if ( ( wp_style_is( 'contact-form-7', 'enqueued' ) ) && ( wp_style_is( 'contact-form-7', 'registered' ) ) ) {
		if ( ( ! is_page( $result ) && '0' === $meta ) || ( '0' !== $archive && is_archive() ) ) {
			wp_dequeue_style( 'contact-form-7' );
			wp_deregister_style( 'contact-form-7' );
		}
	}

	if ( ( wp_script_is( 'wpcf7-recaptcha', 'enqueued' ) ) && ( wp_script_is( 'wpcf7-recaptcha', 'registered' ) ) ) {
		if ( ( ! is_page( $result ) && '0' === $meta ) || ( '0' !== $archive && is_archive() ) ) {
			wp_dequeue_script( 'wpcf7-recaptcha' );
			wp_deregister_script( 'wpcf7-recaptcha' );
		}
	}

	if ( ( wp_script_is( 'google-recaptcha', 'enqueued' ) ) && ( wp_script_is( 'google-recaptcha', 'registered' ) ) ) {
		if ( ( ! is_page( $result ) && '0' === $meta ) || ( '0' !== $archive && is_archive() ) ) {
			wp_dequeue_script( 'google-recaptcha' );
			wp_deregister_script( 'google-recaptcha' );
		}
	}

	// CF7 Multi-Step scripts.
	if ( ( wp_script_is( 'cf7msm', 'enqueued' ) ) && ( wp_script_is( 'cf7msm', 'registered' ) ) ) {
		if ( ( ! is_page( $result ) && '0' === $meta ) || ( '0' !== $archive && is_archive() ) ) {
			wp_dequeue_script( 'cf7msm' );
			wp_deregister_script( 'cf7msm' );
		}
	}

	// CF7 Multi-Step styles.
	if ( ( wp_style_is( 'cf7msm_styles', 'enqueued' ) ) && ( wp_style_is( 'cf7msm_styles', 'registered' ) ) ) {
		if ( ( ! is_page( $result ) && '0' === $meta ) || ( '0' !== $archive && is_archive() ) ) {
			wp_dequeue_style( 'cf7msm_styles' );
			wp_deregister_style( 'cf7msm_styles' );
		}
	}

	// CF7 Drag & Drop Multi-File Upload scripts.
	if ( ( wp_script_is( 'codedropz-uploader', 'enqueued' ) ) && ( wp_script_is( 'codedropz-uploader', 'registered' ) ) ) {
		if ( ( ! is_page( $result ) && '0' === $meta ) || ( '0' !== $archive && is_archive() ) ) {
			wp_dequeue_script( 'codedropz-uploader' );
			wp_deregister_script( 'codedropz-uploader' );
		}
	}

	// CF7 Drag & Drop Multi-File Upload scripts.
	if ( ( wp_script_is( 'dnd-upload-cf7', 'enqueued' ) ) && ( wp_script_is( 'dnd-upload-cf7', 'registered' ) ) ) {
		if ( ( ! is_page( $result ) && '0' === $meta ) || ( '0' !== $archive && is_archive() ) ) {
			wp_dequeue_script( 'dnd-upload-cf7' );
			wp_deregister_script( 'dnd-upload-cf7' );
		}
	}

	// CF7 Drag & Drop Multi-File Upload styles.
	if ( ( wp_style_is( 'dnd-upload-cf7', 'enqueued' ) ) && ( wp_style_is( 'dnd-upload-cf7', 'registered' ) ) ) {
		if ( ( ! is_page( $result ) && '0' === $meta ) || ( '0' !== $archive && is_archive() ) ) {
			wp_dequeue_style( 'dnd-upload-cf7' );
			wp_deregister_style( 'dnd-upload-cf7' );
		}
	}

	// CF7 Conditional Fields scripts.
	if ( ( wp_script_is( 'wpcf7cf-scripts', 'enqueued' ) ) && ( wp_script_is( 'wpcf7cf-scripts', 'registered' ) ) ) {
		if ( ( ! is_page( $result ) && '0' === $meta ) || ( '0' !== $archive && is_archive() ) ) {
			wp_dequeue_script( 'wpcf7cf-scripts' );
			wp_deregister_script( 'wpcf7cf-scripts' );
		}
	}

	// CF7 Conditional Fields styles.
	if ( ( wp_style_is( 'cf7cf-style', 'enqueued' ) ) && ( wp_style_is( 'cf7cf-style', 'registered' ) ) ) {
		if ( ( ! is_page( $result ) && '0' === $meta ) || ( '0' !== $archive && is_archive() ) ) {
			wp_dequeue_style( 'cf7cf-style' );
			wp_deregister_style( 'cf7cf-style' );
		}
	}

	// CF7 jQuery Validate scripts.
	if ( ( wp_script_is( 'jvcf7_jquery_validate', 'enqueued' ) ) && ( wp_script_is( 'jvcf7_jquery_validate', 'registered' ) ) ) {
		if ( ( ! is_page( $result ) && '0' === $meta ) || ( '0' !== $archive && is_archive() ) ) {
			wp_dequeue_script( 'jvcf7_jquery_validate' );
			wp_deregister_script( 'jvcf7_jquery_validate' );
		}
	}

	// CF7 jQuery Validate scripts.
	if ( ( wp_script_is( 'jvcf7_validation', 'enqueued' ) ) && ( wp_script_is( 'jvcf7_validation', 'registered' ) ) ) {
		if ( ( ! is_page( $result ) && '0' === $meta ) || ( '0' !== $archive && is_archive() ) ) {
			wp_dequeue_script( 'jvcf7_validation' );
			wp_deregister_script( 'jvcf7_validation' );
		}
	}

	// CF7 jQuery Validate styles.
	if ( ( wp_script_is( 'cf7msm_styles', 'enqueued' ) ) && ( wp_script_is( 'cf7msm_styles', 'registered' ) ) ) {
		if ( ( ! is_page( $result ) && '0' === $meta ) || ( '0' !== $archive && is_archive() ) ) {
			wp_dequeue_style( 'cf7msm_styles' );
			wp_deregister_style( 'cf7msm_styles' );
		}
	}}

add_action( 'wp_enqueue_scripts', 'cf7cl_disable_wpcf7', 1000 ); // 1000 instead of default 10 to defer this action so it fires after CF7.

/**
 * Activation notice.
 *
 * @since 1.0.0
 */
function cf7cl_error_notice() {
	if ( is_plugin_active( plugin_dir_path( __FILE__ ) . 'contact-form-7/wp-contact-form-7.php' ) ) {
		?>
<div class="error notice is-dismissible">
	<p>
		<?php
		esc_html_e( 'You have installed and activated the Contact Form 7 plugin.', 'cf7-conditional' );
		echo ' <a href="' . esc_url( admin_url( 'options-general.php?page=cf7-conditional-load' ) );
		echo '">';
		esc_html_e( 'Please configure Conditionally Load CF7 Settings', 'cf7-conditional' );
		echo '</a>.';
		?>
	</p>
</div>
		<?php
	}
}

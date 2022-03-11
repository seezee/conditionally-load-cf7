<?php
/**
 * Metabox for pages & posts.
 *
 * @package Conditionally Load CF7/Includes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * The Class.
 */
class CF7_Conditional_Load_Meta_Box {

	/**
	 * Constructor function.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'cf7cl_add_meta_box' ) );
		add_action( 'save_post', array( $this, 'cf7cl_save_metaboxes' ) );
	}

	/**
	 * Add meta box to page screen.
	 *
	 * This function handles the addition of variuos meta boxes to your page or
	 * post screens. You can add as many meta boxes as you want, but as a rule of
	 * thumb it's better to add only what you need. If you can logically fit
	 * everything in a single metabox then add it in a single meta box, rather than
	 * putting each control in a separate meta box.
	 *
	 * @param string $post_type The post type.
	 *
	 * @since 1.0.0
	 */
	public function cf7cl_add_meta_box( $post_type ) {
		$post_types = array( 'post', 'page' );

		if ( in_array( $post_type, $post_types, true ) ) {
			add_meta_box(
				'cf7cl-post-options',
				esc_html__( 'Conditionally Load CF7', 'cf7-conditional' ),
				array( $this, 'cf7cl_metabox_controls' ),
				$post_type,
				'side'
			);
		}

	}

	/**
	 * Add the form to the metabox.
	 *
	 * @param object $post The post object.
	 */
	public function cf7cl_metabox_controls( $post ) {
		$meta                 = get_post_meta( $post->ID );
		$cf7cl_checkbox_value = ( isset( $meta['cf7cl_checkbox_value'][0] ) && '1' === $meta['cf7cl_checkbox_value'][0] ) ? 1 : 0;
		$post_type            = get_post_type( get_the_ID() );
		wp_nonce_field( 'cf7cl_control_meta_box', 'cf7cl_control_meta_box_nonce' ); // Always add nonce to your meta boxes!
		?>
<h2>
		<?php
		// translators: the placeholder in this phrase is either "page" or "post".
		printf( esc_html__( 'Load Contact Form 7 scripts &amp; styles on this %s.', 'cf7-conditional' ), esc_html( $post_type ) );
		?>
</h2>
<p>
	<label class="components-checkbox-control__label"><input type="checkbox" name="cf7cl_checkbox_value" value="1" <?php checked( $cf7cl_checkbox_value, 1 ); ?> /><?php esc_attr_e( 'Load CF7', 'cf7-conditional' ); ?></label>
</p>
		<?php
	}

	/**
	 * Save controls from the meta boxes
	 *
	 * @param int $post_id Current post id.
	 * @since 1.0.0
	 */
	public function cf7cl_save_metaboxes( $post_id ) {
		$post_id = get_the_ID();

		/**
		 * We need to verify this came from the our screen and with proper
		 * authorization, because save_post can be triggered at other times. Add as
		 * many nonces as you have metaboxes.
		 */
		if ( ! isset( $_POST['cf7cl_control_meta_box_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['cf7cl_control_meta_box_nonce'] ), 'cf7cl_control_meta_box' ) ) { // Input var okay.
			return $post_id;
		}

		// Check the user's permissions.
		if ( isset( $_POST['post_type'] ) && ( 'page' === $_POST['post_type'] || 'post' === $_POST['post_type'] ) ) { // Input var okay.
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
		}

		/*
		 * If this is an autosave, our form has not been submitted, so we don't want
		 * to do anything.
		 */
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		/* Ok to save */

		$cf7cl_checkbox_value = ( isset( $_POST['cf7cl_checkbox_value'] ) && '1' === $_POST['cf7cl_checkbox_value'] ) ? 1 : 0; // Input var okay.
		update_post_meta( $post_id, 'cf7cl_checkbox_value', sanitize_key( $cf7cl_checkbox_value ) );

	}
}

new CF7_Conditional_Load_Meta_Box();

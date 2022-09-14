<?php

/* Custom Metabox Functions
 *
 * By: Mark Caron (mark.caron@gmail.com)
 *
**/


/**
 * Client Add Meta Box for Page Templates
 *
 * Add meta boxes to Specfic Page(s)
 */
function client_template_add_meta_box() {
	global $typenow;
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	$template_file = get_post_meta( $post_id, '_wp_page_template', true );
  $current_screen = get_current_screen();

	// check for a template type
	if ( $template_file == 'template-home.php' ) {
		add_meta_box(CLIENT_SLUG . '_home_meta', 'Hero Image Box', 'client_custom_meta_home', 'page', 'normal', 'high');
		add_meta_box(CLIENT_SLUG . '_home_meta2', 'Additional Home Page Content', 'client_custom_meta_home_addtl', 'page', 'normal', 'high');
	}

	if ( $template_file == 'template-donate.php' ) {
		add_meta_box(CLIENT_SLUG . '_donate_meta', 'Donate Band 1', 'client_custom_meta_donate', 'page', 'normal', 'high');
		add_meta_box(CLIENT_SLUG . '_donate_meta2', 'Donate Band 2', 'client_custom_meta_donate2', 'page', 'normal', 'high');
		add_meta_box(CLIENT_SLUG . '_donate_meta3', 'Donate Band 3', 'client_custom_meta_donate3', 'page', 'normal', 'high');
		add_meta_box(CLIENT_SLUG . '_donate_meta4', 'Donate Band 4', 'client_custom_meta_donate4', 'page', 'normal', 'high');
		add_meta_box(CLIENT_SLUG . '_donate_meta5', 'Donate Band 5', 'client_custom_meta_donate5', 'page', 'normal', 'high');
	}

	if ( $template_file == 'template-2col.php' ) {
		add_meta_box(CLIENT_SLUG . '_2col_meta', '2nd Column Content', 'client_custom_meta_2col', 'page', 'normal', 'high');
	}

	if ( $template_file == 'template-bands.php' ) {
		add_meta_box(CLIENT_SLUG . '_bands_meta', 'Band Content', 'client_custom_meta_bands', 'page', 'normal', 'high');
	}

	if ( $typenow == 'page' ) {
		add_meta_box(CLIENT_SLUG . '_page_meta', 'Sidebar Content', 'client_custom_meta_sidebarbox', 'page', 'side', 'low');
	}

}
add_action( 'add_meta_boxes', 'client_template_add_meta_box' );



/**
 * Client Save PostData
 *
 * Save meta box data
 */
function client_template_save_postdata( $post_id ) {
	$P = CLIENT_SLUG . '_custom_meta';

	if(!isset($_POST[$P])){
		return $post_id;
	}
	$meta = $_POST[$P];
	update_post_meta($post_id, $P, $meta);
}
add_action( 'save_post', 'client_template_save_postdata' );


// For adding a field to the Featured Image
// function add_featured_image_display_settings( $content, $post_id ) {
//     $field_id    = 'featured_image_adjust_y';
//     $field_value = esc_attr( get_post_meta( $post_id, $field_id, true ) );
//     $field_text  = esc_html__( 'Vertical placement adjustment', 'gmfnc' );
//     $field_help  = esc_html__( '(e.g. +/- 50%)', 'gmfnc' );
//
//     $field_label = sprintf(
//         '<p><label for="%1$s">%3$s</label><input type="text" name="%1$s" id="%1$s" value="%2$s"><em class="summary">%4$s</em></p>',
//         $field_id, $field_value, $field_text, $field_help
//     );
//
//     return $content .= $field_label;
// }
// add_filter( 'admin_post_thumbnail_html', 'add_featured_image_display_settings', 10, 2 );

// function save_featured_image_display_settings( $post_ID, $post, $update ) {
//     $field_id    = 'featured_image_adjust_y';
//     $field_value = isset( $_REQUEST[ $field_id ] ) ? $_REQUEST[ $field_id ] : '';
//
//     update_post_meta( $post_ID, $field_id, $field_value );
// }
// add_action( 'save_post', 'save_featured_image_display_settings', 10, 3 );



function client_custom_meta_sidebarbox( $post ) {
	global $post;
	$metavarname = CLIENT_SLUG . '_custom_meta';

	//get the values
	$meta = get_post_meta($post->ID, $metavarname, true);

	$sidemenu_display = ( !empty( $meta['sidemenu_display'] ) ) ? $meta['sidemenu_display'] : '';
	$featured_image_adjust_y = ( !empty( $meta['featured_image_adjust_y'] ) ) ? $meta['featured_image_adjust_y'] : '';

	?>
	<input type="hidden" style="display: none;" name="<?php echo $metavarname; ?>[nugget2]" value="true" />

  <p class="field-group">
      <input name="<?php echo $metavarname; ?>[sidemenu_display]" id="<?php echo $metavarname; ?>_sidemenu_display" type="checkbox" value="1"<?php echo ($sidemenu_display != '') ? ' checked="checked"' : ''; ?> />
      <label for="<?php echo $metavarname; ?>_sidemenu_display">Display Sidemenu</label>
  </p>

	<p class="field-group">
      <input name="<?php echo $metavarname; ?>[featured_image_adjust_y]" id="<?php echo $metavarname; ?>_featured_image_adjust_y" type="text" value="<?php echo $featured_image_adjust_y; ?>" />
      <label for="<?php echo $metavarname; ?>_featured_image_adjust_y">Vertical placement adjustment</label>
			<em class="summary">(e.g. +/- 50%)</em>
  </p>
	<?php
}

<?php

/* Custom Bio Post Type
 *
 * By: Mark Caron (mark.caron@gmail.com)
 *
**/

add_action( 'init', 'custom_bios_post_type' );
function custom_bios_post_type() {

	register_post_type(	'bios',
		array(
			'labels' => array(
				'name' => __( 'Bios' ),
				'singular_name' => __( 'Bio' )
			),
			'public' => true,
            'exclude_from_search' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'bios', 'with_front' => false),
			'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
			'hierarchical' => true,
			'menu_icon' => 'dashicons-businessman'
		)
	);

	add_action('save_post', 'custom_bios_save_meta', 1, 2); // save the custom fields /

}

add_action( 'add_meta_boxes', 'custom_bios_add_metaboxes' );
function custom_bios_add_metaboxes() {
    add_meta_box('custom_bios_metabox', 'Personal Info', 'custom_bios_metabox', 'bios', 'normal', 'high');
}

function custom_bios_metabox() {
    global $post;
    $typename = 'bios';
    $meta = get_post_meta($post->ID, $typename, true);

    $bio_board_position = ( !empty( $meta['bio_board_position'] ) ) ? $meta['bio_board_position'] : '';
    $bio_title = ( !empty( $meta['bio_title'] ) ) ? $meta['bio_title'] : '';
    $bio_company = ( !empty( $meta['bio_company'] ) ) ? $meta['bio_company'] : '';
    // pbug($meta);

    // Noncename needed to verify where the data originated
    wp_nonce_field( $typename, $typename . "-nonce" );
    ?>

    <div class="row">
        <div class="col-md-6">
            <p class="field-group">
                <label for="<?php echo $typename; ?>_bio_board_position">Board Position:</label>
                <input type="text" id="<?php echo $typename; ?>_bio_board_position" name="<?php echo $typename; ?>[bio_board_position]" value="<?php echo $bio_board_position; ?>" class="form-control" />
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <p class="field-group">
                <label for="<?php echo $typename; ?>_bio_title">Job Title:</label>
                <input type="text" id="<?php echo $typename; ?>_bio_title" name="<?php echo $typename; ?>[bio_title]" value="<?php echo $bio_title; ?>" class="form-control" />
            </p>
        </div>
        <div class="col-md-6">
            <p class="field-group">
                <label for="<?php echo $typename; ?>_bio_company">Company:</label>
                <input type="text" id="<?php echo $typename; ?>_bio_company" name="<?php echo $typename; ?>[bio_company]" value="<?php echo $bio_company; ?>" class="form-control" />
            </p>
        </div>
    </div>

    <div class="clear"></div>
    <?php
}


function custom_bios_save_meta($post_id, $post) {
    $typename = 'bios';

    $id = $post->ID;

    //nothing to do?
	if(!isset($_POST[$typename])){
		return $id;
	}

	$meta = $_POST[$typename];

	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if (!wp_verify_nonce($_POST[$typename . "-nonce"], $typename)) return $id; //nonce

	// verify if this is an auto save routine.
	// If it is our form has not been submitted, so we dont want to do anything
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return $id;

	// make sure we're the right post type?
	if( $typename != $_POST['post_type'] )
		return $id;

	// OK, we're authenticated: we need to find and save the data

	// regular post meta data
	update_post_meta($id, $typename, $meta);

}

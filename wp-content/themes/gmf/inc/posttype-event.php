<?php

/* Custom Event Post Type
 *
 * By: Mark Caron (mark.caron@gmail.com)
 *
**/

add_action( 'init', 'custom_events_post_type' );
function custom_events_post_type() {

	register_post_type(	'events',
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Event' )
			),
			'public' => true,
            'exclude_from_search' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'events', 'with_front' => false),
			'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
			'hierarchical' => true,
			'menu_icon' => 'dashicons-calendar-alt'
		)
	);

	add_action('save_post', 'custom_events_save_meta', 1, 2); // save the custom fields /

}

add_action( 'add_meta_boxes', 'custom_events_add_metaboxes' );
function custom_events_add_metaboxes() {
    add_meta_box('custom_events_metabox', 'Event Info', 'custom_events_metabox', 'events', 'normal', 'high');
}

function custom_events_metabox() {
    global $post;
    $typename = 'events';
    $meta = get_post_meta($post->ID, $typename, true);

    $event_hide = ( !empty( $meta['event_hide'] ) ) ? $meta['event_hide'] : '';

    $event_location = ( !empty( $meta['event_location'] ) ) ? $meta['event_location'] : '';
    $event_date = ( !empty( $meta['event_date'] ) ) ? $meta['event_date'] : '';
    // pbug($meta);

    // Noncename needed to verify where the data originated
    wp_nonce_field( $typename, $typename . "-nonce" );
    ?>

    <div class="row">
        <div class="col-md-9">
            <p class="field-group">
                <label for="<?php echo $typename; ?>_event_location">Resort Location:</label>
                <input type="text" id="<?php echo $typename; ?>_event_location" name="<?php echo $typename; ?>[event_location]" value="<?php echo $event_location; ?>" class="form-control" />
            </p>
        </div>
        <div class="col-md-3">
            <p class="field-group">
                <label for="<?php echo $typename; ?>_event_date">Event Date:</label>
                <input type="text" id="<?php echo $typename; ?>_event_date" name="<?php echo $typename; ?>[event_date]" value="<?php echo $event_date; ?>" class="form-control" />
                <em class="summary"><code>YYYY-MM-DD</code></em>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="field-group checkbox-group">
                <input name="<?php echo $typename; ?>[event_hide]" id="<?php echo $typename; ?>_event_hide" type="checkbox" value="1"<?php echo ($event_hide != '') ? ' checked' : ''; ?> />
                <label for="<?php echo $typename; ?>_event_hide">Hide Event</label>
            </p>
        </div>
    </div>

    <div class="clear"></div>
    <?php
}


function custom_events_save_meta($post_id, $post) {
    $typename = 'events';

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

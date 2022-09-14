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
      'exclude_from_search' => false,
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
		$news_event = ( !empty( $meta['news_event'] ) ) ? $meta['news_event'] : '';
    // pbug($meta);

    // Noncename needed to verify where the data originated
    wp_nonce_field( $typename, $typename . "-nonce" );
    ?>
		<div class="row">
				<div class="col-md-6">
					<fieldset>
						<legend>Event or News Type:</legend>
						<p class="field-group checkbox-group">
								<input name="<?php echo $typename; ?>[news_event]" id="<?php echo $typename; ?>_news_event_event" type="radio" value="event"<?php echo ($news_event === 'event') ? ' checked' : ''; ?> />
								<label for="<?php echo $typename; ?>_news_event_event">Event</label>
						</p>
						<p class="field-group checkbox-group">
								<input name="<?php echo $typename; ?>[news_event]" id="<?php echo $typename; ?>_news_event_fundraiser" type="radio" value="fundraiser"<?php echo ($news_event === 'fundraiser') ? ' checked' : ''; ?> />
								<label for="<?php echo $typename; ?>_news_event_fundraiser">Fundraiser</label>
						</p>
						<p class="field-group checkbox-group">
								<input name="<?php echo $typename; ?>[news_event]" id="<?php echo $typename; ?>_news_event_news" type="radio" value="news"<?php echo ($news_event === 'news') ? ' checked' : ''; ?> />
								<label for="<?php echo $typename; ?>_news_event_news">News</label>
						</p>
					</fieldset>
				</div>
		</div>
    <div class="row">
      <div class="col-md-9">
          <p class="field-group">
              <label for="<?php echo $typename; ?>_event_location">Location:</label>
              <input type="text" id="<?php echo $typename; ?>_event_location" name="<?php echo $typename; ?>[event_location]" value="<?php echo $event_location; ?>" class="form-control" />
							<em class="summary">If applicable</em>
					</p>
      </div>
      <div class="col-md-3">
          <p class="field-group">
              <label for="<?php echo $typename; ?>_event_date">Event Date:</label>
              <input type="text" id="<?php echo $typename; ?>_event_date" name="<?php echo $typename; ?>[event_date]" value="<?php echo $event_date; ?>" class="form-control" />
              <em class="summary"><code>YYYY-MM-DD</code></em>
							<em class="summary">For News or Fundraisers with no date enter <code>N/A</code> for it to show up on the home page</em>
          </p>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="field-group checkbox-group">
                <input name="<?php echo $typename; ?>[event_hide]" id="<?php echo $typename; ?>_event_hide" type="checkbox" value="1"<?php echo ($event_hide != '') ? ' checked' : ''; ?> />
                <label for="<?php echo $typename; ?>_event_hide">Hide News/Event</label>
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

function gmf_events_shortcode_hp( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'num' => ''
	), $atts ) );

    if ( !empty($num) ):
			$query_args = array(
				'post_type' => 'events',
				'posts_per_page' => $num,
				'nopaging' => false,
				'orderby' => 'date',
				'order' => 'DESC'
			);
		else:
			$query_args = array(
				'post_type' => 'events',
				'posts_per_page' => -1,
				'nopaging' => true,
				'orderby' => 'date',
				'order' => 'DESC'
			);
		endif;

    $events_query = new WP_query( $query_args );
    $events_output = '';

    if ( $events_query->have_posts() ):

    	$events =  $events_query->posts;

			$events_output .= '<div class="hp-events">';

    	foreach( $events as $event ):

				$typename = 'events';
		    $meta = get_post_meta($event->ID, $typename, true);

				// Is News or Event?
				$news_event = ( !empty( $meta['news_event'] ) ) ? $meta['news_event'] : '';
				$news_event_html = ($news_event !== '') ? '<strong class="type type-' . $news_event . '">' . ucfirst($news_event) . '</strong>' : '';

				// Location
				$event_location = ( !empty( $meta['event_location'] ) ) ? $meta['event_location'] : '';

				// Date
				$event_date_string = ( !empty( $meta['event_date'] ) ) ? $meta['event_date'] : '';

				$isTBD = strpos($event_date_string, 'TBD');
				$isNA = strpos($event_date_string, 'N/A');

				if ( $isTBD !== false ) {
					$event_date_formatted = $event_date_string;
				} elseif ( $isNA !== false ) {
					$event_date_formatted = '';
				} else {
					$event_date = new DateTime($event_date_string);
					$event_date_formatted = $event_date->format('F d, Y');
				}


				// For comparing event date/time to NOW
				$today = strtotime('now');
				$event_compare = strtotime($event_date_string);

				$show_event = false;

				if ($news_event === 'event' || $news_event === 'fundraiser'):
					if ( $isTBD !== false || $isNA !== false  ) {
						$show_event = true;
						$event_date_html = '<em class="date">' . $event_date_formatted . '</em>';
					} else {
						$event_date_html = ($event_date !== '') ? '<em class="date"><span>On </span><time datetime="' . $event_date_string . '">' . $event_date_formatted . '</time></em>' : '';
						$show_event = ($event_compare >= $today);
					}
				else:
					if ( $isTBD !== false || $isNA !== false  ) {
						$show_event = true;
						$event_date_html = '<em class="date">' . $event_date_formatted . '</em>';
					} else {
						$event_date_html = ($event_date !== '') ? '<em class="date"><span>Posted on </span><time datetime="' . $event_date_string . '">' . $event_date_formatted . '</time></em>' : '';
						$show_event = ($event_compare >= $today);
					}
				endif;

				// If date/time hasn't passed.
				if ($show_event === true):
					// Build Output
					$events_output .= '<article class="hp-event"><header class="entry-header">';
					$events_output .= '<h3 class="entry-title"><a href="' . esc_url( get_permalink($event->ID) ) . '" rel="bookmark">' . esc_html( get_the_title($event->ID) ) . '</a></h3>';
		    	$events_output .= '<div class="entry-meta">';
					$events_output .= ($news_event_html != '') ? $news_event_html . ' ' : $news_event_html;
					$events_output .= $event_date_html;
					$events_output .= '</div></header><div class="entry-content">';
					$events_output .= esc_html( get_the_excerpt($event->ID) );
					$events_output .= '&nbsp;<a href="' . esc_url( get_permalink($event->ID) ) . '" aria-label="Read more: ' . esc_html( get_the_title($event->ID) ) . '">Read more</a>';
					$events_output .= '</div></article>';

				endif;

    	endforeach;

			$events_output .= '</div>';

    else:
    	$events_output = '<div class="alert">Sorry, there are no events.</div>';
    endif;

	return $events_output;
}

add_action('init', 'gmf_events_register_shortcodes', 100);
function gmf_events_register_shortcodes() {

	add_shortcode( 'events_hp', 'gmf_events_shortcode_hp' ); // adds instructors shortcode

	do_action('gmf_events_register_shortcodes');
}

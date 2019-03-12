<?php

/* Custom Metabox for Home
 * Requires: custom-metaboxes.php
 *
 * By: Mark Caron (mark.caron@gmail.com)
 *
**/

/* For loading of this function, see custom-metaboxes.php. */

function client_custom_meta_2col( $post ) {
	global $post;
	$metavarname = CLIENT_SLUG . '_custom_meta';

	//get the values
	$meta = get_post_meta($post->ID, $metavarname, true);

	$col_content = ( !empty( $meta['col_content'] ) ) ? $meta['col_content'] : '';

	?>
	<div class="field-group">
		<label for="<?php echo $metavarname; ?>_col_content">2nd Column Content</label>
		<?php

			$textareaID = $metavarname . '_col_content';
			$settings = array(
				'textarea_name' => $metavarname . '[col_content]',
				'editor_class' => 'col_content'
			);

			wp_editor( $col_content, $textareaID, $settings );
		?>
	</div>
	<?php
}

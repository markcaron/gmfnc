<?php

/* Custom Metabox for Home
 * Requires: custom-metaboxes.php
 *
 * By: Mark Caron (mark.caron@gmail.com)
 *
**/

/* For loading of this function, see custom-metaboxes.php. */

function client_custom_meta_donate( $post ) {
	global $post;
	$metavarname = CLIENT_SLUG . '_custom_meta';

	//get the values
	$meta = get_post_meta($post->ID, $metavarname, true);

	$donate_title = ( !empty( $meta['donate_title'] ) ) ? $meta['donate_title'] : '';
	$donate_content = ( !empty( $meta['donate_content'] ) ) ? $meta['donate_content'] : '';
	$donate_button_text = ( !empty( $meta['donate_button_text'] ) ) ? $meta['donate_button_text'] : '';
	$donate_button_link = ( !empty( $meta['donate_button_link'] ) ) ? $meta['donate_button_link'] : '';

	?>
	<p class="field-group">
		<label for="<?php echo $metavarname; ?>_donate_title">Donate Heading</label>
		<input name="<?php echo $metavarname; ?>[donate_title]" id="<?php echo $metavarname; ?>_donate_title" type="text" value="<?php echo $donate_title; ?>" class="form-control" />
	</p>
	<div class="field-group">
		<label for="<?php echo $metavarname; ?>_donate_content">Donate Content</label>
		<?php

			$textareaID = $metavarname . '_donate_content';
			$settings = array(
				'textarea_name' => $metavarname . '[donate_content]',
				'editor_class' => 'donate_content'
			);

			wp_editor( $donate_content, $textareaID, $settings );
		?>
	</div>
	<p class="field-group">
		<label for="<?php echo $metavarname; ?>_donate_button_text">Donate Button Text</label>
		<input name="<?php echo $metavarname; ?>[donate_button_text]" id="<?php echo $metavarname; ?>_donate_button_text" type="text" value="<?php echo $donate_button_text; ?>" class="form-control" />
	</p>
	<p class="field-group">
		<label for="<?php echo $metavarname; ?>_donate_button_link">Donate Button Link (URL)</label>
		<input name="<?php echo $metavarname; ?>[donate_button_link]" id="<?php echo $metavarname; ?>_donate_button_link" type="text" value="<?php echo $donate_button_link; ?>" class="form-control" />
	</p>
	<?php
}

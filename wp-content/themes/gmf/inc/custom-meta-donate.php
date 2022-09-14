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

function client_custom_meta_donate2( $post ) {
	global $post;
	$metavarname = CLIENT_SLUG . '_custom_meta';

	//get the values
	$meta = get_post_meta($post->ID, $metavarname, true);

	$donate_title2 = ( !empty( $meta['donate_title2'] ) ) ? $meta['donate_title2'] : '';
	$donate_content2 = ( !empty( $meta['donate_content2'] ) ) ? $meta['donate_content2'] : '';

	?>
	<p class="field-group">
		<label for="<?php echo $metavarname; ?>_donate_title2">Donate Heading</label>
		<input name="<?php echo $metavarname; ?>[donate_title2]" id="<?php echo $metavarname; ?>_donate_title2" type="text" value="<?php echo $donate_title2; ?>" class="form-control" />
	</p>
	<div class="field-group">
		<label for="<?php echo $metavarname; ?>_donate_content2">Donate Content</label>
		<?php

			$textareaID = $metavarname . '_donate_content2';
			$settings = array(
				'textarea_name' => $metavarname . '[donate_content2]',
				'editor_class' => 'donate_content2'
			);

			wp_editor( $donate_content2, $textareaID, $settings );
		?>
	</div>
	<?php
}

function client_custom_meta_donate3( $post ) {
	global $post;
	$metavarname = CLIENT_SLUG . '_custom_meta';

	//get the values
	$meta = get_post_meta($post->ID, $metavarname, true);

	$donate_title3 = ( !empty( $meta['donate_title3'] ) ) ? $meta['donate_title3'] : '';
	$donate_content3 = ( !empty( $meta['donate_content3'] ) ) ? $meta['donate_content3'] : '';

	?>
	<p class="field-group">
		<label for="<?php echo $metavarname; ?>_donate_title3">Donate Heading</label>
		<input name="<?php echo $metavarname; ?>[donate_title3]" id="<?php echo $metavarname; ?>_donate_title3" type="text" value="<?php echo $donate_title3; ?>" class="form-control" />
	</p>
	<div class="field-group">
		<label for="<?php echo $metavarname; ?>_donate_content3">Donate Content</label>
		<?php

			$textareaID = $metavarname . '_donate_content3';
			$settings = array(
				'textarea_name' => $metavarname . '[donate_content3]',
				'editor_class' => 'donate_content3'
			);

			wp_editor( $donate_content3, $textareaID, $settings );
		?>
	</div>
	<?php
}

function client_custom_meta_donate4( $post ) {
	global $post;
	$metavarname = CLIENT_SLUG . '_custom_meta';

	//get the values
	$meta = get_post_meta($post->ID, $metavarname, true);

	$donate_title4 = ( !empty( $meta['donate_title4'] ) ) ? $meta['donate_title4'] : '';
	$donate_content4 = ( !empty( $meta['donate_content4'] ) ) ? $meta['donate_content4'] : '';

	?>
	<p class="field-group">
		<label for="<?php echo $metavarname; ?>_donate_title4">Donate Heading</label>
		<input name="<?php echo $metavarname; ?>[donate_title4]" id="<?php echo $metavarname; ?>_donate_title4" type="text" value="<?php echo $donate_title4; ?>" class="form-control" />
	</p>
	<div class="field-group">
		<label for="<?php echo $metavarname; ?>_donate_content4">Donate Content</label>
		<?php

			$textareaID = $metavarname . '_donate_content4';
			$settings = array(
				'textarea_name' => $metavarname . '[donate_content4]',
				'editor_class' => 'donate_content3'
			);

			wp_editor( $donate_content4, $textareaID, $settings );
		?>
	</div>
	<?php
}

function client_custom_meta_donate5( $post ) {
	global $post;
	$metavarname = CLIENT_SLUG . '_custom_meta';

	//get the values
	$meta = get_post_meta($post->ID, $metavarname, true);

	$donate_title4 = ( !empty( $meta['donate_title5'] ) ) ? $meta['donate_title5'] : '';
	$donate_content4 = ( !empty( $meta['donate_content5'] ) ) ? $meta['donate_content5'] : '';

	?>
	<p class="field-group">
		<label for="<?php echo $metavarname; ?>_donate_title5">Donate Heading</label>
		<input name="<?php echo $metavarname; ?>[donate_title5]" id="<?php echo $metavarname; ?>_donate_title5" type="text" value="<?php echo $donate_title5; ?>" class="form-control" />
	</p>
	<div class="field-group">
		<label for="<?php echo $metavarname; ?>_donate_content5">Donate Content</label>
		<?php

			$textareaID = $metavarname . '_donate_content5';
			$settings = array(
				'textarea_name' => $metavarname . '[donate_content5]',
				'editor_class' => 'donate_content5'
			);

			wp_editor( $donate_content5, $textareaID, $settings );
		?>
	</div>
	<?php
}

<?php

/* Custom Metabox for Home
 * Requires: custom-metaboxes.php
 *
 * By: Mark Caron (mark.caron@gmail.com)
 *
**/

/* For loading of this function, see custom-metaboxes.php. */

function client_custom_meta_home( $post ) {
	global $post;
	$metavarname = CLIENT_SLUG . '_custom_meta';

	//get the values
	$meta = get_post_meta($post->ID, $metavarname, true);

	// $hp_hero_heading = ( !empty( $meta['hp_hero_heading'] ) ) ? $meta['hp_hero_heading'] : '';
	$hp_hero_content = ( !empty( $meta['hp_hero_content'] ) ) ? $meta['hp_hero_content'] : '';
	$hp_hero_button_text = ( !empty( $meta['hp_hero_button_text'] ) ) ? $meta['hp_hero_button_text'] : '';
	$hp_hero_button_link = ( !empty( $meta['hp_hero_button_link'] ) ) ? $meta['hp_hero_button_link'] : '';

	?>
	<!-- <p class="field-group">
		<label for="<?php echo $metavarname; ?>_hp_hero_heading">Hero Image Heading</label>
		<input name="<?php echo $metavarname; ?>[hp_hero_heading]" id="<?php echo $metavarname; ?>_hp_hero_heading" type="text" value="<?php echo $hp_hero_heading; ?>" class="form-control" />
	</p> -->
	<div class="field-group">
		<label for="<?php echo $metavarname; ?>_hp_hero_content">Hero Image Content</label>
		<?php

			$textareaID = $metavarname . '_hp_hero_content';
			$settings = array(
				'textarea_name' => $metavarname . '[hp_hero_content]',
				'editor_class' => 'hp-hero-content'
			);

			wp_editor( $hp_hero_content, $textareaID, $settings );
		?>
	</div>
	<p class="field-group">
		<label for="<?php echo $metavarname; ?>_hp_hero_button_text">Hero Button Text</label>
		<input name="<?php echo $metavarname; ?>[hp_hero_button_text]" id="<?php echo $metavarname; ?>_hp_hero_button_text" type="text" value="<?php echo $hp_hero_button_text; ?>" class="form-control" />
	</p>
	<p class="field-group">
		<label for="<?php echo $metavarname; ?>_hp_hero_button_link">Hero Button Link (URL)</label>
		<input name="<?php echo $metavarname; ?>[hp_hero_button_link]" id="<?php echo $metavarname; ?>_hp_hero_button_link" type="text" value="<?php echo $hp_hero_button_link; ?>" class="form-control" />
	</p>
	<?php
}

function client_custom_meta_home_addtl( $post ) {
	global $post;
	$metavarname = CLIENT_SLUG . '_custom_meta';

	//get the values
	$meta = get_post_meta($post->ID, $metavarname, true);

	$hp_homebox1_title = ( !empty( $meta['hp_homebox1_title'] ) ) ? $meta['hp_homebox1_title'] : '';
	$hp_homebox1_content = ( !empty( $meta['hp_homebox1_content'] ) ) ? $meta['hp_homebox1_content'] : '';
	$hp_homebox1_button_text = ( !empty( $meta['hp_homebox1_button_text'] ) ) ? $meta['hp_homebox1_button_text'] : '';
	$hp_homebox1_button_link = ( !empty( $meta['hp_homebox1_button_link'] ) ) ? $meta['hp_homebox1_button_link'] : '';
	$hp_homebox1_showdonatebtn = ( !empty( $meta['hp_homebox1_showdonatebtn'] ) ) ? $meta['hp_homebox1_showdonatebtn'] : '';

	?>
	<p class="field-group">
		<label for="<?php echo $metavarname; ?>_hp_homebox1_title">Additional Content Heading</label>
		<input name="<?php echo $metavarname; ?>[hp_homebox1_title]" id="<?php echo $metavarname; ?>_hp_homebox1_title" type="text" value="<?php echo $hp_homebox1_title; ?>" class="form-control" />
	</p>
	<div class="field-group">
		<label for="<?php echo $metavarname; ?>_hp_homebox1_content">Additional Content</label>
		<?php

			$textareaID = $metavarname . '_hp_homebox1_content';
			$settings = array(
				'textarea_name' => $metavarname . '[hp_homebox1_content]',
				'editor_class' => 'hp_homebox1_content'
			);

			wp_editor( $hp_homebox1_content, $textareaID, $settings );
		?>
	</div>
	<p class="field-group">
		<label for="<?php echo $metavarname; ?>_hp_homebox1_button_text">Additional Content Button Text</label>
		<input name="<?php echo $metavarname; ?>[hp_homebox1_button_text]" id="<?php echo $metavarname; ?>_hp_homebox1_button_text" type="text" value="<?php echo $hp_homebox1_button_text; ?>" class="form-control" />
	</p>
	<p class="field-group">
		<label for="<?php echo $metavarname; ?>_hp_homebox1_button_link">Additional Content Button Link (URL)</label>
		<input name="<?php echo $metavarname; ?>[hp_homebox1_button_link]" id="<?php echo $metavarname; ?>_hp_homebox1_button_link" type="text" value="<?php echo $hp_homebox1_button_link; ?>" class="form-control" />
	</p>
	<p class="field-group">
      <input name="<?php echo $metavarname; ?>[hp_homebox1_showdonatebtn]" id="<?php echo $metavarname; ?>_hp_homebox1_showdonatebtn" type="checkbox" value="1"<?php echo ($hp_homebox1_showdonatebtn != '') ? ' checked="checked"' : ''; ?> />
      <label for="<?php echo $metavarname; ?>_hp_homebox1_showdonatebtn">Show Donate Now Button</label>
  </p>
	<?php
}

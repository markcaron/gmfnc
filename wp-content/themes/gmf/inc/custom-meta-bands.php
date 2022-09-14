<?php

/* Custom Metabox for Home
 * Requires: custom-metaboxes.php
 *
 * By: Mark Caron (mark.caron@gmail.com)
 *
**/

/* For loading of this function, see custom-metaboxes.php. */

function client_custom_meta_bands( $post ) {
	global $post;
	$metavarname = CLIENT_SLUG . '_custom_meta';

	//get the values
	$meta = get_post_meta($post->ID, $metavarname, true);

	$num_bands = 5;

	if ( empty( $meta['bands'] ) ) {
			// init first load
			$bandsArray = array();
			for ($i = 0; $i < $num_bands; $i++):
				$bandsArray[$i] = array('title' => '', 'content' => '', 'style' => '', 'order' => '', 'keepme' => '1');
			endfor;

	} else {
		$bandsArray = $meta['bands'];
		// $bandsArray = array_values($meta['bands']); // use array_values to reset keys/indexes, since deleting items make their keys non-sequential
		// Still has an issue on SAVING where the photo array may have a missing, non-sequential set of keys, which will strip those out of order.
		// usort($bandsArray, 'sortByMetaOrderBands'); // re-sort array based on photo order field in the array
	}

	// pbug($bandsArray);

	foreach ($bandsArray as $i => $band):

		$band_title = ( !empty( $band['title'] ) ) ? $band['title'] : '';
		$band_content = ( !empty( $band['content'] ) ) ? $band['content'] : '';
		$band_style = ( !empty( $band['style'] ) ) ? $band['style'] : '';
		$band_order = ( !empty( $band['order'] ) ) ? $band['order'] : '';

	?>
	<fieldset class="band-fields">
		<legend>
			Band <?php echo $i + 1; ?>
		</legend>
		<input type="hidden" value="1" name="<?php echo $metavarname; ?>[bands][<?php echo $i; ?>][keepme]" />
		<p class="field-group">
			<label for="<?php echo $metavarname; ?>_band_<?php echo $i; ?>_title">Band Heading</label>
			<input name="<?php echo $metavarname; ?>[bands][<?php echo $i; ?>][title]" id="<?php echo $metavarname; ?>_band_<?php echo $i; ?>_title" type="text" value="<?php echo $band_title; ?>" class="form-control" />
		</p>
		<div class="field-group">
			<label for="<?php echo $metavarname; ?>_band_<?php echo $i; ?>_content">Band Content</label>
			<?php

				$textareaID = $metavarname . '_band_' . $i . '_content';
				$settings = array(
					'textarea_name' => $metavarname . '[bands][' . $i . '][content]',
					'editor_class' => 'band_content'
				);

				wp_editor( $band_content, $textareaID, $settings );
			?>
		</div>
		<div class="field-grouping">
			<p class="field-group">
				<label for="<?php echo $metavarname; ?>_band_<?php echo $i; ?>_style">Band Style</label>
				<select name="<?php echo $metavarname; ?>[bands][<?php echo $i; ?>][style]" id="<?php echo $metavarname; ?>_band_<?php echo $i; ?>_style" class="form-control">
					<option<?php if ($band_style == '') echo ' selected="selected"'; ?> value="">Default</option>
					<option<?php if ($band_style == 'bordered') echo ' selected="selected"'; ?> value="bordered">Bordered</option>
					<option<?php if ($band_style == 'light-gray') echo ' selected="selected"'; ?> value="light-gray">Light Gray</option>
					<option<?php if ($band_style == 'dark-gray') echo ' selected="selected"'; ?> value="dark-gray">Dark Gray</option>
					<option<?php if ($band_style == 'blue') echo ' selected="selected"'; ?> value="blue">Blue</option>
				</select>
			<!-- </p>
			<p class="field-group">
				<label for="<?php echo $metavarname; ?>_band_<?php echo $i; ?>_order">Band Order</label>
				<input name="<?php echo $metavarname; ?>[bands][<?php echo $i; ?>][order]" id="<?php echo $metavarname; ?>_band_<?php echo $i; ?>_order" type="text" value="<?php echo $band_order; ?>" class="form-control form-control-xs" />
			</p> -->
		</div>
	</fieldset>
	<?php
	endforeach;
}

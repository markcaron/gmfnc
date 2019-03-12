<?php

/* Custom Events Settings
 * Requires: custom-settings.php, custom-admin.php
 *
 * By: Mark Caron (mark.caron@gmail.com)
 *
**/


function custom_event_settings() {
	$O = 'event';
	$P = 'custom_' . $O;

	if( isset($_POST[$P]) ) {
		check_admin_referer($P . '_nonce', $P . '_nonce');
		$options = $_POST[$P];
		$expectedFields = array(
			'url'
			,'mapping'
			,'cf7'
			,'3rd'
		);
		//pbug($options);

		custom_set_option( $P, $options);
		echo '<div id="message" class="updated"><p><strong>' . __('Settings saved.') . '</strong></p></div>';
	}
	else {
		$options = custom_get_option( $P );
	}

	//pbug($options);
	$contact_content = (!empty($options['contact_content'])) ? stripslashes_deep($options['contact_content']) : '';

?>
<div class="wrap">

	<div id="icon-custom-options" class="icon32"><br /></div>
	<h2>Event Settings</h2>
	<form method="post">
		<?php wp_nonce_field($P . '_nonce', $P . '_nonce'); ?>

		<div class="metabox-holder">
			<div id="post-body">
				<div id="post-body-content">


					<div class="custom-options">

							<div class="postbox">
								<h3 class="hndle"><span>Contact Tab</span></h3>
								<div class="inside">

									<div class="row">
										<div class="col-md-12">
											<div class="field">
												<label for="<?php echo $P; ?>-contact_content">Contact Content:</label>
												<?php

								                  $textareaID = $P . '_contact_content';
								                  $settings = array(
								                    'textarea_name' => $P . '[contact_content]',
								                    'editor_class' => 'resort-content'
								                  );

								                  wp_editor( $contact_content, $textareaID, $settings );
								                ?>
												<em class="summary">Content for Contact tab across ALL events</em>
											</div>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>

							<div class="buttons">
								<input type="submit" id="submit" name="submit" value="Save Options" class="button-primary" />
							</div>

					</div>
					<?php /* end custom-options */ ?>


				</div>
			</div>
		</div>
	</form>
</div>
<?php
}

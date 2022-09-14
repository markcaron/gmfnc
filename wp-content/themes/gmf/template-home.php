<?php
/**
 * Template Name: Homepage Template
 *
 * @package gmf
 */

get_header();
?>
<?php
while ( have_posts() ) :
	the_post();

	// Adjust feature image?
	// $featured_image_adjust_y = get_post_meta($post->ID, 'featured_image_adjust_y', true);
	// $heroPhotoAdjustHTML = ($featured_image_adjust_y != '') ? ' style="transform: translateY(' . $featured_image_adjust_y . ');"' : '';

	$metavarname = CLIENT_SLUG . '_custom_meta';
	$meta = get_post_meta($post->ID, $metavarname, true);
	// $hp_hero_heading = ( !empty( $meta['hp_hero_heading'] ) ) ? '<h2>' . $meta['hp_hero_heading'] . '</h2>' : '';
	$hp_hero_content = ( !empty( $meta['hp_hero_content'] ) ) ? $meta['hp_hero_content'] : '';
	$hp_hero_button = ( !empty( $meta['hp_hero_button_link'] ) && !empty( $meta['hp_hero_button_text'] ) ) ? '<a class="cta m-ghost m-white" href="' . $meta['hp_hero_button_link'] . '">' . $meta['hp_hero_button_text'] . '</a>' : '';

	$hp_homebox1_title = ( !empty( $meta['hp_homebox1_title'] ) ) ? '<h2>' . $meta['hp_homebox1_title'] . '</h2>' : '';
	$hp_homebox1_content = ( !empty( $meta['hp_homebox1_content'] ) ) ? $meta['hp_homebox1_content'] : '';
	$hp_homebox1_button = ( !empty( $meta['hp_homebox1_button_link'] ) && !empty( $meta['hp_homebox1_button_text'] ) ) ? '<a class="cta m-ghost" href="' . $meta['hp_homebox1_button_link'] . '">' . $meta['hp_homebox1_button_text'] . '</a>' : '';
	$hp_homebox1_showdonatebtn = ( !empty( $meta['hp_homebox1_showdonatebtn'] ) ) ? true : false;

	$heroPhotoAdjustHTML = ( !empty( $meta['featured_image_adjust_y'] ) ) ? ' style="transform: translateY(' . $meta['featured_image_adjust_y'] . ');"' : '';

?>
	<div class="hero">
		<h1 class="screen-reader-text">Governor Morehead Foundation</h1>
		<?php
		$heroPhoto = get_the_post_thumbnail($post->ID, 'full');
		?>
		<div class="hero-bg"<?php echo $heroPhotoAdjustHTML; ?>><?php echo $heroPhoto; ?></div>
		<div class="hero-box">
			<?php /* echo $hp_hero_heading; */ ?>
			<?php echo apply_filters('the_content', $hp_hero_content); ?>
			<?php echo $hp_hero_button; ?>
		</div>
	</div>

	<div id="primary" class="content-area">
		<div id="site-main" class="site-main">
			<section class="hp-content">
			<?
				get_template_part( 'template-parts/content', 'hp' );
			?>
			</section>
			<section class="hp-box1">
				<?php echo $hp_homebox1_title; ?>
				<?php echo apply_filters('the_content', $hp_homebox1_content); ?>
				<div class="hp-box1-footer">
					<?php echo $hp_homebox1_button; ?>
					<?php if ($hp_homebox1_showdonatebtn): ?>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_s-xclick" />
							<input type="hidden" name="hosted_button_id" value="J2H93G235UNKG" />
							<input class="btn" name="submit" type="submit" value="Donate Now" />
							<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
						</form>
					<?php endif; ?>
				</div>


			</section>
		</div><!-- #site-main -->
	</div><!-- #primary -->

<?php /*
	<div id="newsletter-home" class="newsletter-home">
		<!-- Begin Mailchimp Signup Form -->
		<div id="mc_embed_signup" class="mc-signup">
			<form action="https://governormoreheadfoundation.us4.list-manage.com/subscribe/post?u=a2cf943d6b307aafb09b75e6f&amp;id=55ed06d01c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<div id="mc_embed_signup_scroll">
					<h2>Subscribe to our newsletter</h2>
					<p>
						Subscribe to receive occasional updates about upcoming events, fundraisers and Governor Morehead School news.
					</p>

					<div class="mc-fields-wrap">
						<div class="mc-field-group">
							<label for="mce-EMAIL">Email Address (required)</label>
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" required aria-describedby="email-promise">
							<span id="email-promise" class="input-help-text">We promise to only use your email address for Governor Morehead Foundation updates.</span>
						</div>
						<div class="mc-field-group">
							<label for="mce-MMERGE3">Organization (optional)</label>
							<input type="text" value="" name="MMERGE3" class="" id="mce-MMERGE3">
						</div>
						<div class="mc-field-group">
							<label for="mce-FNAME">First Name</label>
							<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
						</div>
						<div class="mc-field-group">
							<label for="mce-LNAME">Last Name</label>
							<input type="text" value="" name="LNAME" class="" id="mce-LNAME">
						</div>
					</div>

					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div style="position: absolute; left: -5000px;" aria-hidden="true">
						<input type="text" name="b_a2cf943d6b307aafb09b75e6f_55ed06d01c" tabindex="-1" value="">
					</div>
					<div class="clear">
						<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-secondary">
					</div>
				</div>
			</form>
		</div>
		<!--End mc_embed_signup-->
	</div>
*/ ?>

<?php
endwhile; // End of the loop.
?>

<?php
get_footer();

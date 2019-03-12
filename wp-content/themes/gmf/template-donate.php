<?php
/**
 * Template Name: Donate Template
 *
 * @package gmf
 */

get_header();
?>
<?php
while ( have_posts() ) :
	the_post();

	// Adjust feature image?
	$featured_image_adjust_y = get_post_meta($post->ID, 'featured_image_adjust_y', true);
	$heroPhotoAdjustHTML = ($featured_image_adjust_y != '') ? ' style="transform: translateY(' . $featured_image_adjust_y . ');"' : '';
	$heroPhoto_url = get_the_post_thumbnail_url($post->ID,'full');

	$metavarname = CLIENT_SLUG . '_custom_meta';
	$meta = get_post_meta($post->ID, $metavarname, true);

	$donate_title = ( !empty( $meta['donate_title'] ) ) ? '<h2>' . $meta['donate_title'] . '</h2>' : '';
	$donate_content = ( !empty( $meta['donate_content'] ) ) ? $meta['donate_content'] : '';
	$donate_button = ( !empty( $meta['donate_button_link'] ) && !empty( $meta['donate_button_text'] ) ) ? '<a class="cta" href="' . $meta['donate_button_link'] . '">' . $meta['donate_button_text'] . '</a>' : '';


?>

<?php if ($heroPhoto_url): ?>
<div class="hero">
	<?php
	$heroPhoto = get_the_post_thumbnail($post->ID, 'full');
	?>
	<div class="hero-bg"<?php echo $heroPhotoAdjustHTML; ?>><?php echo $heroPhoto; ?></div>
	<div class="header" aria-hidden="true">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>
</div>
<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="main-content">
			<?
				get_template_part( 'template-parts/content', 'page' );
			?>
			</section>
			<section class="additional-content">
				<?php echo $donate_title; ?>
				<?php echo apply_filters('the_content', $donate_content); ?>
				<?php //echo $donate_button; ?>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
endwhile; // End of the loop.
?>

<?php
get_footer();

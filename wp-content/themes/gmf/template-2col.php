<?php
/**
 * Template Name: 2 Column Template
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

	$col_content = ( !empty( $meta['col_content'] ) ) ? $meta['col_content'] : '';

	$heroPhotoAdjustHTML = ( !empty( $meta['featured_image_adjust_y'] ) ) ? ' style="transform: translateY(' . $meta['featured_image_adjust_y'] . ');"' : '';

?>

<?php if ($heroPhoto_url): ?>
<div class="hero">
	<?php
	$heroPhoto = get_the_post_thumbnail($post->ID, 'full');
	?>
	<div class="header" aria-hidden="true">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>
	<div class="hero-bg"<?php echo $heroPhotoAdjustHTML; ?>><?php echo $heroPhoto; ?></div>
</div>
<?php endif; ?>

	<div id="primary" class="content-area">
		<div id="site-main" class="site-main">
			<section class="main-content">
			<?
				get_template_part( 'template-parts/content', 'page' );
			?>
			</section>
			<section class="additional-content">
				<?php echo apply_filters('the_content', $col_content); ?>
			</section>
		</div><!-- #site-main -->
	</div><!-- #primary -->

<?php
endwhile; // End of the loop.
?>

<?php
get_footer();

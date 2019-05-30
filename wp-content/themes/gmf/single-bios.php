<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gmf
 */

get_header();

// Adjust feature image?
$boardpage = get_post( 59 );

$featured_image_adjust_y = get_post_meta($boardpage->ID, 'featured_image_adjust_y', true);
$heroPhotoAdjustHTML = ($featured_image_adjust_y != '') ? ' style="transform: translateY(' . $featured_image_adjust_y . ');"' : '';
$heroPhoto_url = get_the_post_thumbnail_url($boardpage->ID,'full');

?>

	<?php if ($heroPhoto_url): ?>
	<div class="hero">
		<?php
		$heroPhoto = get_the_post_thumbnail($boardpage->ID, 'full');
		?>
		<div class="hero-bg"<?php echo $heroPhotoAdjustHTML; ?>><?php echo $heroPhoto; ?></div>
		<div class="header">
			<h1><?php echo get_the_title($boardpage->ID); ?></h1>
		</div>
	</div>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<div id="site-main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
			// the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</div><!-- #site-main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

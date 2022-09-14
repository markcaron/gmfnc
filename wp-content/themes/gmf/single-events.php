<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gmf
 */

get_header();

global $post;
if (has_post_thumbnail($post)) {
	$eventsPhoto = get_the_post_thumbnail($post->ID, 'full');
} else {
	$eventsPhoto = wp_get_attachment_image(91, 'full');
}

?>

	<?php if ($eventsPhoto): ?>
	<div class="hero">
		<div class="header" aria-hidden="true"><h1>News &amp; Events</h1></div>
		<div class="hero-bg" style="transform: translateY(-50%);"><?php echo $eventsPhoto; ?></div>
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

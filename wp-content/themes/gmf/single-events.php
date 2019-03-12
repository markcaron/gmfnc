<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gmf
 */

get_header();

$eventsPhoto = wp_get_attachment_image(91, 'full');

?>

	<?php if ($eventsPhoto): ?>
	<div class="hero">
		<div class="hero-bg" style="transform: translateY(-40%);"><?php echo $eventsPhoto; ?></div>
		<div class="header" aria-hidden="true"><h1>Events</h1></div>
	</div>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

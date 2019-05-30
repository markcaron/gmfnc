<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gmf
 */

get_header();

$eventsPhoto = wp_get_attachment_image(91, 'full');

?>

	<?php if ($eventsPhoto): ?>
	<div class="hero">
		<div class="header"><h1>News &amp; Events</h1></div>
		<div class="hero-bg" style="transform: translateY(-50%);"><?php echo $eventsPhoto; ?></div>
	</div>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<div id="site-main" class="site-main">

		<?php if ( have_posts() ) : ?>


			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'noevents' );

		endif;
		?>

		</div><!-- #site-main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

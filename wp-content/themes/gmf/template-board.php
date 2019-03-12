<?php
/**
 * Template Name: Board Members Template
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

		<?php
			get_template_part( 'template-parts/content', 'page' );



			// Bios
			// Collect all the Events
			$args = array(
				'post_type'			=> 'bios',
				'order'					=> 'ASC',
				'orderby'				=> 'title',
				'posts_per_page'	=> '-1'
			);
			$bios = get_posts( $args );

			if ($bios):
			?>
			<ul class="board-members">
			<?php
				foreach( $bios as $key => $bio ):

					$meta = get_post_meta($bio->ID, 'bios', true);
					$bio_board_position = ( !empty( $meta['bio_board_position'] ) ) ? $meta['bio_board_position'] : '';
					$bio_title = ( !empty( $meta['bio_title'] ) ) ? $meta['bio_title'] : '';
				  $bio_line = ( !empty( $meta['bio_company'] ) ) ? $bio_title . ', ' . $meta['bio_company'] : $bio_title;

					$bioPhoto = get_the_post_thumbnail($bio->ID, 'thumbnail');
				?>
				<li class="board-member">
					<article>
						<header>
							<h2><?php echo $bio->post_title; ?></h2>
							<p class="board-position">
								<?php echo $bio_board_position ?>
							</p>
							<p class="company">
								<?php echo $bio_line; ?>
							</p>
						</header>
						<p class="excerpt">
						<?php
							/*echo apply_filters( 'the_excerpt', $bio->post_content );*/
							echo get_the_excerpt($bio->ID);
						?>
						</p>
						<footer>
							<p>
								<a href="<?php echo get_post_permalink($bio->ID); ?>">Read more about <?php echo $bio->post_title; ?></a>
							</p>
						</footer>
					</article>

				</li>
				<?php
				endforeach;
				?>
			</ul>
		<?php
			endif;
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	endwhile; // End of the loop.
	?>

<?php
get_sidebar();
get_footer();

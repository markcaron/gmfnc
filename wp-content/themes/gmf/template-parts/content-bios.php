<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gmf
 */



 // $metavarname = CLIENT_SLUG . '_custom_meta';
 // $meta = get_post_meta($post->ID, $metavarname, true);

$meta = get_post_meta(get_the_ID(), 'bios', true);
$bio_board_position = ( !empty( $meta['bio_board_position'] ) ) ? $meta['bio_board_position'] : '';
$bio_title = ( !empty( $meta['bio_title'] ) ) ? $meta['bio_title'] : '';
$bio_line = ( !empty( $meta['bio_company'] ) ) ? $bio_title . ', ' . $meta['bio_company'] : $bio_title;

$bioPhoto = get_the_post_thumbnail($bio->ID, 'thumbnail');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header board-member-heading">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		<p class="board-position">
			<?php echo $bio_board_position ?>
		</p>
		<p class="company">
			<?php echo $bio_line; ?>
		</p>
	</header><!-- .entry-header -->

	<?php //gmf_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gmf' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'gmf' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gmf
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				gmf_posted_on();
				gmf_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif;

		if ( 'events' === get_post_type() ):
		?><div class="entry-meta">
			<?php
			$typename = 'events';
	    $meta = get_post_meta($post->ID, $typename, true);

			// Is News or Event?
			$news_event = ( !empty( $meta['news_event'] ) ) ? $meta['news_event'] : '';
			$news_event_html = ($news_event !== '') ? '<strong class="type type-' . $news_event . '">' . ucfirst($news_event) . '</strong>' : '';

			// Location
			$event_location = ( !empty( $meta['event_location'] ) ) ? $meta['event_location'] : '';

			// Date
			$event_date_string = ( !empty( $meta['event_date'] ) ) ? $meta['event_date'] : '';
			$event_date = new DateTime($event_date_string);
			$event_date_formatted = $event_date->format('F d, Y');

			if ($news_event === 'event' || $news_event === 'fundraiser'):
				$event_date_html = ($event_date !== '') ? '<em class="date"><span>On </span><time datetime="' . $event_date_string . '">' . $event_date_formatted . '</time></em>' : '';
			else:
				$event_date_html = ($event_date !== '') ? '<em class="date"><span>Posted on </span><time datetime="' . $event_date_string . '">' . $event_date_formatted . '</time></em>' : '';
			endif;


			echo ($news_event_html != '') ? $news_event_html . ' ' : $news_event_html;
			echo $event_date_html;

			?>

		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php //gmf_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		if ( is_singular() ) :

			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gmf' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			// wp_link_pages( array(
			// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gmf' ),
			// 	'after'  => '</div>',
			// ) );
		else:

			the_excerpt();
		endif;
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php gmf_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

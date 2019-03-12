<?php
/**
 * Template Name: Splash Template
 *
 * @package gmf
 */

// get_header();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	while ( have_posts() ) :
		the_post();
		// $heroPhoto = get_the_post_thumbnail($post->ID, 'full');
		$heroPhoto_url = get_the_post_thumbnail_url($post->ID,'full');
	?>

	<div class="splash" style="background-image: url(<?php echo $heroPhoto_url; ?>);">
		<div class="splash-content">
			<?php
		 	the_custom_logo();
		 	?>
			<h1 class="screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
			<p class="screen-reader-text"><?php echo $gmf_description; /* WPCS: xss ok. */ ?></p>
			<p class="coming-soon">Website coming soon&hellip;</p>
		</div>
	</div>
	<?php
	endwhile; // End of the loop.
	?>
	<?php wp_footer(); ?>

</body>
</html>
<?php
// get_footer();

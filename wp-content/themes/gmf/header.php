<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gmf
 */

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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gmf' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="main-header">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					/* ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php */
				endif;
				$gmf_description = get_bloginfo( 'description', 'display' );
				if ( $gmf_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $gmf_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h2 id="site-nav-heading" class="screen-reader-text">Site navigation</h2>
			<div class="primary-menu-wrap">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Main Menu', 'gmf' ); ?></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s" aria-owns="menu-item-35" aria-labelledby="site-nav-heading">%3$s</ul>',
				) );
				?>
			</div>
			<div class="secondary-menu-wrap">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'secondary-menu',
				) );
				?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<main id="content" class="site-content">

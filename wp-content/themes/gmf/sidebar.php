<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gmf
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php

	$metavarname = CLIENT_SLUG . '_custom_meta';
	$meta = get_post_meta($post->ID, $metavarname, true);
	$sidemenu_display = ( !empty( $meta['sidemenu_display'] ) ) ? $meta['sidemenu_display'] : '';


		if ( is_page() && $sidemenu_display === "1" ) {
			dynamic_sidebar('sidebar-pages');
		} elseif ( is_singular('bios') ) {
			dynamic_sidebar('sidebar-pages');
		} elseif ( !is_page() && !is_search() ) {
			dynamic_sidebar( 'sidebar-1' );
		}
	?>
</aside><!-- #secondary -->

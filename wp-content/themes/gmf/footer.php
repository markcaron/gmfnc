<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gmf
 */

?>

</main><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php //if ($_SERVER['REMOTE_ADDR'] = '71.70.166.230'): ?>
		<div class="footer-full">

			<div class="footer-about">
				<div class="footer-social">
					<ul aria-label="Social Links">
						<li class="facebook">
							<a href="https://www.facebook.com/GovernorMoreheadFoundation" title="Facebook" aria-label="GMF on Facebook">
								<svg viewBox="0 0 512 512"><path d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z"/></svg>
							</a>
						</li>
						<li class="linkedin">
							<a href="https://www.linkedin.com/company/governor-morehead-foundation/" title="LinkedIn" aria-label="GMF on LinkedIn">
								<svg viewBox="0 0 512 512"><path d="M186.4 142.4c0 19-15.3 34.5-34.2 34.5 -18.9 0-34.2-15.4-34.2-34.5 0-19 15.3-34.5 34.2-34.5C171.1 107.9 186.4 123.4 186.4 142.4zM181.4 201.3h-57.8V388.1h57.8V201.3zM273.8 201.3h-55.4V388.1h55.4c0 0 0-69.3 0-98 0-26.3 12.1-41.9 35.2-41.9 21.3 0 31.5 15 31.5 41.9 0 26.9 0 98 0 98h57.5c0 0 0-68.2 0-118.3 0-50-28.3-74.2-68-74.2 -39.6 0-56.3 30.9-56.3 30.9v-25.2H273.8z"/></svg>
							</a>
						</li>
						<li class="youtube">
							<a href="https://www.youtube.com/channel/UCM7gIzJ15d2GZDP90bvzJ_A" title="YouTube Channel" aria-label="GMF YouTube Channel">
								<svg viewBox="0 0 512 512"><path d="M422.6 193.6c-5.3-45.3-23.3-51.6-59-54 -50.8-3.5-164.3-3.5-215.1 0 -35.7 2.4-53.7 8.7-59 54 -4 33.6-4 91.1 0 124.8 5.3 45.3 23.3 51.6 59 54 50.9 3.5 164.3 3.5 215.1 0 35.7-2.4 53.7-8.7 59-54C426.6 284.8 426.6 227.3 422.6 193.6zM222.2 303.4v-94.6l90.7 47.3L222.2 303.4z"/></svg>
							</a>
						</li>
					</ul>
				</div>

				<div class="footer-logo">
					<?php echo wp_get_attachment_image( 228, 'full' ); // 228 = white GMF logo ?>
				</div>

				<p>The Governor Morehead Foundation is a 501(c)(3) that supports the Governor Morehead School, (GMS), a public residential school serving students who are visually impaired across North Carolina.</p>
				<nav class="footer-nav">
					<h2 id="footer-nav-heading" class="screen-reader-text">Site menu</h2>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-3',
						'menu_id'        => 'footer-menu',
						'items_wrap'      => '<ul id="%1$s" class="%2$s" aria-owns="menu-item-35" aria-labelledby="footer-nav-heading">%3$s</ul>',
					) );
					?>
				</nav>
			</div>

			<div class="newsletter-signup">
				<?php get_template_part( 'inc/mailchimp-signup' ); ?>
			</div>
		</div>
		<?php //endif; ?>

		<div class="site-info">

			<p class="copyright">
				Copyright &copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>, LLC. All rights reserved.
			</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

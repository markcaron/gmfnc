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

		<div class="footer-full">

			<div class="footer-about">
				<div class="footer-social">
					<ul aria-label="Social Links">
						<li class="facebook">
							<a href="https://www.facebook.com/GovernorMoreheadFoundation" title="Facebook" aria-label="GMF on Facebook">
								<svg viewBox="0 0 512 512"><path d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z"/></svg>
							</a>
						</li>
						<li class="instagram">
							<a href="https://www.instagram.com/governormoreheadfoundation/" title="Instagram" aria-label="GMF on Instagram">
								<svg viewBox="0 0 512 512"><path d="M256,111.87c46.94,0,52.51,0.18,71.06,1.03c47.65,2.17,69.9,24.78,72.07,72.07c0.85,18.53,1.01,24.1,1.01,71.05c0,46.96-0.18,52.51-1.01,71.05c-2.18,47.25-24.38,69.9-72.07,72.07c-18.55,0.85-24.09,1.03-71.06,1.03c-46.94,0-52.51-0.18-71.05-1.03c-47.76-2.18-69.9-24.89-72.07-72.09c-0.85-18.53-1.03-24.09-1.03-71.05c0-46.94,0.19-52.5,1.03-71.05c2.18-47.28,24.38-69.9,72.07-72.07C203.5,112.05,209.06,111.87,256,111.87z M256,80.18c-47.75,0-53.73,0.21-72.48,1.05c-63.85,2.93-99.34,38.36-102.27,102.27c-0.86,18.77-1.07,24.75-1.07,72.5s0.21,53.74,1.05,72.5c2.93,63.85,38.36,99.34,102.27,102.27c18.77,0.85,24.75,1.05,72.5,1.05s53.74-0.21,72.5-1.05c63.79-2.93,99.37-38.36,102.25-102.27c0.86-18.75,1.07-24.75,1.07-72.5s-0.21-53.73-1.05-72.48c-2.87-63.79-38.34-99.34-102.25-102.27C309.74,80.38,303.75,80.18,256,80.18z M256,165.72c-49.86,0-90.28,40.42-90.28,90.28s40.42,90.3,90.28,90.3s90.28-40.42,90.28-90.3C346.28,206.14,305.86,165.72,256,165.72z M256,314.61c-32.37,0-58.61-26.23-58.61-58.61c0-32.37,26.24-58.61,58.61-58.61s58.61,26.24,58.61,58.61C314.61,288.38,288.37,314.61,256,314.61z M349.86,141.06c-11.66,0-21.11,9.45-21.11,21.1s9.45,21.1,21.11,21.1c11.65,0,21.08-9.45,21.08-21.1S361.51,141.06,349.86,141.06z" />
								</svg>
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

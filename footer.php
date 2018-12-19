<?php
/**
 * The footer for Githuber theme
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0.0
 * @version 1.0.7
 */

?>

			<footer class="footer" role="contentinfo">
				<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<section class="footer-sidebar">
					<div class="container px-responsive">
						<div class="row my-4">
							<?php dynamic_sidebar( 'sidebar-2' ); ?>
						</div>
					</div>
				</section>
				<?php endif; ?>

				<?php githuber_nav( 'footer' ); ?>

				<div class="container site-info">
					<?php githuber_site_info(); ?>
				</div>
			</footer>
		</div><!-- .wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>

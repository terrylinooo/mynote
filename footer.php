<?php
/**
 * The footer for Mynote theme
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
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

				<?php mynote_nav( 'social' ); ?>

				<div class="container site-info">
					<?php mynote_site_info(); ?>
				</div>

				<?php mynote_nav( 'footer' ); ?>
				
			</footer>
		</div><!-- .wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>

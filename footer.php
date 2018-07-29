<?php
/**
 * The footer for Githuber theme
 *
 * @link https://terryl.in/theme/githuber
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0
 * @version 1.0
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

				<div class="container site-info">
					<?php site_info(); ?>
				</div>
			</footer>
		</div><!-- .wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>

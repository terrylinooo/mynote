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

				<div class="container site-info">

					&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>  <?php esc_html_e( 'Powered by', 'githuber' ); ?> 
					<a href="https://wordpress.org/" title="WordPress">WordPress</a> &amp; 
					<a href="https://terryl.in/theme/githuber" title="githuber">Githuber theme</a>

				</div>

			</footer>

		</div><!-- wrapper /-->

		<?php wp_footer(); ?>

	</body>
</html>

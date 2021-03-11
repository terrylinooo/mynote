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
		<?php do_action( 'mynote_footer_before' ); ?>

		<footer class="footer" role="contentinfo">

			<?php
				/**
				 * Functions hooked in to mynote_footer action
				 *
				 * @hooked mynote_footer_widgets - 10
				 * @hooked mynote_columns        - 20
				 */
				do_action( 'mynote_footer' );
			?>

		</footer>

		<?php do_action( 'mynote_footer_after' ); ?>

	</div><!-- .wrapper -->

	<?php do_action( 'mynote_site_wrapper_after' ); ?>

	<?php wp_footer(); ?>

	<a href="javascript:void(0);" class="go-top" style="display: none">
		<i class="fas fa-arrow-up"></i>
	</a>
</body>
</html>

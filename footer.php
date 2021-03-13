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
 * @version 2.0.0
 */

/**
 * Hook: mynote_footer_before
 */
do_action( 'mynote_footer_before' );

?>

		<footer class="footer" role="contentinfo">

			<?php
				/**
				 * Hook: mynote_footer
				 *
				 * @hooked mynote_footer_widgets - 10
				 * @hooked mynote_columns        - 20
				 */
				do_action( 'mynote_footer' );
			?>

		</footer>

		<?php
			/**
			 * Hook: mynote_footer_after
			 */
			do_action( 'mynote_footer_after' );
		?>

	</div><!-- .wrapper -->

	<?php
		/**
		 * Hook: mynote_site_wrapper_after
		 */
		do_action( 'mynote_site_wrapper_after' );

		wp_footer();
	?>

	<a href="javascript:void(0);" class="go-top" style="display: none">
		<i class="fas fa-arrow-up"></i>
	</a>
</body>
</html>

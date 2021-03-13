<?php
/**
 * The Archive page of Mynote theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 2.0.0
 * @version 2.0.0
 */
?>

<div class="container">
	<div class="row row-layout-choice-archive">
		<section id="main-container" class="<?php echo esc_attr( mynote_main_container_css() ); ?>">
			<?php

				/**
				 * Hook: mynote_archive_loop_before
				 * 
				 * The width here is the same as the container of the loop.
				 */
				do_action( 'mynote_archive_loop_before' );

				if ( have_posts() ) {
					get_template_part( 'template-parts/loop' );
					get_template_part( 'template-parts/pagination' );
				} else {
					get_template_part( 'template-parts/content', 'none' );
				}

				/**
				 * Hook: mynote_archive_loop_after
				 * 
				 * The width here is the same as the container of the loop.
				 */
				do_action( 'mynote_archive_loop_after' );

			?>
		</section>
		<?php
			/**
			 * Hook: mynote_archive_sidebar
			 *
			 * @hooked mynote_archive_sidebar - 10
			 */
			do_action( 'mynote_archive_sidebar' );
		?>
	</div>
</div>

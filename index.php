<?php
/**
 * The main template file
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.0
 * @version 2.0.0
 */

get_header();

?>

<div class="data-schema">
	<main role="main" class="main-header <?php if ( has_header_image() ) echo 'has-custom-header'; ?>">

		<?php
			/**
			 * Hook: mynote_homepage_promotion
			 *
			 * @hooked mynote_homepage_promotion - 10
			 */
		 	do_action( 'mynote_homepage_promotion' );
		?>

		<div class="container">
			<div class="row row-layout-choice-home">

				<section id="main-container" class="<?php echo esc_attr( mynote_main_container_css() ); ?>">

					<?php
						if ( have_posts() ) {
							get_template_part( 'template-parts/loop' );
							get_template_part( 'template-parts/pagination' );
						} else {
							get_template_part( 'template-parts/content', 'none' );
						}
					?>

				</section>

				<?php
					/**
					 * Hook: mynote_homepage_sidebar
					 *
					 * @hooked mynote_homepage_sidebar - 10
					 */
					do_action( 'mynote_homepage_sidebar' );
				?>

			</div>
		</div>
	</main>

	<br class="clearfix" />

	<?php
		/**
		 * Hook: mynote_homepage_middle_sidebar
		 *
		 * @hooked mynote_homepage_middle_sidebar - 10
		 */
		do_action( 'mynote_homepage_middle_sidebar' );
	?>

	<br class="clearfix" />

</div>

<?php

get_footer();


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
 * @version 1.0.7
 */


get_header(); ?>

<div class="data-schema">
	<main role="main" class="main-header <?php if ( has_header_image() ) echo 'has-custom-header'; ?>">
	
		<?php
			/**
			 * Functions hooked in to mynote_homepage_promotion action
			 *
			 * @hooked mynote_homepage_promotion - 10
			 */
			do_action( 'mynote_homepage_promotion' ); 
		?>

		<div class="container">
			<div class="row row-layout-choice-home">
				<section id="main-container" class="<?php echo esc_attr( mynote_main_container_css() ); ?>">
					<?php get_template_part( 'loop' ); ?>
					<?php get_template_part( 'pagination' ); ?>
				</section>

				<?php if ( mynote_is_sidebar() ) : ?>
					<aside id="aside-container" class="col-lg-4 col-md-4 col-sm-12" role="complementary">
						<?php get_sidebar( 'home' ); ?>
					</aside>
				<?php endif; ?>
			</div>
		</div>
	</main>

	<br class="clearfix" />

	<?php

		/**
		 * Functions hooked in to mynote_homepage_middle_sidebar action
		 *
		 * @hooked mynote_homepage_middle_sidebar - 10
		 */
		do_action( 'mynote_homepage_middle_sidebar' ); 
	?>

	<br class="clearfix" />
</div>

<?php get_footer(); ?>

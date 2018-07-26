<?php
/**
 * The main template file
 *
 * @link https://terryl.in/theme/githuber
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<main role="main">
		<div class="section-intro d-flex align-items-center">
			<div class="container px-responsive">
				<div class="d-md-flex align-items-center">
					<div class="col-12 col-md-7 text-center text-md-left" style="min-height: 100%; overflow: hidden" >
						<h1 class="mb-3"><?php echo get_bloginfo( 'name' ); ?></h1>
						<p class="mb4 desc-text"><?php echo html_entity_decode( get_bloginfo( 'description') ); ?></p>
					</div>
					<div class="col-12 col-md-5">
						<p class="p-5"><?php githuber_category_labels(); ?></p>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
		<section>

			<?php get_template_part( 'loop' ); ?>

			<?php get_template_part( 'pagination' ); ?>

		</section>

		</div>

	</main>

<?php get_footer(); ?>

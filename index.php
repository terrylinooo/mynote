<?php
/**
 * The main template file
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0.0
 * @version 1.0.7
 */
$custom_header_image = '';
if ( has_header_image() ) {
	$custom_header_image = 'background-image: url(' . get_header_image() . ');';
}

get_header(); ?>

<div class="data-schema">
	<main role="main">
		<div class="section-intro d-flex align-items-center" style="<?php echo $custom_header_image; ?>">
			<div class="container px-responsive">
				<div class="d-md-flex align-items-center">
					<div class="col-12 col-md-7 text-center text-md-left" style="min-height: 100%; overflow: hidden" >
						<h1 class="mb-3"><?php echo get_bloginfo( 'name' ); ?></h1>
						<p class="mb4 desc-text"><?php echo html_entity_decode( get_bloginfo( 'description' ) ); ?></p>
					</div>
					<div class="col-12 col-md-5">
						<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
						<aside class="home-intro-sidebar">
							<div class="container px-responsive">
								<div class="row my-4">
									<?php dynamic_sidebar( 'sidebar-5' ); ?>
								</div>
							</div>
						</aside>
						<?php else : ?>
						<p class="p-5"><?php githuber_category_labels(); ?></p>
						<?php endif; ?>
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

	<br class="clearfix" />

	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
	<aside class="home-middle-sidebar">
		<div class="container px-responsive">
			<div class="row my-4">
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
			</div>
		</div>
	</aside>
	<?php endif; ?>

	<br class="clearfix" />

<?php get_footer(); ?>

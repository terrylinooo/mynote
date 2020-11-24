<?php
/**
 * The Single page of Mynote theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.0
 * @version 1.6.3
 */

get_header();

?>

<div class="data-schema is-single" itemscope itemtype="<?php mynote_article_schema(); ?>">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<div class="single-post-header">
				<div class="container">
					<h1 id="post-title" itemprop="headline"><?php the_title(); ?></h1>
					<div class="post-mynote-buttons">
						<?php mynote_edit_button(); ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>

	<div class="container">
		<div class="row row-layout-choice-post">
			<main id="main-container" class="col-lg-12 col-md-12 col-sm-12" role="main">
				<?php woocommerce_content(); ?>
			</main>
		</div>
		<?php
			the_post_navigation(
				array(
					'prev_text' => '<i class="fas fa-angle-left"></i> <span class="screen-reader-text">' . __( 'Previous Post', 'mynote' ) . '</span> %title',
					'next_text' => '<i class="fas fa-angle-right"></i> <span class="screen-reader-text">' . __( 'Next Post', 'mynote' ) . '</span> %title',
				)
			);
		?>
	</div>
</div>

<?php

get_footer();

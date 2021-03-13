<?php
/**
 * Used in Search Results and for Recent Posts in Front Page panels.
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

<?php mynote_title_progress_bar(); ?>

<div class="data-schema is-page" itemscope itemtype="<?php mynote_article_schema(); ?>">

	<?php
		/**
		 * Hook: mynote_page_before
		 *
		 * @hooked mynote_post_metadata - 10
		 */
		do_action( 'mynote_page_before' ); 
	?>

	<div class="container">
		<div class="row">
			<main id="main-container" class="col" role="main">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : ?>

						<?php the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'markdown-body' ); ?>>

							<?php if ( has_post_thumbnail() ) : ?>
								<?php mynote_post_figure(); ?>
							<?php endif; ?>

							<div itemprop="articleBody">
								<?php
									/**
									 * Hook: mynote_page_content_before
									 */
									do_action( 'mynote_page_content_before' );

									the_content();

									/**
									 * Hook: mynote_page_content_after
									 */
									do_action( 'mynote_page_content_after' );

									wp_link_pages(
										array(
											'before' => '<div class="page-links">' . __( 'Pages:', 'mynote' ),
											'after'  => '</div>',
										)
									);
								?>
							</div>
						</article>

						<section class="modified-date" itemprop="dateModified" content="<?php the_modified_date( 'c' ); ?>">
							<?php esc_html_e( 'Last modified: ', 'mynote' ); ?>
							<?php the_modified_date(); ?>
						</section>

						<section class="tags">
							<?php the_tags( '', '' ); ?>
						</section>

						<?php comments_template(); ?>

					<?php endwhile; ?>

				<?php else : ?>

					<article>
						<h1><?php esc_html_e( 'Sorry, nothing to display.', 'mynote' ); ?></h1>
					</article>

				<?php endif; ?>

			</main>
		</div><!-- .row -->
	</div><!-- .container -->

	<?php
		/**
		 * Hook: mynote_page_after
		 */
		do_action( 'mynote_page_after' );
	?>

</div>

<?php

get_footer();

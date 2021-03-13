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
 * @version 1.2.2
 */

get_header();

?>

<?php mynote_title_progress_bar(); ?>

<div class="data-schema is-single" itemscope itemtype="<?php mynote_article_schema(); ?>">

	<?php
		/**
		 * Hook: mynote_post_before
		 *
		 * @hooked mynote_post_metadata - 10
		 */
		do_action( 'mynote_post_before' ); 
	?>

	<div class="container">
		<div class="row row-layout-choice-post">
			<main id="main-container" class="<?php echo esc_attr( mynote_main_container_css() ); ?>" role="main">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : ?>

						<?php the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'markdown-body' ); ?>>

							<?php if ( mynote_is_post_featured_image() && has_post_thumbnail() ) : ?>
								<?php mynote_post_figure(); ?>
							<?php endif; ?>
	
							<div itemprop="articleBody">

								<?php
									/**
									 * Hook: mynote_post_content_before
									 */
									do_action( 'mynote_post_content_before' );

									the_content();

									/**
									 * Hook: mynote_post_content_after
									 */
									do_action( 'mynote_post_content_after' );

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

						<?php if ( mynote_is_post_author_card() ) : ?>
							<?php mynote_author_card(); ?>
						<?php endif; ?>

						<?php if ( mynote_is_post_comment_section() ) : ?>
							<?php comments_template(); ?>
						<?php endif; ?>

					<?php endwhile; ?>

				<?php else : ?>
					<article>
						<h1><?php esc_html_e( 'Sorry, nothing to display.', 'mynote' ); ?></h1>
					</article>
				<?php endif; ?>

			</main>

			<?php
				/**
				 * Functions hooked in to mynote_post_sidebar action
				 *
				 * @hooked mynote_post_sidebar - 10
				 */
				do_action( 'mynote_post_sidebar' );
			?>

		</div><!-- .row -->

		<?php
			the_post_navigation(
				array(
					'prev_text' => '<i class="fas fa-angle-left"></i> <span class="screen-reader-text">' . __( 'Previous Post', 'mynote' ) . '</span> %title',
					'next_text' => '<i class="fas fa-angle-right"></i> <span class="screen-reader-text">' . __( 'Next Post', 'mynote' ) . '</span> %title',
				)
			);
		?>

	</div><!-- .container -->

	<?php
		/**
		 * Hook: mynote_post_after
		 */
		do_action( 'mynote_post_after' );
	?>

</div><!-- .data-schema -->

<?php

get_footer();

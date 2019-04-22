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
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php mynote_post_breadcrumb(); ?>

			<div class="single-post-header">
				<div class="container">

					<h1 id="post-title" itemprop="headline"><?php the_title(); ?></h1>
					<div class="post-mynote-buttons">

						<?php if ( mynote_is_sidebar() ) : ?>
							<?php mynote_column_control_button(); ?>
						<?php endif; ?>

						<?php mynote_edit_button(); ?>
						<?php mynote_comment_button(); ?>
					</div><!-- .post-mynote-buttons -->

					<?php if ( mynote_is_post_author_date() ) : ?>
						<div class="post-meta">
							<?php mynote_author_posted_date( true ); ?>
						</div>
					<?php endif; ?>

				</div><!-- .container -->
			</div><!-- .single-post-header -->

		<?php endwhile; ?>
	<?php endif; ?>

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
								<?php the_content(); ?>

								<?php
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
							<?php esc_html_e( 'Last modified: ', 'mynote' ); ?><?php the_modified_date(); ?>
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

			<?php if ( mynote_is_sidebar() ) : ?>
				<aside id="aside-container" class="col-lg-4 col-md-4 col-sm-12" role="complementary">
					<?php get_sidebar(); ?>
				</aside>
			<?php endif; ?>

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
</div><!-- .data-schema -->

<?php
get_footer();

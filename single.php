<?php
/**
 * The Single page of Githuber theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0.0
 * @version 1.0.7.0
 */

get_header();
?>

<?php githuber_title_progress_bar(); ?>

<div class="data-schema" itemscope itemtype="<?php githuber_article_schemal( 'tech' ); ?>">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php githuber_post_breadcrumb(); ?>

			<div class="single-post-header">
				<div class="container">
					<h1 id="post-title" itemprop="headline"><?php the_title(); ?></h1>
					<div class="post-githuber-buttons">
						<?php githuber_column_control_button(); ?>
						<?php githuber_edit_button(); ?>
						<?php githuber_comment_button(); ?>
					</div><!-- .post-githuber-buttons -->
					<div class="post-meta">
						<?php githuber_author_posted_date( true ); ?>
					</div>
				</div><!-- .container -->
			</div><!-- .single-post-header -->

		<?php endwhile; ?>
	<?php endif; ?>

	<div class="container">
		<div class="row">
			<main id="main-container" class="col-lg-8 col-md-8 col-sm-12" role="main">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'markdown-body' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<?php githuber_post_figure(); ?>
					<?php endif; ?>
					<div itemprop="articleBody">
						<?php the_content(); ?>
						<?php
							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'githuber' ),
									'after'  => '</div>',
								)
							);
						?>
					</div>
				</article>
				<section class="modified-date" itemprop="dateModified" content="<?php the_modified_date( 'c' ); ?>">
					<?php esc_html_e( 'Last modified: ', 'githuber' ); ?><?php the_modified_date(); ?>
				</section>
				<section class="tags">
					<?php the_tags( '', '' ); ?>
				</section>
				<?php githuber_author_card(); ?>
				<?php comments_template(); ?>
				<?php endwhile; ?>
			<?php else : ?>
				<article>
					<h1><?php esc_html_e( 'Sorry, nothing to display.', 'githuber' ); ?></h1>
				</article>
			<?php endif; ?>
			</main>
			<aside id="aside-container" class="col-lg-4 col-md-4 col-sm-12" role="complementary">
				<?php get_sidebar(); ?>
			</aside>
		</div><!-- .row -->
		<?php
			the_post_navigation(
				array(
					'prev_text' => '<i class="fas fa-angle-left"></i> <span class="screen-reader-text">' . __( 'Previous Post', 'githuber' ) . '</span> %title',
					'next_text' => '<i class="fas fa-angle-right"></i> <span class="screen-reader-text">' . __( 'Next Post', 'githuber' ) . '</span> %title',
				)
			);
		?>
	</div><!-- .container -->
</div><!-- .data-schema -->

<?php
get_footer();

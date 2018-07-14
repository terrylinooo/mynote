<?php
/**
 * The Single page of Githuber theme.
 *
 * @link https://terryl.in/theme/githuber
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0
 * @version 1.0.0
 */

get_header();
?>

<?php title_progress_bar(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>

		<?php the_post(); ?>

		<div class="post-header">

			<div class="container">

				<h1 id="post-title"><?php the_title(); ?></h1>

				<div class="post-githuber-buttons">

					<?php the_edit_button(); ?>

					<?php the_comment_button(); ?>

					<?php if ( is_single() && get_post_type() === 'repository' ) : ?>
						<?php the_github_buttons(); ?>
					<?php endif; ?>
				</div>

				<div class="post-meta">
					<?php the_author_posted_date(); ?>
				</div>

			</div>

		</div>

	<?php endwhile; ?>
<?php endif; ?>

<div class="container">
	<main role="main">
		<section class="row">
			<div class="col col-sm-8">

				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : ?>

					<?php the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'markdown-body' ); ?>>

						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail(); ?>
						<?php endif; ?>

						<?php the_content(); ?>

						<?php the_tags( __( 'Tags: ', 'githuber' ), ', ', '<br>' ); ?>

						<p>
							<?php esc_html_e( 'Categorised in: ', 'githuber' ); ?>
							<?php githuber_category(); ?>
						</p>

						<?php comments_template(); ?>

					</article>

					<?php endwhile; ?>

				<?php else : ?>

					<article>
						<h1><?php esc_html_e( 'Sorry, nothing to display.', 'githuber' ); ?></h1>
					</article>

				<?php endif; ?>

			</div>
			<div class="col col-sm-4">
				<nav id="toc" data-toggle="toc" class="sticky-top toc"></nav>
			</div>
		</section>
	</main>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>


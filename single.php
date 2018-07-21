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

		<div class="single-post-header">
			<div class="container">

				<h1 id="post-title"><?php the_title(); ?></h1>

				<div class="post-githuber-buttons">

					<?php githuber_edit_button(); ?>
					<?php githuber_comment_button(); ?>

					<?php if ( is_single() && get_post_type() === 'repository' ) : ?>
						<?php the_github_buttons(); ?>
					<?php endif; ?>

				</div>

				<div class="post-meta">
					<?php githuber_author_posted_date( true ); ?>
				</div>

			</div>
		</div>

	<?php endwhile; ?>
<?php endif; ?>

<div class="container">
	<div class="row">
		<main id="main-container" class="col col-sm-8" role="main">

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>

			<?php the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'markdown-body' ); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
				<figure>
					<?php the_post_thumbnail(); ?>
					<figcaption><?php echo esc_html( get_the_post_thumbnail_caption() ); ?></figcaption>
				</figure>
				<?php endif; ?>
				<?php the_content(); ?>
			</article>

			<section>
				<?php the_tags( __( 'Tags: ', 'githuber' ), ', ', '<br>' ); ?>
				<p>
					<?php esc_html_e( 'Categorised in: ', 'githuber' ); ?>
					<?php githuber_category(); ?>
				</p>
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
		<aside id="aside-container" class="col col-sm-4" role="complementary">
			<?php get_sidebar(); ?>
		</aside>
	</div><!-- .row -->
</div><!-- .container -->


<?php

get_footer();

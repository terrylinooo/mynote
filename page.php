<?php
/**
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://githuber.in/de
 *
 * @package WordPress
 * @subpackage DevNote
 * @since 1.0
 * @version 1.0
 */

get_header();
?>

<?php title_progress_bar(); ?>

<div class="data-schema" itemscope itemtype="<?php githuber_article_schemal(); ?>">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<div class="single-post-header">
				<div class="container">
					<h1 id="post-title" itemprop="headline"><?php the_title(); ?></h1>
					<div class="post-githuber-buttons">
						<?php githuber_edit_button(); ?>
						<?php githuber_comment_button(); ?>
					</div>
					<div class="post-meta">
						<?php githuber_author_posted_date( true ); ?>
					</div>
				</div><!-- .container -->
			</div><!-- .single-post-header -->

		<?php endwhile; ?>
	<?php endif; ?>

	<div class="container">
		<div class="row">
			<main id="main-container" class="col" role="main">
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
					<div itemprop="articleBody">
						<?php the_content(); ?>
					</div>
				</article>
				<section class="modified-date" itemprop="dateModified" content="<?php the_modified_date( 'c' ); ?>">
					<?php esc_html_e( 'Last modified: ', 'githuber' ); ?><?php the_modified_date(); ?>
				</section>
				<section class="tags">
					<?php the_tags( '', '' ); ?>
				</section>
				<?php comments_template(); ?>
				<?php endwhile; ?>
			<?php else : ?>
				<article>
					<h1><?php esc_html_e( 'Sorry, nothing to display.', 'githuber' ); ?></h1>
				</article>
			<?php endif; ?>
			</main>
		</div><!-- .row -->
	</div><!-- .container -->
</div>

<?php get_footer(); ?>

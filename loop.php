<?php
/**
 * The Loop section of Mynote theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.0
 * @version 1.0.7.0
 */

?>
<?php if ( have_posts() ) : ?>

	<div class="row my-4">

		<?php while ( have_posts() ) : ?>

		<?php the_post(); ?>

		<div class="<?php mynote_layout_columns(); ?>">
			<article id="post-<?php the_ID(); ?>" class="article-list">
				<div class="card my-2">
					<?php if ( mynote_is_post_card_header() && has_post_thumbnail() ) : ?>
						<?php mynote_post_thumbnail(); ?>
					<?php endif; ?>

					<div class="card-body">
						<?php if ( mynote_is_text_fade_out() ) : ?>

						<div class="card-text-fade-out">
							<h5 class="card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
							<p class="card-text"><?php mynote_excerpt(); ?></p>
							<div class="effect-layer"></div>
						</div>

						<?php else : ?>

						<h5 class="card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
						<p class="card-text"><?php mynote_excerpt(); ?></p>

						<?php endif; ?>

						<div class="card-body-footer">
							<?php // mynote_posted_date_button(); Uncomment this line if needed. ?>
							<?php mynote_comment_button(); ?>
							<?php mynote_read_button(); ?>
							<?php mynote_edit_button(); ?>
						</div>
					</div>
					<?php if ( mynote_is_post_card_footer() ) : ?>
						<div class="card-footer text-muted text-center">
							<?php mynote_author_posted_date(); ?>
						</div>
					<?php endif; ?>
				</div>
			</article>
		</div>

		<?php endwhile; ?>

	</div>

<?php else : ?>

	<article>

		<h2><?php esc_html_e( 'Sorry, nothing to display.', 'mynote' ); ?></h2>

	</article>

<?php endif; ?>

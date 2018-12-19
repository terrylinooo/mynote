<?php
/**
 * The Loop section of Githuber theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0.0
 * @version 1.0.7.0
 */

?>
<?php if ( have_posts() ) : ?>

	<div class="row my-4">

		<?php while ( have_posts() ) : ?>

		<?php the_post(); ?>

		<div class="col-sm-4">
			<article id="post-<?php the_ID(); ?>" class="article-list">
				<div class="card my-2">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php githuber_post_thumbnail(); ?>
					<?php endif; ?>

					<div class="card-body">
						<?php if ( githuber_is_text_fade_out() ) : ?>

						<div class="card-text-fade-out">
							<h5 class="card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
							<p class="card-text"><?php githuber_excerpt(); ?></p>
							<div class="effect-layer"></div>
						</div>

						<?php else : ?>

						<h5 class="card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
						<p class="card-text"><?php githuber_excerpt(); ?></p>

						<?php endif; ?>

						<div class="card-body-footer">
							<?php // githuber_posted_date_button(); Uncomment this line if needed. ?>
							<?php githuber_comment_button(); ?>
							<?php githuber_read_button(); ?>
							<?php githuber_edit_button(); ?>
						</div>
					</div>
					<div class="card-footer text-muted text-center">
						<?php githuber_author_posted_date(); ?>
					</div>
				</div>
			</article>
		</div>

		<?php endwhile; ?>

	</div>

<?php else : ?>

	<article>

		<h2><?php esc_html_e( 'Sorry, nothing to display.', 'githuber' ); ?></h2>

	</article>

<?php endif; ?>

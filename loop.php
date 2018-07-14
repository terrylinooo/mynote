<?php
/**
 * The Loop section of Githuber theme.
 *
 * @link https://terryl.in/theme/githuber
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0
 * @version 1.0.0
 */

?>
<?php if ( have_posts() ) : ?>

	<div class="row">

		<?php while ( have_posts() ) : ?>

		<?php the_post(); ?>

		<div class="col-sm-6">
			<article id="post-<?php the_ID(); ?>" class="article-list">
				<div class="card my-3">
					<?php if ( has_post_thumbnail() ) : ?>
					<?php

					the_post_thumbnail(
						array( 120, 120 ),
						array(
							'class' => 'card-img-top',
							'alt'   => get_the_title(),
						)
					);

					?>
					<?php endif; ?>

					<div class="card-body" style="min-height: 250px; overflow: hidden">
						<h5 class="card-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h5>
						<p class="card-text"><?php githuber_excerpt(); ?></p>
					</div>
					<div class="card-footer text-muted text-center">
						<?php the_author_posted_date(); ?>
					</div>
					<!-- 
					<?php the_posted_date_button(); ?>
					<?php the_comment_button(); ?>
					<?php the_edit_button(); ?>
					<?php the_read_button(); ?>
					-->
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

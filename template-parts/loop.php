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
 * @version 2.0.0
 */

do_action( 'mynote_loop_before' );

?>

<div class="row my-4">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<div class="<?php mynote_layout_columns(); ?>">
			<article id="post-<?php the_ID(); ?>" class="article-list">
				<div class="card my-2">

					<?php if ( mynote_is_post_card_header() && has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php mynote_post_thumbnail(); ?>
						</a>
					<?php endif; ?>
		
					<div class="card-body">
						<div class="card-text-fade-out">
							<h5 class="card-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_title(); ?>
								</a>
							</h5>
							<p class="card-text">
								<?php mynote_excerpt(); ?>
							</p>

							<?php if ( mynote_is_text_fade_out() ) : ?>
								<div class="effect-layer"></div>
							<?php endif; ?>
						</div>

						<?php if ( mynote_is_post_card_body_footer() ) : ?>
							<div class="card-body-footer">
								<?php
									// mynote_posted_date_button(); Uncomment this line if needed.
									mynote_comment_button();
								    mynote_read_button();
								    mynote_edit_button(); 
								?>
							</div>
						<?php endif; ?>
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
<?php 

do_action( 'mynote_loop_before' );
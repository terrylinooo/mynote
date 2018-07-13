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

	<?php while ( have_posts() ) : ?>

	<?php the_post(); ?>



	<article id="post-<?php the_ID(); ?>" style="500px">
		<div class="card my-2 w-50">
			<div class="card-body">
				<h5 class="card-title">
					<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail( array( 120, 120 ) ); ?>
					</a>
					<?php endif; ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h5>
				<p class="card-text"><?php githuber_excerpt(); ?></p>
				<span class="date">
					<?php the_time( 'F j, Y' ); ?> <?php the_time( 'g:i a' ); ?>
				</span>

				<span class="author">
					<?php esc_html_e( 'Published by', 'githuber' ); ?> <?php the_author_posts_link(); ?>
				</span>

				<span class="comments">
					<?php if ( comments_open( get_the_ID() ) ) : ?>
						<?php comments_popup_link( __( 'Leave your thoughts', 'githuber' ), __( '1 Comment', 'githuber' ), __( '% Comments', 'githuber' ) ); ?>
					<?php endif; ?>
				</span>

				<?php edit_post_link(); ?>
				<a href="<?php echo the_permalink(); ?>" class="btn btn-primary">Read</a>
			</div>
		</div>

	</article>

	<?php endwhile; ?>

<?php else : ?>

	<article>

		<h2><?php esc_html_e( 'Sorry, nothing to display.', 'githuber' ); ?></h2>

	</article>

<?php endif; ?>

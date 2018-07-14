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

	<article id="post-<?php the_ID(); ?>">
		<div class="card my-2 w-50">
			<img class="card-img-top" src="..." alt="Card image cap">
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

	<?php endwhile; ?>

<?php else : ?>

	<article>

		<h2><?php esc_html_e( 'Sorry, nothing to display.', 'githuber' ); ?></h2>

	</article>

<?php endif; ?>

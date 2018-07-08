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

	<main role="main">

		<section>

			<h1><?php the_title(); ?></h1>

			<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : ?>

			<?php the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'markdown-body' ); ?>>

				<?php the_content(); ?>

				<?php comments_template( '', true ); ?>

				<br class="clear">

				<?php edit_post_link(); ?>

			</article>


			<?php endwhile; ?>

			<?php else : ?>


			<article>

				<h2><?php esc_html_e( 'Sorry, nothing to display.', 'githuber' ); ?></h2>

			</article>


			<?php endif; ?>

		</section>

	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

<?php
/**
 * The Search page of Githuber theme.
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

	<main role="main">

		<section>

			<h1>
				<?php echo sprintf( __( '%s Search Results for ', 'githuber' ), $wp_query->found_posts ); ?>
				<?php echo get_search_query(); ?>
			</h1>

			<?php get_template_part( 'loop' ); ?>
			<?php get_template_part( 'pagination' ); ?>

		</section>

	</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

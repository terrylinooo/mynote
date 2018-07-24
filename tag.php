<?php
/**
 * The Tag page of Githuber theme.
 *
 * @link https://terryl.in/theme/githuber
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0
 * @version 1.0.0
 */
?>
<?php get_header(); ?>

	<main role="main">

		<div class="container">

			<h1>
				<?php esc_html_e( 'Tag Archive: ', 'githuber' ); ?>
				<?php echo single_tag_title( '', false ); ?>
			</h1>

			<?php get_template_part( 'loop' ); ?>

			<?php get_template_part( 'pagination' ); ?>

		</div>

	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

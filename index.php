<?php
/**
 * The main template file
 *
 * @link https://terryl.in/theme/githuber
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<main role="main">

		<section>

			<h1><?php esc_html_e( 'Latest Posts', 'githuber' ); ?></h1>
			<?php get_template_part( 'loop' ); ?>
			<?php get_template_part( 'pagination' ); ?>

		</section>

	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

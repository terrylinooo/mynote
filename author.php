<?php
/**
 * The Author page of Githuber theme.
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
	<div class="container author-page">
		<?php githuber_author_card( 150, 'lg' ); ?>
		<?php get_template_part( 'loop' ); ?>
		<?php get_template_part( 'pagination' ); ?>
	</div>
</main>

<?php get_footer(); ?>

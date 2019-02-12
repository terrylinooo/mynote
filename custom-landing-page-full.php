<?php
/**
 * Template Name: Landing Page (full)
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.0
 * @version 1.0.7
 */
?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/page/landing', 'page' ); ?>

<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
<aside class="home-middle-sidebar">
	<div class="container px-responsive">
		<div class="row my-4">
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
		</div>
	</div>
</aside>
<?php endif; ?>

<?php get_footer(); ?>

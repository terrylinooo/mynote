
<?php
/**
 * The Archive page of Githuber theme.
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

<div class="category-header">
	<div class="container">
		<h1 id="post-title" class="archive" itemprop="headline">
			<?php esc_html_e( 'Archives', 'githuber' ); ?>
			<span class="badge badge-secondary"><?php echo get_the_date( 'F, Y' ); ?></span>
		</h1>
	</div>
</div>
<main role="main">
	<div class="container">
		<?php get_template_part( 'loop' ); ?>
		<?php get_template_part( 'pagination' ); ?>
	</div>
</main>

<?php get_footer(); ?>

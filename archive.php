<?php
/**
 * The Archive page of Githuber theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0.0
 * @version 1.0.7.0
 */

get_header();
?>

<div class="category-header">
	<div class="container">
		<h1 id="post-title" class="archive" itemprop="headline">
			<?php echo get_the_date( 'F, Y' ); ?>
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

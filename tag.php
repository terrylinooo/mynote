<?php
/**
 * The Tag page of Githuber theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0.0
 * @version 1.0.7.0
 */
$cat_description = category_description();
get_header();
?>

<div class="category-header">
	<div class="container">
		<h1 id="post-title" class="tag" itemprop="headline">
			<?php single_cat_title(); ?>
		</h1>
		<?php if ( ! empty( $cat_description ) ) : ?>
			<div class="term-desctiotion"><?php echo $cat_description; ?></div>
		<?php endif; ?>
	</div>
</div>
<main role="main">
	<div class="container">
		<?php get_template_part( 'loop' ); ?>
		<?php get_template_part( 'pagination' ); ?>
	</div>
</main>

<?php get_footer(); ?>

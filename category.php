<?php
/**
 * The Category page of Mynote theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.0
 * @version 1.2.0
 */
$cat_description = category_description();

get_header();

?>

<div class="category-header">
	<div class="container">
		<h1 id="post-title" class="category" itemprop="headline">
			<?php single_cat_title(); ?>
		</h1>
		<?php if ( ! empty( $cat_description ) ) : ?>
			<div class="term-desctiotion"><?php echo $cat_description; ?></div>
		<?php endif; ?>
	</div>
</div>
<main role="main">
	<div class="container">
		<div class="row row-layout-choice-archive">
			<section id="main-container" class="<?php echo esc_attr( mynote_main_container_css() ); ?>">
				<?php get_template_part( 'loop' ); ?>
				<?php get_template_part( 'pagination' ); ?>
			</section>

			<?php if ( mynote_is_sidebar() ) : ?>
			<aside id="aside-container" class="col-lg-4 col-md-4 col-sm-12" role="complementary">
				<?php get_sidebar( 'archive' ); ?>
			</aside>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>

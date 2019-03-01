<?php
/**
 * The Author page of Mynote theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.0
 * @version 1.2.0
 */

get_header();

?>

<main role="main">
	<div class="container author-page">
		<?php mynote_author_card( 150, 'lg' ); ?>
	</div>
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

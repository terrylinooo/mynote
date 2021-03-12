<?php
/**
 * The Tag page of Mynote theme.
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
		<div class="row row-layout-choice-archive">
			<section id="main-container" class="<?php echo esc_attr( mynote_main_container_css() ); ?>">
				<?php
					if ( have_posts() ) {
						get_template_part( 'template-parts/loop' );
						get_template_part( 'template-parts/pagination' );
					} else {
						get_template_part( 'template-parts/content', 'none' );
					}
				?>
			</section>

			<?php
				/**
				 * Hook: mynote_archive_sidebar
				 *
				 * @hooked mynote_archive_sidebar - 10
				 */
				do_action( 'mynote_archive_sidebar' );
			?>
		</div>
	</div>
</main>

<?php

get_footer();

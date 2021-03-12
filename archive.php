<?php
/**
 * The Archive page of Mynote theme.
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

<div class="category-header">
	<div class="container">
		<h1 id="post-title" class="archive" itemprop="headline">
			<?php echo get_the_date( 'F, Y' ); ?>
		</h1>
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
				 * Functions hooked in to mynote_archive_sidebar action
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

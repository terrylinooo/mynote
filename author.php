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

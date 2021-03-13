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
 * @version 2.0.0
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

<?php
	/**
	 * Hook: mynote_archive_headline_after
	 * 
	 * The width here is wide, style it with proper CSS code.
	 */
	do_action( 'mynote_archive_headline_after' );
?>

<main role="main">
	<?php get_template_part( 'template-parts/archive' ); ?>
</main>

<?php 

get_footer();



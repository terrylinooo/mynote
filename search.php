<?php
/**
 * The Search page of Mynote theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.0
 * @version 1.0.7.0
 */

get_header();

?>

<div class="category-header">
	<div class="container">
		<h1 id="post-title" class="search" itemprop="headline">
			<?php echo get_search_query(); ?>
			<span class="badge badge-secondary"><?php echo $wp_query->found_posts; ?></span>	
		</h1>
		<div class="term-desctiotion">
			<?php
				// translators: %1$s is the number of search results, %2$s is the search query.
				echo sprintf( __( '%1$s Search Results for %2$s', 'mynote' ), $wp_query->found_posts, get_search_query() );
			?>
		</div>
	</div>
</div>
<main role="main">
	<div class="container">
		<?php get_template_part( 'loop' ); ?>
		<?php get_template_part( 'pagination' ); ?>
	</div>
</main>

<?php get_footer(); ?>

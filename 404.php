<?php
/**
 * Error 404 - Page not found.
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
		<h1 id="post-title" class="error-404" itemprop="headline">
			<?php esc_html_e( 'Page not found', 'mynote' ); ?>
		</h1>
	</div>
</div>
<main role="main">
	<div class="container">
		<article id="post-404">
			<p>
				<?php esc_html_e( 'The page you are looking for does not exist or it may have been moved.', 'mynote' ); ?>

				<ul>
					<li>
						<a href="<?php echo esc_url( home_url() ); ?>">
							<?php esc_html_e( 'Return home?', 'mynote' ); ?>
						</a>
					</li>
				</ul>
			</p>
		</article>
	</div>
</main>

<?php

get_footer();

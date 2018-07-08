<?php


get_header();

?>

	<main role="main">

		<section>

			<article id="post-404">

				<h1><?php html_esc_e( 'Page not found', 'githuber' ); ?></h1>

				<h2>
					<a href="<?php echo esc_url( home_url() ); ?>"><?php html_esc_e( 'Return home?', 'githuber' ); ?></a>
				</h2>

			</article>

		</section>

	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

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
 * @version 1.6.3
 */

get_header();

?>

<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
<div class="category-header">
	<div class="container">
		<h1 id="post-title" class="archive" itemprop="headline">
			<?php woocommerce_page_title(); ?>
		</h1>
	</div>
</div>
<?php endif; ?>
<main role="main">
	<div class="container">
		<div class="row row-layout-choice-archive">
			<section id="main-container" class="<?php echo esc_attr( mynote_main_container_css() ); ?>">

				<?php

				if ( woocommerce_product_loop() ) {
					do_action( 'woocommerce_before_shop_loop' );

					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();
							do_action( 'woocommerce_shop_loop' );
							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();

					do_action( 'woocommerce_after_shop_loop' );

				} else {
					do_action( 'woocommerce_no_products_found' );
				}

				do_action( 'woocommerce_after_main_content' );

				?>

			</section>
		</div>
	</div>
</main>

<?php

get_footer();


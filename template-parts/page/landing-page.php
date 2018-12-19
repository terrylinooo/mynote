<?php
/**
 * Template Name: Landing page
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0.0.7
 * @version 1.0.7.7
 */

if ( is_active_sidebar( 'sidebar-5' ) ) {
	$css_left = 'col-12 col-md-7 text-center text-md-left';
} else {
	$css_left = 'col-12 col-md-12 text-center text-md-left';
}

if ( has_post_thumbnail() ) {
    $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    $intro_style = ' bg-cover" style="background-image: url(' . $backgroundImg[0] . ')"';
} else {
    $intro_style = '';
}
?>

<div class="data-schema">
	<main role="main">
		<div class="section-intro d-flex align-items-center<?php echo $intro_style; ?>">
			<div class="container px-responsive">
				<div class="d-md-flex align-items-center">
					<div class="<?php echo esc_attr( $css_left ); ?>" style="min-height: 100%; overflow: hidden" >
						<h1 class="mb-3"><?php the_title(); ?></h1>
                        <?php if ( has_excerpt() ) : ?> 
						<p class="mb4 desc-text"><?php echo get_the_excerpt(); ?></p>
                        <?php endif; ?>
					</div>
					<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
					<div class="col-12 col-md-5">
						<aside class="home-intro-sidebar">
							<div class="container px-responsive">
								<div class="row my-4">
									<?php dynamic_sidebar( 'sidebar-5' ); ?>
								</div>
							</div>
						</aside>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="container my-4">
			<div class="row">
				<section id="main-container" class="col" role="main">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'markdown-body' ); ?>>
						<div itemprop="articleBody">
							<?php the_content(); ?>
							<?php
								wp_link_pages(
									array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'githuber' ),
										'after'  => '</div>',
									)
								);
							?>
						</div>
					</article>
					<?php endwhile; ?>
				<?php else : ?>
					<article>
						<h1><?php esc_html_e( 'Sorry, nothing to display.', 'githuber' ); ?></h1>
					</article>
				<?php endif; ?>
				</section>
			</div><!-- .row -->
		</div><!-- .container -->
		<div class="container">
			<section>
                <?php
                    $args = array( 'post_type' => 'post', 'posts_per_page' => 10 );
                    $wp_query = new WP_Query( $args );
                ?>
				<?php get_template_part( 'loop' ); ?>
				<?php get_template_part( 'pagination' ); ?>
			</section>
		</div>
	</main>

    <br class="clearfix" />

</div><!-- .data-schema -->

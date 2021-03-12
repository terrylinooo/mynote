<?php
/**
 * Mynote template functions for hooks.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 2.0.0
 */

if ( ! function_exists( 'mynote_header_navigation' ) ) {
	/**
	 * Display the header menu.
	 *
	 * @since  2.0.0
	 * @return void
	 */
	function mynote_header_navigation() {

		$is_brand_url     = false;
		$addon_body_class = '';
		$site_brand_url   = '';

		if ( '' !== mynote_site_icon() ) {
			$is_brand_url      = true;
			$addon_body_class .= 'has-site-icon';
			$site_brand_url    = mynote_site_icon();
		}

		if ( '' !== mynote_site_logo() ) {
			$is_brand_url = true;

			if ( ! empty( $addon_body_class ) ) {
				$addon_body_class .= ' ';
			}
			$addon_body_class .= 'has-site-logo';
			$site_brand_url    = mynote_site_logo();
		}

		$addon_navbar_class = '';

		if ( ! mynote_is_responsive() ) {
			$addon_navbar_class = 'navbar-expand';
		}

		?>
			<nav class="navbar navbar-expand-lg navbar-dark <?php echo $addon_navbar_class; ?>" role="navigation">
				<?php if ( $is_brand_url ) : ?>
					<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
						<img src="<?php echo esc_url( $site_brand_url ); ?>" alt="<?php esc_attr_e( 'Logo', 'mynote' ); ?>" class="logo-img">
					</a>
				<?php endif; ?>

				<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
					<?php mynote_nav(); ?>
				<?php else : ?>
					<?php mynote_default_nav(); ?>
				<?php endif; ?>

				<div class="search-bar">
					<?php get_search_form() ?>
				</div>

				<button class="navbar-toggler" 
					type="button" data-toggle="collapse" 
					data-target="#mynote-nav-bar" 
					aria-controls="mynote-nav-bar" 
					aria-expanded="false" 
					aria-label="<?php esc_attr_e( 'Toggle navigation', 'mynote' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>
			</nav>
		<?php
	}
}

if ( ! function_exists( 'mynote_footer_widgets' ) ) {
	/**
	 * Display the theme credit
	 *
	 * @since  2.0.0
	 * @return void
	 */
	function mynote_footer_widgets() {
		if ( is_active_sidebar( 'sidebar-2' ) ) {
			?>
				<section class="footer-sidebar">
					<div class="container px-responsive">
						<div class="row my-4">
							<?php dynamic_sidebar( 'sidebar-2' ); ?>
						</div>
					</div>
				</section>
			<?php
		}
	}
}

if ( ! function_exists( 'mynote_footer_columns' ) ) {
	/**
	 * Display the theme credit, footer menu and social links.
	 *
	 * @since  2.0.0
	 * @return void
	 */
	function mynote_footer_columns() {
		?>
			<div class="container footer-columns">
				<div class="footer-column-left">
					<div><?php mynote_site_info(); ?></div>
					<div><?php mynote_nav( 'footer' ); ?></div>
				</div>
				<div class="footer-column-right">
					<?php mynote_nav( 'social' ); ?>
				</div>
			</div>
		<?php
	}
}

if ( ! function_exists( 'mynote_homepage_promotion' ) ) {
	/**
	 * Display the promotion area in homepage.
	 *
	 * @since  2.0.0
	 * @return void
	 */
	function mynote_homepage_promotion() {
		$custom_header_image = '';

		if ( has_header_image() ) {
			$custom_header_image = 'background-image: url(' . get_header_image() . ');';
		}
		?>

		<div class="section-intro d-flex align-items-center" style="<?php echo $custom_header_image; ?>">
				<div class="container px-responsive">
					<div class="d-md-flex align-items-center">
						<div class="col-12 col-md-7 text-center text-md-left" style="min-height: 100%; overflow: hidden" >
							<h1 class="mb-3"><?php echo get_bloginfo( 'name' ); ?></h1>
							<p class="mb4 desc-text" id="header-desc-text">
								<?php echo html_entity_decode( get_bloginfo( 'description' ) ); ?>
							</p>
						</div>
						<div class="col-12 col-md-5">
							<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
								<aside class="home-intro-sidebar">
									<div class="container px-responsive">
										<div class="row my-4">
											<?php dynamic_sidebar( 'sidebar-5' ); ?>
										</div>
									</div>
								</aside>
							<?php else : ?>
								<p class="p-5"><?php mynote_category_labels(); ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="scroll-area">
					<a href="#main-container"><i class="fas fa-arrow-down"></i></a>
				</div>
			</div>
		<?php
	}
}

if ( ! function_exists( 'mynote_homepage_middle_sidebar' ) ) {
	/**
	 * Display the middle sidebar in homepage.
	 *
	 * @since  2.0.0
	 * @return void
	 */
	function mynote_homepage_middle_sidebar() {
		if ( is_active_sidebar( 'sidebar-4' ) ) {
			?>
			<aside class="home-middle-sidebar">
				<div class="container px-responsive">
					<div class="row my-4">
						<?php dynamic_sidebar( 'sidebar-4' ); ?>
					</div>
				</div>
			</aside>
			<?php
		}
	}
}

if ( ! function_exists( 'mynote_homepage_sidebar' ) ) {
	/**
	 * Display the sidebar in homepage.
	 *
	 * @since  2.0.0
	 * @return void
	 */
	function mynote_homepage_sidebar() {
		if ( mynote_is_sidebar() ) {
			?>
			<aside id="aside-container" class="col-lg-4 col-md-4 col-sm-12" role="complementary">
				<div id="sidebar-home" class="sidebar">
					<?php dynamic_sidebar( 'sidebar-6' ); ?>
				</div>
			</aside>
			<?php
		}
	}
}

if ( ! function_exists( 'mynote_archive_sidebar' ) ) {
	/**
	 * Display the sidebar in archive.
	 *
	 * @since  2.0.0
	 * @return void
	 */
	function mynote_archive_sidebar() {
		if ( mynote_is_sidebar() ) {
			?>
			<aside id="aside-container" class="col-lg-4 col-md-4 col-sm-12" role="complementary">
				<div id="sidebar-home" class="sidebar">
					<?php dynamic_sidebar( 'sidebar-7' ); ?>
				</div>
			</aside>
			<?php
		}
	}
}

if ( ! function_exists( 'mynote_single_post_sidebar' ) ) {
	/**
	 * Display the sidebar in single posts.
	 *
	 * @since  2.0.0
	 * @return void
	 */
	function mynote_single_post_sidebar() {
		if ( mynote_is_sidebar() ) {
			?>
			<aside id="aside-container" class="col-lg-4 col-md-4 col-sm-12" role="complementary">
				<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
					<div id="sidebar" class="sidebar">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
					<div id="sidebar-sticky" class="sidebar sticky-top">
						<?php dynamic_sidebar( 'sidebar-3' ); ?>
					</div>
				<?php endif; ?>
			</aside>
			<?php
		}
	}
}

if ( ! function_exists( 'mynote_pagination_section' ) ) {
	/**
	 * Display pagination.
	 *
	 * @since  2.0.0
	 * @return void
	 */
	function mynote_pagination_section() {
		if ( function_exists( 'mynote_pagination' ) ) {
			mynote_pagination();
		} else {
			the_posts_pagination(
				array(
					'prev_text'          => '<i class="fas fa-angle-left"></i> <span class="screen-reader-text">' . __( 'Previous page', 'mynote' ) . '</span>',
					'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'mynote' ) . '</span> <i class="fas fa-angle-right"></i>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'mynote' ) . ' </span>',
				)
			);
		}
	}
}

if ( ! function_exists( 'mynote_post_metadata' ) ) {
	/**
	 * Display post metadata before post's content.
	 *
	 * @since  2.0.0
	 * @return void
	 */
	function mynote_post_metadata() {
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				mynote_post_breadcrumb();

				?>
					<div class="single-post-header">
						<div class="container">

							<h1 id="post-title" itemprop="headline"><?php the_title(); ?></h1>
							<div class="post-mynote-buttons">

								<?php if ( mynote_is_sidebar() ) : ?>
									<?php mynote_column_control_button(); ?>
								<?php endif; ?>

								<?php mynote_edit_button(); ?>
								<?php mynote_comment_button(); ?>
							</div><!-- .post-mynote-buttons -->

							<?php if ( mynote_is_post_author_date() ) : ?>
								<div class="post-meta">
									<?php mynote_author_posted_date( true ); ?>
								</div>
							<?php endif; ?>

						</div><!-- .container -->
					</div><!-- .single-post-header -->
				<?php
			}
		}
	}
}

if ( ! function_exists( 'mynote_check_responsive' ) ) {
	/**
	 * Check setting about responsive.
	 *
	 * @since  2.0.0
	 * @return void
	 */
	function mynote_check_responsive() {
		if ( mynote_is_responsive() ) {
			echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
		}
	}
}

<?php
/**
 * Custom template tags for Mynote theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.7
 */

 /**
  * The follwing methods could be defined in child theme:
  *
  * - mynote_read_button
  * - mynote_edit_button
  * - mynote_comment_button
  * - mynote_author_posted_date
  * - mynote_author_card
  * - mynote_site_info
  */

/**
 * Mynote navigation.
 *
 * @param string $position The position on a page.
 */
function mynote_nav( $position = 'header' ) {
	if ( 'header' === $position ) {

		if ( class_exists( 'Mynote_Walker' ) ) {
			wp_nav_menu(
				array(
					'theme_location'  => 'header-menu',
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'mynote-nav-bar',
					'menu_class'      => 'navbar-nav mr-auto',
					'menu_id'         => '',
					'depth'           => 2,
					'fallback_cb'     => 'Mynote_Walker::fallback',
					'walker'          => new Mynote_Walker(),
				)
			);
		} else {
			wp_nav_menu(
				array(
					'theme_location'  => 'header-menu',
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'mynote-nav-bar',
					'menu_class'      => 'navbar-nav mr-auto',
					'menu_id'         => '',
					'depth'           => 1
				)
			);
		}
	}

	if ( 'footer' === $position ) {
		if ( has_nav_menu( 'footer-menu' ) ) {
			wp_nav_menu(
				array(
					'theme_location'  => 'footer-menu',
					'container'       => 'nav',
					'container_class' => 'footer-nav',
					'container_id'    => 'mynote-footer-nav',
					'menu_class'      => 'footer-menu',
					'menu_id'         => '',
					'depth'           => 1,
				)
			);
		}
	}

	if ( 'social' === $position ) {
		if ( has_nav_menu( 'social' ) ) {
			wp_nav_menu(
				array(
					'theme_location'  => 'social',
					'container'       => 'nav',
					'container_class' => 'footer-nav',
					'menu_class'      => 'social-icon-links',
					'depth'           => 1,
					'link_before'     => '<span class="screen-reader-text">',
					'link_after'      => '</span>',
				)
			);
		}
	}
}

/**
 * If header_menu not set.
 */
function mynote_default_nav() {
	?>
	<div id="mynote-nav-bar" class="collapse navbar-collapse">
		<ul id="menu-primary-menu" class="navbar-nav mr-auto">
			<li class="nav-item"><a href="<?php echo esc_url( home_url() ); ?>" class="nav-link"><?php esc_html_e( 'Home', 'mynote' ); ?></a></li>
		</ul>
	</div>
	<?php
}

/**
 * The mynote Post thumbnail.
 */
function mynote_post_thumbnail() {
	$size = 'mynote-thumbnail';

	if ( is_home() || is_front_page() ) {
		if ( '2' === get_theme_mod( 'layout_cols_per_row_home') ) {
			$size = 'mynote-medium';
		}
		if ( '1' === get_theme_mod( 'layout_cols_per_row_home') ) {
			$size = 'post-large';
		}
	} else {
		if ( '2' === get_theme_mod( 'layout_cols_per_row_archive') ) {
			$size = 'mynote-medium';
		}
		if ( '1' === get_theme_mod( 'layout_cols_per_row_archive') ) {
			$size = 'post-large';
		}
	}

	the_post_thumbnail( $size,
		array(
			'class' => 'card-img-top',
			'alt'   => get_the_title(),
		)
	);
}

/**
 * Mynote - Bootstrap 4 Pagination
 *
 * @param integer $range - range of pagination to show previous and next pages.
 * @return void
 */
function mynote_pagination( $range = 1 ) {
	global $wp_query, $paged;

	if ( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	} elseif ( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	} else {
		$paged = 1;
	}

	$current = (int) $paged;
	$pages   = (int) $wp_query->max_num_pages;

	// $pagi_items = ( $range * 2 ) + 1;
	$pagi_items = (int) $range;

	if ( empty( $pages ) ) {
		$pages = $wp_query->max_num_pages;

		if ( empty( $pages ) ) {
			$pages = 1;
		}
	}

	if ( 0 === $current ) {
		$current = 1;
	}

	if ( 1 !== $pages ) {
		?>

		<nav aria-label="Page navigation" role="navigation">
			<span class="sr-only"><?php esc_html_e( 'Page navigation', 'mynote' ); ?></span>
			<ul class="pagination justify-content-center ft-wpbs">

				<li class="page-item disabled hidden-md-down d-none d-lg-block">
					<span class="page-link"><?php echo esc_html( $current ); ?> / <?php echo esc_html( $pages ); ?></span>
				</li>

				<?php if ( $current > 2 && $current > $range + 1 && $pagi_items < $pages ) : ?>

				<li class="page-item">
					<a class="page-link" href="<?php echo esc_url( get_pagenum_link( 1 ) ); ?>" aria-label="<?php esc_attr_e( 'First Page', 'mynote' ); ?>">
						&laquo;<span class="hidden-sm-down d-none d-md-inline-block">&nbsp;<?php esc_html_e( 'First', 'mynote' ); ?></span>
					</a>
				</li>
				<?php endif; ?>

				<?php if ( $current > 1 && $pagi_items < $pages ) : ?>
					<li class="page-item">
						<a class="page-link" href="<?php echo esc_url( get_pagenum_link( $current - 1 ) ); ?>" aria-label="<?php esc_attr_e( 'Previous Page', 'mynote' ); ?>">
							&lsaquo;<span class="hidden-sm-down d-none d-md-inline-block">&nbsp;<?php esc_html_e( 'Previous', 'mynote' ); ?></span>
						</a>
					</li>
				<?php endif; ?>

				<?php for ( $i = 1; $i <= $pages; $i++ ) : ?>
					<?php if ( 1 !== $pages && ( ! ( $i >= $current + $range + 1 || $i <= ( $current - $range ) - 1 ) || $pages <= $pagi_items ) ) : ?>
						<?php if ( $current === $i ) : ?>
							<li class="page-item active">
								<span class="page-link">
									<span class="sr-only"><?php esc_html_e( 'Current Page', 'mynote' ); ?></span>
									<?php echo esc_html( $i ); ?>
								</span>
							</li>
						<?php else : ?>
							<li class="page-item">
								<a class="page-link" href="<?php echo esc_url( get_pagenum_link( $i ) ); ?>">
									<span class="sr-only"><?php esc_html_e( 'Page', 'mynote' ); ?></span>
									<?php echo esc_html( $i ); ?>
								</a>
							</li>
						<?php endif; ?>
					<?php endif; ?>
				<?php endfor; ?>

				<?php if ( $current < $pages && $pagi_items < $pages ) : ?>
					<li class="page-item">
						<a class="page-link" href="<?php echo esc_url( get_pagenum_link( $current + 1 ) ); ?>" aria-label="<?php esc_attr_e( 'Next Page', 'mynote' ); ?>">
							<span class="hidden-sm-down d-none d-md-inline-block"><?php esc_html_e( 'Next', 'mynote' ); ?>&nbsp;</span>&rsaquo;
						</a>
					</li>
				<?php endif; ?>

				<?php if ( $current < $pages - 1 && $current + $range - 1 < $pages && $pagi_items < $pages ) : ?>
					<li class="page-item">
						<a class="page-link" href="<?php echo esc_url( get_pagenum_link( $pages ) ); ?>" aria-label="<?php esc_attr_e( 'Last Page', 'mynote' ); ?>">
							<span class="hidden-sm-down d-none d-md-inline-block"><?php esc_html_e( 'Last', 'mynote' ); ?>&nbsp;</span>&raquo;
						</a>
					</li>
				<?php endif; ?>
			</ul>
		</nav>

		<?php
	}
}

/**
 * Get the excerpt.
 *
 * @return void
 */
function mynote_excerpt() {
	global $post;

	$output = get_the_excerpt();
	$output = apply_filters( 'wptexturize', $output );
	$output = apply_filters( 'convert_chars', $output );
	echo $output;
}

/**
 * Is text fade out or not. (post list)
 *
 * @return bool
 */
function mynote_is_text_fade_out() {
	$setting = get_theme_mod( 'post_card_show_gradient_mask' );
	if ( ! mynote_toggle_check( $setting ) ) {
		return false;
	}
	return true;
}

/**
 * Show title progress bar.
 *
 * @return void
 */
function mynote_title_progress_bar() {
	?>
		<div class="single-post-title-bar clear" role="banner">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-dark" role="navigation">
					<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>"></a>
					<div id="progress-title"></div>
				</nav>
			</div>
			<div class="progress-wrapper">
				<div class="progress-label"></div>
				<progress></progress>
			</div>
		</div>
	<?php
}

/**
 * Get article schemal.
 *
 * @param string $schema Article type.
 * @return void
 */
function mynote_article_schema( $schema = '' ) {

	switch ( $schema ) {
		case 'tech':
			$schema = 'TechArticle';
			break;
		case 'news':
			$schema = 'NewsArticle';
			break;
		case 'scholarly':
			$schema = 'ScholarlyArticles';
			break;
		case 'product':
			$schema = 'Product';
			break;
		default:
			$schema = 'Article';
	}
	echo esc_url( 'http://schema.org/' . $schema);
}

/**
 * Custom edit button with GitHub style.
 *
 * @return void
 */
if ( ! function_exists( 'mynote_edit_button' ) ) {
	function mynote_edit_button() {
		global $post;

		if ( ! current_user_can( 'edit_post', $post->ID ) ) {
			return;
		}

		echo '
			<a href="' . esc_url( get_edit_post_link() ) . '" class="button-like-link">
				<div class="btn-counter text-only">		
					<div class="btn">' . esc_html__( 'Edit', 'mynote' ) . '</div>
				</div>
			</a>
		';
	}
}

/**
 * Adjust columns.
 *
 * @return void
 */
function mynote_column_control_button() {
	?>
		<div class="btn-group column-control">
			<div class="btn-counter text-only active" data-target="#aside-container" role="button">		
				<div class="btn"><i class="fas fa-columns"></i></div>
			</div>
			<div class="btn-counter text-only" data-target="#sidebar" role="button">		
				<div class="btn"><i class="fas fa-list-ul"></i></div>
			</div> 
		</div>
	<?php
}

/**
 * The comment button.
 *
 * @param bool $show_label Display label.
 * @return void
 */
if ( ! function_exists( 'mynote_comment_button' ) ) {
	function mynote_comment_button( $show_label = false ) {
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
			return;
		}
	
		echo '
			<a href="' . esc_url( get_the_permalink() ) . '#comments" class="button-like-link">
				<div class="btn-counter">
					<div class="btn">
						' . ( ( $show_label ) ? '<i class="fas fa-comment-dots"></i> ' . esc_html__( 'Comment', 'mynote' ) : '<i class="fas fa-comment-dots"></i>' ) . '
					</div>
					<div class="count-box">' . esc_html( get_comments_number() ) . '</div>
				</div>
			</a>
		';
	}
}


/**
 * The Mynote button.
 *
 * @return void
 */
if ( ! function_exists( 'mynote_read_button' ) ) {
	function mynote_read_button() {
		echo '
			<a href="' . esc_url( get_the_permalink() ) . '" class="button-like-link">
				<div class="btn-counter text-only">		
					<div class="btn">' . esc_html__( 'Read', 'mynote' ) . '</div>
				</div>
			</a>
		';
	}
}

/**
 * Post figure.
 *
 * @return void
 */
function mynote_post_figure() {
	$thumbnail_caption = get_the_post_thumbnail_caption();
	?>
		<figure>
			<?php
				the_post_thumbnail( '', array(
					'itemprop' => 'image',
					'alt'      => esc_attr( $thumbnail_caption ),
				) );
			?>
			<figcaption><?php echo esc_html( $thumbnail_caption ); ?></figcaption>
		</figure>
	<?php
}

/**
 * The posted date button.
 *
 * @param bool $show_label Show text label or not.
 * @return void
 */
function mynote_posted_date_button( $show_label = false ) {
	echo '
		<div class="btn-counter">
			<div class="btn">
				<i class="far fa-calendar-alt"></i> ' . ( ( $show_label ) ? esc_html__( 'Date', 'mynote' ) : '' ) . '
			</div>
			<div class="count-box">' . date( 'Y-m-d', get_the_time( 'U' ) ) . '</div>
		</div>
	';
}

/**
 * The authour posted date.
 *
 * @param bool $show_avatar Show author avatar.
 * @param int  $avatar_size Avatar size.
 * @return void
 */
if ( ! function_exists( 'mynote_author_posted_date' ) ) {
	function mynote_author_posted_date( $show_avatar = false, $avatar_size = 40 ) {
		echo '<div class="author-posted-date">';

		if ( $show_avatar ) {
			echo '<img src="' . esc_url( get_avatar_url( get_the_author_meta( 'ID' ), array( 'size' => $avatar_size ) ) ) . '" class="rounded-circle poster-avatar" align="middle"> ';
		}

		printf( '<a href="%1$s" title="written %2$s" class="author-link">%3$s</a> <time itemprop="datePublished" datetime="%4$s">%5$s</time>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			sprintf( esc_html__( '%1$s @ %2$s', 'mynote' ),
				esc_html( get_the_date() ), 
				esc_attr( get_the_time() )
			),
			get_the_author(),
			get_the_time( 'c' ),
			sprintf( 
				_x( 'written %s ago', '%s', 'mynote' ),
				human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) )
			)
		);

		echo '</div>';
	}
}

/**
 * Site icon.
 *
 * @return string Icon Url
 */
function mynote_site_icon() {
	$fallback_url = '';

	if ( version_compare( $GLOBALS['wp_version'], '4.3', '>' ) ) {
		return esc_url( get_site_icon_url( '32', $fallback_url ) );
	}
	return '';
}

/**
 * Site logo.
 *
 * Mynote dosn't use the_custom_logo(), the reason is because it supports 4.5 or up.
 * I hope even lower version of WordPress is able to use this theme as well.
 *
 * @return string Logo Url
 */
function mynote_site_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	
	if ( ! empty( $logo ) ) {
		return esc_url( $logo[0] );
	}
	return '';
}

if ( ! function_exists( 'mynote_author_card' ) ) {
	/**
	 * The author card.
	 *
	 * @param integer $avatar_size The avatar size.
	 * @param string  $icon_size   The social icon size. sm: 24px. md: 32px. lg: 48px. xl: 64px.
	 *
	 * @return void
	 */
	function mynote_author_card( $avatar_size = 96, $icon_size = 'sm' ) {
		$description = get_the_author_meta( 'description' );
		?>
			<h3 class="section-title"><?php esc_html_e( 'Author', 'mynote' ); ?></h3>
			<aside class="author-card" itemscope itemprop="author" itemtype="http://schema.org/Person">
				<div class="author-avatar">
					<img src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ), array( 'size' => $avatar_size ) ) ); ?>" class="rounded-circle" itemprop="image">
				</div>
				<div class="author-info">
					<div class="author-title">
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" itemprop="name">
							<?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
						</a>
					</div>
					<div class="author-description" itemprop="description">  
						<?php echo $description; ?>
					</div>
				</div>
			</aside>
		<?php
	}
}
/**
 * Bootstrap 4 styled category buttons.
 */
function mynote_category() {
	$categories = get_the_category();

	foreach ( $categories as $category ) {
		echo '<a class="btn btn-xs btn-green" href="' . esc_url( get_category_link( $category->term_id ) ) . '"><i class="fas fa-star"></i>' . esc_html( $category->cat_name ) . '</a>';
	}
}

/**
 * Show category labels on homepage.
 * Parent only.
 *
 * @return void
 */
function mynote_category_labels() {
	$categories = get_categories();

	$i = 0;
	foreach ( $categories as $cat ) {
		if ( ! empty( $cat->parent ) ) {
			// Only shows parent catrgories.
			continue;
		}
		echo '<a href="' . esc_url( get_term_link( $cat->slug, 'category' ) ) . '" class="x-label x-label-' . $i . '">' . esc_html( $cat->name ) . '</a>';
		if ( 10 === ++$i ) {
			$i = 0;
		}
	}
}

/**
 * Display site information on bottom of page.
 *
 * @return void
 */
if ( ! function_exists( 'mynote_site_info' ) ) {
	function mynote_site_info() {
		echo esc_html__( 'Copyright', 'mynote' ) . ' &copy; ' . date( 'Y' ) . ' <strong><a href="' . esc_url( get_site_url() ) . '">' . get_bloginfo( 'name' ) . '</a></strong>. ' . esc_html__( 'All rights reserved.', 'mynote' ) . ' ';

		// Keeping the theme credit link encourages me to improve this theme better. Thank you.
		$theme_link = 'https://terryl.in/';
		echo esc_html__( 'Theme by', 'mynote' ) . ' <a href="' . esc_url( $theme_link ) . '" target="_blank">' . esc_html__( 'Mynote', 'mynote' ) . '</a>. ';
	}
}

/**
 * Breadcrumb for single post.
 *
 * @return void
 */
function mynote_post_breadcrumb() {
	global $post;

	if ( mynote_is_post_breadcrumb() && is_singular() ) {
		$categories = get_the_category( $post->ID );

		$is_first_cat = false;
		foreach ( $categories as $cat ) {
			if ( empty( $cat->parent ) && ! $is_first_cat ) {
				$is_first_cat = true;
				$first_cat = $cat;
			}
		}
		// Looking for child category.
		$is_child_cat = false;
		foreach ( $categories as $cat ) {
			if ( $cat->category_parent === $first_cat->cat_ID && ! $is_child_cat ) {
				$is_child_cat = true;
				$child_cat = $cat;
			}
		}
		$pos = 1;

		?>
		<nav class="breadcrumb">
			<div class="container">
				<ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
					<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<a href="<?php echo esc_url( get_home_url() ); ?>" itemprop="item">
							<span itemprop="name"><i class="fas fa-globe"></i><span class="sr-only"><?php esc_html_e( 'Home', 'mynote' ); ?></span></span>
						</a>
						<meta itemprop="position" content="<?php echo $pos++; ?>">
					</li>
					<?php if ( ! empty( $first_cat ) ) : ?>
					<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<a href="<?php echo esc_url( get_term_link( $first_cat->slug, 'category' ) ); ?>" itemprop="item">
							<span itemprop="name"><?php echo esc_html( $first_cat->name ); ?></span>
						</a>
						<meta itemprop="position" content="<?php echo $pos++; ?>">
					</li>
					<?php endif; ?>
					<?php if ( ! empty( $child_cat ) ) : ?>
					<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<a class="breadcrumb-item" href="<?php echo esc_url( get_term_link( $child_cat->slug, 'category' ) ); ?>" itemprop="item">
							<span itemprop="name"><?php echo esc_html( $child_cat->name ); ?></span>
						</a>
						<meta itemprop="position" content="<?php echo $pos++; ?>">
					</li>
					<?php endif; ?>
					<li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<span itemprop="name"><?php the_title(); ?></span>
						<meta itemprop="item" content="<?php echo esc_url( get_permalink( $post->ID ) ); ?>">
						<meta itemprop="position" content="<?php echo $pos++; ?>">
					</li>
				</ul>
			</div>
		</nav>
		<?php
	}
}

/**
 * Return CSS class string for main container section.
 *
 * @return string
 */
function mynote_main_container_css() {
	$css_class_string = 'col-lg-12 col-md-12 col-sm-12';

	if ( is_home() || is_front_page() ) {
		if ( is_active_sidebar( 'sidebar-6' ) ) {
			$css_class_string = 'col-lg-8 col-md-8 col-sm-12';
		}
	} elseif ( is_single() ) {
		if ( is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-3' ) ) {
			$css_class_string = 'col-lg-8 col-md-8 col-sm-12';
		}
	} else {
		if ( is_active_sidebar( 'sidebar-7' ) ) {
			$css_class_string = 'col-lg-8 col-md-8 col-sm-12';
		}
	}
	echo $css_class_string;
}

/**
 * Check if sidebar exists on current page.
 *
 * @return bool
 */
function mynote_is_sidebar() {
	$is_sidebar = false;

	if ( is_home() || is_front_page() ) {
		if ( is_active_sidebar( 'sidebar-6' ) ) {
			$is_sidebar = true;
		}
	} elseif ( is_single() ) {
		if ( is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-3' ) ) {
			$is_sidebar = true;
		}
	} else {
		if ( is_active_sidebar( 'sidebar-7' ) ) {
			$is_sidebar = true;
		}
	}
	return $is_sidebar;
}

/**
 * Output CSS class string.
 *
 * @return string
 */
function mynote_layout_columns() {
	$css_class_string = 'col-sm-4';

	if ( is_home() || is_front_page() ) {
		if ( '2' === get_theme_mod( 'layout_cols_per_row_home' ) ) {
			$css_class_string = 'col-sm-6';
		}
		if ( '1' === get_theme_mod( 'layout_cols_per_row_home' ) ) {
			$css_class_string = 'col-sm-12';
		}
	} else {
		if ( '2' === get_theme_mod( 'layout_cols_per_row_archive' ) ) {
			$css_class_string = 'col-sm-6';
		}
		if ( '1' === get_theme_mod( 'layout_cols_per_row_archive' ) ) {
			$css_class_string = 'col-sm-12';
		}
	}
	echo $css_class_string;
}

/**
 * Show post card footer?
 *
 * @return bool
 */
function mynote_is_post_card_footer() {
	$setting = get_theme_mod( 'post_card_show_footer' );
	if ( ! mynote_toggle_check( $setting ) ) {
		return false;
	}
	return true;
}

/**
 * Show post card body footer?
 *
 * @return bool
 */
function mynote_is_post_card_body_footer() {
	$setting = get_theme_mod( 'post_card_show_body_footer' );
	if ( ! mynote_toggle_check( $setting ) ) {
		return false;
	}
	return true;
}

/**
 * Show post card header?
 * Post thumbnail is in this section.
 *
 * @return bool
 */
function mynote_is_post_card_header() {
	$setting = get_theme_mod( 'post_card_show_header' );

	if ( ! mynote_toggle_check( $setting ) ) {
		return false;
	}
	return true;
}

/**
 * Show breadcrumb in post page?
 *
 * @return bool
 */
function mynote_is_post_breadcrumb() {
	$setting = get_theme_mod( 'post_page_show_breadcrumb' );
	if ( ! mynote_toggle_check( $setting ) ) {
		return false;
	}
	return true;
}

/**
 * Show post author and post date in post page?
 *
 * @return bool
 */
function mynote_is_post_author_date() {
	$setting = get_theme_mod( 'post_page_show_author_date' );
	if ( ! mynote_toggle_check( $setting ) ) {
		return false;
	}
	return true;
}

/**
 * Show featured image in post page?
 *
 * @return bool
 */
function mynote_is_post_featured_image() {
	$setting = get_theme_mod( 'post_page_show_feature_image' );
	if ( ! mynote_toggle_check( $setting ) ) {
		return false;
	}
	return true;
}

/**
 * Show author card in post page?
 *
 * @return bool
 */
function mynote_is_post_author_card() {
	$setting = get_theme_mod( 'post_page_show_author_card' );
	if ( ! mynote_toggle_check( $setting ) ) {
		return false;
	}
	return true;
}

/**
 * Show comment section in post page?
 *
 * @return bool
 */
function mynote_is_post_comment_section() {
	$setting = get_theme_mod( 'post_page_show_comments' );

	if ( ! mynote_toggle_check( $setting ) ) {
		return false;
	}
	return true;
}

/**
 * Is responsive website?
 *
 * @return bool
 */
function mynote_is_responsive() {
	$setting = get_theme_mod( 'is_responsive_website' );
	if ( ! mynote_toggle_check( $setting ) ) {
		return false;
	}
	return true;
}

/**
 * Get body class
 *
 * @return string
 */
function mynote_body_class() {
	$addon_body_class = '';

	if ( '' !== mynote_site_icon() ) {
		$addon_body_class .= 'has-site-icon';
	}

	if ( '' !== mynote_site_logo() ) {
		if ( ! empty( $addon_body_class ) ) {
			$addon_body_class .= ' ';
		}
		$addon_body_class .= 'has-site-logo';
	}
	return $addon_body_class;
}
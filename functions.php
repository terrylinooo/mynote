<?php
/**
 * Githuber theme functions and definitions
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0.0.0
 */

if ( ! function_exists( 'githuber_setup_theme' ) ) {

	function githuber_setup_theme() {
		// Add Menu Support.
		add_theme_support( 'title-tag' );

		// Add Thumbnail Theme Support.
		add_theme_support( 'post-thumbnails' );

		// Enables post and comment RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Move admin bar to page bottom, because that while reading posts, there is a page reading progress bar on page top.
		add_theme_support( 'admin-bar', array( 'callback' => 'githuner_admin_bar' ) );

		// Custom Thumbnail Size call using the_post_thumbnail( '360x240' ); .
		add_image_size( '360x240', 360, 240, true );

		// Localisation Support.
		load_theme_textdomain( 'githuber', get_template_directory() . '/languages' );

		// Add excerpt to page.
		add_post_type_support( 'page', 'excerpt' );

		// Add custom background support.
		$background_args = array(
			'default-color'          => '',
			'default-image'          => '',
			'default-repeat'         => 'repeat',
			'default-position-x'     => 'left',
			'default-position-y'     => 'top',
			'default-size'           => 'auto',
			'default-attachment'     => 'scroll',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		);
		add_theme_support( 'custom-background', $background_args );

		// Add theme support for Custom Header
		$header_args = array(
			'default-image'          => '',
			'width'                  => 1920,
			'height'                 => 640,
			'flex-width'             => false,
			'flex-height'            => false,
			'uploads'                => true,
			'random-default'         => false,
			'header-text'            => true,
			'default-text-color'     => 'ffffff',
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
			'video'                  => false,
			'video-active-callback'  => '',
		);
		add_theme_support( 'custom-header', $header_args );
	}

	add_editor_style( 'editor-style.css' );
}

add_action( 'after_setup_theme', 'githuber_setup_theme' );

/**
 * Get article schemal.
 *
 * @param string $schema Article type.
 * @return void
 */
function githuber_article_schemal( $schema = 'Article' ) {
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
		default:
			$schema = 'Article';
	}
	echo 'http://schema.org/' . $schema;
}

/**
 * Githuber navigation.
 *
 * @param string $position The position on a page.
 */
function githuber_nav( $position = 'header' ) {
	if ( 'header' === $position ) {

		// This class will be loaded if an user installed Githuber MD plugin.
		// https://github.com/terrylinooo/githuber-md
		if ( class_exists('Githuber_Walker') ) {
			wp_nav_menu(
				array(
					'theme_location'  => 'header-menu',
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'githuber-nav-bar',
					'menu_class'      => 'navbar-nav mr-auto',
					'menu_id'         => false,
					'depth'           => 2,
					'fallback_cb'     => 'Githuber_Walker::fallback',
					'walker'          => new Githuber_Walker(),
				)
			);
		} else {
			wp_nav_menu(
				array(
					'theme_location'  => 'header-menu',
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'githuber-nav-bar',
					'menu_class'      => 'navbar-nav mr-auto',
					'menu_id'         => false,
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
					'container_id'    => 'githuber-footer-nav',
					'menu_class'      => 'footer-menu',
					'menu_id'         => false,
					'depth'           => 1,
				)
			);
		}
	}
}

/**
 * If header_menu not set.
 */
function githuber_default_nav() {
	?>
	<div id="githuber-nav-bar" class="collapse navbar-collapse">
		<ul id="menu-primary-menu" class="navbar-nav mr-auto">
			<li class="nav-item"><a href="<?php get_home_url(); ?>" class="nav-link"><?php esc_html_e( 'Home', 'githuber' ); ?></a></li>
		</ul>
	</div>
	<?php
}

/**
 * The githuber Post thumbnail.
 */
function githuber_post_thumbnail() {
	the_post_thumbnail( '360x240',
		array(
			'class' => 'card-img-top',
			'alt'   => get_the_title(),
		)
	);
}

/**
 * Add scripts
 */
function githuber_header_scripts() {
	if ( 'wp-login.php' !== $GLOBALS['pagenow'] && ! is_admin() ) {
		wp_register_script( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array( 'jquery' ), '4.1.0' );
		wp_enqueue_script( 'bootstrap' );
	}
}

add_action( 'init', 'githuber_header_scripts' );

/**
 * Add styles
 */
function githuber_styles() {
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), '4.1.0', 'all' );
	wp_enqueue_style( 'bootstrap' );

	wp_register_style( 'fontawesome', get_template_directory_uri() . '/assets/vendor/fontawesome/css/fontawesome-all.min.css', array(), '5.1.0', 'all' );
	wp_enqueue_style( 'fontawesome' );

	wp_register_style( 'google-font-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400', array(), '1.0', 'all' );
	wp_enqueue_style( 'google-font-roboto' );

	wp_register_style( 'githuber', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'githuber' );
}

add_action( 'wp_enqueue_scripts', 'githuber_styles' );

/**
 * Enqueue the javascript that performs in-link comment reply fanciness
 *
 * @return void
 */
function githuber_enqueue_comment_reply() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'githuber_enqueue_comment_reply' );

/**
 * Register githuber Navigation
 *
 * @return void
 */
function githuber_register_githuber_menu() {
	register_nav_menus(
		// Using array to specify more menus if needed.
		array(
			'header-menu'  => __( 'Header Menu', 'githuber' ),
			'sidebar-menu' => __( 'Sidebar Menu', 'githuber' ),
			'footer-menu' => __( 'Footer Menu', 'githuber' ),
		)
	);
}

add_action( 'init', 'githuber_register_githuber_menu' );

/**
 * Remove setsec attribute.
 *
 * @return bool
 */
function githuber_disable_srcset() {
	return false;
}

add_filter( 'wp_calculate_image_srcset', 'githuber_disable_srcset' );


/**
 * Remove surrounding <div> from WP Navigation to cleanup markup
 *
 * @param array $args - for example: $args['container'] = false .
 * @return string|array
 */
function githuber_remove_menu_args( $args = '' ) {
	return $args;
}
add_filter( 'wp_nav_menu_args', 'githuber_remove_menu_args' );

/**
 * Remove Injected classes, ID's and Page ID's from Navigation <li> items
 *
 * @param array $var - string or array.
 * @return string|array
 */
function githuber_remove_list_item_attributes( $var ) {
	return is_array( $var ) ? array() : '';
}

add_filter( 'nav_menu_item_id', 'githuber_remove_list_item_attributes', 100, 1 );
add_filter( 'page_css_class', 'githuber_remove_list_item_attributes', 100, 1 );

/**
 * Remove invalid rel attribute values in the categorylist
 * Valid attribute values:
 * http://microformats.org/wiki/existing-rel-values
 *
 * @param array $var - string or array.
 * @return string|array
 */
function githuber_remove_invalid_rel_for_category( $var ) {
	return str_replace( 'rel="category tag"', 'rel="tag"', $var );
}

add_filter( 'the_category', 'githuber_remove_invalid_rel_for_category' );

/**
 * Add page slug to body class for better customization if need.
 *
 * @param array $classes - html class name.
 * @return array
 */
function githuber_add_slug_to_body_class( $classes ) {
	global $post;

	if ( is_home() ) {
		$key = array_search( 'blog', $classes, true );
		if ( $key > -1 ) {
			unset( $classes[ $key ] );
		}
	} elseif ( is_page() ) {
		$classes[] = sanitize_html_class( $post->post_name );
	} elseif ( is_singular() ) {
		$classes[] = sanitize_html_class( $post->post_name );
	}
	return $classes;
}

add_filter( 'body_class', 'githuber_add_slug_to_body_class' );

/**
 * Register widget area.
 */
function githuber_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'githuber' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'githuber' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'githuber' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'githuber' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s col-lg col-md-4 col-sm-12">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sticky Sidebar', 'githuber' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'githuber' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Homepage Middle', 'githuber' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Add widgets here to appear in your homepage middle section.', 'githuber' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s col-lg col-md-4 col-sm-12">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Homepage Intro', 'githuber' ),
		'id'            => 'sidebar-5',
		'description'   => __( 'Add widgets here to appear in your homepage intro section.', 'githuber' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s my-2 col-lg-12">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'githuber_widgets_init' );

/**
 * Remove wp_head() injected Recent Comment styles.
 *
 * @return void
 */
function githuber_remove_recent_comments_style() {
	global $wp_widget_factory;

	remove_action( 'wp_head', array(
		$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
		'recent_comments_style',
	) );
}

add_action( 'widgets_init', 'githuber_remove_recent_comments_style' );

/**
 * Githuber - Bootstrap 4 Pagination
 *
 * @param integer $range - range of pagination to show previous and next pages.
 * @return void
 */
function githuber_pagination( $range = 1 ) {
	global $paged, $wp_query;

	$current    = $paged;
	$pages      = $wp_query->max_num_pages;
	// $pagi_items = ( $range * 2 ) + 1;
	$pagi_items = $range;

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
			<span class="sr-only"><?php esc_html_e( 'Page navigation', 'githuber' ); ?></span>
			<ul class="pagination justify-content-center ft-wpbs">

				<li class="page-item disabled hidden-md-down d-none d-lg-block">
					<span class="page-link"><?php echo esc_html( $current ); ?> / <?php echo esc_html( $pages ); ?></span>
				</li>

				<?php if ( $current > 2 && $current > $range + 1 && $pagi_items < $pages ) : ?>

				<li class="page-item">
					<a class="page-link" href="<?php echo esc_url( get_pagenum_link( 1 ) ); ?>" aria-label="<?php esc_attr_e( 'First Page', 'githuber' ); ?>">
						&laquo;<span class="hidden-sm-down d-none d-md-inline-block">&nbsp;<?php esc_html_e( 'First', 'githuber' ); ?></span>
					</a>
				</li>
				<?php endif; ?>

				<?php if ( $current > 1 && $pagi_items < $pages ) : ?>
					<li class="page-item">
						<a class="page-link" href="<?php echo esc_url( get_pagenum_link( $current - 1 ) ); ?>" aria-label="<?php esc_attr_e( 'Previous Page', 'githuber' ); ?>">
							&lsaquo;<span class="hidden-sm-down d-none d-md-inline-block">&nbsp;<?php esc_html_e( 'Previous', 'githuber' ); ?></span>
						</a>
					</li>
				<?php endif; ?>

				<?php for ( $i = 1; $i <= $pages; $i++ ) : ?>
					<?php if ( 1 !== $pages && ( ! ( $i >= $current + $range + 1 || $i <= ( $current - $range ) - 1 ) || $pages <= $pagi_items ) ) : ?>
						<?php if ( $current === $i ) : ?>
							<li class="page-item active">
								<span class="page-link">
									<span class="sr-only"><?php esc_html_e( 'Current Page', 'githuber' ); ?></span>
									<?php echo esc_html( $i ); ?>
								</span>
							</li>
						<?php else : ?>
							<li class="page-item">
								<a class="page-link" href="<?php echo esc_url( get_pagenum_link( $i ) ); ?>">
									<span class="sr-only"><?php esc_html_e( 'Page', 'githuber' ); ?></span>
									<?php echo esc_html( $i ); ?>
								</a>
							</li>
						<?php endif; ?>
					<?php endif; ?>
				<?php endfor; ?>

				<?php if ( $current < $pages && $pagi_items < $pages ) : ?>
					<li class="page-item">
						<a class="page-link" href="<?php echo esc_url( get_pagenum_link( $current + 1 ) ); ?>" aria-label="<?php esc_attr_e( 'Next Page', 'githuber' ); ?>">
							<span class="hidden-sm-down d-none d-md-inline-block"><?php esc_html_e( 'Next', 'githuber' ); ?>&nbsp;</span>&rsaquo;
						</a>
					</li>
				<?php endif; ?>

				<?php if ( $current < $pages - 1 && $current + $range - 1 < $pages && $pagi_items < $pages ) : ?>
					<li class="page-item">
						<a class="page-link" href="<?php echo esc_url( get_pagenum_link( $pages ) ); ?>" aria-label="<?php esc_attr_e( 'Last Page', 'githuber' ); ?>">
							<span class="hidden-sm-down d-none d-md-inline-block"><?php esc_html_e( 'Last', 'githuber' ); ?>&nbsp;</span>&raquo;
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
function githuber_excerpt() {
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
function githuber_is_text_fade_out() {
	return true;
}

/**
 * Show excetps ... read more
 *
 * @param string $more Pass to excerpt_more filiter.
 * @return string
 */
function githuber_read_more( $more ) {
	global $post;
	return '... &raquo; <a class="read-more-link" href="' . get_permalink( $post->ID ) . '">' . __( 'read more', 'githuber' ) . '</a>';
}

add_filter( 'excerpt_more', 'githuber_read_more' );

/**
 * Remove 'text/css' from enqueued stylesheet
 *
 * @param string $html HTML string.
 * @return string
 */
function githuber_remove_style_type( $html ) {
	return preg_replace( '~\s+type=["\'][^"\']++["\']~', '', $html );
}

add_filter( 'style_loader_tag', 'githuber_remove_style_type' );

/**
 * Remove width and height dynamic attributes to thumbnails that prevent fluid images in the_thumbnail.
 *
 * @param string $html HTML string.
 * @return string
 */
function githuber_remove_thumbnail_dimensions( $html ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );
	return $html;
}

add_filter( 'post_thumbnail_html', 'githuber_remove_thumbnail_dimensions', 10 );

/**
 * Custom avatar
 *
 * @param array $avatar_defaults Avatar.
 * @return array
 */
function githuber_custom_gravatar( $avatar_defaults ) {
	// Change filename here.
	$myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
	// Name of the gavatar image.
	$avatar_defaults[ $myavatar ] = 'Custom Gravatar';
	return $avatar_defaults;
}

add_filter( 'avatar_defaults', 'githuber_custom_gravatar' );

/**
 * Threaded Comments
 *
 * @return void
 */
function githuber_enable_threaded_comments() {
	if ( ! is_admin() ) {
		if ( is_singular() && comments_open() && ( 1 === get_option( 'thread_comments' ) ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

add_action( 'get_header', 'githuber_enable_threaded_comments' );

// GitHub style comment blocks.
if ( ! function_exists( 'githuber_comment' ) ) {
	/**
	 * Template for comments and pingbacks.
	 *
	 * @param array   $comment (optional) Array obtained by get_comments query.
	 * @param array   $args    (optional) The options for the function.
	 * @param integer $depth   (optional).
	 * @return void
	 */
	function githuber_comment( $comment, $args, $depth ) {
		global $post;

		switch ( $comment->comment_type ) {
			case 'pingback':
			case 'trackback':
				// Display trackbacks differently than normal comments.
				?>

				<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

					<article id="comment-<?php comment_ID(); ?>" class="pingback">
						<p><?php esc_html_e( 'Pingback:', 'githuber' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'githuber' ), '<span class="edit-link">', '</span>' ); ?></p>
					</article>

				</div>

				<?php
				break;
			default:
				// Proceed with normal comments.
				?>

				<div <?php comment_class( 'comment-wrapper' ); ?> id="comment-<?php comment_ID(); ?>">
					<div class="comment-avatar">
						<?php echo get_avatar( $comment, 44 ); ?>
					</div>
					<div class="comment-container"> 
						<div class="comment-header">
							<?php edit_comment_link( '<i class="fas fa-pencil-alt"></i>', '<div class="comment-header-btn edit">', '</div>' ); ?>
							<div class="comment-header-btn reply">
								<?php
									comment_reply_link(
										array_merge(
											$args,
											array(
												'reply_text' => '<i class="fas fa-reply"></i>',
												'depth' => $depth,
												'max_depth' => $args['max_depth'],
											)
										)
									);
								?>
							</div>

							<?php

							if ( $comment->user_id === $post->post_author ) {
								$commenter_type_css = 'author';

							?>

								<div class="comment-label">
									<?php esc_html_e( 'Author', 'githuber' ); ?>
								</div>

							<?php

							} else {
								$commenter_type_css = 'reader';
							}

							?>

							<div class="comment-header-text f-14">
								<?php

								printf( '<cite class="' . esc_attr( $commenter_type_css ) . '">%1$s</cite>&nbsp;',
									get_comment_author_link()
								);

								printf( '<a href="%1$s" title="commented %2$s" class="comment-link"><time itemprop="datePublished" datetime="%3$s">%4$s</time></a>',
									esc_url( get_comment_link( $comment->comment_ID ) ),
									sprintf( '%1$s @ %2$s', get_comment_date(), get_comment_time() ),
									get_comment_time( 'c' ),
									sprintf(
										/* translators: %s: days */
										esc_html__( 'commented %s ago', 'githuber' ),
										esc_html( human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) )
									)
								);

								?>
							</div>
						</div>
						<div class="comment-body">
							<?php if ( '0' === $comment->comment_approved ) { ?>
								<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'githuber' ); ?></p>
							<?php } ?>
							<div class="comment-content comment">
								<?php comment_text(); ?>	
							</div>
						</div>
					</div>
				</div>

				<?php
				break;
		}
		// end - switch.
	}
}

/**
 * Overwrite the default WordPress comment form.
 * Build a custom Githuber style form.
 *
 * @return array
 */
function githuber_comment_form() {
	$comment_field = '
		<div class="form-row">
			<div class="col-sm-12 my-1">
				<textarea id="comment" name="comment" class="form-control" aria-required="true"></textarea>
			</div>
		</div>
	';

	$comments_args = array(
		'label_submit'         => __( 'Send', 'githuber' ),
		'title_reply'          => __( 'Write a Reply or Comment', 'githuber' ),
		'comment_notes_after'  => '',
		'comment_field'        => $comment_field,
		'title_reply_before'   => '<h3 id="reply-title" class="section-title">',
		'title_reply_after'    => '</h3>',
		'class_submit'         => 'btn btn-green my-1',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.', 'githuber' ) . '</p>',
	);
	return $comments_args;
}

add_filter( 'comment_form_defaults', 'githuber_comment_form' );

/**
 * Comment fields
 */
function githuber_comment_fileds() {
	$commenter = wp_get_current_commenter();

	$author = '
		<div class="col-sm-6 my-1">
			<div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-user"></i></div>
				</div>
				<input id="author" class="form-control" placeholder="' . esc_attr( __( 'Name', 'githuber' ) ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" maxlength="245" />
			</div>
		</div>
	';

	$email = '
		<div class="col-sm-6 my-1">
			<div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-envelope"></i></div>
				</div>
				<input id="email" class="form-control" placeholder="' . esc_attr( __( 'Email', 'githuber' ) ) . '" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" maxlength="100" aria-describedby="email-notes" />
			</div>
		</div>
	';

	$url = '
		<div class="col-sm-12 my-1">
			<div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-globe"></i></div>
				</div>
				<input id="url" class="form-control" placeholder="' . esc_attr( __( 'Website', 'githuber' ) ) . '" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" maxlength="200" />
			</div>
		</div>
	';

	$fields = array(
		'before' => '<div class="form-row">',
		'author' => $author,
		'email'  => $email,
		'url'    => $url,
		'after'  => '</div>',
	);

	return $fields;
}

add_filter( 'comment_form_default_fields', 'githuber_comment_fileds' );

/**
 * Move fields from bottom to top.
 *
 * @param array $fields Comment form fields.
 * @return array
 */
function githuber_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'githuber_move_comment_field_to_bottom' );

/**
 * Replace language attrbute from en_US to en.
 *
 * @return string
 */
function replace_language_attributes() {
	return 'lang=' . substr( get_bloginfo( 'language' ), 0, 2 );
}

add_filter( 'language_attributes', 'replace_language_attributes' );

/**
 * Article reading progress bar.
 * Sidebar switcher.
 *
 * @return void
 */
function githuber_single_post_script() {
	if ( is_single() ) {
?>
	<script>

	jQuery( document ).ready(function( $ ) {
		const win = $( window );
		const doc = $( document );
		const progressBar = $( 'progress' );
		const progressLabel = $( '.progress-label' );
		const setValue = () => win.scrollTop();
		const setMax = () => doc.height() - win.height();
		const setPercent = () => Math.round( win.scrollTop() / (doc.height() - win.height()) * 100 );
		const pageTitle = $( '#post-title' );
		const pageTitleTop = pageTitle.offset().top;
		const progressBarContainer = $( '.single-post-title-bar' );
		const headerNavBrand = $( '.header .navbar-brand' );
		const progressTitle = $( '#progress-title' );
		const headerBarContainer = $( '.header .container' );

		progressLabel.text( setPercent() + '%' );
		progressBar.attr(
			{
				value: setValue(),
				max: setMax() 
			}
		);

		doc.on( 'scroll', () => {
			progressLabel.text( setPercent() + '%' );
			progressBar.attr(
				{
					value: setValue()
				} 
			);

			if ( doc.scrollTop() > headerNavBrand.height() ) {
				//headerBarContainer.fadeOut( 800 );
				progressTitle.html( pageTitle.html() );
				progressBarContainer.find( '.navbar-brand' ).html( headerNavBrand.html() );
				progressBarContainer.fadeIn( 100 );
				progressBarContainer.addClass( 'fixed-top' );
				progressBarContainer.addClass( 'slide-down' );
			} else {
				//headerBarContainer.fadeIn( 800 );
				progressBarContainer.removeClass( 'slide-down' );
				progressBarContainer.fadeOut( 100 );

				if ( progressBarContainer.hasClass( 'fixed-top' ) ) {
					setTimeout(function() {
						progressBarContainer.removeClass( 'fixed-top' );
					}, 500);
				}
			}
		});

		win.on( 'resize', () => {
			progressLabel.text( setPercent() + '%' );
			progressBar.attr(
				{
					value: setValue(), 
					max: setMax()
				} 
			);
		});

		// Sidebar switcher
		$( '#main-container' ).attr( 'data-previous-class', $( '#main-container' ).attr( 'class' ) );

		$( '.column-control .btn-counter' ).click(function() {
			var target = $( this ).attr( 'data-target' );
			if ( $( this ).hasClass( 'active' ) ) {
				$( this ).removeClass( 'active' );

				if ( target == '#aside-container' ) {
					$( '#main-container' ).attr( 'data-previous-class', $( '#main-container' ).attr( 'class' ) );
					$( '#main-container' ).attr( 'class', 'col col-sm-12' );
					$( '#aside-container' ).hide();
				}
				if ( target == '#sidebar') {
					$( target ).show();
				}
			} else {
				$( this ).addClass( 'active' );

				if ( target == '#aside-container' ) {
					$( '#main-container' ).attr( 'class', $( '#main-container' ).attr( 'data-previous-class' ) );
					$( '#aside-container' ).show();
				}
				if ( target == '#sidebar') {
					$( target ).hide();
				}
			}

		});
	});

	</script>
<?php
	}
}

add_action( 'wp_footer', 'githuber_single_post_script', 1, 1 );

/**
 * Show title progress bar.
 *
 * @return void
 */
function githuber_title_progress_bar() {
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
 * Custom edit button with GitHub style.
 *
 * @return void
 */
function githuber_edit_button() {
	global $post;

	if ( ! current_user_can( 'edit_post', $post->ID ) ) {
		return;
	}

	echo '
		<a href="' . esc_url( get_edit_post_link() ) . '" class="button-like-link">
			<div class="btn-counter text-only">		
				<div class="btn">' . esc_html__( 'Edit', 'githuber' ) . '</div>
			</div>
		</a>
	';
}

/**
 * Adjust columns.
 *
 * @return void
 */
function githuber_column_control_button() {
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
function githuber_comment_button( $show_label = false ) {
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
		return;
	}

	echo '
		<a href="' . esc_url( get_the_permalink() ) . '#comments" class="button-like-link">
			<div class="btn-counter">
				<div class="btn">
					' . ( ( $show_label ) ? '<i class="fas fa-comment-dots"></i> ' . esc_html__( 'Comment', 'githuber' ) : '<i class="fas fa-comment-dots"></i>' ) . '
				</div>
				<div class="count-box">' . esc_html( get_comments_number() ) . '</div>
			</div>
		</a>
	';
}

/**
 * The Githuber button.
 *
 * @return void
 */
function githuber_read_button() {
	echo '
		<a href="' . esc_url( get_the_permalink() ) . '" class="button-like-link">
			<div class="btn-counter text-only">		
				<div class="btn">' . esc_html__( 'Read', 'githuber' ) . '</div>
			</div>
		</a>
	';
}

/**
 * Post figure.
 *
 * @return void
 */
function githuber_post_figure() {
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
function githuber_posted_date_button( $show_label = false ) {
	echo '
		<div class="btn-counter">
			<div class="btn">
				<i class="far fa-calendar-alt"></i> ' . ( ( $show_label ) ? esc_html__( 'Date', 'githuber' ) : '' ) . '
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
function githuber_author_posted_date( $show_avatar = false, $avatar_size = 40 ) {
	echo '<div class="author-posted-date">';

	if ( $show_avatar ) {
		echo '<img src="' . esc_url( get_avatar_url( get_the_author_meta( 'ID' ), array( 'size' => $avatar_size ) ) ) . '" class="rounded-circle poster-avatar" align="middle"> ';
	}
	printf( '<a href="%1$s" title="written %2$s" class="author-link">%3$s</a> <time itemprop="datePublished" datetime="%4$s">%5$s</time>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		sprintf( esc_html__( '%1$s @ %2$s', 'githuber' ),
			esc_html( get_the_date() ), 
			esc_attr( get_the_time() )
		),
		get_the_author(),
		get_the_time( 'c' ),
		sprintf( 
			_x( 'written %s ago', '%s', 'githuber' ),
			human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) )
		)
	);

	echo '</div>';
}

/**
 * Site icon.
 *
 * @return string Icon Url
 */
function githuber_site_icon() {
	$fallback_url = '';
	return esc_url( get_site_icon_url( '32', $fallback_url ) );
}

if ( ! function_exists( 'githuber_author_card' ) ) {
	/**
	 * The author card.
	 *
	 * @param integer $avatar_size The avatar size.
	 * @param string  $icon_size   The social icon size. sm: 24px. md: 32px. lg: 48px. xl: 64px.
	 *
	 * @return void
	 */
	function githuber_author_card( $avatar_size = 96, $icon_size = 'sm' ) {
		$description = get_the_author_meta( 'description' );
		?>
			<h3 class="section-title"><?php esc_html_e( 'Author', 'githuber' ); ?></h3>
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
function githuber_category() {
	$categories = get_the_category();

	foreach ( $categories as $category ) {
		echo '<a class="btn btn-xs btn-green" href="' . esc_url( get_category_link( $category->term_id ) ) . '"><i class="fas fa-star"></i>' . esc_html( $category->cat_name ) . '</a>';
	}
}

/**
 * Replace the default admin bar callback.
 * Move it to page bottom, because I would like to stick the page title progress bar on page top.
 */
function githuner_admin_bar() {
?>
	<style type="text/css" media="screen" id="githuner-admin-bar">
		html { margin-top: 0px !important; margin-bottom: 32px !important; }
		* html body { margin-top: 0px !important; margin-bottom: 32px !important; }
		#wpadminbar { position: fixed !important; top: auto !important; bottom: 0 !important; display: block !important; }
		@media screen and ( max-width: 782px ) {
			html { margin-top: 0px !important; margin-bottom: 46px !important; }
			* html body { margin-top: 0px !important; margin-bottom: 46px !important; }
		}
	</style>
<?php
}

/**
 * Show category labels on homepage.
 * Parent only.
 *
 * @return void
 */
function githuber_category_labels() {
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
 * Remove site description from title.
 *
 * @param array $title The document title parts.
 * @return array
 */
function githuber_remove_tagline( $title ) {
	if ( isset( $title['tagline'] ) ) {
		unset( $title['tagline'] );
	}
	return $title;
}

add_filter( 'document_title_parts', 'githuber_remove_tagline' );

/**
 * Display site information on bottom of page.
 *
 * @return void
 */
function githuber_site_info() {
	echo esc_html__( 'Copyright', 'githuber' ) . ' &copy; ' . date( 'Y' ) . ' <strong><a href="' . esc_url( get_site_url() ) . '">' . get_bloginfo( 'name' ) . '</a></strong>. ' . esc_html__( 'All rights reserved.', 'githuber' ) . ' ';

	// Only homepage shows the theme credit link on the footer.
	// Keeping the theme credit link (just one link in your homepage) encourages me to improve this theme better. Thank you.
	if ( is_home() || is_front_page() ) {
		$theme_link = 'https://terryl.in/';
		echo esc_html__( 'Theme by', 'githuber' ) . ' <a href="' . esc_url( $theme_link ) . '">' . esc_html__( 'Githuber', 'githuber' ) . '</a>. ';
	}
}

/**
 * Breadcrumb for single post.
 *
 * @return void
 */
function githuber_post_breadcrumb() {
	global $post;

	if ( is_singular() ) {
		$categories   = get_the_category( $post->ID );

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
							<span itemprop="name"><i class="fas fa-globe"></i><span class="sr-only"><?php esc_html_e( 'Home', 'githuber' ); ?></span></span>
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
 * Add responsive container to embeds
 *
 * @param string $html Original embed HTML code.
 * @return string
 */
function githuber_alx_embed_html( $html ) {
    return '<div class="video-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'githuber_alx_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'githuber_alx_embed_html' );

// I still don't know why should I put this line to ignore them-check warning.
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

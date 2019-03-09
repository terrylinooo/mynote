<?php
/**
 * Functions and definitions for Mynote theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.7
 */

/**
 * Remove invalid rel attribute values in the categorylist
 * Valid attribute values:
 * http://microformats.org/wiki/existing-rel-values
 *
 * @param array $var - string or array.
 * @return string|array
 */
function mynote_remove_invalid_rel_for_category( $var ) {
	return str_replace( 'rel="category tag"', 'rel="tag"', $var );
}

add_filter( 'the_category', 'mynote_remove_invalid_rel_for_category' );

/**
 * Add page slug to body class for better customization if needed.
 *
 * @param array $classes - html class name.
 * @return array
 */
function mynote_add_slug_to_body_class( $classes ) {
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

add_filter( 'body_class', 'mynote_add_slug_to_body_class' );

/**
 * Remove wp_head() injected Recent Comment styles.
 *
 * @return void
 */
function mynote_remove_recent_comments_style() {
	global $wp_widget_factory;

	remove_action( 'wp_head', array(
		$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
		'recent_comments_style',
	) );
}

add_action( 'widgets_init', 'mynote_remove_recent_comments_style' );


/**
 * Show excetps ... read more
 *
 * @param string $more Pass to excerpt_more filiter.
 * @return string
 */
function mynote_read_more( $more ) {
	global $post;
	return '... &raquo; <a class="read-more-link" href="' . esc_url( get_permalink( $post->ID ) ) . '">' . __( 'read more', 'mynote' ) . '</a>';
}

add_filter( 'excerpt_more', 'mynote_read_more' );

/**
 * Remove width and height dynamic attributes to thumbnails that prevent fluid images in the_thumbnail.
 *
 * @param string $html HTML string.
 * @return string
 */
function mynote_remove_thumbnail_dimensions( $html ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );
	return $html;
}

add_filter( 'post_thumbnail_html', 'mynote_remove_thumbnail_dimensions', 10 );

/**
 * Custom avatar
 *
 * @param array $avatar_defaults Avatar.
 * @return array
 */
function mynote_custom_gravatar( $avatar_defaults ) {
	// Change filename here.
	$myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
	// Name of the gavatar image.
	$avatar_defaults[ $myavatar ] = 'Custom Gravatar';
	return $avatar_defaults;
}

add_filter( 'avatar_defaults', 'mynote_custom_gravatar' );

/**
 * Threaded Comments
 *
 * @return void
 */
function mynote_enable_threaded_comments() {
	if ( ! is_admin() ) {
		if ( is_singular() && comments_open() && ( 1 === get_option( 'thread_comments' ) ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

add_action( 'get_header', 'mynote_enable_threaded_comments' );


// GitHub style comment blocks.
if ( ! function_exists( 'mynote_comment' ) ) {
	/**
	 * Template for comments and pingbacks.
	 *
	 * @param array   $comment (optional) Array obtained by get_comments query.
	 * @param array   $args    (optional) The options for the function.
	 * @param integer $depth   (optional).
	 * @return void
	 */
	function mynote_comment( $comment, $args, $depth ) {
		global $post;

		switch ( $comment->comment_type ) {
			case 'pingback':
			case 'trackback':
				// Display trackbacks differently than normal comments.
				?>

				<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

					<article id="comment-<?php comment_ID(); ?>" class="pingback">
						<p><?php esc_html_e( 'Pingback:', 'mynote' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'mynote' ), '<span class="edit-link">', '</span>' ); ?></p>
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
									<?php esc_html_e( 'Author', 'mynote' ); ?>
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
										esc_html__( 'commented %s ago', 'mynote' ),
										esc_html( human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) )
									)
								);

								?>
							</div>
						</div>
						<div class="comment-body">
							<?php if ( '0' === $comment->comment_approved ) { ?>
								<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'mynote' ); ?></p>
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
 * Build a custom Mynote style form.
 *
 * @return array
 */
function mynote_comment_form() {
	$comment_field = '
		<div class="form-row">
			<div class="col-sm-12 my-1">
				<textarea id="comment" name="comment" class="form-control" aria-required="true"></textarea>
			</div>
		</div>
	';

	$comments_args = array(
		'label_submit'         => __( 'Send', 'mynote' ),
		'title_reply'          => __( 'Write a Reply or Comment', 'mynote' ),
		'comment_notes_after'  => '',
		'comment_field'        => $comment_field,
		'title_reply_before'   => '<h3 id="reply-title" class="section-title">',
		'title_reply_after'    => '</h3>',
		'class_submit'         => 'btn btn-green my-1',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.', 'mynote' ) . '</p>',
	);
	return $comments_args;
}

add_filter( 'comment_form_defaults', 'mynote_comment_form' );

/**
 * Comment fields
 */
function mynote_comment_fileds() {
	$commenter = wp_get_current_commenter();

	$author = '
		<div class="col-sm-6 my-1">
			<div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-user"></i></div>
				</div>
				<input id="author" class="form-control" placeholder="' . esc_attr( __( 'Name', 'mynote' ) ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" maxlength="245" />
			</div>
		</div>
	';

	$email = '
		<div class="col-sm-6 my-1">
			<div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-envelope"></i></div>
				</div>
				<input id="email" class="form-control" placeholder="' . esc_attr( __( 'Email', 'mynote' ) ) . '" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" maxlength="100" aria-describedby="email-notes" />
			</div>
		</div>
	';

	$url = '
		<div class="col-sm-12 my-1">
			<div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-globe"></i></div>
				</div>
				<input id="url" class="form-control" placeholder="' . esc_attr( __( 'Website', 'mynote' ) ) . '" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" maxlength="200" />
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

add_filter( 'comment_form_default_fields', 'mynote_comment_fileds' );

/**
 * Move fields from bottom to top.
 *
 * @param array $fields Comment form fields.
 * @return array
 */
function mynote_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'mynote_move_comment_field_to_bottom' );

/**
 * Replace language attrbute from en_US to en.
 *
 * @return string
 */
function mynote_replace_language_attributes() {
	return 'lang=' . substr( get_bloginfo( 'language' ), 0, 2 );
}

add_filter( 'language_attributes', 'mynote_replace_language_attributes' );

/**
 * Article reading progress bar.
 * Sidebar switcher.
 *
 * @return void
 */
function mynote_single_post_script() {
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

		// For responsive.
		$( '.markdown-body img' ).attr('height', '');
	});

	</script>
<?php
	}
}

add_action( 'wp_footer', 'mynote_single_post_script', 1, 1 );

/**
 * 1. An "Auto scroll down" floated button.
 * 2. An "Go to Top" floated button will be showed on the footer when user scrolling down.
 * 3. Bootstrap 4 collapse event.
 *
 * @return void
 */
function mynote_scrolling_script() {
	?>
	<script>

	jQuery( document ).ready(function( $ ) {

		$( '.scroll-area a' ).on( 'click', function(e) {
			e.preventDefault();
			var movingPosition = 0;

			if ( $( this.hash ).offset().top > $( document ).height() - $( window ).height() ) {
				movingPosition = $( document ).height() - $( window ).height();
			} else {
				movingPosition = $( this.hash ).offset().top;
			}

			$( 'html, body' ).animate({
				scrollTop: movingPosition
			}, 500, 'swing' );
		});

		$( 'a.go-top' ).on( 'click' ,function(e) {
			e.preventDefault();
			$( 'html, body' ).animate( { scrollTop: 0 }, 1000 );
		});

		$( window ).scroll( function() {      
			var windowTop =  $( window ).scrollTop();
			if ( windowTop > 100 ) {
				$( 'a.go-top' ).fadeIn( 300 );
			} else {
				$( 'a.go-top' ).fadeOut( 300 );
			}
		});

		$( '#mynote-nav-bar' ).on( 'show.bs.collapse' , function () {
			$( 'body' ).addClass( 'menu-is-collapsed' );
			$( '.main-header' ).css( { 'top': '-60px' } ).animate( { 'top': '0px' }, 500 );
			$( '.has-site-logo .search-bar' ).fadeOut( 500 );
		});

		$( '#mynote-nav-bar' ).on( 'hidden.bs.collapse' , function () {
			$( '.main-header' ).css( { 'top': '0px' } ).animate( { 'top': '-60px' }, 500 );
			$( '.has-site-logo .search-bar' ).fadeIn( 500 );
			setTimeout(function() {
				$( 'body' ).removeClass( 'menu-is-collapsed' );
			}, 500);
			
		});
	});

	</script>
	<?php
}

add_action( 'wp_footer', 'mynote_scrolling_script', 1, 1 );

/**
 * Add responsive container to embeds
 *
 * @param string $html Original embed HTML code.
 * @return string
 */
function mynote_alx_embed_html( $html ) {
    return '<div class="video-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'mynote_alx_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'mynote_alx_embed_html' );


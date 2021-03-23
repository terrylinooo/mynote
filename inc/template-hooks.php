<?php
/**
 * Hooks for Mynote theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 2.0.0
 */

/*
|--------------------------------------------------------------------------
| Mynote custom hooks.
|--------------------------------------------------------------------------
| Hooked functions defined in inc/template-hook-functions.php
*/

/**
 * Head
 *
 * - mynote_head
 * 
 * @see mynote_check_responsive();
 */
add_action( 'mynote_head', 'mynote_check_responsive', 10 );

/**
 * Header
 *
 * - mynote_header_before
 * - mynote_header
 * - mynote_header_after
 *
 * @see  mynote_header_navigation()
 */
add_action( 'mynote_header', 'mynote_header_navigation', 10 );

/**
 * Webiste's wrapper
 *
 * - mynote_site_wrapper_before
 * - mynote_site_wrapper_after
 */

/**
 * Footer
 *
 * - mynote_footer_before
 * - mynote_footer
 * - mynote_footer_after
 *
 * @see  mynote_footer_widgets()
 * @see  mynote_footer_columns()
 */
add_action( 'mynote_footer', 'mynote_footer_widgets', 10 );
add_action( 'mynote_footer', 'mynote_footer_columns', 20 );

/**
 * Homepage
 *
 * - mynote_homepage_promotion
 * - mynote_homepage_sidebar
 * - mynote_homepage_middle_sidebar
 *
 * @see  mynote_homepage_promotion()
 * @see  mynote_homepage_sidebar()
 * @see  mynote_homepage_middle_sidebar()
 */
add_action( 'mynote_homepage_promotion', 'mynote_homepage_promotion', 10 );
add_action( 'mynote_homepage_sidebar', 'mynote_homepage_sidebar', 10 );
add_action( 'mynote_homepage_middle_sidebar', 'mynote_homepage_middle_sidebar', 10 );

/**
 * Loop
 *
 * - mynote_loop_before
 * - mynote_loop_after
 */

/**
 * Pagination
 *
 * - mynote_pagination_before
 * - mynote_pagination
 * - mynote_pagination_after
 * 
 * @see  mynote_pagination_section()
 */
 add_action( 'mynote_pagination', 'mynote_pagination_section', 10 );

/**
 * Post
 *
 * - mynote_post_before
 * - mynote_post_content_before
 * - mynote_post_content_after
 * - mynote_post_after
 * - mynote_post_sidebar
 * - mynote_post_comment_before
 * - mynote_post_comment_after
 * 
 * @see  mynote_post_metadata()
 * @see  mynote_single_post_sidebar()
 */
add_action( 'mynote_post_before', 'mynote_post_metadata', 10 );
add_action( 'mynote_post_sidebar', 'mynote_single_post_sidebar', 10 );

/**
 * Page
 *
 * - mynote_page_before
 * - mynote_page_content_before
 * - mynote_page_content_after
 * - mynote_page_after
 * 
 * @see  mynote_post_metadata()
 */
add_action( 'mynote_page_before', 'mynote_post_metadata', 10 );

/**
 * Archive
 *
 * - mynote_archive_sidebar
 * - mynote_archive_headline_after
 * - mynote_archive_loop_before
 * - mynote_archive_loop_after
 * - mynote_category_headline_after
 * - mynote_tag_headline_after
 * - mynote_search_headline_after
 * 
 * @see  mynote_archive_sidebar()
 */
add_action( 'mynote_archive_sidebar', 'mynote_archive_sidebar', 10 );

/*
|--------------------------------------------------------------------------
| WordPress hooks used in Mynote.
|--------------------------------------------------------------------------
| Hooked functions defined in inc/template-functions.php
*/

add_action( 'widgets_init', 'mynote_remove_recent_comments_style' );
add_action( 'wp_footer', 'mynote_single_post_script', 1, 1 );
add_action( 'wp_footer', 'mynote_scrolling_script', 1, 1 );
add_action( 'get_header', 'mynote_enable_threaded_comments' );
add_filter( 'the_category', 'mynote_remove_invalid_rel_for_category' );
add_filter( 'body_class', 'mynote_add_slug_to_body_class' );
add_filter( 'excerpt_more', 'mynote_read_more' );
add_filter( 'post_thumbnail_html', 'mynote_remove_thumbnail_dimensions', 10 );
add_filter( 'avatar_defaults', 'mynote_custom_gravatar' );
add_filter( 'comment_form_defaults', 'mynote_comment_form' );
add_filter( 'comment_form_default_fields', 'mynote_comment_fileds' );
add_filter( 'comment_form_fields', 'mynote_move_comment_field_to_bottom' );
add_filter( 'language_attributes', 'mynote_replace_language_attributes' );
add_filter( 'embed_oembed_html', 'mynote_alx_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'mynote_alx_embed_html' );
add_filter( 'walker_nav_menu_start_el', 'mynote_nav_menu_social_icons', 10, 4 );

/*
|--------------------------------------------------------------------------
| WordPress hooks used in Mynote.
|--------------------------------------------------------------------------
| Hooked functions defined in functions.php
*/

add_action( 'after_setup_theme', 'mynote_setup_theme' );
add_action( 'init', 'mynote_register_mynote_menu' );
add_action( 'init', 'mynote_header_scripts' );
add_action( 'widgets_init', 'mynote_widgets_init' );
add_action( 'wp_enqueue_scripts', 'mynote_styles' );
add_action( 'wp_enqueue_scripts', 'mynote_enqueue_comment_reply' );
add_filter( 'comment_text', 'mynote_sanitize_comment' );

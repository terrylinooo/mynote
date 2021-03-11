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
 * - mynote_homepage_middle_sidebar
 *
 * @see  mynote_homepage_promotion()
 * @see  mynote_homepage_middle_sidebar()
 */
add_action( 'mynote_homepage_promotion', 'mynote_homepage_promotion', 10 );
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
 * 
 * @see  mynote_post_metadata()
 */
add_action( 'mynote_post_before', 'mynote_post_metadata', 10 );

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

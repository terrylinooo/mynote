<?php
/**
 * Template Name: Landing Page (full)
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.0
 * @version 1.0.7
 */

get_header();

get_template_part( 'template-parts/page', 'landing' );

/**
 * Functions hooked in to mynote_homepage_middle_sidebar action
 *
 * @hooked mynote_homepage_middle_sidebar - 10
 */
do_action( 'mynote_homepage_middle_sidebar' );

get_footer();

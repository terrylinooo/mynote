<?php
/**
 * Main Customizer in Mynote theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.7
 * @version 1.3.0
 */
require get_parent_theme_file_path( '/inc/classes/customizer/class-customize-alpha-color.php' );
require get_parent_theme_file_path( '/inc/classes/customizer/class-customize-image-radio.php' );
require get_parent_theme_file_path( '/inc/classes/customizer/class-customize-toggle.php' );
require get_parent_theme_file_path( '/inc/classes/customizer/class-customize-content.php' );
require get_parent_theme_file_path( '/inc/customer/about.php' );
require get_parent_theme_file_path( '/inc/customer/homepage.php' );
require get_parent_theme_file_path( '/inc/customer/navbar.php' );
require get_parent_theme_file_path( '/inc/customer/progress-bar.php' );
require get_parent_theme_file_path( '/inc/customer/layout.php' );
require get_parent_theme_file_path( '/inc/customer/post-card.php' );
require get_parent_theme_file_path( '/inc/customer/post-page.php' );

add_action( 'customize_register', 'mynote_customize_about' );
add_action( 'customize_register', 'mynote_customize_homepage' );
add_action( 'customize_register', 'mynote_customize_layout' );
add_action( 'customize_register', 'mynote_customize_navbar' );
add_action( 'customize_register', 'mynote_customize_post_card' );
add_action( 'customize_register', 'mynote_customize_post_page' );
add_action( 'customize_register', 'mynote_customize_progress_bar' );
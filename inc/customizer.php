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

$includes = array(
	'/classes/customizer/class-customize-alpha-color-control.php',
	'/classes/customizer/class-customize-image-radio-control.php',
	'/classes/customizer/class-customize-toggle-control.php',
	'/classes/customizer/class-customize-content-control.php',
	'/customer/about.php',
	'/customer/homepage.php',
	'/customer/navbar.php',
	'/customer/progress-bar.php',
	'/customer/layout.php',
	'/customer/post-card.php',
	'/customer/post-page.php',
);

foreach ( $includes as $file ) {
	require get_parent_theme_file_path( '/inc' . $file );
}


/**
 * Customizer
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */

$customizer_options = array(
	'about',
	'homepage',
	'layout',
	'navbar',
	'post_card',
	'post_page',
	'progress_bar',
);

foreach ( $customizer_options as $customizer_option ) {
	add_action( 'customize_register', 'mynote_customize_' . $customizer_option );
}

<?php
/**
 * Mynote theme customizer: About
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @version 1.3.0
 * @version 1.3.0
 */

function mynote_customize_about( $wp_customize ) {

	$wp_customize->add_section( 'section_about_mynote_theme', 
		array(
			'title'      => __( 'About Mynote Theme', 'mynote' ),
			'priority'   => 1,
			'capability' => 'edit_theme_options',
		)
	);

	$about  =  __( 'Mynote is an open source project on GitHub, any suggestions to improve this theme are welcome. Please visit:', 'mynote' );
	$about .= '<br /><br /><a href="' . esc_url( 'https://github.com/terrylinooo/mynote">https://github.com/terrylinooo/mynote' ) . '</a>';

	$wp_customize->add_setting( 'setting_about_mynote_theme',
		array( 
			'default'           => 'no',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Customize_Content_Control( $wp_customize, 'control_about_mynote_theme',
			array(
				'label'       => __( 'About', 'mynote' ),
				'section'     => 'section_about_mynote_theme',
				'settings'    => 'setting_about_mynote_theme',
				'description' => $about,
			)
		)
	);

	$wp_customize->add_setting( 'setting_test',
		array( 
			'default'           => 'no',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(
		new Customize_Toggle_Control( $wp_customize, 'my_control',
			array(
				'label'	      => __( 'Toggle me on or off', 'my-lang' ),
				'section'     => 'section_about_mynote_theme',
				'settings'    => 'setting_test',
				'type'        => 'light',
			) 
		) 
	);
}

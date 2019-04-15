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
	$about .= '<br /><br /><a href="' . esc_url( 'https://github.com/terrylinooo/mynote' ) . '">https://github.com/terrylinooo/mynote</a>';

	/**
     * Setting
     */
	$wp_customize->add_setting( 'setting_about_mynote_theme',
		array( 
			'default'           => 'no',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

    $wp_customize->add_setting( 'is_responsive_website',
        array( 
            'default'           => true,
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    /**
     * Control
     */
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

    $wp_customize->add_control(
		new Customize_Toggle_Control( $wp_customize, 'is_responsive_control',
			array(
				'label'       => __( 'RWD', 'mynote' ),
				'section'     => 'section_about_mynote_theme',
				'settings'    => 'is_responsive_website',
				'description' => __( 'Mynote is a responsive theme (RWD, responsive web design). However, if you would like to disable RWD, here it is.', 'mynote' ),
			)
		)
	);
}

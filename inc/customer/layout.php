<?php
/**
 * Mynote theme customizer: Layout
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.3.0
 * @version 1.3.0
 */


function mynote_customize_layout( $wp_customize ) {

    /**
     * Panel
     */
    $wp_customize->add_panel( 'panel_mynote_layout',
        array(
            'title'    => __( 'Layout', 'mynote' ),
            'priority' => 10,
        )
    );

    /**
     * Section
     */
	$wp_customize->add_section( 'section_mynote_layout_home',
		array(
			'title'      => __( 'Homepage', 'mynote' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
			'panel'      => 'panel_mynote_layout',
		)
	);

	$wp_customize->add_section( 'section_mynote_layout_archive',
		array(
			'title'      => __( 'Archive', 'mynote' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
			'panel'      => 'panel_mynote_layout',
		)
	);

	$wp_customize->add_section( 'section_mynote_layout_post',
		array(
			'title'      => __( 'Post', 'mynote' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
			'panel'      => 'panel_mynote_layout',
		)
	);
    
    /**
     * Setting
     */
    $wp_customize->add_setting( 'layout_post_sidebar_location_home',
        array( 
            'default'           => 'right', 
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'layout_post_sidebar_location_archive',
        array( 
            'default'           => 'right', 
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'layout_post_sidebar_location_post',
        array( 
            'default'           => 'right', 
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'layout_cols_per_row_home',
        array( 
            'default'           => '3', 
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'layout_cols_per_row_archive',
        array( 
            'default'           => '3', 
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    /**
     * Control
     */
    $wp_customize->add_control(
		new Customize_Image_Radio_Control( $wp_customize, 'layout_sidebar_location_home_control',
			array(
				'label'       => __( 'Sidebar Location', 'mynote' ),
				'section'     => 'section_mynote_layout_home',
				'settings'    => 'layout_post_sidebar_location_home',
				'type'        => 'radio',
				'description' => __( 'Choose a preferred layout for desktop version.', 'mynote' ),
				'choices'     => array(
					'right' => get_template_directory_uri() . '/assets/images/layout_sidebar_right.png',
					'left'  => get_template_directory_uri() . '/assets/images/layout_sidebar_left.png',
				),
			)
		)
	);

	$wp_customize->add_control(
		new Customize_Image_Radio_Control( $wp_customize, 'layout_sidebar_location_archive_control',
			array(
				'label'       => __( 'Sidebar Location', 'mynote' ),
				'section'     => 'section_mynote_layout_archive',
				'settings'    => 'layout_post_sidebar_location_archive',
				'type'        => 'radio',
				'description' => __( 'Choose a preferred layout for desktop version.', 'mynote' ),
				'choices'     => array(
					'right' => get_template_directory_uri() . '/assets/images/layout_sidebar_right.png',
					'left'  => get_template_directory_uri() . '/assets/images/layout_sidebar_left.png',
				),
			)
		)
	);

	$wp_customize->add_control(
		new Customize_Image_Radio_Control( $wp_customize, 'layout_cols_per_row_home_control',
			array(
				'label'       => __( 'Columns', 'mynote' ),
				'section'     => 'section_mynote_layout_home',
				'settings'    => 'layout_cols_per_row_home',
				'type'        => 'radio',
				'description' => __( 'Adjust the number of columns per row.', 'mynote' ),
				'choices'     => array(
					'3'  => get_template_directory_uri() . '/assets/images/layout_3cols.png',
					'2'  => get_template_directory_uri() . '/assets/images/layout_2cols.png',
					'1'  => get_template_directory_uri() . '/assets/images/layout_1cols.png',
				),
			)
		)
	);

	$wp_customize->add_control(
		new Customize_Image_Radio_Control( $wp_customize, 'layout_cols_per_row_archive_control',
			array(
				'label'       => __( 'Columns', 'mynote' ),
				'section'     => 'section_mynote_layout_archive',
				'settings'    => 'layout_cols_per_row_archive',
				'type'        => 'radio',
				'description' => __( 'Adjust the number of columns per row.', 'mynote' ),
				'choices'     => array(
					'3'  => get_template_directory_uri() . '/assets/images/layout_3cols.png',
					'2'  => get_template_directory_uri() . '/assets/images/layout_2cols.png',
					'1'  => get_template_directory_uri() . '/assets/images/layout_1cols.png',
				),
			)
		)
	);

	$wp_customize->add_control(
		new Customize_Image_Radio_Control( $wp_customize, 'layout_sidebar_location_post_control',
			array(
				'label'       => __( 'Sidebar Location', 'mynote' ),
				'section'     => 'section_mynote_layout_post',
				'settings'    => 'layout_post_sidebar_location_post',
				'type'        => 'radio',
				'description' => __( 'Choose a preferred layout for desktop version.', 'mynote' ),
				'choices'     => array(
					'right' => get_template_directory_uri() . '/assets/images/layout_sidebar_right.png',
					'left'  => get_template_directory_uri() . '/assets/images/layout_sidebar_left.png',
				),
			)
		)
	);
}

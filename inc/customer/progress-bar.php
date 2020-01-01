<?php
/**
 *  Mynote theme customizer: Progress Bar
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.3.0
 * @version 1.3.0
 */


function mynote_customize_progress_bar( $wp_customize ) {

	/**
     * Default setting variables.
     */
    $default_navbar_color                = 'rgba(36, 41, 46, 1)';
	$default_navbar_link_color           = '#c8c9ca';
	$default_navbar_link_hover_color     = '#ffffff';
	$default_progress_bar_border_color   = '#1e90ff';
    $default_searchbar_placeholder_color = '#cccccc';
    
	$default_color_palette = array( 'rgb(36, 41, 46)', 'rgba(0, 107, 91)', 'rgba(0, 75, 152)', 'rgba(168, 19, 62)' );

    /**
     * Panel
     */
	$wp_customize->add_panel( 'panel_mynote_progress_bar', array(
		'title'       => __( 'Progress Bar', 'mynote' ),
		'priority'    => 10,
	));

    /**
     * Section
     */
	$wp_customize->add_section( 'section_progress_bar_basic', 
		array(
			'title'       => __( 'Basic Settings', 'mynote' ),
			'description' => __( 'The basic settings of the page progress bar.', 'mynote' ),
			'priority'    => 10,
			'panel'       => 'panel_mynote_progress_bar',
		)
	);

	$wp_customize->add_section( 'section_progress_bar_color', 
		array(
			'title'       => __( 'Color', 'mynote' ),
			'description' => __( 'Customize the color pattern of the page progress bar.', 'mynote' ),
			'priority'    => 10,
			'panel'       => 'panel_mynote_progress_bar',
		)
	);
    
    /**
     * Setting
     */
    $wp_customize->add_setting( 'progressbar_is_display_bar',
        array( 
            'default'           => true, 
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'progressbar_bg_color',
        array(
            'default'           => $default_navbar_color,
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'progressbar_text_color',
        array(
            'default'           => $default_navbar_link_color,
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_setting( 'progressbar_percentage_bg_color',
        array(
            'default'           => $default_navbar_link_color,
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'progressbar_is_display_percentage',
        array( 
            'default'           => true,
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'progressbar_preferred_color',
        array( 
            'default'           => 'default', 
            'sanitize_callback' => 'esc_attr'
        )
    );

    $wp_customize->add_setting( 'progressbar_custom_bg_color',
        array(
            'default'           => $default_navbar_color,
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'progressbar_custom_text_color',
        array(
            'default'           => $default_navbar_link_color,
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'progressbar_custom_border_color',
        array(
            'default'           => $default_progress_bar_border_color,
            'sanitize_callback' => 'esc_attr',
        )
	);
    
    /**
     * Control
     */
	$wp_customize->add_control(
		new Customize_Toggle_Control( $wp_customize, 'progressbar_is_display_bar_control',
			array(
				'label'       => __( 'Display Progress Bar', 'mynote' ),
				'section'     => 'section_progress_bar_basic',
				'settings'    => 'progressbar_is_display_bar',
				'description' => __( 'Would you like to display a progress bar while reading?', 'mynote' ),
			)
		)
	);

	$wp_customize->add_control(
		new Customize_Toggle_Control( $wp_customize, 'progressbar_is_display_percentage_control',
			array(
				'label'       => __( 'Display Percentage Number', 'mynote' ),
				'section'     => 'section_progress_bar_basic',
				'settings'    => 'progressbar_is_display_percentage',
				'description' => __( 'Would you like to display a percentage number on the progress bar?', 'mynote' ),
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'progressbar_preferred_color_control',
			array(
				'label'       => __( 'Color Pattern', 'mynote' ),
				'section'     => 'section_progress_bar_basic',
				'settings'    => 'progressbar_preferred_color',
				'type'        => 'radio',
				'description' => __( 'Choose a preferred color pattern and apply it to the progress bar.', 'mynote' ),
				'choices'     => array(
					'default' => __( 'Default', 'mynote' ),
					'menu'    => __( 'As same as website menu', 'mynote' ),
					'custom'  => __( 'Custom', 'mynote' ),
				),
			)
		)
	);

	$wp_customize->add_control(
		new Customize_Alpha_Color_Control( $wp_customize, 'progressbar_custom_bg_color_control', 
			array(
				'label'        => __( 'Background Color', 'mynote' ),
				'section'      => 'section_progress_bar_color',
				'settings'     => 'progressbar_custom_bg_color',
				'show_opacity' => true,
				'palette'	   => $default_color_palette,
			) 
		) 
	);

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( $wp_customize, 'progressbar_custom_text_color_control', 
			array(
				'label'    => __( 'Text Color', 'mynote' ),
				'section'  => 'section_progress_bar_color',
				'settings' => 'progressbar_custom_text_color',
			)
		) 
	);

	$wp_customize->add_control(
		new Customize_Alpha_Color_Control( $wp_customize, 'progressbar_custom_border_color_control', 
			array(
				'label'        => __( 'Border Color', 'mynote' ),
				'section'      => 'section_progress_bar_color',
				'settings'     => 'progressbar_custom_border_color',
				'show_opacity' => true,
				'palette'	   => $default_color_palette,
			) 
		) 
	);
}

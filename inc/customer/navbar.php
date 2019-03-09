<?php
/**
 * Mynote theme customizer: Navbar
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.3.0
 * @version 1.3.0
 */

function mynote_customize_navbar( $wp_customize ) {

	/**
     * Default setting variables.
     */
    $default_navbar_color                = 'rgba(36, 41, 46, 1)';
	$default_navbar_link_color           = '#c8c9ca';
	$default_navbar_link_hover_color     = '#ffffff';
	$default_searchbar_placeholder_color = '#cccccc';

	$default_color_palette = array( 'rgb(36, 41, 46)', 'rgba(0, 107, 91)', 'rgba(0, 75, 152)', 'rgba(168, 19, 62)' );

    /**
     * Panel
     */
    $wp_customize->add_panel( 'panel_mynote_navbar',
        array(
            'title'    => __( 'Navbar', 'mynote' ),
            'priority' => 10,
        )
    );

    /**
     * Section
     */
    $wp_customize->add_section( 'section_homepahe_header_navbar',
		array(
			'title'      => __( 'Homepage', 'mynote' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
			'panel'      => 'panel_mynote_navbar',
		)
	);

	$wp_customize->add_section( 'section_header_navbar',
		array(
			'title'      => __( 'Website', 'mynote' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
			'panel'      => 'panel_mynote_navbar',
		)
	);

	$wp_customize->add_section( 'section_header_searchbar',
		array(
			'title'      => __( 'Search Bar', 'mynote' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
			'panel'      => 'panel_mynote_navbar',
		)
    );
    
    /**
     * Setting
     */
    $wp_customize->add_setting( 'navbar_homepage_bg_color',
        array(
            'default'           => $default_navbar_color,
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ) 
    );

    $wp_customize->add_setting( 'navbar_homepage_link_color',
        array(
            'default'           => $default_navbar_link_color,
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting( 'navbar_homepage_link_hover_color',
        array(
            'default'           => $default_navbar_link_hover_color,
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting( 'navbar_website_bg_color',
        array(
            'default'           => $default_navbar_color,
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ) 
    );

    $wp_customize->add_setting( 'navbar_website_link_color',
        array(
            'default'           => $default_navbar_link_color,
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_setting( 'navbar_website_link_hover_color',
        array(
            'default'           => $default_navbar_link_hover_color,
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_setting( 'navbar_is_display_search_bar',
        array( 
            'default'           => 'yes', 
            'sanitize_callback' => 'sanitize_text_field',
        ) 
    );

    $wp_customize->add_setting( 'navbar_searchbar_placeholder_color',
        array(
            'default'           => $default_searchbar_placeholder_color,
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );
    
    /**
     * Control
     */
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control( $wp_customize, 'home_menu_bg_color_control',
			array(
				'label'        => __( 'Background Color', 'mynote' ),
				'description'  => __( 'This option is for homepage only.', 'mynote' ),
				'section'      => 'section_homepahe_header_navbar',
				'settings'     => 'navbar_homepage_bg_color',
				'show_opacity' => true,
				'palette'	   => $default_color_palette,
			) 
		) 
	);

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( $wp_customize, 'home_menu_link_color_control',
			array(
				'label'       => __( 'Link Color', 'mynote' ),
				'description' => __( 'This option is for homepage only.', 'mynote' ),
				'section'     => 'section_homepahe_header_navbar',
				'settings'    => 'navbar_homepage_link_color',
			)
		) 
	);

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( $wp_customize, 'home_menu_link_hover_color_control', 
			array(
				'label'       => __( 'Link Hover Color', 'mynote' ),
				'description' => __( 'This option is for homepage only.', 'mynote' ),
				'section'     => 'section_homepahe_header_navbar',
				'settings'    => 'navbar_homepage_link_hover_color',
			)
		) 
	);

	$wp_customize->add_control(
		new Customize_Alpha_Color_Control( $wp_customize, 'menu_bg_color_control',
			array(
				'label'        => __( 'Background Color', 'mynote' ),
				'section'      => 'section_header_navbar',
				'settings'     => 'navbar_website_bg_color',
				'show_opacity' => true,
				'palette'	   => $default_color_palette,
			) 
		) 
	);

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( $wp_customize, 'menu_link_color_control',
			array(
				'label'    => __( 'Link Color', 'mynote' ),
				'section'  => 'section_header_navbar',
				'settings' => 'navbar_website_link_color',
			)
		) 
	);

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( $wp_customize, 'menu_link_hover_color_control',
			array(
				'label'    => __( 'Link Hover Color', 'mynote' ),
				'section'  => 'section_header_navbar',
				'settings' => 'navbar_website_link_hover_color',
			)
		) 
	);

	$wp_customize->add_control(
		new Customize_Toggle_Control( $wp_customize, 'navbar_is_display_search_bar_control',
			array(
				'label'       => __( 'Display a Search Bar', 'mynote' ),
				'section'     => 'section_header_searchbar',
				'settings'    => 'navbar_is_display_search_bar',
				'description' => __( 'Would you like to display a search bar in header navbar area?', 'mynote' ),
			)
		)
	);

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( $wp_customize, 'searchbar_placeholder_color_control',
			array(
				'label'    => __( 'Placeholder Color', 'mynote' ),
				'section'  => 'section_header_searchbar',
				'settings' => 'navbar_searchbar_placeholder_color',
			)
		) 
	);
}

<?php
/**
 * Main Customizer File
 */

add_action( 'customize_register', 'mynote_customize_register' );

function mynote_customize_register( $wp_customize ) {

	// Inlcude the Alpha Color Picker control file.
	require_once( dirname( __FILE__ ) . '/classes/class-customize-alpha-color.php' );

	$default_navbar = array(
		'default'    => 'rgba(36, 41, 46, 1)',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
	);

	$default_color_palette = array(
		'rgb(36, 41, 46)',
		'rgba(0, 107, 91)',
		'rgba(0, 75, 152)',
		'rgba(168, 19, 62)',
	);

	$default_link_color = array(
		'default'           => '#c8c9ca',
		'sanitize_callback' => 'sanitize_text_field',
	);

	$default_link_hover_color = array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_text_field',
	);

	$default_progress_bar_border_color = array(
		'default'           => '#1e90ff',
		'sanitize_callback' => 'sanitize_text_field',
	);

	$default_searchbar_placeholder_color = array(
		'default'           => '#cccccc',
		'sanitize_callback' => 'sanitize_text_field',
	);

	$wp_customize->add_panel( 'panel_mynote_navbar', array(
		'title'       => __( 'Mynote: Navbar', 'mynote' ),
		'priority'    => 10,
	));

	$wp_customize->add_panel( 'panel_mynote_social_icon_links', array(
		'title'       => __( 'Mynote: Social Icon Links', 'mynote' ),
		'priority'    => 10,
	));

	$wp_customize->add_panel( 'panel_mynote_progress_bar', array(
		'title'       => __( 'Mynote: Progress Bar', 'mynote' ),
		'priority'    => 10,
	));

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
			'priority'   => 20,
			'capability' => 'edit_theme_options',
			'panel'      => 'panel_mynote_navbar',
		)
	);

	$wp_customize->add_section( 'section_header_searchbar', 
		array(
			'title'      => __( 'Search Bar', 'mynote' ),
			'priority'   => 20,
			'capability' => 'edit_theme_options',
			'panel'      => 'panel_mynote_navbar',
		)
	);

	$wp_customize->add_section( 'section_social_links_links', 
		array(
			'title'      => __( 'Links', 'mynote' ),
			'description' => __( 'Display small graphics linked to your social media accounts. This feature supports over 40 social networks.', 'mynote' ),
			'priority'   => 20,
			'capability' => 'edit_theme_options',
			'panel'      => 'panel_mynote_social_icon_links',
		)
	);

	$wp_customize->add_section( 'section_social_links_locations', 
		array(
			'title'      => __( 'locations', 'mynote' ),
			'description' => __( 'Display social icon links on multiple locations if you what.', 'mynote' ),
			'priority'   => 20,
			'capability' => 'edit_theme_options',
			'panel'      => 'panel_mynote_social_icon_links',
		)
	);

	$wp_customize->add_section( 'section_progress_bar_basic', 
		array(
			'title'      => __( 'Basic Settings', 'mynote' ),
			'description' => __( 'The basic settings of the page progress bar.', 'mynote' ),
			'priority'   => 20,
			'capability' => 'edit_theme_options',
			'panel'      => 'panel_mynote_progress_bar',
		)
	);

	$wp_customize->add_section( 'section_progress_bar_color', 
		array(
			'title'      => __( 'Color', 'mynote' ),
			'description' => __( 'Customize the color pattern of the page progress bar.', 'mynote' ),
			'priority'   => 20,
			'capability' => 'edit_theme_options',
			'panel'      => 'panel_mynote_progress_bar',
		)
	);

	$wp_customize->add_setting( 'navbar_homepage_bg_color', $default_navbar );
	$wp_customize->add_setting( 'navbar_homepage_link_color', $default_link_color );
	$wp_customize->add_setting( 'navbar_homepage_link_hover_color', $default_link_hover_color );

	$wp_customize->add_setting( 'navbar_website_bg_color', $default_navbar );
	$wp_customize->add_setting( 'navbar_website_link_color', $default_link_color );
	$wp_customize->add_setting( 'navbar_website_link_hover_color', $default_link_hover_color );

	$wp_customize->add_setting( 'navbar_is_display_search_bar', array( 'default' => 'yes' ) );
	$wp_customize->add_setting( 'navbar_searchbar_placeholder_color', $default_searchbar_placeholder_color );

	for ( $i = 1; $i <= 5; $i++ ) {
		$wp_customize->add_setting( 'social_link_url_' . $i, 
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);
	}

	$wp_customize->add_control(
		new Customize_Alpha_Color_Control( $wp_customize, 'home_menu_bg_color_control', 
			array(
				'label'        => __( 'Background Color', 'mynote' ),
				'description'     => __( 'This option is for homepage only.', 'mynote' ),
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
				'label'    => __( 'Link Color', 'mynote' ),
				'description'     => __( 'This option is for homepage only.', 'mynote' ),
				'section'  => 'section_homepahe_header_navbar',
				'settings' => 'navbar_homepage_link_color',
			)
		) 
	);

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( $wp_customize, 'home_menu_link_hover_color_control', 
			array(
				'label'    => __( 'Link Hover Color', 'mynote' ),
				'description'     => __( 'This option is for homepage only.', 'mynote' ),
				'section'  => 'section_homepahe_header_navbar',
				'settings' => 'navbar_homepage_link_hover_color',
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
		new WP_Customize_Control( $wp_customize, 'navbar_is_display_search_bar',
			array(
				'label'       => __( 'Display a Search Bar', 'mynote' ),
				'section'     => 'section_header_searchbar',
				'type'        => 'radio',
				'description' => __( 'Would you like to display a search bar in header navbar area?', 'mynote' ),
				'choices'     => array(
					'yes' => __( 'Yes', 'mynote' ),
					'no'  => __( 'No', 'mynote' ),
				),
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

	for ( $i = 1; $i <= 5; $i++ ) {
		$wp_customize->add_control(
			new WP_Customize_Control( $wp_customize, 'social_link_url_' . $i,
				array(
					'label'    => __( 'Link', 'mynote' ) . ' (' . $i . ')',
					'type' => 'text',
					'section'  => 'section_social_links_links',
				)
			)
		);
	}

	$wp_customize->add_setting('social_link_location_footer', array( 'default' => true ) );
	$wp_customize->add_setting('social_link_location_author', array( 'default' => false ) );
	$wp_customize->add_setting('social_link_location_navbar', array( 'default' => false ) );
	
	$wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'social_link_location_footer',
			array(
				'label'     => __( 'Location: Footer', 'mynote' ),
				'section'   => 'section_social_links_locations',
				'settings'  => 'social_link_location_footer',
				'description' => __( 'Display social links on the page footer.', 'mynote' ),
				'type'      => 'checkbox',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'social_link_location_author',
			array(
				'label'     => __( 'Location: Author', 'mynote' ),
				'section'   => 'section_social_links_locations',
				'settings'  => 'social_link_location_author',
				'description' => __( 'Display social links on the author area. This option is preferred for personal blog.', 'mynote' ),
				'type'      => 'checkbox',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'social_link_location_navbar',
			array(
				'label'     => __( 'Location: Navbar', 'mynote' ),
				'section'   => 'section_social_links_locations',
				'settings'  => 'social_link_location_navbar',
				'description' => __( 'Display social links on the navbar.', 'mynote' ),
				'type'      => 'checkbox',
			)
		)
	);

	$wp_customize->add_setting( 'progressbar_is_display_bar', array( 'default' => 'yes' ) );
	$wp_customize->add_setting( 'progressbar_bg_color', $default_navbar );
	$wp_customize->add_setting( 'progressbar_text_color', $default_link_color );
	$wp_customize->add_setting( 'progressbar_percentage_bg_color', $default_link_color );
	$wp_customize->add_setting( 'progressbar_is_display_percentage', array( 'default' => 'yes' ) );
	$wp_customize->add_setting( 'progressbar_preferred_color', array( 'default' => 'default' ) );

	$wp_customize->add_setting( 'progressbar_custom_bg_color', $default_navbar );
	$wp_customize->add_setting( 'progressbar_custom_text_color', $default_link_color );
	$wp_customize->add_setting( 'progressbar_custom_border_color', $default_progress_bar_border_color );


	$wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'progressbar_is_display_bar',
			array(
				'label'       => __( 'Display a Progress Bar', 'mynote' ),
				'section'     => 'section_progress_bar_basic',
				'type'        => 'radio',
				'description' => __( 'Would you like to display a progress bar while reading?', 'mynote' ),
				'choices'     => array(
					'yes' => __( 'Yes', 'mynote' ),
					'no'  => __( 'No', 'mynote' ),
				),
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'progressbar_is_display_percentage',
			array(
				'label'       => __( 'Display a Percentage Number', 'mynote' ),
				'section'     => 'section_progress_bar_basic',
				'type'        => 'radio',
				'description' => __( 'Would you like to display a percentage number on the progress bar?', 'mynote' ),
				'choices'     => array(
					'yes' => __( 'Yes', 'mynote' ),
					'no'  => __( 'No', 'mynote' ),
				),
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'progressbar_preferred_color',
			array(
				'label'       => __( 'Color Pattern', 'mynote' ),
				'section'     => 'section_progress_bar_basic',
				'type'        => 'radio',
				'description' => __( 'Choose a preferred color pattern and apply it to the progress bar.', 'mynote' ),
				'choices'     => array(
					'default' => __( 'Default', 'mynote' ),
					'menu'  => __( 'As same as website menu', 'mynote' ),
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
				'section'  => 'section_progress_bar_color',
				'settings' => 'progressbar_custom_border_color',
				'show_opacity' => true,
				'palette'	   => $default_color_palette,
			) 
		) 
	);
}

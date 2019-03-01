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
 */

add_action( 'customize_register', 'mynote_customize_register' );

function mynote_customize_register( $wp_customize ) {

	// Default settings.

	$default_navbar_color                = 'rgba(36, 41, 46, 1)';
	$default_navbar_link_color           = '#c8c9ca';
	$default_navbar_link_hover_color     = '#ffffff';
	$default_progress_bar_border_color   = '#1e90ff';
	$default_searchbar_placeholder_color = '#cccccc';

	$default_color_palette = array(
		'rgb(36, 41, 46)',
		'rgba(0, 107, 91)',
		'rgba(0, 75, 152)',
		'rgba(168, 19, 62)',
	);

	// Panels.

	$wp_customize->add_panel( 'panel_mynote_navbar', array(
		'title'       => __( 'Mynote: Navbar', 'mynote' ),
		'priority'    => 10,
	));

	$wp_customize->add_panel( 'panel_mynote_progress_bar', array(
		'title'       => __( 'Mynote: Progress Bar', 'mynote' ),
		'priority'    => 10,
	));

	$wp_customize->add_panel( 'panel_mynote_layout', array(
		'title'       => __( 'Mynote: Layout', 'mynote' ),
		'priority'    => 10,
	));

	$wp_customize->add_section( 'section_post_card', 
		array(
			'title'      => __( 'Mynote: Post Card', 'mynote' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);

	// Sections.
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

	// Settings.

	$wp_customize->add_setting( 'navbar_homepage_bg_color', array(
		'default'           => $default_navbar_color,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'navbar_homepage_link_color', array(
		'default'           => $default_navbar_link_color,
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'navbar_homepage_link_hover_color', array(
		'default'           => $default_navbar_link_hover_color,
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'navbar_website_bg_color', array(
		'default'           => $default_navbar_color,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'navbar_website_link_color', array(
		'default'           => $default_navbar_link_color,
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'navbar_website_link_hover_color', array(
		'default'           => $default_navbar_link_hover_color,
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'navbar_is_display_search_bar', array( 
		'default'           => 'yes', 
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'navbar_searchbar_placeholder_color', array(
		'default'           => $default_searchbar_placeholder_color,
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'progressbar_is_display_bar', array( 
		'default'           => 'yes', 
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'progressbar_bg_color', array(
		'default'           => $default_navbar_color,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'progressbar_text_color', array(
		'default'           => $default_navbar_link_color,
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_setting( 'progressbar_percentage_bg_color', array(
		'default'           => $default_navbar_link_color,
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'progressbar_is_display_percentage', array( 
		'default'           => 'yes',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'progressbar_preferred_color', array( 
		'default'           => 'default', 
		'sanitize_callback' => 'esc_attr' 
	) );

	$wp_customize->add_setting( 'progressbar_custom_bg_color', array(
		'default'           => $default_navbar_color,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'progressbar_custom_text_color', array(
		'default'           => $default_navbar_link_color,
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'progressbar_custom_border_color', array(
		'default'           => $default_progress_bar_border_color,
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_setting( 'layout_post_sidebar_location_home', array( 
		'default'           => 'right', 
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'layout_post_sidebar_location_archive', array( 
		'default'           => 'right', 
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'layout_post_sidebar_location_post', array( 
		'default'           => 'right', 
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'layout_cols_per_row_home', array( 
		'default'           => '3', 
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'layout_cols_per_row_archive', array( 
		'default'           => '3', 
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'progressbar_is_display_percentage', array( 
		'default'           => 'yes',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'post_card_show_footer', array( 
		'default'           => 'yes',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'post_card_show_header', array( 
		'default'           => 'yes',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	// Add custom setting to bulti-in `static_front_page` section.
	$wp_customize->add_setting( 'is_scroll_down_button', array( 
		'default'           => 'no',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	// Controls.

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
		new WP_Customize_Control( $wp_customize, 'navbar_is_display_search_bar_control',
			array(
				'label'       => __( 'Display a Search Bar', 'mynote' ),
				'section'     => 'section_header_searchbar',
				'settings'    => 'navbar_is_display_search_bar',
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

	$wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'progressbar_is_display_bar_control',
			array(
				'label'       => __( 'Display a Progress Bar', 'mynote' ),
				'section'     => 'section_progress_bar_basic',
				'settings'    => 'progressbar_is_display_bar',
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
		new WP_Customize_Control( $wp_customize, 'progressbar_is_display_percentage_control',
			array(
				'label'       => __( 'Display a Percentage Number', 'mynote' ),
				'section'     => 'section_progress_bar_basic',
				'settings'    => 'progressbar_is_display_percentage',
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

	$wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'post_card_header_control',
			array(
				'label'       => __( 'Header', 'mynote' ),
				'section'     => 'section_post_card',
				'settings'    => 'post_card_show_header',
				'type'        => 'radio',
				'description' => __( 'Would you like to display the header of the post card? (Post thumbnail is located on this section. Choosing `No` will hide it.)', 'mynote' ),
				'choices'     => array(
					'yes' => __( 'Yes', 'mynote' ),
					'no'  => __( 'No', 'mynote' ),
				),
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'post_card_footer_control',
			array(
				'label'       => __( 'Footer', 'mynote' ),
				'section'     => 'section_post_card',
				'settings'    => 'post_card_show_footer',
				'type'        => 'radio',
				'description' => __( 'Would you like to display the footer of the post card?', 'mynote' ),
				'choices'     => array(
					'yes' => __( 'Yes', 'mynote' ),
					'no'  => __( 'No', 'mynote' ),
				),
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'scroll_down_button_control',
			array(
				'label'       => __( 'Mynote: Scrolling down button', 'mynote' ),
				'section'     => 'static_front_page',
				'settings'    => 'is_scroll_down_button',
				'type'        => 'radio',
				'description' => __( 'Would you like to display the scrolling down button? (desktop version)', 'mynote' ),
				'choices'     => array(
					'yes' => __( 'Yes', 'mynote' ),
					'no'  => __( 'No', 'mynote' ),
				),
			)
		)
	);
	
}

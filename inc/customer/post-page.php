<?php
/**
 *  Mynote theme customizer: Post Page
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.3.0
 * @version 1.3.0
 * 
 */


function mynote_customize_post_page( $wp_customize ) {

    /**
     * Panel
     */

    /**
     * Section
     */
	$wp_customize->add_section( 'section_post_page', 
		array(
			'title'      => __( 'Post Page', 'mynote' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);
    
    /**
     * Setting
     */
    $wp_customize->add_setting( 'post_page_show_breadcrumb',
        array( 
            'default'           => 'yes',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'post_page_show_author_date',
        array( 
            'default'           => 'yes',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'post_page_show_feature_image',
        array( 
            'default'           => 'yes',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'post_page_show_author_card',
        array( 
            'default'           => 'yes',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'post_page_show_comments',
        array( 
            'default'           => 'yes',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    /**
     * Control
     */
    $wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'post_page_show_breadcrumb_control',
			array(
				'label'       => __( 'Breadcrumb', 'mynote' ),
				'section'     => 'section_post_page',
				'settings'    => 'post_page_show_breadcrumb',
				'type'        => 'radio',
				'description' => __( 'Would you like to display breadcrumb?', 'mynote' ),
				'choices'     => array(
					'yes' => __( 'Yes', 'mynote' ),
					'no'  => __( 'No', 'mynote' ),
				),
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'post_page_show_author_date_control',
			array(
				'label'       => __( 'Post Author and Date', 'mynote' ),
				'section'     => 'section_post_page',
				'settings'    => 'post_page_show_author_date',
				'type'        => 'radio',
				'description' => __( 'Would you like to display post author and post date?', 'mynote' ),
				'choices'     => array(
					'yes' => __( 'Yes', 'mynote' ),
					'no'  => __( 'No', 'mynote' ),
				),
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'post_page_show_feature_image_control',
			array(
				'label'       => __( 'Featured Image', 'mynote' ),
				'section'     => 'section_post_page',
				'settings'    => 'post_page_show_feature_image',
				'type'        => 'radio',
				'description' => __( 'Would you like to display featured image?', 'mynote' ),
				'choices'     => array(
					'yes' => __( 'Yes', 'mynote' ),
					'no'  => __( 'No', 'mynote' ),
				),
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'post_page_show_author_card_control',
			array(
				'label'       => __( 'Author Card', 'mynote' ),
				'section'     => 'section_post_page',
				'settings'    => 'post_page_show_author_card',
				'type'        => 'radio',
				'description' => __( 'Would you like to display author card?', 'mynote' ),
				'choices'     => array(
					'yes' => __( 'Yes', 'mynote' ),
					'no'  => __( 'No', 'mynote' ),
				),
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control( $wp_customize, 'post_page_show_comments_control',
			array(
				'label'       => __( 'Comment Section', 'mynote' ),
				'section'     => 'section_post_page',
				'settings'    => 'post_page_show_comments',
				'type'        => 'radio',
				'description' => __( 'Would you like to display comment section?', 'mynote' ),
				'choices'     => array(
					'yes' => __( 'Yes', 'mynote' ),
					'no'  => __( 'No', 'mynote' ),
				),
			)
		)
	);
}

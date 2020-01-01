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
		)
	);
    
    /**
     * Setting
     */
    $wp_customize->add_setting( 'post_page_show_breadcrumb',
        array( 
            'default'           => true,
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'post_page_show_author_date',
        array( 
            'default'           => true,
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'post_page_show_feature_image',
        array( 
            'default'           => true,
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'post_page_show_author_card',
        array( 
            'default'           => true,
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'post_page_show_comments',
        array( 
            'default'           => true,
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    /**
     * Control
     */
    $wp_customize->add_control(
		new Customize_Toggle_Control( $wp_customize, 'post_page_show_breadcrumb_control',
			array(
				'label'       => __( 'Breadcrumb', 'mynote' ),
				'section'     => 'section_post_page',
				'settings'    => 'post_page_show_breadcrumb',
			)
		)
	);

	$wp_customize->add_control(
		new Customize_Toggle_Control( $wp_customize, 'post_page_show_author_date_control',
			array(
				'label'       => __( 'Post Author and Date', 'mynote' ),
				'section'     => 'section_post_page',
				'settings'    => 'post_page_show_author_date',
			)
		)
	);

	$wp_customize->add_control(
		new Customize_Toggle_Control( $wp_customize, 'post_page_show_feature_image_control',
			array(
				'label'       => __( 'Featured Image', 'mynote' ),
				'section'     => 'section_post_page',
				'settings'    => 'post_page_show_feature_image',
			)
		)
	);

	$wp_customize->add_control(
		new Customize_Toggle_Control( $wp_customize, 'post_page_show_author_card_control',
			array(
				'label'       => __( 'Author Card', 'mynote' ),
				'section'     => 'section_post_page',
				'settings'    => 'post_page_show_author_card',
			)
		)
	);

	$wp_customize->add_control(
		new Customize_Toggle_Control( $wp_customize, 'post_page_show_comments_control',
			array(
				'label'       => __( 'Comment Section', 'mynote' ),
				'section'     => 'section_post_page',
				'settings'    => 'post_page_show_comments',
			)
		)
	);
}

<?php
/**
 * Mynote theme customizer: Post Page
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.3.0
 * @version 1.3.0
 */


function mynote_customize_post_card( $wp_customize ) {

    /**
     * Panel
     */

    /**
     * Section
     */
	$wp_customize->add_section( 'section_post_card', 
		array(
			'title'      => __( 'Post Card', 'mynote' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);
    
    /**
     * Setting
     */
    $wp_customize->add_setting( 'post_card_show_footer',
        array( 
            'default'           => 'yes',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_setting( 'post_card_show_header',
        array( 
            'default'           => 'yes',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    /**
     * Control
     */
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
}

<?php
/**
 * Class Setting
 *
 * @author Terry Lin
 * @link https://terryl.in/githuber
 *
 * @package Githuber
 * @since 1.1.0
 * @version 1.1.0
 */

namespace Githuber\Controller;

class Setting {

	public static $settings = [];

	public static $setting_api;
	public static $text_domain = 'githuber';

	/**
	 * Constructer.
	 */
	public function __construct() {
		
		if ( ! self::$setting_api ) {
			self::$setting_api = new \WeDevs_Settings_API();
		}
	}
	
	public function init() {
		add_action( 'admin_init', array( $this, 'setting_admin_init' ) );
		add_action( 'admin_menu', array( $this, 'setting_admin_menu' ) );
	}

	/**
	 * The Githuber setting page, sections and fields.
	 */
	public function setting_admin_init() {
 
		$sections = array(
			array(
				'id'    => 'githuber_basics',
				'title' => __( 'Basic Settings', 'githuber' )
			),
			array(
				'id'    => 'githuber_advanced',
				'title' => __( 'Advanced Settings', 'githuber' )
			),
			array(
				'id'    => 'githuber_others',
				'title' => __( 'Other Settings', 'githuber' )
			)
		);
	 
		$fields = array(
			'githuber_basics' => array(
				array(
					'name' => 'text',
					'label' => __('Text Input', 'githuber'),
					'desc' => __('Text input description', 'githuber'),
					'type' => 'text',
					'default' => 'Title'
				),
				array(
					'name' => 'textarea',
					'label' => __('Textarea Input', 'githuber'),
					'desc' => __('Textarea description', 'githuber'),
					'type' => 'textarea'
				),
				array(
					'name' => 'checkbox',
					'label' => __('Checkbox', 'githuber'),
					'desc' => __('Checkbox Label', 'githuber'),
					'type' => 'checkbox'
				),
				array(
					'name' => 'radio',
					'label' => __('Radio Button', 'githuber'),
					'desc' => __('A radio button', 'githuber'),
					'type' => 'radio',
					'options' => array(
						'yes' => 'Yes',
						'no' => 'No'
					)
				),
				array(
					'name' => 'multicheck',
					'label' => __('Multile checkbox', 'githuber'),
					'desc' => __('Multi checkbox description', 'githuber'),
					'type' => 'multicheck',
					'options' => array(
						'one' => 'One',
						'two' => 'Two',
						'three' => 'Three',
						'four' => 'Four'
					)
				),
				array(
					'name' => 'selectbox',
					'label' => __('A Dropdown', 'githuber'),
					'desc' => __('Dropdown description', 'githuber'),
					'type' => 'select',
					'default' => 'no',
					'options' => array(
						'yes' => 'Yes',
						'no' => 'No'
					)
				)
			),
			'githuber_advanced' => array(
				array(
					'name' => 'text',
					'label' => __('Text Input', 'githuber'),
					'desc' => __('Text input description', 'githuber'),
					'type' => 'text',
					'default' => 'Title'
				),
				array(
					'name' => 'textarea',
					'label' => __('Textarea Input', 'githuber'),
					'desc' => __('Textarea description', 'githuber'),
					'type' => 'textarea'
				),
				array(
					'name' => 'checkbox',
					'label' => __('Checkbox', 'githuber'),
					'desc' => __('Checkbox Label', 'githuber'),
					'type' => 'checkbox'
				),
				array(
					'name' => 'radio',
					'label' => __('Radio Button', 'githuber'),
					'desc' => __('A radio button', 'githuber'),
					'type' => 'radio',
					'default' => 'no',
					'options' => array(
						'yes' => 'Yes',
						'no' => 'No'
					)
				),
				array(
					'name' => 'multicheck',
					'label' => __('Multile checkbox', 'githuber'),
					'desc' => __('Multi checkbox description', 'githuber'),
					'type' => 'multicheck',
					'default' => array('one' => 'one', 'four' => 'four'),
					'options' => array(
						'one' => 'One',
						'two' => 'Two',
						'three' => 'Three',
						'four' => 'Four'
					)
				),
				array(
					'name' => 'selectbox',
					'label' => __('A Dropdown', 'githuber'),
					'desc' => __('Dropdown description', 'githuber'),
					'type' => 'select',
					'options' => array(
						'yes' => 'Yes',
						'no' => 'No'
					)
				)
			),
			'githuber_others' => array(
				array(
					'name' => 'text',
					'label' => __('Text Input', 'githuber'),
					'desc' => __('Text input description', 'githuber'),
					'type' => 'text',
					'default' => 'Title'
				),
				array(
					'name' => 'textarea',
					'label' => __('Textarea Input', 'githuber'),
					'desc' => __('Textarea description', 'githuber'),
					'type' => 'textarea'
				),
				array(
					'name' => 'checkbox',
					'label' => __('Checkbox', 'githuber'),
					'desc' => __('Checkbox Label', 'githuber'),
					'type' => 'checkbox'
				),
				array(
					'name' => 'radio',
					'label' => __('Radio Button', 'githuber'),
					'desc' => __('A radio button', 'githuber'),
					'type' => 'radio',
					'options' => array(
						'yes' => 'Yes',
						'no' => 'No'
					)
				),
				array(
					'name' => 'multicheck',
					'label' => __('Multile checkbox', 'githuber'),
					'desc' => __('Multi checkbox description', 'githuber'),
					'type' => 'multicheck',
					'options' => array(
						'one' => 'One',
						'two' => 'Two',
						'three' => 'Three',
						'four' => 'Four'
					)
				),
				array(
					'name' => 'selectbox',
					'label' => __('A Dropdown', 'githuber'),
					'desc' => __('Dropdown description', 'githuber'),
					'type' => 'select',
					'options' => array(
						'yes' => 'Yes',
						'no' => 'No'
					)
				)
			)
		);

		// set sections and fields.
		self::$setting_api->set_sections( $sections );
		self::$setting_api->set_fields( $fields );
	 
		// initialize them.
		self::$setting_api->admin_init();
	}

	/**
	 * Register the plugin page.
	 */
	public function setting_admin_menu() {

		add_options_page(
			__( 'Githuber ', 'Githuber Plugin' ),
			__( 'Githuber', 'Githuber Plugin' ),
			'manage_options',
			self::$text_domain,
			array( $this, 'setting_plugin_page' )
		);
	}

	/**
	* Display the plugin settings options page.
	*/
	public function setting_plugin_page() {

		echo '<div class="wrap">';
		settings_errors();
	
		self::$setting_api->show_navigation();
		self::$setting_api->show_forms();
	
		echo '</div>';
	}
}

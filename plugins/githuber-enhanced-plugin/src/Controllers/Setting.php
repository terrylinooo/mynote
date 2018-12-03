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

class Setting extends ControllerAbstract {

	public static $settings = [];
	public static $setting_api;

	/**
	 * Constructer.
	 */
	public function __construct() {
		
		if ( ! self::$setting_api ) {
			self::$setting_api = new \WeDevs_Settings_API();
		}
	}
	
	/**
	 * Initialize.
	 */
	public function init() {
		add_action( 'admin_init', array( $this, 'setting_admin_init' ) );
		add_action( 'admin_menu', array( $this, 'setting_admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'setting_admin_style' ) );
	}

    /**
     * Register CSS style files.
     */
	public function enqueue_styles() {

	}

    /**
     * Register JS files.
     */
	public function enqueue_scripts() {

	}

	/**
	 * Load specfic CSS file for the Githuber setting page.
	 */
	public function setting_admin_style( $hook ) {

		if ( false === strpos( $hook, 'githuber-plugin' ) ) {
			return;
		}
		wp_enqueue_style( 'custom_wp_admin_css', GITHUBER_PLUGIN_URL . 'assets/css/admin-style.css' );
	}

	/**
	 * The Githuber setting page, sections and fields.
	 */
	public function setting_admin_init() {

		$sections = array(
			array(
				'id'    => 'githuber_basics',
				'title' => __( 'Markdown', $this->text_domain )
			),
			
			array(
				'id'    => 'githuber_advanced',
				'title' => __( 'GitHub', $this->text_domain )
			),

			/*
			array(
				'id'    => 'githuber_others',
				'title' => __( 'Other Settings', $this->text_domain )
			)
			*/
		);

		$fields = array(
			'githuber_basics' => array(
				array(
					'name' => 'githuber_enable_markdown_for',
					'label' => __('Enable', $this->text_domain),
					'desc' => __('Enable Markdown for post, pages or comments.', $this->text_domain),
					'type' => 'multicheck',
					'default' => array('post' => 'post', 'page' => 'page'),
					'options' => array(
						'post' => 'Posts',
						'page' => 'Pages',
						'comment' => 'Comments'
					)
				),

				array(
					'name' => 'githuber_editor_live_preview',
					'label' => __('Live preview', $this->text_domain),
					'desc' => __('Split editor into two panes to display a live preview when editing post.', $this->text_domain),
					'type' => 'checkbox'
				),

				array(
					'name' => 'githuber_editor_sync_scrolling',
					'label' => __('Sync scrolling', $this->text_domain),
					'desc' => __('Synchronize scrolling of two editor panes by content.', $this->text_domain),
					'type' => 'checkbox'
				),
				
			),
			/*
			'githuber_advanced' => array(
				array(
					'name' => 'text',
					'label' => __('Text Input', $this->text_domain),
					'desc' => __('Text input description', $this->text_domain),
					'type' => 'text',
					'default' => 'Title'
				),
				array(
					'name' => 'textarea',
					'label' => __('Textarea Input', $this->text_domain),
					'desc' => __('Textarea description', $this->text_domain),
					'type' => 'textarea'
				),
				array(
					'name' => 'checkbox',
					'label' => __('Checkbox', $this->text_domain),
					'desc' => __('Checkbox Label', $this->text_domain),
					'type' => 'checkbox'
				),
				array(
					'name' => 'radio',
					'label' => __('Radio Button', $this->text_domain),
					'desc' => __('A radio button', $this->text_domain),
					'type' => 'radio',
					'default' => 'no',
					'options' => array(
						'yes' => 'Yes',
						'no' => 'No'
					)
				),
				array(
					'name' => 'multicheck',
					'label' => __('Multile checkbox', $this->text_domain),
					'desc' => __('Multi checkbox description', $this->text_domain),
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
					'label' => __('A Dropdown', $this->text_domain),
					'desc' => __('Dropdown description', $this->text_domain),
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
					'label' => __('Text Input', $this->text_domain),
					'desc' => __('Text input description', $this->text_domain),
					'type' => 'text',
					'default' => 'Title'
				),
				array(
					'name' => 'textarea',
					'label' => __('Textarea Input', $this->text_domain),
					'desc' => __('Textarea description', $this->text_domain),
					'type' => 'textarea'
				),
				array(
					'name' => 'checkbox',
					'label' => __('Checkbox', $this->text_domain),
					'desc' => __('Checkbox Label', $this->text_domain),
					'type' => 'checkbox'
				),
				array(
					'name' => 'radio',
					'label' => __('Radio Button', $this->text_domain),
					'desc' => __('A radio button', $this->text_domain),
					'type' => 'radio',
					'options' => array(
						'yes' => 'Yes',
						'no' => 'No'
					)
				),
				array(
					'name' => 'multicheck',
					'label' => __('Multile checkbox', $this->text_domain),
					'desc' => __('Multi checkbox description', $this->text_domain),
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
					'label' => __('A Dropdown', $this->text_domain),
					'desc' => __('Dropdown description', $this->text_domain),
					'type' => 'select',
					'options' => array(
						'yes' => 'Yes',
						'no' => 'No'
					)
				)
				
			)*/
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
			__( 'Githuber ', $this->text_domain ),
			__( 'Githuber', $this->text_domain ),
			'manage_options',
			'githuber-plugin',
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

	/**
	* Get the value of a settings field.
	*
	* @param string $option  settings field name.
	* @param string $section the section name this field belongs to.
	* @param string $default default text if it's not found.
	* @return mixed
	*/
	function get_option( $option, $section, $default = '' ) {
	
		$options = get_option( $section );
	
		if ( isset( $options[ $option ] ) ) {
			return $options[ $option ];
		}
	
		return $default;
	}
}

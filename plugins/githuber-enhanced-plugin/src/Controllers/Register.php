<?php
/**
 * Class Githuber
 *
 * @author Terry Lin
 * @link https://terryl.in/githuber
 *
 * @package Githuber
 * @since 1.1.0
 * @version 1.1.0
 */

namespace Githuber\Controller;

class Register {

	public $current_user;

	public $defaults = array(
		'theme_style' => 'default',
		'code_style'  => 'default'
	);

    /**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.1.0
	 */
	public function __construct() {
		global $current_user;

		// Load current user.
		$this->current_user = $current_user;
	}
	
	/**
	 * Activate.
	 */
	public function activate() {

		// Turn off Rich-text editor.
		update_user_option( $this->current_user->ID, 'rich_editing', 'false', true );

		if ( get_option( 'gihuber_plugin' ) == false ) {
			add_option( 'gihuber_plugin', $this->defaults, '', 'yes' );
		}
	}

	/**
	 * Deactivate.
	 */
	public function deactivate() {

		// Turn on Rich-text editor.
		global $current_user;
		update_user_option( $current_user->ID, 'rich_editing', 'true', true );
		delete_user_option( $current_user->ID, 'dismissed_wp_pointers', true );
	}

	/**
	 * Initialize Githuber widgets.
	 */
	public function widgets() {
		add_action( 'widgets_init', array( $this, '_widgets' ) );
	}

	/**
	 * Register post typees.
	 */
	public function post_types() {
		new \Githuber_Post_Type_Repository();
	}

	/**
	 * Register Walker
	 */
	public function walker() {
		new \Githuber_Walker();
	}

	/**
	 * Register hooks.
	 */
	public function hooks() {
		register_activation_hook( GITHUBER_PLUGIN_PATH, array( $this , 'activate' ) );
		register_deactivation_hook( GITHUBER_PLUGIN_PATH, array( $this , 'deactive' ) );
	}

	/**
	 * Register Githuber widgets. (Triggered by $this->widgets).
	 */
	public function _widgets() {
		register_widget( 'Githuber_Widget_Toc' );
	}
}

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

use Githuber\Controller as Controller;

class Githuber {

	public static $text_domain = 'githuber';
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
		//add_action( 'admin_menu', array( $this, 'action_admin_menu' ) );
		//add_action( 'admin_init', array( $this, 'action_admin_init' ) );
		//add_action( 'current_screen', array( $this, 'trigger_cron' ) );

	}

	/**
	 * Initialize.
	 */
	public function init() {

		$register = new Controller\Register();

		$register->hooks();
		$register->post_types();
		$register->walker();
		$register->widgets();
	}

	/**
	 * Githuber plugin menu.
	 */
	public function action_admin_menu() {
		add_options_page(
			__( 'GitHuber ', 'Githuber Enhanced Plugin' ),
			__( 'GitHuber', 'githuber-plugin' ),
			'manage_options',
			self::$text_domain,
			array( $this, 'register_settings' )
		);
	}

	/**
	 * Githuber plugin settings.
	 */
	public function action_admin_init() {

	}
}

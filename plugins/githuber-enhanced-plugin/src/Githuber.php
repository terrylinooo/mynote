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

	/**
	 * Constructer.
	 */
	public function __construct() {
		//add_action( 'current_screen', array( $this, 'trigger_cron' ) );
		add_action( 'init', array( $this, 'load_textdomain' ) );
	}

	/**
	 * Initialize everything the Githuber plugin needs.
	 */
	public function init() {

		$register = new Controller\Register();
		$register->init();

		$setting = new Controller\Setting();
		$setting->init();

		$markdown = new Controller\Markdown();
		$markdown->init();
	}

	/**
	 * Load plugin textdomain.
	 */
	public function load_textdomain() {
		load_plugin_textdomain( GITHUBER_PLUGIN_TEXT_DOMAIN, false, GITHUBER_PLUGIN_LANGUAGE_PACK ); 
	}
}

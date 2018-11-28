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
	 * Constructer.
	 */
	public function __construct() {
		//add_action( 'current_screen', array( $this, 'trigger_cron' ) );
	}

	/**
	 * Initialize everything the Githuber plugin needs.
	 */
	public function init() {

		$register = new Controller\Register();
		$register->init();

		$setting = new Controller\Setting();
		$setting->init();
	}
}

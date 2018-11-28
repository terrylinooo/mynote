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

class Setup {

    public static $settings = [];

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
		


	}
	

	public function default() {
		$settings = [
			''



		];

		return $settings;
	}

	public function markdown() {
		if ( ! empty( self::$settings['markdown'] ) ) {
			
		}
	}


}

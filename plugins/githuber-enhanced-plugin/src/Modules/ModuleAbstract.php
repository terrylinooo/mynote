<?php

/**
 * Class ModuleAbstract
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package Githuber
 * @since 1.1.0
 * @version 1.1.0
 */

namespace Githuber\Module;

abstract class ModuleAbstract {

	/**
	 * The plugin url.
	 *
	 * @var string
	 */
	public $githuber_plugin_url;

	/**
	 * Constructer.
	 * 
	 * @return void
	 */
	public function __construct() {
		/**
		 * Basic plugin information. Mapping from the Constant in the plugin loader script.
		 */
		$this->githuber_plugin_url  = GITHUBER_PLUGIN_URL;
	}

	/**
	 * Initialize.
	 *
	 * @return void
	 */
	abstract public function init();
	
	/**
	 * Register CSS style files for frontend use.
	 *
	 * @return void
	 */
	abstract public function front_enqueue_styles();

	/**
	 * Register JS files for frontend use.
	 *
	 * @return void
	 */
	abstract public function front_enqueue_scripts();

	/**
	 * Print Javascript plaintext in page footer.
	 *
	 * @return void
	 */
	abstract public function front_print_footer_scripts();
}

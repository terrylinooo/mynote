<?php
/**
 * Class Markdown
 *
 * @author Terry Lin
 * @link https://terryl.in/githuber
 *
 * @package Githuber
 * @since 1.1.0
 * @version 1.1.0
 */

namespace Githuber\Controller;

class Markdown extends ControllerAbstract {

	/**
	 * Load WP `current_screen` object from global function `get_current_screen()`.
	 *
	 * @var object
	 */
	public $current_screen;

	/**
	 * The Post Type support from Markdown controller.
	 *
	 * @var string
	 */
	public $post_type;

	/**
	 * Constructer.
	 */
	public function __construct() {

		// Get WP `current_screen` object.
		$this->current_screen = get_current_screen();

		// Assign value from Abstract.
		$this->post_type = $this->post_type_support[ 'markdown' ];
	}

	/**
	 * Initialize.
	 */
	public function init() {
		add_post_type_support( 'post', $this->post_type );
		add_post_type_support( 'page', $this->post_type );
		add_post_type_support( 'revision', $this->post_type );
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
}

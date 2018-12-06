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
use Githuber\Controller\Setting as Setting;

class Markdown extends ControllerAbstract {

	/**
	 * We use a JavaScript library that is called `EditorMd`, and this is its version number.
	 *
	 * @link https://github.com/pandao/editor.md
	 *
	 * @var string
	 */
	public $editormd_varsion = '1.5.0';

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
		parent::__construct();

		// Assign value from Abstract.
		$this->post_type = $this->post_type_support['markdown'];
	}

	/**
	 * Initialize.
	 */
	public function init() {
		add_post_type_support( 'post', $this->post_type );
		add_post_type_support( 'page', $this->post_type );
		add_post_type_support( 'revision', $this->post_type );

		add_action( 'admin_init', array( $this, 'admin_init' ) );
	}

    /**
     * Register CSS style files.
     */
	public function admin_enqueue_styles( $hook_suffix ) {
		wp_enqueue_style( 'editmd', $this->githuber_plugin_url . '/assets/vendor/editor.md/css/editormd.min.css', array(), $this->editormd_varsion, 'all' );
	}

    /**
     * Register JS files.
     */
	public function admin_enqueue_scripts( $hook_suffix ) {

		if ( ! post_type_supports( get_current_screen()->post_type, $this->post_type ) ) {
			return;
		}

		wp_enqueue_script( 'editormd', $this->githuber_plugin_url . 'assets/vendor/editor.md/editormd.min.js', array( 'jquery' ), $this->editormd_varsion, true );
		wp_enqueue_script( 'githuber-plugin', $this->githuber_plugin_url . 'assets/js/githuber.js', array( 'editormd' ), $this->version, true );

		switch ( get_bloginfo( 'language' ) ) {
			case 'zh-TW':
			case 'zh-CN':
				wp_enqueue_script( 'editor-md-lang', $this->githuber_plugin_url . 'assets/vendor/editor.md/languages/zh-tw.js', array(), $this->editormd_varsion, true );
				break;

			case 'en-US':
			default:
				wp_enqueue_script( 'editor-md-lang', $this->githuber_plugin_url . 'assets/vendor/editor.md/languages/en.js', array(), $this->editormd_varsion, true );
		}

		$editormd_config_list = array(
			'editor_sync_scrolling',
			'editor_live_preview',
			'editor_image_paste',
			'editor_html_decode',
			'editor_toolbar_theme',
			'editor_editor_theme',
			'editor_preview_theme',
			'support_toc',
			'support_emoji',
			'support_katex',
			'support_flow_chart',
			'support_sequence_diagram',
			'support_task_list'
		);

		$editormd_localize = array();

		foreach ($editormd_config_list as $setting_name) {
			$editormd_localize[ $setting_name ] = Setting::get_option( $setting_name, 'githuber_markdown' );
		}

		$editormd_localize['editor_modules_url'] = $this->githuber_plugin_url . 'assets/vendor/editor.md/lib/';
		$editormd_localize['editor_placeholder'] = __( 'Happy Markdowning!', $this->text_domain );

		// Register JS variables for the Editormd library uses.
		wp_localize_script( 'githuber-plugin', 'editormd_config', $editormd_localize );
	}

	/**
	 * Initalize to WP `admin_init` hook.
	 */
	public function admin_init() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

}

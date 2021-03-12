<?php
/**
 * Mynote_Widget__TOC
 *
 * Add a Table of Content for your article. This widget is for single-post pages only.
 *
 * @package   WordPress
 * @author    Terry Lin <terrylinooo>
 * @license   GPLv3 (or later)
 * @link      https://terryl.in
 * @copyright 2018 Terry Lin
 */

/**
 * Mynote_Widget_Toc
 */
class Mynote_Widget_Toc extends WP_Widget {

	/**
	 * Sets up a new Mynote TOC widget instance.
	 */
	public function __construct() {

		$widget_ops = array(
			'classname'                   => 'widget_mynote_toc',
			'description'                 => __( 'Add a Table of Content for your article. This widget is for single-post pages only.', 'mynote' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'mynote-toc', __( 'Mynote: Table of Content', 'mynote' ), $widget_ops );
		$this->alt_option_name = 'widget_mynote_toc';

		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action( 'wp_head', array( $this, 'mynote_toc_js' ) );
		}
	}

	/**
	 * Register javascript for the Mynote TOC widget.
	 */
	public function mynote_toc_js() {
		wp_register_script( 'bootstrap-toc', get_template_directory_uri() . '/assets/js/bootstrap-toc.min.js', array( 'jquery' ), '1.0.0' );
		wp_enqueue_script( 'bootstrap-toc' );
	}

	/**
	 * Initial TOC .
	 */
	public function mynote_toc_inline_js() {

		$inline_js = '
			jQuery( document ).ready(function( $ ) {
				Toc.init({
					$nav: $( "#toc" ),
					$scope: $( ".markdown-body" )
				});

				if ( "undefined" !== typeof $.fn.scrollspy ) {
					$( "body" ).scrollspy({
						target: "#toc"
					});
				}
			});
		';

		wp_add_inline_script( 'bootstrap-toc', $inline_js );
	}

	/**
	 * Outputs the content for the Mynote TOC instance.
	 */
	public function widget( $args, $instance ) {
		$this->mynote_toc_inline_js();

		$output = '<nav id="toc" class="toc" role="navigation"></nav>';
		echo $output;
	}

	/**
	 * Flushes the Mynote TOC widget cache.
	 */
	public function flush_widget_cache() {
		_deprecated_function( __METHOD__, '4.4.0' );
	}
}

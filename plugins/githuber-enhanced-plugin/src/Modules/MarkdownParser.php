<?php
/**
 * Module Name: MarkdownParser
 * Module Description: Parse Markdown plaintext into HTML plaintext.
 *
 * @author Terry Lin
 * @link https://terryl.in/githuber
 *
 * @package Githuber
 * @since 1.1.0
 * @version 1.1.0
 * 
 * Some code snippets are from Jetpack Markdown Parser, we modify it for our needs.
 * @link https://github.com/Automattic/jetpack/blob/master/_inc/lib/markdown/gfm.php
 * @license GPL
 * And we use another Markdown library is called ParseDown instead of PHP-Markdown (what Jetpack uses).
 * ParseDown is more light-weight and faster.
 */

namespace Githuber\Module;
use ParsedownExtra;

class MarkdownParser extends ParsedownExtra {

	public $contain_span_tags_re = '';

	/**
	 * Constructer.
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Remove bare <p> elements. <p>s with attributes will be preserved.
	 *
	 * @param  string $text HTML content
	 * @return string <p>-less content
	 */
	public function remove_bare_p_tags( $text ) {
		return preg_replace( "#<p>(.*?)</p>(\n|$)#ums", '$1$2', $text );
	}

	/**
	 * 
	 */
	public function transform( $text ) {
		$parsed_content = $this->text( $text );
		return $parsed_content;
	}
}

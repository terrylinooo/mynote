<?php
/**
 * Module Name: MarkdownParser
 * Module Description: Parse Markdown plaintext into HTML plaintext.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package Githuber
 * @since 1.1.0
 * @version 1.1.0
 */

namespace Githuber\Module;
use ParsedownExtra;

class MarkdownParser extends ParsedownExtra {

	/**
	 * Constructer.
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Remove bare <p> elements. <p>s with attributes will be preserved.
	 *
	 * @param  string $text HTML content.
	 * @return string <p>-less content.
	 */
	public function remove_bare_p_tags( $text ) {
		return preg_replace( "#<p>(.*?)</p>(\n|$)#ums", '$1$2', $text );
	}

	/**
	 * Support Github Flavored Markdown task lists.
	 * 
	 * @param string $text HTML content.
	 * @return string filtered HTML content.
	 */
	function parse_gfm_task_list( $text ) {
		$checked_item   = '<li class="gfm-task-list"><input type="checkbox">$1$2';
		$unchecked_item = '<li class="gfm-task-list"><input type="checkbox" checked>$1$2';

		// Replace task-list signs to corresponding HTML code.
		$text = preg_replace( "#<li>\[\s\] (.*?)([</li>|<ul>])#", $checked_item, $text );
		$text = preg_replace( "#<li>\[[x]\] (.*?)([</li>|<ul>])#", $unchecked_item, $text );
		return $text;
	}

	/**
	 * Teansform Markdown to HTML.
	 * 
	 * @param string $text Markdown content.
	 */
	public function transform( $text ) {
		$parsed_content = $this->text( $text );
		return $parsed_content;
	}
}

<?php
/**
 * Githuber Framework
 *
 * @author Terry Lin
 * @link https://terryl.in/githuber
 *
 * @package Githuber
 * @since 1.0.0
 * @version 1.0.0
 */

/**
 * Plugin Name:       Githuber Framework
 * Plugin URI:        https://github.com/githuber-wp/githuber-framework
 * Description:       A WordPress plugin that improves Githuber theme functionality.
 * Version:           1.0.0
 * Author:            Terry Lin
 * Author URI:        https://terryl.in
 * License:           GPL 3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       githuber-framework
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'GITHUBER_FRAMEWORK_VERSION', '1.0.0' );
define( 'GITHUBER_FRAMEWORK_DIR', plugin_dir_path( __FILE__ ) );

require_once GITHUBER_FRAMEWORK_DIR . 'inc/class-githuber-framework.php';

$gitbuber = new Githuber_Framework();
$gitbuber->init();


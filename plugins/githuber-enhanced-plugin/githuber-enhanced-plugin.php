<?php
/**
 * Githuber Enhanced Plugin
 *
 * @author Terry Lin
 * @link https://terryl.in/githuber
 *
 * @package Githuber
 * @since 1.1.0
 * @version 1.1.0
 */

/**
 * Plugin Name:       Githuber Enhanced Plugin
 * Plugin URI:        https://terryl.in/githuber
 * Description:       A WordPress plugin that improves Githuber theme functionality.
 * Version:           1.1.0
 * Author:            Terry Lin
 * Author URI:        https://terryl.in
 * License:           GPL 3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       githuber-plugin
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'GITHUBER_PLUGIN_VERSION', '1.1.0' );
define( 'GITHUBER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'GITHUBER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once GITHUBER_PLUGIN_DIR . 'inc/class-githuber-plugin.php';

$gitbuber = new Githuber_Plugin();
$gitbuber->init();


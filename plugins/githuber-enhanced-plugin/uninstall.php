<?php
/**
 * Uninstall Githuber enhanced plugin.
 *
 * @author Terry Lin
 * @link https://terryl.in/githuber
 *
 * @package Githuber
 * @since 1.0.0
 * @version 1.1.0
 */

// if uninstall.php is not called by WordPress, die.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}
 
$options_names = array(
	'gihuber_plugin'
);

foreach ( $options_names as $optionName ) {
	delete_option( $optionName );
	delete_site_option( $option_name );
}

// enable rich text.
add_filter( 'user_can_richedit', '__return_true' );

// drop a custom database table
// global $wpdb;
//$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}mytable");
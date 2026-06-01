<?php
/**
 * Local Docker WordPress configuration for Mynote development.
 *
 * @package WordPress
 */

define( 'DB_NAME', 'wordpress' );
define( 'DB_USER', 'wp_user' );
define( 'DB_PASSWORD', 'wp_pass' );
define( 'DB_HOST', 'db:3306' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

define( 'AUTH_KEY',         'mynote-dev-auth-key' );
define( 'SECURE_AUTH_KEY',  'mynote-dev-secure-auth-key' );
define( 'LOGGED_IN_KEY',    'mynote-dev-logged-in-key' );
define( 'NONCE_KEY',        'mynote-dev-nonce-key' );
define( 'AUTH_SALT',        'mynote-dev-auth-salt' );
define( 'SECURE_AUTH_SALT', 'mynote-dev-secure-auth-salt' );
define( 'LOGGED_IN_SALT',   'mynote-dev-logged-in-salt' );
define( 'NONCE_SALT',       'mynote-dev-nonce-salt' );

$table_prefix = 'wp_';

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', 'wp-content/logs/debug.log' );
define( 'WP_DEBUG_DISPLAY', false );
define( 'FS_METHOD', 'direct' );
define( 'DISALLOW_FILE_MODS', false );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';

<?php
/**
 * Router script for WordPress when using PHP's built-in server in Docker.
 *
 * @package Mynote
 */

// phpcs:disable

$root        = __DIR__;
$request_uri = $_SERVER['REQUEST_URI'] ?? '/';
$path        = parse_url( $request_uri, PHP_URL_PATH ) ?? '/';
$path        = urldecode( $path );

function mynote_resolve_target( string $root_path, string $uri_path ): ?string {
	$target = realpath( $root_path . $uri_path );

	if ( ! $target ) {
		return null;
	}

	if ( strncmp( $target, $root_path, strlen( $root_path ) ) !== 0 ) {
		return null;
	}

	if ( is_dir( $target ) ) {
		$index = realpath( $target . '/index.php' );
		if ( $index && is_file( $index ) && strncmp( $index, $root_path, strlen( $root_path ) ) === 0 ) {
			return $index;
		}
	}

	return is_file( $target ) ? $target : null;
}

function mynote_serve_target( string $file_path, string $script_path ): ?string {
	if ( 'php' === strtolower( pathinfo( $file_path, PATHINFO_EXTENSION ) ) ) {
		$_SERVER['SCRIPT_FILENAME'] = $file_path;
		$_SERVER['SCRIPT_NAME']     = $script_path;
		$_SERVER['PHP_SELF']        = $script_path;
		return $file_path;
	}

	$extension = strtolower( pathinfo( $file_path, PATHINFO_EXTENSION ) );
	$mime_map  = array(
		'css'   => 'text/css; charset=UTF-8',
		'eot'   => 'application/vnd.ms-fontobject',
		'gif'   => 'image/gif',
		'ico'   => 'image/x-icon',
		'jpeg'  => 'image/jpeg',
		'jpg'   => 'image/jpeg',
		'js'    => 'application/javascript; charset=UTF-8',
		'json'  => 'application/json; charset=UTF-8',
		'map'   => 'application/json; charset=UTF-8',
		'mjs'   => 'application/javascript; charset=UTF-8',
		'png'   => 'image/png',
		'svg'   => 'image/svg+xml',
		'ttf'   => 'font/ttf',
		'webp'  => 'image/webp',
		'woff'  => 'font/woff',
		'woff2' => 'font/woff2',
	);

	$mime = $mime_map[ $extension ] ?? null;
	if ( ! is_string( $mime ) || '' === $mime ) {
		$mime = function_exists( 'mime_content_type' ) ? mime_content_type( $file_path ) : null;
	}

	if ( is_string( $mime ) && '' !== $mime ) {
		header( 'Content-Type: ' . $mime );
	}

	readfile( $file_path );
	exit;
}

$target = mynote_resolve_target( $root, $path );
if ( $target ) {
	$php_file = mynote_serve_target( $target, $path );
	if ( is_string( $php_file ) && '' !== $php_file ) {
		require $php_file;
		exit;
	}
}

$_SERVER['SCRIPT_FILENAME'] = $root . '/index.php';
$_SERVER['SCRIPT_NAME']     = '/index.php';

require $root . '/index.php';

<?php
/**
 * Social icon links in Mynote theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.7
 */

/**
 * Returns an array of supported social links (Fontawesome 5 font icons).
 *
 * @return array
 */
function mynote_social_links_icons() {

	$social_links_icons = array(
		'behance.net'     => 'fab fa-behance behance',
		'codepen.io'      => 'fab fa-codepen codepen',
		'deviantart.com'  => 'fab fa-deviantart deviantart',
		'digg.com'        => 'fab fa-digg digg',
		'docker.com'      => 'fab fa-docker docker',
		'dribbble.com'    => 'fab fa-dribbble dribbble',
		'dropbox.com'     => 'fab fa-dropbox dropbox',
		'facebook.com'    => 'fab fa-facebook-f facebook',
		'flickr.com'      => 'fab fa-flickr flickr',
		'foursquare.com'  => 'fab fa-foursquare foursquare',
		'plus.google.com' => 'fab fa-google-plus-g google',
		'github.com'      => 'fab fa-github-alt github',
		'instagram.com'   => 'fab fa-instagram instagram',
		'linkedin.com'    => 'fab fa-linkedin-in linkedin',
		'mailto:'         => 'far fa-envelope envelope',
		'medium.com'      => 'fab fa-medium-m medium',
		'pinterest.com'   => 'fab fa-pinterest-p pinterest',
		'pscp.tv'         => 'fab fa-periscope periscope',
		'getpocket.com'   => 'fab fa-get-pocket getpocket',
		'reddit.com'      => 'fab fa-reddit-alien reddit',
		'skype.com'       => 'fab fa-skype skype',
		'skype:'          => 'fab fa-skype skype',
		'slideshare.net'  => 'fab fa-slideshare slideshare',
		'snapchat.com'    => 'fab fa-snapchat-ghost snapchat',
		'soundcloud.com'  => 'fab fa-soundcloud soundcloud',
		'spotify.com'     => 'fab fa-spotify spotify',
		'stumbleupon.com' => 'fab fa-stumbleupon stumbleupon',
		'tumblr.com'      => 'fab fa-tumblr tumblr',
		'twitch.tv'       => 'fab fa-twitch twitch',
		'twitter.com'     => 'fab fa-twitter twitter',
		'vimeo.com'       => 'fab fa-vimeo-v vimeo',
		'vine.co'         => 'fab fa-vine vine',
		'vk.com'          => 'fab fa-vk vk',
		'wordpress.org'   => 'fab fa-wordpress wordpress',
		'wordpress.com'   => 'fab fa-wordpress-simple wordpress',
		'yelp.com'        => 'fab fa-yelp yelp',
		'youtube.com'     => 'fab fa-youtube youtube',
	);

	return $social_links_icons;
}

/**
 * Filters a menu item's starting output.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function mynote_nav_menu_social_icons( $item_output, $item, $depth, $args ) {

	// Get supported social icons.
	$social_icons = mynote_social_links_icons();
	$size_type    = get_theme_mod( 'layout_cols_footer_icon_size' );

	if ( 'md' === $size_type ) {
		$size_css = 'brand-md';
	} elseif ( 'lg' === $size_type ) {
		$size_css = 'brand-lg';
	} elseif ( 'xl' === $size_type ) {
		$size_css = 'brand-xl';
	} else {
		$size_css = 'brand-sm';
	}

	// Replace title with font icon inside social links menu.
	if ( 'social' === $args->theme_location ) {
		$is_icon_found = false;
		foreach ( $social_icons as $attr => $value ) {
			if ( false !== strpos( $item_output, $attr ) ) {
				$is_icon_found = true;
				$item_output = preg_replace( '#' . $args->link_before . '(.+)' . $args->link_after . '#i', '<span class="' . $size_css . '"><i class="' . esc_attr( $value ) . ' brand-link"></i></span>', $item_output );
			}
		}
		if ( !$is_icon_found ) {
			$item_output = preg_replace( '#' . $args->link_before . '(.+)' . $args->link_after . '#i', '<i class="fas fa-link"></i>', $item_output );
		}
	}
	return $item_output;
}


<?php

/**
 * Social icon links.
 *
 * @return string
 */
function mynote_social_icon_links() {

	$urls = array();
	$social_icons = mynote_social_links_icons();

	for ( $i = 1; $i <= 5; $i++ ) {
		$social_link = get_theme_mod( 'social_link_url_' . $i );

		if ( !empty( $links[$i] ) ) {
			$urls[] = $social_link;
		}
	}

	$item_ouput = '<ul class="social-icon-links">';

	foreach ( $social_icons as $domain_name => $icon_code ) {
		foreach ( $urls as $url ) {
			if ( false !== strpos( $url, $domain_name ) ) {
				$item_output .= '<li><a href="' . $url . '" target="_blank"><i class="' . $icon_code . '"></i></a></li>';
			}
		}
	}

	$item_ouput = '</ul>';

	return $item_output;
}

/**
 * Returns an array of supported social links (Fontawesome 5 font icons).
 *
 * @return array
 */
function mynote_social_links_icons() {

	$social_links_icons = array(
		'behance.net'     => 'fab fa-behance',
		'codepen.io'      => 'fab fa-codepen',
		'deviantart.com'  => 'fab fa-deviantart',
		'digg.com'        => 'fab fa-digg',
		'docker.com'      => 'fab fa-docker',
		'dribbble.com'    => 'fab fa-dribbble',
		'dropbox.com'     => 'fab fa-dropbox',
		'facebook.com'    => 'fab fa-facebook-f',
		'flickr.com'      => 'fab fa-flickr',
		'foursquare.com'  => 'fab fa-foursquare',
		'plus.google.com' => 'fab fa-google-plus-g',
		'github.com'      => 'fab fa-github-alt',
		'instagram.com'   => 'fab fa-instagram',
		'linkedin.com'    => 'fab fa-linkedin-in',
		'mailto:'         => 'far fa-envelope',
		'medium.com'      => 'fab fa-medium-m',
		'pinterest.com'   => 'fab fa-pinterest-p',
		'pscp.tv'         => 'fab fa-periscope',
		'getpocket.com'   => 'fab fa-get-pocket',
		'reddit.com'      => 'fab fa-reddit-alien',
		'skype.com'       => 'fab fa-skype',
		'skype:'          => 'fab fa-skype',
		'slideshare.net'  => 'fab fa-slideshare',
		'snapchat.com'    => 'fab fa-snapchat-ghost',
		'soundcloud.com'  => 'fab fa-soundcloud',
		'spotify.com'     => 'fab fa-spotify',
		'stumbleupon.com' => 'fab fa-stumbleupon',
		'tumblr.com'      => 'fab fa-tumblr',
		'twitch.tv'       => 'fab fa-twitch',
		'twitter.com'     => 'fab fa-twitter',
		'vimeo.com'       => 'fab fa-vimeo-v',
		'vine.co'         => 'fab fa-vine',
		'vk.com'          => 'fab fa-vk',
		'wordpress.org'   => 'fab fa-wordpress',
		'wordpress.com'   => 'fab fa-wordpress-simple',
		'yelp.com'        => 'fab fa-yelp',
		'youtube.com'     => 'fab fa-youtube',
	);

	return $social_links_icons;
}
<?php
/**
 * Add shortcode for Author bio textarea, I think we don't need a plugin for displaying
 * Facebook, Twitter, or othor links. Just use shortcode to do this thing.
 *
 * @package   WordPress
 * @author    Terry Lin <terrylinooo>
 * @license   GPLv3 (or later)
 * @link      https://terryl.in
 * @copyright 2018 Terry Lin
 */

$author_bio_icons = array(
	'github'        => '<i class="fab fa-github"></i>',
	'gitlab'        => '<i class="fab fa-gitlab"></i>',
	'stackoverflow' => '<i class="fab fa-stack-overflow"></i>',
	'facebook'      => '<i class="fab fa-facebook"></i>',
	'twitter'       => '<i class="fab fa-twitter"></i>',
	'google'        => '<i class="fab fa-google-plus"></i>',
	'instagram'     => '<i class="fab fa-instagram"></i>',
	'pinterest'     => '<i class="fab fa-pinterest"></i>',
	'youtube'       => '<i class="fab fa-youtube"></i>',
);

/**
 * Get anchor link with icon.
 *
 * @param string $type URL type.
 * @return string
 */
function get_social_url( $type = '' ) {
	global $author_bio_icons;
	return '<a href="' . $link . '" class="brand-link brand-' . $type . '">' . $author_bio_icons[ $type ] . '</a>';
}

/**
 * Short Code - Facebook icon and link.
 *
 * @param array  $atts Just leave it blank.
 * @param string $link Your Facebook Profile or Page URL.
 * @return string
 */
function facebook_sortcode( $atts, $link = '' ) {
	return get_social_url( 'facebook' );
}

add_shortcode( 'facebook', 'facebook_sortcode' );

/**
 * Short Code - Pinterest icon and link.
 *
 * @param array  $atts Just leave it blank.
 * @param string $link Your Facebook Profile or Page URL.
 * @return string
 */
function pinterest_sortcode( $atts, $link = '' ) {
	return get_social_url( 'pinterest' );
}

add_shortcode( 'pinterest', 'pinterest_sortcode' );

/**
 * Short Code - GitHub icon and link.
 *
 * @param array  $atts Just leave it blank.
 * @param string $link Your Facebook Profile or Page URL.
 * @return string
 */
function github_sortcode( $atts, $link = '' ) {
	return get_social_url( 'github' );
}

add_shortcode( 'github', 'github_sortcode' );

/**
 * Short Code - GitLab icon and link.
 *
 * @param array  $atts Just leave it blank.
 * @param string $link Your Facebook Profile or Page URL.
 * @return string
 */
function gitlab_sortcode( $atts, $link = '' ) {
	return get_social_url( 'gitlab' );
}

add_shortcode( 'gitlab', 'gitlab_sortcode' );

/**
 * Short Code - Stack Overflow icon and link.
 *
 * @param array  $atts Just leave it blank.
 * @param string $link Your Facebook Profile or Page URL.
 * @return string
 */
function stackoverflow_sortcode( $atts, $link = '' ) {
	return get_social_url( 'stackoverflow' );
}

add_shortcode( 'stackoverflow', 'stackoverflow_sortcode' );

/**
 * Short Code - Instagram icon and link.
 *
 * @param array  $atts Just leave it blank.
 * @param string $link Your Facebook Profile or Page URL.
 * @return string
 */
function instagram_sortcode( $atts, $link = '' ) {
	return get_social_url( 'instagram' );
}

add_shortcode( 'instagram', 'instagram_sortcode' );

/**
 * Short Code - Twitter icon and link.
 *
 * @param array  $atts Just leave it blank.
 * @param string $link Your Facebook Profile or Page URL.
 * @return string
 */
function twitter_sortcode( $atts, $link = '' ) {
	return get_social_url( 'twitter' );
}

add_shortcode( 'twitter', 'twitter_sortcode' );



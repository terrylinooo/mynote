<?php
/**
 * The header part of Mynote theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.0
 * @version 1.0.7.0
 */

$is_brand_url = false;
$addon_body_class = '';
$site_brand_url = '';

if ( '' !== mynote_site_icon() ) {
	$is_brand_url = true;
	$addon_body_class .= 'has-site-icon';
	$site_brand_url = mynote_site_icon();
}

if ( '' !== mynote_site_logo() ) {
	$is_brand_url = true;
	if ( ! empty( $addon_body_class ) ) {
		$addon_body_class .= ' ';
	}
	$addon_body_class .= 'has-site-logo';
	$site_brand_url = mynote_site_logo();
}

$addon_navbar_class = '';
if ( ! mynote_is_responsive() ) {
	$addon_navbar_class = 'navbar-expand';
}

?><!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<?php if ( mynote_is_responsive() ) : ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php endif; ?>

<?php wp_head(); ?>

</head>
<body <?php body_class( $addon_body_class ); ?>>
	<div class="wrapper">
		<header class="header clear" role="banner">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-dark <?php echo $addon_navbar_class; ?>" role="navigation">
					<?php if ( $is_brand_url ) : ?>
					<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
						<img src="<?php echo esc_url( $site_brand_url ); ?>" alt="<?php esc_attr_e( 'Logo', 'mynote' ); ?>" class="logo-img">
					</a>
					<?php endif; ?>

					<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
						<?php mynote_nav(); ?>
					<?php else : ?>
						<?php mynote_default_nav(); ?>
					<?php endif; ?>

					<div class="search-bar">
						<?php get_search_form() ?>
					</div>
					
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynote-nav-bar" aria-controls="mynote-nav-bar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'mynote' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>
				</nav>
			</div><!-- .container -->
		</header>


		

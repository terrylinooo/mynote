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

$is_site_icon = false;
$addon_body_class = '';

if ( '' !== mynote_site_icon() ) {
	$is_site_icon = true;
	$addon_body_class = 'has-site-icon';
}

?><!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php wp_head(); ?>

</head>
<body <?php body_class( $addon_body_class ); ?>>
	<div class="wrapper">
		<header class="header clear" role="banner">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-dark" role="navigation">
					<?php if ( $is_site_icon ) : ?>
					<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
						<img src="<?php echo mynote_site_icon(); ?>" alt="<?php esc_attr_e( 'Logo', 'mynote' ); ?>" class="logo-img">
					</a>
					<?php endif; ?>

					<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
						<?php mynote_nav(); ?>
					<?php else : ?>
						<?php mynote_default_nav(); ?>
					<?php endif; ?>
				
					<?php get_search_form() ?>
					
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynote-nav-bar" aria-controls="mynote-nav-bar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'mynote' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>
				</nav>
			</div><!-- .container -->
		</header>


		

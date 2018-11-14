<?php
/**
 * The header part of Githuber theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0
 * @version 1.0.0
 */

?><!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<header class="header clear" role="banner">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-dark" role="navigation">
					<?php if ( '' !== githuber_site_icon() ) : ?>
					<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
						<img src="<?php echo githuber_site_icon(); ?>" alt="<?php esc_attr_e( 'Logo', 'githuber' ); ?>" class="logo-img">
					</a>
					<?php else : ?>
						<a href="<?php echo esc_url( home_url() ); ?>" class="home-link"><?php esc_html_e( 'Home', 'githuber' ); ?></a>
					<?php endif; ?>

					<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
						<?php githuber_nav(); ?>
					<?php else : ?>
						<?php githuber_default_nav(); ?>
					<?php endif; ?>
					<div class="search-bar">
						<form id="search-form" class="search" method="get" action="<?php echo esc_url( home_url() ); ?>" role="search" autocomplete="off">
							<input type="text" name="s" class="search-input" placeholder="<?php esc_attr_e( 'To search, type and hit enter.', 'githuber' ); ?>">
							<span class="search-icon" onclick="document.getElementById('search-form').submit();"><i class="fas fa-search"></i></span>
						</form>
					</div><!-- .search-bar -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#githuber-nav-bar" aria-controls="githuber-nav-bar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'githuber' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>
				</nav>
			</div><!-- .container -->
		</header>

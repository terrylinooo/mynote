<?php
/**
 * The header part of Githuber theme.
 *
 * @link https://terryl.in/theme/githuber
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
<link href="//www.google-analytics.com" rel="dns-prefetch">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/favicon.ico" rel="shortcut icon">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php bloginfo( 'description' ); ?>">

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<header class="header clear" role="banner">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-dark" role="navigation">
					<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo_githuber_s.png" alt="Logo" class="logo-img">
					</a>
					<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
						<?php githuber_nav(); ?>
					<?php else : ?>
						<?php default_nav(); ?>
					<?php endif; ?>
					<div class="search-bar">
						<form id="search-form" class="search" method="get" action="<?php echo home_url(); ?>" role="search" autocomplete="off">
							<input type="text" name="s" class="search-input" placeholder="<?php esc_html_e( 'To search, type and hit enter.', 'githuber' ); ?>">
							<span class="search-icon" onclick="document.getElementById('search-form').submit();"><i class="fas fa-search"></i></span>
						</form>
					</div><!-- .search-bar -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#githuber-nav-bar" aria-controls="githuber-nav-bar" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle navigation', 'githuber' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>
				</nav>
			</div><!-- .container -->
		</header>

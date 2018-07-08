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
<body data-spy="scroll" data-target="#toc" <?php body_class(); ?>>
	<div class="wrapper">
		<header class="header clear" role="banner">
			<nav class="navbar navbar-expand-lg navbar-dark" role="navigation">
				<div class="container">
					<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo_tl.png" alt="Logo" class="logo-img">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#githuber-nav-bar" aria-controls="githuber-nav-bar" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="search-bar">
						<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
							<input type="text" name="s" class="search-input" placeholder="<?php _e( 'To search, type and hit enter.', 'githuber' ); ?>">
						</form>
					</div>
					<?php githuber_nav(); ?>
				</div>	
			</nav>
		</header>

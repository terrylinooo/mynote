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
 * @version 2.0.0
 */

?><!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<?php
		/**
		 * Hook: mynote_head
		 */
		do_action( 'mynote_head' );

		wp_head();
	?>

</head>
<body <?php body_class( mynote_body_class() ); ?>>

	<?php wp_body_open(); ?>

	<?php
		/**
		 * Hook: mynote_header_after
		 */
		do_action( 'mynote_site_wrapper_before' );
	?>

	<div class="wrapper">

		<?php
			/**
			 * Hook: mynote_header_after
			 */
			do_action( 'mynote_header_before' );
		?>

		<header class="header clear" role="banner">
			<div class="container">

				<?php
					/**
					 * Hook: mynote_header
					 *
					 * @hooked mynote_header_navigation - 10
					 */
					do_action( 'mynote_header'); 
				?>

			</div><!-- .container -->
		</header>

		<?php
			/**
			 * Hook: mynote_header_after
			 */
			do_action( 'mynote_header_after' );
		?>

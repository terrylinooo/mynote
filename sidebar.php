<?php
/**
 * The sidebar part of Githuber theme.
 *
 * @link https://terryl.in/theme/githuber
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0
 * @version 1.0.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<div id="sidebar" class="sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>

<div id="sidebar-sticky" class="sidebar sticky-top">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</div>



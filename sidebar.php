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

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="sidebar" class="sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>

<nav id="toc" class="sticky-top toc" role="navigation"></nav>


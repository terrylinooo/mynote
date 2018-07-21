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

<div class="navbar sticky-top column-switch">
	<ul class="nav nav-pills">
		<li class="nav-item">
			<a class="btn btn-primary btn-sm active" role="button" data-target="#sidebar">Sidebar</a>
		</li>
		<li class="nav-item">
			<a class="btn btn-primary btn-sm active" role="button" data-target="#toc">Table of Content</a>
		</li>
	</ul>
</div>
<div id="sidebar" class="sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>

<nav id="toc" class="sticky-top toc" role="navigation"></nav>


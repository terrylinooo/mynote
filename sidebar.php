<?php
/**
 * The sidebar part of Githuber theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0.0
 * @version 1.0.7.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
}
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="sidebar" class="sidebar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	<div id="sidebar-sticky" class="sidebar sticky-top">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div>
<?php elseif ( is_single() ) : ?>
	<div id="sidebar-sticky" class="sidebar sticky-top">
		<nav id="toc" class="toc" role="navigation"></nav>
	</div>
<?php endif; ?>

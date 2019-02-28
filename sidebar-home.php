<?php
/**
 * The sidebar part of Mynote theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.2.0
 * @version 1.2.0
 */

if ( ! is_active_sidebar( 'sidebar-6' ) ) {
	return;
}
?>

<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
	<div id="sidebar-home" class="sidebar">
		<?php dynamic_sidebar( 'sidebar-6' ); ?>
	</div>
<?php endif; ?>


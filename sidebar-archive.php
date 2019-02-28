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

if ( ! is_active_sidebar( 'sidebar-7' ) ) {
	return;
}
?>

<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
	<div id="sidebar-archive" class="sidebar">
		<?php dynamic_sidebar( 'sidebar-7' ); ?>
	</div>
<?php endif; ?>


<?php
/**
 * The Pagination section of Mynote theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.0
 * @version 2.0.0
 */

do_action( 'mynote_pagination_before' );

?>

<div class="pagination-container">
	<?php
		/**
		 * Functions hooked in to mynote_pagination action
		 *
		 * @hooked mynote_pagination - 10
		 */
		do_action( 'mynote_pagination' ); 
	?>
</div>

<?php

do_action( 'mynote_pagination_after' );

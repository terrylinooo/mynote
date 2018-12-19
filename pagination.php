<?php
/**
 * The Pagination section of Githuber theme.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0.0
 * @version 1.0.7.0
 */

?>

<div class="pagination-container">
	<?php

	if ( function_exists( 'githuber_pagination' ) ) {
		githuber_pagination();
	} else {
		the_posts_pagination(
			array(
				'prev_text'          => '<i class="fas fa-angle-left"></i> <span class="screen-reader-text">' . __( 'Previous page', 'githuber' ) . '</span>',
				'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'githuber' ) . '</span> <i class="fas fa-angle-right"></i>',
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'githuber' ) . ' </span>',
			)
		);
	}

	?>
</div>

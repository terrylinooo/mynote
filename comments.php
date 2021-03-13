<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.0
 * @version 2.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

/**
 * If the post type is not supprted.
 */
if ( ! post_type_supports( get_post_type(), 'comments' ) ) {
	return;
}

/*
 * If comment is not open, and comment number is 0,
 * I think it is no need to show this section.
 */
if ( ! comments_open() && 0 === (int) get_comments_number() ) {
	return;
}

/**
 * Hook: mynote_post_comment_before
 */
do_action( 'mynote_post_comment_before' );

?>

<div id="comments" class="discussion-wrapper">
	<h3 class="section-title">
		<?php esc_html_e( 'Comments', 'mynote' ); ?>
	</h3>
	<div class="discussion-timeline">

		<?php if ( have_comments() ) : ?>
			<?php wp_list_comments( 'type=comment&callback=mynote_comment' ); ?>
		<?php endif; ?>

		<?php
			the_comments_pagination(
				array(
					'prev_text' => '<i class="fas fa-angle-left"></i> <span class="screen-reader-text">' . __( 'Previous', 'mynote' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'mynote' ) . '</span> <i class="fas fa-angle-right"></i>',
				)
			);
		?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'mynote' ); ?></p>
		<?php endif; ?>

		<?php comment_form(); ?>

	</div>
</div>

<?php

/**
 * Hook: mynote_post_comment_after
 */
do_action( 'mynote_post_comment_after' );

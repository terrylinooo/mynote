<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="discussion-wrapper">

	<div class="discussion-sidebar">

	</div>

	<div class="discussion-timeline">

		<?php if ( have_comments() ) : ?>

			<?php wp_list_comments( 'type=comment&callback=githuber_comment' ); ?>

		<?php endif; ?>

		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'githuber' ); ?></p>

		<?php endif; ?>

		<?php comment_form(); ?>

	</div>

</div>


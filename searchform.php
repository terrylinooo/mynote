<?php
/**
 * Template for displaying search forms in Githuber
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0.0
 * @version 1.0.7
 */

$unique_id = uniqid( 'search-form-' );

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" autocomplete="off">
	<label for="<?php echo esc_attr( $unique_id ); ?>">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'githuber' ); ?></span>
	</label>
	<div class="search-field-wrapper">
		<div class="input-group">
			<input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'githuber' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
			<div class="input-group-prepend">
				<button type="submit" class="search-submit btn btn-primary"><i class="fas fa-search"></i><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'githuber' ); ?></span></button>
			</div>
		</div>
	</div>
</form>


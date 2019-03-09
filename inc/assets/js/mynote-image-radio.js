/**
 * Customize_Image_Radio_Control
 *
 * Use the image instead of origin radio button.
 *
 * @package   WordPress
 * @author    Terry Lin <terrylinooo>
 * @license   GPLv3 (or later)
 * @link      https://terryl.in
 * @copyright 2018 Terry Lin
 */
jQuery( document ).ready( function( $ ) {
    $( '.radio-controls li img' ).click (function () {
        $( '.radio-controls li' ).each( function () {
            $( this ).find( 'img' ).removeClass( 'radio-img-selected' );
        });
        $( this ).addClass( 'radio-img-selected' );
    });
});
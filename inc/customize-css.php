<?php
/**
 * Loading CSS that overwrote the theme defaults by Customizer.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.7
 */

function mynote_customize_css() {
    $css = '';

    if ( get_theme_mod( 'header_textcolor' ) ) {
        $css .= '#header-desc-text { color: ' . get_theme_mod( 'header_textcolor' ) . " !important; }\n";
    }

    if ( get_theme_mod( 'navbar_website_bg_color' ) ) {
        $css .= 'body:not(.home) .header { background-color: ' . get_theme_mod( 'navbar_website_bg_color' ) . " !important; }\n";
    }

    if ( get_theme_mod( 'navbar_website_link_color' ) ) {
        $css .= 'body:not(.home) .header .navbar li > a { color: ' . get_theme_mod( 'navbar_website_link_color' ) . " !important; }\n";
    }

    if ( get_theme_mod( 'navbar_website_link_hover_color' ) ) {
        $css .= 'body:not(.home) .header .navbar li > a:hover { color: ' . get_theme_mod( 'navbar_website_link_hover_color' ) . " !important; }\n";
    }

    if ( get_theme_mod( 'navbar_is_display_search_bar' ) && 'no' === get_theme_mod( 'navbar_is_display_search_bar' ) ) {
        $css .= '.header .search-bar { display: none !important; }' . "\n";
    }

    if ( get_theme_mod( 'navbar_homepage_bg_color' ) ) {
        $css .= 'body.home .header { background-color: ' . get_theme_mod( 'navbar_homepage_bg_color' ) . " !important; }\n";
    }

    if ( get_theme_mod( 'navbar_homepage_link_color' ) ) {
        $css .= 'body.home .header .navbar li > a { color: ' . get_theme_mod( 'navbar_homepage_link_color' ) . " !important; }\n";
    }

    if ( get_theme_mod( 'navbar_homepage_link_hover_color' ) ) {
        $css .= 'body.home .header .navbar li > a:hover { color: ' . get_theme_mod( 'navbar_homepage_link_hover_color' ) . " !important; }\n";
    }

    if ( get_theme_mod( 'navbar_is_display_search_bar' ) && 'no' === get_theme_mod( 'navbar_is_display_search_bar' ) ) {
        $css .= 'body.home .header .search-bar { display: none !important; }' . "\n";
    }

    if ( get_theme_mod( 'navbar_searchbar_placeholder_color' ) ) {
        $css .= '.header .search-bar input::-webkit-input-placeholder { color: ' . get_theme_mod( 'navbar_searchbar_placeholder_color' ) . ' !important; }' . "\n";
        $css .= '.header .search-bar input::placeholder { color: ' . get_theme_mod( 'navbar_searchbar_placeholder_color' )               . ' !important; }' . "\n";
        $css .= '.header .search-bar input:-ms-input-placeholder { color: ' . get_theme_mod( 'navbar_searchbar_placeholder_color' )      . ' !important; }' . "\n";
        $css .= '.header .search-bar input::-ms-input-placeholder { color: ' . get_theme_mod( 'navbar_searchbar_placeholder_color' )     . ' !important; }' . "\n";
    }

    // Apply the custon color pattern to the progress bar.
    $progress_preferred_color = get_theme_mod( 'progressbar_preferred_color' );

    if ( 'menu' === $progress_preferred_color ) {
        $css .= '.single-post-title-bar { background-color: ' . get_theme_mod( 'navbar_website_bg_color' ) . ' !important; }' . "\n";
        $css .= '#progress-title { color: ' . get_theme_mod( 'navbar_website_link_color' ) . ' !important; }' . "\n";
    } elseif ( 'custom' === $progress_preferred_color ) {
        $css .= '.single-post-title-bar { background-color: ' . get_theme_mod( 'progressbar_custom_bg_color' ) . ' !important; }' . "\n";
        $css .= '#progress-title { color: ' . get_theme_mod( 'progressbar_custom_text_color' ) . ' !important; }' . "\n";
        $css .= '.progress-wrapper progress::-webkit-progress-value { background-color: ' . get_theme_mod( 'progressbar_custom_border_color' )     . ' !important; }' . "\n";
        $css .= '.progress-wrapper progress::-ms-fill { background-color: ' . get_theme_mod( 'progressbar_custom_border_color' )     . ' !important; }' . "\n";
    }

    if ( 'no' === get_theme_mod( 'progressbar_is_display_bar' ) ) {
        $css .= '.single-post-title-bar { display: none !important; }' . "\n";
    }

    if ( 'no' === get_theme_mod( 'progressbar_is_display_percentage' ) ) {
        $css .= '.progress-wrapper .progress-label { display: none !important; }' . "\n";
    }

    if ( ! empty( $css ) ) {
        echo '<style id="mynote-customizer">' . "\n" . $css . "\n" . '</style>';
    }
}

add_action( 'wp_head', 'mynote_customize_css' );
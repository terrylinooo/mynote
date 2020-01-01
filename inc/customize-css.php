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

    $settings = array(
        'header_textcolor',
        'navbar_website_bg_color',
        'navbar_website_link_color',
        'navbar_website_link_hover_color',
        'navbar_is_display_search_bar',
        'navbar_searchbar_placeholder_color',
        'navbar_searchbar_bg_color',
        'navbar_searchbar_input_text_color',
        'navbar_searchbar_size',
        'navbar_searchbar_text_color',
        'navbar_homepage_bg_color',
        'navbar_homepage_link_color',
        'navbar_homepage_link_hover_color',
        'navbar_homepage_link_hover_color',
        'navbar_website_menu_toggler_bg_color',
        'navbar_website_menu_toggler_border_color',
        'navbar_homepage_menu_toggler_bg_color',
        'navbar_homepage_menu_toggler_border_color',
        'progressbar_preferred_color',
        'navbar_website_bg_color',
        'navbar_website_link_color',
        'progressbar_custom_bg_color',
        'progressbar_custom_text_color',
        'progressbar_custom_border_color',
        'progressbar_is_display_bar',
        'progressbar_is_display_percentage',
        'layout_post_sidebar_location_home',
        'layout_post_sidebar_location_archive',
        'layout_post_sidebar_location_post',
        'layout_cols_footer_location',
        'is_scroll_down_button',
        'is_responsive_website',
        'post_card_show_border',
    );

    foreach ( $settings as $setting_name ) {
        $v[ $setting_name ] = get_theme_mod( $setting_name );
    }

    if ( ! empty( $v['header_textcolor'] ) ) {
        $css .= '#header-desc-text { color: ' . esc_attr( $v['header_textcolor'] ) . " !important; }\n";
    }

    if ( ! empty( $v['navbar_website_bg_color'] ) ) {
        $css .= 'body:not(.home) .header { background-color: ' . esc_attr( $v['navbar_website_bg_color'] ) . " !important; }\n";
    }

    if ( ! empty( $v['navbar_website_link_color'] ) ) {
        $css .= 'body:not(.home) .header .navbar li > a { color: ' . esc_attr( $v['navbar_website_link_color'] ) . " !important; }\n";
    }

    if ( ! empty( $v['navbar_website_link_hover_color'] ) ) {
        $css .= 'body:not(.home) .header .navbar li > a:hover { color: ' . esc_attr( $v['navbar_website_link_hover_color'] ) . " !important; }\n";
    }

    /* BEGIN - Search bar */

    if ( ! mynote_toggle_check( $v['navbar_is_display_search_bar'] ) ) {
        $css .= ".header .search-bar { display: none !important; }\n";
        $css .= "body.home .header .search-bar { display: none !important; }\n";

    } else {

        if ( ! empty( $v['navbar_searchbar_placeholder_color'] ) ) {
            $css .= '.header .search-bar .search-input::-webkit-input-placeholder { color: ' . esc_attr( $v['navbar_searchbar_placeholder_color'] ) . " !important; }\n";
            $css .= '.header .search-bar .search-input::-moz-placeholder { color: ' . esc_attr( $v['navbar_searchbar_placeholder_color'] ) . " !important; }\n";
            $css .= '.header .search-bar .search-input:-ms-input-placeholder { color: ' . esc_attr( $v['navbar_searchbar_placeholder_color'] ) . " !important; }\n";
            $css .= '.header .search-bar .search-input:-moz-placeholder { color: ' . esc_attr( $v['navbar_searchbar_placeholder_color'] ) . " !important; }\n";
        }
    
        if ( ! empty( $v['navbar_searchbar_input_text_color'] ) ) {
            $css .= '.header .search-bar .search-input { color: ' . esc_attr( $v['navbar_searchbar_input_text_color'] ) . " !important; }\n";
            $css .= '.header .search-bar .search-icon { color: ' . esc_attr( $v['navbar_searchbar_input_text_color'] ) . " !important; }\n";
        }
    
        if ( ! empty( $v['navbar_searchbar_bg_color'] ) ) {
            $css .= '.header .search-bar { background-color: ' . esc_attr( $v['navbar_searchbar_bg_color'] ) . " !important; }\n";
        }

        if ( 'big' === $v['navbar_searchbar_size'] ) {
            $css .= '.header .search-bar { min-height: 40px !important; }' . "\n";
            $css .= '.header .search-bar .search-input { min-height: 40px !important; font-size: 15px !important; }' . "\n";
            $css .= '.header .search-bar .search-icon { min-height: 34px !important; line-height: 34px !important; font-size: 15px !important; }' . "\n";
            $css .= '@media (max-width: 991.98px) { .header .search-bar { top: 10px !important; } }' . "\n";
        }
    }

    /* END - Search bar */

    if ( ! empty( $v['navbar_homepage_bg_color'] ) ) {
        $css .= 'body.home .header { background-color: ' . esc_attr( $v['navbar_homepage_bg_color'] ) . " !important; }\n";
    }

    if ( ! empty( $v['navbar_homepage_link_color'] ) ) {
        $css .= 'body.home .header .navbar li > a { color: ' . esc_attr( $v['navbar_homepage_link_color'] ) . " !important; }\n";
    }

    if ( ! empty( $v['navbar_homepage_link_hover_color'] ) ) {
        $css .= 'body.home .header .navbar li > a:hover { color: ' . esc_attr( $v['navbar_homepage_link_hover_color'] ) . " !important; }\n";
    }

    if ( ! empty( $v['navbar_homepage_link_hover_color'] ) ) {
        $css .= '.header .search-bar input::-webkit-input-placeholder { color: ' . esc_attr( $v['navbar_homepage_link_hover_color'] ) . " !important; }\n";
        $css .= '.header .search-bar input::placeholder { color: ' . esc_attr( $v['navbar_homepage_link_hover_color'] ) . " !important; }\n";
        $css .= '.header .search-bar input:-ms-input-placeholder { color: ' . esc_attr( $v['navbar_homepage_link_hover_color'] ) . " !important; }\n";
        $css .= '.header .search-bar input::-ms-input-placeholder { color: ' . esc_attr( $v['navbar_homepage_link_hover_color'] ) . " !important; }\n";
    }

    // Apply the custon color pattern to the progress bar.
    if ( 'menu' === $v['progressbar_preferred_color'] ) {
        $css .= '.single-post-title-bar { background-color: ' . esc_attr( $v['navbar_website_bg_color'] ) . " !important; }\n";
        $css .= '#progress-title { color: ' . esc_attr( $v['navbar_website_link_color'] ) . " !important; }\n";
        $css .= 'a.go-top { background-color: ' . esc_attr( $v['navbar_website_bg_color'] ) . " !important; }\n";
        $css .= 'a.go-top i { color: ' . esc_attr( $v['navbar_website_link_color'] ) . " !important; }\n";
    } elseif ( 'custom' === $v['progressbar_preferred_color'] ) {
        $css .= '.single-post-title-bar { background-color: ' . esc_attr( $v['progressbar_custom_bg_color'] ) . " !important; }\n";
        $css .= '#progress-title { color: ' . esc_attr( $v['progressbar_custom_text_color'] ) . " !important; }\n";
        $css .= '.progress-wrapper progress::-webkit-progress-value { background-color: ' . esc_attr( $v['progressbar_custom_border_color'] ) . " !important; }\n";
        $css .= '.progress-wrapper progress::-ms-fill { background-color: ' . esc_attr( $v['progressbar_custom_border_color'] ) . " !important; }\n";
        $css .= '.progress-wrapper progress::-moz-progress-bar { background-color: ' . esc_attr( $v['progressbar_custom_border_color'] ) . " !important; }\n";
        $css .= 'a.go-top { background-color: ' . esc_attr( $v['progressbar_custom_bg_color'] ) . " !important; }\n";
        $css .= 'a.go-top i { color: ' . esc_attr( $v['progressbar_custom_text_color'] ) . " !important; }\n";
    }


    if ( ! mynote_toggle_check( $v['progressbar_is_display_bar'] ) ) {
        $css .= ".single-post-title-bar { display: none !important; }\n";
    }

    if ( ! mynote_toggle_check( $v['progressbar_is_display_percentage'] ) ) {
        $css .= ".progress-wrapper .progress-label { display: none !important; }\n";
    }

    if ( 'left' === $v['layout_post_sidebar_location_home'] ) {
        $css .= ".row-layout-choice-home { flex-direction: row-reverse !important; }\n";
    }

    if ( 'left' === $v['layout_post_sidebar_location_archive'] ) {
        $css .= ".row-layout-choice-archive { flex-direction: row-reverse !important; }\n";
    }

    if ( 'left' ===  $v['layout_post_sidebar_location_post'] ) {
        $css .= ".row-layout-choice-post { flex-direction: row-reverse !important; }\n";
    }

    /* BEGIN - Footer elements locations don't apply to width < 768px */

    if ( '2' ===  $v['layout_cols_footer_location'] ) {
        $css .= ".footer-columns { flex-direction: row-reverse !important; }\n";
        $css .= ".footer-columns .footer-column-left { text-align: right !important; }\n";
    }

    if ( '3' ===  $v['layout_cols_footer_location'] ) {
        $css .= ".footer-columns .footer-column-left { display: flex !important; flex-direction: column-reverse !important; }\n";
    }

    if ( '4' ===  $v['layout_cols_footer_location'] ) {
        $css .= ".footer-columns { flex-direction: row-reverse !important; }\n";
        $css .= ".footer-columns .footer-column-left { text-align: right !important; display: flex !important; flex-direction: column-reverse !important; }\n";
    }

    if ( '5' ===  $v['layout_cols_footer_location'] ) {
        $css .= ".footer-columns { display: block !important; text-align: center !important; }\n";
        $css .= ".footer-columns .footer-column-left { display: flex !important; flex-direction: column-reverse !important; }\n";
    }

    if ( '6' ===  $v['layout_cols_footer_location'] ) {
        $css .= ".footer-columns { display: flex !important; text-align: center !important; flex-direction: column-reverse !important; }\n";
        $css .= ".footer-columns .footer-column-left { display: flex !important; flex-direction: column !important; }\n";
    }

    if ( '7' ===  $v['layout_cols_footer_location'] ) {
        $css .= ".footer-columns { display: flex !important; text-align: center !important; flex-direction: column-reverse !important; }\n";
        $css .= ".footer-columns .footer-column-left { display: flex !important; flex-direction: column-reverse !important; }\n";
    }

    $css .= "@media (max-width: 768px) {\n";
    $css .= ".footer-columns { text-align: center !important; }\n";
    $css .= ".footer-columns .footer-column-left { text-align: center !important; }\n";
    $css .= "}\n";

    /* END - Footer elements locations don't apply to width < 768px */

    if ( mynote_toggle_check( $v['is_scroll_down_button'] ) ) {
        $css .= ".scroll-area { display: block !important; }\n";
    }

    if ( ! mynote_toggle_check( $v['is_responsive_website'] ) ) {
        $css .= ".navbar-expand .navbar-collapse { margin: 0 !important; }\n";
    }

    if ( ! mynote_toggle_check( $v['post_card_show_border'] ) ) {
        $css .= ".container .card { border: 0px !important; }\n";
        $css .= ".container .card-footer { border: 0 !important; background: none !important; padding-top: 0 !important; }\n";
    }

    /* BEGIN - Adjusting menu toggler color. */

    if ( ! empty( $v['navbar_homepage_menu_toggler_bg_color'] ) ) {
        // Button background color.
        $css .= "body.home .navbar-dark .navbar-toggler { background-color: " . $v['navbar_homepage_menu_toggler_bg_color']. "; }";
    }

    if ( ! empty( $v['navbar_website_menu_toggler_bg_color'] ) ) {
        // Button background color.
        $css .= "body:not(.home) .navbar-dark .navbar-toggler { background-color: " . $v['navbar_website_menu_toggler_bg_color']. "; }";
    }

    if ( ! empty( $v['navbar_homepage_menu_toggler_border_color'] ) ) {
        // Toggler bar.
        $css .= "body.home .navbar-dark .navbar-toggler-icon { background-image:url(\"data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='" . $v['navbar_homepage_menu_toggler_border_color'] . "' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E\") }";
        // Button border.
        $css .= "body.home .navbar-dark .navbar-toggler { color: " . $v['navbar_homepage_menu_toggler_border_color']. "; border-color: " . $v['navbar_homepage_menu_toggler_border_color'] . "; }";
    }

    if ( ! empty( $v['navbar_website_menu_toggler_border_color'] ) ) {
        // Toggler bar.
        $css .= "body:not(.home) .navbar-dark .navbar-toggler-icon { background-image:url(\"data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='" . $v['navbar_homepage_menu_toggler_border_color'] . "' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E\") }";
        // Button border.
        $css .= "body:not(.home) .navbar-dark .navbar-toggler { color: " . $v['navbar_website_menu_toggler_border_color']. "; border-color: " . $v['navbar_website_menu_toggler_border_color'] . "; }";
    }

    /* END - Adjusting menu toggler color. */

    if ( ! empty( $css ) ) {
        //$css .= "body.menu-is-collapsed .header { background: rgba(20, 25, 29, 1) !important; }\n";
    }

    echo '<style id="mynote-customizer">' . "\n" . $css . "\n" . '</style>';
}

add_action( 'wp_head', 'mynote_customize_css' );


/**
 * Check Customizer settings controlled by toggle.
 *
 * @param string $var
 * @return bool
 */
function mynote_toggle_check( $var ) {
	if ( ! isset( $var ) || '' === $var || '0' === $var || 'no' === $var ) {
		return false;
	}
	if ( ( false === $var || true === $var ) || '1' === $var || 'yes' === $var ) {
		return true;
	}
	return false;
}
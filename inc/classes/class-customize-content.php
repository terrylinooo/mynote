<?php
/**
 * Customize_Content_Control
 *
 * Use the image instead of origin radio button.
 *
 * @package   WordPress
 * @author    Terry Lin <terrylinooo>
 * @license   GPLv3 (or later)
 * @link      https://terryl.in
 * @copyright 2018 Terry Lin
 */

class Customize_Content_Control extends WP_Customize_Control {

	/**
	 * Define control type.
	 */
    public $type = 'content';

	/**
	 * Render the control.
	 */
    public function render_content() {

        if ( isset( $this->label ) && '' !== $this->label ) {
            echo '<span class="customize-control-title">' . $this->label . '</span>';
        }

        if ( isset( $this->input_attrs['content'] ) ) {
            echo $this->input_attrs['content'];
        }

        if ( isset( $this->description ) ) {
            echo '<span class="description customize-control-description">' . $this->description . '</span>';
        }
    }
}


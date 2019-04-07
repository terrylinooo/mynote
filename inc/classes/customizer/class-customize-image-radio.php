<?php
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

class Customize_Image_Radio_Control extends WP_Customize_Control {

	/**
	 * Define control type.
	 */
    public $type = 'image-radio';

	/**
	 * Enqueue scripts and styles.
	 */
	public function enqueue() {
		wp_enqueue_script( $this->type, get_template_directory_uri() . '/inc/assets/js/mynote-image-radio.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_style( $this->type, get_template_directory_uri() . '/inc/assets/css/mynote-image-radio.css', array(), '1.0.0' );
	}

	/**
	 * Render the control.
	 */
    public function render_content() {

        if ( empty($this->choices) ) {
            return;
        }
            
        $name = 'customize-radio-' . $this->id;

        if ( isset( $this->label ) && '' !== $this->label ) {
            echo '<span class="customize-control-title">' . sanitize_text_field( $this->label ) . '</span>';
        }

        if ( isset( $this->description ) && '' !== $this->description ) {
            echo '<span class="description customize-control-description">' . sanitize_text_field( $this->description ) . '</span>';
        }

        ?>

        <ul class="radio-controls">
            <?php
            foreach ($this->choices as $value => $label) {
                $class = ( $this->value() == $value ) ? 'radio-img-selected radio-img' : 'radio-img'; ?>
                <li>
                    <label>
                        <input style="display:none" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" 
                        <?php checked( $this->value(), $value ); ?> 
                        <?php $this->link(); ?> />
                        <img src="<?php echo esc_url( $label ); ?>" class="<?php echo esc_attr( $class ); ?>" />
                    </label>
                </li><?php
            } ?>
        </ul>
        <?php
    }
}
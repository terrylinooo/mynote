<?php
/**
 * Customize_Toggle_Control
 *
 * Use the CSS toggle button inteaf of checkbox.
 *
 * @package   WordPress
 * @author    Terry Lin <terrylinooo>
 * @license   GPLv3 (or later)
 * @link      https://terryl.in
 * @copyright 2018 Terry Lin
 */

class Customize_Toggle_Control extends WP_Customize_Control {

	/**
	 * Define control type.
	 */
	public $type = 'checkbox-toggle';

	/**
	 * Enqueue scripts and styles.
	 */
	public function enqueue() {
		wp_enqueue_style( $this->type, get_template_directory_uri() . '/inc/assets/css/mynote-toggle.css', array(), '1.0.0' );
	}

	/**
	 * Render the control's content.
	 */
	public function render_content() {
		?>
		
		<div class="toggle-controls">
			<span class="customize-control-title" style="flex: 2 0 0; vertical-align: middle;">
				<?php echo esc_html( $this->label ); ?>
			</span>
			<input id="mn-<?php echo $this->instance_number; ?>" type="checkbox" class="mn-toggle mn-toggle-blue" value="<?php echo esc_attr( $this->value() ); ?>" 
			<?php checked( $this->value() ); ?> 
            <?php $this->link(); ?> />
			<label for="mn-<?php echo $this->instance_number; ?>" class="mn-toggle-btn"></label>
		</div>

		<?php

		if ( isset( $this->description ) ) {
			echo '<span class="description customize-control-description">' . $this->description . '</span>';
		}
	}
}
<?php
/**
 * Load the range slider control functions.
 *
 * @since      1.0.0
 *
 * @package    Customizer_Range_Slider_Control
 */

/**
 * Output the range slider control.
 *
 * @since    1.0.0
 */
function range_slider_control_class() {

	/**
     * 
     * Make sure WP_Customize_Control is available before extending it.
     * 
     */
	if (class_exists('WP_Customize_Control')) {

		/**
         * 
         * The range slider control class.
         * 
         */
		class Range_Slider_Custom_Control extends WP_Customize_Control{

			/**
	         * 
	         * Declare the control type.
	         * 
	         */
			public $type = 'range_slider';

			/**
	         * 
	         * Render the range slider control content.
	         * 
	         */
			public function render_content() {

				?>

				<label class="customize_range_slider">

					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

					<p><?php echo wp_kses_post($this->description); ?></p>

					<div class="customize-control-notifications"></div>

					<div class="range-slider">

						<input id="<?php echo esc_attr($this->id); ?>" class="range-slider-range" type="range" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($this->value()); ?>" <?php $this->input_attrs(); ?> data-customize-setting-link="<?php echo esc_attr($this->id); ?>">

						<span class="range-slider-value">0</span>

					</div>

				</label>

				<?php

			}

		}

	}

}

/**
 * Validate input from range slider control
 *
 * @since    1.0.0
 */
function customizer_number_range_sanitize( $number, $setting ) {
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// Get array of numbers allowed by the number range and step
	$step_range = range( $min, $max, $step);

	// Check if decimal and validate else validate whole number
	if( preg_match( '/^\d+\.\d+$/', $number ) ) {

		$output = filter_var(
		    $number, 
		    FILTER_VALIDATE_FLOAT, 
		    array(
		        'options' => array(
		            'min_range' => $min, 
		            'max_range' => $max
		        )
		    )
		);

	} else {

		$output = filter_var(
		    $number, 
		    FILTER_VALIDATE_INT, 
		    array(
		        'options' => array(
		            'min_range' => $min, 
		            'max_range' => $max
		        )
		    )
		);

	}
	
	// Make sure output is number and is part of the defined steps and return result
	return ( is_numeric( $output ) && in_array( $output, $step_range ) ? $output : '' );

}

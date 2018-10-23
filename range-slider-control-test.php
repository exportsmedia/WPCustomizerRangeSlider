<?php
/**
 * Test the range slider control
 *
 * @since      1.0.0
 *
 * @package    Customizer_Range_Slider_Control
 */
function customizer_controls_test() {

	global $wp_customize;

	$wp_customize->add_section(
		'range_slider_test',
		array(
			'title'     	=> 'Range Slider Test',
			'priority'  	=> 10,
			'description'	=> "A test area for the range slider.",
		)
	);

	/**
	 * Range Slider Example
	 */
	if( class_exists('Range_Slider_Custom_Control') ) {
		$wp_customize->add_setting(
			'range_slider_test',
			array(
				'default'            => 3,
				'sanitize_callback'  => 'intval',
				'transport'			 => 'refresh'
			)
		);

		$wp_customize->add_control( 
			new Range_Slider_Custom_Control( 
			$wp_customize, 
			'range_slider_test', 
			array(
				'label'      => 'Range Slider Test.',
				'description'=> "Choose a number.",
				'type'     	 => 'range_slider',
				'section'    => 'range_slider_test',
				'settings'   => 'range_slider_test',
				'input_attrs' => array(
				    'min' => 3,
				    'max' => 24,
				    'step' => 3,
				  ),
			) ) 
		);
	}

}

add_action( 'customize_register', 'customizer_controls_test' );


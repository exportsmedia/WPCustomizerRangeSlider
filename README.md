# WP Customizer Range Slider

## Description

This WordPress plugin creates a new control type for the [WordPress Theme Customizer](http://codex.wordpress.org/Theme_Customization_API). It will allow you to easily create a custom range slider control.

## Usage

1. Include & activate the plugin
2. Register a new range slider control:

	``` php
	if( class_exists('Range_Slider_Custom_Control') ) {
		$wp_customize->add_setting(
			'range_slider_test',
			array(
				'default'           => 3,
				'sanitize_callback' => 'absint',
				'transport'	        => 'postMessage'
			)
		);

		$wp_customize->add_control( 
			new Range_Slider_Custom_Control( 
			$wp_customize, 
			'range_slider_test', 
			array(
				'label'      	=> 'Range Slider Test.',
				'description'	=> "Choose a number.",
				'type'       	=> 'range_slider',
				'section'    	=> 'range_slider_test',
				'settings'   	=> 'range_slider_test',
				'input_attrs' 	=> array(
				    'min' 	=> 3,
				    'max' 	=> 24,
				    'step' 	=> 3,
				  ),
			) ) 
		);
	}
	``` 
	* **label** - the label for the control.
	* **description** - the instructions for using your control.
	* **type** - must be: range_slider
	* **section** - the name of the section you are attaching your control to.
	* **settings** - the name of your control.
	* **input_attrs** - these are used to define the attributes of the input.
	* **min** - the minimum number allowed.
	* **max** - the maximum number allowed.
	* **step** - the amount to increase between each chosen number. For example, if your minimum was 3 and maximum was 9, with a step of 3, the allowed numbers in the slider would be 3, 6, and 9. Decimal steps are allowed, such as using a .5 step. Make sure your minimum and maximum numbers can be divided evenly by your step or your numbers will not be correct.

	Learn more about range sliders at [MDN Web Docs](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/range)

3. The range slider control saves the value as a number. 
4. Call the value using your setting name and either get_them_mod or get_option, based on what you defined.

## Results

<img src="https://exportsmedia-media.s3-us-west-2.amazonaws.com/range-slider-example.gif" height="300" width="500" alt="screenshot">

## Version

**1.0.0**

* Initial release

<?php
/**
 *
 * @link              https://exportsmedia.com
 * @since             1.0.0
 * @package           Customizer_Range_Slider_Control
 *
 * @wordpress-plugin
 * Plugin Name:       Customizer Range Slider Control
 * Description:       A WordPress plugin that allows you to use a custom range slider control in the Theme Customizer.
 * Version:           1.0.0
 * Author:            Michael Markoski
 * Author URI:        https://exportsmedia.com/
 * License:           GPLv2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       customizer-range-slider
 *
 * @wordpress-info
 * Contributors: exportsmedia
 * Donate link: https://exportsmedia.com/buy-me-a-chocolate-milk/
 * Requires at least: 4.9
 * Tested up to: 4.9.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * The core plugin class.
 *
 * @since      1.0.0
 * @package    Customizer_Range_Slider_Control
 */
class CustomizerRangeSliderControl {

    /**
     * 
     * Initialize the class and load control dependencies.
     *
     */
    public function __construct() {

        /**
         * 
         * Include the control class file.
         * 
         */
        include( plugin_dir_path( __FILE__ ) . 'range-slider-control.php' );

        /**
         * 
         * Include this file to see an example range slider control in the customizer.
         * 
         */
        include( plugin_dir_path( __FILE__ ) . 'range-slider-control-test.php' );

        /**
         * 
         * Hook into the customize register action using priority 5 to load before the controls.
         * 
         */
        add_action( 'customize_register', 'range_slider_control_class', 5 );

        /**
         * 
         * Hook into the customizer enqueue action.
         * 
         */
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue' ) );

    }

    /**
     * Register the scripts and stylesheets for the control.
     *
     * @since    1.0.0
     */
    public function enqueue() {

    	wp_enqueue_script( 'range-slider-js', plugins_url( 'scripts.js', __FILE__ ), array( 'jquery' ), '1.0', true );
    	wp_enqueue_style( 'range-slider-css', plugins_url( 'styles.css', __FILE__ ), null, '1.0' );

    }

}

/**
 * 
 * Initiate the plugin.
 *
 */
$CustomizerRangeSliderControl = new CustomizerRangeSliderControl();
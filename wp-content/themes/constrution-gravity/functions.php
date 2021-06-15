<?php
/**
 * Theme functions and definitions
 *
 * @package constrution_gravity
 */

if ( ! function_exists( 'constrution_gravity_enqueue_styles' ) ) :
	/**
	 * @since Constrution Gravity 1.0.0
	 */
	function constrution_gravity_enqueue_styles() {
		wp_enqueue_style( 'constrution-gravity-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'constrution-gravity-style', get_stylesheet_directory_uri() . '/style.css', array( 'constrution-gravity-style-parent' ), '1.0.0' );
		wp_enqueue_style( 'constrution-gravity-google-fonts', '//fonts.googleapis.com/css?family=Montserrat:300,400,400i,500,600,700', false );
	}
endif;
add_action( 'wp_enqueue_scripts', 'constrution_gravity_enqueue_styles', 99 );


function constrution_gravity_customizer_fields( $fileds ) {
	unset( $fileds['footer_layout'] );
	return $fileds;
}

add_filter( 'Businessgravity_Customizer_fields', 'constrution_gravity_customizer_fields', 11 );
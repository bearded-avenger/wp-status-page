<?php
/**
 	* Creates a section of options in theme customizer
 	*
 	* @since    1.0
*/
class wpStatusPageOptions {


	public static function register($wp_customize){

		$wp_customize->add_section( 'wp_status_page', array(
			'title' 		=> __( 'Status Page', 'wp-status-page' ),
			'description'	=> __('Option Descroption', 'wp-status-page')
		) );

		// Enable Google Analytics
		$wp_customize->add_setting( 'some_opt', array(
			'default' 		=> '',
			'type' 			=> 'option',
			'sanitize_callback' => self::sanitize_text_field()
		) );
		$wp_customize->add_control( 'some_opt', array(
			'label' 		=> __('Some Option','wp-status-page'),
			'section' 		=> 'wp_status_page',
			'settings' 		=> 'some_opt',
			'type' 			=> 'text'
		) );
	}

	private static function sanitize_text_field( $input = ''  ) {
		return sanitize_text_field( $input );
	}

}
// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'wpStatusPageOptions' , 'register' ) );

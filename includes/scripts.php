<?php

class wpStatusPageScriptLoader {

	function __construct(){
		add_action( 'wp_enqueue_scripts', array($this,'scripts'));
	}

	function scripts() {

		$is_status_page = wsp_get_meta( get_the_ID(), '_wsp_active' );

	    if ( $is_status_page ) {

			wp_enqueue_style( 'wsp-style', WPSTATUSPAGE_URL.'/public/assets/css/wp-status-page.css', WPSTATUSPAGE_VERSION, true);
		}

	}
}
new wpStatusPageScriptLoader();

<?php

class wpStatusPageTemplater {

	function __construct(){
		add_filter( 'template_include', array($this,'template_loader'));
	}

	function template_loader($template) {


		$is_status_page = wsp_get_meta( get_the_ID(), '_wsp_active' );

	    // override single
	    if ( $is_status_page ):

	    	if ( $overridden_template = locate_template( 'status-page-template.php', true ) ) {

			   $template = load_template( $overridden_template );

			} else {

			    $template = WPSTATUSPAGE_DIR.'templates/status-page-template.php';
			}

	    endif;

	    return $template;


	}
}
new wpStatusPageTemplater();

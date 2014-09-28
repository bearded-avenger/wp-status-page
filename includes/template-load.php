<?php

class wpStatusPageTemplater {

	function __construct(){
		add_filter( 'template_include', array($this,'template_loader'));
	}

	function template_loader($template) {


	   	if ( 'status_page' == get_post_type() ):

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

<?php

class wpStatusPageMeta {

	function __construct(){
		add_filter('cmb_meta_boxes', array($this,'meta' ));
	}

	/**
	 	* Adds custom meta
	 	*
	 	* @since    1.0.0
	*/
	function meta( array $meta_boxes ) {

		$meta_boxes[] = array(
			'title' 			=> __('Status Page', 'wp-status-page'),
			'pages' 			=> array('page'),
			'context'    		=> 'side',
			'fields' 			=> array(
				array(
					'id' 		=> '_wsp_active',
					'name' 		=> __('Make this page a Status Page', 'wp-status-page'),
					'type' 		=> 'checkbox',
				)
			)
		);

		return $meta_boxes;

	}

}
new wpStatusPageMeta();

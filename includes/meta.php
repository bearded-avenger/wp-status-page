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

		$post_id 		= isset( $_GET['post'] ) ? $_GET['post'] : null;
		$is_status_page = get_post_meta( $post_id, '_wsp_active', true );

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

		if ( $is_status_page ):

			$meta_boxes[] = array(
				'title' 	=> __('Status Page Options', 'wp-status-page'),
				'pages' 	=> array('page'),
				'fields' 	=> array(
					array(
						'id'             => '_wsp_options',
						'name'           => __('Status Page Options', 'wp-status-page'),
						'type'           => 'text',
						'desc'			=> __('Description here','wp-status-page')
					)
				)
			);

		endif;

		return $meta_boxes;

	}

}
new wpStatusPageMeta();

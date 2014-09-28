<?php

class wpStatusPageMeta {

	function __construct(){
		add_filter('cmb_meta_boxes', array($this,'meta' ));
		add_action( 'admin_menu', array($this,'remove_meta' ));
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
			'priority'			=> 'high',
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

	function remove_meta(){

		$post_id 		= isset( $_GET['post'] ) ? $_GET['post'] : null;
		$is_status_page = get_post_meta( $post_id, '_wsp_active', true );

		if ( $is_status_page ):
 			remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' ); //removes comments status
 			remove_meta_box( 'commentsdiv' , 'page' , 'normal' ); //removes comments
 			remove_meta_box( 'authordiv' , 'page' , 'normal' ); //removes author 
		endif;
	}

}
new wpStatusPageMeta();

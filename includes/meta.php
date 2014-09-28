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
				'title' 				=> __('Status Items', 'wp-status-page'),
				'pages' 				=> array('page'),
				'type' 					=> 'group',
				'repeatable'     		=> true,
				'repeatable_max' 		=> 50,
				'sortable'				=> true,
				'fields' 				=> array(
					array(
						'id'			=> '_wsp_watch_items',
						'name'			=> __('Status Group', 'wp-status-page'),
						'type' 			=> 'group',
						'fields'		=> array(
							array(
								'id'		=> 'item',
								'name'		=> 'Status Item',
								'type'		=> 'text',
								'cols'		=> 6
							),
							array(
								'id'			=> 'status',
								'name'			=> __('Status of Item', 'wp-status-page'),
								'type' 			=> 'select',
								'default'		=> 'operational',
								'cols'			=> 6,
								'options' 		=> array(
							        'operational' 	=>__('Operational','wp-status-page'),
							        'issues' 		=> __('Performance Issues','wp-status-page'),
							        'disruption' 	=> __('Service Disruption','wp-status-page'),
							        'offline'		=> __('Offline','wp-status-page')
							    )
							)
						)
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

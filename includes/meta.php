<?php

class wpStatusPageMeta {

	function __construct(){
		add_filter('cmb_meta_boxes', array($this,'meta' ));
		add_action( 'admin_init', array($this,'remove_meta' ));
	}

	/**
	 	* Adds custom meta
	 	*
	 	* @since    1.0.0
	*/
	function meta( array $meta_boxes ) {

		$meta_boxes[] = array(
			'title' 								=> __('Status Page', 'wp-status-page'),
			'pages' 								=> array('page'),
			'context'    							=> 'side',
			'priority'								=> 'high',
			'fields' 								=> array(
				array(
					'id' 							=> '_wsp_active',
					'name' 							=> __('Make this page a Status Page', 'wp-status-page'),
					'type' 							=> 'checkbox',
				)
			)
		);

		$meta_boxes[] = array(
			'title' 								=> __('Status Types', 'wp-status-page'),
			'pages' 								=> array('page'),
			'fields' 								=> array(
				array(
					'id' 							=> '_wsp_watch_status',
					'name' 							=> __('Status Items', 'wp-status-page'),
					'type' 							=> 'group',
					'repeatable'     				=> true,
					'repeatable_max' 				=> 20,
					'sortable'						=> true,
					'desc'							=> __('Setup different items that should have a status. FOr ', 'wp-status-page'),
					'fields' 						=> array(
						array(
							'id' 					=> 'name',
							'name' 					=> __('Item Name', 'wp-status-page'),
							'type' 					=> 'text',
							'cols'					=> 6
						),
						array(
							'id' 					=> 'status',
							'name' 					=> __('Item Status', 'wp-status-page'),
							'type' 					=> 'select',
								'options'			=> array(
									'operational'	=> __('Operational', 'wp-status-page'),
									'issues'		=> __('Performance Issues', 'wp-status-page')
								),
							'cols'	=> 6
						)
					)
				)
			)
		);

		return $meta_boxes;

	}

	function remove_meta(){

		$post_id 		= isset( $_GET['post'] ) ? $_GET['post'] : null;
		$is_status_page = get_post_meta( $post_id, '_wsp_active', true );

		if ( $is_status_page ):

			remove_post_type_support('page', 'editor');

 			remove_meta_box( 'commentstatusdiv' , 	'page' , 'normal' );
 			remove_meta_box( 'commentsdiv' , 		'page' , 'normal' );
 			remove_meta_box( 'authordiv' , 			'page' , 'normal' );
			remove_meta_box( 'pageparentdiv' , 		'page' , 'normal' );


		endif;
	}

}
new wpStatusPageMeta();

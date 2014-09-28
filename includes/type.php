<?php

class wpStatusPageType {

	function __construct(){
		add_action('init', array($this,'do_type'));
	}

	/**
	 	* Creates an Aesop Events custom post type to manage all psot galleries
	 	*
	 	* @since    1.0.0
	*/
	function do_type() {

		$labels = array(
			'name'                		=> _x( 'Status','wp-status-page' ),
			'singular_name'       		=> _x( 'Status Event','wp-status-page' ),
			'menu_name'           		=> __( 'Status', 'wp-status-page' ),
			'parent_item_colon'   		=> __( 'Parent Status:', 'wp-status-page' ),
			'all_items'           		=> __( 'All Status Events', 'wp-status-page' ),
			'view_item'           		=> __( 'View Status Event', 'wp-status-page' ),
			'add_new_item'        		=> __( 'Add New Status Event', 'wp-status-page' ),
			'add_new'             		=> __( 'New Status Event', 'wp-status-page' ),
			'edit_item'           		=> __( 'Edit Status Event', 'wp-status-page' ),
			'update_item'         		=> __( 'Update Status Event', 'wp-status-page' ),
			'search_items'        		=> __( 'Search Status Events', 'wp-status-page' ),
			'not_found'           		=> __( 'No Status Events found', 'wp-status-page' ),
			'not_found_in_trash'  		=> __( 'No Status Events found in Trash', 'wp-status-page' ),
		);
		$args = array(
			'label'               		=> __( 'Status', 'wp-status-page' ),
			'description'         		=> __( 'Create status events.', 'wp-status-page' ),
			'menu_icon' 		  		=> 'dashicons-megaphone',  // Icon Path
			'labels'              		=> $labels,
			'supports'            		=> array( 'title', 'editor' ),
			'hierarchical'        		=> false,
			'public'              		=> true,
 			'show_ui' 					=> true,
			'exclude_from_search'		=> true,
			'query_var' 				=> true,
			'can_export' 				=> true,
			'has_archive'				=> 'status',
			'rewrite'					=> array('with_front' => false, 'slug' => 'status'),
			'capability_type' 			=> 'post'
		);

		register_post_type( 'status_page', apply_filters('status_page_args',$args ) );

	}

}
new wpStatusPageType();
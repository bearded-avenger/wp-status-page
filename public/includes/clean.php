<?php

class wpStatusPageClean {

	function __construct(){
		add_action('wp_print_styles', array($this,'clean_head'));
	}

	function clean_head(){

		$is_status_page = wsp_get_meta( get_the_ID(), '_wsp_active' );

		if ( $is_status_page) {

    		// clean the head out of unnecessary info
	    	remove_action('wp_head', 'rsd_link');
	    	remove_action('wp_head', 'feed_links_extra', 3);
			remove_action('wp_head', 'wlwmanifest_link');
			remove_action('wp_head', 'index_rel_link');
			remove_action('wp_head', 'parent_post_rel_link', 10, 0);
			remove_action('wp_head', 'start_post_rel_link', 10, 0);
			remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
			remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
			remove_action('wp_head', 'wp_generator');
		}
	}

}
new wpStatusPageClean;
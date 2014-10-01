<?php

class wpStatusPageClean {

	function __construct(){
		add_action('wp_print_styles', array($this,'clean_head'));
	}

	function clean_head(){

		$is_status_page = wsp_get_meta( get_the_ID(), '_wsp_active' );

		if ( $is_status_page) {

    		wp_deregister_style('twentyfourteen-style');
    		wp_dequeue_style('twentyfourteen-style');

    		wp_deregister_style('twentyfourteen-lato');
    		wp_dequeue_style('twentyfourteen-lato');

    		wp_deregister_style('genericons');
    		wp_dequeue_style('genericons');

    		wp_deregister_script('twentyfourteen-script');
    		wp_dequeue_script('twentyfourteen-script');

    		wp_deregister_script('comment-reply');
    		wp_dequeue_script('comment-reply');

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
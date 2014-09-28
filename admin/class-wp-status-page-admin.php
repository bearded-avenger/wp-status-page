<?php
/**
 * WP Status Page
 *
 * @package   WP_Status_Page_Admin
 * @author    Nick Haskins <email@nickhaskins.com>
 * @license   GPL-2.0+
 * @link      http://wpstatuspage.com
 * @copyright 2014 Nick Haskins
 */

/**
 * Plugin class. This class should ideally be used to work with the
 * administrative side of the WordPress site.
 *
 * @package WP_Status_Page_Admin
 * @author  Nick Haskins <email@nickhaskins.com>
 */
class WP_Status_Page_Admin {

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by loading admin scripts & styles and adding a
	 * settings page and menu.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {


		$plugin = WP_Status_Page::get_instance();
		$this->plugin_slug = $plugin->get_plugin_slug();


        if( !class_exists( 'CMB_Meta_Box' ) ) {
    		require_once( WPSTATUSPAGE_DIR.'/admin/includes/custom-meta-boxes/custom-meta-boxes.php' );
    	}

    	require_once(WPSTATUSPAGE_DIR.'/includes/meta.php');


	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		/*
		 * @TODO :
		 *
		 * - Uncomment following lines if the admin class should only be available for super admins
		 */
		/* if( ! is_super_admin() ) {
			return;
		} */

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

}

<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   WP_Status_Page
 * @author    Nick Haskins <email@nickhaskins.com>
 * @license   GPL-2.0+
 * @link      http://wpstatuspage.com
 * @copyright 2014 Nick Haskins
 *
 * @wordpress-plugin
 * Plugin Name:       WP Status Page
 * Plugin URI:        http://wpstatus.page.com
 * Description:       A status page plugin for WordPress.
 * Version:           0.1
 * Author:            Nick Haskins
 * Author URI:        http://nickhaskins.com
 * Text Domain:       wp-status-page-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/bearded-avenger/wp-status-page
 * WordPress-Plugin-Boilerplate: v2.6.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define('WPSTATUSPAGE_VERSION', '0.1');
define('WPSTATUSPAGE_DIR', plugin_dir_path( __FILE__ ));
define('WPSTATUSPAGE_URL', plugins_url( '', __FILE__ ));

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public/class-wp-status-page.php' );


register_activation_hook( __FILE__, array( 'WP_Status_Page', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'WP_Status_Page', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'WP_Status_Page', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-wp-status-page-admin.php' );
	add_action( 'plugins_loaded', array( 'WP_Status_Page_Admin', 'get_instance' ) );

}

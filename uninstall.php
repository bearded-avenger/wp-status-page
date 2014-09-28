<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   WP_Status_Page
 * @author    Nick Haskins <email@nickhaskins.com>
 * @license   GPL-2.0+
 * @link      http://wpstatuspage.com
 * @copyright 2014 Nick Haskins
 */

// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
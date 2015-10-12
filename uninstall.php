<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   CGC_Beta_Users
 * @author    Nick Haskins <nick@cgcookie.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2014 CG Cookie
 */

// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
// @TODO: Define uninstall functionality here
global $wpdb;
$main_table = $wpdb->base_prefix .'cgc_beta_users';

$wpdb->query("DROP TABLE IF EXISTS {$main_table} ");
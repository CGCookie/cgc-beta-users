<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   CGC_Beta_Users
 * @author    Nick Haskins <nick@cgcookie.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2014 CG Cookie
 *
 * @wordpress-plugin
 * Plugin Name:       CGC Beta Users
 * Plugin URI:        http://cgcookie.com
 * Description:       Beta User Manager
 * Version:           1.0
 * Author:            Nick Haskins
 * Author URI:        http://cgcookie.com
 * Text Domain:       plugin-name-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/cgcookie/cgc-beta-users
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Set some constants
define('CGC_BETAUSERS_VERSION', '1.0');
define('CGC_BETAUSERS_DIR', plugin_dir_path( __FILE__ ));
define('CGC_BETAUSERS_URL', plugins_url( '', __FILE__ ));
/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-plugin-name.php` with the name of the plugin's class file
 *
 */
require_once( plugin_dir_path( __FILE__ ) . 'public/class-cgc-beta-users.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * @TODO:
 *
 * - replace CGC_Beta_Users with the name of the class defined in
 *   `class-plugin-name.php`
 */
register_activation_hook( __FILE__, array( 'CGC_Beta_Users', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'CGC_Beta_Users', 'deactivate' ) );

/*
 * @TODO:
 *
 * - replace CGC_Beta_Users with the name of the class defined in
 *   `class-plugin-name.php`
 */
add_action( 'plugins_loaded', array( 'CGC_Beta_Users', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-plugin-name-admin.php` with the name of the plugin's admin file
 * - replace CGC_Beta_Users_Admin with the name of the class defined in
 *   `class-plugin-name-admin.php`
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-cgc-beta-users-admin.php' );
	add_action( 'plugins_loaded', array( 'CGC_Beta_Users_Admin', 'get_instance' ) );

}

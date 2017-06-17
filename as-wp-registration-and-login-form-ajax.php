<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              anuragsingh.me
 * @since             1.0.0
 * @package           As_Wp_Registration_And_Login_Form_Ajax
 *
 * @wordpress-plugin
 * Plugin Name:       AS WP Registration and Login Form - Ajax
 * Plugin URI:        anuragsingh.me/wp/plugins/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Anurag Singh
 * Author URI:        anuragsingh.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       as-wp-registration-and-login-form-ajax
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-as-wp-registration-and-login-form-ajax-activator.php
 */
function activate_as_wp_registration_and_login_form_ajax() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-as-wp-registration-and-login-form-ajax-activator.php';
	As_Wp_Registration_And_Login_Form_Ajax_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-as-wp-registration-and-login-form-ajax-deactivator.php
 */
function deactivate_as_wp_registration_and_login_form_ajax() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-as-wp-registration-and-login-form-ajax-deactivator.php';
	As_Wp_Registration_And_Login_Form_Ajax_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_as_wp_registration_and_login_form_ajax' );
register_deactivation_hook( __FILE__, 'deactivate_as_wp_registration_and_login_form_ajax' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-as-wp-registration-and-login-form-ajax.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_as_wp_registration_and_login_form_ajax() {

	$plugin = new As_Wp_Registration_And_Login_Form_Ajax();
	$plugin->run();

}
run_as_wp_registration_and_login_form_ajax();

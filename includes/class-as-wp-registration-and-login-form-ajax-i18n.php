<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       anuragsingh.me
 * @since      1.0.0
 *
 * @package    As_Wp_Registration_And_Login_Form_Ajax
 * @subpackage As_Wp_Registration_And_Login_Form_Ajax/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    As_Wp_Registration_And_Login_Form_Ajax
 * @subpackage As_Wp_Registration_And_Login_Form_Ajax/includes
 * @author     Anurag Singh <developer.anuragsingh@gmail.com>
 */
class As_Wp_Registration_And_Login_Form_Ajax_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'as-wp-registration-and-login-form-ajax',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

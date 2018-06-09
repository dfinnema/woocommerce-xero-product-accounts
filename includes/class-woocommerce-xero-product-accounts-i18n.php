<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://itchef.nz
 * @since      1.1.0
 *
 * @package    Woocommerce_Xero_Product_Accounts
 * @subpackage Woocommerce_Xero_Product_Accounts/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.1.0
 * @package    Woocommerce_Xero_Product_Accounts
 * @subpackage Woocommerce_Xero_Product_Accounts/includes
 * @author     IT Chef <hello@itchef.nz>
 */
class Woocommerce_Xero_Product_Accounts_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'woocommerce-xero-product-accounts',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

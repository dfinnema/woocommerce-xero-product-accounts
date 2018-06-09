<?php

/**
 * Fired during plugin activation
 *
 * @link       https://itchef.nz
 * @since      1.1.0
 *
 * @package    Woocommerce_Xero_Product_Accounts_Fees
 * @subpackage Woocommerce_Xero_Product_Accounts_Fees/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.1.0
 * @package    Woocommerce_Xero_Product_Accounts_Fees
 * @subpackage Woocommerce_Xero_Product_Accounts_Fees/includes
 * @author     IT Chef <hello@itchef.nz>
 */
class Woocommerce_Xero_Product_Accounts_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        
        if (! in_array( 'woocommerce-xero/woocommerce-xero.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            
            // Nope not activate, lets deactive this plugin
            deactivate_plugins( getfile_woocommerce_xero_product_accounts() );
            
            // Tell the user about it
            die('<p>'.__( '<a href="https://woocommerce.com/products/xero/">WooCommerce Xero Integration</a> is required to be installed and activated!', 'woocommerce-xero-product-accounts' ).'</p>');
        }

		if (! in_array( 'woocommerce-xero-stripe-fees/woocommerce-xero-stripe-fees.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

			// Nope not activate, lets deactive this plugin
			deactivate_plugins( getfile_woocommerce_xero_product_accounts() );

			// Tell the user about it
			die('<p>'.__( '<a href="https://github.com/dfinnema/woocommerce-xero-stripe-fees">WooCommerce Xero Stripe Fees</a> is required to be installed and activated!', 'woocommerce-xero-product-accounts' ).'</p>');
		}

	}

}

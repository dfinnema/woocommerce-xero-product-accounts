<?php

/**
 * @link              https://itchef.nz
 * @since             1.0.0
 * @package           Woocommerce_Xero_Product_Accounts
 *
 * @wordpress-plugin
 * Plugin Name:       WooCommerce Xero Product Accounts
 * Plugin URI:        https://github.com/dfinnema/woocommerce-xero-product-accounts
 * Description:       Extends the WooCommerce Xero Extension with per product account codes
 * Version:           1.0
 * Author:            IT Chef
 * Author URI:        https://itchef.nz
 * Tested up to:      4.9.4
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woocommerce-xero-product-accounts
 * Domain Path:       /languages
 * 
 * @woocommerce-extension
 * WC requires at least: 3.3.5
 * WC tested up to: 3.4.2
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Plugin Updater
require 'plugin-update-checker/plugin-update-checker.php';
$dfc_puc = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/dfinnema/woocommerce-xero-product-accounts',
	__FILE__,
	'woocommerce-xero-product-accounts'
);
$dfc_puc->setBranch('release');


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woocommerce-xero-product-accounts-activator.php
 */
function activate_woocommerce_xero_product_accounts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-xero-product-accounts-activator.php';
	Woocommerce_Xero_Product_Accounts_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woocommerce-xero-product-accounts-deactivator.php
 */
function deactivate_woocommerce_xero_product_accounts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-xero-product-accounts-deactivator.php';
	Woocommerce_Xero_Product_Accounts_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woocommerce_xero_product_accounts' );
register_deactivation_hook( __FILE__, 'deactivate_woocommerce_xero_product_accounts' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-xero-product-accounts.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.1.0
 */
function run_woocommerce_xero_product_accounts() {

	$plugin = new Woocommerce_Xero_Product_Accounts();
	$plugin->run();

}
run_woocommerce_xero_product_accounts();

/**
 * Gets the Plugin Path.
 *
 * Some functions require this file's full path.
 *
 * @since    1.1.0
 */
function getfile_woocommerce_xero_product_accounts() {
     
     return __FILE__;
 }

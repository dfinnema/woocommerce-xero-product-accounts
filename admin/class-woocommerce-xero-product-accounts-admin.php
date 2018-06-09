<?php

/**
 * The core functionality of the plugin.
 *
 * @link       https://itchef.nz
 * @since      1.0.0
 *
 * @package    Woocommerce_Xero_Product_Accounts
 * @subpackage Woocommerce_Xero_Product_Accounts/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woocommerce_Xero_Product_Accounts
 * @subpackage Woocommerce_Xero_Product_Accounts/admin
 * @author     IT Chef <hello@itchef.nz>
 */
class Woocommerce_Xero_Product_Accounts_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
    
    /**
	 * Display a notice when incompatibilities are found.
	 * 
	 * Looks at enabled options for WooCommerce Xero and tells the user about issues 
	 *
	 * @since    1.0.0
	 */
    public function compatibility() {

	    // Make sure the user is admin (no point displaying it otherwise)
	    if ( is_admin() ) {
		    // Get Current WooCommerce Xero Options
		    $xero_send_payments = get_option( 'wc_xero_send_payments', '' );

		    if ( 'on' == $xero_send_payments ) {
			    // Tell the user that sending Payments to Xero will not work with this plugin active (TODO in the future)
			    add_action( 'admin_notices',
				    function () {
					    echo( '<div class="notice notice-warning"><p>[' . $this->plugin_name . '] ' . __( 'Sending payments to Xero does not work with this plugin enabled. Please turn off this option to avoid getting errors',
							    'woocommerce-xero-product-accounts' ) . '</p></div>' );
				    } );
		    }
	    }

    }

	/**
	 * Data is received through the filter from the Xero Stripe Fees
	 *
	 * @param $data
	 * @return mixed
	 * @since 1.0.0
	 */
    public function xero_account_add ( $data ) {
	    $this->log('PLUGIN START - '.$this->plugin_name.' ('.$this->version.')');


	    // Get Line Items
	    $line_items = $data['Invoice']['LineItems'];
	    $this->log('RAW LineItems Before');
	    $this->log(print_r($line_items,1));

	    $line_items_new = array();

	    foreach ($line_items as $line) {
	    	if (array_key_exists('LineItem',$line)) {
	    		$product_name = $line['LineItem']['Description'];
	    		$product_price_net = $line['LineItem']['UnitAmount'];

			    $this->log('Loading Item ('.$product_name.')');

	    		// Get Product ID
			    $product_id = get_page_by_title( $product_name, OBJECT, 'product' );

			    // Make sure the product exists.
			    if (null !== $product_id) {
				    $product_id = $product_id->ID;

				    // See if it has custom meta filled in for an account code for Xero
				    $product_xero_code = get_post_meta( $product_id, '_xero_account_code', true );

				    if ('' !== $product_xero_code) {
					    $this->log(' + Found Custom Code, Applying');
					    $line['LineItem']['AccountCode'] = $product_xero_code;
				    }
			    }

		    }

		    $line_items_new[] = $line;
	    }

	    // Re-Merge the Data
	    $data['Invoice']['LineItems'] = $line_items_new;

	    $this->log('PLUGIN END - '.$this->plugin_name.' ('.$this->version.')');

	    return $data;
    }

	/**
	 * Adds a custom Field to each product for setting the Xero Account code
	 * @since 1.0.0
	 */
    public function woo_custom_product_field_add() {

	    global $woocommerce, $post;
	    echo '<div class="product_custom_field">';

	    woocommerce_wp_text_input(
		    array(
			    'id'          => '_xero_account_code',
			    'label'       => __( 'Xero Account Code', 'woocommerce-xero-product-accounts' ),
			    'description' => __('Sets the account code in Xero when sending the invoice, leave blank to use the default', 'woocommerce-xero-product-accounts' ),
			    'desc_tip'    => 'true'
		    )

	    );
	    echo '</div>';
    }

	/**
	 * Saves the custom field
	 * @param $post_id
	 * @since 1.0.0
	 */
	public function woo_custom_product_field_save( $post_id ) {
		// Custom Product Text Field
		$woocommerce_custom_product_xero_account = $_POST['_xero_account_code'];
		if (!empty($woocommerce_custom_product_xero_account))
			update_post_meta($post_id, '_xero_account_code', esc_attr($woocommerce_custom_product_xero_account));

	}
    
    /**
	 * Debug functions. 
	 * 
	 * Sends it to main class debug logger
	 *
	 * @since    1.0.0
	 */
    private function log($message='') {
        
        Woocommerce_Xero_Product_Accounts::log($message);
    }
    
    /**
	 * Add private order note 
	 * 
	 * Creates a new note for the order id
	 *
	 * @since    1.0.0
	 */
    private function add_order_note( $order_id , $note ) {
        // Add order note 
        $order      = wc_get_order( $order_id );
        $comment_id = $order->add_order_note( $note );
    }

}

=== Plugin Name ===
Contributors: (this should be a list of wordpress.org userid's)
Donate link: https://itchef.nz
Tags: woocommerce,xero,stripe,fees
Requires at least: 4.8
Tested up to: 4.9.6
Stable tag: 4.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This is a Plugin for Wordpress using **Woocommerce** with the **Woocommerce Xero** Extension, **Stripe** and **Woocommerce Xero Stripe Fees**

It extends the Stripe Fees plugin with per product account codes

== Description ==

  - Allows each product to have a different Xero Account code
  - If none is set for the product it uses the default one set in the Woocommere Xero plugin

  Note sending payments to Xero is not currently supported for Stripe Fees (nothing gets changed)

**Please note this is a work in progress and probably has a lot of bugs in it. The code is quick and dirty so feel free to add / change to it.**

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Download as .zip and add plugin using the upload function or add the .php file to ```wp-content/plugins/woocommerce-xero-stripe-fees```
2. Activate the plugin in Wordpress
3. Go into the various products and edit the Xero Account code
4. Test to see if it works (see debug below)

== Frequently Asked Questions ==

= Can this be used with sending payments to Xero =

Not at this time

= I have a question or issue =

Please head over to https://github.com/dfinnema/woocommerce-xero-product-accounts

== Changelog ==

= 1.1 =
* FIX now picks up more product types
* TWEAK further integration with other plugins

= 1.0 =
* Initial Release
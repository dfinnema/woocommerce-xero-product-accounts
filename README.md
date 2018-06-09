# Woocommerce Xero Product Accounts
This is a Plugin for Wordpress using **Woocommerce** with the **Woocommerce Xero** Extension, **Stripe** and **Woocommerce Xero Stripe Fees**

It extends the Stripe Fees plugin with per product account codes

**Please note this is a work in progress and probably has a lot of bugs in it. The code is quick and dirty so feel free to add / change to it.**
### Features

  - Allows each product to have a different Xero Account code
  - If none is set for the product it uses the default one set in the Woocommere Xero plugin 
  
  Note sending payments to Xero is not currently supported for Stripe Fees (nothing gets changed)

### Installation

1. Download as .zip and add plugin using the upload function or add the .php file to ```wp-content/plugins/woocommerce-xero-stripe-fees``` 
2. Activate the plugin in Wordpress
3. Go into the various products and edit the Xero Account code
4. Test to see if it works (see debug below)

### Requirements

This Plugin requires the following plugins to be active in Wordpress

| Plugin | Link |
| ------ | ------ |
| Woocommerce 3.0 or above | https://woocommerce.com |
| Woocommerce Xero (tested with 1.7.9 and above) | https://woocommerce.com/products/xero/ |
| Woocommerce Xero Stripe Fees | https://github.com/dfinnema/woocommerce-xero-stripe-fees |


### Bugs

Please create a new issue if you are able to reproduce your bug

### Debug

Enable debug under ```Woocommerce > Xero```

Logs are created in the ```wp-content/uploads/wc-logs``` the filename should start with **xero** followed by a bunch of numbers with the extension of **.log**

### Development

Want to contribute? Great!

Feel free to post an issue or create a pull request. 

### Are you finding this usefull?

Using this plugin or some of the code? Feeling generous and want to say thanks? You can <a href='https://ko-fi.com/A6552UEK' target='_blank'><img height='36' style='border:0px;height:36px;' src='https://az743702.vo.msecnd.net/cdn/kofi2.png?v=0' border='0' alt='Buy Me a Coffee at ko-fi.com' /></a>
# BitTube Gateway for WooCommerce

## Features

* Payment validation done through the [bittube blockchain explorer](https://explorer.bit.tube/).
* Validates payments with `cron`, so does not require users to stay on the order confirmation page for their order to validate.
* Order status updates are done through AJAX instead of Javascript page reloads.
* Customers can pay with multiple transactions and are notified as soon as transactions hit the mempool.
* Configurable block confirmations, from `0` for zero confirm to `60` for high ticket purchases.
* Live price updates every minute; total amount due is locked in after the order is placed for a configurable amount of time (default 60 minutes) so the price does not change after order has been made.
* Hooks into emails, order confirmation page, customer order history page, and admin order details page.
* View all payments received to your wallet with links to the blockchain explorer and associated orders.
* Optionally display all prices on your store in terms of BitTube.
* Shortcodes! Display exchange rates in numerous currencies.

## Requirements

* BitTube wallet to receive payments - [GUI](https://github.com/ipbc-dev/bittube-wallet-gui/releases) - [CLI](https://github.com/ipbc-dev/bittube/releases) 

* [BCMath](http://php.net/manual/en/book.bc.php) - A PHP extension used for arbitrary precision maths

## Installing the plugin

* Download the plugin from the [releases page](https://github.com/ipbc-dev) 
* Unzip or place the `bittube-woocommerce-gateway` folder in the `wp-content/plugins` directory.
* Activate "BitTube Woocommerce Gateway" in your WordPress admin dashboard.
* It is highly recommended that you use native cronjobs instead of WordPress's "Poor Man's Cron" by adding `define('DISABLE_WP_CRON', true);` into your `wp-config.php` file and adding `* * * * * wget -q -O - https://yourstore.com/wp-cron.php?doing_wp_cron >/dev/null 2>&1` to your crontab.

##Use your wallet address and viewkey

This is the easiest way to start accepting BitTube on your website. You'll need:

* Your BitTube wallet address starting with `b`
* Your wallet's secret viewkey

Then simply select the `viewkey` option in the settings page and paste your address and viewkey. You're all set!

## Configuration

* `Enable / Disable` - Turn on or off BitTube gateway. (Default: Disable)
* `Title` - Name of the payment gateway as displayed to the customer. (Default: BitTube Gateway)
* `Discount for using BitTube` - Percentage discount applied to orders for paying with BitTube. Can also be negative to apply a surcharge. (Default: 0)
* `Order valid time` - Number of seconds after order is placed that the transaction must be seen in the mempool. (Default: 3600 [1 hour])
* `Number of confirmations` - Number of confirmations the transaction must recieve before the order is marked as complete. Use `0` for nearly instant confirmation. (Default: 5)
* `Confirmation Type` - Confirm transactions with either your viewkey, or by using `bittube-wallet-rpc`. (Default: viewkey)
* `BitTube Address` (if confirmation type is viewkey) - Your public BitTube address starting with 4. (No default)
* `Secret Viewkey` (if confirmation type is viewkey) - Your *private* viewkey (No default)
* `Testnet` - Check this to change the blockchain explorer links to the testnet explorer. (Default: unchecked)
* `SSL warnings` - Check this to silence SSL warnings. (Default: unchecked)
* `Show Prices in BitTube` - Convert all prices on the frontend to BitTube. Experimental feature, only use if you do not accept any other payment option. (Default: unchecked)
* `Display Decimals` (if show prices in BitTube is enabled) - Number of decimals to round prices to on the frontend. The final order amount will not be rounded and will be displayed down to the nanoBitTube. (Default: 12)

## Shortcodes

This plugin makes available two shortcodes that you can use in your theme.

#### Live price shortcode

This will display the price of BitTube in the selected currency. If no currency is provided, the store's default currency will be used.

```
[bittube-price]
[bittube-price currency="BTC"]
[bittube-price currency="USD"]
[bittube-price currency="CAD"]
[bittube-price currency="EUR"]
[bittube-price currency="GBP"]
```
Will display:
```
1 TUBE = 123.68000 USD
1 TUBE = 0.01827000 BTC
1 TUBE = 123.68000 USD
1 TUBE = 168.43000 CAD
1 TUBE = 105.54000 EUR
1 TUBE = 94.84000 GBP
```


#### BitTube accepted here badge

This will display a badge showing that you accept BitTube-currency.

`[bittube-accepted-here]`

![BitTube Accepted Here](/assets/images/bittube-accepted-here.png?raw=true "BitTube Accepted Here")

## Donations


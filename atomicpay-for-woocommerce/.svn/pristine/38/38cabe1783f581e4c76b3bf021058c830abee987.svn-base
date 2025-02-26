=== AtomicPay for WooCommerce ===
Contributors: atomicpay
Tags: cryptocurrencies,cryptocurrency,atomicpay,payment,payments,woocomerce,e-commerce,payment-gateway,bitcoin,litecoin,dash,bitcoincash,bitcoingold,groestlcoin,btc,ltc,bch,btg,grs
Requires at least: 3.9
Tested up to: 5.0.1
Requires PHP: 5.4
Stable tag: master
License: MIT
License URI: https://github.com/atomicpay/woocommerce-plugin/blob/master/LICENSE

AtomicPay.io is a decentralized cryptocurrency payment processor that eliminates the involvement of a third-party payment gateway, allowing merchants to accept BTC, BCH, LTC, DASH, BTG & GRS payments directly from  their customers without a middleman, in a secured and trustless environment.

== Description ==

AtomicPay.io is a decentralized cryptocurrency payment processor that eliminates the involvement of a third-party payment gateway, allowing merchants to accept BTC, BCH, LTC, DASH, BTG & GRS payments directly from  their customers without a middleman, in a secured and trustless environment.

AtomicPay eliminates the involvement of third-parties, making it censorship-resistance. Private keys are not required, hence your funds are secured from risk of theft or loss.

AtomicPay process payments but we do not hold any funds. No more middleman. Money goes direct to your wallet. You have immediate ownership and full control of your money. Get paid in seconds.

* Decentralized & Non-Custodial
* Direct P2P Transfer
* Trustless Validation
* Full Support For SegWit
* No Address Reuse
* Support 156 Fiat Currencies
* Customer Data Privacy
* No Chargebacks & Frauds
* Minimum Transaction Fee
* Support Bitcoin, Litecoin, Bitcoin Cash, Dash, Bitcoin Gold, Groestlcoin, more

== Installation ==

This plugin requires Woocommerce. Please make sure you have Woocommerce installed.

To integrate AtomicPay into an existing WooCommerce store, follow the steps below.

### 1. Install AtomicPay for WooCommerce Plugin ###

### 2. Signup For AtomicPay Merchant Account ###

- You must have a AtomicPay merchant account and API keys to use this plugin. It's free to [sign-up for a AtomicPay merchant account](https://merchant.atomicpay.io/beta-registration)

- Once registered, you may retrieve the API keys by login to [AtomicPay Merchant Account](https://merchant.atomicpay.io/login) and go to [API Integration](https://merchant.atomicpay.io/apiIntegration) page. If your key becomes compromised, you may revoke the keys by regenerating new set of keys.

### 3. Authorization Pairing ###

Authorization Pairing can be performed using the Administrator section of Wordpress. Once logged in, you can find the configuration settings under WooCommerce > Settings > Payments > AtomicPay.

Here is a video with Step by Step Installation

https://youtu.be/AO7Hdkdwr5s?t=30

1. Login to your [AtomicPay Merchant Account](https://merchant.atomicpay.io/login) and go to [API Integration](https://merchant.atomicpay.io/apiIntegration) page.
2. You will need the following values for next step: `ACCOUNT ID`, `PRIVATE KEY` and `PUBLIC KEY`.
2. Here you will need to copy and paste the values into the corresponding fields: `Account ID`, `Private Key` and `Public Key`.
3. Click on the button **Request Authorization**. The plugin will attempt to connect to AtomicPay Server for an authorization.
4. Once authorization is successful, you should see the following dialog popup.


###  4. Configuration ###

#### 4.1 Transaction Speed ####

Next, we will need you to select a default **Transaction Speed** value. `HIGH Risk` speed require 1 confirmation, and can be used for digital goods or low-risk items. `MEDIUM Risk` speed require at least 2 confirmations, and should be used for mid-value items. `LOW Risk` speed require at least 6 confirmations (averaging 30 mins, depending on selected cryptocurrency), and should be used for high-value items.

#### 4.2 Order Status ####

You can configure how AtomicPay's IPN (Instant Payment Notifications) trigger the various order states in your WooCommerce store. You may leave it as our default values which are common values for majority of stores.

Once configurated, click **Save Changes** at the bottom of the page. Congrats your plugin is activated and the Pay with AtomicPay option will be available during your customer checkout process.

### 5. Usage ###
Once activated, your customers will be given the option to pay via AtomicPay which will redirect them to AtomicPay checkout UI to complete the payment. On your WooCommerce backend, everything remains the same as how you would use other payment processors such as PayPal, etc. AtomicPay is designed to be an addtional option on top of the existing payment options which you are already offering. That will be no conflicts with other plugins.

== Frequently Asked Questions ==

There is an extensive documentation and answers to many of your questions on [our official GitHub Repo](https://github.com/atomicpay/woocommerce-plugin).

== Screenshots ==

1. AtomicPay Supported Cryptocurrencies: Bitcoin, Litecoin, Bitcoin Cash, Dash, Bitcoin Gold, Groestlcoin and more
2. AtomicPay Payment Invoice UI - Your customers will be redirected to AtomicPay to complete the payment. They can pay by scanning a QR code or copy/paste the amount and address.
3. Upon successful payment, the payment invoice will be updated in realtime, an IPN will be sent to your WooCommerce store and an email will be sent to notify you.
4. Authorization Pairing - Input the API keys and click Request Authorization. The plugin will attempt to connect to AtomicPay Server for an authorization.
5. Order Status - You can configure how AtomicPay's IPN (Instant Payment Notifications) trigger the various order states in your WooCommerce store. You may leave it as our default values which are common values for majority of stores.
6. Once plugin is activated, your customers will be given the option to pay via AtomicPay which will redirect them to AtomicPay checkout UI to complete the payment.
7. AtomicPay Merchant Account Panel
8. Merchant using AtomicPay to accept payments

== Changelog ==
= 1.0.6 =
Fixed:
- Bug: Default transaction speed 

== Changelog ==
= 1.0.5 =
Changed:
- Fix bug for payment_rate
- Add API Key description to Settings

= 1.0.4 =
Changed:
- Remove GMP library dependencies

== Changelog ==
= 1.0.3 =
Changed:
- Update API Authorization endpoint

= 1.0.2 =
Fixed
- Bug: Invoice generation endpoint required parameters

= Earlier versions =
For the changelog of earlier versions, please refer to https://github.com/atomicpay/woocommerce-plugin/releases
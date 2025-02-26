# MoneyMe+ Payment Gateway
MoneyMe Payments for WooCommerce allows Australian based WooCommerce merchants to provide their customers the ability to pay in instalments with up to 60 months interest-free. 
## Requirements
This plugin extends the Payment Gateway functionality provided by WooCommerce. Please confirm the following dependencies are met before commencing installation of the plugin.

   * WordPress 5.4+
   * WooCommerce 4.6+
   * Have a merchant **MME Username** and **MME Password**. For details and subscriptions, visit https://www.moneyme.com.au/
 
## Settings
Once plugin is installed and met the requirements, you can now manage the MoneyME+ payment gateway on WooCommerce / Wordpress Dashboard. Just go to **WooCommerce** > **Settings**. Under that page, select **Payments** tab then click **Manage**. Below are the descriptions for each settings
   * **Title** - payment gateway title
   * **Description** - short description of the payment gateway
   * **MME Username** - Merchant registered MME+ username, this will be used if Test Mode is off. To get one, please visit and contact https://www.moneyme.com.au/
   * **MME Password** - Merchant registered MME+ password, this will be used if Test Mode is off. To get one, please visit and contact https://www.moneyme.com.au/

### Wordpress Installation Folder
The following structure assumes the default naming of the "wp-content" folder. If this has been changed, please use the value of the `WP_CONTENT_FOLDERNAME` constant defined in wp-settings.php.

```
├── wp-content/
│   ├── plugins/
│   │   ├── woocommerce/
│   │   ├── moneyme-gateway-for-woocommerce/
│   │   │   ├── classes/
│   │   │   │   │   ├── MMECore.php
│   │   │   │   │   ├── MMECustomer.php
│   │   │   │   │   ├── MMEGateway.php
│   │   │   ├── includes/
│   │   │   │   ├── functions.php
│   │   │   ├── views/
│   │   │   │   │   ├── assets/
│   │   │   │   │   |  ├── css/
│   │   │   │   │   |  |  ├── animate.css
│   │   │   │   │   |  |  ├── custom.css
│   │   │   │   │   |  |  ├── global.css
│   │   │   │   │   |  |  ├── styles.css
│   │   │   │   │   |  ├── images/
│   │   │   │   │   |  ├── js/
│   │   │   │   │   |  |  ├── bootstrap.min.js
│   │   │   │   │   |  |  ├── mme.js
│   │   │   │   │   |  |  ├── mmeAnalytics.js
│   │   │   │   │   |  |  ├── mmeAnalyticsCustomDestination.js
│   │   │   │   │   |  |  ├── rs-analytics.js
│   │   │   │   │   |  |  ├── proper.js
│   │   │   │   │   ├── mme-main.php
│   │   │   │   │   ├── mme-account.php
│   │   │   ├── index.php
│   │   │   ├── README.md
│   │   │   ├── readme.txt
```
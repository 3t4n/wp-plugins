<?php

namespace ProfitBlue\Enums;

/**
 * DataSetting
 * 
 * This class defines settings used for generating subpages in the administration section,
 * particularly for the dataset settings area. It encapsulates the configurations necessary
 * to dynamically create and manage the UI components and data interactions specific to
 * dataset settings within the admin panel.
 * 
 * @since 1.0.0
 * 
 */
class DataSetting {

	/**
	 * get
	 * Return array of admin subpages for Data settings
	 *
	 * @since    1.0.0
	 * @return array
	 * @access public
	 */
	public static function get() {

		$setting = array(
			'main' => array(
				'title' => esc_html__( 'Data settings', 'profitblue-financial-reporting-for-woocommerce' ),
				'description' => esc_html__( 'To ensure the plugin works properly, you need to set some data at the beginning. The data settings section allows you to add all necessary data, which are then displayed in various analyses and graphs. After you fill out all the necessary settings, the profit tracker will calculate everything automatically. Set it once correctly and save time for the future.', 'profitblue-financial-reporting-for-woocommerce' ),
			),
			'page' => array(
				'name' => 'data-settings',
				'id'   => 'DataSetting',
				'type' => 'blocks',
				'blocks' => array(
					array(
						'title' => esc_html__( 'Custom e-shop data', 'profitblue-financial-reporting-for-woocommerce' ),
						'items' => array(
							array(
								'id' => 'custom-cost-and-income',
								'title' => esc_html__( 'Custom cost and income', 'profitblue-financial-reporting-for-woocommerce' ),
								'description' => esc_html__( 'Set some additional costs or bonus earnings related to your business. These include Ads, rent, etc.', 'profitblue-financial-reporting-for-woocommerce' ),
								'icon'=> 'BlueProfit_Income_2'				
							),
							array(
								'id' => 'costs-of-goods-sold',
								'title' => esc_html__( 'Costs Of Goods Sold (COGS)', 'profitblue-financial-reporting-for-woocommerce' ),
								'description' => esc_html__( 'Set how much you pay your suppliers for products. Set the VAT excluded prices.', 'profitblue-financial-reporting-for-woocommerce' ),
								'icon'=> 'BlueProfit_COGS_2'				
							),
							array(
								'id' => 'shipping-costs',
								'title' => esc_html__( 'Shipping costs', 'profitblue-financial-reporting-for-woocommerce' ),
								'description' => esc_html__( 'Set the exact values you pay to your shipping suppliers. There are multiple ways how to set it.', 'profitblue-financial-reporting-for-woocommerce' ),
								'icon'=> 'BlueProfit_Shipping_2'				
							),
							array(
								'id' => 'payment-fees',
								'title' => esc_html__( 'Payment fees', 'profitblue-financial-reporting-for-woocommerce' ),
								'description' => esc_html__( 'Set additional payment fees according to your payment methods. They are charged only when method is used.', 'profitblue-financial-reporting-for-woocommerce' ),
								'icon'=> 'BlueProfit_Payment_2'				
							)
						)
					),
					array(
						'title' => esc_html__( 'General', 'profitblue-financial-reporting-for-woocommerce' ),
						'items' => array(
							array(
								'id' => 'shop-settings',
								'title' => esc_html__( 'Shop settings', 'profitblue-financial-reporting-for-woocommerce' ),
								'description' => esc_html__( 'Set general information regarding your business, including taxes in your country.', 'profitblue-financial-reporting-for-woocommerce' ),
								'icon'=> 'BlueProfit_Settings_2'				
							),
							array(
								'id' => 'manage-notifications',
								'title' => esc_html__( 'Manage notifications', 'profitblue-financial-reporting-for-woocommerce' ),
								'description' => esc_html__( 'Set whether you want to receive email notifications. Set the frequency to day/week/month/year.', 'profitblue-financial-reporting-for-woocommerce' ),
								'icon'=> 'BlueProfit_Notifications_2'				
							)
						)
					)
				)
				
			),
			'subpages' => array(
				'custom-cost-and-income' => array(
					'title' => esc_html__( 'Custom cost and income', 'profitblue-financial-reporting-for-woocommerce' ),
					'description' => esc_html__( 'In this data section, you can insert costs and additional income of your business. Custom costs are additional expenses that your company pays; these costs can vary, but most general costs are paying salaries to employees or rent of the office. You can set them in two ways: fixed costs or variable costs. On the other hand, additional income adds money to your company, this can be represented by bonuses from your supplier. Simply put, fixed and variable costs make your company less profitable, while additional income adds some extra money to your pocket.', 'profitblue-financial-reporting-for-woocommerce' ),
					'filter' => 'cost-years',
					'page' => 'CustomCostAndIncome'
				),
				'costs-of-goods-sold' => array(
					'title' => esc_html__( 'Costs Of Goods Sold (COGS)', 'profitblue-financial-reporting-for-woocommerce' ),
					'description' => esc_html__( 'Cost of Goods Sold (COGS) are direct costs attributable to the production of the products you sell. This includes the purchase price of the goods themselves plus any additional expenses directly tied to getting the product ready for sale, such as packaging materials of the product, direct labor costs, or shipping to your inventory (from the supplier). COGS varies directly with your sales volume; your COGS will increase as you sell more products. Conversely, if sales decline, your COGS will decrease. It\'s a variable cost, and it directly affects your gross profit. ', 'profitblue-financial-reporting-for-woocommerce' ),
					'filter' => 'costs-of-goods-sold',
					'page' => 'CostOfGoodsSold'
				),
				'shipping-costs' => array(	
					'title' => esc_html__( 'Shipping costs', 'profitblue-financial-reporting-for-woocommerce' ),
					'description' => esc_html__( 'Shipping costs in the e-commerce business refer to the variable expenses involved in sending products from your inventory to your customers. These costs can vary significantly depending on factors such as the size and weight of the product, the shipping distance, the delivery speed, and of course by chosen shipping supplier. You can choose various methods how to calculate shipping method depending on you business type and strategy.', 'profitblue-financial-reporting-for-woocommerce' ),
					'filter' => 'shipping-cost-years',
					'page' => 'ShippingCosts',
					'save' => 'shippingCost',
				),
				'payment-fees' => array(
					'title' => esc_html__( 'Payment fees', 'profitblue-financial-reporting-for-woocommerce' ),
					'description' => esc_html__( 'Payment fees are the costs associated with processing customer payments through various platforms or gateways, such as credit cards, PayPal, or other online payment systems. These fees are typically charged by the payment processor and can be structured in different ways, including a percentage of the transaction value, a fixed amount per transaction, or a combination of both. For example, a payment processor might charge 2.9% of the transaction amount plus a fixed fee of $0.30 for each sale. This means that for every transaction, you\'ll pay a portion of the sale price plus a constant fee.', 'profitblue-financial-reporting-for-woocommerce' ),
					'filter' => 'payment-fees',
					'page' => 'PaymentCosts',
					'save' => 'paymentCost',
				),
				'shop-settings' => array(
					'title' => esc_html__( 'Shop settings', 'profitblue-financial-reporting-for-woocommerce' ),
					'description' => esc_html__( 'Shop settings are general information related to your type of business and the country/state you pay taxes in. Choose whether or not you want to display "processing" and "pending payment" order statuses in analyses and fill in the direct tax rate - the one you pay directly to the government. Important notice: VAT has nothing in common with the direct tax rate. Taxation info is only for illustrative purposes, and definitely don\'t pay taxes according to it.', 'profitblue-financial-reporting-for-woocommerce' ),
					'filter' => 'shop-setting',
					'page' => 'ShopSetting',
					'save' => 'shopSetting',
				),
				'manage-notifications' => array(
					'title' => esc_html__( 'Manage notifications', 'profitblue-financial-reporting-for-woocommerce' ),
					'description' => esc_html__( 'In this section, you can set up email notifications that will inform you about the recent financial situation of your company. Enter your email and turn on the chosen notifications. Then, based on your needs and wants, we will send you financial reports.', 'profitblue-financial-reporting-for-woocommerce' ),
					'filter' => 'notification',
					'page' => 'ManageNotification',
					'save' => 'manageNotification',
				),
				
			)
		
		);
		return $setting;
		
	}
}

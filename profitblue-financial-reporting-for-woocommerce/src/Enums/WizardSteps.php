<?php

namespace ProfitBlue\Enums;

/**
 * WizardSteps
 * 
 * This class defines config settings for plugin Wizard after instalation
 * 
 * @since 1.0.0
 * 
 */
class WizardSteps {

	/**
	 * get
	 * Return config array for plugin Wizard
	 *
	 * @since    1.0.0
	 * @return array
	 * @access public
	 */
	public static function get() {
			
		return array(
			'cogs'=> array(
                'steps' => array(
                    1 => array(
                        'id' => 'wizard-cogs-all',
                        'title' => esc_html__( '1. The are displayed all the products on your e-shop', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'The purpose of this data set is to input how much you purchase products for (from suppliers) or at which price you manufacture them. You must input all the COGS to make the calculation proper, as all the suppliers provide different margins.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=costs-of-goods-sold&wizard=profitblue&wizard-step=cogs&step=2',
						'redirect' => 'no',
						'class' => 'profitblue-page',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    2 => array(
                        'id' => 'wizard-cogs-prices',
                        'title' => esc_html__( '2. Set COGS', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Here are fields for inputting COGS. Input the prices in the currency you use. Get through the whole wizard and start inserting values.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=costs-of-goods-sold&wizard=profitblue&wizard-step=cogs&step=3',
						'redirect' => 'no',
						'class' => 'product-lists-item-cogs',
						'left' => 'right',
						'top' => 'top',
						'triangle' => 'rb'
                    ),
                    3 => array(
                        'id' => 'wizard-cogs-export',
                        'title' => esc_html__( '3. Export/Import via XLXS (Excel) file', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'If you have many products and wish to import them via XLSX file, you can do it right here. First, export the file from us, edit and then import it back to the data settings.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=costs-of-goods-sold&wizard=profitblue&wizard-step=cogs&step=4',
						'redirect' => 'no',
						'class' => 'csv-export-import',
						'left' => 'right',
						'top' => 'bottom',
						'triangle' => 'rt'
                    ),
                    4 => array(
                        'id' => 'wizard-cogs-calendar',
                        'title' => esc_html__( '4. Make sure that you set the correct date range.', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'When importing the COGS, check twice if you set the correct date range. It will import only to the date range you select here.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=custom-cost-and-income&wizard=profitblue&wizard-step=ccai&step=1',
						'redirect' => 'yes',
						'class' => 'cost-years',
						'left' => 'right',
						'top' => 'bottom',
						'triangle' => 'rt'
                    ),
                )
            ),
            'ccai' => array(
                'steps' => array(
                    1 => array(
                        'id' => 'wizard-ccai-all',
                        'title' => esc_html__( '1. There are 3 main tables that you have to set:', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Fixed costs stay constant and do not change while gaining more orders. Variable costs vary over time depending on the number of your orders. And Income is some bonus revenue (bonuses, etc.).', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=custom-cost-and-income&wizard=profitblue&wizard-step=ccai&step=2',
						'redirect' => 'no',
						'class' => 'form-section-inner',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    2 => array(
                        'id' => 'wizard-fixed-costs',
                        'title' => esc_html__( '2. Set fixed costs', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Fixed costs are critical to understanding the importance of the payments you have to pay constantly (every week, month, and year.)', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=custom-cost-and-income&wizard=profitblue&wizard-step=ccai&step=3',
						'redirect' => 'no',
						'class' => 'fixed-form',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    3 => array(
                        'id' => 'wizard-variable-costs',
                        'title' => esc_html__( '3. Set variable costs', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Variable costs are part of your business progress. As more money you receive more you will pay. The best examples are commission costs, handling costs, or wrapping material costs.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=custom-cost-and-income&wizard=profitblue&wizard-step=ccai&step=4',
						'redirect' => 'no',
						'class' => 'variable-form',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    4 => array(
                        'id' => 'wizard-income',
                        'title' => esc_html__( '4. Set income', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'If you have any additional income, set it here. Income is for adding some extra revenue. The classic examples of additional income are supplier bonuses or some other side hustle.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=custom-cost-and-income&wizard=profitblue&wizard-step=ccai&step=5',
						'redirect' => 'no',
						'class' => 'income-form',
						'left' => 'left',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    5 => array(
                        'id' => 'wizard-calendar',
                        'title' => esc_html__( '5. Make sure that you set the correct date range.', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Here you have to select the date range where you want the custom costs and income to operate.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=shipping-costs&wizard=profitblue&wizard-step=shipping&step=1',
						'redirect' => 'yes',
						'class' => 'cost-years',
						'left' => 'right',
						'top' => 'bottom',
						'triangle' => 'rt'
                    ),
                )
            ),            
            'shipping' => array(
                'steps'=> array(
                    1 => array(
                        'id' => 'wizard-shipping-all',
                        'title' => esc_html__( '1. Set your shipping costs', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'There are many ways how to set the shipping costs. It all depends on your needs and marketing strategy.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=shipping-costs&wizard=profitblue&wizard-step=shipping&step=2',
						'redirect' => 'no',
						'class' => 'shipping-list',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    2 => array(
                        'id' => 'wizard-shipping-first',
                        'title' => esc_html__( '2. No shipping costs at all', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'This option is for those who do not pay any shipping. Shipping cost will be 0.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=shipping-costs&wizard=profitblue&wizard-step=shipping&step=3',
						'redirect' => 'no',
						'class' => 'no-shipping-cost-all',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    3 => array(
                        'id' => 'wizard-shipping-second',
                        'title' => esc_html__( '3. The shipping costs are the same what the customers pay', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'This will set the amount your customers pay equal to what you pay your shipping supplier. At the final calculation, the shipping costs and the additional income from shipping will be equal.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=shipping-costs&wizard=profitblue&wizard-step=shipping&step=4',
						'redirect' => 'no',
						'class' => 'same-shipping-cost',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    4 => array(
                        'id' => 'wizard-shipping-third',
                        'title' => esc_html__( '4. Shipping costs are different from what customers pay', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'This option is for anyone who has some discounts on shipping to make it more attractive for customers. Conversely, someone who wants to earn extra money from customers can increase the shipping prices.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=shipping-costs&wizard=profitblue&wizard-step=shipping&step=5',
						'redirect' => 'no',
						'class' => 'different-shipping-cost',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    5 => array(
                        'id' => 'wizard-shipping-fourth',
                        'title' => esc_html__( '5. Insert shipping costs asa variable costs', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Set this if you know how much exactly you pay for shipping per order. This can be useful for someone who has only one shipping supplier.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=shipping-costs&wizard=profitblue&wizard-step=shipping&step=6',
						'redirect' => 'no',
						'class' => 'insert-shipping-cost',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    6 => array(
                        'id' => 'wizard-shipping-calendar',
                        'title' => esc_html__( '6. Make sure that you set the correct date range.', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Here you have to select the date range where you want the shipping costs to operate.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=payment-fees&wizard=profitblue&wizard-step=payment&step=1',
						'redirect' => 'yes',
						'class' => 'cost-years',
						'left' => 'right',
						'top' => 'bottom',
						'triangle' => 'rt'
                    ),
                )
            ),
            'payment' => array(
                'steps' => array(
                    1 => array(
                        'id' => 'wizard-payment-all',
                        'title' => esc_html__( '1. Set your payment fees', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'There are displayed all of the payment methods you use. If there are any fees associated with these payment methods, set them up.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=payment-fees&wizard=profitblue&wizard-step=payment&step=2',
						'redirect' => 'no',
						'class' => 'form-section-inner',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    2 => array(
                        'id' => 'wizard-payment-percent',
                        'title' => esc_html__( '2. Set the % you pay to the payment provider', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Usually, e-shoppers pay some percentage (fee) for every order paid by a specific payment method. These numbers typically fluctuate between 2-5%.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=payment-fees&wizard=profitblue&wizard-step=payment&step=3',
						'redirect' => 'no',
						'class' => 'payment-percent',
						'left' => 'left',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    3 => array(
                        'id' => 'wizard-payment-fixed',
                        'title' => esc_html__( '3. Set the fixed amount for every transaction', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'If you do not pay a percentage (of the order amount) but pay a fixed amount, insert it here. You can also use some combination of percentage and fixed amount.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=payment-fees&wizard=profitblue&wizard-step=payment&step=4',
						'redirect' => 'no',
						'class' => 'payment-amount',
						'left' => 'right',
						'top' => 'top',
						'triangle' => 'rb'
                    ),
                    4 => array(
                        'id' => 'wizard-payment-calendar',
                        'title' => esc_html__( '4. Make sure you set the correct data range.', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Here you have to select the date range where you want the payment fees to operate.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=shop-settings&wizard=profitblue&wizard-step=shop&step=1',
						'redirect' => 'yes',
						'class' => 'cost-years',
						'left' => 'right',
						'top' => 'bottom',
						'triangle' => 'rt'
                    ),
                )
            ),
            'shop' => array(
                'steps' => array(
                    1 => array(
                        'id' => 'wizard-shop-all',
                        'title' => esc_html__( '1. Set general shop setting', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'You have to set some general settings before starting to browse the Profit Tracker. These things relate to your type of business and the country where you live.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=shop-settings&wizard=profitblue&wizard-step=shop&step=2',
						'redirect' => 'no',
						'class' => 'form-section-inner',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    2 => array(
                        'id' => 'wizard-shop-exclude-orders',
                        'title' => esc_html__( '2. Exclude orders with “pending payment“ status from all the reports.', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'If activated, this option will exclude “pending payment“ and “processing” order statuses from all analyses. This option is ideal for e-shops that have many unpaid orders. If they would include them in the reports, they would be misleading.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=shop-settings&wizard=profitblue&wizard-step=shop&step=3',
						'redirect' => 'no',
						'class' => 'shop-setting-first-line',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    3 => array(
                        'id' => 'wizard-shop-tax-income',
                        'title' => esc_html__( "3. Set the income tax rate of your country", 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'It is the tax you pay to the government after making a profit. It is necessary to note that every country has a different income tax rate. Important notice: this does not have anything in common with VAT.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=shop-settings&wizard=profitblue&wizard-step=shop&step=4',
						'redirect' => 'no',
						'class' => 'shop-setting-second-line',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    4 => array(
                        'id' => 'wizard-shop-calendar',
                        'title' => esc_html__( '4. Make sure you set the correct data range.', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Here you have to select the date range where you want the shop settings to apply.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=manage-notifications&wizard=profitblue&wizard-step=emails&step=1',
						'redirect' => 'yes',
						'class' => 'cost-years',
						'left' => 'right',
						'top' => 'bottom',
						'triangle' => 'rt'
                    )
                )
            ),
            'emails' => array(
				'steps' => array( 
                    1 => array(
                        'id' => 'wizard-emails-all',
                        'title' => esc_html__( '1. Set e-mail notifications', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'To ensure the comfort of using Profitblue, you can choose among the e-mails you want us to send you. It is something like a frequent “newsletter“ about your financial situation.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=manage-notifications&wizard=profitblue&wizard-step=emails&step=2',
						'redirect' => 'no',
						'class' => 'form-section-inner',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    2 => array(
                        'id' => 'wizard-emails-daily',
                        'title' => esc_html__( '2. Enable e-mail daily reporting', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'We will deliver the daily e-mail report every day, with data from the previous day.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=manage-notifications&wizard=profitblue&wizard-step=emails&step=3',
						'redirect' => 'no',
						'class' => ' daily-report-line',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    3 => array(
                        'id' => 'wizard-emails-weekly',
                        'title' => esc_html__( '3. Enable e-mail weekly reporting', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'We will deliver the weekly e-mail report every Monday. with data from the previous week.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=manage-notifications&wizard=profitblue&wizard-step=emails&step=4',
						'redirect' => 'no',
						'class' => ' weekly-report-line',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    4 => array(
                        'id' => 'wizard-emails-monthly',
                        'title' => esc_html__( '4. Enable e-mail monthly reporting', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'We will deliver the monthly e-mail report on the 1st day of the month. with data from the previous month.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=data-settings&subpage=manage-notifications&wizard=profitblue&wizard-step=emails&step=5',
						'redirect' => 'no',
						'class' => ' monthly-report-line',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    5 => array(
                        'id' => 'wizard-emails-yearly',
                        'title' => esc_html__( '5. Enabe e-mail yearly reporting', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'We will deliver the monthly e-mail report on the 1st day of the month. with data from the previous month.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=profitblue&wizard=profitblue&wizard-step=overwiev&step=1',
						'redirect' => 'yes',
						'class' => 'notifications-top-line',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    )
                )
            ),
            'overwiev' => array(
				'steps' => array( 
                    1 => array(
                        'id' => 'wizard-overwiev-all',
                        'title' => esc_html__( '1. Everything you need to analyze your company', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( "We provide you with only the most essential data indicators. Each is important and has several meanings in financial analysis. Get slowly through every indicator and analyze the health of your company.", 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=profitblue&wizard=profitblue&wizard-step=overwiev&step=2',
						'redirect' => 'no',
						'class' => 'overwiev-item',
						'left' => 'middle',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    2 => array(
                        'id' => 'wizard-overwiev-top',
                        'title' => esc_html__( '2. Main tabs', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'They consist of the most important data; every company should mainly focus on them. They will quickly and easily help you with orientation in your financial situation.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=profitblue&wizard=profitblue&wizard-step=overwiev&step=3',
						'redirect' => 'no',
						'class' => 'overwiev-item-first',
						'left' => 'middle',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    3 => array(
                        'id' => 'wizard-overwiev-top-average',
                        'title' => esc_html__( '3. Secondary tabs', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Secondary tabs Add further insight into your orders and e-shop statistics.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=profitblue&wizard=profitblue&wizard-step=overwiev&step=4',
						'redirect' => 'no',
						'class' => 'overwiev-item-second',
						'left' => 'middle',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    4 => array(
                        'id' => 'wizard-overwiev-main-graph',
                        'title' => esc_html__( '4. Main graph', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'This graph can display multiple values from revenue through profits to the margins. It serves to show you trends and previous year comparisons.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=profitblue&wizard=profitblue&wizard-step=overwiev&step=5',
						'redirect' => 'no',
						'class' => 'overview-main-graph',
						'left' => 'middle',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    5 => array(
                        'id' => 'wizard-overwiev-orders',
                        'title' => esc_html__( '5. Orders snapshot', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Here you can see the snapshot of your orders. If you want to see all the orders (with all the data), switch to “orders“ section', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=profitblue&wizard=profitblue&wizard-step=overwiev&step=6',
						'redirect' => 'no',
						'class' => 'overview-latest-orders',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    6 => array(
                        'id' => 'wizard-overwiev-net-profit',
                        'title' => esc_html__( '6. Net profit/loss analysis', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Net profit/loss is the most advanced analysis. It gives the final number/amount of how much money you make/lose. If the net profit/loss is positive, then you earn money. If it is negative, you lose them.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=profitblue&wizard=profitblue&wizard-step=overwiev&step=7',
						'redirect' => 'no',
						'class' => 'overview-analysis-net',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    7 => array(
                        'id' => 'wizard-overwiev-custom-cost',
                        'title' => esc_html__( '7. Custom cost analysis', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Custom cost analysis will give you some additional insight into the percentage distribution of your cost.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=profitblue&wizard=profitblue&wizard-step=overwiev&step=7',
						'redirect' => 'no',
						'class' => 'overview-analysis-custom',
						'left' => 'half',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    8 => array(
                        'id' => 'wizard-overwiev-ads-costs',
                        'title' => esc_html__( '8. Ad cost analysis', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'This graph will show you all the costs associated with advertising. This can include several platforms (meta, Google Ads), e-mailing, or even billboards.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=profitblue&wizard=profitblue&wizard-step=overwiev&step=8',
						'redirect' => 'no',
						'class' => 'overview-ads-analysis',
						'left' => 'middle',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    9 => array(
                        'id' => 'wizard-overwiev-products',
                        'title' => esc_html__( '9. Products sold analysis', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Products sold analysis displays the carousel where you can sort your products by best-selling, most profitable, or least profitable.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=profitblue&wizard=profitblue&wizard-step=overwiev&step=9',
						'redirect' => 'no',
						'class' => 'overview-product-sold-analysis',
						'left' => 'middle',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
                    10 => array(
                        'id' => 'wizard-overwiev-category',
                        'title' => esc_html__( '10. Category analysis', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Here you can select some of your categories and compare their profitability. This can help if you have many suppliers so that you can compare their margins.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=profitblue&wizard=profitblue&wizard-step=overwiev&step=10',
						'redirect' => 'no',
						'class' => 'overview-category-sold-analysis',
						'left' => 'middle',
						'top' => 'top',
						'triangle' => 'lb'
                    ),
					11 => array(
                        'id' => 'wizard-overwiev-category',
                        'title' => esc_html__( '11. Date range', 'profitblue-financial-reporting-for-woocommerce' ),
                        'description' => esc_html__( 'Set the time range where you want the reports to be displayed.', 'profitblue-financial-reporting-for-woocommerce' ),
						'next_url' => admin_url() . 'admin.php?page=profitblue&wizard-proccess=finish',
						'redirect' => 'finish',
						'class' => 'product-datepicker-datepicker',
						'left' => 'right',
						'top' => 'bottom',
						'triangle' => 'rt'
                    ),
                ),
			),			
		);
	}
}

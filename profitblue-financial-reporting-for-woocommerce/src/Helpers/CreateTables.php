<?php

namespace ProfitBlue\Helpers;

/**
 * CreateTables
 * 
 * This class create database tables after activation
 * 
 * @since 1.0.0
 * 
 */
class CreateTables {
	
	/**
	 * create_cogs_tables
	 * Create database tables
	 *
	 * @since    1.0.0
	 * @access public
	 * 
	 * @return null
	 */
	public static function create_cogs_tables() {

		global $wpdb;
		$wpdb->get_results(
			$wpdb->prepare(
				"CREATE TABLE IF NOT EXISTS %i (
					`ID` bigint(255) NOT NULL,
					`sku` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
					`product_id` bigint(255) NOT NULL,
					`product_name` longtext NOT NULL,
					`cogs` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
					`period` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
					`year` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
			  	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
				array(
					$wpdb->prefix . 'profitblue_cogs'
				)
			)
		);
		$wpdb->get_results(
			$wpdb->prepare(
				"CREATE TABLE IF NOT EXISTS %i (
			`ID` bigint(255) NOT NULL,
			`name` varchar(255) NOT NULL,
			`type` varchar(100) NOT NULL,
			`year` varchar(100) DEFAULT NULL,
			`date_start` date DEFAULT NULL,
			`date_end` date DEFAULT NULL
		  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
				array(
					$wpdb->prefix . 'profitblue_products_periods'
				)
			)
		);
		
		  
		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				ADD PRIMARY KEY (`ID`);",
				array(
					$wpdb->prefix . 'profitblue_cogs'
				)
			)
		);
		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				ADD PRIMARY KEY (`ID`);",
				array(
					$wpdb->prefix . 'profitblue_products_periods'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;",
				array(
					$wpdb->prefix . 'profitblue_cogs'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;",
				array(
					$wpdb->prefix . 'profitblue_products_periods'
				)
			)
		);		
		
	}

	/**
	 * create_cogs_tables
	 * Create database tables
	 *
	 * @since    1.0.0
	 * @access public
	 * 
	 * @return null
	 */
	public static function create_tables() {

		global $wpdb; 

		$wpdb->get_results(
			$wpdb->prepare(
				"CREATE TABLE IF NOT EXISTS %i (
					`ID` bigint(255) NOT NULL,
					`label` longtext CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci DEFAULT NULL,
					`amount` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`date_start` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`date_end` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`year` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`month-1` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
					`month-2` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`month-3` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`month-4` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`month-5` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`month-6` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`month-7` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`month-8` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`month-9` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`month-10` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`month-11` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`month-12` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`type` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`manually` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`amount-type` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
				array(
					$wpdb->prefix . 'profitblue_ccai'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				ADD PRIMARY KEY (`ID`);",
				array(
					$wpdb->prefix . 'profitblue_ccai'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;",
				array(
					$wpdb->prefix . 'profitblue_ccai'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"CREATE TABLE IF NOT EXISTS %i (
					`ID` bigint(255) NOT NULL,
					`date` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`year` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`month` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`day` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`week` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`amount` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
				array(
					$wpdb->prefix . 'profitblue_ccai_items'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				ADD PRIMARY KEY (`ID`);",
				array(
					$wpdb->prefix . 'profitblue_ccai_items'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;",
				array(
					$wpdb->prefix . 'profitblue_ccai_items'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"CREATE TABLE IF NOT EXISTS %i (
					`ID` int(255) NOT NULL,
					`order_id` bigint(255) NOT NULL,
					`order_date` bigint(50) NOT NULL,
					`formated_date` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
					`customer_name` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
					`order_status` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
					`order_payment_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`order_payment_label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`order_shipping_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`order_shipping_label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`country` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
					`order_subtotal` float NOT NULL,
					`order_tax` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`order_products_subtotal` decimal(20,8) DEFAULT NULL,
					`order_products_tax` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`order_shipping_subtotal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`order_shipping_tax` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`order_fees_subtotal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`order_fees_tax` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`order_payment_cost` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`order_shipping_cost` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`pcs` int(50) NOT NULL,
					`cogs` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
					`gross_margin` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
					`percent` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
					`variable` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
					`status` varchar(5) NOT NULL DEFAULT 'i'
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
				array(
					$wpdb->prefix . 'profitblue_orders'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				ADD PRIMARY KEY (`ID`);",
				array(
					$wpdb->prefix . 'profitblue_orders'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;",
				array(
					$wpdb->prefix . 'profitblue_orders'
				)
			)
		);
		
		$wpdb->get_results(
			$wpdb->prepare(
				"CREATE TABLE IF NOT EXISTS %i (
				`ID` bigint(255) NOT NULL,
				`order_id` bigint(255) NOT NULL,
				`order_item_id` bigint(255) NOT NULL,
				`item_name` varchar(255) NOT NULL,
				`item_type` varchar(100) NOT NULL,
				`item_qty` varchar(50) NOT NULL,
				`item_tax_class` varchar(50) NOT NULL,
				`item_subtotal` varchar(50) NOT NULL,
				`item_subtotal_tax` varchar(50) NOT NULL,
				`item_total` varchar(50) NOT NULL,
				`item_total_tax` varchar(50) NOT NULL,
				`item_cogs` varchar(50) NOT NULL,
				`product_id` bigint(255) NOT NULL,
				`sku` varchar(100) NOT NULL,
				`profit` varchar(100) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;",
				array(
					$wpdb->prefix . 'profitblue_order_items'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				ADD PRIMARY KEY (`ID`);",
				array(
					$wpdb->prefix . 'profitblue_order_items'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;",
				array(
					$wpdb->prefix . 'profitblue_order_items'
				)
			)
		);
		
		$wpdb->get_results(
			$wpdb->prepare(
				"CREATE TABLE IF NOT EXISTS %i (
					`ID` bigint(255) NOT NULL,
					`label` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`payment` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`percent` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`amount` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`payment_period_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`year` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
				array(
					$wpdb->prefix . 'profitblue_payments'
				)
			)
		);
		  
		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				ADD PRIMARY KEY (`ID`);",
				array(
					$wpdb->prefix . 'profitblue_payments'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;",
				array(
					$wpdb->prefix . 'profitblue_payments'
				)
			)
		);
		
		$wpdb->get_results(
			$wpdb->prepare(
				"CREATE TABLE IF NOT EXISTS %i (
					`ID` bigint(255) NOT NULL,
					`name` varchar(255) NOT NULL,
					`type` varchar(100) NOT NULL,
					`year` varchar(100) DEFAULT NULL,
					`date_start` date DEFAULT NULL,
					`date_end` date DEFAULT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
				array(
					$wpdb->prefix . 'profitblue_payment_periods'
				)
			)
		);
		  		
		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				ADD PRIMARY KEY (`ID`);",
				array(
					$wpdb->prefix . 'profitblue_payment_periods'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;",
				array(
					$wpdb->prefix . 'profitblue_payment_periods'
				)
			)
		);
		
		$wpdb->get_results(
			$wpdb->prepare(
				"CREATE TABLE IF NOT EXISTS %i (
					`ID` bigint(255) NOT NULL,
					`product_id` bigint(255) NOT NULL,
					`name` longtext NOT NULL,
					`type` text NOT NULL,
					`stock_status` text NOT NULL,
					`stock_quantity` int(10) NOT NULL,
					`sku` text NOT NULL,
					`image` longtext NOT NULL,
					`price` float NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
				array(
					$wpdb->prefix . 'profitblue_products'
				)
			)
		);
		
		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				ADD PRIMARY KEY (`ID`);",
				array(
					$wpdb->prefix . 'profitblue_products'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;",
				array(
					$wpdb->prefix . 'profitblue_products'
				)
			)
		);
		  
		$wpdb->get_results(
			$wpdb->prepare(
				"CREATE TABLE IF NOT EXISTS %i (
					`ID` bigint(255) NOT NULL,
					`type` varchar(100) NOT NULL,
					`label` longtext DEFAULT NULL,
					`amount_type` varchar(100) DEFAULT NULL,
					`amount` varchar(100) DEFAULT NULL,
					`period_type` varchar(100) DEFAULT NULL,
					`year` varchar(100) DEFAULT NULL,
					`period_start` varchar(100) DEFAULT NULL,
					`period_end` varchar(100) DEFAULT NULL,
					`cod_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci DEFAULT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
				array(
					$wpdb->prefix . 'profitblue_shiping_costs'
				)
			)
		);
		
		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				ADD PRIMARY KEY (`ID`);",
				array(
					$wpdb->prefix . 'profitblue_shiping_costs'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;",
				array(
					$wpdb->prefix . 'profitblue_shiping_costs'
				)
			)
		);
		  
		$wpdb->get_results(
			$wpdb->prepare(
				"CREATE TABLE IF NOT EXISTS %i (
					`ID` bigint(255) NOT NULL,
					`shipping_costs_id` bigint(255) NOT NULL,
					`shipping_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
					`shipping_price` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
					`shipping_cod` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
				array(
					$wpdb->prefix . 'profitblue_shipping_costs_data'
				)
			)
		);
		
		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				ADD PRIMARY KEY (`ID`);",
				array(
					$wpdb->prefix . 'profitblue_shipping_costs_data'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;",
				array(
					$wpdb->prefix . 'profitblue_shipping_costs_data'
				)
			)
		);
		
		$wpdb->get_results(
			$wpdb->prepare(
				"CREATE TABLE IF NOT EXISTS %i (
					`ID` bigint(255) NOT NULL,
					`exclude` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`tax_income` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
					`period_id` varchar(100) DEFAULT NULL,
					`year` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
				array(
					$wpdb->prefix . 'profitblue_shop_setting'
				)
			)
		);
		
		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				ADD PRIMARY KEY (`ID`);",
				array(
					$wpdb->prefix . 'profitblue_shop_setting'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;",
				array(
					$wpdb->prefix . 'profitblue_shop_setting'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"CREATE TABLE IF NOT EXISTS %i (
					`ID` bigint(255) NOT NULL,
					`name` varchar(255) NOT NULL,
					`type` varchar(100) NOT NULL,
					`year` varchar(100) DEFAULT NULL,
					`date_start` date DEFAULT NULL,
					`date_end` date DEFAULT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
				array(
					$wpdb->prefix . 'profitblue_shop_setting_periods'
				)
			)
		);
		  
		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				ADD PRIMARY KEY (`ID`);",
				array(
					$wpdb->prefix . 'profitblue_shop_setting_periods'
				)
			)
		);

		$wpdb->get_results(
			$wpdb->prepare(
				"ALTER TABLE %i
				MODIFY `ID` bigint(255) NOT NULL AUTO_INCREMENT;",
				array(
					$wpdb->prefix . 'profitblue_shop_setting_periods'
				)
			)
		);		
		
	}

	
}
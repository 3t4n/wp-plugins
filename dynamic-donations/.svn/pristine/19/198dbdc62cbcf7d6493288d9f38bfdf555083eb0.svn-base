<?php

class DyDo_DB
{

	public static function create_tables()
	{
		self::create_table();
	}

	public static function query(string $query)
	{
		global $wpdb;

		return $wpdb->get_results($wpdb->prepare($query));
	}

	public static function insert(string $tablename, array $data)
	{
		global $wpdb;

		// $data['currency'] = strtoupper( $data['currency'] );

		if ($wpdb->insert($tablename, $data)) {
			return $wpdb->insert_id;
		} else {
			return new WP_Error('dydo_db', 'Payment could not be saved in DB');
		}
	}

	public static function get(string $tablename, array $where)
	{
		global $wpdb;
		$query   = "SELECT * FROM {$tablename} WHERE {$where['key']} = %s ";
		$prepare = $wpdb->prepare($query, $where['value']);
		return $wpdb->get_row($prepare);
	}

	public static function update(string $tablename, array $data, array $where)
	{
		global $wpdb;
		$result = $wpdb->update($tablename, $data, $where);

		return $result;
	}

	private static function create_table()
	{
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();

		dbDelta(
			"CREATE TABLE IF NOT EXISTS `dydo_gateways` (
			`id` int(11) NOT NULL UNIQUE AUTO_INCREMENT,
			`payment_gateway` varchar(45) UNIQUE NOT NULL,
			PRIMARY KEY  (`id`))
			$charset_collate;"
		);

		dbDelta(
			"CREATE TABLE IF NOT EXISTS `dydo_onetime_donations` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`user_id` int(11) NOT NULL,
			`customer_id` varchar(255) NOT NULL,
			`transaction_id` varchar(255) NOT NULL,
			`amount` float NOT NULL,
			`currency` varchar(5) NOT NULL,
			`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`confirmed` TINYINT NOT NULL DEFAULT '0',
			`dydo_gateways_id` int(11) NOT NULL,
			PRIMARY KEY  (`id`,`dydo_gateways_id`),
			UNIQUE KEY `id` (`id`),
			KEY `dydo_donations_transaction_id_uindex` (`transaction_id`),
			KEY `fk_dydo_onetime_donations_dydo_gateways1_idx` (`dydo_gateways_id`),
			CONSTRAINT `fk_dydo_onetime_donations_dydo_gateways1` FOREIGN KEY (`dydo_gateways_id`) REFERENCES `dydo_gateways` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION )
			$charset_collate;"
		);

		dbDelta(
			"CREATE TABLE IF NOT EXISTS `dydo_subscriptions` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`user_id` int(11) NOT NULL,
			`subscription_id` varchar(45) NOT NULL,
			`customer_id` varchar(255) NOT NULL,
			`active` tinyint(4) NOT NULL DEFAULT '0',
			`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
			`amount` float NOT NULL,
			`next_payment_attempt` int(20) NOT NULL,
			`dydo_gateways_id` int(11) NOT NULL,
			PRIMARY KEY (`id`,`dydo_gateways_id`),
			UNIQUE KEY `id_UNIQUE` (`id`),
			KEY `subscription_id_UNIQUE` (`subscription_id`),
			KEY `fk_dydo_subscriptions_dydo_gateways_idx` (`dydo_gateways_id`),
			CONSTRAINT `fk_dydo_subscriptions_dydo_gateways` FOREIGN KEY (`dydo_gateways_id`) REFERENCES `dydo_gateways` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION)
			$charset_collate;"
		);

		dbDelta(
			"CREATE TABLE IF NOT EXISTS `dydo_subscription_donations` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`transaction_id` varchar(255) NOT NULL,
			`amount` float NOT NULL,
			`currency` varchar(5) NOT NULL,
			`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`confirmed` TINYINT NOT NULL DEFAULT '1',
			`dydo_subscriptions_id` int(11) NOT NULL,
			PRIMARY KEY (`id`,`dydo_subscriptions_id`),
			UNIQUE KEY `id` (`id`),
			UNIQUE KEY `dydo_donations_transaction_id_uindex` (`transaction_id`),
			KEY `fk_dydo_donations_dydo_subscriptions1_idx` (`dydo_subscriptions_id`),
			CONSTRAINT `fk_dydo_donations_dydo_subscriptions1` FOREIGN KEY (`dydo_subscriptions_id`) REFERENCES `dydo_subscriptions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION)
			$charset_collate;"
		);
		$wpdb->query("DROP VIEW IF EXISTS  `dydo_donations`;");
		$wpdb->query(
			"CREATE VIEW `dydo_donations` AS
				SELECT 
					`donations`.`user_id` AS `user_id`,
					`donations`.`subscription_id` AS `subscription_id`,
					`donations`.`subscription_base_amount` AS `subscription_base_amount`,
					`donations`.`next_payment_attempt` AS `next_payment_attempt`,					
					`donations`.`customer_id` AS `customer_id`,
					`donations`.`transaction_id` AS `transaction_id`,
					`donations`.`amount` AS `amount`,
					`donations`. `currency` AS `currency`,
					`donations`.`type` AS `type`,
					`donations`.`created_at` AS `created_at`,
					`donations`.`updated_at` AS `updated_at`,
					`donations`.`active` AS `active`,
					`dg`.`payment_gateway` AS `payment_gateway`
				FROM
					(
						(
							(SELECT 
								CONVERT('recurring' USING $wpdb->charset) AS `type` ,
								`ds`.`subscription_id` AS `subscription_id`,
								`ds`.`amount` AS `subscription_base_amount`,
								`ds`.`next_payment_attempt` AS `next_payment_attempt`,
								`ds`.`user_id` AS `user_id`,
								`ds`.`customer_id` AS `customer_id`,
								`dsd`.`transaction_id` AS `transaction_id`,
								`dsd`.`created_at` AS `created_at`,
								`dsd`.`updated_at` AS `updated_at`,
								`ds`.`active` AS `active`,
								`ds`.`dydo_gateways_id` AS `dydo_gateways_id`,
								`dsd`.`amount` AS `amount`,
					   			`dsd`. `currency` AS `currency`
							FROM
							(`dydo_subscriptions` `ds`
								JOIN `dydo_subscription_donations` `dsd` ON ((`ds`.`id` = `dsd`.`dydo_subscriptions_id`)))) UNION ALL 
					  		SELECT 
							  	CONVERT('onetime' USING $wpdb->charset) AS `type`,
								'' AS `subscription_id`,
								0 AS `subscription_base_amount`,
								''  AS `next_payment_attempt`,
								`dod`.`user_id` AS `user_id`,
								`dod`.`customer_id` AS `customer_id`,
								`dod`.`transaction_id` AS `transaction_id`,
								`dod`.`created_at` AS `created_at`,
								`dod`.`updated_at` AS `updated_at`,
								0 AS `active`,
								`dod`.`dydo_gateways_id` AS `dydo_gateways_id`,
								`dod`.`amount` AS `amount`,
								`dod`. `currency` AS `currency`
							FROM `dydo_onetime_donations` `dod` WHERE confirmed =1) `donations`
					JOIN `dydo_gateways` `dg` ON ((`dg`.`id` = `donations`.`dydo_gateways_id`)
					)
				)"
		);
		if (empty(self::get(
			DYDO_PAYMENT_GATEWAY_TABLENAME,
			array(
				'key'   => 'payment_gateway',
				'value' => 'stripe',
			),
		))) {
			self::insert(
				DYDO_PAYMENT_GATEWAY_TABLENAME,
				array(
					'payment_gateway' => 'stripe',
					'id'              => 2,
				)
			);
		};

		if (empty(self::get(
			DYDO_PAYMENT_GATEWAY_TABLENAME,
			array(
				'key'   => 'payment_gateway',
				'value' => 'woocommerce',
			)
		))) {
			self::insert(
				DYDO_PAYMENT_GATEWAY_TABLENAME,
				array(
					'payment_gateway' => 'woocommerce',
					'id'              => 1,
				)
			);
		};
		$row = $wpdb->get_results("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'dydo_subscriptions' AND COLUMN_NAME = 'start_date'");
		if (empty($row)) {
			$sql = "ALTER TABLE dydo_subscriptions ADD COLUMN `start_date` int(20) NOT NULL DEFAULT 0";
			$result = $wpdb->query($sql);;
			if ($result !== false) {
				$wpdb->query(
					$wpdb->prepare(
						"UPDATE dydo_subscriptions SET start_date= UNIX_TIMESTAMP(created_at)",
						[]
					)
				);
			}
		}
	}
}

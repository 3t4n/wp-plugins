<?php

if(!defined('ABSPATH')){
    die;
}

class Minutos_installSchema
{
    public function createSchema()
    {
        return $this->privateCreateSchema();
    }

    private function privateCreateSchema()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . '99minutos_vendors';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id int NOT NULL AUTO_INCREMENT,
            business varchar(55) NOT NULL,
            sellerName varchar(55) NOT NULL,
            sellerLastName varchar(55) NOT NULL,
            Phone varchar(55) NOT NULL,
            Email varchar(55) NOT NULL,
            originAddress varchar(125) NOT NULL,
            originNumber varchar(10) NOT NULL,
            zipCode varchar(10) NOT NULL,
            Country varchar(10) DEFAULT 'MEX' NOT NULL,
            apikey varchar(40) NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    public function createSchemaShippingMethods()
    {
        return $this->privateCreateSchemaShippingMethods();
    }

    private function privateCreateSchemaShippingMethods()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . '99minutos_shippingmethods';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id int NOT NULL AUTO_INCREMENT,
            active99 tinyint DEFAULT 0 NOT NULL,
            xs_99 float DEFAULT 119 NOT NULL,
            s_99 float DEFAULT 129 NOT NULL,
            m_99 float DEFAULT 139 NOT NULL,
            l_99 float DEFAULT 149 NOT NULL,
            activeSameDay tinyint DEFAULT 0 NOT NULL,
            xs_same float DEFAULT 75 NOT NULL,
            s_same float DEFAULT 85 NOT NULL,
            m_same float DEFAULT 95 NOT NULL,
            l_same float DEFAULT 105 NOT NULL,
            xl_same float DEFAULT 275 NOT NULL,
            activeNextDay tinyint DEFAULT 0 NOT NULL,
            xs_next float DEFAULT 65 NOT NULL,
            s_next float DEFAULT 75 NOT NULL,
            m_next float DEFAULT 85 NOT NULL,
            l_next float DEFAULT 95 NOT NULL,
            xl_next float DEFAULT 249 NOT NULL,
            activeCO2 tinyint DEFAULT 0 NOT NULL,
            xs_CO2 float DEFAULT 65 NOT NULL,
            s_CO2 float DEFAULT 75 NOT NULL,
            m_CO2 float DEFAULT 85 NOT NULL,
            l_CO2 float DEFAULT 95 NOT NULL,
            xl_CO2 float DEFAULT 249 NOT NULL,
            name_99 varchar(255) DEFAULT '99 minutos' NOT NULL,
            name_same varchar(255) DEFAULT 'Same Day' NOT NULL,
            name_next varchar(255) DEFAULT 'Next Day' NOT NULL,
            name_CO2 varchar(255) DEFAULT 'CO2 free' NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    public function InstallationData()
    {
        return $this->insertInstallationData();
    }

    private function insertInstallationData()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . '99minutos_shippingmethods';
            $sql = "INSERT INTO $table_name (active99) VALUES (0)";
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $sql );
    }

    public function sellerOrdersNSettings()
    {
        return $this->privateSellerOrderNSettings();
    }

    private function privateSellerOrderNSettings()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . '99minutos_ordersnsettings';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id int NOT NULL AUTO_INCREMENT,
            orderid varchar(55) NOT NULL,
            sellerid varchar(55) NOT NULL,
            sellerName varchar(55) NOT NULL,
            time DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
            reason varchar(55) NOT NULL,
            counter99 varchar(55) NOT NULL,
            tracking99 varchar(55) NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    public function sellerOrders()
    {
        return $this->privateSellerOrder();
    }

    private function privateSellerOrder()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . '99minutos_orders';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id int NOT NULL AUTO_INCREMENT,
            receiver varchar(55) NOT NULL,
            nameReceiver varchar(55) NOT NULL,
            lastNameReceiver varchar(55) NOT NULL,
            emailReceiver varchar(55) NOT NULL,
            phoneReceiver varchar(55) NOT NULL,
            addressDestination varchar(55) NOT NULL,
            numberDestination varchar(55),
            postalCodeDestination varchar(10) NOT NULL,
            country varchar (5) DEFAULT 'MEX',
            orderid varchar (55) NOT NULL,
            deliveryType varchar(55) NOT NULL,
            packageSize varchar(55) NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}

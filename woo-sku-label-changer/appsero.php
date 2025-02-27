<?php

    /**
         * Initialize the plugin tracker
         *
         * @return void
         */
        function appsero_init_tracker_woo_sku_label_changer() {

            if ( ! class_exists( 'Appsero\Client' ) ) {
            require_once __DIR__ . '/appsero/src/Client.php';
            }

            $client = new Appsero\Client( 'e045bc51-0474-4711-9f23-bef158512403', 'SKU Label Changer For WooCommerce', __FILE__ );

            // Active insights
            $client->insights()->init();

        }

        appsero_init_tracker_woo_sku_label_changer();
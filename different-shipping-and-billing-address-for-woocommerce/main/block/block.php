<?php
add_action(
    'woocommerce_blocks_loaded',
    function() {
        require_once 'class-blocks-integration.php';
        add_action(
            'woocommerce_blocks_checkout_block_registration',
            function( $integration_registry ) {
                $integration_registry->register( new Blocks_Integration() );
            }
        );
    }
);

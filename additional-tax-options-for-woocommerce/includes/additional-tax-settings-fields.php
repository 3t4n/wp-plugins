<?php
add_filter( 'woocommerce_tax_settings','woo_additional_tax_options_plugin', 10, 2 );
function woo_additional_tax_options_plugin( $settings ) {

    $settings[] = array(
      'title' => __( 'Additional Tax Options', 'woo_additional_tax_options' ),
      'type' => 'title',
      'id' => 'additional_tax_settings',
    );

        // Checkbox 
        $settings[] = array(
          'title'    => __( 'Enable same tax-inclusive cost for all the locations', 'woocommerce' ),
          'desc'     => __( 'Charge the same tax inclusive cost to all users', 'woo_additional_tax_options' ),
          'id'       => 'additional_tax_options',
          'default'  => 'no',
          'type'     => 'checkbox',
          'desc_tip' => true,
          'css'      => 'width:500px;',
          'desc_tip'        => __( ' When you enter prices inclusive of tax, the cost that the customer would see would be the same, irrespective of tax rate in their location.', 'woocommerce' ),
        );

         // Checkbox
         $settings[] = array(
          'title'    => __( 'Charge standard tax for Local Pickup', 'woocommerce' ),
          'desc'     => __( 'Charge standard taxes for Local Pickup', 'woo_additional_tax_options' ),
          'id'       => 'additional_tax_options_local',
          'default'  => 'no',
          'type'     => 'checkbox',
          'desc_tip' => true,
          'css'      => 'width:500px;',
          'desc_tip'        => __( "When the customer selects Local Pickup, they would be charged based on their location instead of store's base location.", 'woocommerce' ),
        );

    $settings[] = array( 'type' => 'sectionend', 'id' => 'additional_tax_settings' );
    return $settings;
}


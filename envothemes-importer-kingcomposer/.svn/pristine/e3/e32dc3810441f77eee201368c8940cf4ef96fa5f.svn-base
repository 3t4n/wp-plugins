<?php
if (class_exists('envo_business_kingcomposer_SettingsPage'))
return;
?>
<hr>     
  <div class="kc-useful-plugins-tab">
    <h2>                     
      <?php esc_html_e( 'Envo Business useful plugins', 'envo-business' );  ?>
    </h2>                          
      <?php 
            $confing = array(
              'recommended_plugins' => array(
            		'details'   => esc_html__( 'Details', 'envo-business' ),
                'activated' => esc_html__( 'Plugin Acitve', 'envo-business' ),
            		'content' => array(
            			array(
            				'link' => 'https://wordpress.org/plugins/envothemes-importer-kingcomposer/',
                    'name' => 'Demo Layouts Import',
                    'id'   => 'envothemes-importer-kingcomposer',
            			),
            			array(
            				'link' => 'https://envothemes.com/product/envo-business-copyright/',
                    'name' => 'Copyright',
                    'id'   => 'envo-business-footer-credits',
            			),
                  array(
            				'link' => 'https://envothemes.com/product/envo-business-colors-and-typography/',
                    'name' => 'Colors & Typography',
                    'id'   => 'envo-business-colors-typography',
            			),
                  array(
            				'link' => 'https://envothemes.com/product/envo-business-kingcomposer-pro-support/',
                    'name' => 'KingComposer PRO Support',
                    'id'   => 'envo-business-kingcomposer',
            			),
                  array(
            				'link' => 'https://envothemes.com/product/envo-business-mega-menu/',
                    'name' => 'Mega Menu Support',
                    'id'   => 'envo-business-mega-menu',
            			),
                  array(
            				'link' => 'https://envothemes.com/product/envo-business-woocommerce-support/',
                    'name' => 'WooCommerce Support',
                    'id'   => 'envo-business-woocommerce',
            			),
                  array(
            				'link' => 'https://envothemes.com/product/envo-business-lazy-load-images/',
                    'name' => 'Lazy Load Images',
                    'id'   => 'envo-business-lazy-load-images',
            			),
            		),
          	),
          );
          $recommended_plugins = $confing['recommended_plugins'];
    			if ( ! empty( $recommended_plugins ) ) {
    				if ( ! empty( $recommended_plugins['content'] ) && is_array( $recommended_plugins['content'] ) ) {
            echo '<div class="recommended-plugins" >';
					   foreach ( $recommended_plugins['content'] as $recommended_plugins_item ) {
                echo '<div class="plugin-box" >';
                	echo '<div class="plugin-box-inner ' . esc_attr( $recommended_plugins_item['id'] ) . '" >';
                    echo esc_html( $recommended_plugins_item['name'] );
                  echo '</div>';
                  echo '<div class="plugin-box-detail" >';
                    if ( is_plugin_active( $recommended_plugins_item['id'] .'/' . $recommended_plugins_item['id'] . '.php' ) ) {
                      echo esc_html( $recommended_plugins['activated'] );
                    } else {
                    echo '<a class="install-now button" target="_blank" href="' . esc_url( $recommended_plugins_item['link'] ) . '" >';
                      echo esc_html( $recommended_plugins['details'] );
                    echo '</a>';
                    }
                  echo '</div>';
                echo '</div>';
             }
            echo '</div>';
            }
          }
        ?>           
</div>
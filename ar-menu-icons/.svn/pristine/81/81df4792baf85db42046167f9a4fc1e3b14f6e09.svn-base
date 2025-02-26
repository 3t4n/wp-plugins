<?php
    if ( $icon_source == 'dashicon' ){

        $icons_json = wp_remote_get(ARMICN_DIR_URL . '/admin/assets/lib/dashicon/dashicons.json');
        $icons = json_decode(wp_remote_retrieve_body($icons_json), true);
        
        if ($icons){
            foreach ($icons as $key => $icon_class) : ?>
                <button class="armicn-icon-button" icon_class="dashicons dashicons-<?php echo esc_attr($key); ?>">
                    <span class="dashicons dashicons-<?php echo esc_attr($key); ?>"></span>
                    <span class="icon-name"><?php echo esc_attr($key); ?></span>
                </button>
            <?php endforeach;
        }else{ ?>
            <p><?php esc_html_e('No icons available.', 'ar-menu-icons'); ?></p>
        <?php } 

    }else if($icon_source == 'fontawesome'){

        $icons_json = wp_remote_get(ARMICN_DIR_URL . '/admin/assets/lib/font-awesome/json/solid.json');;
        $icons = json_decode(wp_remote_retrieve_body($icons_json), true);

        try {
            $icons = json_decode( $icons_json['body'] );
            $icons = json_decode(wp_json_encode($icons), true);
            $icons = $icons['icons'];
          } catch ( Exception $ex ) {
            $icons = null;
          }
    
        foreach ($icons as $key => $icon) {
            ?>
                <button class="armicn-icon-button" icon_class="fas fa-<?php echo esc_attr($key); ?>">
                    <span class="fas fa-<?php echo esc_attr($key); ?>"></span>
                    <span class="icon-name"><?php echo esc_attr($key); ?></span>
                </button>
            <?php
        }

    }

    




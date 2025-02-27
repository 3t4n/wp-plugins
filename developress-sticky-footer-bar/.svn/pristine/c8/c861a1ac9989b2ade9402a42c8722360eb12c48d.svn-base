<?php
function aggiungi_campo_select_menu($item_id, $item, $depth, $args, $id) {

        // Ottieni il percorso assoluto del file FontAwesome.php
        $fontawesome_file = plugin_dir_path(__FILE__) . 'FontAwesome.php';
        // Verifica se il file esiste prima di includerlo
        if (file_exists($fontawesome_file)) {
            require_once $fontawesome_file;
        }
        
        // Ottieni il percorso assoluto del file JSON
        $json_path = plugin_dir_path(__FILE__) . 'FontAwesome-v5.0.9-Free.json';
        // Leggi il contenuto del file JSON
        $json_content = file_get_contents($json_path);
        // Decodifica il JSON in un array
        $fontawesome_icons = json_decode($json_content, true);

        sort($fontawesome_icons);
        
        // Recupera il valore corrente
        $current_icon = get_post_meta($item_id, '_menu_item_extra', true);
        ?>
        <p class="select-icon-menu description description-wide">
            <label for="edit-menu-item-extra-<?php echo esc_attr($item_id); ?>">
            <?php echo __( 'Select icon', 'developress_sticky_footer_bar' ); ?><br />
                <select id="edit-menu-item-extra-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-custom" name="menu-item-extra[<?php echo esc_attr($item_id); ?>]">
                    <option value=""><<< <?php echo __( 'Select icon', 'developress_sticky_footer_bar' ); ?> >>></option>
                    <?php foreach ($fontawesome_icons as $icon_class): ?>
                        <option value="<?php echo esc_attr($icon_class); ?>" <?php selected($current_icon, $icon_class); ?>>
                            <?php echo esc_html($icon_class); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
        </p>
        <?php
    }

add_action('wp_nav_menu_item_custom_fields', 'aggiungi_campo_select_menu', 10, 5);

// Salva il valore del campo personalizzato quando l'elemento del menu viene aggiornato
function salva_campo_select_menu($menu_id, $menu_item_db_id, $args) {
    if (isset($_POST['menu-item-extra'][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, '_menu_item_extra', sanitize_text_field($_POST['menu-item-extra'][$menu_item_db_id]));
    }
}
add_action('wp_update_nav_menu_item', 'salva_campo_select_menu', 10, 3);


// Funzione per verificare lo stato di selezione di una posizione di menu specifica
function verifica_stato_checkbox() {
    $theme_mods = get_theme_mods();
    if (!empty($theme_mods['nav_menu_locations']) && array_key_exists('stikybar', $theme_mods['nav_menu_locations'])) {
        $menu_id = $theme_mods['nav_menu_locations']['stikybar'];
        return !empty($menu_id) && is_nav_menu($menu_id);
    }
    return false;
}

// Mostra un messaggio di notifica nella pagina di gestione dei menu e inietta JS per la logica di visualizzazione
function mostra_messaggio_personalizzato_e_script() {
    global $pagenow;
    if ($pagenow == 'nav-menus.php') {
        $checkbox_selezionato = verifica_stato_checkbox();

        if ($checkbox_selezionato) {
            echo '
            <div class="notice notice-success is-dismissible">
            
            
            <p><img class="logo-backend-small" src=" '. plugin_dir_url( __FILE__ ).'/images/developress-logo.png">' . __( 'Fantastic! This menu will be shown in the "Sticky Footer Bar" of this web site.', 'developress_sticky_footer_bar' ) . '</p>
            </div>';
            $display = "block";
        } else {
            echo '
            <div class="notice notice-warning is-dismissible">
            <p><img class="logo-backend-small" src=" '. plugin_dir_url( __FILE__ ).'/images/developress-logo.png">' . __( 'Should this menu be assigned to the "Sticky Footer Bar"? If so, assign the "Stikybar" position to this menu and then save the menu.', 'developress_sticky_footer_bar' ) . '</p>
            </div>';
            $display = "none";
        }


        echo "<script type='text/javascript'>
                jQuery(document).ready(function($) {
                    $('.select-icon-menu').css('display', '$display');
                });
              </script>";
    }
}
add_action('admin_notices', 'mostra_messaggio_personalizzato_e_script');
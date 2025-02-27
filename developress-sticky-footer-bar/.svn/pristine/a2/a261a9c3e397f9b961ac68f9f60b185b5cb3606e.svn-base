<div style="margin-top:5%"></div>
  <div class="footer-developress" style="display:<?php echo $hyde_bar; ?>;background-color:<?php echo $background_bar; ?>;">
    <div class="footer-item sidebar-icon-menu" style="cursor:pointer" onclick="openNav()">
        <i style="font-size: <?php echo $icon_size; ?>px; color: <?php echo $font_color;?>" class="fas fa-bars footer-icon"></i>
        <span style="font-size: <?php echo $font_size_other_label; ?>px ; color: <?php echo $font_color;?>" class="footer-label ">
            <?php echo $translation_menu_link; ?>
        </span>
    </div>    

    <?php
$menu_locations = get_nav_menu_locations(); 
$menu_id = $menu_locations['stikybar']; // Gets the ID of the menu at the 'stikybar' location
if ($menu_id) {
    // Fetch menu items using the menu ID
    $menu_items = wp_get_nav_menu_items($menu_id); // Gets the menu items from the menu ID
    if ($menu_items) {
        $count = 0;
        foreach ($menu_items as $menu_item) {
            if ($count < $number_items_first_menu ) {
                // Display each menu item in the footer
                echo '<div class="footer-item ' . $menu_item->classes[0] . '">';
                echo '<a id="link-item-style" class="link-item-bar" href="' . $menu_item->url . '">';         
                
                // Recupera l'icona FontAwesome utilizzando il meta campo personalizzato
                $icona = get_post_meta($menu_item->ID, '_menu_item_extra', true);
                
                // Verifica se esiste un'icona e la visualizza
                if (!empty($icona)) {
                    echo '<i style="font-size: '.$icon_size.'px; color: ' . $font_color . ';" class="' . esc_attr($icona) . ' footer-icon"></i>';   
                }
                
                echo '<div style="margin-top:-5px;"></div>';             
                echo '<span style="font-size: '.$font_size .'px ; color: ' . $font_color . ';" class="footer-label">' . $menu_item->title . '</span>'; // Utilizza il titolo della voce di menu come label
                echo '</a>';
                echo '</div>';
                $count++;
            }
        }
    } else {
        echo 'No menu items available';
    }
} else {
    echo 'No menu locations found.';
}
?>

    
</div>

<div id="mySidenav" class="sidenav" style="background-color:<?php echo $background_bar; ?>;">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
        <i style="font-size: <?php echo $icon_size; ?> px;color: <?php echo $font_color;?>" class="fas fa-arrow-left"></i>
        <span style="font-size: <?php echo $font_size_other_label; ?>px ; color: <?php echo $font_color;?>" class="footer-label ">
            <?php echo $translation_close_link; ?>
        </span>
    </a>

    <?php
$menu_locations = get_nav_menu_locations(); 
$menu_id = $menu_locations['stikybar'];

if ($menu_id) {
    // Fetch menu items using the menu ID again
    $menu_items = wp_get_nav_menu_items($menu_id);
    if ($menu_items) {
        $menu_items_by_parent = [];
        // Organize menu items by their parent ID
        foreach ($menu_items as $item) {
            $menu_items_by_parent[$item->menu_item_parent][] = $item;
        }
        
        $count = 0; // Initializes the counter for top-level menu items
        foreach ($menu_items_by_parent[0] as $menu_item) {
            $count++; // Increment the counter for each top-level menu item
            if ($count <= $number_items_first_menu) continue; // Skip the first higher level menu items based on the number of items you decided to show in the horizontal menu

            // Retrieve the icon for the current menu item
            $icona = get_post_meta($menu_item->ID, '_menu_item_extra', true);

            // Show the top-level menu item
            echo '<div class="side-item-box ' . $menu_item->classes[0] . '">';
            echo '<a id="link-item-style" class="link-item-bar" href="' . $menu_item->url . '">';
            if (!empty($icona)) {
                echo '<i style="font-size: '.$icon_size.'px; color: ' . $font_color . ';" class="' . esc_attr($icona) . ' footer-icon"></i>';
            }
            echo '<span class="footer-label" style="font-size: '.$font_size .'px ; margin-left:20px;color: ' . $font_color . ';">' . $menu_item->title . '</span>';
            echo "<div class='linea-div-menu'></div>"; 
            echo '</a>';
            echo '</div>';
            
            // Shows second-level menu items (if any) for the current item
            if (!empty($menu_items_by_parent[$menu_item->ID])) {
                foreach ($menu_items_by_parent[$menu_item->ID] as $sub_item) {
                    // Retrieve the icon for the sub-menu item
                    $sub_icona = get_post_meta($sub_item->ID, '_menu_item_extra', true);

                    echo '<div class="side-item-box ' . $sub_item->classes[0] . '" style="margin-left: 40px;">';
                    echo '<a class="link-item-bar" href="' . $sub_item->url . '">';
                    if (!empty($sub_icona)) {
                        echo '<i style="font-size: '.$icon_size.'px; color: ' . $font_color . ';" class="' . esc_attr($sub_icona) . ' footer-icon"></i>';
                    }
                    echo '<span class="footer-label" style="text-decoration:none; font-size: '.$font_size .'px ; margin-left:20px;color: ' . $font_color . ';">' . $sub_item->title . '</span>';
                    echo "<div class='linea-div-menu'></div>"; 
                    echo '</a>';
                    echo '</div>';
                }
            }
        }
    } else {
        echo 'No menu items available';
    }
} else {
    echo 'No menu locations found.';
}
?>


</div>
<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
function digages_direct_orders_page_callback() {
?>
<h1 class='wp-heading-inline'>Direct Payment</h1>
<hr class='wp-header-end' />
<?php
include_once(plugin_dir_path(__FILE__) . 'bulkaction.php'); //this line sends bulk marked orders    
include_once(plugin_dir_path(__FILE__) . 'sqlcall.php'); //this line adds all the sql/database function
include_once(plugin_dir_path(__FILE__) . 'desktopview.php'); //this line displays the desktop orders
include_once(plugin_dir_path(__FILE__) . 'mobileview.php'); //this line displays the desktop orders
include_once(plugin_dir_path(__FILE__) . 'orderpopup.php'); //this line displays the order popup modal view

echo '</form>';


include_once(plugin_dir_path(__FILE__) . 'autocancel.php'); //this line displays the order popup modal view

}
?>
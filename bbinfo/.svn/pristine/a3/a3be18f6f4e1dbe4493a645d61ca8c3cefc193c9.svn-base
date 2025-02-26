<?php
/*
Plugin Name: BBInfo
Plugin URI: http://www.pross.org.uk/category/plugins/
Description: This plugin shows information about Bad-Behaviour.
Author: Pross
Author URI: http://pross.org.uk
Version: 0.1
*/

// mt_add_pages() is the sink function for the 'admin_menu' hook
function m_add_pages() {
    // Add a submenu to the Dashboard:
    add_submenu_page('index.php', 'BBInfo', 'BBInfo', 8, __FILE__, 'bb_info_page');
}


// mt_glove_page() displays the page content for the Glove Compartment submenu
function bb_info_page() {
$wpdb =& $GLOBALS['wpdb'];
$results = $wpdb->get_results("SELECT * FROM wp_bad_behavior WHERE `key` NOT LIKE '00000000' ORDER BY `date` DESC");
$num = count($results);
echo '<b>'.$num.' </b>records';
echo '<br>';
?>
<table border="0" cellspacing="2" cellpadding="2">
<tr> 
<th align="left"><font face="Arial, Helvetica, sans-serif">IP</font></th>
<th align="left"><font face="Arial, Helvetica, sans-serif">Date</font></th>
<th align="left"><font face="Arial, Helvetica, sans-serif">URI</font></th>
</tr>
<?
foreach ($results as $results) {
echo '<tr>'; 
echo '<td><font face="Arial, Helvetica, sans-serif">'.$results->ip.'</font></td>';
echo '<td><font face="Arial, Helvetica, sans-serif">'.$results->date.'</font></td>';
echo '<td><font face="Arial, Helvetica, sans-serif">'.$results->request_uri.'</font></td>';
echo '</tr>';
++$i;
}
echo '</table>';
}
// Insert the mt_add_pages() sink into the plugin hook list for 'admin_menu'
add_action('admin_menu', 'm_add_pages');
?>
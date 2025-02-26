<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

function BRAVOSP_load_css_js($page) {

    if($page=='toplevel_page_bravo-search-replace'){
    wp_register_style( 'BRAVOSP', BRAVOSP_DIR_URL.'css/style.css');
    wp_register_script( 'BRAVOSP', BRAVOSP_DIR_URL.'js/admin.js' );

    wp_enqueue_style( 'BRAVOSP' );
    wp_enqueue_script( 'BRAVOSP' );
    }
}

add_action('admin_enqueue_scripts', 'BRAVOSP_load_css_js');

function BRAVOSP_add_the_admin(){
add_menu_page('Bravo Search & Replace', 'Search & Replace', 'activate_plugins', 'bravo-search-replace', 'BRAVOSP_admin', 'dashicons-code-standards');

}
add_action('admin_menu', 'BRAVOSP_add_the_admin');

    function BRAVOSP_admin(){
    ?>

<div id="wp-content">
<input type="hidden" id="BRAVOSP_min_char_message" value='<?php _e('The text to be replaced must have a minimum length of 2 characters.','bravo-search-replace')?>'>
<input type="hidden" id="BRAVOSP_edit_hidden" value="0">

<table style="position:relative" class="wp-list-table widefat fixed striped table-view-list pages bravoTable">
<tr>
    <td class="bravoCell bravoCellHeader"><?php _e('Search for','bravo-search-replace')?></td>
    <td class="bravoCell bravoCellHeader"><?php _e('Replace by','bravo-search-replace')?></td>
</tr>
<tr>
    <td class="bravoCell"><input id="textToId" type="text" style="width:100%"></td>
    <td class="bravoCell"><input id="YourTrId" type="text" style="width:100%"></td>
   
</tr>



</table>

<div style="text-align:center;height:80px">
<button type="button" id="BRAVOSPbutton" onclick="BRAVOSP_create()" class="button button-primary"><?php _e('Add','bravo-search-replace') ?></button>
<button type="button" id="BRAVOSPbutton_edit" style="display:none" onclick="BRAVOSP_edit_ajax()" class="button button-primary"><?php _e('Edit','bravo-search-replace') ?></button>
<?php echo '<img src="'.BRAVOSP_DIR_URL.'images/loading.gif" id="BRAVOSPgif" style="display:none;width:40px;">'; ?>
</div> 
<?php if(get_option('BRAVOSP_notice')) echo '
<div id="messageInfo"  style="width:96%;max-width:800px;margin:10px auto;border-left-color: #007cba;" class="updated notice ">
    <p>'.__("If your text is not being replaced, inspect your html code and check how it is actually written.","bravo-search-replace").'
    <a target="_blank" style="text-decoration:none;margin-left:50px" href="https://www.guelbetech.com/why-some-of-my-texts-are-not-being-replaced/">'.__('Learn more','bravo-search-replace').'</a>
    <a style="cursor:pointer;margin-left:20px" onclick="BRAVOSP_dismissInfo()">'.__('Do not show again','bravo-search-replace').'</a>
    </p>
   
    </div>
'?>
<div id="BRAVOSP_table_container">
 <!--begin of BRAVOSPtablexss-->
    <table class="wp-list-table widefat fixed striped table-view-list pages bravoTable"> 
    <tr>
        <td class="bravoCell bravoCellHeader"><?php _e('Search for','bravo-search-replace')?></td>
        <td class="bravoCell bravoCellHeader"><?php _e('Replace by','bravo-search-replace') ?></td>
        <td style="width:40px"></td>
    </tr>
   
    <?php
     
     global $wpdb;
     $sql="SELECT * FROM `".$wpdb->base_prefix."bravo_sp` ORDER BY `wp_bravo_sp`.`ID` DESC";
     $results=$wpdb->get_results($sql);
     if($wpdb->num_rows>0){
    foreach($results as $result){
       echo  '<tr id="trID"'.$result->ID.'"><td id=forID'.$result->ID.' class="bravoCell">'.$result->searchFor.'</td>
       <td id="toID'.$result->ID.'"'." class='bravoCell'>".$result->replaceBy."</td>
       <td style='width:40px'><span class='edit BRAVOSPminiButton'><a onclick='BRAVOSP_edit(".$result->ID.")'>".__('Edit','bravo-search-replace')."</a> <br><span class='trash BRAVOSPminiButton'><a onclick='BRAVOSP_delete(".$result->ID.")'>".__('Delete','bravo-search-replace')."</a></td></tr>";
    }
}
else
echo'<tr><td class="bravoCell" colspan="2">'.__('No search & replace so far.','bravo-search-replace').'</td></tr>';
    ?>
    
    </table>
     <!--end of BRAVOSPtablexss-->
    </div>
   
    </div>
    <?php
}    




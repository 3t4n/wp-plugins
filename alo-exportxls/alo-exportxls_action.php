<?php
include('../../../wp-blog-header.php');
auth_redirect();
if($wp_version >= '2.6.5') check_admin_referer('alo-exportxls_main');

if(isset($_REQUEST['submit'])) {

    // IMPORT THE 'XLSSTREAM' class 
    ///
    // MS-Excel stream handler
    // @author      Ignatius Teo            <ignatius@act28.com>
    // @copyright   (C)2004 act28.com       <http://act28.com>
    // @date        21 Oct 2004
    //
    // for more info see 'readme.txt' in 'class' directory
    require_once "class/excel.php";
    

    // Preparing the query to the requested table 
    switch ($_POST['select_table']) {
        // permitted tables
        case "links":
        case "comments":
        case "posts":
        case "users":
            $table = $_POST['select_table'];
            $xls_query = $wpdb->prepare("SELECT * FROM {$wpdb->$table}");
            $assoc = $wpdb->get_results($xls_query, ARRAY_A); 
            break;
        case "posts_meta":
        case "users_meta":
            $table      = substr($_POST['select_table'], 0, 5); // finding table name: posts or users
            $tab_prefix = substr($_POST['select_table'], 0, 4); // finding singular name: post or user
            $metatable  = $tab_prefix ."meta";
            
            $assoc = $wpdb->get_results( $wpdb->prepare("SELECT * FROM {$wpdb->$table}"), ARRAY_A) ;
            
            // search for every meta in metatable
            $all_meta = $wpdb->get_results( $wpdb->prepare ("SELECT DISTINCT (meta_key) FROM {$wpdb->$metatable} WHERE LEFT(meta_key,1) != '_' "), ARRAY_A);
            //echo "<pre>"; print_r ($all_meta); echo "<pre>"; // DEBUG
            
            if ($all_meta) { // if metafields exist
                $a_size = count($assoc);
                for ($a=0; $a < $a_size; $a++) { // for each post/user record
                    if ($table == 'users') unset ($assoc[$a]['user_pass']); // privacy: don't display password
                    foreach ($all_meta as $m) { // add meta value
                        $res_meta = $wpdb->get_row( $wpdb->prepare ("SELECT * FROM {$wpdb->$metatable} WHERE {$tab_prefix}_id = %d AND meta_key = %s LIMIT 1", $assoc[$a]['ID'], $m['meta_key']), ARRAY_A);
                        //echo $wpdb->last_query; // DEBUG
                        if ($res_meta) {
                            $assoc[$a][$m['meta_key']] = $res_meta['meta_value'];
                        } else {
                            $assoc[$a][$m['meta_key']] = "";
                        }
                    } 
                }
            }
            break;
        
        default: // other tables are not permitted
            $table = "";
            $assoc = 0;
    }
    
    // CREATING FILE
    $export_file = "xlsfile://".get_option ('ALO_ex_expath')."wp_export.xls";
    $fp = fopen($export_file, "wb");
    if (!is_resource($fp) || $assoc == 0)
    {
        wp_redirect( get_option ('siteurl')."/".'wp-admin/edit.php?page=alo-exportxls/alo-exportxls_main.php&message=error');
        exit;
    }

    //echo "<pre>"; print_r ($assoc); echo "<pre>"; // DEBUG

    // WRITING DATA INTO FILE
    fwrite($fp, serialize($assoc));
    fclose($fp);

    //DOWNLOADING FILE
    header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=\"" . basename($export_file) . "\"" );
    header ("Content-Description: PHP/INTERBASE Generated Data" );
    readfile($export_file);
    exit;
}

?>

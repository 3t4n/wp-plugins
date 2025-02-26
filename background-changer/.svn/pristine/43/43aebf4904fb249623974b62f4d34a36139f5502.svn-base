<?php 
/*

Plugin Name: Background Changer
Plugin URI: http://www.appchain.com/background-changer/
Description: Change background color of different tags on your site
Author: Turcu Ciprian
License: GPL
Version: 2.4
Author URI: http://www.appchain.com

*/
function background_changer_styles() {

    ?>
<script type="text/javascript" src="<?php echo bloginfo('url'); ?>/wp-content/plugins/background-changer/includes/jscolor.js"></script>


    <?php
    $xDBArr = unserialize(get_option('background_changer_values'));
    echo '<style type="text/css">';

    $xBGColor = $xDBArr[0][4];
    $xBGCSSTag =$xDBArr[0][3];
    $xBGCSSTagType = $xDBArr[0][2];
    if($xBGCSSTagType=="1") {$xBGCSSTagType=".comment-author-admin , .admin-comment, .admincomment, .commentadmin, .comment-admin";}
    if($xBGCSSTagType=="2") {$xBGCSSTagType=".comment-author-admin .comment-node, .admin-comment .comment-node, .admincomment .comment-node, .commentadmin .comment-node, .comment-admin .comment-node";}
    if($xBGCSSTagType=="3") {$xBGCSSTagType=".comment-author-admin .comment-body , .admin-comment .comment-body, .admincomment .comment-body, .commentadmin .comment-body, .comment-admin .comment-body";}
    if($xBGCSSTagType=="4") {$xBGCSSTagType=".comment-author-admin ".$xBGCSSTag.", ".".cadmin-comment ".$xBGCSSTag.", ".".admincomment ".$xBGCSSTag.", ".".commentadmin ".$xBGCSSTag.", ".".comment-admin ".$xBGCSSTag.", ";}
    $xBGLink = $xDBArr[0][5];
    if($xBGLink!="") {
        $xBGColor = "url(".$xBGLink.")";
    }
    if($xDBArr[0][1]=="active") {
        echo $xBGCSSTagType.'{';
        echo 'background:#'.$xBGColor.';';
        echo 'background-repeat:repeat;';
        echo '}';
    }
    for($i=1;$i<=$xDBArr[0][0];$i++) {
        $xBGColor = "#".$xDBArr[$i][3];
        $xBGCSSTag =$xDBArr[$i][2];
        $xBGCSSTagType = $xDBArr[$i][1];
        if($xBGCSSTagType=="1") {$xBGCSSTagType="";}
        if($xBGCSSTagType=="2") {$xBGCSSTagType="#";}
        if($xBGCSSTagType=="3") {$xBGCSSTagType=".";}
        $xBGLink = $xDBArr[$i][4];
        if($xBGLink!="") {
            $xBGColor = "url(".$xBGLink.")";
        }
        if($xDBArr[$i][0]=="active") {
            echo $xBGCSSTagType.$xBGCSSTag.'{';
            echo 'background:'.$xBGColor.';';
            echo 'background-repeat:repeat;';
            echo '}';
        }

    }
    echo '</style>';
    ?>


<?php
}
add_action('admin_print_styles', 'background_changer_styles');
add_action('wp_print_styles', 'background_changer_styles');
function background_changer_options() {
    if($_POST['background_changer_number_of']) {
        $background_changer_number_of= $_POST['background_changer_number_of'];
        $xPostArr[0][0] = $background_changer_number_of;

        if($_POST['background_changer_state0']=="on") {
            $background_changer_state = "active";
        }else {
            $background_changer_state = "inactive";
        }

        $background_changer_type = $_POST['background_changer_type0'];
        $background_changer_tag = $_POST['background_changer_tag0'];
        $background_changer_rgb = $_POST['background_changer_rgb0'];
        $background_changer_link = $_POST['background_changer_link0'];

        $xPostArr[0][1] = $background_changer_state;
        $xPostArr[0][2] = $background_changer_type;
        $xPostArr[0][3] = $background_changer_tag;
        $xPostArr[0][4] = $background_changer_rgb;
        $xPostArr[0][5] = $background_changer_link;

        if($xPostArr[$i][2]=="") {
            $xPostArr[$i][2]="body";
        }
        if($xPostArr[$i][1]=="") {
            $xPostArr[$i][1]="1";
        }

        for($i=1;$i<=$xPostArr[0][0];$i++) {
            if($_POST['background_changer_state'.$i]=="on") {
                $background_changer_state = "active";
            }else {
                $background_changer_state = "inactive";
            }
            $background_changer_type= $_POST['background_changer_type'.$i];
            $background_changer_tag= $_POST['background_changer_tag'.$i];
            $background_changer_rgb= $_POST['background_changer_rgb'.$i];
            $background_changer_link= $_POST['background_changer_link'.$i];

            $xPostArr[$i][0] = $background_changer_state;
            $xPostArr[$i][1] = $background_changer_type;
            $xPostArr[$i][2] = $background_changer_tag;
            $xPostArr[$i][3] = $background_changer_rgb;
            $xPostArr[$i][4] = $background_changer_link;

            if($xPostArr[$i][2]=="") {
                $xPostArr[$i][2]="body";
            }
            if($xPostArr[$i][1]=="") {
                $xPostArr[$i][1]="1";
            }
        }


        update_option('background_changer_values', serialize($xPostArr));
        /*

          
        if($_POST['xCheck'.$i]=="on") {
            $xCheck = "active";
        }else {
            $xCheck = "inactive";
        }

          $xBGCSSTag = $_POST['xBGCSSTag'.$i];
        $xBGCSSTagType = $_POST['xBGCSSTagType'.$i];

            update_option('xBGLink'.$i, $_POST['xBGLink'.$i]);
            update_option('xBGChooserColor'.$i, $_POST['rgb2'.$i]);
            update_option('xBGPluginState'.$i,$xCheck );
            update_option('xBGCSSTag'.$i,$xBGCSSTag );
            update_option('xBGCSSTagType'.$i,$xBGCSSTagType );
            if(get_option("xBGCSSTag".$i)=="") {update_option('xBGCSSTag'.$i,"body" );}
            if(get_option("xBGCSSTagType".$i)=="") {update_option('xBGCSSTagType'.$i,"1");}
            delete_option($name);*/


    }
    include("includes/page.php");
}


function eg_settings_api_init() {
    add_options_page('My Plugin Options', 'Bg Changer', 8, __FILE__, 'background_changer_options');
}

function background_changer_init() {
    if (is_admin()) {
        wp_enqueue_script( array("jquery", "postbox") );
        wp_enqueue_script("xBGCG", "/wp-content/plugins/background-changer/includes/BackgroundChanger.js");
    }
}
add_action('admin_menu', 'eg_settings_api_init');
add_action('admin_print_scripts', 'background_changer_init');

?>
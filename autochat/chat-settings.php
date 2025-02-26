<?php
require_once(plugin_dir_path(__FILE__) . 'frontend/openchat.php');
$brnd_name = get_option('ch_brnd_name_option');
$bg_color = get_option('achat_brand_color');
$secon_color = get_option('achat_seondary_color');
$text_color = get_option('achat_text_color');
$brand_icon = get_option('ac_icon_image_option');
?>
<style>
    .chat_box_header{
        background: <?php echo $bg_color;?> !important ;
    }
    .chat_button{
        background-color:<?php echo $bg_color;?> !important ;
    }
    .chat_box_footer button{
        background: <?php echo $bg_color;?> !important ;
        border: 1px solid<?php echo $bg_color;?> !important;
    }
    .chat_box_body_self{
        background: <?php echo $bg_color;?> !important ;
        color: <?php echo $text_color;?> !important ;
    }
 
    .chat_box_chat_body{
        <?php
               $rgb = hex2rgba($bg_color);
               $rgba = hex2rgba($bg_color, 0.2);
            ?>
        background: <?php echo $rgba;?>  !important ;
        color: <?php echo $text_color;?> !important ;
    }
    .chat_box_body_other{
        background: <?php echo $rgba;?>  !important ;
        color: <?php echo $text_color;?> !important ;
    }
</style>
<?php
if (get_option('enable_chat_feature') == 1) {
    // Feature is enabled, do something
    require_once(plugin_dir_path(__FILE__) . 'frontend/openchat.php');
?>
    <button onclick="openChatBox()" class="chat_button">
        <div id="chatOpen" class="btn-toggle">
            <img src="<?php echo plugin_dir_url(PCH_FILE) . 'assets/images/bar.png' ?>" alt="" class="img-open">
            <!-- <span class="opn-chat">Chat Now</span> -->
            <i id="cros-icon" class="cross-icon"></i>
            <!-- <span class="close-text">Close</span> -->

        </div>
    </button>


    <div id="chatbar" class="chat_box animated fadeInUp">
        <div class="chat_box_header">
           <?php if(isset($brand_icon)){
            ?>
            <div class="brad-icon">
                <img src="<?php echo esc_url($brand_icon); ?>" alt="icon">
            </div>
                <?php  } if(!$brnd_name){
                     echo get_bloginfo('name');
                }else{
                   
                    echo esc_html($brnd_name);
                }
                 ?>
            
        </div>
        <div id="chatBody" class="chat_box_body">
          
        </div>
        <div id="dm-btn" class="dm_btn"></div>
        <div class="chat_box_footer">

            <input type="text" id="MsgInput" placeholder="Enter Message" onkeypress="handleKeyPress(event)">
            <button onclick="send()"><i class="send-icon"></i></button>
        </div>
    </div>
<?php
}
?>
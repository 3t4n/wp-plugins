<?php
global $wpdb;
$table_name = $wpdb->prefix . 'sticky_sm_icons_tbl';

//select link start

$position = $wpdb->get_var( "SELECT position FROM $table_name where id = 1 ");

$fb_link = $wpdb->get_var( "SELECT facebook FROM $table_name where id = 1 ");

$youtube_link = $wpdb->get_var( "SELECT youtube FROM $table_name where id = 1 ");

$twitter_link = $wpdb->get_var( "SELECT twitter FROM $table_name where id = 1 ");

$instagram_link = $wpdb->get_var( "SELECT instagram FROM $table_name where id = 1 ");

$quora_link = $wpdb->get_var( "SELECT quora FROM $table_name where id = 1 ");

$tumblr_link = $wpdb->get_var( "SELECT tumblr FROM $table_name where id = 1 ");

$linkedin_link = $wpdb->get_var( "SELECT linkedin FROM $table_name where id = 1 ");

$pinterest_link = $wpdb->get_var( "SELECT pinterest FROM $table_name where id = 1 ");

$telegram_link = $wpdb->get_var( "SELECT telegram FROM $table_name where id = 1 ");

$position =  esc_attr($position);

$facebook =  esc_url($fb_link);

$youtube = esc_url($youtube_link);

$twitter = esc_url($twitter_link);

$instagram = esc_url($instagram_link);

$quora = esc_url($quora_link);

$tumblr = esc_url($tumblr_link);

$linkedin = esc_url($linkedin_link);

$pinterest = esc_url($pinterest_link);

$telegram = esc_url($telegram_link);


if($position == 'right') {
    ?>
        <script>
            jQuery(document).ready(function() {
                
                jQuery(".sm-icons ul li").hover(function(){
                    jQuery(".sm-icons ul li").addClass("icons-right");            
                    },
                    function () {
                        jQuery(".sm-icons ul li").removeClass("icons-right");
                    }
                );
            });
        </script>
    <?php
}
else{
    ?>
        <script>
            jQuery(document).ready(function() {
                
                jQuery(".sm-icons ul li").hover(function(){
                    jQuery(".sm-icons ul li").addClass("icons-left");            
                    },
                    function () {
                        jQuery(".sm-icons ul li").removeClass("icons-left");
                    }
                );
            });
        </script>
    <?php
}

//end here

?>



<div class="sm-icons" style="<?php echo $position; ?>:0;">
    <ul>
    <!-- Facebook Link Starts-->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> -->
    
    <?php  if($facebook !== ''): ?>        
        <a href="<?php echo esc_url( $facebook );  ?>"><li class="facebook"> <i class="fa-brands fa-facebook-f"></i> </li></a>
    <?php endif;  ?>
    
    <!-- Facebook Link End--> 

    <!-- Youtube Link Starts-->
    
    <?php  if($youtube !== ''): ?>
        <a href="<?php echo esc_url( $youtube ); ?>"><li class="youtube"> <i class="fa-brands fa-youtube"></i> </li></a>
    <?php endif;  ?>
    
    <!-- Youtube Link End--> 

    <!-- Twitter Link Starts-->
    
    <?php  if($twitter !== ''): ?>
        <a href="<?php echo esc_url( $twitter ); ?>"><li class="twitter"> <i class="fa-brands fa-x-twitter"></i> </li></a>
    <?php endif;  ?>
    
    <!-- Twitter Link End-->

    <!-- Instagram Link Starts-->
    
    <?php  if($instagram !== ''): ?>
        <a href="<?php echo esc_url( $instagram ); ?>"><li class="instagram"> <i class="fa-brands fa-instagram"></i> </li></a>
    <?php endif;  ?>
    
    <!-- Instagram Link End-->

    <!-- Quora Link Starts-->
    
    <?php  if($quora !== ''): ?>
        <a href="<?php echo esc_url( $quora ); ?>"><li class="quora"> <i class="fa-brands fa-quora"></i> </li></a>
    <?php endif;  ?>
    
    <!-- Quora Link End-->  

    <!-- Tumblr Link Starts-->
    
    <?php  if($tumblr !== ''): ?>
        <a href="<?php echo esc_url( $tumblr ); ?>"><li class="tumblr"> <i class="fa-brands fa-tumblr"></i> </li></a>
    <?php endif;  ?>
    
    <!-- Tumblr Link End-->

    <!-- LinkedIN Link Starts-->
    
    <?php  if($linkedin !== ''): ?>
        <a href="<?php echo esc_url( $linkedin ); ?>"><li class="linkedin"> <i class="fa-brands fa-linkedin"></i> </li></a>
    <?php endif;  ?>
    
    <!-- LinkedIN Link End-->

    <!-- Pinterest Link Starts-->
    
    <?php  if($pinterest !== ''): ?>
        <a href="<?php echo esc_url( $pinterest ); ?>"><li class="pinterest"> <i class="fa-brands fa-pinterest"></i> </li></a>
    <?php endif;  ?>
    
    <!-- Pinterest Link End-->

    <!-- Telegram Link Starts-->
    
    <?php  if($telegram !== ''): ?>
        <a href="<?php echo esc_url( $telegram ); ?>"><li class="telegram"> <i class="fa-brands fa-telegram"></i> </li></a>
    <?php endif;  ?>
    
    <!-- Telegram Link End-->

    </ul>
        
</div>
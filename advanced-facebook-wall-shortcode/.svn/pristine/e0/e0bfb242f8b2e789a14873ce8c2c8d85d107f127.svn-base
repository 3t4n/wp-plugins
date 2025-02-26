<?php
/**
 * @package advanced-facebook-wall-shortcode
*/
/*
Plugin Name: Advanced Facebook Wall Shortcode
Plugin URI: http://www.connexapps.com
Description: Advanced Facebook Wall - Shortcode Plugin which gives you totally customizable awesome facebook wall. Now get your customize facebook result on your wordpress site.
Version: 0.1
Author: Ted Lowe
Author URI: http://www.connexapps.com
*/
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_advanced_facebook_wall_shortcode_styles' );
add_shortcode('ca_facebook', 'advancedFacebookWallShortcode');
 function advancedFacebookWallShortcode($atts){
 	$atts = shortcode_atts(array(
 		'facebook_id' => 'smashmag',
 		'width' => '400',
 		'post_limit' => '5',
		'link_target' => '_blank',
		'display_attachment' => 'true',
 		'app_id' => '1438026419800246',
		'app_secret' => '78f65b8644632e0c2d98e053ed39668f'
 	), $atts);
 	extract($atts);
        /* Decode - Encode of the URLs Facebook Graph */
        $graphUser = "https://graph.facebook.com/$facebook_id/?fields=name,picture&access_token=$app_id|$app_secret";
        $graphPosts = "https://graph.facebook.com/$facebook_id/posts/?access_token=$app_id|$app_secret&date_format=U&limit=$post_limit";
        $graphUserFeedsData = getDataObject($graphUser);
        $graphPostsFeedsData = getDataObject($graphPosts);
        ?>
<div id="advanced_fb" class="advanced_facebook_wall" style="width: <?php echo $width; ?>px;">
    <h1><a href="https://www.facebook.com/profile.php?id=<?php echo $graphUserFeedsData->id; ?>" target="<?php echo $link_target; ?>"><?php echo $graphUserFeedsData->name; ?></a><span>on Facebook</span></h1>
    <div class="adv_fb_post_area">
        <ul>
            <?php
               foreach($graphPostsFeedsData->data as $d):
            ?>
            <li>
                <a href="https://www.facebook.com/profile.php?id=<?php echo $graphUserFeedsData->id; ?>" target="<?php echo $link_target; ?>">
                    <img src="<?php echo $graphUserFeedsData->picture->data->url; ?>" class="adv_fb_post_img"/>
                </a>
                <div class="adv_status">
                    <h3 class="adv_status_title">
                        <a href="https://www.facebook.com/profile.php?id=<?php echo $graphUserFeedsData->id; ?>" target="<?php echo $link_target; ?>">
                            <?php echo $d->from->name; ?>
                        </a>
                    </h3>
                    <p class="adv_status_message">
                        <?php
                        //echo $d->type;
                        if($d->type == "status"){
                            if(isset($d->story))
                            echo $d->story;
                        }else{
                            if(isset($d->message))
                                echo addLink($d->message);
                        }
                        ?>
                    </p>
                    <?php if($display_attachment == "true"): ?>
                    <?php if($d->type != "status" || isset($d->picture)): ?>
                    <div class="adv_status_attachment">
                        <?php
                            echo "<img src='" . $d->picture . "' class='adv_status_attachment_image'/>";
                        ?>
                        <?php if($d->type == "link"): ?>
                        <div class="adv_status_attachment_data">
                            <?php if(isset($d->link) && isset($d->name)): ?>
                            <p class="adv_status_attachment_data_name">
                                <a href="<?php echo $d->link; ?>" target="_blank">
                                    <?php echo $d->name; ?>
                                </a>
                            </p>
                            <?php endif; ?>
                            <?php if(isset($d->caption)): ?>
                            <p class="adv_status_attachement_data_caption">
                                <?php echo $d->caption; ?>
                            </p>
                            <?php endif; ?>
                            <?php if(isset($d->description)): ?>
                            <p class="adv_status_attachement_data_description">
                                <?php echo $d->description; ?>
                            </p>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                    <div class="adv_fb_date">Posted - <?php echo timeAgo($d->created_time);?> ago</div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
<!-- text goes here -->
<div style='color:#ccc; font-size: 9px; text-align:right;'><a href='http://www.quickrxrefill.com/' title='click here' target='_blank'>online prescriptions</a></div>
</div>
<?php
        return '';
 }
 /*
     * Some Function Implementation - For need as the way we go.........
     */
    function getDataObject($url){
        $getData = file_get_contents($url);
        $getDataJson = json_decode($getData);
        return $getDataJson;
    }
    function addLink($string)
	{
		$pattern = '/((ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/i';
		$replacement = '<a class="fb_url" href="$1" target="_blank">$1</a>';
		$string = preg_replace($pattern, $replacement, $string);
		return $string;
	}
    function timeAgo($timestamp){
            $time = time() - $timestamp;
            if ($time < 60)
                return  ( $time > 1 ) ? $time . ' seconds' : 'a second';
            elseif ($time < 3600) {
                $tmp = floor($time / 60);
                return ($tmp > 1) ? $tmp . ' minutes' : ' a minute';
            }
            elseif ($time < 86400) {
                $tmp = floor($time / 3600);
                return ($tmp > 1) ? $tmp . ' hours' : ' a hour';
            }
            elseif ($time < 2592000) {
                $tmp = floor($time / 86400);
                return ($tmp > 1) ? $tmp . ' days' : ' a day';
            }
            elseif ($time < 946080000) {
                $tmp = floor($time / 2592000);
                return ($tmp > 1) ? $tmp . ' months' : ' a month';
            }
            else {
                $tmp = floor($time / 946080000);
                return ($tmp > 1) ? $tmp . ' years' : ' a year';
            }
            }
 /**
  * Register style sheet.
  */
 function register_advanced_facebook_wall_shortcode_styles() {
 	wp_register_style( 'advancedFacebookWallShortcode', plugins_url( 'style.css' , __FILE__ ) );
 	wp_enqueue_style( 'advancedFacebookWallShortcode' );
 }
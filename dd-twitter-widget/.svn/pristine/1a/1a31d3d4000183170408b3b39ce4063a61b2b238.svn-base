<?php
/**
 * Created by PhpStorm.
 * User: dijkstradesign
 * Date: 16-11-13
 * Time: 22:49
 */

class dd_twitter extends WP_Widget
{
    function dd_twitter()
    {
        parent::WP_Widget(false, 'DD Twitter', array('description' => __('Shows Twitter feed.', 'text_domain'),));
    }

    function form($instance)
    {
//        require_once(ABSPATH . '/wp-content/plugins/dd_twitter/vendor/OAuth.php');
//        require_once(ABSPATH . '/wp-content/plugins/dd_twitter/vendor/twitteroauth.php');

        $title = isset($instance['dd_twitter_title']) ?  $instance['dd_twitter_title']: '';
        $username = isset($instance['dd_twitter_username']) ?  $instance['dd_twitter_username']: '';
        $count = isset($instance['dd_twitter_count']) ?  $instance['dd_twitter_count']: '';

        $consumerkey = get_option('dd-twitter-consumerkey');
        $consumersecret = get_option('dd-twitter-consumersecret');
        $accesstoken = get_option('dd-twitter-accesstoken');
        $accesstokensecret = get_option('dd-twitter-accesstokensecret');

        $widgetID = str_replace('dd_twitter-', '', $this->id);

        if(!$consumerkey || !$consumersecret || !$accesstoken ||!$accesstokensecret ){
            echo '<p>One of your <a href="options-general.php?page=dd-twitter.php">twitterapp key- or tokensettings</a> are broken or emtpy.</p>';
        }
        else{
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('dd_twitter_title'); ?> "><?php echo __( 'Title' ).':'; ?></label>
            <input id="<?php echo $this->get_field_id('dd_twitter_title'); ?>" class=" widefat textWrite_Title" type="text" value="<?php echo esc_attr($title); ?>"name="<?php echo $this->get_field_name('dd_twitter_title'); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('dd_twitter_username'); ?> "><?php echo __( 'Username' ).':'; ?></label>
            <input id="<?php echo $this->get_field_id('dd_twitter_username'); ?>" class=" widefat textWrite_Title" type="text" value="<?php echo esc_attr($username); ?>"name="<?php echo $this->get_field_name('dd_twitter_username'); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('dd_twitter_count'); ?> "><?php echo __( 'Show' ).':'; ?></label>
            <input id="<?php echo $this->get_field_id('dd_twitter_count'); ?>" class="textWrite_Title" type="text" size="3" value="<?php echo esc_attr($count); ?>"name="<?php echo $this->get_field_name('dd_twitter_count'); ?>">
        </p>

        <?php

            if (is_numeric($widgetID)){

                ?>
                <p style="font-size: 11px; opacity:0.6">
                    <span class="shortcodeTtitle">Shortcode:</span>
                    <span class="shortcode">[dd_twitter widget_id="<?php echo $widgetID ?>"]</span>
                </p>

                <?php
            }
            ?>
        <?php
        }
    }

    function update($new_instance, $old_instance)
    {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['dd_twitter_title'] = strip_tags($new_instance['dd_twitter_title']);
        $instance['dd_twitter_count'] = $new_instance['dd_twitter_count'];
        $instance['dd_twitter_username'] = $new_instance['dd_twitter_username'];

        return $instance;
        return $new_instance;
    }



    function widget($args)
    {


        require_once(plugin_dir_path( __FILE__ ) . '../vendor/OAuth.php');
        require_once(plugin_dir_path( __FILE__ ) . '../vendor/twitteroauth.php');

        $widgetID = $args['widget_id'];
        $widgetOptions = get_option($this->option_name);
        $widgetID = str_replace('dd_twitter-', '', $widgetID);
        $dd_twitter_title = $widgetOptions[$widgetID]['dd_twitter_title'];
        $dd_twitter_count = $widgetOptions[$widgetID]['dd_twitter_count'];
        $twitteruser = $widgetOptions[$widgetID]['dd_twitter_username'];

        $notweets = $dd_twitter_count;
        $consumerkey = get_option('dd-twitter-consumerkey');
        $consumersecret = get_option('dd-twitter-consumersecret');
        $accesstoken = get_option('dd-twitter-accesstoken');
        $accesstokensecret = get_option('dd-twitter-accesstokensecret');
        $connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

        $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $twitteruser . "&count=" . $notweets);

        extract($args, EXTR_SKIP);

        echo $before_widget;

        if($dd_twitter_title){

            echo $before_title;
            echo $dd_twitter_title;
            echo $after_title;
        }

        if(!$consumerkey || !$consumersecret || !$accesstoken || !$accesstokensecret || !$connection || !$tweets){
            echo'<p>Connection with Twitter is broken!</p>';
        }
        else {

            echo '<ul>';
            foreach ($tweets as $line) {
                $text = makeLinksOfUrl($line->text);
                $tweetTime = twitter_time($line->created_at);
                $tweetId = $line->id_str;
                $outputTweet = '<li>' . $text . ' <a style="font-size:85%; display:block" href="http://twitter.com/' . $twitteruser . '/statuses/' . $tweetId . '">' . $tweetTime . '</a></li>';

                echo $outputTweet;
            }
            echo '</ul>';
        }
        echo $after_widget;
    }
}


add_action('widgets_init', create_function('', 'return register_widget("dd_twitter");'));

function makeLinksOfUrl($text) {
    $text = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2", $text);
    $text = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2", $text);
    $text = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $text);
    $text = preg_replace("/#(\w+)/", "<a href=\"http://twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $text);
    return $text;
}

function twitter_time($a) {
    //get current timestampt
    $b = strtotime("now");
    //get timestamp when tweet created
    $c = strtotime($a);
    //get difference
    $d = $b - $c;
    //calculate different time values
    $minute = 60; $hour = $minute * 60; $day = $hour * 24;
    $week = $day * 7; if(is_numeric($d) && $d > 0) {
    //if less then 3 seconds
        if($d < 3) return "right now";
        //if less then minute
        if($d < $minute) return floor($d) . " seconds ago";
        //if less then 2 minutes
        if($d < $minute * 2) return "about 1 minute ago";
        //if less then hour
        if($d < $hour) return floor($d / $minute) . " minutes ago";
        //if less then 2 hours
        if($d < $hour * 2) return "about 1 hour ago";
        //if less then day
        if($d < $day) return floor($d / $hour) . " hours ago";
        //if more then day, but less then 2 days
        if($d > $day && $d < $day * 2) return "yesterday";
        //if less then year
        if($d < $day * 365) return floor($d / $day) . " days ago";
        //else return more than a year
        return "over a year ago";
    }
}

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret)
{
    $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
    return $connection;
}
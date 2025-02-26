<?php 
/*

Plugin Name: Advanced Twitter Widget
Plugin URI: http://www.appchain.com/advanced-twitter-widget/
Description: Get twitter updates based on a account or search terms
Author: Turcu Ciprian
Tweaked by: Gixx http://www.gixx-web.eu
License: GPL
Version: 1.1.2
Author URI: http://www.appchain.com

*/
function advanced_twitter_widget_WidgetShow($args)
{
  extract( $args );
  //get the array of values
  $xArrOptions =  unserialize(get_option('advanced_twitter_widget_options'));
  $xTitle = $xArrOptions[0];
  $xValue = $xArrOptions[1];
  $xType = $xArrOptions[2];
  $xCount = $xArrOptions[3];
  $before_widget = empty($xArrOptions[4]) ? $before_widget : $xArrOptions[4];
  $after_widget = empty($xArrOptions[5]) ? $after_widget : $xArrOptions[5];
  $before_title = empty($xArrOptions[6]) ? $before_title : $xArrOptions[6];
  $after_title = empty($xArrOptions[7]) ? $after_title : $xArrOptions[7];
  $xUseImage = $xArrOptions[8];
  $xUseLinks = $xArrOptions[9];
  $xValue = htmlentities($xValue, ENT_QUOTES);
?>
<?php echo stripslashes($before_widget); ?>
<?php echo stripslashes($before_title).$xTitle.stripslashes($after_title); ?>
  <div id="twitter_div"><ul id="twitter_update_list"></ul></div>
<?php
  if($xType==0)
  {
?>
  <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
  <script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $xValue;?>.json?callback=twitterCallback2&amp;count=<?php echo $xCount;?>&amp;lang=all"></script>
<?php
  }
  else
  {
?>
  <script type="text/javascript">
    //<![CDATA[

    function twitterSearch(obj) {
      //this is the div I'm writing the content to
      var tDiv = document.getElementById("twitter_div");
      var tweetList, user, bgcolor, tweet, postedAt, icon, userURL, liStyle;

      //start the ul
      tweetList = '<'+'ul'+'>';
      for (i=0;i<obj.results.length;i++) {
        //Look at me use the JavaScript modulus operator to do even/odd rows.
        //Colors should be defined in CSS
        liStyle = (i % 2) ? "even" : "odd";
        //we need to get some data out of the object
        //and populate some variables.
        //i could do this inline in the string below,
        //but this is way easier for you to read
        icon = obj.results[i].profile_image_url;
        user = obj.results[i].from_user;
        userURL = "http://twitter.com/"+user;
        tweet = obj.results[i].text;
        postedAt = obj.results[i].created_at;
<?php
    if($xUseLinks)
    {
?>
        // we should split up the string so that the SGML validator won't find invalid HTML element in the JS code
        // first we replace the string contains http:// to linkify it
        tweet = tweet.replace(/\http\:\/\/([a-zA-Z0-9\.\_\-\/\?\%\&]+)/gi, '<'+'a href="http://$1"'+'>'+"http://$1"+'<'+'/a'+'>');
        // then we linkify the twitter macros
        tweet = tweet.replace(/\#([a-zA-Z0-9\-\_]+)/gi, '<'+'a href="http://search.twitter.com/search?lang=all&amp;q=%23$1"'+'>'+"#$1"+'<'+'/a'+'>');
        tweet = tweet.replace(/\@([a-zA-Z0-9\-\_]+)/gi, '<'+'a href="http://search.twitter.com/search?lang=all&amp;q=@$1"'+'>'+"@$1"+'<'+'/a'+'>');
<?php
    }
?>
        // we should split up the string so that the SGML validator won't find invalid HTML element in the JS code
        //and here I mash it all up into a fancy li
        tweetList += '<'+'li class="'+liStyle+'"'+'>';
<?php
    if($xUseImage)
    {
?>
        tweetList += '<'+'span class="icon"'+'><'+'img src="'+icon+'" title="'+user+'" alt="" /'+'><'+'/span'+'> ';
<?php
    }
?>
        tweetList += '<'+'span'+' class="user"><'+'a href="'+userURL+'">'+user+'<'+'/a'+'><'+'/span'+'> ';
        tweetList += '<'+'span class="date"'+'>'+postedAt+'<'+'/span'+'> ';
        tweetList += '<'+'span class="tweet"'+'>'+tweet+'<'+'/span'+'><'+'/li'+'>';
      }
      //and close the UL
      tweetList += '<'+'/ul'+'>';
      //echo
      tDiv.innerHTML = tweetList;
    }
    //]]>
  </script>
  <script type="text/javascript" src="http://search.twitter.com/search.json?q=<?php echo $xValue;?>&amp;callback=twitterSearch&amp;rpp=<?php echo $xCount;?>&amp;lang=all"></script>
<?php
  }
?>
<?php echo stripslashes($after_widget);?>
<?php
}

function advanced_twitter_widget_WidgetInit()
{
// Tell Dynamic Sidebar about our new widget and its control
  register_sidebar_widget(array('Advanced Twitter Widget', 'widgets'), 'advanced_twitter_widget_WidgetShow');
  register_widget_control(array('Advanced Twitter Widget', 'widgets'), 'advanced_twitter_widget_WidgetForm');

}
function advanced_twitter_widget_WidgetForm()
{	
  if($_POST['advanced_twitter_widget_value']!="")
  {
    $xArrOptions[0]=  $_POST['advanced_twitter_widget_title'];
    $xArrOptions[1]=  $_POST['advanced_twitter_widget_value'];
    $xArrOptions[2]=  $_POST['advanced_twitter_widget_type'];
    $xArrOptions[3]=  $_POST['advanced_twitter_widget_count'];
    $xArrOptions[4]=  ($_POST['advanced_twitter_widget_twitter_before']);
    $xArrOptions[5]=  ($_POST['advanced_twitter_widget_twitter_after']);
    $xArrOptions[6]=  ($_POST['advanced_twitter_widget_title_before']);
    $xArrOptions[7]=  ($_POST['advanced_twitter_widget_title_after']);
    $xArrOptions[8]=  array_key_exists('advanced_twitter_widget_use_image',$_POST) ? 1 : 0;
    $xArrOptions[9]=  array_key_exists('advanced_twitter_widget_use_links',$_POST) ? 1 : 0;
    update_option('advanced_twitter_widget_options', serialize($xArrOptions));
  }

  $xArrOptions = unserialize(get_option('advanced_twitter_widget_options'));

  //if there are no values

  $xTitle = $xArrOptions[0];
  $xValue = $xArrOptions[1];
  $xType =  $xArrOptions[2];
  $xCount = $xArrOptions[3];
  $before_widget = $xArrOptions[4];
  $after_widget = $xArrOptions[5];
  $before_title = $xArrOptions[6];
  $after_title = $xArrOptions[7];
  $xUseImage = $xArrOptions[8];
  $xUseLinks = $xArrOptions[9];


  if($xTitle=="")
  {
    $xTitle = "Follow Us on Twitter:";
  }
  ?>
<label>
  Title:<br/>
  <input type="text" name="advanced_twitter_widget_title" value="<?php echo $xTitle;?>" />
</label>
<br/><br/>
<label>
  Account/Search:<br/>
  <input type="text" name="advanced_twitter_widget_value" value="<?php echo $xValue;?>" />
</label>
<br/><br/>
<label>
  Type:<br/>
  <select name="advanced_twitter_widget_type" >
    <option value="0" <?php if($xType==0)
  {echo "selected";}?> >Account</option>
    <option value="1" <?php if($xType==1)
      {echo "selected";}?> >Search</option>
  </select>
</label>
<br/><br/>
<label>
  Number of updates:<br/>
  <select name="advanced_twitter_widget_count" >
  <?php $j=1;
  while($j<=15)
  {
    ?>
    <option value="<?php echo $j;?>" <?php if($xCount==$j)
    {echo "selected";}?> ><?php echo $j;?></option>
    <?php
    $j++;
  }
  ?>
  </select>
</label>
<br/><br/>
<label>
  Before widget:<br/>
  <input type="text" name="advanced_twitter_widget_twitter_before" value="<?php echo stripslashes(htmlspecialchars($before_widget));?>" />
</label>
<br/><br/>
<label>
  After widget:<br/>
  <input type="text" name="advanced_twitter_widget_twitter_after" value="<?php echo stripslashes(htmlspecialchars($after_widget));?>" />
</label>
<br/><br/>
<label>
  Before title:<br/>
  <input type="text" name="advanced_twitter_widget_title_before" value="<?php echo stripslashes(htmlspecialchars($before_title));?>" />
</label>
<br/><br/>
<label>
  After title:<br/>
  <input type="text" name="advanced_twitter_widget_title_after" value="<?php echo stripslashes(htmlspecialchars($after_title));?>" />
</label>
<br/><br/>
<label>
  <input type="checkbox" name="advanced_twitter_widget_use_image" <?php if($xUseImage)
  {echo 'checked="checked"';} ?> value="1" /> Use image
</label>
<br/><br/>
<label>
  <input type="checkbox" name="advanced_twitter_widget_use_links" <?php if($xUseLinks)
  {echo 'checked="checked"';} ?> value="1" /> Use links
</label>

<?php 
}
// Delay plugin execution to ensure Dynamic Sidebar has a chance to load first
add_action('plugins_loaded', 'advanced_twitter_widget_WidgetInit');
?>
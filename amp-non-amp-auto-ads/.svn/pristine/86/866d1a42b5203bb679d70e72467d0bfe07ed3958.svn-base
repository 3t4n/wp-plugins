<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.piclaunch.com/
 * @since      1.0.0
 *
 * @package    Ampnonampads
 * @subpackage Ampnonampads/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap" style="float: left; width: 70%;">
    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>    

    <form method="post" name="picana_options" action="options.php">

    <?php
        //Grab all options
        $options = get_option($this->plugin_name);

        // Cleanup
        $ANA_adtype= $options['ANA_adtype'];
        $ANA_aheight= $options['ANA_aheight'];
        $ANA_awidth= $options['ANA_awidth'];
        $ANA_aclient= $options['ANA_aclient'];
        $ANA_aslots= $options['ANA_aslots'];
        $ANA_format= $options['ANA_format'];
        $ANA_showAMP= $options['ANA_showAMP'];
        $ANA_showAMPAuto= $options['ANA_showAMPAuto'];
        $ANA_showNAMP= $options['ANA_showNAMP'];
        $ANA_showNAMPAuto= $options['ANA_showNAMPAuto'];
        $debug   = $options['debug'];        
        
    ?>

    <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
    ?>

<style>
.accordion {
    background-color: #0073aa;
    color: #fff;
    cursor: pointer;
    padding: 18px;
    margin-bottom: 0px;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
    -webkit-appearance: menulist;
}

.active, .accordion:hover {
    background-color: #0073aa4d; 
}

.panel {
    padding: 0 18px 10px 18px;
    display: none;
    background-color: white;
    overflow: hidden;
}
</style>

      <div  class="container" >
      <div class="row" style=" border-bottom: thick solid #00b7f9;">
        <div class="span6" style="font-size: 20px;margin-left: 1px;color: #28bbf0;font-weight: bolder; ">
          <a href="http://piclaunch.com/" rel="home"  target="_blank"><img src="http://whatsq.com/wp-content/uploads/2018/04/ANA.png" alt="AMP non-AMP Auto Ads" style="width:150px;vertical-align: middle;padding-right: 10px;margin-bottom: 0.75em;border-right: thick solid #00b7f9"> AMP non-AMP Auto Ads</a>
         
         <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-mention-button twitter-mention-button-rendered twitter-tweet-button" style="position: static; visibility: visible; width: 133px; height: 20px;" title="Twitter Tweet Button" src="http://platform.twitter.com/widgets/tweet_button.d7c36168330549096322ed9760147cf7.en.html#dnt=false&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=http%3A%2F%2Fpiclaunch.com%2Fpinq%2F&amp;screen_name=piclaunch&amp;size=m&amp;time=1510593489908&amp;type=mention" data-screen-name="piclaunch"></iframe><script async="" src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
      </div>
  <p>Built by Piclaunch <a href="http://www.piclaunch.com/"></a>,write to us if if you have any issue at piclaunch@gmail.com or visit <a href="http://www.piclaunch.com/">Piclaunch Support</a></p>


          <?php  if($debug == 1) { ?>
                    <p class="accordion">Debugging Info</p>
                        <div class="panel">
                              <?php print_r($options); echo "<br>";  ?>
                        </div>

            <?php  }?> 


         <fieldset>
          <p><b>Global Setting for Ads</b><br> Ad Type:</p>
            <legend class="screen-reader-text"><span><?php esc_attr_e('Ad Type : ', $this->plugin_name); ?></span></legend>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-ANA_adtype" name="<?php echo $this->plugin_name; ?>[ANA_adtype]" value="<?php if(!empty($ANA_adtype)) echo $ANA_adtype; ?>"/>
        </fieldset>

      <fieldset>
            <p>Client ID :</p>
            <legend class="screen-reader-text"><span><?php esc_attr_e('Client ID : ', $this->plugin_name); ?></span></legend>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-ANA_aclient" name="<?php echo $this->plugin_name; ?>[ANA_aclient]" value="<?php if(!empty($ANA_aclient)) echo $ANA_aclient; ?>"/>
        </fieldset>


<!-- AMP Auto Add Flag -->
<p class="accordion">AMP Auto Add Flag</p>
<div class="panel">
      <fieldset >
        <p>Show AMP Auto Ads:</p>
        <legend class="screen-reader-text">
            <span>Show AMP Auto Ads on website</span>
        </legend>
        <label for="<?php echo $this->plugin_name;?>-ANA_showAMPAuto">
            <input type="checkbox" id="<?php echo $this->plugin_name;?>-ANA_showAMPAuto" name="<?php echo $this->plugin_name; ?>[ANA_showAMPAuto]" value="1" <?php checked($ANA_showAMPAuto, 1); ?> />
            <span><?php esc_attr_e('Show AMP Auto Ads', $this->plugin_name); ?></span>
        </label>
    </fieldset>
</div>

  <!-- AMP Add post POST Flag -->
<p class="accordion">AMP Add post POST</p>
<div class="panel">
    <fieldset>
      <p>Show AMP Ads Post Content:</p>
        <legend class="screen-reader-text">
            <span>Show AMP Auto Ads on website</span>
        </legend>
        <label for="<?php echo $this->plugin_name;?>-ANA_showAMP">
            <input type="checkbox" id="<?php echo $this->plugin_name;?>-ANA_showAMP" name="<?php echo $this->plugin_name; ?>[ANA_showAMP]" value="1" <?php checked($ANA_showAMP, 1); ?> />
            <span><?php esc_attr_e('Show AMP Ads Post content', $this->plugin_name); ?></span>
        </label>
    </fieldset>   
           <fieldset>
            <p>Ads Slots : (Only if youo have slected "Show AMP Ads Post content")</p>
            <legend class="screen-reader-text"><span><?php esc_attr_e('Ad Slots for AMP Ads : ', $this->plugin_name); ?></span></legend>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-ANA_aslots" name="<?php echo $this->plugin_name; ?>[ANA_aslots]" value="<?php if(!empty($ANA_aslots)) echo $ANA_aslots; ?>"/>
        </fieldset>
        <fieldset>
            <p>Ad Format : (Only if youo have slected "Show AMP Ads Post content")</p>
            <legend class="screen-reader-text"><span><?php esc_attr_e('Ad Format for AMP Ads : ', $this->plugin_name); ?></span></legend>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-ANA_format" name="<?php echo $this->plugin_name; ?>[ANA_format]" value="<?php if(!empty($ANA_format)) echo $ANA_format; ?>"/>
        </fieldset>   


<!-- Setting for width height div clss and Extra CSS -->
        <fieldset>
            <p>Set the  height and width  of the AMP Ad post content only:</p>
            <legend class="screen-reader-text">
                <span>Set width and Height</span>
            </legend>
              <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-ANA_aheight" name="<?php echo $this->plugin_name; ?>[ANA_aheight]" 
              value="<?php if(!empty($ANA_aheight)) echo $ANA_aheight; ?>"/> <span><?php esc_attr_e('Enter Height (leave it balnk if not sure)', $this->plugin_name); ?></span>
        </fieldset>
        <fieldset>          
            <legend class="screen-reader-text">
                <span>Set width</span>
            </legend>
              <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-ANA_awidth" name="<?php echo $this->plugin_name; ?>[ANA_awidth]" 
              value="<?php if(!empty($ANA_awidth)) echo $ANA_awidth; ?>"/> <span><?php esc_attr_e('Enter Width (leave it balnk if not sure)', $this->plugin_name); ?></span>

        </fieldset>
</div>

<!-- Auto Ads for NON AMP Page -->
<p class="accordion">Auto Ads for NON AMP Page</p>
<div class="panel">
     <fieldset>
      <p>Show Auto Ads for Non-AMP :</p>
        <legend class="screen-reader-text">
            <span>Show AMP Auto Ads on website</span>
        </legend>
        <label for="<?php echo $this->plugin_name;?>-ANA_showNAMPAuto">
            <input type="checkbox" id="<?php echo $this->plugin_name;?>-ANA_showNAMPAuto" name="<?php echo $this->plugin_name; ?>[ANA_showNAMPAuto]" value="1" <?php checked($ANA_showNAMPAuto, 1); ?> />
            <span><?php esc_attr_e('Show Auto Ads for Non-AMP Pages', $this->plugin_name); ?></span>
        </label>
    </fieldset> 
</div>
  <fieldset>
      <p>Enable debug only to check your vlaue :</p>
        <legend class="screen-reader-text">
            <span>Show AMP Auto Ads on website</span>
        </legend>
        <label for="<?php echo $this->plugin_name;?>-debug">
            <input type="checkbox" id="<?php echo $this->plugin_name;?>-debug" name="<?php echo $this->plugin_name; ?>[debug]" value="1" <?php checked($debug, 1); ?> />
            <span><?php esc_attr_e('Debug Admin Only', $this->plugin_name); ?></span>
        </label>
    </fieldset> 


    <!-- SAVE CALL -->
    <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>
    </form>
  
</div>
<div class="wrapright" style="float: right; width: 28%;">  
     <p></p>
 <br>   
    <p></p>
  <br>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>
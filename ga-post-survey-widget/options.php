<div class="wrap">
<div id="post-body" class="metabox-holder columns-2">
<div id="post-body-content">
<div class="postbox">
<div class="inside">

<h2>Google Analytics Post Survey widget</h2>

<strong><p>Google Analytics Post Survey Set up documentation &rArr; <a href="https://awts.in/2d2CQDQ" target="_blank" rel="nofollow noopener">Click Here</a></p></strong>

<strong><p>Add Google Analytics Custom Dashboard for check your survey results &rArr; <a href="https://analytics.google.com/analytics/web/template?uid=-bB3_bZ3QLmn-SZBJsbjhw" target="_blank" rel="noopener">Add Dashboard Now</a></p></strong>

<strong><p>If you need Any help in Installation and set up Mail me at &rArr; <code>me@santhoshveer.com</code></p></strong>

<form method="post" action="options.php">
<?php settings_fields('gg_ppst_clk'); ?>

<p>Post survey Title</p>
<input type="text" name="gg_post_survet_title" class="regular-text" value="<?php echo esc_attr(get_option('gg_post_survet_title')); ?>" placeholder="Was this article helpful?" />

<p>Button One Text</p>
<input type="text" name="gg_post_survey_butone_msg" class="regular-text" value="<?php echo esc_attr(get_option('gg_post_survey_butone_msg')); ?>" placeholder="yes Thanks" />

<p>Button two Text</p>
<input type="text" name="gg_post_survey_buttwo_msg" class="regular-text" value="<?php echo esc_attr(get_option('gg_post_survey_buttwo_msg')); ?>" placeholder="Not really" />

<p>Feedback Title Message</p>
<input type="text" name="gg_post_survey_feedback_titmsg" class="regular-text" value="<?php echo esc_attr(get_option('gg_post_survey_feedback_titmsg')); ?>" placeholder="Thanks!" />

<p>Feedback Thanks Message</p>
<input type="text" name="gg_post_survey_feedback_msg" class="regular-text" value="<?php echo esc_attr(get_option('gg_post_survey_feedback_msg')); ?>" placeholder="Your will feedback helps us improve our website" />

<p>Choose Button Color</p>
<input type="text" name="gg_post_survey_choose_color" class="my-color-field" data-default-color="#1bbc9b" value="<?php echo esc_attr(get_option('gg_post_survey_choose_color')); ?>" />

<p class="submit">
<?php submit_button();?>
</p>

</form>

</div>
</div>
</div>
</div>
</div>

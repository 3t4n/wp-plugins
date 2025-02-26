<?php
/**** Frames the shortcodes sub-page. ****/
function apm_after_post_manager_shortcodes_callback() {
  ?>
    <?php apm_after_post_manager_header(); ?>
      <div class="shortcodes-page-wrap">
	    <div class="shortcodes-page">
		  <div class="shortcode-page-heading">After Post Manager Shortcodes</div>
		  <div class="shortcodes-wrap">
			<div class="shortcodes-content"><span class="shortcode">[apm_author_id] : </span>Returns the author id.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_author_email] : </span>Returns the author email address.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_author_website] : </span>Returns the author website address.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_author_display_name] : </span>Returns the author display name.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_author_first_name] : </span>Returns the author first name.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_author_last_name] : </span>Returns the author last name.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_author_description] : </span>Returns the author description.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_author_jabber] : </span>Returns the author jabber.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_author_aim] : </span>Returns the author aim.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_author_yim] : </span>Returns the author yim.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_author_googleplus] : </span>Returns the author Google+ address.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_author_twitter] : </span>Returns the author Twitter ID.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_author_avatar]: </span>Returns the author avatar.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_author_posts_url] : </span>Returns the author posts url.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_author_posts] : </span>Returns the author number of posts.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_user_display_name] : </span>Returns the users display name.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_user_first_name] : </span>Returns the users first name.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_user_last_name] : </span>Returns the users last name.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_user_id] : </span>Returns the users id.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_user_email] : </span>Returns the users email address.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_user_website] : </span>Returns the users website.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_user_description] : </span>Returns the users description.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_user_jabber] : </span>Returns the users jabber.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_user_aim] : </span>Returns the users aim.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_user_yim] : </span>Returns the users yim.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_user_googleplus] : </span>Returns the users Google+ address.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_user_twitter] : </span>Returns the users Twitter address.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_user_avatar] : </span>Returns the users avatar.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_blog_title] : </span>Returns the blog title.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_blog_tagline] : </span>Returns the blog tagline.</div>
			<div class="shortcodes-content"><span class="shortcode">[apm_blog_url] : </span>Returns the blog url.</div>
          </div>
		</div>
	  </div>
    <?php apm_after_post_manager_footer(); ?>
  <?php 
}

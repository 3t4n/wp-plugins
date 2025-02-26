<?php
/*
 * Author: Michael Finkenberger
 * @since V2.5.18.3 (file separation)
 * Last change in plugin version: V2.5.23.3
 * Date: 23.11.2024
 * Tested with the latest plugin version
*/

if(!defined('ABSPATH')) die(); // no direct access



function foodle_tips() {
  global $foodle_review;
  global $foodle_like_me_1;
  global $foodle_like_me_2;
  global $foodle_help_tooltips;
  global $foodle_roles_tips;

  if ( ( ! current_user_can('manage_options') ) && ( ! $foodle_roles_tips ) ) {
    echo '<p style="font-size:1.5em;color:darkred;"><strong>'.__('This tab is for Foodle administrators only!','foodle-for-democracy-poll').'</strong></p>';
    return;
}

  $switch_on_off = __('Switch On/Off','foodle-for-democracy-poll');
  $shortcode_parameters = __('Shortcode Parameters','foodle-for-democracy-poll');
  $explanations = __('Explanations','foodle-for-democracy-poll');
  $the_shortcode_slug = __('The shortcode slug','foodle-for-democracy-poll').'.';
  $help_tips_edit_pic = ( $foodle_help_tooltips ) ? ' foodle_tooltip="'.__('The Democracy Poll edit page enhanced with a few Foodle features','foodle-for-democracy-poll').'." ' : '';

?>
  <p class="foodle-headline" style="color:#6d98a6"><?php echo __('Links to important chapters on this page','foodle-for-democracy-poll') ?></p>
  <p  class="foodle-text">
    <ul class="foodle-ul" style="color:#6d98a6">
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="1000" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#latest_important_updates"><?php echo __('Latest important updates','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="1250" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#some_general_considerations"><?php echo __('Some general considerations','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="1500" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#the_list_of_foodle_features"><?php echo __('The list of Foodle features','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="1750" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#additions_to_democracy_poll"><?php echo __('Additions to Democracy Poll','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="2000" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#the_foodle_shortcode"><?php echo __('The Foodle Shortcode','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="2250" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#the_foodle_comments_shortcode"><?php echo __('The Foodle \'Comments\' Shortcode','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="2250" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#the_foodle_bar_graph_shortcode"><?php echo __('The Foodle \'Bar Graph\' Shortcode','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="2500" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#the_foodle_link_democracy_poll_shortcode"><?php echo __('The Foodle \'Link Democracy Poll\' Shortcode','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="2500" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#the_foodle_show_extra_fields_shortcode"><?php echo __('The Foodle \'Show Extra Fields\' Shortcode','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="2500" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#the_foodle_statistics_and_database_check_shortcode"><?php echo __('The Foodle \'Poll Statistics and Database Check\' Shortcode','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="2500" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#the_foodle_display_on_for_roles_shortcode"><?php echo __('The Foodle \'Display On For Roles\' Shortcode','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="2500" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#the_foodle_archive_do_not_show_shortcode"><?php echo __('The Foodle \'Archive Do Not Show\' Shortcode','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="2500" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#the_foodle_create_ics_shortcode"><?php echo __('The Foodle \'Create ICS\' Shortcode','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="2500" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#the_foodle_help_and_warning_tooltips"><?php echo __('The Foodle \'(Help- and Warning-)Tooltips\'','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="2500" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#the_foodle_smooth_scrolling_function"><?php echo __('The Foodle \'Smooth Scrolling Function\'','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="2750" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#how_to_handle_your_own_css_styles"><?php echo __('How to handle your own CSS styles','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="2750" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#the_democracy_poll_edit_page_updates"><?php echo __('The Democracy Poll Edit Page Updates','foodle-for-democracy-poll') ?></a></li>
      <li><a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="2750" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-60" href="#foodle_appreciation"><?php echo __('Appreciation for Foodle','foodle-for-democracy-poll') ?></a></li>
    </ul>
  </p>

  <p>&nbsp;</p>
  <p class="foodle-headline" name="latest_important_updates"><?php echo __('Latest important updates','foodle-for-democracy-poll') ?></p>
  <p class="foodle-text"><?php
  $span_open = '<span style="white-space:nowrap;">';
  $span_close = '</span>';
  $image_a1  = '<img style="margin-top:3px;width:25px;" src="'.plugin_dir_url(__FILE__).'img/votes_complete.png">';
  $image_b1  = '<img style="margin-top:3px;width:25px;" src="'.plugin_dir_url(__FILE__).'img/not_voted_yet.png">';
  $image_c1  = '<img style="margin-top:3px;width:25px;" src="'.plugin_dir_url(__FILE__).'img/nobody_to_vote.png">';
  $image_d1  = '<img style="margin-top:3px;width:25px;" src="'.plugin_dir_url(__FILE__).'img/votes_error.png">';
  $image_e1  = '<img style="margin-top:3px;width:25px;" src="'.plugin_dir_url(__FILE__).'img/foodle_parameters_not_fully_saved.png">';
  $image_f1  = '<img style="margin-top:3px;width:25px;" src="'.plugin_dir_url(__FILE__).'img/comments__yes.png">';
  $image_f1e = '<img style="margin-top:3px;width:25px;" src="'.plugin_dir_url(__FILE__).'img/comments__yes_wemail.png">';
  $image_g1  = '<img style="margin-top:3px;width:25px;" src="'.plugin_dir_url(__FILE__).'img/comments__no.png">';
  $image_a2  = '<img style="width:25px;" src="'.plugin_dir_url(__FILE__).'img/votes_complete.png">';
  $image_b2  = '<img style="width:25px;" src="'.plugin_dir_url(__FILE__).'img/not_voted_yet.png">';
  $image_c2  = '<img style="width:25px;" src="'.plugin_dir_url(__FILE__).'img/nobody_to_vote.png">';
  $image_d2  = '<img style="width:25px;" src="'.plugin_dir_url(__FILE__).'img/votes_error.png">';
  $image_e2  = '<img style="width:25px;" src="'.plugin_dir_url(__FILE__).'img/foodle_parameters_not_fully_saved.png">';
  $image_f2  = '<img style="width:25px;" src="'.plugin_dir_url(__FILE__).'img/comments__yes.png">';
  $image_f2e = '<img style="width:25px;" src="'.plugin_dir_url(__FILE__).'img/comments__yes_wemail.png">';
  $image_g2  = '<img style="width:25px;" src="'.plugin_dir_url(__FILE__).'img/comments__no.png">';
  $image_g2e = '<img style="width:25px;" src="'.plugin_dir_url(__FILE__).'img/comments__no_wemail.png">';

  echo sprintf(__('
    <ul class="foodle-ul">
      <li><strong>New from version 2.5.21.0: In the "Meta Field Defaults & Sorting" tab, sorting lists can be auto-generated for non-drop-down fields, based on the first meta field and the related regular expression, if existing.</strong></li>
      <li><strong>New from version 2.5.20.0: The meta fields can now be related to specific roles. This will influence the visibility of the meta fields in the user profiles. Furthermore, a new meta field clean-up can be performed by administrators in the "Meta Field Defaults & Sorting" tab.</strong></li>
      <li><strong>New from version 2.5.18.0: The ICS data for [foodle-create-ics] can now as well be stored in each poll\'s edit page.</strong></li>
      <li><strong>New from version 2.5.17.0: A new shortcode [foodle-create-ics] can be used to download an ics file and generate a calendar entry for events (e.g. those queried for in a poll and can therefore as well be used in a poll\'s text field).</strong></li>
      <li><strong>New from version 2.5.13.1: The comments display can now be limited to the user\'s own & admin comments (show_just_mine="true"). This can be useful in combination with the complete comments display e.g. in the Foodle table. And from version 2.5.14.0, comment email notifications can be set for each poll individually.</strong></li>
      <li><strong>New from version 2.5.12.0: Comments are now part of the Excel download. And from version 2.5.12.1 onward, the Foodle shortcode can display the comments in the Foodle table (comments="true").</strong></li>
      <li><strong>New from version 2.5.10.0: Individuals can be excluded from being considered as voters - regardless their role(s) - by the tab \'Special Roles & Users\'. From version 2.5.9.0, the bar graph text can be edited in the Foodle settings.</strong></li>
      <li><strong>New from version 2.5.8.0: The visibility of the bar graph tooltip with users who did not vote yet can now be controlled by roles.</strong></li>
      <li><strong>New from version 2.5.7.0: Added a dynamic icon (2.5.6.0) in the Democracy poll list and edit pages to visualize the following: %sa) %s everyone%s voted already, %sb) %s not%s everyone voted so far, %sc) %s the%s number of users to vote is zero or %sd) %s an%s unexpected voter did vote or the participation rate exceeds 100%%. In version 2.5.7.0, the following visualization was added: %se) %s NOT%s all (maybe the brandnew) Foodle poll parameters have been saved so far, so they are still in their programmed default state.</strong></li>
      <li><strong>New from version 2.5.5.0: A table with a list of users who did not vote so far for a poll is being displayed interactively as a tooltip when hovering with the mouse over the related bar graph (also available on touch screens: just touch the bar graph). Can be limited to administrators (= default) for each poll individually. This is also available in the back end Democracy poll list an in each poll edit page %s(icon %s).%s</strong></li>
      <li><strong>New from version 2.5.4.0: Only voters assigned for a poll are able to vote. For each poll, entering new comments can be controlled by roles and administrators\' vote option is controllable as well (since 2.5.3.0).</strong></li>
      <li><strong>New from version 2.5.1.0: A comments table preview is being displayed interactively in the back end Democracy poll list an in each poll edit page as a tooltip when hovering with the mouse over the related %sgreen icon %s / %s, which%s indicates that comments are available for a poll, <span style="color:#2271b1;">or when touching the green icon on touch screens (since 2.5.2.0). The latter indicates email notifications for comments to be switched on (since 2.5.14.2)</span>.</strong></li>
      <li><strong>New from version 2.5.0.0: A new shortcode to display the participation rate of individual polls by means of a bar graph.</strong></li>
      <li><strong>New from version 2.4.0.0: Visibility Management: In each Democracy Poll edit page, the poll-related visibility of Democracy Poll, Foodle and the poll\'s comments can be tailored in detail depending on the users\' roles.</strong></li>
      <li><strong>New from version 2.3.0.0: A new shortcode was introduced for logged-in users to collect and display user comments related to individual polls. And from version 2.3.7.0 onward, a user template for automated use in the Democracy Poll textarea is available.</strong></li>
      <li><strong>New from version 2.2.0.0: Selection of roles is now possible for polls in order to easier control reminder emails and statistics.</strong></li>
      <li><strong>New from version 2.1.0.0: A new back end tab was introduced to display the use of the Democracy shortcode and the Foodle main shortcode.</strong></li>
      <li><strong>New from version 2.0.0.0: Major release with a number of improvements and enhancements.</strong></li>
    </ul>','foodle-for-democracy-poll'), $span_open, $image_a1, $span_close, $span_open, $image_b1, $span_close, $span_open, $image_c1, $span_close, $span_open, $image_d1, $span_close, $span_open, $image_e1, $span_close, $span_open, $image_b1, $span_close, $span_open, $image_f1, $image_f1e, $span_close)
    ?>
  </p>

  <p>&nbsp;</p>
  <p class="foodle-headline" name="some_general_considerations"><?php echo __('Some general considerations','foodle-for-democracy-poll') ?></p>
  <p class="foodle-text"><?php echo __('The basic idea for this plugin was developed when the need for polls arrived for the choir I have the pleasure to be part of: <a target="_blank" href="https://voicesunlimited.de">Voices Unlimited</a>.','foodle-for-democracy-poll') ?></p>
  <p class="foodle-text">
    <?php echo __('This plugin can be used by any organization, association, union, society, club or group of people when polls shall be executed and results be displayed in a structured way, e.g.:
      <ul class="foodle-ul">
        <li>For this or that choir rehearsal or planned public event to be scheduled, would sufficient Sopranos 1 or Tenors 2 be available?</li>
        <li>Or do the choir members support this or that idea and from which sub-group do they come from?</li>
        <li>Or what could be winning ideas for the next concert stage dress (Democracy Poll with answers to be brought by the voters and be displayed for everyone easy to understand) and would this spread nicely in color on stage, considering the choir\'s stage order?</li>
        <li>...you will surely translate all this into your own environment and your own needs...</li>
      </ul>','foodle-for-democracy-poll')
    ?>
  </p>
  <p class="foodle-text"><?php echo __('<strong>Main feature</strong> is the Foodle shortcode, which allows to display poll results in a configurable table format. Alongside the Democracy Poll shortcode, it will display the results interactively by use of AJAX communication. However, it can as well be used independently to just display poll results. Together with the WordPress comments function in pages or posts, this can be considered a good tool for online interaction with your registered (!) users.','foodle-for-democracy-poll') ?></p>
  <p class="foodle-text"><?php echo __('<strong>Warning! Democracy Poll\'s logging and IP storing option must be activated in order for Foodle to work.</strong> By this, all votes are stored in the database for Foodle to work with. You may select to avoid IP storage in each individual poll in order to avoid failures when voters share the same IP address, e.g. when voting in the same WLAN environment.','foodle-for-democracy-poll') ?></p>

  <p>&nbsp;</p>
  <p class="foodle-text"name="the_list_of_foodle_features">
    <?php echo sprintf(__('<strong>The list of Foodle features comprises:</strong>
      <ul class="foodle-ul">
        <li>The interactive poll results table (shortcode [foodle-democracy-poll-list-log])</li>
        <li>This shortcode only makes sense and therefore only works for registered users (else: no display) and registered voters (else: message)</li>
        <li>All other functions work regardless this necessary restriction</li>
        <li>A shortcode for logged-in users ([foodle-comments]) to collect and display user comments related to individuall polls (hint: in the back end Democracy poll list and each poll edit page, when hovering with the mouse over %sthis icon %s / %s or%s touching it on a touch screen, a tooltip with a comments table preview is being displayed)</li>
        <li>A shortcode for logged-in users ([foodle-poll-bar-graph]) to display the participation rate of individual polls by means of a bar graph (hint: when hovering with the mouse over the bar graph or touching it on touch screens, a tooltip with a list of users that did not vote yet is being displayed - the same is true in the back end Democracy poll list and each poll edit page %sby use of one of these icons %s&nbsp;%s&nbsp;%s&nbsp;%s)%s</li>
        <li>Several Democracy Poll shortcodes on one page/post (like before)</li>
        <li>Full shortcode flexibility: Several Foodle shortcodes - even for the same Democracy Poll id with differing parameters - on one page/post</li>
        <li>Email reminders for users who are late to vote</li>
        <li>An unlimited number of user metafields to be defined and used with relation to user roles (in user profile - can be switched off in Foodle settings)</li>
        <li>A meta field clean-up can be performed by administrators in the "Meta Field Defaults & Sorting" tab.</li>
        <li>In the user profile, for already existing metafields as well used by Foodle, these can be deactiviated elsewhere in the user profile in order to just be filled in the user profile\'s Foodle area</li>
        <li>A shortcode for a front end interface to these extra user metafields</li>
        <li>Recovery of orphaned own metafield field names, which still have data in the database (user meta)</li>
        <li>Deletion of data in the database (user meta) for own metafield field names, which are orphaned</li>
        <li>Manual drag-n-drop fields sorting</li>
        <li>Careful (!) selection and use of existing user metafields</li>
        <li>Manual entry or drop-down entry in the user profile</li>
        <li>Automated filling of user metafields by use of Regular Expressions</li>
        <li>Easy overview and control over past user entries (normalization)</li>
        <li>Flexible sorting definitions</li>
        <li>Definition of role & user plugin-internal capabilities</li>
        <li>Dashboard widget (and shortcode) to provide statistics and check for logical errors in democracy_q, democracy_a and democracy_log databases</li>
        <li>A shortcode to link to the Foodle page/post</li>
        <li>A shortcode to display content based on roles</li>
        <li>A free name/title definition for Foodle, e.g. for the user profile and the email</li>
        <li>Changeable highlighting of Foodle & Democracy Poll in the admin menu and admin toolbar</li>
        <li>You can define a list of page/post IDs where the AJAX interactivitiy is switched off</li>
        <li>Switchable interactive explanations for all functions (\'Help-Tooltips\')</li>
        <li>Warning-Tooltips can be disabled</li>
        <li>Help-Tooltips and Warning-Tooltips are available anywhere for the administrator (front end and back end)</li>
        <li>A smooth scrolling function is available anywhere for the administrator (front end and back end)</li>
        <li>A scroll up button with Foodle settings to have control over its visibility throughout front end and back end</li>
        <li>A number of Foodle CSS classes to have the design control</li>
        <li>In parallel to the \'administrator\' role, managing Foodle can be delegated to other roles and their allowances can be tailored to your needs - some settings, however, will remain an administrator privilege (Foodle title, post exclusion, roles/allowances and vote expiry)</li>
        <li>Tracking of Foodle shortcode use in pages/posts</li>
        <li>A user template for automated use in the textarea of Democracy Poll is available</li>
        <li>A shortcode to create calendar entries with ics files</li>
        <li>Download of Foodle tables to Excel format, incl. comments (Beta2)</li>
      </ul>','foodle-for-democracy-poll'),$span_open, $image_f2, $image_f2e, $span_close,$span_open, $image_b2, $image_c2, $image_d2, $image_e2, $span_close)
    ?>
  </p>

  <p>&nbsp;</p>
  <p class="foodle-text" name="additions_to_democracy_poll">
    <?php echo sprintf(__('<strong>In addition to that, functionality is added to Democracy Poll:</strong>
      <ul class="foodle-ul">
        <li>In multiple answers polls, you can combine checkboxes and radio buttons</li>
        <li>In each poll edit page, you may select from the available categories (user metafields) for display</li>
        <li>In each poll edit page, you may define the (main) category to be used for the category column</li>
        <li>In each poll edit page, you may define the related text of its sorting button</li>
        <li>In each poll edit page, you may decide whether to display an AJAX refresh button in the results displays (voted and/or not voted)</li>
        <li>In each poll edit page, you may decide whether to have marked users to be counted (columns sums and first-come/first-serve answers)</li>
        <li>In each poll edit page, you may decide whether to prevent from storing the voters\' IP adresses for this poll in order to preserve full functionality even when voters share the same IP address.<br><strong>Reminder:</strong> Democracy Poll\'s logging and IP storing option must remain activated in order for Foodle to work!</li>
        <li>In each poll edit page, you may decide for which roles the related poll is intented. Will determine the display of shortcodes \'foodle-democracy-poll-list-log\' and \'foodle-comments\' as well as determine the user base for email reminders (besides the settings in tab \'Special Roles & Users\') and statistics</li>
        <li>In each poll edit page, you can control the Democracy Poll textarea and the use of its user template by a few buttons</li>
        <li>In each poll edit page, the visibility of Democracy Poll, Foodle, the poll\'s comments, the bargraph and the bargraph tooltip can be tailored in detail depending on the users\' roles</li>
        <li>In each poll edit page, you can determine whether the administrator role is allowed to vote anyway, regardless the Foodle visibility settings</li>
        <li>In each poll edit page and in the poll list, an icon will visualize the following: %sa) %s / %s this%s poll has no comments, yet or %sb) %s / %s this%s poll has received comments (hint: when hovering with the mouse over this icon or touching it on a touch screen, a tooltip with a comments table preview is being displayed)</li>
        <li>In each poll edit page and in the poll list, a dynamic icon will visualize the following: %sa) %s everyone%s voted already, %sb) %s not%s everyone voted so far, %sc) %s the%s number of users to vote is zero, %sd) %s an%s unexpected voter did vote or the participation rate exceeds 100%% or %se) %s NOT%s all (maybe the brandnew) Foodle poll parameters have been saved so far, so they are still in their programmed default state (hint: when hovering with the mouse over one of these icons or touching it on a touch screen, a tooltip with a list of users that did not vote yet is being displayed)</li>
        <li>* In each poll edit page, you can store the ICS data for use by shortcode [foodle-create-ics]</li>
        <li>In the graphical poll results, a text will indicate the voter\'s choice(s)</li>
        <li>You can choose to avoid the vote expiry on polls lasting longer than 12 months</li>
        <li>The use of shortcodes is now possible inside the Democracy Poll\'s own text field located underneath the very poll</li>
        <li>A shortcode to disable the display of certain Foodle IDs in an archive listing (i.e. by enclosing the related Democracy Poll archive shortcode)</li>
        <li>A number of Democracy CSS classes to have the design control</li>
        <li>Corrected tracking of Democracy shortcode use in pages/posts</li>
      </ul>','foodle-for-democracy-poll'), $span_open, $image_g2, $image_g2e, $span_close, $span_open, $image_f2, $image_f2e, $span_close, $span_open, $image_a2, $span_close, $span_open, $image_b2, $span_close, $span_open, $image_c2, $span_close, $span_open, $image_d2, $span_close, $span_open, $image_e2, $span_close);
    ?>
  </p>
  <p class="foodle-text"><?php echo __('You will probably - at least in the beginning - want to switch-on the \'Help-Tooltips\' (Foodle Settings)<br>to see explanations for every function throughout these tabs.<br>And don\'t hesitate to <a href="mailto:plugins@finkenberger.net?subject=Foodle%20Feature-Proposal">propose additional valuable features</a> you might still be missing - for me to review.','foodle-for-democracy-poll') ?></p>

  <p>&nbsp;</p>
  <p class="foodle-headline" name="the_foodle_shortcode"><?php echo __('The Foodle Shortcode','foodle-for-democracy-poll') ?></p>
  <figure class="foodle-block-table">
    <table class="foodle-tips-table">
      <thead>
        <tr class="foodle-header-row"><th style="width:33.34%; min-width:260px;"><?php echo $shortcode_parameters ?></th><th style="width:66.66%;"><?php echo $explanations ?></th></tr>
      </thead>
      <tbody>
        <tr><td>[democracy id="12"]</td><td><?php echo __('Democracy Poll shortcode use example.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>[foodle-democracy-poll-list-log id="12" show_date="false" show_category="true" categories="true" ml_single_sum="10" answerlist="false" categorysort="false" blocksort="false" solo="false" maxcount="0.1" comments="true"]</td><td><?php echo __('Foodle shortcode use example.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle-democracy-poll-list-log</td><td><?php echo $the_shortcode_slug ?></td></tr>
        <tr><td>id="12"</td><td><?php echo __('Links to the Democracy Poll id.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>show_date="true/false"</td><td><?php echo $switch_on_off.': '.__('Display the column with the vote date (will be visible for administrators and special viewers if so selected in the Foodle settings).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>show_category="true/false"</td><td><?php echo $switch_on_off.': '.__('Display the column with the selected category.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>categories="true/false"</td><td><?php echo $switch_on_off.': '.__('Display selected categories (sorted) underneath the answer columns.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>ml_single_sum="10"</td><td><?php echo __('The number of rows (default=10) until which only one line containing the column\'s sum of votes shall be displayed.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>answerlist="true/false"</td><td><?php echo $switch_on_off.': '.__('Instead of displaying the answers as columns with green marks for each vote: list the answers of each voter as one column - this may be especially interesting, when individual answers of voters are enabled and displayed.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>categorysort="true/false"</td><td><?php echo $switch_on_off.': '.__('Decides whether to start the table list with sorting by category (yes) or the date of vote (false).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>blocksort="true/false"</td><td><?php echo $switch_on_off.': '.__('Blocks (true) or allows (false) to display the button for changing the initial sorting.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>solo="true/false"</td><td><?php echo $switch_on_off.': '.__('Display everything as selected but without the special viewers areas (reminders area & hidden date column), without the title line and without the \'foodle_table_top_spacing\' - \'foodle_table_bottom_spacing\' stays active.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>maxcount="x.y"</td><td><?php echo __('Highlight in green color the first x voters that voted for column y (if only one parameter is given, x.1 is assumed, i.e. x at first column, special roles/users will not be counted & highlighted if in the "marked" category) - one potential use could be to determine certain applications on a first-come/first-serve basis.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>comments="false/true"</td><td><?php echo $switch_on_off.': '.__('Display the poll related comments (true) or not (false) (default = false).','foodle-for-democracy-poll') ?></td></tr>
      </tbody>
    </table>
  </figure>

  <p>&nbsp;</p>
  <p class="foodle-headline" name="the_foodle_comments_shortcode"><?php echo __('The Foodle \'Comments\' Shortcode','foodle-for-democracy-poll') ?></p>
  <figure class="foodle-block-table">
    <table class="foodle-tips-table">
      <thead>
        <tr class="foodle-header-row"><th style="width:33.34%; min-width:260px;"><?php echo $shortcode_parameters ?></th><th style="width:66.66%;"><?php echo $explanations ?></th></tr>
      </thead>
      <tbody>
        <tr><td>[foodle-comments id="12" comments_active="true" show_comments="true" show_date="false" show_time="false" edit_comments="false" delete_comments="false"]</td><td><?php echo __('Foodle \'Comments\' shortcode use example.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>[foodle-comments id="self" comments_active="true" show_comments="true" show_date="false" show_time="false" show_just_mine="true" edit_comments="false" delete_comments="false"]</td><td><?php echo __('Foodle \'Comments\' shortcode use example inside Democracy Poll\'s own text field.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle-comments</td><td><?php echo $the_shortcode_slug ?></td></tr>
        <tr><td>id="12"</td><td><?php echo __('The Democracy Poll id.<br>For use inside Democracy Poll\'s own text field, you may provide "self" as a valid id value.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>comments_active="true/false"</td><td><?php echo __('Whether new comments are enabled (default = true).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>show_comments="true/false"</td><td><?php echo __('Whether the comments to be displayed (default = true).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>show_date="false/true"</td><td><?php echo __('Whether the comment date will be shown (default = false).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>show_time="false/true"</td><td><?php echo __('Whether the comment time will be shown (relevant only if show_date="true", default = false).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>show_just_mine="false/true"</td><td><?php echo __('Whether only the user\'s own comments (as well as admin comments and comments of users that did not yet vote) will be shown (default = false). This can be useful, if the other comments are already being displayed elsewhere on the page, e.g. in the Foodle table.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>edit_comments="false/true"</td><td><?php echo __('Whether the users can edit all comments of their own (default = false); will be indicated by changing background color and date.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>delete_comments="false/true"</td><td><?php echo __('Whether the users can delete all comments of their own (default = false); will be indicated by','foodle-for-democracy-poll')." '- - -'." ?></td></tr>
        <tr><td colspan="2"><?php echo __('Use case: can be used anywhere in the front end, preferably in the vicinity of the poll and/or the Foodle table. Therefore, in order to have more control on the page, class \'foodle-table-bottom-spacing\' has been reduced by default to 0px (60px before). New comments can be switched off, e.g. for closed polls or when used inside Democracy Poll\'s own text field located underneath the very poll (in such a case, the table headline carrying the poll name will be removed). Therefore, the display of comments can as well be switched off, e.g. to just enter comments elsewhere without displaying them, maybe underneath the Democracy Poll window.','foodle-for-democracy-poll') ?></td></tr>
      </tbody>
    </table>
  </figure>

  <p>&nbsp;</p>
  <p class="foodle-headline" name="the_foodle_bar_graph_shortcode"><?php echo __('The Foodle \'Bar Graph\' Shortcode','foodle-for-democracy-poll') ?></p>
  <figure class="foodle-block-table">
    <table class="foodle-tips-table">
      <thead>
        <tr class="foodle-header-row"><th style="width:33.34%; min-width:260px;"><?php echo $shortcode_parameters ?></th><th style="width:66.66%;"><?php echo $explanations ?></th></tr>
      </thead>
      <tbody>
        <tr><td>[foodle-poll-bar-graph id="12"]</td><td><?php echo __('Foodle \'bar graph\' shortcode use example.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>[foodle-poll-bar-graph id="self"]</td><td><?php echo __('Foodle \'bar graph\' shortcode use example inside Democracy Poll\'s own text field.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle-poll-bar-graphs</td><td><?php echo $the_shortcode_slug ?></td></tr>
        <tr><td>id="12"</td><td><?php echo __('The Democracy Poll id.<br>For use inside Democracy Poll\'s own text field, you may provide "self" as a valid id value.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td colspan="2"><?php echo __('Use case: can be used anywhere in the front end, preferably in the vicinity of the poll and/or the Foodle table. The shortcode will display a bar graph, representing the participation rate of individual polls.','foodle-for-democracy-poll') ?></td></tr>
      </tbody>
    </table>
  </figure>

  <p>&nbsp;</p>
  <p class="foodle-headline" name="the_foodle_link_democracy_poll_shortcode"><?php echo __('The Foodle \'Link Democracy Poll\' Shortcode','foodle-for-democracy-poll') ?></p>
  <figure class="foodle-block-table">
    <table class="foodle-tips-table">
      <thead>
        <tr class="foodle-header-row"><th style="width:33.34%; min-width:260px;"><?php echo $shortcode_parameters ?></th><th style="width:66.66%;"><?php echo $explanations ?></th></tr>
      </thead>
      <tbody>
        <tr><td>[foodle-link-democracy-poll id="12" not_same="false" verbose="true" horizontal="left" status='logged-in, not-logged-in']</td><td><?php echo __('Foodle \'Link Democracy Poll\' shortcode use example.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>[foodle-link-democracy-poll id="self" not_same="true" verbose="false" horizontal="center" status='logged-in']</td><td><?php echo __('Foodle \'Link Democracy Poll\' shortcode use example inside Democracy Poll\'s own text field.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle-link-democracy-poll</td><td><?php echo $the_shortcode_slug ?></td></tr>
        <tr><td>id="12"</td><td><?php echo __('The Democracy Poll id.<br>The shortcode will generate an HTML-link to the first page/post stored in the poll database (if this is the case). For usage inside Democracy Poll\'s own text field, you may provide "self" as a valid id value.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>not_same="true/false"</td><td><?php echo __('"true": No link dispay if the shortcode is on the main poll page, "false": Display the link in any case - default = "true".','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>verbose="true/false"</td><td><?php echo __('"true": Verbose mode: errors will be displayed, "false": Silent mode: errors will not be displayed - default = "true".','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>horizontal="left/center/right"</td><td><?php echo __('Defines the horizontal button alignment - default = "left".','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>status="logged-in, not-logged-in"</td><td><?php echo __('Defines the user status requirement list for the link button display - default = "logged-in, not-logged in", meaning: display in both cases.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td colspan="2"><?php echo __('This shortcode can be used anywhere. However, it could make sense near a remote representation of the poll shortcode (e.g. inside Democracy Poll\'s own text field - see above) or the Foodle shortcode.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td><?php echo __('One word on the link to the (main) poll page/post (see next shortcode)','foodle-for-democracy-poll') ?></td><td><?php echo __('Democracy Poll stores the pages/posts where it considers presence of its shortcode. This plugin will consider the first entry per poll to be the master (if it exists anyway).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td><?php echo __('Known Limitations','foodle-for-democracy-poll') ?></td><td><?php echo __('Obviously, as tests revealed, Democracy Poll will record the pages/posts with its shortcode upon page/post display only, hence, shortcode deletions might not be recorded properly. But no problem: Foodle will correct this on each page/post save in the database ({PREFIX}democracy_q, column \'in_posts\') and will as well record there the Foodle shortcode uses in column \'in_foodles\'.','foodle-for-democracy-poll') ?></td></tr>
      </tbody>
    </table>
  </figure>

  <p>&nbsp;</p>
  <p class="foodle-headline" name="the_foodle_show_extra_fields_shortcode"><?php echo __('The Foodle \'Show Extra Fields\' Shortcode','foodle-for-democracy-poll') ?></p>
  <figure class="foodle-block-table">
    <table class="foodle-tips-table">
      <thead>
        <tr class="foodle-header-row"><th style="width:33.34%; min-width:260px;"><?php echo $shortcode_parameters ?></th><th style="width:66.66%;"><?php echo $explanations ?></th></tr>
      </thead>
      <tbody>
        <tr><td>[foodle-show-extra-fields]</td><td><?php echo __('Foodle \'Show Extra Fields\' shortcode use example: the shortcode has no parameters.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td colspan="2"><?php echo __('Use cases: You can use this shortcode anywhere in your front end, not just for Foodle, to provide a user interface to the extra metafields beyond the user profile.','foodle-for-democracy-poll') ?></td></tr>
      </tbody>
    </table>
  </figure>

  <p>&nbsp;</p>
  <p class="foodle-headline" name="the_foodle_statistics_and_database_check_shortcode"><?php echo __('The Foodle \'Poll Statistics and Database Check\' Shortcode','foodle-for-democracy-poll') ?></p>
  <figure class="foodle-block-table">
    <table class="foodle-tips-table">
      <thead>
        <tr class="foodle-header-row"><th style="width:33.34%; min-width:260px;"><?php echo $shortcode_parameters ?></th><th style="width:66.66%;"><?php echo $explanations ?></th></tr>
      </thead>
      <tbody>
        <tr><td>[foodle-democracy-poll-database-check use="all"]</td><td><?php echo __('Foodle Poll Statistics and Database Check shortcode use example.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle-democracy-poll-database-check</td><td><?php echo $the_shortcode_slug ?></td></tr>
        <tr><td>use="statistics/check/all"</td><td><?php echo __('"statistics": show the poll statistics, "check": show the logical database check results, "all": show both.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td colspan="2"><?php echo __('The shortcode\'s complete function set is used as a dashboard widget. However you may use it elswhere and configured as you like, e.g. for other registered users.','foodle-for-democracy-poll') ?></td></tr>
      </tbody>
    </table>
  </figure>

  <p>&nbsp;</p>
  <p class="foodle-headline" name="the_foodle_display_on_for_roles_shortcode"><?php echo __('The Foodle \'Display On For Roles\' Shortcode','foodle-for-democracy-poll') ?></p>
  <figure class="foodle-block-table">
    <table class="foodle-tips-table">
      <thead>
        <tr class="foodle-header-row"><th style="width:33.34%; min-width:260px;"><?php echo $shortcode_parameters ?></th><th style="width:66.66%;"><?php echo $explanations ?></th></tr>
      </thead>
      <tbody>
        <tr><td>[foodle-display-on-for-roles roles="aaa,bbb,..." marking="true"] ... content ... [/foodle-display-on-for-roles]</td><td><?php echo __('Foodle \'Display On For Roles\' shortcode use example: the shortcode requires a closing tag to contain the content to be controlled.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle-display-on-for-roles</td><td><?php echo $the_shortcode_slug ?></td></tr>
        <tr><td>roles="aaa,bbb,..."</td><td><?php echo __('A comma-separated list of roles for which the content is to be shown.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>marking="true/false"</td><td><?php echo $switch_on_off.': '.__('Whether to mark the content, indicating that it is hidden for others: in original-state, a dashed border is shown if \'true\' - you can influence the marking by your own CSS.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td colspan="2"><?php echo __('Use cases: e.g. the Democracy Poll archive, polls for certain user groups, or other uses. You can use this shortcode anywhere in your environment, not just for Foodle.','foodle-for-democracy-poll') ?></td></tr>
      </tbody>
    </table>
  </figure>

  <p>&nbsp;</p>
  <p class="foodle-headline" name="the_foodle_archive_do_not_show_shortcode"><?php echo __('The Foodle \'Archive Do Not Show\' Shortcode','foodle-for-democracy-poll') ?></p>
  <figure class="foodle-block-table">
    <table class="foodle-tips-table">
      <thead>
        <tr class="foodle-header-row"><th style="width:33.34%; min-width:260px;"><?php echo $shortcode_parameters ?></th><th style="width:66.66%;"><?php echo $explanations ?></th></tr>
      </thead>
      <tbody>
        <tr><td>[foodle-archive-do-not-show do_not_show="aaa,bbb,..."] ... content ... [/foodle-archive-do-not-show]</td><td><?php echo __('Foodle \'Archive Do Not Show\' shortcode use example: the shortcode requires a closing tag to contain the content to be controlled.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle-archive-do-not-show</td><td><?php echo $the_shortcode_slug ?></td></tr>
        <tr><td>do_not_show="aaa,bbb,..."</td><td><?php echo __('A comma-separated list of Foodle IDs for which the display in the content is to be inhibited.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td colspan="2"><?php echo __('Use case: the content needs to be the Democracy Poll archive shortcode, e.g. [democracy_archives active="1"], for which the display of certain Foodle IDs will be inhibited. This can be useful to display certain archive excerpts for specific user groups or avoid the display of private polls. There is no other option for this shortcode\'s content!','foodle-for-democracy-poll') ?></td></tr>
      </tbody>
    </table>
  </figure>

<p>&nbsp;</p>
<p class="foodle-headline" name="the_foodle_create_ics_shortcode"><?php echo __('The Foodle \'Create ICS\' Shortcode','foodle-for-democracy-poll') ?></p>
<figure class="foodle-block-table">
  <table class="foodle-tips-table">
    <thead>
      <tr class="foodle-header-row"><th style="width:33.34%; min-width:260px;"><?php echo $shortcode_parameters ?></th><th style="width:66.66%;"><?php echo $explanations ?></th></tr>
    </thead>
    <tbody>
      <tr><td>[foodle-create-ics id="12" event_summary="vvv" event_start="2024-09-16 16:45" event_end="2024-09-16 18:30" event_description="www" event_location="xxx" event_url="https://yyy.com" ics_button_text="zzz"]</td><td><?php echo __('Foodle \'Create ICS\' shortcode use example.','foodle-for-democracy-poll') ?></td></tr>
      <tr><td>foodle-create-ics</td><td><?php echo $the_shortcode_slug ?></td></tr>
      <tr><td>id="12"</td><td><?php echo __('The Democracy Poll id (optional here).<br>For use inside Democracy Poll\'s own text field, you may provide "self" as a valid id value.<br>If provided and valid, Foodle will take the ICS data from the poll. However, every single parameter can be overwritten by the related shortcode parameter, if provided and valid.','foodle-for-democracy-poll') ?></td></tr>
      <tr><td>event_summary="vvv"</td><td><?php echo __('A text with the event\'s name or summary title.<br><strong>Either through the poll or the shortcode: event_start must be provided!</strong>','foodle-for-democracy-poll') ?></td></tr>
      <tr><td>event_start="YYYY-MM-DD hh:mm:ss"</td><td><?php echo __('The event\'s start. Please see the expected format. Seconds (:ss) can be left out.<br><strong>Either through the poll or the shortcode: event_start must be provided!</strong>','foodle-for-democracy-poll') ?></td></tr>
      <tr><td>event_end="YYYY-MM-DD hh:mm:ss"</td><td><?php echo __('The event\'s end. Please see the expected format. Seconds (:ss) can be left out.<br>Either through the poll or the shortcode: If not provided, event_start plus 1 minute is set.','foodle-for-democracy-poll') ?></td></tr>
      <tr><td>event_description="www"</td><td><?php echo __('A text with the event\'s description.<br>Use "" to leave it empty, otherwise, a message will appear in the calendar if id is not used.','foodle-for-democracy-poll') ?></td></tr>
      <tr><td>event_location="xxx"</td><td><?php echo __('A text with the event\'s location.<br>Use "" to leave it empty, otherwise, a message will appear in the calendar if id is not used.','foodle-for-democracy-poll') ?></td></tr>
      <tr><td>event_url="https://yyy.com"</td><td><?php echo __('The event\'s URL.<br>Use "" to leave it empty.','foodle-for-democracy-poll') ?></td></tr>
      <tr><td>ics_button_text="zzz"</td><td><?php echo __('Define the button text. If not provided or empty, the standard button text will be used if id is not used.','foodle-for-democracy-poll') ?></td></tr>
      <tr><td colspan="2"><?php echo __('Use case: use the shortcode for downloading ics files in order to provide your users with the option to generate calendar entries. This can be useful when an event is being polled for. Therefore, the shortcode can be used as well inside the poll\'s own text field.<br>Within a poll, you can have an auto button being created. This eliminates the need to place the shortcode but requires the ics data to be inserted in the poll edit page.','foodle-for-democracy-poll') ?></td></tr>
    </tbody>
  </table>
</figure>

  <p>&nbsp;</p>
  <p class="foodle-headline" name="the_foodle_help_and_warning_tooltips"><?php echo __('The Foodle \'(Help- and Warning-)Tooltips\'','foodle-for-democracy-poll') ?></p>
  <figure class="foodle-block-table">
    <table class="foodle-tips-table">
      <thead>
        <tr class="foodle-header-row"><th style="width:33.34%; min-width:260px;"><?php echo __('Usage','foodle-for-democracy-poll') ?></th><th style="width:66.66%;"><?php echo $explanations ?></th></tr>
      </thead>
      <tbody>
        <tr><td>foodle_tooltip="..."</td><td><?php echo __('Usage inside an HTML-tag as required (... = your text with optional HTML tags).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle_tooltip_delay="a"</td><td><?php echo __('The delay to show the tooltip in a ms (default if missing = "400" ms).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle_tooltip_dy="b"</td><td><?php echo __('The vertical distance to the mouse-pointer in b px (default if missing = "14" px).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle_tooltip_dx="c"</td><td><?php echo __('The horizontal distance to the mouse-pointer in c px (default if missing = "14" px).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle_tooltip_touch="false/true"</td><td><?php echo __('Decides whether the tooltip will stay visible when touched on touch screens. Should not be used for buttons.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>#foodle_jqueryTooltip</td><td><?php echo __('The related CSS id to control its styles.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle_ttwarning="..."</td><td><?php echo __('Usage inside an HTML-tag as required (... = your text with optional HTML tags).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle_ttwarning_delay="x"</td><td><?php echo __('The delay to show the tooltip in x ms (default if missing = "0" ms).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle_ttwarning_dy="y"</td><td><?php echo __('The vertical distance to the mouse-pointer in y px (default if missing = "-80" px).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle_ttwarning_dx="z"</td><td><?php echo __('The horizontal distance to the mouse-pointer in z px (default if missing = "-20" px).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>#foodle_jqueryTtwarning</td><td><?php echo __('The related CSS id to control its styles.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td colspan="2"><?php echo __('Can be used anywhere in the front end and the back end.','foodle-for-democracy-poll') ?></td></tr>
      </tbody>
    </table>
  </figure>

  <p>&nbsp;</p>
  <p class="foodle-headline" name="the_foodle_smooth_scrolling_function"><?php echo __('The Foodle \'Smooth Scrolling Function\'','foodle-for-democracy-poll') ?></p>
  <figure class="foodle-block-table">
    <table class="foodle-tips-table">
      <thead>
        <tr class="foodle-header-row"><th style="width:33.34%; min-width:260px;"><?php echo __('Usage','foodle-for-democracy-poll') ?></th><th style="width:66.66%;"><?php echo $explanations ?></th></tr>
      </thead>
      <tbody>
        <tr><td><?php echo esc_html('<a class="foodle-smooth-scroll" foodle_smooth_scroll_duration="1000" foodle_smooth_scroll_effect="easeInOutCubic" foodle_smooth_scroll_offset="-20" href="#to_any_page_element_with_this_name">...</a>') ?></td><td><?php echo __('Foodle smooth scrolling use example.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-smooth-scroll</td><td><?php echo __('Use this class for a smooth scroll link to #an_element named like this on the same page.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle_smooth_scroll_duration="a"</td><td><?php echo __('The duration of the scroll event in a ms (default if missing = "1500" ms).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle_smooth_scroll_effect="b"</td><td><?php echo __('The easing effect b of the scroll event (default if missing = "swing").<br>Besides "linear" and "swing", <a href="https://easings.net">you may look here for typical easings</a>','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>foodle_smooth_scroll_offset="c"</td><td><?php echo __('The vertical scroll distance to the target element in c px (default if missing = "0" px).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td colspan="2"><?php echo __('Can be used anywhere in the front end and the back end.','foodle-for-democracy-poll') ?></td></tr>
      </tbody>
    </table>
  </figure>

  <p>&nbsp;</p>
  <p class="foodle-headline" name="how_to_handle_your_own_css_styles"><?php echo __('How to handle your own CSS styles','foodle-for-democracy-poll') ?></p>
  <figure class="foodle-block-table">
    <table class="foodle-tips-table">
      <thead>
        <tr class="foodle-header-row"><th style="width:33.34%; min-width:260px;"><?php echo __('IDs / Classes','foodle-for-democracy-poll') ?></th><th style="width:66.66%;"><?php echo $explanations ?></th></tr>
      </thead>
      <tbody>
        <tr><td>.democracy</td><td><?php echo __('The Democracy Poll front end in general.<br><br>You may want to further inspect any elements of interest with your browser, searching for classes and ids in order allow control through CSS. Foodle\'s (friendly) CSS allows you to also remove or adjust the design changes done by Foodle. The default Foodle CSS is based on the Democracy \'block.css\' selection in \'Theme Settings\').','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.dem-poll-note</td><td><?php echo __('The Democracy Poll\'s textarea. Listed here, as Democracy Poll sets it to \'opacity:0.8;\' - just in case this needs to be changed.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.democracy-voting</td><td><?php echo __('The Democracy Poll front end when voting. For all other explanations: see class \'.democracy\'.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.democracy-results</td><td><?php echo __('The Democracy Poll front end when displaying the voting results. For all other explanations: see class \'.democracy\'.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.democracy-voted</td><td><?php echo __('The Democracy Poll front end when the viewing user did already vote for this poll. For all other explanations: see class \'.democracy\'.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.democracy-not-voted</td><td><?php echo __('The Democracy Poll front end when the viewing user did not yet vote for this poll. For all other explanations: see class \'.democracy\'.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.democracy-your-vote</td><td><?php echo __('The text in the results display that indicates where the viewing user placed his votes.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.democracy-refresh-button</td><td><?php echo __('The button to start an AJAX refresh of the Democracy Poll results display.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-line</td><td><?php echo __('Foodle\'s horizontal line.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-block-table</td><td><?php echo __('Used in the &lt;figure&gt; tag that encloses the Foodle table. In original state, it allows the Foodle table to be scrolled horizontally on small screens.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.is-style-stripes</td><td><?php echo __('Used in the &lt;figure&gt; tag for the Foodle table.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.has-subtle-light-grey-background-color</td><td><?php echo __('Used in the &lt;figure&gt; tag for the Foodle table.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-link-shortcode</td><td><?php echo __('The outer &lt;p&gt; wrapper around the link to the initial poll page ([foodle-link-democracy-poll]).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-link-shortcode-X</td><td><?php echo __('A specific outer &lt;p&gt; wrapper around the link to the initial poll page ([foodle-link-democracy-poll]). X is to be replaced by the related poll id.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-graph-wrapper</td><td><?php echo __('The outer &lt;div&gt; wrapper around the bar graph.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>#foodle_graph_wrapper_X</td><td><?php echo __('The id for a specific outer &lt;div&gt; wrapper around the bar graph. X is to be replaced by the related poll id.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-graph-title</td><td><?php echo __('The &lt;div&gt; title above the bar graph.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>#foodle_graph_title_X</td><td><?php echo __('The id for a specific &lt;div&gt; title above the bar graph. X is to be replaced by the related poll id.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-graph-box</td><td><?php echo __('The &lt;div&gt; padding box around the bar graph.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-graph</td><td><?php echo __('The very bar graph &lt;div&gt;.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-votes-txt</td><td><?php echo __('Wrapping all text in the bar graph.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-votes-txt-votes</td><td><?php echo __('The text explaining the bar content.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-votes-txt-percent</td><td><?php echo __('The percentage data text.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-comments-table</td><td><?php echo __('The table generated by the shortcode \'foodle-comments\'.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>#foodle_comments_table_X</td><td><?php echo __('The id for a specific Foodle comments table. X is to be replaced by the related poll id.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-comments-table-headline</td><td><?php echo __('The first Foodle comments table headline with the poll name.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>#foodle_comments_table_headline_X</td><td><?php echo __('The id for a specific first Foodle comments table headline with the poll name. X is to be replaced by the related poll id.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-comments-table-headline-columns</td><td><?php echo __('The second Foodle comments table headline with the column names.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-comments-user</td><td><?php echo __('The user column of the Foodle comments table.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-comments-date</td><td><?php echo __('The date column of the Foodle comments table.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-comments-comment</td><td><?php echo __('The comments column of the Foodle comments table.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-comments-delete</td><td><?php echo __('The delete column of the Foodle comments table.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-poll-new-comment-wrapper</td><td><?php echo __('The outer wrapper around the new comment input.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-poll-new-comment-title</td><td><?php echo __('The new comment title.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>#foodle_poll_new_comment_title_X</td><td><?php echo __('A specific new comment title. X is to be replaced by the related poll id.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-poll-new-comment-text</td><td><?php echo __('The new comment input textarea.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>#foodle_poll_new_comment_text_X</td><td><?php echo __('The id to address a specific new comment input textarea. X is to be replaced by the related poll id.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-new-comments-button</td><td><?php echo __('The button underneath the \'foodle-comments\' shortcode new comment input to submit a comment.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-table</td><td><?php echo __('The Foodle table.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.category-inner-div</td><td><?php echo __('The inner category display underneath each answer column. In original state: just centered horizontally.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-button</td><td><?php echo __('The button in the email-reminder area.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-sort-is</td><td><?php echo __('The information above the Foodle Table\'s sort button, indicating the current sorting mode. In original state: "white-space:nowrap;" plus a few others.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-sort-button</td><td><?php echo __('The button to switch sorting modes in the Foodle table. In original state: "white-space:nowrap;" plus a few others.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-link-button</td><td><?php echo __('The button used by shortcode \'foodle-link-democracy-poll\'.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-democracy-top-spacing</td><td><?php echo __('The spacing above the Democracy Poll shortcode.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-table-hidden-top-spacing</td><td><?php echo __('The spacing above the hidden reminder area.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-table-hidden-spacing</td><td><?php echo __('The spacing inside the hidden reminder area towards the horizontal lines.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-reminder-email-area</td><td><?php echo __('The hidden reminder area content wrapper between the spacing towards horizontal lines.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-table-top-spacing</td><td><?php echo __('The spacing above the Foodle table. Unused when solo="true".','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-table-headline</td><td><?php echo __('The headline above the Foodle table. You might want to change it or switch it off independently from the shortcode parameter \'solo="true"\'.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-table-bottom-spacing</td><td><?php echo __('The spacing below the Foodle table. With the introduction of shortcode \'foodle-comments\', its default was reduced to 0px (60px before).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-voters-header</td><td><?php echo __('The header of the voters column in the Foodle table.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-datcol-header</td><td><?php echo __('The header of the date column in the Foodle table.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-category-header</td><td><?php echo __('The header of the category column in the Foodle table.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-answer-header</td><td><?php echo __('The header of the answers column(s) in the Foodle table.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-info-rows</td><td><?php echo __('The Foodle table cells providing information except the very header row and except the category cells underneath the answers.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-category-cells</td><td><?php echo __('The Foodle table category cells underneath the answers.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-category-cells-maxcount-answer</td><td><?php echo __('The Foodle table category cell underneath an answer when \'maxcount\' is counted for this answer.<br>Reason: The category sum will only consider the answers up to the \'maxcount\'.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-cell-is-marked</td><td><?php echo __('The Foodle table cells with marking.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-cell-is-in</td><td><?php echo __('The Foodle table cells marked as being inside the maximum count given for \'votes\' in one of the answers.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-cell-is-marked-in</td><td><?php echo __('The Foodle table name cells marked when a marked user (see above list of functional additions to Democracy Poll and <a href="/wp-admin/options-general.php?page=foodle-admin-page&tab=special-roles-users">\'Special Roles & Users\'</a>) is being counted. In original state: a gradient backgound color.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-vertical</td><td><?php echo __('For the date column. In original state: Just for font-size, angle not used (0deg).','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-download-button</td><td><?php echo __('The button underneath the Foodle table to download the table to Excel format.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-display-on-with-marking</td><td><?php echo __('The hidden content marking if switched on (see \'Foodle Display On For Roles\' shortcode). In original state: a dashed border.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-display-on-no-marking</td><td><?php echo __('The same hidden content not marked. In original state: no CSS defined.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-statistics-check-table</td><td><?php echo __('The related dashboard widget / shortcode table. In original state: not used.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>#foodle-extra-div<br>.foodle-extra-div</td><td><?php echo __('The wrapper &lt;div&gt; for the metafields input. In original state: adapted to the back end profile page.<br>All foodle-extra-... classes can be used on the front end CSS to style the Foodle \'Show Extra Fields\' shortcode user interface.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-extra-title</td><td><?php echo __('The title above the metafields input table. In original state: not used.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-extra-table</td><td><?php echo __('The metafields input table. In original state: not used.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-extra-tbody</td><td><?php echo __('The metafields input tbody. In original state: not used.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-extra-row</td><td><?php echo __('The metafields input row. In original state: not used.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-extra-label</td><td><?php echo __('The metafields input label. In original state: not used.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-extra-cell</td><td><?php echo __('The metafields input cell. In original state: not used.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-extra-input</td><td><?php echo __('The metafields input field. In original state: max-width:348px.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-extra-description</td><td><?php echo __('The metafields discription under the input field. In original state: not used.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-extra-date-delete</td><td><?php echo __('The button to delete the foodle-date entry. In original state: adapted to the back end profile page.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td>.foodle-extra-button</td><td><?php echo __('The button to submit the form. In original state: not used.','foodle-for-democracy-poll') ?></td></tr>
        <tr><td><?php echo __('Where to put my CSS','foodle-for-democracy-poll') ?>?</td><td><?php echo __('A good first choice is the \'Customizer\' (Additional CSS) typically provided by your WordPress Theme. A big advantage is the immediate and dynamic visible result - while typing - on the current screen.<br>Furthermore, in the Democracy Poll administration pages, there is a tab called \'Theme Settings\' with a chapter \'Custom/Addition CSS styles\'. This is another area to insert your own CSS, which can as well cover both, Democracy Poll and Foodle.','foodle-for-democracy-poll') ?></td></tr>
      </tbody>
    </table>
  </figure>

  <p>&nbsp;</p>
  <p class="foodle-headline" name="the_democracy_poll_edit_page_updates"><?php echo __('The Democracy Poll Edit Page Updates','foodle-for-democracy-poll') ?></p>
  <p class="foodle-text"><img style="border: 1px solid SteelBlue;" src="<?php echo plugin_dir_url(__FILE__) ?>img/democracy-edit-new-02.png"<? echo $help_tips_edit_pic ?>width="900"></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p style="font-size:1.2em;" name="foodle_appreciation"><?php echo $foodle_review ?></p>
  <p style="font-size:1.2em;"><?php echo $foodle_like_me_1 ?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/PayPal-Logo-2019-kl.jpg" height="16" alt="PayPal"><?php echo $foodle_like_me_2 ?></p>
  <form action="https://www.paypal.com/donate" method="post" target="_top">
  <input type="hidden" name="hosted_button_id" value="W3V5CKXFJS948" />
  <input type="image" src="https://www.paypalobjects.com/en_US/DK/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
  <img alt="" border="0" src="https://www.paypal.com/en_DE/i/scr/pixel.gif" width="1" height="1" />
  </form>
  <?php
}



<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$nonce = wp_create_nonce('gizzmo');
echo '<input type="hidden" id="gizzmo_nonce" name="gizzmo_nonce" value="' . esc_attr($nonce) . '" />';


/** Declare the path of the plugin */
$plugin_path = plugin_dir_path(dirname(__FILE__));
$plugin_url = plugin_dir_url(dirname(__FILE__));
$plugin_name = $this->plugin_name;
$plugin_version = $this->version;
/**$plugin_slug = $this->plugin_slug;*/

/** Declare the path of the plugin admin images */
$plugin_admin_images = $plugin_url . 'pages/images/';




function get_last_posts($limit = 50)
{
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => $limit,
    'orderby' => 'date',
    'order' => 'DESC',
  );
  $query = new WP_Query($args);

  $posts = $query->posts;



  $all_posts ="";
  foreach ($posts as $post) {
    if ($post->post_type == 'post') {
        $post_title = $post->post_title;
        $post_tags = get_the_tags($post->ID);
        $post_id = $post->ID;

        $post_tags_str = '';
        if ($post_tags) {
            foreach ($post_tags as $tag) {
                $post_tags_str .= $tag->name . ', ';
            }
        }
        $post_tags_str = rtrim($post_tags_str, ', ');

        $one_post =  $post_id . '~' . $post_title . '~' . $post_tags_str;
        $all_posts .= $one_post . '^';
    }
  }
  //remove last ^
  $all_posts = rtrim($all_posts, '^');

  //echo a new hidden input with all posts
  echo '<input type="hidden" id="all_posts" name="all_posts" value="' . esc_attr($all_posts) . '" />';
}

get_last_posts(100)



?>
  <script>
    /**
     * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
     */
    localStorage.getItem("_x_darkMode_on") === "true" &&
      document.documentElement.classList.add("dark");
  </script>

  <style>
    #wpcontent {
      padding-left: 0px !important;
    }

    #wpbody-content {
      padding-left: 0px !important;
      padding-bottom: 0px !important;
    }

    #wpfooter {
      display: none !important;
    }

    .wp-core-ui select {
      clear: both !important;
    }
    .checked\:bg-slate-500:checked
    {
      background-color: transparent !important;
    }
    .checked\:border-slate-500:checked
    {
      border-color: transparent !important;
    }
  </style>

<div x-data x-bind="$store.global.documentBody" class="is-sidebar-open is-header-blur">


  <div class="backdrop" style="opacity: 0; display: none;"></div>
  <div class="loading_msg" id="loading_msg">
    <br>
    <?php echo esc_html__('Working, Please Wait...', 'gizzmo-ai'); ?><br>
    <?php echo esc_html__('Getting Product Data, Please Wait...', 'gizzmo-ai'); ?>
  </div>
  <div class="review_loading_msg" id="review_loading_msg">
    <br>
    <?php echo esc_html__('Getting Product Data, Please Wait...', 'gizzmo-ai'); ?>
  </div>

  <div class="saving_msg" id="saving_msg">
    <br>
    <?php echo esc_html__('Saving Content as Draft, Please Wait...', 'gizzmo-ai'); ?>
  </div>
  
  
  <div id="i_understand_model"  style="display: none;position: fixed;z-index: 1;left: 0;top: 0;width: 100%;height: 100%;overflow: auto;background-color: rgba(0,0,0,0.5);padding-bottom: 67px">
    <div  style="background-color: #fefefe;margin: 15% auto;padding: 20px;border: 1px solid #888;width: 80%;max-width: 622px;position: relative;;border-radius: 8px;">
          
    <b>🎉 <?php echo sprintf( esc_html__('Welcome to Gizzmo AI %s', 'gizzmo-ai'), esc_html( $plugin_version ) ); ?>! 🎉</b><br><br>

    Our mission is to help you create valuable content using AI, based on real product facts and verified user reviews.<br><br>

    <b>👉 Keep in mind:</b><br><br>

    <b>1.</b> 🤖 AI-powered content generation: Double-check and adjust the content to your personal style and tone.<br><br>

    <b>2.</b> 🖼 AI-generated images in roundups and listicles: Review before publishing.<br><br>

    <b>3.</b> 📜 Don't forget to add disclaimers for Amazon commissions and AI usage.<br><br>

    <b>🌟 <?php echo sprintf( esc_html__('New in Gizzmo AI %s', 'gizzmo-ai'), esc_html( $plugin_version ) ); ?> :</b><br><br>
    - Comparison Articles and Listicle Articles<br>
    - Enhanced customization options<br>
    - Improved UI/UX for a smoother workflow<br>
    - Support for more Amazon stores<br><br><br>
    - Support for 44 Languages<br><br><br>

    We're thrilled to have you on board! If you need any help, our support team is just a click away.



        <button onclick="i_understand()" style="background-color: #5a10b9;color: white;padding: 10px 20px;border: none;border-radius: 4px;cursor: pointer;margin-top: 10px;">I understand</button>
    </div>
  </div>

   
  



  <div id="adding_affiliate_tag_box" class="box">
    <div class="close close_box">x</div>
    <div id="adding_affiliate_tag" style="display:none">
      <input type="text" style="width: 83%;" id="affiliate_tag"
        placeholder="<?php echo esc_attr__("Write an Affiliate Tag, e.g 'revieweekly-20'", 'gizzmo-ai'); ?>">
      <button class="button button-primary" id="save_affiliate_bt">
        <?php echo esc_html__('Save', 'gizzmo-ai'); ?>
      </button>
    </div>
    <div id="all_product_images" style="display:none">
      <div id="product_images_list"
        style="display: flex;flex-wrap: wrap;flex-direction: row;justify-content: space-between;"></div>
    </div>
  </div>
  

  <div id="adding_thematic_concept_box" class="box">
    <div class="close close_box">x</div>
     
    <div id="adding_thematic_concept">
      <input title="Write the concept title" type="text" style="width: 25%;" id="thematic_concept_title" placeholder="<?php echo esc_attr__("Vacuum Cleaners for Pet Owners", 'gizzmo-ai'); ?>">
      <input title="Write the concept description" type="text" style="width: 65%;" id="thematic_concept_desc" placeholder="<?php echo esc_attr__("Comparing vacuum cleaners specifically designed to handle pet hair and dander", 'gizzmo-ai'); ?>">
      <button class="button button-primary" id="save_thematic_concept_bt">
        <?php echo esc_html__('Save', 'gizzmo-ai'); ?>
      </button>
    </div>
  </div>



  <!-- App preloader-->
  <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
    <div class="app-preloader-inner relative inline-block h-48 w-48"></div>
  </div>

  <!-- Page Wrapper -->
  <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>

    <input type="hidden" id="plugin_version" value="<?php echo esc_attr($plugin_version) ?>">
    <!-- App Header Wrapper-->
    <nav id="main_header" style="display:none" class="header before:bg-white dark:before:bg-navy-750 print:hidden">
      <!-- App Header  -->
      <div class="header-container relative flex w-full bg-white dark:bg-navy-700 print:hidden">
        <!-- Header Items -->
        <div class="flex w-full items-center justify-between">
          <!-- Left: Sidebar Toggle Button -->
          <div class="gizzmo_logo_wrapper">
            <img src="<?php echo esc_url($plugin_admin_images . 'gizzmo_logo.svg') ?>" alt="Gizzmo Logo">

          </div>

          <!-- Right: Header buttons -->
          <div class="-mr-1.5 flex items-center space-x-2">

            <span style="color:gray;font-size:11px;margin-right: 10px;font-style: italic;">
              <?php echo sprintf( esc_html__('Plugin Version: %s', 'gizzmo-ai'), esc_html( $plugin_version ) ); ?>
            </span>
            <a  href="https://gizzmo.helpscoutdocs.com/" target="_Blank"><button
                class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <?php echo esc_html__('Support', 'gizzmo-ai'); ?>
              </button></a>
            <a  href="https://www.facebook.com/groups/870242804040479" target="_Blank"><button
                class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <?php echo esc_html__('Facebook Group', 'gizzmo-ai'); ?>
              </button></a>
            <a class="account_link_class" href="https://gizzmo.ai/account" target="_Blank"><button
                class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <?php echo esc_html__('Your Account', 'gizzmo-ai'); ?>
              </button></a>
            <div x-data="usePopper({
                  offset: 12,
                  placement: 'right-start',
                  modifiers: [
                      {name: 'flip', options: {fallbackPlacements: ['bottom','top']}},
                      {name: 'preventOverflow', options: {padding: 10}}
                  ]
                })" @click.outside="isShowPopper && (isShowPopper = false)" class="flex">
              <button id="top_package_button"
                class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                x-ref="popperRef" @click="isShowPopper = !isShowPopper">

              </button>
              <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                <div class="popper-box max-w-xs">
                  <div
                    class="rounded-md border border-slate-150 bg-white py-3 px-4 dark:border-navy-600 dark:bg-navy-700">
                    <h3 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                      <?php echo esc_html__('Package:', 'gizzmo-ai'); ?> <span id="package_name" class="text-primary"
                        style="color:#F4511E"></span>
                    </h3>
                    <div id="pro_packages_details">
                      <div class="mt-3">
                        <p class="font-medium text-slate-600 dark:text-navy-100">
                          <?php echo esc_html__('Credits:', 'gizzmo-ai'); ?> <span id="total_credits"
                            class="text-primary" style="color:#F4511E">-</span>
                        </p>
                      </div>
                      <div class="mt-3">
                        <p class="font-medium text-slate-600 dark:text-navy-100">
                          <?php echo esc_html__('Credits Used:', 'gizzmo-ai'); ?> <span id="credits_used"
                            class="text-primary" style="color:#F4511E">-</span>
                        </p>
                      </div>
                      <div class="mt-3">
                        <p class="font-medium text-slate-600 dark:text-navy-100">
                          <?php echo esc_html__('Credits Left:', 'gizzmo-ai'); ?> <span id="credits_left"
                            class="text-primary" style="color:#F4511E">-</span>
                        </p>
                      </div>

                      <hr style="border: 0.2px dashed #e9e6e6;margin-top: 13px;">

                      <div class="mt-3">
                        <p class="font-medium text-slate-600 dark:text-navy-100">
                          <?php echo esc_html__('Days Left:', 'gizzmo-ai'); ?> <span id="days_left" class="text-primary"
                            style="color:#F4511E">-</span>
                        </p>
                      </div>
                      <div class="mt-3">
                        <p class="font-medium text-slate-600 dark:text-navy-100">
                          <?php echo esc_html__('Auto Renew:', 'gizzmo-ai'); ?> <span id="renew_date"
                            class="text-primary" style="color:#F4511E">-</span>
                        </p>
                      </div>
                    </div>
                    <div class="mt-3">
                      <p class="font-medium text-slate-600 dark:text-navy-100">
                        <a class="account_link_class" href="https://gizzmo.ai/account" target="_blank" style="text-decoration:underline">
                          <?php echo esc_html__('Upgrade', 'gizzmo-ai'); ?>
                        </a>
                      </p>
                    </div>
                    <div class="mt-3" style="display: none;">
                      <p class="font-medium text-slate-600 dark:text-navy-100">
                        <a href="#" id="logout_bt" style="text-decoration:underline">
                          <?php echo esc_html__('Logout', 'gizzmo-ai'); ?>
                        </a>
                      </p>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </nav>



    <!-- Main Content Wrapper -->
    <main id="onboarding" style="display:none" class="main-content place-items-center w-full px-[var(--margin-x)] pb-8">


      <div class="py-5 text-center lg:py-6">
        <div class="gizzmo_logo_wrapper" style=" display: inline-table; padding-bottom: 20px;">
            <img src="<?php echo esc_url( $plugin_admin_images . 'gizzmo_logo.svg' ) ?>" alt="Gizzmo Logo">
        </div>
        <p class="text-sm uppercase">Are you new here?</p>
        <h3 class="mt-1 text-xl font-semibold text-slate-600 dark:text-navy-100">
          Welcome to Gizzmo Let's get started!
        </h3>
      </div>


      <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
        <div class="col-span-12 grid lg:col-span-4 lg:place-items-center">
          <div>
            <ol class="steps is-vertical line-space [--size:2.75rem] [--line:.5rem]">

              <li class="step space-x-4 pb-12 before:bg-slate-200 dark:before:bg-navy-500">
                <div id="step_1_hexagon" class="step-header mask is-hexagon bg-primary text-white dark:bg-accent">
                  <span style="font-weight: bold;font-size: 18px;">1</span>
                </div>
                <div class="text-left">
                  <p class="text-xs text-slate-400 dark:text-navy-300">
                    Step 1
                  </p>
                  <h3 id="step_1_title" class="text-base font-medium text-primary dark:text-accent-light">
                    Set Your Profile.
                  </h3>
                </div>
              </li>

              <li class="step space-x-4 pb-12 before:bg-slate-200 dark:before:bg-navy-500">
                <div id="step_2_hexagon"
                  class="step-header mask is-hexagon bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100">

                  <span style="font-weight: bold;font-size: 18px;">2</span>
                </div>
                <div class="text-left">
                  <p class="text-xs text-slate-400 dark:text-navy-300">
                    Step 2
                  </p>
                  <h3 id="step_2_title" class="text-base font-medium">Add Gizzmo Chrome Extension</h3>
                </div>
              </li>
              <li class="step space-x-4 pb-12 before:bg-slate-200 dark:before:bg-navy-500">
                <div id="step_3_hexagon"
                  class="step-header mask is-hexagon bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100">
                  <i id="step_4_fa_icon" class="fa-solid fa-check text-base"></i>
                </div>
                <div class="text-left">
                  <p class="text-xs text-slate-400 dark:text-navy-300">
                    Step 3
                  </p>
                  <h3 id="step_3_title" class="text-base font-medium">Confirm, Start Creating Content</h3>
                </div>
              </li>
 
            </ol>
          </div>
        </div>
        <div class="col-span-12 grid lg:col-span-8">


          <div class="card" id="step_1" style="display: block;min-height: 451px;min-width:730px; --tw-shadow: 0 3px 10px 0 rgb(48 46 56/6%); --tw-shadow-colored: 0 3px 10px 0 var(--tw-shadow-color);">
            <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5" style="border-bottom: 1px solid #e2e8f0;">
              <div class="flex items-center space-x-2">
                <div
                  class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                  <span style="font-weight: bold;font-size: 18px;">1</span> 
                </div>
                <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                  Set Your Profile.
                  <input type="hidden" id="paddle_user_id" name="paddle_user_id" value="">
                  <input type="hidden" id="paddle_package_id" name="paddle_package_id" value="">
                  <input type="hidden" id="package_name" name="package_name" value="">
                  <input type="hidden" id="checkout_id" name="checkout_id" value="">
                  <input type="hidden" id="subscription_id" name="subscription_id" value="">
                  <input type="hidden" id="order_id" name="order_id" value="">

                </h4>
              </div>
            </div>
            <div class="space-y-4 p-4 sm:p-5 sm:grid-cols-1">

              <div class="grid grid-cols-1 gap-4 sm:grid-cols-1">


                <div class="grid grid-cols-3 gap-4">
                  <label class="block">
                    <span>* Full Name</span>
                    <input style="border: 1px solid #cac5d1f0;"
                      class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                      placeholder="Enter your full name" type="text" id="name" name="name" />
                  </label>

                  <label class="block">
                    <span>* Email</span>
                    <input style="border: 1px solid #cac5d1f0;"
                      class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                      placeholder="Enter your email address" type="email" id="email" name="email" />
                  </label>

                  <label class="block">
                    <span>Licenced Domain</span>
                    <input style="border: 1px solid #cac5d1f0;" disabled="true" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                      placeholder="Enter your email address" type="text" id="domain" name="domain" value="" />
                  </label>
                </div>

              </div>

              <div class="grid grid-cols-1 gap-4 sm:grid-cols-1" >


                <div class="grid grid-cols-2 gap-4">
                  <label class="block">
                    <span>* Password</span>
                    <input style="border: 1px solid #cac5d1f0;"
                      class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                      placeholder="Password" type="password" minlength="8" id="password" name="password" />
                  </label>

                  <label class="block">
                    <span>* Repeat Password</span>
                    <input style="border: 1px solid #cac5d1f0;"
                      class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                      placeholder="Repeat Password" type="password" minlength="8" id="password_confirmation"
                      name="password_confirmation" />
                  </label>
                </div>
              </div>

              <div class="grid grid-cols-1 gap-4 sm:grid-cols-1" style="display:none">
                <label class="block">
                  <span>Amazon Affiliate Tag <br>
                    <span class="text-xs text-slate-400 dark:text-navy-300">if you leave this blank, Gizzmo will create
                      a default tag that can be changed later.</span><br>
                    <p class="text-xs text-slate-400 dark:text-navy-300" style="height: 38px;line-height: 38px;">
                      Separate multiple tags with a comma. <a
                        href="https://affiliate-program.amazon.com/home/account/tag/manage" target="_blank"
                        style="color: #000;text-decoration: underline;">Amazon Tracking IDs</a>
                    </p>
                  </span>
                  <input
                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="example-20, example2-20" type="text" name="affiliate_tag" id="affiliate_tag" />
                </label>
              </div>


              <div class="grid grid-cols-1 gap-4 sm:grid-cols-1" style="margin-top: 30px;">
                <label class="inline-flex items-center space-x-2">
                  <input checked id="aggree_terms_chk" style="border: 1px solid #3333;" type="checkbox" />
                  <p>I have read and agreed to Gizzmo <a href="https://gizzmo.ai/terms-of-service/" target="_blank"
                      style="text-decoration: underline;">Term of service</a> and <a style="text-decoration: underline;"
                      href="https://gizzmo.ai/privacy-policy/" target="_blank">Privacy Policy</a> </p>
                </label>
                <label class="inline-flex items-center space-x-2">
                  <input checked id="aggree_recive_emails_chk" style="border: 1px solid #3333;" type="checkbox" />
                  <p>Receive emails from Gizzmo with news, special offers, and updates, and I agree to be subscribed to their email list</p>
                </label>
              </div>



              <div class="flex justify-center space-x-2 pt-4">

                <button style="display: none;"
                  class="btn space-x-2 bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                      clip-rule="evenodd" />
                  </svg>
                  <span>Prev</span>
                </button>

                <button onclick="complete_profile()"
                  class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                  <span id="continue_bt">Save & Continue >></span>
                  
                </button>
              </div>
            </div>
          </div>



          <div class="card" id="step_2" style="display: none;min-height: 451px;min-width:730px; --tw-shadow: 0 3px 10px 0 rgb(48 46 56/6%); --tw-shadow-colored: 0 3px 10px 0 var(--tw-shadow-color);">
            <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5"  style="border-bottom: 1px solid #e2e8f0;">
              <div class="flex items-center space-x-2">
                <div
                  class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                  <span style="font-weight: bold;font-size: 18px;">2</span>
                </div>
                <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                  Add Gizzmo Chrome Extension
                </h4>
              </div>
            </div>
            <div class="space-y-4 p-4 sm:p-5 sm:grid-cols-1">

               
 


              <div class="grid grid-cols-1 gap-4 sm:grid-cols-1">
                <div class="grid grid-cols-1 gap-4">
                  <label class="block">
                    <span>1. Add Gizzmo Chrome Extension</span><br><br>
                    <a target="_blank"
                      href="https://chrome.google.com/webstore/detail/gizzmo/gdopffidobhgcbgjaleokkldkjhkjloe?ref=gizzmo_account_site"
                      style="margin-top: 10px;"
                      class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                      Gizzmo Chrome Extension <i style="margin-left: 8px;" class="fa-brands fa-chrome text-base"
                        aria-hidden="true"></i>
                    </a>
                  </label>
                </div>
              </div>


              <div class="grid grid-cols-1 gap-4 sm:grid-cols-1">
                <div class="grid grid-cols-1 gap-4">
                  <label class="block">
                    <span>2. Navigate to a product page on Amazon, e.g. <a href="https://www.amazon.com/dp/B09SWW583J"
                        target="_blank" style="text-decoration: underline;color:#333;font-weight:bold">https://www.amazon.com/dp/B09B8V1LZ3</a>
                      <br>
                      <em>The Gizzmo Extension will popup automatically only when you are on a product page.</em>
                    </span><br>
                  </label>
                </div>
              </div>


              <div class="grid grid-cols-1 gap-4 sm:grid-cols-1">
                <div class="grid grid-cols-1 gap-4">
                  <label class="block">
                    <span>3. Inside the Gizzmo Popup, Paste your unique Token and click Sign In</span><br/><br/>
                      <span id="token"
                        style="background-color: #1f2327;padding-left: 10px;padding-right: 10px;padding-top: 5px;padding-bottom: 5px;color: #fff4f4;border-radius: 5px;margin-left:8px"></span>
                      <span style="text-decoration: underline;font-size: 12px;padding-left: 10px;cursor: pointer;"
                        onclick="copyToClipboard()">Click To Copy</span>
                  </label>
                </div>
              </div>
              <div style="display:none">
                <button id="token_copied" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                  @click="$notification({text:'The Token was copied.',variant:'error',position:'center-top',duration:6000})">
                </button>
              </div>

              <div class="grid grid-cols-1 gap-4 sm:grid-cols-1" style="margin-top: 32px;">
                <div class="grid grid-cols-1 gap-4">
                  <label class="block">
                    <span >4. Click on the <span style="background-color: #5044e1;color:#fff;font-weight:bold;border-radius: 4px;padding-left: 6px;padding-right: 6px;padding-top: 0px;padding-bottom: 2px;">+</span> button to add the product.</span><br>
                  </label>
                </div>
              </div>

              <div class="grid grid-cols-1 gap-4 sm:grid-cols-1" style="margin-top: 35px;">
                <div class="grid grid-cols-1 gap-4">
                  <label class="block">
                    <span style="font-style: italic;">Once your done, click the Validate Install & Continue.</span>
                  </label>
                </div>
              </div>




              <div class="flex justify-center space-x-2 pt-4">

                <button style="display: none;"
                  class="btn space-x-2 bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                      clip-rule="evenodd" />
                  </svg>
                  <span>Prev</span>
                </button>

                <button onclick="validate_extension_install()"
                  class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                  <span id="continue_bt_validate">Validate Install & Continue >></span>
                   
                </button>
              </div>
            </div>
          </div>

 

          <div class="card" id="step_3" style="display: none;min-height: 451px;min-width:730px; --tw-shadow: 0 3px 10px 0 rgb(48 46 56/6%); --tw-shadow-colored: 0 3px 10px 0 var(--tw-shadow-color);">
            <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5"  style="border-bottom: 1px solid #e2e8f0;">
              <div class="flex items-center space-x-2">
                <div
                  class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                  <i class="fa-solid fa-check text-base"></i>
                </div>
                <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                  You are all set.
                </h4>
              </div>
            </div>
            <div class="space-y-4 p-4 sm:p-5 sm:grid-cols-1">



              <div class="flex justify-center space-x-2 pt-4">

                <div class="py-5 text-center lg:py-6">
                  <p class="text-sm uppercase">Great Job!</p>
                  <h3 class="mt-1 text-xl font-semibold text-slate-600 dark:text-navy-100">
                    You can now start creating content with Gizzmo AI.
                  </h3>
                  <a href="#" onClick="window.location.reload();return false;" style="margin-top: 20px;"
                    class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                    Start Creating Content
                  </a>
                </div>


              </div>
            </div>
          </div>


        </div>
      </div>

      <template id="add_product">
        <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
          <img src="images/pop/add_product.png" />
        </div>
      </template>
      <template id="connect_token_extension">
        <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
          <img src="images/pop/extension_connect.png" />
        </div>
      </template>
      <template id="connect_token">
        <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
          <img src="images/pop/connect_token.png" />
        </div>
      </template>
      <template id="gizzmomenubt">
        <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
          <img src="images/pop/gizzmo_menu_bt.png" />
        </div>
      </template>
      <template id="activateplugin">
        <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
          <img src="images/pop/activate.png" />
        </div>
      </template>
      <template id="choosefile">
        <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
          <img src="images/pop/choosefile.png" />
        </div>
      </template>
      <template id="uploadplugin">
        <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
          <img src="images/pop/upload_plugin.png" />
        </div>
      </template>
      <template id="plugin_adnew">
        <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
          <img src="images/pop/plugin-addnew.png" style="height: 116px;" />
        </div>
      </template>


      <div style="display: none;">


        <button id="aggree_terms"
          class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
          @click="$notification({text:'You must read and agree with Gizzmo Term of service and Privacy Policy in order to procced.',variant:'error',position:'center-top',duration:6000})">
        </button>

        <button id="token_copied"
          class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
          @click="$notification({text:'The Token was copied.',variant:'error',position:'center-top',duration:6000})">
        </button>
        <button id="plugin_not_installed"
          class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
          @click="$notification({text:'It seems that the Wordpress Plugin was not installed, Install it and try again',variant:'error',position:'center-top',duration:6000})">
        </button>
        <button id="email_exists"
          class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
          @click="$notification({text:'It seems that this email already exists, try to login or contact support',variant:'error',position:'center-top',duration:3000})">
        </button>
        <button id="fill_all_fields"
          class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
          @click="$notification({text:'Please fill all fields',variant:'error',position:'center-top',duration:3000})">
        </button>
        <button id="invalid_email"
          class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
          @click="$notification({text:'Please make sure you write a valid email address',variant:'error',position:'center-top',duration:3000})">
        </button>
        <button id="password_8_len"
          class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
          @click="$notification({text:'Password must be 8 characters minimum.',variant:'error',position:'center-top',duration:3000})">
        </button>
        <button id="password_no_match"
          class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
          @click="$notification({text:'Your Passwords does not match.',variant:'error',position:'center-top',duration:3000})">
        </button>
        <button id="invalid_url"
          class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
          @click="$notification({text:'The website url you provided is invalid',variant:'error',position:'center-top',duration:3000})">
        </button>
      </div>






    </main>



    <!-- Main Token Connect Wrapper -->
    <main style="display:none" id="connect_token" class="grid w-full grow grid-cols-1 place-items-center">
      <div class="w-full max-w-[26rem] p-4 sm:px-5">
        <div class="text-center">
          <img class="mx-auto" src="<?php echo esc_url($plugin_admin_images . 'gizzmo_logo.svg') ?>" alt="Gizzmo logo" />
          <div class="mt-4">
            <p class="text-slate-400 dark:text-navy-300">
              <?php echo esc_html__('Effortlessly Create High-Quality, SEO-Friendly, Revenue-Driving Articles directly to your WordPress', 'gizzmo-ai'); ?>
            </p>
          </div>
        </div>
        <div class="card mt-5 rounded-lg p-5 lg:p-7">
          <label class="block">
            <?php echo esc_html__('Please connect your Token to continue', 'gizzmo-ai'); ?>
            <span class="relative mt-1.5 flex">
              <input id="website_token" style="border:1px solid #d3d0d0a3;"
                class="form-input peer w-full rounded-lg border border-slate-300 px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                placeholder="<?php echo esc_attr__('Enter Your Gizzmo Token', 'gizzmo-ai'); ?>" type="text" />

            </span>
            </span>
          </label>


          <button id="unlock_bt"
            class="btn mt-5 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
            <?php echo esc_html__('Connect', 'gizzmo-ai'); ?>
          </button>
          <div class="mt-4 text-center text-xs+">
            <p class="line-clamp-1">
              <span>
                <?php echo esc_html__('Dont have Token?', 'gizzmo-ai'); ?>
              </span>
              <a target="_blank"
                class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                href="https://gizzmo.ai/">
                <?php echo esc_html__('Get One', 'gizzmo-ai'); ?>
              </a>
            </p>
          </div>

          <button id="token_empty" style="display:none" class=""
            @click="$notification({text:'Please enter your Token and try again.',variant:'info',position:'center-top'})">
          </button>
          <button id="token_invalid" style="display:none" class=""
            @click="$notification({text:'The Token you entered is not valid.',variant:'info',position:'center-top'})">
          </button>
          <button id="domain_invalid" style="display:none" class=""
            @click="$notification({text:'The Domain is not valid.',variant:'info',position:'center-top'})">
          </button>

        </div>
        <div class="mt-8 flex justify-center text-xs text-slate-400 dark:text-navy-300">
          <a target="_blank" href="https://gizzmo.ai/">Gizzmo.ai</a>
          <div class="mx-3 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
          <a target="_blank" href="https://gizzmo.ai/privacy-policy/">
            <?php echo esc_html__('Privacy Policy', 'gizzmo-ai'); ?>
          </a>
          <div class="mx-3 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
          <a target="_blank" href="https://gizzmo.ai/terms-of-service/">
            <?php echo esc_html__('Term of service', 'gizzmo-ai'); ?>
          </a>
        </div>
      </div>
    </main>




    <main id="main_gizzmo" style="display:none;" class="main-content w-full px-[var(--margin-x)] pb-8">

      <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">

        <div class="col-span-12 lg:col-span-7">

          <div class="card mt-4 pb-1 sm:mt-5 lg:mt-6 shadow">


            <div x-data="{activeTab:'tabReview'}" class="tabs flex flex-col">

              <div
                class="is-scrollbar-hidden overflow-x-auto rounded-lg bg-slate-200 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                <div class="tabs-list flex px-1.5 py-3" style="overflow: auto;">

                <button  id="posts_tab_bt" @click="activeTab = 'tabPosts'" style="box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;background-color: #fefefe;color: #4c4646;border: 0.5px solid #ba9be1;"                      :class="activeTab === 'tabPosts' ? 'bg-white shadow dark:bg-navy-500 dark:text-navy-100' : 'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                      class="btn shrink-0 space-x-2 px-3 py-3 font-medium" onclick="show_listicle_creation_ui()">
                      
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="18px" width="18px" version="1.1" id="_x32_" viewBox="0 0 512 512" xml:space="preserve" fill="#636363" stroke="#636363">

                      <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

                      <g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#595959;} </style> <g> <path class="st0" d="M256.004,0C114.8,0.008,0.025,114.801,0,255.996C0.025,397.183,114.8,511.975,256.004,512 C397.191,511.975,511.984,397.183,512,255.996C511.984,114.801,397.191,0.008,256.004,0z M420.735,420.72 c-42.256,42.241-100.456,68.354-164.731,68.362c-64.284-0.008-122.491-26.121-164.732-68.362 c-42.24-42.241-68.345-100.456-68.354-164.724c0.008-64.276,26.114-122.475,68.354-164.731 C133.513,49.04,191.72,22.927,256.004,22.918c64.276,0.008,122.475,26.122,164.731,68.346 c42.224,42.256,68.338,100.447,68.346,164.731C489.073,320.264,462.96,378.479,420.735,420.72z"/> <path class="st0" d="M72.03,173.859h-1.445c-11.141,25.118-17.37,52.885-17.37,82.137c0,79.817,46.109,148.821,113.138,181.918 L72.039,173.859H72.03z"/> <path class="st0" d="M371.166,182.392c-17.484-24.452-14.891-74.438,17.26-79.914c-35.538-30.672-81.8-49.272-132.421-49.272 c-71.894,0-135.006,37.432-171.017,93.857h74.23v26.795h-29.919l69.269,193.887l48.59-129.884l-22.878-64.004h-34.607v-26.795 h124.225v26.795h-32.358l69.855,195.573l35.401-94.572C393.073,249.366,389.404,207.967,371.166,182.392z"/> <path class="st0" d="M444.513,181.277c-0.08,0.77-0.16,1.549-0.273,2.304c-4.905,32.92-35.394,105.127-35.394,105.127 l-44.143,117.996l-9.849,26.346c62.004-34.686,103.939-100.946,103.939-177.054C458.794,229.594,453.696,204.404,444.513,181.277z"/> <path class="st0" d="M211.861,404.962l-16.665,44.537c19.202,6.036,39.616,9.287,60.808,9.287c23.16,0,45.388-3.925,66.122-11.086 l-61.675-172.654L211.861,404.962z"/> </g> </g>

                      </svg>
                      <span>
                        <?php echo esc_html__('POSTS', 'gizzmo-ai'); ?>
                      </span>
                      <div id="posts_notification" style="display:none; position: relative;background-color: #5a10b9;" class="absolute top-0 right-0 -m-1 flex h-4 min-w-[1rem] items-center justify-center rounded-full bg-primary px-1 text-tiny font-medium leading-none text-white dark:bg-accent">
                      
                    </div>
                    </button>
                    

                  <button id="review_tab_bt" style="margin-left: 20px;" @click="activeTab = 'tabReview'"
                    :class="activeTab === 'tabReview' ? 'bg-white shadow dark:bg-navy-500 dark:text-navy-100' : 'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                    class="btn shrink-0 space-x-2 px-3 py-3 font-medium" onclick="get_all_products('review')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor" stroke-width="1.5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                      </path>
                    </svg>
                    <span>
                      <?php echo esc_html__('Review', 'gizzmo-ai'); ?>
                    </span>
                  </button>

                  <button @click="activeTab = 'tabProfile'"
                    :class="activeTab === 'tabProfile' ? 'bg-white shadow dark:bg-navy-500 dark:text-navy-100' : 'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                    class="btn shrink-0 space-x-2 px-3 py-3 font-medium" onclick="get_all_products('roundup')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor" stroke-width="1.5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                      </path>
                    </svg>
                    <span>
                      <?php echo esc_html__('RoundUp', 'gizzmo-ai'); ?>
                    </span>
                  </button>

                  

                  <button @click="activeTab = 'tabMessages'"
                    :class="activeTab === 'tabMessages' ? 'bg-white shadow dark:bg-navy-500 dark:text-navy-100' : 'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                    class="btn shrink-0 space-x-2 px-3 py-3 font-medium" onclick="get_all_products('general')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor" stroke-width="1.5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2">
                      </path>
                    </svg>
                    <span>
                      <?php echo esc_html__('General', 'gizzmo-ai'); ?>
                    </span>
                  </button>

                  <button @click="activeTab = 'tabComparison'"
                    :class="activeTab === 'tabComparison' ? 'bg-white shadow dark:bg-navy-500 dark:text-navy-100' : 'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                    class="btn shrink-0 space-x-2 px-3 py-3 font-medium" onclick="get_all_products('comparison')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor" stroke-width="1.5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                      </path>
                    </svg>
                    <span>
                      <?php echo esc_html__('Compare', 'gizzmo-ai'); ?><b id="new_compare_badge" class="new_badge">New 🔥</b>
                    </span>
                  </button>
                  
                  <button @click="activeTab = 'tabListicles'"
                    :class="activeTab === 'tabListicles' ? 'bg-white shadow dark:bg-navy-500 dark:text-navy-100' : 'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                    class="btn shrink-0 space-x-2 px-3 py-3 font-medium" onclick="show_listicle_creation_ui()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor" stroke-width="1.5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2">
                      </path>
                    </svg>
                    <span>
                      <?php echo esc_html__('Listicle', 'gizzmo-ai'); ?><b id="new_listicle_badge" class="new_badge">New 🔥</b>
                    </span>
                  </button>

                    
                    



                </div>
              </div>
              <div class="tab-content pt-4">


                

                <div x-show="activeTab === 'tabReview'" x-transition:enter="transition-all duration-500 easy-in-out"
                  x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                  x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">

                   
                    <div class="empty_section">
                      <p style="padding-top: 14px;">
                      Click <b style="color:#6c5d5d">'Prepare'</b> on any product, wait for AI process to complete, then <b style="color:#6c5d5d">'Review'</b> your chosen product. For additional help, <b style="color:#6c5d5d"><a href="https://gizzmo.helpscoutdocs.com/article/17-how-to-create-a-product-review-article" target="_Blank" style="text-decoration:underline">Support</a></b>
                      </p>
                    </div>



                  <div class="out_of_credits">
                    <h2 class="out_of_credits_title">
                      <?php echo esc_html__('Out of Credits', 'gizzmo-ai'); ?>
                    </h2>
                    <p class="out_of_credits_msg">
                      You have reached your monthly limit of credits.<br>
                      Please upgrade your account to continue.<br>
                      <a class="account_link_class" href="https://gizzmo.ai/account" target="_blank" style="text-decoration:underline">
                        <button style="margin-top: 8px;background-color: #fff;color: #080808;"
                          class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                          <?php echo esc_html__('Upgrade', 'gizzmo-ai'); ?>
                        </button>
                      </a>
                  </div>
                  <div id="review_products_list"></div>


                </div>

                <div x-show="activeTab === 'tabProfile'" x-transition:enter="transition-all duration-500 easy-in-out"
                  x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                  x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
 
                  <div class="empty_section">
                      <p style="padding-top: 14px;">
                      Click <b style="color:#6c5d5d">'Prepare'</b> on any product, wait for AI process to complete, then <b style="color:#6c5d5d">'Add'</b> up to <b style="color:#6c5d5d">50</b> products. For additional help, <b style="color:#6c5d5d"><a href="https://gizzmo.helpscoutdocs.com/article/18-how-to-create-a-roundup-article" target="_Blank" style="text-decoration:underline">Support</a></b>
                      </p>
                    </div>

                  <div class="out_of_credits">
                    <h2 class="out_of_credits_title">
                      <?php echo esc_html__('Out of Credits', 'gizzmo-ai'); ?>
                    </h2>
                    <p class="out_of_credits_msg">
                      You have reached your monthly limit of credits.<br>
                      Please upgrade your account to continue.<br>
                      <a class="account_link_class" href="https://gizzmo.ai/account" target="_blank" style="text-decoration:underline">
                        <button style="margin-top: 8px;background-color: #fff;color: #080808;"
                          class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                          <?php echo esc_html__('Upgrade', 'gizzmo-ai'); ?>
                        </button>
                      </a>
                  </div>
                  <div id="roundup_products_list"></div>


                </div>

                <div x-show="activeTab === 'tabComparison'" x-transition:enter="transition-all duration-500 easy-in-out"
                  x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                  x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                  
                    <input type="hidden" id="comparison_credits" value="">
                    <div class="empty_section" id="free_comparison_div" style="display:none">
                    <b style="color:#6c5d5d">Unlock Product Comparisons with Gizzmo! 🔓</b><br>
                      <p id="free_no_comparisons_yet">You have <b style="color:#6c5d5d">3 Free Product Comparison</b> creations and some paid features are unlocked, waiting for you! Dive in and transform your ideas into engaging content.<br>
                        Love the feature? <b style="color:#6c5d5d"><a class="account_link_class" href="https://gizzmo.ai/account" target="_blank" style="text-decoration:underline">
                            <?php echo esc_html__('Upgrade', 'gizzmo-ai'); ?>
                          </a></b> for unlimited access and make your content stand out.
                      </p>
                      <p id="some_comparisons_used" style="display:none">
                      You've used <b style="color:#6c5d5d" id="comparisons_credits_used">-</b> of <b style="color:#6c5d5d">3 Free Product Comparison</b> creations and some paid features are unlocked. Only <b style="color:#6c5d5d" id="comparisons_credits_left">-</b> left! Ready for unlimited access? <b style="color:#6c5d5d"><a class="account_link_class" href="https://gizzmo.ai/account" target="_blank" style="text-decoration:underline">
                            <?php echo esc_html__('Upgrade', 'gizzmo-ai'); ?></a></b> now and keep the creativity flowing.
                      </p>
                      <p id="all_comparisons_used" style="display:none">
                      You've used your <b style="color:#6c5d5d">3 Free Product Comparison creations.</b> Craving more? <b style="color:#6c5d5d"><a class="account_link_class" href="https://gizzmo.ai/account" target="_blank" style="text-decoration:underline">
                            <?php echo esc_html__('Upgrade', 'gizzmo-ai'); ?></a></b> now for unlimited access and keep the inspiration flowing.
                      </p>

                    </div>
                    
                    <div id="help_comparison_section" class="empty_section" style="margin-top: 16px;">
                      <p style="padding-top: 14px;">
                      Click <b style="color:#6c5d5d">'Prepare'</b> on any product, wait for AI process to complete, then <b style="color:#6c5d5d">'Add 2 Products'</b>. For additional help, <b style="color:#6c5d5d"><a href="https://gizzmo.helpscoutdocs.com/article/23-how-to-create-comparison-article" target="_Blank" style="text-decoration:underline">Support</a></b>
                      </p>
                    </div>


                  <div class="out_of_credits">
                    <h2 class="out_of_credits_title">
                      <?php echo esc_html__('Out of Credits', 'gizzmo-ai'); ?>
                    </h2>
                    <p class="out_of_credits_msg">
                      You have reached your monthly limit of credits.<br>
                      Please upgrade your account to continue.<br>
                      <a class="account_link_class" href="https://gizzmo.ai/account" target="_blank" style="text-decoration:underline">
                        <button style="margin-top: 8px;background-color: #fff;color: #080808;"
                          class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                          <?php echo esc_html__('Upgrade', 'gizzmo-ai'); ?>
                        </button>
                      </a>
                  </div>
                  <div id="comparison_products_list"></div>


                </div>


                <div x-show="activeTab === 'tabMessages'" x-transition:enter="transition-all duration-500 easy-in-out"
                  x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                  x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">

                  
                  <div class="empty_section">
                    <p style="padding-top: 14px;">
                    Click <b style="color:#6c5d5d">'Prepare'</b> on any product, wait for AI process to complete, then <b style="color:#6c5d5d">'Add 4 Products'</b>. For additional help, <b style="color:#6c5d5d"><a href="https://gizzmo.helpscoutdocs.com/article/19-how-to-create-a-general-content-article" target="_Blank" style="text-decoration:underline">Support</a></b>
                    </p>
                  </div>



                  <div class="out_of_credits">
                    <h2 class="out_of_credits_title">
                      <?php echo esc_html__('Out of Credits', 'gizzmo-ai'); ?>
                    </h2>
                    <p class="out_of_credits_msg">
                      You have reached your monthly limit of credits.<br>
                      Please upgrade your account to continue.<br>
                      <a class="account_link_class" href="https://gizzmo.ai/account" target="_blank" style="text-decoration:underline">
                        <button style="margin-top: 8px;background-color: #fff;color: #080808;"
                          class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                          <?php echo esc_html__('Upgrade', 'gizzmo-ai'); ?>
                        </button>
                      </a>
                  </div>
                  <div id="general_products_list"></div>



                </div>



                <div x-show="activeTab === 'tabListicles'" x-transition:enter="transition-all duration-500 easy-in-out"
                  x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                  x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">

                  <div id="listicle_help_section" class="empty_section">
                    <p style="padding-top: 14px;">
                     For additional help creating your first listicle, <b style="color:#6c5d5d"><a href="https://gizzmo.helpscoutdocs.com/article/22-listicle-tutorial" target="_Blank" style="text-decoration:underline">Support</a></b>
                    </p>
                  </div>

                  
                    <div class="empty_section" id="free_listicle_div" style="display:none; margin-top:10px">
                      <b style="color:#6c5d5d">Unlock Listicles with Gizzmo! 🔓</b><br>
                      <p id="free_no_listicles_yet">You have <b style="color:#6c5d5d">3 Free Listicle</b> creations and some paid features are unlocked, waiting for you! Dive in and transform your ideas into engaging content.<br>
                        Love the feature? <b style="color:#6c5d5d"><a class="account_link_class" href="https://gizzmo.ai/account" target="_blank" style="text-decoration:underline">
                            <?php echo esc_html__('Upgrade', 'gizzmo-ai'); ?>
                          </a></b> for unlimited access and make your content stand out.
                      </p>
                      <p id="some_listicles_used" style="display:none">
                      You've used <b style="color:#6c5d5d" id="listicle_credits_used">-</b> of <b style="color:#6c5d5d">3 Free Listicle</b> creations and some paid features are unlocked. Only <b style="color:#6c5d5d" id="listicle_credits_left">-</b> left! Ready for unlimited access? <b style="color:#6c5d5d"><a class="account_link_class" href="https://gizzmo.ai/account" target="_blank" style="text-decoration:underline">
                            <?php echo esc_html__('Upgrade', 'gizzmo-ai'); ?></a></b> now and keep the creativity flowing.
                      </p>
                      <p id="all_listicles_used" style="display:none">
                      You've used your <b style="color:#6c5d5d">3 Free Listicle creations.</b> Craving more? <b style="color:#6c5d5d"><a class="account_link_class" href="https://gizzmo.ai/account" target="_blank" style="text-decoration:underline">
                            <?php echo esc_html__('Upgrade', 'gizzmo-ai'); ?></a></b> now for unlimited access and keep the inspiration flowing.
                      </p>
                    </div>


                  <div class="out_of_credits">
                    <h2 class="out_of_credits_title">
                      <?php echo esc_html__('Out of Credits', 'gizzmo-ai'); ?>
                    </h2>
                    <p class="out_of_credits_msg">
                      You have reached your monthly limit of credits.<br>
                      Please upgrade your account to continue.<br>
                      <a class="account_link_class" href="https://gizzmo.ai/account" target="_blank" style="text-decoration:underline">
                        <button style="margin-top: 8px;background-color: #fff;color: #080808;"
                          class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                          <?php echo esc_html__('Upgrade', 'gizzmo-ai'); ?>
                        </button>
                      </a>
                  </div>
                  <div id="listicle_creation_ui">

                    <form method="post" id="listicle_form" style="">
                      <div class="space-y-4">
                        <div id="listicle_topic_div" class="grid grid-cols-2 gap-4" style="margin-top: 20px;">
                          <label class="block">
                            <span style="color: #333;font-weight: 500;" x-tooltip.interactive.content="'#listicle_category'" aria-expanded="false">
                            Enter a Subject for Your Listicle: (i)</span>
                              <input id="listicle_seo_keyphrase" name="listicle_seo_keyphrase" class="form-input mt-1.5 w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900" placeholder="Gaming Monitors, Fishing Reels, Running" type="text">
                          </label>
                          <label class="block">
                            <span onclick="get_listicle_titles()" style="margin-top: 26px;height: 39px;" id="get_listicle_titles_bt" class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                              Get Listicle Title Ideas
                            </span>
                          </label>
                        </div>
                      </div>
                      <div class="space-y-4">
                        <div id="listicles_list_div" class="grid grid-cols-1 gap-4" style="margin-top: 25px;display:none">
                          <label class="block">
                            <span style="color: #333;font-weight: 500;">Suggested Titles for a Listicle (Select One)</span>
                            <br>
                            <label class="block" id="suggested_listicle_titles_list" style="height: 143px; overflow-y: auto;">

                            </label>
                          </label>
                        </div>
                      </div>
                      
                      <div id="listicle_spacer" style="height:25px; width:100%"></div>


                      <div class="grid grid-cols-1 gap-4" x-data="accordionItem('item-2')" id="paragraphs_list_div"  style="margin-top: 6px;display:none">
                        <div onclick="get_listicle_paragraphs()" id="listicle_pargraphs_title_click" class="flex cursor-pointer items-center justify-between p-4" style="padding-left: 0px;" @click="expanded = !expanded">
                          <p style="color: #333;font-weight: 500;padding-bottom: 11px;" x-tooltip.interactive.content="'#listicle_paragraphs_pop'">
                          Preview Your Listicle Paragraphs (Advanced, Optional) <b class="new_badge">New 🔥</b>
                          <p>
                          <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">
                            <i class="fas fa-chevron-down"></i>
                          </div>
                        </div>
                        <div x-collapse="" x-show="expanded" style="height: 0px;display: none;" hidden="">
                          <div class="px-4 pb-4" style="padding-left: 0px;padding-right: 0px;">
                            <div class="selectedsharedparagraphslist" id="selected_shared_paragraphs_draggable" style="display:block" sortable-list="sortable-list">
                            </div>
                            <span id="add_listicle_paragraphs_bt" onclick="add_listicle_paragraphs()" style="display:none;cursor:pointer;float: right;color: #4e0fb5;text-decoration: underline;margin-right:5px;padding-top: 15px;">SUGGEST MORE PARAGRAPHS</span>
                          </div>
                        </div>
                      
                      </div>

                      <div id="listicle_spacer" style="height:25px; width:100%"></div>

                      
                      
                      <div id="listicle_ai_images" class="grid grid-cols-2 gap-4" style="margin-top: 20px;display:none">
                        <label class="block">
                          <label class="inline-flex items-center space-x-2">
                            <input  id="listicle_create_ai_images" onchange="listicle_create_ai_images_handleCheckChange(this);" name="listicle_create_ai_images" class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">

                            <p id="listicle_create_ai_images_text" style="color: #333;font-weight: 500;">
                              Generate AI Images <br>
                              <b style="font-style: italic; font-size:11px;color: rgb(90 16 185)">(We cannot guaranty the quelity, These are AI generated, We reccomand using prefessional images for better results, if you do decide to use them, please review them before publishing)</b><br>                      
                              </p>
                          </label>

                        </label>
                        <label class="block">
                          <label class="inline-flex items-center space-x-2">
                            <input checked="checked" id="listicle_create_images_placeholders" onchange="listicle_create_images_placeholders_handleCheckChange(this);" name="listicle_create_images_placeholders" class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                            <p id="listicle_create_images_placeholders_text" style="color: #333;font-weight: 500;">
                              Generate Images placeholders  <br>
                              <b style="font-style: italic; font-size:11px;color: rgb(90 16 185)">(A blank placeholder image will be provided and positioned correctly for you to replace) </b><br>                      
                              </p>                   
                            </p>
                          </label>
                        </label>
                      </div>


                      <div id="listicle_tags_categories_div" class="grid grid-cols-2 gap-4" style="margin-top: 20px;display:none">
                        <label class="block">
                          <label class="inline-flex items-center space-x-2">
                            <input checked="checked" id="create_listicle_tags" name="create_listicle_tags" class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">

                            <p id="create_tags_text" style="color: #333;font-weight: 500;">
                              Generate SEO Tags from content                      </p>
                          </label>

                        </label>
                        <label class="block">
                          <label class="inline-flex items-center space-x-2">
                            <input checked="checked" id="create_listicle_tagscreate_listicle_tags" name="listicle_connect_categories" class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                            <p id="listicle_connect_categories_text" style="color: #333;font-weight: 500;">
                              Connect to existing website categories                      
                            </p>
                          </label>
                        </label>
                      </div>

                      <div id="listicle_extended_content_div" class="grid grid-cols-2 gap-4" style="margin-top: 20px;display:none">
                        <label class="block">
                          <label class="inline-flex items-center space-x-2">
                            <input  id="listicle_create_faqs" name="listicle_create_faqs" class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">

                            <p id="listicle_create_faqs_text" style="color: #333;font-weight: 500;">
                              Generate FAQs Section                      
                            </p>
                          </label>

                        </label>
                        <label class="block" style="display:none">
                          <label class="inline-flex items-center space-x-2">
                            <input checked="checked" id="listicle_create_conclusion" name="listicle_create_conclusion" class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">

                            <p id="listicle_create_conclusion_text" style="color: #333;font-weight: 500;">
                              Generate Conclusion Section                      
                            </p>
                          </label>

                        </label>
                      </div>


                      <div id="listicle_affiliate_seo_div" class="grid grid-cols-2 gap-4" style="margin-top: 20px;;display:none">
                        <label class="block">
                          <span style="color: #333;font-weight: 500;" x-tooltip.interactive.content="'#seo_keyphrase_tip'" aria-expanded="false">SEO
                            Keyword: (i) <span style="font-size:11px;font-style: italic;color:#333;">(4 Words Max, Commas not
                              allowed)</span></span>
                          <input id="listicle_seo_keyword" name="listicle_seo_keyword" class="form-input mt-1.5 w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900" placeholder="Recommended, no more than 3 words long." type="text">
                        </label>
                      </div>
                      <div id="listicle_internal_linking_div" class="grid grid-cols-1 gap-4" style="margin-top: 25px;;display:none">
                        <label class="block">
                          <span style="color: #333;font-weight: 500;">
                            Suggested Posts for Internal-Linking                    </span>
                          <br>
                          <label class="block" id="listicle_similar_posts_list" style="height: 143px; overflow-y: auto;"><label class="flex items-center space-x-2 chckbox"><input onchange="handleCheckChange(this);" name="similar_post" value="5589" class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox"><p>Wireless Gaming Mouse - Elevating Gaming Performance with HyperX Pulsefire Haste</p></label></label>
                        </label>
                      </div>

                      <div style="height:25px; width:100%"><hr></div>

                      <div style="height:25px; width:100%; font-size:12px; font-style:italic"><span id="long_listicle_text" style="display:none">Creating a long Listicle can take up to 10 minutes to complete, please be patient.</span></div>

                      <?php wp_nonce_field( 'gizzmo' ); ?>
                      <input type="hidden" id="listicle_action_type" name="listicle_action_type" value="listicle">
                      <input type="hidden" name="package_type_listicle" id="package_type_listicle" value="">
                      <input type="hidden" name="website_id_listicle" id="website_id_listicle" value="">
                      <input type="hidden" id="selected_listicle_title" name="selected_listicle_title" value="">
                      <input type="hidden" id="selected_listicle_similar_post_ids" name="selected_listicle_similar_post_ids" value="">
                      <input type="hidden" id="expected_sections_number" name="expected_sections_number" value="">
                      <input type="hidden" name="listicle_paragraphes_list" id="listicle_paragraphes_list" value="">
                      <input type="hidden" name="language" id="language" value="English">
                       


                      
                      <div id="submit_listicle_div" class="grid grid-cols-2 gap-4" style="margin-top: 20px;display:none;">
                        <label class="block">
                          <span style="color: #333;font-weight: 500;" x-tooltip.interactive.content="'#language_tip'">Select the language for content creation: (i)</span>
                          <select onchange="updateLanguage(this)" id="languge_tag_slct" name="languge_tag_slct" class="form-select mt-1.5 w-full rounded-lg bg-slate-150 px-2 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900">
                            <option value="Afrikaans">Afrikaans</option>
                            <option value="Arabic">Arabic</option>
                            <option value="Azerbaijani">Azerbaijani</option>
                            <option value="Bengali">Bengali</option>
                            <option value="Bulgarian">Bulgarian</option>
                            <option value="Catalan">Catalan</option>
                            <option value="Chinese (Simplified)">Chinese (Simplified)</option>
                            <option value="Chinese (Traditional)">Chinese (Traditional)</option>
                            <option value="Croatian">Croatian</option>
                            <option value="Czech">Czech</option>
                            <option value="Danish">Danish</option>
                            <option value="Dutch">Dutch</option>
                            <option value="English" selected="selected">English</option>
                            <option value="Estonian">Estonian</option>
                            <option value="Finnish">Finnish</option>
                            <option value="French">French</option>
                            <option value="German">German</option>
                            <option value="Greek">Greek</option>
                            <option value="Hebrew">Hebrew</option>
                            <option value="Hindi">Hindi</option>
                            <option value="Hungarian">Hungarian</option>
                            <option value="Icelandic">Icelandic</option>
                            <option value="Indonesian">Indonesian</option>
                            <option value="Italian">Italian</option>
                            <option value="Japanese">Japanese</option>
                            <option value="Korean">Korean</option>
                            <option value="Latvian">Latvian</option>
                            <option value="Lithuanian">Lithuanian</option>
                            <option value="Malay">Malay</option>
                            <option value="Norwegian">Norwegian</option>
                            <option value="Persian">Persian</option>
                            <option value="Polish">Polish</option>
                            <option value="Portuguese">Portuguese</option>
                            <option value="Romanian">Romanian</option>
                            <option value="Russian">Russian</option>
                            <option value="Slovak">Slovak</option>
                            <option value="Slovenian">Slovenian</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Swedish">Swedish</option>
                            <option value="Thai">Thai</option>
                            <option value="Turkish">Turkish</option>
                            <option value="Ukrainian">Ukrainian</option>
                            <option value="Urdu">Urdu</option>
                            <option value="Vietnamese">Vietnamese</option>
                          </select>
                        </label>
                        <label class="block">
                         
                          <button type="submit" name="insert" id="create_listicle_bt" style="margin-top: 26px;height: 43px; border: radius 5px;;"
                          class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                          <?php echo esc_html__('Create Listicle Post', 'gizzmo-ai'); ?>
                        </button>
                        </label>
                      </div>

                      
                      
                      <div style="height:25px; width:100%"></div>
                    </form>


                  </div>



                </div>




                <div x-show="activeTab === 'tabPosts'"  x-transition:enter="transition-all duration-500 easy-in-out"
                  x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                  x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">

                    
                    <div id="tasks_top_msg" style="height:47px"  class="empty_section">Checking for tasks... Please Wait</div>
                    <div id="content_tasks_list" style="margin-top: 23px;padding-bottom: 20px;"></div>



                </div>

              </div>
            </div>

          </div>
        </div>
        <div class="col-span-12 lg:col-span-5">

          <form method="post" id="product_review_form" style="display:none">
            <div class="card mt-20 w-full max-w-xl p-4 sm:p-5 shadow" x-data="pages.initCreditCard">
              <div
                class="relative mx-auto -mt-20 h-40 w-72 rounded-lg text-white shadow-xl transition-transform hover:scale-110 lg:h-48 lg:w-80 shadow">
                <div id="selected_product_review_img" class="h-full w-full rounded-lg" :class="creditCardUI"
                  style="background-repeat: no-repeat;background-size: cover;background-position: center;border: 0.5px solid #bdb9b9;background-color: #fff;">
                </div>
                <div class="absolute top-0 flex h-full w-full flex-col justify-between p-4 sm:p-5">
                  <div class="flex justify-between">
                    <div>
                      <p class="text-xs+ font-light"></p>
                      <p class="font-medium uppercase tracking-wide" x-text="nameOnCard"></p>
                    </div>
                    <template x-if="cardLogoSrc">
                      <img src="null" :src="cardLogoSrc" class="w-12 rounded-lg" alt="creditcard" />
                    </template>
                  </div>
                  <div class="pt-4" style="text-align:center">

                    <input type="hidden" id="selected_asin" name="selected_asin" value="">
                    <span id="product_list_featured_image_change" onclick="change_product_other_images()"
                      style="display:none"
                      class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                      <?php echo esc_html__('Change Featured Image', 'gizzmo-ai'); ?>
                    </span>
                    <span id="featured_image_change"
                      class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                      <?php echo esc_html__('Change Featured Image', 'gizzmo-ai'); ?>
                    </span>
                  </div>
                </div>
              </div>
              <div class="items-center justify-between py-4" style="text-align: center;">
                <p id="selected_product_link_name"
                  class="text-base font-semibold text-mainblack dark:text-accent-light">
                </p>
              </div>
              <div class="space-y-4">

                <div id="products_list_draggable" class="grid grid-cols-1 gap-4"
                  style="display:none; margin-top: 20px;padding-bottom: 20px;">
                  <p x-tooltip.interactive.content="'#products_list_reordering'">Selecting Products order and Featured
                    Image (i)</p>
                  <div class="list" id="roundup_products_draggable" style="display:none" sortable-list="sortable-list">
                  </div>
                  <div class="generallist" id="general_products_draggable" style="display:none" sortable-list="sortable-list">
                  </div>
                  <div class="comparisonlist" id="comparison_products_draggable" style="display:none" sortable-list="sortable-list">
                  </div>
                </div>


                <div id="post_categories_div" class="grid grid-cols-2 gap-4" style="margin-top: 20px;display:none">
                  <label class="block">
                    <span style="color: #333;font-weight: 500;" x-tooltip.interactive.content="'#post_category'">Write
                      Post Category: (i)</span>
                    <input id="general_subject" name="general_subject"
                      class="form-input mt-1.5 w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                      placeholder="<?php echo esc_attr__('Gaming Monitors, Fishing Reels, Running', 'gizzmo-ai'); ?>"
                      type="text" />
                  </label>
                  <label class="block">
                    <span onclick="get_post_topics()" style="margin-top: 26px;height: 39px;" id="get_post_topics_bt"
                      class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                      <?php echo esc_html__('Get Post Topics', 'gizzmo-ai'); ?>
                    </span>
                  </label>
                </div>
                
               <div id="post_products_shared_features_div" class="grid grid-cols-1 gap-4" style="margin-top: 20px;display:none; text-align:center">
                  <label class="block">
                    <span style="color: #333;font-weight: 500;" x-tooltip.interactive.content="'#products_shared_features'">Products shared features: (i)</span>
                  </label>
                  <label class="block">
                    <span onclick="get_products_shared_features()" style="height: 39px;cursor:pointer" id="get_products_shared_features_bt"
                      class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                      <?php echo esc_html__('Get Products Shared Features', 'gizzmo-ai'); ?>
                    </span>
                  </label>
                </div>


                <div id="topics_list_div" class="grid grid-cols-1 gap-4" style="margin-top: 25px;display:none">
                  <label class="block">
                    <span style="color: #333;font-weight: 500;">Suggested Topics for Posts (Select One)</span>
                    <br>
                    <label class="block" id="suggested_topics_list" style="height: 143px; overflow-y: auto;">

                    </label>
                  </label>
                </div>

                <div id="products_shared_features_list_div" class="grid grid-cols-1 gap-4" style="margin-top: 25px;display:none">
                  <label class="block">
                    <span style="color: #333;font-weight: 500;">Suggested Products shared features</span>
                    <br>
                    <label class="block" id="suggested_products_shared_features_list" style="height: 143px; overflow-y: auto;">

                    </label>
                  </label>
                </div>

                <div id="selected_shared_features_list_draggable" class="grid grid-cols-1 gap-4"
                  style="display:none; margin-top: 20px;padding-bottom: 20px;">
                  <p style="color: #333;font-weight: 500;padding-bottom: 11px;" x-tooltip.interactive.content="'#features_paragrpahs_list_reordering'">Selecting and Reordering Comparison paragraphs(i)</p>
                  <div class="selectedsharedfeatureslist" id="selected_shared_features_draggable"  sortable-list="sortable-list">
                  </div>
                </div>

                <div class="grid grid-cols-1 gap-4" x-data="accordionItem('item-2')" id="thematic_concepts_list_div"  style="margin-top: 6px;display:none">
                  <div class="flex cursor-pointer items-center justify-between p-4" style="padding-left: 0px;" @click="expanded = !expanded">
                    <p style="color: #333;font-weight: 500;padding-bottom: 11px;" x-tooltip.interactive.content="'#thematic_concepts'">
                      Suggested Thematic Concepts (Optional, Select One) <b class="new_badge">New 🔥</b>
                    <p>
                    <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">
                      <i class="fas fa-chevron-down"></i>
                    </div>
                  </div>
                  <div x-collapse="" x-show="expanded" style="height: 0px; overflow: hidden; display: none;" hidden="">
                    <div class="px-4 pb-4" style="padding-left: 0px;padding-right: 0px;">
                      <label class="block" id="thematic_concepts_list" style="height: 143px; overflow-y: auto;">

                      </label>
                      <span id="add_thematic_concept_bt" style="cursor:pointer;float: right;color: #4e0fb5;text-decoration: underline;margin-right:5px">ADD THEMATIC CONCEPT</span>
                    </div>
                  </div>
                  
                </div>
                
                <div class="grid grid-cols-1 gap-4" x-data="accordionItem('item-3')" id="internal_links_list_div"  style="display:none">
                  <div class="flex cursor-pointer items-center justify-between p-4" style="padding-left: 0px;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;" @click="expanded = !expanded">
                    <p style="color: #333;font-weight: 500;" x-tooltip.interactive.content="'#internal_links_selection'">
                      Suggested Internal links posts (Optional)
                    <p>
                    <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">
                      <i class="fas fa-chevron-down"></i>
                    </div>
                  </div>
                  <div x-collapse="" x-show="expanded" style="height: 0px; overflow: hidden; display: none;" hidden="">
                    <div class="px-4 pb-4" style="padding-left: 0px;padding-right: 0px;">
                      <label class="block" id="internal_links_list" style="height: 143px; overflow-y: auto;">

                      </label>
                    </div>
                  </div>
                </div>


                <div id="affiliate_seo_div" class="grid grid-cols-2 gap-4" style="margin-top: 20px;">
                  
                  
                  <label class="block">
                    <span style="color: #333;font-weight: 500;"
                      x-tooltip.interactive.content="'#affiliate_tag_tip'">Affiliate Tag (i)</span>
                    <span id="remove_aff_tag" onclick="remove_aff_tag()"
                      style="float: right;color: #4e0fb5;text-decoration: underline;margin-right: 5px;cursor:pointer">DELETE</span><span
                      style="float:right;margin-right:5px" id="tmp_spacer">|</span> <span id="add_affiliate_tag_bt"
                      style=";cursor:pointer;float: right;color: #4e0fb5;text-decoration: underline;margin-right:5px">ADD</span>
                    <select id="product_review_affiliate_tag_slct" name="product_review_affiliate_tag_slct"
                      class="form-select mt-1.5 w-full rounded-lg bg-slate-150 px-2 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900">
                    </select>
                  </label>
                  <label class="block">
                    <span style="color: #333;font-weight: 500;" x-tooltip.interactive.content="'#seo_keyphrase_tip'">SEO
                      Keyword: (i) <span style="font-size:11px;font-style: italic;color:#333;">(4 Words Max, Commas not
                        allowed)</span></span>
                    <input id="product_review_seo_keyword" name="product_review_seo_keyword"
                      class="form-input mt-1.5 w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                      placeholder="<?php echo esc_attr__('Recommended, no more than 3 words long.', 'gizzmo-ai'); ?>"
                      type="text" />
                  </label>
                </div>

                <div  id="internal_linking_div" class="grid grid-cols-1 gap-4" style="margin-top: 25px;">
                  <label class="block">
                    <span style="color: #333;font-weight: 500;">
                      <?php echo esc_html__('Suggested Posts for Internal-Linking', 'gizzmo-ai'); ?>
                    </span>
                    <br>

                    <label class="block" id="similar_posts_list" style="height: 143px; overflow-y: auto;">

                    </label>
                  </label>
                </div>

                <div id="scheme_monitization_div" class="grid grid-cols-2 gap-4" style="margin-top: 20px;">
                  <label class="block">
                    <label class="inline-flex items-center space-x-2" id="schemas_lable">
                      <input checked="checked" id="create_schema" name="create_schema"
                        class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                        type="checkbox" />

                      <p style="color: #333;font-weight: 500;">
                        <?php echo esc_html__('Create Relevant Schemas for SEO', 'gizzmo-ai'); ?>
                      </p>
                    </label>

                  </label>
                  <label class="block">
                    <label class="inline-flex items-center space-x-2">
                      <input checked="checked" id="carousel_options" name="carousel_options" 
                        class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                        type="checkbox" />
                      <p id="carousel_options_text" style="color: #333;font-weight: 500;">
                        <?php echo esc_html__('Monetization Carousels & Affiliate Tags', 'gizzmo-ai'); ?>
                      </p>
                    </label>
                  </label>
                </div>

                <div id="tags_categories_div" class="grid grid-cols-2 gap-4" style="margin-top: 20px;">
                  <label class="block">
                    <label class="inline-flex items-center space-x-2">
                      <input checked="checked" id="create_tags" name="create_tags"
                        class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                        type="checkbox" />

                      <p id="create_tags_text"  style="color: #333;font-weight: 500;">
                        <?php echo esc_html__('Generate SEO Tags from content', 'gizzmo-ai'); ?>
                      </p>
                    </label>

                  </label>
                  <label class="block">
                    <label class="inline-flex items-center space-x-2">
                      <input  checked="checked" id="connect_categories" name="connect_categories"
                        class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                        type="checkbox" />
                      <p id="connect_categories_text" style="color: #333;font-weight: 500;">
                        <?php echo esc_html__('Connect to existing website categories', 'gizzmo-ai'); ?>
                      </p>
                    </label>
                  </label>
                </div>
                
                <hr style="margin-top: 24px;width: 100%;background-color: #e3e4e7;color: #333;height: 1px;">
                
                <div id="extended_content_div" class="grid grid-cols-2 gap-4" style="margin-top: 20px;">
                  <label class="block">
                    <label class="inline-flex items-center space-x-2">
                      <input checked="checked" id="create_faqs" name="create_faqs"
                        class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                        type="checkbox" />

                      <p id="create_faqs_text"  style="color: #333;font-weight: 500;">
                        <?php echo esc_html__('Generate FAQs Section', 'gizzmo-ai'); ?>
                      </p>
                    </label>

                  </label>
                  <label class="block">
                    <label class="inline-flex items-center space-x-2">
                      <input  checked="checked" id="create_pros_cons" name="create_pros_cons"
                        class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                        type="checkbox" />
                      <p id="create_pros_cons_text" style="color: #333;font-weight: 500;">
                        <?php echo esc_html__('Generate Pros & Cons Section', 'gizzmo-ai'); ?>
                      </p>
                    </label>
                  </label>
                </div>
                
                <div id="roundup_extended_content_div" class="grid grid-cols-2 gap-4" style="margin-top: 20px;display:none">
                  <label class="block">
                    <label class="inline-flex items-center space-x-2">
                      <input id="create_rating_reviews" name="create_rating_reviews"
                        class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                        type="checkbox" />

                      <p id="create_rating_review_text"  style="color: #333;font-weight: 500;">
                        <?php echo esc_html__('Products Rating and Reviews', 'gizzmo-ai'); ?>
                      </p>
                    </label>

                  </label>
                  <label class="block">
                    <label class="inline-flex items-center space-x-2">
                      <input  id="roundup_create_pros_cons" name="roundup_create_pros_cons"
                        class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                        type="checkbox" />
                      <p id="create_products_pros_cons_text" style="color: #333;font-weight: 500;">
                        <?php echo esc_html__('Products Pros & Cons', 'gizzmo-ai'); ?>
                      </p>
                    </label>
                  </label>
                </div>
                <div id="roundup_content_div" class="grid grid-cols-2 gap-4" style="margin-top: 20px;display:none">
                  <label class="block">
                    <label class="inline-flex items-center space-x-2">
                      <input id="create_list_of_products" name="create_list_of_products"
                        class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                        type="checkbox" />

                      <p id="create_list_of_products_text"  style="color: #333;font-weight: 500;">
                        <?php echo esc_html__('Display Products List', 'gizzmo-ai'); ?>
                      </p>
                    </label>

                  </label>
                </div>

                <div id="roundup_ai_images" class="grid grid-cols-1 gap-4" style="margin-top: 20px; display: none;">
                  <label class="block">
                    <label class="inline-flex items-center space-x-2">
                      <input id="roundup_listicle_create_ai_images"  name="roundup_listicle_create_ai_images" class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                      <p id="listicle_create_ai_images_text" style="color: #333;font-weight: 500;">
                        Generate AI Featured Image <br>
                        <b style="font-style: italic; font-size:11px;color: rgb(90 16 185)">(We cannot guaranty the quelity, These are AI generated, We reccomand using prefessional images for better results, if you do decide to use them, please review them before publishing)</b><br>                      
                        </p>
                    </label>

                  </label>
                </div>


                <div id="extended_conclusion_content_div" class="grid grid-cols-2 gap-4" style="margin-top: 20px;">
                  <label class="block">
                    <label class="inline-flex items-center space-x-2">
                      <input checked="checked" id="create_conclusion" name="create_conclusion"
                        class="form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                        type="checkbox" />

                      <p id="create_conclusion_text"  style="color: #333;font-weight: 500;">
                        <?php echo esc_html__('Generate Conclusion Section', 'gizzmo-ai'); ?>
                      </p>
                    </label>

                  </label>

                  
                </div>



                <div class="flex justify-center space-x-2 pt-4">



                  <input type="hidden" name="roundups_asins" id="roundups_asins" value="">
                  <input type="hidden" name="general_asins" id="general_asins" value="">
                  <input type="hidden" name="comparison_asins" id="comparison_asins" value="">

                  <input type="hidden" name="package_type" id="package_type" value="">
                  <input type="hidden" name="featured_image" id="featured_image" value="">
                  <input type="hidden" name="action_type" id="action_type" value="product_review">
                  <input type="hidden" name="product_review_asin" id="product_review_asin" value="">
                  <input type="hidden" name="website_id" id="website_id" value="">
                  <input type="hidden" name="selected_similar_post_ids" id="selected_similar_post_ids" value="">
                  <input type="hidden" name="selected_topic" id="selected_topic" value="">
                  <input type="hidden" name="selected_carousels" id="selected_carousels" value="">

                  <input type="hidden" name="products_shared_paragraphes_list" id="products_shared_paragraphes_list" value="">
                  <input type="hidden" name="products_shared_features_list" id="products_shared_features_list" value="">
                  <input type="hidden" name="selected_thematic_concept" id="selected_thematic_concept" value="">
                  <input type="hidden" name="language_selected" id="language_selected" value="English">

                  <?php wp_nonce_field( 'gizzmo' ); ?>



                  <div id="submit_content_div" class="grid grid-cols-2 gap-4" style="margin-top: 20px;">
                    <label class="block">
                      <span style="color: #333;font-weight: 500;" x-tooltip.interactive.content="'#language_tip'">Select the language for content creation: (i)</span>
                      <select onchange="updateLanguage(this)" id="languge_tag_slct_2" name="languge_tag_slct_2" class="form-select mt-1.5 w-full rounded-lg bg-slate-150 px-2 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900">
                        <option value="Afrikaans">Afrikaans</option>
                        <option value="Arabic">Arabic</option>
                        <option value="Azerbaijani">Azerbaijani</option>
                        <option value="Bengali">Bengali</option>
                        <option value="Bulgarian">Bulgarian</option>
                        <option value="Catalan">Catalan</option>
                        <option value="Chinese (Simplified)">Chinese (Simplified)</option>
                        <option value="Chinese (Traditional)">Chinese (Traditional)</option>
                        <option value="Croatian">Croatian</option>
                        <option value="Czech">Czech</option>
                        <option value="Danish">Danish</option>
                        <option value="Dutch">Dutch</option>
                        <option value="English" selected="selected">English</option>
                        <option value="Estonian">Estonian</option>
                        <option value="Finnish">Finnish</option>
                        <option value="French">French</option>
                        <option value="German">German</option>
                        <option value="Greek">Greek</option>
                        <option value="Hebrew">Hebrew</option>
                        <option value="Hindi">Hindi</option>
                        <option value="Hungarian">Hungarian</option>
                        <option value="Icelandic">Icelandic</option>
                        <option value="Indonesian">Indonesian</option>
                        <option value="Italian">Italian</option>
                        <option value="Japanese">Japanese</option>
                        <option value="Korean">Korean</option>
                        <option value="Latvian">Latvian</option>
                        <option value="Lithuanian">Lithuanian</option>
                        <option value="Malay">Malay</option>
                        <option value="Norwegian">Norwegian</option>
                        <option value="Persian">Persian</option>
                        <option value="Polish">Polish</option>
                        <option value="Portuguese">Portuguese</option>
                        <option value="Romanian">Romanian</option>
                        <option value="Russian">Russian</option>
                        <option value="Slovak">Slovak</option>
                        <option value="Slovenian">Slovenian</option>
                        <option value="Spanish">Spanish</option>
                        <option value="Swedish">Swedish</option>
                        <option value="Thai">Thai</option>
                        <option value="Turkish">Turkish</option>
                        <option value="Ukrainian">Ukrainian</option>
                        <option value="Urdu">Urdu</option>
                        <option value="Vietnamese">Vietnamese</option>
                      </select>
                    </label>
                    <label class="block">
                      <button type="submit" name="insert" onclick="set_go_to_waiting_tasks()"  id="create_review_bt" style="margin-top: 24px;height: 42px; border: radius 5px;"
                        class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <?php echo esc_html__('Create Product Review Post', 'gizzmo-ai'); ?>
                      </button>
                      <button type="submit" name="insert" onclick="set_go_to_waiting_tasks()" id="create_roundup_bt" style="margin-top: 24px;height: 42px; border: radius 5px;display:none"
                        class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <?php echo esc_html__('Create Roundup Post', 'gizzmo-ai'); ?>
                      </button>
                      <button type="submit" name="insert" onclick="set_go_to_waiting_tasks()" id="create_general_bt" style="margin-top: 24px;height: 42px; border: radius 5px;display:none"
                        class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <?php echo esc_html__('Create General Post', 'gizzmo-ai'); ?>
                      </button>
                      <button type="submit" name="insert" onclick="set_go_to_waiting_tasks()" id="create_comparison_bt" style="margin-top: 24px;height: 42px; border: radius 5px;display:none"
                        class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <?php echo esc_html__('Create Comparison Post', 'gizzmo-ai'); ?>
                      </button>
                    </label>
                  </div>      
                  
                </div>
              </div>
            </div>

          </form>

          







          <div id="gizzmo_msg_board_wrapper" style="margin-top: 1.5rem;max-width:530px">

            <div id="plugin_promotion_1_holder" style="display:none"
              class="grid max-w-4xl grid-cols-1 gap-4 sm:grid-cols-1 sm:gap-5 lg:gap-6">
            </div>

            <div id="plugin_promotion_2_holder" style="display:none;margin-top:15px;"
              class="grid max-w-4xl grid-cols-1 gap-4 sm:grid-cols-1 sm:gap-5 lg:gap-6">

            </div>

            <div id="plugin_update_request_holder" style="display:none;margin-top:15px"
              class="grid max-w-4xl grid-cols-1 gap-4 sm:grid-cols-1 sm:gap-5 lg:gap-6">
              <div class="rounded-lg bg-gradient-to-br from-pink-500 to-rose-500 py-6 px-5 text-center">
                <h4 class="text-xl font-semibold text-white" id="plugin_update_title"></h4>
                <p class="pt-2 text-white">
                  <?php echo esc_html__('There is an important update available for the Gizzmo WordPress Plugin.', 'gizzmo-ai'); ?><br>
                </p>
                <div
                  style="width:100%;padding: 30px;background-color:#fff;overflow:auto;margin-top: 12px;border-radius: 6px;text-align: left;">
                  <ul id="plugin_update_ugrades_list">
                  </ul>
                </div>
                <p class="pt-2 text-white">
                  <?php echo esc_html__('Please update the plugin to continue using Gizzmo.', 'gizzmo-ai'); ?>
                </p>
              </div>
            </div>

          </div>

        </div>
      </div>
    </main>



    <template id="products_shared_features">
      <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
        <div>
          <p class="font-medium text-slate-700 dark:text-navy-100">Click to identify and compare features common to both products. Select features that you want Gizzmo to write about.</p><br>
        </div>
      </div>
    </template> 
    <template id="post_category">
      <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
        <div>
          <p class="font-medium text-slate-700 dark:text-navy-100">Write a category or a subject that will enable Gizzmo
            ai to generate and suggest a list of 10 topics that can be used to write a post about.</p><br>
          <p class="font-medium text-slate-700 dark:text-navy-100">Select one of the topics, if none of the suggestions
            are suitable, you can just click again for 10 more.</p><br>
        </div>
      </div>
    </template>
    <template id="listicle_category">
      <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
        <div>
          <p class="font-medium text-slate-700 dark:text-navy-100">Choosing the right subject is key to creating an engaging listicle. It sets the tone and direction for your content, ensuring it resonates with your intended audience. Here's a quick guide:</p><br>
          <p><b>Focus:</b> Pick a subject that's both specific and relevant to your readers. A well-defined theme ensures your listicle is focused and informative.</p><br>

          <p><b>Interest:</b> Consider what your audience is passionate about. A subject that taps into their interests will keep them engaged.</p><br>

          <p><b>Originality:</b> Look for a unique angle or perspective. This makes your listicle stand out and captures the readers' attention.</p><br>

          <p><b>Clarity:</b> Be clear and concise in your subject choice. This helps in structuring your listicle and makes it more accessible to the audience.</p><br>

          <p>Enter a subject that encapsulates the essence of your listicle. This is the first step in crafting content that informs, entertains, and engages.</p><br>
        </div>
      </div>
    </template>
    <template id="products_list_reordering">
      <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
        <div>
          <p class="font-medium text-slate-700 dark:text-navy-100">You can reorder the products by using the three lines
            icons to the right.</p><br>
          <p class="font-medium text-slate-700 dark:text-navy-100">Gizzmo will use the first product image on the list
            as a Featured Image of the post.</p><br>
          <p class="font-medium text-slate-700 dark:text-navy-100">You can change the Post Featured Image by clicking
            the "Change Featured Image" Button located over the Preview image above.</p><br>
        </div>
      </div>
    </template>
    <template id="features_paragrpahs_list_reordering">
      <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
      <div>
          <h3><b>Selecting and Reordering Comparison Paragraphs</b></h3>
          <p class="font-medium text-slate-700 dark:text-navy-100">When preparing your comparison, you have the flexibility to select or unselect features you wish to include or exclude from your analysis. Each feature you choose will become a dedicated paragraph in your comparison. Here’s why this approach is beneficial:</p><br>
          <p class="font-medium text-slate-700 dark:text-navy-100">
            <ul>
              <li>
                <b>Customization:</b> This approach lets you customize your content for your focus area, ensuring a concise and targeted analysis by including only relevant features.
              </li>
              <li>
                <b>Enhanced Clarity:</b> Organizing by feature clarifies and focuses your analysis, enabling a deeper, more insightful exploration of each aspect for a comprehensive comparison.
              </li>
              <li>
                <b>Logical Flow:</b> Ordering paragraphs logically enhances understanding and engagement, creating a stronger narrative or argument.
              </li>
              <li>
                <b>Reader Engagement:</b> Selecting and ordering paragraphs strategically crafts a compelling narrative that grabs and holds attention, leading to a powerful conclusion or key takeaway.
              </li>
            </ul>
          </p>
        </div>
      </div>
    </template>
    <template id="thematic_concepts">
      <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
        <div>
          <h3><b>Why Choose a Theme?</b></h3>
          <p class="font-medium text-slate-700 dark:text-navy-100">Selecting a theme is optional but can significantly enhance your blog post. Here's why:</p><br>
          <p class="font-medium text-slate-700 dark:text-navy-100">
            <ul>
              <li>
                <b>Focused Content:</b> A theme like "Family Gaming" or "Budget Battle" narrows down your comparison, making your content more concise and targeted.
              </li>
              <li>
                <b>Increased Engagement:</b> Themes cater to specific interests, engaging readers who are particularly passionate about that aspect of gaming.
              </li>
              <li>
                <b>Unique Angle:</b> Offering a themed comparison provides a fresh perspective, setting your post apart from more general comparisons.
              </li>
            </ul>
          </p>
        </div>
      </div>
    </template>
    <template id="listicle_paragraphs_pop">
      <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
        <div>
          <h3><b>Listicle suggested paragraphs</b></h3>
          <p class="font-medium text-slate-700 dark:text-navy-100">Access a curated list of paragraph suggestions to build your listicle based on your chosen topic</p><br>
          <p class="font-medium text-slate-700 dark:text-navy-100">
            <ul>
              <li>
                <b>Effortless Creation:</b> Get a ready-to-use list of paragraphs that align with your selected subject.
              </li>
              <li>
                <b>Flexible Structure:</b> Reorder or remove paragraphs to craft a cohesive and compelling narrative.
              </li>
              <li>
                <b>Tailored Suggestions:</b> Request new paragraphs for high-impact, personalized content.
              </li>
            </ul>
          </p>
        </div>
      </div>
    </template>
    <template id="internal_links_selection">
      <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
        <div>
          <h3><b>Why Add Internal Links?</b></h3>
          <p class="font-medium text-slate-700 dark:text-navy-100">Incorporating internal links in your blog post is a valuable practice. Here’s how it benefits your content:</p><br>
          <p class="font-medium text-slate-700 dark:text-navy-100">
            <ul>
              <li>
                <b>Enhanced User Experience:</b> Internal links guide readers to additional relevant content, improving navigation and keeping them engaged on your site longer.
              </li>
              <li>
                <b>Boosts SEO:</b> By linking to other pages on your site, you help search engines understand the structure of your site and the relevance of your content, which can improve your search rankings.
              </li>
              <li>
                <b>Increases Page Views:</b>  By providing links to other interesting articles, you encourage readers to explore more of your website, increasing overall page views and reader retention.
              </li>
              <li>
                <b>Promotes Older Content:</b>Internal links can revive interest in your older posts, giving them renewed visibility and relevance.
              </li>
            </ul>
          </p>
        </div>
      </div>
    </template>
    <template id="affiliate_tag_tip">
      <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
        <div>
          <p class="font-medium text-slate-700 dark:text-navy-100">An Amazon Affiliate Tag is a unique tracking
            identifier assigned to your account as an affiliate. It allows you to earn a commission on purchases made
            through the affiliate links you provide for Amazon products.</p><br>
          <p class="text-xs text-slate-500 dark:text-navy-200"><a style="text-decoration: underline;" target="_blank"
              href="https://affiliate-program.amazon.com/">Amazon Affiliate Program</a></p>
        </div>
      </div>
    </template>

    <template id="language_tip">
      <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
        <div>
          <p class="font-medium text-slate-700 dark:text-navy-100">The language selection dropdown allows you to choose the language in which content will be created. By selecting a language, you ensure that all generated content matches your audience's preferences and needs, enhancing engagement and relevance. Simply pick your desired language from the dropdown list, and Gizzmo will create content tailored to your selection.</p>
        </div>
      </div>
    </template>


    <template id="paid_feature_tip">
      <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
        <div>
            <h3 id="paid_feature_tip_title">🔒 Upgrade to Unlock!</h3><br>
            <hr>
            <p id="paid_feature_tip_body">
              This feature is part of our premium packages. Upgrade your account to access this powerful tool and supercharge your content. Discover the full potential of Gizzmo.ai today!
            </p>
            <br>
            <p class="text-xs text-slate-500 dark:text-navy-200"><a style="text-decoration: underline;" target="_blank"
              href="https://gizzmo.ai/account">Upgrade</a>
            </p>
        </div>
      </div>
    </template>

    <template id="seo_keyphrase_tip">
      <div class="flex space-x-3 rounded-lg bg-slate-150 p-3 dark:bg-navy-500">
        <div>
          <p class="font-medium text-slate-700 dark:text-navy-100">An SEO Keyphrase is a specific word or phrase
            provided by the user that Gizzmo uses to generate content optimized for search engines. By incorporating the
            keyphrase into the content, Gizzmo helps improve the visibility and search engine ranking of the generated
            content, making it more discoverable to users.</p><br>
          <p class="text-xs text-slate-500 dark:text-navy-200"><a style="text-decoration: underline;" target="_blank"
              href="https://gizzmo.ai/keyword-research-101-your-ultimate-guide-to-improve-seo/">How to choose the right
              focus keyword</a></p>
        </div>
      </div>
    </template>




    <div style="display: none;">
      <button id="max_prepare_reached"
        class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
        @click="$notification({text:'You have reached the limit of products that can be prepared at once, please wait for the current products to finish preparing.',variant:'error',position:'center-top',duration:6000})">
      </button>
    </div>


  </div>
  
  <div id="x-teleport-target"></div>
  <script>
    window.addEventListener("DOMContentLoaded", () => Alpine.start());
  </script>



</div>

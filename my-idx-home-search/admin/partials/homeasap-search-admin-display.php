<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://about.homeasap.com
 * @since      1.0.0
 *
 * @package    Homeasap_Search
 * @subpackage Homeasap_Search/admin/partials
 */
?>

<div id="wp-homeasap-search-master-admin">
   <div class="wrap">
      <h1>MyIDX Home Search Manage</h1>
      <p>Thanks for installing MyIDX Home Search by Home ASAP!</p>
      <p>This plugin lets real estate agents generate new leads by adding a home search to any website running on WordPress. Here's how it works. Users type in an location to search. Search results can be set to appear in new browser tab or modal window. As potential buyers browse, they can request a showing or sign up for e-mail notifications about listings in a particular area.</p>
      <p>New leads are sent to the agent through e-mail. Agents also have access to a leads dashboard through the Real Estate Agents Directory where they can check in on recent activity and more. You can find more information about IDX Home Search by visiting.</p>
      <div class="card">
         <h2>Set Up</h2>
         <hr>

         <!-- STEP 1 -->

         <h3 id="step1purchaseasubscriptionplan">Step 1 - Purchase a Subscription Plan</h3>
         <p><strong>If the agent has an active subscription to IDX Home Search or MyIDX Home Search,</strong> you can skip ahead to step 2.</p>
         <p>Otherwise, you will need to connect your site to an active MyIDX Home Search subscription before the plugin can function properly. We recommend that agents purchase the subscription for themselves by visiting <a href="https://about.homeasap.com/wordpress/idx-mls-check" target="_blank"> https://about.homeasap.com/wordpress/idx-mls-check</a> or calling <a tel="+19045497616">(904)549-7616.</a></p>
         <p><em>Can a Developer/Designer buy a subscription to MyIDX Home Search? Technically, yes, but please be aware that this is a yearly recurring subscription. In addition, you will need to be an active member of a participating MLS to activate services.</em> For more information, please visit <a href="https://about.homeasap.com/wordpress/idx?utm_source=wordpress&utm_medium=referral&utm_campaign=my_idx_admin" target="_blank">https://about.homeasap.com/wordpress/idx</a></p>
         <hr>

         <!-- STEP 2 -->
				 
         <h3 id="step2generateyourshortcode">Step 2 - Generate Your Shortcode</h3>
         <p>Now, we'll decide on a few display options and connect to the agent's MyIDX Home Search subscription. Complete the form below, and we'll create a shortcode for you.</p>
         <h3>Choose an Embed Option</h3>
         <div id="tabs">
            <ul>
               <li class="searchbox">
                  <a href="#tabs-1">
                  <img src="<?php echo esc_url(plugins_url('../images/IDX_PLUGIN-searchbox.png', __FILE__)) ?>">
                  <span class="tab-btn" href="#tabs-1">Embed Search Box Only</span>			
                  </a>
               </li>
               <li class="searchbox">
                  <a href="#tabs-2">
                  <img src="<?php echo esc_url(plugins_url('../images/IDX_PLUGIN-landing_page.png', __FILE__)) ?>">
                  <span class="tab-btn" href="#tabs-2">Embed Landing Page</span>
                  </a>
               </li>
            </ul>
            <div id="tabs-1">
               <form>
                  <p><strong>1. </strong>Use the search tool below to find the agent's Real Estate Agent Directory profile by name or e-mail. Click their name to generate a shortcode containing the information you'll need.					</p>
                  <input class="homeasap-idx-search-agent-search" placeholder="Search for yourself" /><span class="dashicons dashicons-search"></span>
                  <p><strong>2. </strong>Type in your own placeholder text below. If left blank it will default to "Address, Zip, City, State."
                  </p>
                  <input class="homeasap-idx-search-placeholder" placeholder="Enter your placeholder text" />
                  <p><strong>3. </strong>Choose how you would like the IDX search to open/display. Either in a new browser tab or in a popup modal.
                  </p>
                  <div class="hiddenradio">
                     <label class="display-mode" for="new-tab">
                     	<input type="radio" id="new-tab" name="Display Mode" value="new-tab">
                        <img src="<?php echo esc_url(plugins_url('../images/IDX_PLUGIN-new_tab.png', __FILE__)) ?>" alt="Open in a new browser tab">
                        <p>This option will open your IDX search in a new browser tab and keep your website open.</p>
                     </label>
                     <label class="display-mode" for="popup">
                     	<input type="radio" id="popup" name="Display Mode" value="modal">
                     	<img src="<?php echo esc_url(plugins_url('../images/IDX_PLUGIN-popup.png', __FILE__)) ?>" alt="Open in a popup modal">
                        <p>This option will open your IDX search in a window that displays over your website.</p>
                     </label>
                     <br>
                  </div>
                  <br /><br />
                  <p><strong>4. </strong>(Optional) Enter any custom CSS attributes below. They will be added automatically to the shortcode. <em>This will only effect the styles for the search bar.</em>
                  </p>
                  <textarea class="homeasap-idx-search-css" name="css" rows="10" cols="100" placeholder="For example: border-radius:3px; color: #000000;"></textarea>
                  <hr>
                  <p>Once you've completed and submitted the 4 steps above, copy the short code below:</p>
                  <p><code id="homeasap-idx-search-shortcode-sample-code">
										[homeasap-idx-search agent="<span class="homeasap-idx-search-shortcode-sample-agent"></span>" placeholder="<span class="homeasap-idx-search-shortcode-sample-placeholder"></span>" mode="<span class="homeasap-idx-search-shortcode-sample-mode"></span>" css="<span class="homeasap-idx-search-shortcode-sample-css"></span>"]
									</code>
                     &nbsp;<button class="button button-primary homeasap-idx-search-shortcode-button-copy">Copy Code</button>
                  </p>
               </form>
            </div>
            <div id="tabs-2">
               <form>
                  <p><strong>1. </strong>Use the search tool below to find the agent's Real Estate Agent Directory profile by name or e-mail. Click their name to generate a shortcode containing the information you'll need.</p>
                  <input class="homeasap-idx-landing-agent-search" placeholder="Search for yourself" /><span class="dashicons dashicons-search"></span>
                  <p><strong>2. </strong>Enter a height for the MyIDX Home Search section below. <em>Only use px or % as your unit of measure. The default height is 600px.</em></p>
                  <input class="homeasap-idx-landing-height" placeholder="ie: 600px" value="600px" />
                  <p><strong>3. </strong>(Optional) Enter any custom CSS attributes below. They will be added automatically to the shortcode. <em>This will only effect the styles for the iframe container.</em>
                  </p>
                  <textarea class="homeasap-idx-landing-css" name="css" rows="10" cols="100" placeholder="For example: border-radius:3px; color: #000000;"></textarea>
                  <hr>
                  <p>Once you've completed and submitted the 3 steps above, copy the short code below:</p>
                  <p>
										<code id="homeasap-idx-landing-shortcode-sample-code">
											[homeasap-idx-landing agent="<span class="homeasap-idx-landing-shortcode-sample-agent"></span>" height="<span class="homeasap-idx-landing-shortcode-sample-height">600px</span>" css="<span class="homeasap-idx-landing-shortcode-sample-css"></span>"]
										</code>
                     &nbsp;<button class="button button-primary homeasap-idx-landing-shortcode-button-copy">Copy Code</button>
                  </p>
               </form>
            </div>
         </div>
         <hr>

         <!-- STEP 3 -->

         <h3 id="step3placeyourshortcodeonthepage">
         Step 3 - Place Your Shortcode on the Page</h3>
         <p>Copy the shortcode generated in step 2. You can place this shortcode on any page you want to display your search. If you wish to make any changes in the future, simply generate a new shortcode with your desired options.</p>
      </div>

			<!-- Troubleshooting -->

      <div class="troubleshooting">
         <h2 id="troubleshooting">Troubleshooting</h2>
         <p>Having trouble? Visit our trouble shooting guide at <a href="https://helpcenter.homeasap.com/idx-home-search-wordpress-help/">helpcenter.homeasap.com/idx-home-search-wordpress-help/</a>.</p>
         <p>Have an idea for improving MyIDX Home Search? Send us an e-mail at <a href="mailto:cs@homeasap.com">cs@homeasap.com</a>.</p>
      </div>
      <br />
      <p class="copyright">Copyright &copy; <?php echo esc_html(gmdate("Y")) ?> HomeASAP LLC.</p>
   </div>
</div>

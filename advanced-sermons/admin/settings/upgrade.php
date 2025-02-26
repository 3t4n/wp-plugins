<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Shortcode page content

add_action( 'asp_settings_content', 'asp_render_upgrade_page' );
function asp_render_upgrade_page() {
global $asp_active_tab;
    if ( 'upgrade' != $asp_active_tab )
    return;
?>

        <?php
            settings_fields('asp-shortcode-settings');
            do_settings_sections( 'asp-shortcode-settings' );
        ?>

        <style>
        .asp-tab-content {
            padding: 0px!important;
        }
        </style>

            <div class="asp-inner-wrapper">

            <div class="asp-form-message"><?php settings_errors('asp-notices'); ?></div>

                <div style="margin-top: 2px; margin-bottom: 2px;" class="asp-upgrade-body">

                    <div class="upgrade-section">
                        <h1>Advanced Sermons Pro</h1>
                        <p>Join a growing list of churches using Advanced Sermons Pro add-on.</p>
                        <a href="https://advancedsermons.com/pricing/" target="_blank">Get Advanced Sermons Pro</a>
                    </div>

                    <div class="compare-section">
                        <h5>All Pro Features</h5>

                        <div class="compare-table">
                            <div class="asp-row">
                                <div class="asp-column title">
                                    <ul>
                                        <li class="table-header">General</li>
                                        <li class="asp-tooltip">Sermon Layout
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Customize the sermon layout in which you would like to display your sermons.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Archive Page Slug
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Create a custom name and slug for sermons. Example: messages</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Sermon Label
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Change the default Sermon label. Example: "Messages"</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Speaker Label
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Change the default Speaker label. Example: "Preacher"</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Topic Label
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Change the default Topic label. Example: "Passage"</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Duplicate Sermons
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Duplicate Sermons allows you to duplicate existing sermons to save you time and energy.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Search Results
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Include sermons in the default WordPress search results.</span>
                                          </div>
                                        </li>
                                        <li class="table-header">Design</li>
                                        <li class="asp-tooltip">Accent Color
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Choose a personalized accent color to match your church's branding.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Always Default Image
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Display the default title background on the single sermon page instead of the sermon image.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Sermon Thumbnail Height
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Change the sermon archive and shortcode thumbnail height.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Series Thumbnail Height
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Change the series shortcode thumbnail height.</span>
                                          </div>
                                        </li>
                                        <li class="table-header">Single Sermon</li>
                                        <li class="asp-tooltip">Bible Passages
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Add a bible passage reference to sermons that automatically links to Bible Gateway.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Bible Version and Translation
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Customize the bible passage version and translation.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Sermon Sidebar
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Display a sibebar on the sermon single page.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Social Share
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Enable Social Share section from sermon single page.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Related Sermons
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Enable related sermons on single sermon view.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Related Sermons Count
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">The number of related sermons you would like to display.</span>
                                          </div>
                                        </li>
                                        <li class="table-header">Archive</li>
                                        <li class="asp-tooltip">Display Series Details
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Display series image, title, and description above sermons on the single series page.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Display Speaker Details
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Display speaker image, position, social links, name, and description above sermons on the single speaker page.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Per Page Count
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">The number of sermons you would like to display before pagination is enabled.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Excerpt Length
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Change the number of words to be displayed per sermon in archive and shortcode list.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Orderby Filter
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Remove the orderby filter dropdown from the filter bar.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Order Filter
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Remove the order filter dropdown from the filter bar.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Speaker Filter
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Remove the speaker filter dropdown from the filter bar.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Topics Filter
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Remove the topics filter dropdown from the filter bar.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Series Filter
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Remove the series filter dropdown from the filter bar.</span>
                                          </div>
                                        </li>
                                        <li class="table-header">Misc</li>
                                        <li class="asp-tooltip">Hide Meta Box Fields
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Simplify the edit sermon page by hiding meta fields your church doesn't use.</span>
                                          </div>
                                        </li>
                                        <li class="table-header">Language</li>
                                        <li class="asp-tooltip">Customize Archive Text
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Language settings allows you to customize the Advanced Sermons archive default text.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Customize Single Sermon Text
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Language settings allows you to customize the Advanced Sermons single sermon default text.</span>
                                          </div>
                                        </li>
                                        <li class="table-header">Shortcodes</li>
                                        <li class="asp-tooltip">Sermon Shortcodes
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Display sermons anywhere on your website using our parameter shortodes.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Series Shortcodes
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Display latest series anywhere on your website using our parameter shortodes.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Speakers Shortcodes
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Display a beautiful grid view of all speakers that links to their sermons.</span>
                                          </div>
                                        </li>
                                        <li class="asp-tooltip">Widget Shortcodes
                                          <div class="asp-tooltip"><img src="<?php echo plugins_url( 'assets/information.png', __FILE__ ); ?>"/>
                                              <span class="asp-tooltip-text">Display beautiful widgets to add throughout your churches website.</span>
                                          </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="asp-column pro">
                                    <ul>
                                        <li class="table-header">PRO</li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li class="table-header" style="color: #f2eee3!important;">-</li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li class="table-header" style="color: #f2eee3!important;">-</li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li class="table-header" style="color: #f2eee3!important;">-</li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li class="table-header" style="color: #f2eee3!important;">-</li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li class="table-header" style="color: #f2eee3!important;">-</li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li class="table-header" style="color: #f2eee3!important;">-</li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                        <li><img src="<?php echo plugins_url( 'assets/check.png', __FILE__ ); ?>"/></li>
                                    </ul>
                               </div>
                         </div>
                  </div>
          </div>

          <div style="padding-top: 45px;" class="upgrade-section">
              <p>Join a growing list of churches using Advanced Sermons Pro add-on.</p>
              <a href="https://advancedsermons.com/pricing/" target="_blank">Get Advanced Sermons Pro</a>
          </div>

    </div>

<?php }

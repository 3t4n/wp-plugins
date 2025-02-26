<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://hikeorders.com/accessibility_enabler/home/
 * @since      1.0.0
 *
 * @package    A11y_Enabler
 * @subpackage A11y_Enabler/admin/partials
 */
?>


    <h1>
        <?php echo esc_html(get_admin_page_title()); ?>

        <a style="float: right; margin-right: 10px;" target="_blank" class="button-primary" href="https://a11yenabler.hikeorders.com/user/login?utm_source=wordpress-plugin&utm_medium=open-dashboard&utm_campaign=wordpress-app-setup">Open Dashboard </a>
    </h1>
    <hr/>
    <p>
        This plugin increases accessibility compliance with WCAG 2.0 , ATAG 2.0 , ADA , & Section 508 without changing your website’s
        existing code. This is the only complete accessibility plugin available for WordPress
    </p>
    <h2>OrgID Setup</h2>





    <div id="poststuff" class="metabox-holder has-right-sidebar">

        <div class="inner-sidebar">
            <div id="side-sortables" class="meta-box-sortabless ui-sortable" style="position:relative;">

                <div id="sm_pnres" class="postbox">
                    <h3 class="hndle"><span>About this Plugin:</span></h3>
                    <div class="inside"> <ul>
                            <li><a class="sm_button " target="_blank"
                                   href="https://hikeorders.com/accessibility/pricing/?utm_source=wordpress-plugin&utm_medium=about-plugin&utm_campaign=wordpress-app-setup">Pricing & Free Trail</a></li>
                            <li><a class="sm_button " target="_blank"
                                   href="https://hikeorders.com/accessibility/main-accessibility-features/?utm_source=wordpress-plugin&utm_medium=about-plugin&utm_campaign=wordpress-app-setup">
                                    Feature</a></li>
                            <li><a class="sm_button " target="_blank"
                                   href="https://support.hikeorders.com/accessibility-enabler-support-home/?utm_source=wordpress-plugin&utm_medium=about-plugin&utm_campaign=wordpress-app-setup">Help / FAQ</a></li>
                            <li> <a class="sm_button " target="_blank"
                                    href="https://hikeorders.com/accessibility/home/?utm_source=wordpress-plugin&utm_medium=about-plugin&utm_campaign=wordpress-app-setup">About</a></li>


                        </ul>



                    </div>
                </div>

            </div>
        </div>

        <div class="has-sidebar sm-padded">
            <div id="post-body-content" class="has-sidebar-content">

                <form method="post" name="a11y_enabler_options" action="options.php">
                    <?php

                    $options = get_option($this->A11y_Enabler);
                    $a11y_enabler_orgId = $options['a11y_enabler_orgId'];
                    settings_fields($this->A11y_Enabler);
                    do_settings_sections($this->A11y_Enabler);
                    ?>
                    <div class="meta-box-sortabless">


                        <!-- Rebuild Area -->
                        <div id="sm_rebuild" class="postbox">
                            <h3 style="    cursor: unset;" class="hndle"><span>
                                    Fetch your OrgID from
                                    <a style="font-size: 14px;" target="_blank" href="http://a11yenabler.hikeorders.com/misc/install_guide?utm_source=wordpress-plugin&utm_medium=fetch-orgId&utm_campaign=wordpress-app-setup">Accessibility Enabler</a>
                                    App and  paste it here. Login / register if required.
                                </span>
                            </h3>
                            <div class="inside">


                                <input type="text"
                                       autocomplete="off"
                                       autocorrect="off"
                                       autocapitalize="off" spellcheck="false" placeholder="paste OrgID here"
                                       name="a11y_enabler_orgId" id="a11y_enabler_orgId"
                                       style="width: 100%; font-size: 17px;    padding: 10px;font-family: monospace;"
                                       value="<?php echo $a11y_enabler_orgId ?>"
                                />


                            </div>
                        </div>


                    </div>

                    <div>
                        <p class="submit">
                            <input type="submit" class="button-primary" name="submit" value="Save OrgID & Activate Free Trail">
<!--                            <a style="float: right" target="_blank"  href="">Complete Installation Guide</a>-->
                        </p>
                    </div>
                </form>

                <hr />
                <h2>Step by step guide to get this app working </h2>
                <ol>
                    <li>Create an accessibility enabler account :  <a target="_blank" href="https://a11yenabler.hikeorders.com/user/register?utm_source=wordpress-plugin&utm_medium=create-account&utm_campaign=wordpress-app-setup">Get Started </a></li>

                    <li>Go through the on-boarding process. It's Just 4 step process</li>

                    <li>The on-boarding process gives you an OrgID. Copy-Paste in above text box and save it. </li>

                    <li>That's it done. Go to your site front-end and you will see accessibility enabler toolbar</li>

                </ol>


            </div>
        </div>




    </div>


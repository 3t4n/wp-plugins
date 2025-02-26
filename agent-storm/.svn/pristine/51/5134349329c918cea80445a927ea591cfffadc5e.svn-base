<?php
/*******************************************************************************
    Wordpress IDX and Contact Manager Plugin
    Copyright (C) 2010-2011 StormRETS, Inc.

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*******************************************************************************/
?>

<div class="wrap static">
    
    <div id="agentstorm">
        <div id="agentstorm-logoc"><div id="agentstorm-logo-caption"><div id="agentstorm-logo-caption-text"><?php echo AgentStorm::getOneLiner(); ?></div></div><div id="agentstorm-logo"></div></div>
        <div id="agentstorm-tabs">
            <ul>
                <li><a href="#tabs-1"><?php echo _('Settings'); ?></a></li>
                <li <?php if (!$this->isConfigured()): ?>class="ui-state-disabled"<?php endif; ?>><a href="#tabs-2"><?php echo _('Contact Manager'); ?></a></li>
                <li <?php if (!$this->isConfigured()): ?>class="ui-state-disabled"<?php endif; ?>><a href="#tabs-3"><?php echo _('Displaying IDX Data'); ?></a></li>
                <li <?php if (!$this->isConfigured()): ?>class="ui-state-disabled"<?php endif; ?>><a href="#tabs-4"><?php echo _('IDX Data Settings'); ?></a></li>
                <li <?php if (!$this->isConfigured()): ?>class="ui-state-disabled"<?php endif; ?>><a href="#tabs-5"><?php echo _('Agent Details'); ?></a></li>
                <li <?php if (!$this->isConfigured()): ?>class="ui-state-disabled"<?php endif; ?>><a href="#tabs-6"><?php echo _('Display Fields'); ?></a></li>
                <li <?php if (!$this->isConfigured()): ?>class="ui-state-disabled"<?php endif; ?>><a href="#tabs-7"><?php echo _('Permalinks'); ?></a></li>
                <li <?php if (!$this->isConfigured()): ?>class="ui-state-disabled"<?php endif; ?>><a href="#tabs-8"><?php echo _('Map Search'); ?></a></li>
            </ul>
            <div id="tabs-1" class="ui-tabs-hide">
                <div class="agentstom-msgbox ui-state-highlight ui-corners-msgbox" style="margin-top: 10px; padding: 0 .7em;"> 
                    <p class="text-base <?php if (!empty($_POST) && isset($_POST['as_settings_save'])): ?>ui-helper-hidden<?php endif; ?>">
                        <span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Information'); ?></strong><br />
                        <?php echo _('In the boxes below enter the required information for connecting to your StormRETS Account.'); ?>
                    </p>
                    <?php if (!empty($_POST) && isset($_POST['as_settings_save'])): ?>
                    <p class="text-temp">
                        <span class="ui-icon ui-icon-check" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Save Successful'); ?></strong><br />
                        <?php echo _('Your changes have been saved successfully and all associated metadata has been updated.'); ?>
                    </p>
                    <?php endif; ?>
                </div>
                <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>#tabs-1" method="POST">
                    <div class="agentstorm-input">
                        <label><?php echo _('Built in Stylesheet:'); ?></label><br />
                        <span class="small"><?php echo _('Themes change the colors of the plugin, Choose a theme that fits your site design or select "Custom" to use your own stylesheet.'); ?></span><br />
                        <select name="as_usestyle">
                            <option value="1" <?php if (AgentStormSettingCache::get('as_usestyle') == 1): ?>selected="selected"<?php endif; ?>><?php echo _('Green'); ?></option>
                            <option value="2" <?php if (AgentStormSettingCache::get('as_usestyle') == 2): ?>selected="selected"<?php endif; ?>><?php echo _('Red'); ?></option>
                            <option value="3" <?php if (AgentStormSettingCache::get('as_usestyle') == 3): ?>selected="selected"<?php endif; ?>><?php echo _('Blue'); ?></option>
                            <option value="4" <?php if (AgentStormSettingCache::get('as_usestyle') == 4): ?>selected="selected"<?php endif; ?>><?php echo _('Grey'); ?></option>
                            <option value="5" <?php if (AgentStormSettingCache::get('as_usestyle') == 5): ?>selected="selected"<?php endif; ?>><?php echo _('Brown'); ?></option>
                            <option value="" <?php if (AgentStormSettingCache::get('as_usestyle') == ''): ?>selected="selected"<?php endif; ?>><?php echo _('Custom'); ?></option>
                        </select>
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Hostname'); ?>:</label><br />
                        <span class="small"><?php echo _('This is the Hostname you connect to when logging in to your StormRETS account. i.e. http://example.stormrets.com/'); ?></span><br />
                        <input type="text" name="as_hostname" class="text" value="<?php echo AgentStormSettingCache::get('as_hostname', 'http://'); ?>" />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('API Key'); ?>:</label><br />
                        <span class="small"><?php echo _('Your API Key can be found under the Integration section of your StormRETS homepage.'); ?></span><br />
                        <input type="text" name="as_apikey" class="text" value="<?php echo AgentStormSettingCache::get('as_apikey'); ?>" />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Use SYSV Message based Shared Memory Proxy'); ?>:</label><br />
                        <span class="small"><?php echo _('If supported by your web host, runs a php shared memory process which handles keep alive connections to reduce API latency by up to 60%. If your unsure, leave this option unchecked.'); ?></span><br />
                        <?php if (function_exists('msg_get_queue')): ?>
                            <input type="checkbox" name="as_pipelining" value="1" <?php if (AgentStormSettingCache::get('as_pipelining', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('WARNING: Experimental Feature'); ?></span><br />
                        <?php else: ?>
                            <input type="checkbox" name="as_pipelining" value="0" disabled="disabled" /> <span class="small" style="color:#DD0000;"><?php echo _('Not Supported by your Web Host'); ?></span><br />
                        <?php endif; ?>
                    </div>
                    <div class="agentstorm-input">
                        <input name="as_settings_save" class="button-secondary" value="<?php echo _('Save Changes'); ?>" type="submit" />
                    </div>
                </form>
            </div>
            <div id="tabs-2" class="ui-tabs-hide" style="position:relative;">
                <div class="agentstom-msgbox ui-state-highlight ui-corners-msgbox" style="margin-top: 10px; padding: 0 .7em;"> 
                    <p class="text-base <?php if (!empty($_POST) && isset($_POST['as_contact_save'])): ?>ui-helper-hidden<?php endif; ?>">
                        <span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Information'); ?></strong><br />
                        <?php echo _('Keep track of vistors that request more information via property listings and the StormRETS Sidebar Widget.'); ?>
                    </p>
                    <?php if (!empty($_POST) && isset($_POST['as_contact_save'])): ?>
                    <p class="text-temp">
                        <span class="ui-icon ui-icon-check" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Save Successful'); ?></strong><br />
                        <?php echo _('Your changes have been saved successfully'); ?>
                    </p>
                    <?php endif; ?>
                </div>
                <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>#tabs-2" method="POST">
                    <div class="agentstorm-input">
                        <label><?php echo _('Hook Login'); ?>:</label><br />
                        <span class="small"><?php echo _('Hook Login/Registration into my StormRETS contacts.'); ?></span><br />
                        <ul class="multi-selector">
                            <li class="client_status"><a href="#" class="grey <?php if (!AgentStormSettingCache::get('as_contact_loginhook', false)): ?>selected<?php endif; ?>" rel="0">Off</a></li>
                            <li class="client_status"><a href="#" class="green <?php if (AgentStormSettingCache::get('as_contact_loginhook', false)): ?>selected<?php endif; ?>" rel="1">On</a></li>
                        </ul>
                        <input type="hidden" name="as_contact_loginhook" <?php if (AgentStormSettingCache::get('as_contact_loginhook') == true): ?>value="1"<?php endif; ?> />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Email Notification'); ?>:</label><br />
                        <span class="small"><?php echo _('Send a notification via email to this Wordpress sites administrator when a new prospect is received via the contact form.'); ?></span><br />
                        <ul class="multi-selector">
                            <li class="client_status"><a href="#" class="grey <?php if (!AgentStormSettingCache::get('as_contact_emailnotification', false)): ?>selected<?php endif; ?>" rel="0">Off</a></li>
                            <li class="client_status"><a href="#" class="green <?php if (AgentStormSettingCache::get('as_contact_emailnotification', false)): ?>selected<?php endif; ?>" rel="1">On</a></li>
                        </ul>
                        <input type="hidden" name="as_contact_emailnotification" <?php if (AgentStormSettingCache::get('as_contact_emailnotification') == true): ?>value="1"<?php endif; ?> />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Email Notification on Prospect Login'); ?>:</label><br />
                        <span class="small"><?php echo _('Send a notification via email to this Wordpress sites administrator when a prospect signs in.'); ?></span><br />
                        <ul class="multi-selector">
                            <li class="client_status"><a href="#" class="grey <?php if (!AgentStormSettingCache::get('as_contact_emaillogin', false)): ?>selected<?php endif; ?>" rel="0">Off</a></li>
                            <li class="client_status"><a href="#" class="green <?php if (AgentStormSettingCache::get('as_contact_emaillogin', false)): ?>selected<?php endif; ?>" rel="1">On</a></li>
                        </ul>
                        <input type="hidden" name="as_contact_emaillogin" <?php if (AgentStormSettingCache::get('as_contact_emaillogin') == true): ?>value="1"<?php endif; ?> />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Email Notification of Prospect Register'); ?>:</label><br />
                        <span class="small"><?php echo _('Send a notification via email to this Wordpress sites administrator when a prospect registers.'); ?></span><br />
                        <ul class="multi-selector">
                            <li class="client_status"><a href="#" class="grey <?php if (!AgentStormSettingCache::get('as_contact_emailregister', false)): ?>selected<?php endif; ?>" rel="0">Off</a></li>
                            <li class="client_status"><a href="#" class="green <?php if (AgentStormSettingCache::get('as_contact_emailregister', false)): ?>selected<?php endif; ?>" rel="1">On</a></li>
                        </ul>
                        <input type="hidden" name="as_contact_emailregister" <?php if (AgentStormSettingCache::get('as_contact_emailregister') == true): ?>value="1"<?php endif; ?> />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Contact Source'); ?>:</label><br />
                        <span class="small"><?php echo _('Set the Source that will be logged with new prospects allowing you to track where your leads are coming from.'); ?></span><br />
                        <input type="text" name="as_contact_source" class="text" value="<?php echo AgentStormSettingCache::get('as_contact_source'); ?>" />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Login Box Header'); ?>:</label><br />
                        <span class="small"><?php echo _('Text or HTML to be displayed above as a header in the Login Lightbox'); ?></span><br />
                        <textarea name="as_contact_lightbox_header" style="width:550px;"><?php echo AgentStormSettingCache::get('as_contact_lightbox_header'); ?></textarea>
                    </div>
                    <div class="agentstorm-input">
                        <input name="as_contact_save" class="button-secondary" value="<?php echo _('Save Changes'); ?>" type="submit" />
                    </div>
                </form>
            </div>
            <div id="tabs-3" class="ui-tabs-hide">
                <div class="agentstom-msgbox ui-state-highlight ui-corners-msgbox" style="margin-top: 10px; padding: 0 .7em;"> 
                    <p class="text-base <?php if (!empty($_POST) && (isset($_POST['as_idx_save']) || isset($_POST['as_install_templates']))): ?>ui-helper-hidden<?php endif; ?>">
                        <span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Information'); ?></strong><br />
                        <?php echo _('Configure how IDX data is displayed on your web site. Property Listings use SEO URLs to give your site a boost in Domain Authority and the number of indexed pages.'); ?>
                    </p>
                    <?php if (!empty($_POST) && isset($_POST['as_idx_save'])): ?>
                    <p class="text-temp">
                        <span class="ui-icon ui-icon-check" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Save Successful'); ?></strong><br />
                        <?php echo _('Your changes have been saved successfully'); ?>
                    </p>
                    <?php endif; ?>
                    <?php if (!empty($_POST) && isset($_POST['as_install_templates'])): ?>
                    <p class="text-temp">
                        <span class="ui-icon ui-icon-check" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Templates have been Installed'); ?></strong><br />
                        <?php echo _('StormRETS templates have been installed into your active theme directory.'); ?> <?php echo _('You can edit these templates and customize their design and your changes WILL NOT be overwritten on plugin upgrades.'); ?>
                    </p>
                    <?php endif; ?>
                </div>
                <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>#tabs-3" method="POST">
                    <div class="agentstorm-input">
                        <label><?php echo _('Custom Templates'); ?>:</label><br />
                        <span class="small"><?php echo _('If you want to fully customize the results and listings pages choose the correct template from your Template Directory.'); ?> <?php echo _('If you want to use the default templates included with Agent Storm set these options to page.php.'); ?> <?php echo _('For detailed information on creating custom pages see the Custom Templates article on the Agent Storm support site.'); ?></span><br />
                        <div style="margin-top:0.5em;">
                            
                            <select name="as_idx_template_result">
                                <?php $d = @dir(TEMPLATEPATH); ?>
                                <?php while(false !== ($entry = $d->read())): ?>
                                    <?php if($entry != "." && $entry != ".."): ?>
                                        <option value="<?php echo $entry; ?>" <?php if (AgentStormSettingCache::get('as_idx_template_result') == $entry): ?>selected="selected"<?php endif; ?>><?php echo $entry; ?></option>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </select>
                            <span class="small"><?php echo _('Results Pages'); ?></span><br />
                            
                            <select name="as_idx_template_property">
                                <?php $d = @dir(TEMPLATEPATH); ?>
                                <?php while(false !== ($entry = $d->read())): ?>
                                    <?php if($entry != "." && $entry != ".."): ?>
                                        <option value="<?php echo $entry; ?>" <?php if (AgentStormSettingCache::get('as_idx_template_property') == $entry): ?>selected="selected"<?php endif; ?>><?php echo $entry; ?></option>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </select>
                            <span class="small"><?php echo _('Property Detail Pages'); ?></span><br />
                            
                            <select name="as_idx_template_noresults">
                                <?php $d = @dir(TEMPLATEPATH); ?>
                                <?php while(false !== ($entry = $d->read())): ?>
                                    <?php if($entry != "." && $entry != ".."): ?>
                                        <option value="<?php echo $entry; ?>" <?php if (AgentStormSettingCache::get('as_idx_template_noresults') == $entry): ?>selected="selected"<?php endif; ?>><?php echo $entry; ?></option>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </select>
                            <span class="small"><?php echo _('No Results Pages'); ?></span><br />
                            
                        </div>
                    </div>
                    <div class="agentstorm-input">
                        <input name="as_install_templates" class="button-secondary" value="<?php echo _('Install Default Templates In Theme Directory'); ?>" type="submit" />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Display Page Title'); ?>:</label><br />
                        <span class="small"><?php echo _('Set Off here if your seeing two page titles'); ?></span><br />
                        <ul class="multi-selector">
                            <li class="client_status"><a href="#" class="grey <?php if (!AgentStormSettingCache::get('as_page_title', true)): ?>selected<?php endif; ?>" rel="0">Off</a></li>
                            <li class="client_status"><a href="#" class="green <?php if (AgentStormSettingCache::get('as_page_title', true)): ?>selected<?php endif; ?>" rel="1">On</a></li>
                        </ul>
                        <input type="hidden" name="as_page_title" <?php if (AgentStormSettingCache::get('as_page_title', true) == true): ?>value="1"<?php endif; ?> />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Require Registration/Login to Search'); ?>:</label><br />
                        <span class="small"><?php echo _('Force the User to Register/Login to perform searches'); ?></span><br />
                        <ul class="multi-selector">
                            <li class="client_status"><a href="#" class="grey <?php if (!AgentStormSettingCache::get('as_force_login', false)): ?>selected<?php endif; ?>" rel="0">Off</a></li>
                            <li class="client_status"><a href="#" class="green <?php if (AgentStormSettingCache::get('as_force_login', false)): ?>selected<?php endif; ?>" rel="1">On</a></li>
                        </ul>
                        <input type="hidden" name="as_force_login" <?php if (AgentStormSettingCache::get('as_force_login') == true): ?>value="1"<?php endif; ?> />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Request a Showing Button'); ?>:</label><br />
                        <span class="small"><?php echo _('Display a Request a Showing button on results pages'); ?></span><br />
                        <ul class="multi-selector">
                            <li class="client_status"><a href="#" class="grey <?php if (!AgentStormSettingCache::get('as_requestshowing_button', false)): ?>selected<?php endif; ?>" rel="0">Off</a></li>
                            <li class="client_status"><a href="#" class="green <?php if (AgentStormSettingCache::get('as_requestshowing_button', false)): ?>selected<?php endif; ?>" rel="1">On</a></li>
                        </ul>
                        <input type="hidden" name="as_requestshowing_button" <?php if (AgentStormSettingCache::get('as_requestshowing_button') == true): ?>value="1"<?php endif; ?> />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Request a Showing Link'); ?>:</label><br />
                        <span class="small"><?php echo _('Enter the link to send visitors if they click on te request a showing button'); ?></span><br />
                        <input type="text" name="as_requestshowing_link" class="text" value="<?php echo AgentStormSettingCache::get('as_requestshowing_link', ''); ?>" />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Show School Information'); ?>:</label><br />
                        <span class="small"><?php echo _('Show the School District, Elementary School, Middle School and High School as provided by the MLS.'); ?></span><br />
                        <ul class="multi-selector">
                            <li class="client_status"><a href="#" class="grey <?php if (!AgentStormSettingCache::get('as_idx_schools', false)): ?>selected<?php endif; ?>" rel="0">Off</a></li>
                            <li class="client_status"><a href="#" class="green <?php if (AgentStormSettingCache::get('as_idx_schools', false) == "1"): ?>selected<?php endif; ?>" rel="1">Top</a></li>
                            <li class="client_status"><a href="#" class="green <?php if (AgentStormSettingCache::get('as_idx_schools', false) == "2"): ?>selected<?php endif; ?>" rel="2">Bottom</a></li>
                        </ul>
                        <input type="hidden" name="as_idx_schools" <?php if (AgentStormSettingCache::get('as_idx_schools') == true): ?>value="1"<?php endif; ?> />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Address Punctuation'); ?>:</label><br />
                        <span class="small"><?php echo _('Format the Address with Punctuation'); ?></span><br />
                        <ul class="multi-selector">
                            <li class="client_status"><a href="#" class="grey <?php if (!AgentStormSettingCache::get('as_idx_punctuation', false)): ?>selected<?php endif; ?>" rel="0">Off</a></li>
                            <li class="client_status"><a href="#" class="green <?php if (AgentStormSettingCache::get('as_idx_punctuation', false) == "1"): ?>selected<?php endif; ?>" rel="1">On</a></li>
                        </ul>
                        <input type="hidden" name="as_idx_punctuation" <?php if (AgentStormSettingCache::get('as_idx_punctuation') == true): ?>value="1"<?php endif; ?> />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Link State'); ?>:</label><br />
                        <span class="small"><?php echo _('Hyperlink All "State" links to the SEO State URL'); ?></span><br />
                        <ul class="multi-selector">
                            <li class="client_status"><a href="#" class="grey <?php if (!AgentStormSettingCache::get('as_idx_linkstate', false)): ?>selected<?php endif; ?>" rel="0">Off</a></li>
                            <li class="client_status"><a href="#" class="green <?php if (AgentStormSettingCache::get('as_idx_linkstate', false) == "1"): ?>selected<?php endif; ?>" rel="1">On</a></li>
                        </ul>
                        <input type="hidden" name="as_idx_linkstate" <?php if (AgentStormSettingCache::get('as_idx_linkstate') == true): ?>value="1"<?php endif; ?> />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Show Google Map'); ?>:</label><br />
                        <span class="small"><?php echo _('Show a Google map on the property result screen.'); ?></span><br />
                        <ul class="multi-selector">
                            <li class="client_status"><a href="#" class="grey <?php if (!AgentStormSettingCache::get('as_idx_gmap', false)): ?>selected<?php endif; ?>" rel="0">Off</a></li>
                            <li class="client_status"><a href="#" class="green <?php if (AgentStormSettingCache::get('as_idx_gmap', false)): ?>selected<?php endif; ?>" rel="1">On</a></li>
                        </ul>
                        <input type="hidden" name="as_idx_gmap" <?php if (AgentStormSettingCache::get('as_idx_gmap') == true): ?>value="1"<?php endif; ?> />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Show Bing Birds Eye View'); ?>:</label><br />
                        <span class="small"><?php echo _('Show a Bing Bird Eye on the property result screen.'); ?></span><br />
                        <ul class="multi-selector">
                            <li class="client_status"><a href="#" class="grey <?php if (!AgentStormSettingCache::get('as_idx_bview', false)): ?>selected<?php endif; ?>" rel="0">Off</a></li>
                            <li class="client_status"><a href="#" class="green <?php if (AgentStormSettingCache::get('as_idx_bview', false)): ?>selected<?php endif; ?>" rel="1">On</a></li>
                        </ul>
                        <input type="hidden" name="as_idx_bview" <?php if (AgentStormSettingCache::get('as_idx_bview') == true): ?>value="1"<?php endif; ?> />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Walkscore API Key'); ?>:</label><br />
                        <span class="small"><?php echo _('Enter your Walkscore API Key to display a Walkscore on your listing pages.'); ?></span><br />
                        <input type="text" name="as_idx_walkscore" class="text" value="<?php echo AgentStormSettingCache::get('as_idx_walkscore'); ?>" />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Search Page Prefix Text'); ?>:</label><br />
                        <span class="small"><?php echo _('Shows text before the property search page'); ?></span><br />
                        <textarea name="as_idx_searchtxt" style="width:600px;"><?php echo AgentStormSettingCache::get('as_idx_searchtxt'); ?></textarea>
                    </div>
                    <div class="agentstorm-input">
                        <input name="as_idx_save" class="button-secondary" value="<?php echo _('Save Changes'); ?>" type="submit" />
                    </div>
                </form>
            </div>
            <div id="tabs-4" class="ui-tabs-hide">
                <div class="agentstom-msgbox ui-state-highlight ui-corners-msgbox" style="margin-top: 10px; padding: 0 .7em;"> 
                    <p class="text-base <?php if (!empty($_POST) && isset($_POST['as_idx_settings_save'])): ?>ui-helper-hidden<?php endif; ?>">
                        <span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Information'); ?></strong><br />
                        <?php echo _('Configure what IDX data is displayed on your web site. Choose to display all properties in your StormRETS account or a subset of data using Tags.'); ?>
                    </p>
                    <?php if (!empty($_POST) && isset($_POST['as_idx_settings_save'])): ?>
                    <p class="text-temp">
                        <span class="ui-icon ui-icon-check" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Save Successful'); ?></strong><br />
                        <?php echo _('Your changes have been saved successfully'); ?>
                    </p>
                    <?php endif; ?>
                </div>
                <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>#tabs-4" method="POST">
                    <div class="agentstorm-input">
                        <label><?php echo _('Searchable Property Classes'); ?>:</label><br />
                        <span class="small"><?php echo _('Define which property classes can be searched from your site.'); ?></span><br />
                        <div style="overflow:hidden;">
                            <div style="width:25%;float:left;">
                                <input type="checkbox" name="as_idx_settings_classes_res" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_classes_res', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Residential'); ?></span><br />
                                <input type="checkbox" name="as_idx_settings_classes_com" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_classes_com', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Commercial'); ?></span><br />
                                <input type="checkbox" name="as_idx_settings_classes_lnd" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_classes_lnd', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Land'); ?></span><br />
                                <input type="checkbox" name="as_idx_settings_classes_mob" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_classes_mob', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Mobile'); ?></span><br />
                            </div>
                            <div style="width:25%;float:left;">
                                <input type="checkbox" name="as_idx_settings_classes_mfh" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_classes_mfh', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Multi Family Home'); ?></span><br />
                                <input type="checkbox" name="as_idx_settings_classes_rnt" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_classes_rnt', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Rental'); ?></span><br />
                                <input type="checkbox" name="as_idx_settings_classes_con" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_classes_con', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Condominiums'); ?></span><br />
                            </div>
                        </div>
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Searchable Property Fields'); ?>:</label><br />
                        <span class="small"><?php echo _('Define which property fields are displayed on the Search Forms.'); ?></span><br />
                        <div style="overflow:hidden;">
                            <div style="width:25%;float:left;">
                                <input type="checkbox" name="as_idx_settings_field_type" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_field_type', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Property Type'); ?></span><br />
                                <input type="checkbox" name="as_idx_settings_field_suburbzip" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_field_suburbzip', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Suburb/Zip Code'); ?></span><br />
                                <input type="checkbox" name="as_idx_settings_field_subdivision" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_field_subdivision', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Sub Division'); ?></span><br />
                                <input type="checkbox" name="as_idx_settings_field_price" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_field_price', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Price Range'); ?></span><br />
                                <input type="checkbox" name="as_idx_settings_field_bedrooms" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_field_bedrooms', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Bedrooms'); ?></span><br />
                            </div>
                            <div style="width:25%;float:left;">
                                <input type="checkbox" name="as_idx_settings_field_bathrooms" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_field_bathrooms', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Bathrooms'); ?></span><br />
                                <input type="checkbox" name="as_idx_settings_field_lotsize" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_field_lotsize', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Lot Size'); ?></span><br />
                                <input type="checkbox" name="as_idx_settings_field_size" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_field_size', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Size'); ?></span><br />
                                <input type="checkbox" name="as_idx_settings_field_shortsale" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_field_shortsale', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Short Sales'); ?></span><br />
                                <input type="checkbox" name="as_idx_settings_field_foreclosure" value="1" <?php if (AgentStormSettingCache::get('as_idx_settings_field_foreclosure', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Foreclosure'); ?></span><br />
                            </div>
                        </div>
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Results Per Page'); ?>:</label><br />
                        <span class="small"><?php echo _('Sets how many property results are displayed per page'); ?>.</span><br />
                        <select name="as_idx_settings_pagelimit">
                            <option value="10" <?php if (AgentStormSettingCache::get('as_idx_settings_pagelimit') == '10'): ?>selected="selected"<?php endif; ?>>10</option>
                            <option value="25" <?php if (AgentStormSettingCache::get('as_idx_settings_pagelimit') == '25'): ?>selected="selected"<?php endif; ?>>25</option>
                            <option value="50" <?php if (AgentStormSettingCache::get('as_idx_settings_pagelimit') == '50'): ?>selected="selected"<?php endif; ?>>50</option>
                            <option value="100" <?php if (AgentStormSettingCache::get('as_idx_settings_pagelimit') == '100'): ?>selected="selected"<?php endif; ?>>100</option>
                        </select>
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Show only Properties assigned the following Tag'); ?>:</label><br />
                        <span class="small"><?php echo _('Shows only properties which have been assigned the following tag during import'); ?></span><br />
                        <select name="as_idx_settings_tag">
                            <option value=""><?php echo _('All'); ?></option>
                            <?php foreach(AgentStormSettingCache::get('as_tags') as $tag): ?>
                                <option value="<?php echo $tag->Name; ?>" <?php if (AgentStormSettingCache::get('as_idx_settings_tag') == $tag->Name): ?>selected="selected"<?php endif; ?>><?php echo strtoupper($tag->Name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="agentstorm-input">
                        <input name="as_idx_settings_save" class="button-secondary" value="<?php echo _('Save Changes'); ?>" type="submit" />
                    </div>
                </form>
            </div>
            <div id="tabs-5" class="ui-tabs-hide">
                <div class="agentstom-msgbox ui-state-highlight ui-corners-msgbox" style="margin-top: 10px; padding: 0 .7em;"> 
                    <p class="text-base <?php if (!empty($_POST) && isset($_POST['as_idx_agent_save'])): ?>ui-helper-hidden<?php endif; ?>">
                        <span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Information'); ?></strong><br />
                        <?php echo _('The information below will be placed on every listing as a point of contact. Note: The listing agent will still be shown in the Broker Reciprocity section.'); ?>
                    </p>
                    <?php if (!empty($_POST) && isset($_POST['as_idx_agent_save'])): ?>
                    <p class="text-temp">
                        <span class="ui-icon ui-icon-check" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Save Successful'); ?></strong><br />
                        <?php echo _('Your changes have been saved successfully'); ?>
                    </p>
                    <?php endif; ?>
                </div>
                <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>#tabs-5" method="POST">
                    <div class="agentstorm-input">
                        <label><?php echo _('Agent Name'); ?></label><br />
                        <span class="small"><?php echo _('The name of the REALTOR who owns this web site.'); ?></span><br />
                        <input type="text" class="text" name="as_idx_agent_name" value="<?php echo AgentStormSettingCache::get('as_idx_agent_name', ''); ?>" />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Agent Telephone'); ?></label><br />
                        <span class="small"><?php echo _('The contact telephone number of the REALTOR who owns this web site.'); ?></span><br />
                        <input type="text" class="text" name="as_idx_agent_phone" value="<?php echo AgentStormSettingCache::get('as_idx_agent_phone', ''); ?>" />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Agent Email'); ?></label><br />
                        <span class="small"><?php echo _('The contact email address of the REALTOR who owns this web site.'); ?></span><br />
                        <input type="text" class="text" name="as_idx_agent_email" value="<?php echo AgentStormSettingCache::get('as_idx_agent_email', ''); ?>" />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Agent Additional Info'); ?></label><br />
                        <span class="small"><?php echo _('Additional information to include in the Contact Box such as State License Numbers etc.'); ?></span><br />
                        <textarea name="as_idx_agent_extra" class="text" style="height:100px;" /><?php echo AgentStormSettingCache::get('as_idx_agent_extra', ''); ?></textarea>	
                    </div>
                    <div class="agentstorm-input">
                        <input name="as_idx_agent_save" class="button-secondary" value="<?php echo _('Save Changes'); ?>" type="submit" />
                    </div>
                </form>
            </div>
            <div id="tabs-6" style="overflow:hidden; position:relative; padding: 0; padding-left:210px;">
                <div style="width:200px; height:550px; float:left; top:0; left:0; position:absolute;">
                    <div id="metadata-accordion">
                        <?php if (AgentStormSettingCache::get('as_metadata')): ?>
                            <?php foreach (AgentStormSettingCache::get('as_metadata') as $metadata): ?>
                                <h3 original-title="<?php echo $metadata->id; ?>"><a href="#"><?php echo $metadata->name; ?></a></h3>
                                <div style="background-color:#EEE;">
                                    <h5><?php echo _('Available Fields'); ?></h5>
                                    <ul id="sortable_<?php echo $metadata->id; ?>" class="sortable connectedSortable_<?php echo $metadata->id; ?>">
                                        <?php
                                            usort($metadata->Fields, "agentstorm_metadatasort");
                                            usort($metadata->DynamicFields, "agentstorm_metadatasort");
                                        ?>
                                        <?php foreach ($metadata->Fields as $field): ?>
                                            <li id="<?php echo $metadata->id; ?>_<?php echo $field->Name; ?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><p style="margin:0;"><strong><?php echo $field->Name; ?></strong><p class="field small" style="margin:0;" class="small">Field Label: <input type="text" value="<?php echo AgentStormSettingCache::get('as_fields_' . $metadata->id . '_' . $field->Name); ?>" /></p></li>
                                        <?php endforeach; ?>
                                        <?php foreach ($metadata->DynamicFields as $field): ?>
                                            <li id="<?php echo $metadata->id; ?>_dynamic_<?php echo $field->Name; ?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><p style="margin:0;"><strong><?php echo $field->Name; ?></strong><p class="field small" style="margin:0;" class="small">Field Label: <input type="text" value="<?php echo AgentStormSettingCache::get('as_fields_' . $metadata->id . '_dynamic_' . $field->Name); ?>" /></p></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div style="width:100%; height:550px; float:left; overflow-x: hidden; overflow-y: auto;">
                    <?php $first = true; ?>
                    <?php if (AgentStormSettingCache::get('as_metadata')): ?>
                        <?php foreach (AgentStormSettingCache::get('as_metadata') as $metadata): ?>
                            <div id="editor_<?php echo $metadata->id; ?>" style="padding-right: 10px; <?php if (!$first): ?>display: none;<?php endif; ?>">
                                <div class="agentstom-msgbox ui-state-highlight ui-corners-msgbox" style="margin-top: 10px; padding: 0 .7em;"> 
                                    <p class="text-base">
                                        <span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Drag and Drop the fields from the available fields on the left into the locations below where you would like the field displayed. Remember to click "Save Fields" to save your changes'); ?></strong><br />
                                    </p>
                                </div>
                                <h3><?php echo $metadata->name; ?></h3>
                                <h5><?php echo _('Result Header'); ?></h5>
                                <div>
                                    <ul id="sortable_<?php echo $metadata->id; ?>_header" class="sortable connectedSortable_<?php echo $metadata->id; ?>">
                                    </ul>
                                </div>
                                <h5><?php echo _('Property Header'); ?></h5>
                                <div>
                                    <ul id="sortable_<?php echo $metadata->id; ?>_property" class="sortable connectedSortable_<?php echo $metadata->id; ?>">
                                    </ul>
                                </div>
                                <h5><?php echo _('Features'); ?></h5>
                                <div>
                                    <ul id="sortable_<?php echo $metadata->id; ?>_features" class="sortable connectedSortable_<?php echo $metadata->id; ?>">
                                    </ul>
                                </div>
                                <div class="agentstorm-input">
                                    <input id="sortable_<?php echo $metadata->id; ?>_button_bottom" class="button-secondary" value="<?php echo _('Save Fields'); ?>" type="submit" />
                                    <span id="sortable_<?php echo $metadata->id; ?>_message" class="small ui-helper-hidden">Saved</span>
                                </div>
                            </div>
                            <?php $first = false; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div id="tabs-7" class="ui-tabs-hide">
                <div class="agentstom-msgbox ui-state-highlight ui-corners-msgbox" style="margin-top: 10px; padding: 0 .7em;"> 
                    <p class="text-base <?php if (!empty($_POST) && isset($_POST['as_idx_permalinks_save'])): ?>ui-helper-hidden<?php endif; ?>">
                        <span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Information'); ?></strong><br />
                        <?php echo _('Permalinks change how the SEO URLS are configured and displayed.'); ?> <strong><?php echo _('WARNING: Changing the URL structure on a matured web site will result in 404 Not Found errors being returned to search engines and you will have to wait for you site to be reindexed.'); ?></strong>
                    </p>
                    <?php if (!empty($_POST) && isset($_POST['as_idx_permalinks_save'])): ?>
                    <p class="text-temp">
                        <span class="ui-icon ui-icon-check" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Save Successful'); ?></strong><br />
                        <?php echo _('Your changes have been saved successfully'); ?>
                    </p>
                    <?php endif; ?>
                </div>
                <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>#tabs-7" method="POST">
                    <div class="agentstorm-input">
                        <label><?php echo _('Property Search URL'); ?>:</label><br />
                        <span class="small"><?php echo _('Define a fixed url used as the Search Page'); ?></span><br />
                        <input type="text" name="as_idx_searchprefix" class="text" value="<?php echo (AgentStormSettingCache::get('as_idx_searchprefix')) ? AgentStormSettingCache::get('as_idx_searchprefix') : 'property-search/'; ?>" />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('State URL'); ?>:</label><br />
                        <span class="small"><?php echo _('Build the URL structure used for displaying listings by State.'); ?> <?php echo _('You may use the following dynamic keywords in your URLs:'); ?> %state%</span><br />
                        <input type="text" name="as_idx_stateurlprefix" class="text" value="<?php echo (AgentStormSettingCache::get('as_idx_stateurlprefix')) ? AgentStormSettingCache::get('as_idx_stateurlprefix') : 'property/%state%'; ?>" />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('City URL'); ?>:</label><br />
                        <span class="small"><?php echo _('Build the URL structure used for displaying listings by State.'); ?> <?php echo _('You may use the following dynamic keywords in your URLs:'); ?> %state% and %city%</span><br />
                        <input type="text" name="as_idx_cityurlprefix" class="text" value="<?php echo (AgentStormSettingCache::get('as_idx_cityurlprefix')) ? AgentStormSettingCache::get('as_idx_cityurlprefix') : 'property/%state%/%city%'; ?>" />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Property URL'); ?>:</label><br />
                        <span class="small"><?php echo _('Build the URL structure used for displaying properties.'); ?> <?php echo _('You may use the following dynamic keywords in your URLs:'); ?> %state% %city% %id% %listing_id% %subdivision% %full_address%</span><br />
                        <input type="text" name="as_idx_propertyprefix" class="text" value="<?php echo (AgentStormSettingCache::get('as_idx_propertyprefix')) ? AgentStormSettingCache::get('as_idx_propertyprefix') : 'property'; ?>" style="letter-spacing: +1px;" />
                    </div>
                    <div class="agentstorm-input">
                        <input name="as_idx_permalinks_save" class="button-secondary" value="<?php echo _('Save Changes'); ?>" type="submit" />
                    </div>
                </form>
            </div>
            <div id="tabs-8" class="ui-tabs-hide">
                <div class="agentstom-msgbox ui-state-highlight ui-corners-msgbox" style="margin-top: 10px; padding: 0 .7em;"> 
                    <p class="text-base <?php if (!empty($_POST) && isset($_POST['as_idx_mapsearch_save'])): ?>ui-helper-hidden<?php endif; ?>">
                        <span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Information'); ?></strong><br />
                        <?php echo _('Configure how the Map Search is displayed.'); ?></strong>
                    </p>
                    <?php if (!empty($_POST) && isset($_POST['as_idx_mapsearch_save'])): ?>
                    <p class="text-temp">
                        <span class="ui-icon ui-icon-check" style="float: left; margin-right: .3em;"></span><strong><?php echo _('Save Successful'); ?></strong><br />
                        <?php echo _('Your changes have been saved successfully'); ?>
                    </p>
                    <?php endif; ?>
                </div>
                <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>#tabs-8" method="POST">
                    <div class="agentstorm-input">
                        <label><?php echo _('Map Width'); ?>:</label><br />
                        <span class="small"><?php echo _('Define the Width of the Map in pixels or 100% for full width'); ?></span><br />
                        <input type="text" name="as_map_width" class="text" value="<?php echo (AgentStormSettingCache::get('as_map_width')) ? AgentStormSettingCache::get('as_map_width') : '100%'; ?>" />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Map Height'); ?>:</label><br />
                        <span class="small"><?php echo _('Define the Height of the Map in pixels'); ?></span><br />
                        <input type="text" name="as_map_height" class="text" value="<?php echo (AgentStormSettingCache::get('as_map_height')) ? AgentStormSettingCache::get('as_map_height') : '350px'; ?>" />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Map Provider'); ?>:</label><br />
                        <span class="small"><?php echo _('Choose your Map Provider'); ?></span><br />
                        <select name="as_map_provider">
                            <option value="agentstorm" <?php if (AgentStormSettingCache::get('as_map_provider') == 'agentstorm'): ?>selected="selected"<?php endif; ?>>StormRETS Maps</option>
                            <option value="google" <?php if (AgentStormSettingCache::get('as_map_provider') == 'google'): ?>selected="selected"<?php endif; ?>>Google Maps</option>
                            <option value="bing" <?php if (AgentStormSettingCache::get('as_map_provider') == 'bing'): ?>selected="selected"<?php endif; ?>>Bing Maps</option>
                            <option value="yahoo" <?php if (AgentStormSettingCache::get('as_map_provider') == 'yahoo'): ?>selected="selected"<?php endif; ?>>Yahoo Maps</option>
                            <option value="cloudmade" <?php if (AgentStormSettingCache::get('as_map_provider') == 'cloudmade'): ?>selected="selected"<?php endif; ?>>Cloud Made</option>
                            <option value="openstreetmap" <?php if (AgentStormSettingCache::get('as_map_provider') == 'openstreetmap'): ?>selected="selected"<?php endif; ?>>Open Street Map</option>
                        </select>
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Map Center Latitude/Longitude'); ?>:</label><br />
                        <span class="small"><?php echo _('Set the Latitude/Longitude for the center point of the map'); ?></span><br />
                        <input type="text" name="as_map_lat" class="text" value="<?php echo (AgentStormSettingCache::get('as_map_lat')) ? AgentStormSettingCache::get('as_map_lat') : '38'; ?>" style="width:100px;" />
                        <input type="text" name="as_map_lng" class="text" value="<?php echo (AgentStormSettingCache::get('as_map_lng')) ? AgentStormSettingCache::get('as_map_lng') : '-97'; ?>" style="width:100px;" />
                    </div>
                    <div class="agentstorm-input">
                        <label><?php echo _('Map Zoom'); ?>:</label><br />
                        <span class="small"><?php echo _('Set the default Zoom level of the map'); ?></span><br />
                        <input type="text" name="as_map_zoom" class="text" value="<?php echo (AgentStormSettingCache::get('as_map_zoom')) ? AgentStormSettingCache::get('as_map_zoom') : '4'; ?>" style="width:210px;" />
                    </div>
                    <div class="agentstorm-input">
                        <input name="as_idx_mapsearch_save" class="button-secondary" value="<?php echo _('Save Map Search Settings'); ?>" type="submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

<style type="text/css">
H3 { margin: 0; margin: 0.5em 0; }
H5 { margin: 0; margin: 0.5em 5px 0 5px; }
.ui-accordion .ui-accordion-content { padding: 0 !important;}
.sortable li, .ui-sortable-helper { min-height: 20px; list-style: none; position:relative; margin: 0 0 2px 0; padding: 0.2em; padding-left: 1.5em; height: auto; font-size: 12px; cursor:pointer; background: #DDD; border: 1px solid #CCC;}
.sortable li span, .ui-sortable-helper span { position: absolute; margin-left: -1.3em; }
.sortable li input, .ui-sortable-helper input { font-size:9px; padding:1px; outline:none; width:200px; }
.sortable { background: #eee; padding: 5px; }
#metadata-accordion .field, .ui-sortable-helper .field { display: none; }
#metadata-accordion li { height: auto; }
</style>

<script type="text/javascript">
	jQuery(document).ready(function($) {
        
        function setupAccordion(event, ui) {
            jQuery("#metadata-accordion").removeClass('ui-corner-all');
            jQuery("#metadata-accordion H3").removeClass('ui-corner-top');
            jQuery("#metadata-accordion H3").removeClass('ui-corner-all');
            jQuery("#metadata-accordion DIV").removeClass('ui-corner-bottom');
            if (ui) {
                jQuery("#editor_" + ui.newHeader.attr("original-title")).show();
                jQuery("#editor_" + ui.oldHeader.attr("original-title")).hide();
            }
        }
        
        function setupAccordionEnd() {
            if (jQuery("#metadata-accordion > :last").is(':visible')) {
                jQuery("#metadata-accordion > :last").prev().removeClass('ui-corner-bl');
                jQuery("#metadata-accordion > :last").addClass('ui-corner-bl');
            } else {
                jQuery("#metadata-accordion > :last").prev().addClass('ui-corner-bl');
                jQuery("#metadata-accordion > :last").removeClass('ui-corner-bl');
            }
        }
        
        jQuery("#metadata-accordion").accordion({ fillSpace: true });
        jQuery("#metadata-accordion").bind('accordionchangestart', setupAccordion);
        jQuery("#metadata-accordion").bind('accordionchange', setupAccordionEnd);
        setupAccordion();
        setupAccordionEnd();
		jQuery("#agentstorm-tabs").tabs();
        jQuery("#agentstorm-tabs UL").removeClass('ui-corner-all').addClass('ui-corner-top');
        jQuery("#metadata-accordion").accordion({ fillSpace: true });
        
        function serialize(prefix, target, obj) {
            pr = prefix;
            result = {};
            result['action'] = 'agentstorm_result_layout';
            result['target'] = target;
            result[pr + '[]'] = Array();
            jQuery.each(obj.children(), function(index, element) {
                result[pr + '[]'].push(element.id.replace(pr + '_', ''));
                result[element.id] = $('INPUT', element).val();
            });
            return result;
        }
        
        <?php if (AgentStormSettingCache::get('as_metadata')): ?>
        <?php foreach(AgentStormSettingCache::get('as_metadata') as $metadata): ?>
        jQuery('#sortable_<?php echo $metadata->id; ?>_button_top, #sortable_<?php echo $metadata->id; ?>_button_bottom').bind('click', function() {
            jQuery.post(ajaxurl, serialize('<?php echo $metadata->id; ?>', 'header', $('#sortable_<?php echo $metadata->id; ?>_header')), function() {
                $('#sortable_<?php echo $metadata->id; ?>_button_message').fadeIn(1000).delay(2000).fadeOut(1000);
            });
            jQuery.post(ajaxurl, serialize('<?php echo $metadata->id; ?>', 'property', $('#sortable_<?php echo $metadata->id; ?>_property')));
            jQuery.post(ajaxurl, serialize('<?php echo $metadata->id; ?>', 'features', $('#sortable_<?php echo $metadata->id; ?>_features')));
        });
		jQuery("#sortable_<?php echo $metadata->id; ?>, #sortable_<?php echo $metadata->id; ?>_header, #sortable_<?php echo $metadata->id; ?>_property, #sortable_<?php echo $metadata->id; ?>_features").sortable({
			connectWith: '.connectedSortable_<?php echo $metadata->id; ?>',
            appendTo: 'body',
            helper: 'clone',
            placeholder: 'ui-state-highlight',
            stop: function(event, ui) {
                jQuery.post(ajaxurl, serialize('<?php echo $metadata->id; ?>', 'header', $('#sortable_<?php echo $metadata->id; ?>_header')));
                jQuery.post(ajaxurl, serialize('<?php echo $metadata->id; ?>', 'property', $('#sortable_<?php echo $metadata->id; ?>_property')));
                jQuery.post(ajaxurl, serialize('<?php echo $metadata->id; ?>', 'features', $('#sortable_<?php echo $metadata->id; ?>_features')));
            }
		}).disableSelection();
        <?php endforeach; ?>
        <?php endif; ?>
        
        <?php foreach (AgentStormSettingCache::get('as_metadata') as $metadata): ?>
        jQuery('#sortable_<?php echo $metadata->id; ?>').bind('sortremove', function(event, ui) {
            $(ui.item).clone().appendTo(event.target);
            var sortList = jQuery(this);
            var listitems = sortList.children('li').get();
            listitems.sort(function(a, b) {
               var compA = jQuery(a).text().toUpperCase();
               var compB = jQuery(b).text().toUpperCase();
               return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
            })
            $.each(listitems, function(idx, itm) { sortList.append(itm); });
        });
        jQuery('#sortable_<?php echo $metadata->id; ?>').bind('sortreceive', function(event, ui) {
            $(ui.item).remove();
        });
        <?php endforeach; ?>
        
        <?php if (AgentStormSettingCache::get('as_metadata')): ?>
        <?php foreach(AgentStormSettingCache::get('as_metadata') as $metadata): ?>
            <?php foreach (explode(',', AgentStormSettingCache::get('as_metadata_' . $metadata->id . '_header')) as $item): ?>
                <?php if (!empty($item)): ?>
		jQuery("#sortable_<?php echo $metadata->id; ?>_header").append(jQuery("#<?php echo $metadata->id; ?>_<?php echo $item; ?>").clone());
                <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach (explode(',', AgentStormSettingCache::get('as_metadata_' . $metadata->id . '_property')) as $item): ?>
                <?php if (!empty($item)): ?>
		jQuery("#sortable_<?php echo $metadata->id; ?>_property").append(jQuery("#<?php echo $metadata->id; ?>_<?php echo $item; ?>").clone());
                <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach (explode(',', AgentStormSettingCache::get('as_metadata_' . $metadata->id . '_features')) as $item): ?>
                <?php if (!empty($item)): ?>
		jQuery("#sortable_<?php echo $metadata->id; ?>_features").append(jQuery("#<?php echo $metadata->id; ?>_<?php echo $item; ?>").clone());
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
        <?php endif; ?>
        
        jQuery('.text-temp').delay(5000).fadeOut(1000, function() {
            jQuery('.text-base:hidden').fadeIn(1000);
        });
        
        jQuery('.multi-selector a').click(function(e) {
            e.preventDefault();
            $this = $(this);
            $target = $this.parent().parent().parent();
            $('input', $target).attr('value', $this.attr('rel'));
            $('.client_status a', $target).removeClass('selected');
            $this.addClass('selected');
        });
        
	});
</script>


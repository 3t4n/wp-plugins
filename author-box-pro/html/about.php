<?php
if (!defined('ABSPATH')) {
    exit;
}
$datas = get_plugin_data(MB_AUTHOR_BOX_PATH . 'author-box-pro.php', $markup = true, $translate = true);
?>
<div class="melibu-ab-about wrap about-wrap">
    <h1>
        <?php _e('Welcome to', 'author-box-pro'); ?> 
        <span style="color:#FF7F01;"><?php echo $datas['Name']; ?></span>&nbsp;v.<?php echo $datas['Version']; ?>
    </h1>
    <div class="about-text"><?php echo $datas['Description']; ?></div>
    <div class="wp-badge"><?php _e('Version', 'author-box-pro'); ?> <?php echo $datas['Version']; ?></div>
    <div class="st-melibuPlugin-area">
        <div class="st_melibuPlugin_list st_melibuPlugin_list_flip">

            <input name="st_melibuPlugin_list_item"
                   id="st_melibuPlugin_list_item_1" 
                   class="st_melibuPlugin_list_item_1" 
                   type="radio" 
                   value="1" checked="checked">
            <label for="st_melibuPlugin_list_item_1"><span><span class="dashicons dashicons-admin-home"></span> <?php _e('Welcome', 'author-box-pro'); ?></span></label>
            <input name="st_melibuPlugin_list_item" 
                   id="st_melibuPlugin_list_item_2" 
                   class="st_melibuPlugin_list_item_2" 
                   type="radio" 
                   value="2">
            <label for="st_melibuPlugin_list_item_2"><span><span class="dashicons dashicons-editor-code"></span> <?php _e('Functions', 'author-box-pro'); ?></span></label>
            <input name="st_melibuPlugin_list_item" 
                   id="st_melibuPlugin_list_item_3" 
                   class="st_melibuPlugin_list_item_3" 
                   type="radio" 
                   value="3">
            <label for="st_melibuPlugin_list_item_3"><span><span class="dashicons dashicons-sos"></span> <?php _e('Support', 'author-box-pro'); ?> </span></label>
            <input name="st_melibuPlugin_list_item" 
                   id="st_melibuPlugin_list_item_4" 
                   class="st_melibuPlugin_list_item_4" 
                   type="radio" 
                   value="4">
            <label for="st_melibuPlugin_list_item_4"><span><span class="dashicons dashicons-hammer"></span> <?php _e('Development', 'author-box-pro'); ?> </span></label>
            <input name="st_melibuPlugin_list_item" 
                   id="st_melibuPlugin_list_item_5" 
                   class="st_melibuPlugin_list_item_5" 
                   type="radio" 
                   value="5">
            <label for="st_melibuPlugin_list_item_5"><span><span class="dashicons dashicons-translation"></span> <?php _e('Translation', 'author-box-pro'); ?> </span></label>
            <input name="st_melibuPlugin_list_item" 
                   id="st_melibuPlugin_list_item_6" 
                   class="st_melibuPlugin_list_item_6" 
                   type="radio" 
                   value="6">
            <label for="st_melibuPlugin_list_item_6"><span><span class="dashicons dashicons-carrot"></span> <?php _e('Donate', 'author-box-pro'); ?> </span></label>
            <ul>
                <li class="st_melibuPlugin_list_item_1">
                    <div class="st_melibuPlugin_list_content">
                        <h3>Melabu &copy;</h3>
                        <hr />
                        <?php
                        if (is_plugin_active_for_network('plugin-directory/plugin-file.php')) {
                            echo '<b>NETWORK:</b> ACTIVE<br>';
                        } else {
                            echo '<b>NETWORK:</b> NON ACTIVE<br>';
                        }
                        
                        if ($datas) {
                            foreach ($datas as $key => $data) {
                                echo '<strong>' . $key . '</strong>: ' . $data . '<br />';
                            }
                        }
                        ?>
                        <hr />
                        <p>
                            <?php _e('More Professional', 'author-box-pro'); ?> <a href="<?php echo MAA_SSS_PLUGIN_14_MB_URL; ?>" target="_blank"><?php _e('Themes', 'author-box-pro'); ?></a> <?php _e('and ', 'author-box-pro'); ?> <a href="<?php echo MAA_SSS_PLUGIN_14_MB_URL; ?>" target="_blank"><?php _e('Plugins', 'author-box-pro'); ?></a>
                        </p>
                        <hr />
                        <div class="headline-feature feature-video" style="background-color:#191E23;">
                            <img src="<?php echo plugins_url("screenshot-1.png", dirname(__FILE__)); ?>" alt="screenshot-1" width="650" class="st-img"/>
                        </div>
                    </div>
                </li>
                <li class="st_melibuPlugin_list_item_2">
                    <div class="st_melibuPlugin_list_content">
                        <div class="under-the-hood three-col">
                            <h3><?php _e('Functions', 'author-box-pro'); ?></h3>
                            <hr />
                            <div class="col">
                                <h3><?php _e('Functionality', 'author-box-pro'); ?></h3>
                                <!--                                <ul class='st-list'>
                                                                    <li><?php // _e('Requires no 2 click buttons', 'author-box-pro');   ?></li>
                                                                </ul>-->
                            </div>
                            <div class="col"> 
                                <h3><?php _e('Options', 'author-box-pro'); ?></h3>
                                <!--                                <ul class='st-list'>
                                                                    <li><?php // _e('Choose your layout (One-Click)', 'author-box-pro');   ?></li>
                                                                </ul>-->
                            </div>
                            <div class="col"> 
                                <h3><?php _e('Extras', 'author-box-pro'); ?></h3>
                                <!--                                <ul class='st-list'>
                                                                    <li><?php // _e('Supports', 'author-box-pro');  ?></li>
                                                                </ul>-->
                            </div>
                        </div>
                    </div>
                </li>
                <li class="st_melibuPlugin_list_item_3">
                    <div class="st_melibuPlugin_list_content">
                        <h3><?php _e('Support', 'author-box-pro'); ?></h3>
                        <hr />
                        <div class="feature-section two-col">
                            <div class="col">
                                <h3><?php _e('In like please give', 'author-box-pro'); ?> <?php echo $datas['Name']; ?></h3>
                                <ul>
                                    <li><span class="dashicons dashicons-thumbs-up"></span>
                                        <a href="https://wordpress.org/support/view/plugin-reviews/<?php echo $datas['TextDomain']; ?>" target="_blank"><?php _e('WordPress Rate', 'author-box-pro'); ?></a>
                                    </li>
                                    <li><span class="dashicons dashicons-thumbs-up"></span>
                                        <a href="https://plus.google.com/u/0/b/112736162951079313360/112736162951079313360" target="_blank">Google+</a>
                                    </li>
                                    <li><span class="dashicons dashicons-thumbs-up"></span>
                                        <a href="https://www.facebook.com/melabu/" target="_blank">Facebook Like</a>
                                    </li>
<!--                                    <li><span class="dashicons dashicons-thumbs-up"></span>
                                        <a href="https://github.com/Samettarim/mb-author-box-pro" target="_blank">Github Star</a>
                                    </li>-->
                                </ul>
                            </div>
                            <div class="col">
                                <h3><?php _e('Feel free and post your question, suggestion, idea or criticism. We love it!', 'author-box-pro'); ?></h3>
                                <ul>
                                    <li><span class="dashicons dashicons-sos"></span> <?php _e('For Plugin English Support', 'author-box-pro'); ?>
                                        <a href="https://wordpress.org/support/plugin/<?php echo $datas['TextDomain']; ?>" target="_blank"><?php _e('Support EN', 'author-box-pro'); ?></a>
                                    </li>
                                    <li><span class="dashicons dashicons-sos"></span> <?php _e('For Plugin German Support', 'author-box-pro'); ?>
                                        <a href="https://plus.google.com/u/0/communities/106070505484298900786" target="_blank"><?php _e('Support DE', 'author-box-pro'); ?></a>
                                    </li>
                                    <li><span class="dashicons dashicons-sos"></span> <?php _e('For Plugin Turkey Support', 'author-box-pro'); ?>
                                        <a href="https://plus.google.com/u/0/communities/111364399553479782817" target="_blank"><?php _e('Support TR', 'author-box-pro'); ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="st_melibuPlugin_list_item_4">
                    <div class="st_melibuPlugin_list_content">
                        <h3><?php _e('Development ', 'author-box-pro'); ?></h3>
                        <hr />
                        <ul>
                            <li>
                                <h3><?php _e('Author', 'author-box-pro'); ?></h3>
                                <a href="https://profiles.wordpress.org/prodeveloper/">
                                    <img src="//secure.gravatar.com/avatar/d15ce54d18adb5cf02bd9676be830485?s=150&d=mm&r=g" class="avatar user-14722029-avatar avatar-150 photo" alt="Profile picture of Samet Tarim" height="150" width="150">
                                </a>
                                <p>
                                    <?php _e('Founder and Project Manager', 'author-box-pro'); ?> - DEVELOPER<br />
                                    <span class="dashicons dashicons-welcome-learn-more"></span>
                                    <a href="<?php echo MAA_SSS_PLUGIN_14_DEV_URL; ?>" target="_blank">Dipl. Web Engineer, Samet Tarim</a>
                                </p>
                            </li>
                            <li>
                                <h3><?php _e('Contributors', 'author-box-pro'); ?></h3>
                                <a href="https://profiles.wordpress.org/projectmate/">
                                    <img src="//www.gravatar.com/avatar/403021844ef89f1ced9663c5708eb3ab?s=150&amp;r=g&amp;d=mm" class="avatar user-14822683-avatar avatar-150 photo" alt="Profile picture of Volkan Tarim" height="150" width="150">
                                </a>
                                <p>
                                    SEO <?php _e('and', 'sharing-social-safe'); ?> SEA - SEO MANAGER<br />
                                    <span class="dashicons dashicons-welcome-learn-more"></span>
                                    <a href="https://profiles.wordpress.org/projectmate" target="_blank"><?php _e('Economic Computer Science', 'sharing-social-safe'); ?>, Volkan Tarim</a>
                                </p>
                            </li>

                            <li class="wp-person"><h3><?php _e('Marketing', 'author-box-pro'); ?></h3> 
                                <p>
                                    <a href="<?php echo MAA_SSS_PLUGIN_14_DEV_URL; ?>" target="_blank">Samet Tarim</a>, 
                                    <a href="https://profiles.wordpress.org/projectmate" target="_blank">Volkan Tarim</a>
                                </p>
                            </li>
                            <li class="wp-person"><h3><?php _e('Developer', 'author-box-pro'); ?></h3>
                                <p>
                                    <a href="<?php echo MAA_SSS_PLUGIN_14_DEV_URL; ?>" target="_blank">Samet Tarim</a>, 
                                    <a href="https://profiles.wordpress.org/projectmate" target="_blank">Volkan Tarim</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="st_melibuPlugin_list_item_5">
                    <div class="st_melibuPlugin_list_content">
                        <h3><?php _e('Thanks all Translaters', 'author-box-pro'); ?></h3>
                        <p>
                            <span class="dashicons dashicons-translation"></span> <?php _e('Translate this Plugin', 'author-box-pro'); ?>: 
                            <a href="https://translate.wordpress.org/projects/wp-plugins/<?php echo $datas['TextDomain']; ?>" target="_blank"><?php _e('Translate', 'author-box-pro'); ?></a>
                        </p>
                        <hr />
                    </div>
                </li>
                <li class="st_melibuPlugin_list_item_6">
                    <div class="st_melibuPlugin_list_content">
                        <h3><?php _e('Donate', 'author-box-pro'); ?></h3>
                        <p><?php _e('Development is fueled by your praise and feedback', 'author-box-pro'); ?></p>
                        <hr />
                        <p><?php _e('In how you can support us so that we can further develop this plugin regularly, it may not always be financially, so you will give us feedback or recommend us, please give us a review, Liken our Facebook page or sponsor us, so that we further useful free plugins can develop.', 'author-box-pro'); ?></p>    
                        <p><?php _e('You see, it is much more possible if you want to support something, thanks to all the Support Us.', 'author-box-pro'); ?></p>
                        <img src="<?php echo plugins_url('img/paypal-logo.jpg', dirname(__FILE__)); ?>" alt="" width="130" height="35"/>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="T6T4Y5DTYBTSU">
                            <input type="image" src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="Jetzt einfach, schnell und sicher online bezahlen – mit PayPal.">
                            <img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
                        </form>
                        <p><?php _e('LOOK FOR SPONSOR !!!', 'author-box-pro'); ?></p>
                        <p><em><?php _e('Your Melibu Team', 'author-box-pro'); ?></em></p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
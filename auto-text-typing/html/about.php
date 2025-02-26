<?php
if (!defined('ABSPATH') && !is_admin()) {
    exit;
}

$datas = get_plugin_data(MELIBU_PLUGIN_PATH_07 . 'auto-text-typing.php', $markup = true, $translate = true);
?>
<div class="melibu_typing_about wrap about-wrap">

    <h1>
        <?php _e('Welcome to', 'auto-text-typing'); ?> <span style="color:#FF7F01;"><?php echo $datas['Name']; ?></span>&nbsp;v.<?php echo $datas['Version']; ?>
    </h1>

    <div class="about-text"><?php echo $datas['Description']; ?></div>
    <div class="wp-badge"><?php _e('Version', 'auto-text-typing'); ?> <?php echo $datas['Version']; ?></div>

    <div class="st-melibuPlugin-area">
        <div class="st_melibuPlugin_list st_melibuPlugin_list_flip">

            <input name="st_melibuPlugin_list_item"
                   id="st_melibuPlugin_list_item_1" 
                   class="st_melibuPlugin_list_item_1" 
                   type="radio" 
                   value="1" checked="checked">
            <label for="st_melibuPlugin_list_item_1"><span><?php _e('Welcome', 'auto-text-typing'); ?></span></label>
            <input name="st_melibuPlugin_list_item" 
                   id="st_melibuPlugin_list_item_2" 
                   class="st_melibuPlugin_list_item_2" 
                   type="radio" 
                   value="2">
            <label for="st_melibuPlugin_list_item_2"><span><?php _e('Functions', 'auto-text-typing'); ?></span></label>
            <input name="st_melibuPlugin_list_item" 
                   id="st_melibuPlugin_list_item_3" 
                   class="st_melibuPlugin_list_item_3" 
                   type="radio" 
                   value="3">
            <label for="st_melibuPlugin_list_item_3"><span><?php _e('Support', 'auto-text-typing'); ?> </span></label>
            <input name="st_melibuPlugin_list_item" 
                   id="st_melibuPlugin_list_item_4" 
                   class="st_melibuPlugin_list_item_4" 
                   type="radio" 
                   value="4">
            <label for="st_melibuPlugin_list_item_4"><span><?php _e('Development', 'auto-text-typing'); ?> </span></label>
            <input name="st_melibuPlugin_list_item" 
                   id="st_melibuPlugin_list_item_5" 
                   class="st_melibuPlugin_list_item_5" 
                   type="radio" 
                   value="5">
            <label for="st_melibuPlugin_list_item_5"><span><?php _e('Translation', 'auto-text-typing'); ?> </span></label>
            <input name="st_melibuPlugin_list_item" 
                   id="st_melibuPlugin_list_item_6" 
                   class="st_melibuPlugin_list_item_6" 
                   type="radio" 
                   value="6">
            <label for="st_melibuPlugin_list_item_6"><span><?php _e('Donate', 'auto-text-typing'); ?> </span></label>
            <ul>
                <li class="st_melibuPlugin_list_item_1">
                    <div class="st_melibuPlugin_list_content">
                        <h3>Melabu &copy;</h3>
                        <hr />
                        <?php
                        $datas = get_plugin_data(MELIBU_PLUGIN_PATH_07 . 'auto-text-typing.php', $markup = true, $translate = true);
                        if ($datas) {
                            foreach ($datas as $key => $data) {

                                echo '<strong>' . $key . '</strong>: ' . $data . '<br />';
                            }
                        }
                        ?>
                        <hr />
                        <p>
                            <?php _e('More Professional', 'auto-text-typing'); ?> <a href="<?php echo MAA_PLUGIN_07_MB_URL; ?>" target="_blank"><?php _e('Themes', 'auto-text-typing'); ?> </a> <?php _e('and ', 'auto-text-typing'); ?> <a href="<?php echo MAA_PLUGIN_07_MB_URL; ?>" target="_blank"><?php _e('Plugins', 'auto-text-typing'); ?> </a>
                        </p>
                        <hr />
                        <div class="headline-feature feature-video" style="background-color:#191E23;">
                            <img src="<?php echo plugins_url("screenshot-1.png", dirname(__FILE__)); ?>" alt="screenshot-1" width="650" class="st-img"/>
                        </div>
                    </div>
                </li>
                <li class="st_melibuPlugin_list_item_2">
                    <div class="st_melibuPlugin_list_content">
                        <h3><?php _e('Functions', 'auto-text-typing'); ?></h3>
                        <hr />
                        <div class="under-the-hood three-col">
                            <div class="col">
                                <h3><?php _e('Functionality', 'auto-text-typing'); ?></h3>
                                <ul class="st_list">
                                    <li><?php _e('Types your text automatically', 'auto-text-typing'); ?></li>
                                    <li><?php _e('Very easy to use', 'auto-text-typing'); ?></li>
                                </ul>
                            </div>
                            <div class="col">
                                <h3><?php _e('Options', 'auto-text-typing'); ?></h3>
                                <ul class="st_list">
                                    <li><?php _e('Custom Background Color with colorpicker', 'auto-text-typing'); ?></li>
                                    <li><?php _e('Custom Color with colorpicker', 'auto-text-typing'); ?></li>
                                    <li><?php _e('Custom Border-radius', 'auto-text-typing'); ?></li>
                                    <li><?php _e('Custom Border-width', 'auto-text-typing'); ?></li>
                                    <li><?php _e('Custom Border-style', 'auto-text-typing'); ?></li>
                                </ul>
                            </div>
                            <div class="col">
                                <h3><?php _e('Extras', 'auto-text-typing'); ?></h3>
                                <ul class="st_list">
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="st_melibuPlugin_list_item_3">
                    <div class="st_melibuPlugin_list_content">
                        <h3><?php _e('Support', 'auto-text-typing'); ?></h3>
                        <hr />
                        <div class="feature-section two-col">
                            <div class="col">
                                <h3><?php _e('In like please give', 'auto-text-typing'); ?> <?php echo $datas['Name']; ?></h3>
                                <ul>
                                    <li><span class="dashicons dashicons-thumbs-up"></span>
                                        <a href="https://wordpress.org/support/view/plugin-reviews/<?php echo $datas['TextDomain']; ?>" target="_blank"><?php _e('WordPress Rate', 'auto-text-typing'); ?></a>
                                    </li>
                                    <li><span class="dashicons dashicons-thumbs-up"></span>
                                        <a href="https://plus.google.com/u/0/b/112736162951079313360/112736162951079313360" target="_blank"><?php _e('Google+ plus', 'auto-text-typing'); ?></a>
                                    </li>
                                    <li><span class="dashicons dashicons-thumbs-up"></span>
                                        <a href="https://www.facebook.com/melabu/" target="_blank"><?php _e('Facebook Like', 'auto-text-typing'); ?></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col">
                                <h3><?php _e('Feel free and post your question, suggestion, idea or criticism. We love it!', 'auto-text-typing'); ?></h3>
                                <ul>
                                    <li><span class="dashicons dashicons-sos"></span> <?php _e('For Plugin English Support', 'auto-text-typing'); ?>
                                        <a href="https://wordpress.org/support/plugin/<?php echo $datas['TextDomain']; ?>" target="_blank"><?php _e('Support EN', 'auto-text-typing'); ?></a>
                                    </li>
                                    <li><span class="dashicons dashicons-sos"></span> <?php _e('For Plugin German Support', 'auto-text-typing'); ?>
                                        <a href="https://plus.google.com/u/0/communities/106070505484298900786" target="_blank"><?php _e('Support DE', 'auto-text-typing'); ?></a>
                                    </li>
                                    <li><span class="dashicons dashicons-sos"></span> <?php _e('For Plugin Turkey Support', 'auto-text-typing'); ?>
                                        <a href="https://plus.google.com/u/0/communities/111364399553479782817" target="_blank"><?php _e('Support TR', 'auto-text-typing'); ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="st_melibuPlugin_list_item_4">
                    <div class="st_melibuPlugin_list_content">
                        <h3><?php _e('Development ', 'auto-text-typing'); ?></h3>
                        <hr />
                        <ul>
                            <li>
                                <h3><?php _e('Author', 'auto-text-typing'); ?></h3>
                                <a href="https://profiles.wordpress.org/prodeveloper/">
                                    <img src="//secure.gravatar.com/avatar/d15ce54d18adb5cf02bd9676be830485?s=150&d=mm&r=g" class="avatar user-14722029-avatar avatar-150 photo" alt="Profile picture of Samet Tarim" height="150" width="150">
                                </a>
                                <p>
                                    <?php _e('Founder and Project Manager', 'auto-text-typing'); ?> - DEVELOPER<br />
                                    <span class="dashicons dashicons-welcome-learn-more"></span>
                                    <a href="<?php echo MAA_PLUGIN_07_DEV_URL; ?>" target="_blank">Dipl. Web Engineer, Samet Tarim</a>
                                </p>
                            </li>
                            <li>
                                <h3><?php _e('Contributors', 'auto-text-typing'); ?></h3>
                                <a href="https://profiles.wordpress.org/projectmate/">
                                    <img src="//www.gravatar.com/avatar/403021844ef89f1ced9663c5708eb3ab?s=150&amp;r=g&amp;d=mm" class="avatar user-14822683-avatar avatar-150 photo" alt="Profile picture of Volkan Tarim" height="150" width="150">
                                </a>
                                <p>
                                    SEO <?php _e('and', 'author-box-pro'); ?> SEA - SEO MANAGER<br />
                                    <span class="dashicons dashicons-welcome-learn-more"></span>
                                    <a href="https://profiles.wordpress.org/projectmate" target="_blank"><?php _e('Economic Computer Science', 'auto-text-typing'); ?>, Volkan Tarim</a>
                                </p>
                            </li>

                            <li class="wp-person"><h3><?php _e('Marketing', 'auto-text-typing'); ?></h3> 
                                <p>
                                    <a href="<?php echo MAA_PLUGIN_07_DEV_URL; ?>" target="_blank">Samet Tarim</a>, 
                                    <a href="https://profiles.wordpress.org/projectmate" target="_blank">Volkan Tarim</a>
                                </p>
                            </li>
                            <li class="wp-person"><h3><?php _e('Developer', 'auto-text-typing'); ?></h3>
                                <p>
                                    <a href="<?php echo MAA_PLUGIN_07_DEV_URL; ?>" target="_blank">Samet Tarim</a>, 
                                    <a href="https://profiles.wordpress.org/projectmate" target="_blank">Volkan Tarim</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="st_melibuPlugin_list_item_5">
                    <div class="st_melibuPlugin_list_content">
                        <h3><?php _e('Thanks all Translaters', 'auto-text-typing'); ?></h3>
                        <hr />
                        <p>
                            <span class="dashicons dashicons-translation"></span> <?php _e('Translate this Plugin', 'auto-text-typing'); ?>: <a href="https://translate.wordpress.org/projects/wp-plugins/<?php echo $datas['TextDomain']; ?>" target="_blank"><?php _e('Translate', 'auto-text-typing'); ?></a>
                        </p>
                        <hr />
                    </div>
                </li>
                <li class="st_melibuPlugin_list_item_6">
                    <div class="st_melibuPlugin_list_content">
                        <h3><?php _e('Donate', 'auto-text-typing'); ?></h3>
                        <p>
                            <?php _e('Development is fueled by your praise and feedback', 'auto-text-typing'); ?>
                        </p>
                        <hr />
                        <p>
                            <?php _e('In how you can support us so that we can further develop this plugin regularly, it may not always be financially, so you will give us feedback or recommend us, please give us a review, Liken our Facebook page or sponsor us, so that we further useful free plugins can develop.', 'auto-text-typing'); ?>
                        </p>    
                        <p>
                            <?php _e('You see, it is much more possible if you want to support something, thanks to all the Support Us.', 'auto-text-typing'); ?>
                        </p>
                        <img src="<?php echo plugins_url('img/paypal-logo.jpg', dirname(__FILE__)); ?>" alt="" width="130" height="35"/>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="T6T4Y5DTYBTSU">
                            <input type="image" src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="Jetzt einfach, schnell und sicher online bezahlen – mit PayPal.">
                            <img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
                        </form>
                        <p>
                            <?php _e('LOOK FOR SPONSOR !!!', 'auto-text-typing'); ?>
                        </p>
                        <p>
                            <em><?php _e('Your Melabu Team', 'auto-text-typing'); ?></em>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</div>
<?php
function awt_settings_screen(){
    
    if(isset($_GET['message']))
        $message=$_GET['message'];
    else
        $message='';
    
    ?>
    <style type="text/css">
        .col1 {
            float:left;
            width:30%; 
        }
        .col2 {
            float:left;
            width:70%; 
        }
        .social img {
            margin:5px 10px; 
        }
        .social a {
            text-decoration:none; 
        }
    </style>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"><br></div>
        <h2><?PHP echo __('Advanced Wp Testimonial Settings','awt'); ?></h2>
        <?PHP
        switch($message){
            case 'option_updated':
                ?>
        <div class="updated fade"><p><?PHP echo __('Option Value(s) Updated Succesfully','awt'); ?></p></div>
                <?PHP
                break;
        }
        ?>
        <form action="edit.php?post_type=awt_testimonial&page=awt_settings" method="POST">
        <input type="hidden" name="awt_do_action" value="update_settings" />
        <h3><?PHP echo __("URL Options",'awt'); ?></h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><?PHP echo __('Slug','awt')?></th>
                    <td>
                        <input type="text" class="regular-text" name="awt_slug" 
                               value="<?PHP echo get_option('awt_slug','testimonial'); ?>"
                               />
                    </td>
                </tr>
            </tbody>
        </table>
        <h3><?PHP echo __("Content Options",'awt'); ?></h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><?PHP echo __('Length Of Short Description','awt')?></th>
                    <td>
                        <input type="text" class="regular-text" name="awt_short_desc_length" 
                               value="<?PHP echo get_option('awt_short_desc_length',55); ?>"
                               /> <i><?PHP _e('Words','awt'); ?></i>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?PHP echo __('Link Text','awt')?></th>
                    <td>
                        <input type="text" class="regular-text" name="awt_link_text" 
                               value="<?PHP echo get_option('awt_link_text',__('Read More','awt')); ?>"
                               />
                    </td>
                </tr>
            </tbody>
        </table>
        <h3><?PHP echo __("File Options",'awt'); ?></h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><?PHP echo __('Use Plugin Template(s)','awt')?></th>
                    <td>
                        <label for="awt_plugin_template">
                        <input type="checkbox" id="awt_plugin_template" name="awt_plugin_template"
                               value="TRUE"
                        <?PHP if(get_option('awt_plugin_template')=='TRUE'){
                                   echo 'checked="checked"';
                               }
                        ?>
                               />
                        &nbsp;&nbsp;<?PHP echo __('Yes','awt'); ?></label>
                        <p class=""></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="submit">
            <input type="submit"             value="<?PHP echo __('Save Settings','awt'); ?>"            
                   class="button-primary"    name="awt_save_settings" />
            <!--<input type="submit"             value="<?PHP echo __('Restore Default Settings','awt'); ?>"
                   class="button"            name="awt_restore_settings" />-->
        </div>
        <div class="about-wrap">
        <h4 class="wp-people-group">Developer</h4>
        <div class="col1">
        <ul class="wp-people-group">
            <li class="wp-person">
                <a href="https://en.gravatar.com/anthakkar08" target="_blank">
                    <img alt="" src="http://www.gravatar.com/avatar/f70eb21a70bddd8ca786aff6d89d94d2?s=60&amp;d=monsterid&amp;r=g" class="gravatar">
                </a>
                <a href="https://en.gravatar.com/anthakkar08" target="_blank" class="web">
                    Anand Thakkar
                </a>
                <span class="title">ZCE PHP 5.3</span>
            </li>
        </ul>
        </div>
        <div class="col2">
            <?PHP echo __('I am Baroda , Gujarat [India]  Based Developer if you 
                Like this plugin then You can Share Your Views With Me using Any 
                of the Below Media.','awt');
            ?>
            <br/>
            <div class="social">
                <a href="http://www.facebook.com/anthakkar08" target="_blank" >
                    <img src="<?PHP echo plugins_url('img/facebook.png'  ,AWT_PLUGIN_DIR  .'/init.php'); ?>" />
                </a>
                <a href="https://twitter.com/anthakkar08" target="_blank" >
                    <img src="<?PHP echo plugins_url('img/twitter.png'   ,AWT_PLUGIN_DIR  .'/init.php'); ?>" />
                </a>
                <a href="http://anandthakkar.me" target="_blank" >
                    <img src="<?PHP echo plugins_url('img/wordpress.png' ,AWT_PLUGIN_DIR  .'/init.php'); ?>" />
                </a>
            </div>
            <div>
            <?PHP
                echo __('You Can Also Support Me Through Donataion would Be happy to have it :)','awt')
            ?>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_donations">
                    <input type="hidden" name="business" value="anthakkar08@gmail.com">
                    <input type="hidden" name="lc" value="US">
                    <input type="hidden" name="item_name" value="to Support the Development of  Advanced WP Testimonial">
                    <input type="hidden" name="no_note" value="0">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>
            </div>
        </div>
        <div style="clear:both;"></div>
        </div>
        </form>
    </div>
    <?PHP
}
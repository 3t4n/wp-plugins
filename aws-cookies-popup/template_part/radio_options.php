<h2 class="header"><?php echo $page_title; ?></h2>

<!-- Display update message if options have been updated -->
<?php if( isset( $_GET['message'] ) ): ?>
    <div id="message" class="updated below-h2"><p><?php print('Settings successfully updated!'); ?></p></div>
<?php endif; ?>
<div class="aws-wrap">
    <div class="fa-plugin-setting config-wrap ">
        <ul>
            <li><a href = "#content"><?php _e('Settings', COOKIES_TEXT_DOMAIN); ?></a></li>
            <li><a href = "#aws-about">About Us</a></li>
        </ul>
        <div id="content">
                <p><?php print('Set your message you want to display it on your site.'); ?></p>
                <div class="aws_img">
             <a href="https://www.wewp.io/" style="outline: hidden;" target="_blank"><img src="<?php echo COOKIES_URLPATH . '/img/wewp-ad-plugin-400.png';?>" alt="WeWp" width="200px" style="float:right;margin-right:20px;margin-top:-23px;"></a>
            </div>
            <form action="" method="post" id="<?php echo $namespace; ?>-form">
                <div id="content">
                    <?php wp_nonce_field( $namespace . "-update-options" ); ?>   
                    <?php include( "messagebox.php" );?>
                    
                    <div class="highlight secondary">
                        <h3><?php print('Notification Message Position'); ?></h3>
                        <p><input type="radio" name="data[position]" value="top" <?php if($this->get_option( 'position' ) == 'top') echo 'checked'; ?>> <label><?php print('Top'); ?></label></p>
                        <p><input type="radio" name="data[position]" value="bottom" <?php if($this->get_option( 'position' ) == 'bottom') echo 'checked'; ?>> <label><?php print('Bottom'); ?></label></p>
                    
                        <h3><?php print('Message Container'); ?></h3>
                        <p><input type="radio" name="data[type]" value="belt" <?php if($this->get_option( 'type' ) == 'belt') echo 'checked'; ?>> <label><?php print('Sticky Belt'); ?></label></p><img src="<?php print(plugins_url( COOKIES_DIRNAME . '/img/stickybelt.png' ));?>" title="Sticky Belt" alt="Sticky Belt" width="100%" height="auto">
                        <p><input type="radio" name="data[type]" value="box" <?php if($this->get_option( 'type' ) == 'box') echo 'checked'; ?>> <label><?php print('Box'); ?></label></p><img src="<?php print(plugins_url( COOKIES_DIRNAME . '/img/popupbox.png' ));?>" title="Box" alt="Box" width="auto" height="100%">

                        <h3><?php print('Container Theme'); ?></h3>
                        <p class="aws-color-picker-parent"><b><?php print("Container Back-ground Color");?></b><br /><input type="text" name="data[bgcolor]" value="<?php echo ($this->get_option( 'bgcolor' ) ); ?>" class="aws-color-field" data-default-color="<?php echo ($this->get_option( 'bgcolor' ) ); ?>"><div style="position: absolute;" id="aws-color-picker"></div><b><?php print("Container Font Color");?></b><br /><input type="text" name="data[fcolor]" value="<?php echo ($this->get_option( 'fcolor' ) ); ?>" class="aws-color-field" data-default-color="<?php echo ($this->get_option( 'fcolor' ) ); ?>"><div style="position: absolute;" id="aws-color-picker"></div></p>

                        <h3><?php print('Close Button Theme'); ?></h3>
                        <p class="aws-color-picker-parent"><b><?php print("Close Button Back-ground Color");?></b><br /><input type="text" name="data[closecolor]" value="<?php echo ($this->get_option( 'closecolor' ) ); ?>" class="aws-color-field" data-default-color="<?php echo ($this->get_option( 'closecolor' ) ); ?>"><div style="position: absolute;" id="aws-color-picker"></div><b><?php print("Close Button Text");?></b><br /><input type="text" name="data[closetext]" value="<?php echo ($this->get_option( 'closetext' ) ); ?>"><br><br><div style="position: absolute;" id="aws-color-picker"></div><b><?php print("button Font Color");?></b><br /><input type="text" name="data[bfcolor]" value="<?php echo ($this->get_option( 'bfcolor' ) ); ?>" class="aws-color-field" data-default-color="<?php echo ($this->get_option( 'bfcolor' ) ); ?>"><div style="position: absolute;" id="aws-color-picker"></div></p>
                        
                    </div>
                    <input type="hidden" name="action" value="awscpopup"/>
                    <p class="submit">
                        <input type="submit" name="Submit" class="button-primary" value="<?php print( "Save Changes"); ?>" />
                    </p>
                </div>
            </form>
        </div>
            <div id="aws-about">
                <?php
                $arrAddwebPlugins = array(
                    'woo-cart-customizer' => 'Simple Customization of Add to Cart Button',
                    'aws-cookies-popup' => 'AWS Cookies Popup',
                    'addweb-google-popular-post' => 'Traffic Post Page Views',
                    'post-timer' => 'Post Timer',
                    'wc-past-orders' => 'Track Order History for WooCommerce',
                    'widget-social-share' => 'WSS: Widget Social Share'      
                    
                );?>
                <div class="advertise">
                    <h2><?php _e( 'Visit Our Other Plugins:', 'addweb-pt-timer-popup' );?></h2>
                    <div class="ad-content"><?php
                        foreach($arrAddwebPlugins as $slug=>$name) {?>
                            <div class="ad-detail">
                            <div class="ad-inner" >
                                <a href="https://wordpress.org/plugins/<?php echo $slug;?>" target="_blank"><img height="160" src="<?php echo  COOKIES_URLPATH. '/img/'.$slug;?>.svg"></a>
                                <a href="https://wordpress.org/plugins/<?php echo $slug;?>" class="ad-link" target="_blank"><b><?php echo $name;?></b></a>
                            </div>
                            </div><?php
                        } ?></div>
                    </div>
                
                    <div style="margin:5px 0;width:100%;text-align: center;">
                        <a href="http://www.wewp.io" style="outline: hidden;" target="_blank"><img src="<?php echo COOKIES_URLPATH . '/img/wewp-logo.png';?>" alt="WeWp" height="150px" width="100%" ></a>
                    </div>
                    <div style="margin:5px 0;width:100%;text-align: center;">
                        <h3>Developed with <img decoding="async" src="<?php echo COOKIES_URLPATH . '/img/Heart-yellow.svg';?>" alt="AddwebSolution"> By <a href="http://www.addwebsolution.com" style="outline: hidden;" target="_blank">ADDWEB SOLUTION</a></h3>   
                    </div>
                </div>
            </div>
    </div>
</div>
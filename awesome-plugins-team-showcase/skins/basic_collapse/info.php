<div class="panel-expanded" aria-expanded="false">

    <div class="panel-close js-info-collapse">

        <div class="aws-icon aws-icon-close-panel"></div>

    </div>

    <div class="panel-expander-content">

        <?php if ('' !== $the_post->post_content): ?>

            <div class='meta-label'><?php _e("Bio", $this->plugin_name) ?></div>

            <div class="member-bio">

                <?php 
                if( isset($member_meta["short_bio"]) && $member_meta["short_bio"] !== "" ):
                    
                    echo $member_meta["short_bio"];
                
                elseif( $the_post->post_excerpt !== "" ):
                    
                    echo $the_post->post_excerpt;
                
                else:
                    
                    echo $the_post->post_content;
                
                endif;
                ?>

            </div>

        <?php endif; ?>

    </div>

    <div class="panel-expander-info" itemscope itemtype="http://schema.org/Person">

        <?php if (isset($member_meta["phone"]) && $member_meta["phone"] !== ""): ?>

            <div class="meta-item">

                <div itemprop="telephone">

                    <div class='meta-label'><?php _e("Telephone", $this->plugin_name) ?> </div>

                </div>

                <div class="meta-text">

                    <?php echo ( isset($member_meta["phone"]) ? $member_meta["phone"] : "" ) ?>

                </div>

            </div>

        <?php endif; ?>


        <?php if (isset($member_meta["email"]) && $member_meta["email"] !== ""): ?>

            <div class="meta-item">

                <div itemprop="email">

                    <div class='meta-label'><?php _e("E-mail ", $this->plugin_name) ?> </div>

                </div>

                <div class="meta-text">

                    <a class="contact-email" href="mailto:<?php echo ( isset($member_meta["email"]) ? $member_meta["email"] : "" ) ?>" title="<?php echo ( isset($member_meta["email"]) ? $member_meta["email"] : "" ) ?>">

                        <?php echo ( isset($member_meta["email"]) ? $member_meta["email"] : "" ) ?>

                    </a>


                </div>

            </div>

        <?php endif; ?>

        <div class="panel-expander-social">

            <?php if (isset($member_meta["facebook"]) && $member_meta["facebook"] !== "" || isset($member_meta["twitter"]) && $member_meta["twitter"] !== "" || isset($member_meta["linkedin"]) && $member_meta["linkedin"] !== ""): ?>

                <div itemprop="social">

                    <div class='meta-label'><?php _e("Social media", $this->plugin_name) ?> </div>

                </div>


                <?php if (isset($member_meta["facebook"]) && $member_meta["facebook"] !== ""): ?>

                    <div class="meta-social">

                        <a href="<?php echo ( isset($member_meta["facebook"]) ? $member_meta["facebook"] : "" ) ?>" target="_blank">

                            <div class="aws-icon aws-icon-facebook" aria-hidden="true"></div>

                        </a>

                    </div>

                <?php endif; ?>

                <?php if (isset($member_meta["twitter"]) && $member_meta["twitter"] !== ""): ?>

                    <div class="meta-social">

                        <a href="<?php echo ( isset($member_meta["twitter"]) ? $member_meta["twitter"] : "" ) ?>" target="_blank">

                            <div class="aws-icon aws-icon-twitter" aria-hidden="true"></div>

                        </a>

                    </div>

                <?php endif; ?>

                <?php if (isset($member_meta["linkedin"]) && $member_meta["linkedin"] !== ""): ?>

                    <div class="meta-social">

                        <a href="<?php echo ( isset($member_meta["linkedin"]) ? $member_meta["linkedin"] : "" ) ?>" target="_blank">

                            <div class="aws-icon aws-icon-linkedin" aria-hidden="true"></div>

                        </a>

                    </div>

                <?php endif; ?>

            <?php endif; ?>

        </div>

    </div>

</div>
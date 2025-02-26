<div class="panel-layover" aria-hidden="true"> 

    <input type="text" name="panel-keyboard" />

    <div class="panel-layover-container" itemtype="http://schema.org/Person">

        <div class="panel-layover-close js-info-modal">

            <div class="aws-icon aws-icon-close-panel"></div>

        </div>

        <div class="panel-layover-header">

            <div class="aws-member-image">

                <img alt="image description" itemprop="image" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "member_cover"); ?>">

            </div>

            <div class="panel-layover-title">

                <div class="member-name" itemprop="name">

                    <?php echo get_the_title() ?>

                </div>

                <div class="member-function" itemprop="roleName">

                    <?php echo ( isset($member_meta["position"]) ? $member_meta["position"] : "" ) ?>

                </div>

            </div>

        </div>

        <div class="panel-layover-bio">

            <div class="panel-layover-content">

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

            <div class="panel-layover-info">

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

                <div class="panel-layover-social" itemprop="social">

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

    </div>

    <div class="panel-close-background js-collapser"></div>


</div>
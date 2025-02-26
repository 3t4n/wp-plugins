<?php $member_meta = get_post_meta(get_the_ID(), "aws_ts_member_meta", true) ?>

<div class="card card-showcase-horizontal">

    <div class="aws-member-image">

	    <?php if (isset($skin["extrainfo"]) && $skin["extrainfo"] === "link-to-member"): ?>

            <a href="<?php the_permalink(); ?>">

                <img alt="image description" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "member_cover"); ?>">

            </a>

	    <?php else: ?>

            <img alt="image description" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "member_cover"); ?>">

	    <?php endif; ?>

    </div>

    <div class="card-body">

        <div class="member-details">

            <div class="member-name">

                <?php if (isset($skin["extrainfo"]) && $skin["extrainfo"] === "link-to-member"): ?>
                
                    <a href="<?php the_permalink(); ?>">

                        <?php the_title() ?>

                    </a>

                <?php else: ?>

                    <?php the_title() ?>

                <?php endif; ?>

            </div>

            <div class="member-position"><?php echo ( isset($member_meta["position"]) ? $member_meta["position"] : "" ) ?></div>

            <div class="member-bio">

                <?php echo get_the_excerpt() ?>

            </div>

            <?php if (isset($member_meta["email"]) && $member_meta["email"] !== ""): ?>

                <div class="meta-item">

                    <div class="member-email">

                        <span class="meta-label">E:</span>

                        <a class="contact-email" href="mailto:<?php echo ( isset($member_meta["email"]) ? $member_meta["email"] : "" ) ?>" title="<?php echo ( isset($member_meta["email"]) ? $member_meta["email"] : "" ) ?>">

                            <?php echo ( isset($member_meta["email"]) ? $member_meta["email"] : "" ) ?>

                        </a>


                    </div>

                </div>

            <?php endif; ?>

            <?php if (isset($member_meta["phone"]) && $member_meta["phone"] !== ""): ?>

                <div class="meta-item">

                    <div class="member-telephone">

                        <span class="meta-label">T:</span>

                        <?php echo ( isset($member_meta["phone"]) ? $member_meta["phone"] : "" ) ?>

                    </div>

                </div>

            <?php endif; ?>

            <?php if (isset($member_meta["facebook"]) && $member_meta["facebook"] !== "" || isset($member_meta["twitter"]) && $member_meta["twitter"] !== "" || isset($member_meta["linkedin"]) && $member_meta["linkedin"] !== ""): ?>

                <div class="meta-item">

                    <div class="social-media-container">

                        <?php if (isset($member_meta["facebook"]) && $member_meta["facebook"] !== ""): ?>

                            <div class="member-social-channel">

                                <a href="<?php echo ( isset($member_meta["facebook"]) ? $member_meta["facebook"] : "" ) ?>" target="_blank">

                                    <div class="aws-icon aws-icon-facebook" aria-hidden="true"></div>

                                </a>

                            </div>

                        <?php endif; ?>

                        <?php if (isset($member_meta["twitter"]) && $member_meta["twitter"] !== ""): ?>

                            <div class="member-social-channel">

                                <a href="<?php echo ( isset($member_meta["twitter"]) ? $member_meta["twitter"] : "" ) ?>" target="_blank">

                                    <div class="aws-icon aws-icon-twitter" aria-hidden="true"></div>

                                </a>

                            </div>

                        <?php endif; ?>

                        <?php if (isset($member_meta["linkedin"]) && $member_meta["linkedin"] !== ""): ?>

                            <div class="member-social-channel">

                                <a href="<?php echo ( isset($member_meta["linkedin"]) ? $member_meta["linkedin"] : "" ) ?>" target="_blank">

                                    <div class="aws-icon aws-icon-linkedin" aria-hidden="true"></div>

                                </a>

                            </div>

                        <?php endif; ?>

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>
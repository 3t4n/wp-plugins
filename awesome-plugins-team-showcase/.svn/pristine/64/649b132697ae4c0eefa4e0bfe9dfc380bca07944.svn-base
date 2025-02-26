<?php
$member_meta = get_post_meta(get_the_ID(), "aws_ts_member_meta", true);

?>

<div class="card card-showcase-default" aria-label="team-member">

    <div class="card-inner">

        <div class="aws-member-image">

            <img alt="image description" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "member_cover"); ?>">

        </div>

        <div class="card-body">

            <div class="member-name">

                <?php if (isset($skin["extrainfo"]) && $skin["extrainfo"] === "link-to-member") { ?>

                    <a href="<?php the_permalink(); ?>">

                    <?php the_title() ?>

                    </a>

                <?php } else { ?>

	            <?php the_title() ?>

                <?php } ?>

            </div>

            <div class="member-function">

                <?php echo ( isset($member_meta["position"]) ? $member_meta["position"] : "" ) ?>

            </div>

        </div>

    </div>

</div>
<div class="card card-showcase-default card-showcase-layover" aria-label="team-member">

    <div class="card-inner js-info-modal">

        <div class="aws-member-image">

            <img alt="image description" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "member_cover"); ?>">

        </div>

        <div class="card-body">

            <div class="member-name"><?php the_title() ?></div>

            <div class="member-function">

                <?php echo ( isset($member_meta["position"]) ? $member_meta["position"] : "" ) ?>

            </div>

        </div>

    </div>

</div>
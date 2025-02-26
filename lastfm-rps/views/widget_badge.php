<?php
$userinfo = $this->userinfo->user;
$usertypes = [
    "user" => __("User","lastfmrps"),
    "subscriber" => __("Subscriber", "lastfmrps"),
    "moderator" => __("Moderator", "lastfmrps"),
    "alumni" => $userinfo->gender == "f" ? __("Alumnae", "lastfmrps") : __("Alumnus", "lastfmrps"),
    "staff" => __("Staff", "lastfmrps")
];
?>
<div class='lastfm_rps_user_badge'>
    <?php if($instance["showavatar"]):?>
    <div class="lastfm_rps_user_image"><a href='<?= $userinfo->url; ?>' target='_blank'><img src="<?= $userinfo->image; ?>"></a></div>
    <?php endif;?>
    <div class="lastfm_rps_user_info">
        <div class="lastfm_rps_username"><a href='<?= $userinfo->url; ?>' target='_blank'><?= $userinfo->name; ?></a></div>
        <div class="lastfm_rps_userlevel"><?= $usertypes[$userinfo->type]; ?></div>
        <?php if($instance["showrealname"]):?>
        <div class="lastfm_rps_realname"><?= $userinfo->realname; ?></div>
        <?php endif; if($instance["showcountry"]):?>
        <div class="lastfm_rps_country"><span><?=__("Country:","lastfmrps")?></span> <?= $userinfo->country; ?></div>
        <?php endif; if($instance["showage"] && $userinfo->age != 0):?>
        <div class="lastfm_rps_age"><span><?php _e("Age:", "lastfmrps");?></span> <?= $userinfo->age; ?></div>
        <?php endif; if($instance["showgender"] && $userinfo->gender != "n"):?>
        <div class="lastfm_rps_gender"><span><?php _e("Gender:", "lastfmrps");?></span> <?= $userinfo->gender; ?></div>
        <?php endif; if($instance["showregister"]):?>
        <div class="lastfm_rps_registered"><span><?php _e("Registered:", "lastfmrps");?></span> <?= date("j F Y, H:i", $userinfo->registered->unixtime); ?></div>
        <?php endif; if($instance["showtrackcount"]):?>
        <div class="lastfm_rps_played"><span><?php _e("Tracks Played:", "lastfmrps");?></span> <?= $userinfo->playcount; ?></div>
        <?php endif;?>
    </div>
</div>
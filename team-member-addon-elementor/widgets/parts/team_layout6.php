
<div class="our-team6">
    <div class="pic6">
        <img src="<?php echo esc_url($teams_image['url']);?>">
        <div class="social_media_team6">
            <div class="team-prof6">
                <h3 class="post-title6 team_titls"><?php echo esc_html( $member_name );?></h3>
                <span class="post6 team_desc"><?php echo esc_html( $member_profession );?></span>

                <ul class="team_social6">
                    <?php foreach($member_social_list as $socialss)
                        {
                    ?>

                    <li><a href="<?php echo esc_url($socialss['member_social_link']['url']);?>" target="_blank" class="<?php echo esc_attr( $socialss['social_icon']['value'] );?>"></a></li>

                    <?php }?>

                </ul>
            </div>
        </div>
    </div>
</div>
<div class="our-team2">
    <div class="team_img2">
        <img src="<?php echo esc_url($teams_image['url']);?>">
        <ul class="social2">
            <?php foreach($member_social_list as $socialss)
            {
            ?>

            <li><a href="<?php echo esc_url($socialss['member_social_link']['url']);?>" target="_blank" class="<?php echo esc_attr( $socialss['social_icon']['value'] );?>"></a></li>

            <?php }?>
        </ul>
    </div>
    <div class="team-content2">
        <h3 class="title2 team_titls"><?php echo esc_html( $member_name );?></h3>
        <span class="post2 team_desc"><?php echo esc_html( $member_profession );?></span>
    </div>
</div>
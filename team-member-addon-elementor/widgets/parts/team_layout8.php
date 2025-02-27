

<div class="our-team8">
    <div class="pic8">
            <img src="<?php echo esc_url($teams_image['url']);?>">
        <ul class="social8">
            <?php foreach($member_social_list as $socialss)
                {
            ?>

            <li><a href="<?php echo esc_url($socialss['member_social_link']['url']);?>" target="_blank" class="<?php echo esc_attr( $socialss['social_icon']['value'] );?>"></a></li>

            <?php }?>
        </ul>
    </div>
    <div class="team-content8">
        <div class="team-info8">
            <h3 class="title8 team_titls"><?php echo esc_html( $member_name );?></h3>
            <span class="post8 team_desc"><?php echo esc_html( $member_profession );?></span>
        </div>
    </div>
</div>
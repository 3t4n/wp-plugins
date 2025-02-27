<div class="our-team5">
    <div class="pic5">
        <img src="<?php echo esc_url($teams_image['url']);?>">
    </div>
    <div class="team-content5">

        <h3 class="title5 team_titls"><?php echo esc_html( $member_name );?></h3>
        <span class="post5 team_desc"><?php echo esc_html( $member_profession );?></span>

    </div>
    <ul class="social5">
        <?php foreach($member_social_list as $socialss)
            {
        ?>

        <li><a href="<?php echo esc_url($socialss['member_social_link']['url']);?>" target="_blank" class="<?php echo esc_attr( $socialss['social_icon']['value'] );?>"></a></li>

        <?php }?>
    </ul>
</div>
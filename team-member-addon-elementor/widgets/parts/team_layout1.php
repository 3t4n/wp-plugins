<div class="our-team">
    <img src="<?php echo esc_url($teams_image['url']);?>">
    <div class="team-content">
        <h3 class="title team_titls"><?php echo esc_html( $member_name );?></h3>
        <span class="post team_desc"><?php echo esc_html( $member_profession );?></span>
    </div>
    <ul class="social">

        <?php foreach($member_social_list as $socialss)
        {
        ?>

        <li><a href="<?php echo esc_url($socialss['member_social_link']['url']);?>" target="_blank" class="<?php echo esc_attr( $socialss['social_icon']['value'] );?>"></a></li>

        <?php }?>

    </ul>
</div>

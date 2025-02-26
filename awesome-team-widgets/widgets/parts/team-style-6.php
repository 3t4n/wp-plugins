<div class="single-team-member-06">                     
      <div class="thumb">
         <img src="<?php echo esc_url($team_image['url']);?>" alt="<?php echo esc_attr($team_name);?>">
         <div class="border"></div>
      </div>
   
   <div class="content">
      <div class="top-content">
         <h4 class="title"><?php echo esc_html($team_name);?></h4>
        <span class="post"><?php echo esc_html($team_designation);?></span>
      </div>
      <div class="bottom-content">
         <ul class="social-icon">
            <?php
                foreach($team_socials as $social) {
            ?>
                <li><a href="<?php echo esc_url($social['team_social_link']['url']);?>"><i class="<?php echo esc_attr($social['team_social_icon']['value']);?>"></i></a></li>
            <?php
                }
            ?>
         </ul>
      </div>
   </div>
</div>
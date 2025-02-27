<?php
$teams = carbon_get_post_meta( get_the_ID(), 'team_items' );
?>
<div id="style-lima" class="vcenter alignfull team-post-<?php echo esc_attr(get_the_ID()); ?> style-lima">
    <div class="section">
        <div class="team-container">
            <ul class="team">
                <?php foreach ( $teams as $team ) {
                $team_items_socials = $team['team_items_socials']; ?>
                <li class="team__members">
                    <div class="userProfile">
                        <div class="userProfile__thumbnail">
                            <?php echo wp_get_attachment_image( $team['team_item_img'], 'full', "", array( "class" => "userProfile__image" ) ); ?>
                        </div>
                    </div>
                    <div class="team__details">
                        <div class="team__meta">
                            <?php team_title_view($team['team_item_name']); ?>

                            <?php team_job_view($team['team_job']); ?>
                        </div>
                        <div class="team__details__summery">
                            <?php team_bio_view($team['team_item_bio']); ?>
                        </div>
                        <div class="socials flex flex-wrap gap-4 justify-center">
                            <?php 
                            foreach ( $team_items_socials as $team_items_social ) {
                                if(!empty($team_items_social['team_item_social_link'])) {
                                    $icon = "";
                                    if(!empty($team_items_social['team_item_social_icon'])) {
                                        $icon = $team_items_social['team_item_social_icon']['class'];
                                    } ?>
                            <div class="social-item">
                                <a href="<?php echo esc_url($team_items_social['team_item_social_link']); ?>">
                                    <i class="<?php echo esc_attr($icon); ?>"></i>
                                </a>
                            </div>
                            <?php } 
                            } ?>
                        </div>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
(function( $ ) {
'use strict';
    $(document).ready(function($){
        let members = $(".team__members");
        let isHover = false;

        setInterval(() => {
          if (!isHover) {
            let min = 1;
            let max = $(members).length;
            let random = Math.floor(Math.random() * (max - min + 1) + min);
            $(".team__members:nth-child(" + random + ")")
              .addClass("team__members--show")
              .siblings()
              .removeClass("team__members--show");
          }
        }, 3000);
        function mediaSize() {
          $(members).on('hover'
            () => {
              if (window.matchMedia("(min-width: 480px)").matches) {
                $(members).removeClass("team__members--show");
                isHover = true;
                console.log("hover");
              }
            },
            () => {
              if (window.matchMedia("(min-width: 480px)").matches) {
                isHover = false;
              }
            }
          );
        }
        /* Call the function */
        mediaSize();
        /* Attach the function to the resize event listener */
        window.addEventListener("resize", mediaSize, false);
    });
})( jQuery );
</script>
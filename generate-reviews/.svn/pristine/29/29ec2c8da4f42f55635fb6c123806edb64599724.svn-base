<div class='revPop2'>
    <div class='top-part'>
        <img src='<?php echo plugin_dir_url(__FILE__);?>images/stars.png' class='stars'>
        <span>Reviews</span>
    </div>
    <div class='bottom-part'>
        <?php if (count($response['gg']) > 0) { ?>
        
            <a title='Google Reviews'><img src='<?php echo plugin_dir_url(__FILE__);?>images/google-icon.png'></a>

        <?php } ?>

        <?php if (count($response['fb']) > 0) { ?>
        
            <a title='Facebook Reviews'><img src='<?php echo plugin_dir_url(__FILE__);?>images/fb.png'></a>

        <?php } ?>

        <?php if (count($response['fs']) > 0) { ?>
        
            <a title='Fivestar Reviews'><img src='<?php echo plugin_dir_url(__FILE__);?>images/fivestar-icon.png'></a>

        <?php } ?>
    </div>
</div>

<!-- Slider testimonial container -->
<div class='testi-con2' id='testimonial-container'>
    <div class='overlay-div'></div>
    <div class='inner-wrapper'>
        <div class='top-content'>
            <a href='<?php echo $fs_link;?>#Reviews' target='_blank' class='view-all-reviews'>
                <small>Click To View All</small><br>
                Reviews
            </a>
            <a href='<?php echo $fs_link;?>' target='_blank' class='write-review'>
                Write a Review
            </a>
            <div class='close-panel'></div>
        </div>
        <div class='middle-content'>
            <?php 
            // Display Google Reviews
            $reviewCtr = 0;
            if (count($response['gg']) > 0) {
                $limitRev = count($response['gg']);
                $limitRev = ($limitRev > 5) ? 5 : $limitRev;
                for($i = 0; $i < $limitRev; $i++) { $reviewCtr++; ?>
            <div class='middle-inner-wrapper review<?=$reviewCtr?>'>
                <div class='reviewer-info'>
                    <img src='<?php echo plugin_dir_url(__FILE__);?>images/google-icon.png' class='icon-rev'>
                    <div>
                        <p><strong><?php echo $response['gg'][$i]['reviewer'];?></strong></p>
                        <img src='<?php echo plugin_dir_url(__FILE__);?>images/stars.png' class='icon-stars'>
                        <p><small><?php echo date('M d, Y',$response['gg'][$i]['time'])?></small></p>
                    </div>
                </div>
                <div style='clear: both; width: 100%; height: 0;'></div>

                <p class='review-text'><?php echo limit_text($response['gg'][$i]['review_text'], 20);?></p>
            </div>
            <?php } 
            }

            // Display Facebook Reviews
            if (count($response['fb']) > 0) {
                $limitRev = count($response['fb']);
                $limitRev = ($limitRev > 5) ? 5 : $limitRev;
                for($i = 0; $i < $limitRev; $i++) {
                    $reviewCtr++;
                    // Remove or avoid from display Facebook Reviews with Undefined reviews
                    if ($response['fb'][$i]['review_text'] != 'undefined') {?>
            <div class='middle-inner-wrapper review<?=$reviewCtr?>'>
                <div class='reviewer-info'>
                    <img src='<?php echo plugin_dir_url(__FILE__);?>images/fb.png' class='icon-rev'>
                    <div>
                        <p><strong><?=$response['fb'][$i]['reviewer'];?></strong></p>
                        <img src='<?php echo plugin_dir_url(__FILE__);?>images/stars.png' class='icon-stars'>
                        <p><small><?=date('M d, Y',$response['fb'][$i]['time'])?></small></p>
                    </div>
                </div>
                <div style='clear: both; width: 100%; height: 0;'></div>

                <p class='review-text'><?php echo limit_text($response['fb'][$i]['review_text'], 20);?></p>
            </div>
            <?php	}
                } 
            }

            if (count($response['fs']) > 0) {
                $limitRev = count($response['fs']);
                $limitRev = ($limitRev > 5) ? 5 : $limitRev;
                for($i = 0; $i < $limitRev; $i++) { $reviewCtr++; ?>
            <div class='middle-inner-wrapper review<?=$reviewCtr?>'>
                <div class='reviewer-info'>
                    <img src='<?php echo plugin_dir_url(__FILE__);?>images/fivestar-icon.png' class='icon-rev'>
                    <div>
                        <p><strong><?=$response['fs'][$i]['reviewer'];?></strong></p>
                        <img src='<?php echo plugin_dir_url(__FILE__);?>images/stars.png' class='icon-stars'>
                        <p><small><?=date('M d, Y',$response['fs'][$i]['time'])?></small></p>
                    </div>
                </div>
                <div style='clear: both; width: 100%; height: 0;'></div>

                <p class='review-text'><?php echo limit_text($response['fs'][$i]['review_text'], 20);?></p>
            </div>
            <?php } 
            }

            ?>
        </div>
        <div class='bottom-content'>
            <span>Review By: </span>
            <?php if (count($response['gg']) > 0) { ?>

                <a href='//search.google.com/local/writereview?placeid=<?php echo $gg_token;?>' title='Google Reviews' target='_blank'><img src='<?php echo plugin_dir_url(__FILE__);?>images/google-icon.png'></a>

            <?php } ?>
            
            <?php if (count($response['fb']) > 0) { ?>

                <a href='<?php echo $fb_link;?>' title='Facebook Reviews' target='_blank'><img src='<?php echo plugin_dir_url(__FILE__);?>images/fb.png'></a>

            <?php } ?>

            <?php if (count($response['fs']) > 0) { ?>
            
                <a href='<?php echo $fs_link;?>' title='Fivestar Reviews' target='_blank'><img src='<?php echo plugin_dir_url(__FILE__);?>images/fivestar-icon.png'></a>

            <?php } ?>
        </div>
    </div>
</div>
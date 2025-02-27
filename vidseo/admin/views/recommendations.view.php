<?php  include "inc/top.view.php"; ?>

<h3><?php echo  __( 'Top plugins for SEO performance:', 'vidseo' ); ?></h3>

<div class="recs-tab">

    <div class="vidseo-note" style="background-color: #fff; margin: 10px 0;">
        <p><?php echo  __( "Video SEO Transcription Embedder by Pagup provides a selection of plugins allowing to keep your website healthy, get better results on Search engines and increase your sales for ecommerce solutions.", 'vidseo' ); ?></p>
    </div>

    <div class="vidseo-row">
        
        <?php foreach ( $plugins as $plugin ) { ?>

            <div class="vidseo-column col-4 col-link">
                <div class="link-box">
                    <h3 title="<?php echo  $key; ?>">
                    <?php echo  mb_strimwidth( $plugin['name'], 0, 48, "..." ) ; ?>
                    </h3>

                    <p>
                    <img src="<?php echo VIDSEO_PLUGIN_DIR . $plugin['img']; ?>" />
                    <?php echo  mb_strimwidth( $plugin['desc'], 0, 120, "..." ); ?>
                    </p>

                    <a href="<?php echo  $plugin['link']; ?>" class="link-btn" target="_blank">
                    <?php echo  __( 'Download', 'vidseo' ); ?>
                    </a>
                </div>
            </div>

        <?php  }  ?>

   </div>
 
       
    <div class="vidseo-note" style="background-color: #60DABF; margin: 10px 0;">
        <h2 style="font-size: 20px; text-align: center"><span class="dashicons dashicons-lock" style="font-size: 28px; margin-top: -3px;"></span>  &nbsp; <?php 
        echo  __( 'Upgrade to PRO version to UNLOCK 12 additional awesome plugins recommendations for SEO & Conversion performance', 'vidseo' ); ?></h2>
    </div>

    <div class="vidseo-note" style="background-color: #fff; margin: 10px 0;">
        <p><?php  echo  __( "Want to suggest another plugin ? ... Send us a message at support@better-robots.com", 'vidseo' ); ?></p>
    </div>
    
</div>

</div>
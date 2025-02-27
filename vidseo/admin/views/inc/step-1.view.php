<div class="vidseo-segment">
    <h2 class="vidseo_heading"><?php 
echo esc_html__( 'STEP 1: General settings for Vidseo plugin', 'vidseo' );
?></h2>
    
        <div class="vidseo-row">
    
            <div class="vidseo-column col-4">
    
                <span class="vidseo-label"><?php 
echo esc_html__( 'Excerpt Length', 'vidseo' );
?></span>
    
                <div class="vidseo-tooltip">
    
                <span class="dashicons dashicons-editor-help"></span>
    
                <span class="vidseo-tooltiptext">
                    <?php 
echo __( 'Excerpt > Visible text shown under video. Define number of characters as you need ', 'vidseo' );
?>
                </span>
    
                </div>
    
            </div>
    
            <div class="vidseo-column col-8">
                
                <input type="number" name="vidseo_excerpt" id="vidseo_excerpt" class="vidseo-field" value="<?php 
echo $options::get( 'vidseo_excerpt' );
?>" placeholder="60">
    
                &nbsp;
                <span><?php 
echo esc_html__( 'Define number of characters for excerpt. e.g: 60', 'vidseo' );
?></span>
    
            </div>
    
        </div>
    
    
        <div class="vidseo-row">
            
            <div class="vidseo-column col-4">
            
                <span class="vidseo-label">
                    <?php 
echo esc_html__( 'Hide Title by Default', 'vidseo' );
?>
                </span>
            
                <div class="vidseo-tooltip">
    
                    <span class="dashicons dashicons-editor-help"></span>
    
                    <span class="vidseo-tooltiptext">
                        <?php 
echo __( 'You can display/hide video title for any video by using shortcode attribute title="1" (1  for true or 0 for false). Read documentation for more details', 'vidseo' );
?>
                    </span>
    
                </div>
    
            </div>
    
            <div class="vidseo-column col-8">
                
                <label class="vidseo-switch">
    
                    <input type="checkbox" id="hide_title" name="hide_title" value="true" <?php 
if ( $options::check( 'hide_title' ) ) {
    echo 'checked';
}
?> />
                    
                    <span class="vidseo-slider vidseo-round"></span>
    
                </label>
                &nbsp;
                <span><?php 
echo esc_html__( 'Hide VidSEO post title which is shown above video player on all videos', 'vidseo' );
?></span>
            
            </div>
    
        </div>
        
        <div class="vidseo-row">
            
            <div class="vidseo-column col-4">
            
                <span class="vidseo-label">
                    <?php 
echo esc_html__( 'Disable Transcript', 'vidseo' );
?>
                </span>
            
                <div class="vidseo-tooltip">
    
                    <span class="dashicons dashicons-editor-help"></span>
    
                    <span class="vidseo-tooltiptext">
                        <?php 
echo __( 'Transcript is enabled by default. This option will disable transcript for all videos. If you use this option, you can still manually enable transcript with shortcode attribute transcript="1" (for selected videos)', 'vidseo' );
?>
                    </span>
    
                </div>
    
            </div>
    
            <div class="vidseo-column col-8">
                
                <label class="vidseo-switch">
    
                    <input type="checkbox" id="disable_trans" name="disable_trans" value="true" <?php 
if ( $options::check( 'disable_trans' ) ) {
    echo 'checked';
}
?> />
                    
                    <span class="vidseo-slider vidseo-round"></span>
    
                </label>
                &nbsp;
                <span><?php 
echo esc_html__( 'Disable transcript for all videos', 'vidseo' );
?></span>
            
            </div>
    
        </div>
    
        <div class="vidseo-row">
            
            <div class="vidseo-column col-4">
            
                <span class="vidseo-label">
                    <?php 
echo esc_html__( 'Hidden Transcript', 'vidseo' );
?>
                </span>
            
                <div class="vidseo-tooltip">
    
                    <span class="dashicons dashicons-editor-help"></span>
    
                    <span class="vidseo-tooltiptext">
                        <?php 
echo __( 'This option will hide transcript from front-end viewers but transcript text will be available in source code and search engine bots can read it. If you use this option, you can still manually enable transcript with shortcode attribute trans_hidden="0" (for selected videos)', 'vidseo' );
?>
                    </span>
    
                </div>
    
            </div>
    
            <div class="vidseo-column col-8">
    
            <?php 
?>
    
                <label class="vidseo-switch">
    
                    <input type="checkbox" id="hide_trans" class="" name="hide_trans" value="" disabled />
                    
                    <span class="vidseo-slider vidseo-disabled"></span>
    
                </label>
                &nbsp;
                <span><?php 
echo esc_html__( 'Hide transcript for all videos from viewers', 'vidseo' );
?></span>
    
                <div class="vidseo-alert vidseo-info">
                    <span class="closebtn">&times;</span>
                    <?php 
echo $get_pro . " " . esc_html__( 'hidden transcript feature', 'vidseo' );
?>
                </div>
    
            <?php 
?>
                
            
            </div>
    
        </div>
    
        <div class="vidseo-row">
    
            <div class="vidseo-column col-4">
    
                <span class="vidseo-label"><?php 
echo esc_html__( 'Title Background Color', 'vidseo' );
?></span>
    
                <div class="vidseo-tooltip">
    
                <span class="dashicons dashicons-editor-help"></span>
    
                <span class="vidseo-tooltiptext">
                    <?php 
echo __( 'Change Title Color with hex color value. Default Value: #EEEEEE', 'vidseo' );
?>
                </span>
    
                </div>
    
            </div>
    
            <div class="vidseo-column col-8">
    
                <?php 
?>
    
                    <input name="" class="vidseo-field" value="#F1F1F1" style="background-color: #F1F1F1" disabled>
    
                    
                    &nbsp;
                    <span><?php 
echo esc_html__( 'Default Value: #F1F1F1', 'vidseo' );
?></span>
    
                    <div class="vidseo-alert vidseo-info">
                    <span class="closebtn">&times;</span>
                    <?php 
echo $get_pro . " " . esc_html__( 'Title Background Color', 'vidseo' );
?>
                    </div>
    
                <?php 
?>
    
            </div>
    
        </div>
    
        <div class="vidseo-row">
    
            <div class="vidseo-column col-4">
    
                <span class="vidseo-label"><?php 
echo esc_html__( 'Title Text Color', 'vidseo' );
?></span>
    
                <div class="vidseo-tooltip">
    
                <span class="dashicons dashicons-editor-help"></span>
    
                <span class="vidseo-tooltiptext">
                    <?php 
echo __( 'Change Title Text Color with hex color value. Default Value: #222222', 'vidseo' );
?>
                </span>
    
                </div>
    
            </div>
    
            <div class="vidseo-column col-8">
    
                <?php 
?>
    
                    <input name="" class="vidseo-field" value="#222222" style="background-color: #222222; color: #fff" disabled>
    
                    &nbsp;
                    <span><?php 
echo esc_html__( 'Default Value: #222222', 'vidseo' );
?></span>
    
                    <div class="vidseo-alert vidseo-info">
                    <span class="closebtn">&times;</span>
                    <?php 
echo $get_pro . " " . esc_html__( 'Title Text Color', 'vidseo' );
?>
                    </div>
    
                <?php 
?>
    
            </div>
    
        </div>
    
        <div class="vidseo-row">
    
            <div class="vidseo-column col-4">
    
                <span class="vidseo-label"><?php 
echo esc_html__( 'Transcription Box Background Color', 'vidseo' );
?></span>
    
                <div class="vidseo-tooltip">
    
                <span class="dashicons dashicons-editor-help"></span>
    
                <span class="vidseo-tooltiptext">
                    <?php 
echo __( 'Change background color of Transcription drop-down with hex color value. Default: #F1F1F1', 'vidseo' );
?>
                </span>
    
                </div>
    
            </div>
    
            <div class="vidseo-column col-8">
    
                <?php 
?>
    
                    <input name="" class="vidseo-field" value="#F1F1F1" style="background-color: #F1F1F1" disabled>
    
                    &nbsp;
                    <span><?php 
echo esc_html__( 'Default Value: #F1F1F1', 'vidseo' );
?></span>
    
                    <div class="vidseo-alert vidseo-info">
                    <span class="closebtn">&times;</span>
                    <?php 
echo $get_pro . " " . esc_html__( 'Transcription Box Background Color', 'vidseo' );
?>
                    </div>
    
                <?php 
?>
    
            </div>
    
        </div>
    
        <div class="vidseo-row">
    
            <div class="vidseo-column col-4">
    
                <span class="vidseo-label"><?php 
echo esc_html__( 'Transcription Text Color', 'vidseo' );
?></span>
    
                <div class="vidseo-tooltip">
    
                <span class="dashicons dashicons-editor-help"></span>
    
                <span class="vidseo-tooltiptext">
                    <?php 
echo __( 'Change Transcription Text Color with hex color value. Default Value: #222222', 'vidseo' );
?>
                </span>
    
                </div>
    
            </div>
    
            <div class="vidseo-column col-8">
    
                <?php 
?>
    
                    <input name="" class="vidseo-field" value="#222222" style="background-color: #222222; color: #fff" disabled>
    
                    &nbsp;
                    <span><?php 
echo esc_html__( 'Default Value: #222222', 'vidseo' );
?></span>
    
                    <div class="vidseo-alert vidseo-info">
                    <span class="closebtn">&times;</span>
                    <?php 
echo $get_pro . " " . esc_html__( 'Transcription Text Color', 'vidseo' );
?>
                    </div>
    
                <?php 
?>
    
                
    
            </div>
    
        </div>
</div>
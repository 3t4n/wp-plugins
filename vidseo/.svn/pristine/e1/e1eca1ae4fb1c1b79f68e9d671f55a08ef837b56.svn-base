<div id="vidseo_metabox">

    <div class="vidseo-note mt-15 mb-15">
        <h3><?php 
echo esc_html__( 'How to create & embed a video with transcript using Vidseo?', 'vidseo' );
?></h3>
        <ol>
            <li><?php 
echo __( 'Identify where is hosted your video', 'vidseo' );
?></li>
            <li><?php 
echo __( 'Paste your Video URL', 'vidseo' );
?></li>
            <li><?php 
echo __( 'You can choose', 'vidseo' );
?>
                <ul style="padding-bottom: 2px">
                    <li>either to fetch subtitles (created manually on Youtube by the owner) automatically (only for Youtube Videos) - Make sure the transcription exists for the selected language,</li>
                    <li>or to add the content manually (available for Youtube + Vimeo) - You can upgrade to the <a href="edit.php?post_type=vidseo&page=settings-pricing"><strong>PRO version</strong></a> if you need more customization of your content (for SEO - If you want these videos to be ranked by search engines with your website)</li>
                </ul>
            </li>
            <li>Once you see <strong>"Fetched Transcription"</strong>, you can customize some settings (width, excerpt, etc...) with <a href="<?php 
echo VIDSEO_PLUGIN_DIR;
?>/admin/assets/imgs/options.jpg" target="_blank"><strong>this feature</strong></a> and publish the post.</li>
            <li><?php 
echo __( 'Once published, identify your shortcode and copy-paste it wherever needed (you can re-edit the transcription, if needed)', 'vidseo' );
?></li>
        </ol>
    </div>

    <div class="vidseo-segment">
        <p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="vidseo_shortcode"><?php 
echo esc_html__( 'Your Shortcode (to copy-paste wherever needed to display this video with the transcript):', 'vidseo' );
?></label></p>
        <div class="vidseo-shortcode-view vidseo-selectable">
            [vidseo id="<?php 
echo $post->ID;
?>"
            <span v-if="width !== '560px'">width="{{width}}"</span>
            <span v-if="excerpt !== '60'">excerpt="{{excerpt}}"</span>
            <span v-if="title">disable_title="{{title}}"</span>
            <span v-if="transcript">disable_transcript="{{transcript}}"</span>]
        </div>
    </div>

    <div class="vidseo-segment">
        <p class="post-attributes-label-wrapper">
            <label class="post-attributes-label" for="vidseo_host"><?php 
echo esc_html__( 'Select the video host (where is located the video):', 'vidseo' );
?></label>
        </p>
        
        <div class="vidseo-switch-radio">
        
            <input type="radio" id="vidseo_host_btn1" name="vidseo_host" value="vidseo_youtube" v-model="host" />
            <label for="vidseo_host_btn1" class="vidseo-youtube"><?php 
echo esc_html__( 'Youtube', 'vidseo' );
?></label>
        
            <input type="radio" id="vidseo_host_btn2" name="vidseo_host" value="vidseo_vimeo" v-model="host" />
            <label for="vidseo_host_btn2" class="vidseo-vimeo"><?php 
echo esc_html__( 'Vimeo', 'vidseo' );
?></label>
        
        </div>

        <div class="vidseo-alert">
            <span class="closebtn">&times;</span>
            <?php 
echo __( 'Please make sure to select proper host for video otherwise it will not work.', 'vidseo' );
?>
        </div>

    </div>

    <div v-if="content || host == 'vidseo_vimeo' || manual" class="vidseo-segment">
        <p class="post-attributes-label-wrapper">
            <label class="post-attributes-label" for="vidseo_content" style="display: inline-block;">
                <?php 
echo esc_html__( 'Transcription Text:', 'vidseo' );
?>
            </label>

            <?php 
?>
            <span class="vidseo-tooltip">

                <span class="dashicons dashicons-editor-help"></span>

                <span class="vidseo-tooltiptext">
                    <?php 
echo __( 'Please note that the FREE version only features a basic text area (no HTML allowed). If you want to format your content using the HTML Visual Rich Text editor, please upgrade to the PRO version', 'vidseo' );
?>
                </span>

            </span>
            <?php 
?>
        </p>

    <?php 
?>
            
        <div class="mb-15">
            <textarea id="vidseo_content" name="vidseo_content" rows="4" class="vidseo-area" v-model="content" :readonly="readonly ? true : null"></textarea>
            
            <div class="vidseo-alert vidseo-info">
                <span class="closebtn">&times;</span>
                <?php 
echo $get_pro . " " . sprintf( wp_kses( __( 'Visual Rich Text editor along with other awesome features, <a href="%s" target="_blank">Like this</a>', 'vidseo' ), array(
    'a' => array(
        'href'   => array(),
        'target' => array(),
    ),
) ), esc_url( plugin_dir_url( __FILE__ ) . '../assets/imgs/pro.png' ) );
?>
            </div>
        </div>

    <?php 
?>

    </div>

    <div class="vidseo-segment">
        <div v-if="error" class="vidseo-alert vidseo-danger" v-cloak>{{ error }}</div>
        
        <p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="vidseo_url"><?php 
echo esc_html__( 'Insert (or paste) the Video URL:', 'vidseo' );
?></label></p>
        
        <input id="vidseo_url" type="text" name="vidseo_url" v-model="url" value="<?php 
if ( !empty( $vidseo_url ) ) {
    echo $vidseo_url;
}
?>" class="mb-15 vidseo_input">
        
        
        <div v-if="host == 'vidseo_youtube' && !manual && !content" class="mb-15" v-cloak>
            <p><label class="post-attributes-label" for="vidseo_language"><?php 
echo esc_html__( 'Select CC language of the transcript to be used for this video (does not suit for "auto-generated subtitles")', 'vidseo' );
?></label></p>
            
            <select id="vidseo_language" class="vidseo_input" name="vidseo_language" v-model="languageId">
                <option v-for="language in languages" :key="language.code" :value="language.code">{{ language.name }}</option>
            </select>

            <?php 
if ( 'publish' !== get_post_status( $post->ID ) ) {
    ?>
                <div class="vidseo-alert">
                    <span class="closebtn">&times;</span>
                    <?php 
    echo __( 'Note: Youtube Auto Generated Subtitles/CC might not work. You can manually add Auto Generated Subtitles/CC', 'vidseo' );
    ?>
                </div>
            
        </div>
        <?php 
}
?>
        <?php 
//if ( !isset($vidseo_content) && empty($vidseo_content) )  {
?>
            <button v-if="host == 'vidseo_youtube' && !manual && !content" @click.prevent="getSubtitles"  class="vidseo-btn-lg mb-15">Get Youtube Subtitles/CC Automatically</button>
        <?php 
//}
?>
    </div>

    <div  v-if="host == 'vidseo_youtube' && !content" class="vidseo-segment">
        <button @click.prevent="manualSubtitles" class="vidseo-btn-lg">Add Transcripts Manually</button>
    </div>

    <?php 
if ( 'publish' !== get_post_status( $post->ID ) ) {
    ?>
        <div class="vidseo-alert">
            <span class="closebtn">&times;</span>
            <?php 
    echo __( 'Note: Auto subtitles/CC can be modified even if your post (with the embedded video) is already published', 'vidseo' );
    ?>
        </div>
    <?php 
}
?>
    
    <div class="vidseo-note">

        <p><?php 
echo __( 'Please note that the FREE version only features a basic text area (no HTML allowed). If you want to format your content using the HTML Visual Rich Text editor, please upgrade to the PRO version.', 'vidseo' );
?></p>

    </div>

</div>
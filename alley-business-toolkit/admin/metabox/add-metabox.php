<?php
/*=======================================================================*/
// Custom fields
/*=======================================================================*/

add_action("admin_init", "abt_addMetabox_init");
function abt_addMetabox_init(){

    //metabox for promotion posttype
    add_meta_box("disclaimer", "Disclaimer", "abt_add_disclaimer", "abt_promotion", "advanced", "default");
    add_meta_box("source", "Source", "abt_sources", "abt_testimonials", "advanced", "default");
    add_meta_box("position", "Position", "abt_position", "abt_team", "advanced", "default");
   }

//source
function abt_sources(){
    global $post;
    $custom = get_post_custom(get_the_ID());
    if (!empty($custom)){
        if(isset($custom['abt_source'])){
            $abt_source = $custom['abt_source'][0];
        }
        if(isset($custom['abt_source_link'])) {
            $abt_source_link = $custom['abt_source_link'][0];
        }
    }
    ?>
    <fieldset class="fieldset-2 related_pages test">
        <div class = "abt_metabox">
            <label>Source Text</label>
                <input type="text" name="abt_source" value="<?php if(isset($abt_source)) echo esc_html($abt_source);?>">
            <label>Source Link</label>
                <input type="url" name="abt_source_link" value="<?php if(isset($abt_source_link)) echo esc_url($abt_source_link);?>">
        </div>
    </fieldset>
    <?php
}   


// Disclaimer metabox
function abt_add_disclaimer() {
    global $post;
    $custom = get_post_custom(get_the_ID());
    if (!empty($custom)){
        if(isset($custom['abt_disclaimer'])){
            $selectDisclaimer = $custom['abt_disclaimer'][0];
        }
    }
    ?>
    <fieldset class="fieldset-2 related_pages test">
        <div class = "abt_metabox">
            <input type="text" name="abt_disclaimer" value="<?php if(isset($selectDisclaimer)) echo esc_html($selectDisclaimer);?>"  style="width: 100%;">
        </div>
    </fieldset>
    <?php
}

// Position metabox
function abt_position() {
    global $post;
    $custom = get_post_custom(get_the_ID());
    if (!empty($custom)){
        if(isset($custom['abt_position'])){
            $selectPosition = $custom['abt_position'][0];
        }
    }
    ?>
    <fieldset class="fieldset-2 related_pages test">
        <div class = "abt_metabox">
            <input type="text" name="abt_position" value="<?php if(isset($selectPosition)) echo esc_html($selectPosition);?>"  style="width: 100%;">
        </div>
    </fieldset>
    <?php
}

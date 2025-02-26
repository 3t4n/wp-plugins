<?php
 // foreach ($aFSVarList as $opt => $value){
 //   $value = "aFS".$value;
 //   $$value = '';
 // }



/*
    M E T A B O X E S
    =================
*/

/*
    Metabox for Posts and Other Content Types
*/
function aFSPostMetaBox(){
  $aFSOptions = get_option('aFSOpts');
  if(isset($aFSOptions['aFSJSCSSOff'])){
    $args = array(
     'public'   => true
    );
    $post_types = get_post_types($args);
    add_meta_box('aFSPostMB','Slides Settings','aFSPMB',$post_types,'side','low');
  }
}
aFSPostMetaBox();
function aFSPMB($post){
  $aFSPost = get_post_custom($post->ID);
  $aFSJSCSSOn = isset($aFSPost['aFSJSCSSOn']) ? $aFSPost['aFSJSCSSOn'][0] : '';
  wp_nonce_field('aFS_nonce','aFS_mb_nonce'); ?>
    <p>
      <input id="aFSJSCSSOn" type="checkbox" name="aFSJSCSSOn" value="1" <?php checked($aFSJSCSSOn,'1'); ?> />
      <label for="aFSJSCSSOn">Turn JS & CSS ON for this post.</label>
    </p>
<?php
}

/*
    Metabox for Slides
*/
add_action('edit_form_after_title','aFSMetaBoxPos');
function aFSMetaBoxPos(){
  global $post,$wp_meta_boxes;
  do_meta_boxes(get_current_screen(),'after_title',$post);
}
add_action('add_meta_boxes','aFSMetaBoxes');
function aFSMetaBoxes(){
  if(!current_user_can('manage_options'))return;
  add_meta_box('aFSMetabox','Slide Options','aFSMB','slides','after_title','high');
}
function aFSMB($post){
  $aFSVarList = array(
    'Prior','ldTyp','Class',
    'BgdOn','Bgd_Z','BgImg','BgdFx','BgdFl','BgdRp','BgdGr','BgdCo','BgdOp','BgdXY','BgdHL',
    'MnIOn','MnI_Z','MnImg','MnIFx','MnAlt','MnLnk','MTarg'
  );
  // global $aFSVarList;
  $aFSVals = get_post_custom($post->ID);
  foreach ($aFSVarList as $opt => $value){
    $value = "aFS".$value;
    $$value = isset($aFSVals[$value]) ? $aFSVals[$value][0] : '';
  }

  wp_nonce_field('aFSNonce','aFSMBNonce');
  function aFSSetPreview($color=NULL,$grad=NULL,$img=NULL,$fill=NULL,$repeat=NULL,$opac=NULL,$xy=NULL,$fixed=NULL){
    $css = '';
    if($grad){
      $css = $css     .'background-image: '.$grad.'; ';
    }
    if($color){
      $css = $css     .'background-color: '.$color.'; ';
    }
    if($opac){
      $css = $css     .'opacity: '.$opac.'; ';
    }
    if($img){
      $css = $css     .'background-image: url('.$img.'); ';
    }
    if($fill === 'contain'){
      $css = $css     .'background-size: contain; ';
    }
    elseif($fill === 'actual'){
      $css = $css     .'background-size: auto; ';
    }
    elseif($fill === 'stretch'){
      $css = $css     .'background-size: 100% 100%; ';
    }
    else{
      $css = $css     .'background-size: cover; ';
    }
    if($repeat === 'r'){
      $css = $css     .'background-repeat: repeat; ';
    }
    elseif($repeat === 'x'){
      $css = $css     .'background-repeat: repeat-x; ';
    }
    elseif($repeat === 'y'){
      $css = $css     .'background-repeat: repeat-y; ';
    }
    else{
      $css = $css     .'background-repeat: no-repeat; ';
    }
    $xp = "";
    $yp = "";
    if($xy === 'lt' || $xy === 'lm' || $xy === 'lb'){
      $xp = "0%";
    }
    elseif($xy === 'rt' || $xy === 'rm' || $xy === 'rb'){
      $xp = "100%";
    }
    else{
      $xp = "50%";
    }
    if($xy === 'lt' || $xy === 'ct' || $xy === 'rt'){
      $yp = "0%";
    }
    elseif($xy === 'lb' || $xy === 'cb' || $xy === 'rb'){
      $yp = "100%";
    }
    else{
      $yp = "50%";
    }
    $css = $css       .'background-position: '.$xp.' '.$yp.'; ';
    if($fixed){
      $css = $css     .'background-attachment: fixed;';
    }
    else{
      $css = $css     .'background-attachment: auto;';
    }
    echo 'style="'.$css.'"';
  }
  function aFSSwatches() { ?>
    <ul class="aFswatches">
      <li><span style="background: radial-gradient(circle, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 100%);"></span></li>
      <li><span style="background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 66%);"></span></li>
      <li><span style="background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 66%);"></span></li>
      <li><span style="background: radial-gradient(rgba(102,25,0,0) 10%, rgba(102,25,0,0.05) 30%, rgba(102,25,0,0.15) 50%, rgba(102,25,0,0.5) 100%);"></span></li>
      <li><span style="background: linear-gradient(45deg, #f7797d, #FBD786, #C6FFDD)"></span></li>
      <li><span style="background: linear-gradient(300deg, #3E5151, #DECBA4);"></span></li>
      <li><span style="background: linear-gradient(to bottom, #0f2027, #203a43, #2c5364);"></span></li>
      <li><span style="background: linear-gradient(to right, rgba(0,26,40,1) 0%, rgba(101,55,76,1) 46%, rgba(255,79,79,1) 100%);"></span></li>
      <li><span style="background: linear-gradient(217deg, rgba(255,0,0,1), rgba(255,0,0,0) 70.71%), linear-gradient(127deg, rgba(0,255,0,1), rgba(0,255,0,0) 70.71%), linear-gradient(336deg, rgba(0,0,255,1), rgba(0,0,255,0) 70.71%);"></span></li>
      <li><span style="background: repeating-linear-gradient(-45deg, transparent, transparent 1%, black 1%, black 2%);"></span></li>
    </ul>
<?php } ?>
    <label for="aFSPrior" class="labelcss">Priority:</label>
    <input id="aFSPrior" type="number" step="any" class="small-text" size="36" name="aFSPrior" value="<?php echo $aFSPrior; ?>" /> <span class="dashicons dashicons-info" title="Can be used to custom-sort Slides. Example: [slides orderby=slide]"></span>
    <br>
    <label for="aFSldTyp" class="labelcss">Type:</label>
    <label for="aFSTypeImgr" style="display:inline;padding-right: 12px;">
      <input type="radio" name="aFSldTyp" id="aFSTypeImgr" value="imagery" <?php if(isset( $aFSVals['aFSldTyp']))checked($aFSVals['aFSldTyp'][0],'imagery'); ?> />Imagery
    </label>
    <label for="aFSTypeCont" style="display:inline;padding-right: 12px;">
      <input type="radio" name="aFSldTyp" id="aFSTypeCont" value="content" <?php if(isset( $aFSVals['aFSldTyp']))checked($aFSVals['aFSldTyp'][0],'content'); ?> />Content
    </label> <span class="dashicons dashicons-info" title="(Requires theme or skin support.)"></span>
    <label for="aFSClass">
      <p>
        <div>CSS Classes:</div>
        <input id="aFSClass" type="text" class="full-text" size="36" name="aFSClass" value="<?php echo $aFSClass; ?>" />
        <span class="dashicons dashicons-info" title="Add CSS classes to this Slide as needed."></span>
      </p>
    </label>
  <section id="background-settings" class="wp-core-ui">
     <!-- aFSSetPreview($color=NULL,$grad=NULL,$img=NULL,$fill=NULL,$repeat=NULL,$opac=NULL,$xy=NULL,$fixed=NULL){ -->
    <div class="preview" <?php aFSSetPreview($aFSBgdCo,$aFSBgdGr,$aFSBgImg,$aFSBgdFl,$aFSBgdRp,'',$aFSBgdXY,$aFSBgdFx); ?>></div>
    <input id="aFSBgdOn" class="aFtoggle-indicator aFexpandr" type="checkbox" name="aFSBgdOn" value="1" <?php checked($aFSBgdOn,'1'); ?> aria-hidden="true" />
    <h3 class="wp-ui-text-highlight">Background
      <label for="aFSBgdOn">
        <span class="toggle-indicator" aria-hidden="true"></span>
      </label>
    </h3>
    <div class="aFexpand">
      <br>
      <div class="aFprllxpnds">
        <label for="aFSBgd_Z" class="labelcss">Z Position:</label>
        <div class="fieldcss">
          <input id="aFSBgd_Z" type="number" class="small-text" size="3" name="aFSBgd_Z" value="<?php echo $aFSBgd_Z; ?>" />
          <span class="description">Default for this layer: 1 </span> <span class="dashicons dashicons-info" title="For parallax effect. Numerical value only."></span>
        </div>
      </div>
      <label for="aFSBgImgBttn" class="labelcss">Source:
        <div class="aFclearbttn dashicons-before dashicons-no-alt"></div>
      </label>
      <div class="fieldcss">
        <input id="aFSBgdIm" type="text" class="aFsrcfield full-text" size="36" name="aFSBgImg" value="<?php echo $aFSBgImg; ?>" />
        <input id="aFSBgImgBttn" type="button" class="aFsrcbutton button" value="Choose Image" /> <span class="dashicons dashicons-info" title="Choose/upload a main image for this Slide."></span>
      </div>
      <br>
      <div class="aFcontract">
        <label for="aFSBgdFx" class="labelcss"><span class="aFhideTxt">Fixed </span>Scrolling:</label>
        <div class="fieldcss">
          <input id="aFSBgdFx" class="aFswitch" type="checkbox" name="aFSBgdFx" value="1" <?php checked($aFSBgdFx,'1'); ?> />
          <label class="aFswitch wp-core-ui" for="aFSBgdFx">
            <span class="aFswitch" style="display:none;">
              <b data-default="1" class="wp-ui-highlight">SCROLL</b>
              <b data-default="0" class="wp-ui-notification">FIXED</b>
            </span>
          </label>
        </div>
      </div>
      <label for="aFSBgdFl" class="labelcss">Fill:</label>
      <select id="aFSBgdFl" name="aFSBgdFl">
        <option value=""<?php         echo ($aFSBgdFl==''       )?'selected':''; ?>>Cover</option>
        <option value="contain"<?php  echo ($aFSBgdFl=='contain')?'selected':''; ?>>Contain</option>
        <option value="actual"<?php   echo ($aFSBgdFl=='actual' )?'selected':''; ?>>Actual Size</option>
        <option value="stretch"<?php  echo ($aFSBgdFl=='stretch')?'selected':''; ?>>Stretch</option>
      </select>
      <br>
      <label for="aFSBgdRp" class="labelcss">Repeat:</label>
      <select id="aFSBgdRp" name="aFSBgdRp">
        <option value=""<?php         echo ($aFSBgdRp==''       )?'selected':''; ?>>None</option>
        <option value="x"<?php  echo ($aFSBgdRp=='x')?'selected':''; ?>>Horizontally</option>
        <option value="y"<?php   echo ($aFSBgdRp=='y' )?'selected':''; ?>>Vertically</option>
        <option value="r"<?php  echo ($aFSBgdRp=='r')?'selected':''; ?>>All</option>
      </select>
      <br>
      <label for="aFSBgdGr" class="labelcss">Gradient:
        <div class="aFclearbttn dashicons-before dashicons-no-alt"></div>
      </label>
      <div class="fieldcss">
        <textarea id="aFSBgdGr" class="large-text" name="aFSBgdGr" rows="5"><?php echo $aFSBgdGr; ?></textarea>
        <?php aFSSwatches(); ?>
        <span class="description"><a href="https://cssgradient.io/" target="_blank">Gradient Generator<span class="dashicons dashicons-external" style="text-decoration: none;"> </span></a></span>
        <br>
      </div>
      <br>
      <label for="aFSBgdCo" class="labelcss">Color:
        <div class="aFclearbttn dashicons-before dashicons-no-alt"></div>
      </label>
      <input id="aFSBgdCo" type="text" class="full-text aFcolorpikr" size="36" name="aFSBgdCo" value="<?php echo $aFSBgdCo; ?>" />
      <br>
      <label for="aFSBgdXY" class="labelcss">X/Y Position:</label>
      <div class="fieldcss aFxycontrol">
        <input type="radio" name="aFSBgdXY" id="aFSBgdXYLT" value="lt" <?php if(isset( $aFSVals['aFSBgdXY']))checked($aFSVals['aFSBgdXY'][0],'lt'); ?> />
        <label for="aFSBgdXYLT" class="dashicons dashicons-arrow-up-alt aFdiagcount">Top Left </label>
        <input type="radio" name="aFSBgdXY" id="aFSBgdXYCT" value="ct" <?php if(isset( $aFSVals['aFSBgdXY']))checked($aFSVals['aFSBgdXY'][0],'ct'); ?> />
        <label for="aFSBgdXYCT" class="dashicons dashicons-arrow-up-alt">Top Center </label>
        <input type="radio" name="aFSBgdXY" id="aFSBgdXYRT" value="rt" <?php if(isset( $aFSVals['aFSBgdXY']))checked($aFSVals['aFSBgdXY'][0],'rt'); ?> />
        <label for="aFSBgdXYRT" class="dashicons dashicons-arrow-up-alt aFdiagclock">Top Right </label>
        <br>
        <input type="radio" name="aFSBgdXY" id="aFSBgdXYLC" value="lm" <?php if(isset( $aFSVals['aFSBgdXY']))checked($aFSVals['aFSBgdXY'][0],'lm'); ?> />
        <label for="aFSBgdXYLC" class="dashicons dashicons-arrow-left-alt">Center Left </label>
        <input type="radio" name="aFSBgdXY" id="aFSBgdXYCC" value="cm" <?php if(isset( $aFSVals['aFSBgdXY']))checked($aFSVals['aFSBgdXY'][0],'cm'); ?> />
        <label for="aFSBgdXYCC">Center Center </label>
        <input type="radio" name="aFSBgdXY" id="aFSBgdXYRC" value="rm" <?php if(isset( $aFSVals['aFSBgdXY']))checked($aFSVals['aFSBgdXY'][0],'rm'); ?> />
        <label for="aFSBgdXYRC" class="dashicons dashicons-arrow-right-alt">Center Right </label>
        <br>
        <input type="radio" name="aFSBgdXY" id="aFSBgdXYLB" value="lb" <?php if(isset( $aFSVals['aFSBgdXY']))checked($aFSVals['aFSBgdXY'][0],'lb'); ?> />
        <label for="aFSBgdXYLB" class="dashicons dashicons-arrow-down-alt aFdiagclock">Bottom Left </label>
        <input type="radio" name="aFSBgdXY" id="aFSBgdXYCB" value="cb" <?php if(isset( $aFSVals['aFSBgdXY']))checked($aFSVals['aFSBgdXY'][0],'cb'); ?> />
        <label for="aFSBgdXYCB" class="dashicons dashicons-arrow-down-alt">Bottom Center </label>
        <input type="radio" name="aFSBgdXY" id="aFSBgdXYRB" value="rb" <?php if(isset( $aFSVals['aFSBgdXY']))checked($aFSVals['aFSBgdXY'][0],'rb'); ?> />
        <label for="aFSBgdXYRB" class="dashicons dashicons-arrow-down-alt aFdiagcount">Bottom Right </label>
        <span class="aFxycoordinates wp-ui-highlight"></span>
      </div>
      <br>
      <label for="aFSBgdHL" class="labelcss">Raw HTML:</label>
      <div class="fieldcss">
        <textarea id="aFSBgdHL" class="large-text" style="resize:both;" name="aFSBgdHL" rows="5"><?php echo $aFSBgdHL; ?></textarea>
        <br>
      </div>
    </div>
  </section>

  <section id="main-image-settings" class="wp-core-ui">
    <div class="preview" <?php aFSSetPreview('','',$aFSMnImg,'contain','','','rm',''); ?>></div>
    <input id="aFSMnIOn" class="aFtoggle-indicator aFexpandr" type="checkbox" name="aFSMnIOn" value="1" <?php checked($aFSMnIOn,'1'); ?> aria-hidden="true" />
    <h3 class="wp-ui-text-highlight">Main Image
      <label for="aFSMnIOn">
        <span class="toggle-indicator" aria-hidden="true"></span>
      </label>
    </h3>
    <div class="aFexpand">
      <br>
      <div class="aFprllxpnds">
      </div>
      <label for="aFSMnImgBttn" class="labelcss">Source:
        <div class="aFclearbttn dashicons-before dashicons-no-alt"></div>
      </label>
      <div class="fieldcss">
        <input id="aFSMnIIm" type="text" class="aFsrcfield full-text" size="36" name="aFSMnImg" value="<?php echo $aFSMnImg; ?>" />
        <input id="aFSMnImgBttn" type="button" class="aFsrcbutton button" value="Choose Image" /> <span class="dashicons dashicons-info" title="Choose/upload a main image for this Slide."></span>
      </div>
      <br>
      <label for="aFSMnAltBttn" class="labelcss">Alt Attribute:
        <div class="aFclearbttn dashicons-before dashicons-no-alt"></div>
      </label>
      <div class="fieldcss">
        <input id="aFSMnAlt" type="text" class="aFsrcfield full-text" size="36" name="aFSMnAlt" value="<?php echo $aFSMnAlt; ?>" /> <span class="dashicons dashicons-info" title="Enter an alt attribute for this image (good for search engine ranking)."></span>
      </div>
      <br>
      <label for="aFSMnLnkBttn" class="labelcss">Link:
        <div class="aFclearbttn dashicons-before dashicons-no-alt"></div>
      </label>
      <div class="fieldcss">
        <input id="aFSMnLnk" type="text" class="aFsrcfield full-text" size="36" name="aFSMnLnk" value="<?php echo $aFSMnLnk; ?>" /> <span class="dashicons dashicons-info" title="See notice below."></span>
      </div>
      <br>
      <label for="aFSMTarg" class="labelcss">Open Link in New Tab:</label>
      <input id="aFSMTarg" type="checkbox" name="aFSMTarg" value="1" <?php checked($aFSMTarg,'1'); ?> class="checkcss" />
    </div>
  </section>

  <hr />
  <p class="wp-core-ui"><span class="dashicons dashicons-warning wp-ui-text-highlight"></span> <span class="description"><strong>Warning</strong>: The link selector (in this version of AddFunc Slides) highjacks the function used for adding links in the main editor (for Slides only, not Pages, Posts, etc.). The adverse result is that <span style="font-weight:bold;">after</span> you save the Slide, the <span style="font-style:normal;border:1px solid #ddd;display:inline-block;padding-left: 4px;padding-right: 4px;border-radius:2px;">link</span> Quicktag (in Text view) adds your chosen URL to the Slide Options <span style="font-style:normal;">Link</span> field instead of your highlighted text in the editor. Therefore, links have to be added in the editor manually or created in Visual mode. These are known issues. The Link field does however store any valid data that is entered.</span></p>

  <input type="hidden" name="aFSUpdateFlag" value="true" />
<?php
}
function aFSAdminCSS() {
  global $post_type;
  if($post_type === 'slides'){ ?>
  <style id="aFSAdminCSS" type="text/css">
    <?php $aFCSSInclude = file_get_contents(plugins_url('/css/admin.css', __FILE__).'?v='.time());
    echo $aFCSSInclude; ?>
  </style>
<?php }
}
add_action('admin_head', 'aFSAdminCSS');

function aFSAdminStyle() {
  global $post_type;
  if($post_type === 'slides'){
    wp_enqueue_style('minicolors', plugins_url('/css/jquery.minicolors.css', __FILE__)); //,'',time());
  }
}
add_action('admin_enqueue_scripts', 'aFSAdminStyle');

function aFSAdminJS() {
  global $post_type;
  if($post_type === 'slides'){
    wp_enqueue_media();
    wp_enqueue_script('addfunc-slides-admin',plugins_url('js/addfunc-slides-admin.js',__FILE__),array('jquery'),time());
    wp_enqueue_script('addfunc-slides-uploader',plugins_url('js/addfunc-slides-uploader.js',__FILE__),array('jquery'),time());
    wp_enqueue_script('minicolors',plugins_url('js/jquery.minicolors.min.js',__FILE__),array('jquery'));
  }
}
add_action('admin_enqueue_scripts','aFSAdminJS',11);
function aFSAdminJSConfig() {
  global $post_type;
  if($post_type === 'slides'){
    $js =  '<script id="minicolorsjs" type="text/javascript">'."\n"
          .'    var aFSswatches = [("White","#ffffff"),("Black","#000000")]'."\n"
          .'    $(\'input.aFcolorpikr\').minicolors({'."\n"
          .'      control: \'wheel\','."\n"
          .'      format: \'rgb\','."\n"
          .'      keywords: \'currentColor,inherit,initial,transparent\','."\n"
          .'      opacity: true,'."\n"
          .'      swatches: aFSswatches,'."\n"
          .'    });'."\n"
          .'</script>'."\n";
    echo $js;
  }
}
add_action('admin_footer', 'aFSAdminJSConfig');

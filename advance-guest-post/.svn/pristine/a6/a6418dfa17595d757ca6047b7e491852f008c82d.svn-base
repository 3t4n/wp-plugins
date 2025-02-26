 
  <form id="agp_upload_image_form" method="post" action="" enctype="multipart/form-data">

 <?php wp_nonce_field('agp_upload_image_form', 'agp_upload_image_form_submitted'); ?>
  <?php 
  $posttile = get_option('posttitle');
  $postdiscription = get_option('postdiscription');
  $postauthor = get_option('postauthor');
  $postcategory= get_option('postcategory');
  $uploadimage= get_option('uploadimage');
  $posttitleenabledisables = get_option('posttitleenabledisables'); 
  $postdiscriptionenabledisable = get_option('postdiscriptionenabledisable');
  $postauthorenabledisable  = get_option('postauthorenabledisable');
  $postcategoryenabledisable = get_option('postcategoryenabledisable');
  $uploadimageenabledisable = get_option('uploadimageenabledisable');
  $posttaxonomies = get_option('posttaxonomies');
  $enablecaptcha = get_option('captchaprivatekey');
   $producttags = get_option('producttags');
   $productshortdiscription = get_option('productshortdiscription');
    $tagsenabledisable = get_option('tagsenabledisable');
  $expertsenabledisable = get_option('expertsenabledisable');
  $multicategory = get_option('multicategory'); 
  ?>
  
  <?php if ($posttitleenabledisables == 'disable') { } else {?>
  <label id="labels" for="agp_image_caption"><?php if ( isset($posttile[0])) { echo get_option('posttitle'); } else { echo 'Post Title'; } ?>:</label><br/>
  
  <input type="text" id="agp_image_caption" name="agp_image_caption" value="<?php $agp_image_caption ; ?>"/><br/>
  <?php } ?>
  
    <?php if ($postdiscriptionenabledisable == 'disable') { } else {?>
  <label id="labels" for="agp_image_caption"><?php if ( isset($postdiscription[0])) { echo get_option('postdiscription'); } else { echo 'Post Discription'; } ?>:</label><br/>
  
  <?php  wp_editor( $content, 'agp_image_content', $settings = array('textarea_name' => agp_image_content) )  ; ?><br/>
    <?php } ?>
    
     <?php if ($postauthorenabledisable == 'disable') { } else {?>
     <div class="postbox ">
<h3 class="agphpost"><span><?php if ( isset($postauthor[0])) { echo get_option('postauthor'); } else { echo 'Post Author'; } ?></span></h3>

<div id="misc-publishing-actions">

  <input type="text" id="agp_image_caption" style="width:94%; display:block; margin: 10px auto 0px;"  name="agp_image_author" value=" <?php $agp_image_author ; ?>"/><br/>
         <div class="clear"></div>
</div>
</div>
     <?php } ?>
     
     
     <?php if ($postcategoryenabledisable == 'disable') { } else {?>
     
     <div class="postbox ">
<h3 class="agphpost"><span><?php if ( isset($postcategory[0])) { echo get_option('postcategory'); } else { echo 'Post Category'; } ?></span></h3>

<div id="misc-publishing-actions">
   
   
<br/>  
  
 <?php
	  if ( 'enable' == $multicategory ) {
 $posttaxonomies = get_option('posttaxonomies');

  $categories = get_categories('taxonomy='.$posttaxonomies.'&hide_empty=0');
  foreach($categories as $category){
 
        $select.= "<li class='popular-category' style='margin-left: 20px;'><label class='selectit'><input type='checkbox' name='category[]' value='".$category->name."'>".$category->name."</label></li>";
 
  }
 
  echo $select;
	  } else {
?>  

<?php echo agp_get_image_categories_dropdown($posttaxonomies, $category) ; } ?><br/>
     
      <div class="clear"></div>
</div>
</div>
<?php } ?>
      
      <?php if ($expertsenabledisable == 'disable') { } else {?>
<div class="postbox">
            
                <div class="handlediv"><br></div><h3 class="hndle"><span><?php if ( isset($productshortdiscription[0])) { echo get_option('productshortdiscription'); } else { echo 'Excerpt '; } ?>:</span></h3>
                 <div class="inside">
                        <div id="postcustomstuff">
                <div id="custom_box">
                
               <textarea name="excerpt" id="excerpt-post"  cols="8" rows="2"></textarea>
                </div>
                </div>
                </div>
                
            </div>
        <?php }?>   
        
         <?php if ($tagsenabledisable == 'disable') { } else {?>
  <div class="postbox ">
<h3 class="agphpost"><span><?php if ( isset($producttags[0])) { echo get_option('producttags'); } else { echo 'Product Tags'; } ?></span></h3>

<div id="misc-publishing-actions">

  <input type="text" style="width:94%; display:block;  margin: 10px auto 0px;" id="agp_image_caption" name="tags" value="<?php $agp_image_tags ; ?>"/><br/>
         <div class="clear"></div>
</div>
</div>
<?php } ?>  

       <?php if ($uploadimageenabledisable == 'disable') { } else {?>
            <div class="postbox ">
<h3 class="agphpost"><span><?php if ( isset($uploadimage[0])) { echo get_option('uploadimage'); } else { echo 'Upload Image'; } ?></span></h3>

<div id="misc-publishing-actions">

           <input type="button" value="Upload Feature" id="featured_id" class="<?php if ( 'require' == $featurerequire ) { echo 'require'; } ?>" />
   <div id="featured_stat"></div>

    <div class="featured_preview"></div>
    <input  style="display:none;"  name="featured_preview_input" id="featured_preview_input" >
           <div class="clear"></div>
</div>
</div>

      <?php } ?>
    <?php  
	$enablecaptcha = get_option('enablecaptcha');
  if ($enablecaptcha == 'disable') { } else { 
	$captchapublickey = get_option('captchapublickey');
        require_once('recaptchalib.php');
  $publickey = $captchapublickey; // you got this from the signup page
  echo recaptcha_get_html($publickey);
  }
  ?>
  <input type="submit" id="agp_submit" name="agp_submit" value="Submit">

  </form>
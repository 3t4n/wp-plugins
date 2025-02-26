<div class="container">
		<form method="post" class="form-inline" enctype="multipart/form-data" action="options.php"><?php wp_nonce_field('update-options'); ?>		
          <div class="col-md-12">
           <div class="col-md-3"><label for="font_color">Font Color:</label></div>           
            <div class="col-md-3">
               <input type="text" name="font_color" class="form-control font_color" value="<?php $font_color = get_option('font_color'); if(!empty($font_color)) {echo $font_color;}?>" data-default-color="#effeff"/>
            </div>          
        </div>
           <div class="col-md-12 m-t">
           <div class="col-md-3"><label for="font_hover_color">Font Hover Color:</label></div>           
            <div class="col-md-3">
              <input type="text" name="font_hover_color" class="form-control font_hover_color"  value="<?php $font_hover_color = get_option('font_hover_color'); if(!empty($font_hover_color)) {echo $font_hover_color;}?>" data-default-color="#effeff"/>
            </div>          
        </div> 
         <div class="col-md-12 m-t">
           <div class="col-md-3"><label for="font_size">Font Size:</label></div>           
            <div class="col-md-3">
               <input type="text" name="font_size" class="form-control"  value="<?php $font_size = get_option('font_size'); if(!empty($font_size)) {echo $font_size;}else{echo '12px';}?>"/>
            </div>          
        </div>
         <div class="col-md-12 m-t">
           <div class="col-md-3"><label for="background">Background:</label></div>           
            <div class="col-md-3">
               <input type="text" name="background"  class="form-control background"  value="<?php $background = get_option('background'); if(!empty($background)) {echo $background;}else {echo '#fff';} ?>" data-default-color="#effeff"/>
            </div>          
        </div>
        <div class="col-md-12 m-t">
           <div class="col-md-3"><label for="textalign">Text-Align:</label></div>           
            <div class="col-md-3">
                <select name="textalign" class="form-control">
                    <option><?php $textalign = get_option('textalign'); if(!empty($textalign)) {echo $textalign;}else{echo 'left';}  ?></option>
                    <option value="left">left</option>
                    <option value="right">right</option>
                    <option value="center">center</option>
                    <option value="justify">justify</option>
                    <option value="end">end</option>
                    <option value="initial">initial</option>
                    <option value="inherit">inherit</option>
                    <option value="start">start</option>
                </select>
            </div>          
        </div> 
        <div class="col-md-12 m-t">
           <div class="col-md-3"><label for="width">Width:</label></div>           
            <div class="col-md-3">
               <input type="text" name="width" class="form-control"  value="<?php $width = get_option('width'); if(!empty($width)) {echo $width;} else {echo "250px";}?>" />
            </div>          
        </div>             
<div class="col-md-12 m-t">
           <div class="col-md-3"><label for="height">Height: (optional, you can leave it blank)</label></div>           
            <div class="col-md-3">
               <input type="text" name="height" class="form-control"  value="<?php $height = get_option('height'); if(!empty($height)) {echo $height;} else {echo "auto";}?>" />
            </div>          
        </div>
                     <div class="col-md-12 m-t">
             <div class="col-md-3">
                 <button type="submit" class="btn btn-success" name="Submit"><?php _e('Update Options') ?></button>
            </div> 
        </div>                                                 
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="font_color,font_hover_color,font_size,background,textalign,width,height" /> 					    	
		</form>      
        <div class="left_section"> 
    <h3 class="title"><span>About <span style="float:right;">Version <b>1.0</b></span></span></h3>       
    <div class="title_block">Advanced Contact Details Plugin by Jeney Thomas. If you have any issue regarding the plugin then email me.
        <br /><br />If you need any customizations in your wordpress theme then feel free to contact me here: <a href="mailto:jeney.wordpress@gmail.com">jeney.wordpress@gmail.com</a>
    </div>
</div>
</div>	
<script type="text/javascript">
    jQuery(document).ready(function($){
    $('.font_color').wpColorPicker();
    $('.font_hover_color').wpColorPicker();
    $('.background').wpColorPicker();
});
    </script> 
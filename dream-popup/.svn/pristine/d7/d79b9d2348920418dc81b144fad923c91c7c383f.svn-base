<?php
defined('ABSPATH') || die("You Can't Access this File Directly");


if(isset($_REQUEST['editid'])){
  ?>

<style type="text/css">
  #update_data {
    display: block;
}
.all_popup_txt{
  display: none;
}
</style>
  <?php
}
?>


<div class="wrap">

<div id="all_popups_dv">
 <div class="all_popup_txt"> 
  <div id="mainhedingdv">
    <div class="myclsnew">Popups</div>
    <div class="myclsnewscnd"><?php echo '<a href="' . admin_url( 'admin.php?page=custom-plugin2' ) .'">Create New Popup</a>'?> </div>
  </div>
  <table>
    <tr class="trdvfst">
 	  <th>Name</th>
 	  <th>Shortcode</th>
 	  <th>Enabled</th>
 	  <th>Edit</th>
    <th>Delete</th>
   </tr>

           <?php

     global $wpdb;
     $results12 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}popupdata ", OBJECT );

        foreach ( $results12 as $key22=>$value22 ) { 
            $id = $results12[$key22]->id;           
            $name = $results12[$key22]->popupname;
            $title = $results12[$key22]->popuptitle;
            $contentpopup = $results12[$key22]->popuphtml;
            $class = $results12[$key22]->class;
            $enabled = $results12[$key22]->active;

            ?>

       <tr onmouseover="mouseOver(this)" onmouseout="mouseOut(this)">
       	<td><?php echo $name; ?></td>
       	<td>[popupmake-12 class="<?php echo $class; ?>"]</td>
       	<td><?php echo $enabled; ?></td>
       	<td id="editdata<?php echo $key22; ?>"  onclick="showupdtdata()" ><a href="?page=all-popups&editid=<?php echo $id; ?>"  class="editanchr">Edit</a></td>
        <td id="deletedata">      
          <i class="fa fa-window-close closepop" id="<?php echo $id ?>"></i>
        </td>
       </tr>

<?php
        }

            ?> 
            

</div> 

 </table>
 </div>	
 <form action="javascript:void(0)" method="post" id="popupdatanew">
 <div id="update_data">
  <?php
  global $wpdb;

  $edtid = sanitize_text_field($_REQUEST['editid']);

     $results123 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}popupdata WHERE id = '".$edtid."'" , OBJECT );

        foreach ( $results123 as $key223=>$value223 ) { 
            $title2 = $results123[$key223]->popuptitle;
            $class2 = $results123[$key223]->class;
            $btntext2 = $results123[$key223]->text;
            $contentpopup2 = $results123[$key223]->popuphtml;
            $Borderradius2 = $results123[$key223]->Border_radius;
            $Color2 = $results123[$key223]->Color;
            $bgcolor2 = $results123[$key223]->Background_Color;
            $BgColorhover2 = $results123[$key223]->Background_Color_hover;
            $BorderColor2 = $results123[$key223]->Border_Color;
            $BorderColorHover2 = $results123[$key223]->Border_Color_Hover;
            $BorderSize2 = $results123[$key223]->Border_Size;
            $FontSize2 = $results123[$key223]->Font_Size;
            $txtclrhover2 = $results123[$key223]->colorhover;
            $txtalign2 = $results123[$key223]->textalign;
            $btnszeupdte2 = $results123[$key223]->btnsze;
            $margin = $results123[$key223]->margin;
            $padding = $results123[$key223]->padding;
            $popfntsze = $results123[$key223]->popsize;
            $poptxtcolor = $results123[$key223]->popcolor;
            $popBgcolor = $results123[$key223]->popbgcolor;
            $popBordersize = $results123[$key223]->popbrdersze;
            $popBorderclr = $results123[$key223]->popbrdrclr;
            $popBorderradius = $results123[$key223]->popbrdrrads;
            $popMargin = $results123[$key223]->popmargin;
            $popPadding = $results123[$key223]->poppadding;
            $popwidth = $results123[$key223]->popwidth;
            $popclosebtnclr2 = $results123[$key223]->closebtnclr;
            $popanimation = $results123[$key223]->animation;
            $popopacity = $results123[$key223]->opacity;
            $poptransition = $results123[$key223]->transition;
            $popanimationspeed = $results123[$key223]->animationspeed;
            $titlesizeupdte = $results123[$key223]->titlesize;
            $titlecolorupdte = $results123[$key223]->titlecolor;
            $crossbtnszeupdte = $results123[$key223]->crossbtnsze;
            $opacityclr = $results123[$key223]->opacitycolor;
            $activecokie = $results123[$key223]->activecokie;
            $cokiename = $results123[$key223]->cookiename;
            $cokietime = $results123[$key223]->cookietime;
            $cokiehour = $results123[$key223]->cookietime2;
          }
            ?>
     <div class="popedttxtnewdata">
      <label>Edit Popup </label>
     </div>       
  <input type='hidden' name='id' value='<?php echo $edtid ?>'/>

  <label class="screen-reader" id="popup-prompt-text" for="popup-title"> Popup Title</label>
           
  <div id="updtetitle"> 
    <input type="text" name="post_updtettle" size="30" value="<?php echo $title2 ?>" id="titleupdt" spellcheck="true" autocomplete="off" placeholder="Popup Title" />
</div>

<!-- <label class="screen-reader" id="popup-prompt-cls" for="popup-title">Popup Class </label> -->
  <!-- <div id="updteclass">  -->
    <input type="hidden" name="post_updteclass" size="30" value="<?php echo $class2 ?>" id="classnewupdt" spellcheck="true" autocomplete="off" placeholder="Popup Title" />
<!-- </div> -->

<label class="screen-reader" id="popup-prompt-btntext" for="popup-title">Button Text </label>
  <div id="updtebtntxt"> 
    <input type="text" name="post_updtebtntxt" size="30" value="<?php echo $btntext2 ?>" id="btntxtupdt" spellcheck="true" autocomplete="off" placeholder="Button Text" />
</div>
 
  <div id="updtedata">

    <?php wp_editor( $contentpopup2 , 'desired_id_of_textarea', $settings = array('textarea_name'=>'updtecontnt') ); ?>

  </div>

<div class="customstyle">
    <div class="selectionTabDiv">
        <h2>Popup Setting</h2>
        <div class="selectionTabs">
          <div class="btnTab activeTab" onclick="changeTab(this, 'btn')"><h2>Button Style</h2></div><hr>
          <div class="btnTab" onclick="changeTab(this, 'pop')"><h2>Popup Style</h2></div><hr>
          <div class="btnTab" onclick="changeTab(this, 'cookie')"><h2>Add cookie</h2></div>
        </div>
    </div>
      <div class="btnstyledv" id="btnDiv">  
        <div class="selectionOption">
          <div onclick="changeBtnStyleTab(this, 'txt')" class="activeStyleTab">Text</div>
          <div onclick="changeBtnStyleTab(this, 'bg')">Background</div>
          <div onclick="changeBtnStyleTab(this, 'bdr')">Border</div>
          <div onclick="changeBtnStyleTab(this, 'sz')">Size</div>
        </div>  
        <div class="styleOption">
          <div class="label1 outerInp" id="txtDiv">
            <div class="innerInp"><label><strong>Size:</strong></label><input class="wp-w-40" type="text" name="fntszeupdte" value="<?php echo trim($FontSize2,"px") ?>"> px</div>
            <div class="innerInp"><label><strong>Color:</strong></label><input type="text" name="txtcolorupdte"  onpaste="updateColorValue(this)"  onkeydown="updateColorValue(this)" value="<?php echo $Color2 ?>"><input type="color" onchange="colorPicker(this)" value="<?php echo $Color2 ?>"></div>
            <div class="innerInp"><label><strong>Color on hover:</strong></label><input type="text" name="txthovercolorupdte" onpaste="updateColorValue(this)"  onkeydown="updateColorValue(this)" value="<?php echo $txtclrhover2 ?>"><input type="color" onchange="colorPicker(this)"  value="<?php echo $txtclrhover2 ?>"></div>
          </div>
          <div class="label2 outerInp hideTab" id="bgDiv">
            <div class="innerInp"><label><strong>Background color:</strong></label><input type="text" name="bgcolorupdte" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="<?php echo $bgcolor2 ?>"><input type="color" onchange="colorPicker(this)" value="<?php echo $bgcolor2 ?>"></div>
            <div class="innerInp"><label><strong>Background color on hover:</strong></label><input type="text" name="bgcolorhoverupdte" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="<?php echo $BgColorhover2 ?>"><input type="color" onchange="colorPicker(this)" value="<?php echo $BgColorhover2 ?>"></div>
          </div>
          <div class="label3 outerInp hideTab" id="bdrDiv">
            <div class="innerInp"><label><strong>Border size:</strong></label><input class="wp-w-40" type="text" name="bordersizeupdte" value="<?php echo $BorderSize2 ?>"> px</div>
            <div class="innerInp"><label><strong>Border color:</strong></label><input type="text" name="borderclrupdte" onpaste="updateColorValue(this)"  onkeydown="updateColorValue(this)" value="<?php echo trim($BorderColor2,"2px solid ") ?>"><input type="color" onchange="colorPicker(this)" value="<?php echo trim($BorderColor2,"2px solid ") ?>"></div>
            <div class="innerInp"><label><strong>Border radius:</strong></label><input class="wp-w-40" type="text" name="borderradiusupdte" value="<?php echo trim($Borderradius2,"px") ?>"> px</div>
            <div class="innerInp"><label><strong>Border color on hover:</strong></label><input type="text" name="borderhoverclrupdte" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)"  value="<?php echo trim($BorderColorHover2,"2px solid") ?>"><input type="color" onchange="colorPicker(this)" value="<?php echo trim($BorderColorHover2,"2px solid") ?>"></div> 
            
          </div>
          <div class="label4 outerInp hideTab" id="szDiv">
            <div class="innerInp"><label><strong>Width:</strong></label><input class="wp-w-40" type="text" name="btnsizeupdte" value="<?php echo $btnszeupdte2 ?>"> px</div>

           <div class="innerInp"><label><strong>Alignment:</strong></label>
                <select name="testalignupdte" id="alignmentslct"  value="<?php echo $txtalign2 ?>" class="<?php echo $txtalign2 ?>" >
                           <option value="left" id="left">left</option>
                           <option value="center" id="center">center</option>
                           <option value="right" id="right">right</option>
                            </select>
            </div>

            <div class="innerInp"><label><strong>Margin:</strong></label><input class="wp-w-40" type="text" name="margin" value="<?php echo $margin ?>"> px</div>
            <div class="innerInp"><label><strong>Padding:</strong></label><input class="wp-w-40" type="text" name="padding" value="<?php echo $padding ?>"> px</div>
          </div>
        </div>
      </div>
      <div class="btnstyledv hideTab" id="popDiv">
        <div class="selectionOption">
          <div onclick="changePopStyleTab(this, 'txtpop')" class="activePopStyleTab">Text</div>
          <div onclick="changePopStyleTab(this, 'bgpop')">Background</div>
          <div onclick="changePopStyleTab(this, 'bdrpop')">Border</div>
          <div onclick="changePopStyleTab(this, 'szpop')">Size</div>
          <div onclick="changePopStyleTab(this, 'animationpop')">Animation</div>
          <div onclick="changePopStyleTab(this, 'opacitypop')">Overlay</div>
           <div onclick="changePopStyleTab(this, 'closepop')">Close Button</div>
        </div>  
        <div class="styleOption">
          <div class="label1 outerInp" id="popTxtDiv">
            <div class="innerInp"><label><strong>Title Font Size:</strong></label><input class="wp-w-40" type="text" name="poptitlefntszeupdte" value="<?php echo $titlesizeupdte ?>"> px</div>
            <div class="innerInp"><label><strong>Title Color:</strong></label><input type="text" name="poptitlecolorupdte" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="<?php echo $titlecolorupdte ?>"><input type="color" onchange="colorPicker(this)" value="<?php echo $titlecolorupdte ?>"></div>
            <div class="innerInp"><label><strong>Size:</strong></label><input class="wp-w-40" type="text" name="popfntszeupdte" value="<?php echo $popfntsze ?>"> px</div>
            <div class="innerInp"><label><strong>Color:</strong></label><input type="text" name="poptxtcolorupdte" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="<?php echo $poptxtcolor ?>"><input type="color" onchange="colorPicker(this)" value="<?php echo $poptxtcolor ?>"></div>
          </div>
            
          </div>
          <div class="label2 outerInp hideTab" id="popBgDiv">
            <div class="innerInp"><label><strong>Background color:</strong></label><input type="text" name="popBgcolorupdte" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="<?php echo $popBgcolor ?>"><input type="color" onchange="colorPicker(this)" value="<?php echo $popBgcolor ?>"></div>
          </div>
          <div class="label3 outerInp hideTab" id="popBdrDiv">
            <div class="innerInp"><label><strong>Border size:</strong></label><input class="wp-w-40" type="text" name="popBordersizeupdte" value="<?php echo $popBordersize ?>"> px</div>
            <div class="innerInp"><label><strong>Border color:</strong></label><input type="text" name="popBorderclrupdte" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="<?php echo $popBorderclr ?>"><input type="color" onchange="colorPicker(this)" value="<?php echo $popBorderclr ?>"></div>
            <div class="innerInp"><label><strong>Border radius:</strong></label><input class="wp-w-40" type="text" name="popBorderradiusupdte" value="<?php echo $popBorderradius ?>"> px</div>
            
          </div>
          <div class="label4 outerInp hideTab" id="popSzDiv">
            <div class="innerInp"><label><strong>Width:</strong></label><!-- <input class="wp-w-40" type="text" name="popwidthupdte" value="<?php echo $popwidth  ?>"> --><select name="popwidthupdte" id="widthslct"  value="<?php echo $popwidth  ?>" class="<?php echo $popwidth  ?>">
                           <option value="30" id="30">30</option>
                           <option value="60" id="60">60</option>
                           <option value="90" id="90">90</option>
                           <option value="100" id="100">100</option>
                            </select> %</div>

            <div class="innerInp"><label><strong>Margin:</strong></label><input class="wp-w-40" type="text" name="popMarginupdte" value="<?php echo $popMargin ?>"> px</div>
            <div class="innerInp"><label><strong>Padding:</strong></label><input class="wp-w-40" type="text" name="popPaddingupdte" value="<?php echo $popPadding ?>"> px</div>
          </div>
          <div class="label5 outerInp hideTab" id="popanimationDiv">
            <div class="innerInp">
              <label><strong>Animation Type:</strong></label><br>
             <select name="popanimatupdte" id="animateslct"  value="<?php  echo $popanimation ?>" class="<?php  echo $popanimation ?>" >
                           <option value="None">None</option>
                           <option value="slidesfromleft" id="slidesfromleft">Slide from left</option>
                           <option value="slidesfromright" id="slidesfromright">Slide from right</option>
                           <option value="slidesfromtop" id="slidesfromtop">Slide from top</option>
                           <option value="slidesfrombottom" id="slidesfrombottom">Slide from bottom</option>
                           <option value="fade" id="fade" >Fade</option>
                          </select>
            </div>

            <div class="innerInp">
              <label><strong>Animation Speed:</strong></label><input  type="range" class="rangecls"  onchange="rangepicker(this)"  name="popanimatespdupdte" min ="50" max="2000" step="50" value="<?php  echo $popanimationspeed ?>" ><input class="wp-w-40" type="text" name="popanimatespdupdte" onkeydown="updateValue(this)" onpaste="updateValue(this)"  value="<?php  echo $popanimationspeed ?>">ms
            </div>

        </div>
        <div class="label6 outerInp hideTab" id="popopacityDiv">
           <div class="innerInp"><label><strong>Color:</strong></label><input type="text" name="opacitycolorupdate" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="<?php echo $opacityclr ?>"><input type="color" onchange="colorPicker(this)" value="<?php echo $opacityclr ?>"></div>
             <div class="innerInp">
              <label><strong>Opacity:</strong></label><input   type="range" class="rangecls"  onchange="rangepicker(this)"  name="popopacityupdte" min ="0" max="1" step="0.1" value="<?php  echo $popopacity ?>" ><input class="wp-w-40"  type="text" name="popopacityupdte"  onkeydown="updateValue(this)" onpaste="updateValue(this)" value="<?php echo $popopacity ?>">
            </div> 
            <div class="innerInp">
              <label><strong>Transition:</strong></label><input  type="range"  class="rangecls"  onchange="rangepicker(this)"  name="poptransitionupdte" min ="50" max="1000" step="50" value="<?php  echo $poptransition ?>" ><input class="wp-w-40"  type="text" name="poptransitionupdte" onkeydown="updateValue(this)" onpaste="updateValue(this)" value="<?php echo $poptransition ?>">ms
            </div>
            
          </div>

          <div class="label7 outerInp hideTab" id="popcloseDiv">
            <div class="innerInp"><label><strong>Close Button color:</strong></label><input type="text" name="popclosebtncolorupdte" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="<?php echo $popclosebtnclr2 ?>"><input type="color" onchange="colorPicker(this)" value="<?php echo $popclosebtnclr2 ?>"></div>
            <div class="innerInp"><label><strong>Close Button Size:</strong></label><input class="wp-w-40" type="text" name="popclosebtnszeupdte" value="<?php echo $crossbtnszeupdte ?>"> px</div>
          </div>
            
          </div>

         <div class="btnstyledv cokkiedv hideTab" id="cookieDiv">  
        <div class="selectionOption ">
          <div onclick="changecookieTab(this, 'active')" class="activeStyleTab">Cookie</div>
        </div> 
         <div class="styleOption">
         <div class="label1 outerInp" id="cokieDiv"> 
        <div class="innerInp checkbx" ><label><strong>Cookie Active:</strong></label><div class="cookedbnew"><input type="checkbox"  name="activecokieupdt" class="chkboxnew" value="<?php echo $activecokie; ?>" onclick="checkCookie(this)" id="actecokie"></div>
        </div>
        <div class="innerInp"><label><strong>Cookie Name:</strong></label><input type="text"  name="cookienameupdt" value="<?php echo $cokiename; ?>">
        </div>
        <div class="innerInp">
          <label><strong>Cookie Time:</strong></label>
          <input type="text"  name="cookietimeupdt" value="<?php echo $cokietime; ?>"><label>Days</label>
          <input type="text"  name="cookietimeupdt2" value="<?php echo $cokiehour ?>" ><label>Hours</label>
        </div>
      </div>
    </div>
      </div>

      </div>
  <div id="updtebtn">
    <input type="button" id="sbmtbttnupdt" class="udtedtacls" value="update">
  </div>
 </div> 
 </form>
</div>

</div>

<script>
  window.addEventListener('load',function(){
   var slctedwidth = document.getElementById('widthslct').className;
   var slctalignment = document.getElementById('alignmentslct').className;
    var slctedanimate = document.getElementById('animateslct').className;

  slctedwidth != 'None' || '' || null ?  document.getElementById(slctedwidth).setAttribute('selected', 'selected') : '';

  slctalignment != 'None' || '' || null ?  document.getElementById(slctalignment).setAttribute('selected', 'selected') : '';
 
 slctedanimate != 'None' || '' || null ? document.getElementById(slctedanimate).setAttribute('selected', 'selected') : '';

  var cookiee = document.getElementById('actecokie');
    if(cookiee.value == "true"){
        cookiee.checked = true;
    }

  })



//mouseover and mouseout script


function mouseOver(event) {
  event.getElementsByClassName('options')[0].classList.remove('hidecls');
}

function mouseOut(event) {
  event.getElementsByClassName('options')[0].classList.add('hidecls');
}


</script>

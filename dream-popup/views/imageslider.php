
<?php
defined('ABSPATH') || die("You Can't Access this File Directly");
?>

<div class="wrap">


<form action="javascript:void(0)" method="post" id="popupform">
<div class="wrap">
  <h1 class="wp-heading-inline">
  Create New Popup</h1>

  <div id="titledivnew">
<div id="titlewrap">
    <label class="screen-reader-text" id="title-prompt-text" for="title">Popup Name</label>

  <input type="text" name="post_name" size="30" value="" id="name" spellcheck="true" autocomplete="off" placeholder="Popup Name" />
</div>
        <p class="pum-desc">(Required) Enter a name to help you remember what this popup is about. Only you will see this.</p>
      <div class="inside">
  </div>
  <input type="hidden" id="samplepermalinknonce" name="samplepermalinknonce" value="c0746e5b93" />

<div id="popup-titlediv" class="pum-form">
        <div id="popup-titlewrap">
          <label class="screen-reader-text" id="popup-title-prompt-text" for="popup-title">
            Popup Title         </label>
          <input tabindex="2" name="popup_title" size="30" value="" id="title" autocomplete="off" placeholder="Popup Title" />
          <p class="pum-desc">(Optional) Shown as headline inside the popup. Can be left blank.</p>
        </div>
        <div id="popup-class">
          <label class="screen-reader-text" id="popup-classnew" for="popup-class">
            Popup class         </label>
          <input tabindex="2" name="popup_class" size="30" value="" id="popupclass" autocomplete="off" placeholder="Class Add" />
        </div>
        <div id="popup-txt">
          <label class="screen-reader-text" id="popup-text" for="popup-txtnew">
            Popup button text         </label>
          <input tabindex="2" name="popup_text" size="30" value="Button Text" id="popup-text_inp" autocomplete="off" placeholder="Button Text Add" />
        </div>
</div>

</div><!-- /titlediv -->

 <?php wp_editor( '' , 'desired_id_of_textarea', $settings = array('textarea_name'=>'mytext') ); ?> 


 <table id="post-status-info">
  <tbody>
    <tr>
      <td id="wp-word-count" class="hide-if-no-js">
      Word count: <span class="word-count">0</span> </td>
       <td class="autosave-info">
      <span class="autosave-message">&nbsp;</span>
      </td>
    <td id="content-resize-handle" class="hide-if-no-js"><br /></td>
  </tr></tbody>
  </table>


  <!-- popup setting start-->

 <div id="postbox-container-2" class="postbox-container">
   <div id="normal-sortables" class="meta-box-sortables">
  <div id="enabled_check ">
    <h2>Popup Enabled <input type="checkbox" id="enabled" value="1" name="checkbx" checked>  

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
            <div class="innerInp"><label><strong>Size:</strong></label><input class="wp-w-40" type="text" name="fntsze" value="14"> px</div>
            <div class="innerInp"><label><strong>Color:</strong></label><input type="text" name="txtcolor" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)"  value="#f6f6f6"><input type="color" onchange="colorPicker(this)" value="#f6f6f6"></div>
            <div class="innerInp"><label><strong>Color on hover:</strong></label><input type="text" name="txthovercolor" onpaste="updateColorValue(this)"  onkeydown="updateColorValue(this)" value="#267c8a"><input type="color" onchange="colorPicker(this)"  value="#267c8a"></div>
          </div>
          <div class="label2 outerInp hideTab" id="bgDiv">
            <div class="innerInp"><label><strong>Background color:</strong></label><input type="text" name="bgcolor" value="#267c8a" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)"><input type="color" onchange="colorPicker(this)" value="#267c8a"></div>
            <div class="innerInp"><label><strong>Background color on hover:</strong></label><input type="text" name="bgcolorhover" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="#f6f6f6"><input type="color" onchange="colorPicker(this)" value="#f6f6f6"></div>
          </div>
          <div class="label3 outerInp hideTab" id="bdrDiv">
            <div class="innerInp"><label><strong>Border size:</strong></label><input class="wp-w-40" type="text" name="bordersize" value="2"> px</div>
            <div class="innerInp"><label><strong>Border color:</strong></label><input type="text" name="borderclr" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="#267c8a"><input type="color" onchange="colorPicker(this)" value="#267c8a"></div>
            <div class="innerInp"><label><strong>Border radius:</strong></label><input class="wp-w-40" type="text" name="borderradius" value="4"> px</div>
            <div class="innerInp"><label><strong>Border color on hover:</strong></label><input type="text" name="borderhoverclr" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="#267c8a"><input type="color" onchange="colorPicker(this)" value="#267c8a"></div> 
          </div>
          <div class="label4 outerInp hideTab" id="szDiv">
            <div class="innerInp"><label><strong>Width:</strong></label><input class="wp-w-40" type="text" name="btnsize" value="125"> px</div>
            <div class="innerInp"><label><strong>Alignment:</strong></label>
                <select name="testalign" id="alignmentslct"  value="left">
                           <option value="left">left</option>
                           <option value="center">center</option>
                           <option value="right">right</option>
                            </select>
            </div>
            <div class="innerInp"><label><strong>Margin:</strong></label><input class="wp-w-40" type="text" name="marginbtn" value="0"> px</div>
            <div class="innerInp"><label><strong>Padding:</strong></label><input class="wp-w-40" type="text" name="paddingbtn" value="8"> px</div>
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
            <div class="innerInp"><label><strong>Title Size:</strong></label><input class="wp-w-40" type="text" name="poptitlefntsze" value="16"> px</div>
            <div class="innerInp"><label><strong>Title Color:</strong></label><input type="text" name="poptitlecolor" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="#020202"><input type="color" onchange="colorPicker(this)" value="#020202"></div>
            <div class="innerInp"><label><strong>Size:</strong></label><input class="wp-w-40" type="text" name="popfntsze" value="16"> px</div>
            <div class="innerInp"><label><strong>Color:</strong></label><input type="text" name="poptxtcolor" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="#020202"><input type="color" onchange="colorPicker(this)" value="#020202"></div>
          </div>
            
          </div>
          <div class="label2 outerInp hideTab" id="popBgDiv">
            <div class="innerInp"><label><strong>Background color:</strong></label><input type="text" name="popBgcolor" onpaste="updateColorValue(this)"  onkeydown="updateColorValue(this)" value="#d7dbe1"><input type="color" onchange="colorPicker(this)" value="#d7dbe1"></div>
          </div>
          <div class="label3 outerInp hideTab" id="popBdrDiv">
            <div class="innerInp"><label><strong>Border size:</strong></label><input class="wp-w-40" type="text" name="popBordersize" value="1"> px</div>
            <div class="innerInp"><label><strong>Border color:</strong></label><input type="text" name="popBorderclr" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="#d7dbe1"><input type="color" onchange="colorPicker(this)" value="#d7dbe1"></div>
            <div class="innerInp"><label><strong>Border radius:</strong></label><input class="wp-w-40" type="text" name="popBorderradius" value=""> px</div>
          </div>
          <div class="label4 outerInp hideTab" id="popSzDiv">
            <div class="innerInp"><label><strong>Width:</strong></label><!-- <input class="wp-w-40" type="text" name="popWidth" value="50"> -->
              <select name="popWidth" id="widthslct"  value="60">
                           <option value="30">30</option>
                           <option value="60">60</option>
                           <option value="90">90</option>
                           <option value="90">100</option>
                            </select> %</div>  
            <div class="innerInp"><label><strong>Margin:</strong></label><input class="wp-w-40" type="text" name="popMargin" value="0"> px</div>
            <div class="innerInp"><label><strong>Padding:</strong></label><input class="wp-w-40" type="text" name="popPadding" value="25"> px</div>
          </div>
           <div class="label5 outerInp hideTab" id="popanimationDiv">
            <div class="innerInp">
              <label><strong>Animation Type:</strong></label><br>
             <select name="popanimat" id="animateslct">
                           <option value="None">None</option>
                           <option value="slidesfromleft">Slide from left</option>
                           <option value="slidesfromright">Slide from right</option>
                           <option value="slidesfromtop">Slide from top</option>
                           <option value="slidesfrombottom">Slide from bottom</option>
                           <option value="fade">Fade</option>
                            </select>
            </div>
            <div class="innerInp">
              <label><strong>Animation Speed:</strong></label><input  type="range"  class="rangecls"  onchange="rangepicker(this)"  name="popanimatespd" min ="50" max="2000" step="50" value="0" ><input class="wp-w-40" type="text" name="popanimatespd" onkeydown="updateValue(this)" onpaste="updateValue(this)" value="0">ms
            </div>
            
          </div>
          <div class="label6 outerInp hideTab" id="popopacityDiv">
             <div class="innerInp"><label><strong>Color:</strong></label><input type="text" name="opacitycolor" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="#ffffff"><input type="color" onchange="colorPicker(this)" value="#ffffff"></div>
             <div class="innerInp">
              <label><strong>Opacity:</strong></label><input  type="range"  class="rangecls" onchange="rangepicker(this)"  name="popopacity" min ="0" max="1" step="0.1" value="0.5" ><input class="wp-w-40" type="text" name="popopacity"  onkeydown="updateValue(this)" onpaste="updateValue(this)" value="0.5">
            </div> 
             <div class="innerInp">
              <label><strong>Transition:</strong></label><input  type="range" class="rangecls"  onchange="rangepicker(this)"  name="poptransition" min ="50" max="1000" step="50" value="50" ><input class="wp-w-40"  type="text" name="poptransition"  onkeydown="updateValue(this)" onpaste="updateValue(this)" value="50">ms
            </div>
          </div>

        <div class="label7 outerInp hideTab" id="popcloseDiv">
            <div class="innerInp"><label><strong>Close Button color:</strong></label><input type="text" name="popclosebtncolor" onpaste="updateColorValue(this)" onkeydown="updateColorValue(this)" value="#da6363"><input type="color" onchange="colorPicker(this)" value="#da6363"></div>
            <div class="innerInp"><label><strong>Close Button Size:</strong></label><input class="wp-w-40" type="text" name="popclosebtnsze" value="20"> px</div>
          </div>

        </div>
          </div>
           <div class="btnstyledv cokkiedv hideTab" id="cookieDiv">  
        <div class="selectionOption ">
          <div onclick="changecookieTab(this, 'active')" class="activeStyleTab">Cookie</div>
        </div> 
         <div class="styleOption">
         <div class="label1 outerInp" id="cokieDiv"> 
        <div class="innerInp checkbx" ><label><strong>Cookie Active:</strong></label><div class="cookedbnew"><input type="checkbox"  name="activecokie" class="chkboxnew"></div>
        </div>
        <div class="innerInp"><label><strong>Cookie Name:</strong></label><input type="text"  name="cookiename">
        </div>
        <div class="innerInp"><label><strong>Cookie Time:</strong></label>
          <input type="text"  name="cookietime" value="01"><label>Days</label>
          <input type="text"  name="cookietime2" value="00" ><label>Hours</label>
        </div>
      </div>
    </div>
      </div>
      </div>
    <div id="pum_popup_settings" class="postbox " >
      <div class="postbox-header"><h2 class="hndle"><input type="button" id="submitdata" value="Publish"></h2>
    </div>
  
  </div>
</div>
  <!-- popup setting end -->

</div>

</form>
    
  <div id="popshortcde">
     <div id="shortcodedv">
      <i class="fa fa-times" onclick="hideShortCde()"></i>
      <h1 id="shrtcdehding">Congratulations</h1>
     <div id="shortcdedata">
      <h2 class="shrtcdetxt">[popupmake-12 class=</h2>
     </div>  
    </div>
 </div>

</div>

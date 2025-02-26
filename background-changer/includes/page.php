<?php
$xDBArr = unserialize(get_option('background_changer_values'));
?>
<div id="side-info-column" class="inner-sidebar"> </div>
<div class="wrap">
    <h2>Background Changer</h2>
</div>
<div id="poststuff" class="metabox-holder">
    <div id="post-body" class="has-sidebar">
        <div id="post-body-content" class="has-sidebar-content">
            <div id="titlediv">
                <form method="post" action="" id="background_changer_Form">
                    <div id="main-sortables" class="meta-box-sortables ui-sortable">
                        <div id="advman_format" class="postbox closed">
                            <div class="handlediv" title="Click to toggle">
                            </div>
                            <h3 class="handle">
                                <span>Hightlight Admin Comments  <?php  if($xDBArr[0][1]=="active") {echo "<span style=\"color:blue;\">- ACTIVE -</span>";}else {echo " . not active . ";}?>
                                </span>
                            </h3>
                            <div class="inside">
                                <div style="font-size: x-small; color: gray; margin-left:20px;">

                                    <p style="font-size:16px;">Highlight Admin Comments Tag active: <input type="checkbox" name="background_changer_state0" <?php  if($xDBArr[0][1]=="active") {echo "checked";}?> /></p>

                                    <p>You can change admin comments background color (highlight them with the color you want). <br/>
                                        <b style="color:#126109;">Use custom types:Default, Option 1 or Option 2 and if those don't work then use custom type and input tag id or class name.</b><br/>
                                    <h4>Type:</h4>
                                    <input type="radio" name="background_changer_type0" value="1" <?php if($xDBArr[0][2]=="1") {echo " checked ";} ?> /> Default(just comment-author-admin CSS class)
                                    <br/><input type="radio" name="background_changer_type0" value="2" <?php if($xDBArr[0][2]=="2") {echo " checked ";} ?> /> Option 1 (comment-node CSS class inside Default)
                                    <br/><input type="radio" name="background_changer_type0" value="3" <?php if($xDBArr[0][2]=="3") {echo " checked ";} ?> /> Option 2 (comment-body CSS class inside Default)
                                    <br/><input type="radio" name="background_changer_type0" value="4" <?php if($xDBArr[0][2]=="4") {echo " checked ";} ?> /> Custom (you input the CSS class or id inside Default) <br/>
                                    <input type="text" name="background_changer_tag0" value="<?php echo $xDBArr[0][3];?>"/>(with # or . at the beginning)

                                    <p>
				Click text-box to choose a color for your background.
                                    </p>
                                    <p><input type="text" name="background_changer_rgb0" value="<?php echo $xDBArr[0][4];?>" class="color" /></p>
                                    <br/>
				OR add <b>image background</b> link:
                                    <p><input type="text" name="background_changer_link0" id="background_changer_link0" value="<?php echo $xDBArr[0][5];?>" /><input type="button" value="Clear Link" onclick="document.getElementById('background_changer_link0').value='';"/></p>
                                    <br/>

                                    <p><input type="submit" value="Update"/></p>
                                    <input type="hidden" name="background_changer_Hidd0" value="background_changer_Hidd0"/>



                                </div>

                            </div>
                        </div>
                    </div>

                    <b>Number of tags to use</b>:<br/>
                    <select name="background_changer_number_of" onchange="jQuery('#background_changer_Form').submit();">
                        <?php
                        for($i=1;$i<=100;$i++) {
                            $xSelected='';
                            if($xDBArr[0][0]==$i) {$xSelected = " selected ";}
                            $option = '<option value="'.$i.'"'.$xSelected.'>';
                            $option .= $i;
                            //$option .= ' ('.$cat->category_count.')';
                            $option .= '</option>';
                            echo $option;
                        }
                        ?>
                    </select>( Click and select - it will submit content on selection )<br/><br/>
                    <?php
 /*
  * 0 state
  * 1 type
  * 2 tag
  * 3 rgb
  * 4 link
 */

                    for($i=1;$i<=$xDBArr[0][0];$i++) {
                        ?>
                    <div id="main-sortables" class="meta-box-sortables ui-sortable">
                        <div id="advman_format" class="postbox closed">
                            <div class="handlediv" title="Click to toggle">
                            </div>
                            <h3 class="handle">
                                <span>TAG #<?php echo $i;?>  <?php  if($xDBArr[$i][0]=="active") {echo "<span style=\"color:blue;\">- ACTIVE -</span>";}else {echo " . not active . ";}?>
                                </span>
                            </h3>
                            <div class="inside">
                                <div style="font-size: x-small; color: gray; margin-left:20px;">

                                    <p style="font-size:16px;">Tag #<?php echo $i;?> is active: <input type="checkbox" name="background_changer_state<?php echo $i;?>" <?php  if($xDBArr[$i][0]=="active") {echo "checked";}?> /></p>

                                    <p>Select Tag type and CSS Tag that you want to change (default Tag: BODY  , Default Type: Tag) <br/>
                                    <h4>Type:</h4>
                                    <input type="radio" name="background_changer_type<?php echo $i;?>" value="1" <?php if($xDBArr[$i][1]=="1") {echo " checked ";} ?> /> Tag
                                    <br/><input type="radio" name="background_changer_type<?php echo $i;?>" value="2" <?php if($xDBArr[$i][1]=="2") {echo " checked ";} ?> /> ID(#)
                                    <br/><input type="radio" name="background_changer_type<?php echo $i;?>" value="3" <?php if($xDBArr[$i][1]=="3") {echo " checked ";} ?> /> Class <br/>
                                    <input type="text" name="background_changer_tag<?php echo $i;?>" value="<?php echo $xDBArr[$i][2];?>"/>(just name! no # or . )

                                    <p>
				Click text-box to choose a color for your background.
                                    </p>
                                    <p><input type="text" name="background_changer_rgb<?php echo $i;?>" value="<?php echo $xDBArr[$i][3];?>" class="color" /></p>
                                    <br/>
				OR add <b>image background</b> link:
                                    <p><input type="text" name="background_changer_link<?php echo $i;?>" id="background_changer_link<?php echo $i;?>" value="<?php echo $xDBArr[$i][4];?>" /><input type="button" value="Clear Link" onclick="document.getElementById('background_changer_link<?php echo $i;?>').value='';"/></p>
                                    <br/>

                                    <p><input type="submit" value="Update"/></p>
                                    <input type="hidden" name="background_changer_Hidd<?php echo $i;?>" value="background_changer_Hidd<?php echo $i;?>"/>



                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>

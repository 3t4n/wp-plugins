<?php if ( ! defined( 'ABSPATH' ) ) exit;

$fmcfSetOptionValArr = fmcf_get_clr_set_data();

?>
<div class="fmcf_main_container">
<h1 class="fmcf_main_title">Font Plugin</h1>
<ul>
  <li class="fmcf_tab"><a href="<?php echo admin_url('admin.php?page=fmcf-upload-fonts-page');?>">Upload Fonts</a></li>
  <li class="fmcf_tab"><a href="<?php echo admin_url('admin.php?page=fmcf-google-fonts');?>">Google Fonts</a></li>
  <li class="fmcf_tab"><a href="<?php echo admin_url('admin.php?page=fmcf-assign-fonts');?>">Assign Fonts</a></li>
  <li class="fmcf_tab fmcf_tabSelected"><a>Color Settings</a><span class="fmcf_active_tab"></span></li>
</ul>

<div class="font_assign_list">
  <form method="post" enctype="multipart">
    <input type="hidden" name="fmcfAssignClrAction" value="fmcfAssignClrData">
    <?php include FMCF_DIR_PATH.'views/fmcf-main.php';  ?>
  <table class="font_list_table">
    <tr>
      <th>Element</th>
      <th>Color</th>
      <th>Activate (Yes or No)</th>
      <th>Element</th>
      <th>Color</th>
      <th>Activate (Yes or No)</th>
    </tr>

    <tr>
      <td id="fmcfCapH1" style="color:<?php echo (isset($fmcfSetOptionValArr['h1']['color'])) ? $fmcfSetOptionValArr['h1']['color'] : ''; ?> ;">h1 (Heading 1)</td>

      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfH1SetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][0]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['h1']['color'])) ? $fmcfSetOptionValArr['h1']['color'] : '#000000'; ?>"  data-id="fmcfCapH1" <?php echo (isset($fmcfSetOptionValArr['h1']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfH1SetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][0]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['h1']['color'])) ? $fmcfSetOptionValArr['h1']['color'] : '#000000'; ?>"  data-id="fmcfCapH1" <?php echo (isset($fmcfSetOptionValArr['h1']['color'])) ? '' : 'disabled'; ?>>

      </td>

      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate0" id="fmcfActivate0Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfH1SetClr" <?php echo (isset($fmcfSetOptionValArr['h1']['active']) && $fmcfSetOptionValArr['h1']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate0Y">Yes</label></span>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate0" id="fmcfActivate0N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfH1SetClr" <?php echo (isset($fmcfSetOptionValArr['h1']['active']) && $fmcfSetOptionValArr['h1']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate0N">No</label></span>
      </td>

      <td id="fmcfCapH2" style="color:<?php echo (isset($fmcfSetOptionValArr['h2']['color'])) ? $fmcfSetOptionValArr['h2']['color'] : ''; ?> ;">h2 (Heading 2)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfH2SetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][1]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['h2']['color'])) ? $fmcfSetOptionValArr['h2']['color'] : '#000000'; ?>"  data-id="fmcfCapH2" <?php echo (isset($fmcfSetOptionValArr['h2']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfH2SetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][1]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['h2']['color'])) ? $fmcfSetOptionValArr['h2']['color'] : '#000000'; ?>"  data-id="fmcfCapH2" <?php echo (isset($fmcfSetOptionValArr['h2']['color'])) ? '' : 'disabled'; ?>>

      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate1" id="fmcfActivate1Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfH2SetClr" <?php echo (isset($fmcfSetOptionValArr['h2']['active']) && $fmcfSetOptionValArr['h2']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate1Y">Yes</label></span>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate1" id="fmcfActivate1N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfH2SetClr" <?php echo (isset($fmcfSetOptionValArr['h2']['active']) && $fmcfSetOptionValArr['h2']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate1N">No</label></span>
      </td>
    </tr>

    <tr>
      <td id="fmcfCapH3" style="color:<?php echo (isset($fmcfSetOptionValArr['h3']['color'])) ? $fmcfSetOptionValArr['h3']['color'] : ''; ?> ;">h3 (Heading 3)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfH3SetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][2]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['h3']['color'])) ? $fmcfSetOptionValArr['h3']['color'] : '#000000'; ?>"  data-id="fmcfCapH3" <?php echo (isset($fmcfSetOptionValArr['h3']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfH3SetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][2]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['h3']['color'])) ? $fmcfSetOptionValArr['h3']['color'] : '#000000'; ?>"  data-id="fmcfCapH3" <?php echo (isset($fmcfSetOptionValArr['h3']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate2" id="fmcfActivate2Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfH3SetClr" <?php echo (isset($fmcfSetOptionValArr['h3']['active']) && $fmcfSetOptionValArr['h3']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate2Y">Yes</label></span>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate2" id="fmcfActivate2N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfH3SetClr" <?php echo (isset($fmcfSetOptionValArr['h3']['active']) && $fmcfSetOptionValArr['h3']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate2N">No</label></span>
      </td>
      <td id="fmcfCapH4" style="color:<?php echo (isset($fmcfSetOptionValArr['h4']['color'])) ? $fmcfSetOptionValArr['h4']['color'] : ''; ?> ;">h4 (Heading 4)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfH4SetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][3]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['h4']['color'])) ? $fmcfSetOptionValArr['h4']['color'] : '#000000'; ?>"  data-id="fmcfCapH4" <?php echo (isset($fmcfSetOptionValArr['h4']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfH4SetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][3]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['h4']['color'])) ? $fmcfSetOptionValArr['h4']['color'] : '#000000'; ?>"  data-id="fmcfCapH4" <?php echo (isset($fmcfSetOptionValArr['h4']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate3" id="fmcfActivate3Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfH4SetClr" <?php echo (isset($fmcfSetOptionValArr['h4']['active']) && $fmcfSetOptionValArr['h4']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate3Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate3" id="fmcfActivate3N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfH4SetClr" <?php echo (isset($fmcfSetOptionValArr['h4']['active']) && $fmcfSetOptionValArr['h4']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate3N">No</label></span>
      </td>
    </tr>

    <tr>
      <td id="fmcfCapH5" style="color:<?php echo (isset($fmcfSetOptionValArr['h5']['color'])) ? $fmcfSetOptionValArr['h5']['color'] : ''; ?> ;">h5 (Heading 5)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfH5SetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][4]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['h5']['color'])) ? $fmcfSetOptionValArr['h5']['color'] : '#000000'; ?>"  data-id="fmcfCapH5" <?php echo (isset($fmcfSetOptionValArr['h5']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfH5SetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][4]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['h5']['color'])) ? $fmcfSetOptionValArr['h5']['color'] : '#000000'; ?>"  data-id="fmcfCapH5" <?php echo (isset($fmcfSetOptionValArr['h5']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate4" id="fmcfActivate4Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfH5SetClr" <?php echo (isset($fmcfSetOptionValArr['h5']['active']) && $fmcfSetOptionValArr['h5']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate4Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate4" id="fmcfActivate4N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfH5SetClr" <?php echo (isset($fmcfSetOptionValArr['h5']['active']) && $fmcfSetOptionValArr['h5']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate4N">No</label></span>
      </td>
      <td id="fmcfCapH6" style="color:<?php echo (isset($fmcfSetOptionValArr['h6']['color'])) ? $fmcfSetOptionValArr['h6']['color'] : ''; ?> ;">h6 (Heading 6)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfH6SetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][5]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['h6']['color'])) ? $fmcfSetOptionValArr['h6']['color'] : '#000000'; ?>"  data-id="fmcfCapH6" <?php echo (isset($fmcfSetOptionValArr['h6']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfH6SetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][5]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['h6']['color'])) ? $fmcfSetOptionValArr['h6']['color'] : '#000000'; ?>"  data-id="fmcfCapH6" <?php echo (isset($fmcfSetOptionValArr['h6']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate5" id="fmcfActivate5Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfH6SetClr" <?php echo (isset($fmcfSetOptionValArr['h6']['active']) && $fmcfSetOptionValArr['h6']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate5Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate5" id="fmcfActivate5N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfH6SetClr" <?php echo (isset($fmcfSetOptionValArr['h6']['active']) && $fmcfSetOptionValArr['h6']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate5N">No</label></span>
      </td>
    </tr>

    <tr>
      <td id="fmcfCapP" style="color:<?php echo (isset($fmcfSetOptionValArr['p']['color'])) ? $fmcfSetOptionValArr['p']['color'] : ''; ?> ;">p (p tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfPSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][6]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['p']['color'])) ? $fmcfSetOptionValArr['p']['color'] : '#000000'; ?>"  data-id="fmcfCapP" <?php echo (isset($fmcfSetOptionValArr['p']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfPSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][6]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['p']['color'])) ? $fmcfSetOptionValArr['p']['color'] : '#000000'; ?>"  data-id="fmcfCapP" <?php echo (isset($fmcfSetOptionValArr['p']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate6" id="fmcfActivate6Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfPSetClr" <?php echo (isset($fmcfSetOptionValArr['p']['active']) && $fmcfSetOptionValArr['p']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate6Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate6" id="fmcfActivate6N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfPSetClr" <?php echo (isset($fmcfSetOptionValArr['p']['active']) && $fmcfSetOptionValArr['p']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate6N">No</label></span>
      </td>


      <td id="fmcfCapA" style="color:<?php echo (isset($fmcfSetOptionValArr['a']['color'])) ? $fmcfSetOptionValArr['a']['color'] : ''; ?> ;">a (anchor tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfASetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][7]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['a']['color'])) ? $fmcfSetOptionValArr['a']['color'] : '#000000'; ?>"  data-id="fmcfCapA" <?php echo (isset($fmcfSetOptionValArr['a']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfASetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][7]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['a']['color'])) ? $fmcfSetOptionValArr['a']['color'] : '#000000'; ?>"  data-id="fmcfCapA" <?php echo (isset($fmcfSetOptionValArr['a']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate7" id="fmcfActivate7Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfASetClr" <?php echo (isset($fmcfSetOptionValArr['a']['active']) && $fmcfSetOptionValArr['a']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate7Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate7" id="fmcfActivate7N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfASetClr" <?php echo (isset($fmcfSetOptionValArr['a']['active']) && $fmcfSetOptionValArr['a']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate7N">No</label></span>
      </td>
    </tr>

    <tr>
      
      <td id="fmcfCapB" style="color:<?php echo (isset($fmcfSetOptionValArr['b']['color'])) ? $fmcfSetOptionValArr['b']['color'] : ''; ?> ;">b (bold tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfBSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][8]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['b']['color'])) ? $fmcfSetOptionValArr['b']['color'] : '#000000'; ?>"  data-id="fmcfCapB" <?php echo (isset($fmcfSetOptionValArr['b']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfBSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][8]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['b']['color'])) ? $fmcfSetOptionValArr['b']['color'] : '#000000'; ?>"  data-id="fmcfCapB" <?php echo (isset($fmcfSetOptionValArr['b']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate8" id="fmcfActivate8Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfBSetClr" <?php echo (isset($fmcfSetOptionValArr['b']['active']) && $fmcfSetOptionValArr['b']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate8Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate8" id="fmcfActivate8N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfBSetClr" <?php echo (isset($fmcfSetOptionValArr['b']['active']) && $fmcfSetOptionValArr['b']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate8N">No</label></span>
      </td>

      <td id="fmcfCapBody" style="color:<?php echo (isset($fmcfSetOptionValArr['body']['color'])) ? $fmcfSetOptionValArr['body']['color'] : ''; ?> ;">body (body tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfBodySetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][9]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['body']['color'])) ? $fmcfSetOptionValArr['body']['color'] : '#000000'; ?>"  data-id="fmcfCapBody" <?php echo (isset($fmcfSetOptionValArr['body']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfBodySetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][9]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['body']['color'])) ? $fmcfSetOptionValArr['body']['color'] : '#000000'; ?>"  data-id="fmcfCapBody" <?php echo (isset($fmcfSetOptionValArr['body']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate9" id="fmcfActivate9Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfBodySetClr" <?php echo (isset($fmcfSetOptionValArr['body']['active']) && $fmcfSetOptionValArr['body']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate9Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate9" id="fmcfActivate9N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfBodySetClr" <?php echo (isset($fmcfSetOptionValArr['body']['active']) && $fmcfSetOptionValArr['body']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate9N">No</label></span>
      </td>
    </tr>

    <tr>

       <td id="fmcfCapSpan" style="color:<?php echo (isset($fmcfSetOptionValArr['span']['color'])) ? $fmcfSetOptionValArr['span']['color'] : ''; ?> ;">span (span tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfSpanSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][10]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['span']['color'])) ? $fmcfSetOptionValArr['span']['color'] : '#000000'; ?>"  data-id="fmcfCapSpan" <?php echo (isset($fmcfSetOptionValArr['span']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfSpanSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][10]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['span']['color'])) ? $fmcfSetOptionValArr['span']['color'] : '#000000'; ?>"  data-id="fmcfCapSpan" <?php echo (isset($fmcfSetOptionValArr['span']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate10" id="fmcfActivate10Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfSpanSetClr" <?php echo (isset($fmcfSetOptionValArr['span']['active']) && $fmcfSetOptionValArr['span']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate10Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate10" id="fmcfActivate10N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfSpanSetClr" <?php echo (isset($fmcfSetOptionValArr['span']['active']) && $fmcfSetOptionValArr['span']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate10N">No</label></span>
      </td>

      <td id="fmcfCapUl" style="color:<?php echo (isset($fmcfSetOptionValArr['ul']['color'])) ? $fmcfSetOptionValArr['ul']['color'] : ''; ?> ;">ul (unordered list tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfUlSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][11]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['ul']['color'])) ? $fmcfSetOptionValArr['ul']['color'] : '#000000'; ?>"  data-id="fmcfCapUl" <?php echo (isset($fmcfSetOptionValArr['ul']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfUlSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][11]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['ul']['color'])) ? $fmcfSetOptionValArr['ul']['color'] : '#000000'; ?>"  data-id="fmcfCapUl" <?php echo (isset($fmcfSetOptionValArr['ul']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate11" id="fmcfActivate11Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfUlSetClr" <?php echo (isset($fmcfSetOptionValArr['ul']['active']) && $fmcfSetOptionValArr['ul']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate11Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate11" id="fmcfActivate11N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfUlSetClr" <?php echo (isset($fmcfSetOptionValArr['ul']['active']) && $fmcfSetOptionValArr['ul']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate11N">No</label></span>
      </td>
    </tr>

    <tr>

      <td id="fmcfCapLi" style="color:<?php echo (isset($fmcfSetOptionValArr['li']['color'])) ? $fmcfSetOptionValArr['li']['color'] : ''; ?> ;">li (list tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfLiSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][12]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['li']['color'])) ? $fmcfSetOptionValArr['li']['color'] : '#000000'; ?>"  data-id="fmcfCapLi" <?php echo (isset($fmcfSetOptionValArr['li']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfLiSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][12]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['li']['color'])) ? $fmcfSetOptionValArr['li']['color'] : '#000000'; ?>"  data-id="fmcfCapLi" <?php echo (isset($fmcfSetOptionValArr['li']['color'])) ? '' : 'disabled'; ?>>

      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate12" id="fmcfActivate12Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfLiSetClr" <?php echo (isset($fmcfSetOptionValArr['li']['active']) && $fmcfSetOptionValArr['li']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate12Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate12" id="fmcfActivate12N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfLiSetClr" <?php echo (isset($fmcfSetOptionValArr['li']['active']) && $fmcfSetOptionValArr['li']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate12N">No</label></span>
      </td>

      <td id="fmcfCapOl" style="color:<?php echo (isset($fmcfSetOptionValArr['ol']['color'])) ? $fmcfSetOptionValArr['ol']['color'] : ''; ?> ;">ol (ordered list tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfOlSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][13]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['ol']['color'])) ? $fmcfSetOptionValArr['ol']['color'] : '#000000'; ?>"  data-id="fmcfCapOl" <?php echo (isset($fmcfSetOptionValArr['ol']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfOlSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][13]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['ol']['color'])) ? $fmcfSetOptionValArr['ol']['color'] : '#000000'; ?>"  data-id="fmcfCapOl" <?php echo (isset($fmcfSetOptionValArr['ol']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate13" id="fmcfActivate13Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfOlSetClr" <?php echo (isset($fmcfSetOptionValArr['ol']['active']) && $fmcfSetOptionValArr['ol']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate13Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate13" id="fmcfActivate13N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfOlSetClr" <?php echo (isset($fmcfSetOptionValArr['ol']['active']) && $fmcfSetOptionValArr['ol']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate13N">No</label></span>
      </td>
      
    </tr>

    <tr>
        
        <td id="fmcfCapI" style="color:<?php echo (isset($fmcfSetOptionValArr['i']['color'])) ? $fmcfSetOptionValArr['i']['color'] : ''; ?> ;">i (i tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfISetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][14]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['i']['color'])) ? $fmcfSetOptionValArr['i']['color'] : '#000000'; ?>"  data-id="fmcfCapI" <?php echo (isset($fmcfSetOptionValArr['i']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfISetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][14]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['i']['color'])) ? $fmcfSetOptionValArr['i']['color'] : '#000000'; ?>"  data-id="fmcfCapI" <?php echo (isset($fmcfSetOptionValArr['i']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate14" id="fmcfActivate14Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfISetClr" <?php echo (isset($fmcfSetOptionValArr['i']['active']) && $fmcfSetOptionValArr['i']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate14Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate14" id="fmcfActivate14N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfISetClr" <?php echo (isset($fmcfSetOptionValArr['i']['active']) && $fmcfSetOptionValArr['i']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate14N">No</label></span>
      </td>

      <td id="fmcfCapEm" style="color:<?php echo (isset($fmcfSetOptionValArr['em']['color'])) ? $fmcfSetOptionValArr['em']['color'] : ''; ?> ;">em (emphasis tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfEmSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][15]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['em']['color'])) ? $fmcfSetOptionValArr['em']['color'] : '#000000'; ?>"  data-id="fmcfCapEm" <?php echo (isset($fmcfSetOptionValArr['em']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfEmSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][15]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['em']['color'])) ? $fmcfSetOptionValArr['em']['color'] : '#000000'; ?>"  data-id="fmcfCapEm" <?php echo (isset($fmcfSetOptionValArr['em']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate15" id="fmcfActivate15Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfEmSetClr" <?php echo (isset($fmcfSetOptionValArr['em']['active']) && $fmcfSetOptionValArr['em']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate15Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate15" id="fmcfActivate15N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfEmSetClr" <?php echo (isset($fmcfSetOptionValArr['em']['active']) && $fmcfSetOptionValArr['em']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate15N">No</label></span>
      </td>

    </tr>

    <tr>
      <td id="fmcfCapTable" style="color:<?php echo (isset($fmcfSetOptionValArr['table']['color'])) ? $fmcfSetOptionValArr['table']['color'] : ''; ?> ;">table (table tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfTableSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][16]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['table']['color'])) ? $fmcfSetOptionValArr['table']['color'] : '#000000'; ?>"  data-id="fmcfCapTable" <?php echo (isset($fmcfSetOptionValArr['table']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfTableSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][16]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['table']['color'])) ? $fmcfSetOptionValArr['table']['color'] : '#000000'; ?>"  data-id="fmcfCapTable" <?php echo (isset($fmcfSetOptionValArr['table']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate16" id="fmcfActivate16Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfTableSetClr" <?php echo (isset($fmcfSetOptionValArr['table']['active']) && $fmcfSetOptionValArr['table']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate16Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate16" id="fmcfActivate16N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfTableSetClr" <?php echo (isset($fmcfSetOptionValArr['table']['active']) && $fmcfSetOptionValArr['table']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate16N">No</label></span>
      </td>

      <td id="fmcfCapTr" style="color:<?php echo (isset($fmcfSetOptionValArr['tr']['color'])) ? $fmcfSetOptionValArr['tr']['color'] : ''; ?> ;">tr (tr tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfTrSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][17]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['tr']['color'])) ? $fmcfSetOptionValArr['tr']['color'] : '#000000'; ?>"  data-id="fmcfCapTr" <?php echo (isset($fmcfSetOptionValArr['tr']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfTrSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][17]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['tr']['color'])) ? $fmcfSetOptionValArr['tr']['color'] : '#000000'; ?>"  data-id="fmcfCapTr" <?php echo (isset($fmcfSetOptionValArr['tr']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate17" id="fmcfActivate17Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfTrSetClr" <?php echo (isset($fmcfSetOptionValArr['tr']['active']) && $fmcfSetOptionValArr['tr']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate17Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate17" id="fmcfActivate17N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfTrSetClr" <?php echo (isset($fmcfSetOptionValArr['tr']['active']) && $fmcfSetOptionValArr['tr']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate17N">No</label></span>
      </td>
    </tr>

    <tr>
      <td id="fmcfCapTd" style="color:<?php echo (isset($fmcfSetOptionValArr['td']['color'])) ? $fmcfSetOptionValArr['td']['color'] : ''; ?> ;">td (td tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfTdSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][18]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['td']['color'])) ? $fmcfSetOptionValArr['td']['color'] : '#000000'; ?>"  data-id="fmcfCapTd" <?php echo (isset($fmcfSetOptionValArr['td']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfTdSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][18]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['td']['color'])) ? $fmcfSetOptionValArr['td']['color'] : '#000000'; ?>"  data-id="fmcfCapTd" <?php echo (isset($fmcfSetOptionValArr['td']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate18" id="fmcfActivate18Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfTdSetClr" <?php echo (isset($fmcfSetOptionValArr['td']['active']) && $fmcfSetOptionValArr['td']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate18Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate18" id="fmcfActivate18N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfTdSetClr" <?php echo (isset($fmcfSetOptionValArr['td']['active']) && $fmcfSetOptionValArr['td']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate18N">No</label></span>
      </td>

      <td id="fmcfCapTh" style="color:<?php echo (isset($fmcfSetOptionValArr['th']['color'])) ? $fmcfSetOptionValArr['th']['color'] : ''; ?> ;">th (th tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfThSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][19]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['th']['color'])) ? $fmcfSetOptionValArr['th']['color'] : '#000000'; ?>"  data-id="fmcfCapTh" <?php echo (isset($fmcfSetOptionValArr['th']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfThSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][19]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['th']['color'])) ? $fmcfSetOptionValArr['th']['color'] : '#000000'; ?>"  data-id="fmcfCapTh" <?php echo (isset($fmcfSetOptionValArr['th']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate19" id="fmcfActivate19Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfThSetClr" <?php echo (isset($fmcfSetOptionValArr['th']['active']) && $fmcfSetOptionValArr['th']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate19Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate19" id="fmcfActivate19N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfThSetClr" <?php echo (isset($fmcfSetOptionValArr['th']['active']) && $fmcfSetOptionValArr['th']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate19N">No</label></span>
      </td>
    </tr>

    <tr>
      <td id="fmcfCapSmall" style="color:<?php echo (isset($fmcfSetOptionValArr['small']['color'])) ? $fmcfSetOptionValArr['small']['color'] : ''; ?> ;">small (small tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfSmallSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][20]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['small']['color'])) ? $fmcfSetOptionValArr['small']['color'] : '#000000'; ?>"  data-id="fmcfCapSmall" <?php echo (isset($fmcfSetOptionValArr['small']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfSmallSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][20]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['small']['color'])) ? $fmcfSetOptionValArr['small']['color'] : '#000000'; ?>"  data-id="fmcfCapSmall" <?php echo (isset($fmcfSetOptionValArr['small']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate20" id="fmcfActivate20Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfSmallSetClr" <?php echo (isset($fmcfSetOptionValArr['small']['active']) && $fmcfSetOptionValArr['small']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate20Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate20" id="fmcfActivate20N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfSmallSetClr" <?php echo (isset($fmcfSetOptionValArr['small']['active']) && $fmcfSetOptionValArr['small']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate20N">No</label></span>
      </td>

      <td id="fmcfCapU" style="color:<?php echo (isset($fmcfSetOptionValArr['u']['color'])) ? $fmcfSetOptionValArr['u']['color'] : ''; ?> ;">u (underline tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfUSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][21]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['u']['color'])) ? $fmcfSetOptionValArr['u']['color'] : '#000000'; ?>"  data-id="fmcfCapU" <?php echo (isset($fmcfSetOptionValArr['u']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfUSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][21]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['u']['color'])) ? $fmcfSetOptionValArr['u']['color'] : '#000000'; ?>"  data-id="fmcfCapU" <?php echo (isset($fmcfSetOptionValArr['u']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate21" id="fmcfActivate21Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfUSetClr" <?php echo (isset($fmcfSetOptionValArr['u']['active']) && $fmcfSetOptionValArr['u']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate21Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate21" id="fmcfActivate21N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfUSetClr" <?php echo (isset($fmcfSetOptionValArr['u']['active']) && $fmcfSetOptionValArr['u']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate21N">No</label></span>
      </td>      
    </tr>
    <tr>

      <td id="fmcfCapStrike" style="color:<?php echo (isset($fmcfSetOptionValArr['strike']['color'])) ? $fmcfSetOptionValArr['strike']['color'] : ''; ?> ;">strike (strike tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfStrikeSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][22]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['strike']['color'])) ? $fmcfSetOptionValArr['strike']['color'] : '#000000'; ?>"  data-id="fmcfCapStrike" <?php echo (isset($fmcfSetOptionValArr['strike']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfStrikeSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][22]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['strike']['color'])) ? $fmcfSetOptionValArr['strike']['color'] : '#000000'; ?>"  data-id="fmcfCapStrike" <?php echo (isset($fmcfSetOptionValArr['strike']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate22" id="fmcfActivate22Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfStrikeSetClr" <?php echo (isset($fmcfSetOptionValArr['strike']['active']) && $fmcfSetOptionValArr['strike']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate22Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate22" id="fmcfActivate22N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfStrikeSetClr" <?php echo (isset($fmcfSetOptionValArr['strike']['active']) && $fmcfSetOptionValArr['strike']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate22N">No</label></span>
      </td>

      <td id="fmcfCapCenter" style="color:<?php echo (isset($fmcfSetOptionValArr['center']['color'])) ? $fmcfSetOptionValArr['center']['color'] : ''; ?> ;">center (center tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfCenterSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][23]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['center']['color'])) ? $fmcfSetOptionValArr['center']['color'] : '#000000'; ?>"  data-id="fmcfCapCenter" <?php echo (isset($fmcfSetOptionValArr['center']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfCenterSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][23]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['center']['color'])) ? $fmcfSetOptionValArr['center']['color'] : '#000000'; ?>"  data-id="fmcfCapCenter" <?php echo (isset($fmcfSetOptionValArr['center']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate23" id="fmcfActivate23Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfCenterSetClr" <?php echo (isset($fmcfSetOptionValArr['center']['active']) && $fmcfSetOptionValArr['center']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate23Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate23" id="fmcfActivate23N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfCenterSetClr" <?php echo (isset($fmcfSetOptionValArr['center']['active']) && $fmcfSetOptionValArr['center']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate23N">No</label></span>
      </td>      

    </tr>
    <tr>

       <td id="fmcfCapMarquee" style="color:<?php echo (isset($fmcfSetOptionValArr['marquee']['color'])) ? $fmcfSetOptionValArr['marquee']['color'] : ''; ?> ;">marquee (marquee tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfMarqueeSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][24]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['marquee']['color'])) ? $fmcfSetOptionValArr['marquee']['color'] : '#000000'; ?>"  data-id="fmcfCapMarquee" <?php echo (isset($fmcfSetOptionValArr['marquee']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfMarqueeSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][24]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['marquee']['color'])) ? $fmcfSetOptionValArr['marquee']['color'] : '#000000'; ?>"  data-id="fmcfCapMarquee" <?php echo (isset($fmcfSetOptionValArr['marquee']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate24" id="fmcfActivate24Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfMarqueeSetClr" <?php echo (isset($fmcfSetOptionValArr['marquee']['active']) && $fmcfSetOptionValArr['marquee']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate24Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate24" id="fmcfActivate24N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfMarqueeSetClr" <?php echo (isset($fmcfSetOptionValArr['marquee']['active']) && $fmcfSetOptionValArr['marquee']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate24N">No</label></span>
      </td>

      <td id="fmcfCapTitle" style="color:<?php echo (isset($fmcfSetOptionValArr['title']['color'])) ? $fmcfSetOptionValArr['title']['color'] : ''; ?> ;">title (title tag)</td>
      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfTitleSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][25]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['title']['color'])) ? $fmcfSetOptionValArr['title']['color'] : '#000000'; ?>"  data-id="fmcfCapTitle" <?php echo (isset($fmcfSetOptionValArr['title']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfTitleSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][25]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['title']['color'])) ? $fmcfSetOptionValArr['title']['color'] : '#000000'; ?>"  data-id="fmcfCapTitle" <?php echo (isset($fmcfSetOptionValArr['title']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate25" id="fmcfActivate25Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfTitleSetClr" <?php echo (isset($fmcfSetOptionValArr['title']['active']) && $fmcfSetOptionValArr['title']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate25Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate25" id="fmcfActivate25N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfTitleSetClr" <?php echo (isset($fmcfSetOptionValArr['title']['active']) && $fmcfSetOptionValArr['title']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate25N">No</label></span>
      </td>
    </tr>
    <tr>
      <td id="fmcfCapStrong" style="color:<?php echo (isset($fmcfSetOptionValArr['strong']['color'])) ? $fmcfSetOptionValArr['strong']['color'] : ''; ?> ;">strong (strong tag)</td>

      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfStrongSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][26]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['strong']['color'])) ? $fmcfSetOptionValArr['strong']['color'] : '#000000'; ?>"  data-id="fmcfCapStrong" <?php echo (isset($fmcfSetOptionValArr['strong']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfStrongSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][26]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['strong']['color'])) ? $fmcfSetOptionValArr['strong']['color'] : '#000000'; ?>"  data-id="fmcfCapStrong" <?php echo (isset($fmcfSetOptionValArr['strong']['color'])) ? '' : 'disabled'; ?>>
      </td>

      <td>
      <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate26" id="fmcfActivate26Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfStrongSetClr" <?php echo (isset($fmcfSetOptionValArr['strong']['active']) && $fmcfSetOptionValArr['strong']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate26Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate26" id="fmcfActivate26N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfStrongSetClr" <?php echo (isset($fmcfSetOptionValArr['strong']['active']) && $fmcfSetOptionValArr['strong']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate26N">No</label></span>
      </td>

      <td id="fmcfCapLabel" style="color:<?php echo (isset($fmcfSetOptionValArr['label']['color'])) ? $fmcfSetOptionValArr['label']['color'] : ''; ?> ;">label (label tag)</td>
     

      <td>
        <input type="color" class="fmcf_sel_clor_pic" id="fmcfLabelSetClr" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][27]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['label']['color'])) ? $fmcfSetOptionValArr['label']['color'] : '#000000'; ?>"  data-id="fmcfCapLabel" <?php echo (isset($fmcfSetOptionValArr['label']['color'])) ? '' : 'disabled'; ?>>

        <input type="text" class="fmcf_sel_clor_code" id="fmcfLabelSetClrTxt" name="fmcfSetClr[<?php echo $GLOBALS['fmcfSetFieldColorArr'][27]; ?>]" value="<?php echo (isset($fmcfSetOptionValArr['label']['color'])) ? $fmcfSetOptionValArr['label']['color'] : '#000000'; ?>"  data-id="fmcfCapLabel" <?php echo (isset($fmcfSetOptionValArr['label']['color'])) ? '' : 'disabled'; ?>>
      </td>
      <td>

      <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate27" id="fmcfActivate27Y" class="fmcfChkRdoBtn" value="1" data-clr-id="fmcfLabelSetClr" <?php echo (isset($fmcfSetOptionValArr['label']['active']) && $fmcfSetOptionValArr['label']['active'] == 1) ? 'checked' : ''; ?>><label for="fmcfActivate27Y">Yes</label></span> 
        <span class="fmcf_radio_group"><input type="radio" name="fmcfActivate27" id="fmcfActivate27N" class="fmcfChkRdoBtn" value="0" data-clr-id="fmcfLabelSetClr" <?php echo (isset($fmcfSetOptionValArr['label']['active']) && $fmcfSetOptionValArr['label']['active'] == 1) ? '' : 'checked'; ?>><label for="fmcfActivate27N">No</label></span>
      </td>

    </tr>
  </table>
  <button type="submit" name="fmcfClrAssignSubmit" id="fmcfClrAssignSubmitBtn" class="submit_btn fmcf_save_btn">Apply</button>
  </form>

  
</div>
</div>
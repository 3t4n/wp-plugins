<?php
 $alidani_color_font_id = isset($_GET['colorid'] ) ;
global $wpdb;
$alidani_color_font_details = $wpdb->get_row(
    $wpdb->prepare(
         "SELECT * from ".alidani_contact_form_color_font_database_table(). " WHERE colorid = %d ",1
        ),ARRAY_A
);

?>
<div class="formcontainer-form">
<div class="container">
<div class="row">
    <div class="alert alert-info main-formstyle"  id = "formstyle-form" style="color:<?php echo esc_html( $alidani_color_font_details['colorone'] ) ?>;">
    
    <div class="panel panel-primary">
          <div class="panel panel-primary">
        <div class="panel-heading" id="interform-style"  style="color:<?php echo esc_html( $alidani_color_font_details['colorone'] ) ?>; background-color:<?php echo esc_html( $alidani_color_font_details['colortwo'] ) ?>;" id="seventhlebalText"><?php echo esc_html( $alidani_color_font_details['fontseven'] ) ?> </div>
        <div class="panel-body" id="interbackcolor-form" style="background-color:<?php echo esc_html( $alidani_color_font_details['colorthree'] ) ?>;">
        <form class="form-horizontal" action="javascript:void(0)" >
            <div class="form-group">
                <label class="control-label col-sm-6" for="first-name" id="firstlebeltext" ><?php echo esc_html( $alidani_color_font_details['fontone'] ) ?></label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="first-name" name="first-name" placeholder="Enter your <?php echo esc_html( $alidani_color_font_details['fontone'] ) ?> here"  style="background-color:<?php echo esc_html( $alidani_color_font_details['colorfour'] ) ?>;" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-6" for="last-name" id="secondlebalText"><?php echo esc_html( $alidani_color_font_details['fonttwo'] ) ?></label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="last-name" name="last-name" placeholder="Enter your <?php echo esc_html( $alidani_color_font_details['fonttwo'] ) ?> here" style="background-color:<?php echo esc_html( $alidani_color_font_details['colorfour'] ) ?>;" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-6" for="email" id="thirdlebalText"><?php echo esc_html( $alidani_color_font_details['fontthree'] ) ?></label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your <?php echo esc_html( $alidani_color_font_details['fontthree'] ) ?> here" style="background-color:<?php echo esc_html( $alidani_color_font_details['colorfour'] ) ?>;"required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-6" for="number" id="forthlebalText"><?php echo esc_html( $alidani_color_font_details['fontfour'] ) ?></label>
                <div class="col-sm-10">
                <input type="tel" class="form-control" id="number" name="number" placeholder="Enter your <?php echo esc_html( $alidani_color_font_details['fontfour'] ) ?> here" style="background-color:<?php echo esc_html( $alidani_color_font_details['colorfour'] ) ?>;" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-6" for="enquiry" id="fifthlebalText"><?php echo esc_html( $alidani_color_font_details['fontfive'] ) ?></label>
                <div class="col-sm-10">
                <textarea name="enquiry" id="enquiry" placeholder="Enter your <?php echo esc_html( $alidani_color_font_details['fontfive'] ) ?> here" class="form-control" style="background-color:<?php echo esc_html( $alidani_color_font_details['colorfour'] ) ?>;" ></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" id="submitidColor" style="background-color:<?php echo esc_html( $alidani_color_font_details['colorfive'] ) ?>;color:<?php echo esc_html( $alidani_color_font_details['colorsix'] ) ?>;"><?php echo esc_html( $alidani_color_font_details['fontsix'] ) ?></button>
                </div>
            </div>
            </form>
        </div>
       </div>
        </div>
    </div>
<div class="buttonadjust-form">

<div>
  
  <input type="color" id="colorInputColor"name="colorInputColor"value="<?php echo esc_html( $alidani_color_font_details['colorone'] ) ?>">
  <input type="button" class="buttonclassback-color" id="colorButton" name="colorButton" value="Font Colors" onclick="changeColor()">
  
</div>
<div>
    
    <input type="color" id="backcolorInputColor"name="backcolorInputColor"value="<?php echo esc_html( $alidani_color_font_details['colortwo'] ) ?>">
    <input type="button"class="buttonclassback-color" id="backcolorButton" name="backcolorButton" value="Top Background Color" onclick="backColor()">

</div>
<div>
    
    <input type="color" id="interbackcolorInputColor"name="interbackcolorInputColor" value="<?php echo esc_html( $alidani_color_font_details['colorthree'] ) ?>">
    <input type="button"class="buttonclassback-color" id="interbackcolorButton" name="interbackcolorButton" value="inner Background Color" onclick="interbackColor()">

</div>
<div>
    
    <input type="color" id="inputbackcolorInputColor"name="inputbackcolorInputColor" value="<?php echo esc_html( $alidani_color_font_details['colorfour'] ) ?>">
    <input type="button" class="buttonclassback-color" id="inputbackcolorButton" name="inputbackcolorButton" value="input Background Color" onclick="inputbackColor()">

</div>
<div>
 
    <input type="color" id="submitcolorInputColor"name="submitcolorInputColor" value="<?php echo esc_html( $alidani_color_font_details['colorfive'] ) ?>">
    <input type="button" class="buttonclassback-color" id="submitcolorButton" name="submitcolorButton" value="Submit Background color" onclick="submitbackColor()">

</div>
<div>
    
    <input type="color" id="submitcolorfontColor"name="submitcolorfontColor" value="<?php echo esc_html( $alidani_color_font_details['colorsix'] ) ?>">
    <input type="button" class="buttonclassback-color" id="submitfontcolorButton" name="submitfontcolorButton" value="submit color" onclick="submitFontColor()">

</div>
<div>
    <input type="text" id="seventhfieldText" name="seventhfieldText" value="<?php echo esc_html( $alidani_color_font_details['fontseven'] ) ?>">
    <input type="button" class="buttonclassback-color" id="seventhfieldButton" name="seventhfieldButton" value="Change Form Name" onclick="seventhFieldText()">

</div>
<div>
    <input type="text" id="firstfieldText" name="firstfieldText" value="<?php echo esc_html( $alidani_color_font_details['fontone'] ) ?>">
    <input type="button" class="buttonclassback-color" id="firstfieldButton" name="firstfieldButton" value="Change First Field Name" onclick="firstFieldText()">

</div>
<div>
    <input type="text" id="secondfieldText" name="secondfieldText" value="<?php echo esc_html( $alidani_color_font_details['fonttwo'] ) ?>">
    <input type="button" class="buttonclassback-color" id="secondfieldButton" name="secondfieldButton" value="Change Second Field Name" onclick="secondFieldText()">

</div>
<div>
    <input type="text" id="thirdfieldText" name="thirdfieldText" value="<?php echo esc_html( $alidani_color_font_details['fontthree'] ) ?>">
    <input type="button" class="buttonclassback-color" id="thirdfieldButton" name="thirdfieldButton" value="Change Third Field Name" onclick="thirdFieldText()">

</div>
<div>
    <input type="text" id="forthfieldText" name="forthfieldText" value="<?php echo esc_html( $alidani_color_font_details['fontfour'] ) ?>">
    <input type="button" class="buttonclassback-color" id="forthfieldButton" name="forthfieldButton" value="Change Forth Field Name" onclick="forthFieldText()">

</div>
<div>
    <input type="text" id="fifthfieldText" name="fifthfieldText" value="<?php echo esc_html( $alidani_color_font_details['fontfive'] ) ?>">
    <input type="button" class="buttonclassback-color" id="fifthfieldButton" name="fifthfieldButton" value="Change Fifth Field Name" onclick="fifthFieldText()">

</div>
<div>
    <input type="text" id="sixthfieldText" name="sixthfieldText" value="<?php echo esc_html( $alidani_color_font_details['fontsix'] ) ?>">
    <input type="button" class="buttonclassback-color" id="sixthfieldButton" name="sixthfieldButton" value="Change Submit Buttom Name" onclick="sixthFieldText()">

</div>

<div>
<input type="button" class="buttonclassback-color" id="saveColorButton" name="saveColorButton" value="Save changes">
</div>

</div>
</div>
</div>
<div class="shortcode-info">
        <p class="shortcode-info">Just copy the fallowing short code and paste it in any page you want the form to appear in</p>
        <label for="shortcode">Shortcode is:</label>
        <label for="sortcodelabel">[alidaniform]</label>
        </div>
<?php
 $alidani_color_font_id = isset($_GET['colorid']) ;
global $wpdb;
$alidani_color_font_details = $wpdb->get_row(
    $wpdb->prepare(
         "SELECT * from ".alidani_contact_form_color_font_database_table(). " WHERE colorid = %d ",1
        ),ARRAY_A
);
?>
<div class="container">
<div class="row">
    <div class="alert alert-info" style="color:<?php echo esc_html($alidani_color_font_details['colorone']) ?>;">
       <div class="panel panel-primary">
        <div class="panel-heading"style="color:<?php echo esc_html($alidani_color_font_details['colorone']) ?>; background-color:<?php echo esc_html($alidani_color_font_details['colortwo']) ?>;" id="seventhlebalText"><?php echo $alidani_color_font_details['fontseven'] ?></div>
        <div class="panel-body" style="background-color:<?php echo esc_html($alidani_color_font_details['colorthree']) ?>;">
        <form class="form-horizontal" action="javascript:void(0)" id="AddAlidaniContactFrm">
            <div class="form-group frontEditCss">
                <label class="control-label col-sm-2" for="first-name"><?php echo esc_html($alidani_color_font_details['fontone']) ?></label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="first-name" name="first-name" placeholder="Enter your <?php echo esc_html($alidani_color_font_details['fontone']) ?> here"  style="background-color:<?php echo esc_html($alidani_color_font_details['colorfour'] )?>;" required>
                </div>
            </div>
            <div class="form-group frontEditCss">
                <label class="control-label col-sm-2" for="last-name"><?php echo esc_html($alidani_color_font_details['fonttwo']) ?></label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="last-name" name="last-name" placeholder="Enter your <?php echo esc_html($alidani_color_font_details['fonttwo']) ?> here" style="background-color:<?php echo esc_html($alidani_color_font_details['colorfour']) ?>;" required>
                </div>
            </div>
            <div class="form-group frontEditCss">
                <label class="control-label col-sm-2" for="email"><?php echo esc_html($alidani_color_font_details['fontthree']) ?></label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your <?php echo esc_html($alidani_color_font_details['fontthree']) ?> here" style="background-color:<?php echo esc_html($alidani_color_font_details['colorfour']) ?>;"required>
                </div>
            </div>
            <div class="form-group frontEditCss">
                <label class="control-label col-sm-2" for="number"><?php echo esc_html($alidani_color_font_details['fontfour']) ?></label>
                <div class="col-sm-10">
                <input type="tel" class="form-control" id="number" name="number" placeholder="Enter your <?php echo esc_html($alidani_color_font_details['fontfour']) ?> here" style="background-color:<?php echo esc_html($alidani_color_font_details['colorfour']) ?>;" required>
                </div>
            </div>

            <div class="form-group frontEditCss">
                <label class="control-label col-sm-2" for="enquiry"><?php echo esc_html($alidani_color_font_details['fontfive']) ?></label>
                <div class="col-sm-10">
                <textarea name="enquiry" id="enquiry" placeholder="Enter your <?php echo esc_html($alidani_color_font_details['fontfive']) ?> here" class="form-control" style="background-color:<?php echo esc_html($alidani_color_font_details['colorfour'] )?>;" ></textarea>
                </div>
            </div>
            <div class="form-group frontEditCss">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default Submit-frontCSS" style="background-color:<?php echo esc_html($alidani_color_font_details['colorfive']) ?>;color:<?php echo esc_html($alidani_color_font_details['colorsix'] )?>;"><?php echo esc_html($alidani_color_font_details['fontsix']) ?></button>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>

</div>

</div>
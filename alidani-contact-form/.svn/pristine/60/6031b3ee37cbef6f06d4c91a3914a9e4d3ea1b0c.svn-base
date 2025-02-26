
<?php
    $alidani_contact_id = isset($_GET['edit']) ? intval($_GET['edit']):0;
    global $wpdb;
    $alidani_contact_details = $wpdb->get_row(
        $wpdb->prepare(
             "SELECT * from ".alidani_contact_form_database_table(). " WHERE id = %d ",$alidani_contact_id
            ),ARRAY_A
    );
    $alidani_color_font_details = $wpdb->get_row(
        $wpdb->prepare(
             "SELECT * from ".alidani_contact_form_color_font_database_table(). " WHERE colorid = %d ",1
            ),ARRAY_A
    );
?>
<div class="container">
<div class="row">
    <div class="alert alert-info">
    <h4>Show & Edit email</h4>
    <div class="panel panel-primary">
        <div class="panel-heading">Show & Edit email</div>
        <div class="panel-body">
        <form class="form-horizontal" action="javascript:void(0)" id="EditSAlidaniContactFrm">
        <input type="hidden" name="alidani_contact_id" value="<?php echo isset($_GET['edit'])?intval($_GET['edit']):0;?>">
            <div class="form-group EditPageCss">
                <label class="control-label col-sm-2" for="firs-tname"><?php echo esc_html($alidani_color_font_details['fontone']) ?></label>
                <div class="col-sm-10">
                <input type="text"value="<?php echo esc_html($alidani_contact_details['firstname']) ?>" class="form-control" id="first-name" name="first-name" placeholder="Enter your First Name" required>
                </div>
            </div>
            <div class="form-group EditPageCss">
                <label class="control-label col-sm-2" for="last-name"><?php echo esc_html($alidani_color_font_details['fonttwo']) ?></label>
                <div class="col-sm-10">
                <input type="text" value="<?php echo esc_html($alidani_contact_details['lastname']) ?>" class="form-control" id="last-name" name="last-name" placeholder="Enter your Last Name" required>
                </div>
            </div>
            <div class="form-group EditPageCss">
                <label class="control-label col-sm-2" for="email"><?php echo esc_html($alidani_color_font_details['fontthree']) ?></label>
                <div class="col-sm-10">
                <input type="email"  value="<?php echo esc_html($alidani_contact_details['email']) ?>"  class="form-control" id="email" name="email" placeholder="Enter your Email" required>
                </div>
            </div>
            <div class="form-group EditPageCss">
                <label class="control-label col-sm-2" for="number"><?php echo esc_html($alidani_color_font_details['fontfour']) ?></label>
                <div class="col-sm-10">
                <input type="tel" value="<?php echo esc_html($alidani_contact_details['number']) ?>" class="form-control" id="number" name="number" placeholder="Enter your number"  required>
                </div>
            </div>

            <div class="form-group EditPageCss">
                <label class="control-label col-sm-2" for="enquiry"><?php echo esc_html($alidani_color_font_details['fontfive']) ?></label>
                <div class="col-sm-10">
                <textarea name="enquiry" id="enquiry" placeholder="Enter your enquiry" class="form-control" ><?php echo esc_html($alidani_contact_details['enquiry']) ?></textarea>
                </div>
            </div>
            <div class="form-group EditPageCss">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="admin.php?page=alidaniform"><button type="button"  class="btn btn-success">Return</button></a>
              
                </div>
                
            </div>
            </form>
        </div>
        </div>
    </div>

</div>

</div>
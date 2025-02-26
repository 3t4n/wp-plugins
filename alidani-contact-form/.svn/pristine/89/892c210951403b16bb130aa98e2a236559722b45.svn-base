
<?php
   $alidani_admin_contact_id = isset($_GET['adminedit']) ? intval($_GET['adminedit']):0;
    global $wpdb;
    $alidani_admin_contact_details = $wpdb->get_row(
        $wpdb->prepare(
             "SELECT * from ".alidani_contact_form_admin_info_database_table(). " WHERE adminid = %d ",$alidani_admin_contact_id
            ),ARRAY_A
    );
?>
<div class="container">
<div class="row">
    <div class="alert alert-info">
    <h4>Edit Admin Info</h4>
    <div class="panel panel-primary">
        <div class="panel-heading">Edit Admin Info</div>
        <div class="panel-body">
        <form class="form-horizontal" action="javascript:void(0)" id="EditSAdminAlidaniContactFrm">
        <input type="hidden" name="alidani_admin_contact_id" value="<?php echo isset($_GET['adminedit'])?intval($_GET['adminedit']):0;?>">
            <div class="form-group AdminEditCss">
                <label class="control-label col-sm-2" for="firstname">First Name:</label>
                <div class="col-sm-10">
                <input type="text"value="<?php echo esc_html($alidani_admin_contact_details['adminfirstname']) ?>" class="form-control" id="admin-first-name" name="admin-first-name" placeholder="Enter your First Name" required>
                </div>
            </div>
            <div class="form-group AdminEditCss">
                <label class="control-label col-sm-2" for="last-name">Last Name:</label>
                <div class="col-sm-10">
                <input type="text" value="<?php echo esc_html($alidani_admin_contact_details['adminlastname']) ?>" class="form-control" id="admin-last-name" name="admin-last-name" placeholder="Enter your Last Name" required>
                </div>
            </div>
            <div class="form-group AdminEditCss">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                <input type="email"  value="<?php echo esc_html($alidani_admin_contact_details['adminemail']) ?>"  class="form-control" id="admin-email" name="admin-email" placeholder="Enter your Email" required>
                </div>
            </div>
            

            <div class="form-group AdminEditCss">
                <label class="control-label col-sm-2" for="enquiry">Message:</label>
                <div class="col-sm-10">
                <textarea name="admin-message" id="admin-message" placeholder="Enter your enquiry" class="form-control" ><?php echo esc_html($alidani_admin_contact_details['adminmessage']) ?></textarea>
                </div>
            </div>

            
            
            <div class="form-group AdminEditCss">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="admin.php?page=alidaniadmininfo"><button type="button"  class="btn btn-success">Return</button></a>
                
                </div>
                
            </div>
            </form>
        </div>
        </div>
    </div>

</div>

</div>
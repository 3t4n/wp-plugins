
<?php
    $alidani_contact_id = isset($_GET['sendemail']) ? intval($_GET['sendemail']):0;
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
    $alidani_admin_contact_details = $wpdb->get_row(
        $wpdb->prepare(
             "SELECT * from ".alidani_contact_form_admin_info_database_table(). " WHERE adminid = %d ",1
            ),ARRAY_A
    );
?>
<div class="mainSend-form">

<div class="container mainsendLeft-form">
<div class="row">
    <div class="alert alert-info">
        <div class="panel panel-primary">
        <div class="panel-heading">Original Email</div>
        <div class="panel-body">
        <form class="form-horizontal" action="javascript:void(0)">
        <input type="hidden" name="alidani_send_contact_id" value="<?php echo isset($_GET['sendemail'])?intval($_GET['sendemail']):0;?>">
        <div class="form-group insideSendform-email">
                <label class="control-label col-sm-2" for="first-name"><?php echo esc_html($alidani_color_font_details['fontone']) ?></label>
                <div class="col-sm-10">
                <input type="text"value="<?php echo esc_html($alidani_contact_details['firstname']) ?>" class="form-control" id="first-name" name="first-name" placeholder="Enter your First Name" required>
                </div>
            </div>
            <div class="form-group insideSendform-email">
                <label class="control-label col-sm-2" for="last-name"><?php echo esc_html($alidani_color_font_details['fonttwo']) ?></label>
                <div class="col-sm-10">
                <input type="text" value="<?php echo esc_html($alidani_contact_details['lastname']) ?>" class="form-control" id="last-name" name="last-name" placeholder="Enter your Last Name" required>
                </div>
            </div>
            <div class="form-group insideSendform-email">
                <label class="control-label col-sm-2" for="email"><?php echo esc_html($alidani_color_font_details['fontthree']) ?></label>
                <div class="col-sm-10">
                <input type="email"  value="<?php echo esc_html($alidani_contact_details['email']) ?>"  class="form-control" id="email" name="email" placeholder="Enter your Email" required>
                </div>
            </div>
            <div class="form-group insideSendform-email">
                <label class="control-label col-sm-2" for="number"><?php echo esc_html($alidani_color_font_details['fontfour']) ?></label>
                <div class="col-sm-10">
                <input type="tel" value="<?php echo esc_html($alidani_contact_details['number']) ?>" class="form-control" id="number" name="number" placeholder="Enter your number"  required>
                </div>
            </div>

            <div class="form-group insideSendform-email">
                <label class="control-label col-sm-2" for="enquiry"><?php echo esc_html($alidani_color_font_details['fontfive']) ?></label>
                <div class="col-sm-10">
                <textarea name="enquiry" id="enquiry" placeholder="Enter your enquiry" class="form-control" ><?php echo esc_html($alidani_contact_details['enquiry']) ?></textarea>
                </div>
            </div>
            </div>
            </form>
        </div>
        </div>
    </div>

</div>


</div>
<div class="container mainSendRight-form">
<div class="row">
    <div class="alert alert-info">
    <div class="panel panel-primary">
        <div class="panel-heading">Send Email</div>
        <div class="panel-body">
        <form class="form-horizontal" action="javascript:void(0)" id="SendSAlidaniContactFrm">
        <input type="hidden" name="alidani_send_contact_id" value="<?php echo isset($_GET['sendemail'])?intval($_GET['sendemail']):0;?>">
            <div class="form-group insideSendform-emailRight">

            <div class="form-group insideSendform-emailRight">
                <label class="control-label col-sm-2" for="fromemail">From:</label>
                <div class="col-sm-10">
                <input type="email"  value="<?php echo esc_html($alidani_admin_contact_details['adminemail']) ?>"  class="form-control" id="adminSend-email" name="adminSend-email" placeholder="Enter your Email" required>
                </div>
            </div>
            <div class="form-group insideSendform-emailRight">
                <label class="control-label col-sm-2" for="To email">To:</label>
                <div class="col-sm-10">
                <input type="email" value="<?php echo esc_html($alidani_contact_details['email']) ?>"  class="form-control" id="toSend-email" name="toSend-email" placeholder="Enter your Email" required>
                </div>
            </div>

            <div class="form-group insideSendform-emailRight">
                <label class="control-label col-sm-2" for="message">subject:</label>
                <div class="col-sm-10">
                <input type="text" name="subjectSend-email" id="subjectSend-email" placeholder="Enter your subject" class="form-control">

                </div>
            </div>
            <div class="form-group insideSendform-emailRight">
                <label class="control-label col-sm-2" for="message">Message:</label>
                <div class="col-sm-10">
                <textarea name="sendMessage" id="sendMessage" placeholder="Enter your message here" class="form-control" ></textarea>
                </div>
            </div>
            <div class="form-group insideSendform-emailRight">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Send</button>
                <a href="admin.php?page=alidaniform"><button type="button"  class="btn btn-success">Return</button></a>
             
                </div>
                
            </div>
            </form>
        </div>
        </div>
    </div>

</div>

</div>
</div>
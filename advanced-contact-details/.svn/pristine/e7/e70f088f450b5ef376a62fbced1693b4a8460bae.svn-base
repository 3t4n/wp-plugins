<?php
global $wpdb;
$table_name = $wpdb->prefix . "contact_detail";
if (isset($_POST['save'])) {
//    echo '<pre>';
//    print_r($_POST);
//    echo '</pre>';
    $upload_dir = wp_upload_dir();
    define( 'STORING_DIRECTORY', WP_CONTENT_DIR .'/'. UPLOADS );
    $upload_loc = STORING_DIRECTORY . '/contact_images/';       
    if ($_POST['title'] == "") {
            $error[] = __('Please enter appropriate title.');
        } else {
            $title_data = sanitize_text_field($_POST['title']);
        }
    if (isset($_POST['text_data'])) {
        if ($_POST['text_data'] == "") {
            $error[] = __('Please enter phone number.');
        } else if (is_numeric(trim($_POST['text_data'])) == false) {
            $error[] = __('Please enter numeric phone number.');
        } else {
            $text_data = sanitize_text_field($_POST['text_data']);
        }
        if ($_POST['email_data'] == "") {
            $error[] = __('Please enter a valid email id.');
        } else {
            $email_data =  sanitize_email($_POST['email_data']);
        }
        if ($_POST['address_data'] == "") {
            $error[] = __('Please enter address.');
        } else {
            $address_data = esc_textarea($_POST['address_data']);
        }
    }
     
    if (isset($_FILES['phone_icon']['name']) && ($_FILES['phone_icon']['name'] == "")) {
        $error[] = __('Please upload phone icon.');
    }
    if (($_POST['mobile_data'] != "") && (is_numeric(trim($_POST['mobile_data'])) == false)) {

        $error[] = __('Please enter numeric mobile number.');
    }

    if (($_FILES['fax_icon']['name'] == "") && ($_POST['fax_data'] != "")) {
        $error[] = __('Please upload fax icon.');
    } else if ($_FILES['fax_icon']['name'] != "") {
       
        // print_r($fax_file);
        $fax_size = getimagesize($_FILES['fax_icon']['tmp_name']);
        $fax_file = ($_FILES['fax_icon']['name']);
        //  print_r($fax_size);
        if (($fax_size[0] > 30) || ($fax_size[1] > 30)) {
                $fax_image_file = wp_upload_bits($_FILES['fax_icon']['name'], null, file_get_contents($_FILES['fax_icon']['tmp_name']));
                $fax_icon = image_resize($fax_image_file['file'],30,30, false);
                $fax_file = explode('/', $fax_icon);
                $fax_file = $fax_file[count($fax_file) - 1];
               move_uploaded_file($_FILES['fax_icon']['tmp_name'],$fax_file); 
        }
        else{
          move_uploaded_file($_FILES['fax_icon']['tmp_name'],$upload_loc.$fax_file);
        }
    }



    if (isset($_FILES['email_icon']['name']) && ($_FILES['email_icon']['name'] == "")) {
        $error[] = __('Please upload email icon.');
    }

    if (($_FILES['mobile_icon']['name'] == "") && ($_POST['mobile_data'] != "")) {
        $error[] = __('Please upload mobile icon.');
    } else if($_FILES['mobile_icon']['name'] != "") {
        
        // print_r($mobile_file);
        $mobile_file = ($_FILES['mobile_icon']['name']);
        $mobile_size = getimagesize($_FILES['mobile_icon']['tmp_name']);
        print_r($mobile_name);
        if (($mobile_size[0] > 30) || ($mobile_size[1] > 30)) {
            $mobile_image_file = wp_upload_bits($_FILES['mobile_icon']['name'], null, file_get_contents($_FILES['mobile_icon']['tmp_name']));
            $mobile_icon = image_resize($mobile_image_file['file'],30,30, false);
            $mobile_file = explode('/', $mobile_icon);
            $mobile_file = $mobile_file[count($mobile_file) - 1];  
           move_uploaded_file($_FILES['mobile_icon']['tmp_name'], $mobile_file); 
        }
        else{
          move_uploaded_file($_FILES['mobile_icon']['tmp_name'],$upload_loc.$mobile_file);
        }
    }

    if (isset($_FILES['address_icon']['name']) && ($_FILES['address_icon']['name'] == "")) {
        $error[] = __('Please upload address icon.');
    }
    if (empty($error)) {
 
        $phone_filename = ($_FILES['phone_icon']['name']);
        $phone_size = getimagesize($_FILES['phone_icon']['tmp_name']);
        //  print_r($phone_size);
        if (($phone_size[0] > 30) || ($phone_size[1] > 30)) {
            $phone_image_file = wp_upload_bits($_FILES['phone_icon']['name'], null, file_get_contents($_FILES['phone_icon']['tmp_name']));
            $phone_icon = image_resize($phone_image_file['file'],30,30, false);
            $phone_filename = explode('/',$phone_icon);
            $phone_filename = $phone_filename[count($phone_filename) - 1];
            move_uploaded_file($_FILES['phone_icon']['tmp_name'], $phone_filename); 
        }
        else{
          move_uploaded_file($_FILES['phone_icon']['tmp_name'],$upload_loc.$phone_filename);
        }

        $email_file = ($_FILES['email_icon']['name']);
        // print_r($email_file);
        $email_size = getimagesize($_FILES['email_icon']['tmp_name']);
        //print_r($email_size);
        if (($email_size[0] > 30) || ($email_size[1] > 30)) {
            $email_image_file = wp_upload_bits($_FILES['email_icon']['name'], null, file_get_contents($_FILES['email_icon']['tmp_name']));
            $email_icon = image_resize($email_image_file['file'], 30,30, false);
            $email_file = explode('/', $email_icon);
            $email_file = $email_file[count($email_file) - 1];
            move_uploaded_file($_FILES['email_icon']['tmp_name'], $email_file); 
        }
        else{
          move_uploaded_file($_FILES['email_icon']['tmp_name'],$upload_loc.$email_file);
        }
        $address_file = ($_FILES['address_icon']['name']);
        // print_r($address_file);
        $address_size = getimagesize($_FILES['address_icon']['tmp_name']);
        //print_r($address_size);
        if (($address_size[0] > 30) || ($address_size[1] > 30)) {
            $address_image_file = wp_upload_bits($_FILES['address_icon']['name'], null, file_get_contents($_FILES['address_icon']['tmp_name']));
            $address_icon = image_resize($address_image_file['file'],30,30, false);
            $address_file = explode('/', $address_icon);
            $address_file = $address_file[count($address_file) - 1];
            move_uploaded_file($_FILES['address_icon']['tmp_name'], $address_file);           
        }
        else{
          move_uploaded_file($_FILES['address_icon']['tmp_name'],$upload_loc.$address_file);
        }

        $sql = $wpdb->insert($table_name, array('title' => $title_data,'phone' => $text_data, 'phone_image' => $phone_filename, 'fax' => sanitize_text_field($_POST['fax_data']), 'fax_image' => $fax_file,
            'email_image' => $email_file, 'email' => $email_data, 'mobile_image' => $mobile_file, 'mobile' => sanitize_text_field($_POST['mobile_data']),
            'address_image' => $address_file, 'address' => $address_data));
        $wpdb->query($wpdb->prepare($sql,null));
        $success = __('Contact Details created Successfully.');
    }
}

function wpcb_showMessage($message, $errormsg = false) {
    if (empty($message))
        return;

    if ($errormsg) {
        echo '<div id="message" class="error">';
    } else {
        echo '<div id="message" class="updated">';
    }
    echo "<p><strong>$message</strong></p></div>";
}
?>
<div class="container">
    <form class="form-inline" role="form" method="post" enctype="multipart/form-data">
        <?php
        if (!empty($error)) {
            $error_msg = implode('<br>', $error);

            wpcb_showMessage($error_msg, true);
        }
        if (!empty($success)) {

            wpcb_showMessage($success);
        }
        ?>
         <div class="col-md-12">
             <h2>Add Contact Details</h2>
<div class="col-md-2"> <h3>Title:</h3>  </div>           
            <div class="col-md-3 m-t">
                <input type="text" class="form-control" id="text_data" name="title"  placeholder="Title">
            </div>

         </div>
<br/><br/><hr/>
        <div class="col-md-12">
            
            <div class="col-md-1"> <label>Phone:</label>  </div>           
            <div class="col-md-3">
                <input type="tel" class="form-control" id="text_data" name="text_data"  placeholder="Enter Phone">
            </div>
            <div class="col-md-5">
                <input id="uploadFile" class="input-large" name="phone_text" placeholder="Choose File" disabled="disabled" />
                <div class="fileUpload btn btn-primary">
                    <span>Upload Icon</span>
                    <input id="uploadBtn" type="file" class="upload" name="phone_icon"/>
                </div>
            </div>
        </div>
        <div class="col-md-12 m-t">
            <div class="col-md-1"> <label>Fax:</label>  </div>           
            <div class="col-md-3">
                <input type="tel" class="form-control" id="fax_data" name="fax_data" placeholder="Enter Fax">
            </div>
            <div class="col-md-5">
                <input id="fax_text" class="input-large" name="fax_text" placeholder="Choose File" disabled="disabled" />
                <div class="fileUpload btn btn-primary">
                    <span>Upload Icon</span>
                    <input id="fax_icon" type="file" class="upload" name="fax_icon"/>
                </div>
            </div>
        </div>
        <div class="col-md-12 m-t">
            <div class="col-md-1"> <label>Email:</label>  </div>           
            <div class="col-md-3">
                <input type="text" class="form-control" id="email_data" name="email_data" placeholder="Enter Email">
            </div>
            <div class="col-md-5">
                <input id="email_text" class="input-large" name="email_text" placeholder="Choose File" disabled="disabled" />
                <div class="fileUpload btn btn-primary">
                    <span>Upload Icon</span>
                    <input id="email_icon" type="file" class="upload" name="email_icon"/>
                </div>               
            </div>
        </div>
        <div class="col-md-12 m-t">
            <div class="col-md-1"> <label>Mobile:</label>  </div>           
            <div class="col-md-3">
                <input type="text" class="form-control" id="mobile_data" name="mobile_data" placeholder="Enter Mobile">
            </div>
            <div class="col-md-5">
                <input id="mobile_text" class="input-large" name="mobile_text" placeholder="Choose File" disabled="disabled" />
                <div class="fileUpload btn btn-primary">
                    <span>Upload Icon</span>
                    <input id="mobile_icon" type="file" class="upload" name="mobile_icon"/>
                </div> 
            </div>
        </div>
        <div class="col-md-12 m-t">
            <div class="col-md-1"> <label>Address:</label>  </div>           
            <div class="col-md-3">
                <textarea name="address_data" rows="5" cols="32" placeholder="Enter Address"></textarea>
            </div>
            <div class="col-md-5">
                <input id="address_text" class="input-large" name="address_text" placeholder="Choose File" disabled="disabled" />
                <div class="fileUpload btn btn-primary">
                    <span>Upload Icon</span>
                    <input id="address_icon" type="file" class="upload" name="address_icon"/>
                </div> 
            </div>
        </div>
        <div class="col-md-12 m-t">
             <div class="col-md-3">
                <button type="submit" class="btn btn-success" data-dismiss="modal" name="save">Save</button>
            </div> 
        </div>
    </form>
</div>
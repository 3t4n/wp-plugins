<?php
global $wpdb;
$table_name = $wpdb->prefix . "contact_detail";
$id = $_GET['id'];
//echo $id;
if ($_GET['id'] != '') {
    $id = $_GET['id'];
    $editingrecord = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d",$id));
    // print_r($editingrecord);
} else {
    echo 'No Data Found';
}
$phone_file = sanitize_text_field($_POST['phone_text']);
$fax_file = sanitize_text_field($_POST['fax_text']);
$email_file = sanitize_text_field($_POST['email_text']);
$mobile_file = sanitize_text_field($_POST['mobile_text']);
$address_file = sanitize_text_field($_POST['address_text']);
$title_data = sanitize_text_field($_POST['title']);

if (isset($_POST['save'])) {
//    echo '<pre>';
//    print_r($_POST);
//    echo '</pre>';
    $upload_dir = wp_upload_dir();
    define( 'STORING_DIRECTORY', WP_CONTENT_DIR .'/'. UPLOADS );
    $upload_loc = STORING_DIRECTORY . '/contact_images/';     
    if (isset($_POST['title']) && ($_POST['title'] == "")) {
        $error[] = __('Please enter appropriate title.');
    }
    if (isset($_POST['text_data']) && ($_POST['text_data'] == "")) {
        $error[] = __('Please enter phone number.');
    } else if (is_numeric(trim($_POST['text_data'])) == false) {
        $error[] = __('Please enter numeric phone number.');
    } else {
        $text_data = sanitize_text_field($_POST['text_data']);
    }

    if (isset($_POST['email_data']) && ($_POST['email_data'] == "")) {
        $error[] = __('Please enter a valid email id.');
    } else {
        $email_data = sanitize_email($_POST['email_data']);
    }

    if (isset($_POST['address_data']) && ($_POST['address_data'] == "")) {
        $error[] = __('Please enter address.');
    } else {
        $address_data = esc_textarea($_POST['address_data']);
    }

    if (($_POST['mobile_data'] != "") && (is_numeric(trim($_POST['mobile_data'])) == false)) {

        $error[] = __('Please enter numeric mobile number.');
    }

    if (isset($_FILES['fax_icon'])) {
        if ($_FILES['fax_icon']['name'] != "") {

            // print_r($fax_file);
            $fax_size = getimagesize($_FILES['fax_icon']['tmp_name']);
            $fax_file = ($_FILES['fax_icon']['name']);
            //  print_r($fax_size);
            if (($fax_size[0] > 30) || ($fax_size[1] > 30)) {

                $fax_image_file = wp_upload_bits($_FILES['fax_icon']['name'], null, file_get_contents($_FILES['fax_icon']['tmp_name']));
                $fax_icon = image_resize($fax_image_file['file'], 30, 30, false);
                $fax_file = explode('/', $fax_icon);
                $fax_file = $fax_file[count($fax_file) - 1];
                move_uploaded_file($_FILES['fax_icon']['tmp_name'], $fax_file);
            } else {
//            $imagepath_fax = $upload_loc. $fax_file;
//            echo $imagepath_fax;
//            unlink($imagepath_fax); 
                move_uploaded_file($_FILES['fax_icon']['tmp_name'], $upload_loc . $fax_file);
            }
        }
    } else {
        $fax_file = $_POST['fax_text'];
    }
    if (isset($_FILES['mobile_icon'])) {
        if ($_FILES['mobile_icon']['name'] != "") {
            // print_r($fax_file);
            $mobile_size = getimagesize($_FILES['mobile_icon']['tmp_name']);
            $mobile_file = ($_FILES['mobile_icon']['name']);
            // print_r($mobile_file);
            if (($mobile_size[0] > 30) || ($mobile_size[1] > 30)) {
                $mobile_image_file = wp_upload_bits($_FILES['mobile_icon']['name'], null, file_get_contents($_FILES['mobile_icon']['tmp_name']));
                $mobile_icon = image_resize($mobile_image_file['file'], 30, 30, false);
                $mobile_file = explode('/', $mobile_icon);
                $mobile_file = $mobile_file[count($mobile_file) - 1];
                move_uploaded_file($_FILES['mobile_icon']['tmp_name'], $mobile_file);
            } else {
                move_uploaded_file($_FILES['mobile_icon']['tmp_name'], $upload_loc . $mobile_file);
            }
        }
    } else {
        $mobile_file = $_POST['mobile_text'];
    }
    if (empty($error)) {

        if (isset($_FILES['phone_icon'])) {
            if ($_FILES['phone_icon']['name'] != "") {
                // print_r($fax_file);
                $phone_size = getimagesize($_FILES['phone_icon']['tmp_name']);
                $phone_file = ($_FILES['phone_icon']['name']);
                // print_r($phone_file);
                if (($phone_size[0] > 30) || ($phone_size[1] > 30)) {
                    $phone_image_file = wp_upload_bits($_FILES['phone_icon']['name'], null, file_get_contents($_FILES['phone_icon']['tmp_name']));
                    $phone_icon = image_resize($phone_image_file['file'], 30, 30, false);
                    $phone_file = explode('/', $phone_icon);
                    $phone_file = $phone_file[count($phone_file) - 1];
                    move_uploaded_file($_FILES['phone_icon']['tmp_name'], $phone_file);
                } else {
                    move_uploaded_file($_FILES['phone_icon']['tmp_name'], $upload_loc . $phone_file);
                }
            }
        } else {
            $phone_file = $_POST['phone_text'];
        }

        if (isset($_FILES['email_icon'])) {
            if ($_FILES['email_icon']['name'] != "") {
                // print_r($fax_file);
                $email_size = getimagesize($_FILES['email_icon']['tmp_name']);
                $email_file = ($_FILES['email_icon']['name']);
                // print_r($email_file);
                if (($email_size[0] > 30) || ($email_size[1] > 30)) {
                    $email_image_file = wp_upload_bits($_FILES['email_icon']['name'], null, file_get_contents($_FILES['email_icon']['tmp_name']));
                    $email_icon = image_resize($email_image_file['file'], 30, 30, false);
                    $email_file = explode('/', $email_icon);
                    $email_file = $email_file[count($email_file) - 1];
                    move_uploaded_file($_FILES['email_icon']['tmp_name'], $email_file);
                } else {
                    move_uploaded_file($_FILES['email_icon']['tmp_name'], $upload_loc . $email_file);
                }
            }
        } else {
            $email_file = $_POST['email_text'];
        }

        if (isset($_FILES['address_icon'])) {
            if ($_FILES['address_icon']['name'] != "") {
                // print_r($fax_file);
                $address_size = getimagesize($_FILES['address_icon']['tmp_name']);
                $address_file = ($_FILES['address_icon']['name']);
                // print_r($address_file);
                if (($address_size[0] > 30) || ($address_size[1] > 30)) {
                    $address_image_file = wp_upload_bits($_FILES['address_icon']['name'], null, file_get_contents($_FILES['address_icon']['tmp_name']));
                    $address_icon = image_resize($address_image_file['file'], 30, 30, false);
                    $address_file = explode('/', $address_icon);
                    $address_file = $address_file[count($address_file) - 1];
                    move_uploaded_file($_FILES['address_icon']['tmp_name'], $address_file);
                } else {
                    move_uploaded_file($_FILES['address_icon']['tmp_name'], $upload_loc . $address_file);
                }
            }
        } else {
            $address_file = sanitize_text_field($_POST['address_text']);
        }

        $result = $wpdb->update($table_name, array('title' => $title_data, 'phone' => $text_data, 'phone_image' => $phone_file,
            'fax' => $_POST['fax_data'], 'fax_image' => $fax_file, 'email' => $email_data, 'email_image' => $email_file,
            'mobile' => $_POST['mobile_data'], 'mobile_image' => $mobile_file, 'address_image' => $address_file,
            'address' => $address_data), array('id' => $id));
        $wpdb->query($wpdb->prepare($result,null));

//if($result > 0){
//echo "Successfully Updated";
//}
//else{
//  exit(var_dump( $wpdb->last_query ) );
//}
//$wpdb->flush();
        $success = __('Contact Details updated Successfully.');
        ?>
        <script type="text/javascript">
            window.location = "<?php echo 'admin.php?page=edit_data&id=' . $id . '&msg=success' ?>";
        </script>
        <?php
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
    <form id="theForm" class="form-inline" role="form" method="post" enctype="multipart/form-data">
        <?php
        if ($_GET['msg'] == 'success') {
            $success = __('Block Updated Successfully.');
            wpcb_showMessage($success);
        }
        ?> 
        <div class="col-md-12">
            <h2>Edit Contact Details</h2>
            <div class="col-md-2"> <h3>Title:</h3>  </div>           
            <div class="col-md-3 m-t">
                <input type="text" class="form-control" id="text_data" name="title"  placeholder="Title"  value="<?php echo $editingrecord->title; ?>">
            </div>

        </div>
        <br/><br/><hr/>
        <div class="col-md-12">

            <div class="col-md-1"> <label>Phone:</label>  </div>           
            <div class="col-md-3">
                <input type="tel" class="form-control" maxlength="15" id="text_data" name="text_data"  placeholder="Enter Phone" value="<?php echo $editingrecord->phone; ?>">
            </div>
            <div class="col-md-5">
                <input id="uploadFile" class="input-large" name="phone_text" placeholder="Choose File" value="<?php echo $editingrecord->phone_image; ?>" />
                <div class="fileUpload btn btn-primary">
                    <span>Upload Icon</span>
                    <input id="uploadBtn" type="file" class="upload" name="phone_icon"/>
                </div>
           </div>
        </div>
        <div class="col-md-12 m-t">
            <div class="col-md-1"> <label>Fax:</label>  </div>           
            <div class="col-md-3">
                <input type="tel" class="form-control" maxlength="15" id="fax_data" name="fax_data" placeholder="Enter Fax" value="<?php echo $editingrecord->fax; ?>">
            </div>
            <div class="col-md-5">
                <input id="fax_text" class="input-large" name="fax_text" placeholder="Choose File" value="<?php echo $editingrecord->fax_image; ?>" />
                <div class="fileUpload btn btn-primary">
                    <span>Upload Icon</span>
                    <input id="fax_icon" type="file" class="upload" name="fax_icon"/>
                </div>
            </div>
        </div>
        <div class="col-md-12 m-t">
            <div class="col-md-1"> <label>Email:</label>  </div>           
            <div class="col-md-3">
                <input type="text" class="form-control" id="email_data" name="email_data" placeholder="Enter Email" value="<?php echo $editingrecord->email; ?>">
            </div>
            <div class="col-md-5">
                <input id="email_text" class="input-large" name="email_text" placeholder="Choose File"  value="<?php echo $editingrecord->email_image; ?>" />
                <div class="fileUpload btn btn-primary">
                    <span>Upload Icon</span>
                    <input id="email_icon" type="file" class="upload" name="email_icon"/>
                </div>
            </div>
        </div>
        <div class="col-md-12 m-t">
            <div class="col-md-1"> <label>Mobile:</label>  </div>           
            <div class="col-md-3">
                <input type="text" class="form-control" maxlength="15" id="mobile_data" name="mobile_data" placeholder="Enter Mobile" value="<?php echo $editingrecord->mobile; ?>">
            </div>
            <div class="col-md-5">
                <input id="mobile_text" class="input-large" name="mobile_text" placeholder="Choose File"  value="<?php echo $editingrecord->mobile_image; ?>" />
                <div class="fileUpload btn btn-primary">
                    <span>Upload Icon</span>
                    <input id="mobile_icon" type="file" class="upload" name="mobile_icon"/>
                </div> 
            </div>
        </div>
        <div class="col-md-12 m-t">
            <div class="col-md-1"> <label>Address:</label>  </div>           
            <div class="col-md-3">
                <textarea id="address_data" name="address_data"  rows="5" cols="32" placeholder="Enter Address"><?php echo $editingrecord->address; ?></textarea>
            </div>
            <div class="col-md-5">
                <input id="address_text" class="input-large" name="address_text" placeholder="Choose File" value="<?php echo $editingrecord->address_image; ?>"/>
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
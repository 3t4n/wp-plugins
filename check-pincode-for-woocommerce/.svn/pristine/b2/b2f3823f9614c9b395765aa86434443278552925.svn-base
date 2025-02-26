<?php 
add_action('admin_menu', 'CPIW_PincodeAdd');
 
function CPIW_PincodeAdd() {

    add_submenu_page(
        'pin-code',
        __( 'Add Pincodes', 'check-pincode-for-woocommerce'),
        __( 'Add Pincodes', 'check-pincode-for-woocommerce'),
        'manage_options',
        'my-add-pincode-submenu-page',
        'CPIW_PincodeAddCallback' 
    );  

}
  
function CPIW_PincodeAddCallback(){
    
    global $wpdb;
    $tablename=$wpdb->prefix.'cpiw_pincode';

    if(isset($_REQUEST['action']) && $_REQUEST['action'] == "pincode_edit") { 
        $pincode = sanitize_text_field($_REQUEST['id']);
        $pincodes_record = $wpdb->get_results($wpdb->prepare(
            "SELECT * FROM {$tablename} WHERE id = %s", // %s for strings, %d for integers
            $pincode
        ), OBJECT);
        if(isset($_GET['update']) && $_GET['update'] == 'exists') { ?>
                <div class="notice notice-error is-dismissible">
                     <p>This Pincode Already Exits.</p>
                </div>
         <?php 
        }

        if(isset($_GET['update']) && $_GET['update'] == 'success') { ?>
            <div class="notice notice-success is-dismissible">
                 <p>This Pincode Successfully Update.</p>
            </div>
        <?php } ?>

        <div id="poststuff">
            <div class="postbox">
                <div class="postbox-header">
                    <h2>Update Post Code</h2>
                </div>
                <div class="inside">
                    <form method="post">
                        <?php wp_nonce_field( 'CPIW_update_pincode_action', 'CPIW_update_pincode_field' ); ?>
                        <table class="form-table">
                            <tbody>
                                <tr>
                                    <th>
                                        <label>Pincode
                                        </label>
                                    </th>
                                    <td>
                                        <input type="text" name="cpiwpincode" value="<?php echo esc_attr($pincodes_record[0]->pincode); ?>" required="" />
                                        <input type="hidden" name="pincodeid" value="<?php echo esc_attr($pincodes_record[0]->id); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label >State Name
                                        </label>
                                    </th>
                                    <td>
                                        <input type="text" name="cpiwstate" value="<?php echo esc_attr($pincodes_record[0]->state); ?>"  required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label>City Name
                                        </label>
                                    </th>
                                    <td>
                                        <input type="text" name="cpiwcity" value="<?php echo esc_attr($pincodes_record[0]->city); ?>"  required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label>Shipping Amount
                                        </label>
                                    </th>
                                    <td>
                                        <input type="text" name="cpiwshipping" value="<?php echo esc_attr($pincodes_record[0]->ship_amount); ?>" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label >Delivery within days
                                        </label>
                                    </th>
                                    <td>
                                        <input type="text" name="cpiwddate" value="<?php echo esc_attr($pincodes_record[0]->ddate); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label >Cash on Delivery Availabel
                                        </label>
                                    </th>
                                    <td>
                                        <input type="checkbox" name="cpiwcod" value="1" <?php if($pincodes_record[0]->caseondilvery == '1') { echo 'checked'; } ?> />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      <input type="hidden" name="action" value="cpiw_update_postcode">
                                      <input type="submit" name="cpiw_update_postcode" class="button button-primary" value="Update Pincode">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>


    <?php }else{ 

            if(isset($_GET['add']) && $_GET['add'] == 'success') { ?>
                    <div class="notice notice-success is-dismissible">
                         <p>This Pincode Successfully Added.</p>
                    </div>
            <?php
            }

            if(isset($_GET['add']) && $_GET['add'] == 'exists') {  ?>
                    <div class="notice notice-error is-dismissible">
                         <p>This Pincode Already Exits.</p>
                    </div>
            <?php } ?>

            <div id="poststuff">
                <div class="postbox">
                    <div class="postbox-header">
                        <h2>Add Post Code</h2>
                    </div>
                    <div class="inside">
                        <form method="post">
                            <?php wp_nonce_field( 'CPIW_add_pincode_action', 'CPIW_add_pincode_field' ); ?>
                            <table class="form-table">
                                <tr>
                                    <th>
                                        <label >Pincode
                                        </label>
                                    </th>
                                    <td>
                                        <input type="text" name="cpiwpincode" value="<?php if(isset($_GET['cpiwpincode']) && esc_attr($_GET['cpiwpincode']) != '') { echo esc_attr($_GET['cpiwpincode']); } ?>" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label>State Name
                                        </label>
                                    </th>
                                    <td>
                                        <input type="text" name="cpiwstate" value="<?php if(isset($_GET['cpiwstate']) && $_GET['cpiwstate'] != '') { echo esc_attr($_GET['cpiwstate']); } ?>" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label>City Name
                                        </label>
                                    </th>
                                    <td>
                                        <input type="text" name="cpiwcity" value="<?php if(isset($_GET['cpiwcity']) && $_GET['cpiwcity'] != '') { echo esc_attr($_GET['cpiwcity']); } ?>" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label >Shipping Amount
                                        </label>
                                    </th>
                                    <td>
                                        <input type="text" name="cpiwshipping" value="<?php if(isset($_GET['cpiwshipping']) && $_GET['cpiwshipping'] != '') { echo esc_attr($_GET['cpiwshipping']); } ?>" required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label >Delivery within days
                                        </label>
                                    </th>
                                    <td>
                                        <input type="text" name="cpiwddate" value="<?php if(isset($_GET['cpiwddate']) && $_GET['cpiwddate'] != '') { echo esc_attr($_GET['cpiwddate']); } ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label >Cash on Delivery Available
                                        </label>
                                    </th>
                                    <td>
                                        <input type="checkbox" name="cpiwcod" value="1" <?php if(isset($_GET['cpiwcod']) && $_GET['cpiwcod'] == '1') { echo 'checked'; } ?> />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="hidden" name="action" value="cpiw_add_postcode">
                                        <input type="submit" name="cpiw_add_postcode" class="button button-primary" value="Add Pincode">
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div>
                </div>
            </div>

    <?php } 

    CPIW_PincodeImport();
      
 
}
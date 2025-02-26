<?php
global $wpdb;

$admin_contacts = $wpdb->get_results(
    $wpdb->prepare(
        
        "SELECT * from " .alidani_contact_form_admin_info_database_table().  " WHERE adminid > %d " ,""
        ),ARRAY_A
);

?>
<div class="mainAdmin-front">
<div class="container leftAdmin-front">
<div class="row">
    <div class="alert alert-info">
    <h4>Admin Informations</h4>
    <div class="panel panel-primary">
    
        <div class="panel-heading">Admin Informations</div>
        <div class="panel-body">
        <form class="form-horizontal"  action="javascript:void(0)" id="AdminInfoAlidaniContactFrm">
            <div class="form-group AdminInfo">
                <label class="control-label col-sm-2" for="admin-first-name">First Name:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="admin-first-name" name="admin-first-name" placeholder="Enter your First Name" required>
                </div>
            </div>
            <div class="form-group AdminInfo">
                <label class="control-label col-sm-2" for="admin-last-name">Last Name:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="admin-last-name" name="admin-last-name" placeholder="Enter your Last Name" required>
                </div>
            </div>
            <div class="form-group AdminInfo">
                <label class="control-label col-sm-2" for="admin-email">Email:</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="admin-email" name="admin-email" placeholder="Enter your Email" required>
                </div>
            </div>
            <div class="form-group AdminInfo">
                <label class="control-label col-sm-2" for="admin-message">Message:</label>
                <div class="col-sm-10">
                <textarea name="admin-message" id="admin-message" placeholder="Enter your message" class="form-control" ></textarea>
                </div>
            </div>
           
            <div class="form-group AdminInfo">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default adminButton">Save</button>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>

</div>

<div class="container rightAdmin-front">
    <div class="row">
        <div class="alert alert-info">
            <h5>Admin Details</h5>
        </div>
         <div class="panel panel-primery">
        <div class="panel-heading">Admin Details</div>
        <div class="panel-body">
    <table id="my-sliding" class="display" style="width:100%">
        <thead>
            <tr>
                <th>NO.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(count($admin_contacts) > 0){
                $i = 1;
                foreach($admin_contacts as $key=>$value){
                    ?>
                    <tr>
                    <td><?php echo $i++?></td>
                    <td><?php echo esc_html($value['adminfirstname']);?></td>
                    <td><?php echo esc_html($value['adminlastname']);?></td>
                    <td><?php echo esc_html($value['adminemail']);?></td>
                    <td><?php echo esc_html($value['adminmessage']);?></td>
                    <td>
                        <a class="btn btn-info" href="admin.php?page=editadminform&adminedit=<?php echo $value['adminid']; ?>">Edit</a>
                        <a class="btn btn-danger btnalidaniadmindelete"href="javascript:void(0)" data-admin-id="<?php echo $value['adminid']; ?>">Delete</a>
                    </td>
                </tr>
                <?php
                }
            }
            
            ?>          
        </tbody>
      </table>
    </div>
 </div>
</div>
</div>
</div>
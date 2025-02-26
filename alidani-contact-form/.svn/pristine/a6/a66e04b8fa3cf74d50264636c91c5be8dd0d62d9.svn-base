
<?php
global $wpdb;

$all_contacts = $wpdb->get_results(
    $wpdb->prepare(
        
        "SELECT * from " .alidani_contact_form_database_table().  " WHERE id > %d " ,""
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
            <h5>Received Emails</h5>
        </div>
         <div class="panel panel-primery">
        <div class="panel-heading">Emails Contents</div>
        <div class="panel-body">
    <table id="my-sliding" class="display myslidingRecieve" style="width:100%">
        <thead>
            <tr>
                <th>NO.</th>
                <th><?php echo esc_html($alidani_color_font_details['fontone']) ?></th>
                <th><?php echo esc_html($alidani_color_font_details['fonttwo']) ?></th>
                <th><?php echo esc_html($alidani_color_font_details['fontthree']) ?></th>
                <th><?php echo esc_html($alidani_color_font_details['fontfour']) ?></th>
                <th><?php echo esc_html($alidani_color_font_details['fontfive']) ?></th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(count($all_contacts) > 0){
                $i = 1;
                foreach($all_contacts as $key=>$value){
                    ?>
                    <tr>
                    <td><?php echo $i++?></td>
                    <td><?php echo esc_html($value['firstname']);?></td>
                    <td><?php echo esc_html($value['lastname']);?></td>
                    <td><?php echo esc_html($value['email']);?></td>
                    <td><?php echo esc_html($value['number']);?></td>
                    <td><textarea style="width: 75%;"><?php echo esc_html($value['enquiry']);?></textarea> </td>
                    <td><?php echo esc_html($value['creating']); ?></td>
                    <td>
                        <a class="btn btn-info" href="admin.php?page=editform&edit=<?php echo esc_html($value['id']); ?>">Show</a>
                        <a class="btn btn-info" href="admin.php?page=sendadminform&sendemail=<?php echo esc_html($value['id']); ?>">Send Email</a>
                        <a class="btn btn-danger btnalidanirecievedelete"href="javascript:void(0)" data-id="<?php echo esc_html($value['id']); ?>">Delete</a>
                    </td>
                </tr>
                <?php
                }
            }
            
            ?>
			 <script type="text/javascript">
    // update
jQuery(document).ready(function(){
setInterval(function(){
      jQuery("#my-sliding").load(window.location.href + " #my-sliding" );
}, 5000);
});
// end of update
    </script>
           
           
        </tbody>
       
    </table>
    </div>
 </div>


</div>
</div>
    
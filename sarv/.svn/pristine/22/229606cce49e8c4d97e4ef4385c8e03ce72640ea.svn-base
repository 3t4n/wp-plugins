<?php

$formLists = Sarv_viewContactLists();

$i = 1;
if(empty($formLists)):
?>
<h4>Your account not have any lists in account.</h4>
<a href="https://manage.sarv.com/" target="_blank">Please Add Contact List in Sarv Dashbord.</a>

<?php else: ?>


<table class="wp-list-table widefat  posts sr_stng_tbl">
  <thead>
  <tr>
    <th scope="col" id="sno" class="manage-column column-title column-primary"><span>#S.No.</span></th>
    <th scope="col" id="title" class="manage-column column-title column-primary"><span>List Name</span></th>
    <th scope="col" id="shortcode" class="manage-column column-shortcode">Shortcode</th>
    <th scope="col" id="date" class="manage-column column-title column-primary" style="text-align: center;"><span>Subscriber Count</span></th>  
    <th scope="col" id="date" class="manage-column column-title column-primary"><span>Status</span></th>
  </tr>
  </thead>


<tbody>
  <?php 

    foreach ($formLists as $key => $formList) { 

    $formAdded = Sarv_getDataFromDb($formList->cl_id);

      ?>

        <tr>
          <td class="sno column-title"><strong><?php echo $i; ?></strong></td>
          <td class="list_name title column-title has-row-actions column-primary" data-colname="Title"> 
              <a class="row-title" href="admin.php?page=manage_setting&listid=<?php echo $formList->cl_id; ?>" title="Edit <?php echo $formList->contact_list; ?> "><?php echo $formList->contact_list; ?></a> 
              <a title="Edit" href="admin.php?page=manage_setting&listid=<?php echo $formList->cl_id; ?>"><i class="fa fa-pencil-square-o"></i></a>

          </td>
           <td class="shortcode column-shortcode" data-colname="Shortcode"><?php if($formAdded && !empty($formAdded)): ?>
          <span class="shortcode"><input onfocus="this.select();" readonly="readonly" value='[sarv_form formid="<?php echo $formList->cl_id; ?>"]' class="large-text code" type="text"></span><?php endif; ?>
          </td>
          <td class="author column-title" style="text-align: center;"><span class="subscriber_count"><?php echo $formList->total_contacts; ?></span></td>
          <td class="author column-title"><?php if(!$formAdded && empty($formAdded)): ?><span class="inactive_infoswe"><strong class="inactive">Inactive</strong><font class="status_tooltip"><i class="fa fa-bell-o" aria-hidden="true"></i> Edit and Save then it will active</font></span><?php else: ?><strong class="active">Active</strong><?php endif; ?></td>
        </tr> 

  <?php $i++; } ?>
</tbody>

</table>


<?php endif; ?>


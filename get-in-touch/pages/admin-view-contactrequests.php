<div class="wrap t201plugin">
  <h2>
     Contact Requests
     <a href="<?php print admin_url('admin.php?page=get-in-touch'); ?>" class="add-new-h2">All Forms</a>
 </h2>
</div>


<?php
 //Object of Get Data Class
  $GetClass = new git\GetData();
  $ContactFormData = $GetClass->GetAllContactFormData();
?>
  <div class="git-container">

<?php
    if(!empty($ContactFormData))
    {
?>
<?php
    }
?>
    <div class="git-row">
      <div class="box">
        <div class="box-header well">
          <p style="color:#606060;">
             Contact Details
            <a href="http://labs.think201.com/plugin/get-in-touch/" target="_blank" class="git-need-help">Need help?</a>
          </p>
        </div>
        <div class="box-content">
<?php
          if(!empty($ContactFormData))
          {
?>
          <table class="form-view-container" id="contact-mail-table">
            <tr class="forms-view-head">
              <td>Select</td>
              <td>Before</td>
              <td>IP Address</td>
              <td>Contact Form Details</td>
              <td>Action</td>
              <td>Important</td>
            </tr>
<?php
          }
?>
<?php
            $i = 1;
            foreach($ContactFormData as $ContactData)
            {
              $UnserializeContactFormData = unserialize($ContactData->ContactForm_Data);
?>
              <tr>
                <td><?php echo $i; ?></td>
                <td>
<?php
                  $DBTime = strtotime($ContactData->ContactForm_Time);
                  // Calling function to get Human Readable Time
                  $HTime = \git\humanTiming($DBTime);
                  echo $HTime.' Ago.';
?>
                </td>
                <td>
                  <?php echo $ContactData->User_IP; ?>
                </td>
                <td class="git-mail-data">
<?php
                  print_r(nl2br($UnserializeContactFormData));
?>
                </td>
                <td><a class="deletedata" id="<?php echo $ContactData->ContactForm_Id; ?>" href="#">DELETE</a></td>
                <td>
                  <select class="form-control data_inportance" id="<?php echo $ContactData->ContactForm_Id; ?>" name="data_inportance">
                    <option value="<?php echo $ContactData->Form_RatingData; ?>"><?php echo $ContactData->Form_RatingData; ?></option>
<?php               if($ContactData->Form_RatingData === 'Important')
                    {
?>
                      <option value="Very Important">Very Important</option>
                      <option value="Average">Average</option>
<?php
                    }
                    else if($ContactData->Form_RatingData === 'Average')
                    {
?>
                      <option value="Important">Important</option>
                      <option value="Very Important">Very Important</option>
<?php
                    }
                    else if($ContactData->Form_RatingData === 'Very Important')
                    {
?>
                      <option value="Important">Important</option>
                      <option value="Average">Average</option>
<?php
                    }
?>
                  </select>
                </td>
              </tr>
<?php
              $i++;
            }
?>
          </table>
        </div>
      </div>
    </div>
  </div>

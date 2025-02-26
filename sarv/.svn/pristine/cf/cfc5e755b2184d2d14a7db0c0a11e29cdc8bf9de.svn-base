<?php

      $listId = sanitize_text_field($_GET['listid']);

      if(is_array($_POST) && $_POST!="" && !empty($_POST)){

         $formData = json_encode($_POST);

         $listId = sanitize_text_field($_POST['listid']);

         $checkData = Sarv_getDataFromDb($listId);
         $dataCheck = count($checkData);

         if($dataCheck==1 && $dataCheck!=0):
            $queryResult = Sarv_updateDataInDb($listId, $formData);
         else:
            $queryResult = Sarv_inserDataInDb($listId, $formData);
         endif;

         if($queryResult==1){
          echo "<div id='message' class='updated notice notice-success is-dismissible'><p>Successfully updated.</p></div>";
         }

      }

      $updateData = Sarv_getDataFromDb($listId);
      $allFormData = json_decode($updateData[0]->value,true);

      $listId = sanitize_text_field($_REQUEST['listid']);

      $formLists = Sarv_getContactLists($listId);

      foreach ($formLists as $key => $formList) {

        if($formList->cl_id == $listId):

        $formFields = $formList->fields;
        $fieldRequire = $formList->require_fields;
        $fieldTypes = $formList->field_category_relation;

        //print_r($fieldRequire);

      ?>
        <h3 class="sub_headingsd"><b><?php echo $formList->contact_list; ?></b> Form</h3>



<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype='application/json'>


<table class="form-table edit_form_setting">
  <tbody id="sortable">

<?php if(!empty($allFormData) && is_array($allFormData)): 

$formFields = array_keys($allFormData);

endif; ?>

        <?php foreach ($formFields as $key => $formName) {

            $updateddata = $allFormData[$formName];


            if(isset($updateddata['label']) && $updateddata['label']!=""): $label = $updateddata['label']; else: $label = $formName; endif;
            if(isset($updateddata['disable']) && $updateddata['disable']==1): $disable = "checked='checked'"; else: $disable=""; endif;
            if(isset($updateddata['required']) && $updateddata['required']==1): $required = "checked='checked'"; else: $required=""; endif;
            if(isset($updateddata['value']) && $updateddata['value']=="true"): $optval = "checked='checked'"; else: $optval=""; endif;

            $fieldType = $fieldTypes->$formName;

            if(isset($fieldType)):

             ?>
            <tr class="">
              <th scope="row"><label for="user_login"><?php echo $label; ?> : </label></th>
              <td><input type="text" class="form-control" name="<?php echo $formName; ?>[label]" value="<?php echo $label; ?>" aria-required="true" autocapitalize="none" autocorrect="off" width="48" height="48"><span><em> You can change field label from here.</em></span><br />
              <input type="hidden" name="<?php echo $formName; ?>[name]" value="<?php echo $formName; ?>">
              <input type="hidden" name="<?php echo $formName; ?>[type]" value="<?php echo $fieldType; ?>"><br />
                
                <?php if(in_array($formName, $fieldRequire)): ?>
                  <input type="hidden" name="<?php echo $formName; ?>[required]" value="1"  style="display: block; margin-top: 10px;">
                <?php else: ?>
                <span class="checkbox-inline"><label><input type="checkbox" name="<?php echo $formName; ?>[required]" value="1" <?php echo $required; ?>>Required</label></span>
                <span class="checkbox-inline"><label><input type="checkbox" name="<?php echo $formName; ?>[disable]" value="1" <?php echo $disable; ?>>Disable</label></span>
                <?php endif; ?>
              </td>
            </tr>

             
        <?php  endif;
        if($formName=="opt_in"):
         ?>

        </tbody>
        <tr>
          <th scope="row"><label for="opt_in">Double opt : </label></th>
          <td><input type="checkbox" name="opt_in[value]" value="true" <?php echo $optval; ?>><span><em> Send contacts an opt-in confirmation email when they subscribe to your list.</em></span>
          <input type="hidden" name="opt_in[name]" value="opt_in">
          <input type="hidden" name="opt_in[type]" value="hidden"></td>
        </tr>

        <?php endif; } ?>

       
       
        <tr class="form-field">
          <td></td>
          <td><input type="hidden" name="listid" value="<?php echo $listId; ?>">
          <input type="submit" class="button button-primary" value="Save" class="btn btn-default"></td>
        </tr>


     

</table>
</form>





<table class="form-table">
  <tbody>
  <tr>
  <th>ShortCode:</th>
  <td><input onfocus="this.select();" readonly="readonly" value='[sarv_form formid="<?php echo $listId; ?>"]' class="large-text code" type="text" maxlength="60"></td>
  </tr>
  </tbody>
</table>
      <?php
        endif;
       
      }

?>
<?php

include ("api.config.inc.php");

function sarv_request_form_setting()
{
	if(isset($_POST) && is_array($_POST) && !empty($_POST)):

         global $wpdb;
     
         $tableName = $wpdb->prefix . 'sarvoptions';

		  $formData = json_encode($_POST);

         $checkData = Sarv_getDataFromDb("options");

         $dataCheck = count($checkData);

         if($dataCheck==1 && $dataCheck!=0):
            $queryResult = $wpdb->query("UPDATE $tableName SET value='".$formData."' WHERE name='options'");
         else:
            $queryResult = $wpdb->query("INSERT INTO $tableName (name,value) VALUES ('options','".$formData."')");
         endif;


      //Check Data

        $result = Sarv_checkApiConnection();

         echo $result;

         wp_die();

	endif;

}

function sarv_insert_contacts(){


   if(isset($_POST) && is_array($_POST) && !empty($_POST)):


      $formData = $_POST;
   
      $listId = sanitize_text_field($_POST['listid']);

      $result = Sarv_addContacts($listId, $formData);

      echo $result;

      wp_die();

   else:

      //wp_redirect();
   endif;



}
?>
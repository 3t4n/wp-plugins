<?php

function sarv_subscription_form($formid){

extract(shortcode_atts(array(
    'formid' => 'formid'
), $formid));

$getData = Sarv_getDataFromDb($formid);
$getFormDatas = (array)json_decode($getData[0]->value);


$connectCheck = Sarv_checkApiConnection();
$connectCheck = (array)json_decode($connectCheck);

$listCheckInfo = Sarv_getContactLists($formid);

$result = $connectCheck['msg'];

if($result=="success"):     

if(!empty($getFormDatas) && is_array($getFormDatas)):       

?>


<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="sarvWidgetForm" method="post"> 


<?php foreach ($getFormDatas as $key => $getFormData) {
	if(isset($getFormData->label) && isset($getFormData->type)): ?>

	<?php if($getFormData->disable!=1 && $getFormData->disable==NULL):
			$name = $getFormData->name;
			$label = $getFormData->label;
			$type = $getFormData->type;
            $required = $getFormData->required;

            if(isset($required) && $required==1): $requiredCheck = "required"; else: $requiredCheck = ""; endif;
	 ?>
		<div class="form-group">

		<?php if($type=="name" || $type=="text"): ?>
            <label for="formtitle"><?php echo $label; ?>:</label>
            <input type="text" class="form-control <?php echo $requiredCheck; ?>" id="<?php echo $name; ?>" name="<?php echo $name; ?>" <?php echo $requiredCheck; ?>>
            <?php if($requiredCheck): ?><span class="sarverror" style="display:none">Please enter value. </span><?php endif; ?>
        <?php elseif($type=="email"): ?>
        	<label for="formtitle"><?php echo $label; ?>:</label>
            <input type="email" class="form-control <?php echo $requiredCheck; ?>" id="<?php echo $name; ?>" name="<?php echo $name; ?>" <?php echo $requiredCheck; ?>>
            <?php if($requiredCheck): ?><span class="sarverror" style="display:none">Please enter value. </span><?php endif; ?>
        <?php elseif($type=="url"): ?>
        	<label for="formtitle"><?php echo $label; ?>:</label>
            <input type="url" class="form-control <?php echo $requiredCheck; ?>" id="<?php echo $name; ?>" name="<?php echo $name; ?>" <?php echo $requiredCheck; ?>>
            <?php if($requiredCheck): ?><span class="sarverror" style="display:none">Please enter value. </span><?php endif; ?>
        <?php elseif($type=="mobile"): ?>
        	<label for="formtitle"><?php echo $label; ?>:</label>
            <input type="text" class="form-control <?php echo $requiredCheck; ?>" id="<?php echo $name; ?>" name="<?php echo $name; ?>" <?php echo $requiredCheck; ?>>    
            <?php if($requiredCheck): ?><span class="sarverror" style="display:none">Please enter value. </span><?php endif; ?>
        <?php elseif($type=="integer"): ?>
        	<label for="formtitle"><?php echo $label; ?>:</label>
            <input type="number" class="form-control <?php echo $requiredCheck; ?>" id="<?php echo $name; ?>" name="<?php echo $name; ?>" <?php echo $requiredCheck; ?>>
            <?php if($requiredCheck): ?><span class="sarverror" style="display:none">Please enter value. </span><?php endif; ?>
        <?php elseif($type=="float"): ?>
        	<label for="formtitle"><?php echo $label; ?>:</label>
            <input type="number" step="any" class="form-control <?php echo $requiredCheck; ?>" id="<?php echo $name; ?>" name="<?php echo $name; ?>" <?php echo $requiredCheck; ?>>
            <?php if($requiredCheck): ?><span class="sarverror" style="display:none">Please enter value. </span><?php endif; ?>
        <?php elseif($type=="boolean"): ?>
        	<label for="formtitle"><?php echo $label; ?>:</label>
            <div class="radio">
              <label><input type="radio" name="<?php echo $name; ?>" value="1">True</label>
            </div>
            <div class="radio">
              <label><input type="radio" name="<?php echo $name; ?>" value="0">False</label>
            </div>
        <?php elseif($type=="dd-mm-YYYY" || $type=="YYYY-mm-dd" || $type=="mm-dd-YYYY"): ?>
        	<label for="formtitle"><?php echo $label; ?>:</label>
            <input type="date" class="form-control" id="<?php echo $name; ?>" name="<?php echo $name; ?>" <?php echo $requiredCheck; ?>>
        <?php endif; ?>
        </div>
    <?php endif; ?>

<?php endif; } ?>

			<div class="form-group">
				<input type="hidden" name="listid" value="<?php echo $formid; ?>">
			  	<input type="submit" name="sarvform" value="<?php if(isset($submit) && $submit!=""): echo $submit; else: echo "Subscribe"; endif; ?>" class="btn btn-default">
			 </div>
</form> 


<div class="alert alert-success" id="successmeg" style="display: none;"></div>

<div class="alert alert-danger" id="errormess" style="display: none;"></div>


<script type="text/javascript">
  
  jQuery('#FirstName').on('input', function() {
      var input=$(this);
      var is_name=input.val();
      alert(is_name);
  });

</script>


<?php
else:
     echo "[sarv_form error='form id not exits']";  
endif;

else:
    echo "[sarv_form error='api not connected']";
endif;
}
add_shortcode('sarv_form', 'sarv_subscription_form');

?>
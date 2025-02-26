<div class="container partial-view-tab-subscription-container">
    <hr>
  <div class="panel-group">
    <div class="panel panel-primary str no-border">
      <div class="panel-heading">
        <div class="subscription-head-title-padding pull-left ">WooQuote Subscription</div>
        <div class="input-group display-none pull-right" id="emable-html-append-point"></div>
            <div class="row subs-plugin-enable-checkbox-row">
              <div class="alignright">
                <div class="col-sm-12 plugin-enable-holder-class" id="plugin-enable-holder-id" title="WooQuote Enable: Please be sure switch is 'On' if you want use Appsila WooQuote plugin. ">
                     <input type="checkbox"  class="form-control enable setting-wooquote-enable-checkbox-input" id="enable-toggle-id" name="enable-toggle-name"
                     data-toggle="toggle" data-size="Small" data-on="On" data-off="Off" <?php if ($lastCRMoptions[ 'enable']=="on" ) echo "checked='checked'"; ?>
                     data-onstyle="success"  value="<?php if($lastCRMoptions[ 'enable']=="on"){echo true; }else{echo false;} ?>">
                     <input type="text" class="display-none" id="enable" name="enable" value="<?php echo $lastCRMoptions[ 'enable'] ?>"/>
                </div>

              </div>
           </div>
       </hr>


      </div>


      
        <div class="panel-body" id="subscription-inputs-holder-panel-body">
            <div class="row">
                <div class="col-sm-12">
            <a class="btn btn-info pull-right leave-space-above " data-toggle="popover" data-html="true" data-content="Click here if you need help about '<i>Subscription Settings.</i>'" data-trigger="hover" data-placement="bottom" href="#" onclick="open_step_under_tab('#help-and-installation-tab-href','step-one-btn');" target="_self">&#63;
            </a>
                </div>
            </div>
             <div class="row subs-email-row margin-bottom-default">
                  <div class="col-sm-12 leave-space-above" id="email">
                    <div class="input-group">
                       <span class="input-group-addon"><span class="" > &#9993;
</span></span>
                       <input type="email" class="form-control" dir="ltr" id="email-api" name="email-api"  placeholder="E-mail" data-toggle="popover" data-trigger="hover"
                               data-content="E-mail: Please write your trustable E-mail. We will send verification E-mail to you." data-placement="bottom"
                               style="<?php echo $lastCRMoptions["addedCss"]?>" dir="ltr" value="<?php echo $lastCRMoptions['email']; ?>" required>
                   </div>
                  </div>
              </div>
              <div class="row subs-api-key-row margin-bottom-default">
                <div class="col-sm-12 api-holder-class" id="subs-api-key-holder-class-id" >
                  <div class="input-group">
                     <span class="input-group-addon"><span class="" > &#128273; </span></span>
                     <input type="text" class="form-control" dir="ltr" id="website-api" name="website-api"  placeholder="API Key" data-toggle="popover" data-trigger="hover"
                             data-content="API Key: Please write your API Key that we sent to your E-mail. If you don't have it, Please do Purchase Or Apply Demo Request"
                             data-placement="bottom" style="<?php echo $lastCRMoptions["addedCss"]?>" dir="ltr" value="<?php echo $lastCRMoptions['apikey'];  ?>" required>
                 </div>
                </div>
              </div>
              <div class="row sub-user-api-row margin-bottom-default">
                <div class="col-sm-12 subs-user-api-holder-class" id="subs-user-api-holder-class-id" >
                  <div class="input-group">
                     <span class="input-group-addon"><span class=""> &#128279;</span></span>
                     <input type="url" class="form-control" dir="ltr"  id="user-api" name="hostname"  placeholder="Enter Your Web Site URL (http://abc.com)"  data-toggle="popover"
                            data-trigger="hover" data-content="Host Name: Please write your Host Name" data-placement="bottom" value="<?php echo $lastCRMoptions['hostname'];  ?>" required>
                 </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 subs-submit-holder-class margin-bottom-default" id="subs-submit-holder-class-id" >
                  <div class="input-group pull-right">
                     <input type="submit" data-toggle="popover" data-trigger="hover" data-content="Submit: Please Submit Your Changes." data-placement="bottom" class="btn btn-danger "
                     value="&#128427; SAVE CHANGES" name="product_transfer_type_button" id="product_transfer_type_button">
                 </div>
                </div>
              </div>


              <div class="page-hidden-inputs-holder">
                <?php
                    //Unknown Inputs where is coming from or where to go
                    echo '<input type="hidden" name="e_mail" value="'. $e_mail. '">';
                    echo '<input type="hidden" name="web_url" value="'. $web_url. '">';
                    echo '<input type="hidden" name="ticaretcrm_key" value="'. $ticaretcrm_key. '">';
                    echo '<input type="hidden" name="hostname_database" value="'. $hostname_database. '">';
                 ?>
              </div>

         </div>
    </div>
  </div>
</div>
<script>
    /**@TODO Defined Toggle couldn't took ->Enable form element
    * this short cut solution defines suit return for server side
    */
    $('#enable-toggle-id').parent().on('change',function(){
          var result;
          var condition=$('#enable-toggle-id').is(':checked');
          if (condition===true) {
            result="on";
          }else {
            result="off";
          }
          $('#enable').attr('value',result) ;
    });
    var isInputsAreFilled=false;
    $('#subscription-inputs-holder-panel-body input').each(function(){
		var value=$(this).val();
		if(value!=null&&value!=""&&value!=" "&&value!=undefined){
			value=true;	
			}
        });
     if(isInputsAreFilled===false){
			if($('#enable').val()==="off"){
				$('#enable-toggle-id').click();
				}
        }
</script>


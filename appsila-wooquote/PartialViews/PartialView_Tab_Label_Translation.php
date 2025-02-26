<div class="container partial-view-tab-label-translation-container">
    <hr>
  <div class="panel-group">
    <div class="panel panel-primary no-border">
      <div class="panel-heading">
          <div class="">Label Translations</div>
          
      </div>
        
      <div class="panel-body leave-space-above">
          
           <?php
        /**@TODO Calisma alani kullanilmiyor Release de
        * @see silinebilir*/
        $satir='[
            {"requestQoute":{"translationTarget":"translationTarget", "title":"xxxxxxxxxxxxxxxx", "dataContentPopup":"translationTarget", "inputId":translationTarget","inputName":"translationTarget","inputValue":"translationTarget"}},
            {"requestQoute2":{"translationTarget":"translationTarget", "title":"xxxxxxxxxxxxxxxx", "dataContentPopup":"translationTarget", "inputId":"translationTarget","inputName":"translationTarget","inputValue":"translationTarget"}}
            ]';

        $rowsX=array(
          "requestQoute"=>array("translationTarget"=>"translationTarget", "title"=>"xxxxxxxxxxxxxxxx", "dataContentPopup"=>"translationTarget", "inputId"=>"translationTarget","inputName"=>"translationTarget","inputValue"=>"translationTarget"),
          "requestQoute1"=>array("translationTarget"=>"translationTarget", "title"=>"xxxxxxxxxxxxxxxx", "dataContentPopup"=>"translationTarget", "inputId"=>"translationTarget","inputName"=>"translationTarget","inputValue"=>"translationTarget"),
          "requestQoute2"=>array("translationTarget"=>"translationTarget", "title"=>"xxxxxxxxxxxxxxxx", "dataContentPopup"=>"translationTarget", "inputId"=>"translationTarget","inputName"=>"translationTarget","inputValue"=>"translationTarget"),
          "requestQoute3"=>array("translationTarget"=>"translationTarget", "title"=>"xxxxxxxxxxxxxxxx", "dataContentPopup"=>"translationTarget", "inputId"=>"translationTarget","inputName"=>"translationTarget","inputValue"=>"translationTarget"),
          "requestQoute4"=>array("translationTarget"=>"translationTarget", "title"=>"xxxxxxxxxxxxxxxx", "dataContentPopup"=>"translationTarget", "inputId"=>"translationTarget","inputName"=>"translationTarget","inputValue"=>"translationTarget"),
          "requestQoute5"=>array("translationTarget"=>"translationTarget", "title"=>"xxxxxxxxxxxxxxxx", "dataContentPopup"=>"translationTarget", "inputId"=>"translationTarget","inputName"=>"translationTarget","inputValue"=>"translationTarget"),
          "requestQoute6"=>array("translationTarget"=>"translationTarget", "title"=>"xxxxxxxxxxxxxxxx", "dataContentPopup"=>"translationTarget", "inputId"=>"translationTarget","inputName"=>"translationTarget","inputValue"=>"translationTarget"),
          "requestQoute7"=>array("translationTarget"=>"translationTarget", "title"=>"xxxxxxxxxxxxxxxx", "dataContentPopup"=>"translationTarget", "inputId"=>"translationTarget","inputName"=>"translationTarget","inputValue"=>"translationTarget"),
          "requestQoute8"=>array("translationTarget"=>"translationTarget", "title"=>"xxxxxxxxxxxxxxxx", "dataContentPopup"=>"translationTarget", "inputId"=>"translationTarget","inputName"=>"translationTarget","inputValue"=>"translationTarget")
        );
        $rowJson=json_decode($satir,true);


        ?>
          
          
           <div class="row ">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <a class="btn btn-info pull-right leave-space-above" data-toggle="popover" data-html="true" data-content="Click here if you need help about '<i>Label Translation.</i>'" data-trigger="hover" data-placement="bottom" href="#" onclick="open_step_under_tab('#help-and-installation-tab-href','step-four-btn');" target="_self">
                &#63;
            </a>
          </div>
          
        </div>
        <hr>
        <div class="row ">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              Request a Quote
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                  <span title="On Button Text" >
                    <a href="#" data-toggle="popover" data-placement="bottom" data-html="true" data-trigger="hover" data-content="Change the '<i>Request a Quote</i>' as you want it to appear."><i class="information-popover-icon-style">&#9673;</i></a>
                  </span>
                </span>
                <input type="textarea" class="form-control input-lg setting-label-translation-input" id="requestbutton" name="requestbutton" dir="ltr" value="<?php echo $ticaretCRMoptions_message['requestbutton'];  ?>" >
           </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              Thank you for your request. We will return to you as soon as possible.
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                  <span title="On Button Text" >
                    <a href="#" data-toggle="popover" data-placement="bottom" data-html="true" data-trigger="hover" data-content="Change the '<i>Thank you for your request. We will return to you as soon as possible.</i>' as you want it to appear."><i class="information-popover-icon-style">&#9673;</i></a>
                  </span>
                </span>
                <input type="text" class="form-control input-lg setting-label-translation-input" id="success_message_1" name="success_message_1" dir="ltr" value="<?php echo $ticaretCRMoptions_message['success_message_1'];  ?>" >
           </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              WooQuote licence has expired! Please contact with your site provider.
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                  <span title="On Button Text" >
                    <a href="#" data-toggle="popover" data-placement="bottom" data-html="true" data-trigger="hover" data-content="Change the '<i>WooQuote licence has expired! Please contact with your site provider.</i>' as you want it to appear."><i class="information-popover-icon-style">&#9673;</i></a>
                  </span>
                </span>
                <input type="text" class="form-control input-lg setting-label-translation-input" id="licence_error" name="licence_error" dir="ltr" value="<?php echo $ticaretCRMoptions_message['licence_error'];  ?>">
           </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            Wrong Apikey or E-mail! Please check your Apikey and E-mail.
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                  <span title="On Button Text" >
                    <a href="#" data-toggle="popover" data-placement="bottom" data-html="true" data-trigger="hover" data-content="Change the '<i>Wrong Apikey or E-mail! Please check your Apikey and E-mail.</i>' as you want it to appear."><i class="information-popover-icon-style">&#9673;</i></a>
                  </span>
                </span>
                <input type="text" class="form-control input-lg setting-label-translation-input"  id="api_email_error" name="api_email_error" dir="ltr" value="<?php echo $ticaretCRMoptions_message['api_email_error']; ?>">
           </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            Name
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                  <span title="On Button Text" >
                    <a href="#" data-toggle="popover" data-placement="bottom" data-html="true" data-trigger="hover" data-content="Change the '<i>Name</i>' as you want it to appear."><i class="information-popover-icon-style">&#9673;</i></a>
                  </span>
                </span>
                <input type="text" class="form-control input-lg setting-label-translation-input" id="name" name="name" dir="ltr" value="<?php echo $ticaretCRMoptions_message['name']; ?>">
           </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            Surname
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                  <span title="On Button Text" >
                    <a href="#" data-toggle="popover" data-placement="bottom" data-html="true" data-trigger="hover" data-content="Change the '<i>Surname</i>' as you want it to appear."><i class="information-popover-icon-style">&#9673;</i></a>
                  </span>
                </span>
                <input type="text" class="form-control input-lg setting-label-translation-input" id="surname" name="surname" dir="ltr" value="<?php echo $ticaretCRMoptions_message['surname']; ?>">
           </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            Company Name
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                  <span title="On Button Text" >
                    <a href="#" data-toggle="popover" data-placement="bottom" data-html="true" data-trigger="hover" data-content="Change the '<i>Company Name</i>' as you want it to appear."><i class="information-popover-icon-style">&#9673;</i></a>
                  </span>
                </span>
                <input type="text" class="form-control input-lg setting-label-translation-input" id="company_name" name="company_name" dir="ltr" value="<?php echo $ticaretCRMoptions_message['company_name']; ?>">
           </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            Address
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                  <span title="On Button Text" >
                    <a href="#" data-toggle="popover" data-placement="bottom" data-html="true" data-trigger="hover" data-content="Change the '<i>Address</i>' as you want it to appear."><i class="information-popover-icon-style">&#9673;</i></a>
                  </span>
                </span>
                <input type="text" class="form-control input-lg setting-label-translation-input"  id="address" name="address" dir="ltr" value="<?php echo $ticaretCRMoptions_message['address']; ?>">
           </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            Phone
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                  <span title="On Button Text" >
                    <a href="#" data-toggle="popover" data-placement="bottom" data-html="true" data-trigger="hover" data-content="Change the '<i>Phone</i>' as you want it to appear."><i class="information-popover-icon-style">&#9673;</i></a>
                  </span>
                </span>
                <input type="text" class="form-control input-lg setting-label-translation-input"  id="phone" name="phone" dir="ltr" value="<?php echo $ticaretCRMoptions_message['phone']; ?>">
           </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            E-mail Address
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                  <span title="On Button Text" >
                    <a href="#" data-toggle="popover" data-placement="bottom" data-html="true" data-trigger="hover" data-content="Change the '<i>E-mail Address</i>' as you want it to appear."><i class="information-popover-icon-style">&#9673;</i></a>
                  </span>
                </span>
                <input type="text" class="form-control input-lg setting-label-translation-input"id="email_address" name="email_address" dir="ltr" value="<?php echo $ticaretCRMoptions_message['email_address']; ?>" >
           </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            Product
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                  <span title="On Button Text" >
                    <a href="#" data-toggle="popover" data-placement="bottom" data-html="true" data-trigger="hover" data-content="Change the '<i>Product</i>' as you want it to appear."><i class="information-popover-icon-style">&#9673;</i></a>
                  </span>
                </span>
                <input type="text" class="form-control input-lg setting-label-translation-input" id="product" name="product" dir="ltr" value="<?php echo $ticaretCRMoptions_message['product']; ?>">
           </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            Quantities
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                  <span title="On Button Text" >
                    <a href="#" data-toggle="popover" data-placement="bottom" data-html="true" data-trigger="hover" data-content="Change the '<i>Quantities</i>' as you want it to appear."><i class="information-popover-icon-style">&#9673;</i></a>
                  </span>
                </span>
                <input type="text" class="form-control input-lg setting-label-translation-input" id="quantities" name="quantities" dir="ltr" value="<?php echo $ticaretCRMoptions_message['quantities']; ?>" >
           </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            Comments
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                  <span title="On Button Text" >
                    <a href="#" data-toggle="popover" data-placement="bottom" data-html="true" data-trigger="hover" data-content="Change the '<i>Comments</i>' as you want it to appear."><i class="information-popover-icon-style">&#9673;</i></a>
                  </span>
                </span>
                <input type="text" class="form-control input-lg setting-label-translation-input" id="comments" name="comments" dir="ltr" value="<?php echo $ticaretCRMoptions_message['comments']; ?>" >
           </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            Submit
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon">
                  <span title="On Button Text" >
                    <a href="#" data-toggle="popover" data-placement="bottom" data-html="true" data-trigger="hover" data-content="Change the '<i>Submit</i>' as you want it to appear."><i class="information-popover-icon-style">&#9673;</i></a>
                  </span>
                </span>
                <input type="text" class="form-control input-lg setting-label-translation-input" id="submit" name="submit" dir="ltr" value="<?php echo $ticaretCRMoptions_message['submit']; ?>"  >
           </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                  <input type="submit" class="btn btn-danger" value="SAVE CHANGES" name="product_transfer_type_button_message" id="product_transfer_type_button_message" />
           </div>
          </div>
        </div>
        <hr>
      </div>
    </div>
  </div>
</div>

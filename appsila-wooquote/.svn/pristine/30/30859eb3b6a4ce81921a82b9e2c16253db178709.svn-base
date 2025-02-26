  <?php

  //When error occurs this code is executed.It pops up an error message.

  //$my_plugin=WP_PLUGIN_DIR .'/osmanplugin';
  $errormsg = sanitize_text_field($_POST['msg']);
  $durum=sanitize_text_field($_POST['durum']);
  //$my_plugin=WP_PLUGIN_DIR . 'osmanplugin/images/info-low-part.png';


    $my_plugin_appsila_false=plugins_url('../images/error-appsila.png', __FILE__);//Takes error image from file index.
    $my_plugin_appsila_true=plugins_url('../images/info_appsila.png', __FILE__);

    ?>
<!-- Modal -->
  <div class="modal  fade" id="result-modal" data-is-submit-result="<?PHP echo $lastCRMoptions['isSubmited'];?>" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Status</h4>
        </div>
        <div class="modal-body text-center">
    		    <div class="col-xs-12 text-center">
              <img  class="appsila_image center-block" src="<?PHP
                                                  if ( strpos($errormsg, 'successfully') !== false||strpos($errormsg, 'Thank you')!==false) {
                                                        echo $my_plugin_appsila_true;
                                                  }else {
                                                        echo $my_plugin_appsila_false;
                                                  }
                                                ?>" />
            </div>
            <div class="modal-bodyddd-content-message text-center" id="modal-body-content-message-id">
              <h4><div class="" id="modal-bodyddd-content-message-taken">
                <?PHP
                  echo $errormsg;
                ?>
              </div></h4>
            </div>
        </div>
        <div class="modal-footer" >
          <button type="button" class="btn btn-default modal-result-button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

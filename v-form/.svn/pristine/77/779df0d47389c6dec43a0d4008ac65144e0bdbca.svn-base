<style>
  #adminmenumain{
    display:none;
  }
  #wpcontent, #wpfooter {
    margin-left: 0px;
  }
</style>
<?php

  if ( isset($_GET['id']) ) {
    $id = $_GET['id'];  // Get the raw input

    // Check for <script> or any script tags in the input
    if ( strpos($id, '<script>') !== false || strpos($id, '</script>') !== false ) {
        // If found, exit the condition or display an error message
        wp_die('Invalid input detected.');
    }

    // Proceed with normal logic if no <script> tag found
    $id = sanitize_text_field( $id ); // Sanitize the input
    $id = esc_html( $id );
  }

        


    $frmvidedit = $id;

    // echo esc_html($frmvidedit); 

    $frmvidedit = intval($frmvidedit); // Assuming id is an integer
    $query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
    $vformdataedit = $wpdb->get_results($wpdb->prepare($query, $frmvidedit), OBJECT);

    // $vformdataedit = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform  WHERE id='".$frmvidedit."'", OBJECT );
    foreach ( $vformdataedit as $keyoneedit=>$valueoneedit ) {
        $vfm_formname = $vformdataedit[$keyoneedit]->formname;
        $vfm_formdescription = $vformdataedit[$keyoneedit]->formdescription;
        $vfm_formbody = $vformdataedit[$keyoneedit]->formbody;
        $vfm_status = $vformdataedit[$keyoneedit]->status;
        $vfm_confimation = $vformdataedit[$keyoneedit]->confirmation;
        $vfm_confimation_value = $vformdataedit[$keyoneedit]->confirmation_value;

        $vf_notifito = $vformdataedit[$keyoneedit]->notification_mode;
        $vf_sendto = $vformdataedit[$keyoneedit]->send_to;
        $vf_emailsubject = $vformdataedit[$keyoneedit]->email_subject;
        $vf_fromname = $vformdataedit[$keyoneedit]->from_name;
        $vf_fromemail = $vformdataedit[$keyoneedit]->from_email;
        $vf_replyto = $vformdataedit[$keyoneedit]->reply_to;
        $vf_message = $vformdataedit[$keyoneedit]->message;
        $vf_no_duplicate = $vformdataedit[$keyoneedit]->no_duplicate;
    }

?>

<div id="vform-plugin-preloader" style="position: fixed; top: 0;left: 0; right: 0;bottom: 0;-moz-background-size:64px 64px;-o-background-size:64px 64px;-webkit-background-size:64px 64px;background-size:64px 64px;z-index: 99998;width:100%;height:100%;display:block;display: flex;justify-content: center;align-items: center;">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="50" width="50" color="zapier" name="miscBoltAltFill">
      <path fill="#ff4f00" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z">
      </path>
  </svg>
</div>


<div id="showmyvform" style="display:none;" >

      <!-- form Builder -->

      <?php include VFORM_PLUGIN_PATH."inc/admin/form/builder.php"; ?>
      <link rel="stylesheet" id="formsettingcss" href="<?php echo VFORM_PLUGIN_URL."assets/css/builder.css?ver=".VFORM_PLUGIN_VERSION; ?>" >

      <!-- form Builder -->

      <!-- notifi -->
      <div class="container_vf">
        <div class="tabs_vf">
          <label class="tab_vf" for="radio-1">Issue<span class="notification_vf">1</span></label>
          <span class="glider_vf"></span>
        </div>
      </div>

      <div id="toast-container" class="toast-top-right">
          <div id="toast-type" class="toast" aria-live="assertive" style="">
            <div id="snackbar">Notification Save!</div>
          </div>
        </div>
      <!-- notifi -->

      <!-- form settings -->
      
      
      <link rel="stylesheet" id="formsettingcss" href="<?php echo VFORM_PLUGIN_URL."assets/css/form-settings.css?ver=".VFORM_PLUGIN_VERSION; ?>" >

      <!-- form settings -->

      <!-- form save -->

      <form id="vform-userform">
        
      		<?php wp_nonce_field('myvformdata1','vfm-nonce1'); ?>
          <input type="hidden" name="editid" value="<?php echo esc_html_e($id,'vform'); ?>" >
          <input type="hidden" name="formname" value="<?php echo esc_html_e($vfm_formname,'vform'); ?>">
          <input type="hidden" name="formdescription" value="<?php echo esc_html_e($vfm_formdescription,'vform'); ?>">
          <input type="hidden" name="formbody" >

          <input type="hidden" name="notification_mode" value="<?php echo esc_html_e($vf_notifito,'vform'); ?>">

          <input type="hidden" name="formstatus" value="<?php echo esc_html_e($vfm_status ,'vform'); ?>">
          <input type="hidden" name="mknoduplicate" value="<?php echo esc_html_e($vf_no_duplicate ,'vform'); ?>">
      </form>

      <!-- form save -->
      
      <input type="hidden" name="vformeditmode" value="">
      <script>

        var highestBatchId = 0;

        jQuery('#vform-mainfields .vform-group').each(function() {
            var batchId = parseInt(jQuery(this).attr('data-batchid'), 10);
            if (batchId > highestBatchId) {
                highestBatchId = batchId;
            }
        });


          // var maxget = jQuery('#vform-mainfields .vform-group').length;
          // console.log(maxget);
          jQuery('[name="vformeditmode"]').val(highestBatchId+1);


          jQuery(function($){

            $(document).ready(function(){
              
              var emstup = [];
              var url = new URL(window.location);
              var dtid = url.searchParams.get('step');

              // console.log(dtid);
              if(dtid!=null && dtid!=''){

                $('.vfsettingslink').removeClass('active');
                $('.vfsettingslink[data-id="'+dtid+'"]').addClass('active');

                if(dtid=='0'){
                  $('#leftPanel').show();
                  $('.css-2th6v9').show();
                  $('.modules-V4').hide();
                }else{

                    if(dtid=='2'){

                      $('.makesmarttagpos').append('<li class="clickmergevform" data-field="{admin_email}">{admin_email}</li>');

                        $(".vform-group").each(function(){
                          
                            var firstElementWithName = $(this).find('[name]').first();
                            var getprid = $(this).data('batchid');
                            var strfrm = $(this).data('type');
                            var labletext = $(this).children('label').text();
                            labletext = labletext.replace('*','');
                            if(strfrm!='' && strfrm!=undefined && strfrm!='submit'){
                              emstup.push('{'+strfrm+'_id="'+getprid+'"}');
                              $('.makesmarttagpos').append('<li class="clickmergevform" data-field={'+firstElementWithName.attr('name')+'}>'+strfrm+' ('+labletext+')'+'</li>');
                            }
                        });
                        $('.makesmarttagpos').append('<li class="clickmergevform" data-field="{all_fields}">{all_fields}</li>');


                    }

                    $('.modules-contentvf').hide();
                    $('.modules-contentvf[data-id="'+dtid+'"]').show();
                    $('#leftPanel, .css-2th6v9').hide();
                    $('.modules-V4').show();

                  

                    if(dtid=='2' || dtid=='6'|| dtid=='9'){
                      $('.btn-save').hide();
                    }else{
                      $('.btn-save').show();
                    }
                    
                }
            
              }

            

            });

          });
      </script>

</div>


<script>
  window.addEventListener('load', function() {
    var preloader = document.getElementById('vform-plugin-preloader');
      preloader.remove(); 
      document.getElementById('showmyvform').style.display = 'block';
  });
</script>
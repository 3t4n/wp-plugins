<?php
defined('ABSPATH') || die("Nice try");
  global $wpdb;

  if ( isset($_GET['id']) ) {
    $id = $_GET['id'];
  
    if ( strpos($id, '<script>') !== false || strpos($id, '</script>') !== false ) {
        wp_die('Invalid input detected.');
    }
  
    $id = sanitize_text_field( $id );
    $id = esc_html( $id );
  }

  if ( isset($_REQUEST['submissionid']) ) {
    $submissionid =$_REQUEST['submissionid'];
  
    if ( strpos($submissionid, '<script>') !== false || strpos($submissionid, '</script>') !== false ) {
        wp_die('Invalid input detected.');
    }
  
    $submissionid = sanitize_text_field( $submissionid );
    $submissionid = esc_html( $submissionid );
  }


  

?>
<div class="wrap adjustwrap" id="vform-main">

<?php 
  $chkadv = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vfsubscr", OBJECT );
  foreach ( $chkadv as $keychkadv=>$valuechkadv ) {
      $getval = $chkadv[$keychkadv]->subscription;
    }
?>
<div id="vform-getsubscription" <?php echo $getval==1?'style="display:none;"':''; ?> >
  <div class="subscr-vform">
      <img class="vflgimg" src="<?php echo VFORM_PLUGIN_URL; ?>/assets/images/vform-icon.svg">
      <h3>Welcome to Vform World first FREE wordpress plugin with all feature lifetime.</h3>
      <form action="javascript:void(0)" id="mysubmitemail-vform">     
        <input type="submit" value="Unlock my FREE Vform now" id="sendmyvfrm-eml">
      </form>
  </div>
</div>

<?php if(!isset($id) && !isset($submissionid)){ ?>

<div id="root" role="main">
  <div class="lsApp">
    <div class="lsApp-body">
      <div class="lsApp-sidebar">
        <div class="lsApp-sidebar-content">
          <div class="lsApp-sidebar-button" data-testid="lsApp-sidebarButton">
          <img class="vflgimg" src="<?php echo VFORM_PLUGIN_URL; ?>/assets/images/vform-icon.svg">
          <button class="sc-dcgwPl kazPwG createForm forSidebar" id="createmyvform">Create Form</button></div>
        </div>
      </div>
      <div class="lsApp-content">
        <div class="lsApp-list" style="position: relative;">
          <div>
            <div aria-label="grid" aria-readonly="true"
              class="ReactVirtualized__Grid ReactVirtualized__List virtualizedGrid" role="grid" tabindex="0"
              style="will-change: transform;">
              <div class="ReactVirtualized__Grid__innerScrollContainer" role="row">
                  <?php
                    $vffrm = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform  ORDER by id ASC", OBJECT );
                    foreach ( $vffrm as $keyfrm=>$valuefrm ) {
                      $date = strtotime($vffrm[$keyfrm]->datesubmit);
                      $formattedDate = date('F j, Y', $date);

                      // $sb = $wpdb->get_results( "SELECT count(*) as cnt FROM {$wpdb->prefix}vform_userinput WHERE formid = '".$vffrm[$keyfrm]->id."'", OBJECT );
                   
                      
                      $form_id = intval($vffrm[$keyfrm]->id); // Assuming formid is an integer
                      $query = "SELECT count(*) as cnt FROM {$wpdb->prefix}vform_userinput WHERE formid = %d";
                      $sb = $wpdb->get_results($wpdb->prepare($query, $form_id), OBJECT);

                  ?>
                    <div tabindex="0" role="gridcell" aria-label="Form" data-sc="listItem"
                      class="lsApp-list-item listItem listItem-generic listItemType-allForms listItem- isSelected"
                      id="231151941490047">
                      <div class="sc-kfPuZi hUjYtJ lsApp-list-item-type" data-sc="formTypeIcon">
                        <div type="LEGACY" data-sc="formIcon" class="sc-fKVqWL lbCYvr"></div>
                        <span class="sc-bBHxTw dmlusf"><?php echo $sb[0]->cnt; ?></span>
                      </div>
                      <div data-sc="listItemHeadline" class="sc-hGPBjI eNxA-dd">
                        <div class="lsApp-list-item-title">
                          <div class="sc-caiLqq bSrxRT"><?php echo $vffrm[$keyfrm]->formname; ?></div>
                        </div>
                        <div data-sc="listItem-desc" class="sc-iUKqMP gszTuL" style="color: #a08c0c;"><?php echo $vffrm[$keyfrm]->formdescription; ?></div>
                        <div data-sc="listItem-desc" class="sc-iUKqMP gszTuL" style="color: #a08c0c;">[vform id="<?php echo $vffrm[$keyfrm]->id; ?>"]</div>
                        <div data-sc="listItem-desc" class="sc-iUKqMP gszTuL">
                          <a class="lsApp-list-item-link" href="?page=vform&submissionid=<?php echo $vffrm[$keyfrm]->id; ?>"><?php echo $sb[0]->cnt; ?> Submission</a><span>.</span> Updated on <?php echo $formattedDate; ?></div>
                      </div>
                      <div class="lsApp-list-item-actions">
                        <a class="sc-cTAqQK ctozzN forEdit" href="admin.php?page=vform&id=<?php echo $vffrm[$keyfrm]->id; ?>">Edit Form</a>
                        <a class="sc-cTAqQK ctozzN forEdit" href="?page=vform&submissionid=<?php echo $vffrm[$keyfrm]->id; ?>">Submission</a>
                        <a class="sc-cTAqQK ctozzN forEdit clonevform" href="javascript:void(0)" data-id="<?php echo $vffrm[$keyfrm]->id; ?>">Clone</a>
                        <a class="sc-cTAqQK ctozzN forEdit delvform" href="javascript:void(0)" data-id="<?php echo $vffrm[$keyfrm]->id; ?>">Delete</a></div>
                    </div>
                  <?php
                    }
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <a href="https://paypal.me/VikasRatudi" target="_blank" class='vform-donate'>
    Feel free to support❤
  </a>

  <a href="javascript:void(0)" class='vform-testemail'>
    Send a Test Email
  </a>
  
  <!-- popup -->
<style>
    #custom_popup .popup_content {
        background: #fff;
        width: 17%;
        position: relative;
        top: 155px;
        margin: auto;
        padding: 25px 35px;
        padding-bottom: 10px;
        z-index: 9;
        text-align:center;
    }
    #custom_popup .popup_content input {
        width: 100%;
    }

    #custom_popup .popup_content button {
      width: 100%;
        margin-top: 10px;
        margin-bottom: 14px;
        background-color: #eecf03;
        border: 1px solid #bc890d;
        cursor: pointer;
        height: 40px;
        text-transform: uppercase;
        font-weight: bold;
    }
    #custom_popup {
        background: rgb(0 0 0 / 0.3);
        z-index: 999;
        width: 100%;
        height: -webkit-fill-available;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        overflow-y: auto;
        overflow-x: hidden;
        display:none;
    }

    #custom_popup .popup_content pre{
        white-space: pre-wrap;
        font-family: initial;
    }
    #custom_popup .popup_content .half {
        width: 49%;
        display: inline-block;
    }
        
    #custom_popup #remove_icon {
        top: 10px;
        position: absolute;
        right: 20px;
        font-size: 22px;
        cursor: pointer;
    }

    .myfirstbutton {
        background-color: #0078ca;
        font-size: 17px;
        color: #ffffff;
        padding: 10px;
        display: flex;
        justify-content: center;
        width: 190px;
        cursor: pointer;
        margin: 30px 0px 15px;
    }

    .myfirstbutton {
        width: 28%;
        background: #0E8737;
        color: #fff!important;
        text-decoration: none!important;
        padding: 11px 35px;
        display: inline-block;
        font-family: "Poppins";
        text-align: center;
        font-weight: 500;
    }
    .cstmpp{
        text-align:center;
    }
    .showepic_cont {
        margin-bottom: 0;
    }
    @media only screen and (max-width: 600px) {
        .myfirstbutton {
            padding: 5% 5%!important;
            width: 100%!important;
        }
        #custom_popup .popup_content {
            width: 100%;
            top: 64px;
        }
    } 

    div#epic_overlay {
    background: rgb(0 0 0 / 0.3);
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
}
</style>
<div id="custom_popup" class="hidePopup1">
    <div class="popup_content">
    <span id="remove_icon">x</span>
       
    <form action="javascript:void(0)">
      <p>You will receive test email if it config correctly.</p>
      <input type="email" placeholder="Your Email address" name="email" id="getmyemail">
      <button type="submit" id="sendtestme">Send Test email</button>
      <p>For any Query | Concern | Bug | Integration | Web development feel free to email at: <a href="mailto:vforminfo@gmail.com"><b><u>vforminfo@gmail.com</u><b></a></p>
    </form>


    </div>
    <div id="epic_overlay"></div>
</div>
<script>
  jQuery(function($){
        $(document).ready(function(){
            $('.vform-testemail').click(function(){
                $('#custom_popup').css('display','block');
            });
            
            $('#remove_icon').click(function(){
                $('#custom_popup').css('display','none');
            });

            $('#epic_overlay').click(function(){
                $('#custom_popup').css('display','none');
            });

            $('#sendtestme').click(function(){
               var getemail = $('#getmyemail').val();
               if(getemail!=''){

                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                  if (emailPattern.test(getemail)) {
                      var postdata = "action=myvformsendtestemail&param=save_vform&email="+getemail;
                      jQuery.post(ajax_object,postdata,function(response){
                        var data = jQuery.parseJSON(response);
                        if(data.status==1){
                            alert('Email Sent! Please check your email.');
                          }else{
                            alert('!Oops Something went Wrong.');
                          }
                          
                      });

                  }

               }
            });

            
            $('.vform-donate').click(function(){
              var postdata = "action=myvformdonate&param=save_vform";
              jQuery.post(ajax_object,postdata,function(response){});
            });
            

        });
    });

</script>
<!-- popup -->

</div>

<?php } ?>


<!-- form base -->
<?php
  if(isset($id)){
        
    $frmvidedit = sanitize_text_field($id);
    // $vformdataedit = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform  WHERE id='".$frmvidedit."'", OBJECT );

$query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
$vformdataedit = $wpdb->get_results($wpdb->prepare($query, $frmvidedit), OBJECT);


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
    }

?>
<div id="showmyvform" >

      <!-- form Builder -->

          <!-- navbar -->
          <div class="vform-fullnavbar">
          <div class="vform-back-wrapper">
              <a href="admin.php?page=vform">
              <svg fill="#fff" class="cstmsvgcls" viewBox="0 0 32 32" data-name="Layer 2" id="Layer_2" xmlns="http://www.w3.org/2000/svg"><title/><path d="M11.17,10.23a33.37,33.37,0,0,0-3.05,3.13c-.51.62-1.28,1.3-1.21,2.17s.81,1.24,1.35,1.76a16.3,16.3,0,0,1,2.57,3.17c.86,1.36,3,.11,2.16-1.26a21.06,21.06,0,0,0-1.82-2.48A16.16,16.16,0,0,0,10,15.52c-.22-.21-.86-1.14-.68-.49l-.13,1a17.85,17.85,0,0,1,3.72-4c1.19-1.08-.58-2.85-1.77-1.76Z"/><path d="M9.4,17a109.13,109.13,0,0,0,12.53-.1c1.59-.11,1.61-2.61,0-2.5a109.13,109.13,0,0,1-12.53.1c-1.61-.07-1.6,2.43,0,2.5Z"/></svg>  
              BACK</a>
            </div>
            <div class="vform-siteNav" role="tablist">
              <a href="javascript:void(0)" class="isActive" id="vformbuild">BUILD</a>
              <a href="javascript:void(0)" id="tooglevformsetting">SETTINGS</a>
            </div>
            <div class="vform-save-wrapper">
              <!-- <a href="javascript:void(0)" id="savevfwork">SAVE</a> -->
              <button class="btn-save" id="savevfwork">
                  <div class="txt">Save</div>
                  <div class="icon"><svg width="18px" height="16px" viewBox="0 0 18 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                     <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linejoin="round">
                       <polyline id="Stroke-1" stroke="#FFFFFF" stroke-width="3" points="16 1 6.0545606 14 1 9.26518783"></polyline>
                      </g>
                  </svg>
                </div>
              </button>
            </div>
          </div>
          <!-- navbar -->

          <!-- form leftpanel -->
          <span tabindex="-1" aria-expanded="true" role="button" class="togglePanel forFormFields withoutAnimation"
            id="toogleLeftPanel"><span class="toggleText">Add Form
              Element</span><span class="toggleText-mobile">Add</span><span class="toggleIcon-wrapper"><svg
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="togglePanel-icon">
                <path fill-rule="evenodd" d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                  clip-rule="evenodd">
                </path>
              </svg></span>
          </span>

          <div class="leftPanel" id="leftPanel">
            <div class="fieldsPanel " aria-hidden="false" tabindex="0" aria-label="Form Elements">
              <div class="fieldsPanel-header">
                <div><button id="element-close-btn" type="button" class="fieldsPanel-headerClose" aria-label="Close Button"
                    aria-hidden="false" tabindex="0"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                      viewBox="0 0 24 24" class="fieldsPanel-closeIcon">
                      <path fill-rule="evenodd"
                        d="M17.707 7.707a1 1 0 0 0-1.414-1.414L12 10.586 7.707 6.293a1 1 0 0 0-1.414 1.414L10.586 12l-4.293 4.293a1 1 0 1 0 1.414 1.414L12 13.414l4.293 4.293a1 1 0 0 0 1.414-1.414L13.414 12l4.293-4.293Z"
                        clip-rule="evenodd"></path>
                    </svg></button>
                  <h3 class="fieldsPanel-headerText">Form Elements</h3>
                </div>
              </div>
              <div class="fieldSection">
                <div class="fieldSection-scroller tethers">
                  <ul class="fieldSection-list forBasics" aria-label="Ready to Use Elements">
                    <li tabindex="0" id="field_item_control_head" class="field-item" data-fieldtype="heading"
                      data-fieldname="Heading">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M5 2a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3H5Zm3 4a1 1 0 0 1 1 1v4h6V7a1 1 0 1 1 2 0v10a1 1 0 1 1-2 0v-4H9v4a1 1 0 1 1-2 0V7a1 1 0 0 1 1-1Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Heading</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_fullname" class="field-item" data-fieldtype="name"
                      data-fieldname="Full Name">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M5 1a4 4 0 0 0-4 4v14a4 4 0 0 0 4 4h14a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4H5Zm-.02 20h14.04c-.547-2.961-3.482-5.222-7.02-5.222-3.538 0-6.473 2.26-7.02 5.222ZM12 13.11A3.556 3.556 0 1 0 12 6a3.556 3.556 0 0 0 0 7.111Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Full Name</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_email" class="field-item" data-fieldtype="email"
                      data-fieldname="Email">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M1 7.52V18a3 3 0 0 0 3 3h16a3 3 0 0 0 3-3V7.52l-9.28 6.496a3 3 0 0 1-3.44 0L1 7.521Zm21.881-2.358A3.001 3.001 0 0 0 20 3H4a3.001 3.001 0 0 0-2.881 2.162l10.308 7.216a1 1 0 0 0 1.146 0l10.308-7.216Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Email</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_address" class="field-item" data-fieldtype="address"
                      data-fieldname="Address">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M12 1a9 9 0 0 0-9 9c0 2.324.971 4.384 2.34 6.274 1.35 1.867 3.159 3.66 4.96 5.446l.037.036c.318.316.637.632.956.951a1 1 0 0 0 1.414 0c.319-.319.638-.635.956-.95l.037-.037c1.801-1.786 3.61-3.58 4.96-5.446C20.03 14.384 21 12.324 21 10a9 9 0 0 0-9-9ZM8 9a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Address</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_phone" class="field-item" data-fieldtype="phone"
                      data-fieldname="Phone">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="m10.17 8.38-.412.41c.095.228.221.51.377.82.41.819 1 1.792 1.753 2.544.752.753 1.726 1.344 2.544 1.753.311.156.592.282.82.377l.41-.411a2.21 2.21 0 0 1 3.125 0l2.607 2.607a2.21 2.21 0 0 1 0 3.124l-1.408 1.41c-1.008 1.006-2.557 1.299-3.862.631-2.077-1.062-5.956-3.2-8.24-5.486-2.286-2.285-4.424-6.163-5.487-8.241-.668-1.305-.375-2.854.632-3.861l1.409-1.41a2.21 2.21 0 0 1 3.124 0l2.607 2.608a2.209 2.209 0 0 1 0 3.124Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Phone</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_datetime" class="field-item" data-fieldtype="datetime"
                      data-fieldname="Date Picker">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M8 1a1 1 0 0 1 1 1v1h6V2a1 1 0 1 1 2 0v1h2a3 3 0 0 1 3 3v14a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V6a3 3 0 0 1 3-3h2V2a1 1 0 0 1 1-1Zm12 5v3H4V6a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V5h6v1a1 1 0 1 0 2 0V5h2a1 1 0 0 1 1 1Zm-4.625 7.963c-.2-.391-.512-.587-.939-.587-.427 0-.743.196-.95.587-.198.39-.298 1.07-.298 2.037 0 .967.1 1.646.299 2.037.206.391.522.587.95.587.426 0 .739-.196.938-.587.206-.39.31-1.07.31-2.037 0-.967-.104-1.646-.31-2.037Zm1.387 5.098c-.505.626-1.28.939-2.326.939-1.045 0-1.824-.313-2.336-.939-.505-.625-.757-1.646-.757-3.061s.252-2.436.757-3.061c.512-.626 1.29-.939 2.336-.939 1.046 0 1.82.313 2.326.939.511.625.767 1.646.767 3.061s-.256 2.436-.767 3.061Zm-10.08-3.818-.15-.406a.875.875 0 0 1-.032-.522.886.886 0 0 1 .256-.448l1.43-1.344a1.512 1.512 0 0 1 1.045-.416h.683c.17 0 .312.06.426.181a.6.6 0 0 1 .17.427v6.57a.602.602 0 0 1-.17.427.562.562 0 0 1-.426.181H9.23a.602.602 0 0 1-.597-.608v-5.077h-.02l-1.28 1.184a.38.38 0 0 1-.363.107.39.39 0 0 1-.288-.256Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Date Picker</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                  </ul>
                  <ul class="fieldSection-list forBasics" aria-label="Basic Elements">
                    <li aria-hidden="true" class="fieldSection-category">Basic Elements</li>
                    <li tabindex="0" id="field_item_control_textbox" class="field-item" data-fieldtype="singleline"
                      data-fieldname="Short Text">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M14 2a1 1 0 1 0 0 2 2 2 0 0 1 2 2v12a2 2 0 0 1-2 2 1 1 0 1 0 0 2 4 4 0 0 0 3-1.354A3.998 3.998 0 0 0 20 22a1 1 0 1 0 0-2 2 2 0 0 1-2-2V6a2 2 0 0 1 2-2 1 1 0 1 0 0-2 4 4 0 0 0-3 1.354 3.979 3.979 0 0 0-1.47-1.05A4 4 0 0 0 14 2Zm1 4H3a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12v-2H3V8h12V6Zm4 12v-2h2V8h-2V6h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2ZM7.61 10.216l-.64 2.36c0 .016.005.032.016.049.01.01.024.016.04.016H8.21c.017 0 .03-.005.041-.016.017-.017.022-.033.017-.05l-.641-2.359c0-.005-.003-.008-.009-.008-.005 0-.008.003-.008.008ZM5.334 15a.314.314 0 0 1-.272-.14.318.318 0 0 1-.04-.304l1.725-5.112a.698.698 0 0 1 .239-.32A.637.637 0 0 1 7.364 9h.542c.143 0 .269.041.378.123a.63.63 0 0 1 .239.32l1.734 5.113a.305.305 0 0 1-.05.304.314.314 0 0 1-.27.14h-.551a.624.624 0 0 1-.37-.123.643.643 0 0 1-.222-.33l-.206-.78c-.005-.044-.035-.066-.09-.066H6.739c-.05 0-.08.022-.09.066l-.206.78a.583.583 0 0 1-.222.33.601.601 0 0 1-.37.123h-.517Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Short Text</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_textarea" class="field-item" data-fieldtype="paragraph"
                      data-fieldname="Long Text">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M1 4a3 3 0 0 1 3-3h16a3 3 0 0 1 3 3v16a3 3 0 0 1-3 3H4a3 3 0 0 1-3-3V4Zm3-1a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4Zm7.285 7.44v1.408c0 .048.024.077.072.088.112.021.248.032.408.032.378 0 .656-.07.832-.208.176-.144.264-.363.264-.656 0-.49-.4-.736-1.2-.736h-.312c-.043 0-.064.024-.064.072Zm0-2.288v1.176c0 .043.021.064.064.064h.2c.778 0 1.168-.232 1.168-.696 0-.443-.326-.664-.976-.664-.155 0-.286.01-.392.032-.043.01-.064.04-.064.088Zm-.888 4.784a.454.454 0 0 1-.32-.168.52.52 0 0 1-.128-.344V7.576a.5.5 0 0 1 .128-.344c.09-.101.2-.157.328-.168A11.9 11.9 0 0 1 11.629 7c1.546 0 2.32.499 2.32 1.496 0 .336-.11.621-.328.856-.214.235-.502.384-.864.448-.006 0-.008.005-.008.016 0 .005.005.008.016.008.421.059.754.219 1 .48.25.261.376.573.376.936 0 .592-.198 1.035-.592 1.328-.39.288-1.003.432-1.84.432-.422 0-.859-.021-1.312-.064ZM6.54 8.264l-.624 2.296c0 .016.005.032.016.048.01.01.024.016.04.016h1.152a.054.054 0 0 0 .04-.016c.016-.016.021-.032.016-.048l-.624-2.296c0-.005-.003-.008-.008-.008-.006 0-.008.003-.008.008ZM4.325 12.92a.306.306 0 0 1-.264-.136.31.31 0 0 1-.04-.296L5.7 7.512a.68.68 0 0 1 .232-.312.62.62 0 0 1 .368-.12h.528c.138 0 .261.04.368.12.112.08.189.184.232.312l1.688 4.976a.298.298 0 0 1-.048.296.306.306 0 0 1-.264.136h-.536a.608.608 0 0 1-.36-.12.626.626 0 0 1-.216-.32l-.2-.76c-.006-.043-.035-.064-.088-.064H5.693c-.048 0-.078.021-.088.064l-.2.76a.568.568 0 0 1-.216.32.585.585 0 0 1-.36.12h-.504ZM14 4.5a.5.5 0 0 0 0 1A1.5 1.5 0 0 1 15.5 7v6a1.5 1.5 0 0 1-1.5 1.5.5.5 0 0 0 0 1 2.5 2.5 0 0 0 2-1 2.51 2.51 0 0 0 1.043.81 2.5 2.5 0 0 0 .957.19.5.5 0 0 0 0-1 1.5 1.5 0 0 1-1.5-1.5V7A1.502 1.502 0 0 1 18 5.5a.5.5 0 0 0 0-1 2.5 2.5 0 0 0-2 1 2.502 2.502 0 0 0-2-1Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Long Text</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_text" class="field-item" data-fieldtype="title"
                      data-fieldname="Paragraph">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path
                            d="m7.31 8.475-1.304 4.799a.18.18 0 0 0 .033.1c.023.022.05.033.084.033h2.408a.113.113 0 0 0 .083-.033c.034-.034.045-.067.034-.1l-1.304-4.8c0-.01-.006-.016-.017-.016-.011 0-.017.006-.017.017Zm-4.63 9.731a.64.64 0 0 1-.552-.284.646.646 0 0 1-.084-.619l3.512-10.4c.1-.268.261-.485.484-.652.235-.167.49-.251.77-.251h1.103c.29 0 .546.084.77.25.233.168.395.385.484.653l3.528 10.4a.623.623 0 0 1-.1.619.64.64 0 0 1-.552.284h-1.12a1.27 1.27 0 0 1-.753-.25 1.308 1.308 0 0 1-.451-.67L9.3 15.699c-.011-.09-.072-.134-.184-.134H5.538c-.1 0-.162.045-.184.134l-.418 1.589c-.067.267-.218.49-.452.668a1.216 1.216 0 0 1-.752.251H2.679Zm15.933-3.996c-.758 0-1.337.117-1.738.351-.39.234-.586.546-.586.937 0 .3.09.534.268.702.19.167.44.25.752.25.558 0 1.015-.172 1.371-.518.368-.345.552-.786.552-1.32v-.268c0-.09-.05-.134-.15-.134h-.469Zm-2.006 4.163c-.836 0-1.505-.234-2.006-.702-.502-.468-.753-1.109-.753-1.923 0-.958.407-1.727 1.22-2.307.826-.58 2.007-.87 3.545-.87h.469c.1 0 .15-.05.15-.15-.01-.446-.117-.753-.317-.92-.19-.178-.524-.267-1.004-.267-.769 0-1.566.133-2.39.4a.822.822 0 0 1-.67-.05.717.717 0 0 1-.368-.518l-.016-.033a1.13 1.13 0 0 1 .117-.786.97.97 0 0 1 .602-.485 9.804 9.804 0 0 1 2.842-.418c1.394 0 2.386.268 2.977.803.602.524.902 1.388.902 2.591v3.127c0 .546.028 1.015.084 1.405a.811.811 0 0 1-.184.652.744.744 0 0 1-.602.284h-.635a1.11 1.11 0 0 1-.736-.267 1.04 1.04 0 0 1-.351-.67 1.159 1.159 0 0 1-.033-.133v-.134c0-.01-.006-.016-.017-.016-.022 0-.034.005-.034.016a3.132 3.132 0 0 1-1.204 1.004 3.571 3.571 0 0 1-1.588.367Z">
                          </path>
                        </svg></div>
                      <div class="field-name">Paragraph</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_dropdown" class="field-item" data-fieldtype="dropdown"
                      data-fieldname="Dropdown">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M5 2a3 3 0 0 0-3 3v6a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3H5Zm8.293 4.293a1 1 0 0 1 1.414 0L16 7.586l1.293-1.293a1 1 0 1 1 1.414 1.414l-2 2a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 0-1.414ZM2 17a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h15a1 1 0 1 0 0-2H3Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Dropdown</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_radio" class="field-item" data-fieldtype="multiplechoice"
                      data-fieldname="Single Choice">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18ZM1 12C1 5.925 5.925 1 12 1s11 4.925 11 11-4.925 11-11 11S1 18.075 1 12Zm11-7a7 7 0 1 0 0 14 7 7 0 0 0 0-14Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Single Choice</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_checkbox" class="field-item" data-fieldtype="checkboxes"
                      data-fieldname="Multiple Choice">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M5 2a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3H5Zm12.707 7.707a1 1 0 0 0-1.414-1.414L11 13.586l-2.293-2.293a1 1 0 0 0-1.414 1.414l3 3a1 1 0 0 0 1.414 0l6-6Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Multiple Choice</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_number" class="field-item" data-fieldtype="number"
                      data-fieldname="Number">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M5 2a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3H5Zm2.732 6.137c.202.202.44.303.713.303h5.218c.023 0 .035.012.035.035 0 .024-.012.048-.035.072-1.829 2.896-3.402 6.06-4.72 9.491a.655.655 0 0 0 .072.66.68.68 0 0 0 .587.302h1.211c.297 0 .57-.089.82-.267.249-.178.42-.41.516-.695 1.092-3.205 2.398-6.12 3.918-8.743a3.773 3.773 0 0 0 .498-1.87v-.41c0-.273-.1-.51-.302-.712A.918.918 0 0 0 15.568 6H8.445c-.273 0-.51.1-.713.303a.975.975 0 0 0-.302.712v.41c0 .273.1.51.302.712Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Number</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_image" class="field-item" data-fieldtype="image"
                      data-fieldname="Image">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M1 6a3 3 0 0 1 3-3h16a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H4a3 3 0 0 1-3-3V6Zm9 2a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm5.248 2.312 5.59 7.416A.794.794 0 0 1 20.204 19H3.796a.794.794 0 0 1-.643-1.26l3.63-5.002a.794.794 0 0 1 1.285 0l2.003 2.76 3.909-5.186a.794.794 0 0 1 1.268 0Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Image</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_datetime" class="field-item" data-fieldtype="date"
                      data-fieldname="Date Picker">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M8 1a1 1 0 0 1 1 1v1h6V2a1 1 0 1 1 2 0v1h2a3 3 0 0 1 3 3v14a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V6a3 3 0 0 1 3-3h2V2a1 1 0 0 1 1-1Zm12 5v3H4V6a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V5h6v1a1 1 0 1 0 2 0V5h2a1 1 0 0 1 1 1Zm-4.625 7.963c-.2-.391-.512-.587-.939-.587-.427 0-.743.196-.95.587-.198.39-.298 1.07-.298 2.037 0 .967.1 1.646.299 2.037.206.391.522.587.95.587.426 0 .739-.196.938-.587.206-.39.31-1.07.31-2.037 0-.967-.104-1.646-.31-2.037Zm1.387 5.098c-.505.626-1.28.939-2.326.939-1.045 0-1.824-.313-2.336-.939-.505-.625-.757-1.646-.757-3.061s.252-2.436.757-3.061c.512-.626 1.29-.939 2.336-.939 1.046 0 1.82.313 2.326.939.511.625.767 1.646.767 3.061s-.256 2.436-.767 3.061Zm-10.08-3.818-.15-.406a.875.875 0 0 1-.032-.522.886.886 0 0 1 .256-.448l1.43-1.344a1.512 1.512 0 0 1 1.045-.416h.683c.17 0 .312.06.426.181a.6.6 0 0 1 .17.427v6.57a.602.602 0 0 1-.17.427.562.562 0 0 1-.426.181H9.23a.602.602 0 0 1-.597-.608v-5.077h-.02l-1.28 1.184a.38.38 0 0 1-.363.107.39.39 0 0 1-.288-.256Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Date</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_time" class="field-item" data-fieldtype="time"
                      data-fieldname="Time">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1Zm0 5a1 1 0 0 1 1 1v5h3a1 1 0 1 1 0 2h-4a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Time</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_button" class="field-item" data-fieldtype="submit"
                      data-fieldname="Submit">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M4 4a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h16a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H4Zm17 7.933c0-.793-.235-1.41-.705-1.852-.466-.448-1.122-.671-1.97-.671-.346 0-.698.018-1.058.055a.416.416 0 0 0-.283.145.432.432 0 0 0-.11.298v4.189c0 .115.036.216.11.304a.427.427 0 0 0 .283.138c.36.037.712.055 1.058.055.848 0 1.505-.23 1.97-.69.47-.466.705-1.123.705-1.971ZM4.77 12.5c-.632-.184-1.086-.408-1.362-.67A1.331 1.331 0 0 1 3 10.84c0-.437.164-.785.49-1.043.328-.258.789-.387 1.383-.387.461 0 .89.064 1.286.194a.376.376 0 0 1 .235.2c.05.101.062.207.035.318l-.035.152a.311.311 0 0 1-.173.214.322.322 0 0 1-.276.014 2.943 2.943 0 0 0-1.023-.173c-.24 0-.422.046-.546.139a.44.44 0 0 0-.187.373c0 .258.193.442.58.553.687.189 1.169.415 1.445.677.281.263.422.602.422 1.016 0 .489-.166.862-.498 1.12-.332.258-.822.387-1.472.387-.452 0-.899-.099-1.341-.297a.426.426 0 0 1-.228-.228.483.483 0 0 1-.007-.332l.048-.173a.29.29 0 0 1 .18-.193.308.308 0 0 1 .27.014c.387.193.762.29 1.126.29.24 0 .42-.048.54-.145a.514.514 0 0 0 .186-.422.463.463 0 0 0-.152-.36c-.097-.091-.27-.174-.518-.248Zm3.13 2.025a.39.39 0 0 1-.387-.394V9.873a.39.39 0 0 1 .388-.394h2.447a.36.36 0 0 1 .27.118c.078.078.117.17.117.276v.16c0 .105-.04.197-.117.276a.356.356 0 0 1-.27.117H8.744c-.037 0-.055.018-.055.055v.913c0 .041.018.062.055.062h1.466a.36.36 0 0 1 .27.118c.078.078.117.17.117.276v.104c0 .106-.04.198-.118.276a.356.356 0 0 1-.27.118H8.745c-.037 0-.055.018-.055.055v1.12c0 .037.018.055.055.055h1.604a.36.36 0 0 1 .27.118c.078.078.117.17.117.276v.16c0 .105-.04.197-.117.276a.356.356 0 0 1-.27.117H7.9Zm3.934-.117c.078.078.17.117.277.117h.366a.358.358 0 0 0 .27-.117.378.378 0 0 0 .117-.277v-2.696c0-.004.002-.007.007-.007.01 0 .014.003.014.007l1.59 2.752c.133.225.33.338.587.338h.367a.377.377 0 0 0 .276-.117.379.379 0 0 0 .118-.277V9.873a.379.379 0 0 0-.118-.276.378.378 0 0 0-.276-.118h-.367a.39.39 0 0 0-.387.394v2.696c0 .005-.002.007-.007.007-.009 0-.014-.002-.014-.007l-1.59-2.751a.643.643 0 0 0-.587-.339h-.366a.378.378 0 0 0-.277.118.379.379 0 0 0-.117.276v4.258c0 .106.039.198.117.277Zm6.194-3.975v3.138c0 .042.018.067.055.076.092.019.203.028.332.028.977 0 1.465-.58 1.465-1.742 0-1.07-.488-1.604-1.465-1.604-.13 0-.24.01-.332.028-.037.01-.055.035-.055.076Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Submit</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                  </ul>
                  <ul class="fieldSection-list forBasics" aria-label="Page Elements">
                    <li aria-hidden="true" class="fieldSection-category">Page Elements</li>
                    <li tabindex="0" id="field_item_control_divider" class="field-item" data-fieldtype="divider"
                      data-fieldname="Divider">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd" d="M4 12a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H5a1 1 0 0 1-1-1Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Divider</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_pagebreak" class="field-item" data-fieldtype="pagebreak"
                      data-fieldname="Page Break">
                      <div class="field-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="field-iconSvg">
                          <path fill-rule="evenodd"
                            d="M2 4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v3a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Zm19 8a1 1 0 0 1-1 1h-2a1 1 0 1 1 0-2h2a1 1 0 0 1 1 1Zm-6 0a1 1 0 0 1-1 1h-4a1 1 0 1 1 0-2h4a1 1 0 0 1 1 1Zm-8 0a1 1 0 0 1-1 1H4a1 1 0 1 1 0-2h2a1 1 0 0 1 1 1Zm-3 3a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1v-3a2 2 0 0 0-2-2H4Z"
                            clip-rule="evenodd"></path>
                        </svg></div>
                      <div class="field-name">Page Break</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                  </ul>
                  <ul class="fieldSection-list forBasics" aria-label="Page Elements">
                    <li aria-hidden="true" class="fieldSection-category">More Elements</li>
                    <li tabindex="0" id="field_item_control_divider" class="field-item" data-fieldtype="websiteurl"
                      data-fieldname="websiteurl">
                      <div class="field-icon"><svg class="field-iconSvg" viewBox="0 0 24 24" version="1.1"
                          xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Dribbble-Light-Preview" transform="translate(-339.000000, -600.000000)" fill="#ffffff">
                              <g id="icons" transform="translate(56.000000, 160.000000)">
                                <path
                                  d="M286.388001,443.226668 C288.054626,441.639407 290.765027,441.639407 292.431651,443.226668 L293.942296,444.665378 L295.452942,443.226668 L293.942296,441.787958 C291.439155,439.404014 287.380498,439.404014 284.877356,441.787958 C282.374215,444.171902 282.374215,448.03729 284.877356,450.421235 L286.388001,451.859945 L287.898647,450.421235 L286.388001,448.982525 C284.721377,447.395264 284.721377,444.813929 286.388001,443.226668 L286.388001,443.226668 Z M302.122644,449.578765 L300.611999,448.139038 L299.101353,449.578765 L300.611999,451.017475 C302.277554,452.603719 302.277554,455.186071 300.611999,456.773332 C298.945374,458.359576 296.233905,458.359576 294.568349,456.773332 L293.057704,455.333605 L291.54599,456.773332 L293.057704,458.212042 C295.560845,460.595986 299.619502,460.595986 302.122644,458.212042 C304.625785,455.828098 304.625785,451.96271 302.122644,449.578765 L302.122644,449.578765 Z M288.653969,443.946023 L299.856676,454.61425 L298.344962,456.053977 L287.143324,445.384733 L288.653969,443.946023 Z"
                                  id="url-[#1423]">
                                </path>
                              </g>
                            </g>
                          </g>
                        </svg></div>
                      <div class="field-name">Website Url</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_pagebreak" class="field-item" data-fieldtype="password"
                      data-fieldname="Page Break">
                      <div class="field-icon"><svg class="field-iconSvg" viewBox="0 0 24 24" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M21 8.5V6C21 4.89543 20.1046 4 19 4H5C3.89543 4 3 4.89543 3 6V11C3 12.1046 3.89543 13 5 13H10.875M19 14V12C19 10.8954 18.1046 10 17 10C15.8954 10 15 10.8954 15 12V14M14 20H20C20.5523 20 21 19.5523 21 19V15C21 14.4477 20.5523 14 20 14H14C13.4477 14 13 14.4477 13 15V19C13 19.5523 13.4477 20 14 20Z"
                            stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          <circle cx="7.5" cy="8.5" r="1.5" fill="#ffffff" />
                          <circle cx="12" cy="8.5" r="1.5" fill="#ffffff" />
                        </svg></div>
                      <div class="field-name">Password</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_pagebreak" class="field-item" data-fieldtype="hidden"
                      data-fieldname="Page Break">
                      <div class="field-icon"><svg class="field-iconSvg" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0" fill="none" width="20" height="20" />
                          <g fill="#ffffff">
                            <path
                              d="M17.3 3.3c-.4-.4-1.1-.4-1.6 0l-2.4 2.4c-1.1-.4-2.2-.6-3.3-.6-3.8.1-7.2 2.1-9 5.4.2.4.5.8.8 1.2.8 1.1 1.8 2 2.9 2.7L3 16.1c-.4.4-.5 1.1 0 1.6.4.4 1.1.5 1.6 0L17.3 4.9c.4-.5.4-1.2 0-1.6zm-10.6 9l-1.3 1.3c-1.2-.7-2.3-1.7-3.1-2.9C3.5 9 5.1 7.8 7 7.2c-1.3 1.4-1.4 3.6-.3 5.1zM10.1 9c-.5-.5-.4-1.3.1-1.8.5-.4 1.2-.4 1.7 0L10.1 9zm8.2.5c-.5-.7-1.1-1.4-1.8-1.9l-1 1c.8.6 1.5 1.3 2.1 2.2C15.9 13.4 13 15 9.9 15h-.8l-1 1c.7-.1 1.3 0 1.9 0 3.3 0 6.4-1.6 8.3-4.3.3-.4.5-.8.8-1.2-.3-.3-.5-.7-.8-1zM14 10l-4 4c2.2 0 4-1.8 4-4z" />
                          </g>
                        </svg></div>
                      <div class="field-name">Hidden</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_pagebreak" class="field-item" data-fieldtype="termscondition"
                      data-fieldname="Page Break">
                      <div class="field-icon"><svg class="field-iconSvg" viewBox="0 0 1024 1024" class="icon" version="1.1"
                          xmlns="http://www.w3.org/2000/svg">
                          <path d="M182.52 146.2h585.14v402.28h73.15V73.06H109.38v877.71h402.28v-73.14H182.52z"
                            fill="#ffffff" />
                          <path
                            d="M255.67 219.34h438.86v73.14H255.67zM255.67 365.63h365.71v73.14H255.67zM255.67 511.91H475.1v73.14H255.67zM731.02 585.06c-100.99 0-182.86 81.87-182.86 182.86s81.87 182.86 182.86 182.86 182.86-81.87 182.86-182.86-81.87-182.86-182.86-182.86z m0 292.57c-60.5 0-109.71-49.22-109.71-109.71 0-60.5 49.22-109.71 109.71-109.71 60.5 0 109.71 49.22 109.71 109.71 0 60.49-49.22 109.71-109.71 109.71z"
                            fill="#ffffff" />
                          <path d="M717.88 777.65l-42.55-38.13-36.61 40.86 84.02 75.27 102.98-118.47-41.39-36z"
                            fill="#ffffff" /></svg></div>
                      <div class="field-name">Terms & Conditions</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_pagebreak" class="field-item" data-fieldtype="link"
                      data-fieldname="Page Break">
                      <div class="field-icon"><svg class="field-iconSvg" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"
                          mirror-in-rtl="true">
                          <path fill="#ffffff"
                            d="M12.1.6a.944.944 0 0 0 .2 1.04l1.352 1.353L10.28 6.37a.956.956 0 0 0 1.35 1.35l3.382-3.38 1.352 1.352a.944.944 0 0 0 1.04.2.958.958 0 0 0 .596-.875V.96a.964.964 0 0 0-.96-.96h-4.057a.958.958 0 0 0-.883.6z" />
                          <path fill="#ffffff"
                            d="M14 11v5a2.006 2.006 0 0 1-2 2H2a2.006 2.006 0 0 1-2-2V6a2.006 2.006 0 0 1 2-2h5a1 1 0 0 1 0 2H2v10h10v-5a1 1 0 0 1 2 0z" />
                        </svg></div>
                      <div class="field-name">Link</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_pagebreak" class="field-item" data-fieldtype="month"
                      data-fieldname="Page Break">
                      <div class="field-icon"><svg fill="#ffffff" class="field-iconSvg" version="1.1" id="Capa_1"
                          xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 442 442"
                          xml:space="preserve">
                          <g>
                            <path d="M432,70.438h-43.642v-4.774c0-16.114-13.11-29.224-29.224-29.224s-29.224,13.11-29.224,29.224v4.774h-33.641v-4.774
                          c0-16.114-13.11-29.224-29.224-29.224s-29.224,13.11-29.224,29.224v4.774h-33.642v-4.774c0-16.114-13.11-29.224-29.224-29.224
                          s-29.224,13.11-29.224,29.224v4.774h-33.642v-4.774c0-16.114-13.11-29.224-29.224-29.224c-16.114,0-29.224,13.11-29.224,29.224
                          v4.774H10c-5.523,0-10,4.477-10,10v315.124c0,5.523,4.477,10,10,10h422c5.523,0,10-4.477,10-10V80.438
                          C442,74.915,437.523,70.438,432,70.438z M359.134,56.439c5.086,0,9.224,4.138,9.224,9.224v29.548c0,5.086-4.138,9.224-9.224,9.224
                          s-9.224-4.138-9.224-9.224V80.447c0-0.003,0-0.006,0-0.01s0-0.006,0-0.01V65.663C349.91,60.577,354.048,56.439,359.134,56.439z
                          M267.045,56.439c5.086,0,9.224,4.138,9.224,9.224v29.548c0,5.086-4.138,9.224-9.224,9.224s-9.224-4.138-9.224-9.224V80.447
                          c0-0.003,0-0.006,0-0.01s0-0.006,0-0.01V65.663C257.821,60.577,261.958,56.439,267.045,56.439z M165.731,65.663
                          c0-5.086,4.138-9.224,9.224-9.224s9.224,4.138,9.224,9.224v14.765c0,0.003,0,0.006,0,0.01s0,0.006,0,0.01v14.764
                          c0,5.086-4.138,9.224-9.224,9.224s-9.224-4.138-9.224-9.224V65.663z M82.866,56.439c5.086,0,9.224,4.138,9.224,9.224v29.548
                          c0,5.086-4.138,9.224-9.224,9.224c-5.086,0-9.224-4.138-9.224-9.224V80.447c0-0.003,0-0.006,0-0.01s0-0.006,0-0.01V65.663
                          C73.642,60.577,77.779,56.439,82.866,56.439z M53.642,90.438v4.774c0,16.114,13.11,29.224,29.224,29.224
                          c16.114,0,29.224-13.11,29.224-29.224v-4.774h33.642v4.774c0,16.114,13.11,29.224,29.224,29.224s29.224-13.11,29.224-29.224v-4.774
                          h33.642v4.774c0,16.114,13.11,29.224,29.224,29.224s29.224-13.11,29.224-29.224v-4.774h33.641v4.774
                          c0,16.114,13.11,29.224,29.224,29.224s29.224-13.11,29.224-29.224v-4.774H422v47.738H20V90.438H53.642z M20,385.561V158.175h402
                          v227.386H20z" />
                            <path d="M96.485,204.926H63.974c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                          S102.008,204.926,96.485,204.926z" />
                            <path d="M190.312,204.926h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                          S195.835,204.926,190.312,204.926z" />
                            <path d="M284.14,204.926h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                          S289.663,204.926,284.14,204.926z" />
                            <path d="M377.967,204.926h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                          S383.49,204.926,377.967,204.926z" />
                            <path d="M96.485,261.375H63.974c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                          S102.008,261.375,96.485,261.375z" />
                            <path d="M190.312,261.375h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                          S195.835,261.375,190.312,261.375z" />
                            <path d="M284.14,261.375h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                          S289.663,261.375,284.14,261.375z" />
                            <path d="M377.967,261.375h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                          S383.49,261.375,377.967,261.375z" />
                            <path d="M96.485,317.823H63.974c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                          S102.008,317.823,96.485,317.823z" />
                            <path d="M190.312,317.823h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                          S195.835,317.823,190.312,317.823z" />
                            <path d="M284.14,317.823h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                          S289.663,317.823,284.14,317.823z" />
                            <path d="M377.967,317.823h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                          S383.49,317.823,377.967,317.823z" />
                          </g>
                        </svg></div>
                      <div class="field-name">Months</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_pagebreak" class="field-item" data-fieldtype="week"
                      data-fieldname="Page Break">
                      <div class="field-icon"><svg class="field-iconSvg" viewBox="0 0 32 32" id="svg5" version="1.1"
                          xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">

                          <defs id="defs2" />

                          <g id="layer1" transform="translate(36,-196)">

                            <path
                              d="m -31,199.00586 c -1.644701,0 -3,1.3553 -3,3 v 21 c 0,1.6447 1.355299,3 3,3 h 22 c 1.6447011,0 3,-1.3553 3,-3 v -21 c 0,-1.6447 -1.3552989,-3 -3,-3 z m 0,2 h 22 c 0.5712967,0 1,0.4287 1,1 v 21 c 0,0.5713 -0.4287033,1 -1,1 h -22 c -0.571297,0 -1,-0.4287 -1,-1 v -21 c 0,-0.5713 0.428703,-1 1,-1 z"
                              id="rect25665"
                              style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                            <path d="m -33,206.00586 a 1,1 0 0 0 -1,1 1,1 0 0 0 1,1 h 26 a 1,1 0 0 0 1,-1 1,1 0 0 0 -1,-1 z"
                              id="path25667"
                              style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                            <path
                              d="m -29,197.00586 a 1,1 0 0 0 -1,1 v 5 a 1,1 0 0 0 1,1 1,1 0 0 0 1,-1 v -5 a 1,1 0 0 0 -1,-1 z"
                              id="path25669"
                              style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                            <path
                              d="m -20,197.00586 a 1,1 0 0 0 -1,1 v 5 a 1,1 0 0 0 1,1 1,1 0 0 0 1,-1 v -5 a 1,1 0 0 0 -1,-1 z"
                              id="path25671"
                              style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                            <path
                              d="m -11,197.00586 a 1,1 0 0 0 -1,1 v 5 a 1,1 0 0 0 1,1 1,1 0 0 0 1,-1 v -5 a 1,1 0 0 0 -1,-1 z"
                              id="path25673"
                              style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                            <path
                              d="m -14,210.00586 c -1.090702,0 -2,0.9093 -2,2 v 2 c 0,1.0907 0.909298,2 2,2 h 2 c 1.090702,0 2,-0.9093 2,-2 v -2 c 0,-1.0907 -0.909298,-2 -2,-2 z m 0,2 h 2 v 2 h -2 z"
                              id="rect25677"
                              style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                            <path
                              d="m -21,217.00586 c -1.090702,0 -2,0.9093 -2,2 v 2 c 0,1.0907 0.909298,2 2,2 h 2 c 1.090702,0 2,-0.9093 2,-2 v -2 c 0,-1.0907 -0.909298,-2 -2,-2 z m 0,2 h 2 v 2 h -2 z"
                              id="rect25679"
                              style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                            <path
                              d="m -28,217.00586 c -1.090702,0 -2,0.9093 -2,2 v 2 c 0,1.0907 0.909298,2 2,2 h 2 c 1.090702,0 2,-0.9093 2,-2 v -2 c 0,-1.0907 -0.909298,-2 -2,-2 z m 0,2 h 2 v 2 h -2 z"
                              id="rect25681"
                              style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                            <path
                              d="m -14,217.00586 c -1.090702,0 -2,0.9093 -2,2 v 2 c 0,1.0907 0.909298,2 2,2 h 2 c 1.090702,0 2,-0.9093 2,-2 v -2 c 0,-1.0907 -0.909298,-2 -2,-2 z m 0,2 h 2 v 2 h -2 z"
                              id="rect25683"
                              style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                            <path
                              d="m -25.585937,210.5918 a 1,1 0 0 0 -0.707032,0.29297 l -2.828125,2.82812 a 1,1 0 0 0 0,1.41406 1,1 0 0 0 1.414063,0 l 2.828125,-2.82812 a 1,1 0 0 0 0,-1.41406 1,1 0 0 0 -0.707031,-0.29297 z"
                              id="path25685"
                              style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                            <path
                              d="m -28.414062,210.5918 a 1,1 0 0 0 -0.707032,0.29297 1,1 0 0 0 0,1.41406 l 2.828125,2.82812 a 1,1 0 0 0 1.414063,0 1,1 0 0 0 0,-1.41406 l -2.828125,-2.82812 a 1,1 0 0 0 -0.707031,-0.29297 z"
                              id="path25687"
                              style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                            <path
                              d="m -19,210.5918 a 1,1 0 0 0 -0.707031,0.29297 l -2.828125,2.82812 a 1,1 0 0 0 0,1.41406 1,1 0 0 0 1.414062,0 l 2.828125,-2.82812 a 1,1 0 0 0 0,-1.41406 A 1,1 0 0 0 -19,210.5918 Z"
                              id="path25689"
                              style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                            <path
                              d="m -21.828125,210.5918 a 1,1 0 0 0 -0.707031,0.29297 1,1 0 0 0 0,1.41406 l 2.828125,2.82812 a 1,1 0 0 0 1.414062,0 1,1 0 0 0 0,-1.41406 l -2.828125,-2.82812 a 1,1 0 0 0 -0.707031,-0.29297 z"
                              id="path25691"
                              style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                          </g>

                        </svg></div>
                      <div class="field-name">Weeks</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_pagebreak" class="field-item" data-fieldtype="color"
                      data-fieldname="Page Break">
                      <div class="field-icon"><svg class="field-iconSvg" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">

                          <defs>

                            <style>
                              .cls-1 {
                                fill: none;
                                stroke: #ffffff;
                                stroke-miterlimit: 10;
                                stroke-width: 1.92px;
                              }
                            </style>

                          </defs>

                          <g id="roll_brush" data-name="roll brush">

                            <circle class="cls-1" cx="5.73" cy="13.45" r="0.48" />

                            <circle class="cls-1" cx="7.65" cy="18.24" r="0.48" />

                            <circle class="cls-1" cx="6.69" cy="8.65" r="0.48" />

                            <circle class="cls-1" cx="10.52" cy="5.78" r="0.48" />

                            <circle class="cls-1" cx="15.32" cy="6.74" r="0.48" />

                            <circle class="cls-1" cx="18.2" cy="10.57" r="0.48" />

                            <path class="cls-1"
                              d="M22.51,11.86a4.87,4.87,0,0,1-4.86,4.95H16.18a4.28,4.28,0,0,0-3.57,1.91l-1.15,1.72a4.74,4.74,0,0,1-4,2.12h0a4.61,4.61,0,0,1-3.87-2A13.07,13.07,0,0,1,1.41,13.3V12a10.55,10.55,0,0,1,21.1-.15Z" />

                          </g>

                        </svg></div>
                      <div class="field-name">Color</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                    <li tabindex="-1" id="field_item_control_pagebreak" class="field-item" data-fieldtype="button"
                      data-fieldname="Page Break">
                      <div class="field-icon"><svg class="field-iconSvg" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0" fill="none" width="20" height="20" />
                          <g fill="#ffffff">
                            <path
                              d="M17 5H3c-1.1 0-2 .9-2 2v6c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm1 7c0 .6-.4 1-1 1H3c-.6 0-1-.4-1-1V7c0-.6.4-1 1-1h14c.6 0 1 .4 1 1v5z" />
                          </g>

                        </svg></div>
                      <div class="field-name">Button</div>
                      <div class="field-plusnew">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                          class="togglePanel-icon">
                          <path fill-rule="evenodd"
                            d="M13 5a1 1 0 1 0-2 0v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5Z"
                            clip-rule="evenodd">
                          </path>
                        </svg>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- form leftpanel -->

          <!-- form page -->
          <div id="vform-mainfields">
            <div class="vform-mainproperties">
              <button type="button" class="vfmn-properties">
                  <i class="fa fa-cog" aria-hidden="true"></i>
                  <span>Properties</span></button>
            </div>
              <?php $vfm_formbody = stripslashes($vfm_formbody); echo html_entity_decode($vfm_formbody); ?>
          </div>
          <!-- form page -->

          <!-- form rightpanel -->
          <div class="leftPanel rightPanel" id="rightPanel">
            <div class="fieldsPanel " aria-hidden="false" tabindex="0" aria-label="Form Elements">
              <div class="fieldsPanel-header">
                <div><button id="settings-close-btn" type="button" class="fieldsPanel-headerClose" aria-label="Close Button"
                    aria-hidden="false" tabindex="0"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                      viewBox="0 0 24 24" class="fieldsPanel-closeIcon">
                      <path fill-rule="evenodd"
                        d="M17.707 7.707a1 1 0 0 0-1.414-1.414L12 10.586 7.707 6.293a1 1 0 0 0-1.414 1.414L10.586 12l-4.293 4.293a1 1 0 1 0 1.414 1.414L12 13.414l4.293 4.293a1 1 0 0 0 1.414-1.414L13.414 12l4.293-4.293Z"
                        clip-rule="evenodd"></path>
                    </svg></button>
                  <h3 class="fieldsPanel-headerText showmyclickpropty">Properties</h3>
                  <code class="perticularvfmids">#</code>
                </div>
              </div>
              <div class="fieldSection">
                <div class="fieldSection-scroller tethers">
                  <div class="vform-fieldoptions">

                    <div class="mainfieldspanel">
                      <div class="standardoptionfield">
                        <p>Standard Option</p>
                        <input type="hidden" name="fieldoptionid" data-batchid="" />

                        <div class="vform-mainsetopt">

                          <div>
                            <label>Width</label>
                            <input type="text" name="optionwidth" placeholder="Ex: 100%, 80%, 700px">
                          </div>

                          <div>
                            <label>Box Shadow</label>
                            <input type="text" name="optionshadow" placeholder="Ex: none, 0 4px 4px #000">
                          </div>

                          <div>
                            <label>Background</label>
                            <input type="text" name="optionback" placeholder="Ex: red, pink, white">
                          </div>

                          <div>
                            <label>Padding</label>
                            <input type="text" name="optionpad" placeholder="Ex: 20px, 2%, 50px">
                          </div>

                        </div>

                        <div class="vform-image-sf">
                          <label for="">Image Src</label>
                          <small>Ex: https://dumy.com/dumy.jpg</small>
                          <input type="text" placeholder="Image src Ex: https://dumy.com/dumy.jpg" name="vfinsideimage">

                          <label for="">Width</label>
                          <small>Ex: 100px, 10%</small>
                          <input type="text" placeholder="Image width Ex:100px, 10%" name="vfinsidewidth">
                        </div>

                        <div class="vform-button-sf">
                          <input type="checkbox" name="vfbtnlinktarget"><span>Target Blank</span><br>

                          <label for="">Button Text</label>
                          <input type="text" name="vfbtntext"><br>

                          <label for="">Text Transform</label>
                          <select name="vfbtnlinktransform">
                            <option value="initial">initial</option>
                            <option value="capitalize">capitalize</option>
                            <option value="uppercase">uppercase</option>
                            <option value="lowercase">lowercase</option>
                          </select>
                          <label for="">Font Size</label>
                          <small>Ex: 12px, 1rem</small>
                          <input type="text" value="14px" name="vfbtnfontsize">
                          <label for="">Background color</label>
                          <small>Ex: #000000, red, rgb(0,0,0)</small>
                          <input type="text" name="vfbtnbkcolor"
                            placeholder="Your Background color Ex: #000000, red, rgb(0,0,0)">
                          <label for="">color</label>
                          <small>Ex: #000000, red, rgb(0,0,0)</small>
                          <input type="text" name="vfbtnlinkcolor" placeholder="Your color Ex: #000000, red, rgb(0,0,0)">
                          <label for="">Link</label>
                          <small>Ex: https://google.com/</small>
                          <input type="text" name="vfbtnlinklink" placeholder="Your link Ex: https://google.com/">
                          <label for="">Padding</label>
                          <small>Ex: (10px 20px), (20px), (10px 20px 30px), (15px 8px 11px 20px)</small>
                          <input type="text" name="vfbtnpadding" placeholder="Your color Ex: #000000, red, rgb(0,0,0)">
                        </div>

                        <div class="vform-link-sf">
                          <input type="checkbox" name="linktarget"><span>Target Blank</span><br>

                          <label for="">Link Text</label>
                          <input type="text" name="vfanchortext"><br>

                          <input type="checkbox" name="linkunderline"><span>No underline</span>
                          <label for="">Text Transform</label>
                          <select name="linktransform">
                            <option value="initial">initial</option>
                            <option value="capitalize">capitalize</option>
                            <option value="uppercase">uppercase</option>
                            <option value="lowercase">lowercase</option>
                          </select>
                          <label for="">Font Size</label>
                          <small>Ex: 12px, 1rem</small>
                          <input type="text" value="14px" name="linksize">
                          <label for="">color</label>
                          <small>Ex: #000000, red, rgb(0,0,0)</small>
                          <input type="text" name="linkcolor" placeholder="Your color Ex: #000000, red, rgb(0,0,0)">
                          <label for="">Link</label>
                          <small>Ex: https://google.com/</small>
                          <input type="text" name="linklink" placeholder="Your link Ex: https://google.com/">
                        </div>

                        <div class="vform-termscondition-sf">
                          <input type="checkbox" name="termsconditionalreadycheck"><span>Already Checked</span>
                          <label>Content</label>
                          <input type="text" value="" name="termsconditiontext">
                          <label>Field Size</label>
                          <select name="adfieldsize">
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large" selected="">Large</option>
                          </select>
                        </div>

                        <div class="vform-divider-inf">
                          <label>Width</label>
                          <small>Ex: 10px, 50%</small>
                          <input type="text" name="dividerwidth" placeholder="Divider width Ex: 10px, 50%">
                          <label>Background</label>
                          <small>Ex: #000000, red, rgba(255,255,255)</small>
                          <input type="text" name="dividercolor"
                            placeholder="Divider background Ex: #000000, red, rgba(255,255,255)">
                          <label>Height</label>
                          <small>Ex: 10px</small>
                          <input type="text" name="dividerheight" placeholder="Divider height Ex: 10px">
                          <label>Radius</label>
                          <small>Ex: 25px</small>
                          <input type="text" name="dividerradius" placeholder="Divider radius Ex: 25px">
                        </div>

                        <div class="vform-label-sf">
                          <label>Label</label>
                          <input type="text" name="optionname" />
                        </div>

                        <div class="vform-dropdown-sf">
                          <label>Choices</label>
                          <div class="vform-choice-dropdown">
                            <input type="text">
                            <span class="dropidown"><i class="fa fa-plus" aria-hidden="true"></i></span>
                          </div>
                          <div class="vform-dropdown-value">
                            <div>First Choice<i class="fa fa-times thisparemove" aria-hidden="true"></i></div>
                          </div>
                        </div>

                        <div class="vform-multichoice-sf">
                          <label>Choices</label>
                          <div class="vform-choice-multi">
                            <input type="text">
                            <span class="multiichoice"><i class="fa fa-plus" aria-hidden="true"></i></span>
                          </div>
                          <div class="vform-multichoice-value">
                            <div>First Choice<i class="fa fa-times thismultimove" aria-hidden="true"></i></div>
                            <div>Second Choice<i class="fa fa-times thismultimove" aria-hidden="true"></i></div>
                            <div>Third Choice<i class="fa fa-times thismultimove" aria-hidden="true"></i></div>
                          </div>
                        </div>

                        <div class="vform-checkbox-sf">
                          <label>Choices</label>
                          <div class="vform-checkbox-multi">
                            <input type="text">
                            <span class="multicheckbox"><i class="fa fa-plus" aria-hidden="true"></i></span>
                          </div>
                          <div class="vform-multicheckbox-value">
                            <div>First Choice<i class="fa fa-times thischeckbox" aria-hidden="true"></i></div>
                            <div>Second Choice<i class="fa fa-times thischeckbox" aria-hidden="true"></i></div>
                            <div>Third Choice<i class="fa fa-times thischeckbox" aria-hidden="true"></i></div>
                          </div>
                        </div>

                        <div class="vform-format-sf">
                          <label>Format</label>
                          <select name="adfieldformat">
                            <option value="simple">Simple</option>
                            <option value="firstlast">First Last</option>
                            <option value="firstmiddlelast" selected>First Middle Last</option>
                            <option value="combomiddlelast">First + (Middle Last) **New**</option>
                          </select>
                        </div>
                        <div class="vform-standard-bottom">
                          <label>Description</label>
                          <textarea row="3" name="optiondescription"></textarea>

                          <input type="checkbox" name="optionrequired"><label class="inline">Required</label>
                        </div>
                      </div>

                      <div class="advancedoptionfield">
                        <p>Advanced Option</p>

                        <label>Field Size</label>
                        <select name="adfieldsize">
                          <option value="small">Small</option>
                          <option value="medium">Medium</option>
                          <option value="large" selected>Large</option>
                        </select>

                        <div class="vform-allname-ao">

                          <div class="vform-ao-first">
                            <label>First Name</label>
                            <div class="placeholder">
                              <input type="text" class="placeholder" name="userfrstname" value="">
                              <label for="vform-field-option-8-first_placeholder" class="sub-label">Placeholder</label>
                            </div>
                            <div class="default">
                              <input type="text" class="default" name="userfrstnamedfval" value="">
                              <label for="vform-field-option-8-first_default" class="sub-label">Default Value</label>
                            </div>
                          </div>

                          <div class="vform-ao-middle">
                            <label>Middle Name</label>
                            <div class="placeholder">
                              <input type="text" class="placeholder" name="usermiddlename" value="">
                              <label for="vform-field-option-8-first_placeholder" class="sub-label">Placeholder</label>
                            </div>
                            <div class="default">
                              <input type="text" class="default" name="usermiddlenamedfval" value="">
                              <label for="vform-field-option-8-first_default" class="sub-label">Default Value</label>
                            </div>
                          </div>

                          <div class="vform-ao-last">
                            <label>Last Name</label>
                            <div class="placeholder">
                              <input type="text" class="placeholder" name="userlastnam" value="">
                              <label for="vform-field-option-8-first_placeholder" class="sub-label">Placeholder</label>
                            </div>
                            <div class="default">
                              <input type="text" class="default" name="userlastnamdfval" value="">
                              <label for="vform-field-option-8-first_default" class="sub-label">Default Value</label>
                            </div>
                          </div>

                        </div>

                        <div class="vform-placeholder-ao">
                          <label>Placeholder Text</label>
                          <input type="text" name="optionplaceholder" />
                        </div>
                        <input type="checkbox" name="optionhidelabel"><label class="inline">Hide Label</label>

                        <!-- for address -->
                        <div class="vform-address-ao">
                          <div class="vform-ao-first">
                            <label>Full Address</label>
                            <div class="placeholder">
                              <label for="vform-field-option-8-first_placeholder" class="sub-label">Placeholder</label>
                              <input type="text" class="placeholder" name="userfulladdress" value="">
                            </div>
                            <div class="default">
                              <label for="vform-field-option-8-first_default" class="sub-label">Default Value</label>
                              <input type="text" class="default" name="userfulladdressval" value="">
                            </div>
                          </div>

                          <div class="vform-ao-middle">
                            <label>City</label>
                            <div class="placeholder">
                              <label for="vform-field-option-8-first_placeholder" class="sub-label">Placeholder</label>
                              <input type="text" class="placeholder" name="usercity" value="">
                            </div>
                            <div class="default">
                              <label for="vform-field-option-8-first_default" class="sub-label">Default Value</label>
                              <input type="text" class="default" name="usercityval" value="">
                            </div>
                          </div>

                          <div class="vform-ao-last">
                            <label>State</label>
                            <div class="placeholder">
                              <label for="vform-field-option-8-first_placeholder" class="sub-label">Placeholder</label>
                              <input type="text" class="placeholder" name="userstate" value="">
                            </div>
                            <div class="default">
                              <label for="vform-field-option-8-first_default" class="sub-label">Default Value</label>
                              <input type="text" class="default" name="userstateval" value="">
                            </div>
                          </div>

                          <div class="vform-ao-last">
                            <label>Zip</label>
                            <div class="placeholder">
                              <label for="vform-field-option-8-first_placeholder" class="sub-label">Placeholder</label>
                              <input type="text" class="placeholder" name="userzip" value="">
                            </div>
                            <div class="default">
                              <label for="vform-field-option-8-first_default" class="sub-label">Default Value</label>
                              <input type="text" class="default" name="userzipval" value="">
                            </div>
                          </div>

                        </div>
                        <!-- for address -->

                        <div class="vform-defaultvalue-ao">
                          <label>Default Value</label>
                          <input type="text" name="optiondefaultvalue">
                        </div>

                        <label>Css Classes</label>
                        <input type="text" name="optionclasses"
                          placeholder="Give Space for your multiple classes like: a1 a3 aa">
                        <span class="addclassoption">Add Classes</span>
                        <span class="removeclassoption">Remove Classes <i class="fa fa-times" aria-hidden="true"></i></span>
                        <span class="addclassvalue"></span>

                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- form rightpanel -->

      <!-- form Builder -->

      <!-- form settings -->

      <div class="leftPanel" id="settingleft">
        <div class="fieldsPanel">
          <div class="settingsPanel">
            <div class="">
              <ul class="settingsPanel-list">
                <li><a class="navLink active vfsettingslink" data-id="1" id="general-link" href="javascript:void(0)">
                    <div class="activeBorderRemove">
                      <div class="cardvf">
                        <div class="card-leftSide"><span class="ji ji-settings panelIcon" name="settings">
                          <svg  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M15.5699 18.5001V14.6001" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M15.5699 7.45V5.5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M15.57 12.65C17.0059 12.65 18.17 11.4859 18.17 10.05C18.17 8.61401 17.0059 7.44995 15.57 7.44995C14.134 7.44995 12.97 8.61401 12.97 10.05C12.97 11.4859 14.134 12.65 15.57 12.65Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M8.43005 18.5V16.55" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M8.43005 9.4V5.5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M8.42996 16.5501C9.8659 16.5501 11.03 15.386 11.03 13.9501C11.03 12.5142 9.8659 11.3501 8.42996 11.3501C6.99402 11.3501 5.82996 12.5142 5.82996 13.9501C5.82996 15.386 6.99402 16.5501 8.42996 16.5501Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span></div>
                        <div class="card-contentWrapper">
                          <div class="tablet-content hideOnMobile hideOnDesktop">Form Settings</div>
                          <div class="card-content">
                            <div class="panelHeader"><span class="panelHeader-subtext">Form Settings</span></div>
                            <div class="panelDesc">Customize form status and properties</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a></li>
                <li><a class="navLink vfsettingslink" data-id="2" id="emails-link" href="javascript:void(0)">
                    <div class="activeBorderRemove">
                      <div class="cardvf">
                        <div class="card-leftSide"><span class="ji ji-email panelIcon" name="email">
                        <svg  version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                            viewBox="0 0 512 512"  xml:space="preserve">
                          <g>
                            <path class="st0" d="M510.746,110.361c-2.128-10.754-6.926-20.918-13.926-29.463c-1.422-1.794-2.909-3.39-4.535-5.009
                              c-12.454-12.52-29.778-19.701-47.531-19.701H67.244c-17.951,0-34.834,7-47.539,19.708c-1.608,1.604-3.099,3.216-4.575,5.067
                              c-6.97,8.509-11.747,18.659-13.824,29.428C0.438,114.62,0,119.002,0,123.435v265.137c0,9.224,1.874,18.206,5.589,26.745
                              c3.215,7.583,8.093,14.772,14.112,20.788c1.516,1.509,3.022,2.901,4.63,4.258c12.034,9.966,27.272,15.45,42.913,15.45h377.51
                              c15.742,0,30.965-5.505,42.967-15.56c1.604-1.298,3.091-2.661,4.578-4.148c5.818-5.812,10.442-12.49,13.766-19.854l0.438-1.05
                              c3.646-8.377,5.497-17.33,5.497-26.628V123.435C512,119.06,511.578,114.649,510.746,110.361z M34.823,99.104
                              c0.951-1.392,2.165-2.821,3.714-4.382c7.689-7.685,17.886-11.914,28.706-11.914h377.51c10.915,0,21.115,4.236,28.719,11.929
                              c1.313,1.327,2.567,2.8,3.661,4.272l2.887,3.88l-201.5,175.616c-6.212,5.446-14.21,8.443-22.523,8.443
                              c-8.231,0-16.222-2.99-22.508-8.436L32.19,102.939L34.823,99.104z M26.755,390.913c-0.109-0.722-0.134-1.524-0.134-2.341V128.925
                              l156.37,136.411L28.199,400.297L26.755,390.913z M464.899,423.84c-6.052,3.492-13.022,5.344-20.145,5.344H67.244
                              c-7.127,0-14.094-1.852-20.142-5.344l-6.328-3.668l159.936-139.379l17.528,15.246c10.514,9.128,23.922,14.16,37.761,14.16
                              c13.89,0,27.32-5.032,37.827-14.16l17.521-15.253L471.228,420.18L464.899,423.84z M485.372,388.572
                              c0,0.803-0.015,1.597-0.116,2.304l-1.386,9.472L329.012,265.409l156.36-136.418V388.572z"/>
                          </g>
                          </svg>
                        </span></div>
                        <div class="card-contentWrapper">
                          <div class="tablet-content hideOnMobile hideOnDesktop">Emails</div>
                          <div class="card-content">
                            <div class="panelHeader"><span class="panelHeader-subtext">Emails</span></div>
                            <div class="panelDesc">Send autoresponders and notifications</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a></li>
                <li><a class="navLink vfsettingslink" data-id="3" id="thankyou-link" href="javascript:void(0)">
                    <div class="activeBorderRemove">
                      <div class="cardvf">
                        <div class="card-leftSide"><span class="ji ji-checkmark panelIcon" name="checkmark">
                          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.8179 4.54512L13.6275 4.27845C12.8298 3.16176 11.1702 3.16176 10.3725 4.27845L10.1821 4.54512C9.76092 5.13471 9.05384 5.45043 8.33373 5.37041L7.48471 5.27608C6.21088 5.13454 5.13454 6.21088 5.27608 7.48471L5.37041 8.33373C5.45043 9.05384 5.13471 9.76092 4.54512 10.1821L4.27845 10.3725C3.16176 11.1702 3.16176 12.8298 4.27845 13.6275L4.54512 13.8179C5.13471 14.2391 5.45043 14.9462 5.37041 15.6663L5.27608 16.5153C5.13454 17.7891 6.21088 18.8655 7.48471 18.7239L8.33373 18.6296C9.05384 18.5496 9.76092 18.8653 10.1821 19.4549L10.3725 19.7215C11.1702 20.8382 12.8298 20.8382 13.6275 19.7215L13.8179 19.4549C14.2391 18.8653 14.9462 18.5496 15.6663 18.6296L16.5153 18.7239C17.7891 18.8655 18.8655 17.7891 18.7239 16.5153L18.6296 15.6663C18.5496 14.9462 18.8653 14.2391 19.4549 13.8179L19.7215 13.6275C20.8382 12.8298 20.8382 11.1702 19.7215 10.3725L19.4549 10.1821C18.8653 9.76092 18.5496 9.05384 18.6296 8.33373L18.7239 7.48471C18.8655 6.21088 17.7891 5.13454 16.5153 5.27608L15.6663 5.37041C14.9462 5.45043 14.2391 5.13471 13.8179 4.54512Z" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          <path d="M9 12L10.8189 13.8189V13.8189C10.9189 13.9189 11.0811 13.9189 11.1811 13.8189V13.8189L15 10" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                        </span></div>
                        <div class="card-contentWrapper">
                          <div class="tablet-content hideOnMobile hideOnDesktop">Thank You Page</div>
                          <div class="card-content">
                            <div class="panelHeader"><span class="panelHeader-subtext">Thank You Page</span></div>
                            <div class="panelDesc">Show page after submission</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a></li>
                <li><a class="navLink vfsettingslink" data-id="4" id="integrations-link" href="javascript:void(0)">
                    <div class="activeBorderRemove">
                      <div class="cardvf">
                        <div class="card-leftSide"><span class="ji ji-puzzle panelIcon" name="puzzle">
                        <svg viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">

                          <rect id="Icons" x="-448" y="-128" width="1280" height="800" style="fill:none;"/>

                          <g id="Icons1" serif:id="Icons">

                          <g id="Strike">

                          </g>

                          <g id="H1">

                          </g>

                          <g id="H2">

                          </g>

                          <g id="H3">

                          </g>

                          <g id="list-ul">

                          </g>

                          <g id="hamburger-1">

                          </g>

                          <g id="hamburger-2">

                          </g>

                          <g id="list-ol">

                          </g>

                          <g id="list-task">

                          </g>

                          <g id="trash">

                          </g>

                          <g id="vertical-menu">

                          </g>

                          <g id="horizontal-menu">

                          </g>

                          <g id="sidebar-2">

                          </g>

                          <g id="Pen">

                          </g>

                          <g id="Pen1" serif:id="Pen">

                          </g>

                          <g id="clock">

                          </g>

                          <g id="external-link">

                          </g>

                          <g id="hr">

                          </g>

                          <g id="info">

                          </g>

                          <g id="warning">

                          </g>

                          <g id="plus-circle">

                          </g>

                          <g id="minus-circle">

                          </g>

                          <path id="caret-left" d="M-45.457,32.027l24.07,-24.07l3.009,3.008l-21.062,21.062l21.062,21.062l-3.009,3.009l-24.07,-24.071Z" style="fill-rule:nonzero;"/>

                          <g id="vue">

                          </g>

                          <g id="cog">

                          </g>

                          <g id="logo">

                          </g>

                          <path id="connection" d="M32.096,30.055l12,0l-16,25.989l4,-21.989l-12,0l16,-26.016l-4,22.016Z"/>

                          <g id="radio-check">

                          </g>

                          <g id="eye-slash">

                          </g>

                          <g id="eye">

                          </g>

                          <g id="toggle-off">

                          </g>

                          <g id="shredder">

                          </g>

                          <g id="spinner--loading--dots-" serif:id="spinner [loading, dots]">

                          </g>

                          <g id="react">

                          </g>

                          <g id="check-selected">

                          </g>

                          <g id="turn-off">

                          </g>

                          <g id="code-block">

                          </g>

                          <g id="user">

                          </g>

                          <g id="coffee-bean">

                          </g>

                          <g id="coffee-beans">

                          <g id="coffee-bean1" serif:id="coffee-bean">

                          </g>

                          </g>

                          <g id="coffee-bean-filled">

                          </g>

                          <g id="coffee-beans-filled">

                          <g id="coffee-bean2" serif:id="coffee-bean">

                          </g>

                          </g>

                          <g id="clipboard">

                          </g>

                          <g id="clipboard-paste">

                          </g>

                          <g id="clipboard-copy">

                          </g>

                          <g id="Layer1">

                          </g>

                          </g>

                          </svg>
                        </span></div>
                        <div class="card-contentWrapper">
                          <div class="tablet-content hideOnMobile hideOnDesktop">Integrations</div>
                          <div class="card-content">
                            <div class="panelHeader"><span class="panelHeader-subtext">Integrations</span></div>
                            <div class="panelDesc">Connect your form to other apps</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li><a class="navLink vfsettingslink" data-id="5" id="integrations-link" href="javascript:void(0)">
                    <div class="activeBorderRemove">
                      <div class="cardvf">
                        <div class="card-leftSide"><span class="ji ji-embbed panelIcon" name="embed">
                          <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                            viewBox="0 0 512 512"  xml:space="preserve">
                            <g>
                              <path class="st0" d="M153.527,138.934c-0.29,0-0.581,0.088-0.826,0.258L0.641,242.995C0.238,243.27,0,243.721,0,244.213v27.921
                                c0,0.484,0.238,0.943,0.641,1.21l152.06,103.811c0.246,0.17,0.536,0.258,0.826,0.258c0.238,0,0.468-0.064,0.686-0.169
                                c0.484-0.258,0.782-0.758,0.782-1.306v-44.478c0-0.476-0.238-0.936-0.641-1.202L48.769,258.166l105.585-72.068
                                c0.403-0.282,0.641-0.734,0.641-1.226V140.41c0-0.548-0.298-1.049-0.782-1.299C153.995,138.991,153.765,138.934,153.527,138.934z"
                                />
                              <path class="st0" d="M511.358,242.995l-152.06-103.803c-0.246-0.169-0.536-0.258-0.827-0.258c-0.238,0-0.467,0.056-0.685,0.177
                                c-0.484,0.25-0.782,0.751-0.782,1.299v44.478c0,0.484,0.238,0.936,0.641,1.21l105.586,72.068l-105.586,72.092
                                c-0.403,0.266-0.641,0.725-0.641,1.217v44.462c0,0.548,0.298,1.049,0.782,1.306c0.218,0.105,0.448,0.169,0.685,0.169
                                c0.291,0,0.581-0.088,0.827-0.258l152.06-103.811c0.404-0.267,0.642-0.726,0.642-1.21v-27.921
                                C512,243.721,511.762,243.27,511.358,242.995z"/>
                              <path class="st0" d="M325.507,114.594h-42.502c-0.629,0-1.186,0.395-1.387,0.984l-96.517,279.885
                                c-0.153,0.443-0.08,0.943,0.194,1.322c0.278,0.387,0.722,0.621,1.198,0.621h42.506c0.625,0,1.182-0.395,1.387-0.992l96.513-279.868
                                c0.153-0.452,0.081-0.952-0.193-1.339C326.427,114.828,325.982,114.594,325.507,114.594z"/>
                            </g>
                          </svg>
                        </span></div>
                        <div class="card-contentWrapper">
                          <div class="tablet-content hideOnMobile hideOnDesktop">Quick Embed</div>
                          <div class="card-content">
                            <div class="panelHeader"><span class="panelHeader-subtext">Quick Embed</span></div>
                            <div class="panelDesc">Add your form to your page</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="stageContainer branding21" id="maincontsetting" role="main">
        <div class="stageScroller" style="display: block;">
          <div class="modules modal">
            <div class="modules-mainsection">
              <div class="modules-content properties">
                <div>
                  <div id="app_wizards" class="moodular platformV4 formsettingsV4 properties">
                    <div class="">
                      <div class="tabContent">
                        <div style="overflow-y: auto; max-height: 130px;">
                          <div class="modules-V4">


                            <div class="modules-contentvf" data-id="1">
                            
                              <div data-sc="panelHeader" class="sc-ciFQTS kPhSib panelHeader">
                                <div data-sc="panelHeader-iconWrapper" class="sc-bzPmhk fpsmLJ panelHeader-iconWrapper">
                                  <span data-icon-name="settings"
                                    class="panelHeader-icon panelHeader-icon-orange settings ji-settings">
                                    <svg  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.5699 18.5001V14.6001" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.5699 7.45V5.5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.57 12.65C17.0059 12.65 18.17 11.4859 18.17 10.05C18.17 8.61401 17.0059 7.44995 15.57 7.44995C14.134 7.44995 12.97 8.61401 12.97 10.05C12.97 11.4859 14.134 12.65 15.57 12.65Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.43005 18.5V16.55" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.43005 9.4V5.5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.42996 16.5501C9.8659 16.5501 11.03 15.386 11.03 13.9501C11.03 12.5142 9.8659 11.3501 8.42996 11.3501C6.99402 11.3501 5.82996 12.5142 5.82996 13.9501C5.82996 15.386 6.99402 16.5501 8.42996 16.5501Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                      </svg>
                                  </span></div>
                                <div data-sc="panelHeader-content" class="sc-kHdrYz cBVZrC panelHeader-content"><span
                                    class="panelHeader-text panelHeader-title">Form Settings</span><span
                                    class="panelHeader-text panelHeader-subtitle">Customize form status and
                                    properties</span></div>
                              </div>

                              <div class="mainCard" style="padding: 0px;">
                                <div class="line">
                                  <div class="column one one">
                                    <div style="padding: 25px;">
                                      <div data-element-id="title" class=" form-group line u-tooltipTrigger"
                                        aria-label="Title" role="group">
                                        
                                        <div class="column twelve twelve"><label for="title">Title</label></div>
                                        <div class="column twelve twelve">
                                          <p>Enter a name for your form</p><input elementlabel="[object Object]"
                                            id="title" name="title" type="text" class="inpt injectCSSPrevention vform-input-title"
                                            aria-label="" value="<?php echo esc_html_e($vfm_formname,'vform'); ?>">
                                        </div>

                                        <div class="column twelve twelve" style="display: inline-block;margin-top: 20px;"><label for="title">Description</label></div>
                                        <div class="column twelve twelve">
                                          <p><i class="fa fa-lightbulb" aria-hidden="true"></i> This will help you remember Which type of form it is.</p>
                                          <textarea class="inpt " name="formdescription"><?php echo esc_html_e($vfm_formdescription,'vform'); ?></textarea>
                                        </div>


                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="line">
                                  <hr
                                    style="background-color: rgb(236, 233, 230); height: 1px; border: 0px; margin: 0px;">
                                  <div class="column one one">
                                    <div data-element-id="status" class=" form-group line u-tooltipTrigger"
                                      role="group">
                                      <div class="column twelve twelve">
                                        <p></p>
                                        <div>
                                          <div class="line">
                                            <div>
                                              <div class="form-group line">
                                                <div class="column twelve twelve"><label
                                                    for="formSettingsFormStatus">Form Status</label></div>
                                                <div class="column twelve twelve">
                                                  <p>Enable Disable your form now</p>
                                                  <div class="m-dropdownWrapper"><select id="formSettingsFormStatus"
                                                      class="m-dropdown" aria-label="">
                                                      <option value="true" <?php echo $vfm_status=='true'?'selected="selected"':''; ?>>Enabled</option>
                                                      <option value="false" <?php echo $vfm_status=='false'?'selected="selected"':''; ?>>Disabled</option>
                                                    </select><span class="m-dropdownMask"></span></div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>

                            <div class="modules-contentvf" data-id="2">

                              <div class="sc-ciFQTS kPhSib panelHeader">
                                <div data-sc="panelHeader-iconWrapper" class="sc-bzPmhk fpsmLJ panelHeader-iconWrapper">
                                  <span data-icon-name="settings" class="panelHeader-icon panelHeader-icon-orange settings ji-settings">
                                  <svg style="fill: #fff;" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                                  <g>
                                    <path class="st0" d="M510.746,110.361c-2.128-10.754-6.926-20.918-13.926-29.463c-1.422-1.794-2.909-3.39-4.535-5.009
                                      c-12.454-12.52-29.778-19.701-47.531-19.701H67.244c-17.951,0-34.834,7-47.539,19.708c-1.608,1.604-3.099,3.216-4.575,5.067
                                      c-6.97,8.509-11.747,18.659-13.824,29.428C0.438,114.62,0,119.002,0,123.435v265.137c0,9.224,1.874,18.206,5.589,26.745
                                      c3.215,7.583,8.093,14.772,14.112,20.788c1.516,1.509,3.022,2.901,4.63,4.258c12.034,9.966,27.272,15.45,42.913,15.45h377.51
                                      c15.742,0,30.965-5.505,42.967-15.56c1.604-1.298,3.091-2.661,4.578-4.148c5.818-5.812,10.442-12.49,13.766-19.854l0.438-1.05
                                      c3.646-8.377,5.497-17.33,5.497-26.628V123.435C512,119.06,511.578,114.649,510.746,110.361z M34.823,99.104
                                      c0.951-1.392,2.165-2.821,3.714-4.382c7.689-7.685,17.886-11.914,28.706-11.914h377.51c10.915,0,21.115,4.236,28.719,11.929
                                      c1.313,1.327,2.567,2.8,3.661,4.272l2.887,3.88l-201.5,175.616c-6.212,5.446-14.21,8.443-22.523,8.443
                                      c-8.231,0-16.222-2.99-22.508-8.436L32.19,102.939L34.823,99.104z M26.755,390.913c-0.109-0.722-0.134-1.524-0.134-2.341V128.925
                                      l156.37,136.411L28.199,400.297L26.755,390.913z M464.899,423.84c-6.052,3.492-13.022,5.344-20.145,5.344H67.244
                                      c-7.127,0-14.094-1.852-20.142-5.344l-6.328-3.668l159.936-139.379l17.528,15.246c10.514,9.128,23.922,14.16,37.761,14.16
                                      c13.89,0,27.32-5.032,37.827-14.16l17.521-15.253L471.228,420.18L464.899,423.84z M485.372,388.572
                                      c0,0.803-0.015,1.597-0.116,2.304l-1.386,9.472L329.012,265.409l156.36-136.418V388.572z"></path>
                                  </g>
                                  </svg>
                                  </span></div>
                                <div data-sc="panelHeader-content" class="sc-kHdrYz cBVZrC panelHeader-content"><span class="panelHeader-text panelHeader-title">Emails</span><span class="panelHeader-text panelHeader-subtitle">Send autoresponders and notifications</span></div>
                              </div>
                              
                              <div class="vform-notifications-general">
                                  <h3>Notifications</h3>
                                  <select id="vform-notification_enable" name="settings[notification_enable]" class="">
                                    <option value="1" <?php echo $vf_notifito == 1 ? 'selected="selected"': ''; ?>>On</option>
                                    <option value="0" <?php echo $vf_notifito == 0 ? 'selected="selected"': ''; ?>>Off</option>
                                  </select>

                                  <div id="notificationstatus" <?php echo $vf_notifito == 0 ? 'style="display:none;"': ''; ?>>

                                      <div id="vform-panel-field-notifications-1-email-wrap" class="vform-panel-field email-recipient vform-panel-field-text">
                                        <label for="vform-panel-field-notifications-1-email">Send To Email Address
                                          <a  class="toggle-smart-tag-display" data-type="fields" data-fields="toemail">
                                            <i class="fa fa-tags"></i> <span>Show Smart Tags</span>
                                          </a>
                                          <ul class="smart-tags-list-display" data-fields="toemail">
                                            <li class="heading">Available Fields</li>
                                          </ul>

                                          </label>
                                          <input type="text" id="vform-panel-field-notifications-1-email" name="settings[notifications][1][email]" value="<?php echo esc_html_e($vf_sendto,'vform'); ?>" placeholder="" class="inpt">
                                      </div>
                                      <div id="vform-panel-field-notifications-1-subject-wrap" class="vform-panel-field  vform-panel-field-text">
                                        <label for="vform-panel-field-notifications-1-subject">Email Subject
                                          <a  class="toggle-smart-tag-display" data-type="all" data-fields="subject">
                                            <i class="fa fa-tags"></i> <span>Show Smart Tags</span>
                                          </a>
                                          <ul class="smart-tags-list-display" data-fields="subject">
                                            <li class="heading">Available Fields</li>
                                          </ul>

                                        </label>
                                        <input type="text" id="vform-panel-field-notifications-1-subject" name="settings[notifications][1][subject]" value="<?php echo esc_html_e($vf_emailsubject,'vform'); ?>" placeholder="" class="inpt">
                                      </div>
                                      <div id="vform-panel-field-notifications-1-sender_name-wrap" class="vform-panel-field  vform-panel-field-text">
                                        <label for="vform-panel-field-notifications-1-sender_name">From Name
                                          <a  class="toggle-smart-tag-display" data-type="fields" data-fields="name">
                                            <i class="fa fa-tags"></i> <span>Show Smart Tags</span>
                                          </a>
                                          <ul class="smart-tags-list-display" data-fields="name">
                                            <li class="heading">Available Fields</li>
                                          </ul>
                                        </label>
                                        <input type="text" id="vform-panel-field-notifications-1-sender_name" name="settings[notifications][1][sender_name]" value='<?php echo esc_html_e($vf_fromname,'vform'); ?>' placeholder='' class="inpt">
                                      </div>
                                      <div id="vform-panel-field-notifications-1-sender_address-wrap" class="vform-panel-field  vform-panel-field-text">
                                        <label for="vform-panel-field-notifications-1-sender_address">From Email
                                          <a  class="toggle-smart-tag-display" data-type="fields" data-fields="fromemail">
                                            <i class="fa fa-tags"></i> <span>Show Smart Tags</span>
                                          </a>
                                          <ul class="smart-tags-list-display" data-fields="fromemail">
                                            <li class="heading">Available Fields</li>
                                          </ul>
                                        </label>
                                        <input type="text" id="vform-panel-field-notifications-1-sender_address" name="settings[notifications][1][sender_address]" value="<?php echo esc_html_e($vf_fromemail,'vform'); ?>" placeholder="" class="inpt">
                                      </div>
                                      <div id="vform-panel-field-notifications-1-replyto-wrap" class="vform-panel-field  vform-panel-field-text">
                                        <label for="vform-panel-field-notifications-1-replyto">Reply-To
                                          <a  class="toggle-smart-tag-display" data-type="fields" data-fields="replaytoemail">
                                            <i class="fa fa-tags"></i>
                                            <span>Show Smart Tags</span>
                                          </a>
                                          <ul class="smart-tags-list-display" data-fields="replaytoemail">
                                            <li class="heading">Available Fields</li>
                                          </ul>
                                        </label>
                                        <input type="text" id="vform-panel-field-notifications-1-replyto" name="settings[notifications][1][replyto]" value='<?php echo esc_html_e($vf_replyto,'vform'); ?>' placeholder="" class="inpt">
                                      </div>
                                      <div id="vform-panel-field-notifications-1-message-wrap" class="vform-panel-field email-msg vform-panel-field-textarea">
                                        <label for="vform-panel-field-notifications-1-message">Message
                                          <a  class="toggle-smart-tag-display" data-type="all" data-fields="message">
                                            <i class="fa fa-tags"></i> <span>Show Smart Tags</span>
                                          </a>
                                          <ul class="smart-tags-list-display" data-fields="message">
                                            <li class="heading">Available Fields</li>
                                          </ul>
                                        </label>
                                        <textarea id="vform-panel-field-notifications-1-message" name="settings[notifications][1][message]" rows="6" placeholder="" class="inpt"><?php echo esc_html_e($vf_message,'vform'); ?></textarea>
                                        <p class="note">To display all form fields, use the <code>{all_fields}</code> Smart Tag.</p>
                                        <p class="note">To send this form fields to your wordpress admin email, use the <code>{admin_email}</code> Smart Tag.</p>
                                        <p class="note">Or you can simply type email address where you send the form fields, Example: <code>xyz@gmail.com</code>.</p>
                                        <!-- <p class="note">Note: Please make sure your name_id, email_id is correct<code>{name_id="--"}, {email_id="--"}</code>.</p> -->
                                        <p>Note: Use <code>info@<?php echo substr(get_site_url(),8); ?></code> in 'From' Address to prevent from email going to spam.</p>
                                      </div>

                                  </div>


                              </div>

                            </div>

                            <div class="modules-contentvf" data-id="3">

                              <div class="sc-ciFQTS kPhSib panelHeader">
                                <div data-sc="panelHeader-iconWrapper" class="sc-bzPmhk fpsmLJ panelHeader-iconWrapper">
                                  <span data-icon-name="settings" class="panelHeader-icon panelHeader-icon-orange settings ji-settings">
                                  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.8179 4.54512L13.6275 4.27845C12.8298 3.16176 11.1702 3.16176 10.3725 4.27845L10.1821 4.54512C9.76092 5.13471 9.05384 5.45043 8.33373 5.37041L7.48471 5.27608C6.21088 5.13454 5.13454 6.21088 5.27608 7.48471L5.37041 8.33373C5.45043 9.05384 5.13471 9.76092 4.54512 10.1821L4.27845 10.3725C3.16176 11.1702 3.16176 12.8298 4.27845 13.6275L4.54512 13.8179C5.13471 14.2391 5.45043 14.9462 5.37041 15.6663L5.27608 16.5153C5.13454 17.7891 6.21088 18.8655 7.48471 18.7239L8.33373 18.6296C9.05384 18.5496 9.76092 18.8653 10.1821 19.4549L10.3725 19.7215C11.1702 20.8382 12.8298 20.8382 13.6275 19.7215L13.8179 19.4549C14.2391 18.8653 14.9462 18.5496 15.6663 18.6296L16.5153 18.7239C17.7891 18.8655 18.8655 17.7891 18.7239 16.5153L18.6296 15.6663C18.5496 14.9462 18.8653 14.2391 19.4549 13.8179L19.7215 13.6275C20.8382 12.8298 20.8382 11.1702 19.7215 10.3725L19.4549 10.1821C18.8653 9.76092 18.5496 9.05384 18.6296 8.33373L18.7239 7.48471C18.8655 6.21088 17.7891 5.13454 16.5153 5.27608L15.6663 5.37041C14.9462 5.45043 14.2391 5.13471 13.8179 4.54512Z" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9 12L10.8189 13.8189V13.8189C10.9189 13.9189 11.0811 13.9189 11.1811 13.8189V13.8189L15 10" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                  </span></div>
                                <div data-sc="panelHeader-content" class="sc-kHdrYz cBVZrC panelHeader-content"><span class="panelHeader-text panelHeader-title">Thank you page</span><span class="panelHeader-text panelHeader-subtitle">Show page after submission</span></div>
                              </div>

                              <div class="vform-confirmations-general">
                                  <h3>Confirmations</h3>
                                    <div class="vform-builder-settings-block-content">

                                      <div id="vform-panel-field-confirmations-1-type-wrap" class="vform-panel-field vform-panel-field-confirmations-type-wrap vform-panel-field-select">
                                        <label for="vform-panel-field-confirmations-1-type">Confirmation Type</label>
                                        <select id="vform-panel-field-confirmations-1-type" name="settingsconfirmations" class="vform-panel-field-confirmations-type">
                                        <option value="message" <?php echo $vfm_confimation=='message' ? 'selected="selected"':''; ?>>Message</option>
                                          <option value="page" <?php echo $vfm_confimation=='page' ? 'selected="selected"':''; ?>>Show Page</option>
                                          <option value="redirect" <?php echo $vfm_confimation=='redirect' ? 'selected="selected"':''; ?>>Go to URL (Redirect)</option>
                                        </select>
                                      </div>
                                      <div id="vform-panel-field-confirmations-1-message-wrap" class="vform-panel-field  vform-panel-field-textarea" style="">

                                      <div class="wp-core-ui wp-editor-wrap tmce-active" id="vform-panel-field1" <?php echo $vfm_confimation!='message' ? 'style="display:none;"':''; ?>>
                                        <label for="vform-panel-field-confirmations-1-message">Confirmation Message</label>
                                        <?php
                                        if($vfm_confimation=='message'){
                                          $vfm_formmsg = stripslashes($vfm_confimation_value);
                                          $vfm_vl = html_entity_decode($vfm_formmsg);
                                        }
                                         $contentvformeditor=$vfm_vl; 
                                         wp_editor( $contentvformeditor , 'vformtextarea', $settings = array('textarea_name'=>'myvformtextarea','editor_height' => 100) ); ?>
                                      </div>

                                      <div id="vform-panel-field2" class="vform-panel-field  vform-panel-field-select" <?php echo $vfm_confimation!='page' ? 'style="display:none;"':''; ?>>
                                        <label for="vform-panel-field-confirmations-1-page">Confirmation Page</label>
                                        <select id="vform-panel-field-confirmations-1-page" name="settings[confirmations][1][page]" class="vform-panel-field-confirmations-page">

                                            <?php
                                              
                                              $mypages = get_pages( array(
                                                    'sort_column' => 'post_date',
                                                    'sort_order' => 'desc'
                                                ) );

                                                foreach( $mypages as $page )
                                                {
                                                    $title = $page->post_title;
                                                    $slug = $page->post_name;

                                                    $selected = '';
                                                    if($vfm_confimation_value==$slug){
                                                      $selected = 'selected="selected"';
                                                    }
                                                    echo "<option ".$selected." value='".esc_html($slug)."'>".esc_html($title)."</option>";
                                                }
                                            ?>


                                        </select>
                                      </div>
                                      <?php
                                        if($vfm_confimation=='redirect'){
                                          $vfm_vl3 = $vfm_confimation_value;
                                        }
                                      ?>
                                      <div id="vform-panel-field3" class="vform-panel-field  vform-panel-field-text" <?php echo $vfm_confimation!='redirect' ? 'style="display:none;"':''; ?>>
                                        <label for="vform-panel-field-confirmations-1-redirect">Confirmation Redirect URL</label>
                                        <input type="text" id="vform-panel-field-confirmations-1-redirect" name="settings[confirmations][1][redirect]" value="<?php echo esc_html_e($vfm_vl3,'vform'); ?>" placeholder="Example: https://example.com/newpage" class="inpt vform-panel-field-confirmations-redirect">
                                      </div>

                                    </div>
                                </div>
                              </div>

                            </div>

                            <div class="modules-contentvf" data-id="4">

                              <div class="sc-ciFQTS kPhSib panelHeader">
                                  <div data-sc="panelHeader-iconWrapper" class="sc-bzPmhk fpsmLJ panelHeader-iconWrapper">
                                    <span style="fill:#fff;" data-icon-name="settings" class="panelHeader-icon panelHeader-icon-orange settings ji-settings">
                                    <svg viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">

                                      <rect id="Icons" x="-448" y="-128" width="1280" height="800" style="fill:none;"></rect>

                                      <g id="Icons1" serif:id="Icons">

                                      <g id="Strike">

                                      </g>

                                      <g id="H1">

                                      </g>

                                      <g id="H2">

                                      </g>

                                      <g id="H3">

                                      </g>

                                      <g id="list-ul">

                                      </g>

                                      <g id="hamburger-1">

                                      </g>

                                      <g id="hamburger-2">

                                      </g>

                                      <g id="list-ol">

                                      </g>

                                      <g id="list-task">

                                      </g>

                                      <g id="trash">

                                      </g>

                                      <g id="vertical-menu">

                                      </g>

                                      <g id="horizontal-menu">

                                      </g>

                                      <g id="sidebar-2">

                                      </g>

                                      <g id="Pen">

                                      </g>

                                      <g id="Pen1" serif:id="Pen">

                                      </g>

                                      <g id="clock">

                                      </g>

                                      <g id="external-link">

                                      </g>

                                      <g id="hr">

                                      </g>

                                      <g id="info">

                                      </g>

                                      <g id="warning">

                                      </g>

                                      <g id="plus-circle">

                                      </g>

                                      <g id="minus-circle">

                                      </g>

                                      <path id="caret-left" d="M-45.457,32.027l24.07,-24.07l3.009,3.008l-21.062,21.062l21.062,21.062l-3.009,3.009l-24.07,-24.071Z" style="fill-rule:nonzero;"></path>

                                      <g id="vue">

                                      </g>

                                      <g id="cog">

                                      </g>

                                      <g id="logo">

                                      </g>

                                      <path id="connection" d="M32.096,30.055l12,0l-16,25.989l4,-21.989l-12,0l16,-26.016l-4,22.016Z"></path>

                                      <g id="radio-check">

                                      </g>

                                      <g id="eye-slash">

                                      </g>

                                      <g id="eye">

                                      </g>

                                      <g id="toggle-off">

                                      </g>

                                      <g id="shredder">

                                      </g>

                                      <g id="spinner--loading--dots-" serif:id="spinner [loading, dots]">

                                      </g>

                                      <g id="react">

                                      </g>

                                      <g id="check-selected">

                                      </g>

                                      <g id="turn-off">

                                      </g>

                                      <g id="code-block">

                                      </g>

                                      <g id="user">

                                      </g>

                                      <g id="coffee-bean">

                                      </g>

                                      <g id="coffee-beans">

                                      <g id="coffee-bean1" serif:id="coffee-bean">

                                      </g>

                                      </g>

                                      <g id="coffee-bean-filled">

                                      </g>

                                      <g id="coffee-beans-filled">

                                      <g id="coffee-bean2" serif:id="coffee-bean">

                                      </g>

                                      </g>

                                      <g id="clipboard">

                                      </g>

                                      <g id="clipboard-paste">

                                      </g>

                                      <g id="clipboard-copy">

                                      </g>

                                      <g id="Layer1">

                                      </g>

                                      </g>

                                      </svg>
                                    </span></div>
                                  <div data-sc="panelHeader-content" class="sc-kHdrYz cBVZrC panelHeader-content"><span class="panelHeader-text panelHeader-title">Integrations</span><span class="panelHeader-text panelHeader-subtitle">Connect your form to other apps</span></div>
                              </div>

                              <div class="vform-integration-general">
                                      Coming Soon...                                    
                              </div>

                            </div>

                            <div class="modules-contentvf" data-id="5">

                              <div class="sc-ciFQTS kPhSib panelHeader">
                                  <div class="sc-bzPmhk fpsmLJ panelHeader-iconWrapper">
                                    <span style="fill:#fff;" data-icon-name="settings" class="panelHeader-icon panelHeader-icon-orange settings ji-settings">
                                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                                      <g>
                                        <path class="st0" d="M153.527,138.934c-0.29,0-0.581,0.088-0.826,0.258L0.641,242.995C0.238,243.27,0,243.721,0,244.213v27.921
                                          c0,0.484,0.238,0.943,0.641,1.21l152.06,103.811c0.246,0.17,0.536,0.258,0.826,0.258c0.238,0,0.468-0.064,0.686-0.169
                                          c0.484-0.258,0.782-0.758,0.782-1.306v-44.478c0-0.476-0.238-0.936-0.641-1.202L48.769,258.166l105.585-72.068
                                          c0.403-0.282,0.641-0.734,0.641-1.226V140.41c0-0.548-0.298-1.049-0.782-1.299C153.995,138.991,153.765,138.934,153.527,138.934z"></path>
                                        <path class="st0" d="M511.358,242.995l-152.06-103.803c-0.246-0.169-0.536-0.258-0.827-0.258c-0.238,0-0.467,0.056-0.685,0.177
                                          c-0.484,0.25-0.782,0.751-0.782,1.299v44.478c0,0.484,0.238,0.936,0.641,1.21l105.586,72.068l-105.586,72.092
                                          c-0.403,0.266-0.641,0.725-0.641,1.217v44.462c0,0.548,0.298,1.049,0.782,1.306c0.218,0.105,0.448,0.169,0.685,0.169
                                          c0.291,0,0.581-0.088,0.827-0.258l152.06-103.811c0.404-0.267,0.642-0.726,0.642-1.21v-27.921
                                          C512,243.721,511.762,243.27,511.358,242.995z"></path>
                                        <path class="st0" d="M325.507,114.594h-42.502c-0.629,0-1.186,0.395-1.387,0.984l-96.517,279.885
                                          c-0.153,0.443-0.08,0.943,0.194,1.322c0.278,0.387,0.722,0.621,1.198,0.621h42.506c0.625,0,1.182-0.395,1.387-0.992l96.513-279.868
                                          c0.153-0.452,0.081-0.952-0.193-1.339C326.427,114.828,325.982,114.594,325.507,114.594z"></path>
                                      </g>
                                    </svg>
                                    </span></div>
                                  <div class="sc-kHdrYz cBVZrC panelHeader-content"><span class="panelHeader-text panelHeader-title">Quick embed</span><span class="panelHeader-text panelHeader-subtitle">Add your form to your page</span></div>
                              </div>

                              <div class="vform-embed-general">
                                <div class="linkBox flxp"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                      d="M17.959 6.04a3.714 3.714 0 0 1 0 5.253l-1.334 1.334a1 1 0 0 0 1.415 1.414l1.333-1.334a5.714 5.714 0 1 0-8.08-8.08L9.958 5.96a1 1 0 1 0 1.414 1.414l1.333-1.333a3.714 3.714 0 0 1 5.253 0Zm-10 10a1 1 0 0 1 0-1.414l6.667-6.667a1 1 0 1 1 1.414 1.414L9.374 16.04a1 1 0 0 1-1.415 0ZM6.04 12.707a3.714 3.714 0 0 0 5.252 5.252l1.334-1.333a1 1 0 1 1 1.414 1.414l-1.333 1.333a5.714 5.714 0 1 1-8.081-8.08l1.333-1.334a1 1 0 1 1 1.414 1.414L6.04 12.707Z"
                                      clip-rule="evenodd"></path>
                                  </svg>
                                  <div class="test_linkItself linkItself flw">
                                    [vform id="<?php echo $id; ?>"]</div>
                                </div>
                              </div>
                                        
                            </div>

                            





                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- form settings -->

      <!-- form save -->

      <form id="vform-userform">
          <input type="hidden" name="editid" value="<?php echo esc_html_e($id,'vform'); ?>" >
          <input type="hidden" name="formname" value="<?php echo esc_html_e($vfm_formname,'vform'); ?>">
          <input type="hidden" name="formdescription" value="<?php echo esc_html_e($vfm_formdescription,'vform'); ?>">
          <input type="hidden" name="formbody" >

          <input type="hidden" name="notification_mode" value="<?php echo esc_html_e($vf_notifito,'vform'); ?>">
          <input type="hidden" name="send_to" value="<?php echo esc_html_e($vf_sendto,'vform'); ?>">
          <input type="hidden" name="email_subject" value="<?php echo esc_html_e($vf_emailsubject,'vform'); ?>">
          <input type="hidden" name="from_name" value='<?php echo esc_html_e($vf_fromname,'vform'); ?>'>
          <input type="hidden" name="from_email" value="<?php echo esc_html_e($vf_fromemail,'vform'); ?>">
          <input type="hidden" name="reply_to" value='<?php echo esc_html_e($vf_replyto,'vform'); ?>'>
          <input type="hidden" name="message" value="<?php echo esc_html_e($vf_message,'vform'); ?>">

          <input type="hidden" name="formstatus" value="<?php echo esc_html_e($vfm_status ,'vform'); ?>">
      </form>

      <!-- form save -->
      
      <input type="hidden" name="vformeditmode" value="">
      <script>
        var maxget = jQuery('#vform-mainfields .vform-group').length;
        // console.log(maxget);
        jQuery('[name="vformeditmode"]').val(maxget);
      </script>

</div>
<?php } ?>
<!-- form base -->


<!-- form submissions -->

<?php if(isset($submissionid)){ ?>

<div id="rootsubmission">
  <div class="lsApp">
    <div class="lsApp-body">
      <div class="lsApp-sidebar">

        <div class="lsApp-sidebar-content">
          <div class="lsApp-sidebar-button">
            <a class="sc-dcgwPl kazPwG createForm forSidebar"  style="background:#a38e56;" href="?page=vform" >Home</a>
          </div>
        </div>
        
        <?php
            $vffrm = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform  ORDER by id ASC", OBJECT );
            foreach ( $vffrm as $keyfrm=>$valuefrm ) {
              $date = strtotime($vffrm[$keyfrm]->datesubmit);
              $formattedDate = date('F j, Y', $date);

              // $sb = $wpdb->get_results( "SELECT count(*) as cnt FROM {$wpdb->prefix}vform_userinput WHERE formid = '".$vffrm[$keyfrm]->id."'", OBJECT );

              $form_id = intval($vffrm[$keyfrm]->id); // Assuming formid is an integer
              $query = "SELECT count(*) as cnt FROM {$wpdb->prefix}vform_userinput WHERE formid = %d";
              $sb = $wpdb->get_results($wpdb->prepare($query, $form_id), OBJECT);

          ?>
        <div class="lsApp-sidebar-content">
          <div class="lsApp-sidebar-button">
            <a class="sc-dcgwPl kazPwG createForm forSidebar <?php echo $submissionid == $vffrm[$keyfrm]->id ? 'active': ''; ?>" href="?page=vform&submissionid=<?php echo $vffrm[$keyfrm]->id; ?>" ><?php echo $vffrm[$keyfrm]->formname; ?> <span class="sbcnt"><?php echo $sb[0]->cnt; ?></span></a>
          </div>
        </div>
        <?php
          }
        ?>
      </div>
      <div class="lsApp-content">
        <div class="lsApp-list" style="position: relative;">
          <div>
            <div aria-label="grid" aria-readonly="true"
              class="ReactVirtualized__Grid ReactVirtualized__List virtualizedGrid" role="grid" tabindex="0"
              style="will-change: transform;">
              <div class="ReactVirtualized__Grid__innerScrollContainer" role="row">
              
                        


                  <?php
                      $getvfid = sanitize_text_field($submissionid);
                        // $vformdata2 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE formid='".$getvfid."' ORDER BY id DESC", OBJECT );

                        $form_id = intval($getvfid); // Assuming formid is an integer
                        $query = "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE formid = %d ORDER BY id DESC";
                        $vformdata2 = $wpdb->get_results($wpdb->prepare($query, $form_id), OBJECT);
                        
                      
                        foreach ( $vformdata2 as $keyone2=>$valueone2 ) {
                          $cntvfr = $keyone2+1;
                          $ttcnt = count($vformdata2);

                          $seperatehtml = $vformdata2[$keyone2]->maindatabody;
                          $seperatehtml = urldecode($seperatehtml);

                          $mainhtml = explode("&",$seperatehtml);

                          // print_r($mainhtml);

                          ?>

                            <div class="lsApp-list-item listItem listItem-generic listItemType-allForms listItem- isSelected">

                                    <?php // echo esc_html_e($cntvfr,'vform'); ?>

                                    <div class="sidepart">
                          
                                      <?php 
                                      
                                        foreach ($mainhtml as $key => $value) {

                                          $seph = explode("=",$value);
                                          if(!empty($seph[1])){
                                            
                                            $seph2 = explode("~",$seph[1]);

                                            if(!empty($seph2[0])){
                                              echo '<span style="color:#000; font-weight: bold; text-transform:capitalize;">'.$seph[0].'</span> : '.$seph2[0].'<br>';
                                            }

                                            if(!empty($seph2[1])){
                                              echo '<span style="color:#000; font-weight: bold; text-transform:capitalize;">'.$seph[0].'</span> : '.$seph2[1].'<br>';
                                            }

                                          }

                                        }

                                        echo '<br><hr><br>Browser: '.$vformdata2[$keyone2]->browser;
                                      
                                      ?>

                                    </div>
                                    <div class="big-numbers">
                                      <ul>
                                      <li>
                                          <div class="number"><span><?php echo esc_html_e($vformdata2[$keyone2]->ip,'vform'); ?></span></div>
                                          <div class="kind">IP Address</div>
                                        </li>
                                        <li>
                                          <div class="number"><span><?php echo esc_html_e($vformdata2[$keyone2]->currentdate,'vform'); ?></span></div>
                                          <div class="kind">Submission Date</div>
                                        </li>
                                        <li class="current">
                                          <div class="number">
                                            <span>
                                              <?php $tmtake = $vformdata2[$keyone2]->usertimetakes; ?>
                                              <script>
                                                var txtvform = '<?php echo html_entity_decode(esc_html($tmtake)); ?>';
                                                var objvform = JSON.parse(txtvform);
                                                var fulltimetkvform = objvform.minute+" : "+objvform.second;
                                                document.write(fulltimetkvform);
                                              </script>
                                            </span>
                                          </div>
                                          <div class="kind" data-reactid=".0.1.2.0.3.1">Avg. Time</div>
                                        </li>
                                      </ul>
                                    </div>
                                            


                            </div>

                        <?php
                      }
                    ?>


                          
                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>


<!-- form submissions -->

</div>
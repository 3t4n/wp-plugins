<?php 
  $id  = '';

  if ( isset($_GET['id']) ) {
      $id = $_GET['id'];
    
      if ( strpos($id, '<script>') !== false || strpos($id, '</script>') !== false ) {
          wp_die('Invalid input detected.');
      }
    
      $id = sanitize_text_field( $id );
      $id = esc_html( $id );
  }
?>
<div class="modules-V4">


  <div class="modules-contentvf" data-id="1">

    <div class="css-1q091xc">

      <div class="css-0">
        <div class="css-q919xu">
          <div class="css-ubhhzq"><span>
              <h2 class="css-18cy5i1 css-72qqz6-Text" data-zds="true">Description</h2>
            </span></div>
          <div class="css-e92bi9">
            <div class="css-qc14rr">

                  <p><i class="fa fa-lightbulb" aria-hidden="true"></i> This will help you identify the type of form.</p>
                  <textarea class="inpt frmtxtarea"
                    name="formdescription"><?php echo esc_html_e($vfm_formdescription,'vform'); ?></textarea>

            </div>
          </div>
        </div>
      </div>

    </div>
  <br>
    <div class="css-1q091xc">
      <div class="css-0">
          <div class="css-q919xu">
            <div class="css-ubhhzq"><span>
                <div class="css-18cy5i1 css-72qqz6-Text cssforstop" data-zds="true">
                   
                <label class="switch mkstatusduplicate">
                      <input type="checkbox" <?php echo $vf_no_duplicate=='true'?'checked="true"':''; ?> >

                      <div>
                          <span></span>
                      </div>
                  </label> 
                  
                  STOP people from duplicating their entries</div>
              </div>
          </div>
        </div>
    </div>

  </div>

  <div class="modules-contentvf" data-id="2">

    <div class="css-1q091xc">

      <div class="css-0">
        <div class="css-q919xu">
          <div class="css-ubhhzq"><span>
              <h2 class="css-18cy5i1 css-72qqz6-Text" data-zds="true">Create Notification</h2>
              <form id="myvformdata10form">
                <?php wp_nonce_field('myvformdata10','vfm-nonce10'); ?>
              </form>
              
            </span></div>
            <div class="css-e92bi9">
              <div class="css-qc14rr">
                
                <button id="createnotifibtn" class="createnotifibtn">Create Notification</button>
                  

            </div>
          </div>
        </div>
      </div>

      <div class="css-0">
        <div class="css-q919xu">
          <div class="css-ubhhzq"><span>
              <h2 class="css-18cy5i1 css-72qqz6-Text" data-zds="true">Notifications</h2>
            </span></div>
            <div class="css-e92bi9">
              <div class="css-qc14rr">
                                    
                                    
                    <div class="vform-notifications-general">


                      <input type="hidden" name="vf_formid" value="<?php echo $id; ?>" id="vfromid">
                      <?php

                            $frmid = sanitize_text_field($id);

                            $form_id = intval($frmid); // Assuming formid is an integer
                            $query = "SELECT * FROM {$wpdb->prefix}vform_notifications WHERE formid = %d ORDER BY id DESC";
                            $frmiddata = $wpdb->get_results($wpdb->prepare($query, $form_id), OBJECT);

                            // $frmiddata = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform_notifications  WHERE formid='".$frmid."' ORDER BY id DESC", OBJECT );

                            if(count($frmiddata)==0){
                              echo '<button id="createnotifibtn" class="createnotifibtn">Create Notification</button>';
                            }

                            foreach ( $frmiddata as $keyedt=>$valueview ) {

                                $vfid = $valueview->id;
                                $actname = $valueview->action_name;
                                $sendemail = $valueview->send_to_email;
                                $fromname = $valueview->from_name;
                                $fromemail = $valueview->from_email;
                                $subject = $valueview->subject;
                                $replyto = $valueview->reply_to;
                                $mode = $valueview->mode;
                                $dropdown = $valueview->dropdown;
                                
                                // $message = $valueview->message;
                                  $decoded = json_decode($valueview->message, true);
                                  $message = preg_replace('/\\\\+/', '', $decoded);
                        
                        ?>

                      <form id="myvformdata11form">
                        <?php wp_nonce_field('myvformdata11','vfm-nonce11'); ?>
                      </form>


                      <form id="myvformdata12form">
                        <?php wp_nonce_field('myvformdata12','vfm-nonce12'); ?>
                      </form>

                      <div id="frm_form_action_2439"
                        class="widget makenotitogglehome frm_form_action_settings frm_single_email_settings <?php echo $dropdown =='1' ? 'open': '' ; ?> ">
                        <form action="javascript:void(0)" class="vf_notiform" data-id="<?php echo $vfid; ?>">
                          <input type="hidden" name="notifiid" value="<?php echo $vfid; ?>">

                          <input type="hidden" name="vf_dropdown" class="vf_dropdown" value="<?php echo $dropdown; ?>">

                          <div class="widget-top">
                            <div class="widget-title-action">
                              <button type="button" class="widget-action makenotitoggle">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path
                                    d="M9.71069 18.2929C10.1012 18.6834 10.7344 18.6834 11.1249 18.2929L16.0123 13.4006C16.7927 12.6195 16.7924 11.3537 16.0117 10.5729L11.1213 5.68254C10.7308 5.29202 10.0976 5.29202 9.70708 5.68254C9.31655 6.07307 9.31655 6.70623 9.70708 7.09676L13.8927 11.2824C14.2833 11.6729 14.2833 12.3061 13.8927 12.6966L9.71069 16.8787C9.32016 17.2692 9.32016 17.9023 9.71069 18.2929Z"
                                    fill="#0F0F0F" />
                                </svg>
                              </button>
                            </div>
                            <span class="frm_email_icons alignright">
                              <a href="javascript:void(0)" class="frm_save_form" title="Save">
                                Save <svg width="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M4.89163 13.2687L9.16582 17.5427L18.7085 8" stroke="#000000" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </a>

                              <a href="javascript:void(0)" data-removeid="frm_form_action_2439" class="frm_remove_form"
                                data-frmverify="Delete this form action?" data-frmverify-btn="frm-button-red" title="Delete">
                                Delete<svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M10 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                  <path d="M14 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                  <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#000000"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </a>

                              <!-- <label class="switch frm_toggle_block">
                                <input type="checkbox" class="checkbox" name="vf_mode" value="1"
                                  // echo $mode =='1' ? 'checked': '' ; >
                                <div class="slider"></div>
                              </label> -->
                              <label class="switch frm_toggle_block">
                                Status:<span class="myemailstatus"><?php echo $mode =='1' ? 'Active': 'Inactive' ; ?></span>
                                  <input type="checkbox" name="vf_mode" value="1" <?php echo $mode =='1' ? 'checked="true"': '' ; ?> >
                                  <div>
                                      <span></span>
                                  </div>
                              </label>

                            </span>
                            <div class="widget-title">
                              <h4>
                                <span class="frm_form_action_icon frm-outer-circle ">
                                  <svg class="vfrmsvg" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 7.00005L10.2 11.65C11.2667 12.45 12.7333 12.45 13.8 11.65L20 7" stroke="#000000"
                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <rect x="3" y="5" width="18" height="14" rx="2" stroke="#000000" stroke-width="2"
                                      stroke-linecap="round" />
                                  </svg>
                                </span>
                                <span class="sndeml"><?php echo $actname; ?></span>
                              </h4>
                            </div>
                          </div>
                          <div class="widget-inside frminsidetiggle"
                            style="<?php echo $dropdown =='1' ? 'display:block;': '' ; ?> position:relative;">

                            <div style="display:none;" class="vfoptnfield">
                              <ul id="vf_insidefields" class="vf_insidefields-tabs ">
                                <li class="vf_insidefields-tabs active">
                                  <a href="javascript:void(0)" id="vf_insidefields_tab">
                                    Fields </a>
                                </li>
                                <!-- <li class="vf_insidefields-tabs">
                                        <a href="javascript:void(0)" id="vf_insideadv_tab">
                                          Advanced			</a>
                                      </li> -->
                              </ul>
                              <ul class="makesmarttagpos"></ul>
                            </div>

                            <div class="frm_grid_container frm_no_p_margin">
                              <p class="frm6 frm_form_field">
                                <label for="action_post_title_2439" class="frm_help">
                                  Action Name </label>
                                <input type="text" name="action_name" value="<?php echo $actname; ?>" class="large-text  vf_actionname">
                              </p>
                            </div>

                            <p class="frm_has_shortcodes frm_to_row frm_email_row">
                              <label for="email_to_2439" class="frm_help">
                                Send To Email Address (Use comma for multiple email address) </label>
                              <span class="frm-with-right-icon">
                                <svg fill="#000000" data-toppos="158" class="frm-show-box" viewBox="0 0 32 32"
                                  enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                  <path d="M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S17.654,13,16,13z" id="XMLID_287_" />
                                  <path d="M6,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S7.654,13,6,13z" id="XMLID_289_" />
                                  <path d="M26,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S27.654,13,26,13z" id="XMLID_291_" />
                                  </svg>
                                <input type="text" name="email_to" value="<?php echo $sendemail; ?>"
                                  class="frm_not_email_to frm_email_blur large-text  frm_help" id="email_to_2439">

                                <div
                                  style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                </div>
                              </span>
                            </p>



                            <p class="frm_has_shortcodes frm_from_row frm_email_row">
                              <label for="from_2439" class="frm_help">
                                From Name </label>

                              <span class="frm-with-right-icon"><svg fill="#000000" data-toppos="230" class="frm-show-box"
                                  viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                  <path d="M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S17.654,13,16,13z" id="XMLID_287_" />
                                  <path d="M6,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S7.654,13,6,13z" id="XMLID_289_" />
                                  <path d="M26,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S27.654,13,26,13z" id="XMLID_291_" />
                                  </svg>
                                <input type="text" name="from_name" value="<?php echo $fromname; ?>"
                                  class="frm_not_email_to frm_email_blur large-text  frm_help" id="from_2439"></span>
                            </p>


                            <p class="frm_has_shortcodes frm_from_row frm_email_row">
                              <label for="from_2439" class="frm_help">
                                From Email </label>

                              <span class="frm-with-right-icon"><svg fill="#000000" data-toppos="304" class="frm-show-box"
                                  viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                  <path d="M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S17.654,13,16,13z" id="XMLID_287_" />
                                  <path d="M6,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S7.654,13,6,13z" id="XMLID_289_" />
                                  <path d="M26,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S27.654,13,26,13z" id="XMLID_291_" />
                                  </svg>
                                <input type="email" name="from_email" value="<?php echo $fromemail; ?>"
                                  class="frm_not_email_to frm_email_blur large-text  frm_help" id="from_2439"></span>
                            </p>

                            <p class="frm_has_shortcodes frm_from_row frm_email_row">
                              <label for="from_2439" class="frm_help">
                                Reply-To </label>

                              <span class="frm-with-right-icon"><svg fill="#000000" data-toppos="378" class="frm-show-box"
                                  viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                  <path d="M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S17.654,13,16,13z" id="XMLID_287_" />
                                  <path d="M6,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S7.654,13,6,13z" id="XMLID_289_" />
                                  <path d="M26,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S27.654,13,26,13z" id="XMLID_291_" />
                                  </svg>
                                <input type="email" name="replyto" value="<?php echo $replyto; ?>"
                                  class="frm_not_email_to frm_email_blur large-text  frm_help" id="from_2439"></span>
                            </p>


                            <p class="frm_has_shortcodes">
                              <label for="email_subject_2439" class="frm_help">
                                Email Subject </label>
                              <span class="frm-with-right-icon"><svg fill="#000000" data-toppos="430" class="frm-show-box"
                                  viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve"
                                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                  <path d="M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S17.654,13,16,13z" id="XMLID_287_" />
                                  <path d="M6,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S7.654,13,6,13z" id="XMLID_289_" />
                                  <path d="M26,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S27.654,13,26,13z" id="XMLID_291_" />
                                  </svg>

                                <input type="text" name="email_subject" class="frm_not_email_subject large-text  frm_help" title=""
                                  id="email_subject_2439" value="<?php echo $subject; ?>"></span>
                            </p>

                            <p class="frm_has_shortcodes">
                              <label for="email_message_2439">
                                Message </label>
                            </p>
                            <div id="wp-email_message_2439-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                              <svg fill="#000000" data-toppos="550" class="frm-show-box" viewBox="0 0 32 32"
                                enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path d="M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S17.654,13,16,13z" id="XMLID_287_" />
                                <path d="M6,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S7.654,13,6,13z" id="XMLID_289_" />
                                <path d="M26,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S27.654,13,26,13z" id="XMLID_291_" /></svg>

                              <textarea id="vform-panel-field-notifications-1-message" name="email_message" rows="6" placeholder=""
                                class="inpt"><?php echo $message; ?></textarea>

                            </div>



                            <div style="clear:both;"></div>
                          </div>
                        </form>
                      </div>

                      <?php } ?>





                      <select style="display:none;" id="vform-notification_enable" name="settings[notification_enable]" class="">
                        <option value="1" <?php echo $vf_notifito == 1 ? 'selected="selected"': ''; ?>>On</option>
                        <option value="0" <?php echo $vf_notifito == 0 ? 'selected="selected"': ''; ?>>Off</option>
                      </select>



                   </div>


            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

  <div class="modules-contentvf" data-id="3">


      <div class="css-1q091xc">
        <div class="css-0">
          <div class="css-q919xu">
            <div class="css-ubhhzq"><span>
                <h2 class="css-18cy5i1 css-72qqz6-Text" data-zds="true">Confirmation</h2>
              </span></div>
            <div class="css-e92bi9">
              <div class="css-qc14rr">

                  <div class="vform-builder-settings-block-content">

                      <div id="vform-panel-field-confirmations-1-type-wrap"
                        class="vform-panel-field vform-panel-field-confirmations-type-wrap vform-panel-field-select">
                        <label for="vform-panel-field-confirmations-1-type">Confirmation Type</label>
                        <select id="vform-panel-field-confirmations-1-type" name="settingsconfirmations"
                          class="vform-panel-field-confirmations-type">
                          <option value="message" <?php echo $vfm_confimation=='message' ? 'selected="selected"':''; ?>>Message
                          </option>
                          <option value="page" <?php echo $vfm_confimation=='page' ? 'selected="selected"':''; ?>>Show Page</option>
                          <option value="redirect" <?php echo $vfm_confimation=='redirect' ? 'selected="selected"':''; ?>>Go to URL
                            (Redirect)</option>

                          <option value="redirect_2" <?php echo $vfm_confimation=='redirect_2' ? 'selected="selected"':''; ?>>User
                            Details On Page (Redirect) **New**</option>

                        </select>
                      </div>
                      <div id="vform-panel-field-confirmations-1-message-wrap" class="vform-panel-field  vform-panel-field-textarea"
                        style="">

                        <div class="wp-core-ui wp-editor-wrap tmce-active" id="vform-panel-field1"
                          <?php echo $vfm_confimation!='message' ? 'style="display:none;"':''; ?>>
                          <label for="vform-panel-field-confirmations-1-message">Confirmation Message</label>
                          <?php
                          if($vfm_confimation=='message'){
                            $vfm_formmsg = stripslashes($vfm_confimation_value);
                            $vfm_vl = html_entity_decode($vfm_formmsg);
                          }
                          $contentvformeditor=$vfm_vl; 
                          wp_editor( $contentvformeditor , 'vformtextarea', $settings = array('textarea_name'=>'myvformtextarea','editor_height' => 100) ); ?>
                        </div>

                        <div id="vform-panel-field2" class="vform-panel-field  vform-panel-field-select"
                          <?php echo $vfm_confimation!='page' ? 'style="display:none;"':''; ?>>
                          <label for="vform-panel-field-confirmations-1-page">Confirmation Page</label>
                          <select id="vform-panel-field-confirmations-1-page" name="settings[confirmations][1][page]"
                            class="vform-panel-field-confirmations-page">

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
                          if($vfm_confimation=='redirect' || $vfm_confimation=='redirect_2'){
                            $vfm_vl3 = $vfm_confimation_value;
                          }
                        ?>
                        <div id="vform-panel-field3" class="vform-panel-field  vform-panel-field-text"
                          <?php echo ($vfm_confimation!='redirect' && $vfm_confimation!='redirect_2') ? 'style="display:none;"':''; ?>>
                          <label for="vform-panel-field-confirmations-1-redirect">Confirmation Redirect URL</label>
                          <input type="text" id="vform-panel-field-confirmations-1-redirect"
                            name="settings[confirmations][1][redirect]" value="<?php echo esc_html_e($vfm_vl3,'vform'); ?>"
                            placeholder="Example: https://example.com/newpage" class="inpt vform-panel-field-confirmations-redirect">
                        </div>


                      </div>
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>

  </div>

  <div class="modules-contentvf" data-id="4">



      <div>

        <h2 class="css-18cy5i1 css-1m3mpn4-Text" data-zds="true">Integrations</h2>



        <div class="css-1u3f5ze">

          <div class="css-g3razn active">
            <div class="css-8ei2ja"><span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                class="css-1i2f4ge-Icon--miscBoltAltFill--animate--24x24--BrandOrange"><svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" size="24"
                  color="BrandOrange" name="miscBoltAltFill">
                  <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                </svg></span></div>
            <div class="css-veo0af"><span class="css-48jybu">Email Notification</span><span class="css-okrdsg css-1kp0zmh-Text"
                data-zds="true">Active</span></div>
          </div>
         
          <div class="css-g3razn active">
            <div class="css-8ei2ja"><span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                class="css-1i2f4ge-Icon--miscBoltAltFill--animate--24x24--BrandOrange"><svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" size="24"
                  color="BrandOrange" name="miscBoltAltFill">
                  <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                </svg></span></div>
            <div class="css-veo0af"><span class="css-48jybu">reCAPTCHA/hcaptcha</span><span class="css-okrdsg css-1kp0zmh-Text"
                data-zds="true">Active</span></div>
          </div>

          <div class="css-g3razn active">
            <div class="css-8ei2ja"><span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                class="css-1i2f4ge-Icon--miscBoltAltFill--animate--24x24--BrandOrange"><svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" size="24"
                  color="BrandOrange" name="miscBoltAltFill">
                  <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                </svg></span></div>
            <div class="css-veo0af"><span class="css-48jybu">File Upload</span><span class="css-okrdsg css-1kp0zmh-Text"
                data-zds="true">Active</span></div>
          </div>

          <div class="css-g3razn active">
            <div class="css-8ei2ja"><span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                class="css-1i2f4ge-Icon--miscBoltAltFill--animate--24x24--BrandOrange"><svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" size="24"
                  color="BrandOrange" name="miscBoltAltFill">
                  <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                </svg></span></div>
            <div class="css-veo0af"><span class="css-48jybu">Elementor</span><span class="css-okrdsg css-1kp0zmh-Text"
                data-zds="true">Active</span></div>
          </div>

          <div class="css-g3razn active">
            <div class="css-8ei2ja"><span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                class="css-1i2f4ge-Icon--miscBoltAltFill--animate--24x24--BrandOrange"><svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" size="24"
                  color="BrandOrange" name="miscBoltAltFill">
                  <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                </svg></span></div>
            <div class="css-veo0af"><span class="css-48jybu">Google Sheet</span><span class="css-okrdsg css-1kp0zmh-Text"
                data-zds="true">Active</span></div>
          </div>



   
  
        </div>













        <div class="css-1u3f5ze">

          <div class="css-g3razn">
            <div class="css-8ei2ja"><span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                class="css-1i2f4ge-Icon--miscBoltAltFill--animate--24x24--BrandOrange"><svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" size="24"
                  color="BrandOrange" name="miscBoltAltFill">
                  <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                </svg></span></div>
            <div class="css-veo0af"><span class="css-48jybu">Gmail</span><span class="css-okrdsg css-1kp0zmh-Text"
                data-zds="true">Upgrade To Pro</span></div>
          </div>
         
          <div class="css-g3razn">
            <div class="css-8ei2ja"><span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                class="css-1i2f4ge-Icon--miscBoltAltFill--animate--24x24--BrandOrange"><svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" size="24"
                  color="BrandOrange" name="miscBoltAltFill">
                  <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                </svg></span></div>
            <div class="css-veo0af"><span class="css-48jybu">Stripe</span><span class="css-okrdsg css-1kp0zmh-Text"
                data-zds="true">Upgrade To Pro</span></div>
          </div>

          <div class="css-g3razn">
            <div class="css-8ei2ja"><span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                class="css-1i2f4ge-Icon--miscBoltAltFill--animate--24x24--BrandOrange"><svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" size="24"
                  color="BrandOrange" name="miscBoltAltFill">
                  <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                </svg></span></div>
            <div class="css-veo0af"><span class="css-48jybu">Paypal</span><span class="css-okrdsg css-1kp0zmh-Text"
                data-zds="true">Upgrade To Pro</span></div>
          </div>

        
          <div class="css-g3razn">
            <div class="css-8ei2ja"><span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                class="css-1i2f4ge-Icon--miscBoltAltFill--animate--24x24--BrandOrange"><svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" size="24"
                  color="BrandOrange" name="miscBoltAltFill">
                  <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                </svg></span></div>
            <div class="css-veo0af"><span class="css-48jybu">Conditional Logic</span><span class="css-okrdsg css-1kp0zmh-Text"
                data-zds="true">Upgrade To Pro</span></div>
          </div>

          <div class="css-g3razn">
            <div class="css-8ei2ja"><span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                class="css-1i2f4ge-Icon--miscBoltAltFill--animate--24x24--BrandOrange"><svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" size="24"
                  color="BrandOrange" name="miscBoltAltFill">
                  <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                </svg></span></div>
            <div class="css-veo0af"><span class="css-48jybu">Zapier</span><span class="css-okrdsg css-1kp0zmh-Text"
                data-zds="true">Upgrade To Pro</span></div>
          </div>
  
        </div>

        <div class="css-1u3f5ze">


          <div class="css-g3razn">
            <div class="css-8ei2ja"><span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                class="css-1i2f4ge-Icon--miscBoltAltFill--animate--24x24--BrandOrange"><svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" size="24"
                  color="BrandOrange" name="miscBoltAltFill">
                  <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                </svg></span></div>
            <div class="css-veo0af"><span class="css-48jybu">Slack</span><span class="css-okrdsg css-1kp0zmh-Text"
                data-zds="true">Upgrade To Pro</span></div>
          </div>

         
          <div class="css-g3razn">
            <div class="css-8ei2ja"><span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                class="css-1i2f4ge-Icon--miscBoltAltFill--animate--24x24--BrandOrange"><svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" size="24"
                  color="BrandOrange" name="miscBoltAltFill">
                  <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                </svg></span></div>
            <div class="css-veo0af"><span class="css-48jybu">Geo location</span><span class="css-okrdsg css-1kp0zmh-Text"
                data-zds="true">Upgrade To Pro</span></div>
          </div>
          
          <div class="css-g3razn">
            <div class="css-8ei2ja"><span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                class="css-1i2f4ge-Icon--miscBoltAltFill--animate--24x24--BrandOrange"><svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" size="24"
                  color="BrandOrange" name="miscBoltAltFill">
                  <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                </svg></span></div>
            <div class="css-veo0af"><span class="css-48jybu">Multi Step Form</span><span class="css-okrdsg css-1kp0zmh-Text"
                data-zds="true">Upgrade To Pro</span></div>
          </div>


          <div class="css-g3razn">
            <div class="css-8ei2ja"><span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                class="css-1i2f4ge-Icon--miscBoltAltFill--animate--24x24--BrandOrange"><svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" size="24"
                  color="BrandOrange" name="miscBoltAltFill">
                  <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                </svg></span></div>
            <div class="css-veo0af"><span class="css-48jybu">Survey</span><span class="css-okrdsg css-1kp0zmh-Text"
                data-zds="true">Upgrade To Pro</span></div>
          </div>

          <div class="css-g3razn">
            <div class="css-8ei2ja"><span aria-hidden="true" data-testid="iconContainer" data-zds="true"
                class="css-1i2f4ge-Icon--miscBoltAltFill--animate--24x24--BrandOrange"><svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24" size="24"
                  color="BrandOrange" name="miscBoltAltFill">
                  <path fill="#2D2E2E" d="M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z"></path>
                </svg></span></div>
            <div class="css-veo0af"><span class="css-48jybu">Active Campaign</span><span class="css-okrdsg css-1kp0zmh-Text"
                data-zds="true">Upgrade To Pro</span></div>
          </div>
  
        </div>
        

      </div>

      <div class="css-1q091xc mertop">

          <div class="css-0">
            <div class="css-q919xu">
              <div class="css-ubhhzq"><span>
                  <h2 class="css-18cy5i1 css-72qqz6-Text" data-zds="true">Which integration do you want?</h2>
                  <form id="myvformdata9form">
                    <?php wp_nonce_field('myvformdata9','vfm-nonce9'); ?>
                  </form>
                  
                </span></div>
                <div class="css-e92bi9">
                  <div class="css-qc14rr">
                    
                      <input type="text" placeholder="" name="integrationrequest" id="integrationrequest">

                      <a href="javascript:void(0)" id="iwantintegration">Send</a>
                      <br>
                      <p class="thankssubm">Thanks your submission is received!</p>

                </div>
              </div>
            </div>
          </div>
      </div>


  </div>

  <div class="modules-contentvf" data-id="5">




      <div class="css-1q091xc">
          <div class="css-0">
            <div class="css-q919xu">
              <div class="css-ubhhzq"><span>
                  <h2 class="css-18cy5i1 css-72qqz6-Text" data-zds="true">Shortcode For Form <a href="https://wordpress.com/support/wordpress-editor/blocks/shortcode-block/"
                    target="_blank"><svg class="adjstsvg" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20"
                      viewBox="0 0 30 30">
                      <path
                        d="M15,3C8.373,3,3,8.373,3,15c0,6.627,5.373,12,12,12s12-5.373,12-12C27,8.373,21.627,3,15,3z M16,21h-2v-7h2V21z M15,11.5 c-0.828,0-1.5-0.672-1.5-1.5s0.672-1.5,1.5-1.5s1.5,0.672,1.5,1.5S15.828,11.5,15,11.5z">
                      </path>
                    </svg></a>
                  </h2>
                </span></div>
              <div class="css-e92bi9">
                <div class="css-qc14rr">

                <input type="text" class="vformembed" id="vformembed" value="[vform id=<?php echo $id; ?>]" readonly
                  style="user-select: none; cursor: not-allowed;">
                <button type="submit" class="button" id="copyembed">Copy</button>

                </div>
              </div>
            </div>
          </div>
      </div>

      <div class="css-1q091xc mertop">
          <div class="css-0">
            <div class="css-q919xu">
              <div class="css-ubhhzq"><span>
                  <h2 class="css-18cy5i1 css-72qqz6-Text" data-zds="true">Shortcode For User Detail on page <a href="javascript:void(0)" id="userpagehint"><svg class="adjstsvg"
                        xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" viewBox="0 0 30 30">
                        <path
                          d="M15,3C8.373,3,3,8.373,3,15c0,6.627,5.373,12,12,12s12-5.373,12-12C27,8.373,21.627,3,15,3z M16,21h-2v-7h2V21z M15,11.5 c-0.828,0-1.5-0.672-1.5-1.5s0.672-1.5,1.5-1.5s1.5,0.672,1.5,1.5S15.828,11.5,15,11.5z">
                        </path>
                      </svg></a>
                  </h2>
                </span></div>
              <div class="css-e92bi9">
                <div class="css-qc14rr">

                <input type="text" class="vformembed" id="vformembed2" value="[vform_userdetails]" readonly
                    style="user-select: none; cursor: not-allowed;">
                  <button type="submit" class="button" id="copyembed2">Copy</button>

                  <a href="https://youtu.be/8tmUAOXe-c0?si=0LaUjoowbudb6Atd"  class="vewdm" target="_blank">View Demo</a>


                </div>
              </div>
            </div>
          </div>
      </div>
        
      <script>
        document.getElementById("copyembed").addEventListener("click", function () {
          var input = document.getElementById('vformembed');
          input.select(); // Select the text in the input field
          document.execCommand("copy"); // Copy the selected text
        });


        document.getElementById("copyembed2").addEventListener("click", function () {
          var input = document.getElementById('vformembed2');
          input.select(); // Select the text in the input field
          document.execCommand("copy"); // Copy the selected text
        });
      </script>




  </div>

  <div class="modules-contentvf" data-id="6">

    <?php

      $id = intval($id); // Assuming id is an integer
      $query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
      $vfsec = $wpdb->get_results($wpdb->prepare($query, $id), OBJECT);


      // $vfsec = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform WHERE id = '{$id}'", OBJECT );
      foreach ( $vfsec as $key1=>$val1 ) {
        $sectype = $val1->security_type==null ? '1': $val1->security_type;
        $key1 = $val1->rec_site_key==null ? '': $val1->rec_site_key;
        $key2 = $val1->rec_secret_key==null ? '': $val1->rec_secret_key;
        $key11 = $val1->hcap_site_key==null ? '': $val1->hcap_site_key;
        $key22 = $val1->hcap_secret_key==null ? '': $val1->hcap_secret_key;
      }
    ?>


      <div class="css-1q091xc">
          <div class="css-0">
            <div class="css-q919xu">
              <div class="css-ubhhzq"><span>
                  <h2 class="css-18cy5i1 css-72qqz6-Text" data-zds="true">Security</h2>
                </span></div>
              <div class="css-e92bi9">
                <div class="css-qc14rr">

                                
                    <div>
                      <ul class="secure-ul">
                        <li class="<?php echo $sectype=='1' || null ? 'active': ''; ?> fr" data-id="1">
                          <img src="<?php echo VFORM_PLUGIN_URL; ?>/assets/images/g-cap.png">
                          reCAPTCHA
                        </li>
                        <li class="sec <?php echo $sectype=='2' ? 'active': ''; ?>" data-id="2">
                          <img src="<?php echo VFORM_PLUGIN_URL; ?>/assets/images/h-cap.png">
                          hcaptcha
                        </li>
                      </ul>
                    </div>


                 <!-- recaptcha -->
                    <div class="g-recapcont">

                        <form id="myvformdata13form">
                          <?php wp_nonce_field('myvformdata13','vfm-nonce13'); ?>
                        </form>

                        <div class="grec-description"
                          <?php echo $sectype=='1' || null ? 'style="display:block;"': 'style="display:none;"'; ?>>
                          <p class="re-main">reCAPTCHA Settings</p>
                          <p>VForms integrates with reCAPTCHA, a complimentary CAPTCHA service that employs an advanced risk analysis
                            engine and adaptive challenges to prevent automated software from engaging in abusive activities on your site.
                            These settings are required only if you decide to use the reCAPTCHA field. <a
                              href="https://www.google.com/recaptcha/admin/create" target="_blank">Get your reCAPTCHA Keys.</a>
                          </p>

                          <p style="color:red;">Note: Please use v2 site and secret key ("I'm not a robot" Checkbox)</p>

                          <div class="re-form">
                            <label for="">Site Key</label>
                            <input type="text" id="rec_site_key" value="<?php echo $key1; ?>">
                          </div>

                          <div class="re-form">
                            <label for="">Secret Key</label>
                            <input type="password" id="rec_secret_key" value="<?php echo $key2; ?>">
                          </div>
                        </div>



                        <div class="hrec-description" <?php echo $sectype=='2' ? 'style="display:block;"': 'style="display:none;"'; ?>>
                          <p class="re-main">hCaptcha Settings</p>
                          <p>VForms integrates with hCaptcha, a complimentary CAPTCHA service that employs an advanced risk analysis
                            engine and adaptive challenges to prevent automated software from engaging in abusive activities on your site.
                            These settings are required only if you decide to use the hCaptcha field. <a
                              href="https://dashboard.hcaptcha.com/sites/new" target="_blank">Get your hCaptcha Keys.</a>
                          </p>

                          <div class="re-form">
                            <label for="">Site Key</label>
                            <input type="text" id="hcap_site_key" value="<?php echo $key11; ?>">
                          </div>

                          <div class="re-form">
                            <label for="">Secret Key</label>
                            <input type="password" id="hcap_secret_key" value="<?php echo $key22; ?>">
                          </div>
                        </div>



                        <input type="hidden" name="whichsecurity" value="<?php echo $sectype; ?>">
                        <button class="g-saveform">Save Settings</button>
                    </div>


                </div>
              </div>
            </div>
          </div>
      </div>

      
  </div>
    
  <!-- 7 -->
  <div class="modules-contentvf" data-id="7">

    <!-- start -->
    <div class="css-1q091xc">
      <div class="css-0">
            <div class="css-q919xu">
              <div class="css-ubhhzq">
                <span>
                  <h2 class="css-18cy5i1 css-72qqz6-Text" data-zds="true">Conditional Logic</h2>
                </span>
              </div>

              <div class="css-e92bi9">

                  <div id="logic-container2">
                      <button id="add-logic-group">Add New Logic Group</button>

                      <div class="upgradenotice">
                          <button id="save-logic">Save Logic</button>
                      </div>
                  </div>
                  
            </div>

          </div>


          <!-- end -->
            
          <script>
              jQuery(function ($) {
                $(document).ready(function () {
                  const logicContainer = $("#logic-container");

                  // Function to toggle logic-combination visibility for a condition group
                  function toggleLogicCombination(logicGroup) {
                    const conditionGroups = logicGroup.find(".condition-group");
                    if (conditionGroups.length <= 1) {
                      logicGroup.find(".logic-combination").hide();
                    } else {
                      logicGroup.find(".logic-combination").show();
                    }
                  }

                  // Add a new conditional logic group
                  $("#add-logic-group").click(function () {
                    const newLogicGroup = `
                      <div class="logic-group">
                        <h3>Conditional Logic Group</h3>
                        <input name="logic_name" type="text" placeholder="Logic Group Name">
                        <div class="condition-group-container"></div>
                        <button class="add-condition">Add Condition</button>
                        <label>Actions:</label>
                        <table class="kb-logic-field-table">
                          <thead>
                            <tr>
                              <th>Field</th>
                              <th>Hide</th>
                            </tr>
                          </thead>
                          <tbody>
                          `+getfieldhide()+`
                          </tbody>
                        </table>
                        <button class="remove-logic-group">Remove Logic Group</button>
                      </div>`;
                    logicContainer.append(newLogicGroup);
                  });

                  // Add a new condition to a logic group
                  $(document).on("click", ".add-condition", function () {
                    const logicGroup = $(this).closest(".logic-group");
                    const newCondition = `
                      <div class="condition-group">
                        <select class="mylogicfield">
                          <option>Select Field</option>
                          `+getselectfields()+`
                        </select>
                        <select class="condition-operator">
                          <option>Select State</option>
                          <option value="equals">Is equal to</option>
                          <option value="not_equals">Is not equal to</option>
                          <option value="contains">Contains</option>
                          <option value="not_contains">Does not contain</option>
                        </select>
                        <input name="condition_value" type="text"  placeholder="Type a value">
                        <select class="logic-combination">
                          <option value="and">AND</option>
                          <option value="or">OR</option>
                        </select>
                        <button class="remove-condition">Remove</button>
                      </div>`;
                    logicGroup.find(".condition-group-container").append(newCondition);
                    toggleLogicCombination(logicGroup);
                  });

                  // Remove a condition
                  $(document).on("click", ".remove-condition", function () {
                    const logicGroup = $(this).closest(".logic-group");
                    $(this).closest(".condition-group").remove();
                    toggleLogicCombination(logicGroup);
                  });

                  // Remove a logic group
                  $(document).on("click", ".remove-logic-group", function () {
                    $(this).closest(".logic-group").remove();
                  });

                  // Save logic
                  // $("#save-logic").click(function () {
                  //   const logicGroups = [];
                  //   const formId = $("#vfromid").val();
                  //   $(".logic-group").each(function () {
                  //     const logicName = $(this).find("input[name='logic_name']").val();
                  //     const conditions = [];
                  //     $(this)
                  //       .find(".condition-group")
                  //       .each(function () {
                  //         const field = $(this).find(".mylogicfield").val();
                  //         const operator = $(this).find(".condition-operator").val();
                  //         const value = $(this).find("input[name='condition_value']").val();
                  //         const combination = $(this).find(".logic-combination").val();
                  //         conditions.push({ field, operator, value, combination });
                  //       });
                  //     const hiddenFields = [];
                  //     $(this)
                  //       .find(".kb-logic-field-table tbody input[type='checkbox']:checked")
                  //       .each(function () {
                  //         hiddenFields.push($(this).data("field"));
                  //       });
                  //     logicGroups.push({ logicName, conditions, hiddenFields });
                  //   });

                  //   // console.log(logicGroups);
                  //   // AJAX request to save the logic groups
                  //   $.post(ajax_object, {
                  //     action: "save_field_logic_groups",
                  //     form_id: formId,
                  //     logic_groups: JSON.stringify(logicGroups),
                  //   }).done(function (response) {
                  //     // console.log(response.message);
                  //   });

                  // });



                  function getselectfields(){
                    var seloptin = '';
                        $(".vform-group").each(function(){
                            var firstElementWithName = $(this).find('[name]').first();
                            var getprid = $(this).data('batchid');
                            var strfrm = $(this).data('type');
                            var labletext = $(this).children('label').text();
                            labletext = labletext.replace('*','');
                            if(strfrm!='' && strfrm!=undefined && strfrm!='submit'){
                              // console.log(strfrm);
                              // console.log(getprid);
                              // console.log(firstElementWithName);
                              // console.log(labletext);
                              var getfull = $(firstElementWithName).attr('name');
                              seloptin+= "<option value='"+getfull+"'>"+labletext+"</option>";
                            }
                        });
                        return seloptin;
                  }

                  function getfieldhide(){
                    var seloptin = '';
                        $(".vform-group").each(function(){
                          var firstElementWithName = $(this).find('[name]').first();
                          var getprid = $(this).data('batchid');
                            var strfrm = $(this).data('type');
                            var labletext = $(this).children('label').text();
                            labletext = labletext.replace('*','');
                            if(strfrm!='' && strfrm!=undefined && strfrm!='submit'){
                              seloptin+= "<tr><td>"+labletext+"</td><td><input type='checkbox' data-field='vform-group-vform"+getprid+"'></td></tr>";
                            }              
                        });
                        return seloptin;
                  }


                });
              });
          </script>

      </div>

      <div class="css-0">
        <div id="logic-container"></div>
      </div>

    </div>
    
  </div>
  <!-- 7 -->

  <!-- 8 -->
  <div class="modules-contentvf" data-id="8">

    <!-- start -->
    <div class="css-1q091xc">
      <div class="css-0">
            <div class="css-q919xu">
              <div class="css-ubhhzq">
                <span>
                  <h2 class="css-18cy5i1 css-72qqz6-Text" data-zds="true">Collect Payments Via Stripe or Paypal</h2>
                </span>
              </div>

              <div class="css-e92bi9">

                  <div id="logic-container2">
                      <button id="add-logic-group" style="opacity:0;">sa</button>

                      <div class="upgradenotice">
                          <button id="save-logic">Add Payment Gateway</button>
                      </div>
                  </div>
                  
            </div>

          </div>


          <!-- end -->
      

      </div>

      <div class="css-0">
        <div id="logic-container"></div>
      </div>

    </div>
    
  </div>
  <!-- 8 -->

  <!-- 9 -->
  <div class="modules-contentvf" data-id="9">

    <div class="css-1q091xc" style="grid-template-columns: auto;">
        <div class="css-0">
          <div class="css-q919xu">
            <div class="css-ubhhzq"><span>
                <h2 class="css-18cy5i1 css-72qqz6-Text" data-zds="true">Google Sheet</h2>
              </span></div>
            <div class="css-e92bi9">
              <div class="css-qc14rr">

              
              <?php

                $id = intval($id); // Assuming id is an integer
                $query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
                $vfsec = $wpdb->get_results($wpdb->prepare($query, $id), OBJECT);


                foreach ( $vfsec as $key1=>$val1 ) {
                  $key = $val1->google_sheet=='' ? '': $val1->google_sheet;
                }
                ?>

                  <div class="widefat">

                        <form id="myvformdata133form">
                          <?php wp_nonce_field('myvformdata133','vfm-nonce133'); ?>
                        </form>

                      <div class="grec-description">
                        <p class="re-main">Google Sheet Settings</p>
                        <p>Please check the video before processing.</p>
                        <a href="https://youtu.be/XZIriOPAaqc" target="_blank">Watch the video</a><br>
                        <a href="<?php echo VFORM_PLUGIN_URL; ?>/assets/js/google_app_script_code_vform.txt" download>Download Your Script</a>

                        <div class="re-form">
                          <label for="">Google Apps Script Url</label>
                          <input type="text" id="google_apps_script" value="<?php echo $key; ?>">
                        </div>

                      </div>


                      <button class="gapps-saveform">Save Settings</button>
                  </div>


              </div>
            </div>
          </div>
        </div>
    </div>

    
  </div>
  <!-- 9 -->


<style>

  #logic-container2 {
      padding: 20px;
  }
  /* Logic group container */
  .logic-group {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .logic-group h3 {
    font-size: 18px;
    color: #444;
    margin-bottom: 10px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 5px;
  }

  /* Input fields */
  #logic-container input[type="text"], #logic-container input[type="number"],#logic-container select {
    width: calc(100% - 20px);
    padding: 8px 10px;
    margin: 5px 0 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
  }

  /* Table styling */
  .kb-logic-field-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
  }

  .kb-logic-field-table th,
  .kb-logic-field-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  .kb-logic-field-table th {
    background-color: #f4f4f4;
    color: #555;
  }

  /* Buttons */
  #logic-container button, #logic-container2 button {
    display: inline-block;
    padding: 8px 15px;
    font-size: 14px;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
  }

  #logic-container button:hover, #logic-container2 button:hover {
    background-color: #0056b3;
  }

  #logic-container button.remove-condition,
  #logic-container button.remove-logic-group {
    background-color: #dc3545;
  }

  #logic-container button.remove-condition:hover,
  #logic-container button.remove-logic-group:hover {
    background-color: #b52a37;
  }

  /* Add new logic group button */
  #add-logic-group {
    background-color: #28a745;
  }

  #add-logic-group:hover {
    background-color: #218838;
  }

  /* Add condition button */
  .add-condition {
    background-color: #17a2b8;
  }

  .add-condition:hover {
    background-color: #117a8b;
  }

  /* Condition group styling */
  .condition-group {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    margin-bottom: 10px;
    padding: 10px;
    background-color: #f9f9f9;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
  }

  .condition-group select,
  .condition-group input[type="text"] {
    margin-right: 10px;
    flex: 1;
    min-width: 150px;
  }

  .condition-group .logic-combination {
    margin-left: 10px;
    flex: 0 0 auto;
    display: none; /* Initially hidden */
  }

  .condition-group .remove-condition {
    flex: 0 0 auto;
  }

  /* Logic combination styling */
  .logic-combination {
    margin-top: 10px;
    font-weight: bold;
    color: #444;
  }
  #save-logic{    
    cursor: no-drop;
    opacity: 0.5;
    user-select: none;
  }
  .upgradenotice {
    width: 100%;
    height: 200px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    filter: blur(2px);
  }

  #logic-container2::before {
      content: 'Upgrade To Pro';
      position: absolute;
      top: 232px;
      font-weight: bold;
      left: 184px;
      text-transform: uppercase;
      font-size: 17px;
  }

</style>
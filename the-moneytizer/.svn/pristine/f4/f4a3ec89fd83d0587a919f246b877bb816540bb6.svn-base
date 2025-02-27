<div class="accordion" id="accordion_menu_tags">
    <div class="accordion-item">
        <h2 class="accordion-header" id="menu_tags">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_menu_tags" aria-expanded="true" aria-controls="collapse_menu_tags">
          <i class="bi bi-card-heading"></i>&nbsp;<?php _e('Mes formats','themoneytizer');?>
        </button>
        </h2>
        <div id="collapse_menu_tags" class="accordion-collapse collapse" aria-labelledby="menu_tags" data-bs-parent="#accordion_menu_tags">
            <div class="accordion-body">
            <h5 id="el-intro-2"><?php _e('Formats publicitaires','themoneytizer');?></h5>
            

            <div class="modal fade" id="shortcodeModal" tabindex="-1" role="dialog" aria-labelledby="shortcodeModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="text-align: left;" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5><?php _e('TRANSLATION_TAGS_SHORTCODE_MODAL_TITLE','themoneytizer');?><br/></h5>
                    <button type="button" class="close btn-close-m" data-dismiss="modal" aria-label="Close" onClick="jQuery_money('#shortcodeModal').modal('toggle')"></button>
                  </div>
                  <div class="modal-body">
                    <video controls>
                      <?php $mediaName = __('TRANSLATION_TAGS_SHORTCODE_MODAL_LINK', 'themoneytizer'); ?>
                      <source src="<?php echo plugins_url( '../media/'.$mediaName, __FILE__ ) ?>" type="video/mp4"></source></video>
                  </div>
                </div>
              </div>
            </div>


                <?php include('inc/inc_lazy_setup.php'); ?>
                <form class="tags_form" action='options-general.php?page=themoneytizer' method='post'>
                  <input hidden name="themoneytizer_setting_tags"/>
                    <table id="intro-el-2" class="table">
                        <thead>
                            <tr>
                                <td class="td_medium"><?php _e('Format','themoneytizer');?></td>
                                <td class="td_medium"><?php _e('Action','themoneytizer');?></td>
                                <td class="td_small"><?php _e('Activation Automatique','themoneytizer');?></td>
                                <td class="td_small"><?php _e('Lazy-loading', 'themoneytizer'); ?></td>
                                <td class="td_big"><?php _e('Shortcode et tags','themoneytizer');?></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                          $spaces = json_decode(get_option('themoneytizer_setting_formats'));
                          $spaces_off = json_decode(get_option('themoneytizer_setting_formats_off'));
                          $data_lazy = (array)json_decode(get_option('themoneytizer_data_lazy'));
                          if(gettype($data_lazy)!='array'){
                            $data_lazy = [];
                          }

                          $data_auto = (array)json_decode(get_option('themoneytizer_data_auto'));
                          if(gettype($data_auto)!='array'){
                            $data_auto = [];
                          }

                          $arr_rec_skin = array();
                          $form_state_skin_reco = array('SKIN' => array(), 'RECO' => array());
                          $displayed_formats = array();

                          if (get_option('themoneytizer_site_reason_refus') != 'adcash') {
                            foreach ($spaces as $format) {
                              if(in_array($format->ad_id, TAG_ONLY_ADCASH)){
                                continue;
                              }
                              if(in_array($format->ad_id, TAG_INACTIVE_FORMAT)){
                                  continue;
                              }
                              $format->disabled = null;
                              include('inc/inc_generic_tags.php');
                            }

                            foreach ($spaces_off as $format) {
                              if(in_array($format->ad_id, TAG_ONLY_ADCASH)){
                                continue;
                              }
                              if(in_array($format->ad_id, TAG_INACTIVE_FORMAT)){
                                  continue;
                              }
                              $format->disabled = null;
                              if(isset($data_lazy[$format->ad_id])&&$data_lazy[$format->ad_id]->status != 'false'){
                                include('inc/inc_off_tags.php');
                              } elseif(isset($data_auto[$format->ad_id]->status) && $data_auto[$format->ad_id]->status == 'true'){
                                include('inc/inc_off_tags.php');
                              }
                            }
                          } else {
                            foreach ($spaces as $format) {
                              if(!in_array($format->ad_id, TAG_ADCASH_FORMAT)){
                                  continue;
                              }
                              $format->disabled = null;
                              include('inc/inc_generic_tags.php');
                            }

                            foreach ($spaces_off as $format) {
                              if(!in_array($format->ad_id, TAG_ADCASH_FORMAT)){
                                  continue;
                              }
                              $format->disabled = null;
                              if(isset($data_lazy[$format->ad_id])&&$data_lazy[$format->ad_id]->status != 'false'){
                                include('inc/inc_off_tags.php');
                              } elseif(isset($data_auto[$format->ad_id]->status) && $data_auto[$format->ad_id]->status == 'true'){
                                include('inc/inc_off_tags.php');
                              }
                            }
                          }
                          ?>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>
</div>
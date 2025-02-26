<?php 
 if( ! class_exists( 'AFAQCBC_q_a_faq_General_Options_Metabox' ) ) {
	class AFAQCBC_q_a_faq_General_Options_Metabox {

		public function __construct() {
			if ( is_admin() ) {
				$this->init_metabox();
			}
		}

		public function init_metabox() {
			add_action( 'faqs_add_form_fields',     array( $this, 'render_metabox' ), 10, 2 );
            add_action( 'faqs_edit_form_fields',    array( $this, 'render_metabox' ), 10, 2 );
            add_action( 'edited_faqs',              array( $this, 'save_metabox' ), 10, 2 );
            add_action( 'create_faqs',              array( $this, 'save_metabox' ), 10, 2 );
		}


/*
* خقول الإعدادات العامه عند اضافة فاق جديد
*/
		public function render_metabox( $post ) {
            add_action('admin_footer', array($this,'faq_assets'));
            add_action( 'admin_footer',          array( $this, 'Setting_field_js' )      );
			// Add nonce for security and authentication.


            $c = new AFAQCBC_q_a_faq_controls_class();
			?>

            <tr >
            	<td colspan="2">
                    <table class="puplicseteng">
                    	<tr>
                    		<th colspan="2">
                                <?php wp_nonce_field( 'nameFAQ_Action', 'nameFAQ_Action' ); ?>
                                <?php echo esc_html__('General Options', 'advanced-faq-creator-by-category');?>
                            </th>
                        </tr>

                        <tr>
                            <td width="300">
                                <?php $c->add_label('Number Of Columns Per Row ','Number_Of_Columns_Per_Row');?>
                            </td>
                            <td>
                                <?php
                                    $options_array = array(array(12,1),array(6,2),array(4,3));
                                    $default_value = '1';
                                    $c->add_dropdown('Number_Of_Columns_Per_Row', $options_array, $default_value);?>
                            </td>
                        </tr>

                        <tr>
                            <td width="300">
                                <?php $c->add_label('On Select Question ','On_Select_Question');?>
                            </td>
                            <td>
                                <?php
                                    $options_array = array(array(1,'Close previous'),array(2,'Keep previous'));
                                    $default_value = '1';
                                    $c->add_dropdown('On_Select_Question', $options_array, $default_value);?>
                            </td>
                        </tr>


                        <tr class="tr_content_modal">
                            <td  colspan="2">
                                <?php $c->add_label_for_modal('Main Container style','Main_Container_Options');?>

                                <?php $value = ''?>
                                <?php $c->add_hidden_input('Main_Container_Options',$value);?>
                                <a class="modal_css_icon" onclick="openModal('Main_Container_Options',new Array('margin','padding','text_animation','border','border-style_contener','text_border-color','box-shadow','text_background-color'),'General Options'); "><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr>
                        <tr >
                            <td >
                                <?php $c->add_label('Question Default  Status','Question_Default_Status');?>
                            </td>
                            <td>
                                <?php
                                $options_array = array(array('','select'),array(1,'Collapsed'),array(2,'Opened'));
                                $default_value = '';
                                $c->add_dropdown('Question_Default_Status', $options_array, $default_value);?>
                            </td>
                        </tr>
                        <tr>
                            <td >
                                <?php $c->add_label('Order By','faqs_Order_By_Post');?>
                            </td>
                            <td>
                                <?php
                                $options_array = array(array('ID','Post ID'),array('Date','Date'),array('Title','Title'));
                                $default_value = 'ID';
                                $c->add_dropdown('faqs_Order_By_Post', $options_array, $default_value);?>
                            </td>
                        </tr>
                        <tr>
                            <td >
                                <?php $c->add_label('Question Default  Status','faqs_Order_Post');?>
                            </td>
                            <td>
                                <?php
                                $options_array = array(array('DESC','Descending'),array('ASC','Ascending'));
                                $default_value = 'DESC';
                                $c->add_dropdown('faqs_Order_Post', $options_array, $default_value);?>
                            </td>
                        </tr>

                    </table>

                </td>
            </tr>

            <?php

		}
/*
* حفظ جميع الحقول في الداتا بيز الحقول طبعا الخاصه بالفاق
*/
		public function save_metabox( $term_id ) {
			
            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return;
            }
			
            if ( ! isset( $_POST['nameFAQ_Action'] ) || ! wp_verify_nonce( $_POST['nameFAQ_Action'], 'nameFAQ_Action' )) {
                echo esc_html__('Sorry, your nonce did not verify.','advanced-faq-creator-by-category');
                exit;
            }

            $faqs_array = array();
            if(!empty($_POST)){
						$faqs_array['AFAQCBC_collapse_full_data'] = $this->sanitize_text_or_array_field($_POST['AFAQCBC_collapse_full_data']);
						$faqs_array['AFAQCBC_normal_links_data'] = $this->sanitize_text_or_array_field($_POST['AFAQCBC_normal_links_data']);
						$faqs_array['AFAQCBC_collapse_2_col_data'] = $this->sanitize_text_or_array_field($_POST['AFAQCBC_collapse_2_col_data']);
						$faqs_array['Number_Of_Columns_Per_Row'] = $this->sanitize_text_or_array_field($_POST['Number_Of_Columns_Per_Row']);
						$faqs_array['On_Select_Question'] = $this->sanitize_text_or_array_field($_POST['On_Select_Question']);
						$faqs_array['Question_Default_Status'] = $this->sanitize_text_or_array_field($_POST['Question_Default_Status']);
						$faqs_array['faqs_Order_By_Post'] = $this->sanitize_text_or_array_field($_POST['faqs_Order_By_Post']);
						$faqs_array['faqs_Order_Post'] = $this->sanitize_text_or_array_field($_POST['faqs_Order_Post']);
						$faqs_array['faq_question_iconVisibility'] = $this->sanitize_text_or_array_field($_POST['question_like_icon']);
						$faqs_array['question_like_icon'] = $this->sanitize_text_or_array_field($_POST['']);
						$faqs_array['question_dislike_icon'] = $this->sanitize_text_or_array_field($_POST['question_dislike_icon']);
						$faqs_array['searchVisibility'] = $this->sanitize_text_or_array_field($_POST['searchVisibility']);
						$faqs_array['category_iconVisibility'] = $this->sanitize_text_or_array_field($_POST['category_iconVisibility']);
						$faqs_array['question_description_Visibility'] = $this->sanitize_text_or_array_field($_POST['question_description_Visibility']);
						$faqs_array['short_description_length'] = $this->sanitize_text_or_array_field($_POST['short_description_length']);
						$faqs_array['read_more_link'] = $this->sanitize_text_or_array_field($_POST['read_more_link']);
						$faqs_array['question_iconVisibility'] = $this->sanitize_text_or_array_field($_POST['question_iconVisibility']);
						$faqs_array['faq_custom_css'] = $this->sanitize_text_or_array_field($_POST['faq_custom_css']);
					

                // require template sitting
                $directory_of_templates = dir(AFAQCBC_PLUGIN_DIR.'templates');
                while (false !== ($entry = $directory_of_templates->read()))
                {
                    if (($entry != '.') && ($entry != '..')){
                        $faqs_array[$entry."_data"] = '';
                    }
                }

                $directory_of_templates->close();
            }
            $json_from_array = array('Main_Container_Options','search_box','search_label','search_input','search_button','category_container_options','category_title_options','category_icon_options','category_image_options','question_active_header_options','question_style','question_inactive_header_options','question_title_options','question_icon_options','question_question_options','question_dislike_icon_options','question_like_icon_options');
            foreach ($json_from_array as $e){
				try{
					$faqs_array[$e] = $this->sanitize_text_or_array_field((array)json_decode(stripslashes_deep($_POST[$e])));
				}catch(Exception $e){
					$faqs_array[$e] =array();
				} 
			}
            $faqs_array = $this->sanitize_text_or_array_field($faqs_array);
            if(!update_term_meta( $term_id, 'faqs_array', $faqs_array )){
                add_term_meta ($term_id, 'faqs_array', $faqs_array, true);
            }
        }
		/*
* sanitize for the post from filed 
*/
        function sanitize_text_or_array_field($array_or_string){
            if( is_string($array_or_string) ){
                $array_or_string = sanitize_text_field($array_or_string);
            }elseif( is_array($array_or_string) ){
                foreach ( $array_or_string as $key => &$value ) {
                    if ( is_array( $value ) ) {
                        $value = $this->sanitize_text_or_array_field($value);
                    }else {
                        $value = sanitize_text_field( $value );
                    }
                }
            }

            return $array_or_string;
        }
		/*
* ملفات الستايل الخاص بصفحة الفاق
*/
        public function faq_assets() {

            wp_register_style('font-awesome.min', AFAQCBC_PLUGIN_URL.'/assets/css/font-awesome.min.css');
            wp_enqueue_style('font-awesome.min');

            wp_register_style('bootstrap-min', AFAQCBC_PLUGIN_URL.'/assets/css/bootstrap.min.css');
            wp_enqueue_style('bootstrap-min');

            wp_register_script('bootstrap', AFAQCBC_PLUGIN_URL.'/assets/js/bootstrap.js');
            wp_enqueue_script('bootstrap');
            wp_register_script('faq-faqOption', AFAQCBC_PLUGIN_URL.'/assets/js/faqOption.js',array('jquery'));
            wp_enqueue_script('faq-faqOption');
            wp_register_script('bootstrap-select-min', AFAQCBC_PLUGIN_URL.'/control/js/bootstrap-select.min.js');
            wp_enqueue_script('bootstrap-select-min');
        }
				/*
* كواد الجافا سكربت الخاصه بالصفحه )الفاق)
*/
		public function Setting_field_js() {

			if ( did_action( 'faq_Metabox_Setting_General_Options_js' ) >= 1 ) {
				return;
			}

			?>
			<script type="text/javascript">
			"use strict";
				function TitleSize(vol) {
					"use strict";
					if(vol == 0){
					    document.querySelector('#TitleSizeV').value = "Inherit";
					}else{
					    document.querySelector('#TitleSizeV').value = vol + "px";
					}
				}
				function Icon_question_size(vol) {
					"use strict";
					if(vol == 0){
					    document.querySelector('#Icon_question_sizeV').value = "Inherit";
					}else{
					    document.querySelector('#Icon_question_sizeV').value = vol + "px";
					}
					
				}
				function Icon_category_size(vol) {
					"use strict";
					if(vol == 0){
					    document.querySelector('#Icon_category_sizeV').value = "Inherit";
					}else{
					    document.querySelector('#Icon_category_sizeV').value = vol + "px";
					}
					
				}
				function catTitleSize(vol) {
					"use strict";
					if(vol == 0){
					    document.querySelector('#Icon_category_sizeV').value = "Inherit";
					}else{
					    document.querySelector('#catTitleSizeV').value = vol + "px";
					}
					
				}
				function ParagraphSize(vol) {
					"use strict";
					if(vol == 0){
					    document.querySelector('#ParagraphSizeV').value = "Inherit";
					}else{
					    document.querySelector('#ParagraphSizeV').value = vol + "px";
					}
					
				}

                function formatText (icon) {
					"use strict";
                    return jQuery('<span><i class="' + icon.text + '"></i> ' + icon.text + '</span>');
                };

                jQuery('.select2-icon-like').select2({

                    templateSelection: formatText,
                    templateResult: formatText
                });
                jQuery('.select2-icon-dislike').select2({

                    templateSelection: formatText,
                    templateResult: formatText
                });
			</script>
			
			<?php
			do_action( 'faq_Metabox_Setting_General_Options_js', $this );
		}

	}

	new AFAQCBC_q_a_faq_General_Options_Metabox();
 }
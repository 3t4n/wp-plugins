<?php 
 if( ! class_exists( 'AFAQCBC_q_a_faq_question_options_Metabox' ) ) {
	class AFAQCBC_q_a_faq_question_options_Metabox {

		public function __construct() {
			if ( is_admin() ) {
				$this->init_metabox();
			}
		}

		public function init_metabox() {
			add_action( 'faqs_add_form_fields',     array( $this, 'render_metabox' ), 10, 2 );
            add_action( 'faqs_edit_form_fields',    array( $this, 'render_metabox' ), 10, 2 );
		}

		/*
* في صفحة إذافة فاق جديده يتم تكوين منطقه لخيارات السؤال وهذا الكود الاتش تي ام ال الخاص بها
*/

		public function render_metabox( $post ) {
            $c = new AFAQCBC_q_a_faq_controls_class();
			?>

            <tr >
            	<td colspan="2">
                    <table class="puplicseteng">
                    	<tr>
                    		<th colspan="2">
                             <?php echo esc_html__('Question Options', 'advanced-faq-creator-by-category');?>
                            </th>
                        </tr>
                        <tr  class="tr_content_modal">
                            <td colspan="2">
                               <?php $c->add_label_for_modal('Normal Header style','question_style');?>

                                <?php $value = '';?>
                                <?php $c->add_hidden_input('question_style',$value);?>
                                <a class="modal_css_icon" onclick="openModal('question_style',new Array('margin','padding','border','border-style_contener','text_border-color','text_box-shadow', 'background_hover_color','text_hover_color'),'Question style');"><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr>
						<tr  class="tr_content_modal">
                            <td colspan="2">
                               <?php $c->add_label_for_modal('Active Header Container style','question_active_header_options');?>

                                <?php $value = '';?>
                                <?php $c->add_hidden_input('question_active_header_options',$value);?>
                                <a class="modal_css_icon" onclick="openModal('question_active_header_options',new Array('margin','padding','border','border-style_contener','text_border-color','text_box-shadow' , 'background_hover_color','text_hover_color'),'Active Header Options');"><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr>

                        <tr  class="tr_content_modal">
                            <td colspan="2">
                                <?php $c->add_label_for_modal('Title style','question_title_options');?>

                                <?php $value = '';?>
                                <?php $c->add_hidden_input('question_title_options',$value);?>
                                <a class="modal_css_icon" onclick="openModal('question_title_options',new Array('text_background-color','margin','padding','text_box-shadow','text_font-size','text_color','text_hover_color','text_font-weight','text_cursor'),'Question title options');"><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr>
						
                        <tr>
                            <td>
                                <?php $c->add_label('Description length','question_description_Visibility');?>
                            </td>
                            <td>
                                <?php
                                $options_array = array(array(1,'Full'),array(2,'Short'));
                                $default_value = '1';
                                $c->add_dropdown('question_description_Visibility', $options_array, $default_value);?>
                            </td>
                        </tr>
                        <tr class="question_description_Visibility">
                            <td>
                                <?php $c->add_label('Short description length','short_description_length');?>
                            </td>
                            <td>
                                <?php $c->input_text('short_description_length','');?>
                            </td>
                        </tr>
                        <tr class="question_description_Visibility">
                            <td>
                                <?php $c->add_label('Read more Text','read_more_link');?>
                            </td>
                            <td>
                                <?php $c->input_text('read_more_link','');?>
                            </td>
                        </tr>
                        <tr   class="tr_content_modal">
                            <td colspan="2">
                                <?php $c->add_label_for_modal('Description style','question_question_options');?>

                                <?php $value = '';?>
                                <?php $c->add_hidden_input('question_question_options',$value);?>
                                <a class="modal_css_icon" onclick="openModal('question_question_options',new Array('text_font-size','text_color','text_font-weight','margin','padding','border','border-style_contener','text_border-color','shadow_options'),'Question title options');"><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr>
						
						<tr>
                            <td width="300">
                                <?php $c->add_label('Icon visibility','question_iconVisibility');?>
                            </td>
                            <td>
                                <?php
                                $options_array = array(array(1,'Show'),array(2,'Hide'));
                                $default_value = '1';
                                $c->add_dropdown('question_iconVisibility', $options_array, $default_value);?>
                            </td>
                        </tr>
                        <tr class="question_iconVisibility">
                            <td width="300">
                                <?php $c->add_label('Icon style','question_icon_options');?>
                            </td>
                            <td>
                                <?php $value = '';?>
                                <?php $c->add_hidden_input('question_icon_options',$value);?>
                                <a class="modal_css_icon" onclick="openModal('question_icon_options',new Array('text_font-size','text_color'),'Question icon options');"><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr>







                        </tr>

                    </table>

                </td>
            </tr>

            <?php

		}

	}

	new AFAQCBC_q_a_faq_question_options_Metabox();
 }
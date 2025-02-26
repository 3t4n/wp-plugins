<?php 
 if( ! class_exists( 'AFAQCBC_q_a_faq_search_options_Metabox' ) ) {
	 		/*
* خيارات البحث في الفاق
*/
	class AFAQCBC_q_a_faq_search_options_Metabox {

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
* المنطقة في صفحة اضافة او تعديل فاق لخيارات البحث في تيمبليت الفاق
*/
		public function render_metabox( $post ) {

			$c = new AFAQCBC_q_a_faq_controls_class();
			?>

            <tr >
            	<td colspan="2">
                    <table class="puplicseteng">
                    	<tr>
                    		<th colspan="2">
                                <?php echo esc_html__('Search Box', 'advanced-faq-creator-by-category');?>
                            </th>

                        </tr>
						<tr >
                            <td width="300">
                                <?php $c->add_label('visibility','searchVisibility');?>
                            </td>
                            <td>
                                <?php
                                    $options_array = array(array(1,'Show'),array(2,'Hide'));
                                    $default_value = '1';
                                    $c->add_dropdown('searchVisibility', $options_array, $default_value);?>
                            </td>
                        </tr>
                        <tr class="tr_content_modal searchVisibility">
                            <td colspan="2">
                                <?php $c->add_label_for_modal('Search Container','search_label');?>

                                <?php $value = '';?>
                                <?php $c->add_hidden_input('search_box',$value);?>
                                <a class="modal_css_icon" onclick="openModal('search_box',new Array('margin','padding','text_animation','border','border-style_contener','text_border-color','box-shadow','text_font-size','text_color','text_font-weight','text_background-color','text_font_alignment'),'Search Box Options');"><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr>
                        <tr class="tr_content_modal searchVisibility">
                            <td colspan="2">
                                <?php $c->add_label_for_modal('label','search_label');?>

                                <?php $value = '';?>
                                <?php $c->add_hidden_input('search_label',$value);?>
                                <a class="modal_css_icon" onclick="openModal('search_label',new Array('margin','padding','border','border-style_contener','text_border-color','text_font-size','text_color','text_font-weight','text_background-color','text_font_alignment','text_text_options'),'Label Options');"><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr>

                        <tr class="tr_content_modal searchVisibility">
                            <td colspan="2">
                                <?php $c->add_label_for_modal('Input','search_input');?>

                                <?php $value = '';?>
                                <?php $c->add_hidden_input('search_input',$value);?>
                                <a class="modal_css_icon" onclick="openModal('search_input',new Array('margin','padding','border','border-style_contener','text_border-color','text_font-size','text_color','text_font-weight','text_background-color','text_font_alignment','text_text_placeholder'),'Input Options');"><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr>

                        <tr class="tr_content_modal searchVisibility">
                            <td colspan="2">
                                <?php $c->add_label_for_modal('Button','search_button');?>

                                <?php $value = '';?>
                                <?php $c->add_hidden_input('search_button',$value);?>
                                <a class="modal_css_icon" onclick="openModal('search_button',new Array('margin','padding','border','border-style_contener','text_border-color','text_font-size','text_color','text_font-weight','text_background-color','text_font_alignment','text_text_button'),'Button Options');"><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr>

                    </table>

                </td>
            </tr>

            <?php

		}
	}

	new AFAQCBC_q_a_faq_search_options_Metabox();
 }
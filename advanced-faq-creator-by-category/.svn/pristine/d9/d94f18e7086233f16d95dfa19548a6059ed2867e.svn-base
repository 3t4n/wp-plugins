<?php 
 if( ! class_exists( 'AFAQCBC_q_a_faq_category_options_Metabox' ) ) {
	 /*
*  الكلاس الخاص بفورم إعدادات التصنيفات عند إضافة فاق جديده
*/
	class AFAQCBC_q_a_faq_category_options_Metabox {

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
*  عناصر الفورم
*/

		public function render_metabox( $post ) {
            $c = new AFAQCBC_q_a_faq_controls_class();
			?>

            <tr >
            	<td colspan="2">
                    <table class="puplicseteng">
                    	<tr>
                    		<th colspan="2">
                             <?php echo esc_html_e('Category Options', 'advanced-faq-creator-by-category');?>
                            </th>
                        </tr>

                        <tr  class="tr_content_modal">
                            <td colspan="2">
                                <?php $c->add_label_for_modal('Container style','category_container_options');?>

                                <?php $value = ''?>
                                <?php $c->add_hidden_input('category_container_options',$value);?>
                                <a  class="modal_css_icon" onclick="openModal('category_container_options',new Array('margin','padding','text_animation','border','border-style_contener','text_border-color','box-shadow','text_background-color'),'Category container options');"><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr>
                        <tr  class="tr_content_modal">
                            <td colspan="2">
                                <?php $c->add_label_for_modal('Title style','category_title_options');?>

                                <?php $value = ''?>
                                <?php $c->add_hidden_input('category_title_options',$value);?>
                                <a class="modal_css_icon" onclick="openModal('category_title_options',new Array('margin','padding','box-shadow','text_font-size','text_color','text_font-weight','text_cursor'),'Category title options');"><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr>
                        <tr>
                            <td width="300">
                                <?php $c->add_label('Icon visibility','category_iconVisibility');?>
                            </td>
                            <td>
                                <?php
                                $options_array = array(array(1,'Show'),array(2,'Hide'));
                                $default_value = '1';
                                $c->add_dropdown('category_iconVisibility', $options_array, $default_value);?>
                            </td>
                        </tr>
                        <tr  class="tr_content_modal category_iconVisibility">
                            <td colspan="2">
                                <?php $c->add_label_for_modal('Icon style','category_icon_options');?>

                                <?php $value = ''?>
                                <?php $c->add_hidden_input('category_icon_options',$value);?>
                                <a class="modal_css_icon" onclick="openModal('category_icon_options',new Array('text_font-size','text_color'),'Category icon options');"><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr >
                        <tr  class="tr_content_modal">
                            <td colspan="2">
                                <?php $c->add_label_for_modal('Image style','category_image_options');?>

                                <?php $value = ''?>
                                <?php $c->add_hidden_input('category_image_options',$value);?>
                                <a class="modal_css_icon" onclick="openModal('category_image_options',new Array('margin','padding','text_animation','border','border-style_contener','box-shadow','text_background-color'),'Category Image options');"><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr>


                    </table>

                </td>
            </tr>

            <?php

		}


	}

	new AFAQCBC_q_a_faq_category_options_Metabox();
 }
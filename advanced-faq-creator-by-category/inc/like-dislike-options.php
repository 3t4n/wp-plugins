<?php 
 if( ! class_exists( 'AFAQCBC_q_a_faq_like_dislike_options' ) ) {
	 		/*
* الإعدادات الخاصه داخل صفحة إضافة او تعديل فاق معين خاص بأيقونة لايك او ديس لايك
*/
	class AFAQCBC_q_a_faq_like_dislike_options {

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
* الإعدادات
*/

        public function render_metabox( $post ) {

            $c = new AFAQCBC_q_a_faq_controls_class();
            ?>

            <tr >
                <td colspan="2">
                    <table class="puplicseteng">
                        <tr>
                            <th colspan="2">
                                <?php echo esc_html__('Like and Dislike Options', 'advanced-faq-creator-by-category');?>
                            </th>
                        </tr>

                        <tr>
                            <td width="300">
                                <?php $c->add_label('Show Like And Dislike','Number_Of_Columns_Per_Row');?> 
                            </td>
                            <td>
                                <?php
                                $options_array = array(array(1,'Show'),array(2,'Hide'));
                                $default_value = '1';
                                $c->add_dropdown('faq_question_iconVisibility', $options_array, $default_value);?>
                                 This option is inherited from dashboard rating option
                            </td>
                        </tr>
                        <tr class="faq_question_iconVisibility">
                            <td width="300">
                                <?php $c->add_label('Like icon','Number_Of_Columns_Per_Row');?>
                            </td>
                            <td>
                                <?php
                                $options_array = $this->q_icons_aw_list_up();
                                $default_value = '1';
                                $c->add_dropdown('question_like_icon', $options_array, $default_value ,'font_awesome_icon select2-icon-like');?>
                            </td>
                        </tr>

                        <tr class="tr_content_modal faq_question_iconVisibility">
                            <td  colspan="2">
                                <?php $c->add_label_for_modal('Icon Like style','question_icon_options');?>

                                <?php $value = '';?>
                                <?php $c->add_hidden_input('question_like_icon_options',$value);?>
                                <a class="modal_css_icon" onclick="openModal('question_like_icon_options',new Array('text_font-size','text_color'),'Like icon options');"><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr>
                        <tr class="faq_question_iconVisibility">
                            <td width="300" >
                                <?php $c->add_label('Dislike icon','Number_Of_Columns_Per_Row');?>
                            </td>
                            <td>
                                <?php
                                $options_array = $this->q_icons_aw_list_down();
                                $default_value = '1';
                                $c->add_dropdown('question_dislike_icon', $options_array, $default_value ,'font_awesome_icon select2-icon-dislike');?>
                            </td>
                        </tr>

                        <tr class="tr_content_modal faq_question_iconVisibility">
                            <td  colspan="2">
                                <?php $c->add_label_for_modal('Icon Dislike style','question_icon_options');?>

                                <?php $value = '';?>
                                <?php $c->add_hidden_input('question_dislike_icon_options',$value);?>
                                <a class="modal_css_icon" onclick="openModal('question_dislike_icon_options',new Array('text_font-size','text_color'),'Dislike icon options');"><img src="<?php esc_attr_e(AFAQCBC_PLUGIN_URL); ?>images/css_icon.png" /></a>
                            </td>
                        </tr>



                    </table>

                </td>
            </tr>

            <?php

        }
		/*
* ايكونات الديس لايك
*/
        function q_icons_aw_list_down(){
			$icon = array(
                array('fas fa-thumbs-down', 'fas fa-thumbs-down'),
                array('far fa-thumbs-down', 'far fa-thumbs-down'),
                array('fas fa-heart-broken', 'fas fa-heart-broken'),
                array('fas fa-frown', 'fas fa-frown'),
                array('far fa-frown', 'far fa-frown'),
                array('fas fa-frown-open', 'fas fa-frown-open'),
                array('far fa-angry', 'far fa-angry'),
                array('fas fa-dizzy', 'fas fa-dizzy'),
			);
			return $icon;
		}

			/*
* ايكونات ديس لايك
*/	
        function q_icons_aw_list_up(){
			$icon = array(
                array('fas fa-thumbs-up', 'fas fa-thumbs-up'),
                array('far fa-thumbs-up', 'far fa-thumbs-up'),
                array('fas fa-heart', 'fas fa-heart'),
                array('far fa-heart', 'far fa-heart'),
                array('fab fa-gratipay', 'fab fa-gratipay'),
                array('fas fa-laugh-wink', 'fas fa-laugh-wink'),
                array('far fa-laugh-wink', ' far fa-laugh-wink'),
                array('fas fa-laugh-squint', 'fas fa-laugh-squint'),
                array('far fa-laugh-squint', 'far fa-laugh-squint'),
                array('fas fa-laugh-beam', 'fas fa-laugh-beam'),
                array('far fa-laugh-beam', 'far fa-laugh-beam'),
                array('fas fa-laugh', 'fas fa-laugh'),
                array('far fa-laugh', 'far fa-laugh'),
			);
			return $icon;
		}





	}

	new AFAQCBC_q_a_faq_like_dislike_options;

 }
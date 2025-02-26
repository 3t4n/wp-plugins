<?php 
 if( ! class_exists( 'AFAQCBC_q_a_faq_css_custom_options_Metabox' ) ) {
	 /*
* كلاس لاخر عنصر في فورم اضافة فاق التكست ايريا الخاص بإضافة اكواد الستايل
*/
	class AFAQCBC_q_a_faq_css_custom_options_Metabox {

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
* التيكست اريا
*/
		public function render_metabox( $post ) {
            $c = new AFAQCBC_q_a_faq_controls_class();
			?>

            <tr >
            	<td colspan="2">
                    <table class="puplicseteng">
                    	<tr>
                    		<th colspan="2">
                             <?php echo esc_html__('Custom CSS', 'advanced-faq-creator-by-category');?>
                            </th>
                        </tr>


                        <tr>
                            <td width="300">
                                <?php $c->add_label('Custom style','question_question_options');?>
                            </td>
                            <td>
                                <?php $c->textarea('','faq_custom_css','');?>
                            </td>
                        </tr>

                        </tr>

                    </table>

                </td>
            </tr>
            <?php
		}
	}

	new AFAQCBC_q_a_faq_css_custom_options_Metabox();
 }
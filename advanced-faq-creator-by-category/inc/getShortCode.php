<?php
if( ! class_exists( 'AFAQCBC_get_shortcode_Setting' ) ) {
			/*
* الشورت كود الي بينعرض في اول الصفحه تبعت تعديل الفاق الي بيقدر اليوزر ياخد الشورت كود منه ويعرضها في اي مكان
*/
    class AFAQCBC_get_shortcode_Setting
    {
        public function __construct()
        {
            if (is_admin()) {
                $this->init_metabox();
            }
        }
        public function init_metabox()
        {
            add_action( 'faqs_edit_form_fields',   array( $this, 'render_metabox' ), 1, 1 );
        }
				/*
* حقول الي بينعض فيها الشورت كود
*/
        public function render_metabox( $post ) {
            add_action('admin_footer', array($this, 'Setting_field_js'));
            ?>
            <tr class="form-field copy_short_code">
                <td colspan="2">
                    <table class="form-table">

                        <tr>
                            <th width="12%"><label for="Shortcode"><?php echo esc_html__( 'Shortcode', 'advanced-faq-creator-by-category' );?></label></th>
                            <td width="38%">
                                <input type="text" name="faq_shortcode" id="faq_shortcode" value='[faqs id="<?php echo absint($post->term_id);?>"]' class="form-control" readonly="readonly" aria-invalid="false">
                                <button type="button" class="btn" onclick="copyToClipboard('faq_shortcode')"><?php echo esc_html__('Copy', 'advanced-faq-creator-by-category');?></button>
                            </td>
                            <th width="12%"><label for="question_status"><?php echo esc_html__( 'php Shortcode', 'advanced-faq-creator-by-category' );?></label></th>
                            <td width="38%">
                                <input type="text" name="faq_shortcode_html" id="faq_shortcode_html" value='&lt;?php echo do_shortcode([faqs id="<?php echo absint($post->term_id);?>"]); ?&gt;' class="form-control" readonly="readonly" aria-invalid="false">
                                <button type="button" class="btn" onclick="copyToClipboard('faq_shortcode_html')"><?php echo esc_html__('Copy', 'advanced-faq-creator-by-category');?></button>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
            <?php
        }
				/*
* الجافا سكربت الي بتعمل نسخ للشورت كود 
*/
        public function Setting_field_js()
        {
            ?>
            <script>
			"use strict";
                function copyToClipboard(elmId){
					"use strict";
                    var elm = document.getElementById(elmId);
                    elm.select();
                    document.execCommand('copy');
                }
            </script>
            <?php
        }
    }
    new AFAQCBC_get_shortcode_Setting;
}
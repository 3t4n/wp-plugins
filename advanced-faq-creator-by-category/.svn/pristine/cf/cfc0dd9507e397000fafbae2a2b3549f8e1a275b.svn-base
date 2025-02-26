<?php
if( ! class_exists( 'AFAQCBC_q_a_faq_get_short_code_cat' ) ) {
			/*
* في صفحة الداش بورد يوحد جدول في اعلى الصفحه يعرض الفاق وعند الضغط على المشاهده او show
في اخر الجدول يستدعي موديل (بوب أب) يحتوي على جدول بالاجاكس هذا الكلاس مخصص لتكوين محتويات الجدول
*/
    class AFAQCBC_q_a_faq_get_short_code_cat
    {
        public function __construct() {
            add_action( 'wp_ajax_nopriv_get_short_code_cat',  array($this,'get_short_code_cat') );
            add_action( 'wp_ajax_get_short_code_cat',  array($this,'get_short_code_cat') );
            add_shortcode( 'faq_by_category', array($this,'shortcode_for_get_faqid_catid') );
        }
		/*
* الفنقشن الي بتكون محتويات المودال
*/
        public function get_short_code_cat(){
            if(isset($_REQUEST['faq_id'])){
                $faq_id = absint($_REQUEST['faq_id']);
            }else{
                return false;
            }
            $questions = $this->get_data($faq_id);
            ?>
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12 table-responsive">
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo esc_html__('#', 'advanced-faq-creator-by-category');?></th>
                                    <th scope="col"><?php echo esc_html__('Category', 'advanced-faq-creator-by-category');?></th>
                                    <th scope="col"><?php echo esc_html__('shortCode', 'advanced-faq-creator-by-category');?></th>
                                    <th scope="col"><?php echo esc_html__('Function Call', 'advanced-faq-creator-by-category');?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($questions)) {
                                $i = 1;
                                foreach ($questions as $key => $value) {
                                    ?>
                                    <tr>
                                        <th class="p-1" scope="row"><?php  echo absint($i); ?></th>
                                        <td class="p-1"><?php $term = get_term( $key ); echo esc_attr($term->name);?></td>
                                        <td class="p-1">
                                            <div class="row">
                                                <input type="text" name="faq_shortcode" id="faq_shortcode<?php echo esc_attr($key);?>" value="[faqs id=&quot;<?php echo absint($faq_id);?>&quot; cat_id=&quot;<?php echo  absint($term->term_id);?>&quot;]" class="form-control col-8 text-no-border" readonly="readonly" aria-invalid="false" <?php if(wp_is_mobile()){?> style="position: absolute;left:-9999px;" <?php } ?>>
												<button type="button" class="btn  ml-1 mr-1 bg-primary btn-to-copy" onclick="copyToClipboard('faq_shortcode<?php echo esc_js($key);?>')"><?php echo esc_html__('Copy', 'advanced-faq-creator-by-category');?></button>
                                            </div>
                                        </td>
                                        <td class="p-1">
                                            <div class="row">
                                                <input type="text" name="faq_shortcode_html" id="faq_shortcode_html<?php echo esc_attr($key);?>" value="&lt;?php echo do_shortcode('[faqs id=&quot;<?php echo esc_attr($faq_id);?>&quot;  cat_id=&quot;<?php echo  esc_attr($term->term_id);?>&quot;]'); ?&gt;" class="form-control col-10 text-no-border" readonly="readonly" aria-invalid="false" <?php if(wp_is_mobile()){?> style="position: absolute;left:-9999px;" <?php } ?>>
                                                <button type="button" class="btn  ml-1 mr-1 bg-primary btn-to-copy" onclick="copyToClipboard('faq_shortcode_html<?php echo esc_js($key);?>')"><?php echo esc_html__('Copy', 'advanced-faq-creator-by-category');?></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php
                                    $i++;
                                }
                            }else{
                                ?>
                                <tr>
                                    <th class="p-1" scope="row" colspan="4" style="text-align: center;"><?php echo esc_html__('dont have Category for this faq', 'advanced-faq-creator-by-category');?></th>
                                </tr>
                                        <?php
                            }
                                ?>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
            <?php
            wp_die();
        }
				/*
* بتجيب الداتا من قاعدة البيانات 
*/
        private function  get_data($faq_id,$data=array()){
            if($faq_id == ''){
                return false;
            }
            if(class_exists( 'AFAQCBC_q_a_faq_query' ) ) {
                $querys = new AFAQCBC_q_a_faq_query();
                $questions = $querys->get_all_question_about_faq($faq_id,$data);
                if(empty((array)$questions)){
                    return false;
                }
            }
            return $questions;
        }

		
		public function shortcode_for_get_faqid_catid()
        {
			if(!isset($_REQUEST['faq_id']) || !isset($_REQUEST['cat_id'])){
				return  esc_attr( get_option('empty_faq_message') );;
			}
			$faq_id = absint($_REQUEST['faq_id']);
			$cat_id = absint($_REQUEST['cat_id']);
            return  do_shortcode('[faqs id="'.$faq_id.'"  cat_id="'.$cat_id.'"]'); 
        }



    }
new AFAQCBC_q_a_faq_get_short_code_cat();
}
<?php
if( ! class_exists( 'AFAQCBC_q_a_faq_autocomplete_search' ) ) {
/*
* الكلاس الخاص بعملية البحث في التيمبليت عن سؤال معين الكلاس هاي وظيفتها ترجع قيم للبحث 
*/
    class AFAQCBC_q_a_faq_autocomplete_search
    {
		/*
		* انشاء ملفات الجافا سكربت الخاصه بالاجاكس وانشاء الاجكس للبحث
		*/
        public function __construct(){
			add_action( 'wp_enqueue_scripts', array($this,'my_enqueue') );
			add_action( 'wp_ajax_faq_autocomplete_search', array($this,'faq_autocomplete_search') );
			add_action( 'wp_ajax_nopriv_faq_autocomplete_search', array($this,'faq_autocomplete_search') );
        }
		/*
		* ترجع النتائج الخاصه بالبحث
		*/
		function faq_autocomplete_search() {
            $results = array('error' => false, 'data' => '');
            if(isset($_REQUEST['faq_search']) && $_REQUEST['faq_search'] !='' && isset($_REQUEST['faq_id']) && $_REQUEST['faq_id'] !=''){
                $value = sanitize_text_field($_POST['faq_search']);
                $faq_id = absint($_POST['faq_id']);
                $questions = $this->esc_attr_text_or_array_field($this->get_data($faq_id,array(),$value));

                foreach ($questions as $cat){
                    foreach ($cat as $q){
                        $results['data'] .= "<li class='list-gpfrm-list' data-fullname='".esc_attr($q['post_title'])."'>".esc_html($q['post_title'])."</li>";
                    }
                }

            }else{
                $results['data'] = "<li class='list-gpfrm-list'>". esc_html__("No found data matches Records.","codepressfaq")."</li>";
            }

            if(empty($results['data']) || $results['data'] ==''){
                $results['data'] = "<li class='list-gpfrm-list'>". esc_html__("No found data matches Records.","codepressfaq")."</li>";
            }
            echo json_encode($results);
			exit;
		}
		/*
		* ترجع النتائح الخاصه بالبحث من الكلاس الخاصه بجمل الكويري من الداتا بيز
		*/
        private function  get_data($faq_id,$data){
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
		/*
		* لعمل esc للنتائج المطبوعه
		*/
        function esc_attr_text_or_array_field($array_or_string){
            if( is_string($array_or_string) ){
                $array_or_string = esc_attr($array_or_string);
            }elseif( is_array($array_or_string) ){
                foreach ( $array_or_string as $key => &$value ) {
                    if ( is_array( $value ) ) {
                        $value = $this->esc_attr_text_or_array_field($value);
                    }else {
                        $value = esc_attr( $value );
                    }
                }
            }
            return $array_or_string;
        }
		/*
		* ملفات الاجكس الخاصه بالبحث js
		*/
		function my_enqueue() {
            wp_enqueue_script( 'faq-autocomplete-search', AFAQCBC_PLUGIN_URL. 'assets/js/faq_autocomplete_search.js', array('jquery') );
			wp_localize_script( 'faq-autocomplete-search', 'faq_autocomplete_search', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		}
	}
	new AFAQCBC_q_a_faq_autocomplete_search();
}




<?php
class AFAQCBC_normal_links{
    function __construct() {
        add_action( 'wp_footer', array( $this, 'load_script_css') );
        add_action( 'wp_footer', array( $this, 'load_scripts_js') );
    }
    function index($data=array()){
		
        $faq_id= absint($data['arg']['id']);
        $questions = $this->esc_attr_text_or_array_field($this->get_data($faq_id,$data));
		
        if(!$questions){
            return   get_option('empty_faq_message');
        }
		
        $data = $this->esc_attr_text_or_array_field($data);
		if(isset($data['arg']['cat_id']) && $data['arg']['cat_id'] !=""){
			$number_of_colom = 12;
		}else{
			$number_of_colom = $data['faqs_style']['Number_Of_Columns_Per_Row'];
		}
        $question_status = $data['faqs_style']['Question_Default_Status'];
        $On_Select_Question = $data['faqs_style']['On_Select_Question'];
        $Main_Container_Options = $data['faqs_style']['Main_Container_Options'];
        $search_box = $data['faqs_style']['search_box'];
        $category_container_options = $data['faqs_style']['category_container_options'];
        $category_title_options = $data['faqs_style']['category_title_options'];
        $category_icon_options = $data['faqs_style']['category_icon_options'];
        $category_image_options = $data['faqs_style']['category_image_options'];
        $question_active_header_options = $data['faqs_style']['question_active_header_options'];
        $question_inactive_header_options = $data['faqs_style']['question_inactive_header_options'];
        $question_title_options = $data['faqs_style']['question_title_options'];
        $question_icon_options = $data['faqs_style']['question_icon_options'];
        $question_question_options = $data['faqs_style']['question_question_options'];
        $searchVisibility = $data['faqs_style']['searchVisibility'];
        $short_description_length = (int)$data['faqs_style']['short_description_length'];
        $read_more_text = $data['faqs_style']['read_more_link'];
		//print_r($data['faqs_style']);exit;
        if(isset($data['faqs_style']['faq_question_iconVisibility']) && $data['faqs_style']['faq_question_iconVisibility']==1){
            $like_dislike_v = true;
        }else{
            $like_dislike_v = false;
        }
		$term = get_term( $faq_id );
		$term_name = $term->name;
        $like_icon = isset($data['faqs_style']['question_like_icon'])?$data['faqs_style']['question_like_icon']:'fa fa-thumbs-up';
        $dislike_icon = isset($data['faqs_style']['question_dislike_icon'])?$data['faqs_style']['question_dislike_icon']:'fa fa-thumbs-down';


        include( dirname( __FILE__ ) . '/template/header.php' );
        if($searchVisibility == 1){
            include( dirname( __FILE__ ) . '/template/search.php' );
        }



            foreach ($questions as $cat) {
                if(empty($cat)){
                    continue;
                }
                $cat_id = absint($cat['0']['term_taxonomy_id']);
                $cat_font_awesome_icon = get_term_meta( $cat_id, 'font_awesome_icon', true );
                $cat_c_icon_color = $this->esc_attr_text_or_array_field(get_term_meta( $cat_id, 'c_icon_color', true ));
                $Show_icon_category = $data['faqs_style']['category_iconVisibility'];

                if(get_option('faq_cat_page') && get_option('faq_cat_page') != -1 ){
                    $category_link = esc_url(get_page_link(get_option('faq_cat_page')).'?faq_id='.esc_attr($faq_id).'&cat_id='.esc_attr($cat_id));
                }else{
                    $category_link = '';
                }
                
                $cat_title = $cat['0']['name'];

                include( dirname( __FILE__ ) . '/template/category-header.php' );

                $count=0;
                foreach ($cat as $question) {
                    $question_id = absint($question['ID']);
                    $question_title = get_the_title($question_id);
                    $question_content = get_the_content('','',$question['ID']);
                    $link = get_permalink($question_id);
                    
                    $q_icon_color = $this->esc_attr_text_or_array_field(get_post_meta( $question_id, 'q_icon_color', true ));
                    $icon_font_select = $this->esc_attr_text_or_array_field(get_post_meta( $question_id, 'icon_font_select', true ));

                    $Show_icon_question = $data['faqs_style']['question_iconVisibility'];

                    
                    include( dirname( __FILE__ ) . '/template/question.php' );

                    $count++;
                }
                include( dirname( __FILE__ ) . '/template/category-footer.php' );
            }
        include( dirname( __FILE__ ) . '/template/footer.php' );
    }

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
    public function substrwords($text, $maxchar, $end='...') {
		if($text == ''){
			return;
		}
        if (strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);
            $output = '';
            $i      = 0;
            while (1) {
                $length = strlen($output)+strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                }
                else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        }
        else {
            $output = $text;
        }
        return $output;
    }
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
    function load_script_css(){
        wp_enqueue_style('bootstrap-min', AFAQCBC_PLUGIN_URL.'/assets/css/bootstrap-grid.min.css');
        
		wp_enqueue_style('font-awesome-all', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css');
		wp_enqueue_style('font-awesome', AFAQCBC_PLUGIN_URL.'/assets/css/font-awesome.min.css');
        wp_enqueue_style('animate', AFAQCBC_PLUGIN_URL.'/assets/css/animate.css');
        wp_enqueue_style('faq-search', AFAQCBC_PLUGIN_URL.'/assets/css/search.css');
    }
    function load_scripts_js(){
        wp_enqueue_script('bootstrap_min', AFAQCBC_PLUGIN_URL . 'assets/js/bootstrap.min.js',array('jquery'),'4.0',true);
    }






}



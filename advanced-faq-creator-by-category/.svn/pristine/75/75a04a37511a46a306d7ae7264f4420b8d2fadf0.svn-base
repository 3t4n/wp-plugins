<?php
if( ! class_exists( 'AFAQCBC_q_a_faq_shortCode_template' ) ) {
/*
* تنفيذ الشورت كود تبع التيمبليت يعني الشورت كود الي بيتاخد من الفاق وبينحط في صفحة ورد برس هنا بيتنفقد
*/
    class AFAQCBC_q_a_faq_shortCode_template {
        public $faqs_id = 0;
        public function __construct() {
            add_shortcode( 'faqs', array($this,'AFAQCBC_q_a_faq_shortCode') );
            add_action( 'wp_footer', array($this,'faq_template_page_style') );
        }
				/*
* فنقشن الخاصه بتنفيذ الشورت كود الخاص بالفاق
*/
        public function AFAQCBC_q_a_faq_shortCode( $arg ){
            ob_start();
            $data = array();

            $data['arg'] = $arg;
            if(empty($arg) || $arg['id']==''){
                return;
            }
            $this->faqs_id = absint($arg['id']);
            $term_meta = get_term_meta( $this->faqs_id );
            if(empty($term_meta)){
                return;
            }

            $data['faqs_style'] = $this->esc_attr_text_or_array_field(unserialize($term_meta['faqs_array']['0']));
            $data['faq_template'] = esc_attr($term_meta['faq_template']['0']);

            if($data['faq_template'] ==''){
                return;
            }

            require_once( AFAQCBC_PLUGIN_DIR . 'templates/'.$data['faq_template'].'/'.$data['faq_template'].'.php' );

            $opjFaq = new $data['faq_template'];
            $faqContent = $opjFaq->index($data);
            echo $faqContent;
                      $data['faqs_style'] = unserialize($term_meta['faqs_array']['0']);
            ?>
            <style>
            .starter h5 {
                margin: 0px !important;
            }
            .starter h2 {
                margin: 0px !important;
            }
            .starter h1 {
                margin: 0px !important;
            }
            .starter h3 {
                margin: 0px !important;
            }
            .starter h4 {
                margin: 0px !important;
            }
            .starter h5 {
                margin: 0px !important;
            }
            .starter label {
                width: 100%;
            }

                <?php
                echo esc_attr($data['faqs_style']['faq_custom_css']);
                $faq_style_array = array('Main_Container_Options','search_box','category_container_options','question_style','category_title_options','category_icon_options','category_image_options','question_active_header_options','question_inactive_header_options','question_title_options','question_icon_options','question_question_options','search_label','search_input','search_button','question_dislike_icon_options','question_like_icon_options');
                            echo $this->create_css_code($this->faqs_id,$data['faqs_style'],$faq_style_array);
                            
                            ?>
            </style>
            <?php
            return ob_get_clean();
        }
		/*
* تحويل الخيارات الي مخزه في لوحة التحكم من خيارات لستايل
*/
        public function faq_template_page_style(){
            if($this->faqs_id == 0){return;}
            $term_meta = get_term_meta( $this->faqs_id );
            $data['faqs_style'] = unserialize($term_meta['faqs_array']['0']);
            ?>

            <style>
                <?php
                $faq_style_array = array('Main_Container_Options','search_box','category_container_options','question_style','category_title_options','category_icon_options','category_image_options','question_active_header_options','question_inactive_header_options','question_title_options','question_icon_options','question_question_options','search_label','search_input','search_button','question_dislike_icon_options','question_like_icon_options');
                
                
                $style = $data['faqs_style']['question_active_header_options'];?>
                :not(.collapsed) > .question_active_header_options_font_<?php echo absint($this->faqs_id);?>:hover {
                <?php if(isset($style['hover_text_color']) && $style['hover_text_color'] != ''){ ?>
                    color: <?php echo esc_attr($style['hover_text_color']);?> !important;
                <?php }?>
                }
                :not(.collapsed).question_active_header_options_style_<?php echo absint($this->faqs_id);?>:hover{
                <?php if(isset($style['hover_background-color']) && $style['hover_background-color'] != ''){ ?>
                    background-color: <?php echo esc_attr($style['hover_background-color']);?> !important;
                <?php }?>
                }
				<?php $style = $data['faqs_style']['question_title_options'];?>
                .question_title_options_font_<?php echo absint($this->faqs_id);?>:hover {
                <?php if(isset($style['hover_text_color']) && $style['hover_text_color'] != ''){ ?>
                    color: <?php echo esc_attr($style['hover_text_color']);?> !important;
                <?php }?>
                }
                <?php $style = $data['faqs_style']['question_inactive_header_options'];
                echo $this->create_css_code_custom('.collapsed > .question_inactive_header_options',absint($this->faqs_id),$style);
                ?>
                .collapsed:hover > .question_inactive_header_options_font_<?php echo absint($this->faqs_id);?> {
                <?php if(isset($style['hover_text_color']) && $style['hover_text_color'] != ''){ ?>
                    color: <?php echo esc_attr($style['hover_text_color']);?> !important;
                <?php }?>
                }
                .collapsed.question_inactive_header_options_style_<?php echo absint($this->faqs_id);?>:hover{
                <?php if(isset($style['hover_background-color']) && $style['hover_background-color'] != ''){ ?>
                    background-color: <?php echo esc_attr($style['hover_background-color']);?> !important;
                <?php }?>
                }
                <?php echo $this->create_css_code_custom('.question_inactive_header_options',absint($this->faqs_id).'.collapsed',$style);
                echo esc_attr($data['faqs_style']['faq_custom_css']);
                ?>
            </style>

            <?php
        }
		/*
* تحويله من هنا وبريجع الكود للفقنشن الي فوق لطباعتها في الصفحه
*/
        public function create_css_code($faq_id,$faq_option=array(),$column){

            $style_font='';
            $style_container='';
            $fonts = array('font-size','color','font-weight','text-align');//element for font style
            $div_style = array('margin-top','margin-right','margin-bottom','cursor','margin-left','padding-top','padding-right','padding-bottom','padding-left','border-top','border-right','border-bottom','border-left','border-style','border-color','background-color','box-shadow');//element for div style
            foreach ($column as $key) {


                if(isset($faq_option[$key])) {
                    $data = $faq_option[$key];
                    $style_font .= '.' . $key . '_font_' . $faq_id . '{';
                    foreach ($fonts as $font) {

                        if (isset($data[$font]) && $data[$font] != '' ) {
                            if($font =='font-size' && (int)$data[$font] ==0){
                                continue;
                            }
                            $style_font .= $font . ':' . $data[$font] . $this->css_unit($font) . ' !important;';
                        }
                    }
                    $style_font .= '}';

                    $style_container .= '.' . $key . '_style_' . $faq_id . '{';
                    foreach ($div_style as $style) {
                        if (isset($data[$style]) && $data[$style] != '') {
                            $style_container .= $style . ':' . $data[$style] . $this->css_unit($style) . ' !important;';
							
						}
                    }
                    $style_container .= '}';
                }
            }
            return $style_font . $style_container;
        }
        public function create_css_code_custom($class_name,$faq_id,$data=array()){

            $fonts = array('font-size','color','font-weight','text-align');//element for font style
            $div_style = array('margin-top','margin-right','margin-bottom','margin-left','padding-top','padding-right','padding-bottom','padding-left','border-top','border-right','border-bottom','border-left','border-style','border-color','background-color','box-shadow');//element for div style
            $style_font = $class_name.'_font_'.$faq_id.'{';
            foreach ($fonts as $font){
                if(isset($data[$font]) && $data[$font]!='') {
                    if($font =='font-size' && (int)$data[$font] ==0){
                                continue;
                            }
                    $style_font .= $font . ':' . $data[$font] .$this->css_unit($font). ' !important;';
                }
            }
            $style_font .= '}';
            $style_contener = $class_name.'_style_'.$faq_id.'{';
            foreach ($div_style as $style){
                if(isset($data[$style]) && $data[$style]!='') {
					
                    $style_contener .= $style . ':' . $data[$style] .$this->css_unit($style). ' !important;';
					
                }
            }
            $style_contener .= '}';
            return $style_font . $style_contener;
        }
				/*
* ترجيع إذا كان الوحده بحاجه للاحقه px او لا 
*/
        public function css_unit($data){
            $collom = array('margin-top','margin-right','margin-bottom','margin-left','padding-top','padding-right','padding-bottom','padding-left','border-top','border-right','border-bottom','border-left','font-size');
            if($data == 'margin-top'){
				return 'px';
			}
			if(array_search($data,$collom,true)){
                return 'px';
            }
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

    }
}
new AFAQCBC_q_a_faq_shortCode_template();
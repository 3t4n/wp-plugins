<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Superaddons_Settings_Builder_PDF_Backend {
    function __construct() {
        add_action('admin_enqueue_scripts', array($this,'style'));
        add_action('admin_head', array($this,'add_font'));
        add_action( 'init', array($this,'create_posttype') );
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_filter( 'get_sample_permalink_html', array( $this, 'remove_permalink' ) );
        add_action( 'save_post_pdf_template',array( $this, 'save_metabox' ), 10, 2 );
        add_filter( 'admin_body_class', array($this,'body_class' ));
        add_action( 'admin_footer', array($this,"add_page_templates"));
        add_filter('post_row_actions', array($this,"duplicate_post_link"),10, 2);
        add_action( 'admin_action_rednumber_duplicate', array($this,"rednumber_duplicate") );
        add_action("builder_email_tab__editor",array($this,"builder_email_tab__editor"),1);  
    }
    public static function check_pro(){
        return apply_filters("superaddons_pdf_check_pro",false);
    }
    function builder_email_tab__editor($post){
        $post_id= $post->ID;
        $pro = Superaddons_Settings_Builder_PDF_Backend::check_pro();
        $pro_text ='<div class="pro_disable pro_disable_fff">Upgrade to pro version</div>';
        $sizes = array("A Sizes"=>array(
                "A0"=> "A0 (841 x 1189mm)",
                "A1"=> "A1 (594 x 841mm)",
                "A2"=> "A2 (420 x 594mm)",
                "A3"=> "A3 (297 x 420mm)",
                "A4"=> "A4 (210 x 297mm)",
                "A5"=> "A5 (148 x 210mm)",
                "A6"=> "A6 (105 x 148mm)",
                "A7"=> "A7 (74 x 105mm)",
                "A8"=> "A8 (52 x 74mm)",
                "A9"=> "A9 (37 x 52mm)",
                "A10"=> "A10 (26 x 37mm)",
            ),
            "B sizes" => array(
                "B0"=> "B0 (1414 x 1000mm)",
                "B1"=> "B1 (1000 x 707mm)",
                "B2"=> "B2 (707 x 500mm)",
                "B3"=> "B3 (500 x 353mm)",
                "B4"=> "B4 (353 x 250mm)",
                "B5"=> "B5 (250 x 176mm)",
                "B6"=> "B6 (176 x 125mm)",
                "B7"=> "B7 (125 x 88mm)",
                "B8"=> "B8 (88 x 62mm)",
                "B9"=> "B9 (62 x 44mm)",
                "B10"=> "B10 (44 x 31mm)",
            ),
            "Custom Sizes" => apply_filters("pdfcreator_custom_sizes",array()),
        );
        $list_tempates = array();
        $args = array(
          'numberposts' => -1,
          'post_type'   => 'pdf_template',
          'exclude'   => array($post_id)
        );
        $post_list = get_posts( $args );
        foreach ( $post_list as $post ) {
           $list_tempates[$post->ID] = $post->post_title;
        }
        $list_fonts = Superaddons_Pdfbuilder_Pdf_Settings::get_list_fonts();
        $pdfs = get_post_meta($post_id,"_builder_pdf_settings",true);
        $font_family = get_post_meta($post_id,"_builder_pdf_settings_font_family",true);
        if(!$font_family){
            $font_family = "dejavu sans";
        }
        if( !is_array($pdfs) ) {
            $pdfs = array("dpi"=>96,"size"=>"A4","orientation"=>"P","show_page"=>"");
        }
        ?>
        <div class="builder__editor--item builder__editor--item-settings">
            <div class="builder__editor--button-text">
                <label><?php esc_html_e("DPI","pdf-for-wpforms") ?></label>
                <input name="builder_pdf_settings[dpi]" type="text" class="dpi" value="<?php echo esc_attr($pdfs["dpi"]) ?>">
                <label><?php esc_html_e("Paper Orientation","pdf-for-wpforms") ?></label>
                <select  name="builder_pdf_settings[orientation]" >
                    <option value="P"><?php esc_html_e("Portrait","pdf-for-wpforms") ?></option>
                    <option <?php selected($pdfs["orientation"],"L") ?> value="L"><?php esc_html_e("Landscape","pdf-for-wpforms") ?></option>
                </select>
                <label><?php esc_html_e("Paper Size","pdf-for-wpforms") ?></label>
                <select  name="builder_pdf_settings[size]" >
                     <?php 
                        foreach($sizes as $group=>$options){
                            echo wp_kses_post('<optgroup label="'.$group.'">');
                                foreach($options as $key=>$value){
                                    $check ="";
                                    if( $pdfs["size"] == $key ){
                                        $check ="selected";
                                    }
                                    ?>
                                    <option <?php echo esc_attr($check) ?> value="<?php echo esc_attr($key) ?>"><?php echo esc_attr($value) ?></option>
                                    <?php
                                }
                             echo wp_kses_post('</optgroup>');   
                        }
                     ?>
                </select>
            </div>
            <div class="builder__editor--button-text">
                <label><?php esc_html_e("Font family","pdf-for-wpforms") ?></label>
                <select class="font_family" name="builder_pdf_settings_font_family">
                <?php
                    foreach($list_fonts as $font => $vl){
                        ?>
                        <option style="font-family: <?php echo esc_attr($font) ?>" <?php selected($font_family,$font) ?> value="<?php echo esc_attr($font) ?>"><?php echo esc_attr($font) ?></option>
                        <?php
                    }
                    $google_fonts = get_option("pdf_custom_fonts",array());
                    foreach($google_fonts as $font => $vl){
                        ?>
                        <option style="font-family: '<?php echo esc_attr($font) ?>'" <?php selected($font_family,$font) ?> value="<?php echo esc_attr($font) ?>"><?php echo esc_attr($font) ?></option>
                        <?php
                    }
                 ?>
                 
                </select>
                <label><?php esc_html_e("Font size","pdf-for-wpforms") ?></label>
                <input type="text" class="font-size-main">
                <?php echo Superaddons_Pdfbuilder_editor::get_color_pick(esc_html__("Font color","pdf-for-wpforms")) ?>
            </div>

             
            <div class="builder__editor--button-text">
                <label><?php esc_html_e("Header Template","pdf-for-wpforms") ?></label>
                <?php 
                $header ="";
                if( isset($pdfs["header"]) ){
                    $header = $pdfs["header"];
                }
                if($pro){
                ?>
                <select name="builder_pdf_settings[header]">
                    <option><?php esc_html_e("No Header","pdf-for-wpforms") ?></option>
                    <?php foreach( $list_tempates as $id => $name ){ ?>
                    <option <?php selected($header,$id) ?> value="<?php echo esc_attr($id) ?>"><?php echo esc_html($name) ?></option>
                    <?php } ?> 
                </select>
            <?php }else{
                echo wp_kses_post($pro_text);
            } ?>
            </div>

            <div class="builder__editor--button-text">
                <label><?php esc_html_e("Footer Template","pdf-for-wpforms") ?></label>
                <?php
                $footer ="";
                if( isset($pdfs["footer"])){
                    $footer =$pdfs["footer"];
                }
                if($pro){
                ?>
                <select name="builder_pdf_settings[footer]">
                    <option><?php esc_html_e("No Footer","pdf-for-wpforms") ?></option>
                    <?php foreach( $list_tempates as $id => $name ){ ?>
                    <option <?php selected($footer,$id) ?> value="<?php echo esc_attr($id) ?>"><?php echo esc_html($name) ?></option>
                    <?php } ?>   
                </select>
                <?php }else{
                echo wp_kses_post($pro_text);
            } ?>
            </div>
            <div class="builder__editor--button-text">
                <label><?php esc_html_e("Watermark text","pdf-for-wpforms") ?></label>
                <?php
                $watermark_text ="";
                if( isset($pdfs["watermark_text"])){
                    $watermark_text =$pdfs["watermark_text"];
                }
                if($pro){
                ?>
                <textarea rows="3" name="builder_pdf_settings[watermark_text]" class="setting-custom-css"><?php echo esc_textarea($watermark_text) ?></textarea>
                <?php }else{
                echo wp_kses_post($pro_text);
            } ?>
            </div>
            <div class="builder__editor--button-text">
                <label><?php esc_html_e("Watermark image","pdf-for-wpforms") ?></label>
                <?php
                $watermark_img ="";
                if( isset($pdfs["watermark_img"])){
                    $watermark_img =$pdfs["watermark_img"];
                }
                if($pro){
                ?>
                <input type="text" class="image_url" placeholder="imag url" name="builder_pdf_settings[watermark_img]" value="<?php echo esc_url($watermark_img) ?>">
                <input type="button" class="upload-editor--image-ok button button-primary" value="Upload">
                <?php }else{
                echo wp_kses_post($pro_text);
            } ?>
            </div>
            <div class="builder__editor--button-text">
                <?php
                $css ="";
                if( isset($pdfs["css"])){
                    $css =$pdfs["css"];
                }
                ?>
                <label><?php esc_html_e("Custom CSS","pdf-for-wpforms") ?></label>
                <textarea rows="4" name="builder_pdf_settings[css]" class="setting-custom-css"><?php echo esc_textarea($css) ?></textarea>
            </div>
        </div>
        <?php
    }
    function email_builder_main($post ) {
        $post_id= $post->ID;
        ?>
        <div id="builder-header">
            <div id="header-left">
                <div id="header-left-icon">
                    <a href="<?php echo admin_url("edit.php?post_type=pdf_template"); ?>"><i class="pdf-creator-icon icon-wordpress"></i></a>
                </div>
            </div>
            <div id="header-right">
                <?php do_action("pdfcreator_head_settings",$post) ?>
                <div class="button wp-builder-email-choose-template">
                   <?php esc_html_e("Choose Templates","pdf-for-wpforms")  ?>
                </div>
                <div class="button wp-builder-email-import">
                   <?php esc_html_e("Import","pdf-for-wpforms")  ?>
                </div>
                <div class="button wp-builder-email-export">
                   <?php esc_html_e("Export","pdf-for-wpforms")  ?>
                </div> 
                <div class="button">
                    <?php
                    $oder_id = 0;
                    if( class_exists("PDF_Woocommerce_Backend") ){
                        $oder_id = PDF_Woocommerce_Backend::get_testing_woo_order($post_id);
                        $url = add_query_arg(array("pdf_preview"=>"preview","preview"=>1,"id"=>$post_id,"woo_order"=>$oder_id),get_home_url());
                    }else{
                        $url = add_query_arg(array("pdf_preview"=>"preview","preview"=>1,"id"=>$post_id),get_home_url());
                    } 
                     ?>
                    <a target="_blank" href="<?php echo esc_url( $url )?>"><?php esc_html_e("Preview PDF","pdf-for-wpforms")  ?></a>
                </div>
                <div id="header-right-icon">
                    <a title="Save template" class="button-pdfcreator-save" href="#"><i class="pdf-creator-icon icon-floppy"></i></a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="email-builder-container">
            <div class="email-builder-side">
                <div class="builder__right">
                        <div class="builder__widget">
                            <ul class="builder__tab">
                                <li><a class="active" id="#tab__block"><i class="pdf-creator-icon icon-windows"></i><span><?php esc_html_e("Block","pdf-for-wpforms")  ?></span> </a></li>
                                <li><a class="" id="#tab__row"><i class="pdf-creator-icon icon-columns"></i><span><?php esc_html_e("Layouts","pdf-for-wpforms")  ?></span></a></li>
                                <li><a class="" id="#tab__editor"><i class="pdf-creator-icon icon-pencil"></i><span><?php esc_html_e("Editor","pdf-for-wpforms")  ?></span></a></li>
                            </ul>
                            <div class="tab__inner">
                                <div class="wp-builder-email-expand">
                                    <div class="wp-builder-email-expand-title"></div>
                                    <div class="woocommerce-pdfcreator-expand-shrink">
                                        <a data-type="left" class="woocommerce-pdfcreator-expand" href="#"><?php esc_html_e("Expand","pdf-for-wpforms") ?> <i class="pdf-creator-icon icon-right-big"></i></a>
                                        <a data-type="left" class="woocommerce-pdfcreator-shrink hidden" href="#"><?php esc_html_e("Shrink","pdf-for-wpforms") ?> <i class="pdf-creator-icon icon-left-big"></i></a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="tab__content active" id="tab__block">
                                    <div class="builder__widget--inner">
                                        <ul class="momongaPresets">
                                            <?php echo do_action( "pdf_builder_block" ) ?>
                                        </ul>
                                        <?php echo do_action( "pdf_builder_block_tab" ) ?>
                                    </div>
                                </div>
                                <div class="tab__content" id="tab__row">
                                    <div class="builder__widget--inner">
                                        <ul class="builder-row-tool">
                                            <?php echo do_action( "pdf_builder_block_row" ) ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab__content" id="tab__editor">
                                    <div class="builder__editor">
                                        <?php echo do_action( "builder_email_tab__editor",$post ) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="email-builder-main" data-type="main">
                    <div class="email-builder-main-change_backgroud" data-type="main"><i class="pdf-creator-icon icon-pencil"></i> <?php esc_html_e("Settings PDF","pdf-for-wpforms") ?></div>
                    <div class="builder__list builder__list--js"> 
                        <div class="builder-row-container builder__item">
                            <div style="background-color: #ffffff" data-background_full="not" data-type="row1" class="builder-row-container-row builder-row-container-row1">
                                <div class="builder-row builder-row-empty">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wpbuideremail-expand-right hidden">
                <a data-type="right" class="woocommerce-pdfcreator-expand" href="#"><?php esc_html_e("Expand","pdf-for-wpforms") ?> <i class="pdf-creator-icon icon-left-big"></i></a>
            </div>
            <?php 
                $data_js = get_post_meta( $post_id,'data_email',true);
                if( is_array($data_js) ){
                    $data_js = json_encode($data_js);
                }
            ?>
            <textarea name="data_email" class="data_email hidden"><?php echo esc_attr($data_js) ?></textarea>
            <script type="text/javascript">
                <?php
                    $data =array(); 
                    $datas = apply_filters("pdf_builder_block_html",$data);
                ?>
                var wp_builder_pdf = <?php echo wp_json_encode($datas) ?>
            </script>
            <?php
        wp_enqueue_media();
    }
    function style() {
        $ver = SUPERADDONS_PDF_CREATOR_BUILDER_VERSION;
        wp_enqueue_style('bootstrap-touchspin', SUPERADDONS_PDF_CREATOR_BUILDER_URL."backend/lib/touchspin/jquery.bootstrap-touchspin.css");
        wp_enqueue_style('pdfcreator-font', SUPERADDONS_PDF_CREATOR_BUILDER_URL ."backend/css/pdfcreator.css",array(),$ver);
        wp_enqueue_style('pdf-momonga', SUPERADDONS_PDF_CREATOR_BUILDER_URL."backend/css/momonga.css",array(),$ver);
        wp_enqueue_style('pdfbuilder-main', SUPERADDONS_PDF_CREATOR_BUILDER_URL."backend/css/main.css",array(),$ver);
        wp_register_script('bootstrap-touchspin', SUPERADDONS_PDF_CREATOR_BUILDER_URL. "backend/lib/touchspin/jquery.bootstrap-touchspin.min.js",array());
        wp_register_script('pdfbuilder_pdf_code_toggle', SUPERADDONS_PDF_CREATOR_BUILDER_URL ."backend/src/tinymce-ace.js",array());
        wp_register_script('pdfbuilder_main', SUPERADDONS_PDF_CREATOR_BUILDER_URL. "backend/src/main.js",array(), $ver);
        wp_register_script('pdfbuilder_builder', SUPERADDONS_PDF_CREATOR_BUILDER_URL . "backend/src/builder.js",array("pdfbuilder_main"), $ver);
        wp_register_script('pdfbuilder_editor', SUPERADDONS_PDF_CREATOR_BUILDER_URL. "backend/src/set_editor.js",array("pdfbuilder_main"), $ver);
        wp_enqueue_script('pdfbuilder_script', SUPERADDONS_PDF_CREATOR_BUILDER_URL."backend/src/script.js",array("jquery","pdfbuilder_main","jquery-ui-core","jquery-ui-sortable","jquery-ui-draggable","jquery-ui-droppable","wp-color-picker","wp-tinymce","pdfbuilder_editor","pdfbuilder_builder","thickbox","bootstrap-touchspin","jquery-effects-core","jquery-effects-scale","pdfbuilder_pdf_code_toggle","thickbox"),$ver);
        $shortcode = array();
        $shortcode = apply_filters("wp_builder_pdf_shortcode",$shortcode);
        $shortcode[] = array("text"=>"Footer","value"=>"");
        $shortcode[] = array("text"=>"Current page number","value"=>"{PAGENO}");
        $shortcode[] = array("text"=>"Total page number","value"=>"{nbpg}");
        $list_fonts = Superaddons_Pdfbuilder_Pdf_Settings::get_list_fonts();
        $google_fonts = get_option("pdf_custom_fonts",array());
        $font_formats = "";
        foreach($list_fonts as $k =>$vl ){
            $font_formats =  $font_formats . $k."=".$k.";"; 
        }
        foreach($google_fonts as $k =>$vl ){
            $font_formats =  $font_formats . $k."=".$k.";"; 
        }
        wp_localize_script( 'pdfbuilder_script', 'pdfbuilder_settings',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 
                'youtube_play_src' => "pdf-for-wpforms"."images/youtube_play.png",
                'shortcode' =>  $shortcode,
                'google_font_font_formats' => $font_formats,
                'home_url' => get_home_url()
                 ) );
    }
    function add_font(){
        global $post_type;
        if( "pdf_template" == $post_type || ( isset($_GET["page"] ) && $_GET["page"] == "pdfbuilder-settings") ) {
            $upload_dir = wp_upload_dir();
            $path_main = $upload_dir['basedir'] . '/pdfs/fonts/';  
            $defaultConfig     = (new Mpdf\Config\ConfigVariables())->getDefaults();
            $fontDirs = $defaultConfig['fontDir'];
            $fonts = Superaddons_Pdfbuilder_Pdf_Settings::get_list_fonts();
            $google_fonts = get_option("pdf_custom_fonts",array());
            ?>
            <style type="text/css">
            <?php
            foreach( $fonts as $key => $value ){
                    foreach( $value as $k => $vl ){
                        if( is_readable($fontDirs[0]."/".$vl) ) {
                            $url = SUPERADDONS_PDF_CREATOR_BUILDER_URL."vendor/mpdf/mpdf/ttfonts/".$vl;
                        }else {
                            $url = false;
                        }
                        if( $url != "" ) {
                            $font_weight ="normal";
                            $font_style ="normal";
                            if( $k == "B" ){
                                $font_weight ="bold";
                            }elseif ( $k == "I") {
                                $font_style ="italic";
                            } elseif( $k == "BI" ) {
                                $font_style ="italic";
                                $font_weight ="bold";
                            }
                             ?>
                             @font-face {
                              font-family: '<?php echo esc_attr($key) ?>';
                              src: url(<?php echo esc_url($url); ?>);
                              font-style: <?php echo esc_attr($font_style) ?>;
                              font-weight: <?php echo esc_attr($font_weight) ?>;
                            }
                             <?php
                        }
                    }
            }
            foreach( $google_fonts as $key => $value ){  
               foreach( $value as $k => $vl ){
                        if( is_readable($path_main.$vl) ) {
                            $url = $upload_dir["baseurl"]."/pdfs/fonts/".$vl;
                        }else {
                            $url = false;
                        }
                        if( $url != "" ) {
                            $font_weight ="normal";
                            $font_style ="normal";
                            if( $k == "B" ){
                                $font_weight ="bold";
                            }elseif ( $k == "I") {
                                $font_style ="italic";
                            } elseif( $k == "BI" ) {
                                $font_style ="italic";
                                $font_weight ="bold";
                            }
                             ?>
                             @font-face {
                              font-family: '<?php echo esc_attr($key) ?>';
                              src: url(<?php echo esc_url($url); ?>);
                              font-style: <?php echo esc_attr($font_style) ?>;
                              font-weight: <?php echo esc_attr($font_weight) ?>;
                            }
                             <?php
                        }
                    }
            }
            ?>
            </style>
            <?php 
        }   
    }
    function create_posttype() {
        register_post_type( 'pdf_template',
            array(
                'labels' => array(
                    'name' => esc_html__( 'PDF Templates',"pdf-for-wpforms" ),
                    'add_new' => esc_html__( 'New Template',"pdf-for-wpforms" ),
                    'singular_name' => esc_html__( 'pdf_templates',"pdf-for-wpforms" )
                ),
                'public' => true,
                'has_archive' => true,
                'supports'    => array( 'title' ),
                'show_in_menu' => true,
                'rewrite' => array('slug' => 'pdf_template'),
                'show_in_rest' => true,
                'menu_icon'           => 'dashicons-email',
                'menu_position'=>100,
                'exclude_from_search' => true,
                'publicly_queryable' => false,
                'query_var'=>false
            )
        );
    }
    function save_metabox($post_id, $post) {
        if( isset($_POST['data_email'])) {
            $data_email = ($_POST['data_email']);
            update_post_meta($post_id,'data_email',$data_email);
        }
        if( isset($_POST['builder_pdf_settings_font_family'])) {
            $builder_pdf_settings_font_family = sanitize_text_field($_POST['builder_pdf_settings_font_family']);
            update_post_meta($post_id,'_builder_pdf_settings_font_family',$builder_pdf_settings_font_family);
        }
        if( isset($_POST['builder_pdf_settings'])) { 
            $datas = array();
            if( array($_POST["builder_pdf_settings"])) {
                foreach( $_POST["builder_pdf_settings"] as $key => $value ){
                   $datas[$key] = sanitize_text_field($value); 
                }
                update_post_meta($post_id,'_builder_pdf_settings',$datas);
            }
        }   
    }
    function remove_view_action(){
        global $post_type;
        if ( 'pdf_template' === $post_type ) {
            unset( $actions['view'] );
        }
        return $actions;
    }
    function remove_permalink($link){
        global $post_type;
        if ( 'pdf_template' === $post_type ) {
            return "";
        }else{
            return $link;
        }
    }
    function add_meta_boxes() {
        add_meta_box(
            'email-builder-main',
            esc_html__( 'Builder PDF', "pdf-for-wpforms" ),
            array( $this, 'email_builder_main' ),
            'pdf_template',
            'normal',
            'default'
        );
    }
    function body_class( $classes ) {
        global $post_type;
        $screen = get_current_screen();
        if ( 'pdf_template' == $post_type && $screen->id == 'pdf_template' ) {
            return  $classes . " post-php";
        }else{
            return  $classes;
        }
    }
    function add_page_templates(){
        add_thickbox(); 
        ?>
        <div id="wp-builder-email-templates" style="display:none">
          <div class="list-view-templates">
              <?php 
              $args = array(
                    "json"=>"",
                    "img"=>SUPERADDONS_PDF_CREATOR_BUILDER_URL."backend/demo/template1/1.png",
                    "title"=>"Email templates",
                    "cat" => array(),
                    "id"=>0,
                );
              do_action( "builder_pdf_templates" );
               ?>
          </div>       
        </div>
        <?php
    }
    public static function item_demo($args1){
        $defaults = array(
            "json"=>"",
            "img"=>SUPERADDONS_PDF_CREATOR_BUILDER_URL."backend/demo/template1/1.png",
            "title"=>"PDF templates",
            "url" => "#",
            "id"=>0,
            "cat" => array(),
        );
        $args = wp_parse_args( $args1, $defaults );
        $domain = "https://pdf.add-ons.org/";
        $url_view = $domain."?pdf_preview=preview&id=".$args["id"]."&woo_order=18";
        $url_design = $domain."?templates_id=".$args["id"];
        ?>
         <div class="grid-item" data-file="<?php echo esc_url($args["json"]) ?>">
              <img src="<?php echo esc_url($args["img"]) ?>">
              <div class="demo_content">
                  <div class="demo-title"><?php echo esc_html($args["title"]) ?></div>
                  <div class="demo-tags"><?php echo implode(", ",$args["cat"]) ?></div>
                  <div class="wp-builder-email-actions">
                        <div class="demo-fl">
                            <a class="button wp-builder-email-actions-import" href="#"><?php esc_html_e("Import","pdf-for-wpforms") ?></a>
                            <a target="_blank" class="button wp-builder-email-actions-design" href="<?php echo esc_url($url_design) ?>"><?php esc_html_e("Design","pdf-for-wpforms") ?></a>
                        </div>
                        <div class="demo-fr">
                            <a target="_blank" class="button wp-builder-email-actions-view" href="<?php echo esc_url($url_view) ?>"><?php esc_html_e("Preview","pdf-for-wpforms") ?></a>
                        </div>
                        <div class="clear"></div>
                  </div>
              </div>
          </div>
        <?php
    }
    function duplicate_post_link($actions, $post){
        if ($post->post_type=='pdf_template' && current_user_can('edit_posts') ){
            $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rednumber_duplicate&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
            $actions['preview_template'] = '<a target="_blank" href="' . esc_url(get_home_url()."?pdf_preview=preview&id=".$post->ID) . '" title="Preview" rel="Preview">Preview</a>';
        }
        return $actions;
    }
    function rednumber_duplicate(){
      global $wpdb;
      if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rednumber_duplicate' == $_REQUEST['action'] ) ) ) {
        wp_die('No post to duplicate has been supplied!');
      }
      $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
      $post = get_post( $post_id );
      $current_user = wp_get_current_user();
      $new_post_author = $current_user->ID;
      if (isset( $post ) && $post != null) {
        $args = array(
          'comment_status' => $post->comment_status,
          'ping_status'    => $post->ping_status,
          'post_content'   => $post->post_content,
          'post_excerpt'   => $post->post_excerpt,
          'post_name'      => $post->post_name,
          'post_parent'    => $post->post_parent,
          'post_password'  => $post->post_password,
          'post_status'    => 'Publish',
          'post_title'     => $post->post_title ."-Demo",
          'post_type'      => $post->post_type,
          'to_ping'        => $post->to_ping,
          'menu_order'     => $post->menu_order
        );
        $new_post_id = wp_insert_post( $args );
        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($post_meta_infos)!=0) {
          $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
          foreach ($post_meta_infos as $meta_info) {
            $meta_key = $meta_info->meta_key;
            if( $meta_key == '_wp_old_slug' ) continue;
            $meta_value = addslashes($meta_info->meta_value);
            $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
          }
          $sql_query.= implode(" UNION ALL ", $sql_query_sel);
          $wpdb->query($sql_query);
        }
        wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
        exit;
      } else {
        wp_die('Post creation failed, could not find original post: ' . $post_id);
      }
    }
}
new Superaddons_Settings_Builder_PDF_Backend;
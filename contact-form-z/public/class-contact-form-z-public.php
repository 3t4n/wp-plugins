<?php

class ZCForm_Public{

    private $plugin_name;
    private $version;
    private $style_count = [];
    private $global_fields = [];
    private $generate_id = '';
    private $list_script = '';

    public function __construct($plugin_name, $version){

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles(){

        wp_enqueue_style($this->plugin_name.'-css-calendar', ZCFORM_PLUGIN_BASEDIR.'/css/jquery.datetimepicker.css', [], $this->version, 'all');
//        wp_enqueue_style($this->plugin_name.'-css-filestyle-normalize', ZCFORM_PLUGIN_BASEDIR.'/css/custom-file-input/normalize.css', [], $this->version, 'all');
        wp_enqueue_style($this->plugin_name.'-css-jquery-confirm', ZCFORM_PLUGIN_BASEDIR.'/css/jquery-confirm.min.css', [], $this->version, 'all');
        wp_enqueue_style( 'dashicons' );
        wp_enqueue_style($this->plugin_name.'-css-bars-theme', ZCFORM_PLUGIN_BASEDIR.'/css/bars-theme.css', [], $this->version, 'all');
        wp_enqueue_style($this->plugin_name.'-css', ZCFORM_PLUGIN_BASEDIR.'/css/'.ZCFORM_PLUGIN_NAME.'.css', [], $this->version, 'all');
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function enqueue_scripts(){

        
        wp_enqueue_script($this->plugin_name.'-js-mask', ZCFORM_PLUGIN_BASEDIR.'/js/jquery.mask.min.js', ['jquery'], $this->version, false);
        wp_enqueue_script($this->plugin_name.'-js-calendar', ZCFORM_PLUGIN_BASEDIR.'/js/jquery.datetimepicker.full.min.js', ['jquery'], $this->version, false);
        wp_enqueue_script($this->plugin_name.'-js-jquery-confirm', ZCFORM_PLUGIN_BASEDIR.'/js/jquery-confirm.min.js', ['jquery'], $this->version, false);
        wp_enqueue_script($this->plugin_name.'-js-barrating', ZCFORM_PLUGIN_BASEDIR.'/js/jquery.barrating.min.js', ['jquery'], $this->version, false);
        wp_enqueue_script($this->plugin_name.'-js', plugin_dir_url(__FILE__).'js/'.ZCFORM_PLUGIN_NAME.'-public.js', ['jquery'], $this->version, false);
        wp_add_inline_script($this->plugin_name.'-js', ZCForm_Static::zcform_base_get_options(), 'before' );
        wp_enqueue_script($this->plugin_name.'-js-file', ZCFORM_PLUGIN_BASEDIR.'/js/CFileInput.js', ['jquery'], $this->version, false);
        wp_register_script('zcf-google-recaptcha', 'https://www.google.com/recaptcha/api.js', [], '3.0', false);
        wp_enqueue_script('zcf-google-recaptcha');
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_shortcode($param){

        if(!isset($param['id']) || empty($param['id']))
            return;

        global $wp_styles;
        $this->wp_styles = $wp_styles;
        $this->list_script = '';

        $content = $this->zcform_display_form($param['id']);
        $this->style_count[] = $param['id'];

        return $content.ZCForm_Static::zcform_clean_script($this->list_script);
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_content($content){

        if(!is_feed() && !is_home() && in_array(get_post_type(), ['page', 'post'])){

            $post_id = !empty(get_the_ID()) ? get_the_ID() : 0;
            $insert_form = ['before' => '', 'after' => ''];

            global $wpdb;
            $res = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT id, form_id, post_position FROM {$wpdb->prefix}zcf_form_list_post WHERE post_id = %d ORDER BY form_id, id;", $post_id
                )
                , ARRAY_A
            );

            if(count($res) > 0){

                global $wp_styles;
                $this->wp_styles = $wp_styles;
                $this->list_script = '';

                foreach($res as $r){
                    $insert_form[$r['post_position']] .= $this->zcform_display_form($r['form_id']);
                    $this->style_count[] = $r['form_id'];
                }

                $content = $insert_form['before'].$content.$insert_form['after'];

            }
        }

        return $content.ZCForm_Static::zcform_clean_script($this->list_script);
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_display_form($form_id){

        $form_block = '';

        global $wpdb;
        $res_form = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT id, title, fields, style, options FROM {$wpdb->prefix}zcf_form_list WHERE id = %d;", $form_id
            )
            , ARRAY_A, 0
        );

        if(is_null($res_form))
            return;

        $this->global_fields = [];
        $this->generate_id = uniqid();

        $form_block .= $this->zcform_view_fields(json_decode($res_form['fields'], true), $form_id);

        if(!in_array($form_id, $this->style_count)){

            $form_style = ZCForm_Static::zcform_get_fields_style(json_decode($res_form['style'], true), $form_id);
            $this->wp_styles->add($this->plugin_name.'-generate-style', false, []);
            $this->wp_styles->add_inline_style($this->plugin_name.'-generate-style', ZCForm_Static::zcform_clean_script($form_style, false));
            $this->wp_styles->enqueue([$this->plugin_name.'-generate-style']);
        }

        $this->list_script .= ZCForm_Static::zcform_get_fields_script($this->global_fields, true, $this->generate_id, json_decode($res_form['options'], true), $form_id);

        return $form_block;
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_view_fields($data_list, $form_id){

        $this->pfi = $form_id;
        $this->form_content = '';

        ob_start();
        ?>
        <div class='zcf_public'>
            <form id="zcf_form_<?=$this->pfi ?>_<?=$this->generate_id?>" class="zcf_form">
                <input type="hidden" name="form_id" value="<?=$this->pfi ?>">
                <input type="hidden" name="generate_id" value="<?=$this->generate_id?>">
                <?php

                foreach($data_list as $data){

                    $this->field_key = !is_null(key($data)) ? key($data) : '';

                    $this->d = is_array($data[$this->field_key]) ? $data[$this->field_key] : [];
                    
                    if(isset($this->d[$this->field_key.'_hide']) && $this->d[$this->field_key.'_hide']) continue;

                    $zcf_rnk = (isset($this->d[$this->field_key.'_rank']) ? $this->d[$this->field_key.'_rank'] : 0).'_'.$this->generate_id;

                    if(isset($this->d[$this->field_key.'_rank'])){
                        $this->d[$this->field_key.'_rank'] = $zcf_rnk;
                        $this->global_fields[][$this->field_key] = $this->d;
                    }

                    require ZCFORM_PLUGIN_DIR."/admin/partials/preview/".ZCFORM_PLUGIN_NAME."-{$this->field_key}-field.php";
                }
                
                ?>
            </form>
            <?=ZCForm_Static::zcform_public_preload(8, $this->pfi);?>
        </div>
        <?php
        return ob_get_clean();
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------
}

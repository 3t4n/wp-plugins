<?php
//blocking direct access the file
if ( ! defined( 'ABSPATH' ) ) {
    die( '&ldquo;the door is shut it was made by those who are dead&rdquo;' );
}
class GBQuickLaunchButton{
    private $data;
    private $meta;
    private $id;

    private $status;
    private $name;
    private $slug;
    private $type;
    private $code;
    private $html;
    private $icon;
    function __construct($button){

        $this->status = false;
        if ( $button instanceof WP_Post ) {
            $_button = $button;
        } elseif ( is_object( $button ) ) {
            $_button = sanitize_post( $button, 'raw' );
            $_button = new WP_Post( $_button );
        } else {
            $_button = WP_Post::get_instance( intval($button) );
        }


        if($_button){
            $this->data = $_button;
            $this->id = $this->data->ID;
            if($this->data){
                $this->meta = get_post_meta( $this->id, 'gbql_button', true );
                if($this->meta){
                    $this->status = true;
                    $this->init();
                }
            }
        }else{
            $this->status = false;
        }
    }

    //PRIVATE

    /*
     * call : __construct
     * do : Initiate the button
     */
    private function init(){

        if(!$this->status)
            return false;

        $this->name = $this->get_name();
        $this->slug = $this->get_slug();
        $this->type = $this->get_type();
        $this->code = $this->get_code();
        $this->icon = $this->set_icon();
        $this->html = $this->get_html();

        if($this->name && $this->slug && $this->type && $this->code && $this->icon && $this->html){
            $this->status = true;
        }else{
            $this->status = false;
        }
    }

    //PUBLIC

    /*
     * call : *
     * do : return the name of the button
     */
    public function get_name(){
        if(!$this->status)
            return false;

        if($this->name)
            return $this->name;

        if($this->data){
            $this->name = $this->data->post_title;
            return $this->name;
        }

        return false;
    }

    /*
     * call : *
     * do : return the slug of the button
     */
    public function get_slug(){
        if(!$this->status)
            return false;

        if($this->slug)
            return $this->slug;

        if($this->data){
            $this->slug = $this->data->post_name;
            return $this->slug;
        }

        return false;
    }

    /*
     * call : *
     * do : return the type of the button
     */
    public function get_type(){
        if(!$this->status)
            return false;

        if($this->type)
            return $this->type;

        if($this->meta && isset($this->meta['type'])){
            $this->type = $this->meta['type'];
            return $this->type;
        }

        return false;
    }

    /*
     * call : *
     * do : return the type of the button
     */
    public function get_area_style(){
        if(!$this->status)
            return '';

        if($this->meta && isset($this->meta['area_style'])){
            $out = '<style>';
            $out .= "body .gbql-buttons-wrap ul.gbql-buttons-con > li.code.gbql-open > .gbql-button > .gbql-code-con{";
            $out .= "background-color:".sanitize_hex_color($this->meta['area_style']['gbql-area-bg']).";";
            $out .= "border-color:".sanitize_hex_color($this->meta['area_style']['gbql-area-borders']).";";
            $out .= "border-radius:".intval($this->meta['area_style']['gbql-area-radios'])."px;";
            $out .= '}';
            $out .= '</style>';

            return $out;
        }


        return '';
    }

    /*
     * call : *
     * do : return the post id of the button
     */
    public function get_post_id(){
        if(!$this->status)
            return false;

        if($this->data)
            return $this->data->ID;

        return false;
    }

    /*
     * call : *
     * do : return the code of the button
     */
    public function get_code(){
        if(!$this->status)
            return false;

        if($this->code)
            return $this->code;

        if($this->type){
            if($this->type == 'content'){
                $this->code = $this->data->post_content;
            }else if($this->meta && isset($this->meta['value'])){
                $this->code = $this->meta['value'];
            }
            return $this->code;
        }

        return false;
    }

    /*
     * call : *
     * do : set the icon of the button
     */
    public function set_icon($icon = false){
        if(!$this->status){
            return false;
        }

        if(!$this->data){
            return false;
        }

        if(!$icon){
            $icon = apply_filters('gbql_button_icon',$this);
        }
        if(!$icon && empty($icon)){
            $icon = get_the_post_thumbnail($this->data,'full',array( 'class' => 'gbql_icon' ));
        }

        //set default image
        if(!$icon && empty($icon)){
            $icon = GBQLURL.'/images/gbql-default.png';
        }

        if(!$icon && empty($icon)){
            $this->status = false;
            $this->icon = false;
        }

        $this->icon = esc_url($icon);

        return true;
    }

    /*
     * call : *
     * do : return the icon of the button
     */
    public function get_icon(){
        if(!$this->status)
            return false;

        if(!$this->icon || substr( $this->icon, 0, 4 ) !== "http"){
            $this->set_icon();
        }

        if($this->icon){
            return '<img width="150" height="150" title="'.esc_attr($this->name).'" src="'.esc_url($this->icon).'">';
        }

        return false;
    }

    /*
     * call : *
     * do : return the icon of the button
     */
    public function get_html(){
        if(!$this->status)
        return false;

        if($this->html)
        return $this->html;

        if(!empty($this->code)){
            return $this->html = apply_filters("gbql_button_code",$this);
        }
        return false;
    }

    /*
     * call : init
     * do : add hooks & filters
     */
    public function Status(){
        return $this->status;
    }
}
<?php

class DPDCart_Button extends DPDCart_ShortCode_Abstract{
    public function __construct()
    {
        parent::__construct();
        add_shortcode('dpdcart-button', array($this, 'render'));
    }

    public function render($args)
    {
        if (!isset($this->options['ready']) | !$this->options['ready']){
            return "You must complete the setup first.";
        }
        if(!isset($args['id'])){
            return "You must provide product ID";
        }
        $dpd= new DPD_Cart_API();
        $product= $dpd->product($args['id']);
//        var_dump($product);
        if ($product ["status"]=='NOTFOUND'){
            return 'Product ID is not correct';
        }

        //array with shortcode params=> Fallback format
        $params=array(
            'text'=>'button_text',
            'size'=>'button_size',
            'color'=>'button_color',
            'hover_color'=>'button_hover_color',
            'text_color'=>'button_text_color',
            'lightbox'=>'use_lightbox',
            'price_position'=>'price_position',
            'price_color'=>'price_color',
            'price_bg_color'=>'price_bg_color',
        );
//        var_dump(intval($this->options['use_lightbox']));
        // take care of missing args with fallback
        foreach ($params as $key=>$fallback) {
            if (!isset($args[$key])){
                $args[$key]=$this->options[$fallback];
            }
        }
        return $this->button($product,$args);
    }

    private function button($product,$args)
    {
        return sprintf(
            '<a data-text="%s" data-button-size="dpd-%s" data-bg-color="%s" data-bg-color-hover="%s" data-text-color="%s" data-lightbox="%s" href="https://%s.dpdcart.com/cart/%s?product_id=%s&amp;method_id=%s"  data-dpd-type="button" data-variant="price-%s"  data-pr-bg-color="%s" data-pr-color="%s"></a>',
            $args['text'],
            $args['size'],
            ltrim($args['color'], '#'),
            ltrim($args['hover_color'], '#'),
            ltrim($args['text_color'], '#'),
            intval($args['lightbox']),
            $this->options['subdomain'],
            $this->options['use_buy'] == 1 ? 'buy' : 'add',
            $args['id'],
            $product['prices'][0]['id'],
            $args['price_position'],
            $args['price_bg_color'],
            $args['price_color']
        );
    }

}

new DPDCart_Button();
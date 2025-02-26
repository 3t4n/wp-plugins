<?php

abstract class  DPDCart_ShortCode_Abstract
{
    protected $options;
    protected $image_base;

    protected function __construct()
    {
        $this->image_base = 'https://d2beuh40lcdzfb.cloudfront.net/products';
        $this->options = get_option('dpdcart-settings');
    }

    protected function image_render($product, $image = true)
    {
        if ($image) {
            if ($product['image_file_name']) {
                $img = sprintf("<div class='dpd-p-img-wrap'><img src='%s/%s/600x600/%s'/></div>",
                    $this->image_base,
                    $product['id'],
                    $product['image_file_name']);
                return $img;
            } else {
                return "<div class='dpd-p-img-wrap'></div>";
            }

        }
    }

    protected function button_render($id, $price_id, $product_page = false)
    {
        $position = $this->options['price_position'];
        $size = $this->options['button_size'];
        if ($product_page) {
            $position = $this->options['price_position_product'];
            $size = $this->options['button_size_product'];
        }
        return sprintf(
            '<a data-text="%s" data-button-size="dpd-%s" data-bg-color="%s" data-bg-color-hover="%s" data-text-color="%s" data-lightbox="%s" href="https://%s.dpdcart.com/cart/%s?product_id=%s&amp;%s=%s"  data-dpd-type="button" data-variant="price-%s"  data-pr-bg-color="%s" data-pr-color="%s"></a>',
            $this->options['button_text'],
            $size,
            ltrim($this->options['button_color'], '#'),
            ltrim($this->options['button_hover_color'], '#'),
            ltrim($this->options['button_text_color'], '#'),
            $this->options['use_lightbox'],
            $this->options['subdomain'],
            $this->options['use_buy'] == 1 ? 'buy' : 'add',
            $id,
            $this->options['use_buy'] == 1 ? 'product_price_id' : 'method_id',
            $price_id,
            $position,
            $this->options['price_bg_color'],
            $this->options['price_color']
        );
    }

    protected function title_render($name, $id)
    {
        $output = sprintf("<h3 class='dpd-product-title'>%s</h3>", $name);
        if ($this->options['product_page'] != 0) {
            $url = add_query_arg('dpd_id', $id, get_permalink($this->options['product_page']));
            return "<a href='" . $url . "'>" . $output . "</a>";
        }
        return $output;
    }

    protected function render_description($description, $show)
    {
        $output = '';
        if ($show == 1) {
            $output = sprintf("<div class='description'>%s</div>", $description);
        }
        return $output;
    }

    protected function price_render($product, $product_page = false)
    {
        if (($product_page && $this->options['show_price_product']) | (!$product_page && $this->options['show_price'])) {
            return "<div class='dpd-price'><b>$".$product['prices'][0]['price']."</b></div>";
        }
        return '';
    }
}
<?php

class DPDCart_Store extends DPDCart_ShortCode_Abstract
{
    public function __construct()
    {
        parent::__construct();
        add_shortcode('dpdcart-store', array($this, 'render'));
    }

    public function render($args)
    {
        $dpd = new DPD_Cart_API();
        if (isset($args['layout'])) {
            if ($args['layout'] == 'grid') {
                return $this->grid_layout($dpd->products());
            } elseif ($args['layout'] == 'list') {
                return $this->list_layout($dpd->products());
            } else {
                return "Layout must be grid or list";
            }
        } else {
            return "No Layout Selected";
        }

    }

    private function grid_layout($products, $image = true)
    {
        $output = '<div class="dpd-grid">';
        foreach ($products as $product) {
            $output .= $this->product_render($product);
        }
        $output .= '</div>';
        return $output;
    }

    private function list_layout($products, $image = true)
    {
        $output = '<div class="dpd-list">';
        foreach ($products as $product) {
            $output .= $this->product_render($product);
        }
        $output .= '</div>';
        return $output;
    }

    private function product_render($product, $image = true)
    {

        $output = sprintf("<div class='dpd-product'>%s <div class='dpd-description'>%s %s</div><div class='dpd-btn-wrap'>%s %s</div></div>",
            $this->image_render($product, $image),
            $this->title_render($product['name'], $product['id']),
            $this->render_description($product['description'], $this->options['store_short_description']),
            $this->button_render($product['id'], $product['prices'][0]['id']),
            $this->price_render($product)
        );
        return $output;
    }

}

new DPDCart_Store();
    <?php
    
    function astromedia_horoscopes_nl_functionality_fetch_menu_content_for_astromedia(){

        $product_id_post =  $_POST['product_id'];
        $settings = $_POST['settings'];
        $products = $_POST['products'];

        $product = array_filter($products, function($item) use ($product_id_post) {
            return $item['id'] == $product_id_post;
        });
        
        // To get the first matching product, if any:
        $product = !empty($product) ? reset($product) : null;

        echo $product;

        $product_id = $product['id'];
        $product_name = $product['name'];
        $product_type = $product['type'];
        $product_title = $product['title'];
        $product_premium = $product['premium'];
        $product_price_per_turn = $product['price_per_turn'];
        $product_description = esc_html(ucfirst($product['description']));
        $product_shortcode = $product['shortcode'];

        $yearv2 = ($product_id == 5) ? '<div><strong>Shortcode: </strong>[astro_year_horoscopev2]</div>' : '';

        echo '';
        
   
        }
    ?>
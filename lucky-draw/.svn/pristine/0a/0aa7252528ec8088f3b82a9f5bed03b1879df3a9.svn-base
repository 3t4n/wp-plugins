<?php

if ( !defined('ABSPATH') ){
  die();
}

global $wpdb;
 if(isset($_POST["Lucky_Draw_Details"])){ 


  if(wp_kses_post(wp_unslash(isset($_POST["Lucky_Draw_Nonce_Field"])))&&wp_verify_nonce(wp_kses_post(wp_unslash($_POST["Lucky_Draw_Nonce_Field"])),'Lucky_Draw_Nonce')){ 
  }else {  die; }
  if(isset($_POST["Lucky_Draw_Name"])){ 
    $LD_name=wp_kses_post(wp_unslash($_POST['Lucky_Draw_Name']));
   

  } 

  if(isset($_POST["Lucky_Draw_Desc"])){ 
    $LD_desc=wp_kses_post(wp_unslash($_POST['Lucky_Draw_Desc']));
   

  } 

  if(isset($_POST["Lucky_Draw_Date"])){ 
    $LD_date=wp_kses_post(wp_unslash($_POST['Lucky_Draw_Date']));
    $LD_date = strtotime($LD_date);

    $LD_date= gmdate('Y-m-d',$LD_date);

  }

  if(isset($_POST["participationmail"])){ 
    $participation_mail='';

   $participation_mail=wp_kses_post(wp_unslash($_POST['participationmail']));
  }else{
    $participation_mail='';
  }

  if(isset($_POST["placement"])){ 
    

   $placement =wp_kses_post(wp_unslash($_POST['placement']));
  }

  

?>
<!-- Success Alert -->
 
<div class="luckydrawformcontainer">

<form action="<?php echo wp_kses_post(Lucky_Draw_Home_URL).'admin.php?page=adddraw&prize=prize&style=style';  ?>" method="post" class="row">
    <!-- No. Of Winners -->
<input type="hidden" name="Lucky_Draw_Name" value="<?php echo esc_attr($LD_name); ?>">
<input type="hidden" name="Lucky_Draw_Desc" value="<?php echo esc_attr($LD_desc); ?>">
<input type="hidden" name="Lucky_Draw_Date" value="<?php echo esc_attr($LD_date); ?>">
<input type="hidden" name="participationmail" value="<?php echo esc_attr($participation_mail); ?>">
<input type="hidden" name="placement" value="<?php echo esc_attr($placement); ?>">

<div class="row mb-3" style="padding-left:35px;padding-right:35px;margin-top:35px;">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Poduct SKU </label>
        <div class="col-sm-10" >
          <div class="ui search" id="product_SKU_2">
            <input style="padding:.5em;" class="prompt" id="luckydrawinputtext" name="product_SKU_1" style="border-radius:none;" type="text" required>
            <div class="results"></div>
          </div>
        </div>
      </div>



      <div class="row mb-3" style="padding-left:35px;padding-right:35px;margin-top:5px;">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Prize Text</label>
          <div class="col-sm-10" >
            <input type="text" name="prize_text_1" maxlength="41" name="prize_text_1" id="luckydrawinputtext" required >
          </div>
      </div>

      <div class="row mb-3" style="padding-left:35px;padding-right:35px;margin-top:35px;">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Display As</label>
          <div class="col-sm-10 ">
          <select name="display_as" id="luckydrawinputtext">
            <option value="Link">Link</option>
            <option value="Text">Text</option>
            </select><a href="<?php echo Lucky_Draw_Home_URL.'admin.php?page=help'; ?>"><i> (Know More) </i></a>       
      </div>
      </div>   
  <?php wp_nonce_field( "Lucky_Draw_Nonce", "Lucky_Draw_Nonce_Field");  ?>
    <div class="col-12 mt-4">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      
  <button class="luckydrawsubmitbutton" style="margin-right:3em;margin-bottom:3em;" type="submit" name="Lucky_Draw_Styling" > Next </button>
</div>  
  </div>

</form>

</div>
<?php
}
  
// Get all the products
$products = lucky_draw_get_all_products_with_sku();

// Prepare the products array as JSON
$categoryContent = [];
foreach ($products as $product) {
    $categoryContent[] = [
        'category' => wp_kses_post($product['name']),
        'title' => wp_kses_post($product['sku']),
    ];
}

// Convert PHP array to JSON format
$categoryContentJson = wp_json_encode($categoryContent);

// Register a script handle

// Add inline script to the registered script handle
$inline_script = "
    var categoryContent = $categoryContentJson;
    $('#product_SKU_1').search({
        type: 'category',
        source: categoryContent
    });

    $('#product_SKU_2').search({
        type: 'category',
        source: categoryContent
    });

    $('#product_SKU_3').search({
        type: 'category',
        source: categoryContent
    });
";

// Add the inline script
wp_add_inline_script('luckydrawjs', $inline_script, 'after');

function lucky_draw_get_all_products_with_sku() {
    // Get all products
    $args = array(
        'post_type'      => 'product', // Post type for products
        'posts_per_page' => -1,        // Get all products
        'post_status'    => 'publish', // Only get published products
    );

    $query = new WP_Query($args);
    $products = $query->posts;

    $product_data = array();

    // Loop through each product
    foreach ($products as $product_post) {
        $product = wc_get_product($product_post->ID);
        
        // Get the product name and SKU
        $product_name = $product->get_name();
        $product_sku = $product->get_sku();

        // Add product data to array
        $product_data[] = array(
            'name' => $product_name,
            'sku'  => $product_sku,
        );
    }

    return $product_data;
}

// Usage example

<?php

if (!isset($_GET['product_id'])) {
  $url = admin_url('admin.php?page=aplbcp_list_all&success=0');
?>
  <script>
    window.location.href = '<?php echo esc_attr($url); ?>'
  </script>;
<?php
  exit;
} 
else 
{
  wp_enqueue_media();
  global $wpdb;

  $table = $wpdb->prefix . 'aplbcp_setting';
  $aplbcpSettingSql = "SELECT aplbcp_price_show FROM $table";
  $aplbcpSettingRow = $wpdb->get_var($aplbcpSettingSql);

  $aplbcpPriceShow = $aplbcpSettingRow;
  $aplbcpDescNoOfRows = 7;

  if ($aplbcpPriceShow == "Y") {

    $aplbcpDescNoOfRows = 10;
  }


  $products_id = sanitize_text_field($_GET['product_id']);

  $table = $wpdb->prefix . 'aplbcp_products_list';
  $aplbcpProductsListSql = "SELECT * FROM $table WHERE product_id='$products_id'";
  $aplbcpProductsListRow = $wpdb->get_results($aplbcpProductsListSql);

  $table = $wpdb->prefix . 'aplbcp_products';
  $aplbcpProductsSql = "SELECT * FROM $table WHERE product_list_id='$products_id'";
  $aplbcpProductsRow = $wpdb->get_results($aplbcpProductsSql);
}


?>
<div id="wpbody" role="main">
  <div id="wpbody-content">
    <div class="aplbcp-container">

      <form action="admin.php?page=aplbcp-products-edit-submit" method="post">

        <div class="product-title-container">
          <div class="input-div">
            <input type="hidden" name="product_list_id" value="<?php echo esc_attr($products_id); ?>">
            <input type="text" name="product_name" id="" required placeholder="Product List Name" value="<?php echo esc_attr($aplbcpProductsListRow[0]->product_list_name); ?>">
          </div>
          <div class="button-div">
            <button type="submit" name="btnAddNewProduct" class="btnAddNewProduct">Update</button>
          </div>
        </div>

        <?php
        foreach ($aplbcpProductsRow as $aplbcpProducts) {
        ?>
          <div class="product-main-details">
            <div class="product-details-container">
              <div class="product-details-container-items">
                <input type="hidden" name="product_id[]" value="<?php echo esc_attr($aplbcpProducts->id); ?>">
                <div class="productImagesDIv">
                  <img class="productImagesPrev" style="width: auto; height: 100%;" src="<?php echo esc_attr(get_site_url() . "" . $aplbcpProducts->product_image); ?>" />
                  <input type="hidden" required name="productImageUrl[]" class="productImageUrl" value="<?php echo esc_attr($aplbcpProducts->product_image); ?>">
                </div>

                <input type="text" required name="product_second_name[]" class="product_second_name" placeholder="Product Name" value="<?php echo esc_attr($aplbcpProducts->product_name); ?>"><br>

                <?php
                if ($aplbcpPriceShow == "N") {
                ?>
                  <input type="hidden" value="0" name="product_price[]" />
                <?php
                } else {
                ?>
                  <input type="number" name="product_price[]" class="product_price" placeholder="Product Price" value="<?php echo esc_attr($aplbcpProducts->product_price); ?>"><br>
                <?php
                }
                ?>

                <input type="text" required name="product_boy_now_link[]" id="" placeholder="Buy Now Link" value="<?php echo esc_url($aplbcpProducts->buy_now_link); ?>">

              </div>
              <div class="product-details-container-items" style="flex-grow: 1;">
                <?php $descId = "product_desc" . $aplbcpProducts->id; ?>
                <?php wp_editor(stripslashes(str_replace('\r\n', '', wp_kses_post($aplbcpProducts->product_desc))), $descId, $settings = array('media_buttons' => false, 'textarea_name' => 'product_desc[]', 'textarea_rows' => 8)); ?>
              </div>

            </div>
          </div>
        <?php
        }
        ?>
      </form>

    </div>
  </div>
</div>

<script>
  jQuery(".productImagesDIv").click(function() {

    var thisDiVindex = jQuery(this);

    //  alert(thisDiVindex);

    var productImages = wp.media({
      title: "Select Product Image",
      multiple: false
    }).open().on("select", function(e) {
      var uploadedProdutImages = productImages.state().get("selection").first();
      var productImagesData = uploadedProdutImages.toJSON();
      var productImagesUrl = productImagesData.url;
      var siteDomain = "<?php echo get_site_url(); ?>";

      productImagesUrlNew = productImagesUrl.replace(siteDomain, "");

      jQuery(thisDiVindex).find(".productImagesPrev").attr("src", productImagesUrl);
      jQuery(thisDiVindex).find(".productImageUrl").val(productImagesUrlNew);
      jQuery(thisDiVindex).find(".productImagesPrev").css("width", "auto");
      jQuery(thisDiVindex).find(".productImagesPrev").css("max-width", "100%");
      jQuery(thisDiVindex).find(".productImagesPrev").css("height", "100%");
      jQuery(thisDiVindex).css("border", "0px");

    });

  });

  jQuery(".btnAddNewProduct").click(function() {
    jQuery(".product_second_name").each(function() {



      if (jQuery(this).val() != "") {
        if (jQuery(this).siblings(".productImagesDIv").children('.productImageUrl').val() == "") {
          jQuery(this).siblings(".productImagesDIv").css("border", "solid");
          jQuery(this).siblings(".productImagesDIv").css("border-color", "red");
          alert("kindly Select the Product images");

          jQuery(form).submit(function() {
            return false;
          });
          return false;
        }
      }
    });
  });
</script>
<?php
wp_enqueue_media();

global $wpdb;
$table= $wpdb->prefix.'aplbcp_setting';
$aplbcpSettingSql="SELECT aplbcp_price_show FROM $table";
$aplbcpSettingRow=$wpdb->get_var($aplbcpSettingSql);

$aplbcpPriceShow=$aplbcpSettingRow;
$aplbcpDescNoOfRows=7;

if($aplbcpPriceShow=="Y"){

    $aplbcpDescNoOfRows=10;
}


?>
<div id="wpbody" role="main">
    <div id="wpbody-content">
        <div class="aplbcp-container">
        <h1 class="wp-heading-inline" style="display: inline-block;">Add New</h1>
            <form action="admin.php?page=aplbcp-addnew-submit" method="post">

                <div class="product-title-container">
                    <div class="input-div">
                        <input type="text" name="product_name" id="" required placeholder="Product List Name">
                    </div>
                    <div class="button-div">
                        <button type="submit" name="btnAddNewProduct" class="btnAddNewProduct">Publish</button>
                    </div>
                </div>

                <?php
                for($i=1;$i<=10;$i++)
                {
                ?>
                <div class="product-main-details">
                    <div class="product-details-container">
                        <div class="product-details-container-items">
                            <div class="productImagesDIv">
                                <img class="productImagesPrev" style="width: 100px;" src="https://cdn-icons-png.flaticon.com/512/685/685669.png" />
                                <input type="hidden" <?php if($i==1) echo "required"; ?> name="productImageUrl[]" class="productImageUrl">
                            </div>

                            <input type="text" <?php if($i==1) echo "required"; ?> name="product_second_name[]" class="product_second_name" placeholder="Product Name"><br>

                            <?php
                            if($aplbcpPriceShow=="N")
                            {
                            ?>
                                <input type="hidden" value="0" name="product_price[]" />
                            <?php
                            }
                            else
                            {
                            ?>
                                <input type="number" <?php if($i==1) echo "required"; ?> name="product_price[]" class="product_price"   placeholder="Product Price"><br>
                            <?php
                            }
                            ?>
                            <input type="url" <?php if($i==1) echo "required"; ?> name="product_boy_now_link[]" id="" placeholder="Affiliate Link">

                        </div>
                        <?php $product_desc="product_desc". esc_attr($i); ?>
                        <div class="product-details-container-items" style="flex-grow: 1;">
                            <?php wp_editor(stripslashes("Product Features"),esc_attr($product_desc), $settings = array('media_buttons' => false, 'textarea_name' => 'product_desc[]', 'textarea_rows' => $aplbcpDescNoOfRows)); ?>
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

var thisDiVindex=jQuery(this);

//  alert(thisDiVindex);

var productImages = wp.media({
    title: "Select Product Image",
    multiple: false
}).open().on("select", function(e) {
    var uploadedProdutImages = productImages.state().get("selection").first();
    var productImagesData = uploadedProdutImages.toJSON();
    var productImagesUrl = productImagesData.url;
    var siteDomain = "<?php echo get_site_url(); ?>";
    
    productImagesUrlNew=productImagesUrl.replace(siteDomain,"");

    jQuery(thisDiVindex).find(".productImagesPrev").attr("src", productImagesUrl);
    jQuery(thisDiVindex).find(".productImageUrl").val(productImagesUrlNew);
    jQuery(thisDiVindex).find(".productImagesPrev").css("width", "auto");
    jQuery(thisDiVindex).find(".productImagesPrev").css("max-width", "100%");
    jQuery(thisDiVindex).find(".productImagesPrev").css("height", "100%");
    jQuery(thisDiVindex).css("border","0px");

});

});

jQuery(".btnAddNewProduct").click(function()
{
    var returnResponse = true;
    jQuery(".product_second_name").each(function() {
        if(jQuery(this).val()!="")
        {
            if(jQuery(this).siblings(".productImagesDIv").children('.productImageUrl').val()=="")
            {
                jQuery(this).siblings(".productImagesDIv").css("border","solid");
                jQuery(this).siblings(".productImagesDIv").css("border-color","red");
                alert("kindly Select the Product images");

                return false;
                returnResponse = false;
                // jQuery(form).submit(function(){
                //     return false;
                // });
                
            }
        }
    });

    return returnResponse;
});
</script>
jQuery(document).ready(function ($) {
  /**
   * Add bundle to cart
   * @param mixed $atcButton
   * @param mixed $bundlerWidget
   * @return void
   */
  function addBundleToCart($atcButton, $bundlerWidget) {
    var id = $atcButton.val(),
      nonce = $bundlerWidget.find("input[name=bdlr_nonce]").val(),
      productID1 = $bundlerWidget.data("product_id1") || id,
      productID2 = $bundlerWidget.data("product_id2") || id,
      productType1 =
        $bundlerWidget.find("input[name=bdlr_product_type1]").val() || "simple",
      productType2 =
        $bundlerWidget.find("input[name=bdlr_product_type2]").val() || "simple",
      // variationID = $bundlerWidget.find("input[name=variation_id]").val() || 0,
      regularPrice1 =
        $bundlerWidget
          .find("div[class='bdlr-product-container1']")
          .find('span[name^="product_cprice"]')
          .attr("value") || 0,
      salePrice1 =
        $bundlerWidget
          .find("div[class='bdlr-product-container1']")
          .find('span[name^="product_price"]')
          .attr("value") || 0,
      regularPrice2 =
        $bundlerWidget
          .find("div[class='bdlr-product-container2']")
          .find('span[name^="product_cprice"]')
          .attr("value") || 0,
      salePrice2 =
        $bundlerWidget
          .find("div[class='bdlr-product-container2']")
          .find('span[name^="product_price"]')
          .attr("value") || 0;

    if (productType1 == "variable") {
      var varArray1, attribute, value;

      $bundlerWidget
        .find("div[class='bdlr-product-container1']")
        .find(".custom-vari")
        .each(function (index) {
          varArray1 = [];

          $(this)
            .find(".option")
            .each(function (index) {
              attribute = $(this).data("attribute_name");
              value = $(this).val();
              varArray1.push({
                attribute: attribute,
                value: value,
              });
            });
        });

      varArray1 = JSON.stringify(varArray1);
    }

    if (productType2 == "variable") {
      var varArray2, attribute, value;

      $bundlerWidget
        .find("div[class='bdlr-product-container2']")
        .find(".custom-vari")
        .each(function (index) {
          varArray2 = [];

          $(this)
            .find(".option")
            .each(function (index) {
              attribute = $(this).data("attribute_name");
              value = $(this).val();
              varArray2.push({
                attribute: attribute,
                value: value,
              });
            });
        });
      varArray2 = JSON.stringify(varArray2);
    }

    var ajax_url;
    var data = {
      nonce: nonce,
      product_id1: productID1,
      product_id2: productID2,
      var_array1: varArray1,
      var_array2: varArray2,
    };

    ajax_url = woocommerce_params.wc_ajax_url
      .toString()
      .replace("%%endpoint%%", "bdlr_add_bundle_to_cart");

    var cart_redirect = bdlrData.bundle_cart_redirect;
    var checkout_redirect = bdlrData.bundle_checkout_redirect;

    $(document.body).trigger("adding_to_cart", [$atcButton, data]);

    $.ajax({
      url: ajax_url,
      type: "POST",
      dataType: "json",
      data: data,
      beforeSend: function (response) {
        $atcButton.removeClass("added").addClass("loading");
      },
      complete: function (response) {
        $atcButton.addClass("added").removeClass("loading");
        $(document.body).trigger("wc_reload_fragments");
        // console.log("complete " + JSON.stringify(response.responseJSON));
      },
      success: function (response) {
        if (response.error) {
          alert(response.message);
          return;
        }
        $(document.body).trigger("added_to_cart", [
          response.fragments,
          response.cart_hash,
          $atcButton,
        ]);
        if (checkout_redirect) {
          if (checkout_redirect == "on")
            window.location = bdlrData.woo_checkout_url;
          else if (cart_redirect) {
            if (cart_redirect == "on") window.location = bdlrData.woo_cart_url;
          }
        } else if (cart_redirect) {
          if (cart_redirect == "on") window.location = bdlrData.woo_cart_url;
        } else if (bdlrData.cart_redirect == "on")
          window.location = bdlrData.woo_cart_url;
      },
    });
  }

  /**
   * Event listeners
   */

  /* action after add bundle to cart button is clicked */
  $(".bdlr-button").on("click", function (e) {
    var $atcButton = $(this);
    var $bundlerWidget = $(document).find("div.bdlr_bundle_widget");

    if ($bundlerWidget.length) {
      e.preventDefault();
      addBundleToCart($atcButton, $bundlerWidget);
    }
  });
});

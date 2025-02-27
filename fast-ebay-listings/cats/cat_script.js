jQuery(document).ready(function($) {
  var $fu_ebay_category_input = null;
  const { __, _x, _n, _nx } = wp.i18n;

  function clearLists(listIdx) {
    for (var i = listIdx; ; ++i) {
      var cat_list = jQuery("#fu_ebay_cat_list_l" + i);
      if (cat_list.length == 0) break;
      cat_list.empty();
    }
  }

  function loadList(listIdx, parentCat = 0) {
    clearLists(listIdx);

    var $cat_list = jQuery("#fu_ebay_cat_list_l" + listIdx);
    var $cat_list_loading = jQuery("#fu_ebay_cat_list_loading_l" + listIdx);
    jQuery.ajax({
      type : "post",
      url : fu_ebay_adminurl,
      data : {
        action : "fu_ebay_load_categories",
        fu_ebay_catid : parseInt(parentCat),
        fu_ebay_getChildren : 1,
        fu_ebay_getSiblings: 0,
        fu_ebay_getParents: 0,
        nonce : fu_ebay_catnonce,
      },
      beforeSend: function() {
        $($cat_list_loading).addClass("active");
      },
      success : function( response ) {
        response.forEach(cat => {
          $cat_list.append(new Option(cat.name + (cat.childCount > 0 ? " ->" : ""), cat.id));
        });
        $($cat_list_loading).removeClass("active");
      },
      error: function(e) {
        console.log(__("deferred loading error:", "fast-ebay-listings") + e);
      }
    });
  }

  function loadListForCat(catId) {
    const { groups: { id1, name, id2, id3 } } = /(?<id1>\d+)(?<name> ".*")*[,\s]*(?<id2>[\d\s]+)*[,\s]*(?<id3>[\d\s]+)*/.exec(catId);
    clearLists(1);

    jQuery.ajax({
      type : "post",
      url : fu_ebay_adminurl,
      data : {
        action : "fu_ebay_load_categories",
        fu_ebay_catid : parseInt(id1),
        fu_ebay_getChildren : 1,
        fu_ebay_getSiblings: 1,
        fu_ebay_getParents: 1,
        nonce : fu_ebay_catnonce,
      },
      beforeSend: function() {
        $('[id^=fu_ebay_cat_list_loading_l]').addClass("active");
      },
      success : function( response ) {
        if (typeof response == "string") {
          $("#fu_ebay_cat_popup_chosen").val(response);
          loadList(1);
        }
        else {
          response.forEach(cat => {
            jQuery("#fu_ebay_cat_list_l" + cat.depth).append(new Option(cat.name + (cat.childCount > 0 ? " ->" : ""), cat.id, cat.selected, cat.selected));
          });
        }
        $('[id^=fu_ebay_cat_list_loading_l]').removeClass("active");
      },
      error: function(e) {
        console.log(__("deferred loading error:", "fast-ebay-listings") + e);
      }
    });
  }

  // Open the category chooser popup
  $("body").on("click", ".fu_ebay_category_input, .mce-fu_ebay_category_input", function() {
    if ($fu_ebay_category_input != null) return;
    $("#fu_ebay_cat_popup_overlay, #fu_ebay_cat_popup_content").addClass("active");
    $fu_ebay_category_input = this;
    catId = $fu_ebay_category_input.value;
    $("#fu_ebay_cat_popup_chosen").val(catId);
    if (catId != null && catId.length > 0)
      loadListForCat(catId);
    else
      loadList(1);
  });

  // Category selected
  $('[id^=fu_ebay_cat_list_l]').on('click', function() {
    idx = parseInt($(this).attr('cat_depth'));
    catName = $("option:selected", this).text();
    catId = this.value;

    if (catId.length > 0) {
      if (catName.endsWith(" ->")) {
        if (catId != $("#fu_ebay_cat_popup_chosencatid").val())
          loadList(idx+1, catId);
        catName = catName.slice(0, -3);
      }
      else {
        clearLists(idx+1);
      }

      $("#fu_ebay_cat_popup_chosen").val(catId + ' "' + catName + '"');
      $("#fu_ebay_cat_popup_chosencatid").val(catId);
    }
  });

  // Blank the chosen category
  $("#fu_ebay_cat_popup_clearchosen").on("click", function() {
    $("#fu_ebay_cat_popup_chosen").val("");
    $("#fu_ebay_cat_popup_chosencatid").val("");
  });  
  
  // Close the category chooser popup and pass back value to original input element.
  $("#fu_ebay_cat_popup_close").on("click", function() {
    $("#fu_ebay_cat_popup_overlay, #fu_ebay_cat_popup_content").removeClass("active");

    var nativeInputValueSetter = Object.getOwnPropertyDescriptor(window.HTMLInputElement.prototype, "value").set;
    nativeInputValueSetter.call($fu_ebay_category_input, $("#fu_ebay_cat_popup_chosen").val());
    var ev2 = new Event('input', { bubbles: true});
    $fu_ebay_category_input.dispatchEvent(ev2);
    $fu_ebay_category_input = null;
  });

  // Cancel the category chooser popup
  $("#fu_ebay_cat_popup_cancel").on("click", function() {
    $("#fu_ebay_cat_popup_overlay, #fu_ebay_cat_popup_content").removeClass("active");
    $fu_ebay_category_input = null;
  });

});

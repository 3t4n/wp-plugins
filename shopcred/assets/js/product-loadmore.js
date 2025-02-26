; (function ($) {
    "use strict";
    $ = jQuery;

    // woo products js starts
    var wrap = $('.wp-block-spc-woo-product');
    var btn = wrap.find(".spc-woo-product-loadmore-btn")
    var productWrapper = wrap.find(".spc-woo-product-items")

    var btnText = btn.text();
    var page = 2;
    var loadMoreClickCount = 0;
    var prevFilterObject = null;  // Track the previous state of filterObject

    $(btn).on("click", function (e) {
        e.preventDefault();
        var loadMoreBtnAttr = JSON.parse($(".spc-woo-product-loadmore-btn").attr("data-attributes"));
        // console.log(loadMoreBtnAttr);

        var check_filter_attr_exist_in_json = "filterAttr";
        if(check_filter_attr_exist_in_json in loadMoreBtnAttr) {
            // console.log("filter attr found");

            var filterObject = loadMoreBtnAttr[check_filter_attr_exist_in_json];
            // Check if there is a change in filterObject
            if (!isEqual(prevFilterObject, filterObject)) {
                // console.log("I am here");
                page = 2;  // Reset page to 2
            }
            // Loop through keys in filterAttr object
            for (var key in filterObject) {
                if (filterObject.hasOwnProperty(key)) {
                    var value = filterObject[key];

                    // Check if the key is "queryByTitle" and the value is not-empty
                    if (key === "queryByTitle" && value !== "") {
                        // console.log("User searched with title");
                        loadMoreClickCount = 1;
                    }
                    // Check if the value is an array and log its length
                    else if (Array.isArray(value)) {
                        // console.log(key + " count:", value.length);
                        loadMoreClickCount = 1;
                    }
                    // Check if the value is an object and log the count of its keys
                    else if (typeof value === 'object') {
                        // console.log(key + " test count:", Object.keys(value).length);
                        loadMoreClickCount = 1;
                    }
                }
            }

            // Update the previous state of filterObject
            prevFilterObject = { ...filterObject };
        } else {
            // page = page;
            // console.log("filter attr not found");
        }

        $.ajax({
            url: spc_localize_ajax.ajax_url,
            type: 'POST',
            // dataType: "json",
            data: {
                action: "spc_product_loadmore",
                paged: page,
                per_page: 6,
                attributes: JSON.parse($(".spc-woo-product-loadmore-btn").attr("data-attributes")) || [],
                blockId: btn.data('blockid'),
                nonce: spc_localize_ajax.security
            },
            beforeSend: function (xhr) {
                btn.text('Loading...');

            },
            success: function (html) {
                var searchString = "<h2 class='notice-title'>Nothing Found to show...</h2>";
                // $(data).insertBefore(wrap.find('.spc-loadmore-insert-before'));
                if (html && !html.includes(searchString)) {
                    if (html.length > 0) {
                        btn.text(btnText);
                        // productWrapper.append(data.data);
                        wrap.find('article:last-of-type').after(html);
                        page++;
                        loadMoreClickCount = 0;

                        setTimeout(function () {

                        }, 10);
                    } else {
                        btn.remove();
                    }
                } else {
                    btn.remove();
                }

            },
            error: function (xhr) {
                console.log('Error occured.please try again ' + xhr.statusText + xhr.responseText);
            },
        });
    });

})(jQuery)

// Function to check if two objects are equal
function isEqual(obj1, obj2) {
    return JSON.stringify(obj1) === JSON.stringify(obj2);
}
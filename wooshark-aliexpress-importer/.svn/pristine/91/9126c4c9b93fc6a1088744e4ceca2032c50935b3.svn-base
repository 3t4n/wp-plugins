var hostname = "https://wooshark.website",
    imagesFromDescription = [],
    items = "",
    globalClientWebsite = "",
    globalClientKey = "",
    globalClientSecretKey = "",
    formsToSave = "",
    savedCategories = [],
    generalPreferences = items ? items.generalPreferences : {
        importSalePriceGeneral: !1,
        importDescriptionGeneral: !0,
        importReviewsGeneral: !0,
        importVariationsGeneral: !0,
        reviewsPerPage: 10,
        setMaximimProductStock: 0,
        importShippingCost: !1
    },
    images = [];

function getImages(e) {
    return e
}

function getItemSpecificfromTable(e, t) {
    var a = t,
        i = e.NameValueList.map(function(e) {
            return e.name
        });
    return a && a.length && a.forEach(function(t, a) {
        -1 == i.indexOf(t.attrName) && e.NameValueList.push({
            name: t.attrName || "-",
            visible: !0,
            variation: !1,
            value: [t.attrValue]
        })
    }), e
}

function getDescription(e, t) {
    fetch("https://cors-anywhere.herokuapp.com/https://aeproductsourcesite.alicdn.com/product/description/pc/v2/en_EN/desc.htm?productId=" + e + "&key=Hf26e350fe48d45d3be4a05ec8e1ac9d2y.zip&token=4cc39c331004aa3153fe1623ffdc10c4").then(e => e.text()).then(e => {
        t(e)
    }).catch(e => {
        t(!1)
    })
}

function getProductId(e) {
    var t = e.indexOf(".html");
    return e.substring(0, t).match(/\d+/)[0]
}
jQuery(document).on("click", "#goToExtension", function(e) {
    window.open("https://sharkdropship.com/aliexpress")
}), jQuery(document).on("click", "#close-1", function(e) {
    jQuery("#section-1").hide()
}), jQuery(document).on("click", "#close-2", function(e) {
    jQuery("#section-2").hide()
});
var currentSku = "";

function importProductGlobally(e, t) {
    try {
        e && (currentSku = e, jQuery(this).attr("disabled", !0), jQuery(".importToS").each(function(e, t) {
            jQuery(t).attr("disabled", !0)
        }), startLoading(), getProductDetailsFromServer(e, t))
    } catch (e) {
        jQuery(".importToS").each(function(e, t) {
            jQuery(t).attr("disabled", !1)
        }), displayToast("cannot retrieve product id, please try again, if the issue persists, please contact wooebayimporter@gmail.com", "red"), stopLoading()
    }
}

function searchProducts(e) {
    jQuery("#pagination").empty(), jQuery("#pagination").show(), jQuery("#product-search-container").empty();
    var t = getSelectedLanguage();
    jQuery(".loader2").css({
        display: "block",
        position: "fixed",
        "z-index": 9999,
        top: "50px",
        right: "50px",
        "border-radius": "35px",
        "background-color": "red"
    }), searchByKeyWord(searchKeyword, t, e)
}

function searchByKeyWord(e, t, a) {
    let i = jQuery("#searchKeyword").val(),
        r = jQuery('input[name="sort"]:checked')[0] ? jQuery('input[name="sort"]:checked')[0].value : "",
        o = jQuery("#highQualityItems").prop("checked"),
        n = jQuery("#isFreeShipping").prop("checked"),
        l = jQuery("#isFastDelivery").prop("checked"),
        s = getSelectedLanguage(),
        c = jQuery('input[name="currency"]:checked')[0] ? jQuery('input[name="currency"]:checked')[0].value : "";
    xmlhttp = new XMLHttpRequest, xmlhttp.onreadystatechange = function() {
        if (4 == xmlhttp.readyState)
            if (200 === xmlhttp.status) try {
                data = JSON.parse(xmlhttp.response).data;
                try {
                    var e = JSON.parse(data),
                        t = e.result.products;
                    t.forEach(function(e) {
                        e && e.packageType ? jQuery('<div class="card text-center" style="flex: 1 1 20%;border-radius: 10px">  <div class="card-body"><h5 class="card-title"> ' + e.productTitle.substring(0, 70) + '</h5><img src="' + e.imageUrl + '" width="300"  height="300"></img><div>Sale Price: <p class="card-text" style="color:red">' + e.salePrice + '</div></p>Sku: <p class="card-text" id="sku" ">' + e.productId + '</p><div><div><a  style="width:80%" id="importToShop" class="importToS btn btn-primary">Import to shop</a></div><div><a  style="width:80%; background-color: #c4c4e3 !important;font-size: 10px; margin-top:5px"" id="addToWaitingList " disabled class=" btn btn-primary disabled">Add to waiting list <span style="color:red">(PREMUIM)</span></a></div><div id="productUrlSelector"><a target="_blank" style="width:80%; margin-top:5px" href="' + e.productUrl + '" class="btn btn-primary">Product url</a></div><h5 style="margin-top:5px; color:red"> discount: ' + e.discount + '</h5><h5 style="margin-top:5px"> packageType: ' + e.packageType + '</h5><h5 style="margin-top:5px"> local Price: ' + e.localPrice + '</h5><h5 style="margin-top:5px; "> Product feedback: ' + e.evaluateScore + '</h5><h5 style="margin-top:5px; "> The number of sold products 30 days: ' + e.volume + "</h5></div></div></div>").appendTo("#product-search-container") : jQuery('<div class="card text-center" style="flex: 1 1 20%; margin:15px;border-radius: 10px;">  <div class="card-body"><h5 class="card-title"> ' + e.productTitle.substring(0, 70) + '</h5><img src="' + e.imageUrl + '" width="300"  height="300"></img><div>Sale Price: <p class="card-text" style="color:red">' + e.salePrice + '</div></p>Sku: <p class="card-text" id="sku" ">' + e.productId + '</p><div><div><a  style="width:80%; font-size:8px" id="importToShop" class="importToS btn btn-primary">Import to shop</a></div><div><a  style="width:80%; font-size: 10px; background-color: #c4c4e3 !important; margin-top:5px"" id="addToWaitingList " disabled class=" btn btn-primary disabled">Add to waiting list <span style="color:red">(PREMUIM)</span></a></div><div id="productUrlSelector"><a target="_blank" style="width:80%;font-size:8px; margin-top:5px" href="' + e.productUrl + '" class="btn btn-primary">Product url</a></div></div></div></div>').appendTo("#product-search-container")
                    }), displayPAginationForSearchByKeyword(e.result.totalResults, a), jQuery(".loader2").css({
                        display: "none"
                    }), t && t.length && getAlreadyImportedProducts(t.map(function(e) {
                        return e.productId
                    }))
                } catch (e) {
                    displayToast("Empty result for this search keyword", "red"), jQuery(".loader2").css({
                        display: "none"
                    }), displayPAginationForSearchByKeyword(1e3, a)
                }
            } catch (e) {
                jQuery(".loader2").css({
                    display: "none"
                }), displayPAginationForSearchByKeyword(1e3, a)
            } else displayToast("Error while getting results, please try again, if issue persist, please contact wooshark support ", "red"), jQuery(".loader2").css({
                display: "none"
            }), displayPAginationForSearchByKeyword(1e3, a)
    }, xmlhttp.open("POST", hostname + ":8002/searchAliExpressProductNewApi", !0), xmlhttp.setRequestHeader("Content-Type", "application/json"), xmlhttp.send(JSON.stringify({
        searchKeyword: i,
        pageNo: a,
        language: s,
        sort: r,
        highQualityItems: o,
        currency: c,
        isFreeShipping: n,
        isFastDelivery: l
    }))
}

function save_options(e, t, a, i) {}

function gettototitiName(e) {
    jQuery.ajax({
        url: wooshark_params.ajaxurl,
        type: "POST",
        dataType: "JSON",
        data: {
            action: "get_totottitiNAme"
        },
        success: function(t) {
            globalTitiToto = t, e(globalTitiToto)
        },
        error: function(e) {},
        complete: function() {}
    })
}

function loadOrders() {}

function getProductCountDraft() {
    jQuery.ajax({
        url: wooshark_params.ajaxurl,
        type: "POST",
        dataType: "JSON",
        data: {
            action: "getProductsCountDraft"
        },
        success: function(e) {
            let t = e;
            jQuery('.nav-item a[id="pills-draft-tab"]').html('Out of stock products <span class="badge badge-light">' + t + "</span>")
        },
        error: function(e) {
            displayToast(e.responseText, "red"), stopLoading()
        },
        complete: function() {
            stopLoading()
        }
    })
}

function getProductsCount() {
    jQuery.ajax({
        url: wooshark_params.ajaxurl,
        type: "POST",
        dataType: "JSON",
        data: {
            action: "getProductsCount"
        },
        success: function(e) {
            displayPaginationSection(totalproductsCounts = e, 1)
        },
        error: function(e) {
            displayToast(e.responseText, "red"), stopLoading()
        },
        complete: function() {
            stopLoading()
        }
    })
}

function displayToast(e, t, a) {
    jQuery.toast({
        text: e,
        textColor: "black",
        hideAfter: 7e3,
        icon: "red" == t ? "error" : "success",
        stack: 5,
        textAlign: "left",
        position: a ? "top-right" : "bottom-right"
    })
}

function isNotConnected() {
    jQuery("#not-connected").show(), jQuery("#connected").hide()
}
jQuery(document).on("click", ".product-page-item", function(e) {
    jQuery("#product-pagination").empty(), jQuery("#product-pagination").show(), jQuery(".loader2").css({
        display: "block",
        position: "fixed",
        "z-index": 9999,
        top: "50px",
        right: "50px",
        "border-radius": "35px",
        "background-color": "green"
    });
    var t = 1;
    try {
        t = parseInt(jQuery(this)[0].innerText), displayPaginationSection(totalproductsCounts, t), getAllProducts(t)
    } catch (e) {
        t = 1, displayToast("error while index selection, please contact wooshark, wooebayimporter@gmail.com", "red"), jQuery(".loader2").css({
            display: "none"
        })
    }
}), jQuery(document).on("click", ".page-item", function(e) {
    var t = 1;
    try {
        t = parseInt(jQuery(this)[0].innerText)
    } catch (e) {
        t = 1, displayToast("error while index selection, please contact wooshark, wooebayimporter@gmail.com", "red")
    }
    searchProducts(t)
}), jQuery(document).on("click", "#seachProductsButton", function(e) {
    searchProducts(1)
}), jQuery(document).on("click", "#discoverFeatures", function(e) {
    jQuery("#discoverFeatureContent").is(":hidden") ? jQuery("#discoverFeatureContent").show() : jQuery("#discoverFeatureContent").hide()
}), jQuery(document).on("click", "#displayConnectToStore", function(e) {
    jQuery("#connect-to-store").is(":hidden") ? jQuery("#connect-to-store").show() : jQuery("#connect-to-store").hide()
}), jQuery(document).on("click", "#importProductToShopByUrl", function(e) {
    jQuery("#asVariableAliex").show();
    var t = jQuery("#productUrl").val();
    if (globalUrlProduct = t, t) {
        var a = getProductId(t);
        prepareModal(), a ? importProductGlobally(a) : displayToast("Cannot get product sku", "red")
    }
}), jQuery(document).on("click", "#apply-connect-automatic", function(e) {}), jQuery(document).on("click", "#importProductToShopBySky", function(e) {
    jQuery("#asVariableAliex").show();
    var t = jQuery("#productSku").val();
    globalUrlProduct = "https://www.aliexpress.us/item/" + t + ".html", prepareModal(), t ? importProductGlobally(t) : displayToast("Cannot get product sku", "red")
}), jQuery(document).ready(function() {
    jQuery('.nav-item a[id="pills-advanced-tab"]').html(jQuery('.nav-item a[id="pills-advanced-tab"]').text() + '<span   class="badge badge-light"> <i class="fas fa-star"></i> </span>'), jQuery("#searchKeyword").val(""), restoreConfiguration(), getProductsCount(), searchByKeyWord("", "en", 1), getAllProducts(1)
});
var isAuthorizedUser = !1,
    currentProductId = "";
jQuery(document).on("click", "#insert-product-reviews", function(e) {
    currentProductId = jQuery(this).parents("tr")[0].cells[2].innerText
}), jQuery(".modal").on("hidden.bs.modal", function(e) {
    jQuery(this).removeData()
});
var index = 0;
jQuery(document).on("click", "#addReview", function(e) {
    console.log("hndle ui-sortable-handle", jQuery(".wp-heading-inline")), e.preventDefault(), jQuery("#table-reviews tbody").append('<tr><td style="width:65%"  contenteditable> <div id="editorReview' + index + '"> </div> </td><td contenteditable style="width:10%"> test@test.com </td></td><td contenteditable style="width:10%">' + getUsername() + '</td><td contenteditable style="width:10%">' + (new Date).toISOString().slice(0, 10) + '</td></td><td style="width:5%"><input style="width:100%" type="number" min="1" max="5" value="5"></td><td><button class="btn btn-danger" id="removeReview">X</button></td></tr>'), jQuery("#table-reviews tr td[contenteditable]").css({
        border: "1px solid #51a7e8",
        "box-shadow": "inset 0 1px 2px rgba(0,0,0,0.075), 0 0 5px rgba(81,167,232,0.5)"
    })
});
let totalproductsCounts = 1;

function displayPAginationForSearchByKeyword(e, t) {
    var a = Math.round(e / 40);
    a > 17 && (a = 17);
    for (var i = 1; i < a; i++) i == t ? jQuery(' <li style="color:red" id="page-' + i + '" class="page-item"><a style="color:red" class="page-link">' + i + "</a></li>").appendTo("#pagination") : jQuery(' <li id="page-' + i + '" class="page-item"><a class="page-link">' + i + "</a></li>").appendTo("#pagination")
}

function displayPaginationSection(e, t) {
    let a = Math.ceil(e / 20);
    a > 20 && (a = 20);
    for (var i = 1; i < a + 1; i++) i == t ? jQuery(' <li style="color:red" id="product-page-' + i + '" class="product-page-item"><a style="color:red" class="page-link">' + i + "</a></li>").appendTo("#product-pagination") : jQuery(' <li id="product-page-' + i + '" class="product-page-item"><a class="page-link">' + i + "</a></li>").appendTo("#product-pagination");
    jQuery('.nav-item a[id="pills-connect-products"]').html('products <span class="badge badge-light">' + e + "</span>")
}

function getAllProducts(e) {
    jQuery.ajax({
        url: wooshark_params.ajaxurl,
        type: "POST",
        dataType: "JSON",
        data: {
            action: "get_all_products",
            paged: e
        },
        success: function(e) {
            if (e) {
                var t = jQuery("#products-wooshark");
                t.find("tbody tr").remove(), e.forEach(function(e, a) {
                    e.lastUpdated, t.append("<tr><td ><img style='border:1px solid grey' width='80px' height='80px' src=" + e.image + "></img></td><td>" + e.sku + "</td><td>" + e.id + "</td> <td>" + e.title.substring(0, 50) + ' <div style="color:blue"> ( ' + e.status + " ) </div></td><td><button class='btn btn-primary' ><a style='color:white' href=" + e.productUrl + "  target='_blank'> Original product url </a></button></td><td><button class='btn btn-primary' style='width:100%' id='sync-product-stock-and-price' disabled><a style='color:white'  target='_blank' > Update product stock and price <small style='color:red'> PREMUIM</small> </a></button></td><td><button class='btn btn-default disabled' id='insert-product-reviews' style='width:100%'><a style='color:white'  data-toggle='modal' data-target='#myModalReviews'> Insert Reviews <small style='color:red'>(PREMUIM) </small> </a></button></td></tr>")
                })
            }
        },
        error: function(e) {
            displayToast(e.responseText, "red"), stopLoading()
        },
        complete: function() {
            stopLoading()
        }
    })
}

function startLoading(e) {
    e || (e = "loader2"), jQuery("." + e).css({
        display: "block",
        position: "fixed",
        "z-index": 9999,
        top: "50px",
        right: "50px",
        "border-radius": "35px",
        "background-color": "black"
    })
}

function stopLoading(e) {
    e || (e = "loader2"), jQuery("." + e).css({
        display: "none"
    })
}

function prepareDataFormat(e, t, a, i) {
    return e && e.variations && e.NameValueList && e.variations.length && e.NameValueList.length ? (e.NameValueList.forEach(function(e) {
        e.name && (e.name = e.name.toLowerCase().replace(/ /g, "-")), e.values = e.value
    }), e.variations.forEach(function(e) {
        e.attributesVariations && e.attributesVariations.forEach(function(e) {
            e.name && (e.name = e.name.toLowerCase().replace(/ /g, "-"))
        }), e.regularPrice && jQuery("#applyPriceFormulawhileImporting").prop("checked") && (e.regularPrice = calculateAppliedPrice(e.regularPrice)), e.salePrice && jQuery("#applyPriceFormulawhileImporting").prop("checked") && (e.salePrice = calculateAppliedPrice(e.salePrice)), e.availQuantity = parseInt(e.availQuantity), e.identifier = ""
    }), e) : e && e.variations && e.variations.length && 1 == e.variations.length ? {
        NameValueList: [{
            name: "color",
            values: ["Standard"],
            variation: !0,
            visible: !0
        }],
        variations: [{
            SKU: e.variations[0].SKU,
            regularPrice: e.variations[0].regularPrice,
            salePrice: e.variations[0].salePrice,
            availQuantity: e.variations[0].availQuantity,
            attributesVariations: [{
                name: "color",
                value: "Standard"
            }]
        }]
    } : void 0
}

function getProductDetailsFromServer(e) {
    var t = getSelectedLanguage(),
        a = jQuery('input[name="currency"]:checked')[0] ? jQuery('input[name="currency"]:checked')[0].value : "USD",
        i = new XMLHttpRequest;
    i.onreadystatechange = function() {
        if (4 == this.readyState)
            if (200 === this.status) {
                if (a = JSON.parse(this.response).data) {
                    var t = [];
                    jQuery(".categories input:checked").each(function() {
                        t.push(jQuery(this).attr("value").trim())
                    }), waitingListProducts = [], jQuery(".importToS").each(function(e, t) {
                        jQuery(t).attr("disabled", !1)
                    }), jQuery("#importModal").click(), stopLoading(), fillTheForm(a, e)
                }
            } else {
                var a = JSON.parse(this.response).data;
                jQuery(".importToS").each(function(e, t) {}), displayToast("Cannot insert product into shop " + a, "red"), stopLoading()
            }
    }, i.open("POST", hostname + ":8002/getProductDEtailsFRomOurInternalApi", !0), i.setRequestHeader("Content-Type", "application/json"), i.send(JSON.stringify({
        sku: e,
        language: t,
        isBasicVariationsModuleUsedForModalDisplay: !0,
        currency: a,
        store: document.location.origin,
        activationCode: jQuery("#licenseValue").val()
    }))
}

function getCategories(e) {
    jQuery.ajax({
        url: wooshark_params.ajaxurl,
        type: "POST",
        dataType: "JSON",
        data: {
            action: "get_categories"
        },
        success: function(t) {
            savedCategories = t, e()
        },
        error: function(t) {
            displayToast(t.responseText, "red"), stopLoading(), e()
        },
        complete: function() {
            stopLoading(), e()
        }
    })
}

function getCreationDate(e) {
    e = dates[Math.floor(Math.random() * dates.length)];
    var t = dates.indexOf(e);
    return dates.splice(t, 1), e
}

function getUsername() {
    var e = names[Math.floor(Math.random() * names.length)],
        t = names.indexOf(e);
    return names.splice(t, 1), e
}
jQuery(document).on("click", "#select-category", function(e) {
    jQuery(".categories").is(":hidden") ? (jQuery(".categories").show(), getCategories(function() {})) : jQuery(".categories").hide()
});
var names = ["Craig Piro", "Cindi Mcfarlin", "Maximilien Chopin", "Alfonso Villapol", "Gayla Tincher", "Lelah Pelosi", "Kholmatzhon Daniarov", "Klemens Totleben", "Émeric Figuier", "Joseph Garreau", "Moriya Masanobu", "Fernand Aveline", "Germain Beaumont", "Finn Junkermann", "Benoît Cortot", "Kawano Tanyu", "Gérald Noir", "Lisabeth Brennen", "Jaqueline Phipps", "Roderick Roth", "Adella Tarry", "Rudolf Kirsch", "Fritz Filippi", "Gérald Courbet", "Dastan Nurbolatev", "Oscar Álvarez", "Devon Huntoon", "Marlen Akhmetov", "Cassey Odle", "Patty Balser", "Néo Lortie", "Dieter Krist", "Speranzio Bartolone", "Iside Casaletto", "Durante Sciara", "Ildefonso Sollami", "Xose Mendez", "Vladimiro De Angelo", "Gianmaria De Sario", "Anacleto Adornetto", "Sigmund Bruckmann", "Valtena Amodei", "Liberatore Accordino", "Alfredo Lamanna", "Kemberly Roza", "Lluciano Marcos", "Fukumoto Shusake", "Branda Goshorn", "Isadora Heer", "Micael Montes", "Derrick Sclafani", "Thibault Silvestre", "Wendelin Jonas", "Coleen Dragon", "Ted Basye", "Emmanuel Gillie", "Lorean Soni", "Reiko Jeanlouis", "Olevia Lauder", "Savannah Brotherton", "Franchesca Schwebach", "Chae Jiang", "Jaimee Harter", "Windy Milnes", "Takako Ream", "Zoraida Swick", "Mammie Aguiniga", "Wendi Raver", "Clarita Pursell", "Diedra Spath", "Tandy Hoyte", "Lanie Edwin", "Marchelle Dowden", "Susann Masson", "Jannette Wilmes", "Lakisha Mullenix", "Shanda Gatling", "Kathi Okamura", "Ellie Julius", "Demarcus Mcmullen", "Major Woodrum", "Alpha Um", "Prudence Rodden", "Shante Dezern", "Emma Carra", "Starr Lheureux", "Verline Cordon", "Carla Poole", "Alisa Watts", "Maariya Kramer", "Aamir Boyd", "Antonio Levine", "Della Drew", "Miriam Perry", "Sarina Santos", "Armaan Ellison", "Graham Rankin", "Aasiyah Haney", "Debbie Tanner", "Yuvraj Wolf", "Eleri Barnes", "Ira Forster", "Gage Edmonds", "Nour Hartman", "Niam Mullins", "Mahi Reid", "Winston Hyde", "Rosalie Robertson", "Samirah Hood", "Bonnie Montes", "Aliya Fernandez", "Renesmae Knapp", "Enrique Lutz", "Korey Wu", "Andrea Xiong", "Daanyal Shepard", "Efan Wharton"];

function insertReviewsIntoWordpress(e, t) {
    startLoading(), jQuery.ajax({
        url: wooshark_params.ajaxurl,
        type: "POST",
        dataType: "JSON",
        data: {
            action: "insert-reviews-to-productRM",
            post_id: t,
            reviews: e
        },
        success: function(e) {
            e && !e.error && e.insertedSuccessfully && e.insertedSuccessfully.length ? displayToast(e.insertedSuccessfully.length + " reviews are imported successfully", "black") : displayToast("Error while uploading reviews.", "red"), stopLoading(), jQuery("#table-reviews tbody").empty()
        },
        error: function(e) {
            stopLoading(), e && e.responseText && displayToast(e.responseText, "red")
        }
    })
}
jQuery(document).on("click", "#confirmReviewInsertion", function(e) {
    e.preventDefault();
    var t = getReviews();
    postId = currentProductId, postId ? insertReviewsIntoWordpress(t, postId) : displayToast("cannot get post id, please contact wooshark", "red")
});
var dates = ["2018-10-26", "2019-1-1", "2018-11-15", "2018-11-6", "2019-01-7", "2019-1-13", "2019-2-12", "2019-1-17", "2018-2-19", "2019-3-16", "2019-1-14", "2018-2-25", "2019-3-5", "2018-1-18", "2019-2-22", "2018-1-11", "2018-12-12", "2018-11-8", "2019-1-2", "2019-01-13", "2019-05-19", "2019-04-29", "2019-06-12", "2019-07-01", "2019-06-23", "2019-05-24", "2018-10-29", "2019-3-3", "2019-1-7", "2018-10-27", "2019-2-17", "2019-05-24", "2019-06-06", "2019-06-19", "2019-06-22", "2019-06-13", "2019-05-13", "2019-07-01", "2019-04-25", "2019-04-04", "2019-05-05", "2019-05-19", "2019-06-01", "2019-05-27", "2019-03-27", "2019-04-01", "2019-05-30", "2019-06-04"];

function getReviews() {
    var e = jQuery("#customReviews tbody tr"),
        t = [];
    return e.each(function(e, a) {
        e && t.push({
            review: a.cells[0].innerHTML || "-",
            rating: jQuery(a).find("input").val() || 5,
            datecreation: a.cells[2].outerText,
            username: a.cells[1].outerText || "unknown",
            email: a.cells[4].outerText && !a.cells[4].outerText.includes("emailNotVisible@unknown.com") ? a.cells[4].outerText : "emailNotVisible@unknown.com"
        })
    }), t
}
jQuery(document).on("click", "#removeReview", function(e) {
    let t = jQuery(this).parents("tr").index();
    jQuery(this).parents("tr").remove(), quillsArray.splice(t, 1)
}), jQuery(document).on("click", "#searchBySku", function(e) {
    jQuery("#product-pagination").empty(), jQuery(".loader2").css({
        display: "block",
        position: "fixed",
        "z-index": 9999,
        top: "50px",
        right: "50px",
        "border-radius": "35px",
        "background-color": "red"
    });
    let t = jQuery("#skusearchValue").val();
    t ? jQuery.ajax({
        url: wooshark_params.ajaxurl,
        type: "POST",
        dataType: "JSON",
        data: {
            action: "search-product-by-sku",
            searchSkuValue: t
        },
        success: function(e) {
            if (stopLoading(), e) {
                var t = jQuery("#products-wooshark");
                t.find("tr:not(.thead)").remove(), e.forEach(function(e, a) {
                    t.append("<tr><td ><img style='border:1px solid grey' width='80px' height='80px' src=" + e.image + "></img></td><td>" + e.sku + "</td><td>" + e.id + "</td> <td>" + e.title.substring(0, 50) + ' <div style="color:blue"> ( ' + e.status + " ) </div></td><td><button class='btn btn-primary' ><a style='color:white' href=" + e.productUrl + "  target='_blank'> Original product url </a></button></td><td><button class='btn btn-primary' id='sync-product-stock-and-price' disabled><a style='color:white'  target='_blank'  > Update product stock and price <small style='color:red'> PREMUIM</small> </a></button></td><td><button class='btn btn-success' id='insert-product-reviews' style='width:100%'><a style='color:white'  data-toggle='modal' data-target='#myModalReviews'> Insert Reviews </a></button></td></tr>")
                })
            }
        },
        error: function(e) {
            e && e.responseText && displayToast(e.responseText, "red"), stopLoading()
        },
        complete: function() {
            stopLoading()
        }
    }) : getAllProducts(1)
});
var quill, quillsArray = [];

function handleServerResponseReviews(e) {
    200 === e ? (displayToast("Reviews imported successfully", "black"), jQuery(".loader2").css({
        display: "none"
    })) : (displayToast("Error while inserting the product", "red"), jQuery(".loader2").css({
        display: "none"
    }))
}

function importProductGloballyBulk(e, t) {
    try {
        e && (currentSku = e, jQuery(this).attr("disabled", !0), jQuery(".importToS").each(function(e, t) {
            jQuery(t).attr("disabled", !0)
        }), startLoading(), getProductDetailsFromServerBulk(e, t))
    } catch (e) {
        jQuery(".importToS").each(function(e, t) {
            jQuery(t).attr("disabled", !1)
        }), displayToast("cannot retrieve product id, please try again, if the issue persists, please contact wooebayimporter@gmail.com", "red"), stopLoading()
    }
}

function getSelectedLanguage() {
    return jQuery('input[name="language"]:checked')[0] ? jQuery('input[name="language"]:checked')[0].value : "en"
}

function getProductDetailsFromServerBulk(e) {
    var t = getSelectedLanguage(),
        a = jQuery('input[name="currency"]:checked')[0] ? jQuery('input[name="currency"]:checked')[0].value : "USD",
        i = new XMLHttpRequest;
    i.onreadystatechange = function() {
        if (4 == this.readyState)
            if (200 === this.status) {
                if (i = JSON.parse(this.response).data) {
                    var t = [];
                    jQuery(".categories input:checked").each(function() {
                        t.push(jQuery(this).attr("value").trim())
                    });
                    var a = t;
                    waitingListProducts = [], jQuery(".importToS").each(function(e, t) {
                        jQuery(t).attr("disabled", !1)
                    }), stopLoading();
                    let r = jQuery("#textToBeReplaced").val(),
                        o = jQuery("#textToReplace").val(),
                        n = i.title,
                        l = i.description;
                    r && o && (n = i.title.replace(r, o), l = i.description.replace(r, o)), addToWaitingList({
                        title: n,
                        description: l,
                        images: i.images,
                        variations: prepareDataFormat(i.variations, i.currentPrice, i.originalPrice, i.totalAvailQuantity),
                        productUrl: i.productUrl,
                        productCategoies: a,
                        importSalePrice: !0,
                        simpleSku: e.toString(),
                        featured: !0,
                        mainImage: i.mainImage
                    })
                }
            } else try {
                var i = JSON.parse(this.response).data;
                jQuery(".importToS").each(function(e, t) {
                    jQuery(t).attr("disabled", !1)
                }), displayToast("Cannot insert product into shop " + i, "red"), stopLoading()
            } catch (e) {
                jQuery(".importToS").each(function(e, t) {
                    jQuery(t).attr("disabled", !1)
                }), displayToast("Cannot get product details, please try again", "red"), stopLoading()
            }
    }, i.open("POST", hostname + ":8002/getProductDEtailsFRomOurInternalApi", !0), i.setRequestHeader("Content-Type", "application/json"), i.send(JSON.stringify({
        sku: e,
        language: t,
        isBasicVariationsModuleUsedForModalDisplay: !1,
        currency: a,
        store: document.location.origin,
        activationCode: jQuery("#licenseValue").val()
    }))
}

function getHtmlDescription(e) {
    if (e) {
        var t = e.indexOf("window.adminAccountId");
        e = e.substring(0, t)
    }
    imagesFromDescription = jQuery("img"), jQuery("#descriptionContent").html(e), quill = new Quill("#editorDescription", {
        modules: {
            toolbar: [
                ["bold", "italic", "underline", "strike"],
                ["blockquote", "code-block"],
                [{
                    header: 1
                }, {
                    header: 2
                }],
                [{
                    list: "ordered"
                }, {
                    list: "bullet"
                }],
                [{
                    script: "sub"
                }, {
                    script: "super"
                }],
                [{
                    indent: "-1"
                }, {
                    indent: "+1"
                }],
                [{
                    direction: "rtl"
                }],
                [{
                    size: ["small", !1, "large", "huge"]
                }],
                [{
                    header: [1, 2, 3, 4, 5, 6, !1]
                }],
                [{
                    color: []
                }, {
                    background: []
                }],
                [{
                    font: []
                }],
                [{
                    align: []
                }],
                ["clean"]
            ]
        },
        theme: "snow"
    })
}

function getAttributes(e) {
    jQuery("#table-attributes tbody tr").remove(), jQuery("#table-variations thead tr").remove(), jQuery("#table-variations tbody tr").remove();
    var t = e.NameValueList;
    attributesNamesArray = t.map(function(e) {
        return e.name
    });
    var a = "",
        i = "";
    t && t.length && (t.forEach(function(e) {
        e.name && (a = "<td>" + e.name + '</td><td style="width:50%" contenteditable><span> ' + e.value + "</span></td>", i = i + '<td  name="' + e.name + '">' + e.name + "</td>"), jQuery("#table-attributes tbody").append(jQuery("<tr>" + a + '<td><button id="removeVariations" class="btn btn-danger">X</btton><td></tr>'))
    }), jQuery("#table-variations thead").append(jQuery("<tr><td>Image</td>" + i + "<td style='font-weight: 800'>quantity</td><td style='font-weight: 800'>Price</td><td style='font-weight: 800'>Sale price</td><td style='font-weight: 800'>ASIN</td><td>Title</td><td style='font-weight: 800'>Remove</td><td><button disabled id='' class='button-5' style='width:220px'>Import All as simple <small style='color:red'>Premuim</small> <span class='newLoaderAllSimple'></span></button></td><td><button disabled id='' class='button-6' style='width:220px;'>Import All as affiliate <small  style='color:red'>Premuim</small> <span class='newLoaderAllAffiliate'></span></button></td></tr>")))
}
let titleAttribtues = "";

function getVariations(e, t) {
    e && e.length ? (jQuery("#applyPriceFormula").show(), jQuery("#applyPriceFormulaRegularPrice").show(), jQuery("#importSalePricecheckbox").show(), jQuery("#applyCharmPricingConainer").show(), jQuery("#priceContainer").hide(), jQuery("#skuContainer").hide(), jQuery("#productWeightContainer").hide(), jQuery("#productType").text("Variable Product"), jQuery("#no-variations").hide(), e && e.length > 100 && displayToast("This product has more " + e.length + " variations, only the first 100 variations will be imported", "orange"), e.forEach(function(e) {
        let t = [];
        if (e && e.attributesVariations && e.attributesVariations.length) {
            var a = "";
            e.attributesVariations && e.attributesVariations.length && e.attributesVariations[0] && e.attributesVariations[0].name && e.attributesVariations[0].image ? (t = [e.attributesVariations[0].image], a = a + '<td><img height="50px" width="50px" src="' + e.attributesVariations[0].image + '"></td>') : e.attributesVariations && e.attributesVariations.length && e.attributesVariations[1] && e.attributesVariations[1].name && e.attributesVariations[1].image ? (a = a + '<td><img height="50px" width="50px" src="' + e.attributesVariations[1].image + '"></td>', t = [e.attributesVariations[1].image]) : e.attributesVariations && e.attributesVariations.length && e.attributesVariations[2] && e.attributesVariations[2].name && e.attributesVariations[2].image ? (t = [e.attributesVariations[2].image], a = a + '<td><img height="50px" width="50px" src="' + e.attributesVariations[2].image + '"></td>') : a += "<td></td>", e.attributesVariations.forEach(function(e, t) {
                titleAttribtues = titleAttribtues + " - " + e.name + " : " + e.value, a = a + '<td contenteditable name="' + e.name + '">' + e.value + "</td>"
            });
            var i = e.regularPrice || e.salePrice,
                r = e.salePrice || e.regularPrice;
            jQuery("#productWeight").val();
            a = a + "<td id='singleQuantity' contenteditable>" + e.availQuantity + "</td><td id='singleRegularPrice' contenteditable>" + i + "</td><td id='singleSalePrice' contenteditable>" + r + '</td><td id="singleAsin" contenteditable>' + e.SKU + '</td><td id="singleTitle" contenteditable>' + titleAttribtues + '</td><td><button id="removeVariation"style="background-color:red" class="button-5">X</button></td><td><button id="insertProductAsSimple" class="button-5" style="width:220px">Import As simple Product <span class="newLoaderSimple"></span> </button></td><td><button id="insertProductAsAffiliate" class="button-6" style="width:220px">Import As Affiliate Product <span class="newLoaderAffiliate"></span> </button></td><td id="singleImages" style="display:none">' + t + "</td>", jQuery("#table-variations tbody").append(jQuery("<tr>" + a + "</tr>")), jQuery("#table-variations tr td[contenteditable]").css({
                border: "1px solid #51a7e8",
                "box-shadow": "inset 0 1px 2px rgba(0,0,0,0.075), 0 0 5px rgba(81,167,232,0.5)"
            })
        }
    }), applyPriceFormulaDefault()) : (jQuery("#simpleSku").val(t), jQuery('[href="#menu5"]').closest("li").hide(), jQuery("#no-variations").show(), jQuery("#applyPriceFormula").hide(), jQuery("#applyPriceFormulaRegularPrice").hide(), jQuery("#importSalePricecheckbox").hide(), jQuery("#applyCharmPricingConainer").hide(), jQuery("#priceContainer").show(), jQuery("#skuContainer").show(), jQuery("#productType").text("Simple Product"))
}
jQuery(document).on("click", "#importToShop", function(e) {
    prepareModal(), productId = jQuery(this).parents(".card").find("#sku")[0].innerText, productId ? importProductGlobally(productId) : displayToast("Cannot get product sku", "red"), globalUrlProduct = jQuery(this).parents(".card").find("#productUrlSelector a").attr("href")
});
let currentProductModalDisplayed = "",
    currentPageReviews = 1;

function getShippingCost(e) {
    var t = new XMLHttpRequest;
    jQuery("#table-shipping tbody").empty();
    let a = jQuery('input[name="destination"]:checked').val();
    t.onreadystatechange = function() {
        if (4 == t.readyState && 200 === t.status) {
            let e = t.response,
                a = "";
            try {
                let t = JSON.parse(e).data;
                t && t.length && t.forEach(function(e, t) {
                    a = e.deliveryData || "information not availble", 0 == t ? jQuery("#table-shipping tbody").append('<tr><td style="width:24%" >  ' + e.company + '  </td><td  style="width:24%">' + a + '</td><td  style="width:24%" class="selectedshippingCostValue" >' + e.cost.value + e.cost.currency + '</td><td  style="width:24%"> <input  name="selectedShippingCost" value=' + t + ' checked type="radio" /></td></tr>') : jQuery("#table-shipping tbody").append('<tr><td style="width:24%" >  ' + e.company + '  </td><td  style="width:24%">' + a + '</td><td  style="width:24%" class="selectedshippingCostValue">' + e.cost.value + e.cost.currency + '</td><td style="width:24%"> <input  name="selectedShippingCost" value=' + t + ' type="radio" /></td></tr>')
                })
            } catch (e) {}
        }
    }, t.open("POST", hostname + ":8002/getAliExpressShippingCost", !0), t.setRequestHeader("Content-Type", "application/json"), t.send(JSON.stringify({
        productId: e,
        currency: jQuery('input[name="currency"]:checked').val(),
        destination: a
    }))
}

function fillTheForm(e, t) {
    if (titleAttribtues = e.title, currentProductModalDisplayed = t, jQuery("#isImportReviewsSingleImport").prop("checked") && (getReviewsFromHtml(t, 1), currentPageReviews = 1), getImagesModal(e.imageModule.imagePathList), getItemSpecific(e.specsModule.props), e && e.skuModule) {
        var a = e.skuModule.skuPriceList,
            i = {
                attributes: [],
                variations: [],
                NameValueList: []
            };
        let t = a && a[0] && a[0].skuVal && a[0].skuVal.skuAmount ? a[0].skuVal.skuAmount.currency : "";
        t && jQuery("#currencyReturned").text(t), a.forEach(function(t, r) {
            if (t.skuPropIds) i.variations.push({
                SKU: t.skuId,
                availQuantity: t.skuVal.availQuantity,
                salePrice: t.skuVal.actSkuMultiCurrencyCalPrice || (t.skuVal.skuActivityAmount ? t.skuVal.skuActivityAmount.value : ""),
                regularPrice: t.skuVal.skuMultiCurrencyCalPrice || (t.skuVal.skuAmount ? t.skuVal.skuAmount.value : ""),
                attributesVariations: getAttributesVariations(t.skuPropIds, e.skuModule.productSKUPropertyList)
            });
            else if (t.skuVal && t.skuVal.skuCalPrice && 1 == a.length) {
                let e = [{
                    skuPropertyName: "color",
                    skuPropertyValues: [{
                        propertyValueDisplayName: "as image",
                        propertyValueName: "as image",
                        skuPropertyImagePath: ""
                    }]
                }];
                i.variations.push({
                    SKU: t.skuId,
                    availQuantity: t.skuVal.availQuantity,
                    salePrice: t.skuVal.actSkuMultiCurrencyCalPrice || (t.skuVal.skuActivityAmount ? t.skuVal.skuActivityAmount.value : ""),
                    regularPrice: t.skuVal.skuMultiCurrencyCalPrice || (t.skuVal.skuAmount ? t.skuVal.skuAmount.value : ""),
                    attributesVariations: fakeGetAttributesVariations(e)
                }), i.NameValueList = buildNameListValues(e)
            }
        }), a && a[0] && e.skuModule && e.skuModule.productSKUPropertyList && (i.NameValueList = buildNameListValues(e.skuModule.productSKUPropertyList)), getAttributes(i), getVariations(i.variations), jQuery("#customProductCategory").empty(), savedCategories && savedCategories.length && savedCategories.forEach(function(e, t) {
            items = '<div class="checkbox"><label><input type="checkbox" value="' + e.term_id + '"/>' + e.name + "</label>", jQuery("#customProductCategory").append(jQuery(items))
        });
        let r = jQuery("#textToBeReplaced").val(),
            o = jQuery("#textToReplace").val();
        if (r && o) {
            let t = e.title,
                a = e.description;
            jQuery("#customProductTitle").val(t.replace(r, o)), getHtmlDescription(a.replace(r, o))
        } else jQuery("#customProductTitle").val(e.title), getHtmlDescription(e.description)
    }
}

function getImagesModal(e) {
    images = e, e.forEach(function(e) {
        jQuery('<div><button type="button" class="btn btn-primary" id="removeImage" ><i style="font-size:15px ; margin:5px">Remove Image</i></button><img  src=' + e + " /><div>").appendTo(jQuery("#galleryPicture"))
    })
}

function getVariationsIsChecked() {
    return jQuery("#isVariationDisplayedValue").prop("checked")
}

function getAttributesVariations(e, t) {
    for (var a = [], i = e.split(","), r = 0; r < i.length; r++) t.forEach(function(e) {
        e.skuPropertyValues.forEach(function(t) {
            i[r] == t.propertyValueId && a.push({
                name: e.skuPropertyName,
                value: getVariationsIsChecked() ? t.propertyValueDisplayName : t.propertyValueName,
                image: t.skuPropertyImagePath
            })
        })
    });
    return a
}
var copiedObject = "";
jQuery(document).on("click", "#applyCharmPricing99", function(e) {
    var t = jQuery("#applyCharmPricing99")[0].checked,
        a = jQuery("#table-variations tbody tr");
    copiedObject || (copiedObject = a.clone());
    var i = jQuery("#table-variations thead tr")[0].cells.length - 8;
    t ? (a.each(function(e, t) {
        t.cells[i + 1].textContent = Math.ceil(t.cells[i + 1].textContent).toFixed(2) - .01
    }), a.each(function(e, t) {
        t.cells[i + 2].textContent = Math.ceil(t.cells[i + 2].textContent).toFixed(2) - .01
    })) : (a.each(function(e, t) {
        t.cells[i + 1].textContent = copiedObject[e].cells[i + 1].textContent
    }), a.each(function(e, t) {
        t.cells[i + 2].textContent = copiedObject[e].cells[i + 2].textContent
    }))
}), jQuery(document).on("click", "#globalRegularPrice", function(e) {
    jQuery("#globalRegularPriceValue").val();
    if (jQuery("#globalRegularPriceValue").val()) {
        var t = jQuery("#table-variations tbody tr"),
            a = jQuery("#table-variations thead tr")[0].cells.length - 8;
        t.each(function(e, t) {
            t.cells[a + 1].textContent = jQuery("#globalRegularPriceValue").val()
        })
    }
}), jQuery(document).on("click", "#globalSalePrice", function(e) {
    if (jQuery("#globalSalePriceValue").val()) {
        var t = jQuery("#table-variations tbody tr"),
            a = jQuery("#table-variations thead tr")[0].cells.length - 8;
        t.each(function(e, t) {
            t.cells[a + 2].textContent = jQuery("#globalSalePriceValue").val()
        })
    }
});
copiedObject = "";

function fakeGetAttributesVariations(e) {
    var t = [];
    return e.forEach(function(e) {
        e.skuPropertyValues.forEach(function(a) {
            t.push({
                name: e.skuPropertyName,
                value: getVariationsIsChecked() ? a.propertyValueDisplayName : a.propertyValueName,
                image: a.skuPropertyImagePath
            })
        })
    }), t
}

function buildNameListValues(e) {
    var t = [];
    return e.forEach(function(e, a) {
        var i = getAttrValues(e);
        i && i.length && t.push({
            name: e.skuPropertyName,
            value: i
        })
    }), t
}

function getAttrValues(e) {
    var t = [];
    return e.skuPropertyValues.forEach(function(e) {
        e.propertyValueDisplayName && getVariationsIsChecked() ? t.push(e.propertyValueDisplayName) : t.push(e.propertyValueName)
    }), t
}

function getItemSpecific(e) {
    jQuery("#table-specific tbody tr").remove(), jQuery("#table-specific thead tr").remove(), e && e.length && e.forEach(function(e) {
        var t = "<td contenteditable>" + e.attrName + "</td>",
            a = "<td contenteditable>" + e.attrValue + "</td>";
        jQuery("#table-specific tbody").append(jQuery("<tr>" + t + a + '<td><button id="removeAttribute" class="btn btn-danger">X</btton><td></tr>'))
    }), jQuery("#table-specific tr td[contenteditable]").css({
        border: "1px solid #51a7e8",
        "box-shadow": "inset 0 1px 2px rgba(0,0,0,0.075), 0 0 5px rgba(81,167,232,0.5)"
    })
}

function applyPriceFormulaDefault() {
    var e = jQuery("#table-variations tbody tr"),
        t = jQuery("#table-variations thead tr")[0].cells.length - 8;
    e.each(function(e, a) {
        var i = calculateAppliedPrice(a.cells[t + 1].textContent);
        a.cells[t + 1].textContent = i.toFixed(2)
    }), e.each(function(e, a) {
        var i = calculateAppliedPrice(a.cells[t + 2].textContent);
        a.cells[t + 2].textContent = i.toFixed(2)
    })
}

function calculateAppliedPrice(e) {
    var t = e = e.replace(",", "");
    if (formsToSave && formsToSave.length) {
        var a = {};
        if (formsToSave.forEach(function(t) {
                t.min <= parseFloat(e) && t.max >= parseFloat(e) && (a = t)
            }), a && a.min && a.max) {
            var i = a.multiply || 1,
                r = math.eval(i),
                o = a.addition || 0,
                n = math.eval(o);
            jQuery(".formulaContent").text("Applied Formula = original price increased by (" + i + " % )  [+] " + o), t = parseFloat(e) + parseFloat(e) * parseFloat(r) / 100 + parseFloat(n)
        }
    }
    return t ? (t = Number(t).toFixed(2), parseFloat(t)) : parseFloat(t)
}
jQuery(document).on("click", "#applyCharmPricing", function(e) {
    var t = jQuery("#applyCharmPricing")[0].checked,
        a = jQuery("#table-variations tbody tr");
    copiedObject || (copiedObject = a.clone());
    var i = jQuery("#table-variations thead tr")[0].cells.length - 8;
    t ? (a.each(function(e, t) {
        t.cells[i + 1].textContent = Math.ceil(t.cells[i + 1].textContent).toFixed(2)
    }), a.each(function(e, t) {
        t.cells[i + 2].textContent = Math.ceil(t.cells[i + 2].textContent).toFixed(2)
    })) : (a.each(function(e, t) {
        t.cells[i + 1].textContent = copiedObject[e].cells[i + 1].textContent
    }), a.each(function(e, t) {
        t.cells[i + 2].textContent = copiedObject[e].cells[i + 2].textContent
    }))
}), jQuery(document).on("click", "#removePicture", function(e) {
    if (jQuery("#removePicture")[0].checked) {
        htmlEditor = quill.root.innerHTML;
        var t = htmlEditor.replace(/<img[^>]*>/g, "");
        t = t.replace(/<a[^>]*>/g, ""), quill.setContents([]), quill.clipboard.dangerouslyPasteHTML(0, t)
    } else quill.setContents([]), quill.clipboard.dangerouslyPasteHTML(0, htmlEditor)
}), jQuery(document).on("click", "#removeDescription", function(e) {
    jQuery("#removeDescription")[0].checked ? (htmlEditor = quill.root.innerHTML, quill.setContents([])) : (quill.setContents([]), quill.clipboard.dangerouslyPasteHTML(0, htmlEditor))
}), jQuery(document).on("click", "#removeVariations", function(e) {
    if (jQuery("#table-attributes tr").length > 2) {
        var t = jQuery(this).parents("tr")[0].cells[0].innerText;
        jQuery(this).parents("tr").remove(), jQuery("#table-variations tr").each(function() {
            var e = attributesNamesArray.indexOf(t) + 1;
            e > -1 ? jQuery(this).find("td:eq(" + e + ")").remove() : displayToast("cannot remove this attribute, the name does not match, please contact wooshark: reference- issue with removing an attributes", "red")
        })
    } else displayToast("need at least one attribute to insert this product")
}), jQuery(document).on("click", "#removeAttribute", function(e) {
    jQuery(this).parents("tr").remove()
}), jQuery(document).on("click", "#removeVariation", function(e) {
    jQuery(this).parents("tr").remove()
}), jQuery(document).on("click", "#removeImage", function(e) {
    var t = jQuery(this).parent().find("img").attr("src"),
        a = images.indexOf(t);
    a > -1 && images.splice(a, 1), jQuery("#galleryPicture").empty(), images.forEach(function(e) {
        jQuery('<div><button type="button" class="btn btn-primary" id="removeImage" ><i style="font-size:15px ; margin:5px">Remove Image</i></button><img  src=' + e + " /><div>").appendTo(jQuery("#galleryPicture"))
    })
}), jQuery(document).on("click", "#removeDescription", function(e) {
    jQuery("#removeDescription")[0].checked ? (htmlEditor = quill.root.innerHTML, quill.setContents([])) : (quill.setContents([]), quill.clipboard.dangerouslyPasteHTML(0, htmlEditor))
}), jQuery(document).on("click", "#removeText", function(e) {
    jQuery("#removeText")[0].checked && jQuery("#descriptionContent").html("")
}), jQuery(document).on("click", "#includeImageFromDescription", function(e) {
    jQuery("#includeImageFromDescription")[0].checked && imagesFromDescription && imagesFromDescription.length && imagesFromDescription.forEach(function(e, t) {
        t < 10 && (jQuery('<div><button type="button" class="btn btn-primary" id="removeImage" ><i style="font-size:15px ; margin:5px">Remove Image</i></button><img  src=' + e.currentSrc + " /><div>").appendTo(jQuery("#galleryPicture")), images.push(e.currentSrc))
    })
});
copiedObject = "";
jQuery(document).on("click", "#applyCharmPricing99", function(e) {
    var t = jQuery("#applyCharmPricing99")[0].checked,
        a = jQuery("#table-variations tbody tr");
    copiedObject || (copiedObject = a.clone());
    var i = jQuery("#table-variations thead tr")[0].cells.length - 8;
    t ? (a.each(function(e, t) {
        t.cells[i + 1].textContent = Math.ceil(t.cells[i + 1].textContent).toFixed(2) - .01
    }), a.each(function(e, t) {
        t.cells[i + 2].textContent = Math.ceil(t.cells[i + 2].textContent).toFixed(2) - .01
    })) : (a.each(function(e, t) {
        t.cells[i + 1].textContent = copiedObject[e].cells[i + 1].textContent
    }), a.each(function(e, t) {
        t.cells[i + 2].textContent = copiedObject[e].cells[i + 2].textContent
    }))
}), copiedObject = "", jQuery(document).on("click", "#applyCharmPricing", function(e) {
    var t = jQuery("#applyCharmPricing")[0].checked,
        a = jQuery("#table-variations tbody tr");
    copiedObject || (copiedObject = a.clone());
    var i = jQuery("#table-variations thead tr")[0].cells.length - 8;
    t ? (a.each(function(e, t) {
        t.cells[i + 1].textContent = Math.ceil(t.cells[i + 1].textContent).toFixed(2)
    }), a.each(function(e, t) {
        t.cells[i + 2].textContent = Math.ceil(t.cells[i + 2].textContent).toFixed(2)
    })) : (a.each(function(e, t) {
        t.cells[i + 1].textContent = copiedObject[e].cells[i + 1].textContent
    }), a.each(function(e, t) {
        t.cells[i + 2].textContent = copiedObject[e].cells[i + 2].textContent
    }))
}), jQuery(document).on("click", "#applyPriceFormulaRegularPrice", function(e) {
    if (jQuery("#applyPriceFormulaRegularPrice")[0].checked) {
        var t = jQuery("#table-variations tbody tr"),
            a = jQuery("#table-variations thead tr")[0].cells.length - 8;
        t.each(function(e, t) {
            t.cells[a + 1].textContent = calculateAppliedPrice(t.cells[a + 1].textContent)
        }), jQuery("#applyPriceFormulaRegularPrice").prop("disabled", !0)
    }
}), jQuery(document).on("click", "#globalRegularPrice", function(e) {
    if (jQuery("#globalRegularPriceValue").val(), jQuery("#globalRegularPriceValue").val()) {
        var t = jQuery("#table-variations tbody tr"),
            a = jQuery("#table-variations thead tr")[0].cells.length - 8;
        t.each(function(e, t) {
            t.cells[a + 1].textContent = jQuery("#globalRegularPriceValue").val()
        })
    }
}), jQuery(document).on("click", "#globalSalePrice", function(e) {
    if (jQuery("#globalSalePriceValue").val()) {
        var t = jQuery("#table-variations tbody tr"),
            a = jQuery("#table-variations thead tr")[0].cells.length - 8;
        t.each(function(e, t) {
            t.cells[a + 2].textContent = jQuery("#globalSalePriceValue").val()
        })
    }
}), jQuery(document).on("click", "#displayAdvancedVariations", function(e) {
    jQuery("#table-attributes").show()
}), jQuery(document).on("click", "#addShippingPrice", function(e) {
    if (jQuery("#addShippingPriceValue").val()) {
        var t = jQuery("#table-variations tbody tr"),
            a = jQuery("#table-variations thead tr")[0].cells.length - 8;
        t.each(function(e, t) {
            t.cells[a + 2].textContent = parseFloat(t.cells[a + 2].textContent) + parseFloat(jQuery("#addShippingPriceValue").val())
        }), (t = jQuery("#table-variations tbody tr")).each(function(e, t) {
            t.cells[a + 1].textContent = parseFloat(t.cells[a + 1].textContent) + parseFloat(jQuery("#addShippingPriceValue").val())
        })
    }
});
let tagsProduct = [];

function getReviews() {
    var e = jQuery("#customReviews tr"),
        t = [];
    return e && e.length ? (e.each(function(e, a) {
        e && t.push({
            review: a.cells[0].innerHTML || "-",
            rating: jQuery(a).find("input").val() || 5,
            datecreation: a.cells[2].outerText,
            username: a.cells[1].outerText || "unknown",
            email: "test@test.com"
        })
    }), t) : []
}

function resetTheForm() {
    jQuery("#customProductTitle").val(""), jQuery("#shortDescription").val(""), jQuery("#customPrice").val(""), jQuery("#customSalePrice").val(""), jQuery("#simpleSku").val(""), jQuery("#customProductCategory input:checked").each(function() {
        jQuery(this).prop("checked", !0)
    }), jQuery("#table-attributes tr").remove(), jQuery("#customProductCategory").empty(), jQuery("#galleryPicture").empty(), jQuery("#table-variations tr").remove()
}

function getPRoductUrlFRomSku(e) {
    var t = "";
    if (e) {
        var a = getSelectedLanguage();
        t = "en" == a ? "https://aliexpress.com/item/" + e + ".html" : "https://" + a + ".aliexpress.com/item/" + e + ".html"
    }
    return t
}

function buildVariations() {
    var e = {
        variations: [],
        NameValueList: []
    };
    jQuery("#table-attributes tr").each(function(t, a) {
        t && e.NameValueList.push({
            name: a.cells[0].textContent.toLowerCase().replace(/ /g, "-"),
            values: a.cells[1].textContent.split(","),
            variation: !0,
            visible: !0
        })
    });
    var t = e.NameValueList.length;
    return jQuery("#table-variations tr").each(function(a, i) {
        if (a && a < 100) {
            var r = [];
            e.NameValueList.forEach(function(e, t) {
                r.push({
                    name: e.name.toLowerCase().replace(/ /g, "-"),
                    value: i.cells[t + 1].textContent.trim(),
                    image: i.cells[0] && i.cells[0].children && i.cells[0].children[0] && i.cells[0].children[0].currentSrc ? i.cells[0].children[0].currentSrc : ""
                })
            }), i.cells[t + 1].textContent && e.variations.push({
                SKU: i.cells[t + 5].textContent,
                availQuantity: i.cells[t + 1].textContent || 1,
                salePrice: i.cells[t + 3].textContent,
                regularPrice: i.cells[t + 2].textContent,
                attributesVariations: r,
                weight: i.cells[t + 6].textContent || jQuery("#productWeight").val()
            })
        }
    }), e
}

function getItemSpecificfromTableAliexpress(e) {
    var t = jQuery("#table-specific tbody tr"),
        a = e.NameValueList.map(function(e) {
            return e.name
        });
    return t && t.length && t.each(function(t, i) {
        -1 == a.indexOf(i.cells[0].textContent) && e.NameValueList.push({
            name: i.cells[0].textContent || "-",
            visible: !0,
            variation: !1,
            values: [i.cells[1].textContent]
        })
    }), e
}


function prepareModal() {
    tagsProduct = [], jQuery("#myModal").remove(), jQuery('<button type="button" id="importModal" data-backdrop="static" style="display: none; position:relative"class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#myModal">Import To Shop</button><div class="modal fade" style="visibility: visible; opacity: 1 !important; padding-right: 22.9922px; display: block;" tabindex="-1" id="myModal" tabindex="-1" aria-labelledby="importModal" aria-hidden="true"><div class="modal-dialog" style="max-width:75vw; width:75vw"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" style="font-size:10px">Product customization <span style="color:red"   id="productType"></span> - Currency: <span style="color:red" id="currencyReturned"> <span></h4><button class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body" style=""><ul id="tabs" class="nav nav-tabs" role="tablist"><li class="nav-item" > <button role="tab"  data-bs-toggle="tab" aria-selected="false" data-bs-toggle="tab" data-bs-target="#home"class="nav-link">General</a></li><li class="nav-item" > <button role="tab"  data-bs-toggle="tab" aria-selected="false" data-bs-toggle="tab" data-bs-target="#menu1"class="nav-link">Description</a></li><li class="nav-item" > <button role="tab"  data-bs-toggle="tab" aria-selected="false" data-bs-toggle="tab" data-bs-target="#menu3"class="nav-link">Gallery</a></li><li class="nav-item" > <button role="tab"  data-bs-toggle="tab" aria-selected="false" data-bs-toggle="tab" data-bs-target="#menu4"class="nav-link">Reviews</a></li><li class="nav-item active" > <button role="tab"  data-bs-toggle="tab" aria-selected="true" data-bs-toggle="tab" data-bs-target="#menu5"class="nav-link active">Product Variations</a></li><li class="nav-item" > <button role="tab"  data-bs-toggle="tab" aria-selected="false" data-bs-toggle="tab" data-bs-target="#menu6"class="nav-link">Product Attributes</a></li><li class="nav-item" > <button role="tab"  data-bs-toggle="tab" aria-selected="false" data-bs-toggle="tab" data-bs-target="#menu7"class="nav-link">Tags</a></li></ul>     </ul><div class="tab-content"><div id="home" class="tab-pane fade">  <div class="form-group" id="priceContainer" style="display:none">  <div class="form-group"> <h3 style="color:brown" for="price">Regular Price: <span style="color:red" id="formulaContent"><span></h3>  </div> <input style="width:97%" id="customPrice" type="number" class="form-control" id="price">  <div class="form-group"> <h3 style="color:brown" for="price">Sale Price: <span style="color:red" id="formulaContent"><span></h3>  </div> <input style="width:97%" id="customSalePrice" type="number" class="form-control" id="price"><button  id="setFormulaAliexpress" class="btn btn-primary" style="width:100%; margin-top:5px"> Set Formula</button>  </div>  <div class="form-group">       <h3   style="color:brown" for="title">custom Title:</h3>       <input id="customProductTitle" type="text" placeholder="custom title, if empty original title will be displayed" class="form-control" id="title"> </div>  <div class="form-group"  id="skuContainer" style="display:none">  <h3  style="color:brown"  for="title">Sku  <small> (Optional) </small>   </h3>  <input  style ="width: 100%;padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 6px; margin-bottom: 16px; resize: vertical;" type="text" placeholder="Sku attribute (optional)" class="form-control" id="simpleSku"> </div>  <div class="form-group" id="productWeightContainer">       <h3  style="color:brown" for="title">Product weight  <small> (Optional) </small> </h3>       <input id="productWeight" type="text" placeholder="product weight" class="form-control" id="title"> </div> <div class="form-group">  <h3  style="color:brown" for="title"> Short Description <small> (Optional) </small> </h3>   <textarea  id="shortDescription" class="form-control" rows="2" id="comment" placeholder="Short description"></textarea> </div><div class="checkbox" style="margin-top: 30px;"><label><input id="isPublish" type="checkbox" name="remember"> &nbsp; Publish (checked = publish  | unchecked = draft)</label> </div><div class="checkbox" ><label><input id="isFeatured" type="checkbox" name="remember"> &nbsp; Featured product <small>Featuring products on your website is a great way to show your best selling or popular products from your store</small></label> </div><div class="checkbox" ><label><input id="showCategories" type="checkbox" name="remember"> &nbsp; Show categories</label> </div><div class="form-group" id="categoriesContainer" style="margin-top:30px"><div class="panel panel-default"> <div class="panel-heading">Select Categories</div> <div id="customProductCategory" style="height:150px;     border: 1px solid grey;padding: 10px; overflow-y:scroll" class="panel-body"> </div> </div> </div>  </div><div id="menu1" class="tab-pane fade in"><div class="form-group" ><div class="checkbox" ><div class="checkbox" ><label><input id="ImportImagesFromGallery" type="checkbox" name="remember"> &nbsp;Add gallery images to the description </label> </div><div class="checkbox" ><label><input id="addSpecificToDesc" type="checkbox" name="remember"> &nbsp;Add Specifications to the description </label> </div><label><input id="removePicture" type="checkbox" name="remember"> &nbsp; Remove Pictures </label> </div><div class="checkbox" ><label><input id="removeDescription" type="checkbox" name="remember"> &nbsp; Remove description </label> </div><div id="editorDescription"><div id="descriptionContent"> </div> </div> </div>  </div><div id="menu3" class="tab-pane fade in"><div class="checkbox" ><label><input id="includeImageFromDescription" type="checkbox" name="remember"> &nbsp; Include Pictures from description </label> </div><div id="galleryPicture" style="overflow-y:scroll;height:500px"> </div>  </div><div id="menu4" class="tab-pane fade in"><div id="customReviews" style="overflow-y:scroll;height:500px"><button class="button-5" id="addReview" style="background-color:orange; width:100%;margin-top:10px"> Add Review</button><table id="table-reviews" class="table table-striped"><thead>  <tr>    <th>Review</th>    <th>Username</th>    <th>Date creation</th>    <th>Rating</th>    <th>Remove</th>  </tr> </thead><tbody></tbody></table></div></div><div id="menu5" class="tab-pane fade show active"><div id="no-variations" style="text-align:center; display:none; padding:20px; margin:30px; background-color:beige"><span style=" text-align:center">This is a simple product, no variations can be defined</span></div> <h3 class="formulatexcontainer" for="price" style="background-color:beige; padding:15px; margin:20px;  text-align:center"> <span class="formulaContent">No formula defined yet<span></h3><button class="button-5"  style="margin-left: 35%; width:350px" id="openAdvancedSettings">Open Advanced settings</button><div id="advancedVariationsCapa" style="display:none"><div style="flex: 1 1 50%" display:flex;"><div style="flex: 1 1 50%; display:flex; justify-content: center;"><labe style="justify-content: center; font-weight: 800; margin-y: 20px"l>Advanced Setting</label></div><div class="checkbox" id="applyCharmPricingConainer" style="display:none" ><div class="checkbox" ><label><input id="applyCharmPricing" type="checkbox" name="remember"> &nbsp;Apply charm pricing 00  <small>( Example 2.34 ==> 3.00) </small></label> </div><div class="checkbox" ><label><input id="applyCharmPricing99" type="checkbox" name="remember"> &nbsp; Apply charm pricing 99  <small>(Example 2.34 ==> 2.99) </small>  </label> </div><label><input disabled style="bottom: auto" id="isImportImageVariations" type="checkbox">&nbsp; Import images variations </label> </div><div style="display:flex" > <input style="flex 1 1  100px; width:50%;  margin: 5px" id="globalRegularPriceValue" placeholder="Apply Regular price for all variations" type="number" class="form-control" ><button style="flex 1 1  100px; margin: 5px" class="button-5" id="globalRegularPrice"> Apply</button> </div><div style="display:flex" > <input style="flex 1 1  100px; width:50%;  margin: 5px" id="globalSalePriceValue" placeholder="Apply Sale price for all variations"  type="number" class="form-control" ><button style="flex 1 1  100px; margin: 5px" class="button-5" id="globalSalePrice"> Apply</button> </div><div style="display:flex" > <input style="flex 1 1  100px; width:50%;  margin: 5px" id="addShippingPriceValue" placeholder="Add shipping price"  type="number" class="form-control" ><button style="flex 1 1  100px; margin: 5px" class="button-5" id="addShippingPrice"> Apply</button> </div></div><div style="flex: 1 1 50%" display:flex;"><div style="flex: 1 1 50%; display:flex; justify-content: center;"><labe style="justify-content: center; font-weight: 800; margin-y: 20px"l>Import as Affiliate or simple preferences</label></div><div><label>Title</label><div></div><input type="radio" id="titleASIN" name="titleASIN" checked value="titleASIN"><span  style="display:inline" for="titleASIN">&nbsp; Generic title + attribute values example (color, size, etc...) </span><br><input type="radio" id="titleTab" name="titleASIN" value="titleTab"><span  style="display:inline" for="titleTab">&nbsp; Generic title </span><br><label style="margin-top:10px">Galley</label><div></div><input type="radio" id="galleryASIN" name="galleryASIN" checked value="galleryASIN"><span  style="display:inline" for="galleryASIN">&nbsp; Select variation image</span><br><input type="radio" id="galleryTab" name="galleryASIN" value="galleryTab"><span  style="display:inline" for="galleryTab">&nbsp; Select Gallery tab images</span><br><label style="margin-top:10px">Affiliate </label><div></div><div style="display:flex" > <input style="flex 1 1  100px; width:50%;  margin-top:10px" id="affiliateLinkUrl" placeholder="Affiiate link example https://s.click.aliexpress.com/e/_DnkqFCF"  type="text" class="form-control" > </div></div></div></div><div style="height:400px; overflow-y:scroll"> <table id="table-variations" style="margin-top:20px" class="table table-striped"><thead></thead><tbody></tbody></table> </div><button id="displayAdvancedVariations" style="width:100%" class="btn btn-primary"> Edit Attributes </button><small> <u> Note: </u> Any modification of the attributes values on the variations table (such as color and size, etc..) need to be reflected on the attribute table below (click edit Attributes). the value must be available on the list of possible values on the table below. use a semi colon to add a new value</small> <table id="table-attributes" style="display:none; margin-top:20px" class="table table-striped"><thead> <tr> <th>name</th> <th>values</th> <th>Remove this from all variations</th> </tr></thead><tbody></tbody></table> </div><div id="menu6" class="tab-pane fade in"><button class="button-5" id="addSpecific" style="width:100%"> Additional data</button> <table id="table-specific" style="margin-top:20px" class="table table-striped"><thead> <tr> <th>property</th> <th>values</th> <th>Remove</th> </tr></thead><tbody></tbody></table> </div><div id="menu7" class="tab-pane fade in"><div class="checkbox" ><label><input id="createTagsFromTitle" type="checkbox" name="remember"> &nbsp; Create tags from Title </label> </div><label> Add Tag to product</label><input  id="tagInput" type="text" class="form-control" /><button class="button-5" id="addTagToProduct" style="width:100%"> Add tags</button><div id="tagInputDisplayed" style="color:red"></div> </div><div id="advanced" class="tab-pane fade in"> <div class="form-group" style="margin-top:5px">  <h3  style="color:brown" for="title"> Tags <small> (Optional) </small> </h3>   <textarea  id="tags" class="form-control" rows="2" id="comment" placeholder="Place tags separated by commas"></textarea> </div> <div style="margin-top:5px">  <h3  style="color:brown" for="title"> Sale price (Optional) </small> </h3> <input style="width:97%" id="salePrice" type="number" class="form-control" id="price"> </div> <div style="margin-top:5px">  <h3  style="color:brown" for="title"> Sale start date </small> </h3> <input  id="saleStartDate" type="date" class="form-control" id="price"> </div> <div style="margin-top:5px">  <h3  style="color:brown" for="title"> Sale end date </small> </h3> <input  id="saleEndDate" type="date" class="form-control" id="price"> </div> </div><div class="modal-footer"> <button type="button" class="btn btn-danger"data-bs-dismiss="modal">Close</button>      <button type="button" id="totoButton" class="button-5">Import <small style="display:none; color:grey" id="asVariableAliex"> ( as Variable ) </small><span id="loaderImporttoShop" style="display:none"></span></button></div>  </div>  </div> </div>').appendTo(jQuery("#modal-container"))
}

function restoreFormula(e) {
    if (e) {
        formsToSave = e;
        try {
            e && e.length && (jQuery("#formula tbody tr").remove(), e.forEach(function(e) {
                e && e.min && e.max && e.multiply && jQuery("#formula tbody").append('<tr><th style="width:15%"> <input class="custom-form-control" name="min" placeholder="Min price" value="' + e.min + '"></th><th style="width:2%">-</th><th style="width:15%"><input class="custom-form-control" name="max" placeholder="Max price" value="' + e.max + '"></th><th style="width:16%"><div style="display:flex"><button style="flex: 1 1 10%;border-radius: 1px;margin-top: 0;margin-bottom: 0;margin-right:5px" class="btn btn-light"> Increase by  </button><input value="' + e.multiply + '" style="flex: 1 1 78%; border: 1px solid #ccc;" class="multiply custom-form-control" type="number" name="multiply" placeholder="Increase percentage"><button style="flex: 1 1 10%;border-radius: 1px;margin-top: 0;margin-bottom: 0;margin-right:5px" class="btn btn-default">  <i class="fa fa-percent fa-2x"></i> </button></div></th><th style="width:15%"><div style="display:flex"><button style="flex: 1 1 10%;border-radius: 1px;margin-top: 0;margin-bottom: 0;margin-right:5px" class="btn btn-light">  <i class="fa fa-plus"></i> </button><input value="' + e.addition + '" style="flex: 1 1 90%; border: 1px solid #ccc;" class="addition custom-form-control" type="number" name="addition" placeholder="Add number"></div></th><th style="width:3%"><button id="removeFormulaLine" style="border-radius: 1px;margin-top: 0;margin-bottom: 0;margin-right:5px" class="btn btn-danger">  <i class="fa fa-trash"></i> </button></th></tr>')
            }))
        } catch (e) {
            displayToast("Error while restoring formula, please contact wooshark support subject error while restoring formula")
        }
    }
}
jQuery(document).on("click", "#createTagsFromTitle", function(e) {
    if (jQuery("#createTagsFromTitle")[0].checked) {
        let e = jQuery("#customProductTitle").val().split(/(\s+)/);
        e && e.length && e.forEach(function(e) {
            e && " " != e && e.length > 3 && (tagsProduct.push(e), jQuery("#tagInput").val(""), jQuery("#tagInputDisplayed").append(jQuery("<div class='customTagCre'># " + e.replace(/,/g, "") + "&nbsp;<button class='button-6' id='deleteTag'>x</button> </div> ")))
        })
    }
}), jQuery(document).on("click", "#addTagToProduct", function(e) {
    let t = jQuery("#tagInput").val();
    t && (tagsProduct.push(t), jQuery("#tagInput").val(""), jQuery("#tagInputDisplayed").append(jQuery("<div>" + t + "</div>")))
}), jQuery(document).on("click", "#addSpecific", function(e) {
    jQuery("#table-specific tbody").append('<tr><td style="width:50%" contenteditable>    </td><td contenteditable style="width:50%"></td><td><button id="removeAttribute" class="btn btn-danger">X</btton></td></tr>'), jQuery("#table-specific tr td[contenteditable]").css({
        border: "1px solid #51a7e8",
        "box-shadow": "inset 0 1px 2px rgba(0,0,0,0.075), 0 0 5px rgba(81,167,232,0.5)"
    })
}), jQuery(document).on("click", "#openAdvancedSettings", function(e) {
    jQuery("#advancedVariationsCapa").toggle("slow"), jQuery("#advancedVariationsCapa").css({
        display: "flex"
    })
}), jQuery(document).on("click", "#totoButton", function(e) {
    jQuery("#loaderImporttoShop").append(jQuery('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>')), jQuery("#loaderImporttoShop").show(), startLoading(), displayToast("Only 1 images, 2 varitions will be imported on the free plan", "orange");
    var t = [];
    let a = "";
    var i = buildVariations(),
        r = jQuery("#customProductTitle").val() || jQuery("head").find("title").text(),
        o = jQuery("#shortDescription").val() || "",
        n = jQuery("#customPrice").val() || "",
        l = jQuery("#customSalePrice").val() || "";
    jQuery("#simpleSku").val();
    let s = [];
    jQuery("#customProductCategory input:checked").each(function() {
        s.push(jQuery(this).attr("value"))
    });
    var c = i.NameValueList;
    let u = globalUrlProduct;
    jQuery("#isImportReviewsSingleImport").prop("checked") && (t = getReviews()), jQuery("#isImportProductDescriptionSingleImport").prop("checked") && (a = quill.root.innerHTML), jQuery("#isImportProductSpecificationSingleImport").prop("checked") && (i = getItemSpecificfromTableAliexpress(i));
    let d = jQuery("#isImportImageVariationsSingleImport").prop("checked"),
        p = jQuery("#isFeaturedProduct").prop("checked"),
        y = jQuery("#isPublishProductSingleImport").prop("checked"),
        m = jQuery("#includeShippingCostIntoFinalPrice").prop("checked"),
        g = [];
    tagsProduct && tagsProduct.length && (g = tagsProduct), jQuery.ajax({
        url: wooshark_params.ajaxurl,
        type: "POST",
        dataType: "JSON",
        data: {
            action: "wooshark-insert-product",
            sku: currentSku.toString(),
            title: r,
            description: a || "",
            productType: "variable",
            images: images.slice(0, 2) || [],
            categories: s,
            regularPrice: n.toString(),
            salePrice: l.toString(),
            quantity: 33,
            attributes: c && c.length ? c.slice(0, 4) : [],
            variations: i.variations && i.variations.length ? i.variations.slice(0, 4) : [],
            isFeatured: p,
            postStatus: y ? "publish" : "draft",
            shortDescription: o || "",
            productUrl: u,
            importVariationImages: d,
            reviews: t,
            tags: g,
            includeShippingCostIntoFinalPrice: m
        },
        success: function(e) {
            e && e.error && e.error_msg && displayToast(e.error_msg, "red"), e && !e.error && e.data && displayToast(e.data, "green"), stopLoading(), jQuery(".lds-ring").remove(), e && e.error && e.error_msg && e.error_msg.includes("you have reached the permitted usage") && setTimeout(function() {
                window.open("https://sharkdropship.com/aliexpress", "_blank")
            }, 4e3)
        },
        error: function(e) {
            stopLoading(), e && e.responseText && displayToast(e.responseText, "red"), jQuery(".lds-ring").remove()
        }
    })
}), jQuery(document).on("click", "#resetFormula", function(e) {}), jQuery(document).on("click", "#addInterval", function(e) {
    jQuery("#formula tbody").append('<tr><th style="width:15%"> <input class="custom-form-control" name="min" placeholder="Min price"></th><th style="width:2%">-</th><th style="width:15%"><input class="custom-form-control" name="max" placeholder="Max price"></th><th style="width:16%"><div style="display:flex"><button style="flex: 1 1 10%;border-radius: 1px;margin-top: 0;margin-bottom: 0;margin-right:5px" class="btn btn-light"> Increase by  </button><input style="flex: 1 1 78%; border: 1px solid #ccc;" class="multiply custom-form-control" type="number" name="multiply" placeholder="Increase percentage"><button style="flex: 1 1 10%;border-radius: 1px;margin-top: 0;margin-bottom: 0;margin-right:5px" class="btn btn-default">  <i class="fa fa-percent fa-2x"></i> </button></div></th><th style="width:15%"><div style="display:flex"><button style="flex: 1 1 10%;border-radius: 1px;margin-top: 0;margin-bottom: 0;margin-right:5px" class="btn btn-light">  <i class="fa fa-plus"></i> </button><input style="flex: 1 1 90%; border: 1px solid #ccc;" class="addition custom-form-control" type="number" name="addition" placeholder="Add number"></div></th><th style="width:3%"><button id="removeFormulaLine" style="border-radius: 1px;margin-top: 0;margin-bottom: 0;margin-right:5px" class="btn btn-danger">  <i class="fa fa-trash"></i> </button></th></tr>')
});
let _savedConfiguration = {};

function restoreConfiguration() {
    let e = {};
    jQuery.ajax({
        url: wooshark_params.ajaxurl,
        type: "POST",
        dataType: "JSON",
        data: {
            action: "restoreConfiguration"
        },
        success: function(t) {
            if (t && t._savedConfiguration && t._savedConfiguration.commonConfiguration) {
                let a = (e = t._savedConfiguration).commonConfiguration,
                    i = e.sinleUpdateConfiguration,
                    r = e.singleImportonfiguration,
                    o = e.bulkCategories,
                    n = e.savedFormula;
                a && a.language && (jQuery("[name=language][value=" + a.language + "]").attr("checked", !0), jQuery('<h4 style="font-weight:bold;"> Current Language: ' + a.language + "  </h4>").appendTo(".currencyDetails")), a && a.currency && (jQuery("[name=currency][value=" + a.currency + "]").attr("checked", !0), jQuery('<h4 style="font-weight:bold;"> Current currency: ' + a.currency + "  </h4>").appendTo(".currencyDetails")), i ? (jQuery("#applyPriceFormulaWhileUpdatingProduct").prop("checked", !1), jQuery("#isVariationDisplayedValue").prop("checked", !1), jQuery("#setVariationsToOutOfStock").prop("checked", !1), jQuery("#updateSalePrice").prop("checked", !1), jQuery("#updateRegularPrice").prop("checked", !1)) : (jQuery("#applyPriceFormulaWhileUpdatingProduct").prop("checked", !1), jQuery("#setVariationsToOutOfStock").prop("checked", !1), jQuery("#updateSalePrice").prop("checked", !1), jQuery("#updateRegularPrice").prop("checked", !1), jQuery("#isVariationDisplayedValue").prop("checked", !1)), r ? (jQuery("#isImportReviewsSingleImport").prop("checked", "true" == r.isImportReviewsSingleImport), jQuery("#isImportImageVariationsSingleImport").prop("checked", "true" == r.isImportImageVariationsSingleImport), jQuery("#isImportProductSpecificationSingleImport").prop("checked", "true" == r.isImportProductSpecificationSingleImport), jQuery("#isImportProductDescriptionSingleImport").prop("checked", "true" == r.isImportProductDescriptionSingleImport), jQuery("#isPublishProductSingleImport").prop("checked", "true" == r.isPublishProductSingleImport), jQuery("#applyPriceFormulawhileImporting").prop("checked", "true" == r.applyPriceFormulawhileImporting), jQuery("#isFeaturedProduct").prop("checked", "true" == r.isFeaturedProduct), jQuery("#includeShippingCostIntoFinalPrice").prop("checked", "true" == r.includeShippingCostIntoFinalPrice), jQuery("#isEnableAutomaticUpdateForAvailability").prop("checked", "true" == r.isEnableAutomaticUpdateForAvailability), jQuery("#enableAutomaticUpdates").prop("checked", "true" == r.enableAutomaticUpdates), jQuery("#applyPriceFormulaAutomaticUpdate").prop("checked", !1), jQuery("#syncSalePrice").prop("checked", !1), jQuery("#syncRegularPrice").prop("checked", !1), jQuery("#syncStock").prop("checked", !1), jQuery("#onlyPublishProductWillSync").prop("checked", !1), jQuery("[name=destination][value=" + r.destination + "]").attr("checked", !0), jQuery("#textToBeReplaced").val(r.textToBeReplaced), jQuery("#textToReplace").val(r.textToReplace)) : (jQuery("#isImportReviewsSingleImport").prop("checked", !0), jQuery("#isImportImageVariationsSingleImport").prop("checked", !1), jQuery("#isImportProductSpecificationSingleImport").prop("checked", !0), jQuery("#isImportProductDescriptionSingleImport").prop("checked", !0), jQuery("#isPublishProductSingleImport").prop("checked", !0), jQuery("#applyPriceFormulawhileImporting").prop("checked", !0), jQuery("#isFeaturedProduct").prop("checked", !1), jQuery("#includeShippingCostIntoFinalPrice").prop("checked", !1), jQuery("#isEnableAutomaticUpdateForAvailability").prop("checked", !1), jQuery("#enableAutomaticUpdates").prop("checked", !1), jQuery("#applyPriceFormulaAutomaticUpdate").prop("checked", !1), jQuery("#syncRegularPrice").prop("checked", !1), jQuery("#syncStock").prop("checked", !1), jQuery("#syncSalePrice").prop("checked", !1), jQuery("#onlyPublishProductWillSync").prop("checked", !1), jQuery("[name=destination][value=US]").attr("checked", !0)), restoreFormula(n), getCategories(function(e) {
                    savedCategories && savedCategories.length && (jQuery("#table-categories tbody").empty(), savedCategories.forEach(function(e) {
                        jQuery("#table-categories tbody").append('<tr><td style="width:20%">' + e.term_id + '</td><td style="width:20%">' + e.name + '</td><td  style="width:20%">' + e.count + ' </td></td><td  style="width:40%"><button class="btn btn-primary" style="width:100%" id="updateProductOfThisCategory" categoryID="' + e.term_id + '"> Update Products of this category</button></td></tr>')
                    }), o && o.length && savedCategories && savedCategories.length ? (jQuery("#bulkCategories").empty(), savedCategories.forEach(function(e, t) {
                        var a;
                        a = '<div class="checkbox"><label><input class="form-check-input mt-1" id="category' + e.term_id + '" type="checkbox" style="width:17px; height:17px" class="chk" value="' + e.term_id + ' "/>' + e.name + "</label>", jQuery("#bulkCategories").append(jQuery(a))
                    }), o && o.length && o.forEach(function(e) {
                        jQuery("#category" + e).prop("checked", !0)
                    })) : (jQuery("#bulkCategories").empty(), savedCategories.forEach(function(e, t) {
                        var a;
                        a = '<div class="checkbox"><label><input class="form-check-input mt-1" id="category' + e.term_id + '" type="checkbox" style="width:17px; height:17px" class="chk" value="' + e.term_id + ' "/>' + e.name + "</label>", jQuery("#bulkCategories").append(jQuery(a))
                    })))
                })
            } else getCategories(function(e) {
                savedCategories && savedCategories.length && (jQuery("#table-categories tbody").empty(), savedCategories.forEach(function(e) {
                    jQuery("#table-categories tbody").append('<tr><td style="width:20%">' + e.term_id + '</td><td style="width:20%">' + e.name + '</td><td  style="width:20%">' + e.count + ' </td></td><td  style="width:40%"><button class="btn btn-primary" style="width:100%" id="updateProductOfThisCategory" categoryID="' + e.term_id + '"> Update Products of this category</button></td></tr>')
                }), bulkCategories && bulkCategories.length && savedCategories && savedCategories.length ? (jQuery("#bulkCategories").empty(), savedCategories.forEach(function(e, t) {
                    var a;
                    a = '<div class="checkbox"><label><input class="form-check-input mt-1" id="category' + e.term_id + '" type="checkbox" style="width:17px; height:17px" class="chk" value="' + e.term_id + ' "/>' + e.name + "</label>", jQuery("#bulkCategories").append(jQuery(a))
                }), bulkCategories && bulkCategories.length && bulkCategories.forEach(function(e) {
                    jQuery("#category" + e).prop("checked", !0)
                })) : (jQuery("#bulkCategories").empty(), savedCategories.forEach(function(e, t) {
                    var a;
                    a = '<div class="checkbox"><label><input class="form-check-input mt-1" id="category' + e.term_id + '" type="checkbox" style="width:17px; height:17px" class="chk" value="' + e.term_id + ' "/>' + e.name + "</label>", jQuery("#bulkCategories").append(jQuery(a))
                })))
            }), jQuery("#isImportReviewsSingleImport").prop("checked", !0), jQuery("#isImportProductSpecificationSingleImport").prop("checked", !0), jQuery("#isImportProductDescriptionSingleImport").prop("checked", !0), jQuery("#isPublishProductSingleImport").prop("checked", !0), jQuery("#applyPriceFormulawhileImporting").prop("checked", !0), jQuery("#isFeaturedProduct").prop("checked", !0), displayToast("Cannot find any saved configuration, please ensure you save your preference on the configuration tab")
        },
        error: function(e) {
            displayToast("Error while retrieving configuration from server, please erload your page")
        },
        complete: function() {}
    })
}

function handleError(e) {
    stopLoading(), e && e.error && e.error_msg && displayToast(e.error_msg, "red"), e && !e.error && e.data && displayToast(e.data, "green")
}

function startLoadingText() {
    jQuery('<h3  id="loading-variation" style="color:green;">  Loading .... </h3>').appendTo(".log-sync-product")
}

function stopLoadingText() {
    jQuery("#loading-variation").remove()
}
jQuery(document).on("click", "#removeFormulaLine", function(e) {
    jQuery(this).parents("tr").remove()
}), jQuery(document).on("click", "#saveGlobalConfiguration", function(e) {
    let t = {};
    var a = {
        isImportReviewsSingleImport: jQuery("#isImportReviewsSingleImport").prop("checked"),
        isImportImageVariationsSingleImport: jQuery("#isImportImageVariationsSingleImport").prop("checked"),
        isImportProductSpecificationSingleImport: jQuery("#isImportProductSpecificationSingleImport").prop("checked"),
        isImportProductDescriptionSingleImport: jQuery("#isImportProductDescriptionSingleImport").prop("checked"),
        isPublishProductSingleImport: jQuery("#isPublishProductSingleImport").prop("checked"),
        applyPriceFormulawhileImporting: jQuery("#applyPriceFormulawhileImporting").prop("checked"),
        isFeaturedProduct: jQuery("#isFeaturedProduct").prop("checked"),
        textToBeReplaced: jQuery("#textToBeReplaced").val(),
        textToReplace: jQuery("#textToReplace").val(),
        destination: jQuery('input[name="destination"]:checked').val()
    };
    let i = {
            language: getSelectedLanguage(),
            currency: jQuery('input[name="currency"]:checked') && jQuery('input[name="currency"]:checked')[0] ? jQuery('input[name="currency"]:checked')[0].value : "USD"
        },
        r = {
            applyPriceFormulaWhileUpdatingProduct: jQuery("#applyPriceFormulaWhileUpdatingProduct").prop("checked"),
            setVariationsToOutOfStock: jQuery("#setVariationsToOutOfStock").prop("checked"),
            updateSalePrice: jQuery("#updateSalePrice").prop("checked"),
            updateRegularPrice: jQuery("#updateRegularPrice").prop("checked"),
            isVariationDisplayedValue: jQuery("#isVariationDisplayedValue").prop("checked")
        };
    t.commonConfiguration = i, t.sinleUpdateConfiguration = r, t.singleImportonfiguration = a, displayToast("save global configuration", "green");
    var o = [];
    jQuery(".chk:input:checked").each(function() {
        jQuery(this) && jQuery(this).val() && o.push(jQuery(this).val())
    }), t.bulkCategories = o, displayToast("save categories", "green");
    var n = jQuery("#formula tbody tr"),
        l = [];
    n && n.length && n.each(function(e, t) {
        if (t && t.cells && t.cells.length > 3) {
            let e = jQuery(t.cells[0]).find("input").val(),
                a = jQuery(t.cells[2]).find("input").val(),
                i = jQuery(t.cells[3]).find("input").val(),
                r = jQuery(t.cells[4]).find("input").val();
            e && a && i && l.push({
                min: e,
                max: a,
                multiply: i || 1,
                addition: r || 0
            })
        }
    }), t.savedFormula = l, displayToast("save price markup formula"), jQuery.ajax({
        url: wooshark_params.ajaxurl,
        type: "POST",
        dataType: "JSON",
        data: {
            action: "saveOptionsDB",
            isShippingCostEnabled: jQuery("#includeShippingCostIntoFinalPrice").prop("checked") ? "Y" : "N",
            isEnableAutomaticUpdateForAvailability: jQuery("#isEnableAutomaticUpdateForAvailability").prop("checked") ? "Y" : "N",
            priceFormulaIntervalls: l,
            _savedConfiguration: t,
            onlyPublishProductWillSync: jQuery("#onlyPublishProductWillSync").prop("checked") ? "Y" : "N",
            enableAutomaticUpdates: jQuery("#enableAutomaticUpdates").prop("checked") ? "Y" : "N",
            applyPriceFormulaAutomaticUpdate: jQuery("#applyPriceFormulaAutomaticUpdate").prop("checked") ? "Y" : "N",
            syncRegularPrice: jQuery("#syncRegularPrice").prop("checked") ? "Y" : "N",
            syncSalePrice: jQuery("#syncSalePrice").prop("checked") ? "Y" : "N",
            syncStock: jQuery("#syncStock").prop("checked") ? "Y" : "N"
        },
        success: function(e) {},
        error: function(e) {},
        complete: function() {
            document.location.reload(!0), displayToast("Configuration saved successfully"), jQuery("#savedCorrectlySection").show()
        }
    })
});
let productDetailsOldVariationsAndNewVariations = [];

function logStartGettingPRoductDetails(e, t) {
    e || jQuery(".log-sync-product").empty(), e || (jQuery('<h3 style="color:green;"> ID: ' + t + " 1-  Getting existing Product variations .... </h3>").appendTo(".log-sync-product"), startLoadingText())
}

function logGettingNewProductVariations(e, t) {
    e || (jQuery('<h3 style="color:green;"> ID: ' + currentProductId + " 2- " + t + " Variations are loaded </h3>").appendTo(".log-sync-product"), jQuery('<h3 style="color:green;"> ID: ' + currentProductId + " 3-  Getting new product variations ...</h3>").appendTo(".log-sync-product"), startLoadingText())
}
let variationsNotFound = 0;
jQuery(document).on("click", "#addToWaitingList", function(e) {
    jQuery("#asVariableAliex").show(), productId = jQuery(this).parents(".card").find("#sku")[0].innerText, productId ? importProductGloballyBulk(productId, !0) : displayToast("Cannot get product sku", "red")
}), jQuery(document).on("click", "#emptyWaitingListProduct", function(e) {
    jQuery("#emptyWaitingListProduct").remove(), jQuery("#importProductInWaitingListToShop").remove(), globalWaitingList = []
});
var globalWaitingList = [];

function addToWaitingList(e) {
    globalWaitingList.push(e), jQuery("#importProductInWaitingListToShop").remove(), jQuery("#emptyWaitingListProduct").remove(), jQuery('<button type="button" id="importProductInWaitingListToShop" style="position:fixed; border-raduis:0px; right: 1%; bottom: 60px; width:15%;z-index:9999" class="waitingListClass btn btn-primary btn-lg"><i class="fa fa-envelope fa-3px"> Import waiting List <span badge badge-primary>' + globalWaitingList.length + "</span></i></button>").appendTo(jQuery("html")), jQuery('<button type="button" id="emptyWaitingListProduct" style=" position:fixed; border-raduis:0px; bottom: 10px; right: 1%;  width:15%;z-index:9999" class="waitingListClass btn btn-danger btn-lg"><i class="fa fa-trash-o fa-3px">  Reset Waiting list </span></i></button>').appendTo(jQuery("html"))
}

function removeProductFromWP(e) {
    e && (startLoading(), jQuery.ajax({
        url: wooshark_params.ajaxurl,
        type: "POST",
        dataType: "JSON",
        data: {
            action: "remove-product-from-wp",
            post_id: e
        },
        success: function(e) {
            e && e.error && e.error_msg && displayToast(e.error_msg, "red"), e && !e.error && e.data && displayToast(e.data, "green")
        },
        error: function(e) {
            displayToast(e.responseText, "red"), stopLoading()
        },
        complete: function() {
            stopLoading()
        }
    }))
}
indexStopLoading = 0, jQuery(document).on("click", "#importProductInWaitingListToShop", function(e) {
    startLoading(), jQuery("#emptyWaitingListProduct").remove(), jQuery("#importProductInWaitingListToShop").remove(), _savedConfiguration || (_savedConfiguration = {});
    for (var t = 0; t < globalWaitingList.length; t++) ! function(e) {
        window.setTimeout(function() {
            let t = jQuery("#isImportImageVariationsSingleImport").prop("checked"),
                a = jQuery("#isFeaturedProduct").prop("checked"),
                i = jQuery("#isPublishProductSingleImport").prop("checked"),
                r = jQuery("#includeShippingCostIntoFinalPrice").prop("checked");
            var o = {
                title: globalWaitingList[e].title,
                description: globalWaitingList[e].description,
                images: globalWaitingList[e].images,
                variations: globalWaitingList[e].variations.variations,
                prductUrl: globalWaitingList[e].productUrl,
                mainImage: globalWaitingList[e].mainImage,
                simpleSku: globalWaitingList[e].simpleSku,
                productType: "variable",
                attributes: globalWaitingList[e].variations.NameValueList,
                shortDescription: "",
                isFeatured: !0,
                postStatus: !0,
                postStatus: "publish"
            };
            jQuery.ajax({
                url: wooshark_params.ajaxurl,
                type: "POST",
                dataType: "JSON",
                data: {
                    action: "wooshark-insert-product",
                    sku: o.simpleSku.toString(),
                    title: o.title,
                    description: o.description || "",
                    productType: "variable",
                    mainImage: o.mainImage,
                    images: o.images || [],
                    attributes: o.attributes,
                    variations: o.variations,
                    postStatus: i ? "publish" : "draft",
                    shortDescription: o.shortDescription || "",
                    productUrl: globalUrlProduct,
                    categories: _savedConfiguration ? _savedConfiguration.bulkCategories : [],
                    isFeatured: a,
                    importVariationImages: t,
                    includeShippingCostIntoFinalPrice: r
                },
                success: function(e) {
                    e && e.error && e.error_msg && displayToast(e.error_msg, "red"), e && !e.error && e.data && displayToast(e.data, "green"), e && e.error && e.error_msg && e.error_msg.includes("you have reached the permitted usage") && setTimeout(function() {
                        window.open("https://sharkdropship.com/aliexpress", "_blank")
                    }, 4e3)
                },
                error: function(e) {
                    e && displayToast("error while inserting products, please retry", "red")
                },
                complete: function() {
                    indexStopLoading++, indexStopLoading == globalWaitingList.length && (stopLoading(), globalWaitingList = [])
                }
            })
        }, 3e3 * e)
    }(t)
}), jQuery(document).on("click", "#set-product-to-draft", function(e) {
    removeProductFromWP(jQuery(this).attr("idOfPRoductToRemove"))
}), jQuery(document).on("click", "#remove-product-from-draft", function(e) {
    removeProductFromWP(jQuery(this).attr("idOfPRoductToRemove"))
}), jQuery(document).on("click", "#remove-product-from-wp", function(e) {
    removeProductFromWP(jQuery(this).attr("idOfPRoductToRemove"))
}), jQuery(document).on("click", "#importAllProductOnThisPage", function(e) {
    displayToast("This is premuim feature, please upgrade to use it"), setTimeout(function() {
        window.open("https://sharkdropship.com/aliexpress", "_blank")
    }, 4e3)
});
var _isAuthorized = !1;

function getReviewsFromHtml(e, t) {
    e && (xmlhttp = new XMLHttpRequest, xmlhttp.onreadystatechange = function() {
        if (4 == xmlhttp.readyState && 200 === xmlhttp.status) try {
            if (data = JSON.parse(xmlhttp.response).data, jQuery("#table-reviews tbody").empty(), data && data.length) {
                var e = "";
                jQuery("#loadMoreReviews").show(), jQuery("#setRealRandomName").show(), jQuery("#Load100Reviews").show(), stopLoading(), data.forEach(function(t) {
                    e = '<tr><td id="review" contenteditable>' + t.review + '</td><td id="username" contenteditable>' + getUsername() + '</td><td id="datecreation" contenteditable>' + getCreationDate() + '</td><td id="rating"><input type="number" min="1" max="5" value="5"></input></td><td id="email" contenteditable> emailNotVisible@unknown.com (you can change this)</td><td><button class="btn btn-danger" id="removeReview">X</button></td></tr></tr>', jQuery("#table-reviews tbody").append(e)
                }), jQuery("#table-reviews tr td[contenteditable]").css({
                    border: "1px solid #51a7e8",
                    "box-shadow": "inset 0 1px 2px rgba(0,0,0,0.075), 0 0 5px rgba(81,167,232,0.5)"
                })
            } else stopLoading(), displayToast("No reviews for this sku using the preselected criteria")
        } catch (e) {
            stopLoading()
        }
    }, xmlhttp.open("POST", hostname + ":8002/getReviewsFeomAliExpressOfficialApi", !0), xmlhttp.setRequestHeader("Content-Type", "application/json"), xmlhttp.send(JSON.stringify({
        productId: e,
        pageNo: t
    })))
}

function getAlreadyImportedProducts(e) {
    jQuery.ajax({
        url: wooshark_params.ajaxurl,
        type: "POST",
        dataType: "JSON",
        data: {
            action: "get-already-imported-products",
            listOfSkus: e
        },
        success: function(e) {
            let t = e;
            t && t.length && displayAlreadyImportedIcon(t)
        },
        error: function(e) {
            e.responseText ? stopLoading() : (displayToast("Error while getting list of products", "red"), stopLoading())
        },
        complete: function() {
            stopLoading()
        }
    })
}

function displayAlreadyImportedIcon(e) {
    if (e && e.length) {
        let a = e.map(function(e) {
                return e.sku
            }),
            i = jQuery("#product-search-container .card");
        for (var t = 0; t < i.length; t++) {
            let e = jQuery(i[t]).find("#sku")[0].innerText;
            a.indexOf(e) > -1 && jQuery('<div><a  style="width:80%; font-size:8px" id="alreadyImported" class=" btn btn-default">Already imported</a></div>').appendTo(jQuery(i[t]))
        }
    }
}

function getFinalProductStructure(e) {
    let t = jQuery("input[value=titleASIN]")[0].checked,
        a = jQuery("input[value=galleryASIN]")[0].checked;
    var i = [];
    jQuery("#customProductCategory input:checked").each(function() {
        i.push(jQuery(this).attr("value"))
    });
    var r = getReviews(),
        o = (jQuery("#customPrice").val(), window.location.href.indexOf("/dp/"), jQuery("#customProductTitle").val());
    let n = [];
    tagsProduct && tagsProduct.length && (n = tagsProduct);
    var l = quill.root.innerHTML,
        s = i;
    let c = buildVariationsForSingleImport();
    c = getItemSpecificfromTableModal(c);
    var u = jQuery("#shortDescription").val(),
        d = jQuery("#isPublish")[0].checked,
        p = (e.asin, jQuery("#isFeatured")[0].checked);
    if (generalPreferences.importReviewsGeneral || (r = []), generalPreferences.importDescriptionGeneral || (l = ""), generalPreferences.textToReplace && generalPreferences.textToBeReplaced) {
        var y = new RegExp(generalPreferences.textToBeReplaced, "g");
        l = l.replace(y, generalPreferences.textToReplace)
    }
    var m = !0;
    generalPreferences.importSalePriceGeneral || (m = !1);
    jQuery("#customSalePrice").val();
    return {
        title: t && e.singleTitle ? e.singleTitle : o,
        currentPrice: e.readyState,
        originalPrice: e.regularPice,
        description: l,
        images: a && e.images ? e.images : images,
        totalAvailQuantity: e.quantity || 1,
        productUrl: e.productUrl,
        isPublish: d,
        productCategoies: s,
        productWeight: "",
        reviews: r,
        shortDescription: u,
        simpleSku: e.asin,
        importSalePrice: m,
        salePrice: e.salePrice,
        featured: p,
        tags: n,
        affiliateLink: e.isAffiliate ? e.productUrl : "",
        button_text: e.isAffiliate ? jQuery("#customBuyNow").val() : "",
        variations: c
    }
}

function getItemSpecificfromTableModal(e) {
    var t = {
        variations: [],
        NameValueList: []
    };
    return jQuery("#table-attributes tr").each(function(e, a) {
        e && t.NameValueList.push({
            name: a.cells[0].textContent.toLowerCase().replace(/ /g, "-"),
            values: a.cells[1].textContent.split(","),
            variation: !0,
            visible: !0
        })
    }), t
}

function insertProductWithBulkApi(e) {
    if (isAhtorizedToImport()) {
        let t = new XMLHttpRequest;
        t.onreadystatechange = function() {
            handleServerResponse(t)
        }, t.open("POST", "https://wooshark.website:8002/insertSimpleProductsInBulk", !0), t.setRequestHeader("Content-Type", "application/json"), t.send(JSON.stringify({
            products: e,
            clientWebsite: clientWebsite,
            clientKey: clientKey,
            clientSecretKey: clientSecretKey
        }))
    } else isNotAuthorizedToImport()
}
jQuery(document).on("click", "#titiToto", function(e) {}), jQuery(document).on("click", "#loadMoreReviews", function(e) {
    getReviewsFromHtml(currentProductModalDisplayed, ++currentPageReviews)
}), jQuery(document).on("click", "#searchCategoryByNameInput", function(e) {
    let t = jQuery("#searchCategoryByNameInput").val();
    t && jQuery.ajax({
        url: wooshark_params.ajaxurl,
        type: "POST",
        dataType: "JSON",
        data: {
            action: "search-category-by-name",
            searchCategoryByNameInput: t
        },
        success: function(e) {},
        error: function(e) {
            e.responseText ? (displayToast(e.responseText, "red"), stopLoading()) : (displayToast("Error while getting list of products", "red"), stopLoading())
        },
        complete: function() {
            stopLoading()
        }
    })
}), jQuery(document).on("click", "#searchCategories", function(e) {
    jQuery("#customProductCategory input:not(:checked)").each(function() {
        jQuery(this).parent().remove()
    });
    let t = jQuery("#categorySearchKeyword").val();
    t ? savedCategories && savedCategories.length && savedCategories.forEach(function(e, a) {
        e && e.name && e.name.includes(t) && (items = '<div class="checkbox"><label><input class="form-check-input mt-1" type="checkbox" value="' + e.term_id + '"/>' + e.name + "</label>", jQuery("#customProductCategory").append(jQuery(items)))
    }) : savedCategories && savedCategories.length && savedCategories.forEach(function(e, t) {
        items = '<div class="checkbox"><label><input class="form-check-input mt-1" type="checkbox" value="' + e.term_id + '"/>' + e.name + "</label>", jQuery("#customProductCategory").append(jQuery(items))
    })
}), jQuery(document).on("click", "#deleteTag", function(e) {
    jQuery(this).parents(".customTagCre").remove()
}), jQuery(document).on("click", "#insertProductAsAffiliate", function(e) {
    let t = jQuery("#affiliateLinkUrl").val();
    if (t.includes("https")) {
        jQuery(this).parents("tr").find(".newLoaderAffiliate").append(jQuery('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>')), insertProductAsSingle({
            images: jQuery(this).parents("tr").find("#singleImages").text() ? jQuery(this).parents("tr").find("#singleImages").text().split(",") : [],
            isAffiliate: !0,
            asin: jQuery(this).parents("tr").find("#singleAsin").text(),
            regularPice: jQuery(this).parents("tr").find("#singleRegularPrice").text(),
            quantity: jQuery(this).parents("tr").find("#singleQuantity").text(),
            salePrice: jQuery(this).parents("tr").find("#singleSalePrice").text(),
            productUrl: t,
            title: jQuery(this).parents("tr").find("#singleTitle").text()
        })
    } else displayToast("Please open the advanced settings and fill the affiliate link", "red")
}), jQuery(document).on("click", "#importAllAsAffiliate", function(e) {
    let t = jQuery("#affiliateLinkUrl").val();
    if (t.includes("https")) {
        let e = [];
        jQuery(".newLoaderAllAffiliate").append(jQuery('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>'));
        let i = jQuery("#table-variations tbody tr");
        for (var a = 0; a < i.length; a++) {
            let r = getFinalProductStructure({
                images: jQuery(i[a]).find("#singleImages").text() ? jQuery(i[a]).find("#singleImages").text().split(",") : [],
                isAffiliate: !0,
                asin: jQuery(i[a]).find("#singleAsin").text(),
                regularPice: jQuery(i[a]).find("#singleRegularPrice").text(),
                quantity: jQuery(i[a]).find("#singleQuantity").text(),
                salePrice: jQuery(i[a]).find("#singleSalePrice").text(),
                productUrl: t,
                singleTitle: jQuery(i[a]).find("#singleTitle").text()
            });
            e.push(r)
        }
        insertProductWithBulkApi(e)
    } else displayToast("Affiliate link or not valid", "red")
}), jQuery(document).on("click", "#addSpecificToDesc", function(e) {
    if (jQuery("#addSpecificToDesc")[0].checked) {
        let e = getItemSpecificfromTable({
                variations: [],
                NameValueList: []
            }),
            t = quill.root.innerHTML;
        e && e.NameValueList && (e.NameValueList.forEach(function(e) {
            t = t + "<div>" + e.name + " " + e.value + "</div>"
        }), quill.setContents([]), quill.clipboard.dangerouslyPasteHTML(0, t))
    }
}), jQuery(document).on("click", "#includeImageFromDescription", function(b, e) {

    jQuery("#includeImageFromDescription")[0].checked && jQuery("#includeImageFromDescription").each(function() {
        jQuery('<div><button type="button" style="background-color:red"  class="button-5" id="removeImage" ><i style="font-size:15px ; margin:5px">Remove Image</i></button><button type="button" class="button-5" id="editImageAliexpress" ><i style="font-size:15px ; margin:5px; margin:5px" disabled>Edit image (testing phase) </i></button><img  src=' + e.currentSrc + " /><div>").appendTo(jQuery("#galleryPicture")), images.push(e.currentSrc)
    });

    // jQuery("#includeImageFromDescription")[0].checked && imagesFromDescription.forEach(function(e) {
    //     jQuery('<div><button type="button" style="background-color:red"  class="button-5" id="removeImage" ><i style="font-size:15px ; margin:5px">Remove Image</i></button><button type="button" class="button-5" id="editImageAliexpress" ><i style="font-size:15px ; margin:5px; margin:5px" disabled>Edit image (testing phase) </i></button><img  src=' + e.currentSrc + " /><div>").appendTo(jQuery("#galleryPicture")), images.push(e.currentSrc)
    // })
}), jQuery(document).on("click", "#ImportImagesFromGallery", function(e) {
    let t = jQuery("#galleryPicture img"),
        a = quill.root.innerHTML;
    t.each(function(b, e) {
        a = a + "<div>" + e.outerHTML + " /></div>"
    }), quill.setContents([]), quill.clipboard.dangerouslyPasteHTML(0, a)
}), jQuery(document).on("click", "#importAllAsSimple", function(e) {
    let t = [];
    jQuery(".newLoaderAllSimple").append(jQuery('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>'));
    let a = jQuery("#table-variations tbody tr");
    for (var i = 0; i < a.length; i++) {
        let e = getFinalProductStructure({
            images: jQuery(a[i]).find("#singleImages").text() ? jQuery(a[i]).find("#singleImages").text().split(",") : [],
            isAffiliate: !1,
            asin: jQuery(a[i]).find("#singleAsin").text(),
            regularPice: jQuery(a[i]).find("#singleRegularPrice").text(),
            quantity: jQuery(a[i]).find("#singleQuantity").text(),
            salePrice: jQuery(a[i]).find("#singleSalePrice").text(),
            productUrl: globalUrlProduct,
            singleTitle: jQuery(a[i]).find("#singleTitle").text()
        });
        t.push(e)
    }
    insertProductWithBulkApi(t)
});
let globalUrlProduct = "";

function insertProductAsSingle(e) {
    let t = jQuery("input[value=titleASIN]")[0].checked,
        a = jQuery("input[value=galleryASIN]")[0].checked;
    var i = [];
    jQuery("#customProductCategory input:checked").each(function() {
        i.push(jQuery(this).attr("value"))
    });
    var r = getReviews(),
        o = (jQuery("#customPrice").val(), window.location.href),
        n = o.indexOf("/dp/");
    n < 0 && (n = o.indexOf("/gp/")), n += 4;
    window.location.href;
    var l = jQuery("#customProductTitle").val();
    let s = [];
    tagsProduct && tagsProduct.length && (s = tagsProduct);
    var c = quill.root.innerHTML,
        u = i;
    customVariations = buildVariationsForSingleImport(), customVariations = getItemSpecificfromTableModal(customVariations);
    var d = jQuery("#shortDescription").val(),
        p = jQuery("#isPublish")[0].checked,
        y = (e.asin, jQuery("#isFeatured")[0].checked);
    if (generalPreferences.importReviewsGeneral || (r = []), generalPreferences.importDescriptionGeneral || (c = ""), generalPreferences.textToReplace && generalPreferences.textToBeReplaced) {
        var m = new RegExp(generalPreferences.textToBeReplaced, "g");
        c = c.replace(m, generalPreferences.textToReplace)
    }
    var g = !0;
    generalPreferences.importSalePriceGeneral || (g = !1);
    jQuery("#customSalePrice").val();
    let h = {};
    h = {
        title: t && e.title ? e.title : l,
        currentPrice: e.readyState,
        originalPrice: e.regularPice,
        description: c,
        images: a && e.images && e.images.length ? e.images : images,
        totalAvailQuantity: e.quantity || 1,
        productUrl: globalUrlProduct,
        isPublish: p,
        productCategoies: u,
        productWeight: "",
        reviews: r,
        shortDescription: d,
        simpleSku: e.asin,
        importSalePrice: g,
        salePrice: e.salePrice,
        featured: y,
        tags: s,
        affiliateLink: e.isAffiliate ? e.productUrl : "",
        button_text: e.isAffiliate ? jQuery("#customBuyNow").val() : "",
        variations: customVariations
    }, jQuery.ajax({
        url: wooshark_params.ajaxurl,
        type: "POST",
        dataType: "JSON",
        data: {
            action: "wooshark-insert-product",
            sku: h.simpleSku.toString(),
            title: h.title,
            description: h.description || "",
            images: h.images || [],
            categories: h.productCategoies,
            regularPrice: h.originalPrice.toString(),
            salePrice: h.salePrice.toString(),
            quantity: h.totalAvailQuantity,
            productType: e.isAffiliate ? "external" : "simple",
            attributes: customVariations.NameValueList || [],
            variations: [],
            isFeatured: h.featured,
            postStatus: h.isPublish ? "publish" : "draft",
            shortDescription: h.shortDescription || "",
            productUrl: h.productUrl,
            importVariationImages: !0,
            reviews: h.reviews,
            tags: h.tags,
            includeShippingCostIntoFinalPrice: !1
        },
        success: function(e) {
            e && e.error && e.error_msg && displayToast(e.error_msg, "red"), e && !e.error && e.data && displayToast(e.data, "green"), stopLoading(), jQuery(".lds-ring").remove(), e && e.error && e.error_msg && e.error_msg.includes("you have reached the permitted usage") && setTimeout(function() {
                window.open("https://sharkdropship.com/aliexpress", "_blank")
            }, 4e3)
        },
        error: function(e) {
            jQuery(".lds-ring").remove(), stopLoading(), e && e.responseText && displayToast(e.responseText, "red")
        }
    })
}

function buildVariationsForSingleImport() {
    return {
        variations: [],
        NameValueList: []
    }
}

function isFreeTrial() {
    let e = localStorage.getItem("freeTrialCounterAliExpressStandalone");
    return !e || (null == !e || (!!(e && Number(e) < 40) || !(e && Number(e) > 40) && void 0))
}

function updateFreeTrialMaximum() {
    let e = localStorage.getItem("freeTrialCounterAliExpressStandalone");
    e && !isNaN(Number(e)) ? (e = Number(e) + 1, localStorage.setItem("freeTrialCounterAliExpressStandalone", e)) : localStorage.setItem("freeTrialCounterAliExpressStandalone", 1)
}
jQuery(document).on("click", "#insertProductAsSimple", function(e) {
    jQuery(this).parents("tr").find(".newLoaderSimple").append(jQuery('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>')), insertProductAsSingle({
        images: jQuery(this).parents("tr").find("#singleImages").text() ? jQuery(this).parents("tr").find("#singleImages").text().split(",") : [],
        isAffiliate: !1,
        asin: jQuery(this).parents("tr").find("#singleAsin").text(),
        regularPice: jQuery(this).parents("tr").find("#singleRegularPrice").text(),
        quantity: jQuery(this).parents("tr").find("#singleQuantity").text(),
        salePrice: jQuery(this).parents("tr").find("#singleSalePrice").text(),
        productUrl: globalUrlProduct,
        title: jQuery(this).parents("tr").find("#singleTitle").text()
    })
});
let isAuthUser = !1;

function isAhtorizedToImport() {
    return !!isAuthUser || !!isFreeTrial()
}

function isNotAuthorizedToImport() {
    displayToast("You have reached maximum import limit, you can upgrade to a paid plan", "red"), jQuery(".lds-ring").remove(), setTimeout(function() {
        window.open("https://sharkdropship.com/aliexpress", "_blank")
    }, 4e3)
}

function getProductUrlForSingle(e, t) {
    let a = window.location.href;
    return a
}
jQuery(document).on("click", "#addSpecificToDesc", function(e) {
    if (jQuery("#addSpecificToDesc")[0].checked) {
        let e = getItemSpecificfromTable({
                variations: [],
                NameValueList: []
            }),
            t = quill.root.innerHTML;
        e && e.NameValueList && (e.NameValueList.forEach(function(e) {
            t = t + "<div>" + e.name + " " + e.value + "</div>"
        }), quill.setContents([]), quill.clipboard.dangerouslyPasteHTML(0, t))
    }
}), jQuery(document).on("click", "#createTagsFromTitle", function(e) {
    if (jQuery("#createTagsFromTitle")[0].checked) {
        let e = jQuery("#customProductTitle").val().split(/(\s+)/);
        e && e.length && e.forEach(function(e) {
            e && " " != e && e.length > 3 && (tagsProduct.push(e), jQuery("#tagInput").val(""), jQuery("#tagInputDisplayed").append(jQuery("<div class='customTagCre'># " + e.replace(/,/g, "") + "&nbsp;<button class='button-39' id='deleteTag'>x</button> </div> ")))
        })
    }
}), jQuery(document).on("click", "#ImportImagesFromGallery", function(e) {
    let t = jQuery("#galleryPicture img"),
        a = quill.root.innerHTML;
    t.forEach(function(e) {
        a = a + "<div>" + e.outerHTML + " /></div>"
    }), quill.setContents([]), quill.clipboard.dangerouslyPasteHTML(0, a)
});
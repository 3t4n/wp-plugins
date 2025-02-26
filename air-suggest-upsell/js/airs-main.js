/**
 * Created by prashantsingh on 31/03/20.
 */

var $ = jQuery;
var AIRAPIURL = 'https://www.airsuggest.com/api/';
jQuery(document).ready(function ($) {
    var plugPath = $('#airs-plug-path').val();
    var categories = $('#airs-categories').val();
    var domainName = window.location.hostname;
    if (categories) {
        var formData = new FormData();
        formData.append('siteUrl', domainName);
        formData.append('productCategories', categories);
        formData.append('security', $.trim($('#airs-nonce').val()));
        $.ajax({
            type: 'POST',
            url: AIRAPIURL + 'getUpsellProducts/0',
            data: formData,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
            },
            success: function (response) {
                if (response.code == 200) {
                    var i = 0;
                    var row1 = '';
                    var row2 = '';
                    var row3 = '';
                    var row4 = '';
                    var row5 = '';
                    var row6 = '';
                    var Tagcategories1 = [];
                    $.each(response.dataArr, function (index, value) {
                        if (Tagcategories1.indexOf(value['shop_category_name']) == -1 && Tagcategories1.length < 5) {
                            Tagcategories1.push(value['shop_category_name']);
                        }
                        var content = '<li><div class="prodctBox"><div class="productImg">' +
                            '<span class="status ' + (i % 4 == 2 ? 'statusblue' : (i % 4 == 3 ? 'statuslblue' : (i % 4 == 0 ? 'statusgreen' : ''))) + ' dvPassport1" >' + value['discount'] + '% on the product price</span>' +
                            '<div class="pslider" data-toggle="slider"><div class="slider-content">' +
                            '<div><a href="' + value['product_url'] + '" target="_blank"><img src="' + value['product_image'] + '"></a></div></div>' +
                            '</div></div>' +
                            '<div class="productDetails">' +
                            '<h1><a href="' + value['product_url'] + '" target="_blank">' + value['product_name'] + '</a></h1>' +
                            '<span><i><img src="' + plugPath + 'images/star.png" width="12"></i><i><img src="' + plugPath + 'images/star.png" width="12"></i>' +
                            '<i><img src="' + plugPath + 'images/star.png"width="12"></i><i><img src="' + plugPath + 'images/star.png" width="12"></i>' +
                            '<i><img src="' + plugPath + 'images/star.png" width="12"></i> (25)</span><h3>' + value['currency'] + ' ' + value['product_price'] + '</h3>' +
                            '<h4>From <a href="javascript:void(0)">' + value['shop_category_name'] + '</a></h4> </div> </div> </li>';
                        if (i < 4) {
                            row1 = row1 + content;
                        }
                        if (i >= 4 && i < 16) {
                            row2 = row2 + content;
                        }
                        if (i >= 16 && i < 20) {
                            row3 = row3 + content;
                        }
                        if (i >= 20 && i < 32) {
                            row4 = row4 + content;
                        }
                        if (i >= 32 && i < 36) {
                            row5 = row5 + content;
                        }
                        if (i >= 36 && i < 48) {
                            row6 = row6 + content;
                        }
                        i++;
                    });
                    var TagContent1 = '<li class="project"><a href="javascript:void(0)" onclick="airsGetProducts(\''+Tagcategories1[0]+'\',\'0\')">' + Tagcategories1[0] + '</a></li>' +
                        '<li class="meeting"><a href="javascript:void(0)" onclick="airsGetProducts(\''+Tagcategories1[1]+'\',\'0\')">' + Tagcategories1[1] + '</a></li>' +
                        '<li class="other"><a href="javascript:void(0)" onclick="airsGetProducts(\''+Tagcategories1[2]+'\',\'0\')">' + Tagcategories1[2] + '</a></li>' +
                        '<li class="status"><a href="javascript:void(0)" onclick="airsGetProducts(\''+Tagcategories1[3]+'\',\'0\')">' + Tagcategories1[3] + '</a></li>' +
                        '<li class="webinar"><a href="javascript:void(0)" onclick="airsGetProducts(\''+Tagcategories1[4]+'\',\'0\')">' + Tagcategories1[4] + '</a></li>';
                    $('.airtags0 ul').append(TagContent1);
                    if (row1 != '') {
                        $('.productRow0 ul').append(row1);
                    }
                    if (row2 != '') {
                        $('.productRow1 ul').append(row2);
                    }
                    if (row3 != '') {
                        $('.productRow2 ul').append(row3);
                    }
                    if (row4 != '') {
                        $('.productRow3 ul').append(row4);
                    }
                    if (row5 != '') {
                        $('.productRow4 ul').append(row5);
                    }
                    if (row6 != '') {
                        $('.productRow5 ul').append(row6);
                    }
                }
            }
        });
        $.ajax({
            type: 'POST',
            url: AIRAPIURL + 'getUpsellProducts/1',
            data: formData,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
            },
            success: function (response) {
                if (response.code == 200) {
                    var j = 0;
                    var row7 = '';
                    var row8 = '';
                    var row9 = '';
                    var row10 = '';
                    var row11 = '';
                    var row12 = '';
                    var Tagcategories2 = [];
                    $.each(response.dataArr, function (index, value) {
                        if (Tagcategories2.indexOf(value['shop_category_name']) == -1 && Tagcategories2.length < 5) {
                            Tagcategories2.push(value['shop_category_name']);
                        }
                        var content2 = '<li><div class="prodctBox"><div class="productImg">' +
                            '<span class="status ' + (j % 4 == 2 ? 'statusblue' : (j % 4 == 3 ? 'statuslblue' : (j % 4 == 0 ? 'statusgreen' : ''))) + ' dvPassport2" >' + value['discount'] + '% on the product price</span>' +
                            '<div class="pslider" data-toggle="slider"><div class="slider-content">' +
                            '<div><a href="' + value['product_url'] + '" target="_blank"><img src="' + value['product_image'] + '"></a></div></div>' +
                            '</div></div>' +
                            '<div class="productDetails">' +
                            '<h1><a href="' + value['product_url'] + '" target="_blank">' + value['product_name'] + '</a></h1>' +
                            '<span><i><img src="' + plugPath + '/images/star.png" width="12"></i><i><img src="' + plugPath + '/images/star.png" width="12"></i>' +
                            '<i><img src="' + plugPath + '/images/star.png"width="12"></i><i><img src="' + plugPath + '/images/star.png" width="12"></i>' +
                            '<i><img src="' + plugPath + '/images/star.png" width="12"></i> (25)</span><h3>' + value['currency'] + ' ' + value['product_price'] + '</h3>' +
                            '<h4>From <a href="javascript:void(0)">' + value['shop_category_name'] + '</a></h4> </div> </div> </li>';
                        if (j < 4) {
                            row7 = row7 + content2;
                        }
                        if (j >= 4 && j < 16) {
                            row8 = row8 + content2;
                        }
                        if (j >= 16 && j < 20) {
                            row9 = row9 + content2;
                        }
                        if (j >= 20 && j < 32) {
                            row10 = row10 + content2;
                        }
                        if (j >= 32 && j < 36) {
                            row11 = row11 + content2;
                        }
                        if (j >= 36 && j < 48) {
                            row12 = row12 + content2;
                        }
                        j++;
                    });

                    var TagContent2 = '<li class="project"><a href="javascript:void(0)" onclick="airsGetProducts(\''+Tagcategories2[0]+'\',\'1\')">' + Tagcategories2[0] + '</a></li>' +
                        '<li class="meeting"><a href="javascript:void(0)" onclick="airsGetProducts(\''+Tagcategories2[1]+'\',\'1\')">' + Tagcategories2[1] + '</a></li>' +
                        '<li class="other"><a href="javascript:void(0)" onclick="airsGetProducts(\''+Tagcategories2[2]+'\',\'1\')">' + Tagcategories2[2] + '</a></li>' +
                        '<li class="status"><a href="javascript:void(0)" onclick="airsGetProducts(\''+Tagcategories2[3]+'\',\'1\')">' + Tagcategories2[3] + '</a></li>' +
                        '<li class="webinar"><a href="javascript:void(0)" onclick="airsGetProducts(\''+Tagcategories2[4]+'\',\'1\')">' + Tagcategories2[4] + '</a></li>';
                    $('.airtags1 ul').append(TagContent2);
                    if (row7 != '') {
                        $('.productRow6 ul').append(row7);
                    }
                    if (row8 != '') {
                        $('.productRow7 ul').append(row8);
                    }
                    if (row9 != '') {
                        $('.productRow8 ul').append(row9);
                    }
                    if (row10 != '') {
                        $('.productRow9 ul').append(row10);
                    }
                    if (row11 != '') {
                        $('.productRow10 ul').append(row11);
                    }
                    if (row12 != '') {
                        $('.productRow11 ul').append(row12);
                    }
                }
            }
        });
    }
    $('#clone_button').click(function () {
        if ($('.productRowExtend').is(":visible")) {
            $('.productRowExtend').css('display', 'none');
        } else {
            $('.productRowExtend').css('display', 'block');
        }
    });

    $(function () {
        $("#btnPassport1").click(function () {
            if ($(this).val() == "Yes") {
                $(".dvPassport1").show();
                $(this).val("No");
            } else {
                $(".dvPassport1").hide();
                $(this).val("Yes");
            }
        });
    });


    $(function () {
        $("#btnPassport2").click(function () {
            if ($(this).val() == "Yes") {
                $(".dvPassport2").show();
                $(this).val("No");
            } else {
                $(".dvPassport2").hide();
                $(this).val("Yes");
            }
        });
    });

    $(".custom-select").each(function() {
        var classes = $(this).attr("class"),
            id      = $(this).attr("id"),
            name    = $(this).attr("name");
        var template =  '<div class="' + classes + '">';
        template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
        template += '<div class="custom-options">';
        $(this).find("option").each(function() {
            template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
        });
        template += '</div></div>';

        $(this).wrap('<div class="custom-select-wrapper"></div>');
        $(this).hide();
        $(this).after(template);
    });
    $(".custom-option:first-of-type").hover(function() {
        $(this).parents(".custom-options").addClass("option-hover");
    }, function() {
        $(this).parents(".custom-options").removeClass("option-hover");
    });
    $(".custom-select-trigger").on("click", function() {
        $('html').one('click',function() {
            $(".custom-select").removeClass("opened");
        });
        $(this).parents(".custom-select").toggleClass("opened");
        event.stopPropagation();
    });
    $(".custom-option").on("click", function() {
        $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
        $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
        $(this).addClass("selection");
        $(this).parents(".custom-select").removeClass("opened");
        $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
    });
    $('.js-carrousel__button__button.news-carrousel__button__button').on('click', function () {
        $('.airs-tabs').addClass('airs-d-none');
        $('.airs-tabs').removeClass('airs-d-block');
        $('#BoughTogther, #BoughTogther2').addClass('airs-d-block');
        $('#BoughTogther, #BoughTogther2').removeClass('airs-d-none');
    });
});
function airsGetProducts(cat,opt) {
    var plugPath = $('#airs-plug-path').val();
    var formData = new FormData();
    formData.append('category', cat);
    formData.append('security', $.trim($('#airs-nonce').val()));
    $.ajax({
        type: 'POST',
        url: AIRAPIURL + 'getProductsByCategories/48/'+opt,
        data: formData,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
        },
        success: function (response) {
            if (response.code == 200) {
                airsCreateContent(response.dataArr,opt);
            }
        }
    });
}

function airsSearchProduct(element, opt) {
    var searchstr = $('#' + element).val();
    if (searchstr.length >= 3) {
        var formData = new FormData();
        formData.append('searchstr', searchstr);
        formData.append('security', $.trim($('#airs-nonce').val()));
        $.ajax({
            type: 'POST',
            url: AIRAPIURL + 'searchProducts/48/' + opt,
            data: formData,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
            },
            success: function (response) {
                if (response.code == 200) {
                    airsCreateContent(response.dataArr,opt);
                }
            }
        });
    }
}

function airsCreateContent(DataArr,opt) {
    var plugPath = $('#airs-plug-path').val();
    var i = 0;
    var row1 = '';
    var row2 = '';
    var row3 = '';
    var row4 = '';
    var row5 = '';
    var row6 = '';
    var row7 = '';
    var row8 = '';
    var row9 = '';
    var row10 = '';
    var row11 = '';
    var row12 = '';
    $.each(DataArr, function (index, value) {
        var content = '<li><div class="prodctBox"><div class="productImg">' +
            '<span class="status ' + (i % 4 == 2 ? 'statusblue' : (i % 4 == 3 ? 'statuslblue' : (i % 4 == 0 ? 'statusgreen' : ''))) + ' dvPassport1" >' + value['discount'] + '% on the product price</span>' +
            '<div class="pslider" data-toggle="slider"><div class="slider-content">' +
            '<div><a href="' + value['product_url'] + '" target="_blank"><img src="' + value['product_image'] + '"></a></div></div>' +
            '</div></div>' +
            '<div class="productDetails">' +
            '<h1><a href="' + value['product_url'] + '" target="_blank">' + value['product_name'] + '</a></h1>' +
            '<span><i><img src="' + plugPath + 'images/star.png" width="12"></i><i><img src="' + plugPath + 'images/star.png" width="12"></i>' +
            '<i><img src="' + plugPath + 'images/star.png"width="12"></i><i><img src="' + plugPath + 'images/star.png" width="12"></i>' +
            '<i><img src="' + plugPath + 'images/star.png" width="12"></i> (25)</span><h3>' + value['currency'] + ' ' + value['product_price'] + '</h3>' +
            '<h4>From <a href="javascript:void(0)">' + value['shop_category_name'] + '</a></h4> </div> </div> </li>';
        if (opt == '0') {
            if (i < 4) {
                row1 = row1 + content;
            }
            if (i >= 4 && i < 16) {
                row2 = row2 + content;
            }
            if (i >= 16 && i < 20) {
                row3 = row3 + content;
            }
            if (i >= 20 && i < 32) {
                row4 = row4 + content;
            }
            if (i >= 32 && i < 36) {
                row5 = row5 + content;
            }
            if (i >= 36 && i < 48) {
                row6 = row6 + content;
            }
        } else {
            if (i < 4) {
                row7 = row7 + content;
            }
            if (i >= 4 && i < 16) {
                row8 = row8 + content;
            }
            if (i >= 16 && i < 20) {
                row9 = row9 + content;
            }
            if (i >= 20 && i < 32) {
                row10 = row10 + content;
            }
            if (i >= 32 && i < 36) {
                row11 = row11 + content;
            }
            if (i >= 36 && i < 48) {
                row12 = row12 + content;
            }
        }
        i++;
    });
    if (opt == '0') {

        $('.productRow0 ul, .productRow1 ul, .productRow2 ul, .productRow3 ul, .productRow4 ul, .productRow5 ul').empty();
        if (row1 != '') {
            $('.productRow0 ul').append(row1);
        }
        if (row2 != '') {
            $('.productRow1 ul').append(row2);
        }
        if (row3 != '') {
            $('.productRow2 ul').append(row3);
        }
        if (row4 != '') {
            $('.productRow3 ul').append(row4);
        }
        if (row5 != '') {
            $('.productRow4 ul').append(row5);
        }
        if (row6 != '') {
            $('.productRow5 ul').append(row6);
        }
    } else {
        $('.productRow6 ul, .productRow7 ul, .productRow8 ul, .productRow9 ul, .productRow10 ul, .productRow11 ul').empty();
        if (row7 != '') {
            $('.productRow6 ul').append(row7);
        }
        if (row8 != '') {
            $('.productRow7 ul').append(row8);
        }
        if (row9 != '') {
            $('.productRow8 ul').append(row9);
        }
        if (row10 != '') {
            $('.productRow9 ul').append(row10);
        }
        if (row11 != '') {
            $('.productRow10 ul').append(row11);
        }
        if (row12 != '') {
            $('.productRow11 ul').append(row12);
        }
    }
}
function AirsopenTab(eleid) {
    $('.airs-tabs').addClass('airs-d-none');
    $('.airs-tabs').removeClass('airs-d-block');
    $(eleid).addClass('airs-d-block');
    $(eleid).removeClass('airs-d-none');
}

function AirsFunction1() {
    var x = document.getElementById("myDIV1");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function AirsFunction2() {
    var x = document.getElementById("myDIV2");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function AirsFunction3() {
    var x = document.getElementById("myDIV3");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}


function AirsFunction4() {
    var x = document.getElementById("myDIV4");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function AirsFunction5() {
    var x = document.getElementById("myDIV5");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function AirsFunction6() {
    var x = document.getElementById("myDIV6");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}






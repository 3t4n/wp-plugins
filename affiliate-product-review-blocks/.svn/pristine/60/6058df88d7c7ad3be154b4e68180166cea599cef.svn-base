;(function($){

    // Products Grid View 
    $(document).ready(function(){

        // Devices Sizes
        const deskScreen = window.matchMedia('(min-width: 1025px)');
        const tabletScreen = window.matchMedia('(min-width: 768px) and (max-width: 1024px)');
        const mobileScreen = window.matchMedia('(max-width: 767px)');

        // Product Grid View
        let totalGrid = $(".wp-block-mstg-products-builder");
        for(let i = 0; i < totalGrid.length; i ++ ){
            // Selectors 
            let productTitle = $(totalGrid[i]).children(".wp-block-mstg-product-item").children(".product_title_area").children(".product_title");
            let productName = $(totalGrid[i]).children(".wp-block-mstg-product-item").children(".product_name_area").children(".product_name");
            let reviewBtn = $(totalGrid[i]).children(".wp-block-mstg-product-item").children(".product_btns").children(".review-btn");
            let affiliateBtn = $(totalGrid[i]).children(".wp-block-mstg-product-item").children(".product_btns").children(".affiliate-btn");

            // Colors
            let productTitleColor = $(totalGrid[i]).attr("data-mtc");
            let productNameColor = $(totalGrid[i]).attr("data-mnc");

            // btn colors
            let rbtnColor = $(totalGrid[i]).attr("rbtnColor");
            let rbtnBg = $(totalGrid[i]).attr("rbtnBg");
            let abtnColor = $(totalGrid[i]).attr("abtnColor");
            let abtnBg = $(totalGrid[i]).attr("abtnBg");

            // font family
            let productTitleFont = $(totalGrid[i]).attr("data-mtf");
            let productNameFont = $(totalGrid[i]).attr("data-mnf");

            // font size
            // title
            let titleDeskSize = $(totalGrid[i]).attr("data-mtdf");
            let titleTabSize = $(totalGrid[i]).attr("data-mttf");
            let titleMobSize = $(totalGrid[i]).attr("data-mtmf");
            // name
            let nameDeskSize = $(totalGrid[i]).attr("data-mndf");
            let nameTabSize = $(totalGrid[i]).attr("data-mntf");
            let nameMobSize = $(totalGrid[i]).attr("data-mnmf");

            for(let j=0; j < productName.length; j++){
                // load google font
                WebFont.load({
                    google: {
                        families: [productNameFont, productTitleFont ]
                    }
                });
                // Responsive Font Size
                if(deskScreen.matches){
                    productName[j].style.fontSize = nameDeskSize +"px";
                    productTitle[j].style.fontSize = titleDeskSize +"px";
                }
                if(tabletScreen.matches){
                    productName[j].style.fontSize = nameTabSize +"px";
                    productTitle[j].style.fontSize = titleTabSize +"px";
                }
                if(mobileScreen.matches){
                    productName[j].style.fontSize = nameMobSize +"px";
                    productTitle[j].style.fontSize = titleMobSize +"px";
                }
                // Member Name
                productName[j].style.color = productNameColor;
                productName[j].style.fontFamily = productNameFont;
                // Title 
                productTitle[j].style.color = productTitleColor;
                productTitle[j].style.fontFamily = productTitleFont;

                // buttons
                reviewBtn[j].style.color = rbtnColor;
                reviewBtn[j].style.backgroundColor = rbtnBg;
                affiliateBtn[j].style.color = abtnColor;
                affiliateBtn[j].style.backgroundColor = abtnBg;
            }
        }

        // Product Review Box 
        let totalBox = $(".wp-block-mstg-review-box");

        for(let b = 0; b < totalBox.length; b++ ){
            // Selectors 
            let rbTitle = $(totalBox[b]).children(".product-container").children(".product-content").children(".product-title").children(".product-title-link").children(".product-title-text");
            let rbSubTitle = $(totalBox[b]).children(".product-container").children(".product-content").children(".product-sub-title").children(".product-sub-title-text");
            let rbDesc = $(totalBox[b]).children(".product-container").children(".product-content").children(".product-description").children(".product-description-text");

            // font family
            let rbtFont = $(totalBox[b]).attr("tfont");
            let rbstFont = $(totalBox[b]).attr("stfont");
            let rbdFont = $(totalBox[b]).attr("dfont");

            // font size
            // title
            let rbtdSize = $(totalBox[b]).attr("tdsize");
            let rbttSize = $(totalBox[b]).attr("ttSize");
            let rbtmSize = $(totalBox[b]).attr("tmSize");

            // subtitle
            let rbstdSize = $(totalBox[b]).attr("stdsize");
            let rbsttSize = $(totalBox[b]).attr("sttSize");
            let rbstmSize = $(totalBox[b]).attr("stmSize");

            // desc
            let rbddSize = $(totalBox[b]).attr("ddSize");
            let rbdtSize = $(totalBox[b]).attr("dtSize");
            let rbdmSize = $(totalBox[b]).attr("dmSize");

            // load google font
            WebFont.load({
                google: {
                    families: [rbtFont, rbstFont, rbdFont]
                }
            });

            // Responsive Font Size
            if(deskScreen.matches){
                rbTitle[0].style.fontSize = rbtdSize +"px";
                rbSubTitle[0].style.fontSize = rbstdSize +"px";
                rbDesc[0].style.fontSize = rbddSize +"px";
            }
            if(tabletScreen.matches){
                rbTitle[0].style.fontSize = rbttSize +"px";
                rbSubTitle[0].style.fontSize = rbsttSize +"px";
                rbDesc[0].style.fontSize = rbdtSize +"px";
            }
            if(mobileScreen.matches){
                rbTitle[0].style.fontSize = rbtmSize +"px";
                rbSubTitle[0].style.fontSize = rbstmSize +"px";
                rbDesc[0].style.fontSize = rbdmSize +"px";
            }
        }

        // Product Review 
        let totalReview = $(".wp-block-mstg-full-product-review");

        for(let r = 0; r < totalReview.length; r ++ ){
            // Selectors 
            let pTitle = $(totalReview[r]).children(".product-container").children(".product-content").children(".product-title").children(".product-title-link").children(".product-title-tag");
            let pDesc = $(totalReview[r]).children(".product-container").children(".product-content").children(".product-description").children(".product-description-tag");

            // font family
            let prtitleFont = $(totalReview[r]).attr("tFont");
            let prdescFont = $(totalReview[r]).attr("dFont");

            // font size
            // title
            let tdSize = $(totalReview[r]).attr("tdSize");
            let ttSize = $(totalReview[r]).attr("ttSize");
            let tmSize = $(totalReview[r]).attr("tmSize");
            // desc
            let ddSize = $(totalReview[r]).attr("ddSize");
            let dtSize = $(totalReview[r]).attr("dtSize");
            let dmSize = $(totalReview[r]).attr("dmSize");

            // load google font
            WebFont.load({
                google: {
                    families: [prtitleFont, prdescFont]
                }
            });

            // // // Responsive Font Size
            if(deskScreen.matches){
                pTitle[0].style.fontSize = tdSize +"px";
                pDesc[0].style.fontSize = ddSize +"px";
            }
            if(tabletScreen.matches){
                pTitle[0].style.fontSize = ttSize +"px";
                pDesc[0].style.fontSize = dtSize +"px";
            }
            if(mobileScreen.matches){
                pTitle[0].style.fontSize = tmSize +"px";
                pDesc[0].style.fontSize = dmSize +"px";
            }
        }


        // Product List Builder
        let totalList = $(".wp-block-mstg-product-row");

        for(let x = 0; x < totalList.length; x ++ ){
            // Selectors 
            let pTitle = $(totalList[x]).children(".product_info_area").children(".product_title").children(".product_title_tag");

            // font family
            let prtitleFont = $(totalList[x]).attr("tfont");

            // font size
            // title
            let tdSize = $(totalList[x]).attr("tdSize");
            let ttSize = $(totalList[x]).attr("ttSize");
            let tmSize = $(totalList[x]).attr("tmSize");

            // load google font
            WebFont.load({
                google: {
                    families: [prtitleFont]
                }
            });

            // // // Responsive Font Size
            if(deskScreen.matches){
                pTitle[0].style.fontSize = tdSize +"px";
            }
            if(tabletScreen.matches){
                pTitle[0].style.fontSize = ttSize +"px";
            }
            if(mobileScreen.matches){
                pTitle[0].style.fontSize = tmSize +"px";
            }
        }

        // Products Comparison Table
        let totalTable = $(".wp-block-mstg-comparison-table .table-body");
        if(mobileScreen.matches){
            $(totalTable).addClass("mobile-table");
            $(".mobile-table").slick({  
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                infinite: true,
                dots: false,
                arrows: true,

            });
        }else{
            $(totalTable).removeClass("mobile-table");
        }
    });

})(jQuery);
jQuery(document).ready(function($){

    /*Caching all fonts vars to use later on scripts*/
    var headerFS = $( "#headerFS"),
        priceFS = $( "#priceFS"),
        planFS = $( "#planFS"),
        featureFS = $( "#featureFS"),
        buttonFS = $( "#buttonFS");

    //fonts slider IDS and classes
    var HS = '#headerSlider',
        PRS = '#priceSlider',
        PnS = '#planSlider',
        FS = '#featureSlider',
        BS = '#buttonSlider',
        SR = ".ui-slider-range",
        SH = ".ui-slider-handle";


    //for tabs
    $(".pt-tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".pt-tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });



    // nice select
    $('select.pt-nice-select').niceSelect();

    // Color Picker
    var colorIDs = '#pt_style1_hcolor, #pt_style1_btn_color, #pt_style1_btn_hc, #pt_style1_btntxt_color, #pt_style1_txt_color, #pt_style1_fcolor, ';
    colorIDs += '#pt_style2_hcolor, #pt_style2_btn_color, #pt_style2_er_color, #pt_style2_btn_hc, #pt_style2_btntxt_color, #pt_style2_orow_color, #pt_style2_pt_color, #pt_style2_ortext_color, #pt_style2_ertext_color, #pt_style2_border_color, ';
    colorIDs += '#pt_style3_hcolor, #pt_style3_h2color, #pt_style3_h3color, #pt_style3_h4color, #pt_style3_h5color, #pt_style3_btn_color, #pt_style3_btn_hc, #pt_style3_bgcolor, #pt_style3_btntxt_color, #pt_style3_btntxt_hover, #pt_style3_txt_color, #pt_style3_angle, #pt_style3_shadow, ';
    colorIDs += '#pt_style4_hcolor, #pt_style4_btn_color, #pt_style4_btn_hc, #pt_style4_btntxt_color, #pt_style4_txt_color, #pt_style4_divider, ';
    colorIDs += '#pt_style5_hcolor, #pt_style5_txt_color, #pt_style5_border, ';
    colorIDs += '#pt_style6_hcolor, #pt_style6_hc, #pt_style6_bg, #pt_style6_shadow, #pt_style6_txt_color, #pt_style6_border';
    $(colorIDs).wpColorPicker();

    // Toggle Setting for Selected Theme

    // hide all theme setting on load then show them based on selected value
    $('#style1, #style2, #style3, #style4, #style5, #style6, #pt_style2_border_color_wrap').hide();

    var $theme = $('#pt_package_theme'); // get theme jQuery object

    var currentTheme = $theme.val(); // get current theme

    $('#' + currentTheme).show() // show current theme

    // change theme setting based on selection value
    $theme.on('change',function(){
        var $this = $(this);

        // bordered
        if('style4' == $this.val() ) {
            $('#style4').show();
            // change font size based on selected theme
            headerFS.attr('value', '24');
            priceFS.attr('value', '54');
            planFS.attr('value', '15');
            featureFS.attr('value', '14');
            buttonFS.attr('value', '14');

            // slider bar with current dynamic value
            jQuery(HS+' > '+ SR).width('24%');
            jQuery(HS+' > '+ SH).css('left', '24%');
            jQuery(PRS+' > '+ SR).width('54%');
            jQuery(PRS+' > '+ SH).css('left', '54%');
            jQuery(PnS+' > '+ SR).width('15%');
            jQuery(PnS+' > '+ SH).css('left', '15%');
            jQuery(FS+' > '+ SR).width('14%');
            jQuery(FS+' > '+ SH).css('left', '14%');
            jQuery(BS+' > '+ SR).width('14%');
            jQuery(BS+' > '+ SH).css('left', '14%');

        } else {
            $('#style4').hide();
        };


        // clean
        if('style5' == $this.val()) {
            $('#style5').show()
            // change font size based on selected theme
            headerFS.attr('value', '18');
            priceFS.attr('value', '54');
            planFS.attr('value', '14');
            featureFS.attr('value', '14');
            buttonFS.attr('value', '14');

            // slider bar with current dynamic value
            jQuery(HS+' > '+ SR).width('18%');
            jQuery(HS+' > '+ SH).css('left', '18%');
            jQuery(PRS+' > '+ SR).width('54%');
            jQuery(PRS+' > '+ SH).css('left', '54%');
            jQuery(PnS+' > '+ SR).width('14%');
            jQuery(PnS+' > '+ SH).css('left', '14%');
            jQuery(FS+' > '+ SR).width('14%');
            jQuery(FS+' > '+ SH).css('left', '14%');
            jQuery(BS+' > '+ SR).width('14%');
            jQuery(BS+' > '+ SH).css('left', '14%');


        } else {
            $('#style5').hide();
        };


        // rounded
        if('style6' == $this.val() ) {
            $('#style6').show();
            headerFS.attr('value', '18');
            priceFS.attr('value', '45');
            planFS.attr('value', '14');
            featureFS.attr('value', '14');
            buttonFS.attr('value', '14');

            // slider bar with current dynamic value
            jQuery(HS+' > '+ SR).width('18%');
            jQuery(HS+' > '+ SH).css('left', '18%');
            jQuery(PRS+' > '+ SR).width('45%');
            jQuery(PRS+' > '+ SH).css('left', '45%');
            jQuery(PnS+' > '+ SR).width('14%');
            jQuery(PnS+' > '+ SH).css('left', '14%');
            jQuery(FS+' > '+ SR).width('14%');
            jQuery(FS+' > '+ SH).css('left', '14%');
            jQuery(BS+' > '+ SR).width('14%');
            jQuery(BS+' > '+ SH).css('left', '14%');

        } else {
            $('#style6').hide();
        };



    });


    //border toggle
    var $border = $('#pt_style2_border'); // get border jQuery object
    var currentBorder = $border.val(); // get current border
    if ('yes' == currentBorder) {
        $('#pt_style2_border_color_wrap').show();
    }

    // change border setting based on selection value
    $border.on('change',function(){
        var $this = $(this);
        ('yes' == $this.val() ) ? $('#pt_style2_border_color_wrap').show() : $('#pt_style2_border_color_wrap').hide();


    });





    //ADD ITEM
    var packID = $('#pt_total_old_pack').val(); // for maintaining column number based on package item saved in the database
    var i = parseInt($('#pt_total_current_pack').val(), 10); // for keeping track the number of the key of array of adl_pt_data_group after removing pack dynamically.

    jQuery(document).on('click', '#add_package', function(event) {
        i++;
        packID++;

        var content = '<div class="pricing-table-wrap">';
        content += '<h3 class="pt-heading">Column '+packID+'  <button class="remove-package pt-btn btn btn-default button" title="Remove this Package"><span class="dashicons dashicons-no"></span></button></h3>';

        content += '<div class="pricing-table-body"><div class="cmb-row cmb-type-text-medium"><div class="cmb-th"><label class="pt-label" for="pt_package_title'+i+'">Title</label></div><div class="cmb-td"><input type="text" id="pt_package_title'+i+'" class="cmb2-text-medium" name="adl_pt_data_group['+i+'][pt_package_title]" placeholder="eg. Basic" value=""></div></div>';

        content += '<div class="cmb-row cmb-type-text-medium pt_package_currency'+i+'"><div class="cmb-th"><label class="pt-label" for="pt_package_price'+i+'">Price</label></div><div class="cmb-td"><input type="text" class="cmb2-text-small ps" name="adl_pt_data_group['+i+'][pt_package_currency]" id="pt_package_currency" placeholder="eg. $" value="$"><input type="text" class="cmb2-text-small pa" name="adl_pt_data_group['+i+'][pt_package_price]" id="pt_package_price'+i+'" placeholder="eg. 10" value=""></div></div>';

        content +='<div class="cmb-row cmb-type-text-medium"><div class="cmb-th"><label class="pt-label" for="pt_package_features'+i+'">Features</label><a href="#" class="adl-tooltip ft" data-tooltip="List all the features of this package separated by a \'comma\'. You can additionally use a \'carriage return/enter\' after \'comma\' for readability. You can also use fonts-awesome icons. DO NOT USE a comma at the end of the last feature."><span></span></a></div><div class="cmb-td"><textarea class="pt_package_features" id="pt_package_features'+i+'" placeholder="eg. 10 GB Storage, 4 Databases, 5 Emails Account, 50 GB Bandwidth" name="adl_pt_data_group['+i+'][pt_package_features]"></textarea></div></div>';

        content +='<div class="cmb-row pt_package_time pt_package_time'+i+'"><div class="cmb-th"><label class="pt-label" for="pt_package_time'+i+'">Pricing Plan</label></div><div class="cmb-td"><input type="text" id="pt_package_time'+i+'" class="cmb2-text-medium" name="adl_pt_data_group['+i+'][pt_package_time]" placeholder="eg. Month" value=""></div></div>';

        content +='<div class="cmb-row cmb-type-text-medium btn"><div class="cmb-th"><label class="pt-label" for="pt_package_btn_text'+i+'">Button Text</label></div><div class="cmb-td"><input type="text" class="cmb2-text-medium" name="adl_pt_data_group['+i+'][pt_package_btn_text]" id="pt_package_btn_text'+i+'" placeholder="eg. Sign Up" value=""></div></div>';

        content +='<div class="cmb-row cmb-type-text-medium btn"><div class="cmb-th"><label class="pt-label" for="pt_package_btn_url'+i+'">Button URL</label></div><div class="cmb-td"><input type="text" class="cmb2-text-medium" name="adl_pt_data_group['+i+'][pt_package_btn_url]" id="pt_package_btn_url'+i+'" placeholder="eg. http://example.com/signup" value=""></div></div>';

        content +='</div></div>';




        event.preventDefault();
        $('.pt-package-list').append(content);
        $('#pt_total_current_pack').val(i);

        swal({
            title: "Created!!",
            type:"success",
            timer: 400,
            showConfirmButton: false });

    });



    // remove item
    jQuery(document).on('click', '.remove-package', function(event) {
        $this = $(this);
        event.preventDefault();
        /* Act on the event */
        swal({
                title: "Are you sure?",
                text: "Do you really want to remove this Package!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false },
            function(isConfirm) {
                if(isConfirm){
                    $this.parents('.pricing-table-wrap').remove();
                    swal({
                        title: "Deleted!!",
                        //text: "Package has been deleted.",
                        type:"success",
                        timer: 400,
                        showConfirmButton: false });
                }

            });



    });

    // accordion
    $('#aptAccordion').accordion({
        collapsible: true,
        heightStyle: "content"

    });


    // range selector
    var headerSlider = $( "#headerSlider"),
        DefaultHFS = headerFS.attr( 'value');

    // header slider
    headerSlider.slider({
        range: "min",
        min: 0,
        max: 100,
        value: DefaultHFS ? DefaultHFS : 24,
        slide: function( event, ui ) {
            headerFS.attr( 'value', ui.value );

        }
    });
    headerFS.val( headerSlider.slider( "value" ) );


    var priceSlider = $( "#priceSlider"),
        DefaultPFS = priceFS.attr( 'value');

    // price slider
    priceSlider.slider({
        range: "min",
        min: 0,
        max: 100,
        value: DefaultPFS ? DefaultPFS : 54,
        slide: function( event, ui ) {
            priceFS.attr( 'value', ui.value );

        }
    });
    priceFS.val( priceSlider.slider( "value" ) );



    var planSlider = $( "#planSlider"),
        DefaultPnFS = planFS.attr( 'value');

    // plan slider
    planSlider.slider({
        range: "min",
        min: 0,
        max: 100,
        value: DefaultPnFS ? DefaultPnFS : 14,
        slide: function( event, ui ) {
            planFS.attr( 'value', ui.value );

        }
    });
    planFS.val( planSlider.slider( "value" ) );


    var featureSlider = $( "#featureSlider"),
        DefaultHFS = featureFS.attr( 'value');

    // feature slider
    featureSlider.slider({
        range: "min",
        min: 0,
        max: 100,
        value: DefaultHFS ? DefaultHFS : 14,
        slide: function( event, ui ) {
            featureFS.attr( 'value', ui.value );

        }
    });
    featureFS.val( featureSlider.slider( "value" ) );



    var buttonSlider = $( "#buttonSlider"),
        DefaultHFS = buttonFS.attr( 'value');

    // button slider
    buttonSlider.slider({
        range: "min",
        min: 0,
        max: 100,
        value: DefaultHFS ? DefaultHFS : 14,
        slide: function( event, ui ) {
            buttonFS.attr( 'value', ui.value );

        }
    });
    buttonFS.val( buttonSlider.slider( "value" ) );

});



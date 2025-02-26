/*************************************
 *  *Advanced Reorder Image Text Slider Options * 
 **************************************/
(function ($) {

var simpleImageSliderAdmin = {
init: function ()
        {
        this.settings();
                this.defaultEvents();
                },
        settings: function ()
        {

        },
        defaultEvents: function ()
        {
        this.tabOptions();
                this.saveChanges();
                this.accordionSections();
                this.removeButton();
                this.loaderAjax();
                this.addNewHomeSliders();
                this.SortableSliders();
                this.removeSliders();
        },
        tabOptions: function ()
        {
        /*********************************************************************
         * 
         * Admin option page tabs
         * 
         ********************************************************************/
        $("#simple-image-slider-tab").tabs();
        },
        saveChanges: function ()
        {
        /*********************************************************************
         * 
         * Save options after submit form
         * 
         ********************************************************************/

        },
        accordionSections: function ()
        {
        /*********************************************************************
         * 
         * Tab contents sections accordion functionality
         * 
         ********************************************************************/
        $('.simple-image-slider-section-content').accordion({
        collapsible: true,
                heightStyle: "content"
        });
        },
        removeButton: function ()
        {
        /*********************************************************************
         * 
         * Remove the upload url and preview images
         * 
         ********************************************************************/
        $('.wrap').on('click', '.remove-button', function () {
        var link = $(this).parent().parent();
                link.find('.simple-image-slider-option-links').val('');
                var imgparent = $(this).parent().find('.sis_image_uploader_thumb');
                if (imgparent) {
        imgparent.remove();
        }
        });
        },
        loaderAjax: function ()
        {
        $(window).load(function () {
        $(".option-loader").hide();
                $("#simple-image-slider_options_page").css('display', "block");
        });
        },
        addNewHomeSliders: function () {
        $('#add-new-slider-image').on('click', function (e) {
        var data = '<tr class="home-sliders ui-sortable-handle" style="cursor: move;">' +
                '<td colspan="2">' +
                '<table cellspacing="4" cellpadding="2">' +
                '<tbody>' +
                '<tr>' +
                '<td width="300"><label for="top-slider-images">Slider Title : &nbsp;&nbsp;&nbsp;</label>' +
                '<input type="text" name="reorder-image-text-slider-options[slider-text][]" id="" required="required" size="40" class="simple-image-slider-option-links"></td>' +
                '</tr><tr>' +
                '<td width="500">                                                                          ' +
                '<label for="top-slider-images" > Discretion : &nbsp;&nbsp;&nbsp;&nbsp;</label>' +
                '<input type="text" name="reorder-image-text-slider-options[slider-discretion][]"  id="" size="40" required="required" class="simple-image-slider-option-links">' +
                '</td>' +
                '</tr><tr>' +
                '<td width="300"><label for="top-slider-images">Slider Link : &nbsp;&nbsp;&nbsp;&nbsp;</label>' +
                '<input type="text" name="reorder-image-text-slider-options[slider-url][]" id="" required="required" size="40" class="simple-image-slider-option-links">' +
                '</td><tr>' +
                '<td width="500">' +
                '<label for="top-slider-images">Target : </label>' +
                '<select name="reorder-image-text-slider-options[slider-target][]"  required="required" style="margin-left: 36px;">' +
                '<option  value="">Select target</option>' +
                '<option value="_self">Same Tab</option>' +
                '<option  value="_blank">New Tab</option>' +
                '</select>   ' +
                '</td>' +
                '</tr>' +
                '</tr><tr><td width="700" class="sisfield_top-slider-images"><label for="top-slider-images">Slider Image : </label>' +
                '<input type="text" placeholder="Please upload slider image" name="reorder-image-text-slider-options[slider-images][]" value="" size="40" required="required" class="simple-image-slider-option-links">' +
                '<input type="button" class="simple-image-slider-upload-button button" value="Upload">' +
                '<span class="tooltip"><span class="help">Please upload slider image</span>' +
                '</span>' +
                '</td>' +
                '<td><span class="remove-slider">Remove</span></td>' +
                '</tr>' +
                '</tbody>' +
                '</table>' +
                '</td>' +
                '</tr>';
                $('#sis_add-new-slider-image').before(data);
        });
        },
        SortableSliders: function () {
        $('.sis_inner_tab_HomePageSliderSettings > tbody').sortable();
                $('.sis_inner_tab_HomePageSliderSettings .home-sliders').css({cursor: 'move'});
        },
        removeSliders: function () {
        $('.sis_inner_tab_HomePageSliderSettings').on('click', '.remove-slider', function () {
        $(this).parent().closest('.home-sliders').remove();
        });
        }
};
        $(document).ready(function () {
simpleImageSliderAdmin.init();
        });
})(jQuery);
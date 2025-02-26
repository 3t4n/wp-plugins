(function () {

    var active_editor = false;

    tinymce.PluginManager.add('aws-accordions', function (editor, url) {
        editor.addButton('aws-accordions', {
            title: 'Awesome Accordions',
            image: "/wp-content/plugins/awesome-accordions/admin/img/icon.png",
            onclick: function () {

                active_editor = editor;

                let data = {
                    action: "show_aws_tiny_plugin_modal"
                };

                jQuery.post(ajaxurl, data, function (res) {

                    jQuery("body").append(res);
                    jQuery(".awc-acc-layover-tinymce").show();

                });

            }
        });
    });

    jQuery(document).on("click", ".js-close-tinymce-layover", function () {

        jQuery(".awc-acc-layover-tinymce").remove();

    });

    jQuery(document).on("click", ".js-add-accordion-to-the-content", function () {

        let id = jQuery("[name='modal_select_acc']").val();

        let first = "";

        if (jQuery("[name='first_tab']:checked").length > 0)
        {
            first = " first_tab_opened='true'";
        }

        let multi = "";

        if (jQuery("[name='multi_opened']:checked").length > 0)
        {
            multi = " multi-panels='true'";
        }

        active_editor.insertContent('[awesome-accordions id="' + id + '"' + first + multi + ']');

        jQuery(".awc-acc-layover-tinymce").remove();

    });

})();
(function ($) {
    class FloatingLink {
        /**
         * Constructor FloatingLink
         * @param {String} p.name The Name of the Link
         * @param {String} p.link The Link/Href Attribute of the link
         * @param {int} p.attachment_id The Media Libriary ID of the Image used for the icon.
         * @param {String} p.attachment_url The external Link to the Icon used as the Image.
         * @param {string} p.icon_id The Font Awesome Code for the Icon
         * @param {int} p.display_name Flag to define if the name should be displayed or not.
         */
        constructor(name, link, attachment_id = 0, attachment_url = '', icon_id = '', display_name = 1) {
            this.name = name;
            this.link = link;
            this.attachment_id = attachment_id;
            this.attachment_url = attachment_url;
            this.icon_id = icon_id;
            this.display_name = display_name;
        }

        toJSON(){
            return '{"name":"' + this.name + '","link":"' + this.link + '","attachment_id":"' + this.attachment_id + '","attachment_url":"' + this.attachment_url + '","icon_id":"' + this.icon_id + '","display_name":"' + this.display_name + '"}';
        }
    }

    /**
     * Geenrate the Floating Link Item by a given Section.
     * @param section
     * @returns {FloatingLink}
     */
    function get_link_item_by_section(section) {
        return new FloatingLink(
            section.find('input[name="name"]').val(),
            section.find('input[name="link"]').val(),
            section.find('input[name="attachment_id"]').val(),
            section.find('input[name="attachment_url"]').val(),
            section.find('input[name="icon_id"]').val(),
            section.find('input[name="display_name"]').val()
        )
    }

    /**
     * Generate and set the JSON which will be saved to the database.
     * @param container
     */
    function update_floating_links_textarea(container) {
        let data = '';
        let i = 0;

        container.find('.convert-to-link').each(function () {
            if (i > 0) {
                data += ',';
            }

            let item = get_link_item_by_section($(this));

            data += '"' + i + '":'+item.toJSON();

            i++;
        });

        data = '{' + data + '}';

        $(container).find('textarea').val(data).change();
    }


    /**
     * Update the textarea which contains the links everytime a input field has changed after blur.
     */
    $(document).on('blur', '.convert-to-link input', function () {
        update_floating_links_textarea($(this).closest('.customize-control-menu'));
    });

    /**
     * Add the toggle trigger for the menu items in the customizer floating menu section.
     */
    $(document).on('click', '.convert-to-link .menu-item-bar', function () {
        if ($(this).parent().hasClass('menu-item-edit-active')) {
            $(this).parent().removeClass('menu-item-edit-active');
        } else {
            $(this).parent().addClass('menu-item-edit-active');
        }
    });

    /**
     * Make the floating menu sortable - which will help to reorder the
     * menu items.
     */
    $(document).ready(function () {
        $('.floating-menu-sortable').sortable({
            update: function (event, ui) {
                update_floating_links_textarea($(this).parent());
            }
        });
    });

    /**
     * Remove an Icon from the List
     */
    $(document).on('click', '.convert-to-link .item-delete', function(){
        /*
         * Fetch the container
         */
        let container = $(this).closest('.customize-control-menu');
        /*
         * Remove the link
         */
        $(this).closest('.section').remove();
        /*
         * Update the Textarea
         */
        update_floating_links_textarea(container);
    });

    /**
     * Add a new Menu Item to the List
     */
    $(document).on('click', '.customize-control-floating_links .add-new-menu-item', function(){
        /*
         * Fetch the Container
         */
        let container = $(this).closest('.customize-control-menu');

        /*
         * Copy a Section
         */
        let clone = container.find('.section').eq(0).clone();

        /*
         * Reset Section input fields
         */
        clone.find('input').val("");
        clone.find('input[name="display_name"]').val(1);
        clone.find('.item-title').text('(new menu item)');

        /*
         * Append the cloned container to the sortable item
         */
        container.find('.floating-menu-sortable').append(clone);
    });

    /**
     * Update the Menu Item Title when the name is changed
     */
    $(document).on('blur', '.convert-to-link input[name="name"]', function(){
        let name = $(this).val().length > 0  ? $(this).val() : '(new menu item)';
        $(this).closest('.convert-to-link').find('.item-title').text(name);
    });

})(jQuery);
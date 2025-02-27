jQuery(document).ready(function ($) {

    const { __ } = wp.i18n;
    textDomain = 'bulk-menu-edit';

    let $body = $('body');
    let $currentMenu = $('#menu-to-edit');
    let $MenuFooter = $('#save_menu_footer');

    // Return if not menu admin page
    if (!$body.hasClass('nav-menus-php')) { return; }

    // Add check all button
    $currentMenu.before('<div class="div__chck_box_top_all"><label class="label__chck_checkbox"></label><p><span>' + __('Check', textDomain) + '</span>' + __(' all menu items', textDomain) + '</p></div>');
    $currentMenu.before('<div class="div__chck_box_top_collapse"><label class="label__chck_checkbox"></label><p>' + __('Collapse All', textDomain) + '</p></div>');
    $currentMenu.before('<div class="div__chck_box_top_expand"><label class="label__chck_checkbox"></label><p>' + __('Expand All', textDomain) + '</p></div>');

    // Add remove selected items button
    $MenuFooter.before('<form id="ajax-remove-menu" style="display:none;" method="post"><input type="submit" id="remove_menu_items" class="button button-primary button-large menu-save" value="' + __('Remove selected items', textDomain) + '"></form>');

    // Add checkbox for existing menu item
    $('#menu-to-edit li').each(function () {
        let $this = $(this);
        let menu_id = $this.attr('id');
        let item_title = $this.find('.item-title');
        item_title.before('<label class="label__chck_box" data-menu="' + menu_id + '"></label>');
    });

    // Dynamically add checkbox to menu items
    $('.submit-add-to-menu.right').on('click', function () {
        setTimeout(() => {
            $('#menu-to-edit li').each(function () {
                let $this = $(this);
                if ($this.find('.label__chck_box').length === 0) {
                    let menu_id = $this.attr('id');
                    $this.find('.item-title').before('<label class="label__chck_box" data-menu="' + menu_id + '"></label>');
                }
            });
        }, 800);
    });

    // Add input type hidden for selected menu items
    $(document).on('click', '.label__chck_box', function () {
        let $this = $(this);
        let menu_id = $this.data('menu');
        
        setTimeout(() => {
            if (!$this.hasClass('is-checked')) {
                $this.addClass('is-checked');
                // Store just the numeric ID
                $('#ajax-remove-menu').prepend('<input type="hidden" name="menu-to-remove" value="' + menu_id.replace('menu-item-', '') + '">');
                $('#ajax-remove-menu').show();
            } else {
                $this.removeClass('is-checked');
                $('input[value="' + menu_id.replace('menu-item-', '') + '"]').remove();
                if ($('input[name="menu-to-remove"]').length === 0) {
                    $('#ajax-remove-menu').hide();
                }
            }
        }, 150);
    });

    // Expand All
    $(document).on('click', '.div__chck_box_top_expand', function () {
        $(this).addClass('is-checked');
        $('.div__chck_box_top_collapse').removeClass('is-checked');
        $currentMenu.find('.menu-item').each(function () {
            let $this = $(this);
            $this.removeClass('menu-item-edit-inactive').addClass('menu-item-edit-active');
            $this.find('.menu-item-settings').show();
        });
    });

    // Collapse All
    $(document).on('click', '.div__chck_box_top_collapse', function () {
        $(this).addClass('is-checked');
        $('.div__chck_box_top_expand').removeClass('is-checked');
        $currentMenu.find('.menu-item').each(function () {
            let $this = $(this);
            $this.removeClass('menu-item-edit-active').addClass('menu-item-edit-inactive');
            $this.find('.menu-item-settings').hide();
        });
    });

    // Check all menu items at once
    $(document).on('click', '.div__chck_box_top_all', function () {
        let $this = $(this);
        $this.toggleClass('is-checked');
        // Check all items
        if ($this.hasClass('is-checked')) {
            $currentMenu.find('p span').html(__('Uncheck', textDomain));
            $currentMenu.find('li').each(function () {
                let $this = $(this);
                if (!$this.find('.label__chck_box').hasClass('is-checked')) {
                    $this.find('.label__chck_box').addClass('is-checked');
                    $('#ajax-remove-menu').prepend('<input type="hidden" name="menu-to-remove" id="remove-' + $this.attr('id') + '" value="' + $this.attr('id') + '">');
                }
            });
            $('#ajax-remove-menu').show();
        } else {
            $this.find('p span').html(__('Check', textDomain));
            $('#ajax-remove-menu input[type=hidden]').remove();
            $currentMenu.find('li').each(function () {
                let $this = $(this);
                if ($this.find('.label__chck_box').hasClass('is-checked')) {
                    $this.find('.label__chck_box').removeClass('is-checked');
                    $('#remove-' + $this.attr('id')).remove();
                }
            });
            $('#ajax-remove-menu').hide();
        }
    });

    // Ajax call to remove selected menu items
    $('#ajax-remove-menu').submit(function (e) {
        e.preventDefault();
        
        let menuItems = [];
        $('input[name="menu-to-remove"]').each(function() {
            menuItems.push({
                value: $(this).val().replace('menu-item-', '')
            });
        });
        
        let answer = confirm(__('Do you really want to remove all the menu items selected ?', textDomain));
        if (answer) {
            const $submitButton = $(this).find('input[type="submit"]');
            $submitButton.prop('disabled', true);

            $.ajax({
                method: 'POST',
                url: bulkMenuEdit.ajaxurl,
                data: {
                    action: 'remove_menu_items',
                    nonce: bulkMenuEdit.nonce,
                    data: menuItems
                },
            })
            .success(function (response) {
                if (response.success) {
                    $('.label__chck_box.is-checked').each(function () {
                        $(this).parents('div[class^="menu-item"]').eq(0).remove();
                    });
                    location.reload();
                } else {
                    alert(response.data);
                }
            })
            .fail(function(xhr, status, error) {
                alert(error);
            })
            .always(function() {
                $submitButton.prop('disabled', false);
            });
        }
    });

    // Add this near the top to get the nonce value from the localized variable
    // Assuming the nonce is localized as bulkMenuEdit.nonce
    const nonce = bulkMenuEdit.nonce;

    // Find the save changes function and modify the ajax call
    $('.save-changes').on('click', function(e) {
        e.preventDefault();
        
        // Existing data collection code...
        
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'save_menu_items',
                menu_items: menuItems,
                // Add the nonce to the request
                _wpnonce: nonce
            },
            success: function(response) {
                // Existing success handling...
            },
            error: function(xhr, status, error) {
                // Existing error handling...
            }
        });
    });

    // If you have other AJAX calls, add the nonce to those as well
    // For example, if you have a delete function:
    $('.delete-item').on('click', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'delete_menu_item',
                item_id: $(this).data('id'),
                // Add the nonce to this request too
                _wpnonce: nonce
            },
            // Rest of the ajax configuration...
        });
    });

    // Add nonce verification to all AJAX calls
    $.ajaxSetup({
        beforeSend: function(xhr, settings) {
            if (!/^(GET|HEAD|OPTIONS|TRACE)$/i.test(settings.type)) {
                xhr.setRequestHeader('X-WP-Nonce', bulkMenuEdit.nonce);
            }
        }
    });

});
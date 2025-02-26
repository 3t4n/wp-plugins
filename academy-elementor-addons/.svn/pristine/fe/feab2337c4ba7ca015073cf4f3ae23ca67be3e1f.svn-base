;(function ($) {
    'use strict'

    var academyeaTemplateAdmin = {
        instance: [],
        templateId: 0,

        init: function () {
            this.renderPopup()

            $('body.post-type-academyea-template #wpcontent').on(
                'click.academyeaTemplateAdmin',
                '.page-title-action, .row-title, .row-actions [class*="edit"] a',
                this.openPopup
            )

            $(document)
                .on(
                    'click.academyeaTemplateAdmin',
                    '.academyea-body-overlay,.academyea-template-edit-cross',
                    this.closePopup
                )
                .on(
                    'click.academyeaTemplateAdmin',
                    ".academyea-tmp-save:not('.disabled')",
                    this.dataStore
                )
                .on(
                    'click.academyeaTemplateAdmin',
                    '.academyea-tmp-gutenberg,.academyea-tmp-elementor',
                    this.redirectEditPage
                )
                .on(
                    'click.academyeaTemplateAdmin',
                    '.academyea-template-edit-body input,.academyea-template-edit-body select',
                    this.activeSaveButton
                )
                .on(
                    'keyup.academyeaTemplateAdmin',
                    '.academyea-template-edit-body input',
                    this.activeSaveButton
                )
                .on(
                    'click.academyeaTemplateAdmin',
                    '.academyea-default-tmp-status-switch input',
                    this.setDefaultTmpStatus
                )
        },

        // Render Popup HTML
        renderPopup: function (event) {
            var popupTmp = wp.template('academyeactppopup'),
                content = null

            content = popupTmp({
                templatetype: ACADEMYEACPT.templatetype,
                heading: ACADEMYEACPT.labels,
                templatelist: ACADEMYEACPT.templatelist,
            })

            $('body').append(content)
        },

        // Active Save Button
        activeSaveButton: function (event) {
            $('.academyea-tmp-save').removeClass('disabled')
            $('.academyea-tmp-save').removeAttr('disabled')
            $('.academyea-tmp-save').text(
                ACADEMYEACPT.labels.buttons.save.label
            )
        },

        // Enable/Disable Editor Buttons
        enableDisableEditorButton: function (enable = 'no') {
            if (enable === 'yes') {
                $('.academyea-template-edit-popup')
                    .find('.academyea-tmp-gutenberg')
                    .removeClass('button disabled')
                    .removeAttr('disabled')
                $('.academyea-template-edit-popup')
                    .find('.academyea-tmp-elementor')
                    .removeClass('button disabled')
                    .removeAttr('disabled')
            } else {
                $('.academyea-template-edit-popup')
                    .find('.academyea-tmp-gutenberg')
                    .addClass('button disabled')
                    .attr('disabled', 'disabled')
                $('.academyea-template-edit-popup')
                    .find('.academyea-tmp-elementor')
                    .addClass('button disabled')
                    .attr('disabled', 'disabled')
            }
        },

        // Redirect Edit Page
        redirectEditPage: function (event) {
            event.preventDefault()

            var $this = $(this),
                link = $this.data('link') ? $this.data('link') : '',
                tmpId = $this.data('tmpid') ? $this.data('tmpid') : ''

            if (
                tmpId != '' &&
                !$('body.post-type-academyea-template').hasClass(
                    'academyea-tmp-new-add'
                )
            ) {
                academyeaTemplateAdmin.dataStore(event)
            }

            window.location.replace(ACADEMYEACPT.adminURL + link)
        },

        // Edit PopUp
        openPopup: function (event) {
            event.preventDefault()

            var rowId = $(this).closest('tr').attr('id'),
                tmpId = null,
                editLink = null,
                elementorEditlink = null

            if (rowId) {
                tmpId = rowId.replace('post-', '')
                editLink = 'post.php?post=' + tmpId + '&action=edit'
                elementorEditlink =
                    'post.php?post=' + tmpId + '&action=elementor'
            }
            $('.academyea-tmp-save').attr('data-tmpid', tmpId)
            $('.academyea-tmp-gutenberg').attr({
                'data-link': editLink,
                'data-tmpid': tmpId,
            })
            $('.academyea-tmp-elementor').attr({
                'data-link': elementorEditlink,
                'data-tmpid': tmpId,
            })

            if (tmpId) {
                $.ajax({
                    url: ACADEMYEACPT.ajaxurl,
                    data: {
                        action: 'academyea_get_template',
                        nonce: ACADEMYEACPT.nonce,
                        tmpId: tmpId,
                    },
                    type: 'POST',

                    beforeSend: function () {
                        $('.academyea-template-edit-body').addClass(
                            'academyea-template-loading'
                        )
                    },

                    success: function (response) {
                        if (
                            document.querySelector(
                                "#academyea-template-type option[value='" +
                                    response.data.tmpType +
                                    "']"
                            )
                        ) {
                            document.querySelector(
                                "#academyea-template-type option[value='" +
                                    response.data.tmpType +
                                    "']"
                            ).selected = 'true'
                        }
                        $('#academyea-template-type').attr('disabled', 'true')

                        $('#academyea-template-title').attr(
                            'value',
                            response.data.tmpTitle
                        )
                        if (tmpId == response.data.setDefault) {
                            $('#academyea-template-default').prop(
                                'checked',
                                true
                            )
                        } else {
                            $('#academyea-template-default').prop(
                                'checked',
                                false
                            )
                        }

                        // Enable edit button
                        academyeaTemplateAdmin.enableDisableEditorButton('yes')
                    },

                    complete: function (response) {
                        $('.academyea-template-edit-body').removeClass(
                            'academyea-template-loading'
                        )
                    },

                    error: function (errorThrown) {
                        console.log(errorThrown)
                    },
                })

                // Remove class if template eidit mode
                $('body.post-type-academyea-template').removeClass(
                    'academyea-tmp-new-add'
                )
            } else {
                $('#academyea-template-title').attr('value', '')
                $('#academyea-template-type').removeAttr('disabled')

                // Disabled Button
                academyeaTemplateAdmin.enableDisableEditorButton()
            }

            $('body.post-type-academyea-template').addClass('open-editor')
        },

        // Close Popup
        closePopup: function (event) {
            $('body.post-type-academyea-template').removeClass('open-editor')

            // Page refresh for new add
            if (
                $('body.post-type-academyea-template').hasClass(
                    'academyea-tmp-new-add'
                )
            ) {
                window.location.reload()
            }
        },

        // Data Store
        dataStore: function (event) {
            var $this = $(this),
                tmpId = event.target.dataset.tmpid
                    ? event.target.dataset.tmpid
                    : '',
                title = $('#academyea-template-title').val(),
                setdefault = $('#academyea-template-default').is(':checked')
                    ? 'yes'
                    : 'no',
                tmpType = $('#academyea-template-type').val(),
                sampleDemoId = '',
                sampleDemoBuilder = ''

            if (
                $(
                    '.academyea-template-edit-demo-plan input[name="academyea-template-edit-demo-plan"]'
                ).is(':checked')
            ) {
                sampleDemoId = $(
                    '.academyea-template-edit-demo-plan input[name="academyea-template-edit-demo-plan"]:checked'
                ).val()
                sampleDemoBuilder = $(
                    '.academyea-template-edit-demo-plan input[name="academyea-template-edit-demo-plan"]:checked'
                ).data('builder')
            }

            $.ajax({
                url: ACADEMYEACPT.ajaxurl,
                data: {
                    action: 'academyea_template_store',
                    nonce: ACADEMYEACPT.nonce,
                    tmpId: tmpId,
                    title: title,
                    tmpType: tmpType,
                    setDefault: setdefault,
                    sampleTmpID: sampleDemoId,
                    sampleTmpBuilder: sampleDemoBuilder,
                },
                type: 'POST',

                beforeSend: function () {
                    $('body.post-type-academyea-template').addClass('wlloading')
                    $this.text(ACADEMYEACPT.labels.buttons.save.saving)
                    $this.addClass('updating-message')
                },

                success: function (data) {
                    if (tmpId == '') {
                        if (data.data.id) {
                            var editLink =
                                    'post.php?post=' +
                                    data.data.id +
                                    '&action=edit',
                                elementorEditlink =
                                    'post.php?post=' +
                                    data.data.id +
                                    '&action=elementor'
                        }
                        $('.academyea-tmp-save').attr(
                            'data-tmpid',
                            data.data.id
                        )
                        $('.academyea-tmp-gutenberg').attr({
                            'data-link': editLink,
                            'data-tmpid': data.data.id,
                        })
                        $('.academyea-tmp-elementor').attr({
                            'data-link': elementorEditlink,
                            'data-tmpid': data.data.id,
                        })

                        // Enable edit Button
                        academyeaTemplateAdmin.enableDisableEditorButton('yes')

                        // If insert new then add class to body
                        $('body.post-type-academyea-template').addClass(
                            'academyea-tmp-new-add'
                        )
                    } else {
                        $('#post-' + tmpId)
                            .find('.row-title')
                            .text(title)

                        var $set_status = $(
                            '#post-' +
                                tmpId +
                                ' .academyea-default-tmp-status-switch'
                        ).find('.academyea-status-' + tmpType)

                        if (setdefault == 'yes') {
                            $(
                                '.type-academyea-template:not(#post-' +
                                    tmpId +
                                    ') .column-setdefault'
                            )
                                .find('.academyea-status-' + tmpType)
                                .prop('checked', false)
                            $set_status.prop('checked', true)
                        } else {
                            $set_status.prop('checked', false)
                        }
                    }
                },

                complete: function (data) {
                    $('body.post-type-academyea-template').removeClass(
                        'wlloading'
                    )
                    $this.removeClass('updating-message')
                    $this.addClass('disabled')
                    $this.attr('disabled', 'disabled')
                    $this.text(ACADEMYEACPT.labels.buttons.save.saved)
                },

                error: function (errorThrown) {
                    console.log(errorThrown)
                },
            })
        },

        // Set Default Template From Switcher
        setDefaultTmpStatus: function (event) {
            var $this = $(this),
                tmpId = $this.is(':checked') ? $this.val() : '0',
                checkboxClass = $this.attr('class'),
                tmpType = checkboxClass.replace('academyea-status-', '')

            $.ajax({
                url: ACADEMYEACPT.ajaxurl,
                type: 'POST',
                data: {
                    action: 'academyea_manage_default_template',
                    nonce: ACADEMYEACPT.nonce,
                    tmpId: tmpId,
                    tmpType: tmpType,
                },

                beforeSend: function () {
                    $this.closest('label').addClass('academyea-loading')
                },

                success: function (response) {
                    var $set_status = $(
                        '#post-' +
                            tmpId +
                            ' .academyea-default-tmp-status-switch'
                    ).find('.academyea-status-' + tmpType)
                    if (response.data.id != '0') {
                        $(
                            '.type-academyea-template:not(#post-' +
                                tmpId +
                                ') .column-setdefault'
                        )
                            .find('.academyea-status-' + tmpType)
                            .prop('checked', false)
                        $set_status.prop('checked', true)
                    } else {
                        $set_status.prop('checked', false)
                    }
                },

                complete: function (response) {
                    $this.closest('label').removeClass('academyea-loading')
                },

                error: function (errorThrown) {
                    console.log(errorThrown)
                },
            })
        },
    }

    academyeaTemplateAdmin.init()
})(jQuery)

/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/attributes.js":
/*!***************************!*\
  !*** ./src/attributes.js ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   $: () => (/* binding */ $),
/* harmony export */   Attributes: () => (/* binding */ Attributes),
/* harmony export */   I18n: () => (/* binding */ I18n)
/* harmony export */ });
/* harmony import */ var _custom_column__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./custom-column */ "./src/custom-column.js");


Array.prototype.insert = function (index, items) {
    this.splice.apply(this, [index, 0].concat(items));
};

const Attributes = {
    ...wpbulkyParams,
    postTypes: {},
    filterKey: Date.now(),
    selectPage: 1,
    ajaxData: {action: 'vi_wpbulky_ajax', vi_wpbulky_nonce: wpbulkyParams.nonce},
    tinyMceOptions: {
        tinymce: {
            theme: "modern",
            skin: "lightgray",
            language: "en",
            formats: {
                alignleft: [
                    {selector: "p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li", styles: {textAlign: "left"}},
                    {selector: "img,table,dl.wp-caption", classes: "alignleft"}
                ],
                aligncenter: [
                    {selector: "p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li", styles: {textAlign: "center"}},
                    {selector: "img,table,dl.wp-caption", classes: "aligncenter"}
                ],
                alignright: [
                    {selector: "p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li", styles: {textAlign: "right"}},
                    {selector: "img,table,dl.wp-caption", classes: "alignright"}
                ],
                strikethrough: {inline: "del"}
            },
            relative_urls: false,
            remove_script_host: false,
            convert_urls: false,
            browser_spellcheck: true,
            fix_list_elements: true,
            entities: "38,amp,60,lt,62,gt",
            entity_encoding: "raw",
            keep_styles: false,
            cache_suffix: "wp-mce-49110-20201110",
            resize: "vertical",
            menubar: false,
            branding: false,
            preview_styles: "font-family font-size font-weight font-style text-decoration text-transform",
            end_container_on_empty_block: true,
            wpeditimage_html5_captions: true,
            wp_lang_attr: "en-US",
            wp_keep_scroll_position: false,
            wp_shortcut_labels: {
                "Heading 1": "access1",
                "Heading 2": "access2",
                "Heading 3": "access3",
                "Heading 4": "access4",
                "Heading 5": "access5",
                "Heading 6": "access6",
                "Paragraph": "access7",
                "Blockquote": "accessQ",
                "Underline": "metaU",
                "Strikethrough": "accessD",
                "Bold": "metaB",
                "Italic": "metaI",
                "Code": "accessX",
                "Align center": "accessC",
                "Align right": "accessR",
                "Align left": "accessL",
                "Justify": "accessJ",
                "Cut": "metaX",
                "Copy": "metaC",
                "Paste": "metaV",
                "Select all": "metaA",
                "Undo": "metaZ",
                "Redo": "metaY",
                "Bullet list": "accessU",
                "Numbered list": "accessO",
                "Insert\/edit image": "accessM",
                "Insert\/edit link": "metaK",
                "Remove link": "accessS",
                "Toolbar Toggle": "accessZ",
                "Insert Read More tag": "accessT",
                "Insert Page Break tag": "accessP",
                "Distraction-free writing mode": "accessW",
                "Add Media": "accessM",
                "Keyboard Shortcuts": "accessH"
            },
            plugins: "charmap,colorpicker,hr,lists,media,paste,tabfocus,textcolor,fullscreen,wordpress,wpautoresize,wpeditimage,wpemoji,wpgallery,wplink,wpdialogs,wptextpattern,wpview",
            selector: "#vi-wpbulky-text-editor",
            wpautop: true,
            indent: false,
            toolbar1: "formatselect,bold,italic,bullist,numlist,blockquote,alignleft,aligncenter,alignright,link,wp_more,spellchecker,fullscreen,wp_adv",
            toolbar2: "strikethrough,hr,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help",
            tabfocus_elements: ":prev,:next",
            body_class: "excerpt post-type-post post-status-publish page-template-default locale-en-us",
        },
        mediaButtons: true,
        quicktags: true
    },
    setColumns(raw) {
        try {
            let columns = JSON.parse(raw);
            Attributes.columns = columns.map((col) => {
                if (col && col.editor && _custom_column__WEBPACK_IMPORTED_MODULE_0__.customColumn[col.editor]) {
                    col.editor = _custom_column__WEBPACK_IMPORTED_MODULE_0__.customColumn[col.editor];
                    col.editor.options = col.editor_options;
                }

                if (col && col.filter && _custom_column__WEBPACK_IMPORTED_MODULE_0__.columnFilter[col.filter]) col.filter = _custom_column__WEBPACK_IMPORTED_MODULE_0__.columnFilter[col.filter];
                return col;
            });
        } catch (e) {
            console.log(e);
        }
    }
};

window.Attributes = Attributes;
const I18n = wpbulkyI18n.i18n;
const $ = jQuery;


/***/ }),

/***/ "./src/calculator.js":
/*!***************************!*\
  !*** ./src/calculator.js ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _attributes__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./attributes */ "./src/attributes.js");
/* harmony import */ var _functions__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./functions */ "./src/functions.js");
/* harmony import */ var _modal_popup__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modal-popup */ "./src/modal-popup.js");




class Calculator {
    constructor(obj, x, y, e) {
        this._data = {};
        this._data.jexcel = obj;
        this._data.x = parseInt(x);
        this._data.y = parseInt(y);
        this.run();
    }

    get(id) {
        return this._data[id] || ''
    }

    run() {
        let formulaHtml = this.content();
        let cell = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(`td[data-x=${this.get('x') || 0}][data-y=${this.get('y') || 0}]`);
        new _modal_popup__WEBPACK_IMPORTED_MODULE_2__.Popup(formulaHtml, cell);
        formulaHtml.on('click', '.vi-wpbulky-apply-formula', this.applyFormula.bind(this));
        formulaHtml.on('change', '.vi-wpbulky-rounded', this.toggleDecimalValue);
    }

    content() {
        return (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(`<div class="vi-wpbulky-formula-container" style="display: flex;">
                    <select class="vi-wpbulky-operator">
                        <option value="+">+</option>
                        <option value="-">-</option>
                    </select>
                    <input type="number" min="0" class="vi-wpbulky-value">
                    <select class="vi-wpbulky-unit">
                        <option value="fixed">n</option>
                        <option value="percentage">%</option>
                    </select>
                    <select class="vi-wpbulky-rounded">
                        <option value="no_round">${_functions__WEBPACK_IMPORTED_MODULE_1__["default"].text('No round')}</option>
                        <option value="round">${_functions__WEBPACK_IMPORTED_MODULE_1__["default"].text('Round with decimal')}</option>
                        <option value="round_up">${_functions__WEBPACK_IMPORTED_MODULE_1__["default"].text('Round up')}</option>
                        <option value="round_down">${_functions__WEBPACK_IMPORTED_MODULE_1__["default"].text('Round down')}</option>
                    </select>
                    <input type="number" min="0" max="10" class="vi-wpbulky-decimal" value="0">
                    <button type="button" class="vi-ui button mini vi-wpbulky-apply-formula">${_functions__WEBPACK_IMPORTED_MODULE_1__["default"].text('OK')}</button>
                </div>`);
    }

    applyFormula(e) {
        let form = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.target).closest('.vi-wpbulky-formula-container'),
            operator = form.find('.vi-wpbulky-operator').val(),
            fValue = parseFloat(form.find('.vi-wpbulky-value').val()),
            unit = form.find('.vi-wpbulky-unit').val(),
            rounded = form.find('.vi-wpbulky-rounded').val(),
            decimal = parseInt(form.find('.vi-wpbulky-decimal').val()),
            excelObj = this.get('jexcel');

        if (!fValue) return;

        let breakControl = false, records = [];
        let h = excelObj.selectedContainer;
        let start = h[1], end = h[3], x = h[0];

        function formula(oldValue) {
            oldValue = parseFloat(oldValue);
            let extraValue = unit === 'percentage' ? oldValue * fValue / 100 : fValue;
            let newValue = operator === '-' ? oldValue - extraValue : oldValue + extraValue;
            switch (rounded) {
                case 'round':
                    newValue = newValue.toFixed(decimal);
                    break;
                case 'round_up':
                    newValue = Math.ceil(newValue);
                    break;
                case 'round_down':
                    newValue = Math.floor(newValue);
                    break;
            }
            return newValue;
        }

        for (let y = start; y <= end; y++) {
            if (excelObj.records[y][x] && !excelObj.records[y][x].classList.contains('readonly') && excelObj.records[y][x].style.display !== 'none' && breakControl === false) {
                let value = excelObj.options.data[y][x] || 0;
                records.push(excelObj.updateCell(x, y, formula(value)));
                excelObj.updateFormulaChain(x, y, records);
            }
        }

        // Update history
        excelObj.setHistory({
            action: 'setValue',
            records: records,
            selection: excelObj.selectedCell,
        });

        // Update table with custom configuration if applicable
        excelObj.updateTable();
    }

    toggleDecimalValue() {
        let form = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(this).closest('.vi-wpbulky-formula-container');
        form.find('.vi-wpbulky-decimal').hide();
        if ((0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(this).val() === 'round') form.find('.vi-wpbulky-decimal').show();
    }
}

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Calculator);

/***/ }),

/***/ "./src/custom-column.js":
/*!******************************!*\
  !*** ./src/custom-column.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   columnFilter: () => (/* binding */ columnFilter),
/* harmony export */   customColumn: () => (/* binding */ customColumn)
/* harmony export */ });
/* harmony import */ var _functions__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./functions */ "./src/functions.js");
/* harmony import */ var _attributes__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./attributes */ "./src/attributes.js");



const customColumn = {};
const columnFilter = {};

jQuery(document).ready(function ($) {
    window.viIsEditing = false;

    const mediaMultiple = wp.media({multiple: true});
    const mediaSingle = wp.media({multiple: false});

    const tmpl = {
        galleryImage(src, id) {
            return `<li class="vi-wpbulky-gallery-image" data-id="${id}"><i class="vi-wpbulky-remove-image dashicons dashicons-no-alt"> </i><img src="${src}"></li>`;
        },

        fileDownload($_file = {}) {
            let {id, name, file} = $_file;
            let row = $(`<tr>
                        <td><i class="bars icon"></i><input type="text" class="vi-wpbulky-file-name" value="${name || ''}"></td>
                        <td>
                            <input type="text" class="vi-wpbulky-file-url" value="${file || ''}">
                            <input type="hidden" class="vi-wpbulky-file-hash" value="${id || ''}">
                            <span class="vi-ui button mini vi-wpbulky-choose-file">${_functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Choose file')}</span>
                            <i class="vi-wpbulky-remove-file dashicons dashicons-no-alt"> </i>
                        </td>
                    </tr>`);

            row.on('click', '.vi-wpbulky-remove-file', function () {
                row.remove();
            });

            return row;
        }
    };

    customColumn.textEditor = {

        createCell(cell, i, value, obj) {
            cell.innerHTML = _functions__WEBPACK_IMPORTED_MODULE_0__["default"].stripHtml(value).slice(0, $('#vi-wpbulky-spreadsheet').hasClass('vi-wpbulky-spreadsheet-wrap-mode')? 500 :50);
            return cell;
        },

        closeEditor(cell, save) {
            window.viIsEditing = false;
            let content = '';
            if (save === true) {
                content = wp.editor.getContent('vi-wpbulky-text-editor');

                if (!this.isEditing) {
                    wp.editor.remove('vi-wpbulky-text-editor');
                }
                this.isEditing = false;
            }else {
                wp.editor.remove('vi-wpbulky-text-editor');
            }

            $( "#vi-wpbulky-text-editor" ).val("");

            return content;
        },

        openEditor(cell, el, obj) {
            window.viIsEditing = true;
            let y = cell.getAttribute('data-y'),
                x = cell.getAttribute('data-x'),
                content = obj.options.data[y][x],
                $this = this;

            $('.vi-ui.modal').modal('show');
            this.tinymceInit(content);

            $('.vi-wpbulky-text-editor-save').off('click').on('click', function () {
                $(this).removeClass('primary');
                if ($(this).hasClass('vi-wpbulky-close')) {
                    $('.vi-ui.modal').modal('hide');
                } else {
                    $this.isEditing = true;
                }
                obj.closeEditor(cell, true);
            });

            $('.vi-ui.modal .close.icon').off('click').on('click', function () {
                obj.closeEditor(cell, true);
            });

            let modal = $('.vi-ui.modal').parent();
            modal.on('click', function (e) {
                if (e.target === e.delegateTarget) {
                    obj.closeEditor(cell, false);
                }
            })
        },

        updateCell(cell, value, force) {
            let editorValue = wp.editor.getContent('vi-wpbulky-text-editor');
            if ( editorValue.trim().length > 0 ) {
                value = editorValue;
            }
            cell.innerHTML = _functions__WEBPACK_IMPORTED_MODULE_0__["default"].stripHtml(value).slice(0, 50);
            return value;
        },

        tinymceInit(content = '') {
            content = wp.editor.autop(content);
            if (tinymce.get('vi-wpbulky-text-editor') === null) {
                $('#vi-wpbulky-text-editor').val(content);

                _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.tinyMceOptions.tinymce.setup = function (editor) {
                    editor.on('keyup', function (e) {
                        $('.vi-wpbulky-text-editor-save:not(.vi-wpbulky-close)').addClass('primary');
                    });
                };

                wp.editor.initialize('vi-wpbulky-text-editor', _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.tinyMceOptions);

            }

            tinymce.get('vi-wpbulky-text-editor').setContent(content)
        },
    };

    customColumn.image = {
        createCell(cell, i, value, obj) {
            if (value) {
                let url = _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.imgStorage[value];
                _functions__WEBPACK_IMPORTED_MODULE_0__["default"].isUrl(url) ? $(cell).html(`<img width="40" src="${url}" data-id="${value}">`) : $(cell).html('');
            }
            return cell;
        },

        closeEditor(cell, save) {
            return $(cell).find('img').data('id') || '';
        },

        openEditor(cell, el, obj) {
            mediaSingle.open().off('select').on('select', function (e) {
                let uploadedImages = mediaSingle.state().get('selection').first();
                let selectedImages = uploadedImages.toJSON();
                if (_functions__WEBPACK_IMPORTED_MODULE_0__["default"].isUrl(selectedImages.url)) {
                    $(cell).html(`<img width="40" src="${selectedImages.url}" data-id="${selectedImages.id}">`);
                    _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.imgStorage[selectedImages.id] = selectedImages.url;
                    obj.closeEditor(cell, true);
                }
            });
        },

        updateCell(cell, value, force) {
            value = parseInt(value) || '';
            let url = _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.imgStorage[value];
            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].isUrl(url) ? $(cell).html(`<img width="40" src="${url}" data-id="${value}">`) : $(cell).html('');
            return value;
        },
    };

    customColumn.imageurl = {
        createCell(cell, i, value, obj) {
            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].isUrl(value) ? $(cell).html(`<img width="40" src="${value}" >`) : $(cell).html('');

            return cell;
        },

        closeEditor(cell, save) {
            return $(cell).find('img').attr('src') || '';
        },

        openEditor(cell, el, obj) {
            mediaSingle.open().off('select').on('select', function (e) {
                let uploadedImages = mediaSingle.state().get('selection').first();
                let selectedImages = uploadedImages.toJSON();
                if (_functions__WEBPACK_IMPORTED_MODULE_0__["default"].isUrl(selectedImages.url)) {
                    $(cell).html(`<img width="40" src="${selectedImages.url}">`);
                    obj.closeEditor(cell, true);
                }
            });
        },

        updateCell(cell, value, force) {
            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].isUrl(value) ? $(cell).html(`<img width="40" src="${value}" >`) : $(cell).html('');
            return value;
        },
    };

    customColumn.gallery = {
        saveData(cell) {
            let newIds = [];
            $(cell).find('.vi-wpbulky-gallery-image').each(function () {
                newIds.push($(this).data('id'));
            });
            $(cell).find('.vi-wpbulky-ids-list').val(newIds.join(','));
        },

        createCell(cell, i, value) {
            let hasItem = value.length ? 'vi-wpbulky-gallery-has-item' : '';
            $(cell).html(`<div class="vi-wpbulky-gallery ${hasItem}"><i class="images outline icon"> </i></div>`);
            return cell;
        },

        closeEditor(cell, save) {
            let selected = [];
            if (save) {
                let child = $(cell).children();
                child.find('.vi-wpbulky-gallery-image').each(function () {
                    selected.push($(this).data('id'));
                });

                $(cell).find('.vi-wpbulky-cell-popup').remove();
            }
            return selected;
        },

        openEditor(cell, el, obj) {
            let y = cell.getAttribute('data-y'),
                x = cell.getAttribute('data-x');

            let ids = obj.options.data[y][x],
                editor = _functions__WEBPACK_IMPORTED_MODULE_0__["default"].createEditor(cell, 'div'),
                images = '', cacheEdition;

            if (ids.length) {
                for (let id of ids) {
                    let src = _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.imgStorage[id];
                    images += tmpl.galleryImage(src, id);
                }
            }

            let galleryPopup = $(`<div class="vi-wpbulky-cell-popup-inner">
                                    <ul class="vi-wpbulky-gallery-images">${images}</ul>
                                    <span class="vi-ui button tiny vi-wpbulky-add-image">${_functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Add image')}</span>
                                    <span class="vi-ui button tiny vi-wpbulky-remove-gallery">${_functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Remove all')}</span>
                                </div>`);

            $(editor).append(galleryPopup);

            galleryPopup.find('.vi-wpbulky-gallery-images').sortable({
                items: 'li.vi-wpbulky-gallery-image',
                cursor: 'move',
                scrollSensitivity: 40,
                forcePlaceholderSize: true,
                forceHelperSize: false,
                helper: 'clone',
                placeholder: 'vi-wpbulky-sortable-placeholder',
                tolerance: "pointer",
            });

            galleryPopup.on('click', '.vi-wpbulky-remove-image', function () {
                $(this).parent().remove();
            });

            galleryPopup.on('click', '.vi-wpbulky-add-image', function () {
                mediaMultiple.open().off('select close')
                    .on('select', function (e) {
                        var selection = mediaMultiple.state().get('selection');
                        selection.each(function (attachment) {
                            attachment = attachment.toJSON();
                            if (attachment.type === 'image') {
                                _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.imgStorage[attachment.id] = attachment.url;
                                galleryPopup.find('.vi-wpbulky-gallery-images').append(tmpl.galleryImage(attachment.url, attachment.id));
                            }
                        });
                    });
            });

            galleryPopup.on('click', '.vi-wpbulky-remove-gallery', function () {
                galleryPopup.find('.vi-wpbulky-gallery-images').empty();
            });

            if (ids.length === 0) {
                galleryPopup.find('.vi-wpbulky-add-image').trigger('click');
            }
        },

        updateCell(cell, value, force) {
            let icon = $(cell).find('.vi-wpbulky-gallery');
            value.length ? icon.addClass('vi-wpbulky-gallery-has-item') : icon.removeClass('vi-wpbulky-gallery-has-item');
            return value;
        },
    };

    customColumn.download = {
        createCell(cell, i, value) {
            $(cell).html(`<div><i class="download icon"> </i></div>`);
            return cell;
        },

        closeEditor(cell, save) {
            let data = [];
            if (save) {
                let child = $(cell).children();
                child.find('table.vi-wpbulky-files-download tbody tr').each(function () {
                    let row = $(this);
                    data.push({
                        id: row.find('.vi-wpbulky-file-hash').val(),
                        file: row.find('.vi-wpbulky-file-url').val(),
                        name: row.find('.vi-wpbulky-file-name').val()
                    });
                });

                child.remove();
            }
            return data;
        },

        openEditor(cell, el, obj) {

            let y = cell.getAttribute('data-y'),
                x = cell.getAttribute('data-x');

            let files = obj.options.data[y][x],
                editor = _functions__WEBPACK_IMPORTED_MODULE_0__["default"].createEditor(cell, 'div'),
                cacheEdition, tbody = $('<tbody></tbody>');

            if (Array.isArray(files)) {
                for (let file of files) {
                    tbody.append(tmpl.fileDownload(file));
                }
            }

            let fileDownloadPopup = $(`<div class="">
                                        <table class="vi-wpbulky-files-download vi-ui celled table">
                                            <thead>
                                            <tr>
                                                <th>${_functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Name')}</th>
                                                <th>${_functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('File URL')}</th>
                                            </tr>
                                            </thead>
                                        </table>
                                        <span class="vi-ui button tiny vi-wpbulky-add-file">${_functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Add file')}</span>
                                    </div>`);

            fileDownloadPopup.find('.vi-wpbulky-files-download').append(tbody);

            $(editor).append(fileDownloadPopup);

            tbody.sortable();

            fileDownloadPopup.on('click', '.vi-wpbulky-add-file', () => fileDownloadPopup.find('.vi-wpbulky-files-download tbody').append(tmpl.fileDownload()));

            fileDownloadPopup.on('click', '.vi-wpbulky-choose-file', function () {
                cacheEdition = obj.edition;
                obj.edition = null;
                let row = $(this).closest('tr');

                mediaSingle.open().off('select close')
                    .on('select', function (e) {
                        let selected = mediaSingle.state().get('selection').first().toJSON();
                        if (selected.url) row.find('.vi-wpbulky-file-url').val(selected.url).trigger('change');
                    })
                    .on('close', () => obj.edition = cacheEdition);
            });

            if (!files.length) {
                fileDownloadPopup.find('.vi-wpbulky-add-file').trigger('click');
            }
        },

        updateCell(cell, value, force) {
            $(cell).html(`<div><i class="download icon"> </i></div>`);
            return value;
        },
    };

    customColumn.link_posts = {
        createCell(cell, i, value, obj) {
            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].formatText(cell, value);
            return cell;
        },

        closeEditor(cell, save) {
            let child = $(cell).children(), selected = [];

            if (save) {
                let data = child.find('select').select2('data');

                if (data.length) {
                    for (let item of data) {
                        selected.push({id: item.id, text: item.text})
                    }
                }
            }

            child.remove();
            $('.select2-container').remove();
            return selected;
        },

        openEditor(cell, el, obj) {
            let y = cell.getAttribute('data-y'),
                x = cell.getAttribute('data-x');

            let value = obj.options.data[y][x],
                editor = _functions__WEBPACK_IMPORTED_MODULE_0__["default"].createEditor(cell, 'div'),
                select = $('<select/>');

            $(editor).append(select);

            select.select2({
                data: value,
                multiple: true,
                minimumInputLength: 3,
                placeholder: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Search posts...'),
                ajax: {
                    url: _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.ajaxUrl,
                    type: 'post',
                    delay: 250,
                    dataType: 'json',
                    data: function (params) {
                        return {
                            ..._attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.ajaxData,
                            sub_action: 'search_posts',
                            search: params.term,
                            type: 'public'
                        };
                    },
                    processResults: function (data) {
                        var terms = [];
                        if (data) {
                            $.each(data, function (id, text) {
                                terms.push({id: id, text: text});
                            });
                        }
                        return {
                            results: terms
                        };
                    }
                }
            });

            select.find('option').attr('selected', true).parent().trigger('change');
            $(editor).find('.select2-search__field').trigger('click');
        },

        updateCell(cell, value, force, obj, x) {
            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].formatText(cell, value);
            return value;
        }
    };

    customColumn.array = {
        createCell(cell, i, value, obj) {
            $(cell).html('<i class="icon edit"/>');
            return cell;
        },

        closeEditor(cell, save) {
            let metadata = [];
            if (save === true) {
                metadata = this.editor.get();
            }

            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].removeModal(cell);

            return metadata;
        },

        openEditor(cell, el, obj) {
            let data = _functions__WEBPACK_IMPORTED_MODULE_0__["default"].getDataFromCell(obj, cell);
            let modal = _functions__WEBPACK_IMPORTED_MODULE_0__["default"].createModal({
                header: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Edit metadata'),
                content: '',
                actions: [{class: 'save-metadata', text: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Save')}],
            });

            $(cell).append(modal);
            modal.find('.content').html('<div id="vi-wpbulky-jsoneditor"></div>');
            let container = modal.find('#vi-wpbulky-jsoneditor').get(0);
            this.editor = new JSONEditor(container, {enableSort: false, search: false, enableTransform: false});
            this.editor.set(data);

            modal.on('click', function (e) {
                let thisTarget = $(e.target);
                if (thisTarget.hasClass('close') || thisTarget.hasClass('vi-wpbulky-modal-container')) obj.closeEditor(cell, false);
                if (thisTarget.hasClass('save-metadata')) obj.closeEditor(cell, true);
            });
        },

        updateCell(cell, value, force) {
            return value;
        },
    };

    customColumn.select2 = {
        type: 'select2',

        createCell(cell, i, value, obj) {
            let {source} = obj.options.columns[i], newValue = [];
            if (!Array.isArray(value)) value = Object.values(value);
            if (Array.isArray(source) && source.length) newValue = source.filter(item => value.includes(item.id));
            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].formatText(cell, newValue);
            return cell;
        },

        openEditor(cell, el, obj) {
            let y = cell.getAttribute('data-y'),
                x = cell.getAttribute('data-x');
            let value = obj.options.data[y][x],
                select = $('<select/>'),
                {source, multiple, placeholder} = obj.options.columns[x],
                editor = _functions__WEBPACK_IMPORTED_MODULE_0__["default"].createEditor(cell, 'div', select);

            select.select2({
                data: source || [],
                multiple: multiple,
                placeholder: placeholder,
            });

            select.val(value).trigger('change');
            $(editor).find('.select2-search__field').trigger('click');
        },

        closeEditor(cell, save) {
            let child = $(cell).children(),
                data = child.find('select').val();

            data = data.map(item => !isNaN(item) ? +item : item);

            child.remove();
            $('.select2-container').remove();

            return data;
        },

        updateCell(cell, value, force, obj, x) {
            let {source} = obj.options.columns[x], newValue = [];

            if (Array.isArray(source) && source.length) newValue = source.filter(item => value.includes(item.id));

            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].formatText(cell, newValue);

            return value;
        }
    };


    customColumn.ajax_search = {
        type: 'ajax_search',

        createCell(cell, i, value, obj) {
            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].formatText(cell, value);
            return cell;
        },

        openEditor(cell, el, obj) {
            let y = cell.getAttribute('data-y'),
                x = cell.getAttribute('data-x'),
                {taxonomy} = this.options;

            let value = obj.options.data[y][x],
                select = $('<select/>'),
                editor = _functions__WEBPACK_IMPORTED_MODULE_0__["default"].createEditor(cell, 'div', select);

            select.select2({
                data: value,
                multiple: true,
                minimumInputLength: 3,
                placeholder: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Search ...'),
                ajax: {
                    url: _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.ajaxUrl,
                    type: 'POST',
                    data: function (params) {
                        return {
                            ..._attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.ajaxData,
                            sub_action: 'ajax_search',
                            taxonomy: taxonomy,
                            search: params.term,
                            post_type: _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.postType,
                        };
                    },
                    processResults: function (data) {
                        return {results: data};
                    }
                }
            });

            select.find('option').attr('selected', true).parent().trigger('change');

            $(editor).find('.select2-search__field').trigger('click');
        },

        closeEditor(cell, save) {
            let child = $(cell).children(),
                data = child.find('select').select2('data'),
                selected = [];

            if (data.length) {
                for (let item of data) {
                    selected.push({id: item.id, text: item.text})
                }
            }
            child.remove();
            $('.select2-container').remove();
            return selected;
        },

        updateCell(cell, value, force, obj, x) {
            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].formatText(cell, value);
            return value;
        }
    };

//--------------------------------------------------------------------//
    columnFilter.sourceForVariation = (el, cell, x, y, obj) => {
        let source = obj.options.columns[x].source;
        let postType = _functions__WEBPACK_IMPORTED_MODULE_0__["default"].getPostTypeFromCell(cell);
        if (postType === 'variation') {
            source = obj.options.columns[x].subSource;
        }
        return source;
    };


});



/***/ }),

/***/ "./src/find-and-replace.js":
/*!*********************************!*\
  !*** ./src/find-and-replace.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ FindAndReplace)
/* harmony export */ });
/* harmony import */ var _attributes__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./attributes */ "./src/attributes.js");
/* harmony import */ var _functions__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./functions */ "./src/functions.js");
/* harmony import */ var _modal_popup__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modal-popup */ "./src/modal-popup.js");




class FindAndReplace {
    constructor(obj, x, y, e) {
        this._data = {};
        this._data.jexcel = obj;
        this._data.x = parseInt(x);
        this._data.y = parseInt(y);
        this.run();
    }

    get(id) {
        return this._data[id] || '';
    }

    run() {
        let formulaHtml = this.content();
        let cell = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(`td[data-x=${this.get('x') || 0}][data-y=${this.get('y') || 0}]`);
        new _modal_popup__WEBPACK_IMPORTED_MODULE_2__.Popup(formulaHtml, cell);
        formulaHtml.on('click', '.vi-wpbulky-apply-formula', this.applyFormula.bind(this));
    }

    content() {
        return (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(`<div class="vi-wpbulky-formula-container">
                    <div class="field">
                        <input type="text" placeholder="${_functions__WEBPACK_IMPORTED_MODULE_1__["default"].text('Find')}" class="vi-wpbulky-find-string">
                    </div>
                    <div class="field">
                        <input type="text" placeholder="${_functions__WEBPACK_IMPORTED_MODULE_1__["default"].text('Replace')}" class="vi-wpbulky-replace-string">
                    </div>
                    <button type="button" class="vi-ui button mini vi-wpbulky-apply-formula">${_functions__WEBPACK_IMPORTED_MODULE_1__["default"].text('Replace')}</button>
                </div>`);
    }

    applyFormula(e) {
        let form = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.target).closest('.vi-wpbulky-formula-container'),
            findString = form.find('.vi-wpbulky-find-string').val(),
            replaceString = form.find('.vi-wpbulky-replace-string').val(),
            excelObj = this.get('jexcel');

        if (!findString) return;

        let breakControl = false, records = [];
        let h = excelObj.selectedContainer;
        let start = h[1], end = h[3], x = h[0];

        for (let y = start; y <= end; y++) {
            if (excelObj.records[y][x] && !excelObj.records[y][x].classList.contains('readonly') && excelObj.records[y][x].style.display !== 'none' && breakControl === false) {
                let value = excelObj.options.data[y][x];
                let newValue = value.replaceAll(findString, replaceString);
                records.push(excelObj.updateCell(x, y, newValue));
                excelObj.updateFormulaChain(x, y, records);
            }
        }

        // Update history
        excelObj.setHistory({
            action: 'setValue',
            records: records,
            selection: excelObj.selectedCell,
        });

        // Update table with custom configuration if applicable
        excelObj.updateTable();
    }

}

/***/ }),

/***/ "./src/functions.js":
/*!**************************!*\
  !*** ./src/functions.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _attributes__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./attributes */ "./src/attributes.js");
/* harmony import */ var _templates__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./templates */ "./src/templates.js");



const _f = {
    setJexcel(obj) {
        this.jexcel = obj;
    },

    text(key) {
        return _attributes__WEBPACK_IMPORTED_MODULE_0__.I18n[key] || key;
    },

    isUrl: (url) => {
        return /^(http(s?):)\/\/.*\.(?:jpg|jpeg|gif|png|webp|svg|avif)$/i.test(url);
    },

    formatText(cell, value) {
        let text = '';
        if (value.length) {
            for (let k = 0; k < value.length; k++) {
                if (value[k]) text += value[k].text + '; ';
            }
        }
        cell.innerText = text;
    },

    createEditor(cell, type, content = '', display = true) {
        let editor = document.createElement(type);

        if (type === 'div') {
            (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(editor).append(content);
        }

        editor.style.minWidth = '300px';

        let popupHeight = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(editor).innerHeight(),
            stage = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(cell).offset(),
            x = stage.left,
            y = stage.top,
            cellWidth = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(cell).innerWidth(),
            info = cell.getBoundingClientRect();

        if (display) {
            editor.style.minHeight = (info.height - 2) + 'px';
            editor.style.maxHeight = (window.innerHeight - y - 50) + 'px';
        } else {
            editor.style.opacity = 0;
            editor.style.fontSize = 0;
        }

        editor.classList.add('vi-ui', 'segment', 'vi-wpbulky-cell-popup', 'vi-wpbulky-editing');
        cell.classList.add('editor');
        cell.appendChild(editor);

        let popupWidth = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(editor).innerWidth();

        if ((0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(this.jexcel.el).innerWidth() < x + popupWidth + cellWidth) {
            let left = x - popupWidth > 0 ? x - popupWidth : 10;
            (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(editor).css('left', left + 'px');
        } else {
            (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(editor).css('left', (x + cellWidth) + 'px');
        }

        if (window.innerHeight < y + popupHeight) {
            let h = y - popupHeight < 0 ? 0 : y - popupHeight;
            (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(editor).css('top', h + 'px');
        } else {
            (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(editor).css('top', y + 'px');
        }

        return editor;
    },

    createModal(data = {}) {
        let {actions} = data;
        let actionsHtml = '';

        if (Array.isArray(actions)) {
            for (let item of actions) {
                actionsHtml += `<span class="${item.class} vi-ui button tiny">${item.text}</span>`;
            }
        }

        return (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(_templates__WEBPACK_IMPORTED_MODULE_1__["default"].modal({...data, actionsHtml}));
    },

    removeModal(cell) {
        (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(cell).find('.vi-wpbulky-modal-container').remove();
        (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('.select2-container--open').remove();
    },

    getColFromColumnType(colType) {
        return _attributes__WEBPACK_IMPORTED_MODULE_0__.Attributes.idMappingFlip[colType] || '';
    },

    getPostTypeFromCell(cell) {
        let y = cell.getAttribute('data-y');
        let x = this.getColFromColumnType('post_type');
        return this.jexcel.options.data[y][x];
    },

    getPostTypeFromY(y) {
        let x = this.getColFromColumnType('post_type');
        return this.jexcel.options.data[y][x];
    },

    getColumnType(x) {
        return _attributes__WEBPACK_IMPORTED_MODULE_0__.Attributes.idMapping[x]
    },

    stripHtml(content) {
        return (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(`<div>${content}</div>`).text();
    },

    getDataFromCell(obj, cell) {
        let y = cell.getAttribute('data-y'),
            x = cell.getAttribute('data-x');
        return obj.options.data[y][x];
    },

    getPostIdOfCell(obj, target) {
        if (typeof target === 'object') {
            let y = target.getAttribute('data-y');
            return obj.options.data[y][0];
        } else {
            return obj.options.data[target][0];
        }
    },

    ajax(args = {}) {
        let options = Object.assign({
            url: wpbulkyParams.ajaxUrl,
            type: 'post',
            dataType: 'json',
        }, args);

        options.data.action = 'vi_wpbulky_ajax';
        options.data.vi_wpbulky_nonce = wpbulkyParams.nonce;
        options.data.post_type = wpbulkyParams.postType;

        _attributes__WEBPACK_IMPORTED_MODULE_0__.$.ajax(options);

    },

    pagination(maxPage, currentPage) {
        currentPage = parseInt(currentPage);
        maxPage = parseInt(maxPage);
        let pagination = '',
            previousArrow = `<a class="item ${currentPage === 1 ? 'disabled' : ''}" data-page="${currentPage - 1}"><i class="icon angle left"> </i></a>`,
            nextArrow = `<a class="item ${currentPage === maxPage ? 'disabled' : ''}" data-page="${currentPage + 1}"><i class="icon angle right"> </i></a>`,
            goToPage = `<input type="number" class="vi-wpbulky-go-to-page" value="${currentPage}" min="1" max="${maxPage}"/>`;

        for (let i = 1; i <= maxPage; i++) {
            if ([1, currentPage - 1, currentPage, currentPage + 1, maxPage].includes(i)) {
                pagination += `<a class="item ${currentPage === i ? 'active' : ''}" data-page="${i}">${i}</a>`;
            }
            if (i === currentPage - 2 && currentPage - 2 > 1) pagination += `<a class="item disabled">...</a>`;
            if (i === currentPage + 2 && currentPage + 2 < maxPage) pagination += `<a class="item disabled">...</a>`;
        }

        return `<div class="vi-ui pagination menu">${previousArrow} ${pagination} ${nextArrow} </div> ${goToPage}`;
    },

    spinner() {
        return (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('<span class="vi-wpbulky-spinner"><span class="vi-wpbulky-spinner-inner"> </span></span>')
    },

    is_loading() {
        return !!this._spinner;
    },

    loading() {
        this._spinner = this.spinner();
        (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('.vi-wpbulky-menu-bar-center').html(this._spinner);
    },

    removeLoading() {
        this._spinner = null;
        (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('.vi-wpbulky-menu-bar-center').html('');
    },

    notice(text, color = 'black') {
        let content = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(`<div class="vi-wpbulky-notice" style="color:${color}">${text}</div>`);
        (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('.vi-wpbulky-menu-bar-center').html(content);
        setTimeout(function () {
            content.remove();
        }, 5000);
    },

    showMessage({title = '', message = '', type = 'positive', duration = 3000}) {
    const main = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)( "#vi-wpbulky-container" ).find( "#vi-hui-toast" );
    if ( main.get(0) ) {
        const toast = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)( "<div></div>" );
        const autoRemoveToast = setTimeout( function () {
            main.find( ".vi-ui.message" ).remove();
        }, duration + 1000 );

        toast.on( "click", ".icon.close", function (e) {
            main.find( ".vi-ui.message" ).remove();
            clearTimeout( autoRemoveToast );
        } );

        if ( main.children().length > 0 ) {
            main.find( ".vi-hui-toast" ).first().remove();
            clearTimeout( autoRemoveToast );
        }
        const delay = (duration / 1000).toFixed(2);

        if ((0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('html').attr('dir') === 'rtl') {
            toast.css( { "animation": `slideInRight ease .3s, fadeOut linear 1s ${delay}s forwards` } );
        } else {
            toast.css( { "animation": `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards` } );
        }

        toast.addClass( `vi-ui ${type} message` );
        toast.html(
            `<i class="close icon"></i>
                          <div class="header">
                            ${title}
                          </div>
                          <p>${message}</p>`
        );

        if ( main.children().length > 0 ) {
            let firstEleType = main.find( ".vi-ui.message" ).first().attr( "class" ).split(/\s+/)[1];
            if ( type !== firstEleType ) {
                main.append( toast );
            }
        }else {
            main.append( toast );
        }
    }
}
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_f);

/***/ }),

/***/ "./src/modal-popup.js":
/*!****************************!*\
  !*** ./src/modal-popup.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   Modal: () => (/* binding */ Modal),
/* harmony export */   Popup: () => (/* binding */ Popup)
/* harmony export */ });
/* harmony import */ var _attributes__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./attributes */ "./src/attributes.js");


class Modal {
    constructor() {

    }
}

let popupInstance = null;

class Popup {
    constructor(content, cell) {
        if (!popupInstance) {
            (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('body').on('mousedown keydown', this.mousedown);
        }

        popupInstance = this;

        return this.render(content, (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(cell));
    }

    mousedown(e) {
        let thisTarget = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.target),
            popup = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('.vi-wpbulky-context-popup');

        if (e.which===27 || !thisTarget.hasClass('vi-wpbulky-context-popup') && thisTarget.closest('.vi-wpbulky-context-popup').length === 0 && popup.hasClass('vi-wpbulky-popup-active')) {
            popup.empty().removeClass('vi-wpbulky-popup-active');
        }
    }

    render(content, cell) {
        let popup = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('.vi-wpbulky-context-popup'),
            popupWidth = popup.innerWidth(),
            popupHeight = popup.innerHeight(),
            stage = cell.offset(),
            x = stage.left, y = stage.top,
            cellWidth = cell.innerWidth();

        if (window.innerWidth < x + popupWidth + cellWidth) {
            let left = x - popupWidth > 0 ? x - popupWidth : 10;
            popup.css('left', left + 'px');
        } else {
            popup.css('left', (x + cellWidth) + 'px');
        }

        if (window.innerHeight < y + popupHeight) {
            let h = y - popupHeight < 0 ? 0 : y - popupHeight;
            popup.css('top', h + 'px');
        } else {
            popup.css('top', y + 'px');
        }

        popup.empty();
        popup.addClass('vi-wpbulky-popup-active').html(content);
    }
}



/***/ }),

/***/ "./src/purify.js":
/*!***********************!*\
  !*** ./src/purify.js ***!
  \***********************/
/***/ (function(module) {

/*! @license DOMPurify 3.0.2 | (c) Cure53 and other contributors | Released under the Apache license 2.0 and Mozilla Public License 2.0 | github.com/cure53/DOMPurify/blob/3.0.2/LICENSE */

(function (global, factory) {
   true ? module.exports = factory() :
  0;
})(this, (function () { 'use strict';

  const {
    entries,
    setPrototypeOf,
    isFrozen,
    getPrototypeOf,
    getOwnPropertyDescriptor
  } = Object;
  let {
    freeze,
    seal,
    create
  } = Object; // eslint-disable-line import/no-mutable-exports

  let {
    apply,
    construct
  } = typeof Reflect !== 'undefined' && Reflect;

  if (!apply) {
    apply = function apply(fun, thisValue, args) {
      return fun.apply(thisValue, args);
    };
  }

  if (!freeze) {
    freeze = function freeze(x) {
      return x;
    };
  }

  if (!seal) {
    seal = function seal(x) {
      return x;
    };
  }

  if (!construct) {
    construct = function construct(Func, args) {
      return new Func(...args);
    };
  }

  const arrayForEach = unapply(Array.prototype.forEach);
  const arrayPop = unapply(Array.prototype.pop);
  const arrayPush = unapply(Array.prototype.push);
  const stringToLowerCase = unapply(String.prototype.toLowerCase);
  const stringToString = unapply(String.prototype.toString);
  const stringMatch = unapply(String.prototype.match);
  const stringReplace = unapply(String.prototype.replace);
  const stringIndexOf = unapply(String.prototype.indexOf);
  const stringTrim = unapply(String.prototype.trim);
  const regExpTest = unapply(RegExp.prototype.test);
  const typeErrorCreate = unconstruct(TypeError);
  function unapply(func) {
    return function (thisArg) {
      for (var _len = arguments.length, args = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
        args[_key - 1] = arguments[_key];
      }

      return apply(func, thisArg, args);
    };
  }
  function unconstruct(func) {
    return function () {
      for (var _len2 = arguments.length, args = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
        args[_key2] = arguments[_key2];
      }

      return construct(func, args);
    };
  }
  /* Add properties to a lookup table */

  function addToSet(set, array, transformCaseFunc) {
    transformCaseFunc = transformCaseFunc ? transformCaseFunc : stringToLowerCase;

    if (setPrototypeOf) {
      // Make 'in' and truthy checks like Boolean(set.constructor)
      // independent of any properties defined on Object.prototype.
      // Prevent prototype setters from intercepting set as a this value.
      setPrototypeOf(set, null);
    }

    let l = array.length;

    while (l--) {
      let element = array[l];

      if (typeof element === 'string') {
        const lcElement = transformCaseFunc(element);

        if (lcElement !== element) {
          // Config presets (e.g. tags.js, attrs.js) are immutable.
          if (!isFrozen(array)) {
            array[l] = lcElement;
          }

          element = lcElement;
        }
      }

      set[element] = true;
    }

    return set;
  }
  /* Shallow clone an object */

  function clone(object) {
    const newObject = create(null);

    for (const [property, value] of entries(object)) {
      newObject[property] = value;
    }

    return newObject;
  }
  /* This method automatically checks if the prop is function
   * or getter and behaves accordingly. */

  function lookupGetter(object, prop) {
    while (object !== null) {
      const desc = getOwnPropertyDescriptor(object, prop);

      if (desc) {
        if (desc.get) {
          return unapply(desc.get);
        }

        if (typeof desc.value === 'function') {
          return unapply(desc.value);
        }
      }

      object = getPrototypeOf(object);
    }

    function fallbackValue(element) {
      console.warn('fallback value for', element);
      return null;
    }

    return fallbackValue;
  }

  const html$1 = freeze(['a', 'abbr', 'acronym', 'address', 'area', 'article', 'aside', 'audio', 'b', 'bdi', 'bdo', 'big', 'blink', 'blockquote', 'body', 'br', 'button', 'canvas', 'caption', 'center', 'cite', 'code', 'col', 'colgroup', 'content', 'data', 'datalist', 'dd', 'decorator', 'del', 'details', 'dfn', 'dialog', 'dir', 'div', 'dl', 'dt', 'element', 'em', 'fieldset', 'figcaption', 'figure', 'font', 'footer', 'form', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'header', 'hgroup', 'hr', 'html', 'i', 'img', 'input', 'ins', 'kbd', 'label', 'legend', 'li', 'main', 'map', 'mark', 'marquee', 'menu', 'menuitem', 'meter', 'nav', 'nobr', 'ol', 'optgroup', 'option', 'output', 'p', 'picture', 'pre', 'progress', 'q', 'rp', 'rt', 'ruby', 's', 'samp', 'section', 'select', 'shadow', 'small', 'source', 'spacer', 'span', 'strike', 'strong', 'style', 'sub', 'summary', 'sup', 'table', 'tbody', 'td', 'template', 'textarea', 'tfoot', 'th', 'thead', 'time', 'tr', 'track', 'tt', 'u', 'ul', 'var', 'video', 'wbr']); // SVG

  const svg$1 = freeze(['svg', 'a', 'altglyph', 'altglyphdef', 'altglyphitem', 'animatecolor', 'animatemotion', 'animatetransform', 'circle', 'clippath', 'defs', 'desc', 'ellipse', 'filter', 'font', 'g', 'glyph', 'glyphref', 'hkern', 'image', 'line', 'lineargradient', 'marker', 'mask', 'metadata', 'mpath', 'path', 'pattern', 'polygon', 'polyline', 'radialgradient', 'rect', 'stop', 'style', 'switch', 'symbol', 'text', 'textpath', 'title', 'tref', 'tspan', 'view', 'vkern']);
  const svgFilters = freeze(['feBlend', 'feColorMatrix', 'feComponentTransfer', 'feComposite', 'feConvolveMatrix', 'feDiffuseLighting', 'feDisplacementMap', 'feDistantLight', 'feFlood', 'feFuncA', 'feFuncB', 'feFuncG', 'feFuncR', 'feGaussianBlur', 'feImage', 'feMerge', 'feMergeNode', 'feMorphology', 'feOffset', 'fePointLight', 'feSpecularLighting', 'feSpotLight', 'feTile', 'feTurbulence']); // List of SVG elements that are disallowed by default.
  // We still need to know them so that we can do namespace
  // checks properly in case one wants to add them to
  // allow-list.

  const svgDisallowed = freeze(['animate', 'color-profile', 'cursor', 'discard', 'fedropshadow', 'font-face', 'font-face-format', 'font-face-name', 'font-face-src', 'font-face-uri', 'foreignobject', 'hatch', 'hatchpath', 'mesh', 'meshgradient', 'meshpatch', 'meshrow', 'missing-glyph', 'script', 'set', 'solidcolor', 'unknown', 'use']);
  const mathMl$1 = freeze(['math', 'menclose', 'merror', 'mfenced', 'mfrac', 'mglyph', 'mi', 'mlabeledtr', 'mmultiscripts', 'mn', 'mo', 'mover', 'mpadded', 'mphantom', 'mroot', 'mrow', 'ms', 'mspace', 'msqrt', 'mstyle', 'msub', 'msup', 'msubsup', 'mtable', 'mtd', 'mtext', 'mtr', 'munder', 'munderover', 'mprescripts']); // Similarly to SVG, we want to know all MathML elements,
  // even those that we disallow by default.

  const mathMlDisallowed = freeze(['maction', 'maligngroup', 'malignmark', 'mlongdiv', 'mscarries', 'mscarry', 'msgroup', 'mstack', 'msline', 'msrow', 'semantics', 'annotation', 'annotation-xml', 'mprescripts', 'none']);
  const text = freeze(['#text']);

  const html = freeze(['accept', 'action', 'align', 'alt', 'autocapitalize', 'autocomplete', 'autopictureinpicture', 'autoplay', 'background', 'bgcolor', 'border', 'capture', 'cellpadding', 'cellspacing', 'checked', 'cite', 'class', 'clear', 'color', 'cols', 'colspan', 'controls', 'controlslist', 'coords', 'crossorigin', 'datetime', 'decoding', 'default', 'dir', 'disabled', 'disablepictureinpicture', 'disableremoteplayback', 'download', 'draggable', 'enctype', 'enterkeyhint', 'face', 'for', 'headers', 'height', 'hidden', 'high', 'href', 'hreflang', 'id', 'inputmode', 'integrity', 'ismap', 'kind', 'label', 'lang', 'list', 'loading', 'loop', 'low', 'max', 'maxlength', 'media', 'method', 'min', 'minlength', 'multiple', 'muted', 'name', 'nonce', 'noshade', 'novalidate', 'nowrap', 'open', 'optimum', 'pattern', 'placeholder', 'playsinline', 'poster', 'preload', 'pubdate', 'radiogroup', 'readonly', 'rel', 'required', 'rev', 'reversed', 'role', 'rows', 'rowspan', 'spellcheck', 'scope', 'selected', 'shape', 'size', 'sizes', 'span', 'srclang', 'start', 'src', 'srcset', 'step', 'style', 'summary', 'tabindex', 'title', 'translate', 'type', 'usemap', 'valign', 'value', 'width', 'xmlns', 'slot']);
  const svg = freeze(['accent-height', 'accumulate', 'additive', 'alignment-baseline', 'ascent', 'attributename', 'attributetype', 'azimuth', 'basefrequency', 'baseline-shift', 'begin', 'bias', 'by', 'class', 'clip', 'clippathunits', 'clip-path', 'clip-rule', 'color', 'color-interpolation', 'color-interpolation-filters', 'color-profile', 'color-rendering', 'cx', 'cy', 'd', 'dx', 'dy', 'diffuseconstant', 'direction', 'display', 'divisor', 'dur', 'edgemode', 'elevation', 'end', 'fill', 'fill-opacity', 'fill-rule', 'filter', 'filterunits', 'flood-color', 'flood-opacity', 'font-family', 'font-size', 'font-size-adjust', 'font-stretch', 'font-style', 'font-variant', 'font-weight', 'fx', 'fy', 'g1', 'g2', 'glyph-name', 'glyphref', 'gradientunits', 'gradienttransform', 'height', 'href', 'id', 'image-rendering', 'in', 'in2', 'k', 'k1', 'k2', 'k3', 'k4', 'kerning', 'keypoints', 'keysplines', 'keytimes', 'lang', 'lengthadjust', 'letter-spacing', 'kernelmatrix', 'kernelunitlength', 'lighting-color', 'local', 'marker-end', 'marker-mid', 'marker-start', 'markerheight', 'markerunits', 'markerwidth', 'maskcontentunits', 'maskunits', 'max', 'mask', 'media', 'method', 'mode', 'min', 'name', 'numoctaves', 'offset', 'operator', 'opacity', 'order', 'orient', 'orientation', 'origin', 'overflow', 'paint-order', 'path', 'pathlength', 'patterncontentunits', 'patterntransform', 'patternunits', 'points', 'preservealpha', 'preserveaspectratio', 'primitiveunits', 'r', 'rx', 'ry', 'radius', 'refx', 'refy', 'repeatcount', 'repeatdur', 'restart', 'result', 'rotate', 'scale', 'seed', 'shape-rendering', 'specularconstant', 'specularexponent', 'spreadmethod', 'startoffset', 'stddeviation', 'stitchtiles', 'stop-color', 'stop-opacity', 'stroke-dasharray', 'stroke-dashoffset', 'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke', 'stroke-width', 'style', 'surfacescale', 'systemlanguage', 'tabindex', 'targetx', 'targety', 'transform', 'transform-origin', 'text-anchor', 'text-decoration', 'text-rendering', 'textlength', 'type', 'u1', 'u2', 'unicode', 'values', 'viewbox', 'visibility', 'version', 'vert-adv-y', 'vert-origin-x', 'vert-origin-y', 'width', 'word-spacing', 'wrap', 'writing-mode', 'xchannelselector', 'ychannelselector', 'x', 'x1', 'x2', 'xmlns', 'y', 'y1', 'y2', 'z', 'zoomandpan']);
  const mathMl = freeze(['accent', 'accentunder', 'align', 'bevelled', 'close', 'columnsalign', 'columnlines', 'columnspan', 'denomalign', 'depth', 'dir', 'display', 'displaystyle', 'encoding', 'fence', 'frame', 'height', 'href', 'id', 'largeop', 'length', 'linethickness', 'lspace', 'lquote', 'mathbackground', 'mathcolor', 'mathsize', 'mathvariant', 'maxsize', 'minsize', 'movablelimits', 'notation', 'numalign', 'open', 'rowalign', 'rowlines', 'rowspacing', 'rowspan', 'rspace', 'rquote', 'scriptlevel', 'scriptminsize', 'scriptsizemultiplier', 'selection', 'separator', 'separators', 'stretchy', 'subscriptshift', 'supscriptshift', 'symmetric', 'voffset', 'width', 'xmlns']);
  const xml = freeze(['xlink:href', 'xml:id', 'xlink:title', 'xml:space', 'xmlns:xlink']);

  const MUSTACHE_EXPR = seal(/\{\{[\w\W]*|[\w\W]*\}\}/gm); // Specify template detection regex for SAFE_FOR_TEMPLATES mode

  const ERB_EXPR = seal(/<%[\w\W]*|[\w\W]*%>/gm);
  const TMPLIT_EXPR = seal(/\${[\w\W]*}/gm);
  const DATA_ATTR = seal(/^data-[\-\w.\u00B7-\uFFFF]/); // eslint-disable-line no-useless-escape

  const ARIA_ATTR = seal(/^aria-[\-\w]+$/); // eslint-disable-line no-useless-escape

  const IS_ALLOWED_URI = seal(/^(?:(?:(?:f|ht)tps?|mailto|tel|callto|sms|cid|xmpp):|[^a-z]|[a-z+.\-]+(?:[^a-z+.\-:]|$))/i // eslint-disable-line no-useless-escape
  );
  const IS_SCRIPT_OR_DATA = seal(/^(?:\w+script|data):/i);
  const ATTR_WHITESPACE = seal(/[\u0000-\u0020\u00A0\u1680\u180E\u2000-\u2029\u205F\u3000]/g // eslint-disable-line no-control-regex
  );
  const DOCTYPE_NAME = seal(/^html$/i);

  var EXPRESSIONS = /*#__PURE__*/Object.freeze({
    __proto__: null,
    MUSTACHE_EXPR: MUSTACHE_EXPR,
    ERB_EXPR: ERB_EXPR,
    TMPLIT_EXPR: TMPLIT_EXPR,
    DATA_ATTR: DATA_ATTR,
    ARIA_ATTR: ARIA_ATTR,
    IS_ALLOWED_URI: IS_ALLOWED_URI,
    IS_SCRIPT_OR_DATA: IS_SCRIPT_OR_DATA,
    ATTR_WHITESPACE: ATTR_WHITESPACE,
    DOCTYPE_NAME: DOCTYPE_NAME
  });

  const getGlobal = () => typeof window === 'undefined' ? null : window;
  /**
   * Creates a no-op policy for internal use only.
   * Don't export this function outside this module!
   * @param {?TrustedTypePolicyFactory} trustedTypes The policy factory.
   * @param {Document} document The document object (to determine policy name suffix)
   * @return {?TrustedTypePolicy} The policy created (or null, if Trusted Types
   * are not supported).
   */


  const _createTrustedTypesPolicy = function _createTrustedTypesPolicy(trustedTypes, document) {
    if (typeof trustedTypes !== 'object' || typeof trustedTypes.createPolicy !== 'function') {
      return null;
    } // Allow the callers to control the unique policy name
    // by adding a data-tt-policy-suffix to the script element with the DOMPurify.
    // Policy creation with duplicate names throws in Trusted Types.


    let suffix = null;
    const ATTR_NAME = 'data-tt-policy-suffix';

    if (document.currentScript && document.currentScript.hasAttribute(ATTR_NAME)) {
      suffix = document.currentScript.getAttribute(ATTR_NAME);
    }

    const policyName = 'dompurify' + (suffix ? '#' + suffix : '');

    try {
      return trustedTypes.createPolicy(policyName, {
        createHTML(html) {
          return html;
        },

        createScriptURL(scriptUrl) {
          return scriptUrl;
        }

      });
    } catch (_) {
      // Policy creation failed (most likely another DOMPurify script has
      // already run). Skip creating the policy, as this will only cause errors
      // if TT are enforced.
      console.warn('TrustedTypes policy ' + policyName + ' could not be created.');
      return null;
    }
  };

  function createDOMPurify() {
    let window = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : getGlobal();

    const DOMPurify = root => createDOMPurify(root);
    /**
     * Version label, exposed for easier checks
     * if DOMPurify is up to date or not
     */


    DOMPurify.version = '3.0.2';
    /**
     * Array of elements that DOMPurify removed during sanitation.
     * Empty if nothing was removed.
     */

    DOMPurify.removed = [];

    if (!window || !window.document || window.document.nodeType !== 9) {
      // Not running in a browser, provide a factory function
      // so that you can pass your own Window
      DOMPurify.isSupported = false;
      return DOMPurify;
    }

    const originalDocument = window.document;
    let {
      document
    } = window;
    const {
      DocumentFragment,
      HTMLTemplateElement,
      Node,
      Element,
      NodeFilter,
      NamedNodeMap = window.NamedNodeMap || window.MozNamedAttrMap,
      HTMLFormElement,
      DOMParser,
      trustedTypes
    } = window;
    const ElementPrototype = Element.prototype;
    const cloneNode = lookupGetter(ElementPrototype, 'cloneNode');
    const getNextSibling = lookupGetter(ElementPrototype, 'nextSibling');
    const getChildNodes = lookupGetter(ElementPrototype, 'childNodes');
    const getParentNode = lookupGetter(ElementPrototype, 'parentNode'); // As per issue #47, the web-components registry is inherited by a
    // new document created via createHTMLDocument. As per the spec
    // (http://w3c.github.io/webcomponents/spec/custom/#creating-and-passing-registries)
    // a new empty registry is used when creating a template contents owner
    // document, so we use that as our parent document to ensure nothing
    // is inherited.

    if (typeof HTMLTemplateElement === 'function') {
      const template = document.createElement('template');

      if (template.content && template.content.ownerDocument) {
        document = template.content.ownerDocument;
      }
    }

    const trustedTypesPolicy = _createTrustedTypesPolicy(trustedTypes, originalDocument);

    const emptyHTML = trustedTypesPolicy ? trustedTypesPolicy.createHTML('') : '';
    const {
      implementation,
      createNodeIterator,
      createDocumentFragment,
      getElementsByTagName
    } = document;
    const {
      importNode
    } = originalDocument;
    let hooks = {};
    /**
     * Expose whether this browser supports running the full DOMPurify.
     */

    DOMPurify.isSupported = typeof entries === 'function' && typeof getParentNode === 'function' && implementation && typeof implementation.createHTMLDocument !== 'undefined';
    const {
      MUSTACHE_EXPR,
      ERB_EXPR,
      TMPLIT_EXPR,
      DATA_ATTR,
      ARIA_ATTR,
      IS_SCRIPT_OR_DATA,
      ATTR_WHITESPACE
    } = EXPRESSIONS;
    let {
      IS_ALLOWED_URI: IS_ALLOWED_URI$1
    } = EXPRESSIONS;
    /**
     * We consider the elements and attributes below to be safe. Ideally
     * don't add any new ones but feel free to remove unwanted ones.
     */

    /* allowed element names */

    let ALLOWED_TAGS = null;
    const DEFAULT_ALLOWED_TAGS = addToSet({}, [...html$1, ...svg$1, ...svgFilters, ...mathMl$1, ...text]);
    /* Allowed attribute names */

    let ALLOWED_ATTR = null;
    const DEFAULT_ALLOWED_ATTR = addToSet({}, [...html, ...svg, ...mathMl, ...xml]);
    /*
     * Configure how DOMPUrify should handle custom elements and their attributes as well as customized built-in elements.
     * @property {RegExp|Function|null} tagNameCheck one of [null, regexPattern, predicate]. Default: `null` (disallow any custom elements)
     * @property {RegExp|Function|null} attributeNameCheck one of [null, regexPattern, predicate]. Default: `null` (disallow any attributes not on the allow list)
     * @property {boolean} allowCustomizedBuiltInElements allow custom elements derived from built-ins if they pass CUSTOM_ELEMENT_HANDLING.tagNameCheck. Default: `false`.
     */

    let CUSTOM_ELEMENT_HANDLING = Object.seal(Object.create(null, {
      tagNameCheck: {
        writable: true,
        configurable: false,
        enumerable: true,
        value: null
      },
      attributeNameCheck: {
        writable: true,
        configurable: false,
        enumerable: true,
        value: null
      },
      allowCustomizedBuiltInElements: {
        writable: true,
        configurable: false,
        enumerable: true,
        value: false
      }
    }));
    /* Explicitly forbidden tags (overrides ALLOWED_TAGS/ADD_TAGS) */

    let FORBID_TAGS = null;
    /* Explicitly forbidden attributes (overrides ALLOWED_ATTR/ADD_ATTR) */

    let FORBID_ATTR = null;
    /* Decide if ARIA attributes are okay */

    let ALLOW_ARIA_ATTR = true;
    /* Decide if custom data attributes are okay */

    let ALLOW_DATA_ATTR = true;
    /* Decide if unknown protocols are okay */

    let ALLOW_UNKNOWN_PROTOCOLS = false;
    /* Decide if self-closing tags in attributes are allowed.
     * Usually removed due to a mXSS issue in jQuery 3.0 */

    let ALLOW_SELF_CLOSE_IN_ATTR = true;
    /* Output should be safe for common template engines.
     * This means, DOMPurify removes data attributes, mustaches and ERB
     */

    let SAFE_FOR_TEMPLATES = false;
    /* Decide if document with <html>... should be returned */

    let WHOLE_DOCUMENT = false;
    /* Track whether config is already set on this instance of DOMPurify. */

    let SET_CONFIG = false;
    /* Decide if all elements (e.g. style, script) must be children of
     * document.body. By default, browsers might move them to document.head */

    let FORCE_BODY = false;
    /* Decide if a DOM `HTMLBodyElement` should be returned, instead of a html
     * string (or a TrustedHTML object if Trusted Types are supported).
     * If `WHOLE_DOCUMENT` is enabled a `HTMLHtmlElement` will be returned instead
     */

    let RETURN_DOM = false;
    /* Decide if a DOM `DocumentFragment` should be returned, instead of a html
     * string  (or a TrustedHTML object if Trusted Types are supported) */

    let RETURN_DOM_FRAGMENT = false;
    /* Try to return a Trusted Type object instead of a string, return a string in
     * case Trusted Types are not supported  */

    let RETURN_TRUSTED_TYPE = false;
    /* Output should be free from DOM clobbering attacks?
     * This sanitizes markups named with colliding, clobberable built-in DOM APIs.
     */

    let SANITIZE_DOM = true;
    /* Achieve full DOM Clobbering protection by isolating the namespace of named
     * properties and JS variables, mitigating attacks that abuse the HTML/DOM spec rules.
     *
     * HTML/DOM spec rules that enable DOM Clobbering:
     *   - Named Access on Window (§7.3.3)
     *   - DOM Tree Accessors (§3.1.5)
     *   - Form Element Parent-Child Relations (§4.10.3)
     *   - Iframe srcdoc / Nested WindowProxies (§4.8.5)
     *   - HTMLCollection (§4.2.10.2)
     *
     * Namespace isolation is implemented by prefixing `id` and `name` attributes
     * with a constant string, i.e., `user-content-`
     */

    let SANITIZE_NAMED_PROPS = false;
    const SANITIZE_NAMED_PROPS_PREFIX = 'user-content-';
    /* Keep element content when removing element? */

    let KEEP_CONTENT = true;
    /* If a `Node` is passed to sanitize(), then performs sanitization in-place instead
     * of importing it into a new Document and returning a sanitized copy */

    let IN_PLACE = false;
    /* Allow usage of profiles like html, svg and mathMl */

    let USE_PROFILES = {};
    /* Tags to ignore content of when KEEP_CONTENT is true */

    let FORBID_CONTENTS = null;
    const DEFAULT_FORBID_CONTENTS = addToSet({}, ['annotation-xml', 'audio', 'colgroup', 'desc', 'foreignobject', 'head', 'iframe', 'math', 'mi', 'mn', 'mo', 'ms', 'mtext', 'noembed', 'noframes', 'noscript', 'plaintext', 'script', 'style', 'svg', 'template', 'thead', 'title', 'video', 'xmp']);
    /* Tags that are safe for data: URIs */

    let DATA_URI_TAGS = null;
    const DEFAULT_DATA_URI_TAGS = addToSet({}, ['audio', 'video', 'img', 'source', 'image', 'track']);
    /* Attributes safe for values like "javascript:" */

    let URI_SAFE_ATTRIBUTES = null;
    const DEFAULT_URI_SAFE_ATTRIBUTES = addToSet({}, ['alt', 'class', 'for', 'id', 'label', 'name', 'pattern', 'placeholder', 'role', 'summary', 'title', 'value', 'style', 'xmlns']);
    const MATHML_NAMESPACE = 'http://www.w3.org/1998/Math/MathML';
    const SVG_NAMESPACE = 'http://www.w3.org/2000/svg';
    const HTML_NAMESPACE = 'http://www.w3.org/1999/xhtml';
    /* Document namespace */

    let NAMESPACE = HTML_NAMESPACE;
    let IS_EMPTY_INPUT = false;
    /* Allowed XHTML+XML namespaces */

    let ALLOWED_NAMESPACES = null;
    const DEFAULT_ALLOWED_NAMESPACES = addToSet({}, [MATHML_NAMESPACE, SVG_NAMESPACE, HTML_NAMESPACE], stringToString);
    /* Parsing of strict XHTML documents */

    let PARSER_MEDIA_TYPE;
    const SUPPORTED_PARSER_MEDIA_TYPES = ['application/xhtml+xml', 'text/html'];
    const DEFAULT_PARSER_MEDIA_TYPE = 'text/html';
    let transformCaseFunc;
    /* Keep a reference to config to pass to hooks */

    let CONFIG = null;
    /* Ideally, do not touch anything below this line */

    /* ______________________________________________ */

    const formElement = document.createElement('form');

    const isRegexOrFunction = function isRegexOrFunction(testValue) {
      return testValue instanceof RegExp || testValue instanceof Function;
    };
    /**
     * _parseConfig
     *
     * @param  {Object} cfg optional config literal
     */
    // eslint-disable-next-line complexity


    const _parseConfig = function _parseConfig(cfg) {
      if (CONFIG && CONFIG === cfg) {
        return;
      }
      /* Shield configuration object from tampering */


      if (!cfg || typeof cfg !== 'object') {
        cfg = {};
      }
      /* Shield configuration object from prototype pollution */


      cfg = clone(cfg);
      PARSER_MEDIA_TYPE = // eslint-disable-next-line unicorn/prefer-includes
      SUPPORTED_PARSER_MEDIA_TYPES.indexOf(cfg.PARSER_MEDIA_TYPE) === -1 ? PARSER_MEDIA_TYPE = DEFAULT_PARSER_MEDIA_TYPE : PARSER_MEDIA_TYPE = cfg.PARSER_MEDIA_TYPE; // HTML tags and attributes are not case-sensitive, converting to lowercase. Keeping XHTML as is.

      transformCaseFunc = PARSER_MEDIA_TYPE === 'application/xhtml+xml' ? stringToString : stringToLowerCase;
      /* Set configuration parameters */

      ALLOWED_TAGS = 'ALLOWED_TAGS' in cfg ? addToSet({}, cfg.ALLOWED_TAGS, transformCaseFunc) : DEFAULT_ALLOWED_TAGS;
      ALLOWED_ATTR = 'ALLOWED_ATTR' in cfg ? addToSet({}, cfg.ALLOWED_ATTR, transformCaseFunc) : DEFAULT_ALLOWED_ATTR;
      ALLOWED_NAMESPACES = 'ALLOWED_NAMESPACES' in cfg ? addToSet({}, cfg.ALLOWED_NAMESPACES, stringToString) : DEFAULT_ALLOWED_NAMESPACES;
      URI_SAFE_ATTRIBUTES = 'ADD_URI_SAFE_ATTR' in cfg ? addToSet(clone(DEFAULT_URI_SAFE_ATTRIBUTES), // eslint-disable-line indent
      cfg.ADD_URI_SAFE_ATTR, // eslint-disable-line indent
      transformCaseFunc // eslint-disable-line indent
      ) // eslint-disable-line indent
      : DEFAULT_URI_SAFE_ATTRIBUTES;
      DATA_URI_TAGS = 'ADD_DATA_URI_TAGS' in cfg ? addToSet(clone(DEFAULT_DATA_URI_TAGS), // eslint-disable-line indent
      cfg.ADD_DATA_URI_TAGS, // eslint-disable-line indent
      transformCaseFunc // eslint-disable-line indent
      ) // eslint-disable-line indent
      : DEFAULT_DATA_URI_TAGS;
      FORBID_CONTENTS = 'FORBID_CONTENTS' in cfg ? addToSet({}, cfg.FORBID_CONTENTS, transformCaseFunc) : DEFAULT_FORBID_CONTENTS;
      FORBID_TAGS = 'FORBID_TAGS' in cfg ? addToSet({}, cfg.FORBID_TAGS, transformCaseFunc) : {};
      FORBID_ATTR = 'FORBID_ATTR' in cfg ? addToSet({}, cfg.FORBID_ATTR, transformCaseFunc) : {};
      USE_PROFILES = 'USE_PROFILES' in cfg ? cfg.USE_PROFILES : false;
      ALLOW_ARIA_ATTR = cfg.ALLOW_ARIA_ATTR !== false; // Default true

      ALLOW_DATA_ATTR = cfg.ALLOW_DATA_ATTR !== false; // Default true

      ALLOW_UNKNOWN_PROTOCOLS = cfg.ALLOW_UNKNOWN_PROTOCOLS || false; // Default false

      ALLOW_SELF_CLOSE_IN_ATTR = cfg.ALLOW_SELF_CLOSE_IN_ATTR !== false; // Default true

      SAFE_FOR_TEMPLATES = cfg.SAFE_FOR_TEMPLATES || false; // Default false

      WHOLE_DOCUMENT = cfg.WHOLE_DOCUMENT || false; // Default false

      RETURN_DOM = cfg.RETURN_DOM || false; // Default false

      RETURN_DOM_FRAGMENT = cfg.RETURN_DOM_FRAGMENT || false; // Default false

      RETURN_TRUSTED_TYPE = cfg.RETURN_TRUSTED_TYPE || false; // Default false

      FORCE_BODY = cfg.FORCE_BODY || false; // Default false

      SANITIZE_DOM = cfg.SANITIZE_DOM !== false; // Default true

      SANITIZE_NAMED_PROPS = cfg.SANITIZE_NAMED_PROPS || false; // Default false

      KEEP_CONTENT = cfg.KEEP_CONTENT !== false; // Default true

      IN_PLACE = cfg.IN_PLACE || false; // Default false

      IS_ALLOWED_URI$1 = cfg.ALLOWED_URI_REGEXP || IS_ALLOWED_URI;
      NAMESPACE = cfg.NAMESPACE || HTML_NAMESPACE;
      CUSTOM_ELEMENT_HANDLING = cfg.CUSTOM_ELEMENT_HANDLING || {};

      if (cfg.CUSTOM_ELEMENT_HANDLING && isRegexOrFunction(cfg.CUSTOM_ELEMENT_HANDLING.tagNameCheck)) {
        CUSTOM_ELEMENT_HANDLING.tagNameCheck = cfg.CUSTOM_ELEMENT_HANDLING.tagNameCheck;
      }

      if (cfg.CUSTOM_ELEMENT_HANDLING && isRegexOrFunction(cfg.CUSTOM_ELEMENT_HANDLING.attributeNameCheck)) {
        CUSTOM_ELEMENT_HANDLING.attributeNameCheck = cfg.CUSTOM_ELEMENT_HANDLING.attributeNameCheck;
      }

      if (cfg.CUSTOM_ELEMENT_HANDLING && typeof cfg.CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements === 'boolean') {
        CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements = cfg.CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements;
      }

      if (SAFE_FOR_TEMPLATES) {
        ALLOW_DATA_ATTR = false;
      }

      if (RETURN_DOM_FRAGMENT) {
        RETURN_DOM = true;
      }
      /* Parse profile info */


      if (USE_PROFILES) {
        ALLOWED_TAGS = addToSet({}, [...text]);
        ALLOWED_ATTR = [];

        if (USE_PROFILES.html === true) {
          addToSet(ALLOWED_TAGS, html$1);
          addToSet(ALLOWED_ATTR, html);
        }

        if (USE_PROFILES.svg === true) {
          addToSet(ALLOWED_TAGS, svg$1);
          addToSet(ALLOWED_ATTR, svg);
          addToSet(ALLOWED_ATTR, xml);
        }

        if (USE_PROFILES.svgFilters === true) {
          addToSet(ALLOWED_TAGS, svgFilters);
          addToSet(ALLOWED_ATTR, svg);
          addToSet(ALLOWED_ATTR, xml);
        }

        if (USE_PROFILES.mathMl === true) {
          addToSet(ALLOWED_TAGS, mathMl$1);
          addToSet(ALLOWED_ATTR, mathMl);
          addToSet(ALLOWED_ATTR, xml);
        }
      }
      /* Merge configuration parameters */


      if (cfg.ADD_TAGS) {
        if (ALLOWED_TAGS === DEFAULT_ALLOWED_TAGS) {
          ALLOWED_TAGS = clone(ALLOWED_TAGS);
        }

        addToSet(ALLOWED_TAGS, cfg.ADD_TAGS, transformCaseFunc);
      }

      if (cfg.ADD_ATTR) {
        if (ALLOWED_ATTR === DEFAULT_ALLOWED_ATTR) {
          ALLOWED_ATTR = clone(ALLOWED_ATTR);
        }

        addToSet(ALLOWED_ATTR, cfg.ADD_ATTR, transformCaseFunc);
      }

      if (cfg.ADD_URI_SAFE_ATTR) {
        addToSet(URI_SAFE_ATTRIBUTES, cfg.ADD_URI_SAFE_ATTR, transformCaseFunc);
      }

      if (cfg.FORBID_CONTENTS) {
        if (FORBID_CONTENTS === DEFAULT_FORBID_CONTENTS) {
          FORBID_CONTENTS = clone(FORBID_CONTENTS);
        }

        addToSet(FORBID_CONTENTS, cfg.FORBID_CONTENTS, transformCaseFunc);
      }
      /* Add #text in case KEEP_CONTENT is set to true */


      if (KEEP_CONTENT) {
        ALLOWED_TAGS['#text'] = true;
      }
      /* Add html, head and body to ALLOWED_TAGS in case WHOLE_DOCUMENT is true */


      if (WHOLE_DOCUMENT) {
        addToSet(ALLOWED_TAGS, ['html', 'head', 'body']);
      }
      /* Add tbody to ALLOWED_TAGS in case tables are permitted, see #286, #365 */


      if (ALLOWED_TAGS.table) {
        addToSet(ALLOWED_TAGS, ['tbody']);
        delete FORBID_TAGS.tbody;
      } // Prevent further manipulation of configuration.
      // Not available in IE8, Safari 5, etc.


      if (freeze) {
        freeze(cfg);
      }

      CONFIG = cfg;
    };

    const MATHML_TEXT_INTEGRATION_POINTS = addToSet({}, ['mi', 'mo', 'mn', 'ms', 'mtext']);
    const HTML_INTEGRATION_POINTS = addToSet({}, ['foreignobject', 'desc', 'title', 'annotation-xml']); // Certain elements are allowed in both SVG and HTML
    // namespace. We need to specify them explicitly
    // so that they don't get erroneously deleted from
    // HTML namespace.

    const COMMON_SVG_AND_HTML_ELEMENTS = addToSet({}, ['title', 'style', 'font', 'a', 'script']);
    /* Keep track of all possible SVG and MathML tags
     * so that we can perform the namespace checks
     * correctly. */

    const ALL_SVG_TAGS = addToSet({}, svg$1);
    addToSet(ALL_SVG_TAGS, svgFilters);
    addToSet(ALL_SVG_TAGS, svgDisallowed);
    const ALL_MATHML_TAGS = addToSet({}, mathMl$1);
    addToSet(ALL_MATHML_TAGS, mathMlDisallowed);
    /**
     *
     *
     * @param  {Element} element a DOM element whose namespace is being checked
     * @returns {boolean} Return false if the element has a
     *  namespace that a spec-compliant parser would never
     *  return. Return true otherwise.
     */

    const _checkValidNamespace = function _checkValidNamespace(element) {
      let parent = getParentNode(element); // In JSDOM, if we're inside shadow DOM, then parentNode
      // can be null. We just simulate parent in this case.

      if (!parent || !parent.tagName) {
        parent = {
          namespaceURI: NAMESPACE,
          tagName: 'template'
        };
      }

      const tagName = stringToLowerCase(element.tagName);
      const parentTagName = stringToLowerCase(parent.tagName);

      if (!ALLOWED_NAMESPACES[element.namespaceURI]) {
        return false;
      }

      if (element.namespaceURI === SVG_NAMESPACE) {
        // The only way to switch from HTML namespace to SVG
        // is via <svg>. If it happens via any other tag, then
        // it should be killed.
        if (parent.namespaceURI === HTML_NAMESPACE) {
          return tagName === 'svg';
        } // The only way to switch from MathML to SVG is via`
        // svg if parent is either <annotation-xml> or MathML
        // text integration points.


        if (parent.namespaceURI === MATHML_NAMESPACE) {
          return tagName === 'svg' && (parentTagName === 'annotation-xml' || MATHML_TEXT_INTEGRATION_POINTS[parentTagName]);
        } // We only allow elements that are defined in SVG
        // spec. All others are disallowed in SVG namespace.


        return Boolean(ALL_SVG_TAGS[tagName]);
      }

      if (element.namespaceURI === MATHML_NAMESPACE) {
        // The only way to switch from HTML namespace to MathML
        // is via <math>. If it happens via any other tag, then
        // it should be killed.
        if (parent.namespaceURI === HTML_NAMESPACE) {
          return tagName === 'math';
        } // The only way to switch from SVG to MathML is via
        // <math> and HTML integration points


        if (parent.namespaceURI === SVG_NAMESPACE) {
          return tagName === 'math' && HTML_INTEGRATION_POINTS[parentTagName];
        } // We only allow elements that are defined in MathML
        // spec. All others are disallowed in MathML namespace.


        return Boolean(ALL_MATHML_TAGS[tagName]);
      }

      if (element.namespaceURI === HTML_NAMESPACE) {
        // The only way to switch from SVG to HTML is via
        // HTML integration points, and from MathML to HTML
        // is via MathML text integration points
        if (parent.namespaceURI === SVG_NAMESPACE && !HTML_INTEGRATION_POINTS[parentTagName]) {
          return false;
        }

        if (parent.namespaceURI === MATHML_NAMESPACE && !MATHML_TEXT_INTEGRATION_POINTS[parentTagName]) {
          return false;
        } // We disallow tags that are specific for MathML
        // or SVG and should never appear in HTML namespace


        return !ALL_MATHML_TAGS[tagName] && (COMMON_SVG_AND_HTML_ELEMENTS[tagName] || !ALL_SVG_TAGS[tagName]);
      } // For XHTML and XML documents that support custom namespaces


      if (PARSER_MEDIA_TYPE === 'application/xhtml+xml' && ALLOWED_NAMESPACES[element.namespaceURI]) {
        return true;
      } // The code should never reach this place (this means
      // that the element somehow got namespace that is not
      // HTML, SVG, MathML or allowed via ALLOWED_NAMESPACES).
      // Return false just in case.


      return false;
    };
    /**
     * _forceRemove
     *
     * @param  {Node} node a DOM node
     */


    const _forceRemove = function _forceRemove(node) {
      arrayPush(DOMPurify.removed, {
        element: node
      });

      try {
        // eslint-disable-next-line unicorn/prefer-dom-node-remove
        node.parentNode.removeChild(node);
      } catch (_) {
        node.remove();
      }
    };
    /**
     * _removeAttribute
     *
     * @param  {String} name an Attribute name
     * @param  {Node} node a DOM node
     */


    const _removeAttribute = function _removeAttribute(name, node) {
      try {
        arrayPush(DOMPurify.removed, {
          attribute: node.getAttributeNode(name),
          from: node
        });
      } catch (_) {
        arrayPush(DOMPurify.removed, {
          attribute: null,
          from: node
        });
      }

      node.removeAttribute(name); // We void attribute values for unremovable "is"" attributes

      if (name === 'is' && !ALLOWED_ATTR[name]) {
        if (RETURN_DOM || RETURN_DOM_FRAGMENT) {
          try {
            _forceRemove(node);
          } catch (_) {}
        } else {
          try {
            node.setAttribute(name, '');
          } catch (_) {}
        }
      }
    };
    /**
     * _initDocument
     *
     * @param  {String} dirty a string of dirty markup
     * @return {Document} a DOM, filled with the dirty markup
     */


    const _initDocument = function _initDocument(dirty) {
      /* Create a HTML document */
      let doc;
      let leadingWhitespace;

      if (FORCE_BODY) {
        dirty = '<remove></remove>' + dirty;
      } else {
        /* If FORCE_BODY isn't used, leading whitespace needs to be preserved manually */
        const matches = stringMatch(dirty, /^[\r\n\t ]+/);
        leadingWhitespace = matches && matches[0];
      }

      if (PARSER_MEDIA_TYPE === 'application/xhtml+xml' && NAMESPACE === HTML_NAMESPACE) {
        // Root of XHTML doc must contain xmlns declaration (see https://www.w3.org/TR/xhtml1/normative.html#strict)
        dirty = '<html xmlns="http://www.w3.org/1999/xhtml"><head></head><body>' + dirty + '</body></html>';
      }

      const dirtyPayload = trustedTypesPolicy ? trustedTypesPolicy.createHTML(dirty) : dirty;
      /*
       * Use the DOMParser API by default, fallback later if needs be
       * DOMParser not work for svg when has multiple root element.
       */

      if (NAMESPACE === HTML_NAMESPACE) {
        try {
          doc = new DOMParser().parseFromString(dirtyPayload, PARSER_MEDIA_TYPE);
        } catch (_) {}
      }
      /* Use createHTMLDocument in case DOMParser is not available */


      if (!doc || !doc.documentElement) {
        doc = implementation.createDocument(NAMESPACE, 'template', null);

        try {
          doc.documentElement.innerHTML = IS_EMPTY_INPUT ? emptyHTML : dirtyPayload;
        } catch (_) {// Syntax error if dirtyPayload is invalid xml
        }
      }

      const body = doc.body || doc.documentElement;

      if (dirty && leadingWhitespace) {
        body.insertBefore(document.createTextNode(leadingWhitespace), body.childNodes[0] || null);
      }
      /* Work on whole document or just its body */


      if (NAMESPACE === HTML_NAMESPACE) {
        return getElementsByTagName.call(doc, WHOLE_DOCUMENT ? 'html' : 'body')[0];
      }

      return WHOLE_DOCUMENT ? doc.documentElement : body;
    };
    /**
     * _createIterator
     *
     * @param  {Document} root document/fragment to create iterator for
     * @return {Iterator} iterator instance
     */


    const _createIterator = function _createIterator(root) {
      return createNodeIterator.call(root.ownerDocument || root, root, // eslint-disable-next-line no-bitwise
      NodeFilter.SHOW_ELEMENT | NodeFilter.SHOW_COMMENT | NodeFilter.SHOW_TEXT, null, false);
    };
    /**
     * _isClobbered
     *
     * @param  {Node} elm element to check for clobbering attacks
     * @return {Boolean} true if clobbered, false if safe
     */


    const _isClobbered = function _isClobbered(elm) {
      return elm instanceof HTMLFormElement && (typeof elm.nodeName !== 'string' || typeof elm.textContent !== 'string' || typeof elm.removeChild !== 'function' || !(elm.attributes instanceof NamedNodeMap) || typeof elm.removeAttribute !== 'function' || typeof elm.setAttribute !== 'function' || typeof elm.namespaceURI !== 'string' || typeof elm.insertBefore !== 'function' || typeof elm.hasChildNodes !== 'function');
    };
    /**
     * _isNode
     *
     * @param  {Node} obj object to check whether it's a DOM node
     * @return {Boolean} true is object is a DOM node
     */


    const _isNode = function _isNode(object) {
      return typeof Node === 'object' ? object instanceof Node : object && typeof object === 'object' && typeof object.nodeType === 'number' && typeof object.nodeName === 'string';
    };
    /**
     * _executeHook
     * Execute user configurable hooks
     *
     * @param  {String} entryPoint  Name of the hook's entry point
     * @param  {Node} currentNode node to work on with the hook
     * @param  {Object} data additional hook parameters
     */


    const _executeHook = function _executeHook(entryPoint, currentNode, data) {
      if (!hooks[entryPoint]) {
        return;
      }

      arrayForEach(hooks[entryPoint], hook => {
        hook.call(DOMPurify, currentNode, data, CONFIG);
      });
    };
    /**
     * _sanitizeElements
     *
     * @protect nodeName
     * @protect textContent
     * @protect removeChild
     *
     * @param   {Node} currentNode to check for permission to exist
     * @return  {Boolean} true if node was killed, false if left alive
     */


    const _sanitizeElements = function _sanitizeElements(currentNode) {
      let content;
      /* Execute a hook if present */

      _executeHook('beforeSanitizeElements', currentNode, null);
      /* Check if element is clobbered or can clobber */


      if (_isClobbered(currentNode)) {
        _forceRemove(currentNode);

        return true;
      }
      /* Now let's check the element's type and name */


      const tagName = transformCaseFunc(currentNode.nodeName);
      /* Execute a hook if present */

      _executeHook('uponSanitizeElement', currentNode, {
        tagName,
        allowedTags: ALLOWED_TAGS
      });
      /* Detect mXSS attempts abusing namespace confusion */


      if (currentNode.hasChildNodes() && !_isNode(currentNode.firstElementChild) && (!_isNode(currentNode.content) || !_isNode(currentNode.content.firstElementChild)) && regExpTest(/<[/\w]/g, currentNode.innerHTML) && regExpTest(/<[/\w]/g, currentNode.textContent)) {
        _forceRemove(currentNode);

        return true;
      }
      /* Remove element if anything forbids its presence */


      if (!ALLOWED_TAGS[tagName] || FORBID_TAGS[tagName]) {
        /* Check if we have a custom element to handle */
        if (!FORBID_TAGS[tagName] && _basicCustomElementTest(tagName)) {
          if (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.tagNameCheck, tagName)) return false;
          if (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.tagNameCheck(tagName)) return false;
        }
        /* Keep content except for bad-listed elements */


        if (KEEP_CONTENT && !FORBID_CONTENTS[tagName]) {
          const parentNode = getParentNode(currentNode) || currentNode.parentNode;
          const childNodes = getChildNodes(currentNode) || currentNode.childNodes;

          if (childNodes && parentNode) {
            const childCount = childNodes.length;

            for (let i = childCount - 1; i >= 0; --i) {
              parentNode.insertBefore(cloneNode(childNodes[i], true), getNextSibling(currentNode));
            }
          }
        }

        _forceRemove(currentNode);

        return true;
      }
      /* Check whether element has a valid namespace */


      if (currentNode instanceof Element && !_checkValidNamespace(currentNode)) {
        _forceRemove(currentNode);

        return true;
      }
      /* Make sure that older browsers don't get noscript mXSS */


      if ((tagName === 'noscript' || tagName === 'noembed') && regExpTest(/<\/no(script|embed)/i, currentNode.innerHTML)) {
        _forceRemove(currentNode);

        return true;
      }
      /* Sanitize element content to be template-safe */


      if (SAFE_FOR_TEMPLATES && currentNode.nodeType === 3) {
        /* Get the element's text content */
        content = currentNode.textContent;
        content = stringReplace(content, MUSTACHE_EXPR, ' ');
        content = stringReplace(content, ERB_EXPR, ' ');
        content = stringReplace(content, TMPLIT_EXPR, ' ');

        if (currentNode.textContent !== content) {
          arrayPush(DOMPurify.removed, {
            element: currentNode.cloneNode()
          });
          currentNode.textContent = content;
        }
      }
      /* Execute a hook if present */


      _executeHook('afterSanitizeElements', currentNode, null);

      return false;
    };
    /**
     * _isValidAttribute
     *
     * @param  {string} lcTag Lowercase tag name of containing element.
     * @param  {string} lcName Lowercase attribute name.
     * @param  {string} value Attribute value.
     * @return {Boolean} Returns true if `value` is valid, otherwise false.
     */
    // eslint-disable-next-line complexity


    const _isValidAttribute = function _isValidAttribute(lcTag, lcName, value) {
      /* Make sure attribute cannot clobber */
      if (SANITIZE_DOM && (lcName === 'id' || lcName === 'name') && (value in document || value in formElement)) {
        return false;
      }
      /* Allow valid data-* attributes: At least one character after "-"
          (https://html.spec.whatwg.org/multipage/dom.html#embedding-custom-non-visible-data-with-the-data-*-attributes)
          XML-compatible (https://html.spec.whatwg.org/multipage/infrastructure.html#xml-compatible and http://www.w3.org/TR/xml/#d0e804)
          We don't need to check the value; it's always URI safe. */


      if (ALLOW_DATA_ATTR && !FORBID_ATTR[lcName] && regExpTest(DATA_ATTR, lcName)) ; else if (ALLOW_ARIA_ATTR && regExpTest(ARIA_ATTR, lcName)) ; else if (!ALLOWED_ATTR[lcName] || FORBID_ATTR[lcName]) {
        if ( // First condition does a very basic check if a) it's basically a valid custom element tagname AND
        // b) if the tagName passes whatever the user has configured for CUSTOM_ELEMENT_HANDLING.tagNameCheck
        // and c) if the attribute name passes whatever the user has configured for CUSTOM_ELEMENT_HANDLING.attributeNameCheck
        _basicCustomElementTest(lcTag) && (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.tagNameCheck, lcTag) || CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.tagNameCheck(lcTag)) && (CUSTOM_ELEMENT_HANDLING.attributeNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.attributeNameCheck, lcName) || CUSTOM_ELEMENT_HANDLING.attributeNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.attributeNameCheck(lcName)) || // Alternative, second condition checks if it's an `is`-attribute, AND
        // the value passes whatever the user has configured for CUSTOM_ELEMENT_HANDLING.tagNameCheck
        lcName === 'is' && CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements && (CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof RegExp && regExpTest(CUSTOM_ELEMENT_HANDLING.tagNameCheck, value) || CUSTOM_ELEMENT_HANDLING.tagNameCheck instanceof Function && CUSTOM_ELEMENT_HANDLING.tagNameCheck(value))) ; else {
          return false;
        }
        /* Check value is safe. First, is attr inert? If so, is safe */

      } else if (URI_SAFE_ATTRIBUTES[lcName]) ; else if (regExpTest(IS_ALLOWED_URI$1, stringReplace(value, ATTR_WHITESPACE, ''))) ; else if ((lcName === 'src' || lcName === 'xlink:href' || lcName === 'href') && lcTag !== 'script' && stringIndexOf(value, 'data:') === 0 && DATA_URI_TAGS[lcTag]) ; else if (ALLOW_UNKNOWN_PROTOCOLS && !regExpTest(IS_SCRIPT_OR_DATA, stringReplace(value, ATTR_WHITESPACE, ''))) ; else if (!value) ; else {
        return false;
      }

      return true;
    };
    /**
     * _basicCustomElementCheck
     * checks if at least one dash is included in tagName, and it's not the first char
     * for more sophisticated checking see https://github.com/sindresorhus/validate-element-name
     * @param {string} tagName name of the tag of the node to sanitize
     */


    const _basicCustomElementTest = function _basicCustomElementTest(tagName) {
      return tagName.indexOf('-') > 0;
    };
    /**
     * _sanitizeAttributes
     *
     * @protect attributes
     * @protect nodeName
     * @protect removeAttribute
     * @protect setAttribute
     *
     * @param  {Node} currentNode to sanitize
     */


    const _sanitizeAttributes = function _sanitizeAttributes(currentNode) {
      let attr;
      let value;
      let lcName;
      let l;
      /* Execute a hook if present */

      _executeHook('beforeSanitizeAttributes', currentNode, null);

      const {
        attributes
      } = currentNode;
      /* Check if we have attributes; if not we might have a text node */

      if (!attributes) {
        return;
      }

      const hookEvent = {
        attrName: '',
        attrValue: '',
        keepAttr: true,
        allowedAttributes: ALLOWED_ATTR
      };
      l = attributes.length;
      /* Go backwards over all attributes; safely remove bad ones */

      while (l--) {
        attr = attributes[l];
        const {
          name,
          namespaceURI
        } = attr;
        value = name === 'value' ? attr.value : stringTrim(attr.value);
        lcName = transformCaseFunc(name);
        /* Execute a hook if present */

        hookEvent.attrName = lcName;
        hookEvent.attrValue = value;
        hookEvent.keepAttr = true;
        hookEvent.forceKeepAttr = undefined; // Allows developers to see this is a property they can set

        _executeHook('uponSanitizeAttribute', currentNode, hookEvent);

        value = hookEvent.attrValue;
        /* Did the hooks approve of the attribute? */

        if (hookEvent.forceKeepAttr) {
          continue;
        }
        /* Remove attribute */


        _removeAttribute(name, currentNode);
        /* Did the hooks approve of the attribute? */


        if (!hookEvent.keepAttr) {
          continue;
        }
        /* Work around a security issue in jQuery 3.0 */


        if (!ALLOW_SELF_CLOSE_IN_ATTR && regExpTest(/\/>/i, value)) {
          _removeAttribute(name, currentNode);

          continue;
        }
        /* Sanitize attribute content to be template-safe */


        if (SAFE_FOR_TEMPLATES) {
          value = stringReplace(value, MUSTACHE_EXPR, ' ');
          value = stringReplace(value, ERB_EXPR, ' ');
          value = stringReplace(value, TMPLIT_EXPR, ' ');
        }
        /* Is `value` valid for this attribute? */


        const lcTag = transformCaseFunc(currentNode.nodeName);

        if (!_isValidAttribute(lcTag, lcName, value)) {
          continue;
        }
        /* Full DOM Clobbering protection via namespace isolation,
         * Prefix id and name attributes with `user-content-`
         */


        if (SANITIZE_NAMED_PROPS && (lcName === 'id' || lcName === 'name')) {
          // Remove the attribute with this value
          _removeAttribute(name, currentNode); // Prefix the value and later re-create the attribute with the sanitized value


          value = SANITIZE_NAMED_PROPS_PREFIX + value;
        }
        /* Handle attributes that require Trusted Types */


        if (trustedTypesPolicy && typeof trustedTypes === 'object' && typeof trustedTypes.getAttributeType === 'function') {
          if (namespaceURI) ; else {
            switch (trustedTypes.getAttributeType(lcTag, lcName)) {
              case 'TrustedHTML':
                value = trustedTypesPolicy.createHTML(value);
                break;

              case 'TrustedScriptURL':
                value = trustedTypesPolicy.createScriptURL(value);
                break;
            }
          }
        }
        /* Handle invalid data-* attribute set by try-catching it */


        try {
          if (namespaceURI) {
            currentNode.setAttributeNS(namespaceURI, name, value);
          } else {
            /* Fallback to setAttribute() for browser-unrecognized namespaces e.g. "x-schema". */
            currentNode.setAttribute(name, value);
          }

          arrayPop(DOMPurify.removed);
        } catch (_) {}
      }
      /* Execute a hook if present */


      _executeHook('afterSanitizeAttributes', currentNode, null);
    };
    /**
     * _sanitizeShadowDOM
     *
     * @param  {DocumentFragment} fragment to iterate over recursively
     */


    const _sanitizeShadowDOM = function _sanitizeShadowDOM(fragment) {
      let shadowNode;

      const shadowIterator = _createIterator(fragment);
      /* Execute a hook if present */


      _executeHook('beforeSanitizeShadowDOM', fragment, null);

      while (shadowNode = shadowIterator.nextNode()) {
        /* Execute a hook if present */
        _executeHook('uponSanitizeShadowNode', shadowNode, null);
        /* Sanitize tags and elements */


        if (_sanitizeElements(shadowNode)) {
          continue;
        }
        /* Deep shadow DOM detected */


        if (shadowNode.content instanceof DocumentFragment) {
          _sanitizeShadowDOM(shadowNode.content);
        }
        /* Check attributes, sanitize if necessary */


        _sanitizeAttributes(shadowNode);
      }
      /* Execute a hook if present */


      _executeHook('afterSanitizeShadowDOM', fragment, null);
    };
    /**
     * Sanitize
     * Public method providing core sanitation functionality
     *
     * @param {String|Node} dirty string or DOM node
     * @param {Object} configuration object
     */
    // eslint-disable-next-line complexity


    DOMPurify.sanitize = function (dirty) {
      let cfg = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
      let body;
      let importedNode;
      let currentNode;
      let returnNode;
      /* Make sure we have a string to sanitize.
        DO NOT return early, as this will return the wrong type if
        the user has requested a DOM object rather than a string */

      IS_EMPTY_INPUT = !dirty;

      if (IS_EMPTY_INPUT) {
        dirty = '<!-->';
      }
      /* Stringify, in case dirty is an object */


      if (typeof dirty !== 'string' && !_isNode(dirty)) {
        // eslint-disable-next-line no-negated-condition
        if (typeof dirty.toString !== 'function') {
          throw typeErrorCreate('toString is not a function');
        } else {
          dirty = dirty.toString();

          if (typeof dirty !== 'string') {
            throw typeErrorCreate('dirty is not a string, aborting');
          }
        }
      }
      /* Return dirty HTML if DOMPurify cannot run */


      if (!DOMPurify.isSupported) {
        return dirty;
      }
      /* Assign config vars */


      if (!SET_CONFIG) {
        _parseConfig(cfg);
      }
      /* Clean up removed elements */


      DOMPurify.removed = [];
      /* Check if dirty is correctly typed for IN_PLACE */

      if (typeof dirty === 'string') {
        IN_PLACE = false;
      }

      if (IN_PLACE) {
        /* Do some early pre-sanitization to avoid unsafe root nodes */
        if (dirty.nodeName) {
          const tagName = transformCaseFunc(dirty.nodeName);

          if (!ALLOWED_TAGS[tagName] || FORBID_TAGS[tagName]) {
            throw typeErrorCreate('root node is forbidden and cannot be sanitized in-place');
          }
        }
      } else if (dirty instanceof Node) {
        /* If dirty is a DOM element, append to an empty document to avoid
           elements being stripped by the parser */
        body = _initDocument('<!---->');
        importedNode = body.ownerDocument.importNode(dirty, true);

        if (importedNode.nodeType === 1 && importedNode.nodeName === 'BODY') {
          /* Node is already a body, use as is */
          body = importedNode;
        } else if (importedNode.nodeName === 'HTML') {
          body = importedNode;
        } else {
          // eslint-disable-next-line unicorn/prefer-dom-node-append
          body.appendChild(importedNode);
        }
      } else {
        /* Exit directly if we have nothing to do */
        if (!RETURN_DOM && !SAFE_FOR_TEMPLATES && !WHOLE_DOCUMENT && // eslint-disable-next-line unicorn/prefer-includes
        dirty.indexOf('<') === -1) {
          return trustedTypesPolicy && RETURN_TRUSTED_TYPE ? trustedTypesPolicy.createHTML(dirty) : dirty;
        }
        /* Initialize the document to work on */


        body = _initDocument(dirty);
        /* Check we have a DOM node from the data */

        if (!body) {
          return RETURN_DOM ? null : RETURN_TRUSTED_TYPE ? emptyHTML : '';
        }
      }
      /* Remove first element node (ours) if FORCE_BODY is set */


      if (body && FORCE_BODY) {
        _forceRemove(body.firstChild);
      }
      /* Get node iterator */


      const nodeIterator = _createIterator(IN_PLACE ? dirty : body);
      /* Now start iterating over the created document */


      while (currentNode = nodeIterator.nextNode()) {
        /* Sanitize tags and elements */
        if (_sanitizeElements(currentNode)) {
          continue;
        }
        /* Shadow DOM detected, sanitize it */


        if (currentNode.content instanceof DocumentFragment) {
          _sanitizeShadowDOM(currentNode.content);
        }
        /* Check attributes, sanitize if necessary */


        _sanitizeAttributes(currentNode);
      }
      /* If we sanitized `dirty` in-place, return it. */


      if (IN_PLACE) {
        return dirty;
      }
      /* Return sanitized string or DOM */


      if (RETURN_DOM) {
        if (RETURN_DOM_FRAGMENT) {
          returnNode = createDocumentFragment.call(body.ownerDocument);

          while (body.firstChild) {
            // eslint-disable-next-line unicorn/prefer-dom-node-append
            returnNode.appendChild(body.firstChild);
          }
        } else {
          returnNode = body;
        }

        if (ALLOWED_ATTR.shadowroot || ALLOWED_ATTR.shadowrootmod) {
          /*
            AdoptNode() is not used because internal state is not reset
            (e.g. the past names map of a HTMLFormElement), this is safe
            in theory but we would rather not risk another attack vector.
            The state that is cloned by importNode() is explicitly defined
            by the specs.
          */
          returnNode = importNode.call(originalDocument, returnNode, true);
        }

        return returnNode;
      }

      let serializedHTML = WHOLE_DOCUMENT ? body.outerHTML : body.innerHTML;
      /* Serialize doctype if allowed */

      if (WHOLE_DOCUMENT && ALLOWED_TAGS['!doctype'] && body.ownerDocument && body.ownerDocument.doctype && body.ownerDocument.doctype.name && regExpTest(DOCTYPE_NAME, body.ownerDocument.doctype.name)) {
        serializedHTML = '<!DOCTYPE ' + body.ownerDocument.doctype.name + '>\n' + serializedHTML;
      }
      /* Sanitize final string template-safe */


      if (SAFE_FOR_TEMPLATES) {
        serializedHTML = stringReplace(serializedHTML, MUSTACHE_EXPR, ' ');
        serializedHTML = stringReplace(serializedHTML, ERB_EXPR, ' ');
        serializedHTML = stringReplace(serializedHTML, TMPLIT_EXPR, ' ');
      }

      return trustedTypesPolicy && RETURN_TRUSTED_TYPE ? trustedTypesPolicy.createHTML(serializedHTML) : serializedHTML;
    };
    /**
     * Public method to set the configuration once
     * setConfig
     *
     * @param {Object} cfg configuration object
     */


    DOMPurify.setConfig = function (cfg) {
      _parseConfig(cfg);

      SET_CONFIG = true;
    };
    /**
     * Public method to remove the configuration
     * clearConfig
     *
     */


    DOMPurify.clearConfig = function () {
      CONFIG = null;
      SET_CONFIG = false;
    };
    /**
     * Public method to check if an attribute value is valid.
     * Uses last set config, if any. Otherwise, uses config defaults.
     * isValidAttribute
     *
     * @param  {string} tag Tag name of containing element.
     * @param  {string} attr Attribute name.
     * @param  {string} value Attribute value.
     * @return {Boolean} Returns true if `value` is valid. Otherwise, returns false.
     */


    DOMPurify.isValidAttribute = function (tag, attr, value) {
      /* Initialize shared config vars if necessary. */
      if (!CONFIG) {
        _parseConfig({});
      }

      const lcTag = transformCaseFunc(tag);
      const lcName = transformCaseFunc(attr);
      return _isValidAttribute(lcTag, lcName, value);
    };
    /**
     * AddHook
     * Public method to add DOMPurify hooks
     *
     * @param {String} entryPoint entry point for the hook to add
     * @param {Function} hookFunction function to execute
     */


    DOMPurify.addHook = function (entryPoint, hookFunction) {
      if (typeof hookFunction !== 'function') {
        return;
      }

      hooks[entryPoint] = hooks[entryPoint] || [];
      arrayPush(hooks[entryPoint], hookFunction);
    };
    /**
     * RemoveHook
     * Public method to remove a DOMPurify hook at a given entryPoint
     * (pops it from the stack of hooks if more are present)
     *
     * @param {String} entryPoint entry point for the hook to remove
     * @return {Function} removed(popped) hook
     */


    DOMPurify.removeHook = function (entryPoint) {
      if (hooks[entryPoint]) {
        return arrayPop(hooks[entryPoint]);
      }
    };
    /**
     * RemoveHooks
     * Public method to remove all DOMPurify hooks at a given entryPoint
     *
     * @param  {String} entryPoint entry point for the hooks to remove
     */


    DOMPurify.removeHooks = function (entryPoint) {
      if (hooks[entryPoint]) {
        hooks[entryPoint] = [];
      }
    };
    /**
     * RemoveAllHooks
     * Public method to remove all DOMPurify hooks
     *
     */


    DOMPurify.removeAllHooks = function () {
      hooks = {};
    };

    return DOMPurify;
  }

  var purify = createDOMPurify();

  return purify;

}));
//# sourceMappingURL=purify.js.map


/***/ }),

/***/ "./src/sidebar.js":
/*!************************!*\
  !*** ./src/sidebar.js ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Sidebar)
/* harmony export */ });
/* harmony import */ var _attributes__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./attributes */ "./src/attributes.js");
/* harmony import */ var _functions__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./functions */ "./src/functions.js");



class Sidebar {
    constructor() {
        (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('.vi-ui.menu .item').vi_tab();
        this.revision = {};
        this.sidebar = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('#vi-wpbulky-sidebar');
        this.historyBodyTable = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('#vi-wpbulky-history-points-list tbody');

        this.sidebar.on('click', '.vi-wpbulky-apply-filter', this.applyFilter.bind(this));
        this.sidebar.on('click', '.vi-wpbulky-filter-label', this.filterInputLabelFocus);
        this.sidebar.on('focus', '.vi-wpbulky-filter-input', this.filterInputFocus);
        this.sidebar.on('blur', '.vi-wpbulky-filter-input', this.filterInputBlur);
        this.sidebar.on('click', '.vi-wpbulky-get-meta-fields', this.getMetaFields.bind(this));
        this.sidebar.on('click', '.vi-wpbulky-save-meta-fields', this.saveMetaFields.bind(this));
        this.sidebar.on('click', '.vi-wpbulky-add-new-meta-field', this.addNewMetaField.bind(this));
        this.sidebar.find('table.vi-wpbulky-meta-fields-container tbody').sortable({axis: 'y',});
        this.sidebar.find('table.vi-wpbulky-meta-fields-container').on('click', '.vi-wpbulky-remove-meta-row', this.removeMetaRow);

        this.sidebar.on('click', '.vi-wpbulky-save-settings', this.saveSettings.bind(this));

        this.sidebar.on('click', '.vi-wpbulky-view-history-point', this.viewHistoryPoint.bind(this));
        this.sidebar.on('click', '.vi-wpbulky-recover', this.recover.bind(this));
        this.sidebar.on('click', '.vi-wpbulky-revert-this-point', this.revertAllPosts.bind(this));
        this.sidebar.on('click', '.vi-wpbulky-revert-this-key', this.revertPostAttribute.bind(this));
        this.sidebar.on('click', '.vi-wpbulky-pagination a.item', this.changePage.bind(this));
        this.sidebar.on('change', '.vi-wpbulky-go-to-page', this.changePageByInput.bind(this));
        this.sidebar.on('click', '.vi-wpbulky-multi-select-clear', this.clearMultiSelect);

        // this.sidebar.on('click', '.accordion .title', this.revertSinglePost.bind(this));

        this.filter();
        this.settings();
        this.metafields();
        this.history();
    }
    textWrapMode(enable) {
        if (enable){
            (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('#vi-wpbulky-spreadsheet').addClass('vi-wpbulky-spreadsheet-wrap-mode');
        }else {
            (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('#vi-wpbulky-spreadsheet').removeClass('vi-wpbulky-spreadsheet-wrap-mode');
        }
    }
    filter() {
        let filterForm = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('#vi-wpbulky-posts-filter'),
            filterInput = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('.vi-wpbulky-filter-input'),
            cssTop = {top: -2},
            cssMiddle = {top: '50%'};

        filterInput.each((i, el) => {
            if ((0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(el).val()) (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(el).parent().prev().css(cssTop);
        });

        filterInput.on('focus', function () {
            let label = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(this).prev();
            label.css(cssTop);
            (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(this).on('blur', function () {
                if (!(0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(this).val()) label.css(cssMiddle);
            })
        });

        this.sidebar.on('click', '.vi-wpbulky-filter-label', function () {
            (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(this).next().trigger('focus');
        });

        let clearableFilter = filterForm.find('.vi-wpbulky.vi-ui.dropdown').dropdown({clearable: true}),
            compactFilter = filterForm.find('.vi-ui.compact.dropdown').dropdown();

        this.sidebar.on('click', '.vi-wpbulky-clear-filter', function () {
            (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('.vi-wpbulky-filter-label').css(cssMiddle);
            filterInput.val('');
            clearableFilter.dropdown('clear');
            compactFilter.find('.menu .item:first').trigger('click');
        });
    }

    settings() {
        let settingsForm = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('.vi-wpbulky-settings-tab');
        settingsForm.find('select.dropdown').dropdown();
    }

    metafields() {
        this.renderMetaFieldsTable(_attributes__WEBPACK_IMPORTED_MODULE_0__.Attributes.metaFields);
    }

    history() {
        this.pagination(1);
        // this.saveRevision();
    }

    pagination(currentPage, maxPage = _attributes__WEBPACK_IMPORTED_MODULE_0__.Attributes.historyPages) {
        this.sidebar.find('.vi-wpbulky-pagination').html(_functions__WEBPACK_IMPORTED_MODULE_1__["default"].pagination(maxPage, currentPage));
    }

    applyFilter(e) {
        let $this = this, thisBtn = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.target);

        if (thisBtn.hasClass('loading')) return;
        let action = wpbulkyParams.postType ==='comment' ? 'add_filter_comment_data' : 'add_filter_data';

        _functions__WEBPACK_IMPORTED_MODULE_1__["default"].ajax({
            data: {
                sub_action: action,
                filter_data: (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('#vi-wpbulky-posts-filter').serialize(),
                filter_key: _attributes__WEBPACK_IMPORTED_MODULE_0__.Attributes.filterKey
            },
            beforeSend() {
                thisBtn.addClass('loading');
            },
            success(res) {
                thisBtn.removeClass('loading');
                $this.sidebar.trigger('afterAddFilter', [res.data]);
                _functions__WEBPACK_IMPORTED_MODULE_1__["default"].showMessage( {title:"Success", message: 'Filtered successfully', type: "positive", duration: 3000} );
            }
        });
    }

    saveSettings(e) {
        let $this = this, thisBtn = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.target);

        if (thisBtn.hasClass('loading')) return;

        let action = wpbulkyParams.postType ==='comment' ? 'save_comment_settings' : 'save_settings';
        $this.textWrapMode($this.sidebar.find('input[name="wrap_mode"]').prop('checked'));
        _functions__WEBPACK_IMPORTED_MODULE_1__["default"].ajax({
            data: {
                sub_action: action,
                fields: (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('form.vi-wpbulky-settings-tab').serialize()
            },
            beforeSend() {
                thisBtn.addClass('loading')
            },
            success(res) {
                if (res.success) {
                    _attributes__WEBPACK_IMPORTED_MODULE_0__.Attributes.settings = res.data.settings;
                    clearInterval($this.autoSaveRevision);
                    // $this.saveRevision();
                    $this.sidebar.trigger('afterSaveSettings', [res.data]);
                }
                thisBtn.removeClass('loading')
            }
        });
    }

    filterInputLabelFocus() {
        (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(this).next().find('input').trigger('focus');
    }

    filterInputFocus() {
        (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(this).parent().prev().css({top: -2});
    }

    filterInputBlur() {
        if (!(0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(this).val()) (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(this).parent().prev().css({top: '50%'});
    }

    getMetaFields(e) {
        let $this = this, thisBtn = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.target);

        if (thisBtn.hasClass('loading')) return;

        _functions__WEBPACK_IMPORTED_MODULE_1__["default"].ajax({
            data: {sub_action: 'get_meta_fields', current_meta_fields: $this.getCurrentMetaFields()},
            beforeSend() {
                thisBtn.addClass('loading');
            },
            success(res) {
                $this.renderMetaFieldsTable(res.data);
                _attributes__WEBPACK_IMPORTED_MODULE_0__.Attributes.metaFields = res.data;
                thisBtn.removeClass('loading');
            }
        });
    }

    renderMetaFieldsTable(data) {
        let html = '';

        for (let metaKey in data) {
            html += this.renderRow(metaKey, data);
        }

        (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('.vi-wpbulky-meta-fields-container tbody').html(html);
    }

    renderRow(metaKey, data) {
        let meta = data[metaKey] || {},
            optionHtml = '',
            inputType = meta.input_type || '',
            options = {
                textinput: 'Text input',
                texteditor: 'Text editor',
                numberinput: 'Number input',
                array: 'Array',
                json: 'JSON',
                checkbox: 'Checkbox',
                calendar: 'Calendar',
                image: "Image (Save image's id)",
                imageurl: "Image (Save image's url)",
            };

        for (let optionValue in options) {
            optionHtml += `<option value="${optionValue}" ${optionValue === inputType ? 'selected' : ''}>${options[optionValue]}</option>`;
        }

        let metaValue = meta.meta_value || '',
            shortValue = metaValue.slice(0, 15),
            fullValueHtml = metaValue.length > 16 ? `<div class="vi-wpbulky-full-meta-value">${metaValue}</div>` : '';

        shortValue += shortValue.length < metaValue.length ? '...' : '';

        return `<tr>
                        <td class="vi-wpbulky-meta-key-col vi-wpbulky-meta-key">${metaKey}</td>
                        <td class="vi-wpbulky-column-name-col"><input type="text" class="vi-wpbulky-meta-column-name" value="${meta.column_name || ''}"></td>
                        <td class="vi-wpbulky-value-format-col">
                            <div class="vi-wpbulky-display-meta-value">
                                <div class="vi-wpbulky-short-meta-value">${shortValue}</div>
                                ${fullValueHtml}
                            </div>
                        </td>
                        <td class="vi-wpbulky-column-type-col">
                            <select class="vi-wpbulky-meta-column-type">${optionHtml}</select>
                        </td>
                         <td class="vi-wpbulky-column-multiple-col">
                            <input type="checkbox" class="vi-wpbulky-meta-column-multiple" ${parseInt(meta.multiple) ? 'checked' : ''}>
                        </td>
                        <td class="vi-wpbulky-active-col vi-wpbulky-meta-field-active-column">
                            <input type="checkbox" class="vi-wpbulky-meta-column-active" ${parseInt(meta.active) ? 'checked' : ''}>
                        </td>
                        <td class="vi-wpbulky-actions-col">
                            <div class="vi-wpbulky-meta-field-actions">
                                <span class="vi-ui button basic mini vi-wpbulky-remove-meta-row"><i class="icon trash"> </i></span>
                                <span class="vi-ui button basic mini"><i class="icon move"> </i></span>
                            </div>
                        </td>
                    </tr>`;
    }

    saveMetaFields(e) {
        let thisBtn = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.target);

        if (thisBtn.hasClass('loading')) return;

        _functions__WEBPACK_IMPORTED_MODULE_1__["default"].ajax({
            data: {sub_action: 'save_meta_fields', meta_fields: this.getCurrentMetaFields()},
            beforeSend() {
                thisBtn.addClass('loading');
            },
            success(res) {
                thisBtn.removeClass('loading');
                location.reload();
            },
            error(res) {
                console.log(res)
            }
        });
    }

    getCurrentMetaFields() {
        let meta_fields = {};
        let metaArr = _attributes__WEBPACK_IMPORTED_MODULE_0__.Attributes.metaFields;
        (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('table.vi-wpbulky-meta-fields-container tbody tr').each(function (i, row) {
            let metaKey = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(row).find('.vi-wpbulky-meta-key').text();
            meta_fields[metaKey] = {
                column_name: (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(row).find('.vi-wpbulky-meta-column-name').val(),
                input_type: (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(row).find('.vi-wpbulky-meta-column-type').val(),
                active: (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(row).find('.vi-wpbulky-meta-column-active:checked').length,
                meta_value: metaArr[metaKey] ? metaArr[metaKey].meta_value : '',
                multiple: (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(row).find('.vi-wpbulky-meta-column-multiple:checked').length,
            };
        });

        return meta_fields;
    }

    addNewMetaField(e) {
        let input = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.currentTarget).prev(),
            metaKey = input.val(),
            validate = metaKey.match(/^[\w\d_-]*$/g);

        if (!metaKey || !validate || _attributes__WEBPACK_IMPORTED_MODULE_0__.Attributes.metaFields[metaKey]) return;

        let newRow = this.renderRow(metaKey, {});
        if (newRow) {
            input.val('');
            (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('table.vi-wpbulky-meta-fields-container tbody').append(newRow);
        }
    }

    removeMetaRow() {
        (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(this).closest('tr').remove();
    }

    viewHistoryPoint(e) {
        let thisBtn = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.currentTarget),
            historyiD = thisBtn.data('id'),
            $this = this;

        if (thisBtn.hasClass('loading')) return;

        let action = wpbulkyParams.postType ==='comment' ? 'view_comment_history_point' : 'view_history_point';

        _functions__WEBPACK_IMPORTED_MODULE_1__["default"].ajax({
            data: {sub_action: action, id: historyiD},
            beforeSend() {
                thisBtn.addClass('loading');
            },
            complete() {
            },
            success(res) {
                thisBtn.removeClass('loading');

                if (res.success && res.data) {
                    let posts = res.data.compare;
                    let html = '';
                    for (let id in posts) {
                        let item = posts[id];
                        html += `<div class="vi-wpbulky-history-post" data-post_id="${id}">
                                        <div class="title">
                                            <i class="dropdown icon"></i>
                                            ${item.name}
                                            <span class="vi-ui button mini basic vi-wpbulky-revert-this-post">
                                                <i class="icon undo"> </i>
                                            </span>
                                            
                                        </div>`;

                        let table = '';
                        for (let key in item.fields) {
                            let currentVal = typeof item.current[key] === 'string' ? item.current[key] : JSON.stringify(item.current[key]);
                            let historyVal = typeof item.history[key] === 'string' ? item.history[key] : JSON.stringify(item.history[key]);
                            table += `<tr>
                                            <td>${item.fields[key]}</td>
                                            <td>${currentVal}</td>
                                            <td>${historyVal}</td>
                                            <td class="">
                                                <span class="vi-ui button basic mini vi-wpbulky-revert-this-key" data-post_id="${id}" data-post_key="${key}">
                                                    <i class="icon undo"> </i>
                                                </span>
                                            </td>
                                        </tr>`;
                        }

                        table = `<table id="vi-wpbulky-history-point-detail" class="vi-ui celled table">
                                    <thead>
                                    <tr>
                                        <th>Attribute</th>
                                        <th>Current value in database</th>
                                        <th>History</th>
                                        <th class="">Revert</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    ${table}
                                    </tbody>
                                </table>`;

                        html += `<div class="content">${table}</div></div>`
                    }

                    html = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(`<div class="vi-ui styled fluid accordion">${html}</div>`);

                    (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('.vi-wpbulky-history-review')
                        .html(html).attr('data-history_id', historyiD)
                        .prepend(`<h4>History point: ${res.data.date}</h4>`)
                        .append(`<div class="vi-ui button tiny vi-wpbulky-revert-this-point">
                                    ${_functions__WEBPACK_IMPORTED_MODULE_1__["default"].text('Revert all post in this point')}
                                </div>
                                <p> ${_functions__WEBPACK_IMPORTED_MODULE_1__["default"].text('The current value is the value of the post in database')}</p>`);

                    html.find('.title').on('click', (e) => $this.revertSinglePost(e));

                    html.vi_accordion();
                    html.find('.title:first').trigger('click');
                }
            }
        })
    }

    recover(e) {
        let thisBtn = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.currentTarget),
            historyID = thisBtn.data('id');

        if (thisBtn.hasClass('loading')) return;
        let action = wpbulkyParams.postType ==='comment' ? 'revert_history_all_comments' : 'revert_history_all_posts';
        _functions__WEBPACK_IMPORTED_MODULE_1__["default"].ajax({
            data: {sub_action: action, history_id: historyID},
            beforeSend() {
                thisBtn.addClass('loading')
            },
            complete() {
                thisBtn.removeClass('loading')
            },
            success(res) {
                console.log(res);
                _functions__WEBPACK_IMPORTED_MODULE_1__["default"].showMessage( {title:"Success", message: 'Reverted successfully', type: "positive", duration: 3000} );
            }
        });
    }

    revertSinglePost(e) {
        let thisBtn;
        if ((0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.target).hasClass('vi-wpbulky-revert-this-post')) thisBtn = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.target);
        if ((0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.target).parent().hasClass('vi-wpbulky-revert-this-post')) thisBtn = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.target).parent();

        if (thisBtn) {
            e.stopImmediatePropagation();

            let pid = thisBtn.closest('.vi-wpbulky-history-post').data('post_id'),
                historyID = thisBtn.closest('.vi-wpbulky-history-review').attr('data-history_id');

            if (thisBtn.hasClass('loading')) return;

            let action = wpbulkyParams.postType ==='comment' ? 'revert_history_single_comment' : 'revert_history_single_post';

            _functions__WEBPACK_IMPORTED_MODULE_1__["default"].ajax({
                data: {sub_action: action, history_id: historyID, pid: pid},
                beforeSend() {
                    thisBtn.addClass('loading')
                },
                complete() {
                    thisBtn.removeClass('loading')
                },
                success(res) {
                    console.log(res);
                    _functions__WEBPACK_IMPORTED_MODULE_1__["default"].showMessage( {title:"Success", message: 'Reverted successfully', type: "positive", duration: 3000} );
                }
            });
        }
    }

    revertAllPosts(e) {
        let thisBtn = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.target);
        let historyID = thisBtn.closest('.vi-wpbulky-history-review').data('history_id');

        if (thisBtn.hasClass('loading')) return;

        let action = wpbulkyParams.postType ==='comment' ? 'revert_history_all_comments' : 'revert_history_all_posts';

        _functions__WEBPACK_IMPORTED_MODULE_1__["default"].ajax({
            data: {sub_action: action, history_id: historyID},
            beforeSend() {
                thisBtn.addClass('loading')
            },
            complete() {
                thisBtn.removeClass('loading')
            },
            success(res) {
                console.log(res);
                _functions__WEBPACK_IMPORTED_MODULE_1__["default"].showMessage( {title:"Success", message: 'Reverted successfully', type: "positive", duration: 3000} );
            }
        });
    }

    revertPostAttribute(e) {
        let thisBtn = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.currentTarget),
            attribute = thisBtn.data('post_key'),
            pid = thisBtn.closest('.vi-wpbulky-history-post').data('post_id'),
            historyID = thisBtn.closest('.vi-wpbulky-history-review').data('history_id');

        if (thisBtn.hasClass('loading')) return;

        let action = wpbulkyParams.postType ==='comment' ? 'revert_history_comment_attribute' : 'revert_history_post_attribute';

        _functions__WEBPACK_IMPORTED_MODULE_1__["default"].ajax({
            data: {sub_action: action, attribute: attribute, history_id: historyID, pid: pid},
            beforeSend() {
                thisBtn.addClass('loading')
            },
            complete() {
                thisBtn.removeClass('loading')
            },
            success(res) {
                console.log(res);
                _functions__WEBPACK_IMPORTED_MODULE_1__["default"].showMessage( {title:"Success", message: 'Reverted Post Attribute successfully', type: "positive", duration: 3000} );
            }
        });
    }

    changePage(e) {
        let page = parseInt((0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.currentTarget).attr('data-page'));
        if ((0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.currentTarget).hasClass('active') || (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.currentTarget).hasClass('disabled') || !page) return;
        this.loadHistoryPage(page);
    }

    changePageByInput(e) {
        let page = parseInt((0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.target).val());
        let max = parseInt((0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.target).attr('max'));

        if (page <= max && page > 0) this.loadHistoryPage(page);
    }

    clearMultiSelect() {
        (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(this).parent().find('.vi-ui.dropdown').dropdown('clear');
    }

    loadHistoryPage(page) {
        let loading = _functions__WEBPACK_IMPORTED_MODULE_1__["default"].spinner(),
            $this = this;

        if (page) {
            _functions__WEBPACK_IMPORTED_MODULE_1__["default"].ajax({
                dataType: 'text',
                data: {sub_action: 'load_history_page', page: page},
                beforeSend() {
                    $this.sidebar.find('.vi-wpbulky-pagination').prepend(loading);
                },
                complete() {
                    loading.remove();
                },
                success(res) {
                    $this.pagination(page);
                    (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)('#vi-wpbulky-history-points-list tbody').html(res);
                }
            });
        }
    }

    saveRevision() {
        let autoSaveTime = parseInt(_attributes__WEBPACK_IMPORTED_MODULE_0__.Attributes.settings.auto_save_revision);

        if (autoSaveTime === 0) return;

        let $this = this;

        this.autoSaveRevision = setInterval(function () {
            if (Object.keys($this.revision).length) {
                let currentPage = $this.sidebar.find('.vi-wpbulky-pagination a.item.active').data('page') || 1;

                let action = wpbulkyParams.postType ==='comment' ? 'auto_save_revision_comment' : 'auto_save_revision';

                _functions__WEBPACK_IMPORTED_MODULE_1__["default"].ajax({
                    data: {sub_action: action, data: $this.revision, page: currentPage || 1},
                    success(res) {
                        if (res.success) {
                            if (res.data.pages) _attributes__WEBPACK_IMPORTED_MODULE_0__.Attributes.historyPages = res.data.pages;
                            if (res.data.updatePage) $this.historyBodyTable.html(res.data.updatePage);
                            $this.revision = {};
                            $this.pagination(currentPage);
                        }
                    }
                });
            }

        }, autoSaveTime * 1000)
    }
}


/***/ }),

/***/ "./src/templates.js":
/*!**************************!*\
  !*** ./src/templates.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
const Templates = {
    modal(data = {}) {
        let {header = '', content = '', actionsHtml = ''} = data;
        return `<div class="vi-wpbulky-modal-container">
                    <div class="vi-wpbulky-modal-main vi-ui form small">
                        <i class="close icon"></i>
                        <div class="vi-wpbulky-modal-wrapper">
                            <h3 class="header">${header}</h3>
                            <div class="content">${content}</div>
                            <div class="actions">${actionsHtml}</div>
                        </div>
                    </div>
                </div>`;
    },

    defaultAttributes(data = {}) {
        let {html} = data;
        return `<table class="vi-ui celled table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Attribute</th>
                    </tr>
                    </thead>
                    <tbody>
                    ${html}
                    </tbody>
                </table>`;
    },

};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Templates);

/***/ }),

/***/ "./src/text-multi-cells-edit.js":
/*!**************************************!*\
  !*** ./src/text-multi-cells-edit.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ TextMultiCellsEdit)
/* harmony export */ });
/* harmony import */ var _attributes__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./attributes */ "./src/attributes.js");
/* harmony import */ var _functions__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./functions */ "./src/functions.js");
/* harmony import */ var _modal_popup__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modal-popup */ "./src/modal-popup.js");




class TextMultiCellsEdit {
    constructor(obj, x, y, e) {
        this._data = {};
        this._data.jexcel = obj;
        this._data.x = parseInt(x);
        this._data.y = parseInt(y);
        this.run();
    }

    get(id) {
        return this._data[id] || '';
    }

    run() {
        let formulaHtml = this.content();
        let cell = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(`td[data-x=${this.get('x') || 0}][data-y=${this.get('y') || 0}]`);
        new _modal_popup__WEBPACK_IMPORTED_MODULE_2__.Popup(formulaHtml, cell);
        formulaHtml.on('click', '.vi-wpbulky-apply-formula', this.applyFormula.bind(this));
        // formulaHtml.on('change', '.vi-wpbulky-text-input', this.applyFormula.bind(this));
    }

    content() {
        return (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(`<div class="vi-wpbulky-formula-container">
                    <div class="field">
                        <input type="text" placeholder="${_functions__WEBPACK_IMPORTED_MODULE_1__["default"].text('Content')}" class="vi-wpbulky-text-input">
                    </div>
                    <button type="button" class="vi-ui button mini vi-wpbulky-apply-formula">${_functions__WEBPACK_IMPORTED_MODULE_1__["default"].text('Save')}</button>
                </div>`);
    }

    applyFormula(e) {
        let form = (0,_attributes__WEBPACK_IMPORTED_MODULE_0__.$)(e.target).closest('.vi-wpbulky-formula-container'),
            value = form.find('.vi-wpbulky-text-input').val(),
            excelObj = this.get('jexcel');

        let breakControl = false, records = [];
        let h = excelObj.selectedContainer;
        let start = h[1], end = h[3], x = h[0];

        for (let y = start; y <= end; y++) {
            if (excelObj.records[y][x] && !excelObj.records[y][x].classList.contains('readonly') && excelObj.records[y][x].style.display !== 'none' && breakControl === false) {
                records.push(excelObj.updateCell(x, y, value));
                excelObj.updateFormulaChain(x, y, records);
            }
        }

        // Update history
        excelObj.setHistory({
            action: 'setValue',
            records: records,
            selection: excelObj.selectedCell,
        });

        // Update table with custom configuration if applicable
        excelObj.updateTable();
    }

}

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!***********************!*\
  !*** ./src/editor.js ***!
  \***********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./functions */ "./src/functions.js");
/* harmony import */ var _attributes__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./attributes */ "./src/attributes.js");
/* harmony import */ var _calculator__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./calculator */ "./src/calculator.js");
/* harmony import */ var _sidebar__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./sidebar */ "./src/sidebar.js");
/* harmony import */ var _find_and_replace__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./find-and-replace */ "./src/find-and-replace.js");
/* harmony import */ var _text_multi_cells_edit__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./text-multi-cells-edit */ "./src/text-multi-cells-edit.js");
/* harmony import */ var _modal_popup__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./modal-popup */ "./src/modal-popup.js");
/* harmony import */ var _purify__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./purify */ "./src/purify.js");
/* harmony import */ var _purify__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_purify__WEBPACK_IMPORTED_MODULE_7__);









jQuery(document).ready(function ($) {

    class BulkEdit {
        constructor() {
            this.sidebar = new _sidebar__WEBPACK_IMPORTED_MODULE_3__["default"]();

            this.compare = [];
            this.trash = [];
            this.unTrash = [];
            this.revision = {};

            this.editor = $('#vi-wpbulky-container');
            this.menubar = $('#vi-wpbulky-menu-bar');

            this.menubar.on('click', '.vi-wpbulky-open-sidebar', this.openMenu.bind(this));
            this.menubar.on('click', 'a.item:not(.vi-wpbulky-open-sidebar)', this.closeMenu.bind(this));
            this.menubar.on('click', '.vi-wpbulky-new-post', this.addNewPost.bind(this));
            this.menubar.on('click', '.vi-wpbulky-full-screen-btn', this.toggleFullScreen.bind(this));
            this.menubar.on('click', '.vi-wpbulky-save-button', this.save.bind(this));
            this.menubar.on('click', '.vi-wpbulky-pagination a.item', this.changePage.bind(this));
            this.menubar.on('click', '.vi-wpbulky-get-post', this.reloadCurrentPage.bind(this));
            this.menubar.on('change', '.vi-wpbulky-go-to-page', this.changePageByInput.bind(this));

            this.editor.on('cellonchange', 'tr', this.cellOnChange.bind(this));
            this.editor.on('click', '.jexcel_content', this.removeExistingEditor.bind(this));
            this.editor.on('dblclick', this.removeContextPopup);

            this.sidebar.sidebar.on('afterAddFilter', this.afterAddFilter.bind(this));
            this.sidebar.sidebar.on('afterSaveSettings', this.afterSaveSettings.bind(this));
            this.sidebar.sidebar.on('click', '.vi-wpbulky-close-sidebar', this.closeMenu.bind(this));

            this.init();

            $(document).on('keydown', this.keyDownControl.bind(this));
        }

        removeExistingEditor(e) {
            if (e.target === e.currentTarget) {
                if (this.WorkBook && this.WorkBook.edition) this.WorkBook.closeEditor(this.WorkBook.edition[0], true);
            }
        }

        keyDownControl(e) {
            if ((e.ctrlKey || e.metaKey) && !e.shiftKey) {
                if (e.which === 83) {
                    e.preventDefault();
                    this.save();
                }
            }

            switch (e.which) {
                case 27:
                    this.sidebar.sidebar.removeClass('vi-wpbulky-open');
                    break;
            }
        }

        removeContextPopup() {
            $('.vi-wpbulky-context-popup').removeClass('vi-wpbulky-popup-active')
        }

        init() {
            if (wpbulkyParams.columns) _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.setColumns(wpbulkyParams.columns);
            this.pagination(1, 1);
            this.workBookInit();
            if ( wpbulkyParams.postType ==='comment' ) {
                this.loadComments();
            }else {
                this.loadPosts();
            }
            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].setJexcel(this.WorkBook);
        }

        cellOnChange(e, data) {
            let {col = ''} = data;

            if (!col) return;

            let type = _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.idMapping[col];
            let thisRow = $(e.target);

            switch (type) {
                case 'post_date':
                    let value = data.value,
                        x = _functions__WEBPACK_IMPORTED_MODULE_0__["default"].getColFromColumnType('post_status'),
                        cell = thisRow.find(`td[data-x='${x}']`).get(0),
                        time = (new Date(value)).getTime(),
                        now = Date.now(),
                        status = time > now ? 'future' : 'publish';

                    this.WorkBook.setValue(cell, status);

                    break;
            }
        }

        workBookInit() {
            let $this = this,
                contextMenuItems,
                onresizecolumn = function (instance, cell, width) {
                    _functions__WEBPACK_IMPORTED_MODULE_0__["default"].ajax({
                        async: true,
                        data: {
                            sub_action: 'resize_column',
                            column_id: _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.columns[cell].id,
                            column_width: width <= 55 ? 55 : width,
                        },
                        beforeSend() {},
                        success(res) {
                            if (res.success) {
                                console.log(res.data);
                            }
                        },
                        error(res) {
                            console.log(res.data);
                            alert(res.data);
                        },
                        complete() {}
                    });
                };

            function setValueToCell(obj, value) {
                let breakControl = false, records = [], h = obj.selectedContainer, start = h[1], end = h[3], x = h[0];

                for (let y = start; y <= end; y++) {
                    if (obj.records[y][x] && !obj.records[y][x].classList.contains('readonly') && obj.records[y][x].style.display !== 'none' && breakControl === false) {
                        records.push(obj.updateCell(x, y, value));
                        obj.updateFormulaChain(x, y, records);
                    }
                }

                obj.setHistory({action: 'setValue', records: records, selection: obj.selectedCell});
                obj.updateTable();
            }

            switch ( wpbulkyParams.postType ) {
                case 'comment':
                    contextMenuItems = function (items, obj, x, y, e) {
                        let cells = obj.selectedContainer;
                        x = parseInt(x);
                        y = parseInt(y);
                        if (x !== null && y !== null) {

                            if (cells[0] === cells[2]) {
                                switch (obj.options.columns[x].type) {
                                    case 'text':
                                        items.push({
                                            title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Edit multiple cells'),
                                            onclick(e) {
                                                new _text_multi_cells_edit__WEBPACK_IMPORTED_MODULE_5__["default"](obj, x, y, e);
                                            }
                                        });

                                        items.push({
                                            title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Find and Replace'),
                                            onclick(e) {
                                                new _find_and_replace__WEBPACK_IMPORTED_MODULE_4__["default"](obj, x, y, e);
                                            }
                                        });
                                        break;
                                    case 'number':
                                        items.push({
                                            title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Find and Replace'),
                                            onclick(e) {
                                                new _find_and_replace__WEBPACK_IMPORTED_MODULE_4__["default"](obj, x, y, e);
                                            }
                                        });
                                        break;

                                    case 'calendar':
                                        let cell = $(`td[data-x=${x}][data-y=${y}]`).get(0);
                                        if (!$(cell).hasClass('readonly')) {
                                            items.push({
                                                title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Open date picker'),
                                                onclick() {
                                                    let value = obj.options.data[y][x];

                                                    var editor = _functions__WEBPACK_IMPORTED_MODULE_0__["default"].createEditor(cell, 'input', '', false);
                                                    editor.value = value;
                                                    editor.style.left = 'unset';

                                                    let h = obj.selectedContainer;
                                                    let start = h[1], end = h[3];

                                                    if (obj.options.tableOverflow == true || obj.options.fullscreen == true) {
                                                        obj.options.columns[x].options.position = true;
                                                    }
                                                    obj.options.columns[x].options.value = obj.options.data[y][x];
                                                    obj.options.columns[x].options.opened = true;
                                                    obj.options.columns[x].options.onclose = function (el, value) {
                                                        let records = [];
                                                        value = el.value;

                                                        for (let y = start; y <= end; y++) {
                                                            if (obj.records[y][x] && !obj.records[y][x].classList.contains('readonly') && obj.records[y][x].style.display !== 'none') {
                                                                records.push(obj.updateCell(x, y, value));
                                                                obj.updateFormulaChain(x, y, records);
                                                            }
                                                        }
                                                        // obj.closeEditor(cell, true);

                                                        // Update history
                                                        obj.setHistory({
                                                            action: 'setValue',
                                                            records: records,
                                                            selection: obj.selectedCell,
                                                        });

                                                        // Update table with custom configuration if applicable
                                                        obj.updateTable();
                                                    };
                                                    // Current value
                                                    jSuites.calendar(editor, obj.options.columns[x].options);
                                                    // Focus on editor
                                                    editor.focus();
                                                }
                                            });
                                        }

                                        break;
                                }
                            }

                            if (obj.options.columns[x].type === 'custom' && typeof obj.options.columns[x].editor.tinymceInit === 'function') {
                                items.push({
                                    title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Edit multiple cells'),
                                    onclick() {
                                        $('.vi-ui.modal').modal('show');
                                        if (tinymce.get('vi-wpbulky-text-editor') === null) {
                                            wp.editor.initialize('vi-wpbulky-text-editor', _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.tinyMceOptions);
                                        } else {
                                            tinymce.get('vi-wpbulky-text-editor').setContent('')
                                        }

                                        $('.vi-wpbulky-text-editor-save').off('click').on('click', function () {
                                            let content = wp.editor.getContent('vi-wpbulky-text-editor');
                                            setValueToCell(obj, content);
                                            if ($(this).hasClass('vi-wpbulky-close')) $('.vi-ui.modal').modal('hide');
                                        });
                                    }
                                });
                            }


                            let pid = null;

                            if (typeof y === 'object') {
                                let y = y.getAttribute('data-y');
                                pid = obj.options.data[y][1];
                            } else {
                                pid =  obj.options.data[y][1];
                            }
                            items.push({type: 'line'});

                            items.push({
                                title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Reply' ),
                                onclick() {

                                    $('.vi-ui.modal').modal('show');
                                    if (tinymce.get('vi-wpbulky-text-editor') === null) {
                                        wp.editor.initialize('vi-wpbulky-text-editor', _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.tinyMceOptions);
                                    } else {
                                        tinymce.get('vi-wpbulky-text-editor').setContent('')
                                    }

                                    $('.vi-wpbulky-text-editor-save').off('click').on('click', function () {
                                        let content = wp.editor.getContent('vi-wpbulky-text-editor');
                                        let h = obj.selectedContainer, start = h[1], end = h[3], x = h[0];
                                        let new_comments = [];

                                        for (let y = start; y <= end; y++) {
                                            new_comments.push( {
                                                comment_id : _functions__WEBPACK_IMPORTED_MODULE_0__["default"].getDataFromCell(obj, obj.records[y][0]),
                                                post_id : _functions__WEBPACK_IMPORTED_MODULE_0__["default"].getDataFromCell(obj, obj.records[y][1]),
                                            } );
                                        }

                                        $this.addNewReply( content, new_comments );
                                        if ($(this).hasClass('vi-wpbulky-close')) $('.vi-ui.modal').modal('hide');
                                    });
                                }
                            });

                            if (cells[1] === cells[3]) {
                                items.push({
                                    title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('View post'),
                                    onclick() {
                                        window.open(`${_attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.frontendUrl}?p=${pid}&preview=true`, '_blank');
                                    }
                                });
                            }
                        }
                        return items;
                    };
                    break;
                default:
                    contextMenuItems =  function (items, obj, x, y, e) {
                    let cells = obj.selectedContainer;
                    x = parseInt(x);
                    y = parseInt(y);

                    if (cells[0] === cells[2]) {
                        if (x) {
                            if (obj.options.columns[x].type === 'checkbox') {


                                items.push({
                                    title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Check'),
                                    onclick(e) {
                                        setValueToCell(obj,true);
                                    }
                                });

                                items.push({
                                    title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Uncheck'),
                                    onclick(e) {
                                        setValueToCell(obj,false);
                                    }
                                });
                            }

                            if (obj.options.columns[x].type === 'numeric') {
                                items.push({
                                    title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Calculator'),
                                    onclick(e) {
                                        new _calculator__WEBPACK_IMPORTED_MODULE_2__["default"](obj, x, y, e);
                                    }
                                });
                            }

                            if (obj.options.columns[x].type === 'text') {
                                items.push({
                                    title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Edit multiple cells'),
                                    onclick(e) {
                                        new _text_multi_cells_edit__WEBPACK_IMPORTED_MODULE_5__["default"](obj, x, y, e);
                                    }
                                });

                                items.push({
                                    title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Find and Replace'),
                                    onclick(e) {
                                        new _find_and_replace__WEBPACK_IMPORTED_MODULE_4__["default"](obj, x, y, e);
                                    }
                                });
                            }

                            if (obj.options.columns[x].type === 'custom' && typeof obj.options.columns[x].editor.tinymceInit === 'function') {
                                items.push({
                                    title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Edit multiple cells'),
                                    onclick() {
                                        $('.vi-ui.modal').modal('show');
                                        if (tinymce.get('vi-wpbulky-text-editor') === null) {
                                            wp.editor.initialize('vi-wpbulky-text-editor', _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.tinyMceOptions);
                                        } else {
                                            tinymce.get('vi-wpbulky-text-editor').setContent('')
                                        }

                                        $('.vi-wpbulky-text-editor-save').off('click').on('click', function () {
                                            let content = wp.editor.getContent('vi-wpbulky-text-editor');
                                            setValueToCell(obj, content);
                                            if ($(this).hasClass('vi-wpbulky-close')) $('.vi-ui.modal').modal('hide');
                                        });
                                    }
                                });
                            }

                        }
                    }

                    if (items.length) items.push({type: 'line'});

                    if (x !== null && y !== null && cells[0] === cells[2] && cells[1] === cells[3]) {
                        let pid = _functions__WEBPACK_IMPORTED_MODULE_0__["default"].getPostIdOfCell(obj, y);

                        items.push({
                            title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Duplicate'),
                            onclick() {
                                _functions__WEBPACK_IMPORTED_MODULE_0__["default"].ajax({
                                    data: {sub_action: 'duplicate_post', post_id: pid},
                                    beforeSend() {
                                        _functions__WEBPACK_IMPORTED_MODULE_0__["default"].loading();
                                    },
                                    success(res) {
                                        if (res.data.length) {
                                            res.data.forEach(function (item, i) {
                                                obj.insertRow(0, y + i, true, true);
                                                obj.setRowData(y + i, item, true);
                                            })
                                        }
                                        _functions__WEBPACK_IMPORTED_MODULE_0__["default"].removeLoading();
                                    }
                                });
                            }
                        });

                        items.push({
                            title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Go to edit page'),
                            onclick() {
                                window.open(`${_attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.adminUrl}post.php?post=${pid}&action=edit`, '_blank');
                            }
                        });

                        items.push({
                            title: _functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Preview'),
                            onclick() {
                                window.open(`${_attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.frontendUrl}?p=${pid}&preview=true`, '_blank');
                            }
                        });

                        if (items.length) items.push({type: 'line'});
                    }

                    return items;
                };

            }

            // console.log(Attributes.columns);debugger;

            this.WorkBook = $('#vi-wpbulky-spreadsheet').jexcel({
                allowInsertRow: false,
                allowInsertColumn: false,
                about: false,
                freezeColumns: 3,
                tableOverflow: true,
                tableWidth: '100%',
                tableHeight: '100%',
                columns: _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.columns,
                stripHTML: false,
                allowExport: false,
                allowDeleteColumn: false,
                allowRenameColumn: false,
                autoIncrement: false,
                allowXCopy: false,
                lazyLoading: true,
                loadingSpin: true,
                fullscreen: true,
                text: {deleteSelectedRows: `${_functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Delete selected rows')}`},
                contextMenuItems,
                onresizecolumn,

                onchange(instance, cell, col, row, value, oldValue) {
                    if (JSON.stringify(value) !== JSON.stringify(oldValue)) {
                        $(cell).parent().trigger('cellonchange', {cell, col, row, value});

                        let pid = this.options.data[row][0];
                        $this.compare.push(pid);
                        $this.compare = [...new Set($this.compare)];
                        $this.menubar.find('.vi-wpbulky-save-button').addClass('vi-wpbulky-saveable');

                        // if (!$this.sidebar.revision[pid]) $this.sidebar.revision[pid] = {};
                        // let columnType = _f.getColumnType(col);
                        // $this.sidebar.revision[pid][columnType] = oldValue;
                        if (!$this.revision[pid]) $this.revision[pid] = {};
                        let columnType = _functions__WEBPACK_IMPORTED_MODULE_0__["default"].getColumnType(col);
                        $this.revision[pid][columnType] = oldValue;
                    }
                },

                onbeforechange(instance, cell, col, row, value) {
                    if (typeof value !== 'object') {
                        value = _purify__WEBPACK_IMPORTED_MODULE_7__.sanitize(value);
                    }
                    return value;
                },

                ondeleterow(el, rowNumber, numOfRows, rowRecords) {
                    for (let row of rowRecords) {
                        $this.trash.push(row[0].innerText);
                    }
                    if ($this.trash.length) $this.menubar.find('.vi-wpbulky-save-button').addClass('vi-wpbulky-saveable');
                },

                onundo(el, historyRecord) {
                    if (historyRecord && historyRecord.action === 'deleteRow') {
                        for (let row of historyRecord.rowData) {
                            $this.unTrash.push(row[0]);
                        }
                    }
                },

                onselection(el, x1, y1, x2, y2, origin) {
                    if (x1 === x2 && y1 === y2) {
                        let cell = this.getCellFromCoords(x1, y1),
                            child = $(cell).children();

                        if (child.length && child.hasClass('vi-wpbulky-gallery-has-item')) {
                            let ids = this.options.data[y1][x1],
                                images = '';

                            if (ids.length) {
                                for (let id of ids) {
                                    let src = _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.imgStorage[id];
                                    images += `<li class="vi-wpbulky-gallery-image"><img src="${src}"></li>`;
                                }
                            }

                            new _modal_popup__WEBPACK_IMPORTED_MODULE_6__.Popup(`<ul class="vi-wpbulky-gallery-images">${images}</ul>`, $(cell));
                        }
                    }
                },

                onbeforecopy() {
                    $this.firstCellCopy = null;
                },

                oncopying(value, x, y) {
                    if (!$this.firstCellCopy) $this.firstCellCopy = [x, y]
                },

                onbeforepaste(data, selectedCell) {
                    if ($this.firstCellCopy && parseInt($this.firstCellCopy[0]) !== parseInt(selectedCell[0])) data = '';
                    return data;
                },

                onscroll(el) {
                    let selectOpening = $(el).find('select.select2-hidden-accessible');
                    if (selectOpening.length) selectOpening.select2('close')
                },

            });
        }

        closeMenu(e) {
            this.sidebar.sidebar.removeClass('vi-wpbulky-open')
        }

        openMenu(e) {
            let tab = $(e.currentTarget).data('menu_tab');
            let currentTab = this.sidebar.sidebar.find(`a.item[data-tab='${tab}']`);
            if (currentTab.hasClass('active') && this.sidebar.sidebar.hasClass('vi-wpbulky-open')) {
                this.sidebar.sidebar.removeClass('vi-wpbulky-open');
            } else {
                this.sidebar.sidebar.addClass('vi-wpbulky-open');
                currentTab.trigger('click');
            }
        }

        addNewPost() {
            if (_functions__WEBPACK_IMPORTED_MODULE_0__["default"].is_loading()) return;
            if (_attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.postType === 'attachment'){
                if (!_attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes?.add_attachment_frame){
                    let frame = wp.media({
                        multiple: false,  // Set to true to allow multiple files to be selected
                    });
                    frame.on('select', function () {
                        // Get media attachment details from the frame state
                        let attachment = frame.state().get('selection').first().toJSON();
                        let id = attachment?.id, create_time = attachment?.date;
                        if (id && create_time && _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.add_attachment_create_time && _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.add_attachment_create_time < create_time){
                            $('.vi-wpbulky-get-post').trigger('click');
                        }
                    });
                    _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.add_attachment_frame = frame;
                }
                _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.add_attachment_create_time = new Date().getTime();
                _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.add_attachment_frame.open();
                return;
            }
            let postName = prompt(_functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Please enter new post name'));

            if (postName) {
                let $this = this;
                _functions__WEBPACK_IMPORTED_MODULE_0__["default"].ajax({
                    data: {sub_action: 'add_new_post', post_name: postName},
                    beforeSend() {
                        _functions__WEBPACK_IMPORTED_MODULE_0__["default"].loading();
                    },
                    success(res) {
                        $this.WorkBook.insertRow(0, 0, true, true);
                        $this.WorkBook.setRowData(0, res.data, true);
                        _functions__WEBPACK_IMPORTED_MODULE_0__["default"].removeLoading();
                    }
                })
            }
        }

        addNewReply( content, new_comments ) {
            if (_functions__WEBPACK_IMPORTED_MODULE_0__["default"].is_loading()) return;

            let $this = this;
            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].ajax({
                data: {sub_action: 'add_new_reply', content, new_comments },
                beforeSend() {
                    _functions__WEBPACK_IMPORTED_MODULE_0__["default"].loading();
                },
                success(res) {
                    console.log(res.data);
                    $this.isAdding = false;
                    _functions__WEBPACK_IMPORTED_MODULE_0__["default"].removeLoading();
                    $this.reloadCurrentPage();
                },
                error(res) {
                    console.log(res);
                    alert(res.statusText + res.responseText);
                },
                complete() {
                    $this.isAdding = false;
                    _functions__WEBPACK_IMPORTED_MODULE_0__["default"].removeLoading();
                }
            })
        }

        toggleFullScreen(e) {
            let body = $('.wp-admin'), screenBtn = $(e.currentTarget);
            body.toggleClass('vi-wpbulky-full-screen');

            if (body.hasClass('vi-wpbulky-full-screen')) {
                screenBtn.find('i.icon').removeClass('external alternate').addClass('window close outline');
                screenBtn.attr('title', 'Exit full screen');
            } else {
                screenBtn.find('i.icon').removeClass('window close outline').addClass('external alternate');
                screenBtn.attr('title', 'Full screen');
            }

            $.ajax({
                url: _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.ajaxUrl,
                type: 'post',
                dataType: 'json',
                data: {
                    ..._attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.ajaxData,
                    sub_action: 'set_full_screen_option',
                    status: body.hasClass('vi-wpbulky-full-screen')
                }
            });
        }

        getAllRows() {
            return this.WorkBook.getData(false, true);
        }

        save() {
            let $this = this,
                posts = this.getAllRows(),
                postsForSave = [];

            for (let pid of this.compare) {
                for (let post of posts) {
                    if (parseInt(post[0]) === parseInt(pid)) {
                        postsForSave.push(post);
                    }
                }
            }

            if (_functions__WEBPACK_IMPORTED_MODULE_0__["default"].is_loading()) return;

            function saveStep(step = 0) {
                let range = 20,
                    start = step * range,
                    end = start + range,
                    posts = postsForSave.slice(start, end),
                    lastStep = step * range >= postsForSave.length;

                if ( posts.length === 0 && $this.trash.length === 0 && $this.unTrash.length === 0 && step === 0 ) {
                    _functions__WEBPACK_IMPORTED_MODULE_0__["default"].notice(_functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('Nothing change to save'));
                    return;
                }

                if (lastStep && step > 0) {
                    let histories = $this.WorkBook.history;
                    if (histories.length) {
                        for (let history of histories) {
                            if (history.action !== 'deleteRow') continue;

                            let iForDel = [];

                            for (let i in history.rowData) {
                                if (history.rowData[i][1] > 0) {
                                    iForDel.push(parseInt(i));
                                }
                            }

                            if (iForDel.length) {
                                history.rowData = history.rowData.filter((item, i) => !iForDel.includes(i));
                                history.rowNode = history.rowNode.filter((item, i) => !iForDel.includes(i));
                                history.rowRecords = history.rowRecords.filter((item, i) => !iForDel.includes(i));
                                history.numOfRows = history.numOfRows - iForDel.length;
                            }
                        }
                    }

                    $this.saveRevision();
                    _functions__WEBPACK_IMPORTED_MODULE_0__["default"].showMessage( {title:"Success", message: 'Saved successfully', type: "positive", duration: 3000} );
                    return;
                }

                let action = wpbulkyParams.postType ==='comment' ? 'save_comments' : 'save_posts';

                _functions__WEBPACK_IMPORTED_MODULE_0__["default"].ajax({
                    data: {
                        sub_action: action,
                        posts: JSON.stringify(posts),
                        trash: $this.trash,
                        untrash: $this.unTrash,
                    },
                    beforeSend() {
                        _functions__WEBPACK_IMPORTED_MODULE_0__["default"].loading();
                    },
                    success(res) {
                        $this.trash = [];
                        $this.unTrash = [];
                        $this.compare = [];
                        $this.menubar.find('.vi-wpbulky-save-button').removeClass('vi-wpbulky-saveable');

                        _functions__WEBPACK_IMPORTED_MODULE_0__["default"].removeLoading();
                        saveStep(step + 1);
                    },
                    error(res) {
                        _functions__WEBPACK_IMPORTED_MODULE_0__["default"].showMessage( {title:"Error", message: res.statusText + res.responseText, type: "negative", duration: 3000} );
                        console.log(res)
                    }
                });
            }

            saveStep();
        }

        loadPosts(page = 1, reCreate = false) {
            let $this = this;

            if (_functions__WEBPACK_IMPORTED_MODULE_0__["default"].is_loading()) return;

            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].ajax({
                data: {
                    sub_action: 'load_posts',
                    page: page,
                    re_create: reCreate
                },
                beforeSend() {
                    _functions__WEBPACK_IMPORTED_MODULE_0__["default"].loading();
                },
                success(res) {
                    if (res.success) {
                        _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.imgStorage = res.data.img_storage;

                        if (reCreate) {
                            $this.WorkBook.destroy();
                            _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.setColumns(res.data.columns);
                            _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.idMapping = res.data.idMapping;
                            _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.idMappingFlip = res.data.idMappingFlip;
                            $this.workBookInit();
                        }
                        $this.WorkBook.options.data = res.data.posts;
                        $this.WorkBook.setData();
                        $this.pagination(res.data.max_num_pages, page);
                        $this.WorkBook.orderAfterLoad();
                        _functions__WEBPACK_IMPORTED_MODULE_0__["default"].removeLoading();

                        if (!res.data.posts.length) {
                            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].notice(_functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('No post was found'));
                        }
                    }
                }
            });
        }

        loadComments( page = 1, reCreate = false ) {
            let $this = this;

            if (_functions__WEBPACK_IMPORTED_MODULE_0__["default"].is_loading()) return;

            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].ajax({
                data: {
                    sub_action: 'load_comments',
                    page: page,
                    re_create: reCreate
                },
                beforeSend() {
                    _functions__WEBPACK_IMPORTED_MODULE_0__["default"].loading();
                },
                success(res) {
                    if (res.success) {
                        if (reCreate) {
                            $this.WorkBook.destroy();
                            _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.setColumns(res.data.columns);
                            _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.idMapping = res.data.idMapping;
                            _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.idMappingFlip = res.data.idMappingFlip;
                            $this.workBookInit();
                        }
                        $this.WorkBook.options.data = res.data.posts;
                        $this.WorkBook.setData();
                        $this.pagination(res.data.max_num_pages, page);

                        _functions__WEBPACK_IMPORTED_MODULE_0__["default"].removeLoading();

                        if (!res.data.posts.length) {
                            _functions__WEBPACK_IMPORTED_MODULE_0__["default"].notice(_functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('No post was found'));
                        }
                    }
                }
            });
        }

        pagination(maxPage, currentPage) {
            this.menubar.find('.vi-wpbulky-pagination').html(_functions__WEBPACK_IMPORTED_MODULE_0__["default"].pagination(maxPage, currentPage));
        }

        changePage(e) {
            let page = parseInt($(e.currentTarget).attr('data-page'));
            if ($(e.currentTarget).hasClass('active') || $(e.currentTarget).hasClass('disabled') || !page) return;
            this.loadPosts(page);
        }

        changePageByInput(e) {
            let page = parseInt($(e.target).val());
            let max = parseInt($(e.target).attr('max'));

            if (page <= max && page > 0) this.loadPosts(page);
        }

        reloadCurrentPage() {
            if ( wpbulkyParams.postType ==='comment' ) {
                this.loadComments(this.getCurrentPage());
            }else {
                this.loadPosts(this.getCurrentPage());
            }
        }

        getCurrentPage() {
            return this.menubar.find('.vi-wpbulky-pagination .item.active').data('page') || 1;
        }

        afterAddFilter(ev, data) {
            _attributes__WEBPACK_IMPORTED_MODULE_1__.Attributes.imgStorage = data.img_storage;
            this.WorkBook.options.data = data.posts;
            this.WorkBook.setData();
            this.pagination(data.max_num_pages, 1);
            this.WorkBook.orderAfterLoad();
            if (!data.posts.length) _functions__WEBPACK_IMPORTED_MODULE_0__["default"].notice(_functions__WEBPACK_IMPORTED_MODULE_0__["default"].text('No post was found'))
        }

        afterSaveSettings(ev, data) {
            if (data.fieldsChange) {
                if ( wpbulkyParams.postType ==='comment' ) {
                    this.loadComments(this.getCurrentPage(), true);
                }else {
                    this.loadPosts(this.getCurrentPage(), true);
                }
            }
        }

        saveRevision() {
            let $this = this;
            if (Object.keys($this.revision).length) {
                let currentPage = $this.sidebar.sidebar.find('.vi-wpbulky-pagination a.item.active').data('page') || 1;

                let action = wpbulkyParams.postType ==='comment' ? 'auto_save_revision_comment' : 'auto_save_revision';

                _functions__WEBPACK_IMPORTED_MODULE_0__["default"].ajax({
                    data: {sub_action: action, data: $this.revision, page: currentPage || 1},
                    success(res) {
                        if (res.success) {
                            if (res.data.updatePage) $('#vi-wpbulky-history-points-list tbody').html(res.data.updatePage);
                            $this.revision = {};
                            $this.sidebar.sidebar.find('.vi-wpbulky-pagination').html(_functions__WEBPACK_IMPORTED_MODULE_0__["default"].pagination(res.data.pages, currentPage));
                        }
                    }
                });
            }
        }
    }

    new BulkEdit();

});

})();

/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsVUFBVTtBQUNWO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFVBQVU7QUFDVjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7OztBQ3hEQTtBQUNBO0FBQ0E7QUFDQSxFQUFFLEtBQTREO0FBQzlELEVBQUUsQ0FDd0c7QUFDMUcsQ0FBQyx1QkFBdUI7QUFDeEI7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7QUFDQTtBQUNBO0FBQ0E7QUFDQSxJQUFJLFVBQVU7QUFDZDtBQUNBO0FBQ0E7QUFDQTtBQUNBLElBQUk7QUFDSjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsNkZBQTZGLGFBQWE7QUFDMUc7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLDZFQUE2RSxlQUFlO0FBQzVGO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNB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Q0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFVBQVU7QUFDVjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsVUFBVTtBQUNWO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsVUFBVTtBQUNWO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsUUFBUTtBQUNSO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsUUFBUTtBQUNSO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsZ0JBQWdCLE1BQU07QUFDdEI7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsUUFBUTtBQUNSO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGdCQUFnQixRQUFRO0FBQ3hCLGdCQUFnQixNQUFNO0FBQ3RCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1QsUUFBUTtBQUNSO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0Esa0NBQWtDO0FBQ2xDO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxZQUFZO0FBQ1osVUFBVTtBQUNWO0FBQ0E7QUFDQSxZQUFZO0FBQ1o7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsZ0JBQWdCLFFBQVE7QUFDeEIsZ0JBQWdCLFVBQVU7QUFDMUI7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxRQUFRO0FBQ1I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxVQUFVO0FBQ1Y7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsVUFBVSxXQUFX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QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLCtDQUErQztBQUMvQztBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsOEJBQThCO0FBQzlCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxZQUFZO0FBQ1o7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFVBQVU7QUFDVjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxnQkFBZ0Isa0JBQWtCO0FBQ2xDO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxlQUFlLGFBQWE7QUFDNUIsZUFBZSxRQUFRO0FBQ3ZCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxVQUFVO0FBQ1Y7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFFBQVE7QUFDUjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsVUFBVTtBQUNWO0FBQ0EsVUFBVTtBQUNWO0FBQ0E7QUFDQTtBQUNBLFFBQVE7QUFDUjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFVBQVU7QUFDVjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsZUFBZSxRQUFRO0FBQ3ZCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtB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QjtBQUNqQjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxnQkFBZ0Isa0RBQUU7QUFDbEIsMkJBQTJCLGlFQUFpRTtBQUM1RjtBQUNBO0FBQ0E7QUFDQTtBQUNBLHNGQUFzRixrREFBRTtBQUN4RjtBQUNBO0FBQ0EsaUJBQWlCO0FBQ2pCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9hc3NldHMvLi9zcmMvYXR0cmlidXRlcy5qcyIsIndlYnBhY2s6Ly9hc3NldHMvLi9zcmMvY2FsY3VsYXRvci5qcyIsIndlYnBhY2s6Ly9hc3NldHMvLi9zcmMvY3VzdG9tLWNvbHVtbi5qcyIsIndlYnBhY2s6Ly9hc3NldHMvLi9zcmMvZmluZC1hbmQtcmVwbGFjZS5qcyIsIndlYnBhY2s6Ly9hc3NldHMvLi9zcmMvZnVuY3Rpb25zLmpzIiwid2VicGFjazovL2Fzc2V0cy8uL3NyYy9tb2RhbC1wb3B1cC5qcyIsIndlYnBhY2s6Ly9hc3NldHMvLi9zcmMvcHVyaWZ5LmpzIiwid2VicGFjazovL2Fzc2V0cy8uL3NyYy9zaWRlYmFyLmpzIiwid2VicGFjazovL2Fzc2V0cy8uL3NyYy90ZW1wbGF0ZXMuanMiLCJ3ZWJwYWNrOi8vYXNzZXRzLy4vc3JjL3RleHQtbXVsdGktY2VsbHMtZWRpdC5qcyIsIndlYnBhY2s6Ly9hc3NldHMvd2VicGFjay9ib290c3RyYXAiLCJ3ZWJwYWNrOi8vYXNzZXRzL3dlYnBhY2svcnVudGltZS9jb21wYXQgZ2V0IGRlZmF1bHQgZXhwb3J0Iiwid2VicGFjazovL2Fzc2V0cy93ZWJwYWNrL3J1bnRpbWUvZGVmaW5lIHByb3BlcnR5IGdldHRlcnMiLCJ3ZWJwYWNrOi8vYXNzZXRzL3dlYnBhY2svcnVudGltZS9oYXNPd25Qcm9wZXJ0eSBzaG9ydGhhbmQiLCJ3ZWJwYWNrOi8vYXNzZXRzL3dlYnBhY2svcnVudGltZS9tYWtlIG5hbWVzcGFjZSBvYmplY3QiLCJ3ZWJwYWNrOi8vYXNzZXRzLy4vc3JjL2VkaXRvci5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQge2NvbHVtbkZpbHRlciwgY3VzdG9tQ29sdW1ufSBmcm9tIFwiLi9jdXN0b20tY29sdW1uXCI7XHJcblxyXG5BcnJheS5wcm90b3R5cGUuaW5zZXJ0ID0gZnVuY3Rpb24gKGluZGV4LCBpdGVtcykge1xyXG4gICAgdGhpcy5zcGxpY2UuYXBwbHkodGhpcywgW2luZGV4LCAwXS5jb25jYXQoaXRlbXMpKTtcclxufTtcclxuXHJcbmV4cG9ydCBjb25zdCBBdHRyaWJ1dGVzID0ge1xyXG4gICAgLi4ud3BidWxreVBhcmFtcyxcclxuICAgIHBvc3RUeXBlczoge30sXHJcbiAgICBmaWx0ZXJLZXk6IERhdGUubm93KCksXHJcbiAgICBzZWxlY3RQYWdlOiAxLFxyXG4gICAgYWpheERhdGE6IHthY3Rpb246ICd2aV93cGJ1bGt5X2FqYXgnLCB2aV93cGJ1bGt5X25vbmNlOiB3cGJ1bGt5UGFyYW1zLm5vbmNlfSxcclxuICAgIHRpbnlNY2VPcHRpb25zOiB7XHJcbiAgICAgICAgdGlueW1jZToge1xyXG4gICAgICAgICAgICB0aGVtZTogXCJtb2Rlcm5cIixcclxuICAgICAgICAgICAgc2tpbjogXCJsaWdodGdyYXlcIixcclxuICAgICAgICAgICAgbGFuZ3VhZ2U6IFwiZW5cIixcclxuICAgICAgICAgICAgZm9ybWF0czoge1xyXG4gICAgICAgICAgICAgICAgYWxpZ25sZWZ0OiBbXHJcbiAgICAgICAgICAgICAgICAgICAge3NlbGVjdG9yOiBcInAsaDEsaDIsaDMsaDQsaDUsaDYsdGQsdGgsZGl2LHVsLG9sLGxpXCIsIHN0eWxlczoge3RleHRBbGlnbjogXCJsZWZ0XCJ9fSxcclxuICAgICAgICAgICAgICAgICAgICB7c2VsZWN0b3I6IFwiaW1nLHRhYmxlLGRsLndwLWNhcHRpb25cIiwgY2xhc3NlczogXCJhbGlnbmxlZnRcIn1cclxuICAgICAgICAgICAgICAgIF0sXHJcbiAgICAgICAgICAgICAgICBhbGlnbmNlbnRlcjogW1xyXG4gICAgICAgICAgICAgICAgICAgIHtzZWxlY3RvcjogXCJwLGgxLGgyLGgzLGg0LGg1LGg2LHRkLHRoLGRpdix1bCxvbCxsaVwiLCBzdHlsZXM6IHt0ZXh0QWxpZ246IFwiY2VudGVyXCJ9fSxcclxuICAgICAgICAgICAgICAgICAgICB7c2VsZWN0b3I6IFwiaW1nLHRhYmxlLGRsLndwLWNhcHRpb25cIiwgY2xhc3NlczogXCJhbGlnbmNlbnRlclwifVxyXG4gICAgICAgICAgICAgICAgXSxcclxuICAgICAgICAgICAgICAgIGFsaWducmlnaHQ6IFtcclxuICAgICAgICAgICAgICAgICAgICB7c2VsZWN0b3I6IFwicCxoMSxoMixoMyxoNCxoNSxoNix0ZCx0aCxkaXYsdWwsb2wsbGlcIiwgc3R5bGVzOiB7dGV4dEFsaWduOiBcInJpZ2h0XCJ9fSxcclxuICAgICAgICAgICAgICAgICAgICB7c2VsZWN0b3I6IFwiaW1nLHRhYmxlLGRsLndwLWNhcHRpb25cIiwgY2xhc3NlczogXCJhbGlnbnJpZ2h0XCJ9XHJcbiAgICAgICAgICAgICAgICBdLFxyXG4gICAgICAgICAgICAgICAgc3RyaWtldGhyb3VnaDoge2lubGluZTogXCJkZWxcIn1cclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgcmVsYXRpdmVfdXJsczogZmFsc2UsXHJcbiAgICAgICAgICAgIHJlbW92ZV9zY3JpcHRfaG9zdDogZmFsc2UsXHJcbiAgICAgICAgICAgIGNvbnZlcnRfdXJsczogZmFsc2UsXHJcbiAgICAgICAgICAgIGJyb3dzZXJfc3BlbGxjaGVjazogdHJ1ZSxcclxuICAgICAgICAgICAgZml4X2xpc3RfZWxlbWVudHM6IHRydWUsXHJcbiAgICAgICAgICAgIGVudGl0aWVzOiBcIjM4LGFtcCw2MCxsdCw2MixndFwiLFxyXG4gICAgICAgICAgICBlbnRpdHlfZW5jb2Rpbmc6IFwicmF3XCIsXHJcbiAgICAgICAgICAgIGtlZXBfc3R5bGVzOiBmYWxzZSxcclxuICAgICAgICAgICAgY2FjaGVfc3VmZml4OiBcIndwLW1jZS00OTExMC0yMDIwMTExMFwiLFxyXG4gICAgICAgICAgICByZXNpemU6IFwidmVydGljYWxcIixcclxuICAgICAgICAgICAgbWVudWJhcjogZmFsc2UsXHJcbiAgICAgICAgICAgIGJyYW5kaW5nOiBmYWxzZSxcclxuICAgICAgICAgICAgcHJldmlld19zdHlsZXM6IFwiZm9udC1mYW1pbHkgZm9udC1zaXplIGZvbnQtd2VpZ2h0IGZvbnQtc3R5bGUgdGV4dC1kZWNvcmF0aW9uIHRleHQtdHJhbnNmb3JtXCIsXHJcbiAgICAgICAgICAgIGVuZF9jb250YWluZXJfb25fZW1wdHlfYmxvY2s6IHRydWUsXHJcbiAgICAgICAgICAgIHdwZWRpdGltYWdlX2h0bWw1X2NhcHRpb25zOiB0cnVlLFxyXG4gICAgICAgICAgICB3cF9sYW5nX2F0dHI6IFwiZW4tVVNcIixcclxuICAgICAgICAgICAgd3Bfa2VlcF9zY3JvbGxfcG9zaXRpb246IGZhbHNlLFxyXG4gICAgICAgICAgICB3cF9zaG9ydGN1dF9sYWJlbHM6IHtcclxuICAgICAgICAgICAgICAgIFwiSGVhZGluZyAxXCI6IFwiYWNjZXNzMVwiLFxyXG4gICAgICAgICAgICAgICAgXCJIZWFkaW5nIDJcIjogXCJhY2Nlc3MyXCIsXHJcbiAgICAgICAgICAgICAgICBcIkhlYWRpbmcgM1wiOiBcImFjY2VzczNcIixcclxuICAgICAgICAgICAgICAgIFwiSGVhZGluZyA0XCI6IFwiYWNjZXNzNFwiLFxyXG4gICAgICAgICAgICAgICAgXCJIZWFkaW5nIDVcIjogXCJhY2Nlc3M1XCIsXHJcbiAgICAgICAgICAgICAgICBcIkhlYWRpbmcgNlwiOiBcImFjY2VzczZcIixcclxuICAgICAgICAgICAgICAgIFwiUGFyYWdyYXBoXCI6IFwiYWNjZXNzN1wiLFxyXG4gICAgICAgICAgICAgICAgXCJCbG9ja3F1b3RlXCI6IFwiYWNjZXNzUVwiLFxyXG4gICAgICAgICAgICAgICAgXCJVbmRlcmxpbmVcIjogXCJtZXRhVVwiLFxyXG4gICAgICAgICAgICAgICAgXCJTdHJpa2V0aHJvdWdoXCI6IFwiYWNjZXNzRFwiLFxyXG4gICAgICAgICAgICAgICAgXCJCb2xkXCI6IFwibWV0YUJcIixcclxuICAgICAgICAgICAgICAgIFwiSXRhbGljXCI6IFwibWV0YUlcIixcclxuICAgICAgICAgICAgICAgIFwiQ29kZVwiOiBcImFjY2Vzc1hcIixcclxuICAgICAgICAgICAgICAgIFwiQWxpZ24gY2VudGVyXCI6IFwiYWNjZXNzQ1wiLFxyXG4gICAgICAgICAgICAgICAgXCJBbGlnbiByaWdodFwiOiBcImFjY2Vzc1JcIixcclxuICAgICAgICAgICAgICAgIFwiQWxpZ24gbGVmdFwiOiBcImFjY2Vzc0xcIixcclxuICAgICAgICAgICAgICAgIFwiSnVzdGlmeVwiOiBcImFjY2Vzc0pcIixcclxuICAgICAgICAgICAgICAgIFwiQ3V0XCI6IFwibWV0YVhcIixcclxuICAgICAgICAgICAgICAgIFwiQ29weVwiOiBcIm1ldGFDXCIsXHJcbiAgICAgICAgICAgICAgICBcIlBhc3RlXCI6IFwibWV0YVZcIixcclxuICAgICAgICAgICAgICAgIFwiU2VsZWN0IGFsbFwiOiBcIm1ldGFBXCIsXHJcbiAgICAgICAgICAgICAgICBcIlVuZG9cIjogXCJtZXRhWlwiLFxyXG4gICAgICAgICAgICAgICAgXCJSZWRvXCI6IFwibWV0YVlcIixcclxuICAgICAgICAgICAgICAgIFwiQnVsbGV0IGxpc3RcIjogXCJhY2Nlc3NVXCIsXHJcbiAgICAgICAgICAgICAgICBcIk51bWJlcmVkIGxpc3RcIjogXCJhY2Nlc3NPXCIsXHJcbiAgICAgICAgICAgICAgICBcIkluc2VydFxcL2VkaXQgaW1hZ2VcIjogXCJhY2Nlc3NNXCIsXHJcbiAgICAgICAgICAgICAgICBcIkluc2VydFxcL2VkaXQgbGlua1wiOiBcIm1ldGFLXCIsXHJcbiAgICAgICAgICAgICAgICBcIlJlbW92ZSBsaW5rXCI6IFwiYWNjZXNzU1wiLFxyXG4gICAgICAgICAgICAgICAgXCJUb29sYmFyIFRvZ2dsZVwiOiBcImFjY2Vzc1pcIixcclxuICAgICAgICAgICAgICAgIFwiSW5zZXJ0IFJlYWQgTW9yZSB0YWdcIjogXCJhY2Nlc3NUXCIsXHJcbiAgICAgICAgICAgICAgICBcIkluc2VydCBQYWdlIEJyZWFrIHRhZ1wiOiBcImFjY2Vzc1BcIixcclxuICAgICAgICAgICAgICAgIFwiRGlzdHJhY3Rpb24tZnJlZSB3cml0aW5nIG1vZGVcIjogXCJhY2Nlc3NXXCIsXHJcbiAgICAgICAgICAgICAgICBcIkFkZCBNZWRpYVwiOiBcImFjY2Vzc01cIixcclxuICAgICAgICAgICAgICAgIFwiS2V5Ym9hcmQgU2hvcnRjdXRzXCI6IFwiYWNjZXNzSFwiXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHBsdWdpbnM6IFwiY2hhcm1hcCxjb2xvcnBpY2tlcixocixsaXN0cyxtZWRpYSxwYXN0ZSx0YWJmb2N1cyx0ZXh0Y29sb3IsZnVsbHNjcmVlbix3b3JkcHJlc3Msd3BhdXRvcmVzaXplLHdwZWRpdGltYWdlLHdwZW1vamksd3BnYWxsZXJ5LHdwbGluayx3cGRpYWxvZ3Msd3B0ZXh0cGF0dGVybix3cHZpZXdcIixcclxuICAgICAgICAgICAgc2VsZWN0b3I6IFwiI3ZpLXdwYnVsa3ktdGV4dC1lZGl0b3JcIixcclxuICAgICAgICAgICAgd3BhdXRvcDogdHJ1ZSxcclxuICAgICAgICAgICAgaW5kZW50OiBmYWxzZSxcclxuICAgICAgICAgICAgdG9vbGJhcjE6IFwiZm9ybWF0c2VsZWN0LGJvbGQsaXRhbGljLGJ1bGxpc3QsbnVtbGlzdCxibG9ja3F1b3RlLGFsaWdubGVmdCxhbGlnbmNlbnRlcixhbGlnbnJpZ2h0LGxpbmssd3BfbW9yZSxzcGVsbGNoZWNrZXIsZnVsbHNjcmVlbix3cF9hZHZcIixcclxuICAgICAgICAgICAgdG9vbGJhcjI6IFwic3RyaWtldGhyb3VnaCxocixmb3JlY29sb3IscGFzdGV0ZXh0LHJlbW92ZWZvcm1hdCxjaGFybWFwLG91dGRlbnQsaW5kZW50LHVuZG8scmVkbyx3cF9oZWxwXCIsXHJcbiAgICAgICAgICAgIHRhYmZvY3VzX2VsZW1lbnRzOiBcIjpwcmV2LDpuZXh0XCIsXHJcbiAgICAgICAgICAgIGJvZHlfY2xhc3M6IFwiZXhjZXJwdCBwb3N0LXR5cGUtcG9zdCBwb3N0LXN0YXR1cy1wdWJsaXNoIHBhZ2UtdGVtcGxhdGUtZGVmYXVsdCBsb2NhbGUtZW4tdXNcIixcclxuICAgICAgICB9LFxyXG4gICAgICAgIG1lZGlhQnV0dG9uczogdHJ1ZSxcclxuICAgICAgICBxdWlja3RhZ3M6IHRydWVcclxuICAgIH0sXHJcbiAgICBzZXRDb2x1bW5zKHJhdykge1xyXG4gICAgICAgIHRyeSB7XHJcbiAgICAgICAgICAgIGxldCBjb2x1bW5zID0gSlNPTi5wYXJzZShyYXcpO1xyXG4gICAgICAgICAgICBBdHRyaWJ1dGVzLmNvbHVtbnMgPSBjb2x1bW5zLm1hcCgoY29sKSA9PiB7XHJcbiAgICAgICAgICAgICAgICBpZiAoY29sICYmIGNvbC5lZGl0b3IgJiYgY3VzdG9tQ29sdW1uW2NvbC5lZGl0b3JdKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgY29sLmVkaXRvciA9IGN1c3RvbUNvbHVtbltjb2wuZWRpdG9yXTtcclxuICAgICAgICAgICAgICAgICAgICBjb2wuZWRpdG9yLm9wdGlvbnMgPSBjb2wuZWRpdG9yX29wdGlvbnM7XHJcbiAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgaWYgKGNvbCAmJiBjb2wuZmlsdGVyICYmIGNvbHVtbkZpbHRlcltjb2wuZmlsdGVyXSkgY29sLmZpbHRlciA9IGNvbHVtbkZpbHRlcltjb2wuZmlsdGVyXTtcclxuICAgICAgICAgICAgICAgIHJldHVybiBjb2w7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH0gY2F0Y2ggKGUpIHtcclxuICAgICAgICAgICAgY29uc29sZS5sb2coZSk7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG59O1xyXG5cclxud2luZG93LkF0dHJpYnV0ZXMgPSBBdHRyaWJ1dGVzO1xyXG5leHBvcnQgY29uc3QgSTE4biA9IHdwYnVsa3lJMThuLmkxOG47XHJcbmV4cG9ydCBjb25zdCAkID0galF1ZXJ5O1xyXG4iLCJpbXBvcnQgeyR9IGZyb20gXCIuL2F0dHJpYnV0ZXNcIjtcclxuaW1wb3J0IF9mIGZyb20gJy4vZnVuY3Rpb25zJztcclxuaW1wb3J0IHtQb3B1cH0gZnJvbSBcIi4vbW9kYWwtcG9wdXBcIjtcclxuXHJcbmNsYXNzIENhbGN1bGF0b3Ige1xyXG4gICAgY29uc3RydWN0b3Iob2JqLCB4LCB5LCBlKSB7XHJcbiAgICAgICAgdGhpcy5fZGF0YSA9IHt9O1xyXG4gICAgICAgIHRoaXMuX2RhdGEuamV4Y2VsID0gb2JqO1xyXG4gICAgICAgIHRoaXMuX2RhdGEueCA9IHBhcnNlSW50KHgpO1xyXG4gICAgICAgIHRoaXMuX2RhdGEueSA9IHBhcnNlSW50KHkpO1xyXG4gICAgICAgIHRoaXMucnVuKCk7XHJcbiAgICB9XHJcblxyXG4gICAgZ2V0KGlkKSB7XHJcbiAgICAgICAgcmV0dXJuIHRoaXMuX2RhdGFbaWRdIHx8ICcnXHJcbiAgICB9XHJcblxyXG4gICAgcnVuKCkge1xyXG4gICAgICAgIGxldCBmb3JtdWxhSHRtbCA9IHRoaXMuY29udGVudCgpO1xyXG4gICAgICAgIGxldCBjZWxsID0gJChgdGRbZGF0YS14PSR7dGhpcy5nZXQoJ3gnKSB8fCAwfV1bZGF0YS15PSR7dGhpcy5nZXQoJ3knKSB8fCAwfV1gKTtcclxuICAgICAgICBuZXcgUG9wdXAoZm9ybXVsYUh0bWwsIGNlbGwpO1xyXG4gICAgICAgIGZvcm11bGFIdG1sLm9uKCdjbGljaycsICcudmktd3BidWxreS1hcHBseS1mb3JtdWxhJywgdGhpcy5hcHBseUZvcm11bGEuYmluZCh0aGlzKSk7XHJcbiAgICAgICAgZm9ybXVsYUh0bWwub24oJ2NoYW5nZScsICcudmktd3BidWxreS1yb3VuZGVkJywgdGhpcy50b2dnbGVEZWNpbWFsVmFsdWUpO1xyXG4gICAgfVxyXG5cclxuICAgIGNvbnRlbnQoKSB7XHJcbiAgICAgICAgcmV0dXJuICQoYDxkaXYgY2xhc3M9XCJ2aS13cGJ1bGt5LWZvcm11bGEtY29udGFpbmVyXCIgc3R5bGU9XCJkaXNwbGF5OiBmbGV4O1wiPlxyXG4gICAgICAgICAgICAgICAgICAgIDxzZWxlY3QgY2xhc3M9XCJ2aS13cGJ1bGt5LW9wZXJhdG9yXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDxvcHRpb24gdmFsdWU9XCIrXCI+Kzwvb3B0aW9uPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8b3B0aW9uIHZhbHVlPVwiLVwiPi08L29wdGlvbj5cclxuICAgICAgICAgICAgICAgICAgICA8L3NlbGVjdD5cclxuICAgICAgICAgICAgICAgICAgICA8aW5wdXQgdHlwZT1cIm51bWJlclwiIG1pbj1cIjBcIiBjbGFzcz1cInZpLXdwYnVsa3ktdmFsdWVcIj5cclxuICAgICAgICAgICAgICAgICAgICA8c2VsZWN0IGNsYXNzPVwidmktd3BidWxreS11bml0XCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDxvcHRpb24gdmFsdWU9XCJmaXhlZFwiPm48L29wdGlvbj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPG9wdGlvbiB2YWx1ZT1cInBlcmNlbnRhZ2VcIj4lPC9vcHRpb24+XHJcbiAgICAgICAgICAgICAgICAgICAgPC9zZWxlY3Q+XHJcbiAgICAgICAgICAgICAgICAgICAgPHNlbGVjdCBjbGFzcz1cInZpLXdwYnVsa3ktcm91bmRlZFwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8b3B0aW9uIHZhbHVlPVwibm9fcm91bmRcIj4ke19mLnRleHQoJ05vIHJvdW5kJyl9PC9vcHRpb24+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDxvcHRpb24gdmFsdWU9XCJyb3VuZFwiPiR7X2YudGV4dCgnUm91bmQgd2l0aCBkZWNpbWFsJyl9PC9vcHRpb24+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDxvcHRpb24gdmFsdWU9XCJyb3VuZF91cFwiPiR7X2YudGV4dCgnUm91bmQgdXAnKX08L29wdGlvbj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPG9wdGlvbiB2YWx1ZT1cInJvdW5kX2Rvd25cIj4ke19mLnRleHQoJ1JvdW5kIGRvd24nKX08L29wdGlvbj5cclxuICAgICAgICAgICAgICAgICAgICA8L3NlbGVjdD5cclxuICAgICAgICAgICAgICAgICAgICA8aW5wdXQgdHlwZT1cIm51bWJlclwiIG1pbj1cIjBcIiBtYXg9XCIxMFwiIGNsYXNzPVwidmktd3BidWxreS1kZWNpbWFsXCIgdmFsdWU9XCIwXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJ2aS11aSBidXR0b24gbWluaSB2aS13cGJ1bGt5LWFwcGx5LWZvcm11bGFcIj4ke19mLnRleHQoJ09LJyl9PC9idXR0b24+XHJcbiAgICAgICAgICAgICAgICA8L2Rpdj5gKTtcclxuICAgIH1cclxuXHJcbiAgICBhcHBseUZvcm11bGEoZSkge1xyXG4gICAgICAgIGxldCBmb3JtID0gJChlLnRhcmdldCkuY2xvc2VzdCgnLnZpLXdwYnVsa3ktZm9ybXVsYS1jb250YWluZXInKSxcclxuICAgICAgICAgICAgb3BlcmF0b3IgPSBmb3JtLmZpbmQoJy52aS13cGJ1bGt5LW9wZXJhdG9yJykudmFsKCksXHJcbiAgICAgICAgICAgIGZWYWx1ZSA9IHBhcnNlRmxvYXQoZm9ybS5maW5kKCcudmktd3BidWxreS12YWx1ZScpLnZhbCgpKSxcclxuICAgICAgICAgICAgdW5pdCA9IGZvcm0uZmluZCgnLnZpLXdwYnVsa3ktdW5pdCcpLnZhbCgpLFxyXG4gICAgICAgICAgICByb3VuZGVkID0gZm9ybS5maW5kKCcudmktd3BidWxreS1yb3VuZGVkJykudmFsKCksXHJcbiAgICAgICAgICAgIGRlY2ltYWwgPSBwYXJzZUludChmb3JtLmZpbmQoJy52aS13cGJ1bGt5LWRlY2ltYWwnKS52YWwoKSksXHJcbiAgICAgICAgICAgIGV4Y2VsT2JqID0gdGhpcy5nZXQoJ2pleGNlbCcpO1xyXG5cclxuICAgICAgICBpZiAoIWZWYWx1ZSkgcmV0dXJuO1xyXG5cclxuICAgICAgICBsZXQgYnJlYWtDb250cm9sID0gZmFsc2UsIHJlY29yZHMgPSBbXTtcclxuICAgICAgICBsZXQgaCA9IGV4Y2VsT2JqLnNlbGVjdGVkQ29udGFpbmVyO1xyXG4gICAgICAgIGxldCBzdGFydCA9IGhbMV0sIGVuZCA9IGhbM10sIHggPSBoWzBdO1xyXG5cclxuICAgICAgICBmdW5jdGlvbiBmb3JtdWxhKG9sZFZhbHVlKSB7XHJcbiAgICAgICAgICAgIG9sZFZhbHVlID0gcGFyc2VGbG9hdChvbGRWYWx1ZSk7XHJcbiAgICAgICAgICAgIGxldCBleHRyYVZhbHVlID0gdW5pdCA9PT0gJ3BlcmNlbnRhZ2UnID8gb2xkVmFsdWUgKiBmVmFsdWUgLyAxMDAgOiBmVmFsdWU7XHJcbiAgICAgICAgICAgIGxldCBuZXdWYWx1ZSA9IG9wZXJhdG9yID09PSAnLScgPyBvbGRWYWx1ZSAtIGV4dHJhVmFsdWUgOiBvbGRWYWx1ZSArIGV4dHJhVmFsdWU7XHJcbiAgICAgICAgICAgIHN3aXRjaCAocm91bmRlZCkge1xyXG4gICAgICAgICAgICAgICAgY2FzZSAncm91bmQnOlxyXG4gICAgICAgICAgICAgICAgICAgIG5ld1ZhbHVlID0gbmV3VmFsdWUudG9GaXhlZChkZWNpbWFsKTtcclxuICAgICAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICAgICAgICAgIGNhc2UgJ3JvdW5kX3VwJzpcclxuICAgICAgICAgICAgICAgICAgICBuZXdWYWx1ZSA9IE1hdGguY2VpbChuZXdWYWx1ZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgYnJlYWs7XHJcbiAgICAgICAgICAgICAgICBjYXNlICdyb3VuZF9kb3duJzpcclxuICAgICAgICAgICAgICAgICAgICBuZXdWYWx1ZSA9IE1hdGguZmxvb3IobmV3VmFsdWUpO1xyXG4gICAgICAgICAgICAgICAgICAgIGJyZWFrO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIHJldHVybiBuZXdWYWx1ZTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGZvciAobGV0IHkgPSBzdGFydDsgeSA8PSBlbmQ7IHkrKykge1xyXG4gICAgICAgICAgICBpZiAoZXhjZWxPYmoucmVjb3Jkc1t5XVt4XSAmJiAhZXhjZWxPYmoucmVjb3Jkc1t5XVt4XS5jbGFzc0xpc3QuY29udGFpbnMoJ3JlYWRvbmx5JykgJiYgZXhjZWxPYmoucmVjb3Jkc1t5XVt4XS5zdHlsZS5kaXNwbGF5ICE9PSAnbm9uZScgJiYgYnJlYWtDb250cm9sID09PSBmYWxzZSkge1xyXG4gICAgICAgICAgICAgICAgbGV0IHZhbHVlID0gZXhjZWxPYmoub3B0aW9ucy5kYXRhW3ldW3hdIHx8IDA7XHJcbiAgICAgICAgICAgICAgICByZWNvcmRzLnB1c2goZXhjZWxPYmoudXBkYXRlQ2VsbCh4LCB5LCBmb3JtdWxhKHZhbHVlKSkpO1xyXG4gICAgICAgICAgICAgICAgZXhjZWxPYmoudXBkYXRlRm9ybXVsYUNoYWluKHgsIHksIHJlY29yZHMpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICAvLyBVcGRhdGUgaGlzdG9yeVxyXG4gICAgICAgIGV4Y2VsT2JqLnNldEhpc3Rvcnkoe1xyXG4gICAgICAgICAgICBhY3Rpb246ICdzZXRWYWx1ZScsXHJcbiAgICAgICAgICAgIHJlY29yZHM6IHJlY29yZHMsXHJcbiAgICAgICAgICAgIHNlbGVjdGlvbjogZXhjZWxPYmouc2VsZWN0ZWRDZWxsLFxyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvLyBVcGRhdGUgdGFibGUgd2l0aCBjdXN0b20gY29uZmlndXJhdGlvbiBpZiBhcHBsaWNhYmxlXHJcbiAgICAgICAgZXhjZWxPYmoudXBkYXRlVGFibGUoKTtcclxuICAgIH1cclxuXHJcbiAgICB0b2dnbGVEZWNpbWFsVmFsdWUoKSB7XHJcbiAgICAgICAgbGV0IGZvcm0gPSAkKHRoaXMpLmNsb3Nlc3QoJy52aS13cGJ1bGt5LWZvcm11bGEtY29udGFpbmVyJyk7XHJcbiAgICAgICAgZm9ybS5maW5kKCcudmktd3BidWxreS1kZWNpbWFsJykuaGlkZSgpO1xyXG4gICAgICAgIGlmICgkKHRoaXMpLnZhbCgpID09PSAncm91bmQnKSBmb3JtLmZpbmQoJy52aS13cGJ1bGt5LWRlY2ltYWwnKS5zaG93KCk7XHJcbiAgICB9XHJcbn1cclxuXHJcbmV4cG9ydCBkZWZhdWx0IENhbGN1bGF0b3I7IiwiaW1wb3J0IF9mIGZyb20gXCIuL2Z1bmN0aW9uc1wiO1xyXG5pbXBvcnQge0F0dHJpYnV0ZXN9IGZyb20gXCIuL2F0dHJpYnV0ZXNcIjtcclxuXHJcbmNvbnN0IGN1c3RvbUNvbHVtbiA9IHt9O1xyXG5jb25zdCBjb2x1bW5GaWx0ZXIgPSB7fTtcclxuXHJcbmpRdWVyeShkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCQpIHtcclxuICAgIHdpbmRvdy52aUlzRWRpdGluZyA9IGZhbHNlO1xyXG5cclxuICAgIGNvbnN0IG1lZGlhTXVsdGlwbGUgPSB3cC5tZWRpYSh7bXVsdGlwbGU6IHRydWV9KTtcclxuICAgIGNvbnN0IG1lZGlhU2luZ2xlID0gd3AubWVkaWEoe211bHRpcGxlOiBmYWxzZX0pO1xyXG5cclxuICAgIGNvbnN0IHRtcGwgPSB7XHJcbiAgICAgICAgZ2FsbGVyeUltYWdlKHNyYywgaWQpIHtcclxuICAgICAgICAgICAgcmV0dXJuIGA8bGkgY2xhc3M9XCJ2aS13cGJ1bGt5LWdhbGxlcnktaW1hZ2VcIiBkYXRhLWlkPVwiJHtpZH1cIj48aSBjbGFzcz1cInZpLXdwYnVsa3ktcmVtb3ZlLWltYWdlIGRhc2hpY29ucyBkYXNoaWNvbnMtbm8tYWx0XCI+IDwvaT48aW1nIHNyYz1cIiR7c3JjfVwiPjwvbGk+YDtcclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICBmaWxlRG93bmxvYWQoJF9maWxlID0ge30pIHtcclxuICAgICAgICAgICAgbGV0IHtpZCwgbmFtZSwgZmlsZX0gPSAkX2ZpbGU7XHJcbiAgICAgICAgICAgIGxldCByb3cgPSAkKGA8dHI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDx0ZD48aSBjbGFzcz1cImJhcnMgaWNvblwiPjwvaT48aW5wdXQgdHlwZT1cInRleHRcIiBjbGFzcz1cInZpLXdwYnVsa3ktZmlsZS1uYW1lXCIgdmFsdWU9XCIke25hbWUgfHwgJyd9XCI+PC90ZD5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPHRkPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGlucHV0IHR5cGU9XCJ0ZXh0XCIgY2xhc3M9XCJ2aS13cGJ1bGt5LWZpbGUtdXJsXCIgdmFsdWU9XCIke2ZpbGUgfHwgJyd9XCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8aW5wdXQgdHlwZT1cImhpZGRlblwiIGNsYXNzPVwidmktd3BidWxreS1maWxlLWhhc2hcIiB2YWx1ZT1cIiR7aWQgfHwgJyd9XCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8c3BhbiBjbGFzcz1cInZpLXVpIGJ1dHRvbiBtaW5pIHZpLXdwYnVsa3ktY2hvb3NlLWZpbGVcIj4ke19mLnRleHQoJ0Nob29zZSBmaWxlJyl9PC9zcGFuPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGkgY2xhc3M9XCJ2aS13cGJ1bGt5LXJlbW92ZS1maWxlIGRhc2hpY29ucyBkYXNoaWNvbnMtbm8tYWx0XCI+IDwvaT5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPC90ZD5cclxuICAgICAgICAgICAgICAgICAgICA8L3RyPmApO1xyXG5cclxuICAgICAgICAgICAgcm93Lm9uKCdjbGljaycsICcudmktd3BidWxreS1yZW1vdmUtZmlsZScsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgIHJvdy5yZW1vdmUoKTtcclxuICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICByZXR1cm4gcm93O1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcblxyXG4gICAgY3VzdG9tQ29sdW1uLnRleHRFZGl0b3IgPSB7XHJcblxyXG4gICAgICAgIGNyZWF0ZUNlbGwoY2VsbCwgaSwgdmFsdWUsIG9iaikge1xyXG4gICAgICAgICAgICBjZWxsLmlubmVySFRNTCA9IF9mLnN0cmlwSHRtbCh2YWx1ZSkuc2xpY2UoMCwgJCgnI3ZpLXdwYnVsa3ktc3ByZWFkc2hlZXQnKS5oYXNDbGFzcygndmktd3BidWxreS1zcHJlYWRzaGVldC13cmFwLW1vZGUnKT8gNTAwIDo1MCk7XHJcbiAgICAgICAgICAgIHJldHVybiBjZWxsO1xyXG4gICAgICAgIH0sXHJcblxyXG4gICAgICAgIGNsb3NlRWRpdG9yKGNlbGwsIHNhdmUpIHtcclxuICAgICAgICAgICAgd2luZG93LnZpSXNFZGl0aW5nID0gZmFsc2U7XHJcbiAgICAgICAgICAgIGxldCBjb250ZW50ID0gJyc7XHJcbiAgICAgICAgICAgIGlmIChzYXZlID09PSB0cnVlKSB7XHJcbiAgICAgICAgICAgICAgICBjb250ZW50ID0gd3AuZWRpdG9yLmdldENvbnRlbnQoJ3ZpLXdwYnVsa3ktdGV4dC1lZGl0b3InKTtcclxuXHJcbiAgICAgICAgICAgICAgICBpZiAoIXRoaXMuaXNFZGl0aW5nKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgd3AuZWRpdG9yLnJlbW92ZSgndmktd3BidWxreS10ZXh0LWVkaXRvcicpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgdGhpcy5pc0VkaXRpbmcgPSBmYWxzZTtcclxuICAgICAgICAgICAgfWVsc2Uge1xyXG4gICAgICAgICAgICAgICAgd3AuZWRpdG9yLnJlbW92ZSgndmktd3BidWxreS10ZXh0LWVkaXRvcicpO1xyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAkKCBcIiN2aS13cGJ1bGt5LXRleHQtZWRpdG9yXCIgKS52YWwoXCJcIik7XHJcblxyXG4gICAgICAgICAgICByZXR1cm4gY29udGVudDtcclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICBvcGVuRWRpdG9yKGNlbGwsIGVsLCBvYmopIHtcclxuICAgICAgICAgICAgd2luZG93LnZpSXNFZGl0aW5nID0gdHJ1ZTtcclxuICAgICAgICAgICAgbGV0IHkgPSBjZWxsLmdldEF0dHJpYnV0ZSgnZGF0YS15JyksXHJcbiAgICAgICAgICAgICAgICB4ID0gY2VsbC5nZXRBdHRyaWJ1dGUoJ2RhdGEteCcpLFxyXG4gICAgICAgICAgICAgICAgY29udGVudCA9IG9iai5vcHRpb25zLmRhdGFbeV1beF0sXHJcbiAgICAgICAgICAgICAgICAkdGhpcyA9IHRoaXM7XHJcblxyXG4gICAgICAgICAgICAkKCcudmktdWkubW9kYWwnKS5tb2RhbCgnc2hvdycpO1xyXG4gICAgICAgICAgICB0aGlzLnRpbnltY2VJbml0KGNvbnRlbnQpO1xyXG5cclxuICAgICAgICAgICAgJCgnLnZpLXdwYnVsa3ktdGV4dC1lZGl0b3Itc2F2ZScpLm9mZignY2xpY2snKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAkKHRoaXMpLnJlbW92ZUNsYXNzKCdwcmltYXJ5Jyk7XHJcbiAgICAgICAgICAgICAgICBpZiAoJCh0aGlzKS5oYXNDbGFzcygndmktd3BidWxreS1jbG9zZScpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgJCgnLnZpLXVpLm1vZGFsJykubW9kYWwoJ2hpZGUnKTtcclxuICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgJHRoaXMuaXNFZGl0aW5nID0gdHJ1ZTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIG9iai5jbG9zZUVkaXRvcihjZWxsLCB0cnVlKTtcclxuICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAkKCcudmktdWkubW9kYWwgLmNsb3NlLmljb24nKS5vZmYoJ2NsaWNrJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgb2JqLmNsb3NlRWRpdG9yKGNlbGwsIHRydWUpO1xyXG4gICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgIGxldCBtb2RhbCA9ICQoJy52aS11aS5tb2RhbCcpLnBhcmVudCgpO1xyXG4gICAgICAgICAgICBtb2RhbC5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgICAgICAgICAgaWYgKGUudGFyZ2V0ID09PSBlLmRlbGVnYXRlVGFyZ2V0KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgb2JqLmNsb3NlRWRpdG9yKGNlbGwsIGZhbHNlKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSlcclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICB1cGRhdGVDZWxsKGNlbGwsIHZhbHVlLCBmb3JjZSkge1xyXG4gICAgICAgICAgICBsZXQgZWRpdG9yVmFsdWUgPSB3cC5lZGl0b3IuZ2V0Q29udGVudCgndmktd3BidWxreS10ZXh0LWVkaXRvcicpO1xyXG4gICAgICAgICAgICBpZiAoIGVkaXRvclZhbHVlLnRyaW0oKS5sZW5ndGggPiAwICkge1xyXG4gICAgICAgICAgICAgICAgdmFsdWUgPSBlZGl0b3JWYWx1ZTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICBjZWxsLmlubmVySFRNTCA9IF9mLnN0cmlwSHRtbCh2YWx1ZSkuc2xpY2UoMCwgNTApO1xyXG4gICAgICAgICAgICByZXR1cm4gdmFsdWU7XHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgdGlueW1jZUluaXQoY29udGVudCA9ICcnKSB7XHJcbiAgICAgICAgICAgIGNvbnRlbnQgPSB3cC5lZGl0b3IuYXV0b3AoY29udGVudCk7XHJcbiAgICAgICAgICAgIGlmICh0aW55bWNlLmdldCgndmktd3BidWxreS10ZXh0LWVkaXRvcicpID09PSBudWxsKSB7XHJcbiAgICAgICAgICAgICAgICAkKCcjdmktd3BidWxreS10ZXh0LWVkaXRvcicpLnZhbChjb250ZW50KTtcclxuXHJcbiAgICAgICAgICAgICAgICBBdHRyaWJ1dGVzLnRpbnlNY2VPcHRpb25zLnRpbnltY2Uuc2V0dXAgPSBmdW5jdGlvbiAoZWRpdG9yKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgZWRpdG9yLm9uKCdrZXl1cCcsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICQoJy52aS13cGJ1bGt5LXRleHQtZWRpdG9yLXNhdmU6bm90KC52aS13cGJ1bGt5LWNsb3NlKScpLmFkZENsYXNzKCdwcmltYXJ5Jyk7XHJcbiAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICB9O1xyXG5cclxuICAgICAgICAgICAgICAgIHdwLmVkaXRvci5pbml0aWFsaXplKCd2aS13cGJ1bGt5LXRleHQtZWRpdG9yJywgQXR0cmlidXRlcy50aW55TWNlT3B0aW9ucyk7XHJcblxyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICB0aW55bWNlLmdldCgndmktd3BidWxreS10ZXh0LWVkaXRvcicpLnNldENvbnRlbnQoY29udGVudClcclxuICAgICAgICB9LFxyXG4gICAgfTtcclxuXHJcbiAgICBjdXN0b21Db2x1bW4uaW1hZ2UgPSB7XHJcbiAgICAgICAgY3JlYXRlQ2VsbChjZWxsLCBpLCB2YWx1ZSwgb2JqKSB7XHJcbiAgICAgICAgICAgIGlmICh2YWx1ZSkge1xyXG4gICAgICAgICAgICAgICAgbGV0IHVybCA9IEF0dHJpYnV0ZXMuaW1nU3RvcmFnZVt2YWx1ZV07XHJcbiAgICAgICAgICAgICAgICBfZi5pc1VybCh1cmwpID8gJChjZWxsKS5odG1sKGA8aW1nIHdpZHRoPVwiNDBcIiBzcmM9XCIke3VybH1cIiBkYXRhLWlkPVwiJHt2YWx1ZX1cIj5gKSA6ICQoY2VsbCkuaHRtbCgnJyk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgcmV0dXJuIGNlbGw7XHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgY2xvc2VFZGl0b3IoY2VsbCwgc2F2ZSkge1xyXG4gICAgICAgICAgICByZXR1cm4gJChjZWxsKS5maW5kKCdpbWcnKS5kYXRhKCdpZCcpIHx8ICcnO1xyXG4gICAgICAgIH0sXHJcblxyXG4gICAgICAgIG9wZW5FZGl0b3IoY2VsbCwgZWwsIG9iaikge1xyXG4gICAgICAgICAgICBtZWRpYVNpbmdsZS5vcGVuKCkub2ZmKCdzZWxlY3QnKS5vbignc2VsZWN0JywgZnVuY3Rpb24gKGUpIHtcclxuICAgICAgICAgICAgICAgIGxldCB1cGxvYWRlZEltYWdlcyA9IG1lZGlhU2luZ2xlLnN0YXRlKCkuZ2V0KCdzZWxlY3Rpb24nKS5maXJzdCgpO1xyXG4gICAgICAgICAgICAgICAgbGV0IHNlbGVjdGVkSW1hZ2VzID0gdXBsb2FkZWRJbWFnZXMudG9KU09OKCk7XHJcbiAgICAgICAgICAgICAgICBpZiAoX2YuaXNVcmwoc2VsZWN0ZWRJbWFnZXMudXJsKSkge1xyXG4gICAgICAgICAgICAgICAgICAgICQoY2VsbCkuaHRtbChgPGltZyB3aWR0aD1cIjQwXCIgc3JjPVwiJHtzZWxlY3RlZEltYWdlcy51cmx9XCIgZGF0YS1pZD1cIiR7c2VsZWN0ZWRJbWFnZXMuaWR9XCI+YCk7XHJcbiAgICAgICAgICAgICAgICAgICAgQXR0cmlidXRlcy5pbWdTdG9yYWdlW3NlbGVjdGVkSW1hZ2VzLmlkXSA9IHNlbGVjdGVkSW1hZ2VzLnVybDtcclxuICAgICAgICAgICAgICAgICAgICBvYmouY2xvc2VFZGl0b3IoY2VsbCwgdHJ1ZSk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH0sXHJcblxyXG4gICAgICAgIHVwZGF0ZUNlbGwoY2VsbCwgdmFsdWUsIGZvcmNlKSB7XHJcbiAgICAgICAgICAgIHZhbHVlID0gcGFyc2VJbnQodmFsdWUpIHx8ICcnO1xyXG4gICAgICAgICAgICBsZXQgdXJsID0gQXR0cmlidXRlcy5pbWdTdG9yYWdlW3ZhbHVlXTtcclxuICAgICAgICAgICAgX2YuaXNVcmwodXJsKSA/ICQoY2VsbCkuaHRtbChgPGltZyB3aWR0aD1cIjQwXCIgc3JjPVwiJHt1cmx9XCIgZGF0YS1pZD1cIiR7dmFsdWV9XCI+YCkgOiAkKGNlbGwpLmh0bWwoJycpO1xyXG4gICAgICAgICAgICByZXR1cm4gdmFsdWU7XHJcbiAgICAgICAgfSxcclxuICAgIH07XHJcblxyXG4gICAgY3VzdG9tQ29sdW1uLmltYWdldXJsID0ge1xyXG4gICAgICAgIGNyZWF0ZUNlbGwoY2VsbCwgaSwgdmFsdWUsIG9iaikge1xyXG4gICAgICAgICAgICBfZi5pc1VybCh2YWx1ZSkgPyAkKGNlbGwpLmh0bWwoYDxpbWcgd2lkdGg9XCI0MFwiIHNyYz1cIiR7dmFsdWV9XCIgPmApIDogJChjZWxsKS5odG1sKCcnKTtcclxuXHJcbiAgICAgICAgICAgIHJldHVybiBjZWxsO1xyXG4gICAgICAgIH0sXHJcblxyXG4gICAgICAgIGNsb3NlRWRpdG9yKGNlbGwsIHNhdmUpIHtcclxuICAgICAgICAgICAgcmV0dXJuICQoY2VsbCkuZmluZCgnaW1nJykuYXR0cignc3JjJykgfHwgJyc7XHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgb3BlbkVkaXRvcihjZWxsLCBlbCwgb2JqKSB7XHJcbiAgICAgICAgICAgIG1lZGlhU2luZ2xlLm9wZW4oKS5vZmYoJ3NlbGVjdCcpLm9uKCdzZWxlY3QnLCBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgICAgICAgICAgbGV0IHVwbG9hZGVkSW1hZ2VzID0gbWVkaWFTaW5nbGUuc3RhdGUoKS5nZXQoJ3NlbGVjdGlvbicpLmZpcnN0KCk7XHJcbiAgICAgICAgICAgICAgICBsZXQgc2VsZWN0ZWRJbWFnZXMgPSB1cGxvYWRlZEltYWdlcy50b0pTT04oKTtcclxuICAgICAgICAgICAgICAgIGlmIChfZi5pc1VybChzZWxlY3RlZEltYWdlcy51cmwpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgJChjZWxsKS5odG1sKGA8aW1nIHdpZHRoPVwiNDBcIiBzcmM9XCIke3NlbGVjdGVkSW1hZ2VzLnVybH1cIj5gKTtcclxuICAgICAgICAgICAgICAgICAgICBvYmouY2xvc2VFZGl0b3IoY2VsbCwgdHJ1ZSk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH0sXHJcblxyXG4gICAgICAgIHVwZGF0ZUNlbGwoY2VsbCwgdmFsdWUsIGZvcmNlKSB7XHJcbiAgICAgICAgICAgIF9mLmlzVXJsKHZhbHVlKSA/ICQoY2VsbCkuaHRtbChgPGltZyB3aWR0aD1cIjQwXCIgc3JjPVwiJHt2YWx1ZX1cIiA+YCkgOiAkKGNlbGwpLmh0bWwoJycpO1xyXG4gICAgICAgICAgICByZXR1cm4gdmFsdWU7XHJcbiAgICAgICAgfSxcclxuICAgIH07XHJcblxyXG4gICAgY3VzdG9tQ29sdW1uLmdhbGxlcnkgPSB7XHJcbiAgICAgICAgc2F2ZURhdGEoY2VsbCkge1xyXG4gICAgICAgICAgICBsZXQgbmV3SWRzID0gW107XHJcbiAgICAgICAgICAgICQoY2VsbCkuZmluZCgnLnZpLXdwYnVsa3ktZ2FsbGVyeS1pbWFnZScpLmVhY2goZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgbmV3SWRzLnB1c2goJCh0aGlzKS5kYXRhKCdpZCcpKTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICQoY2VsbCkuZmluZCgnLnZpLXdwYnVsa3ktaWRzLWxpc3QnKS52YWwobmV3SWRzLmpvaW4oJywnKSk7XHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgY3JlYXRlQ2VsbChjZWxsLCBpLCB2YWx1ZSkge1xyXG4gICAgICAgICAgICBsZXQgaGFzSXRlbSA9IHZhbHVlLmxlbmd0aCA/ICd2aS13cGJ1bGt5LWdhbGxlcnktaGFzLWl0ZW0nIDogJyc7XHJcbiAgICAgICAgICAgICQoY2VsbCkuaHRtbChgPGRpdiBjbGFzcz1cInZpLXdwYnVsa3ktZ2FsbGVyeSAke2hhc0l0ZW19XCI+PGkgY2xhc3M9XCJpbWFnZXMgb3V0bGluZSBpY29uXCI+IDwvaT48L2Rpdj5gKTtcclxuICAgICAgICAgICAgcmV0dXJuIGNlbGw7XHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgY2xvc2VFZGl0b3IoY2VsbCwgc2F2ZSkge1xyXG4gICAgICAgICAgICBsZXQgc2VsZWN0ZWQgPSBbXTtcclxuICAgICAgICAgICAgaWYgKHNhdmUpIHtcclxuICAgICAgICAgICAgICAgIGxldCBjaGlsZCA9ICQoY2VsbCkuY2hpbGRyZW4oKTtcclxuICAgICAgICAgICAgICAgIGNoaWxkLmZpbmQoJy52aS13cGJ1bGt5LWdhbGxlcnktaW1hZ2UnKS5lYWNoKGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgICAgICBzZWxlY3RlZC5wdXNoKCQodGhpcykuZGF0YSgnaWQnKSk7XHJcbiAgICAgICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgICAgICAkKGNlbGwpLmZpbmQoJy52aS13cGJ1bGt5LWNlbGwtcG9wdXAnKS5yZW1vdmUoKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICByZXR1cm4gc2VsZWN0ZWQ7XHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgb3BlbkVkaXRvcihjZWxsLCBlbCwgb2JqKSB7XHJcbiAgICAgICAgICAgIGxldCB5ID0gY2VsbC5nZXRBdHRyaWJ1dGUoJ2RhdGEteScpLFxyXG4gICAgICAgICAgICAgICAgeCA9IGNlbGwuZ2V0QXR0cmlidXRlKCdkYXRhLXgnKTtcclxuXHJcbiAgICAgICAgICAgIGxldCBpZHMgPSBvYmoub3B0aW9ucy5kYXRhW3ldW3hdLFxyXG4gICAgICAgICAgICAgICAgZWRpdG9yID0gX2YuY3JlYXRlRWRpdG9yKGNlbGwsICdkaXYnKSxcclxuICAgICAgICAgICAgICAgIGltYWdlcyA9ICcnLCBjYWNoZUVkaXRpb247XHJcblxyXG4gICAgICAgICAgICBpZiAoaWRzLmxlbmd0aCkge1xyXG4gICAgICAgICAgICAgICAgZm9yIChsZXQgaWQgb2YgaWRzKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGV0IHNyYyA9IEF0dHJpYnV0ZXMuaW1nU3RvcmFnZVtpZF07XHJcbiAgICAgICAgICAgICAgICAgICAgaW1hZ2VzICs9IHRtcGwuZ2FsbGVyeUltYWdlKHNyYywgaWQpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICBsZXQgZ2FsbGVyeVBvcHVwID0gJChgPGRpdiBjbGFzcz1cInZpLXdwYnVsa3ktY2VsbC1wb3B1cC1pbm5lclwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8dWwgY2xhc3M9XCJ2aS13cGJ1bGt5LWdhbGxlcnktaW1hZ2VzXCI+JHtpbWFnZXN9PC91bD5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHNwYW4gY2xhc3M9XCJ2aS11aSBidXR0b24gdGlueSB2aS13cGJ1bGt5LWFkZC1pbWFnZVwiPiR7X2YudGV4dCgnQWRkIGltYWdlJyl9PC9zcGFuPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8c3BhbiBjbGFzcz1cInZpLXVpIGJ1dHRvbiB0aW55IHZpLXdwYnVsa3ktcmVtb3ZlLWdhbGxlcnlcIj4ke19mLnRleHQoJ1JlbW92ZSBhbGwnKX08L3NwYW4+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+YCk7XHJcblxyXG4gICAgICAgICAgICAkKGVkaXRvcikuYXBwZW5kKGdhbGxlcnlQb3B1cCk7XHJcblxyXG4gICAgICAgICAgICBnYWxsZXJ5UG9wdXAuZmluZCgnLnZpLXdwYnVsa3ktZ2FsbGVyeS1pbWFnZXMnKS5zb3J0YWJsZSh7XHJcbiAgICAgICAgICAgICAgICBpdGVtczogJ2xpLnZpLXdwYnVsa3ktZ2FsbGVyeS1pbWFnZScsXHJcbiAgICAgICAgICAgICAgICBjdXJzb3I6ICdtb3ZlJyxcclxuICAgICAgICAgICAgICAgIHNjcm9sbFNlbnNpdGl2aXR5OiA0MCxcclxuICAgICAgICAgICAgICAgIGZvcmNlUGxhY2Vob2xkZXJTaXplOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgZm9yY2VIZWxwZXJTaXplOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgIGhlbHBlcjogJ2Nsb25lJyxcclxuICAgICAgICAgICAgICAgIHBsYWNlaG9sZGVyOiAndmktd3BidWxreS1zb3J0YWJsZS1wbGFjZWhvbGRlcicsXHJcbiAgICAgICAgICAgICAgICB0b2xlcmFuY2U6IFwicG9pbnRlclwiLFxyXG4gICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgIGdhbGxlcnlQb3B1cC5vbignY2xpY2snLCAnLnZpLXdwYnVsa3ktcmVtb3ZlLWltYWdlJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgJCh0aGlzKS5wYXJlbnQoKS5yZW1vdmUoKTtcclxuICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICBnYWxsZXJ5UG9wdXAub24oJ2NsaWNrJywgJy52aS13cGJ1bGt5LWFkZC1pbWFnZScsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgIG1lZGlhTXVsdGlwbGUub3BlbigpLm9mZignc2VsZWN0IGNsb3NlJylcclxuICAgICAgICAgICAgICAgICAgICAub24oJ3NlbGVjdCcsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhciBzZWxlY3Rpb24gPSBtZWRpYU11bHRpcGxlLnN0YXRlKCkuZ2V0KCdzZWxlY3Rpb24nKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0aW9uLmVhY2goZnVuY3Rpb24gKGF0dGFjaG1lbnQpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGF0dGFjaG1lbnQgPSBhdHRhY2htZW50LnRvSlNPTigpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKGF0dGFjaG1lbnQudHlwZSA9PT0gJ2ltYWdlJykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIEF0dHJpYnV0ZXMuaW1nU3RvcmFnZVthdHRhY2htZW50LmlkXSA9IGF0dGFjaG1lbnQudXJsO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGdhbGxlcnlQb3B1cC5maW5kKCcudmktd3BidWxreS1nYWxsZXJ5LWltYWdlcycpLmFwcGVuZCh0bXBsLmdhbGxlcnlJbWFnZShhdHRhY2htZW50LnVybCwgYXR0YWNobWVudC5pZCkpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICBnYWxsZXJ5UG9wdXAub24oJ2NsaWNrJywgJy52aS13cGJ1bGt5LXJlbW92ZS1nYWxsZXJ5JywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgZ2FsbGVyeVBvcHVwLmZpbmQoJy52aS13cGJ1bGt5LWdhbGxlcnktaW1hZ2VzJykuZW1wdHkoKTtcclxuICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICBpZiAoaWRzLmxlbmd0aCA9PT0gMCkge1xyXG4gICAgICAgICAgICAgICAgZ2FsbGVyeVBvcHVwLmZpbmQoJy52aS13cGJ1bGt5LWFkZC1pbWFnZScpLnRyaWdnZXIoJ2NsaWNrJyk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICB1cGRhdGVDZWxsKGNlbGwsIHZhbHVlLCBmb3JjZSkge1xyXG4gICAgICAgICAgICBsZXQgaWNvbiA9ICQoY2VsbCkuZmluZCgnLnZpLXdwYnVsa3ktZ2FsbGVyeScpO1xyXG4gICAgICAgICAgICB2YWx1ZS5sZW5ndGggPyBpY29uLmFkZENsYXNzKCd2aS13cGJ1bGt5LWdhbGxlcnktaGFzLWl0ZW0nKSA6IGljb24ucmVtb3ZlQ2xhc3MoJ3ZpLXdwYnVsa3ktZ2FsbGVyeS1oYXMtaXRlbScpO1xyXG4gICAgICAgICAgICByZXR1cm4gdmFsdWU7XHJcbiAgICAgICAgfSxcclxuICAgIH07XHJcblxyXG4gICAgY3VzdG9tQ29sdW1uLmRvd25sb2FkID0ge1xyXG4gICAgICAgIGNyZWF0ZUNlbGwoY2VsbCwgaSwgdmFsdWUpIHtcclxuICAgICAgICAgICAgJChjZWxsKS5odG1sKGA8ZGl2PjxpIGNsYXNzPVwiZG93bmxvYWQgaWNvblwiPiA8L2k+PC9kaXY+YCk7XHJcbiAgICAgICAgICAgIHJldHVybiBjZWxsO1xyXG4gICAgICAgIH0sXHJcblxyXG4gICAgICAgIGNsb3NlRWRpdG9yKGNlbGwsIHNhdmUpIHtcclxuICAgICAgICAgICAgbGV0IGRhdGEgPSBbXTtcclxuICAgICAgICAgICAgaWYgKHNhdmUpIHtcclxuICAgICAgICAgICAgICAgIGxldCBjaGlsZCA9ICQoY2VsbCkuY2hpbGRyZW4oKTtcclxuICAgICAgICAgICAgICAgIGNoaWxkLmZpbmQoJ3RhYmxlLnZpLXdwYnVsa3ktZmlsZXMtZG93bmxvYWQgdGJvZHkgdHInKS5lYWNoKGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgICAgICBsZXQgcm93ID0gJCh0aGlzKTtcclxuICAgICAgICAgICAgICAgICAgICBkYXRhLnB1c2goe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBpZDogcm93LmZpbmQoJy52aS13cGJ1bGt5LWZpbGUtaGFzaCcpLnZhbCgpLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBmaWxlOiByb3cuZmluZCgnLnZpLXdwYnVsa3ktZmlsZS11cmwnKS52YWwoKSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgbmFtZTogcm93LmZpbmQoJy52aS13cGJ1bGt5LWZpbGUtbmFtZScpLnZhbCgpXHJcbiAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgICAgICBjaGlsZC5yZW1vdmUoKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICByZXR1cm4gZGF0YTtcclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICBvcGVuRWRpdG9yKGNlbGwsIGVsLCBvYmopIHtcclxuXHJcbiAgICAgICAgICAgIGxldCB5ID0gY2VsbC5nZXRBdHRyaWJ1dGUoJ2RhdGEteScpLFxyXG4gICAgICAgICAgICAgICAgeCA9IGNlbGwuZ2V0QXR0cmlidXRlKCdkYXRhLXgnKTtcclxuXHJcbiAgICAgICAgICAgIGxldCBmaWxlcyA9IG9iai5vcHRpb25zLmRhdGFbeV1beF0sXHJcbiAgICAgICAgICAgICAgICBlZGl0b3IgPSBfZi5jcmVhdGVFZGl0b3IoY2VsbCwgJ2RpdicpLFxyXG4gICAgICAgICAgICAgICAgY2FjaGVFZGl0aW9uLCB0Ym9keSA9ICQoJzx0Ym9keT48L3Rib2R5PicpO1xyXG5cclxuICAgICAgICAgICAgaWYgKEFycmF5LmlzQXJyYXkoZmlsZXMpKSB7XHJcbiAgICAgICAgICAgICAgICBmb3IgKGxldCBmaWxlIG9mIGZpbGVzKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgdGJvZHkuYXBwZW5kKHRtcGwuZmlsZURvd25sb2FkKGZpbGUpKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgbGV0IGZpbGVEb3dubG9hZFBvcHVwID0gJChgPGRpdiBjbGFzcz1cIlwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHRhYmxlIGNsYXNzPVwidmktd3BidWxreS1maWxlcy1kb3dubG9hZCB2aS11aSBjZWxsZWQgdGFibGVcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8dGhlYWQ+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHRyPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8dGg+JHtfZi50ZXh0KCdOYW1lJyl9PC90aD5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHRoPiR7X2YudGV4dCgnRmlsZSBVUkwnKX08L3RoPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvdHI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC90aGVhZD5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvdGFibGU+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8c3BhbiBjbGFzcz1cInZpLXVpIGJ1dHRvbiB0aW55IHZpLXdwYnVsa3ktYWRkLWZpbGVcIj4ke19mLnRleHQoJ0FkZCBmaWxlJyl9PC9zcGFuPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5gKTtcclxuXHJcbiAgICAgICAgICAgIGZpbGVEb3dubG9hZFBvcHVwLmZpbmQoJy52aS13cGJ1bGt5LWZpbGVzLWRvd25sb2FkJykuYXBwZW5kKHRib2R5KTtcclxuXHJcbiAgICAgICAgICAgICQoZWRpdG9yKS5hcHBlbmQoZmlsZURvd25sb2FkUG9wdXApO1xyXG5cclxuICAgICAgICAgICAgdGJvZHkuc29ydGFibGUoKTtcclxuXHJcbiAgICAgICAgICAgIGZpbGVEb3dubG9hZFBvcHVwLm9uKCdjbGljaycsICcudmktd3BidWxreS1hZGQtZmlsZScsICgpID0+IGZpbGVEb3dubG9hZFBvcHVwLmZpbmQoJy52aS13cGJ1bGt5LWZpbGVzLWRvd25sb2FkIHRib2R5JykuYXBwZW5kKHRtcGwuZmlsZURvd25sb2FkKCkpKTtcclxuXHJcbiAgICAgICAgICAgIGZpbGVEb3dubG9hZFBvcHVwLm9uKCdjbGljaycsICcudmktd3BidWxreS1jaG9vc2UtZmlsZScsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgIGNhY2hlRWRpdGlvbiA9IG9iai5lZGl0aW9uO1xyXG4gICAgICAgICAgICAgICAgb2JqLmVkaXRpb24gPSBudWxsO1xyXG4gICAgICAgICAgICAgICAgbGV0IHJvdyA9ICQodGhpcykuY2xvc2VzdCgndHInKTtcclxuXHJcbiAgICAgICAgICAgICAgICBtZWRpYVNpbmdsZS5vcGVuKCkub2ZmKCdzZWxlY3QgY2xvc2UnKVxyXG4gICAgICAgICAgICAgICAgICAgIC5vbignc2VsZWN0JywgZnVuY3Rpb24gKGUpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgbGV0IHNlbGVjdGVkID0gbWVkaWFTaW5nbGUuc3RhdGUoKS5nZXQoJ3NlbGVjdGlvbicpLmZpcnN0KCkudG9KU09OKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmIChzZWxlY3RlZC51cmwpIHJvdy5maW5kKCcudmktd3BidWxreS1maWxlLXVybCcpLnZhbChzZWxlY3RlZC51cmwpLnRyaWdnZXIoJ2NoYW5nZScpO1xyXG4gICAgICAgICAgICAgICAgICAgIH0pXHJcbiAgICAgICAgICAgICAgICAgICAgLm9uKCdjbG9zZScsICgpID0+IG9iai5lZGl0aW9uID0gY2FjaGVFZGl0aW9uKTtcclxuICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICBpZiAoIWZpbGVzLmxlbmd0aCkge1xyXG4gICAgICAgICAgICAgICAgZmlsZURvd25sb2FkUG9wdXAuZmluZCgnLnZpLXdwYnVsa3ktYWRkLWZpbGUnKS50cmlnZ2VyKCdjbGljaycpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgdXBkYXRlQ2VsbChjZWxsLCB2YWx1ZSwgZm9yY2UpIHtcclxuICAgICAgICAgICAgJChjZWxsKS5odG1sKGA8ZGl2PjxpIGNsYXNzPVwiZG93bmxvYWQgaWNvblwiPiA8L2k+PC9kaXY+YCk7XHJcbiAgICAgICAgICAgIHJldHVybiB2YWx1ZTtcclxuICAgICAgICB9LFxyXG4gICAgfTtcclxuXHJcbiAgICBjdXN0b21Db2x1bW4ubGlua19wb3N0cyA9IHtcclxuICAgICAgICBjcmVhdGVDZWxsKGNlbGwsIGksIHZhbHVlLCBvYmopIHtcclxuICAgICAgICAgICAgX2YuZm9ybWF0VGV4dChjZWxsLCB2YWx1ZSk7XHJcbiAgICAgICAgICAgIHJldHVybiBjZWxsO1xyXG4gICAgICAgIH0sXHJcblxyXG4gICAgICAgIGNsb3NlRWRpdG9yKGNlbGwsIHNhdmUpIHtcclxuICAgICAgICAgICAgbGV0IGNoaWxkID0gJChjZWxsKS5jaGlsZHJlbigpLCBzZWxlY3RlZCA9IFtdO1xyXG5cclxuICAgICAgICAgICAgaWYgKHNhdmUpIHtcclxuICAgICAgICAgICAgICAgIGxldCBkYXRhID0gY2hpbGQuZmluZCgnc2VsZWN0Jykuc2VsZWN0MignZGF0YScpO1xyXG5cclxuICAgICAgICAgICAgICAgIGlmIChkYXRhLmxlbmd0aCkge1xyXG4gICAgICAgICAgICAgICAgICAgIGZvciAobGV0IGl0ZW0gb2YgZGF0YSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBzZWxlY3RlZC5wdXNoKHtpZDogaXRlbS5pZCwgdGV4dDogaXRlbS50ZXh0fSlcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIGNoaWxkLnJlbW92ZSgpO1xyXG4gICAgICAgICAgICAkKCcuc2VsZWN0Mi1jb250YWluZXInKS5yZW1vdmUoKTtcclxuICAgICAgICAgICAgcmV0dXJuIHNlbGVjdGVkO1xyXG4gICAgICAgIH0sXHJcblxyXG4gICAgICAgIG9wZW5FZGl0b3IoY2VsbCwgZWwsIG9iaikge1xyXG4gICAgICAgICAgICBsZXQgeSA9IGNlbGwuZ2V0QXR0cmlidXRlKCdkYXRhLXknKSxcclxuICAgICAgICAgICAgICAgIHggPSBjZWxsLmdldEF0dHJpYnV0ZSgnZGF0YS14Jyk7XHJcblxyXG4gICAgICAgICAgICBsZXQgdmFsdWUgPSBvYmoub3B0aW9ucy5kYXRhW3ldW3hdLFxyXG4gICAgICAgICAgICAgICAgZWRpdG9yID0gX2YuY3JlYXRlRWRpdG9yKGNlbGwsICdkaXYnKSxcclxuICAgICAgICAgICAgICAgIHNlbGVjdCA9ICQoJzxzZWxlY3QvPicpO1xyXG5cclxuICAgICAgICAgICAgJChlZGl0b3IpLmFwcGVuZChzZWxlY3QpO1xyXG5cclxuICAgICAgICAgICAgc2VsZWN0LnNlbGVjdDIoe1xyXG4gICAgICAgICAgICAgICAgZGF0YTogdmFsdWUsXHJcbiAgICAgICAgICAgICAgICBtdWx0aXBsZTogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIG1pbmltdW1JbnB1dExlbmd0aDogMyxcclxuICAgICAgICAgICAgICAgIHBsYWNlaG9sZGVyOiBfZi50ZXh0KCdTZWFyY2ggcG9zdHMuLi4nKSxcclxuICAgICAgICAgICAgICAgIGFqYXg6IHtcclxuICAgICAgICAgICAgICAgICAgICB1cmw6IEF0dHJpYnV0ZXMuYWpheFVybCxcclxuICAgICAgICAgICAgICAgICAgICB0eXBlOiAncG9zdCcsXHJcbiAgICAgICAgICAgICAgICAgICAgZGVsYXk6IDI1MCxcclxuICAgICAgICAgICAgICAgICAgICBkYXRhVHlwZTogJ2pzb24nLFxyXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IGZ1bmN0aW9uIChwYXJhbXMpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgcmV0dXJuIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC4uLkF0dHJpYnV0ZXMuYWpheERhdGEsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBzdWJfYWN0aW9uOiAnc2VhcmNoX3Bvc3RzJyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHNlYXJjaDogcGFyYW1zLnRlcm0sXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0eXBlOiAncHVibGljJ1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9O1xyXG4gICAgICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICAgICAgcHJvY2Vzc1Jlc3VsdHM6IGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhciB0ZXJtcyA9IFtdO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAoZGF0YSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJC5lYWNoKGRhdGEsIGZ1bmN0aW9uIChpZCwgdGV4dCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRlcm1zLnB1c2goe2lkOiBpZCwgdGV4dDogdGV4dH0pO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgcmV0dXJuIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHJlc3VsdHM6IHRlcm1zXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH07XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgIHNlbGVjdC5maW5kKCdvcHRpb24nKS5hdHRyKCdzZWxlY3RlZCcsIHRydWUpLnBhcmVudCgpLnRyaWdnZXIoJ2NoYW5nZScpO1xyXG4gICAgICAgICAgICAkKGVkaXRvcikuZmluZCgnLnNlbGVjdDItc2VhcmNoX19maWVsZCcpLnRyaWdnZXIoJ2NsaWNrJyk7XHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgdXBkYXRlQ2VsbChjZWxsLCB2YWx1ZSwgZm9yY2UsIG9iaiwgeCkge1xyXG4gICAgICAgICAgICBfZi5mb3JtYXRUZXh0KGNlbGwsIHZhbHVlKTtcclxuICAgICAgICAgICAgcmV0dXJuIHZhbHVlO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcblxyXG4gICAgY3VzdG9tQ29sdW1uLmFycmF5ID0ge1xyXG4gICAgICAgIGNyZWF0ZUNlbGwoY2VsbCwgaSwgdmFsdWUsIG9iaikge1xyXG4gICAgICAgICAgICAkKGNlbGwpLmh0bWwoJzxpIGNsYXNzPVwiaWNvbiBlZGl0XCIvPicpO1xyXG4gICAgICAgICAgICByZXR1cm4gY2VsbDtcclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICBjbG9zZUVkaXRvcihjZWxsLCBzYXZlKSB7XHJcbiAgICAgICAgICAgIGxldCBtZXRhZGF0YSA9IFtdO1xyXG4gICAgICAgICAgICBpZiAoc2F2ZSA9PT0gdHJ1ZSkge1xyXG4gICAgICAgICAgICAgICAgbWV0YWRhdGEgPSB0aGlzLmVkaXRvci5nZXQoKTtcclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgX2YucmVtb3ZlTW9kYWwoY2VsbCk7XHJcblxyXG4gICAgICAgICAgICByZXR1cm4gbWV0YWRhdGE7XHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgb3BlbkVkaXRvcihjZWxsLCBlbCwgb2JqKSB7XHJcbiAgICAgICAgICAgIGxldCBkYXRhID0gX2YuZ2V0RGF0YUZyb21DZWxsKG9iaiwgY2VsbCk7XHJcbiAgICAgICAgICAgIGxldCBtb2RhbCA9IF9mLmNyZWF0ZU1vZGFsKHtcclxuICAgICAgICAgICAgICAgIGhlYWRlcjogX2YudGV4dCgnRWRpdCBtZXRhZGF0YScpLFxyXG4gICAgICAgICAgICAgICAgY29udGVudDogJycsXHJcbiAgICAgICAgICAgICAgICBhY3Rpb25zOiBbe2NsYXNzOiAnc2F2ZS1tZXRhZGF0YScsIHRleHQ6IF9mLnRleHQoJ1NhdmUnKX1dLFxyXG4gICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgICQoY2VsbCkuYXBwZW5kKG1vZGFsKTtcclxuICAgICAgICAgICAgbW9kYWwuZmluZCgnLmNvbnRlbnQnKS5odG1sKCc8ZGl2IGlkPVwidmktd3BidWxreS1qc29uZWRpdG9yXCI+PC9kaXY+Jyk7XHJcbiAgICAgICAgICAgIGxldCBjb250YWluZXIgPSBtb2RhbC5maW5kKCcjdmktd3BidWxreS1qc29uZWRpdG9yJykuZ2V0KDApO1xyXG4gICAgICAgICAgICB0aGlzLmVkaXRvciA9IG5ldyBKU09ORWRpdG9yKGNvbnRhaW5lciwge2VuYWJsZVNvcnQ6IGZhbHNlLCBzZWFyY2g6IGZhbHNlLCBlbmFibGVUcmFuc2Zvcm06IGZhbHNlfSk7XHJcbiAgICAgICAgICAgIHRoaXMuZWRpdG9yLnNldChkYXRhKTtcclxuXHJcbiAgICAgICAgICAgIG1vZGFsLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgICAgICBsZXQgdGhpc1RhcmdldCA9ICQoZS50YXJnZXQpO1xyXG4gICAgICAgICAgICAgICAgaWYgKHRoaXNUYXJnZXQuaGFzQ2xhc3MoJ2Nsb3NlJykgfHwgdGhpc1RhcmdldC5oYXNDbGFzcygndmktd3BidWxreS1tb2RhbC1jb250YWluZXInKSkgb2JqLmNsb3NlRWRpdG9yKGNlbGwsIGZhbHNlKTtcclxuICAgICAgICAgICAgICAgIGlmICh0aGlzVGFyZ2V0Lmhhc0NsYXNzKCdzYXZlLW1ldGFkYXRhJykpIG9iai5jbG9zZUVkaXRvcihjZWxsLCB0cnVlKTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgdXBkYXRlQ2VsbChjZWxsLCB2YWx1ZSwgZm9yY2UpIHtcclxuICAgICAgICAgICAgcmV0dXJuIHZhbHVlO1xyXG4gICAgICAgIH0sXHJcbiAgICB9O1xyXG5cclxuICAgIGN1c3RvbUNvbHVtbi5zZWxlY3QyID0ge1xyXG4gICAgICAgIHR5cGU6ICdzZWxlY3QyJyxcclxuXHJcbiAgICAgICAgY3JlYXRlQ2VsbChjZWxsLCBpLCB2YWx1ZSwgb2JqKSB7XHJcbiAgICAgICAgICAgIGxldCB7c291cmNlfSA9IG9iai5vcHRpb25zLmNvbHVtbnNbaV0sIG5ld1ZhbHVlID0gW107XHJcbiAgICAgICAgICAgIGlmICghQXJyYXkuaXNBcnJheSh2YWx1ZSkpIHZhbHVlID0gT2JqZWN0LnZhbHVlcyh2YWx1ZSk7XHJcbiAgICAgICAgICAgIGlmIChBcnJheS5pc0FycmF5KHNvdXJjZSkgJiYgc291cmNlLmxlbmd0aCkgbmV3VmFsdWUgPSBzb3VyY2UuZmlsdGVyKGl0ZW0gPT4gdmFsdWUuaW5jbHVkZXMoaXRlbS5pZCkpO1xyXG4gICAgICAgICAgICBfZi5mb3JtYXRUZXh0KGNlbGwsIG5ld1ZhbHVlKTtcclxuICAgICAgICAgICAgcmV0dXJuIGNlbGw7XHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgb3BlbkVkaXRvcihjZWxsLCBlbCwgb2JqKSB7XHJcbiAgICAgICAgICAgIGxldCB5ID0gY2VsbC5nZXRBdHRyaWJ1dGUoJ2RhdGEteScpLFxyXG4gICAgICAgICAgICAgICAgeCA9IGNlbGwuZ2V0QXR0cmlidXRlKCdkYXRhLXgnKTtcclxuICAgICAgICAgICAgbGV0IHZhbHVlID0gb2JqLm9wdGlvbnMuZGF0YVt5XVt4XSxcclxuICAgICAgICAgICAgICAgIHNlbGVjdCA9ICQoJzxzZWxlY3QvPicpLFxyXG4gICAgICAgICAgICAgICAge3NvdXJjZSwgbXVsdGlwbGUsIHBsYWNlaG9sZGVyfSA9IG9iai5vcHRpb25zLmNvbHVtbnNbeF0sXHJcbiAgICAgICAgICAgICAgICBlZGl0b3IgPSBfZi5jcmVhdGVFZGl0b3IoY2VsbCwgJ2RpdicsIHNlbGVjdCk7XHJcblxyXG4gICAgICAgICAgICBzZWxlY3Quc2VsZWN0Mih7XHJcbiAgICAgICAgICAgICAgICBkYXRhOiBzb3VyY2UgfHwgW10sXHJcbiAgICAgICAgICAgICAgICBtdWx0aXBsZTogbXVsdGlwbGUsXHJcbiAgICAgICAgICAgICAgICBwbGFjZWhvbGRlcjogcGxhY2Vob2xkZXIsXHJcbiAgICAgICAgICAgIH0pO1xyXG5cclxuICAgICAgICAgICAgc2VsZWN0LnZhbCh2YWx1ZSkudHJpZ2dlcignY2hhbmdlJyk7XHJcbiAgICAgICAgICAgICQoZWRpdG9yKS5maW5kKCcuc2VsZWN0Mi1zZWFyY2hfX2ZpZWxkJykudHJpZ2dlcignY2xpY2snKTtcclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICBjbG9zZUVkaXRvcihjZWxsLCBzYXZlKSB7XHJcbiAgICAgICAgICAgIGxldCBjaGlsZCA9ICQoY2VsbCkuY2hpbGRyZW4oKSxcclxuICAgICAgICAgICAgICAgIGRhdGEgPSBjaGlsZC5maW5kKCdzZWxlY3QnKS52YWwoKTtcclxuXHJcbiAgICAgICAgICAgIGRhdGEgPSBkYXRhLm1hcChpdGVtID0+ICFpc05hTihpdGVtKSA/ICtpdGVtIDogaXRlbSk7XHJcblxyXG4gICAgICAgICAgICBjaGlsZC5yZW1vdmUoKTtcclxuICAgICAgICAgICAgJCgnLnNlbGVjdDItY29udGFpbmVyJykucmVtb3ZlKCk7XHJcblxyXG4gICAgICAgICAgICByZXR1cm4gZGF0YTtcclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICB1cGRhdGVDZWxsKGNlbGwsIHZhbHVlLCBmb3JjZSwgb2JqLCB4KSB7XHJcbiAgICAgICAgICAgIGxldCB7c291cmNlfSA9IG9iai5vcHRpb25zLmNvbHVtbnNbeF0sIG5ld1ZhbHVlID0gW107XHJcblxyXG4gICAgICAgICAgICBpZiAoQXJyYXkuaXNBcnJheShzb3VyY2UpICYmIHNvdXJjZS5sZW5ndGgpIG5ld1ZhbHVlID0gc291cmNlLmZpbHRlcihpdGVtID0+IHZhbHVlLmluY2x1ZGVzKGl0ZW0uaWQpKTtcclxuXHJcbiAgICAgICAgICAgIF9mLmZvcm1hdFRleHQoY2VsbCwgbmV3VmFsdWUpO1xyXG5cclxuICAgICAgICAgICAgcmV0dXJuIHZhbHVlO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcblxyXG5cclxuICAgIGN1c3RvbUNvbHVtbi5hamF4X3NlYXJjaCA9IHtcclxuICAgICAgICB0eXBlOiAnYWpheF9zZWFyY2gnLFxyXG5cclxuICAgICAgICBjcmVhdGVDZWxsKGNlbGwsIGksIHZhbHVlLCBvYmopIHtcclxuICAgICAgICAgICAgX2YuZm9ybWF0VGV4dChjZWxsLCB2YWx1ZSk7XHJcbiAgICAgICAgICAgIHJldHVybiBjZWxsO1xyXG4gICAgICAgIH0sXHJcblxyXG4gICAgICAgIG9wZW5FZGl0b3IoY2VsbCwgZWwsIG9iaikge1xyXG4gICAgICAgICAgICBsZXQgeSA9IGNlbGwuZ2V0QXR0cmlidXRlKCdkYXRhLXknKSxcclxuICAgICAgICAgICAgICAgIHggPSBjZWxsLmdldEF0dHJpYnV0ZSgnZGF0YS14JyksXHJcbiAgICAgICAgICAgICAgICB7dGF4b25vbXl9ID0gdGhpcy5vcHRpb25zO1xyXG5cclxuICAgICAgICAgICAgbGV0IHZhbHVlID0gb2JqLm9wdGlvbnMuZGF0YVt5XVt4XSxcclxuICAgICAgICAgICAgICAgIHNlbGVjdCA9ICQoJzxzZWxlY3QvPicpLFxyXG4gICAgICAgICAgICAgICAgZWRpdG9yID0gX2YuY3JlYXRlRWRpdG9yKGNlbGwsICdkaXYnLCBzZWxlY3QpO1xyXG5cclxuICAgICAgICAgICAgc2VsZWN0LnNlbGVjdDIoe1xyXG4gICAgICAgICAgICAgICAgZGF0YTogdmFsdWUsXHJcbiAgICAgICAgICAgICAgICBtdWx0aXBsZTogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIG1pbmltdW1JbnB1dExlbmd0aDogMyxcclxuICAgICAgICAgICAgICAgIHBsYWNlaG9sZGVyOiBfZi50ZXh0KCdTZWFyY2ggLi4uJyksXHJcbiAgICAgICAgICAgICAgICBhamF4OiB7XHJcbiAgICAgICAgICAgICAgICAgICAgdXJsOiBBdHRyaWJ1dGVzLmFqYXhVcmwsXHJcbiAgICAgICAgICAgICAgICAgICAgdHlwZTogJ1BPU1QnLFxyXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IGZ1bmN0aW9uIChwYXJhbXMpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgcmV0dXJuIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC4uLkF0dHJpYnV0ZXMuYWpheERhdGEsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBzdWJfYWN0aW9uOiAnYWpheF9zZWFyY2gnLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGF4b25vbXk6IHRheG9ub215LFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgc2VhcmNoOiBwYXJhbXMudGVybSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHBvc3RfdHlwZTogQXR0cmlidXRlcy5wb3N0VHlwZSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgfTtcclxuICAgICAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgICAgIHByb2Nlc3NSZXN1bHRzOiBmdW5jdGlvbiAoZGF0YSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICByZXR1cm4ge3Jlc3VsdHM6IGRhdGF9O1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICBzZWxlY3QuZmluZCgnb3B0aW9uJykuYXR0cignc2VsZWN0ZWQnLCB0cnVlKS5wYXJlbnQoKS50cmlnZ2VyKCdjaGFuZ2UnKTtcclxuXHJcbiAgICAgICAgICAgICQoZWRpdG9yKS5maW5kKCcuc2VsZWN0Mi1zZWFyY2hfX2ZpZWxkJykudHJpZ2dlcignY2xpY2snKTtcclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICBjbG9zZUVkaXRvcihjZWxsLCBzYXZlKSB7XHJcbiAgICAgICAgICAgIGxldCBjaGlsZCA9ICQoY2VsbCkuY2hpbGRyZW4oKSxcclxuICAgICAgICAgICAgICAgIGRhdGEgPSBjaGlsZC5maW5kKCdzZWxlY3QnKS5zZWxlY3QyKCdkYXRhJyksXHJcbiAgICAgICAgICAgICAgICBzZWxlY3RlZCA9IFtdO1xyXG5cclxuICAgICAgICAgICAgaWYgKGRhdGEubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICBmb3IgKGxldCBpdGVtIG9mIGRhdGEpIHtcclxuICAgICAgICAgICAgICAgICAgICBzZWxlY3RlZC5wdXNoKHtpZDogaXRlbS5pZCwgdGV4dDogaXRlbS50ZXh0fSlcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICBjaGlsZC5yZW1vdmUoKTtcclxuICAgICAgICAgICAgJCgnLnNlbGVjdDItY29udGFpbmVyJykucmVtb3ZlKCk7XHJcbiAgICAgICAgICAgIHJldHVybiBzZWxlY3RlZDtcclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICB1cGRhdGVDZWxsKGNlbGwsIHZhbHVlLCBmb3JjZSwgb2JqLCB4KSB7XHJcbiAgICAgICAgICAgIF9mLmZvcm1hdFRleHQoY2VsbCwgdmFsdWUpO1xyXG4gICAgICAgICAgICByZXR1cm4gdmFsdWU7XHJcbiAgICAgICAgfVxyXG4gICAgfTtcclxuXHJcbi8vLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0vL1xyXG4gICAgY29sdW1uRmlsdGVyLnNvdXJjZUZvclZhcmlhdGlvbiA9IChlbCwgY2VsbCwgeCwgeSwgb2JqKSA9PiB7XHJcbiAgICAgICAgbGV0IHNvdXJjZSA9IG9iai5vcHRpb25zLmNvbHVtbnNbeF0uc291cmNlO1xyXG4gICAgICAgIGxldCBwb3N0VHlwZSA9IF9mLmdldFBvc3RUeXBlRnJvbUNlbGwoY2VsbCk7XHJcbiAgICAgICAgaWYgKHBvc3RUeXBlID09PSAndmFyaWF0aW9uJykge1xyXG4gICAgICAgICAgICBzb3VyY2UgPSBvYmoub3B0aW9ucy5jb2x1bW5zW3hdLnN1YlNvdXJjZTtcclxuICAgICAgICB9XHJcbiAgICAgICAgcmV0dXJuIHNvdXJjZTtcclxuICAgIH07XHJcblxyXG5cclxufSk7XHJcblxyXG5leHBvcnQge2N1c3RvbUNvbHVtbiwgY29sdW1uRmlsdGVyfTsiLCJpbXBvcnQgeyR9IGZyb20gXCIuL2F0dHJpYnV0ZXNcIjtcclxuaW1wb3J0IF9mIGZyb20gJy4vZnVuY3Rpb25zJztcclxuaW1wb3J0IHtQb3B1cH0gZnJvbSBcIi4vbW9kYWwtcG9wdXBcIjtcclxuXHJcbmV4cG9ydCBkZWZhdWx0IGNsYXNzIEZpbmRBbmRSZXBsYWNlIHtcclxuICAgIGNvbnN0cnVjdG9yKG9iaiwgeCwgeSwgZSkge1xyXG4gICAgICAgIHRoaXMuX2RhdGEgPSB7fTtcclxuICAgICAgICB0aGlzLl9kYXRhLmpleGNlbCA9IG9iajtcclxuICAgICAgICB0aGlzLl9kYXRhLnggPSBwYXJzZUludCh4KTtcclxuICAgICAgICB0aGlzLl9kYXRhLnkgPSBwYXJzZUludCh5KTtcclxuICAgICAgICB0aGlzLnJ1bigpO1xyXG4gICAgfVxyXG5cclxuICAgIGdldChpZCkge1xyXG4gICAgICAgIHJldHVybiB0aGlzLl9kYXRhW2lkXSB8fCAnJztcclxuICAgIH1cclxuXHJcbiAgICBydW4oKSB7XHJcbiAgICAgICAgbGV0IGZvcm11bGFIdG1sID0gdGhpcy5jb250ZW50KCk7XHJcbiAgICAgICAgbGV0IGNlbGwgPSAkKGB0ZFtkYXRhLXg9JHt0aGlzLmdldCgneCcpIHx8IDB9XVtkYXRhLXk9JHt0aGlzLmdldCgneScpIHx8IDB9XWApO1xyXG4gICAgICAgIG5ldyBQb3B1cChmb3JtdWxhSHRtbCwgY2VsbCk7XHJcbiAgICAgICAgZm9ybXVsYUh0bWwub24oJ2NsaWNrJywgJy52aS13cGJ1bGt5LWFwcGx5LWZvcm11bGEnLCB0aGlzLmFwcGx5Rm9ybXVsYS5iaW5kKHRoaXMpKTtcclxuICAgIH1cclxuXHJcbiAgICBjb250ZW50KCkge1xyXG4gICAgICAgIHJldHVybiAkKGA8ZGl2IGNsYXNzPVwidmktd3BidWxreS1mb3JtdWxhLWNvbnRhaW5lclwiPlxyXG4gICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJmaWVsZFwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8aW5wdXQgdHlwZT1cInRleHRcIiBwbGFjZWhvbGRlcj1cIiR7X2YudGV4dCgnRmluZCcpfVwiIGNsYXNzPVwidmktd3BidWxreS1maW5kLXN0cmluZ1wiPlxyXG4gICAgICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJmaWVsZFwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8aW5wdXQgdHlwZT1cInRleHRcIiBwbGFjZWhvbGRlcj1cIiR7X2YudGV4dCgnUmVwbGFjZScpfVwiIGNsYXNzPVwidmktd3BidWxreS1yZXBsYWNlLXN0cmluZ1wiPlxyXG4gICAgICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICAgICAgICAgIDxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwidmktdWkgYnV0dG9uIG1pbmkgdmktd3BidWxreS1hcHBseS1mb3JtdWxhXCI+JHtfZi50ZXh0KCdSZXBsYWNlJyl9PC9idXR0b24+XHJcbiAgICAgICAgICAgICAgICA8L2Rpdj5gKTtcclxuICAgIH1cclxuXHJcbiAgICBhcHBseUZvcm11bGEoZSkge1xyXG4gICAgICAgIGxldCBmb3JtID0gJChlLnRhcmdldCkuY2xvc2VzdCgnLnZpLXdwYnVsa3ktZm9ybXVsYS1jb250YWluZXInKSxcclxuICAgICAgICAgICAgZmluZFN0cmluZyA9IGZvcm0uZmluZCgnLnZpLXdwYnVsa3ktZmluZC1zdHJpbmcnKS52YWwoKSxcclxuICAgICAgICAgICAgcmVwbGFjZVN0cmluZyA9IGZvcm0uZmluZCgnLnZpLXdwYnVsa3ktcmVwbGFjZS1zdHJpbmcnKS52YWwoKSxcclxuICAgICAgICAgICAgZXhjZWxPYmogPSB0aGlzLmdldCgnamV4Y2VsJyk7XHJcblxyXG4gICAgICAgIGlmICghZmluZFN0cmluZykgcmV0dXJuO1xyXG5cclxuICAgICAgICBsZXQgYnJlYWtDb250cm9sID0gZmFsc2UsIHJlY29yZHMgPSBbXTtcclxuICAgICAgICBsZXQgaCA9IGV4Y2VsT2JqLnNlbGVjdGVkQ29udGFpbmVyO1xyXG4gICAgICAgIGxldCBzdGFydCA9IGhbMV0sIGVuZCA9IGhbM10sIHggPSBoWzBdO1xyXG5cclxuICAgICAgICBmb3IgKGxldCB5ID0gc3RhcnQ7IHkgPD0gZW5kOyB5KyspIHtcclxuICAgICAgICAgICAgaWYgKGV4Y2VsT2JqLnJlY29yZHNbeV1beF0gJiYgIWV4Y2VsT2JqLnJlY29yZHNbeV1beF0uY2xhc3NMaXN0LmNvbnRhaW5zKCdyZWFkb25seScpICYmIGV4Y2VsT2JqLnJlY29yZHNbeV1beF0uc3R5bGUuZGlzcGxheSAhPT0gJ25vbmUnICYmIGJyZWFrQ29udHJvbCA9PT0gZmFsc2UpIHtcclxuICAgICAgICAgICAgICAgIGxldCB2YWx1ZSA9IGV4Y2VsT2JqLm9wdGlvbnMuZGF0YVt5XVt4XTtcclxuICAgICAgICAgICAgICAgIGxldCBuZXdWYWx1ZSA9IHZhbHVlLnJlcGxhY2VBbGwoZmluZFN0cmluZywgcmVwbGFjZVN0cmluZyk7XHJcbiAgICAgICAgICAgICAgICByZWNvcmRzLnB1c2goZXhjZWxPYmoudXBkYXRlQ2VsbCh4LCB5LCBuZXdWYWx1ZSkpO1xyXG4gICAgICAgICAgICAgICAgZXhjZWxPYmoudXBkYXRlRm9ybXVsYUNoYWluKHgsIHksIHJlY29yZHMpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICAvLyBVcGRhdGUgaGlzdG9yeVxyXG4gICAgICAgIGV4Y2VsT2JqLnNldEhpc3Rvcnkoe1xyXG4gICAgICAgICAgICBhY3Rpb246ICdzZXRWYWx1ZScsXHJcbiAgICAgICAgICAgIHJlY29yZHM6IHJlY29yZHMsXHJcbiAgICAgICAgICAgIHNlbGVjdGlvbjogZXhjZWxPYmouc2VsZWN0ZWRDZWxsLFxyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvLyBVcGRhdGUgdGFibGUgd2l0aCBjdXN0b20gY29uZmlndXJhdGlvbiBpZiBhcHBsaWNhYmxlXHJcbiAgICAgICAgZXhjZWxPYmoudXBkYXRlVGFibGUoKTtcclxuICAgIH1cclxuXHJcbn0iLCJpbXBvcnQgeyQsIEF0dHJpYnV0ZXMsIEkxOG59IGZyb20gXCIuL2F0dHJpYnV0ZXNcIjtcclxuaW1wb3J0IFRlbXBsYXRlcyBmcm9tIFwiLi90ZW1wbGF0ZXNcIjtcclxuXHJcbmNvbnN0IF9mID0ge1xyXG4gICAgc2V0SmV4Y2VsKG9iaikge1xyXG4gICAgICAgIHRoaXMuamV4Y2VsID0gb2JqO1xyXG4gICAgfSxcclxuXHJcbiAgICB0ZXh0KGtleSkge1xyXG4gICAgICAgIHJldHVybiBJMThuW2tleV0gfHwga2V5O1xyXG4gICAgfSxcclxuXHJcbiAgICBpc1VybDogKHVybCkgPT4ge1xyXG4gICAgICAgIHJldHVybiAvXihodHRwKHM/KTopXFwvXFwvLipcXC4oPzpqcGd8anBlZ3xnaWZ8cG5nfHdlYnB8c3ZnfGF2aWYpJC9pLnRlc3QodXJsKTtcclxuICAgIH0sXHJcblxyXG4gICAgZm9ybWF0VGV4dChjZWxsLCB2YWx1ZSkge1xyXG4gICAgICAgIGxldCB0ZXh0ID0gJyc7XHJcbiAgICAgICAgaWYgKHZhbHVlLmxlbmd0aCkge1xyXG4gICAgICAgICAgICBmb3IgKGxldCBrID0gMDsgayA8IHZhbHVlLmxlbmd0aDsgaysrKSB7XHJcbiAgICAgICAgICAgICAgICBpZiAodmFsdWVba10pIHRleHQgKz0gdmFsdWVba10udGV4dCArICc7ICc7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICAgICAgY2VsbC5pbm5lclRleHQgPSB0ZXh0O1xyXG4gICAgfSxcclxuXHJcbiAgICBjcmVhdGVFZGl0b3IoY2VsbCwgdHlwZSwgY29udGVudCA9ICcnLCBkaXNwbGF5ID0gdHJ1ZSkge1xyXG4gICAgICAgIGxldCBlZGl0b3IgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KHR5cGUpO1xyXG5cclxuICAgICAgICBpZiAodHlwZSA9PT0gJ2RpdicpIHtcclxuICAgICAgICAgICAgJChlZGl0b3IpLmFwcGVuZChjb250ZW50KTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGVkaXRvci5zdHlsZS5taW5XaWR0aCA9ICczMDBweCc7XHJcblxyXG4gICAgICAgIGxldCBwb3B1cEhlaWdodCA9ICQoZWRpdG9yKS5pbm5lckhlaWdodCgpLFxyXG4gICAgICAgICAgICBzdGFnZSA9ICQoY2VsbCkub2Zmc2V0KCksXHJcbiAgICAgICAgICAgIHggPSBzdGFnZS5sZWZ0LFxyXG4gICAgICAgICAgICB5ID0gc3RhZ2UudG9wLFxyXG4gICAgICAgICAgICBjZWxsV2lkdGggPSAkKGNlbGwpLmlubmVyV2lkdGgoKSxcclxuICAgICAgICAgICAgaW5mbyA9IGNlbGwuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCk7XHJcblxyXG4gICAgICAgIGlmIChkaXNwbGF5KSB7XHJcbiAgICAgICAgICAgIGVkaXRvci5zdHlsZS5taW5IZWlnaHQgPSAoaW5mby5oZWlnaHQgLSAyKSArICdweCc7XHJcbiAgICAgICAgICAgIGVkaXRvci5zdHlsZS5tYXhIZWlnaHQgPSAod2luZG93LmlubmVySGVpZ2h0IC0geSAtIDUwKSArICdweCc7XHJcbiAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgZWRpdG9yLnN0eWxlLm9wYWNpdHkgPSAwO1xyXG4gICAgICAgICAgICBlZGl0b3Iuc3R5bGUuZm9udFNpemUgPSAwO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgZWRpdG9yLmNsYXNzTGlzdC5hZGQoJ3ZpLXVpJywgJ3NlZ21lbnQnLCAndmktd3BidWxreS1jZWxsLXBvcHVwJywgJ3ZpLXdwYnVsa3ktZWRpdGluZycpO1xyXG4gICAgICAgIGNlbGwuY2xhc3NMaXN0LmFkZCgnZWRpdG9yJyk7XHJcbiAgICAgICAgY2VsbC5hcHBlbmRDaGlsZChlZGl0b3IpO1xyXG5cclxuICAgICAgICBsZXQgcG9wdXBXaWR0aCA9ICQoZWRpdG9yKS5pbm5lcldpZHRoKCk7XHJcblxyXG4gICAgICAgIGlmICgkKHRoaXMuamV4Y2VsLmVsKS5pbm5lcldpZHRoKCkgPCB4ICsgcG9wdXBXaWR0aCArIGNlbGxXaWR0aCkge1xyXG4gICAgICAgICAgICBsZXQgbGVmdCA9IHggLSBwb3B1cFdpZHRoID4gMCA/IHggLSBwb3B1cFdpZHRoIDogMTA7XHJcbiAgICAgICAgICAgICQoZWRpdG9yKS5jc3MoJ2xlZnQnLCBsZWZ0ICsgJ3B4Jyk7XHJcbiAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgJChlZGl0b3IpLmNzcygnbGVmdCcsICh4ICsgY2VsbFdpZHRoKSArICdweCcpO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgaWYgKHdpbmRvdy5pbm5lckhlaWdodCA8IHkgKyBwb3B1cEhlaWdodCkge1xyXG4gICAgICAgICAgICBsZXQgaCA9IHkgLSBwb3B1cEhlaWdodCA8IDAgPyAwIDogeSAtIHBvcHVwSGVpZ2h0O1xyXG4gICAgICAgICAgICAkKGVkaXRvcikuY3NzKCd0b3AnLCBoICsgJ3B4Jyk7XHJcbiAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgJChlZGl0b3IpLmNzcygndG9wJywgeSArICdweCcpO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgcmV0dXJuIGVkaXRvcjtcclxuICAgIH0sXHJcblxyXG4gICAgY3JlYXRlTW9kYWwoZGF0YSA9IHt9KSB7XHJcbiAgICAgICAgbGV0IHthY3Rpb25zfSA9IGRhdGE7XHJcbiAgICAgICAgbGV0IGFjdGlvbnNIdG1sID0gJyc7XHJcblxyXG4gICAgICAgIGlmIChBcnJheS5pc0FycmF5KGFjdGlvbnMpKSB7XHJcbiAgICAgICAgICAgIGZvciAobGV0IGl0ZW0gb2YgYWN0aW9ucykge1xyXG4gICAgICAgICAgICAgICAgYWN0aW9uc0h0bWwgKz0gYDxzcGFuIGNsYXNzPVwiJHtpdGVtLmNsYXNzfSB2aS11aSBidXR0b24gdGlueVwiPiR7aXRlbS50ZXh0fTwvc3Bhbj5gO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICByZXR1cm4gJChUZW1wbGF0ZXMubW9kYWwoey4uLmRhdGEsIGFjdGlvbnNIdG1sfSkpO1xyXG4gICAgfSxcclxuXHJcbiAgICByZW1vdmVNb2RhbChjZWxsKSB7XHJcbiAgICAgICAgJChjZWxsKS5maW5kKCcudmktd3BidWxreS1tb2RhbC1jb250YWluZXInKS5yZW1vdmUoKTtcclxuICAgICAgICAkKCcuc2VsZWN0Mi1jb250YWluZXItLW9wZW4nKS5yZW1vdmUoKTtcclxuICAgIH0sXHJcblxyXG4gICAgZ2V0Q29sRnJvbUNvbHVtblR5cGUoY29sVHlwZSkge1xyXG4gICAgICAgIHJldHVybiBBdHRyaWJ1dGVzLmlkTWFwcGluZ0ZsaXBbY29sVHlwZV0gfHwgJyc7XHJcbiAgICB9LFxyXG5cclxuICAgIGdldFBvc3RUeXBlRnJvbUNlbGwoY2VsbCkge1xyXG4gICAgICAgIGxldCB5ID0gY2VsbC5nZXRBdHRyaWJ1dGUoJ2RhdGEteScpO1xyXG4gICAgICAgIGxldCB4ID0gdGhpcy5nZXRDb2xGcm9tQ29sdW1uVHlwZSgncG9zdF90eXBlJyk7XHJcbiAgICAgICAgcmV0dXJuIHRoaXMuamV4Y2VsLm9wdGlvbnMuZGF0YVt5XVt4XTtcclxuICAgIH0sXHJcblxyXG4gICAgZ2V0UG9zdFR5cGVGcm9tWSh5KSB7XHJcbiAgICAgICAgbGV0IHggPSB0aGlzLmdldENvbEZyb21Db2x1bW5UeXBlKCdwb3N0X3R5cGUnKTtcclxuICAgICAgICByZXR1cm4gdGhpcy5qZXhjZWwub3B0aW9ucy5kYXRhW3ldW3hdO1xyXG4gICAgfSxcclxuXHJcbiAgICBnZXRDb2x1bW5UeXBlKHgpIHtcclxuICAgICAgICByZXR1cm4gQXR0cmlidXRlcy5pZE1hcHBpbmdbeF1cclxuICAgIH0sXHJcblxyXG4gICAgc3RyaXBIdG1sKGNvbnRlbnQpIHtcclxuICAgICAgICByZXR1cm4gJChgPGRpdj4ke2NvbnRlbnR9PC9kaXY+YCkudGV4dCgpO1xyXG4gICAgfSxcclxuXHJcbiAgICBnZXREYXRhRnJvbUNlbGwob2JqLCBjZWxsKSB7XHJcbiAgICAgICAgbGV0IHkgPSBjZWxsLmdldEF0dHJpYnV0ZSgnZGF0YS15JyksXHJcbiAgICAgICAgICAgIHggPSBjZWxsLmdldEF0dHJpYnV0ZSgnZGF0YS14Jyk7XHJcbiAgICAgICAgcmV0dXJuIG9iai5vcHRpb25zLmRhdGFbeV1beF07XHJcbiAgICB9LFxyXG5cclxuICAgIGdldFBvc3RJZE9mQ2VsbChvYmosIHRhcmdldCkge1xyXG4gICAgICAgIGlmICh0eXBlb2YgdGFyZ2V0ID09PSAnb2JqZWN0Jykge1xyXG4gICAgICAgICAgICBsZXQgeSA9IHRhcmdldC5nZXRBdHRyaWJ1dGUoJ2RhdGEteScpO1xyXG4gICAgICAgICAgICByZXR1cm4gb2JqLm9wdGlvbnMuZGF0YVt5XVswXTtcclxuICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICByZXR1cm4gb2JqLm9wdGlvbnMuZGF0YVt0YXJnZXRdWzBdO1xyXG4gICAgICAgIH1cclxuICAgIH0sXHJcblxyXG4gICAgYWpheChhcmdzID0ge30pIHtcclxuICAgICAgICBsZXQgb3B0aW9ucyA9IE9iamVjdC5hc3NpZ24oe1xyXG4gICAgICAgICAgICB1cmw6IHdwYnVsa3lQYXJhbXMuYWpheFVybCxcclxuICAgICAgICAgICAgdHlwZTogJ3Bvc3QnLFxyXG4gICAgICAgICAgICBkYXRhVHlwZTogJ2pzb24nLFxyXG4gICAgICAgIH0sIGFyZ3MpO1xyXG5cclxuICAgICAgICBvcHRpb25zLmRhdGEuYWN0aW9uID0gJ3ZpX3dwYnVsa3lfYWpheCc7XHJcbiAgICAgICAgb3B0aW9ucy5kYXRhLnZpX3dwYnVsa3lfbm9uY2UgPSB3cGJ1bGt5UGFyYW1zLm5vbmNlO1xyXG4gICAgICAgIG9wdGlvbnMuZGF0YS5wb3N0X3R5cGUgPSB3cGJ1bGt5UGFyYW1zLnBvc3RUeXBlO1xyXG5cclxuICAgICAgICAkLmFqYXgob3B0aW9ucyk7XHJcblxyXG4gICAgfSxcclxuXHJcbiAgICBwYWdpbmF0aW9uKG1heFBhZ2UsIGN1cnJlbnRQYWdlKSB7XHJcbiAgICAgICAgY3VycmVudFBhZ2UgPSBwYXJzZUludChjdXJyZW50UGFnZSk7XHJcbiAgICAgICAgbWF4UGFnZSA9IHBhcnNlSW50KG1heFBhZ2UpO1xyXG4gICAgICAgIGxldCBwYWdpbmF0aW9uID0gJycsXHJcbiAgICAgICAgICAgIHByZXZpb3VzQXJyb3cgPSBgPGEgY2xhc3M9XCJpdGVtICR7Y3VycmVudFBhZ2UgPT09IDEgPyAnZGlzYWJsZWQnIDogJyd9XCIgZGF0YS1wYWdlPVwiJHtjdXJyZW50UGFnZSAtIDF9XCI+PGkgY2xhc3M9XCJpY29uIGFuZ2xlIGxlZnRcIj4gPC9pPjwvYT5gLFxyXG4gICAgICAgICAgICBuZXh0QXJyb3cgPSBgPGEgY2xhc3M9XCJpdGVtICR7Y3VycmVudFBhZ2UgPT09IG1heFBhZ2UgPyAnZGlzYWJsZWQnIDogJyd9XCIgZGF0YS1wYWdlPVwiJHtjdXJyZW50UGFnZSArIDF9XCI+PGkgY2xhc3M9XCJpY29uIGFuZ2xlIHJpZ2h0XCI+IDwvaT48L2E+YCxcclxuICAgICAgICAgICAgZ29Ub1BhZ2UgPSBgPGlucHV0IHR5cGU9XCJudW1iZXJcIiBjbGFzcz1cInZpLXdwYnVsa3ktZ28tdG8tcGFnZVwiIHZhbHVlPVwiJHtjdXJyZW50UGFnZX1cIiBtaW49XCIxXCIgbWF4PVwiJHttYXhQYWdlfVwiLz5gO1xyXG5cclxuICAgICAgICBmb3IgKGxldCBpID0gMTsgaSA8PSBtYXhQYWdlOyBpKyspIHtcclxuICAgICAgICAgICAgaWYgKFsxLCBjdXJyZW50UGFnZSAtIDEsIGN1cnJlbnRQYWdlLCBjdXJyZW50UGFnZSArIDEsIG1heFBhZ2VdLmluY2x1ZGVzKGkpKSB7XHJcbiAgICAgICAgICAgICAgICBwYWdpbmF0aW9uICs9IGA8YSBjbGFzcz1cIml0ZW0gJHtjdXJyZW50UGFnZSA9PT0gaSA/ICdhY3RpdmUnIDogJyd9XCIgZGF0YS1wYWdlPVwiJHtpfVwiPiR7aX08L2E+YDtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICBpZiAoaSA9PT0gY3VycmVudFBhZ2UgLSAyICYmIGN1cnJlbnRQYWdlIC0gMiA+IDEpIHBhZ2luYXRpb24gKz0gYDxhIGNsYXNzPVwiaXRlbSBkaXNhYmxlZFwiPi4uLjwvYT5gO1xyXG4gICAgICAgICAgICBpZiAoaSA9PT0gY3VycmVudFBhZ2UgKyAyICYmIGN1cnJlbnRQYWdlICsgMiA8IG1heFBhZ2UpIHBhZ2luYXRpb24gKz0gYDxhIGNsYXNzPVwiaXRlbSBkaXNhYmxlZFwiPi4uLjwvYT5gO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgcmV0dXJuIGA8ZGl2IGNsYXNzPVwidmktdWkgcGFnaW5hdGlvbiBtZW51XCI+JHtwcmV2aW91c0Fycm93fSAke3BhZ2luYXRpb259ICR7bmV4dEFycm93fSA8L2Rpdj4gJHtnb1RvUGFnZX1gO1xyXG4gICAgfSxcclxuXHJcbiAgICBzcGlubmVyKCkge1xyXG4gICAgICAgIHJldHVybiAkKCc8c3BhbiBjbGFzcz1cInZpLXdwYnVsa3ktc3Bpbm5lclwiPjxzcGFuIGNsYXNzPVwidmktd3BidWxreS1zcGlubmVyLWlubmVyXCI+IDwvc3Bhbj48L3NwYW4+JylcclxuICAgIH0sXHJcblxyXG4gICAgaXNfbG9hZGluZygpIHtcclxuICAgICAgICByZXR1cm4gISF0aGlzLl9zcGlubmVyO1xyXG4gICAgfSxcclxuXHJcbiAgICBsb2FkaW5nKCkge1xyXG4gICAgICAgIHRoaXMuX3NwaW5uZXIgPSB0aGlzLnNwaW5uZXIoKTtcclxuICAgICAgICAkKCcudmktd3BidWxreS1tZW51LWJhci1jZW50ZXInKS5odG1sKHRoaXMuX3NwaW5uZXIpO1xyXG4gICAgfSxcclxuXHJcbiAgICByZW1vdmVMb2FkaW5nKCkge1xyXG4gICAgICAgIHRoaXMuX3NwaW5uZXIgPSBudWxsO1xyXG4gICAgICAgICQoJy52aS13cGJ1bGt5LW1lbnUtYmFyLWNlbnRlcicpLmh0bWwoJycpO1xyXG4gICAgfSxcclxuXHJcbiAgICBub3RpY2UodGV4dCwgY29sb3IgPSAnYmxhY2snKSB7XHJcbiAgICAgICAgbGV0IGNvbnRlbnQgPSAkKGA8ZGl2IGNsYXNzPVwidmktd3BidWxreS1ub3RpY2VcIiBzdHlsZT1cImNvbG9yOiR7Y29sb3J9XCI+JHt0ZXh0fTwvZGl2PmApO1xyXG4gICAgICAgICQoJy52aS13cGJ1bGt5LW1lbnUtYmFyLWNlbnRlcicpLmh0bWwoY29udGVudCk7XHJcbiAgICAgICAgc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIGNvbnRlbnQucmVtb3ZlKCk7XHJcbiAgICAgICAgfSwgNTAwMCk7XHJcbiAgICB9LFxyXG5cclxuICAgIHNob3dNZXNzYWdlKHt0aXRsZSA9ICcnLCBtZXNzYWdlID0gJycsIHR5cGUgPSAncG9zaXRpdmUnLCBkdXJhdGlvbiA9IDMwMDB9KSB7XHJcbiAgICBjb25zdCBtYWluID0gJCggXCIjdmktd3BidWxreS1jb250YWluZXJcIiApLmZpbmQoIFwiI3ZpLWh1aS10b2FzdFwiICk7XHJcbiAgICBpZiAoIG1haW4uZ2V0KDApICkge1xyXG4gICAgICAgIGNvbnN0IHRvYXN0ID0gJCggXCI8ZGl2PjwvZGl2PlwiICk7XHJcbiAgICAgICAgY29uc3QgYXV0b1JlbW92ZVRvYXN0ID0gc2V0VGltZW91dCggZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICBtYWluLmZpbmQoIFwiLnZpLXVpLm1lc3NhZ2VcIiApLnJlbW92ZSgpO1xyXG4gICAgICAgIH0sIGR1cmF0aW9uICsgMTAwMCApO1xyXG5cclxuICAgICAgICB0b2FzdC5vbiggXCJjbGlja1wiLCBcIi5pY29uLmNsb3NlXCIsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgIG1haW4uZmluZCggXCIudmktdWkubWVzc2FnZVwiICkucmVtb3ZlKCk7XHJcbiAgICAgICAgICAgIGNsZWFyVGltZW91dCggYXV0b1JlbW92ZVRvYXN0ICk7XHJcbiAgICAgICAgfSApO1xyXG5cclxuICAgICAgICBpZiAoIG1haW4uY2hpbGRyZW4oKS5sZW5ndGggPiAwICkge1xyXG4gICAgICAgICAgICBtYWluLmZpbmQoIFwiLnZpLWh1aS10b2FzdFwiICkuZmlyc3QoKS5yZW1vdmUoKTtcclxuICAgICAgICAgICAgY2xlYXJUaW1lb3V0KCBhdXRvUmVtb3ZlVG9hc3QgKTtcclxuICAgICAgICB9XHJcbiAgICAgICAgY29uc3QgZGVsYXkgPSAoZHVyYXRpb24gLyAxMDAwKS50b0ZpeGVkKDIpO1xyXG5cclxuICAgICAgICBpZiAoJCgnaHRtbCcpLmF0dHIoJ2RpcicpID09PSAncnRsJykge1xyXG4gICAgICAgICAgICB0b2FzdC5jc3MoIHsgXCJhbmltYXRpb25cIjogYHNsaWRlSW5SaWdodCBlYXNlIC4zcywgZmFkZU91dCBsaW5lYXIgMXMgJHtkZWxheX1zIGZvcndhcmRzYCB9ICk7XHJcbiAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgdG9hc3QuY3NzKCB7IFwiYW5pbWF0aW9uXCI6IGBzbGlkZUluTGVmdCBlYXNlIC4zcywgZmFkZU91dCBsaW5lYXIgMXMgJHtkZWxheX1zIGZvcndhcmRzYCB9ICk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICB0b2FzdC5hZGRDbGFzcyggYHZpLXVpICR7dHlwZX0gbWVzc2FnZWAgKTtcclxuICAgICAgICB0b2FzdC5odG1sKFxyXG4gICAgICAgICAgICBgPGkgY2xhc3M9XCJjbG9zZSBpY29uXCI+PC9pPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJoZWFkZXJcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICR7dGl0bGV9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgPHA+JHttZXNzYWdlfTwvcD5gXHJcbiAgICAgICAgKTtcclxuXHJcbiAgICAgICAgaWYgKCBtYWluLmNoaWxkcmVuKCkubGVuZ3RoID4gMCApIHtcclxuICAgICAgICAgICAgbGV0IGZpcnN0RWxlVHlwZSA9IG1haW4uZmluZCggXCIudmktdWkubWVzc2FnZVwiICkuZmlyc3QoKS5hdHRyKCBcImNsYXNzXCIgKS5zcGxpdCgvXFxzKy8pWzFdO1xyXG4gICAgICAgICAgICBpZiAoIHR5cGUgIT09IGZpcnN0RWxlVHlwZSApIHtcclxuICAgICAgICAgICAgICAgIG1haW4uYXBwZW5kKCB0b2FzdCApO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfWVsc2Uge1xyXG4gICAgICAgICAgICBtYWluLmFwcGVuZCggdG9hc3QgKTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcbn1cclxufTtcclxuXHJcbmV4cG9ydCBkZWZhdWx0IF9mOyIsImltcG9ydCB7JH0gZnJvbSAnLi9hdHRyaWJ1dGVzJztcclxuXHJcbmNsYXNzIE1vZGFsIHtcclxuICAgIGNvbnN0cnVjdG9yKCkge1xyXG5cclxuICAgIH1cclxufVxyXG5cclxubGV0IHBvcHVwSW5zdGFuY2UgPSBudWxsO1xyXG5cclxuY2xhc3MgUG9wdXAge1xyXG4gICAgY29uc3RydWN0b3IoY29udGVudCwgY2VsbCkge1xyXG4gICAgICAgIGlmICghcG9wdXBJbnN0YW5jZSkge1xyXG4gICAgICAgICAgICAkKCdib2R5Jykub24oJ21vdXNlZG93biBrZXlkb3duJywgdGhpcy5tb3VzZWRvd24pO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgcG9wdXBJbnN0YW5jZSA9IHRoaXM7XHJcblxyXG4gICAgICAgIHJldHVybiB0aGlzLnJlbmRlcihjb250ZW50LCAkKGNlbGwpKTtcclxuICAgIH1cclxuXHJcbiAgICBtb3VzZWRvd24oZSkge1xyXG4gICAgICAgIGxldCB0aGlzVGFyZ2V0ID0gJChlLnRhcmdldCksXHJcbiAgICAgICAgICAgIHBvcHVwID0gJCgnLnZpLXdwYnVsa3ktY29udGV4dC1wb3B1cCcpO1xyXG5cclxuICAgICAgICBpZiAoZS53aGljaD09PTI3IHx8ICF0aGlzVGFyZ2V0Lmhhc0NsYXNzKCd2aS13cGJ1bGt5LWNvbnRleHQtcG9wdXAnKSAmJiB0aGlzVGFyZ2V0LmNsb3Nlc3QoJy52aS13cGJ1bGt5LWNvbnRleHQtcG9wdXAnKS5sZW5ndGggPT09IDAgJiYgcG9wdXAuaGFzQ2xhc3MoJ3ZpLXdwYnVsa3ktcG9wdXAtYWN0aXZlJykpIHtcclxuICAgICAgICAgICAgcG9wdXAuZW1wdHkoKS5yZW1vdmVDbGFzcygndmktd3BidWxreS1wb3B1cC1hY3RpdmUnKTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcblxyXG4gICAgcmVuZGVyKGNvbnRlbnQsIGNlbGwpIHtcclxuICAgICAgICBsZXQgcG9wdXAgPSAkKCcudmktd3BidWxreS1jb250ZXh0LXBvcHVwJyksXHJcbiAgICAgICAgICAgIHBvcHVwV2lkdGggPSBwb3B1cC5pbm5lcldpZHRoKCksXHJcbiAgICAgICAgICAgIHBvcHVwSGVpZ2h0ID0gcG9wdXAuaW5uZXJIZWlnaHQoKSxcclxuICAgICAgICAgICAgc3RhZ2UgPSBjZWxsLm9mZnNldCgpLFxyXG4gICAgICAgICAgICB4ID0gc3RhZ2UubGVmdCwgeSA9IHN0YWdlLnRvcCxcclxuICAgICAgICAgICAgY2VsbFdpZHRoID0gY2VsbC5pbm5lcldpZHRoKCk7XHJcblxyXG4gICAgICAgIGlmICh3aW5kb3cuaW5uZXJXaWR0aCA8IHggKyBwb3B1cFdpZHRoICsgY2VsbFdpZHRoKSB7XHJcbiAgICAgICAgICAgIGxldCBsZWZ0ID0geCAtIHBvcHVwV2lkdGggPiAwID8geCAtIHBvcHVwV2lkdGggOiAxMDtcclxuICAgICAgICAgICAgcG9wdXAuY3NzKCdsZWZ0JywgbGVmdCArICdweCcpO1xyXG4gICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgIHBvcHVwLmNzcygnbGVmdCcsICh4ICsgY2VsbFdpZHRoKSArICdweCcpO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgaWYgKHdpbmRvdy5pbm5lckhlaWdodCA8IHkgKyBwb3B1cEhlaWdodCkge1xyXG4gICAgICAgICAgICBsZXQgaCA9IHkgLSBwb3B1cEhlaWdodCA8IDAgPyAwIDogeSAtIHBvcHVwSGVpZ2h0O1xyXG4gICAgICAgICAgICBwb3B1cC5jc3MoJ3RvcCcsIGggKyAncHgnKTtcclxuICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICBwb3B1cC5jc3MoJ3RvcCcsIHkgKyAncHgnKTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIHBvcHVwLmVtcHR5KCk7XHJcbiAgICAgICAgcG9wdXAuYWRkQ2xhc3MoJ3ZpLXdwYnVsa3ktcG9wdXAtYWN0aXZlJykuaHRtbChjb250ZW50KTtcclxuICAgIH1cclxufVxyXG5cclxuZXhwb3J0IHtNb2RhbCwgUG9wdXB9IiwiLyohIEBsaWNlbnNlIERPTVB1cmlmeSAzLjAuMiB8IChjKSBDdXJlNTMgYW5kIG90aGVyIGNvbnRyaWJ1dG9ycyB8IFJlbGVhc2VkIHVuZGVyIHRoZSBBcGFjaGUgbGljZW5zZSAyLjAgYW5kIE1vemlsbGEgUHVibGljIExpY2Vuc2UgMi4wIHwgZ2l0aHViLmNvbS9jdXJlNTMvRE9NUHVyaWZ5L2Jsb2IvMy4wLjIvTElDRU5TRSAqL1xyXG5cclxuKGZ1bmN0aW9uIChnbG9iYWwsIGZhY3RvcnkpIHtcclxuICB0eXBlb2YgZXhwb3J0cyA9PT0gJ29iamVjdCcgJiYgdHlwZW9mIG1vZHVsZSAhPT0gJ3VuZGVmaW5lZCcgPyBtb2R1bGUuZXhwb3J0cyA9IGZhY3RvcnkoKSA6XHJcbiAgdHlwZW9mIGRlZmluZSA9PT0gJ2Z1bmN0aW9uJyAmJiBkZWZpbmUuYW1kID8gZGVmaW5lKGZhY3RvcnkpIDpcclxuICAoZ2xvYmFsID0gdHlwZW9mIGdsb2JhbFRoaXMgIT09ICd1bmRlZmluZWQnID8gZ2xvYmFsVGhpcyA6IGdsb2JhbCB8fCBzZWxmLCBnbG9iYWwuRE9NUHVyaWZ5ID0gZmFjdG9yeSgpKTtcclxufSkodGhpcywgKGZ1bmN0aW9uICgpIHsgJ3VzZSBzdHJpY3QnO1xyXG5cclxuICBjb25zdCB7XHJcbiAgICBlbnRyaWVzLFxyXG4gICAgc2V0UHJvdG90eXBlT2YsXHJcbiAgICBpc0Zyb3plbixcclxuICAgIGdldFByb3RvdHlwZU9mLFxyXG4gICAgZ2V0T3duUHJvcGVydHlEZXNjcmlwdG9yXHJcbiAgfSA9IE9iamVjdDtcclxuICBsZXQge1xyXG4gICAgZnJlZXplLFxyXG4gICAgc2VhbCxcclxuICAgIGNyZWF0ZVxyXG4gIH0gPSBPYmplY3Q7IC8vIGVzbGludC1kaXNhYmxlLWxpbmUgaW1wb3J0L25vLW11dGFibGUtZXhwb3J0c1xyXG5cclxuICBsZXQge1xyXG4gICAgYXBwbHksXHJcbiAgICBjb25zdHJ1Y3RcclxuICB9ID0gdHlwZW9mIFJlZmxlY3QgIT09ICd1bmRlZmluZWQnICYmIFJlZmxlY3Q7XHJcblxyXG4gIGlmICghYXBwbHkpIHtcclxuICAgIGFwcGx5ID0gZnVuY3Rpb24gYXBwbHkoZnVuLCB0aGlzVmFsdWUsIGFyZ3MpIHtcclxuICAgICAgcmV0dXJuIGZ1bi5hcHBseSh0aGlzVmFsdWUsIGFyZ3MpO1xyXG4gICAgfTtcclxuICB9XHJcblxyXG4gIGlmICghZnJlZXplKSB7XHJcbiAgICBmcmVlemUgPSBmdW5jdGlvbiBmcmVlemUoeCkge1xyXG4gICAgICByZXR1cm4geDtcclxuICAgIH07XHJcbiAgfVxyXG5cclxuICBpZiAoIXNlYWwpIHtcclxuICAgIHNlYWwgPSBmdW5jdGlvbiBzZWFsKHgpIHtcclxuICAgICAgcmV0dXJuIHg7XHJcbiAgICB9O1xyXG4gIH1cclxuXHJcbiAgaWYgKCFjb25zdHJ1Y3QpIHtcclxuICAgIGNvbnN0cnVjdCA9IGZ1bmN0aW9uIGNvbnN0cnVjdChGdW5jLCBhcmdzKSB7XHJcbiAgICAgIHJldHVybiBuZXcgRnVuYyguLi5hcmdzKTtcclxuICAgIH07XHJcbiAgfVxyXG5cclxuICBjb25zdCBhcnJheUZvckVhY2ggPSB1bmFwcGx5KEFycmF5LnByb3RvdHlwZS5mb3JFYWNoKTtcclxuICBjb25zdCBhcnJheVBvcCA9IHVuYXBwbHkoQXJyYXkucHJvdG90eXBlLnBvcCk7XHJcbiAgY29uc3QgYXJyYXlQdXNoID0gdW5hcHBseShBcnJheS5wcm90b3R5cGUucHVzaCk7XHJcbiAgY29uc3Qgc3RyaW5nVG9Mb3dlckNhc2UgPSB1bmFwcGx5KFN0cmluZy5wcm90b3R5cGUudG9Mb3dlckNhc2UpO1xyXG4gIGNvbnN0IHN0cmluZ1RvU3RyaW5nID0gdW5hcHBseShTdHJpbmcucHJvdG90eXBlLnRvU3RyaW5nKTtcclxuICBjb25zdCBzdHJpbmdNYXRjaCA9IHVuYXBwbHkoU3RyaW5nLnByb3RvdHlwZS5tYXRjaCk7XHJcbiAgY29uc3Qgc3RyaW5nUmVwbGFjZSA9IHVuYXBwbHkoU3RyaW5nLnByb3RvdHlwZS5yZXBsYWNlKTtcclxuICBjb25zdCBzdHJpbmdJbmRleE9mID0gdW5hcHBseShTdHJpbmcucHJvdG90eXBlLmluZGV4T2YpO1xyXG4gIGNvbnN0IHN0cmluZ1RyaW0gPSB1bmFwcGx5KFN0cmluZy5wcm90b3R5cGUudHJpbSk7XHJcbiAgY29uc3QgcmVnRXhwVGVzdCA9IHVuYXBwbHkoUmVnRXhwLnByb3RvdHlwZS50ZXN0KTtcclxuICBjb25zdCB0eXBlRXJyb3JDcmVhdGUgPSB1bmNvbnN0cnVjdChUeXBlRXJyb3IpO1xyXG4gIGZ1bmN0aW9uIHVuYXBwbHkoZnVuYykge1xyXG4gICAgcmV0dXJuIGZ1bmN0aW9uICh0aGlzQXJnKSB7XHJcbiAgICAgIGZvciAodmFyIF9sZW4gPSBhcmd1bWVudHMubGVuZ3RoLCBhcmdzID0gbmV3IEFycmF5KF9sZW4gPiAxID8gX2xlbiAtIDEgOiAwKSwgX2tleSA9IDE7IF9rZXkgPCBfbGVuOyBfa2V5KyspIHtcclxuICAgICAgICBhcmdzW19rZXkgLSAxXSA9IGFyZ3VtZW50c1tfa2V5XTtcclxuICAgICAgfVxyXG5cclxuICAgICAgcmV0dXJuIGFwcGx5KGZ1bmMsIHRoaXNBcmcsIGFyZ3MpO1xyXG4gICAgfTtcclxuICB9XHJcbiAgZnVuY3Rpb24gdW5jb25zdHJ1Y3QoZnVuYykge1xyXG4gICAgcmV0dXJuIGZ1bmN0aW9uICgpIHtcclxuICAgICAgZm9yICh2YXIgX2xlbjIgPSBhcmd1bWVudHMubGVuZ3RoLCBhcmdzID0gbmV3IEFycmF5KF9sZW4yKSwgX2tleTIgPSAwOyBfa2V5MiA8IF9sZW4yOyBfa2V5MisrKSB7XHJcbiAgICAgICAgYXJnc1tfa2V5Ml0gPSBhcmd1bWVudHNbX2tleTJdO1xyXG4gICAgICB9XHJcblxyXG4gICAgICByZXR1cm4gY29uc3RydWN0KGZ1bmMsIGFyZ3MpO1xyXG4gICAgfTtcclxuICB9XHJcbiAgLyogQWRkIHByb3BlcnRpZXMgdG8gYSBsb29rdXAgdGFibGUgKi9cclxuXHJcbiAgZnVuY3Rpb24gYWRkVG9TZXQoc2V0LCBhcnJheSwgdHJhbnNmb3JtQ2FzZUZ1bmMpIHtcclxuICAgIHRyYW5zZm9ybUNhc2VGdW5jID0gdHJhbnNmb3JtQ2FzZUZ1bmMgPyB0cmFuc2Zvcm1DYXNlRnVuYyA6IHN0cmluZ1RvTG93ZXJDYXNlO1xyXG5cclxuICAgIGlmIChzZXRQcm90b3R5cGVPZikge1xyXG4gICAgICAvLyBNYWtlICdpbicgYW5kIHRydXRoeSBjaGVja3MgbGlrZSBCb29sZWFuKHNldC5jb25zdHJ1Y3RvcilcclxuICAgICAgLy8gaW5kZXBlbmRlbnQgb2YgYW55IHByb3BlcnRpZXMgZGVmaW5lZCBvbiBPYmplY3QucHJvdG90eXBlLlxyXG4gICAgICAvLyBQcmV2ZW50IHByb3RvdHlwZSBzZXR0ZXJzIGZyb20gaW50ZXJjZXB0aW5nIHNldCBhcyBhIHRoaXMgdmFsdWUuXHJcbiAgICAgIHNldFByb3RvdHlwZU9mKHNldCwgbnVsbCk7XHJcbiAgICB9XHJcblxyXG4gICAgbGV0IGwgPSBhcnJheS5sZW5ndGg7XHJcblxyXG4gICAgd2hpbGUgKGwtLSkge1xyXG4gICAgICBsZXQgZWxlbWVudCA9IGFycmF5W2xdO1xyXG5cclxuICAgICAgaWYgKHR5cGVvZiBlbGVtZW50ID09PSAnc3RyaW5nJykge1xyXG4gICAgICAgIGNvbnN0IGxjRWxlbWVudCA9IHRyYW5zZm9ybUNhc2VGdW5jKGVsZW1lbnQpO1xyXG5cclxuICAgICAgICBpZiAobGNFbGVtZW50ICE9PSBlbGVtZW50KSB7XHJcbiAgICAgICAgICAvLyBDb25maWcgcHJlc2V0cyAoZS5nLiB0YWdzLmpzLCBhdHRycy5qcykgYXJlIGltbXV0YWJsZS5cclxuICAgICAgICAgIGlmICghaXNGcm96ZW4oYXJyYXkpKSB7XHJcbiAgICAgICAgICAgIGFycmF5W2xdID0gbGNFbGVtZW50O1xyXG4gICAgICAgICAgfVxyXG5cclxuICAgICAgICAgIGVsZW1lbnQgPSBsY0VsZW1lbnQ7XHJcbiAgICAgICAgfVxyXG4gICAgICB9XHJcblxyXG4gICAgICBzZXRbZWxlbWVudF0gPSB0cnVlO1xyXG4gICAgfVxyXG5cclxuICAgIHJldHVybiBzZXQ7XHJcbiAgfVxyXG4gIC8qIFNoYWxsb3cgY2xvbmUgYW4gb2JqZWN0ICovXHJcblxyXG4gIGZ1bmN0aW9uIGNsb25lKG9iamVjdCkge1xyXG4gICAgY29uc3QgbmV3T2JqZWN0ID0gY3JlYXRlKG51bGwpO1xyXG5cclxuICAgIGZvciAoY29uc3QgW3Byb3BlcnR5LCB2YWx1ZV0gb2YgZW50cmllcyhvYmplY3QpKSB7XHJcbiAgICAgIG5ld09iamVjdFtwcm9wZXJ0eV0gPSB2YWx1ZTtcclxuICAgIH1cclxuXHJcbiAgICByZXR1cm4gbmV3T2JqZWN0O1xyXG4gIH1cclxuICAvKiBUaGlzIG1ldGhvZCBhdXRvbWF0aWNhbGx5IGNoZWNrcyBpZiB0aGUgcHJvcCBpcyBmdW5jdGlvblxyXG4gICAqIG9yIGdldHRlciBhbmQgYmVoYXZlcyBhY2NvcmRpbmdseS4gKi9cclxuXHJcbiAgZnVuY3Rpb24gbG9va3VwR2V0dGVyKG9iamVjdCwgcHJvcCkge1xyXG4gICAgd2hpbGUgKG9iamVjdCAhPT0gbnVsbCkge1xyXG4gICAgICBjb25zdCBkZXNjID0gZ2V0T3duUHJvcGVydHlEZXNjcmlwdG9yKG9iamVjdCwgcHJvcCk7XHJcblxyXG4gICAgICBpZiAoZGVzYykge1xyXG4gICAgICAgIGlmIChkZXNjLmdldCkge1xyXG4gICAgICAgICAgcmV0dXJuIHVuYXBwbHkoZGVzYy5nZXQpO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgaWYgKHR5cGVvZiBkZXNjLnZhbHVlID09PSAnZnVuY3Rpb24nKSB7XHJcbiAgICAgICAgICByZXR1cm4gdW5hcHBseShkZXNjLnZhbHVlKTtcclxuICAgICAgICB9XHJcbiAgICAgIH1cclxuXHJcbiAgICAgIG9iamVjdCA9IGdldFByb3RvdHlwZU9mKG9iamVjdCk7XHJcbiAgICB9XHJcblxyXG4gICAgZnVuY3Rpb24gZmFsbGJhY2tWYWx1ZShlbGVtZW50KSB7XHJcbiAgICAgIGNvbnNvbGUud2FybignZmFsbGJhY2sgdmFsdWUgZm9yJywgZWxlbWVudCk7XHJcbiAgICAgIHJldHVybiBudWxsO1xyXG4gICAgfVxyXG5cclxuICAgIHJldHVybiBmYWxsYmFja1ZhbHVlO1xyXG4gIH1cclxuXHJcbiAgY29uc3QgaHRtbCQxID0gZnJlZXplKFsnYScsICdhYmJyJywgJ2Fjcm9ueW0nLCAnYWRkcmVzcycsICdhcmVhJywgJ2FydGljbGUnLCAnYXNpZGUnLCAnYXVkaW8nLCAnYicsICdiZGknLCAnYmRvJywgJ2JpZycsICdibGluaycsICdibG9ja3F1b3RlJywgJ2JvZHknLCAnYnInLCAnYnV0dG9uJywgJ2NhbnZhcycsICdjYXB0aW9uJywgJ2NlbnRlcicsICdjaXRlJywgJ2NvZGUnLCAnY29sJywgJ2NvbGdyb3VwJywgJ2NvbnRlbnQnLCAnZGF0YScsICdkYXRhbGlzdCcsICdkZCcsICdkZWNvcmF0b3InLCAnZGVsJywgJ2RldGFpbHMnLCAnZGZuJywgJ2RpYWxvZycsICdkaXInLCAnZGl2JywgJ2RsJywgJ2R0JywgJ2VsZW1lbnQnLCAnZW0nLCAnZmllbGRzZXQnLCAnZmlnY2FwdGlvbicsICdmaWd1cmUnLCAnZm9udCcsICdmb290ZXInLCAnZm9ybScsICdoMScsICdoMicsICdoMycsICdoNCcsICdoNScsICdoNicsICdoZWFkJywgJ2hlYWRlcicsICdoZ3JvdXAnLCAnaHInLCAnaHRtbCcsICdpJywgJ2ltZycsICdpbnB1dCcsICdpbnMnLCAna2JkJywgJ2xhYmVsJywgJ2xlZ2VuZCcsICdsaScsICdtYWluJywgJ21hcCcsICdtYXJrJywgJ21hcnF1ZWUnLCAnbWVudScsICdtZW51aXRlbScsICdtZXRlcicsICduYXYnLCAnbm9icicsICdvbCcsICdvcHRncm91cCcsICdvcHRpb24nLCAnb3V0cHV0JywgJ3AnLCAncGljdHVyZScsICdwcmUnLCAncHJvZ3Jlc3MnLCAncScsICdycCcsICdydCcsICdydWJ5JywgJ3MnLCAnc2FtcCcsICdzZWN0aW9uJywgJ3NlbGVjdCcsICdzaGFkb3cnLCAnc21hbGwnLCAnc291cmNlJywgJ3NwYWNlcicsICdzcGFuJywgJ3N0cmlrZScsICdzdHJvbmcnLCAnc3R5bGUnLCAnc3ViJywgJ3N1bW1hcnknLCAnc3VwJywgJ3RhYmxlJywgJ3Rib2R5JywgJ3RkJywgJ3RlbXBsYXRlJywgJ3RleHRhcmVhJywgJ3Rmb290JywgJ3RoJywgJ3RoZWFkJywgJ3RpbWUnLCAndHInLCAndHJhY2snLCAndHQnLCAndScsICd1bCcsICd2YXInLCAndmlkZW8nLCAnd2JyJ10pOyAvLyBTVkdcclxuXHJcbiAgY29uc3Qgc3ZnJDEgPSBmcmVlemUoWydzdmcnLCAnYScsICdhbHRnbHlwaCcsICdhbHRnbHlwaGRlZicsICdhbHRnbHlwaGl0ZW0nLCAnYW5pbWF0ZWNvbG9yJywgJ2FuaW1hdGVtb3Rpb24nLCAnYW5pbWF0ZXRyYW5zZm9ybScsICdjaXJjbGUnLCAnY2xpcHBhdGgnLCAnZGVmcycsICdkZXNjJywgJ2VsbGlwc2UnLCAnZmlsdGVyJywgJ2ZvbnQnLCAnZycsICdnbHlwaCcsICdnbHlwaHJlZicsICdoa2VybicsICdpbWFnZScsICdsaW5lJywgJ2xpbmVhcmdyYWRpZW50JywgJ21hcmtlcicsICdtYXNrJywgJ21ldGFkYXRhJywgJ21wYXRoJywgJ3BhdGgnLCAncGF0dGVybicsICdwb2x5Z29uJywgJ3BvbHlsaW5lJywgJ3JhZGlhbGdyYWRpZW50JywgJ3JlY3QnLCAnc3RvcCcsICdzdHlsZScsICdzd2l0Y2gnLCAnc3ltYm9sJywgJ3RleHQnLCAndGV4dHBhdGgnLCAndGl0bGUnLCAndHJlZicsICd0c3BhbicsICd2aWV3JywgJ3ZrZXJuJ10pO1xyXG4gIGNvbnN0IHN2Z0ZpbHRlcnMgPSBmcmVlemUoWydmZUJsZW5kJywgJ2ZlQ29sb3JNYXRyaXgnLCAnZmVDb21wb25lbnRUcmFuc2ZlcicsICdmZUNvbXBvc2l0ZScsICdmZUNvbnZvbHZlTWF0cml4JywgJ2ZlRGlmZnVzZUxpZ2h0aW5nJywgJ2ZlRGlzcGxhY2VtZW50TWFwJywgJ2ZlRGlzdGFudExpZ2h0JywgJ2ZlRmxvb2QnLCAnZmVGdW5jQScsICdmZUZ1bmNCJywgJ2ZlRnVuY0cnLCAnZmVGdW5jUicsICdmZUdhdXNzaWFuQmx1cicsICdmZUltYWdlJywgJ2ZlTWVyZ2UnLCAnZmVNZXJnZU5vZGUnLCAnZmVNb3JwaG9sb2d5JywgJ2ZlT2Zmc2V0JywgJ2ZlUG9pbnRMaWdodCcsICdmZVNwZWN1bGFyTGlnaHRpbmcnLCAnZmVTcG90TGlnaHQnLCAnZmVUaWxlJywgJ2ZlVHVyYnVsZW5jZSddKTsgLy8gTGlzdCBvZiBTVkcgZWxlbWVudHMgdGhhdCBhcmUgZGlzYWxsb3dlZCBieSBkZWZhdWx0LlxyXG4gIC8vIFdlIHN0aWxsIG5lZWQgdG8ga25vdyB0aGVtIHNvIHRoYXQgd2UgY2FuIGRvIG5hbWVzcGFjZVxyXG4gIC8vIGNoZWNrcyBwcm9wZXJseSBpbiBjYXNlIG9uZSB3YW50cyB0byBhZGQgdGhlbSB0b1xyXG4gIC8vIGFsbG93LWxpc3QuXHJcblxyXG4gIGNvbnN0IHN2Z0Rpc2FsbG93ZWQgPSBmcmVlemUoWydhbmltYXRlJywgJ2NvbG9yLXByb2ZpbGUnLCAnY3Vyc29yJywgJ2Rpc2NhcmQnLCAnZmVkcm9wc2hhZG93JywgJ2ZvbnQtZmFjZScsICdmb250LWZhY2UtZm9ybWF0JywgJ2ZvbnQtZmFjZS1uYW1lJywgJ2ZvbnQtZmFjZS1zcmMnLCAnZm9udC1mYWNlLXVyaScsICdmb3JlaWdub2JqZWN0JywgJ2hhdGNoJywgJ2hhdGNocGF0aCcsICdtZXNoJywgJ21lc2hncmFkaWVudCcsICdtZXNocGF0Y2gnLCAnbWVzaHJvdycsICdtaXNzaW5nLWdseXBoJywgJ3NjcmlwdCcsICdzZXQnLCAnc29saWRjb2xvcicsICd1bmtub3duJywgJ3VzZSddKTtcclxuICBjb25zdCBtYXRoTWwkMSA9IGZyZWV6ZShbJ21hdGgnLCAnbWVuY2xvc2UnLCAnbWVycm9yJywgJ21mZW5jZWQnLCAnbWZyYWMnLCAnbWdseXBoJywgJ21pJywgJ21sYWJlbGVkdHInLCAnbW11bHRpc2NyaXB0cycsICdtbicsICdtbycsICdtb3ZlcicsICdtcGFkZGVkJywgJ21waGFudG9tJywgJ21yb290JywgJ21yb3cnLCAnbXMnLCAnbXNwYWNlJywgJ21zcXJ0JywgJ21zdHlsZScsICdtc3ViJywgJ21zdXAnLCAnbXN1YnN1cCcsICdtdGFibGUnLCAnbXRkJywgJ210ZXh0JywgJ210cicsICdtdW5kZXInLCAnbXVuZGVyb3ZlcicsICdtcHJlc2NyaXB0cyddKTsgLy8gU2ltaWxhcmx5IHRvIFNWRywgd2Ugd2FudCB0byBrbm93IGFsbCBNYXRoTUwgZWxlbWVudHMsXHJcbiAgLy8gZXZlbiB0aG9zZSB0aGF0IHdlIGRpc2FsbG93IGJ5IGRlZmF1bHQuXHJcblxyXG4gIGNvbnN0IG1hdGhNbERpc2FsbG93ZWQgPSBmcmVlemUoWydtYWN0aW9uJywgJ21hbGlnbmdyb3VwJywgJ21hbGlnbm1hcmsnLCAnbWxvbmdkaXYnLCAnbXNjYXJyaWVzJywgJ21zY2FycnknLCAnbXNncm91cCcsICdtc3RhY2snLCAnbXNsaW5lJywgJ21zcm93JywgJ3NlbWFudGljcycsICdhbm5vdGF0aW9uJywgJ2Fubm90YXRpb24teG1sJywgJ21wcmVzY3JpcHRzJywgJ25vbmUnXSk7XHJcbiAgY29uc3QgdGV4dCA9IGZyZWV6ZShbJyN0ZXh0J10pO1xyXG5cclxuICBjb25zdCBodG1sID0gZnJlZXplKFsnYWNjZXB0JywgJ2FjdGlvbicsICdhbGlnbicsICdhbHQnLCAnYXV0b2NhcGl0YWxpemUnLCAnYXV0b2NvbXBsZXRlJywgJ2F1dG9waWN0dXJlaW5waWN0dXJlJywgJ2F1dG9wbGF5JywgJ2JhY2tncm91bmQnLCAnYmdjb2xvcicsICdib3JkZXInLCAnY2FwdHVyZScsICdjZWxscGFkZGluZycsICdjZWxsc3BhY2luZycsICdjaGVja2VkJywgJ2NpdGUnLCAnY2xhc3MnLCAnY2xlYXInLCAnY29sb3InLCAnY29scycsICdjb2xzcGFuJywgJ2NvbnRyb2xzJywgJ2NvbnRyb2xzbGlzdCcsICdjb29yZHMnLCAnY3Jvc3NvcmlnaW4nLCAnZGF0ZXRpbWUnLCAnZGVjb2RpbmcnLCAnZGVmYXVsdCcsICdkaXInLCAnZGlzYWJsZWQnLCAnZGlzYWJsZXBpY3R1cmVpbnBpY3R1cmUnLCAnZGlzYWJsZXJlbW90ZXBsYXliYWNrJywgJ2Rvd25sb2FkJywgJ2RyYWdnYWJsZScsICdlbmN0eXBlJywgJ2VudGVya2V5aGludCcsICdmYWNlJywgJ2ZvcicsICdoZWFkZXJzJywgJ2hlaWdodCcsICdoaWRkZW4nLCAnaGlnaCcsICdocmVmJywgJ2hyZWZsYW5nJywgJ2lkJywgJ2lucHV0bW9kZScsICdpbnRlZ3JpdHknLCAnaXNtYXAnLCAna2luZCcsICdsYWJlbCcsICdsYW5nJywgJ2xpc3QnLCAnbG9hZGluZycsICdsb29wJywgJ2xvdycsICdtYXgnLCAnbWF4bGVuZ3RoJywgJ21lZGlhJywgJ21ldGhvZCcsICdtaW4nLCAnbWlubGVuZ3RoJywgJ211bHRpcGxlJywgJ211dGVkJywgJ25hbWUnLCAnbm9uY2UnLCAnbm9zaGFkZScsICdub3ZhbGlkYXRlJywgJ25vd3JhcCcsICdvcGVuJywgJ29wdGltdW0nLCAncGF0dGVybicsICdwbGFjZWhvbGRlcicsICdwbGF5c2lubGluZScsICdwb3N0ZXInLCAncHJlbG9hZCcsICdwdWJkYXRlJywgJ3JhZGlvZ3JvdXAnLCAncmVhZG9ubHknLCAncmVsJywgJ3JlcXVpcmVkJywgJ3JldicsICdyZXZlcnNlZCcsICdyb2xlJywgJ3Jvd3MnLCAncm93c3BhbicsICdzcGVsbGNoZWNrJywgJ3Njb3BlJywgJ3NlbGVjdGVkJywgJ3NoYXBlJywgJ3NpemUnLCAnc2l6ZXMnLCAnc3BhbicsICdzcmNsYW5nJywgJ3N0YXJ0JywgJ3NyYycsICdzcmNzZXQnLCAnc3RlcCcsICdzdHlsZScsICdzdW1tYXJ5JywgJ3RhYmluZGV4JywgJ3RpdGxlJywgJ3RyYW5zbGF0ZScsICd0eXBlJywgJ3VzZW1hcCcsICd2YWxpZ24nLCAndmFsdWUnLCAnd2lkdGgnLCAneG1sbnMnLCAnc2xvdCddKTtcclxuICBjb25zdCBzdmcgPSBmcmVlemUoWydhY2NlbnQtaGVpZ2h0JywgJ2FjY3VtdWxhdGUnLCAnYWRkaXRpdmUnLCAnYWxpZ25tZW50LWJhc2VsaW5lJywgJ2FzY2VudCcsICdhdHRyaWJ1dGVuYW1lJywgJ2F0dHJpYnV0ZXR5cGUnLCAnYXppbXV0aCcsICdiYXNlZnJlcXVlbmN5JywgJ2Jhc2VsaW5lLXNoaWZ0JywgJ2JlZ2luJywgJ2JpYXMnLCAnYnknLCAnY2xhc3MnLCAnY2xpcCcsICdjbGlwcGF0aHVuaXRzJywgJ2NsaXAtcGF0aCcsICdjbGlwLXJ1bGUnLCAnY29sb3InLCAnY29sb3ItaW50ZXJwb2xhdGlvbicsICdjb2xvci1pbnRlcnBvbGF0aW9uLWZpbHRlcnMnLCAnY29sb3ItcHJvZmlsZScsICdjb2xvci1yZW5kZXJpbmcnLCAnY3gnLCAnY3knLCAnZCcsICdkeCcsICdkeScsICdkaWZmdXNlY29uc3RhbnQnLCAnZGlyZWN0aW9uJywgJ2Rpc3BsYXknLCAnZGl2aXNvcicsICdkdXInLCAnZWRnZW1vZGUnLCAnZWxldmF0aW9uJywgJ2VuZCcsICdmaWxsJywgJ2ZpbGwtb3BhY2l0eScsICdmaWxsLXJ1bGUnLCAnZmlsdGVyJywgJ2ZpbHRlcnVuaXRzJywgJ2Zsb29kLWNvbG9yJywgJ2Zsb29kLW9wYWNpdHknLCAnZm9udC1mYW1pbHknLCAnZm9udC1zaXplJywgJ2ZvbnQtc2l6ZS1hZGp1c3QnLCAnZm9udC1zdHJldGNoJywgJ2ZvbnQtc3R5bGUnLCAnZm9udC12YXJpYW50JywgJ2ZvbnQtd2VpZ2h0JywgJ2Z4JywgJ2Z5JywgJ2cxJywgJ2cyJywgJ2dseXBoLW5hbWUnLCAnZ2x5cGhyZWYnLCAnZ3JhZGllbnR1bml0cycsICdncmFkaWVudHRyYW5zZm9ybScsICdoZWlnaHQnLCAnaHJlZicsICdpZCcsICdpbWFnZS1yZW5kZXJpbmcnLCAnaW4nLCAnaW4yJywgJ2snLCAnazEnLCAnazInLCAnazMnLCAnazQnLCAna2VybmluZycsICdrZXlwb2ludHMnLCAna2V5c3BsaW5lcycsICdrZXl0aW1lcycsICdsYW5nJywgJ2xlbmd0aGFkanVzdCcsICdsZXR0ZXItc3BhY2luZycsICdrZXJuZWxtYXRyaXgnLCAna2VybmVsdW5pdGxlbmd0aCcsICdsaWdodGluZy1jb2xvcicsICdsb2NhbCcsICdtYXJrZXItZW5kJywgJ21hcmtlci1taWQnLCAnbWFya2VyLXN0YXJ0JywgJ21hcmtlcmhlaWdodCcsICdtYXJrZXJ1bml0cycsICdtYXJrZXJ3aWR0aCcsICdtYXNrY29udGVudHVuaXRzJywgJ21hc2t1bml0cycsICdtYXgnLCAnbWFzaycsICdtZWRpYScsICdtZXRob2QnLCAnbW9kZScsICdtaW4nLCAnbmFtZScsICdudW1vY3RhdmVzJywgJ29mZnNldCcsICdvcGVyYXRvcicsICdvcGFjaXR5JywgJ29yZGVyJywgJ29yaWVudCcsICdvcmllbnRhdGlvbicsICdvcmlnaW4nLCAnb3ZlcmZsb3cnLCAncGFpbnQtb3JkZXInLCAncGF0aCcsICdwYXRobGVuZ3RoJywgJ3BhdHRlcm5jb250ZW50dW5pdHMnLCAncGF0dGVybnRyYW5zZm9ybScsICdwYXR0ZXJudW5pdHMnLCAncG9pbnRzJywgJ3ByZXNlcnZlYWxwaGEnLCAncHJlc2VydmVhc3BlY3RyYXRpbycsICdwcmltaXRpdmV1bml0cycsICdyJywgJ3J4JywgJ3J5JywgJ3JhZGl1cycsICdyZWZ4JywgJ3JlZnknLCAncmVwZWF0Y291bnQnLCAncmVwZWF0ZHVyJywgJ3Jlc3RhcnQnLCAncmVzdWx0JywgJ3JvdGF0ZScsICdzY2FsZScsICdzZWVkJywgJ3NoYXBlLXJlbmRlcmluZycsICdzcGVjdWxhcmNvbnN0YW50JywgJ3NwZWN1bGFyZXhwb25lbnQnLCAnc3ByZWFkbWV0aG9kJywgJ3N0YXJ0b2Zmc2V0JywgJ3N0ZGRldmlhdGlvbicsICdzdGl0Y2h0aWxlcycsICdzdG9wLWNvbG9yJywgJ3N0b3Atb3BhY2l0eScsICdzdHJva2UtZGFzaGFycmF5JywgJ3N0cm9rZS1kYXNob2Zmc2V0JywgJ3N0cm9rZS1saW5lY2FwJywgJ3N0cm9rZS1saW5lam9pbicsICdzdHJva2UtbWl0ZXJsaW1pdCcsICdzdHJva2Utb3BhY2l0eScsICdzdHJva2UnLCAnc3Ryb2tlLXdpZHRoJywgJ3N0eWxlJywgJ3N1cmZhY2VzY2FsZScsICdzeXN0ZW1sYW5ndWFnZScsICd0YWJpbmRleCcsICd0YXJnZXR4JywgJ3RhcmdldHknLCAndHJhbnNmb3JtJywgJ3RyYW5zZm9ybS1vcmlnaW4nLCAndGV4dC1hbmNob3InLCAndGV4dC1kZWNvcmF0aW9uJywgJ3RleHQtcmVuZGVyaW5nJywgJ3RleHRsZW5ndGgnLCAndHlwZScsICd1MScsICd1MicsICd1bmljb2RlJywgJ3ZhbHVlcycsICd2aWV3Ym94JywgJ3Zpc2liaWxpdHknLCAndmVyc2lvbicsICd2ZXJ0LWFkdi15JywgJ3ZlcnQtb3JpZ2luLXgnLCAndmVydC1vcmlnaW4teScsICd3aWR0aCcsICd3b3JkLXNwYWNpbmcnLCAnd3JhcCcsICd3cml0aW5nLW1vZGUnLCAneGNoYW5uZWxzZWxlY3RvcicsICd5Y2hhbm5lbHNlbGVjdG9yJywgJ3gnLCAneDEnLCAneDInLCAneG1sbnMnLCAneScsICd5MScsICd5MicsICd6JywgJ3pvb21hbmRwYW4nXSk7XHJcbiAgY29uc3QgbWF0aE1sID0gZnJlZXplKFsnYWNjZW50JywgJ2FjY2VudHVuZGVyJywgJ2FsaWduJywgJ2JldmVsbGVkJywgJ2Nsb3NlJywgJ2NvbHVtbnNhbGlnbicsICdjb2x1bW5saW5lcycsICdjb2x1bW5zcGFuJywgJ2Rlbm9tYWxpZ24nLCAnZGVwdGgnLCAnZGlyJywgJ2Rpc3BsYXknLCAnZGlzcGxheXN0eWxlJywgJ2VuY29kaW5nJywgJ2ZlbmNlJywgJ2ZyYW1lJywgJ2hlaWdodCcsICdocmVmJywgJ2lkJywgJ2xhcmdlb3AnLCAnbGVuZ3RoJywgJ2xpbmV0aGlja25lc3MnLCAnbHNwYWNlJywgJ2xxdW90ZScsICdtYXRoYmFja2dyb3VuZCcsICdtYXRoY29sb3InLCAnbWF0aHNpemUnLCAnbWF0aHZhcmlhbnQnLCAnbWF4c2l6ZScsICdtaW5zaXplJywgJ21vdmFibGVsaW1pdHMnLCAnbm90YXRpb24nLCAnbnVtYWxpZ24nLCAnb3BlbicsICdyb3dhbGlnbicsICdyb3dsaW5lcycsICdyb3dzcGFjaW5nJywgJ3Jvd3NwYW4nLCAncnNwYWNlJywgJ3JxdW90ZScsICdzY3JpcHRsZXZlbCcsICdzY3JpcHRtaW5zaXplJywgJ3NjcmlwdHNpemVtdWx0aXBsaWVyJywgJ3NlbGVjdGlvbicsICdzZXBhcmF0b3InLCAnc2VwYXJhdG9ycycsICdzdHJldGNoeScsICdzdWJzY3JpcHRzaGlmdCcsICdzdXBzY3JpcHRzaGlmdCcsICdzeW1tZXRyaWMnLCAndm9mZnNldCcsICd3aWR0aCcsICd4bWxucyddKTtcclxuICBjb25zdCB4bWwgPSBmcmVlemUoWyd4bGluazpocmVmJywgJ3htbDppZCcsICd4bGluazp0aXRsZScsICd4bWw6c3BhY2UnLCAneG1sbnM6eGxpbmsnXSk7XHJcblxyXG4gIGNvbnN0IE1VU1RBQ0hFX0VYUFIgPSBzZWFsKC9cXHtcXHtbXFx3XFxXXSp8W1xcd1xcV10qXFx9XFx9L2dtKTsgLy8gU3BlY2lmeSB0ZW1wbGF0ZSBkZXRlY3Rpb24gcmVnZXggZm9yIFNBRkVfRk9SX1RFTVBMQVRFUyBtb2RlXHJcblxyXG4gIGNvbnN0IEVSQl9FWFBSID0gc2VhbCgvPCVbXFx3XFxXXSp8W1xcd1xcV10qJT4vZ20pO1xyXG4gIGNvbnN0IFRNUExJVF9FWFBSID0gc2VhbCgvXFwke1tcXHdcXFddKn0vZ20pO1xyXG4gIGNvbnN0IERBVEFfQVRUUiA9IHNlYWwoL15kYXRhLVtcXC1cXHcuXFx1MDBCNy1cXHVGRkZGXS8pOyAvLyBlc2xpbnQtZGlzYWJsZS1saW5lIG5vLXVzZWxlc3MtZXNjYXBlXHJcblxyXG4gIGNvbnN0IEFSSUFfQVRUUiA9IHNlYWwoL15hcmlhLVtcXC1cXHddKyQvKTsgLy8gZXNsaW50LWRpc2FibGUtbGluZSBuby11c2VsZXNzLWVzY2FwZVxyXG5cclxuICBjb25zdCBJU19BTExPV0VEX1VSSSA9IHNlYWwoL14oPzooPzooPzpmfGh0KXRwcz98bWFpbHRvfHRlbHxjYWxsdG98c21zfGNpZHx4bXBwKTp8W15hLXpdfFthLXorLlxcLV0rKD86W15hLXorLlxcLTpdfCQpKS9pIC8vIGVzbGludC1kaXNhYmxlLWxpbmUgbm8tdXNlbGVzcy1lc2NhcGVcclxuICApO1xyXG4gIGNvbnN0IElTX1NDUklQVF9PUl9EQVRBID0gc2VhbCgvXig/OlxcdytzY3JpcHR8ZGF0YSk6L2kpO1xyXG4gIGNvbnN0IEFUVFJfV0hJVEVTUEFDRSA9IHNlYWwoL1tcXHUwMDAwLVxcdTAwMjBcXHUwMEEwXFx1MTY4MFxcdTE4MEVcXHUyMDAwLVxcdTIwMjlcXHUyMDVGXFx1MzAwMF0vZyAvLyBlc2xpbnQtZGlzYWJsZS1saW5lIG5vLWNvbnRyb2wtcmVnZXhcclxuICApO1xyXG4gIGNvbnN0IERPQ1RZUEVfTkFNRSA9IHNlYWwoL15odG1sJC9pKTtcclxuXHJcbiAgdmFyIEVYUFJFU1NJT05TID0gLyojX19QVVJFX18qL09iamVjdC5mcmVlemUoe1xyXG4gICAgX19wcm90b19fOiBudWxsLFxyXG4gICAgTVVTVEFDSEVfRVhQUjogTVVTVEFDSEVfRVhQUixcclxuICAgIEVSQl9FWFBSOiBFUkJfRVhQUixcclxuICAgIFRNUExJVF9FWFBSOiBUTVBMSVRfRVhQUixcclxuICAgIERBVEFfQVRUUjogREFUQV9BVFRSLFxyXG4gICAgQVJJQV9BVFRSOiBBUklBX0FUVFIsXHJcbiAgICBJU19BTExPV0VEX1VSSTogSVNfQUxMT1dFRF9VUkksXHJcbiAgICBJU19TQ1JJUFRfT1JfREFUQTogSVNfU0NSSVBUX09SX0RBVEEsXHJcbiAgICBBVFRSX1dISVRFU1BBQ0U6IEFUVFJfV0hJVEVTUEFDRSxcclxuICAgIERPQ1RZUEVfTkFNRTogRE9DVFlQRV9OQU1FXHJcbiAgfSk7XHJcblxyXG4gIGNvbnN0IGdldEdsb2JhbCA9ICgpID0+IHR5cGVvZiB3aW5kb3cgPT09ICd1bmRlZmluZWQnID8gbnVsbCA6IHdpbmRvdztcclxuICAvKipcclxuICAgKiBDcmVhdGVzIGEgbm8tb3AgcG9saWN5IGZvciBpbnRlcm5hbCB1c2Ugb25seS5cclxuICAgKiBEb24ndCBleHBvcnQgdGhpcyBmdW5jdGlvbiBvdXRzaWRlIHRoaXMgbW9kdWxlIVxyXG4gICAqIEBwYXJhbSB7P1RydXN0ZWRUeXBlUG9saWN5RmFjdG9yeX0gdHJ1c3RlZFR5cGVzIFRoZSBwb2xpY3kgZmFjdG9yeS5cclxuICAgKiBAcGFyYW0ge0RvY3VtZW50fSBkb2N1bWVudCBUaGUgZG9jdW1lbnQgb2JqZWN0ICh0byBkZXRlcm1pbmUgcG9saWN5IG5hbWUgc3VmZml4KVxyXG4gICAqIEByZXR1cm4gez9UcnVzdGVkVHlwZVBvbGljeX0gVGhlIHBvbGljeSBjcmVhdGVkIChvciBudWxsLCBpZiBUcnVzdGVkIFR5cGVzXHJcbiAgICogYXJlIG5vdCBzdXBwb3J0ZWQpLlxyXG4gICAqL1xyXG5cclxuXHJcbiAgY29uc3QgX2NyZWF0ZVRydXN0ZWRUeXBlc1BvbGljeSA9IGZ1bmN0aW9uIF9jcmVhdGVUcnVzdGVkVHlwZXNQb2xpY3kodHJ1c3RlZFR5cGVzLCBkb2N1bWVudCkge1xyXG4gICAgaWYgKHR5cGVvZiB0cnVzdGVkVHlwZXMgIT09ICdvYmplY3QnIHx8IHR5cGVvZiB0cnVzdGVkVHlwZXMuY3JlYXRlUG9saWN5ICE9PSAnZnVuY3Rpb24nKSB7XHJcbiAgICAgIHJldHVybiBudWxsO1xyXG4gICAgfSAvLyBBbGxvdyB0aGUgY2FsbGVycyB0byBjb250cm9sIHRoZSB1bmlxdWUgcG9saWN5IG5hbWVcclxuICAgIC8vIGJ5IGFkZGluZyBhIGRhdGEtdHQtcG9saWN5LXN1ZmZpeCB0byB0aGUgc2NyaXB0IGVsZW1lbnQgd2l0aCB0aGUgRE9NUHVyaWZ5LlxyXG4gICAgLy8gUG9saWN5IGNyZWF0aW9uIHdpdGggZHVwbGljYXRlIG5hbWVzIHRocm93cyBpbiBUcnVzdGVkIFR5cGVzLlxyXG5cclxuXHJcbiAgICBsZXQgc3VmZml4ID0gbnVsbDtcclxuICAgIGNvbnN0IEFUVFJfTkFNRSA9ICdkYXRhLXR0LXBvbGljeS1zdWZmaXgnO1xyXG5cclxuICAgIGlmIChkb2N1bWVudC5jdXJyZW50U2NyaXB0ICYmIGRvY3VtZW50LmN1cnJlbnRTY3JpcHQuaGFzQXR0cmlidXRlKEFUVFJfTkFNRSkpIHtcclxuICAgICAgc3VmZml4ID0gZG9jdW1lbnQuY3VycmVudFNjcmlwdC5nZXRBdHRyaWJ1dGUoQVRUUl9OQU1FKTtcclxuICAgIH1cclxuXHJcbiAgICBjb25zdCBwb2xpY3lOYW1lID0gJ2RvbXB1cmlmeScgKyAoc3VmZml4ID8gJyMnICsgc3VmZml4IDogJycpO1xyXG5cclxuICAgIHRyeSB7XHJcbiAgICAgIHJldHVybiB0cnVzdGVkVHlwZXMuY3JlYXRlUG9saWN5KHBvbGljeU5hbWUsIHtcclxuICAgICAgICBjcmVhdGVIVE1MKGh0bWwpIHtcclxuICAgICAgICAgIHJldHVybiBodG1sO1xyXG4gICAgICAgIH0sXHJcblxyXG4gICAgICAgIGNyZWF0ZVNjcmlwdFVSTChzY3JpcHRVcmwpIHtcclxuICAgICAgICAgIHJldHVybiBzY3JpcHRVcmw7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgfSk7XHJcbiAgICB9IGNhdGNoIChfKSB7XHJcbiAgICAgIC8vIFBvbGljeSBjcmVhdGlvbiBmYWlsZWQgKG1vc3QgbGlrZWx5IGFub3RoZXIgRE9NUHVyaWZ5IHNjcmlwdCBoYXNcclxuICAgICAgLy8gYWxyZWFkeSBydW4pLiBTa2lwIGNyZWF0aW5nIHRoZSBwb2xpY3ksIGFzIHRoaXMgd2lsbCBvbmx5IGNhdXNlIGVycm9yc1xyXG4gICAgICAvLyBpZiBUVCBhcmUgZW5mb3JjZWQuXHJcbiAgICAgIGNvbnNvbGUud2FybignVHJ1c3RlZFR5cGVzIHBvbGljeSAnICsgcG9saWN5TmFtZSArICcgY291bGQgbm90IGJlIGNyZWF0ZWQuJyk7XHJcbiAgICAgIHJldHVybiBudWxsO1xyXG4gICAgfVxyXG4gIH07XHJcblxyXG4gIGZ1bmN0aW9uIGNyZWF0ZURPTVB1cmlmeSgpIHtcclxuICAgIGxldCB3aW5kb3cgPSBhcmd1bWVudHMubGVuZ3RoID4gMCAmJiBhcmd1bWVudHNbMF0gIT09IHVuZGVmaW5lZCA/IGFyZ3VtZW50c1swXSA6IGdldEdsb2JhbCgpO1xyXG5cclxuICAgIGNvbnN0IERPTVB1cmlmeSA9IHJvb3QgPT4gY3JlYXRlRE9NUHVyaWZ5KHJvb3QpO1xyXG4gICAgLyoqXHJcbiAgICAgKiBWZXJzaW9uIGxhYmVsLCBleHBvc2VkIGZvciBlYXNpZXIgY2hlY2tzXHJcbiAgICAgKiBpZiBET01QdXJpZnkgaXMgdXAgdG8gZGF0ZSBvciBub3RcclxuICAgICAqL1xyXG5cclxuXHJcbiAgICBET01QdXJpZnkudmVyc2lvbiA9ICczLjAuMic7XHJcbiAgICAvKipcclxuICAgICAqIEFycmF5IG9mIGVsZW1lbnRzIHRoYXQgRE9NUHVyaWZ5IHJlbW92ZWQgZHVyaW5nIHNhbml0YXRpb24uXHJcbiAgICAgKiBFbXB0eSBpZiBub3RoaW5nIHdhcyByZW1vdmVkLlxyXG4gICAgICovXHJcblxyXG4gICAgRE9NUHVyaWZ5LnJlbW92ZWQgPSBbXTtcclxuXHJcbiAgICBpZiAoIXdpbmRvdyB8fCAhd2luZG93LmRvY3VtZW50IHx8IHdpbmRvdy5kb2N1bWVudC5ub2RlVHlwZSAhPT0gOSkge1xyXG4gICAgICAvLyBOb3QgcnVubmluZyBpbiBhIGJyb3dzZXIsIHByb3ZpZGUgYSBmYWN0b3J5IGZ1bmN0aW9uXHJcbiAgICAgIC8vIHNvIHRoYXQgeW91IGNhbiBwYXNzIHlvdXIgb3duIFdpbmRvd1xyXG4gICAgICBET01QdXJpZnkuaXNTdXBwb3J0ZWQgPSBmYWxzZTtcclxuICAgICAgcmV0dXJuIERPTVB1cmlmeTtcclxuICAgIH1cclxuXHJcbiAgICBjb25zdCBvcmlnaW5hbERvY3VtZW50ID0gd2luZG93LmRvY3VtZW50O1xyXG4gICAgbGV0IHtcclxuICAgICAgZG9jdW1lbnRcclxuICAgIH0gPSB3aW5kb3c7XHJcbiAgICBjb25zdCB7XHJcbiAgICAgIERvY3VtZW50RnJhZ21lbnQsXHJcbiAgICAgIEhUTUxUZW1wbGF0ZUVsZW1lbnQsXHJcbiAgICAgIE5vZGUsXHJcbiAgICAgIEVsZW1lbnQsXHJcbiAgICAgIE5vZGVGaWx0ZXIsXHJcbiAgICAgIE5hbWVkTm9kZU1hcCA9IHdpbmRvdy5OYW1lZE5vZGVNYXAgfHwgd2luZG93Lk1vek5hbWVkQXR0ck1hcCxcclxuICAgICAgSFRNTEZvcm1FbGVtZW50LFxyXG4gICAgICBET01QYXJzZXIsXHJcbiAgICAgIHRydXN0ZWRUeXBlc1xyXG4gICAgfSA9IHdpbmRvdztcclxuICAgIGNvbnN0IEVsZW1lbnRQcm90b3R5cGUgPSBFbGVtZW50LnByb3RvdHlwZTtcclxuICAgIGNvbnN0IGNsb25lTm9kZSA9IGxvb2t1cEdldHRlcihFbGVtZW50UHJvdG90eXBlLCAnY2xvbmVOb2RlJyk7XHJcbiAgICBjb25zdCBnZXROZXh0U2libGluZyA9IGxvb2t1cEdldHRlcihFbGVtZW50UHJvdG90eXBlLCAnbmV4dFNpYmxpbmcnKTtcclxuICAgIGNvbnN0IGdldENoaWxkTm9kZXMgPSBsb29rdXBHZXR0ZXIoRWxlbWVudFByb3RvdHlwZSwgJ2NoaWxkTm9kZXMnKTtcclxuICAgIGNvbnN0IGdldFBhcmVudE5vZGUgPSBsb29rdXBHZXR0ZXIoRWxlbWVudFByb3RvdHlwZSwgJ3BhcmVudE5vZGUnKTsgLy8gQXMgcGVyIGlzc3VlICM0NywgdGhlIHdlYi1jb21wb25lbnRzIHJlZ2lzdHJ5IGlzIGluaGVyaXRlZCBieSBhXHJcbiAgICAvLyBuZXcgZG9jdW1lbnQgY3JlYXRlZCB2aWEgY3JlYXRlSFRNTERvY3VtZW50LiBBcyBwZXIgdGhlIHNwZWNcclxuICAgIC8vIChodHRwOi8vdzNjLmdpdGh1Yi5pby93ZWJjb21wb25lbnRzL3NwZWMvY3VzdG9tLyNjcmVhdGluZy1hbmQtcGFzc2luZy1yZWdpc3RyaWVzKVxyXG4gICAgLy8gYSBuZXcgZW1wdHkgcmVnaXN0cnkgaXMgdXNlZCB3aGVuIGNyZWF0aW5nIGEgdGVtcGxhdGUgY29udGVudHMgb3duZXJcclxuICAgIC8vIGRvY3VtZW50LCBzbyB3ZSB1c2UgdGhhdCBhcyBvdXIgcGFyZW50IGRvY3VtZW50IHRvIGVuc3VyZSBub3RoaW5nXHJcbiAgICAvLyBpcyBpbmhlcml0ZWQuXHJcblxyXG4gICAgaWYgKHR5cGVvZiBIVE1MVGVtcGxhdGVFbGVtZW50ID09PSAnZnVuY3Rpb24nKSB7XHJcbiAgICAgIGNvbnN0IHRlbXBsYXRlID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgndGVtcGxhdGUnKTtcclxuXHJcbiAgICAgIGlmICh0ZW1wbGF0ZS5jb250ZW50ICYmIHRlbXBsYXRlLmNvbnRlbnQub3duZXJEb2N1bWVudCkge1xyXG4gICAgICAgIGRvY3VtZW50ID0gdGVtcGxhdGUuY29udGVudC5vd25lckRvY3VtZW50O1xyXG4gICAgICB9XHJcbiAgICB9XHJcblxyXG4gICAgY29uc3QgdHJ1c3RlZFR5cGVzUG9saWN5ID0gX2NyZWF0ZVRydXN0ZWRUeXBlc1BvbGljeSh0cnVzdGVkVHlwZXMsIG9yaWdpbmFsRG9jdW1lbnQpO1xyXG5cclxuICAgIGNvbnN0IGVtcHR5SFRNTCA9IHRydXN0ZWRUeXBlc1BvbGljeSA/IHRydXN0ZWRUeXBlc1BvbGljeS5jcmVhdGVIVE1MKCcnKSA6ICcnO1xyXG4gICAgY29uc3Qge1xyXG4gICAgICBpbXBsZW1lbnRhdGlvbixcclxuICAgICAgY3JlYXRlTm9kZUl0ZXJhdG9yLFxyXG4gICAgICBjcmVhdGVEb2N1bWVudEZyYWdtZW50LFxyXG4gICAgICBnZXRFbGVtZW50c0J5VGFnTmFtZVxyXG4gICAgfSA9IGRvY3VtZW50O1xyXG4gICAgY29uc3Qge1xyXG4gICAgICBpbXBvcnROb2RlXHJcbiAgICB9ID0gb3JpZ2luYWxEb2N1bWVudDtcclxuICAgIGxldCBob29rcyA9IHt9O1xyXG4gICAgLyoqXHJcbiAgICAgKiBFeHBvc2Ugd2hldGhlciB0aGlzIGJyb3dzZXIgc3VwcG9ydHMgcnVubmluZyB0aGUgZnVsbCBET01QdXJpZnkuXHJcbiAgICAgKi9cclxuXHJcbiAgICBET01QdXJpZnkuaXNTdXBwb3J0ZWQgPSB0eXBlb2YgZW50cmllcyA9PT0gJ2Z1bmN0aW9uJyAmJiB0eXBlb2YgZ2V0UGFyZW50Tm9kZSA9PT0gJ2Z1bmN0aW9uJyAmJiBpbXBsZW1lbnRhdGlvbiAmJiB0eXBlb2YgaW1wbGVtZW50YXRpb24uY3JlYXRlSFRNTERvY3VtZW50ICE9PSAndW5kZWZpbmVkJztcclxuICAgIGNvbnN0IHtcclxuICAgICAgTVVTVEFDSEVfRVhQUixcclxuICAgICAgRVJCX0VYUFIsXHJcbiAgICAgIFRNUExJVF9FWFBSLFxyXG4gICAgICBEQVRBX0FUVFIsXHJcbiAgICAgIEFSSUFfQVRUUixcclxuICAgICAgSVNfU0NSSVBUX09SX0RBVEEsXHJcbiAgICAgIEFUVFJfV0hJVEVTUEFDRVxyXG4gICAgfSA9IEVYUFJFU1NJT05TO1xyXG4gICAgbGV0IHtcclxuICAgICAgSVNfQUxMT1dFRF9VUkk6IElTX0FMTE9XRURfVVJJJDFcclxuICAgIH0gPSBFWFBSRVNTSU9OUztcclxuICAgIC8qKlxyXG4gICAgICogV2UgY29uc2lkZXIgdGhlIGVsZW1lbnRzIGFuZCBhdHRyaWJ1dGVzIGJlbG93IHRvIGJlIHNhZmUuIElkZWFsbHlcclxuICAgICAqIGRvbid0IGFkZCBhbnkgbmV3IG9uZXMgYnV0IGZlZWwgZnJlZSB0byByZW1vdmUgdW53YW50ZWQgb25lcy5cclxuICAgICAqL1xyXG5cclxuICAgIC8qIGFsbG93ZWQgZWxlbWVudCBuYW1lcyAqL1xyXG5cclxuICAgIGxldCBBTExPV0VEX1RBR1MgPSBudWxsO1xyXG4gICAgY29uc3QgREVGQVVMVF9BTExPV0VEX1RBR1MgPSBhZGRUb1NldCh7fSwgWy4uLmh0bWwkMSwgLi4uc3ZnJDEsIC4uLnN2Z0ZpbHRlcnMsIC4uLm1hdGhNbCQxLCAuLi50ZXh0XSk7XHJcbiAgICAvKiBBbGxvd2VkIGF0dHJpYnV0ZSBuYW1lcyAqL1xyXG5cclxuICAgIGxldCBBTExPV0VEX0FUVFIgPSBudWxsO1xyXG4gICAgY29uc3QgREVGQVVMVF9BTExPV0VEX0FUVFIgPSBhZGRUb1NldCh7fSwgWy4uLmh0bWwsIC4uLnN2ZywgLi4ubWF0aE1sLCAuLi54bWxdKTtcclxuICAgIC8qXHJcbiAgICAgKiBDb25maWd1cmUgaG93IERPTVBVcmlmeSBzaG91bGQgaGFuZGxlIGN1c3RvbSBlbGVtZW50cyBhbmQgdGhlaXIgYXR0cmlidXRlcyBhcyB3ZWxsIGFzIGN1c3RvbWl6ZWQgYnVpbHQtaW4gZWxlbWVudHMuXHJcbiAgICAgKiBAcHJvcGVydHkge1JlZ0V4cHxGdW5jdGlvbnxudWxsfSB0YWdOYW1lQ2hlY2sgb25lIG9mIFtudWxsLCByZWdleFBhdHRlcm4sIHByZWRpY2F0ZV0uIERlZmF1bHQ6IGBudWxsYCAoZGlzYWxsb3cgYW55IGN1c3RvbSBlbGVtZW50cylcclxuICAgICAqIEBwcm9wZXJ0eSB7UmVnRXhwfEZ1bmN0aW9ufG51bGx9IGF0dHJpYnV0ZU5hbWVDaGVjayBvbmUgb2YgW251bGwsIHJlZ2V4UGF0dGVybiwgcHJlZGljYXRlXS4gRGVmYXVsdDogYG51bGxgIChkaXNhbGxvdyBhbnkgYXR0cmlidXRlcyBub3Qgb24gdGhlIGFsbG93IGxpc3QpXHJcbiAgICAgKiBAcHJvcGVydHkge2Jvb2xlYW59IGFsbG93Q3VzdG9taXplZEJ1aWx0SW5FbGVtZW50cyBhbGxvdyBjdXN0b20gZWxlbWVudHMgZGVyaXZlZCBmcm9tIGJ1aWx0LWlucyBpZiB0aGV5IHBhc3MgQ1VTVE9NX0VMRU1FTlRfSEFORExJTkcudGFnTmFtZUNoZWNrLiBEZWZhdWx0OiBgZmFsc2VgLlxyXG4gICAgICovXHJcblxyXG4gICAgbGV0IENVU1RPTV9FTEVNRU5UX0hBTkRMSU5HID0gT2JqZWN0LnNlYWwoT2JqZWN0LmNyZWF0ZShudWxsLCB7XHJcbiAgICAgIHRhZ05hbWVDaGVjazoge1xyXG4gICAgICAgIHdyaXRhYmxlOiB0cnVlLFxyXG4gICAgICAgIGNvbmZpZ3VyYWJsZTogZmFsc2UsXHJcbiAgICAgICAgZW51bWVyYWJsZTogdHJ1ZSxcclxuICAgICAgICB2YWx1ZTogbnVsbFxyXG4gICAgICB9LFxyXG4gICAgICBhdHRyaWJ1dGVOYW1lQ2hlY2s6IHtcclxuICAgICAgICB3cml0YWJsZTogdHJ1ZSxcclxuICAgICAgICBjb25maWd1cmFibGU6IGZhbHNlLFxyXG4gICAgICAgIGVudW1lcmFibGU6IHRydWUsXHJcbiAgICAgICAgdmFsdWU6IG51bGxcclxuICAgICAgfSxcclxuICAgICAgYWxsb3dDdXN0b21pemVkQnVpbHRJbkVsZW1lbnRzOiB7XHJcbiAgICAgICAgd3JpdGFibGU6IHRydWUsXHJcbiAgICAgICAgY29uZmlndXJhYmxlOiBmYWxzZSxcclxuICAgICAgICBlbnVtZXJhYmxlOiB0cnVlLFxyXG4gICAgICAgIHZhbHVlOiBmYWxzZVxyXG4gICAgICB9XHJcbiAgICB9KSk7XHJcbiAgICAvKiBFeHBsaWNpdGx5IGZvcmJpZGRlbiB0YWdzIChvdmVycmlkZXMgQUxMT1dFRF9UQUdTL0FERF9UQUdTKSAqL1xyXG5cclxuICAgIGxldCBGT1JCSURfVEFHUyA9IG51bGw7XHJcbiAgICAvKiBFeHBsaWNpdGx5IGZvcmJpZGRlbiBhdHRyaWJ1dGVzIChvdmVycmlkZXMgQUxMT1dFRF9BVFRSL0FERF9BVFRSKSAqL1xyXG5cclxuICAgIGxldCBGT1JCSURfQVRUUiA9IG51bGw7XHJcbiAgICAvKiBEZWNpZGUgaWYgQVJJQSBhdHRyaWJ1dGVzIGFyZSBva2F5ICovXHJcblxyXG4gICAgbGV0IEFMTE9XX0FSSUFfQVRUUiA9IHRydWU7XHJcbiAgICAvKiBEZWNpZGUgaWYgY3VzdG9tIGRhdGEgYXR0cmlidXRlcyBhcmUgb2theSAqL1xyXG5cclxuICAgIGxldCBBTExPV19EQVRBX0FUVFIgPSB0cnVlO1xyXG4gICAgLyogRGVjaWRlIGlmIHVua25vd24gcHJvdG9jb2xzIGFyZSBva2F5ICovXHJcblxyXG4gICAgbGV0IEFMTE9XX1VOS05PV05fUFJPVE9DT0xTID0gZmFsc2U7XHJcbiAgICAvKiBEZWNpZGUgaWYgc2VsZi1jbG9zaW5nIHRhZ3MgaW4gYXR0cmlidXRlcyBhcmUgYWxsb3dlZC5cclxuICAgICAqIFVzdWFsbHkgcmVtb3ZlZCBkdWUgdG8gYSBtWFNTIGlzc3VlIGluIGpRdWVyeSAzLjAgKi9cclxuXHJcbiAgICBsZXQgQUxMT1dfU0VMRl9DTE9TRV9JTl9BVFRSID0gdHJ1ZTtcclxuICAgIC8qIE91dHB1dCBzaG91bGQgYmUgc2FmZSBmb3IgY29tbW9uIHRlbXBsYXRlIGVuZ2luZXMuXHJcbiAgICAgKiBUaGlzIG1lYW5zLCBET01QdXJpZnkgcmVtb3ZlcyBkYXRhIGF0dHJpYnV0ZXMsIG11c3RhY2hlcyBhbmQgRVJCXHJcbiAgICAgKi9cclxuXHJcbiAgICBsZXQgU0FGRV9GT1JfVEVNUExBVEVTID0gZmFsc2U7XHJcbiAgICAvKiBEZWNpZGUgaWYgZG9jdW1lbnQgd2l0aCA8aHRtbD4uLi4gc2hvdWxkIGJlIHJldHVybmVkICovXHJcblxyXG4gICAgbGV0IFdIT0xFX0RPQ1VNRU5UID0gZmFsc2U7XHJcbiAgICAvKiBUcmFjayB3aGV0aGVyIGNvbmZpZyBpcyBhbHJlYWR5IHNldCBvbiB0aGlzIGluc3RhbmNlIG9mIERPTVB1cmlmeS4gKi9cclxuXHJcbiAgICBsZXQgU0VUX0NPTkZJRyA9IGZhbHNlO1xyXG4gICAgLyogRGVjaWRlIGlmIGFsbCBlbGVtZW50cyAoZS5nLiBzdHlsZSwgc2NyaXB0KSBtdXN0IGJlIGNoaWxkcmVuIG9mXHJcbiAgICAgKiBkb2N1bWVudC5ib2R5LiBCeSBkZWZhdWx0LCBicm93c2VycyBtaWdodCBtb3ZlIHRoZW0gdG8gZG9jdW1lbnQuaGVhZCAqL1xyXG5cclxuICAgIGxldCBGT1JDRV9CT0RZID0gZmFsc2U7XHJcbiAgICAvKiBEZWNpZGUgaWYgYSBET00gYEhUTUxCb2R5RWxlbWVudGAgc2hvdWxkIGJlIHJldHVybmVkLCBpbnN0ZWFkIG9mIGEgaHRtbFxyXG4gICAgICogc3RyaW5nIChvciBhIFRydXN0ZWRIVE1MIG9iamVjdCBpZiBUcnVzdGVkIFR5cGVzIGFyZSBzdXBwb3J0ZWQpLlxyXG4gICAgICogSWYgYFdIT0xFX0RPQ1VNRU5UYCBpcyBlbmFibGVkIGEgYEhUTUxIdG1sRWxlbWVudGAgd2lsbCBiZSByZXR1cm5lZCBpbnN0ZWFkXHJcbiAgICAgKi9cclxuXHJcbiAgICBsZXQgUkVUVVJOX0RPTSA9IGZhbHNlO1xyXG4gICAgLyogRGVjaWRlIGlmIGEgRE9NIGBEb2N1bWVudEZyYWdtZW50YCBzaG91bGQgYmUgcmV0dXJuZWQsIGluc3RlYWQgb2YgYSBodG1sXHJcbiAgICAgKiBzdHJpbmcgIChvciBhIFRydXN0ZWRIVE1MIG9iamVjdCBpZiBUcnVzdGVkIFR5cGVzIGFyZSBzdXBwb3J0ZWQpICovXHJcblxyXG4gICAgbGV0IFJFVFVSTl9ET01fRlJBR01FTlQgPSBmYWxzZTtcclxuICAgIC8qIFRyeSB0byByZXR1cm4gYSBUcnVzdGVkIFR5cGUgb2JqZWN0IGluc3RlYWQgb2YgYSBzdHJpbmcsIHJldHVybiBhIHN0cmluZyBpblxyXG4gICAgICogY2FzZSBUcnVzdGVkIFR5cGVzIGFyZSBub3Qgc3VwcG9ydGVkICAqL1xyXG5cclxuICAgIGxldCBSRVRVUk5fVFJVU1RFRF9UWVBFID0gZmFsc2U7XHJcbiAgICAvKiBPdXRwdXQgc2hvdWxkIGJlIGZyZWUgZnJvbSBET00gY2xvYmJlcmluZyBhdHRhY2tzP1xyXG4gICAgICogVGhpcyBzYW5pdGl6ZXMgbWFya3VwcyBuYW1lZCB3aXRoIGNvbGxpZGluZywgY2xvYmJlcmFibGUgYnVpbHQtaW4gRE9NIEFQSXMuXHJcbiAgICAgKi9cclxuXHJcbiAgICBsZXQgU0FOSVRJWkVfRE9NID0gdHJ1ZTtcclxuICAgIC8qIEFjaGlldmUgZnVsbCBET00gQ2xvYmJlcmluZyBwcm90ZWN0aW9uIGJ5IGlzb2xhdGluZyB0aGUgbmFtZXNwYWNlIG9mIG5hbWVkXHJcbiAgICAgKiBwcm9wZXJ0aWVzIGFuZCBKUyB2YXJpYWJsZXMsIG1pdGlnYXRpbmcgYXR0YWNrcyB0aGF0IGFidXNlIHRoZSBIVE1ML0RPTSBzcGVjIHJ1bGVzLlxyXG4gICAgICpcclxuICAgICAqIEhUTUwvRE9NIHNwZWMgcnVsZXMgdGhhdCBlbmFibGUgRE9NIENsb2JiZXJpbmc6XHJcbiAgICAgKiAgIC0gTmFtZWQgQWNjZXNzIG9uIFdpbmRvdyAowqc3LjMuMylcclxuICAgICAqICAgLSBET00gVHJlZSBBY2Nlc3NvcnMgKMKnMy4xLjUpXHJcbiAgICAgKiAgIC0gRm9ybSBFbGVtZW50IFBhcmVudC1DaGlsZCBSZWxhdGlvbnMgKMKnNC4xMC4zKVxyXG4gICAgICogICAtIElmcmFtZSBzcmNkb2MgLyBOZXN0ZWQgV2luZG93UHJveGllcyAowqc0LjguNSlcclxuICAgICAqICAgLSBIVE1MQ29sbGVjdGlvbiAowqc0LjIuMTAuMilcclxuICAgICAqXHJcbiAgICAgKiBOYW1lc3BhY2UgaXNvbGF0aW9uIGlzIGltcGxlbWVudGVkIGJ5IHByZWZpeGluZyBgaWRgIGFuZCBgbmFtZWAgYXR0cmlidXRlc1xyXG4gICAgICogd2l0aCBhIGNvbnN0YW50IHN0cmluZywgaS5lLiwgYHVzZXItY29udGVudC1gXHJcbiAgICAgKi9cclxuXHJcbiAgICBsZXQgU0FOSVRJWkVfTkFNRURfUFJPUFMgPSBmYWxzZTtcclxuICAgIGNvbnN0IFNBTklUSVpFX05BTUVEX1BST1BTX1BSRUZJWCA9ICd1c2VyLWNvbnRlbnQtJztcclxuICAgIC8qIEtlZXAgZWxlbWVudCBjb250ZW50IHdoZW4gcmVtb3ZpbmcgZWxlbWVudD8gKi9cclxuXHJcbiAgICBsZXQgS0VFUF9DT05URU5UID0gdHJ1ZTtcclxuICAgIC8qIElmIGEgYE5vZGVgIGlzIHBhc3NlZCB0byBzYW5pdGl6ZSgpLCB0aGVuIHBlcmZvcm1zIHNhbml0aXphdGlvbiBpbi1wbGFjZSBpbnN0ZWFkXHJcbiAgICAgKiBvZiBpbXBvcnRpbmcgaXQgaW50byBhIG5ldyBEb2N1bWVudCBhbmQgcmV0dXJuaW5nIGEgc2FuaXRpemVkIGNvcHkgKi9cclxuXHJcbiAgICBsZXQgSU5fUExBQ0UgPSBmYWxzZTtcclxuICAgIC8qIEFsbG93IHVzYWdlIG9mIHByb2ZpbGVzIGxpa2UgaHRtbCwgc3ZnIGFuZCBtYXRoTWwgKi9cclxuXHJcbiAgICBsZXQgVVNFX1BST0ZJTEVTID0ge307XHJcbiAgICAvKiBUYWdzIHRvIGlnbm9yZSBjb250ZW50IG9mIHdoZW4gS0VFUF9DT05URU5UIGlzIHRydWUgKi9cclxuXHJcbiAgICBsZXQgRk9SQklEX0NPTlRFTlRTID0gbnVsbDtcclxuICAgIGNvbnN0IERFRkFVTFRfRk9SQklEX0NPTlRFTlRTID0gYWRkVG9TZXQoe30sIFsnYW5ub3RhdGlvbi14bWwnLCAnYXVkaW8nLCAnY29sZ3JvdXAnLCAnZGVzYycsICdmb3JlaWdub2JqZWN0JywgJ2hlYWQnLCAnaWZyYW1lJywgJ21hdGgnLCAnbWknLCAnbW4nLCAnbW8nLCAnbXMnLCAnbXRleHQnLCAnbm9lbWJlZCcsICdub2ZyYW1lcycsICdub3NjcmlwdCcsICdwbGFpbnRleHQnLCAnc2NyaXB0JywgJ3N0eWxlJywgJ3N2ZycsICd0ZW1wbGF0ZScsICd0aGVhZCcsICd0aXRsZScsICd2aWRlbycsICd4bXAnXSk7XHJcbiAgICAvKiBUYWdzIHRoYXQgYXJlIHNhZmUgZm9yIGRhdGE6IFVSSXMgKi9cclxuXHJcbiAgICBsZXQgREFUQV9VUklfVEFHUyA9IG51bGw7XHJcbiAgICBjb25zdCBERUZBVUxUX0RBVEFfVVJJX1RBR1MgPSBhZGRUb1NldCh7fSwgWydhdWRpbycsICd2aWRlbycsICdpbWcnLCAnc291cmNlJywgJ2ltYWdlJywgJ3RyYWNrJ10pO1xyXG4gICAgLyogQXR0cmlidXRlcyBzYWZlIGZvciB2YWx1ZXMgbGlrZSBcImphdmFzY3JpcHQ6XCIgKi9cclxuXHJcbiAgICBsZXQgVVJJX1NBRkVfQVRUUklCVVRFUyA9IG51bGw7XHJcbiAgICBjb25zdCBERUZBVUxUX1VSSV9TQUZFX0FUVFJJQlVURVMgPSBhZGRUb1NldCh7fSwgWydhbHQnLCAnY2xhc3MnLCAnZm9yJywgJ2lkJywgJ2xhYmVsJywgJ25hbWUnLCAncGF0dGVybicsICdwbGFjZWhvbGRlcicsICdyb2xlJywgJ3N1bW1hcnknLCAndGl0bGUnLCAndmFsdWUnLCAnc3R5bGUnLCAneG1sbnMnXSk7XHJcbiAgICBjb25zdCBNQVRITUxfTkFNRVNQQUNFID0gJ2h0dHA6Ly93d3cudzMub3JnLzE5OTgvTWF0aC9NYXRoTUwnO1xyXG4gICAgY29uc3QgU1ZHX05BTUVTUEFDRSA9ICdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Zyc7XHJcbiAgICBjb25zdCBIVE1MX05BTUVTUEFDRSA9ICdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hodG1sJztcclxuICAgIC8qIERvY3VtZW50IG5hbWVzcGFjZSAqL1xyXG5cclxuICAgIGxldCBOQU1FU1BBQ0UgPSBIVE1MX05BTUVTUEFDRTtcclxuICAgIGxldCBJU19FTVBUWV9JTlBVVCA9IGZhbHNlO1xyXG4gICAgLyogQWxsb3dlZCBYSFRNTCtYTUwgbmFtZXNwYWNlcyAqL1xyXG5cclxuICAgIGxldCBBTExPV0VEX05BTUVTUEFDRVMgPSBudWxsO1xyXG4gICAgY29uc3QgREVGQVVMVF9BTExPV0VEX05BTUVTUEFDRVMgPSBhZGRUb1NldCh7fSwgW01BVEhNTF9OQU1FU1BBQ0UsIFNWR19OQU1FU1BBQ0UsIEhUTUxfTkFNRVNQQUNFXSwgc3RyaW5nVG9TdHJpbmcpO1xyXG4gICAgLyogUGFyc2luZyBvZiBzdHJpY3QgWEhUTUwgZG9jdW1lbnRzICovXHJcblxyXG4gICAgbGV0IFBBUlNFUl9NRURJQV9UWVBFO1xyXG4gICAgY29uc3QgU1VQUE9SVEVEX1BBUlNFUl9NRURJQV9UWVBFUyA9IFsnYXBwbGljYXRpb24veGh0bWwreG1sJywgJ3RleHQvaHRtbCddO1xyXG4gICAgY29uc3QgREVGQVVMVF9QQVJTRVJfTUVESUFfVFlQRSA9ICd0ZXh0L2h0bWwnO1xyXG4gICAgbGV0IHRyYW5zZm9ybUNhc2VGdW5jO1xyXG4gICAgLyogS2VlcCBhIHJlZmVyZW5jZSB0byBjb25maWcgdG8gcGFzcyB0byBob29rcyAqL1xyXG5cclxuICAgIGxldCBDT05GSUcgPSBudWxsO1xyXG4gICAgLyogSWRlYWxseSwgZG8gbm90IHRvdWNoIGFueXRoaW5nIGJlbG93IHRoaXMgbGluZSAqL1xyXG5cclxuICAgIC8qIF9fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX18gKi9cclxuXHJcbiAgICBjb25zdCBmb3JtRWxlbWVudCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2Zvcm0nKTtcclxuXHJcbiAgICBjb25zdCBpc1JlZ2V4T3JGdW5jdGlvbiA9IGZ1bmN0aW9uIGlzUmVnZXhPckZ1bmN0aW9uKHRlc3RWYWx1ZSkge1xyXG4gICAgICByZXR1cm4gdGVzdFZhbHVlIGluc3RhbmNlb2YgUmVnRXhwIHx8IHRlc3RWYWx1ZSBpbnN0YW5jZW9mIEZ1bmN0aW9uO1xyXG4gICAgfTtcclxuICAgIC8qKlxyXG4gICAgICogX3BhcnNlQ29uZmlnXHJcbiAgICAgKlxyXG4gICAgICogQHBhcmFtICB7T2JqZWN0fSBjZmcgb3B0aW9uYWwgY29uZmlnIGxpdGVyYWxcclxuICAgICAqL1xyXG4gICAgLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIGNvbXBsZXhpdHlcclxuXHJcblxyXG4gICAgY29uc3QgX3BhcnNlQ29uZmlnID0gZnVuY3Rpb24gX3BhcnNlQ29uZmlnKGNmZykge1xyXG4gICAgICBpZiAoQ09ORklHICYmIENPTkZJRyA9PT0gY2ZnKSB7XHJcbiAgICAgICAgcmV0dXJuO1xyXG4gICAgICB9XHJcbiAgICAgIC8qIFNoaWVsZCBjb25maWd1cmF0aW9uIG9iamVjdCBmcm9tIHRhbXBlcmluZyAqL1xyXG5cclxuXHJcbiAgICAgIGlmICghY2ZnIHx8IHR5cGVvZiBjZmcgIT09ICdvYmplY3QnKSB7XHJcbiAgICAgICAgY2ZnID0ge307XHJcbiAgICAgIH1cclxuICAgICAgLyogU2hpZWxkIGNvbmZpZ3VyYXRpb24gb2JqZWN0IGZyb20gcHJvdG90eXBlIHBvbGx1dGlvbiAqL1xyXG5cclxuXHJcbiAgICAgIGNmZyA9IGNsb25lKGNmZyk7XHJcbiAgICAgIFBBUlNFUl9NRURJQV9UWVBFID0gLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIHVuaWNvcm4vcHJlZmVyLWluY2x1ZGVzXHJcbiAgICAgIFNVUFBPUlRFRF9QQVJTRVJfTUVESUFfVFlQRVMuaW5kZXhPZihjZmcuUEFSU0VSX01FRElBX1RZUEUpID09PSAtMSA/IFBBUlNFUl9NRURJQV9UWVBFID0gREVGQVVMVF9QQVJTRVJfTUVESUFfVFlQRSA6IFBBUlNFUl9NRURJQV9UWVBFID0gY2ZnLlBBUlNFUl9NRURJQV9UWVBFOyAvLyBIVE1MIHRhZ3MgYW5kIGF0dHJpYnV0ZXMgYXJlIG5vdCBjYXNlLXNlbnNpdGl2ZSwgY29udmVydGluZyB0byBsb3dlcmNhc2UuIEtlZXBpbmcgWEhUTUwgYXMgaXMuXHJcblxyXG4gICAgICB0cmFuc2Zvcm1DYXNlRnVuYyA9IFBBUlNFUl9NRURJQV9UWVBFID09PSAnYXBwbGljYXRpb24veGh0bWwreG1sJyA/IHN0cmluZ1RvU3RyaW5nIDogc3RyaW5nVG9Mb3dlckNhc2U7XHJcbiAgICAgIC8qIFNldCBjb25maWd1cmF0aW9uIHBhcmFtZXRlcnMgKi9cclxuXHJcbiAgICAgIEFMTE9XRURfVEFHUyA9ICdBTExPV0VEX1RBR1MnIGluIGNmZyA/IGFkZFRvU2V0KHt9LCBjZmcuQUxMT1dFRF9UQUdTLCB0cmFuc2Zvcm1DYXNlRnVuYykgOiBERUZBVUxUX0FMTE9XRURfVEFHUztcclxuICAgICAgQUxMT1dFRF9BVFRSID0gJ0FMTE9XRURfQVRUUicgaW4gY2ZnID8gYWRkVG9TZXQoe30sIGNmZy5BTExPV0VEX0FUVFIsIHRyYW5zZm9ybUNhc2VGdW5jKSA6IERFRkFVTFRfQUxMT1dFRF9BVFRSO1xyXG4gICAgICBBTExPV0VEX05BTUVTUEFDRVMgPSAnQUxMT1dFRF9OQU1FU1BBQ0VTJyBpbiBjZmcgPyBhZGRUb1NldCh7fSwgY2ZnLkFMTE9XRURfTkFNRVNQQUNFUywgc3RyaW5nVG9TdHJpbmcpIDogREVGQVVMVF9BTExPV0VEX05BTUVTUEFDRVM7XHJcbiAgICAgIFVSSV9TQUZFX0FUVFJJQlVURVMgPSAnQUREX1VSSV9TQUZFX0FUVFInIGluIGNmZyA/IGFkZFRvU2V0KGNsb25lKERFRkFVTFRfVVJJX1NBRkVfQVRUUklCVVRFUyksIC8vIGVzbGludC1kaXNhYmxlLWxpbmUgaW5kZW50XHJcbiAgICAgIGNmZy5BRERfVVJJX1NBRkVfQVRUUiwgLy8gZXNsaW50LWRpc2FibGUtbGluZSBpbmRlbnRcclxuICAgICAgdHJhbnNmb3JtQ2FzZUZ1bmMgLy8gZXNsaW50LWRpc2FibGUtbGluZSBpbmRlbnRcclxuICAgICAgKSAvLyBlc2xpbnQtZGlzYWJsZS1saW5lIGluZGVudFxyXG4gICAgICA6IERFRkFVTFRfVVJJX1NBRkVfQVRUUklCVVRFUztcclxuICAgICAgREFUQV9VUklfVEFHUyA9ICdBRERfREFUQV9VUklfVEFHUycgaW4gY2ZnID8gYWRkVG9TZXQoY2xvbmUoREVGQVVMVF9EQVRBX1VSSV9UQUdTKSwgLy8gZXNsaW50LWRpc2FibGUtbGluZSBpbmRlbnRcclxuICAgICAgY2ZnLkFERF9EQVRBX1VSSV9UQUdTLCAvLyBlc2xpbnQtZGlzYWJsZS1saW5lIGluZGVudFxyXG4gICAgICB0cmFuc2Zvcm1DYXNlRnVuYyAvLyBlc2xpbnQtZGlzYWJsZS1saW5lIGluZGVudFxyXG4gICAgICApIC8vIGVzbGludC1kaXNhYmxlLWxpbmUgaW5kZW50XHJcbiAgICAgIDogREVGQVVMVF9EQVRBX1VSSV9UQUdTO1xyXG4gICAgICBGT1JCSURfQ09OVEVOVFMgPSAnRk9SQklEX0NPTlRFTlRTJyBpbiBjZmcgPyBhZGRUb1NldCh7fSwgY2ZnLkZPUkJJRF9DT05URU5UUywgdHJhbnNmb3JtQ2FzZUZ1bmMpIDogREVGQVVMVF9GT1JCSURfQ09OVEVOVFM7XHJcbiAgICAgIEZPUkJJRF9UQUdTID0gJ0ZPUkJJRF9UQUdTJyBpbiBjZmcgPyBhZGRUb1NldCh7fSwgY2ZnLkZPUkJJRF9UQUdTLCB0cmFuc2Zvcm1DYXNlRnVuYykgOiB7fTtcclxuICAgICAgRk9SQklEX0FUVFIgPSAnRk9SQklEX0FUVFInIGluIGNmZyA/IGFkZFRvU2V0KHt9LCBjZmcuRk9SQklEX0FUVFIsIHRyYW5zZm9ybUNhc2VGdW5jKSA6IHt9O1xyXG4gICAgICBVU0VfUFJPRklMRVMgPSAnVVNFX1BST0ZJTEVTJyBpbiBjZmcgPyBjZmcuVVNFX1BST0ZJTEVTIDogZmFsc2U7XHJcbiAgICAgIEFMTE9XX0FSSUFfQVRUUiA9IGNmZy5BTExPV19BUklBX0FUVFIgIT09IGZhbHNlOyAvLyBEZWZhdWx0IHRydWVcclxuXHJcbiAgICAgIEFMTE9XX0RBVEFfQVRUUiA9IGNmZy5BTExPV19EQVRBX0FUVFIgIT09IGZhbHNlOyAvLyBEZWZhdWx0IHRydWVcclxuXHJcbiAgICAgIEFMTE9XX1VOS05PV05fUFJPVE9DT0xTID0gY2ZnLkFMTE9XX1VOS05PV05fUFJPVE9DT0xTIHx8IGZhbHNlOyAvLyBEZWZhdWx0IGZhbHNlXHJcblxyXG4gICAgICBBTExPV19TRUxGX0NMT1NFX0lOX0FUVFIgPSBjZmcuQUxMT1dfU0VMRl9DTE9TRV9JTl9BVFRSICE9PSBmYWxzZTsgLy8gRGVmYXVsdCB0cnVlXHJcblxyXG4gICAgICBTQUZFX0ZPUl9URU1QTEFURVMgPSBjZmcuU0FGRV9GT1JfVEVNUExBVEVTIHx8IGZhbHNlOyAvLyBEZWZhdWx0IGZhbHNlXHJcblxyXG4gICAgICBXSE9MRV9ET0NVTUVOVCA9IGNmZy5XSE9MRV9ET0NVTUVOVCB8fCBmYWxzZTsgLy8gRGVmYXVsdCBmYWxzZVxyXG5cclxuICAgICAgUkVUVVJOX0RPTSA9IGNmZy5SRVRVUk5fRE9NIHx8IGZhbHNlOyAvLyBEZWZhdWx0IGZhbHNlXHJcblxyXG4gICAgICBSRVRVUk5fRE9NX0ZSQUdNRU5UID0gY2ZnLlJFVFVSTl9ET01fRlJBR01FTlQgfHwgZmFsc2U7IC8vIERlZmF1bHQgZmFsc2VcclxuXHJcbiAgICAgIFJFVFVSTl9UUlVTVEVEX1RZUEUgPSBjZmcuUkVUVVJOX1RSVVNURURfVFlQRSB8fCBmYWxzZTsgLy8gRGVmYXVsdCBmYWxzZVxyXG5cclxuICAgICAgRk9SQ0VfQk9EWSA9IGNmZy5GT1JDRV9CT0RZIHx8IGZhbHNlOyAvLyBEZWZhdWx0IGZhbHNlXHJcblxyXG4gICAgICBTQU5JVElaRV9ET00gPSBjZmcuU0FOSVRJWkVfRE9NICE9PSBmYWxzZTsgLy8gRGVmYXVsdCB0cnVlXHJcblxyXG4gICAgICBTQU5JVElaRV9OQU1FRF9QUk9QUyA9IGNmZy5TQU5JVElaRV9OQU1FRF9QUk9QUyB8fCBmYWxzZTsgLy8gRGVmYXVsdCBmYWxzZVxyXG5cclxuICAgICAgS0VFUF9DT05URU5UID0gY2ZnLktFRVBfQ09OVEVOVCAhPT0gZmFsc2U7IC8vIERlZmF1bHQgdHJ1ZVxyXG5cclxuICAgICAgSU5fUExBQ0UgPSBjZmcuSU5fUExBQ0UgfHwgZmFsc2U7IC8vIERlZmF1bHQgZmFsc2VcclxuXHJcbiAgICAgIElTX0FMTE9XRURfVVJJJDEgPSBjZmcuQUxMT1dFRF9VUklfUkVHRVhQIHx8IElTX0FMTE9XRURfVVJJO1xyXG4gICAgICBOQU1FU1BBQ0UgPSBjZmcuTkFNRVNQQUNFIHx8IEhUTUxfTkFNRVNQQUNFO1xyXG4gICAgICBDVVNUT01fRUxFTUVOVF9IQU5ETElORyA9IGNmZy5DVVNUT01fRUxFTUVOVF9IQU5ETElORyB8fCB7fTtcclxuXHJcbiAgICAgIGlmIChjZmcuQ1VTVE9NX0VMRU1FTlRfSEFORExJTkcgJiYgaXNSZWdleE9yRnVuY3Rpb24oY2ZnLkNVU1RPTV9FTEVNRU5UX0hBTkRMSU5HLnRhZ05hbWVDaGVjaykpIHtcclxuICAgICAgICBDVVNUT01fRUxFTUVOVF9IQU5ETElORy50YWdOYW1lQ2hlY2sgPSBjZmcuQ1VTVE9NX0VMRU1FTlRfSEFORExJTkcudGFnTmFtZUNoZWNrO1xyXG4gICAgICB9XHJcblxyXG4gICAgICBpZiAoY2ZnLkNVU1RPTV9FTEVNRU5UX0hBTkRMSU5HICYmIGlzUmVnZXhPckZ1bmN0aW9uKGNmZy5DVVNUT01fRUxFTUVOVF9IQU5ETElORy5hdHRyaWJ1dGVOYW1lQ2hlY2spKSB7XHJcbiAgICAgICAgQ1VTVE9NX0VMRU1FTlRfSEFORExJTkcuYXR0cmlidXRlTmFtZUNoZWNrID0gY2ZnLkNVU1RPTV9FTEVNRU5UX0hBTkRMSU5HLmF0dHJpYnV0ZU5hbWVDaGVjaztcclxuICAgICAgfVxyXG5cclxuICAgICAgaWYgKGNmZy5DVVNUT01fRUxFTUVOVF9IQU5ETElORyAmJiB0eXBlb2YgY2ZnLkNVU1RPTV9FTEVNRU5UX0hBTkRMSU5HLmFsbG93Q3VzdG9taXplZEJ1aWx0SW5FbGVtZW50cyA9PT0gJ2Jvb2xlYW4nKSB7XHJcbiAgICAgICAgQ1VTVE9NX0VMRU1FTlRfSEFORExJTkcuYWxsb3dDdXN0b21pemVkQnVpbHRJbkVsZW1lbnRzID0gY2ZnLkNVU1RPTV9FTEVNRU5UX0hBTkRMSU5HLmFsbG93Q3VzdG9taXplZEJ1aWx0SW5FbGVtZW50cztcclxuICAgICAgfVxyXG5cclxuICAgICAgaWYgKFNBRkVfRk9SX1RFTVBMQVRFUykge1xyXG4gICAgICAgIEFMTE9XX0RBVEFfQVRUUiA9IGZhbHNlO1xyXG4gICAgICB9XHJcblxyXG4gICAgICBpZiAoUkVUVVJOX0RPTV9GUkFHTUVOVCkge1xyXG4gICAgICAgIFJFVFVSTl9ET00gPSB0cnVlO1xyXG4gICAgICB9XHJcbiAgICAgIC8qIFBhcnNlIHByb2ZpbGUgaW5mbyAqL1xyXG5cclxuXHJcbiAgICAgIGlmIChVU0VfUFJPRklMRVMpIHtcclxuICAgICAgICBBTExPV0VEX1RBR1MgPSBhZGRUb1NldCh7fSwgWy4uLnRleHRdKTtcclxuICAgICAgICBBTExPV0VEX0FUVFIgPSBbXTtcclxuXHJcbiAgICAgICAgaWYgKFVTRV9QUk9GSUxFUy5odG1sID09PSB0cnVlKSB7XHJcbiAgICAgICAgICBhZGRUb1NldChBTExPV0VEX1RBR1MsIGh0bWwkMSk7XHJcbiAgICAgICAgICBhZGRUb1NldChBTExPV0VEX0FUVFIsIGh0bWwpO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgaWYgKFVTRV9QUk9GSUxFUy5zdmcgPT09IHRydWUpIHtcclxuICAgICAgICAgIGFkZFRvU2V0KEFMTE9XRURfVEFHUywgc3ZnJDEpO1xyXG4gICAgICAgICAgYWRkVG9TZXQoQUxMT1dFRF9BVFRSLCBzdmcpO1xyXG4gICAgICAgICAgYWRkVG9TZXQoQUxMT1dFRF9BVFRSLCB4bWwpO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgaWYgKFVTRV9QUk9GSUxFUy5zdmdGaWx0ZXJzID09PSB0cnVlKSB7XHJcbiAgICAgICAgICBhZGRUb1NldChBTExPV0VEX1RBR1MsIHN2Z0ZpbHRlcnMpO1xyXG4gICAgICAgICAgYWRkVG9TZXQoQUxMT1dFRF9BVFRSLCBzdmcpO1xyXG4gICAgICAgICAgYWRkVG9TZXQoQUxMT1dFRF9BVFRSLCB4bWwpO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgaWYgKFVTRV9QUk9GSUxFUy5tYXRoTWwgPT09IHRydWUpIHtcclxuICAgICAgICAgIGFkZFRvU2V0KEFMTE9XRURfVEFHUywgbWF0aE1sJDEpO1xyXG4gICAgICAgICAgYWRkVG9TZXQoQUxMT1dFRF9BVFRSLCBtYXRoTWwpO1xyXG4gICAgICAgICAgYWRkVG9TZXQoQUxMT1dFRF9BVFRSLCB4bWwpO1xyXG4gICAgICAgIH1cclxuICAgICAgfVxyXG4gICAgICAvKiBNZXJnZSBjb25maWd1cmF0aW9uIHBhcmFtZXRlcnMgKi9cclxuXHJcblxyXG4gICAgICBpZiAoY2ZnLkFERF9UQUdTKSB7XHJcbiAgICAgICAgaWYgKEFMTE9XRURfVEFHUyA9PT0gREVGQVVMVF9BTExPV0VEX1RBR1MpIHtcclxuICAgICAgICAgIEFMTE9XRURfVEFHUyA9IGNsb25lKEFMTE9XRURfVEFHUyk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBhZGRUb1NldChBTExPV0VEX1RBR1MsIGNmZy5BRERfVEFHUywgdHJhbnNmb3JtQ2FzZUZ1bmMpO1xyXG4gICAgICB9XHJcblxyXG4gICAgICBpZiAoY2ZnLkFERF9BVFRSKSB7XHJcbiAgICAgICAgaWYgKEFMTE9XRURfQVRUUiA9PT0gREVGQVVMVF9BTExPV0VEX0FUVFIpIHtcclxuICAgICAgICAgIEFMTE9XRURfQVRUUiA9IGNsb25lKEFMTE9XRURfQVRUUik7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBhZGRUb1NldChBTExPV0VEX0FUVFIsIGNmZy5BRERfQVRUUiwgdHJhbnNmb3JtQ2FzZUZ1bmMpO1xyXG4gICAgICB9XHJcblxyXG4gICAgICBpZiAoY2ZnLkFERF9VUklfU0FGRV9BVFRSKSB7XHJcbiAgICAgICAgYWRkVG9TZXQoVVJJX1NBRkVfQVRUUklCVVRFUywgY2ZnLkFERF9VUklfU0FGRV9BVFRSLCB0cmFuc2Zvcm1DYXNlRnVuYyk7XHJcbiAgICAgIH1cclxuXHJcbiAgICAgIGlmIChjZmcuRk9SQklEX0NPTlRFTlRTKSB7XHJcbiAgICAgICAgaWYgKEZPUkJJRF9DT05URU5UUyA9PT0gREVGQVVMVF9GT1JCSURfQ09OVEVOVFMpIHtcclxuICAgICAgICAgIEZPUkJJRF9DT05URU5UUyA9IGNsb25lKEZPUkJJRF9DT05URU5UUyk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBhZGRUb1NldChGT1JCSURfQ09OVEVOVFMsIGNmZy5GT1JCSURfQ09OVEVOVFMsIHRyYW5zZm9ybUNhc2VGdW5jKTtcclxuICAgICAgfVxyXG4gICAgICAvKiBBZGQgI3RleHQgaW4gY2FzZSBLRUVQX0NPTlRFTlQgaXMgc2V0IHRvIHRydWUgKi9cclxuXHJcblxyXG4gICAgICBpZiAoS0VFUF9DT05URU5UKSB7XHJcbiAgICAgICAgQUxMT1dFRF9UQUdTWycjdGV4dCddID0gdHJ1ZTtcclxuICAgICAgfVxyXG4gICAgICAvKiBBZGQgaHRtbCwgaGVhZCBhbmQgYm9keSB0byBBTExPV0VEX1RBR1MgaW4gY2FzZSBXSE9MRV9ET0NVTUVOVCBpcyB0cnVlICovXHJcblxyXG5cclxuICAgICAgaWYgKFdIT0xFX0RPQ1VNRU5UKSB7XHJcbiAgICAgICAgYWRkVG9TZXQoQUxMT1dFRF9UQUdTLCBbJ2h0bWwnLCAnaGVhZCcsICdib2R5J10pO1xyXG4gICAgICB9XHJcbiAgICAgIC8qIEFkZCB0Ym9keSB0byBBTExPV0VEX1RBR1MgaW4gY2FzZSB0YWJsZXMgYXJlIHBlcm1pdHRlZCwgc2VlICMyODYsICMzNjUgKi9cclxuXHJcblxyXG4gICAgICBpZiAoQUxMT1dFRF9UQUdTLnRhYmxlKSB7XHJcbiAgICAgICAgYWRkVG9TZXQoQUxMT1dFRF9UQUdTLCBbJ3Rib2R5J10pO1xyXG4gICAgICAgIGRlbGV0ZSBGT1JCSURfVEFHUy50Ym9keTtcclxuICAgICAgfSAvLyBQcmV2ZW50IGZ1cnRoZXIgbWFuaXB1bGF0aW9uIG9mIGNvbmZpZ3VyYXRpb24uXHJcbiAgICAgIC8vIE5vdCBhdmFpbGFibGUgaW4gSUU4LCBTYWZhcmkgNSwgZXRjLlxyXG5cclxuXHJcbiAgICAgIGlmIChmcmVlemUpIHtcclxuICAgICAgICBmcmVlemUoY2ZnKTtcclxuICAgICAgfVxyXG5cclxuICAgICAgQ09ORklHID0gY2ZnO1xyXG4gICAgfTtcclxuXHJcbiAgICBjb25zdCBNQVRITUxfVEVYVF9JTlRFR1JBVElPTl9QT0lOVFMgPSBhZGRUb1NldCh7fSwgWydtaScsICdtbycsICdtbicsICdtcycsICdtdGV4dCddKTtcclxuICAgIGNvbnN0IEhUTUxfSU5URUdSQVRJT05fUE9JTlRTID0gYWRkVG9TZXQoe30sIFsnZm9yZWlnbm9iamVjdCcsICdkZXNjJywgJ3RpdGxlJywgJ2Fubm90YXRpb24teG1sJ10pOyAvLyBDZXJ0YWluIGVsZW1lbnRzIGFyZSBhbGxvd2VkIGluIGJvdGggU1ZHIGFuZCBIVE1MXHJcbiAgICAvLyBuYW1lc3BhY2UuIFdlIG5lZWQgdG8gc3BlY2lmeSB0aGVtIGV4cGxpY2l0bHlcclxuICAgIC8vIHNvIHRoYXQgdGhleSBkb24ndCBnZXQgZXJyb25lb3VzbHkgZGVsZXRlZCBmcm9tXHJcbiAgICAvLyBIVE1MIG5hbWVzcGFjZS5cclxuXHJcbiAgICBjb25zdCBDT01NT05fU1ZHX0FORF9IVE1MX0VMRU1FTlRTID0gYWRkVG9TZXQoe30sIFsndGl0bGUnLCAnc3R5bGUnLCAnZm9udCcsICdhJywgJ3NjcmlwdCddKTtcclxuICAgIC8qIEtlZXAgdHJhY2sgb2YgYWxsIHBvc3NpYmxlIFNWRyBhbmQgTWF0aE1MIHRhZ3NcclxuICAgICAqIHNvIHRoYXQgd2UgY2FuIHBlcmZvcm0gdGhlIG5hbWVzcGFjZSBjaGVja3NcclxuICAgICAqIGNvcnJlY3RseS4gKi9cclxuXHJcbiAgICBjb25zdCBBTExfU1ZHX1RBR1MgPSBhZGRUb1NldCh7fSwgc3ZnJDEpO1xyXG4gICAgYWRkVG9TZXQoQUxMX1NWR19UQUdTLCBzdmdGaWx0ZXJzKTtcclxuICAgIGFkZFRvU2V0KEFMTF9TVkdfVEFHUywgc3ZnRGlzYWxsb3dlZCk7XHJcbiAgICBjb25zdCBBTExfTUFUSE1MX1RBR1MgPSBhZGRUb1NldCh7fSwgbWF0aE1sJDEpO1xyXG4gICAgYWRkVG9TZXQoQUxMX01BVEhNTF9UQUdTLCBtYXRoTWxEaXNhbGxvd2VkKTtcclxuICAgIC8qKlxyXG4gICAgICpcclxuICAgICAqXHJcbiAgICAgKiBAcGFyYW0gIHtFbGVtZW50fSBlbGVtZW50IGEgRE9NIGVsZW1lbnQgd2hvc2UgbmFtZXNwYWNlIGlzIGJlaW5nIGNoZWNrZWRcclxuICAgICAqIEByZXR1cm5zIHtib29sZWFufSBSZXR1cm4gZmFsc2UgaWYgdGhlIGVsZW1lbnQgaGFzIGFcclxuICAgICAqICBuYW1lc3BhY2UgdGhhdCBhIHNwZWMtY29tcGxpYW50IHBhcnNlciB3b3VsZCBuZXZlclxyXG4gICAgICogIHJldHVybi4gUmV0dXJuIHRydWUgb3RoZXJ3aXNlLlxyXG4gICAgICovXHJcblxyXG4gICAgY29uc3QgX2NoZWNrVmFsaWROYW1lc3BhY2UgPSBmdW5jdGlvbiBfY2hlY2tWYWxpZE5hbWVzcGFjZShlbGVtZW50KSB7XHJcbiAgICAgIGxldCBwYXJlbnQgPSBnZXRQYXJlbnROb2RlKGVsZW1lbnQpOyAvLyBJbiBKU0RPTSwgaWYgd2UncmUgaW5zaWRlIHNoYWRvdyBET00sIHRoZW4gcGFyZW50Tm9kZVxyXG4gICAgICAvLyBjYW4gYmUgbnVsbC4gV2UganVzdCBzaW11bGF0ZSBwYXJlbnQgaW4gdGhpcyBjYXNlLlxyXG5cclxuICAgICAgaWYgKCFwYXJlbnQgfHwgIXBhcmVudC50YWdOYW1lKSB7XHJcbiAgICAgICAgcGFyZW50ID0ge1xyXG4gICAgICAgICAgbmFtZXNwYWNlVVJJOiBOQU1FU1BBQ0UsXHJcbiAgICAgICAgICB0YWdOYW1lOiAndGVtcGxhdGUnXHJcbiAgICAgICAgfTtcclxuICAgICAgfVxyXG5cclxuICAgICAgY29uc3QgdGFnTmFtZSA9IHN0cmluZ1RvTG93ZXJDYXNlKGVsZW1lbnQudGFnTmFtZSk7XHJcbiAgICAgIGNvbnN0IHBhcmVudFRhZ05hbWUgPSBzdHJpbmdUb0xvd2VyQ2FzZShwYXJlbnQudGFnTmFtZSk7XHJcblxyXG4gICAgICBpZiAoIUFMTE9XRURfTkFNRVNQQUNFU1tlbGVtZW50Lm5hbWVzcGFjZVVSSV0pIHtcclxuICAgICAgICByZXR1cm4gZmFsc2U7XHJcbiAgICAgIH1cclxuXHJcbiAgICAgIGlmIChlbGVtZW50Lm5hbWVzcGFjZVVSSSA9PT0gU1ZHX05BTUVTUEFDRSkge1xyXG4gICAgICAgIC8vIFRoZSBvbmx5IHdheSB0byBzd2l0Y2ggZnJvbSBIVE1MIG5hbWVzcGFjZSB0byBTVkdcclxuICAgICAgICAvLyBpcyB2aWEgPHN2Zz4uIElmIGl0IGhhcHBlbnMgdmlhIGFueSBvdGhlciB0YWcsIHRoZW5cclxuICAgICAgICAvLyBpdCBzaG91bGQgYmUga2lsbGVkLlxyXG4gICAgICAgIGlmIChwYXJlbnQubmFtZXNwYWNlVVJJID09PSBIVE1MX05BTUVTUEFDRSkge1xyXG4gICAgICAgICAgcmV0dXJuIHRhZ05hbWUgPT09ICdzdmcnO1xyXG4gICAgICAgIH0gLy8gVGhlIG9ubHkgd2F5IHRvIHN3aXRjaCBmcm9tIE1hdGhNTCB0byBTVkcgaXMgdmlhYFxyXG4gICAgICAgIC8vIHN2ZyBpZiBwYXJlbnQgaXMgZWl0aGVyIDxhbm5vdGF0aW9uLXhtbD4gb3IgTWF0aE1MXHJcbiAgICAgICAgLy8gdGV4dCBpbnRlZ3JhdGlvbiBwb2ludHMuXHJcblxyXG5cclxuICAgICAgICBpZiAocGFyZW50Lm5hbWVzcGFjZVVSSSA9PT0gTUFUSE1MX05BTUVTUEFDRSkge1xyXG4gICAgICAgICAgcmV0dXJuIHRhZ05hbWUgPT09ICdzdmcnICYmIChwYXJlbnRUYWdOYW1lID09PSAnYW5ub3RhdGlvbi14bWwnIHx8IE1BVEhNTF9URVhUX0lOVEVHUkFUSU9OX1BPSU5UU1twYXJlbnRUYWdOYW1lXSk7XHJcbiAgICAgICAgfSAvLyBXZSBvbmx5IGFsbG93IGVsZW1lbnRzIHRoYXQgYXJlIGRlZmluZWQgaW4gU1ZHXHJcbiAgICAgICAgLy8gc3BlYy4gQWxsIG90aGVycyBhcmUgZGlzYWxsb3dlZCBpbiBTVkcgbmFtZXNwYWNlLlxyXG5cclxuXHJcbiAgICAgICAgcmV0dXJuIEJvb2xlYW4oQUxMX1NWR19UQUdTW3RhZ05hbWVdKTtcclxuICAgICAgfVxyXG5cclxuICAgICAgaWYgKGVsZW1lbnQubmFtZXNwYWNlVVJJID09PSBNQVRITUxfTkFNRVNQQUNFKSB7XHJcbiAgICAgICAgLy8gVGhlIG9ubHkgd2F5IHRvIHN3aXRjaCBmcm9tIEhUTUwgbmFtZXNwYWNlIHRvIE1hdGhNTFxyXG4gICAgICAgIC8vIGlzIHZpYSA8bWF0aD4uIElmIGl0IGhhcHBlbnMgdmlhIGFueSBvdGhlciB0YWcsIHRoZW5cclxuICAgICAgICAvLyBpdCBzaG91bGQgYmUga2lsbGVkLlxyXG4gICAgICAgIGlmIChwYXJlbnQubmFtZXNwYWNlVVJJID09PSBIVE1MX05BTUVTUEFDRSkge1xyXG4gICAgICAgICAgcmV0dXJuIHRhZ05hbWUgPT09ICdtYXRoJztcclxuICAgICAgICB9IC8vIFRoZSBvbmx5IHdheSB0byBzd2l0Y2ggZnJvbSBTVkcgdG8gTWF0aE1MIGlzIHZpYVxyXG4gICAgICAgIC8vIDxtYXRoPiBhbmQgSFRNTCBpbnRlZ3JhdGlvbiBwb2ludHNcclxuXHJcblxyXG4gICAgICAgIGlmIChwYXJlbnQubmFtZXNwYWNlVVJJID09PSBTVkdfTkFNRVNQQUNFKSB7XHJcbiAgICAgICAgICByZXR1cm4gdGFnTmFtZSA9PT0gJ21hdGgnICYmIEhUTUxfSU5URUdSQVRJT05fUE9JTlRTW3BhcmVudFRhZ05hbWVdO1xyXG4gICAgICAgIH0gLy8gV2Ugb25seSBhbGxvdyBlbGVtZW50cyB0aGF0IGFyZSBkZWZpbmVkIGluIE1hdGhNTFxyXG4gICAgICAgIC8vIHNwZWMuIEFsbCBvdGhlcnMgYXJlIGRpc2FsbG93ZWQgaW4gTWF0aE1MIG5hbWVzcGFjZS5cclxuXHJcblxyXG4gICAgICAgIHJldHVybiBCb29sZWFuKEFMTF9NQVRITUxfVEFHU1t0YWdOYW1lXSk7XHJcbiAgICAgIH1cclxuXHJcbiAgICAgIGlmIChlbGVtZW50Lm5hbWVzcGFjZVVSSSA9PT0gSFRNTF9OQU1FU1BBQ0UpIHtcclxuICAgICAgICAvLyBUaGUgb25seSB3YXkgdG8gc3dpdGNoIGZyb20gU1ZHIHRvIEhUTUwgaXMgdmlhXHJcbiAgICAgICAgLy8gSFRNTCBpbnRlZ3JhdGlvbiBwb2ludHMsIGFuZCBmcm9tIE1hdGhNTCB0byBIVE1MXHJcbiAgICAgICAgLy8gaXMgdmlhIE1hdGhNTCB0ZXh0IGludGVncmF0aW9uIHBvaW50c1xyXG4gICAgICAgIGlmIChwYXJlbnQubmFtZXNwYWNlVVJJID09PSBTVkdfTkFNRVNQQUNFICYmICFIVE1MX0lOVEVHUkFUSU9OX1BPSU5UU1twYXJlbnRUYWdOYW1lXSkge1xyXG4gICAgICAgICAgcmV0dXJuIGZhbHNlO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgaWYgKHBhcmVudC5uYW1lc3BhY2VVUkkgPT09IE1BVEhNTF9OQU1FU1BBQ0UgJiYgIU1BVEhNTF9URVhUX0lOVEVHUkFUSU9OX1BPSU5UU1twYXJlbnRUYWdOYW1lXSkge1xyXG4gICAgICAgICAgcmV0dXJuIGZhbHNlO1xyXG4gICAgICAgIH0gLy8gV2UgZGlzYWxsb3cgdGFncyB0aGF0IGFyZSBzcGVjaWZpYyBmb3IgTWF0aE1MXHJcbiAgICAgICAgLy8gb3IgU1ZHIGFuZCBzaG91bGQgbmV2ZXIgYXBwZWFyIGluIEhUTUwgbmFtZXNwYWNlXHJcblxyXG5cclxuICAgICAgICByZXR1cm4gIUFMTF9NQVRITUxfVEFHU1t0YWdOYW1lXSAmJiAoQ09NTU9OX1NWR19BTkRfSFRNTF9FTEVNRU5UU1t0YWdOYW1lXSB8fCAhQUxMX1NWR19UQUdTW3RhZ05hbWVdKTtcclxuICAgICAgfSAvLyBGb3IgWEhUTUwgYW5kIFhNTCBkb2N1bWVudHMgdGhhdCBzdXBwb3J0IGN1c3RvbSBuYW1lc3BhY2VzXHJcblxyXG5cclxuICAgICAgaWYgKFBBUlNFUl9NRURJQV9UWVBFID09PSAnYXBwbGljYXRpb24veGh0bWwreG1sJyAmJiBBTExPV0VEX05BTUVTUEFDRVNbZWxlbWVudC5uYW1lc3BhY2VVUkldKSB7XHJcbiAgICAgICAgcmV0dXJuIHRydWU7XHJcbiAgICAgIH0gLy8gVGhlIGNvZGUgc2hvdWxkIG5ldmVyIHJlYWNoIHRoaXMgcGxhY2UgKHRoaXMgbWVhbnNcclxuICAgICAgLy8gdGhhdCB0aGUgZWxlbWVudCBzb21laG93IGdvdCBuYW1lc3BhY2UgdGhhdCBpcyBub3RcclxuICAgICAgLy8gSFRNTCwgU1ZHLCBNYXRoTUwgb3IgYWxsb3dlZCB2aWEgQUxMT1dFRF9OQU1FU1BBQ0VTKS5cclxuICAgICAgLy8gUmV0dXJuIGZhbHNlIGp1c3QgaW4gY2FzZS5cclxuXHJcblxyXG4gICAgICByZXR1cm4gZmFsc2U7XHJcbiAgICB9O1xyXG4gICAgLyoqXHJcbiAgICAgKiBfZm9yY2VSZW1vdmVcclxuICAgICAqXHJcbiAgICAgKiBAcGFyYW0gIHtOb2RlfSBub2RlIGEgRE9NIG5vZGVcclxuICAgICAqL1xyXG5cclxuXHJcbiAgICBjb25zdCBfZm9yY2VSZW1vdmUgPSBmdW5jdGlvbiBfZm9yY2VSZW1vdmUobm9kZSkge1xyXG4gICAgICBhcnJheVB1c2goRE9NUHVyaWZ5LnJlbW92ZWQsIHtcclxuICAgICAgICBlbGVtZW50OiBub2RlXHJcbiAgICAgIH0pO1xyXG5cclxuICAgICAgdHJ5IHtcclxuICAgICAgICAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgdW5pY29ybi9wcmVmZXItZG9tLW5vZGUtcmVtb3ZlXHJcbiAgICAgICAgbm9kZS5wYXJlbnROb2RlLnJlbW92ZUNoaWxkKG5vZGUpO1xyXG4gICAgICB9IGNhdGNoIChfKSB7XHJcbiAgICAgICAgbm9kZS5yZW1vdmUoKTtcclxuICAgICAgfVxyXG4gICAgfTtcclxuICAgIC8qKlxyXG4gICAgICogX3JlbW92ZUF0dHJpYnV0ZVxyXG4gICAgICpcclxuICAgICAqIEBwYXJhbSAge1N0cmluZ30gbmFtZSBhbiBBdHRyaWJ1dGUgbmFtZVxyXG4gICAgICogQHBhcmFtICB7Tm9kZX0gbm9kZSBhIERPTSBub2RlXHJcbiAgICAgKi9cclxuXHJcblxyXG4gICAgY29uc3QgX3JlbW92ZUF0dHJpYnV0ZSA9IGZ1bmN0aW9uIF9yZW1vdmVBdHRyaWJ1dGUobmFtZSwgbm9kZSkge1xyXG4gICAgICB0cnkge1xyXG4gICAgICAgIGFycmF5UHVzaChET01QdXJpZnkucmVtb3ZlZCwge1xyXG4gICAgICAgICAgYXR0cmlidXRlOiBub2RlLmdldEF0dHJpYnV0ZU5vZGUobmFtZSksXHJcbiAgICAgICAgICBmcm9tOiBub2RlXHJcbiAgICAgICAgfSk7XHJcbiAgICAgIH0gY2F0Y2ggKF8pIHtcclxuICAgICAgICBhcnJheVB1c2goRE9NUHVyaWZ5LnJlbW92ZWQsIHtcclxuICAgICAgICAgIGF0dHJpYnV0ZTogbnVsbCxcclxuICAgICAgICAgIGZyb206IG5vZGVcclxuICAgICAgICB9KTtcclxuICAgICAgfVxyXG5cclxuICAgICAgbm9kZS5yZW1vdmVBdHRyaWJ1dGUobmFtZSk7IC8vIFdlIHZvaWQgYXR0cmlidXRlIHZhbHVlcyBmb3IgdW5yZW1vdmFibGUgXCJpc1wiXCIgYXR0cmlidXRlc1xyXG5cclxuICAgICAgaWYgKG5hbWUgPT09ICdpcycgJiYgIUFMTE9XRURfQVRUUltuYW1lXSkge1xyXG4gICAgICAgIGlmIChSRVRVUk5fRE9NIHx8IFJFVFVSTl9ET01fRlJBR01FTlQpIHtcclxuICAgICAgICAgIHRyeSB7XHJcbiAgICAgICAgICAgIF9mb3JjZVJlbW92ZShub2RlKTtcclxuICAgICAgICAgIH0gY2F0Y2ggKF8pIHt9XHJcbiAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgIHRyeSB7XHJcbiAgICAgICAgICAgIG5vZGUuc2V0QXR0cmlidXRlKG5hbWUsICcnKTtcclxuICAgICAgICAgIH0gY2F0Y2ggKF8pIHt9XHJcbiAgICAgICAgfVxyXG4gICAgICB9XHJcbiAgICB9O1xyXG4gICAgLyoqXHJcbiAgICAgKiBfaW5pdERvY3VtZW50XHJcbiAgICAgKlxyXG4gICAgICogQHBhcmFtICB7U3RyaW5nfSBkaXJ0eSBhIHN0cmluZyBvZiBkaXJ0eSBtYXJrdXBcclxuICAgICAqIEByZXR1cm4ge0RvY3VtZW50fSBhIERPTSwgZmlsbGVkIHdpdGggdGhlIGRpcnR5IG1hcmt1cFxyXG4gICAgICovXHJcblxyXG5cclxuICAgIGNvbnN0IF9pbml0RG9jdW1lbnQgPSBmdW5jdGlvbiBfaW5pdERvY3VtZW50KGRpcnR5KSB7XHJcbiAgICAgIC8qIENyZWF0ZSBhIEhUTUwgZG9jdW1lbnQgKi9cclxuICAgICAgbGV0IGRvYztcclxuICAgICAgbGV0IGxlYWRpbmdXaGl0ZXNwYWNlO1xyXG5cclxuICAgICAgaWYgKEZPUkNFX0JPRFkpIHtcclxuICAgICAgICBkaXJ0eSA9ICc8cmVtb3ZlPjwvcmVtb3ZlPicgKyBkaXJ0eTtcclxuICAgICAgfSBlbHNlIHtcclxuICAgICAgICAvKiBJZiBGT1JDRV9CT0RZIGlzbid0IHVzZWQsIGxlYWRpbmcgd2hpdGVzcGFjZSBuZWVkcyB0byBiZSBwcmVzZXJ2ZWQgbWFudWFsbHkgKi9cclxuICAgICAgICBjb25zdCBtYXRjaGVzID0gc3RyaW5nTWF0Y2goZGlydHksIC9eW1xcclxcblxcdCBdKy8pO1xyXG4gICAgICAgIGxlYWRpbmdXaGl0ZXNwYWNlID0gbWF0Y2hlcyAmJiBtYXRjaGVzWzBdO1xyXG4gICAgICB9XHJcblxyXG4gICAgICBpZiAoUEFSU0VSX01FRElBX1RZUEUgPT09ICdhcHBsaWNhdGlvbi94aHRtbCt4bWwnICYmIE5BTUVTUEFDRSA9PT0gSFRNTF9OQU1FU1BBQ0UpIHtcclxuICAgICAgICAvLyBSb290IG9mIFhIVE1MIGRvYyBtdXN0IGNvbnRhaW4geG1sbnMgZGVjbGFyYXRpb24gKHNlZSBodHRwczovL3d3dy53My5vcmcvVFIveGh0bWwxL25vcm1hdGl2ZS5odG1sI3N0cmljdClcclxuICAgICAgICBkaXJ0eSA9ICc8aHRtbCB4bWxucz1cImh0dHA6Ly93d3cudzMub3JnLzE5OTkveGh0bWxcIj48aGVhZD48L2hlYWQ+PGJvZHk+JyArIGRpcnR5ICsgJzwvYm9keT48L2h0bWw+JztcclxuICAgICAgfVxyXG5cclxuICAgICAgY29uc3QgZGlydHlQYXlsb2FkID0gdHJ1c3RlZFR5cGVzUG9saWN5ID8gdHJ1c3RlZFR5cGVzUG9saWN5LmNyZWF0ZUhUTUwoZGlydHkpIDogZGlydHk7XHJcbiAgICAgIC8qXHJcbiAgICAgICAqIFVzZSB0aGUgRE9NUGFyc2VyIEFQSSBieSBkZWZhdWx0LCBmYWxsYmFjayBsYXRlciBpZiBuZWVkcyBiZVxyXG4gICAgICAgKiBET01QYXJzZXIgbm90IHdvcmsgZm9yIHN2ZyB3aGVuIGhhcyBtdWx0aXBsZSByb290IGVsZW1lbnQuXHJcbiAgICAgICAqL1xyXG5cclxuICAgICAgaWYgKE5BTUVTUEFDRSA9PT0gSFRNTF9OQU1FU1BBQ0UpIHtcclxuICAgICAgICB0cnkge1xyXG4gICAgICAgICAgZG9jID0gbmV3IERPTVBhcnNlcigpLnBhcnNlRnJvbVN0cmluZyhkaXJ0eVBheWxvYWQsIFBBUlNFUl9NRURJQV9UWVBFKTtcclxuICAgICAgICB9IGNhdGNoIChfKSB7fVxyXG4gICAgICB9XHJcbiAgICAgIC8qIFVzZSBjcmVhdGVIVE1MRG9jdW1lbnQgaW4gY2FzZSBET01QYXJzZXIgaXMgbm90IGF2YWlsYWJsZSAqL1xyXG5cclxuXHJcbiAgICAgIGlmICghZG9jIHx8ICFkb2MuZG9jdW1lbnRFbGVtZW50KSB7XHJcbiAgICAgICAgZG9jID0gaW1wbGVtZW50YXRpb24uY3JlYXRlRG9jdW1lbnQoTkFNRVNQQUNFLCAndGVtcGxhdGUnLCBudWxsKTtcclxuXHJcbiAgICAgICAgdHJ5IHtcclxuICAgICAgICAgIGRvYy5kb2N1bWVudEVsZW1lbnQuaW5uZXJIVE1MID0gSVNfRU1QVFlfSU5QVVQgPyBlbXB0eUhUTUwgOiBkaXJ0eVBheWxvYWQ7XHJcbiAgICAgICAgfSBjYXRjaCAoXykgey8vIFN5bnRheCBlcnJvciBpZiBkaXJ0eVBheWxvYWQgaXMgaW52YWxpZCB4bWxcclxuICAgICAgICB9XHJcbiAgICAgIH1cclxuXHJcbiAgICAgIGNvbnN0IGJvZHkgPSBkb2MuYm9keSB8fCBkb2MuZG9jdW1lbnRFbGVtZW50O1xyXG5cclxuICAgICAgaWYgKGRpcnR5ICYmIGxlYWRpbmdXaGl0ZXNwYWNlKSB7XHJcbiAgICAgICAgYm9keS5pbnNlcnRCZWZvcmUoZG9jdW1lbnQuY3JlYXRlVGV4dE5vZGUobGVhZGluZ1doaXRlc3BhY2UpLCBib2R5LmNoaWxkTm9kZXNbMF0gfHwgbnVsbCk7XHJcbiAgICAgIH1cclxuICAgICAgLyogV29yayBvbiB3aG9sZSBkb2N1bWVudCBvciBqdXN0IGl0cyBib2R5ICovXHJcblxyXG5cclxuICAgICAgaWYgKE5BTUVTUEFDRSA9PT0gSFRNTF9OQU1FU1BBQ0UpIHtcclxuICAgICAgICByZXR1cm4gZ2V0RWxlbWVudHNCeVRhZ05hbWUuY2FsbChkb2MsIFdIT0xFX0RPQ1VNRU5UID8gJ2h0bWwnIDogJ2JvZHknKVswXTtcclxuICAgICAgfVxyXG5cclxuICAgICAgcmV0dXJuIFdIT0xFX0RPQ1VNRU5UID8gZG9jLmRvY3VtZW50RWxlbWVudCA6IGJvZHk7XHJcbiAgICB9O1xyXG4gICAgLyoqXHJcbiAgICAgKiBfY3JlYXRlSXRlcmF0b3JcclxuICAgICAqXHJcbiAgICAgKiBAcGFyYW0gIHtEb2N1bWVudH0gcm9vdCBkb2N1bWVudC9mcmFnbWVudCB0byBjcmVhdGUgaXRlcmF0b3IgZm9yXHJcbiAgICAgKiBAcmV0dXJuIHtJdGVyYXRvcn0gaXRlcmF0b3IgaW5zdGFuY2VcclxuICAgICAqL1xyXG5cclxuXHJcbiAgICBjb25zdCBfY3JlYXRlSXRlcmF0b3IgPSBmdW5jdGlvbiBfY3JlYXRlSXRlcmF0b3Iocm9vdCkge1xyXG4gICAgICByZXR1cm4gY3JlYXRlTm9kZUl0ZXJhdG9yLmNhbGwocm9vdC5vd25lckRvY3VtZW50IHx8IHJvb3QsIHJvb3QsIC8vIGVzbGludC1kaXNhYmxlLW5leHQtbGluZSBuby1iaXR3aXNlXHJcbiAgICAgIE5vZGVGaWx0ZXIuU0hPV19FTEVNRU5UIHwgTm9kZUZpbHRlci5TSE9XX0NPTU1FTlQgfCBOb2RlRmlsdGVyLlNIT1dfVEVYVCwgbnVsbCwgZmFsc2UpO1xyXG4gICAgfTtcclxuICAgIC8qKlxyXG4gICAgICogX2lzQ2xvYmJlcmVkXHJcbiAgICAgKlxyXG4gICAgICogQHBhcmFtICB7Tm9kZX0gZWxtIGVsZW1lbnQgdG8gY2hlY2sgZm9yIGNsb2JiZXJpbmcgYXR0YWNrc1xyXG4gICAgICogQHJldHVybiB7Qm9vbGVhbn0gdHJ1ZSBpZiBjbG9iYmVyZWQsIGZhbHNlIGlmIHNhZmVcclxuICAgICAqL1xyXG5cclxuXHJcbiAgICBjb25zdCBfaXNDbG9iYmVyZWQgPSBmdW5jdGlvbiBfaXNDbG9iYmVyZWQoZWxtKSB7XHJcbiAgICAgIHJldHVybiBlbG0gaW5zdGFuY2VvZiBIVE1MRm9ybUVsZW1lbnQgJiYgKHR5cGVvZiBlbG0ubm9kZU5hbWUgIT09ICdzdHJpbmcnIHx8IHR5cGVvZiBlbG0udGV4dENvbnRlbnQgIT09ICdzdHJpbmcnIHx8IHR5cGVvZiBlbG0ucmVtb3ZlQ2hpbGQgIT09ICdmdW5jdGlvbicgfHwgIShlbG0uYXR0cmlidXRlcyBpbnN0YW5jZW9mIE5hbWVkTm9kZU1hcCkgfHwgdHlwZW9mIGVsbS5yZW1vdmVBdHRyaWJ1dGUgIT09ICdmdW5jdGlvbicgfHwgdHlwZW9mIGVsbS5zZXRBdHRyaWJ1dGUgIT09ICdmdW5jdGlvbicgfHwgdHlwZW9mIGVsbS5uYW1lc3BhY2VVUkkgIT09ICdzdHJpbmcnIHx8IHR5cGVvZiBlbG0uaW5zZXJ0QmVmb3JlICE9PSAnZnVuY3Rpb24nIHx8IHR5cGVvZiBlbG0uaGFzQ2hpbGROb2RlcyAhPT0gJ2Z1bmN0aW9uJyk7XHJcbiAgICB9O1xyXG4gICAgLyoqXHJcbiAgICAgKiBfaXNOb2RlXHJcbiAgICAgKlxyXG4gICAgICogQHBhcmFtICB7Tm9kZX0gb2JqIG9iamVjdCB0byBjaGVjayB3aGV0aGVyIGl0J3MgYSBET00gbm9kZVxyXG4gICAgICogQHJldHVybiB7Qm9vbGVhbn0gdHJ1ZSBpcyBvYmplY3QgaXMgYSBET00gbm9kZVxyXG4gICAgICovXHJcblxyXG5cclxuICAgIGNvbnN0IF9pc05vZGUgPSBmdW5jdGlvbiBfaXNOb2RlKG9iamVjdCkge1xyXG4gICAgICByZXR1cm4gdHlwZW9mIE5vZGUgPT09ICdvYmplY3QnID8gb2JqZWN0IGluc3RhbmNlb2YgTm9kZSA6IG9iamVjdCAmJiB0eXBlb2Ygb2JqZWN0ID09PSAnb2JqZWN0JyAmJiB0eXBlb2Ygb2JqZWN0Lm5vZGVUeXBlID09PSAnbnVtYmVyJyAmJiB0eXBlb2Ygb2JqZWN0Lm5vZGVOYW1lID09PSAnc3RyaW5nJztcclxuICAgIH07XHJcbiAgICAvKipcclxuICAgICAqIF9leGVjdXRlSG9va1xyXG4gICAgICogRXhlY3V0ZSB1c2VyIGNvbmZpZ3VyYWJsZSBob29rc1xyXG4gICAgICpcclxuICAgICAqIEBwYXJhbSAge1N0cmluZ30gZW50cnlQb2ludCAgTmFtZSBvZiB0aGUgaG9vaydzIGVudHJ5IHBvaW50XHJcbiAgICAgKiBAcGFyYW0gIHtOb2RlfSBjdXJyZW50Tm9kZSBub2RlIHRvIHdvcmsgb24gd2l0aCB0aGUgaG9va1xyXG4gICAgICogQHBhcmFtICB7T2JqZWN0fSBkYXRhIGFkZGl0aW9uYWwgaG9vayBwYXJhbWV0ZXJzXHJcbiAgICAgKi9cclxuXHJcblxyXG4gICAgY29uc3QgX2V4ZWN1dGVIb29rID0gZnVuY3Rpb24gX2V4ZWN1dGVIb29rKGVudHJ5UG9pbnQsIGN1cnJlbnROb2RlLCBkYXRhKSB7XHJcbiAgICAgIGlmICghaG9va3NbZW50cnlQb2ludF0pIHtcclxuICAgICAgICByZXR1cm47XHJcbiAgICAgIH1cclxuXHJcbiAgICAgIGFycmF5Rm9yRWFjaChob29rc1tlbnRyeVBvaW50XSwgaG9vayA9PiB7XHJcbiAgICAgICAgaG9vay5jYWxsKERPTVB1cmlmeSwgY3VycmVudE5vZGUsIGRhdGEsIENPTkZJRyk7XHJcbiAgICAgIH0pO1xyXG4gICAgfTtcclxuICAgIC8qKlxyXG4gICAgICogX3Nhbml0aXplRWxlbWVudHNcclxuICAgICAqXHJcbiAgICAgKiBAcHJvdGVjdCBub2RlTmFtZVxyXG4gICAgICogQHByb3RlY3QgdGV4dENvbnRlbnRcclxuICAgICAqIEBwcm90ZWN0IHJlbW92ZUNoaWxkXHJcbiAgICAgKlxyXG4gICAgICogQHBhcmFtICAge05vZGV9IGN1cnJlbnROb2RlIHRvIGNoZWNrIGZvciBwZXJtaXNzaW9uIHRvIGV4aXN0XHJcbiAgICAgKiBAcmV0dXJuICB7Qm9vbGVhbn0gdHJ1ZSBpZiBub2RlIHdhcyBraWxsZWQsIGZhbHNlIGlmIGxlZnQgYWxpdmVcclxuICAgICAqL1xyXG5cclxuXHJcbiAgICBjb25zdCBfc2FuaXRpemVFbGVtZW50cyA9IGZ1bmN0aW9uIF9zYW5pdGl6ZUVsZW1lbnRzKGN1cnJlbnROb2RlKSB7XHJcbiAgICAgIGxldCBjb250ZW50O1xyXG4gICAgICAvKiBFeGVjdXRlIGEgaG9vayBpZiBwcmVzZW50ICovXHJcblxyXG4gICAgICBfZXhlY3V0ZUhvb2soJ2JlZm9yZVNhbml0aXplRWxlbWVudHMnLCBjdXJyZW50Tm9kZSwgbnVsbCk7XHJcbiAgICAgIC8qIENoZWNrIGlmIGVsZW1lbnQgaXMgY2xvYmJlcmVkIG9yIGNhbiBjbG9iYmVyICovXHJcblxyXG5cclxuICAgICAgaWYgKF9pc0Nsb2JiZXJlZChjdXJyZW50Tm9kZSkpIHtcclxuICAgICAgICBfZm9yY2VSZW1vdmUoY3VycmVudE5vZGUpO1xyXG5cclxuICAgICAgICByZXR1cm4gdHJ1ZTtcclxuICAgICAgfVxyXG4gICAgICAvKiBOb3cgbGV0J3MgY2hlY2sgdGhlIGVsZW1lbnQncyB0eXBlIGFuZCBuYW1lICovXHJcblxyXG5cclxuICAgICAgY29uc3QgdGFnTmFtZSA9IHRyYW5zZm9ybUNhc2VGdW5jKGN1cnJlbnROb2RlLm5vZGVOYW1lKTtcclxuICAgICAgLyogRXhlY3V0ZSBhIGhvb2sgaWYgcHJlc2VudCAqL1xyXG5cclxuICAgICAgX2V4ZWN1dGVIb29rKCd1cG9uU2FuaXRpemVFbGVtZW50JywgY3VycmVudE5vZGUsIHtcclxuICAgICAgICB0YWdOYW1lLFxyXG4gICAgICAgIGFsbG93ZWRUYWdzOiBBTExPV0VEX1RBR1NcclxuICAgICAgfSk7XHJcbiAgICAgIC8qIERldGVjdCBtWFNTIGF0dGVtcHRzIGFidXNpbmcgbmFtZXNwYWNlIGNvbmZ1c2lvbiAqL1xyXG5cclxuXHJcbiAgICAgIGlmIChjdXJyZW50Tm9kZS5oYXNDaGlsZE5vZGVzKCkgJiYgIV9pc05vZGUoY3VycmVudE5vZGUuZmlyc3RFbGVtZW50Q2hpbGQpICYmICghX2lzTm9kZShjdXJyZW50Tm9kZS5jb250ZW50KSB8fCAhX2lzTm9kZShjdXJyZW50Tm9kZS5jb250ZW50LmZpcnN0RWxlbWVudENoaWxkKSkgJiYgcmVnRXhwVGVzdCgvPFsvXFx3XS9nLCBjdXJyZW50Tm9kZS5pbm5lckhUTUwpICYmIHJlZ0V4cFRlc3QoLzxbL1xcd10vZywgY3VycmVudE5vZGUudGV4dENvbnRlbnQpKSB7XHJcbiAgICAgICAgX2ZvcmNlUmVtb3ZlKGN1cnJlbnROb2RlKTtcclxuXHJcbiAgICAgICAgcmV0dXJuIHRydWU7XHJcbiAgICAgIH1cclxuICAgICAgLyogUmVtb3ZlIGVsZW1lbnQgaWYgYW55dGhpbmcgZm9yYmlkcyBpdHMgcHJlc2VuY2UgKi9cclxuXHJcblxyXG4gICAgICBpZiAoIUFMTE9XRURfVEFHU1t0YWdOYW1lXSB8fCBGT1JCSURfVEFHU1t0YWdOYW1lXSkge1xyXG4gICAgICAgIC8qIENoZWNrIGlmIHdlIGhhdmUgYSBjdXN0b20gZWxlbWVudCB0byBoYW5kbGUgKi9cclxuICAgICAgICBpZiAoIUZPUkJJRF9UQUdTW3RhZ05hbWVdICYmIF9iYXNpY0N1c3RvbUVsZW1lbnRUZXN0KHRhZ05hbWUpKSB7XHJcbiAgICAgICAgICBpZiAoQ1VTVE9NX0VMRU1FTlRfSEFORExJTkcudGFnTmFtZUNoZWNrIGluc3RhbmNlb2YgUmVnRXhwICYmIHJlZ0V4cFRlc3QoQ1VTVE9NX0VMRU1FTlRfSEFORExJTkcudGFnTmFtZUNoZWNrLCB0YWdOYW1lKSkgcmV0dXJuIGZhbHNlO1xyXG4gICAgICAgICAgaWYgKENVU1RPTV9FTEVNRU5UX0hBTkRMSU5HLnRhZ05hbWVDaGVjayBpbnN0YW5jZW9mIEZ1bmN0aW9uICYmIENVU1RPTV9FTEVNRU5UX0hBTkRMSU5HLnRhZ05hbWVDaGVjayh0YWdOYW1lKSkgcmV0dXJuIGZhbHNlO1xyXG4gICAgICAgIH1cclxuICAgICAgICAvKiBLZWVwIGNvbnRlbnQgZXhjZXB0IGZvciBiYWQtbGlzdGVkIGVsZW1lbnRzICovXHJcblxyXG5cclxuICAgICAgICBpZiAoS0VFUF9DT05URU5UICYmICFGT1JCSURfQ09OVEVOVFNbdGFnTmFtZV0pIHtcclxuICAgICAgICAgIGNvbnN0IHBhcmVudE5vZGUgPSBnZXRQYXJlbnROb2RlKGN1cnJlbnROb2RlKSB8fCBjdXJyZW50Tm9kZS5wYXJlbnROb2RlO1xyXG4gICAgICAgICAgY29uc3QgY2hpbGROb2RlcyA9IGdldENoaWxkTm9kZXMoY3VycmVudE5vZGUpIHx8IGN1cnJlbnROb2RlLmNoaWxkTm9kZXM7XHJcblxyXG4gICAgICAgICAgaWYgKGNoaWxkTm9kZXMgJiYgcGFyZW50Tm9kZSkge1xyXG4gICAgICAgICAgICBjb25zdCBjaGlsZENvdW50ID0gY2hpbGROb2Rlcy5sZW5ndGg7XHJcblxyXG4gICAgICAgICAgICBmb3IgKGxldCBpID0gY2hpbGRDb3VudCAtIDE7IGkgPj0gMDsgLS1pKSB7XHJcbiAgICAgICAgICAgICAgcGFyZW50Tm9kZS5pbnNlcnRCZWZvcmUoY2xvbmVOb2RlKGNoaWxkTm9kZXNbaV0sIHRydWUpLCBnZXROZXh0U2libGluZyhjdXJyZW50Tm9kZSkpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBfZm9yY2VSZW1vdmUoY3VycmVudE5vZGUpO1xyXG5cclxuICAgICAgICByZXR1cm4gdHJ1ZTtcclxuICAgICAgfVxyXG4gICAgICAvKiBDaGVjayB3aGV0aGVyIGVsZW1lbnQgaGFzIGEgdmFsaWQgbmFtZXNwYWNlICovXHJcblxyXG5cclxuICAgICAgaWYgKGN1cnJlbnROb2RlIGluc3RhbmNlb2YgRWxlbWVudCAmJiAhX2NoZWNrVmFsaWROYW1lc3BhY2UoY3VycmVudE5vZGUpKSB7XHJcbiAgICAgICAgX2ZvcmNlUmVtb3ZlKGN1cnJlbnROb2RlKTtcclxuXHJcbiAgICAgICAgcmV0dXJuIHRydWU7XHJcbiAgICAgIH1cclxuICAgICAgLyogTWFrZSBzdXJlIHRoYXQgb2xkZXIgYnJvd3NlcnMgZG9uJ3QgZ2V0IG5vc2NyaXB0IG1YU1MgKi9cclxuXHJcblxyXG4gICAgICBpZiAoKHRhZ05hbWUgPT09ICdub3NjcmlwdCcgfHwgdGFnTmFtZSA9PT0gJ25vZW1iZWQnKSAmJiByZWdFeHBUZXN0KC88XFwvbm8oc2NyaXB0fGVtYmVkKS9pLCBjdXJyZW50Tm9kZS5pbm5lckhUTUwpKSB7XHJcbiAgICAgICAgX2ZvcmNlUmVtb3ZlKGN1cnJlbnROb2RlKTtcclxuXHJcbiAgICAgICAgcmV0dXJuIHRydWU7XHJcbiAgICAgIH1cclxuICAgICAgLyogU2FuaXRpemUgZWxlbWVudCBjb250ZW50IHRvIGJlIHRlbXBsYXRlLXNhZmUgKi9cclxuXHJcblxyXG4gICAgICBpZiAoU0FGRV9GT1JfVEVNUExBVEVTICYmIGN1cnJlbnROb2RlLm5vZGVUeXBlID09PSAzKSB7XHJcbiAgICAgICAgLyogR2V0IHRoZSBlbGVtZW50J3MgdGV4dCBjb250ZW50ICovXHJcbiAgICAgICAgY29udGVudCA9IGN1cnJlbnROb2RlLnRleHRDb250ZW50O1xyXG4gICAgICAgIGNvbnRlbnQgPSBzdHJpbmdSZXBsYWNlKGNvbnRlbnQsIE1VU1RBQ0hFX0VYUFIsICcgJyk7XHJcbiAgICAgICAgY29udGVudCA9IHN0cmluZ1JlcGxhY2UoY29udGVudCwgRVJCX0VYUFIsICcgJyk7XHJcbiAgICAgICAgY29udGVudCA9IHN0cmluZ1JlcGxhY2UoY29udGVudCwgVE1QTElUX0VYUFIsICcgJyk7XHJcblxyXG4gICAgICAgIGlmIChjdXJyZW50Tm9kZS50ZXh0Q29udGVudCAhPT0gY29udGVudCkge1xyXG4gICAgICAgICAgYXJyYXlQdXNoKERPTVB1cmlmeS5yZW1vdmVkLCB7XHJcbiAgICAgICAgICAgIGVsZW1lbnQ6IGN1cnJlbnROb2RlLmNsb25lTm9kZSgpXHJcbiAgICAgICAgICB9KTtcclxuICAgICAgICAgIGN1cnJlbnROb2RlLnRleHRDb250ZW50ID0gY29udGVudDtcclxuICAgICAgICB9XHJcbiAgICAgIH1cclxuICAgICAgLyogRXhlY3V0ZSBhIGhvb2sgaWYgcHJlc2VudCAqL1xyXG5cclxuXHJcbiAgICAgIF9leGVjdXRlSG9vaygnYWZ0ZXJTYW5pdGl6ZUVsZW1lbnRzJywgY3VycmVudE5vZGUsIG51bGwpO1xyXG5cclxuICAgICAgcmV0dXJuIGZhbHNlO1xyXG4gICAgfTtcclxuICAgIC8qKlxyXG4gICAgICogX2lzVmFsaWRBdHRyaWJ1dGVcclxuICAgICAqXHJcbiAgICAgKiBAcGFyYW0gIHtzdHJpbmd9IGxjVGFnIExvd2VyY2FzZSB0YWcgbmFtZSBvZiBjb250YWluaW5nIGVsZW1lbnQuXHJcbiAgICAgKiBAcGFyYW0gIHtzdHJpbmd9IGxjTmFtZSBMb3dlcmNhc2UgYXR0cmlidXRlIG5hbWUuXHJcbiAgICAgKiBAcGFyYW0gIHtzdHJpbmd9IHZhbHVlIEF0dHJpYnV0ZSB2YWx1ZS5cclxuICAgICAqIEByZXR1cm4ge0Jvb2xlYW59IFJldHVybnMgdHJ1ZSBpZiBgdmFsdWVgIGlzIHZhbGlkLCBvdGhlcndpc2UgZmFsc2UuXHJcbiAgICAgKi9cclxuICAgIC8vIGVzbGludC1kaXNhYmxlLW5leHQtbGluZSBjb21wbGV4aXR5XHJcblxyXG5cclxuICAgIGNvbnN0IF9pc1ZhbGlkQXR0cmlidXRlID0gZnVuY3Rpb24gX2lzVmFsaWRBdHRyaWJ1dGUobGNUYWcsIGxjTmFtZSwgdmFsdWUpIHtcclxuICAgICAgLyogTWFrZSBzdXJlIGF0dHJpYnV0ZSBjYW5ub3QgY2xvYmJlciAqL1xyXG4gICAgICBpZiAoU0FOSVRJWkVfRE9NICYmIChsY05hbWUgPT09ICdpZCcgfHwgbGNOYW1lID09PSAnbmFtZScpICYmICh2YWx1ZSBpbiBkb2N1bWVudCB8fCB2YWx1ZSBpbiBmb3JtRWxlbWVudCkpIHtcclxuICAgICAgICByZXR1cm4gZmFsc2U7XHJcbiAgICAgIH1cclxuICAgICAgLyogQWxsb3cgdmFsaWQgZGF0YS0qIGF0dHJpYnV0ZXM6IEF0IGxlYXN0IG9uZSBjaGFyYWN0ZXIgYWZ0ZXIgXCItXCJcclxuICAgICAgICAgIChodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS9kb20uaHRtbCNlbWJlZGRpbmctY3VzdG9tLW5vbi12aXNpYmxlLWRhdGEtd2l0aC10aGUtZGF0YS0qLWF0dHJpYnV0ZXMpXHJcbiAgICAgICAgICBYTUwtY29tcGF0aWJsZSAoaHR0cHM6Ly9odG1sLnNwZWMud2hhdHdnLm9yZy9tdWx0aXBhZ2UvaW5mcmFzdHJ1Y3R1cmUuaHRtbCN4bWwtY29tcGF0aWJsZSBhbmQgaHR0cDovL3d3dy53My5vcmcvVFIveG1sLyNkMGU4MDQpXHJcbiAgICAgICAgICBXZSBkb24ndCBuZWVkIHRvIGNoZWNrIHRoZSB2YWx1ZTsgaXQncyBhbHdheXMgVVJJIHNhZmUuICovXHJcblxyXG5cclxuICAgICAgaWYgKEFMTE9XX0RBVEFfQVRUUiAmJiAhRk9SQklEX0FUVFJbbGNOYW1lXSAmJiByZWdFeHBUZXN0KERBVEFfQVRUUiwgbGNOYW1lKSkgOyBlbHNlIGlmIChBTExPV19BUklBX0FUVFIgJiYgcmVnRXhwVGVzdChBUklBX0FUVFIsIGxjTmFtZSkpIDsgZWxzZSBpZiAoIUFMTE9XRURfQVRUUltsY05hbWVdIHx8IEZPUkJJRF9BVFRSW2xjTmFtZV0pIHtcclxuICAgICAgICBpZiAoIC8vIEZpcnN0IGNvbmRpdGlvbiBkb2VzIGEgdmVyeSBiYXNpYyBjaGVjayBpZiBhKSBpdCdzIGJhc2ljYWxseSBhIHZhbGlkIGN1c3RvbSBlbGVtZW50IHRhZ25hbWUgQU5EXHJcbiAgICAgICAgLy8gYikgaWYgdGhlIHRhZ05hbWUgcGFzc2VzIHdoYXRldmVyIHRoZSB1c2VyIGhhcyBjb25maWd1cmVkIGZvciBDVVNUT01fRUxFTUVOVF9IQU5ETElORy50YWdOYW1lQ2hlY2tcclxuICAgICAgICAvLyBhbmQgYykgaWYgdGhlIGF0dHJpYnV0ZSBuYW1lIHBhc3NlcyB3aGF0ZXZlciB0aGUgdXNlciBoYXMgY29uZmlndXJlZCBmb3IgQ1VTVE9NX0VMRU1FTlRfSEFORExJTkcuYXR0cmlidXRlTmFtZUNoZWNrXHJcbiAgICAgICAgX2Jhc2ljQ3VzdG9tRWxlbWVudFRlc3QobGNUYWcpICYmIChDVVNUT01fRUxFTUVOVF9IQU5ETElORy50YWdOYW1lQ2hlY2sgaW5zdGFuY2VvZiBSZWdFeHAgJiYgcmVnRXhwVGVzdChDVVNUT01fRUxFTUVOVF9IQU5ETElORy50YWdOYW1lQ2hlY2ssIGxjVGFnKSB8fCBDVVNUT01fRUxFTUVOVF9IQU5ETElORy50YWdOYW1lQ2hlY2sgaW5zdGFuY2VvZiBGdW5jdGlvbiAmJiBDVVNUT01fRUxFTUVOVF9IQU5ETElORy50YWdOYW1lQ2hlY2sobGNUYWcpKSAmJiAoQ1VTVE9NX0VMRU1FTlRfSEFORExJTkcuYXR0cmlidXRlTmFtZUNoZWNrIGluc3RhbmNlb2YgUmVnRXhwICYmIHJlZ0V4cFRlc3QoQ1VTVE9NX0VMRU1FTlRfSEFORExJTkcuYXR0cmlidXRlTmFtZUNoZWNrLCBsY05hbWUpIHx8IENVU1RPTV9FTEVNRU5UX0hBTkRMSU5HLmF0dHJpYnV0ZU5hbWVDaGVjayBpbnN0YW5jZW9mIEZ1bmN0aW9uICYmIENVU1RPTV9FTEVNRU5UX0hBTkRMSU5HLmF0dHJpYnV0ZU5hbWVDaGVjayhsY05hbWUpKSB8fCAvLyBBbHRlcm5hdGl2ZSwgc2Vjb25kIGNvbmRpdGlvbiBjaGVja3MgaWYgaXQncyBhbiBgaXNgLWF0dHJpYnV0ZSwgQU5EXHJcbiAgICAgICAgLy8gdGhlIHZhbHVlIHBhc3NlcyB3aGF0ZXZlciB0aGUgdXNlciBoYXMgY29uZmlndXJlZCBmb3IgQ1VTVE9NX0VMRU1FTlRfSEFORExJTkcudGFnTmFtZUNoZWNrXHJcbiAgICAgICAgbGNOYW1lID09PSAnaXMnICYmIENVU1RPTV9FTEVNRU5UX0hBTkRMSU5HLmFsbG93Q3VzdG9taXplZEJ1aWx0SW5FbGVtZW50cyAmJiAoQ1VTVE9NX0VMRU1FTlRfSEFORExJTkcudGFnTmFtZUNoZWNrIGluc3RhbmNlb2YgUmVnRXhwICYmIHJlZ0V4cFRlc3QoQ1VTVE9NX0VMRU1FTlRfSEFORExJTkcudGFnTmFtZUNoZWNrLCB2YWx1ZSkgfHwgQ1VTVE9NX0VMRU1FTlRfSEFORExJTkcudGFnTmFtZUNoZWNrIGluc3RhbmNlb2YgRnVuY3Rpb24gJiYgQ1VTVE9NX0VMRU1FTlRfSEFORExJTkcudGFnTmFtZUNoZWNrKHZhbHVlKSkpIDsgZWxzZSB7XHJcbiAgICAgICAgICByZXR1cm4gZmFsc2U7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIC8qIENoZWNrIHZhbHVlIGlzIHNhZmUuIEZpcnN0LCBpcyBhdHRyIGluZXJ0PyBJZiBzbywgaXMgc2FmZSAqL1xyXG5cclxuICAgICAgfSBlbHNlIGlmIChVUklfU0FGRV9BVFRSSUJVVEVTW2xjTmFtZV0pIDsgZWxzZSBpZiAocmVnRXhwVGVzdChJU19BTExPV0VEX1VSSSQxLCBzdHJpbmdSZXBsYWNlKHZhbHVlLCBBVFRSX1dISVRFU1BBQ0UsICcnKSkpIDsgZWxzZSBpZiAoKGxjTmFtZSA9PT0gJ3NyYycgfHwgbGNOYW1lID09PSAneGxpbms6aHJlZicgfHwgbGNOYW1lID09PSAnaHJlZicpICYmIGxjVGFnICE9PSAnc2NyaXB0JyAmJiBzdHJpbmdJbmRleE9mKHZhbHVlLCAnZGF0YTonKSA9PT0gMCAmJiBEQVRBX1VSSV9UQUdTW2xjVGFnXSkgOyBlbHNlIGlmIChBTExPV19VTktOT1dOX1BST1RPQ09MUyAmJiAhcmVnRXhwVGVzdChJU19TQ1JJUFRfT1JfREFUQSwgc3RyaW5nUmVwbGFjZSh2YWx1ZSwgQVRUUl9XSElURVNQQUNFLCAnJykpKSA7IGVsc2UgaWYgKCF2YWx1ZSkgOyBlbHNlIHtcclxuICAgICAgICByZXR1cm4gZmFsc2U7XHJcbiAgICAgIH1cclxuXHJcbiAgICAgIHJldHVybiB0cnVlO1xyXG4gICAgfTtcclxuICAgIC8qKlxyXG4gICAgICogX2Jhc2ljQ3VzdG9tRWxlbWVudENoZWNrXHJcbiAgICAgKiBjaGVja3MgaWYgYXQgbGVhc3Qgb25lIGRhc2ggaXMgaW5jbHVkZWQgaW4gdGFnTmFtZSwgYW5kIGl0J3Mgbm90IHRoZSBmaXJzdCBjaGFyXHJcbiAgICAgKiBmb3IgbW9yZSBzb3BoaXN0aWNhdGVkIGNoZWNraW5nIHNlZSBodHRwczovL2dpdGh1Yi5jb20vc2luZHJlc29yaHVzL3ZhbGlkYXRlLWVsZW1lbnQtbmFtZVxyXG4gICAgICogQHBhcmFtIHtzdHJpbmd9IHRhZ05hbWUgbmFtZSBvZiB0aGUgdGFnIG9mIHRoZSBub2RlIHRvIHNhbml0aXplXHJcbiAgICAgKi9cclxuXHJcblxyXG4gICAgY29uc3QgX2Jhc2ljQ3VzdG9tRWxlbWVudFRlc3QgPSBmdW5jdGlvbiBfYmFzaWNDdXN0b21FbGVtZW50VGVzdCh0YWdOYW1lKSB7XHJcbiAgICAgIHJldHVybiB0YWdOYW1lLmluZGV4T2YoJy0nKSA+IDA7XHJcbiAgICB9O1xyXG4gICAgLyoqXHJcbiAgICAgKiBfc2FuaXRpemVBdHRyaWJ1dGVzXHJcbiAgICAgKlxyXG4gICAgICogQHByb3RlY3QgYXR0cmlidXRlc1xyXG4gICAgICogQHByb3RlY3Qgbm9kZU5hbWVcclxuICAgICAqIEBwcm90ZWN0IHJlbW92ZUF0dHJpYnV0ZVxyXG4gICAgICogQHByb3RlY3Qgc2V0QXR0cmlidXRlXHJcbiAgICAgKlxyXG4gICAgICogQHBhcmFtICB7Tm9kZX0gY3VycmVudE5vZGUgdG8gc2FuaXRpemVcclxuICAgICAqL1xyXG5cclxuXHJcbiAgICBjb25zdCBfc2FuaXRpemVBdHRyaWJ1dGVzID0gZnVuY3Rpb24gX3Nhbml0aXplQXR0cmlidXRlcyhjdXJyZW50Tm9kZSkge1xyXG4gICAgICBsZXQgYXR0cjtcclxuICAgICAgbGV0IHZhbHVlO1xyXG4gICAgICBsZXQgbGNOYW1lO1xyXG4gICAgICBsZXQgbDtcclxuICAgICAgLyogRXhlY3V0ZSBhIGhvb2sgaWYgcHJlc2VudCAqL1xyXG5cclxuICAgICAgX2V4ZWN1dGVIb29rKCdiZWZvcmVTYW5pdGl6ZUF0dHJpYnV0ZXMnLCBjdXJyZW50Tm9kZSwgbnVsbCk7XHJcblxyXG4gICAgICBjb25zdCB7XHJcbiAgICAgICAgYXR0cmlidXRlc1xyXG4gICAgICB9ID0gY3VycmVudE5vZGU7XHJcbiAgICAgIC8qIENoZWNrIGlmIHdlIGhhdmUgYXR0cmlidXRlczsgaWYgbm90IHdlIG1pZ2h0IGhhdmUgYSB0ZXh0IG5vZGUgKi9cclxuXHJcbiAgICAgIGlmICghYXR0cmlidXRlcykge1xyXG4gICAgICAgIHJldHVybjtcclxuICAgICAgfVxyXG5cclxuICAgICAgY29uc3QgaG9va0V2ZW50ID0ge1xyXG4gICAgICAgIGF0dHJOYW1lOiAnJyxcclxuICAgICAgICBhdHRyVmFsdWU6ICcnLFxyXG4gICAgICAgIGtlZXBBdHRyOiB0cnVlLFxyXG4gICAgICAgIGFsbG93ZWRBdHRyaWJ1dGVzOiBBTExPV0VEX0FUVFJcclxuICAgICAgfTtcclxuICAgICAgbCA9IGF0dHJpYnV0ZXMubGVuZ3RoO1xyXG4gICAgICAvKiBHbyBiYWNrd2FyZHMgb3ZlciBhbGwgYXR0cmlidXRlczsgc2FmZWx5IHJlbW92ZSBiYWQgb25lcyAqL1xyXG5cclxuICAgICAgd2hpbGUgKGwtLSkge1xyXG4gICAgICAgIGF0dHIgPSBhdHRyaWJ1dGVzW2xdO1xyXG4gICAgICAgIGNvbnN0IHtcclxuICAgICAgICAgIG5hbWUsXHJcbiAgICAgICAgICBuYW1lc3BhY2VVUklcclxuICAgICAgICB9ID0gYXR0cjtcclxuICAgICAgICB2YWx1ZSA9IG5hbWUgPT09ICd2YWx1ZScgPyBhdHRyLnZhbHVlIDogc3RyaW5nVHJpbShhdHRyLnZhbHVlKTtcclxuICAgICAgICBsY05hbWUgPSB0cmFuc2Zvcm1DYXNlRnVuYyhuYW1lKTtcclxuICAgICAgICAvKiBFeGVjdXRlIGEgaG9vayBpZiBwcmVzZW50ICovXHJcblxyXG4gICAgICAgIGhvb2tFdmVudC5hdHRyTmFtZSA9IGxjTmFtZTtcclxuICAgICAgICBob29rRXZlbnQuYXR0clZhbHVlID0gdmFsdWU7XHJcbiAgICAgICAgaG9va0V2ZW50LmtlZXBBdHRyID0gdHJ1ZTtcclxuICAgICAgICBob29rRXZlbnQuZm9yY2VLZWVwQXR0ciA9IHVuZGVmaW5lZDsgLy8gQWxsb3dzIGRldmVsb3BlcnMgdG8gc2VlIHRoaXMgaXMgYSBwcm9wZXJ0eSB0aGV5IGNhbiBzZXRcclxuXHJcbiAgICAgICAgX2V4ZWN1dGVIb29rKCd1cG9uU2FuaXRpemVBdHRyaWJ1dGUnLCBjdXJyZW50Tm9kZSwgaG9va0V2ZW50KTtcclxuXHJcbiAgICAgICAgdmFsdWUgPSBob29rRXZlbnQuYXR0clZhbHVlO1xyXG4gICAgICAgIC8qIERpZCB0aGUgaG9va3MgYXBwcm92ZSBvZiB0aGUgYXR0cmlidXRlPyAqL1xyXG5cclxuICAgICAgICBpZiAoaG9va0V2ZW50LmZvcmNlS2VlcEF0dHIpIHtcclxuICAgICAgICAgIGNvbnRpbnVlO1xyXG4gICAgICAgIH1cclxuICAgICAgICAvKiBSZW1vdmUgYXR0cmlidXRlICovXHJcblxyXG5cclxuICAgICAgICBfcmVtb3ZlQXR0cmlidXRlKG5hbWUsIGN1cnJlbnROb2RlKTtcclxuICAgICAgICAvKiBEaWQgdGhlIGhvb2tzIGFwcHJvdmUgb2YgdGhlIGF0dHJpYnV0ZT8gKi9cclxuXHJcblxyXG4gICAgICAgIGlmICghaG9va0V2ZW50LmtlZXBBdHRyKSB7XHJcbiAgICAgICAgICBjb250aW51ZTtcclxuICAgICAgICB9XHJcbiAgICAgICAgLyogV29yayBhcm91bmQgYSBzZWN1cml0eSBpc3N1ZSBpbiBqUXVlcnkgMy4wICovXHJcblxyXG5cclxuICAgICAgICBpZiAoIUFMTE9XX1NFTEZfQ0xPU0VfSU5fQVRUUiAmJiByZWdFeHBUZXN0KC9cXC8+L2ksIHZhbHVlKSkge1xyXG4gICAgICAgICAgX3JlbW92ZUF0dHJpYnV0ZShuYW1lLCBjdXJyZW50Tm9kZSk7XHJcblxyXG4gICAgICAgICAgY29udGludWU7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIC8qIFNhbml0aXplIGF0dHJpYnV0ZSBjb250ZW50IHRvIGJlIHRlbXBsYXRlLXNhZmUgKi9cclxuXHJcblxyXG4gICAgICAgIGlmIChTQUZFX0ZPUl9URU1QTEFURVMpIHtcclxuICAgICAgICAgIHZhbHVlID0gc3RyaW5nUmVwbGFjZSh2YWx1ZSwgTVVTVEFDSEVfRVhQUiwgJyAnKTtcclxuICAgICAgICAgIHZhbHVlID0gc3RyaW5nUmVwbGFjZSh2YWx1ZSwgRVJCX0VYUFIsICcgJyk7XHJcbiAgICAgICAgICB2YWx1ZSA9IHN0cmluZ1JlcGxhY2UodmFsdWUsIFRNUExJVF9FWFBSLCAnICcpO1xyXG4gICAgICAgIH1cclxuICAgICAgICAvKiBJcyBgdmFsdWVgIHZhbGlkIGZvciB0aGlzIGF0dHJpYnV0ZT8gKi9cclxuXHJcblxyXG4gICAgICAgIGNvbnN0IGxjVGFnID0gdHJhbnNmb3JtQ2FzZUZ1bmMoY3VycmVudE5vZGUubm9kZU5hbWUpO1xyXG5cclxuICAgICAgICBpZiAoIV9pc1ZhbGlkQXR0cmlidXRlKGxjVGFnLCBsY05hbWUsIHZhbHVlKSkge1xyXG4gICAgICAgICAgY29udGludWU7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIC8qIEZ1bGwgRE9NIENsb2JiZXJpbmcgcHJvdGVjdGlvbiB2aWEgbmFtZXNwYWNlIGlzb2xhdGlvbixcclxuICAgICAgICAgKiBQcmVmaXggaWQgYW5kIG5hbWUgYXR0cmlidXRlcyB3aXRoIGB1c2VyLWNvbnRlbnQtYFxyXG4gICAgICAgICAqL1xyXG5cclxuXHJcbiAgICAgICAgaWYgKFNBTklUSVpFX05BTUVEX1BST1BTICYmIChsY05hbWUgPT09ICdpZCcgfHwgbGNOYW1lID09PSAnbmFtZScpKSB7XHJcbiAgICAgICAgICAvLyBSZW1vdmUgdGhlIGF0dHJpYnV0ZSB3aXRoIHRoaXMgdmFsdWVcclxuICAgICAgICAgIF9yZW1vdmVBdHRyaWJ1dGUobmFtZSwgY3VycmVudE5vZGUpOyAvLyBQcmVmaXggdGhlIHZhbHVlIGFuZCBsYXRlciByZS1jcmVhdGUgdGhlIGF0dHJpYnV0ZSB3aXRoIHRoZSBzYW5pdGl6ZWQgdmFsdWVcclxuXHJcblxyXG4gICAgICAgICAgdmFsdWUgPSBTQU5JVElaRV9OQU1FRF9QUk9QU19QUkVGSVggKyB2YWx1ZTtcclxuICAgICAgICB9XHJcbiAgICAgICAgLyogSGFuZGxlIGF0dHJpYnV0ZXMgdGhhdCByZXF1aXJlIFRydXN0ZWQgVHlwZXMgKi9cclxuXHJcblxyXG4gICAgICAgIGlmICh0cnVzdGVkVHlwZXNQb2xpY3kgJiYgdHlwZW9mIHRydXN0ZWRUeXBlcyA9PT0gJ29iamVjdCcgJiYgdHlwZW9mIHRydXN0ZWRUeXBlcy5nZXRBdHRyaWJ1dGVUeXBlID09PSAnZnVuY3Rpb24nKSB7XHJcbiAgICAgICAgICBpZiAobmFtZXNwYWNlVVJJKSA7IGVsc2Uge1xyXG4gICAgICAgICAgICBzd2l0Y2ggKHRydXN0ZWRUeXBlcy5nZXRBdHRyaWJ1dGVUeXBlKGxjVGFnLCBsY05hbWUpKSB7XHJcbiAgICAgICAgICAgICAgY2FzZSAnVHJ1c3RlZEhUTUwnOlxyXG4gICAgICAgICAgICAgICAgdmFsdWUgPSB0cnVzdGVkVHlwZXNQb2xpY3kuY3JlYXRlSFRNTCh2YWx1ZSk7XHJcbiAgICAgICAgICAgICAgICBicmVhaztcclxuXHJcbiAgICAgICAgICAgICAgY2FzZSAnVHJ1c3RlZFNjcmlwdFVSTCc6XHJcbiAgICAgICAgICAgICAgICB2YWx1ZSA9IHRydXN0ZWRUeXBlc1BvbGljeS5jcmVhdGVTY3JpcHRVUkwodmFsdWUpO1xyXG4gICAgICAgICAgICAgICAgYnJlYWs7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICAgICAgLyogSGFuZGxlIGludmFsaWQgZGF0YS0qIGF0dHJpYnV0ZSBzZXQgYnkgdHJ5LWNhdGNoaW5nIGl0ICovXHJcblxyXG5cclxuICAgICAgICB0cnkge1xyXG4gICAgICAgICAgaWYgKG5hbWVzcGFjZVVSSSkge1xyXG4gICAgICAgICAgICBjdXJyZW50Tm9kZS5zZXRBdHRyaWJ1dGVOUyhuYW1lc3BhY2VVUkksIG5hbWUsIHZhbHVlKTtcclxuICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgIC8qIEZhbGxiYWNrIHRvIHNldEF0dHJpYnV0ZSgpIGZvciBicm93c2VyLXVucmVjb2duaXplZCBuYW1lc3BhY2VzIGUuZy4gXCJ4LXNjaGVtYVwiLiAqL1xyXG4gICAgICAgICAgICBjdXJyZW50Tm9kZS5zZXRBdHRyaWJ1dGUobmFtZSwgdmFsdWUpO1xyXG4gICAgICAgICAgfVxyXG5cclxuICAgICAgICAgIGFycmF5UG9wKERPTVB1cmlmeS5yZW1vdmVkKTtcclxuICAgICAgICB9IGNhdGNoIChfKSB7fVxyXG4gICAgICB9XHJcbiAgICAgIC8qIEV4ZWN1dGUgYSBob29rIGlmIHByZXNlbnQgKi9cclxuXHJcblxyXG4gICAgICBfZXhlY3V0ZUhvb2soJ2FmdGVyU2FuaXRpemVBdHRyaWJ1dGVzJywgY3VycmVudE5vZGUsIG51bGwpO1xyXG4gICAgfTtcclxuICAgIC8qKlxyXG4gICAgICogX3Nhbml0aXplU2hhZG93RE9NXHJcbiAgICAgKlxyXG4gICAgICogQHBhcmFtICB7RG9jdW1lbnRGcmFnbWVudH0gZnJhZ21lbnQgdG8gaXRlcmF0ZSBvdmVyIHJlY3Vyc2l2ZWx5XHJcbiAgICAgKi9cclxuXHJcblxyXG4gICAgY29uc3QgX3Nhbml0aXplU2hhZG93RE9NID0gZnVuY3Rpb24gX3Nhbml0aXplU2hhZG93RE9NKGZyYWdtZW50KSB7XHJcbiAgICAgIGxldCBzaGFkb3dOb2RlO1xyXG5cclxuICAgICAgY29uc3Qgc2hhZG93SXRlcmF0b3IgPSBfY3JlYXRlSXRlcmF0b3IoZnJhZ21lbnQpO1xyXG4gICAgICAvKiBFeGVjdXRlIGEgaG9vayBpZiBwcmVzZW50ICovXHJcblxyXG5cclxuICAgICAgX2V4ZWN1dGVIb29rKCdiZWZvcmVTYW5pdGl6ZVNoYWRvd0RPTScsIGZyYWdtZW50LCBudWxsKTtcclxuXHJcbiAgICAgIHdoaWxlIChzaGFkb3dOb2RlID0gc2hhZG93SXRlcmF0b3IubmV4dE5vZGUoKSkge1xyXG4gICAgICAgIC8qIEV4ZWN1dGUgYSBob29rIGlmIHByZXNlbnQgKi9cclxuICAgICAgICBfZXhlY3V0ZUhvb2soJ3Vwb25TYW5pdGl6ZVNoYWRvd05vZGUnLCBzaGFkb3dOb2RlLCBudWxsKTtcclxuICAgICAgICAvKiBTYW5pdGl6ZSB0YWdzIGFuZCBlbGVtZW50cyAqL1xyXG5cclxuXHJcbiAgICAgICAgaWYgKF9zYW5pdGl6ZUVsZW1lbnRzKHNoYWRvd05vZGUpKSB7XHJcbiAgICAgICAgICBjb250aW51ZTtcclxuICAgICAgICB9XHJcbiAgICAgICAgLyogRGVlcCBzaGFkb3cgRE9NIGRldGVjdGVkICovXHJcblxyXG5cclxuICAgICAgICBpZiAoc2hhZG93Tm9kZS5jb250ZW50IGluc3RhbmNlb2YgRG9jdW1lbnRGcmFnbWVudCkge1xyXG4gICAgICAgICAgX3Nhbml0aXplU2hhZG93RE9NKHNoYWRvd05vZGUuY29udGVudCk7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIC8qIENoZWNrIGF0dHJpYnV0ZXMsIHNhbml0aXplIGlmIG5lY2Vzc2FyeSAqL1xyXG5cclxuXHJcbiAgICAgICAgX3Nhbml0aXplQXR0cmlidXRlcyhzaGFkb3dOb2RlKTtcclxuICAgICAgfVxyXG4gICAgICAvKiBFeGVjdXRlIGEgaG9vayBpZiBwcmVzZW50ICovXHJcblxyXG5cclxuICAgICAgX2V4ZWN1dGVIb29rKCdhZnRlclNhbml0aXplU2hhZG93RE9NJywgZnJhZ21lbnQsIG51bGwpO1xyXG4gICAgfTtcclxuICAgIC8qKlxyXG4gICAgICogU2FuaXRpemVcclxuICAgICAqIFB1YmxpYyBtZXRob2QgcHJvdmlkaW5nIGNvcmUgc2FuaXRhdGlvbiBmdW5jdGlvbmFsaXR5XHJcbiAgICAgKlxyXG4gICAgICogQHBhcmFtIHtTdHJpbmd8Tm9kZX0gZGlydHkgc3RyaW5nIG9yIERPTSBub2RlXHJcbiAgICAgKiBAcGFyYW0ge09iamVjdH0gY29uZmlndXJhdGlvbiBvYmplY3RcclxuICAgICAqL1xyXG4gICAgLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIGNvbXBsZXhpdHlcclxuXHJcblxyXG4gICAgRE9NUHVyaWZ5LnNhbml0aXplID0gZnVuY3Rpb24gKGRpcnR5KSB7XHJcbiAgICAgIGxldCBjZmcgPSBhcmd1bWVudHMubGVuZ3RoID4gMSAmJiBhcmd1bWVudHNbMV0gIT09IHVuZGVmaW5lZCA/IGFyZ3VtZW50c1sxXSA6IHt9O1xyXG4gICAgICBsZXQgYm9keTtcclxuICAgICAgbGV0IGltcG9ydGVkTm9kZTtcclxuICAgICAgbGV0IGN1cnJlbnROb2RlO1xyXG4gICAgICBsZXQgcmV0dXJuTm9kZTtcclxuICAgICAgLyogTWFrZSBzdXJlIHdlIGhhdmUgYSBzdHJpbmcgdG8gc2FuaXRpemUuXHJcbiAgICAgICAgRE8gTk9UIHJldHVybiBlYXJseSwgYXMgdGhpcyB3aWxsIHJldHVybiB0aGUgd3JvbmcgdHlwZSBpZlxyXG4gICAgICAgIHRoZSB1c2VyIGhhcyByZXF1ZXN0ZWQgYSBET00gb2JqZWN0IHJhdGhlciB0aGFuIGEgc3RyaW5nICovXHJcblxyXG4gICAgICBJU19FTVBUWV9JTlBVVCA9ICFkaXJ0eTtcclxuXHJcbiAgICAgIGlmIChJU19FTVBUWV9JTlBVVCkge1xyXG4gICAgICAgIGRpcnR5ID0gJzwhLS0+JztcclxuICAgICAgfVxyXG4gICAgICAvKiBTdHJpbmdpZnksIGluIGNhc2UgZGlydHkgaXMgYW4gb2JqZWN0ICovXHJcblxyXG5cclxuICAgICAgaWYgKHR5cGVvZiBkaXJ0eSAhPT0gJ3N0cmluZycgJiYgIV9pc05vZGUoZGlydHkpKSB7XHJcbiAgICAgICAgLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIG5vLW5lZ2F0ZWQtY29uZGl0aW9uXHJcbiAgICAgICAgaWYgKHR5cGVvZiBkaXJ0eS50b1N0cmluZyAhPT0gJ2Z1bmN0aW9uJykge1xyXG4gICAgICAgICAgdGhyb3cgdHlwZUVycm9yQ3JlYXRlKCd0b1N0cmluZyBpcyBub3QgYSBmdW5jdGlvbicpO1xyXG4gICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICBkaXJ0eSA9IGRpcnR5LnRvU3RyaW5nKCk7XHJcblxyXG4gICAgICAgICAgaWYgKHR5cGVvZiBkaXJ0eSAhPT0gJ3N0cmluZycpIHtcclxuICAgICAgICAgICAgdGhyb3cgdHlwZUVycm9yQ3JlYXRlKCdkaXJ0eSBpcyBub3QgYSBzdHJpbmcsIGFib3J0aW5nJyk7XHJcbiAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgICB9XHJcbiAgICAgIC8qIFJldHVybiBkaXJ0eSBIVE1MIGlmIERPTVB1cmlmeSBjYW5ub3QgcnVuICovXHJcblxyXG5cclxuICAgICAgaWYgKCFET01QdXJpZnkuaXNTdXBwb3J0ZWQpIHtcclxuICAgICAgICByZXR1cm4gZGlydHk7XHJcbiAgICAgIH1cclxuICAgICAgLyogQXNzaWduIGNvbmZpZyB2YXJzICovXHJcblxyXG5cclxuICAgICAgaWYgKCFTRVRfQ09ORklHKSB7XHJcbiAgICAgICAgX3BhcnNlQ29uZmlnKGNmZyk7XHJcbiAgICAgIH1cclxuICAgICAgLyogQ2xlYW4gdXAgcmVtb3ZlZCBlbGVtZW50cyAqL1xyXG5cclxuXHJcbiAgICAgIERPTVB1cmlmeS5yZW1vdmVkID0gW107XHJcbiAgICAgIC8qIENoZWNrIGlmIGRpcnR5IGlzIGNvcnJlY3RseSB0eXBlZCBmb3IgSU5fUExBQ0UgKi9cclxuXHJcbiAgICAgIGlmICh0eXBlb2YgZGlydHkgPT09ICdzdHJpbmcnKSB7XHJcbiAgICAgICAgSU5fUExBQ0UgPSBmYWxzZTtcclxuICAgICAgfVxyXG5cclxuICAgICAgaWYgKElOX1BMQUNFKSB7XHJcbiAgICAgICAgLyogRG8gc29tZSBlYXJseSBwcmUtc2FuaXRpemF0aW9uIHRvIGF2b2lkIHVuc2FmZSByb290IG5vZGVzICovXHJcbiAgICAgICAgaWYgKGRpcnR5Lm5vZGVOYW1lKSB7XHJcbiAgICAgICAgICBjb25zdCB0YWdOYW1lID0gdHJhbnNmb3JtQ2FzZUZ1bmMoZGlydHkubm9kZU5hbWUpO1xyXG5cclxuICAgICAgICAgIGlmICghQUxMT1dFRF9UQUdTW3RhZ05hbWVdIHx8IEZPUkJJRF9UQUdTW3RhZ05hbWVdKSB7XHJcbiAgICAgICAgICAgIHRocm93IHR5cGVFcnJvckNyZWF0ZSgncm9vdCBub2RlIGlzIGZvcmJpZGRlbiBhbmQgY2Fubm90IGJlIHNhbml0aXplZCBpbi1wbGFjZScpO1xyXG4gICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgICAgfSBlbHNlIGlmIChkaXJ0eSBpbnN0YW5jZW9mIE5vZGUpIHtcclxuICAgICAgICAvKiBJZiBkaXJ0eSBpcyBhIERPTSBlbGVtZW50LCBhcHBlbmQgdG8gYW4gZW1wdHkgZG9jdW1lbnQgdG8gYXZvaWRcclxuICAgICAgICAgICBlbGVtZW50cyBiZWluZyBzdHJpcHBlZCBieSB0aGUgcGFyc2VyICovXHJcbiAgICAgICAgYm9keSA9IF9pbml0RG9jdW1lbnQoJzwhLS0tLT4nKTtcclxuICAgICAgICBpbXBvcnRlZE5vZGUgPSBib2R5Lm93bmVyRG9jdW1lbnQuaW1wb3J0Tm9kZShkaXJ0eSwgdHJ1ZSk7XHJcblxyXG4gICAgICAgIGlmIChpbXBvcnRlZE5vZGUubm9kZVR5cGUgPT09IDEgJiYgaW1wb3J0ZWROb2RlLm5vZGVOYW1lID09PSAnQk9EWScpIHtcclxuICAgICAgICAgIC8qIE5vZGUgaXMgYWxyZWFkeSBhIGJvZHksIHVzZSBhcyBpcyAqL1xyXG4gICAgICAgICAgYm9keSA9IGltcG9ydGVkTm9kZTtcclxuICAgICAgICB9IGVsc2UgaWYgKGltcG9ydGVkTm9kZS5ub2RlTmFtZSA9PT0gJ0hUTUwnKSB7XHJcbiAgICAgICAgICBib2R5ID0gaW1wb3J0ZWROb2RlO1xyXG4gICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgdW5pY29ybi9wcmVmZXItZG9tLW5vZGUtYXBwZW5kXHJcbiAgICAgICAgICBib2R5LmFwcGVuZENoaWxkKGltcG9ydGVkTm9kZSk7XHJcbiAgICAgICAgfVxyXG4gICAgICB9IGVsc2Uge1xyXG4gICAgICAgIC8qIEV4aXQgZGlyZWN0bHkgaWYgd2UgaGF2ZSBub3RoaW5nIHRvIGRvICovXHJcbiAgICAgICAgaWYgKCFSRVRVUk5fRE9NICYmICFTQUZFX0ZPUl9URU1QTEFURVMgJiYgIVdIT0xFX0RPQ1VNRU5UICYmIC8vIGVzbGludC1kaXNhYmxlLW5leHQtbGluZSB1bmljb3JuL3ByZWZlci1pbmNsdWRlc1xyXG4gICAgICAgIGRpcnR5LmluZGV4T2YoJzwnKSA9PT0gLTEpIHtcclxuICAgICAgICAgIHJldHVybiB0cnVzdGVkVHlwZXNQb2xpY3kgJiYgUkVUVVJOX1RSVVNURURfVFlQRSA/IHRydXN0ZWRUeXBlc1BvbGljeS5jcmVhdGVIVE1MKGRpcnR5KSA6IGRpcnR5O1xyXG4gICAgICAgIH1cclxuICAgICAgICAvKiBJbml0aWFsaXplIHRoZSBkb2N1bWVudCB0byB3b3JrIG9uICovXHJcblxyXG5cclxuICAgICAgICBib2R5ID0gX2luaXREb2N1bWVudChkaXJ0eSk7XHJcbiAgICAgICAgLyogQ2hlY2sgd2UgaGF2ZSBhIERPTSBub2RlIGZyb20gdGhlIGRhdGEgKi9cclxuXHJcbiAgICAgICAgaWYgKCFib2R5KSB7XHJcbiAgICAgICAgICByZXR1cm4gUkVUVVJOX0RPTSA/IG51bGwgOiBSRVRVUk5fVFJVU1RFRF9UWVBFID8gZW1wdHlIVE1MIDogJyc7XHJcbiAgICAgICAgfVxyXG4gICAgICB9XHJcbiAgICAgIC8qIFJlbW92ZSBmaXJzdCBlbGVtZW50IG5vZGUgKG91cnMpIGlmIEZPUkNFX0JPRFkgaXMgc2V0ICovXHJcblxyXG5cclxuICAgICAgaWYgKGJvZHkgJiYgRk9SQ0VfQk9EWSkge1xyXG4gICAgICAgIF9mb3JjZVJlbW92ZShib2R5LmZpcnN0Q2hpbGQpO1xyXG4gICAgICB9XHJcbiAgICAgIC8qIEdldCBub2RlIGl0ZXJhdG9yICovXHJcblxyXG5cclxuICAgICAgY29uc3Qgbm9kZUl0ZXJhdG9yID0gX2NyZWF0ZUl0ZXJhdG9yKElOX1BMQUNFID8gZGlydHkgOiBib2R5KTtcclxuICAgICAgLyogTm93IHN0YXJ0IGl0ZXJhdGluZyBvdmVyIHRoZSBjcmVhdGVkIGRvY3VtZW50ICovXHJcblxyXG5cclxuICAgICAgd2hpbGUgKGN1cnJlbnROb2RlID0gbm9kZUl0ZXJhdG9yLm5leHROb2RlKCkpIHtcclxuICAgICAgICAvKiBTYW5pdGl6ZSB0YWdzIGFuZCBlbGVtZW50cyAqL1xyXG4gICAgICAgIGlmIChfc2FuaXRpemVFbGVtZW50cyhjdXJyZW50Tm9kZSkpIHtcclxuICAgICAgICAgIGNvbnRpbnVlO1xyXG4gICAgICAgIH1cclxuICAgICAgICAvKiBTaGFkb3cgRE9NIGRldGVjdGVkLCBzYW5pdGl6ZSBpdCAqL1xyXG5cclxuXHJcbiAgICAgICAgaWYgKGN1cnJlbnROb2RlLmNvbnRlbnQgaW5zdGFuY2VvZiBEb2N1bWVudEZyYWdtZW50KSB7XHJcbiAgICAgICAgICBfc2FuaXRpemVTaGFkb3dET00oY3VycmVudE5vZGUuY29udGVudCk7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIC8qIENoZWNrIGF0dHJpYnV0ZXMsIHNhbml0aXplIGlmIG5lY2Vzc2FyeSAqL1xyXG5cclxuXHJcbiAgICAgICAgX3Nhbml0aXplQXR0cmlidXRlcyhjdXJyZW50Tm9kZSk7XHJcbiAgICAgIH1cclxuICAgICAgLyogSWYgd2Ugc2FuaXRpemVkIGBkaXJ0eWAgaW4tcGxhY2UsIHJldHVybiBpdC4gKi9cclxuXHJcblxyXG4gICAgICBpZiAoSU5fUExBQ0UpIHtcclxuICAgICAgICByZXR1cm4gZGlydHk7XHJcbiAgICAgIH1cclxuICAgICAgLyogUmV0dXJuIHNhbml0aXplZCBzdHJpbmcgb3IgRE9NICovXHJcblxyXG5cclxuICAgICAgaWYgKFJFVFVSTl9ET00pIHtcclxuICAgICAgICBpZiAoUkVUVVJOX0RPTV9GUkFHTUVOVCkge1xyXG4gICAgICAgICAgcmV0dXJuTm9kZSA9IGNyZWF0ZURvY3VtZW50RnJhZ21lbnQuY2FsbChib2R5Lm93bmVyRG9jdW1lbnQpO1xyXG5cclxuICAgICAgICAgIHdoaWxlIChib2R5LmZpcnN0Q2hpbGQpIHtcclxuICAgICAgICAgICAgLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIHVuaWNvcm4vcHJlZmVyLWRvbS1ub2RlLWFwcGVuZFxyXG4gICAgICAgICAgICByZXR1cm5Ob2RlLmFwcGVuZENoaWxkKGJvZHkuZmlyc3RDaGlsZCk7XHJcbiAgICAgICAgICB9XHJcbiAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgIHJldHVybk5vZGUgPSBib2R5O1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgaWYgKEFMTE9XRURfQVRUUi5zaGFkb3dyb290IHx8IEFMTE9XRURfQVRUUi5zaGFkb3dyb290bW9kKSB7XHJcbiAgICAgICAgICAvKlxyXG4gICAgICAgICAgICBBZG9wdE5vZGUoKSBpcyBub3QgdXNlZCBiZWNhdXNlIGludGVybmFsIHN0YXRlIGlzIG5vdCByZXNldFxyXG4gICAgICAgICAgICAoZS5nLiB0aGUgcGFzdCBuYW1lcyBtYXAgb2YgYSBIVE1MRm9ybUVsZW1lbnQpLCB0aGlzIGlzIHNhZmVcclxuICAgICAgICAgICAgaW4gdGhlb3J5IGJ1dCB3ZSB3b3VsZCByYXRoZXIgbm90IHJpc2sgYW5vdGhlciBhdHRhY2sgdmVjdG9yLlxyXG4gICAgICAgICAgICBUaGUgc3RhdGUgdGhhdCBpcyBjbG9uZWQgYnkgaW1wb3J0Tm9kZSgpIGlzIGV4cGxpY2l0bHkgZGVmaW5lZFxyXG4gICAgICAgICAgICBieSB0aGUgc3BlY3MuXHJcbiAgICAgICAgICAqL1xyXG4gICAgICAgICAgcmV0dXJuTm9kZSA9IGltcG9ydE5vZGUuY2FsbChvcmlnaW5hbERvY3VtZW50LCByZXR1cm5Ob2RlLCB0cnVlKTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIHJldHVybiByZXR1cm5Ob2RlO1xyXG4gICAgICB9XHJcblxyXG4gICAgICBsZXQgc2VyaWFsaXplZEhUTUwgPSBXSE9MRV9ET0NVTUVOVCA/IGJvZHkub3V0ZXJIVE1MIDogYm9keS5pbm5lckhUTUw7XHJcbiAgICAgIC8qIFNlcmlhbGl6ZSBkb2N0eXBlIGlmIGFsbG93ZWQgKi9cclxuXHJcbiAgICAgIGlmIChXSE9MRV9ET0NVTUVOVCAmJiBBTExPV0VEX1RBR1NbJyFkb2N0eXBlJ10gJiYgYm9keS5vd25lckRvY3VtZW50ICYmIGJvZHkub3duZXJEb2N1bWVudC5kb2N0eXBlICYmIGJvZHkub3duZXJEb2N1bWVudC5kb2N0eXBlLm5hbWUgJiYgcmVnRXhwVGVzdChET0NUWVBFX05BTUUsIGJvZHkub3duZXJEb2N1bWVudC5kb2N0eXBlLm5hbWUpKSB7XHJcbiAgICAgICAgc2VyaWFsaXplZEhUTUwgPSAnPCFET0NUWVBFICcgKyBib2R5Lm93bmVyRG9jdW1lbnQuZG9jdHlwZS5uYW1lICsgJz5cXG4nICsgc2VyaWFsaXplZEhUTUw7XHJcbiAgICAgIH1cclxuICAgICAgLyogU2FuaXRpemUgZmluYWwgc3RyaW5nIHRlbXBsYXRlLXNhZmUgKi9cclxuXHJcblxyXG4gICAgICBpZiAoU0FGRV9GT1JfVEVNUExBVEVTKSB7XHJcbiAgICAgICAgc2VyaWFsaXplZEhUTUwgPSBzdHJpbmdSZXBsYWNlKHNlcmlhbGl6ZWRIVE1MLCBNVVNUQUNIRV9FWFBSLCAnICcpO1xyXG4gICAgICAgIHNlcmlhbGl6ZWRIVE1MID0gc3RyaW5nUmVwbGFjZShzZXJpYWxpemVkSFRNTCwgRVJCX0VYUFIsICcgJyk7XHJcbiAgICAgICAgc2VyaWFsaXplZEhUTUwgPSBzdHJpbmdSZXBsYWNlKHNlcmlhbGl6ZWRIVE1MLCBUTVBMSVRfRVhQUiwgJyAnKTtcclxuICAgICAgfVxyXG5cclxuICAgICAgcmV0dXJuIHRydXN0ZWRUeXBlc1BvbGljeSAmJiBSRVRVUk5fVFJVU1RFRF9UWVBFID8gdHJ1c3RlZFR5cGVzUG9saWN5LmNyZWF0ZUhUTUwoc2VyaWFsaXplZEhUTUwpIDogc2VyaWFsaXplZEhUTUw7XHJcbiAgICB9O1xyXG4gICAgLyoqXHJcbiAgICAgKiBQdWJsaWMgbWV0aG9kIHRvIHNldCB0aGUgY29uZmlndXJhdGlvbiBvbmNlXHJcbiAgICAgKiBzZXRDb25maWdcclxuICAgICAqXHJcbiAgICAgKiBAcGFyYW0ge09iamVjdH0gY2ZnIGNvbmZpZ3VyYXRpb24gb2JqZWN0XHJcbiAgICAgKi9cclxuXHJcblxyXG4gICAgRE9NUHVyaWZ5LnNldENvbmZpZyA9IGZ1bmN0aW9uIChjZmcpIHtcclxuICAgICAgX3BhcnNlQ29uZmlnKGNmZyk7XHJcblxyXG4gICAgICBTRVRfQ09ORklHID0gdHJ1ZTtcclxuICAgIH07XHJcbiAgICAvKipcclxuICAgICAqIFB1YmxpYyBtZXRob2QgdG8gcmVtb3ZlIHRoZSBjb25maWd1cmF0aW9uXHJcbiAgICAgKiBjbGVhckNvbmZpZ1xyXG4gICAgICpcclxuICAgICAqL1xyXG5cclxuXHJcbiAgICBET01QdXJpZnkuY2xlYXJDb25maWcgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgIENPTkZJRyA9IG51bGw7XHJcbiAgICAgIFNFVF9DT05GSUcgPSBmYWxzZTtcclxuICAgIH07XHJcbiAgICAvKipcclxuICAgICAqIFB1YmxpYyBtZXRob2QgdG8gY2hlY2sgaWYgYW4gYXR0cmlidXRlIHZhbHVlIGlzIHZhbGlkLlxyXG4gICAgICogVXNlcyBsYXN0IHNldCBjb25maWcsIGlmIGFueS4gT3RoZXJ3aXNlLCB1c2VzIGNvbmZpZyBkZWZhdWx0cy5cclxuICAgICAqIGlzVmFsaWRBdHRyaWJ1dGVcclxuICAgICAqXHJcbiAgICAgKiBAcGFyYW0gIHtzdHJpbmd9IHRhZyBUYWcgbmFtZSBvZiBjb250YWluaW5nIGVsZW1lbnQuXHJcbiAgICAgKiBAcGFyYW0gIHtzdHJpbmd9IGF0dHIgQXR0cmlidXRlIG5hbWUuXHJcbiAgICAgKiBAcGFyYW0gIHtzdHJpbmd9IHZhbHVlIEF0dHJpYnV0ZSB2YWx1ZS5cclxuICAgICAqIEByZXR1cm4ge0Jvb2xlYW59IFJldHVybnMgdHJ1ZSBpZiBgdmFsdWVgIGlzIHZhbGlkLiBPdGhlcndpc2UsIHJldHVybnMgZmFsc2UuXHJcbiAgICAgKi9cclxuXHJcblxyXG4gICAgRE9NUHVyaWZ5LmlzVmFsaWRBdHRyaWJ1dGUgPSBmdW5jdGlvbiAodGFnLCBhdHRyLCB2YWx1ZSkge1xyXG4gICAgICAvKiBJbml0aWFsaXplIHNoYXJlZCBjb25maWcgdmFycyBpZiBuZWNlc3NhcnkuICovXHJcbiAgICAgIGlmICghQ09ORklHKSB7XHJcbiAgICAgICAgX3BhcnNlQ29uZmlnKHt9KTtcclxuICAgICAgfVxyXG5cclxuICAgICAgY29uc3QgbGNUYWcgPSB0cmFuc2Zvcm1DYXNlRnVuYyh0YWcpO1xyXG4gICAgICBjb25zdCBsY05hbWUgPSB0cmFuc2Zvcm1DYXNlRnVuYyhhdHRyKTtcclxuICAgICAgcmV0dXJuIF9pc1ZhbGlkQXR0cmlidXRlKGxjVGFnLCBsY05hbWUsIHZhbHVlKTtcclxuICAgIH07XHJcbiAgICAvKipcclxuICAgICAqIEFkZEhvb2tcclxuICAgICAqIFB1YmxpYyBtZXRob2QgdG8gYWRkIERPTVB1cmlmeSBob29rc1xyXG4gICAgICpcclxuICAgICAqIEBwYXJhbSB7U3RyaW5nfSBlbnRyeVBvaW50IGVudHJ5IHBvaW50IGZvciB0aGUgaG9vayB0byBhZGRcclxuICAgICAqIEBwYXJhbSB7RnVuY3Rpb259IGhvb2tGdW5jdGlvbiBmdW5jdGlvbiB0byBleGVjdXRlXHJcbiAgICAgKi9cclxuXHJcblxyXG4gICAgRE9NUHVyaWZ5LmFkZEhvb2sgPSBmdW5jdGlvbiAoZW50cnlQb2ludCwgaG9va0Z1bmN0aW9uKSB7XHJcbiAgICAgIGlmICh0eXBlb2YgaG9va0Z1bmN0aW9uICE9PSAnZnVuY3Rpb24nKSB7XHJcbiAgICAgICAgcmV0dXJuO1xyXG4gICAgICB9XHJcblxyXG4gICAgICBob29rc1tlbnRyeVBvaW50XSA9IGhvb2tzW2VudHJ5UG9pbnRdIHx8IFtdO1xyXG4gICAgICBhcnJheVB1c2goaG9va3NbZW50cnlQb2ludF0sIGhvb2tGdW5jdGlvbik7XHJcbiAgICB9O1xyXG4gICAgLyoqXHJcbiAgICAgKiBSZW1vdmVIb29rXHJcbiAgICAgKiBQdWJsaWMgbWV0aG9kIHRvIHJlbW92ZSBhIERPTVB1cmlmeSBob29rIGF0IGEgZ2l2ZW4gZW50cnlQb2ludFxyXG4gICAgICogKHBvcHMgaXQgZnJvbSB0aGUgc3RhY2sgb2YgaG9va3MgaWYgbW9yZSBhcmUgcHJlc2VudClcclxuICAgICAqXHJcbiAgICAgKiBAcGFyYW0ge1N0cmluZ30gZW50cnlQb2ludCBlbnRyeSBwb2ludCBmb3IgdGhlIGhvb2sgdG8gcmVtb3ZlXHJcbiAgICAgKiBAcmV0dXJuIHtGdW5jdGlvbn0gcmVtb3ZlZChwb3BwZWQpIGhvb2tcclxuICAgICAqL1xyXG5cclxuXHJcbiAgICBET01QdXJpZnkucmVtb3ZlSG9vayA9IGZ1bmN0aW9uIChlbnRyeVBvaW50KSB7XHJcbiAgICAgIGlmIChob29rc1tlbnRyeVBvaW50XSkge1xyXG4gICAgICAgIHJldHVybiBhcnJheVBvcChob29rc1tlbnRyeVBvaW50XSk7XHJcbiAgICAgIH1cclxuICAgIH07XHJcbiAgICAvKipcclxuICAgICAqIFJlbW92ZUhvb2tzXHJcbiAgICAgKiBQdWJsaWMgbWV0aG9kIHRvIHJlbW92ZSBhbGwgRE9NUHVyaWZ5IGhvb2tzIGF0IGEgZ2l2ZW4gZW50cnlQb2ludFxyXG4gICAgICpcclxuICAgICAqIEBwYXJhbSAge1N0cmluZ30gZW50cnlQb2ludCBlbnRyeSBwb2ludCBmb3IgdGhlIGhvb2tzIHRvIHJlbW92ZVxyXG4gICAgICovXHJcblxyXG5cclxuICAgIERPTVB1cmlmeS5yZW1vdmVIb29rcyA9IGZ1bmN0aW9uIChlbnRyeVBvaW50KSB7XHJcbiAgICAgIGlmIChob29rc1tlbnRyeVBvaW50XSkge1xyXG4gICAgICAgIGhvb2tzW2VudHJ5UG9pbnRdID0gW107XHJcbiAgICAgIH1cclxuICAgIH07XHJcbiAgICAvKipcclxuICAgICAqIFJlbW92ZUFsbEhvb2tzXHJcbiAgICAgKiBQdWJsaWMgbWV0aG9kIHRvIHJlbW92ZSBhbGwgRE9NUHVyaWZ5IGhvb2tzXHJcbiAgICAgKlxyXG4gICAgICovXHJcblxyXG5cclxuICAgIERPTVB1cmlmeS5yZW1vdmVBbGxIb29rcyA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgaG9va3MgPSB7fTtcclxuICAgIH07XHJcblxyXG4gICAgcmV0dXJuIERPTVB1cmlmeTtcclxuICB9XHJcblxyXG4gIHZhciBwdXJpZnkgPSBjcmVhdGVET01QdXJpZnkoKTtcclxuXHJcbiAgcmV0dXJuIHB1cmlmeTtcclxuXHJcbn0pKTtcclxuLy8jIHNvdXJjZU1hcHBpbmdVUkw9cHVyaWZ5LmpzLm1hcFxyXG4iLCJpbXBvcnQgeyQsIEF0dHJpYnV0ZXN9IGZyb20gXCIuL2F0dHJpYnV0ZXNcIjtcclxuaW1wb3J0IF9mIGZyb20gXCIuL2Z1bmN0aW9uc1wiO1xyXG5cclxuZXhwb3J0IGRlZmF1bHQgY2xhc3MgU2lkZWJhciB7XHJcbiAgICBjb25zdHJ1Y3RvcigpIHtcclxuICAgICAgICAkKCcudmktdWkubWVudSAuaXRlbScpLnZpX3RhYigpO1xyXG4gICAgICAgIHRoaXMucmV2aXNpb24gPSB7fTtcclxuICAgICAgICB0aGlzLnNpZGViYXIgPSAkKCcjdmktd3BidWxreS1zaWRlYmFyJyk7XHJcbiAgICAgICAgdGhpcy5oaXN0b3J5Qm9keVRhYmxlID0gJCgnI3ZpLXdwYnVsa3ktaGlzdG9yeS1wb2ludHMtbGlzdCB0Ym9keScpO1xyXG5cclxuICAgICAgICB0aGlzLnNpZGViYXIub24oJ2NsaWNrJywgJy52aS13cGJ1bGt5LWFwcGx5LWZpbHRlcicsIHRoaXMuYXBwbHlGaWx0ZXIuYmluZCh0aGlzKSk7XHJcbiAgICAgICAgdGhpcy5zaWRlYmFyLm9uKCdjbGljaycsICcudmktd3BidWxreS1maWx0ZXItbGFiZWwnLCB0aGlzLmZpbHRlcklucHV0TGFiZWxGb2N1cyk7XHJcbiAgICAgICAgdGhpcy5zaWRlYmFyLm9uKCdmb2N1cycsICcudmktd3BidWxreS1maWx0ZXItaW5wdXQnLCB0aGlzLmZpbHRlcklucHV0Rm9jdXMpO1xyXG4gICAgICAgIHRoaXMuc2lkZWJhci5vbignYmx1cicsICcudmktd3BidWxreS1maWx0ZXItaW5wdXQnLCB0aGlzLmZpbHRlcklucHV0Qmx1cik7XHJcbiAgICAgICAgdGhpcy5zaWRlYmFyLm9uKCdjbGljaycsICcudmktd3BidWxreS1nZXQtbWV0YS1maWVsZHMnLCB0aGlzLmdldE1ldGFGaWVsZHMuYmluZCh0aGlzKSk7XHJcbiAgICAgICAgdGhpcy5zaWRlYmFyLm9uKCdjbGljaycsICcudmktd3BidWxreS1zYXZlLW1ldGEtZmllbGRzJywgdGhpcy5zYXZlTWV0YUZpZWxkcy5iaW5kKHRoaXMpKTtcclxuICAgICAgICB0aGlzLnNpZGViYXIub24oJ2NsaWNrJywgJy52aS13cGJ1bGt5LWFkZC1uZXctbWV0YS1maWVsZCcsIHRoaXMuYWRkTmV3TWV0YUZpZWxkLmJpbmQodGhpcykpO1xyXG4gICAgICAgIHRoaXMuc2lkZWJhci5maW5kKCd0YWJsZS52aS13cGJ1bGt5LW1ldGEtZmllbGRzLWNvbnRhaW5lciB0Ym9keScpLnNvcnRhYmxlKHtheGlzOiAneScsfSk7XHJcbiAgICAgICAgdGhpcy5zaWRlYmFyLmZpbmQoJ3RhYmxlLnZpLXdwYnVsa3ktbWV0YS1maWVsZHMtY29udGFpbmVyJykub24oJ2NsaWNrJywgJy52aS13cGJ1bGt5LXJlbW92ZS1tZXRhLXJvdycsIHRoaXMucmVtb3ZlTWV0YVJvdyk7XHJcblxyXG4gICAgICAgIHRoaXMuc2lkZWJhci5vbignY2xpY2snLCAnLnZpLXdwYnVsa3ktc2F2ZS1zZXR0aW5ncycsIHRoaXMuc2F2ZVNldHRpbmdzLmJpbmQodGhpcykpO1xyXG5cclxuICAgICAgICB0aGlzLnNpZGViYXIub24oJ2NsaWNrJywgJy52aS13cGJ1bGt5LXZpZXctaGlzdG9yeS1wb2ludCcsIHRoaXMudmlld0hpc3RvcnlQb2ludC5iaW5kKHRoaXMpKTtcclxuICAgICAgICB0aGlzLnNpZGViYXIub24oJ2NsaWNrJywgJy52aS13cGJ1bGt5LXJlY292ZXInLCB0aGlzLnJlY292ZXIuYmluZCh0aGlzKSk7XHJcbiAgICAgICAgdGhpcy5zaWRlYmFyLm9uKCdjbGljaycsICcudmktd3BidWxreS1yZXZlcnQtdGhpcy1wb2ludCcsIHRoaXMucmV2ZXJ0QWxsUG9zdHMuYmluZCh0aGlzKSk7XHJcbiAgICAgICAgdGhpcy5zaWRlYmFyLm9uKCdjbGljaycsICcudmktd3BidWxreS1yZXZlcnQtdGhpcy1rZXknLCB0aGlzLnJldmVydFBvc3RBdHRyaWJ1dGUuYmluZCh0aGlzKSk7XHJcbiAgICAgICAgdGhpcy5zaWRlYmFyLm9uKCdjbGljaycsICcudmktd3BidWxreS1wYWdpbmF0aW9uIGEuaXRlbScsIHRoaXMuY2hhbmdlUGFnZS5iaW5kKHRoaXMpKTtcclxuICAgICAgICB0aGlzLnNpZGViYXIub24oJ2NoYW5nZScsICcudmktd3BidWxreS1nby10by1wYWdlJywgdGhpcy5jaGFuZ2VQYWdlQnlJbnB1dC5iaW5kKHRoaXMpKTtcclxuICAgICAgICB0aGlzLnNpZGViYXIub24oJ2NsaWNrJywgJy52aS13cGJ1bGt5LW11bHRpLXNlbGVjdC1jbGVhcicsIHRoaXMuY2xlYXJNdWx0aVNlbGVjdCk7XHJcblxyXG4gICAgICAgIC8vIHRoaXMuc2lkZWJhci5vbignY2xpY2snLCAnLmFjY29yZGlvbiAudGl0bGUnLCB0aGlzLnJldmVydFNpbmdsZVBvc3QuYmluZCh0aGlzKSk7XHJcblxyXG4gICAgICAgIHRoaXMuZmlsdGVyKCk7XHJcbiAgICAgICAgdGhpcy5zZXR0aW5ncygpO1xyXG4gICAgICAgIHRoaXMubWV0YWZpZWxkcygpO1xyXG4gICAgICAgIHRoaXMuaGlzdG9yeSgpO1xyXG4gICAgfVxyXG4gICAgdGV4dFdyYXBNb2RlKGVuYWJsZSkge1xyXG4gICAgICAgIGlmIChlbmFibGUpe1xyXG4gICAgICAgICAgICAkKCcjdmktd3BidWxreS1zcHJlYWRzaGVldCcpLmFkZENsYXNzKCd2aS13cGJ1bGt5LXNwcmVhZHNoZWV0LXdyYXAtbW9kZScpO1xyXG4gICAgICAgIH1lbHNlIHtcclxuICAgICAgICAgICAgJCgnI3ZpLXdwYnVsa3ktc3ByZWFkc2hlZXQnKS5yZW1vdmVDbGFzcygndmktd3BidWxreS1zcHJlYWRzaGVldC13cmFwLW1vZGUnKTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcbiAgICBmaWx0ZXIoKSB7XHJcbiAgICAgICAgbGV0IGZpbHRlckZvcm0gPSAkKCcjdmktd3BidWxreS1wb3N0cy1maWx0ZXInKSxcclxuICAgICAgICAgICAgZmlsdGVySW5wdXQgPSAkKCcudmktd3BidWxreS1maWx0ZXItaW5wdXQnKSxcclxuICAgICAgICAgICAgY3NzVG9wID0ge3RvcDogLTJ9LFxyXG4gICAgICAgICAgICBjc3NNaWRkbGUgPSB7dG9wOiAnNTAlJ307XHJcblxyXG4gICAgICAgIGZpbHRlcklucHV0LmVhY2goKGksIGVsKSA9PiB7XHJcbiAgICAgICAgICAgIGlmICgkKGVsKS52YWwoKSkgJChlbCkucGFyZW50KCkucHJldigpLmNzcyhjc3NUb3ApO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICBmaWx0ZXJJbnB1dC5vbignZm9jdXMnLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIGxldCBsYWJlbCA9ICQodGhpcykucHJldigpO1xyXG4gICAgICAgICAgICBsYWJlbC5jc3MoY3NzVG9wKTtcclxuICAgICAgICAgICAgJCh0aGlzKS5vbignYmx1cicsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgIGlmICghJCh0aGlzKS52YWwoKSkgbGFiZWwuY3NzKGNzc01pZGRsZSk7XHJcbiAgICAgICAgICAgIH0pXHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIHRoaXMuc2lkZWJhci5vbignY2xpY2snLCAnLnZpLXdwYnVsa3ktZmlsdGVyLWxhYmVsJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAkKHRoaXMpLm5leHQoKS50cmlnZ2VyKCdmb2N1cycpO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICBsZXQgY2xlYXJhYmxlRmlsdGVyID0gZmlsdGVyRm9ybS5maW5kKCcudmktd3BidWxreS52aS11aS5kcm9wZG93bicpLmRyb3Bkb3duKHtjbGVhcmFibGU6IHRydWV9KSxcclxuICAgICAgICAgICAgY29tcGFjdEZpbHRlciA9IGZpbHRlckZvcm0uZmluZCgnLnZpLXVpLmNvbXBhY3QuZHJvcGRvd24nKS5kcm9wZG93bigpO1xyXG5cclxuICAgICAgICB0aGlzLnNpZGViYXIub24oJ2NsaWNrJywgJy52aS13cGJ1bGt5LWNsZWFyLWZpbHRlcicsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgJCgnLnZpLXdwYnVsa3ktZmlsdGVyLWxhYmVsJykuY3NzKGNzc01pZGRsZSk7XHJcbiAgICAgICAgICAgIGZpbHRlcklucHV0LnZhbCgnJyk7XHJcbiAgICAgICAgICAgIGNsZWFyYWJsZUZpbHRlci5kcm9wZG93bignY2xlYXInKTtcclxuICAgICAgICAgICAgY29tcGFjdEZpbHRlci5maW5kKCcubWVudSAuaXRlbTpmaXJzdCcpLnRyaWdnZXIoJ2NsaWNrJyk7XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgc2V0dGluZ3MoKSB7XHJcbiAgICAgICAgbGV0IHNldHRpbmdzRm9ybSA9ICQoJy52aS13cGJ1bGt5LXNldHRpbmdzLXRhYicpO1xyXG4gICAgICAgIHNldHRpbmdzRm9ybS5maW5kKCdzZWxlY3QuZHJvcGRvd24nKS5kcm9wZG93bigpO1xyXG4gICAgfVxyXG5cclxuICAgIG1ldGFmaWVsZHMoKSB7XHJcbiAgICAgICAgdGhpcy5yZW5kZXJNZXRhRmllbGRzVGFibGUoQXR0cmlidXRlcy5tZXRhRmllbGRzKTtcclxuICAgIH1cclxuXHJcbiAgICBoaXN0b3J5KCkge1xyXG4gICAgICAgIHRoaXMucGFnaW5hdGlvbigxKTtcclxuICAgICAgICAvLyB0aGlzLnNhdmVSZXZpc2lvbigpO1xyXG4gICAgfVxyXG5cclxuICAgIHBhZ2luYXRpb24oY3VycmVudFBhZ2UsIG1heFBhZ2UgPSBBdHRyaWJ1dGVzLmhpc3RvcnlQYWdlcykge1xyXG4gICAgICAgIHRoaXMuc2lkZWJhci5maW5kKCcudmktd3BidWxreS1wYWdpbmF0aW9uJykuaHRtbChfZi5wYWdpbmF0aW9uKG1heFBhZ2UsIGN1cnJlbnRQYWdlKSk7XHJcbiAgICB9XHJcblxyXG4gICAgYXBwbHlGaWx0ZXIoZSkge1xyXG4gICAgICAgIGxldCAkdGhpcyA9IHRoaXMsIHRoaXNCdG4gPSAkKGUudGFyZ2V0KTtcclxuXHJcbiAgICAgICAgaWYgKHRoaXNCdG4uaGFzQ2xhc3MoJ2xvYWRpbmcnKSkgcmV0dXJuO1xyXG4gICAgICAgIGxldCBhY3Rpb24gPSB3cGJ1bGt5UGFyYW1zLnBvc3RUeXBlID09PSdjb21tZW50JyA/ICdhZGRfZmlsdGVyX2NvbW1lbnRfZGF0YScgOiAnYWRkX2ZpbHRlcl9kYXRhJztcclxuXHJcbiAgICAgICAgX2YuYWpheCh7XHJcbiAgICAgICAgICAgIGRhdGE6IHtcclxuICAgICAgICAgICAgICAgIHN1Yl9hY3Rpb246IGFjdGlvbixcclxuICAgICAgICAgICAgICAgIGZpbHRlcl9kYXRhOiAkKCcjdmktd3BidWxreS1wb3N0cy1maWx0ZXInKS5zZXJpYWxpemUoKSxcclxuICAgICAgICAgICAgICAgIGZpbHRlcl9rZXk6IEF0dHJpYnV0ZXMuZmlsdGVyS2V5XHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIGJlZm9yZVNlbmQoKSB7XHJcbiAgICAgICAgICAgICAgICB0aGlzQnRuLmFkZENsYXNzKCdsb2FkaW5nJyk7XHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHN1Y2Nlc3MocmVzKSB7XHJcbiAgICAgICAgICAgICAgICB0aGlzQnRuLnJlbW92ZUNsYXNzKCdsb2FkaW5nJyk7XHJcbiAgICAgICAgICAgICAgICAkdGhpcy5zaWRlYmFyLnRyaWdnZXIoJ2FmdGVyQWRkRmlsdGVyJywgW3Jlcy5kYXRhXSk7XHJcbiAgICAgICAgICAgICAgICBfZi5zaG93TWVzc2FnZSgge3RpdGxlOlwiU3VjY2Vzc1wiLCBtZXNzYWdlOiAnRmlsdGVyZWQgc3VjY2Vzc2Z1bGx5JywgdHlwZTogXCJwb3NpdGl2ZVwiLCBkdXJhdGlvbjogMzAwMH0gKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIHNhdmVTZXR0aW5ncyhlKSB7XHJcbiAgICAgICAgbGV0ICR0aGlzID0gdGhpcywgdGhpc0J0biA9ICQoZS50YXJnZXQpO1xyXG5cclxuICAgICAgICBpZiAodGhpc0J0bi5oYXNDbGFzcygnbG9hZGluZycpKSByZXR1cm47XHJcblxyXG4gICAgICAgIGxldCBhY3Rpb24gPSB3cGJ1bGt5UGFyYW1zLnBvc3RUeXBlID09PSdjb21tZW50JyA/ICdzYXZlX2NvbW1lbnRfc2V0dGluZ3MnIDogJ3NhdmVfc2V0dGluZ3MnO1xyXG4gICAgICAgICR0aGlzLnRleHRXcmFwTW9kZSgkdGhpcy5zaWRlYmFyLmZpbmQoJ2lucHV0W25hbWU9XCJ3cmFwX21vZGVcIl0nKS5wcm9wKCdjaGVja2VkJykpO1xyXG4gICAgICAgIF9mLmFqYXgoe1xyXG4gICAgICAgICAgICBkYXRhOiB7XHJcbiAgICAgICAgICAgICAgICBzdWJfYWN0aW9uOiBhY3Rpb24sXHJcbiAgICAgICAgICAgICAgICBmaWVsZHM6ICQoJ2Zvcm0udmktd3BidWxreS1zZXR0aW5ncy10YWInKS5zZXJpYWxpemUoKVxyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBiZWZvcmVTZW5kKCkge1xyXG4gICAgICAgICAgICAgICAgdGhpc0J0bi5hZGRDbGFzcygnbG9hZGluZycpXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHN1Y2Nlc3MocmVzKSB7XHJcbiAgICAgICAgICAgICAgICBpZiAocmVzLnN1Y2Nlc3MpIHtcclxuICAgICAgICAgICAgICAgICAgICBBdHRyaWJ1dGVzLnNldHRpbmdzID0gcmVzLmRhdGEuc2V0dGluZ3M7XHJcbiAgICAgICAgICAgICAgICAgICAgY2xlYXJJbnRlcnZhbCgkdGhpcy5hdXRvU2F2ZVJldmlzaW9uKTtcclxuICAgICAgICAgICAgICAgICAgICAvLyAkdGhpcy5zYXZlUmV2aXNpb24oKTtcclxuICAgICAgICAgICAgICAgICAgICAkdGhpcy5zaWRlYmFyLnRyaWdnZXIoJ2FmdGVyU2F2ZVNldHRpbmdzJywgW3Jlcy5kYXRhXSk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB0aGlzQnRuLnJlbW92ZUNsYXNzKCdsb2FkaW5nJylcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIGZpbHRlcklucHV0TGFiZWxGb2N1cygpIHtcclxuICAgICAgICAkKHRoaXMpLm5leHQoKS5maW5kKCdpbnB1dCcpLnRyaWdnZXIoJ2ZvY3VzJyk7XHJcbiAgICB9XHJcblxyXG4gICAgZmlsdGVySW5wdXRGb2N1cygpIHtcclxuICAgICAgICAkKHRoaXMpLnBhcmVudCgpLnByZXYoKS5jc3Moe3RvcDogLTJ9KTtcclxuICAgIH1cclxuXHJcbiAgICBmaWx0ZXJJbnB1dEJsdXIoKSB7XHJcbiAgICAgICAgaWYgKCEkKHRoaXMpLnZhbCgpKSAkKHRoaXMpLnBhcmVudCgpLnByZXYoKS5jc3Moe3RvcDogJzUwJSd9KTtcclxuICAgIH1cclxuXHJcbiAgICBnZXRNZXRhRmllbGRzKGUpIHtcclxuICAgICAgICBsZXQgJHRoaXMgPSB0aGlzLCB0aGlzQnRuID0gJChlLnRhcmdldCk7XHJcblxyXG4gICAgICAgIGlmICh0aGlzQnRuLmhhc0NsYXNzKCdsb2FkaW5nJykpIHJldHVybjtcclxuXHJcbiAgICAgICAgX2YuYWpheCh7XHJcbiAgICAgICAgICAgIGRhdGE6IHtzdWJfYWN0aW9uOiAnZ2V0X21ldGFfZmllbGRzJywgY3VycmVudF9tZXRhX2ZpZWxkczogJHRoaXMuZ2V0Q3VycmVudE1ldGFGaWVsZHMoKX0sXHJcbiAgICAgICAgICAgIGJlZm9yZVNlbmQoKSB7XHJcbiAgICAgICAgICAgICAgICB0aGlzQnRuLmFkZENsYXNzKCdsb2FkaW5nJyk7XHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHN1Y2Nlc3MocmVzKSB7XHJcbiAgICAgICAgICAgICAgICAkdGhpcy5yZW5kZXJNZXRhRmllbGRzVGFibGUocmVzLmRhdGEpO1xyXG4gICAgICAgICAgICAgICAgQXR0cmlidXRlcy5tZXRhRmllbGRzID0gcmVzLmRhdGE7XHJcbiAgICAgICAgICAgICAgICB0aGlzQnRuLnJlbW92ZUNsYXNzKCdsb2FkaW5nJyk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICByZW5kZXJNZXRhRmllbGRzVGFibGUoZGF0YSkge1xyXG4gICAgICAgIGxldCBodG1sID0gJyc7XHJcblxyXG4gICAgICAgIGZvciAobGV0IG1ldGFLZXkgaW4gZGF0YSkge1xyXG4gICAgICAgICAgICBodG1sICs9IHRoaXMucmVuZGVyUm93KG1ldGFLZXksIGRhdGEpO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgJCgnLnZpLXdwYnVsa3ktbWV0YS1maWVsZHMtY29udGFpbmVyIHRib2R5JykuaHRtbChodG1sKTtcclxuICAgIH1cclxuXHJcbiAgICByZW5kZXJSb3cobWV0YUtleSwgZGF0YSkge1xyXG4gICAgICAgIGxldCBtZXRhID0gZGF0YVttZXRhS2V5XSB8fCB7fSxcclxuICAgICAgICAgICAgb3B0aW9uSHRtbCA9ICcnLFxyXG4gICAgICAgICAgICBpbnB1dFR5cGUgPSBtZXRhLmlucHV0X3R5cGUgfHwgJycsXHJcbiAgICAgICAgICAgIG9wdGlvbnMgPSB7XHJcbiAgICAgICAgICAgICAgICB0ZXh0aW5wdXQ6ICdUZXh0IGlucHV0JyxcclxuICAgICAgICAgICAgICAgIHRleHRlZGl0b3I6ICdUZXh0IGVkaXRvcicsXHJcbiAgICAgICAgICAgICAgICBudW1iZXJpbnB1dDogJ051bWJlciBpbnB1dCcsXHJcbiAgICAgICAgICAgICAgICBhcnJheTogJ0FycmF5JyxcclxuICAgICAgICAgICAgICAgIGpzb246ICdKU09OJyxcclxuICAgICAgICAgICAgICAgIGNoZWNrYm94OiAnQ2hlY2tib3gnLFxyXG4gICAgICAgICAgICAgICAgY2FsZW5kYXI6ICdDYWxlbmRhcicsXHJcbiAgICAgICAgICAgICAgICBpbWFnZTogXCJJbWFnZSAoU2F2ZSBpbWFnZSdzIGlkKVwiLFxyXG4gICAgICAgICAgICAgICAgaW1hZ2V1cmw6IFwiSW1hZ2UgKFNhdmUgaW1hZ2UncyB1cmwpXCIsXHJcbiAgICAgICAgICAgIH07XHJcblxyXG4gICAgICAgIGZvciAobGV0IG9wdGlvblZhbHVlIGluIG9wdGlvbnMpIHtcclxuICAgICAgICAgICAgb3B0aW9uSHRtbCArPSBgPG9wdGlvbiB2YWx1ZT1cIiR7b3B0aW9uVmFsdWV9XCIgJHtvcHRpb25WYWx1ZSA9PT0gaW5wdXRUeXBlID8gJ3NlbGVjdGVkJyA6ICcnfT4ke29wdGlvbnNbb3B0aW9uVmFsdWVdfTwvb3B0aW9uPmA7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBsZXQgbWV0YVZhbHVlID0gbWV0YS5tZXRhX3ZhbHVlIHx8ICcnLFxyXG4gICAgICAgICAgICBzaG9ydFZhbHVlID0gbWV0YVZhbHVlLnNsaWNlKDAsIDE1KSxcclxuICAgICAgICAgICAgZnVsbFZhbHVlSHRtbCA9IG1ldGFWYWx1ZS5sZW5ndGggPiAxNiA/IGA8ZGl2IGNsYXNzPVwidmktd3BidWxreS1mdWxsLW1ldGEtdmFsdWVcIj4ke21ldGFWYWx1ZX08L2Rpdj5gIDogJyc7XHJcblxyXG4gICAgICAgIHNob3J0VmFsdWUgKz0gc2hvcnRWYWx1ZS5sZW5ndGggPCBtZXRhVmFsdWUubGVuZ3RoID8gJy4uLicgOiAnJztcclxuXHJcbiAgICAgICAgcmV0dXJuIGA8dHI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDx0ZCBjbGFzcz1cInZpLXdwYnVsa3ktbWV0YS1rZXktY29sIHZpLXdwYnVsa3ktbWV0YS1rZXlcIj4ke21ldGFLZXl9PC90ZD5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPHRkIGNsYXNzPVwidmktd3BidWxreS1jb2x1bW4tbmFtZS1jb2xcIj48aW5wdXQgdHlwZT1cInRleHRcIiBjbGFzcz1cInZpLXdwYnVsa3ktbWV0YS1jb2x1bW4tbmFtZVwiIHZhbHVlPVwiJHttZXRhLmNvbHVtbl9uYW1lIHx8ICcnfVwiPjwvdGQ+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDx0ZCBjbGFzcz1cInZpLXdwYnVsa3ktdmFsdWUtZm9ybWF0LWNvbFwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cInZpLXdwYnVsa3ktZGlzcGxheS1tZXRhLXZhbHVlXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cInZpLXdwYnVsa3ktc2hvcnQtbWV0YS12YWx1ZVwiPiR7c2hvcnRWYWx1ZX08L2Rpdj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAke2Z1bGxWYWx1ZUh0bWx9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPC90ZD5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPHRkIGNsYXNzPVwidmktd3BidWxreS1jb2x1bW4tdHlwZS1jb2xcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxzZWxlY3QgY2xhc3M9XCJ2aS13cGJ1bGt5LW1ldGEtY29sdW1uLXR5cGVcIj4ke29wdGlvbkh0bWx9PC9zZWxlY3Q+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDwvdGQ+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICA8dGQgY2xhc3M9XCJ2aS13cGJ1bGt5LWNvbHVtbi1tdWx0aXBsZS1jb2xcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxpbnB1dCB0eXBlPVwiY2hlY2tib3hcIiBjbGFzcz1cInZpLXdwYnVsa3ktbWV0YS1jb2x1bW4tbXVsdGlwbGVcIiAke3BhcnNlSW50KG1ldGEubXVsdGlwbGUpID8gJ2NoZWNrZWQnIDogJyd9PlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8L3RkPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8dGQgY2xhc3M9XCJ2aS13cGJ1bGt5LWFjdGl2ZS1jb2wgdmktd3BidWxreS1tZXRhLWZpZWxkLWFjdGl2ZS1jb2x1bW5cIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxpbnB1dCB0eXBlPVwiY2hlY2tib3hcIiBjbGFzcz1cInZpLXdwYnVsa3ktbWV0YS1jb2x1bW4tYWN0aXZlXCIgJHtwYXJzZUludChtZXRhLmFjdGl2ZSkgPyAnY2hlY2tlZCcgOiAnJ30+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDwvdGQ+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDx0ZCBjbGFzcz1cInZpLXdwYnVsa3ktYWN0aW9ucy1jb2xcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJ2aS13cGJ1bGt5LW1ldGEtZmllbGQtYWN0aW9uc1wiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxzcGFuIGNsYXNzPVwidmktdWkgYnV0dG9uIGJhc2ljIG1pbmkgdmktd3BidWxreS1yZW1vdmUtbWV0YS1yb3dcIj48aSBjbGFzcz1cImljb24gdHJhc2hcIj4gPC9pPjwvc3Bhbj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8c3BhbiBjbGFzcz1cInZpLXVpIGJ1dHRvbiBiYXNpYyBtaW5pXCI+PGkgY2xhc3M9XCJpY29uIG1vdmVcIj4gPC9pPjwvc3Bhbj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8L3RkPlxyXG4gICAgICAgICAgICAgICAgICAgIDwvdHI+YDtcclxuICAgIH1cclxuXHJcbiAgICBzYXZlTWV0YUZpZWxkcyhlKSB7XHJcbiAgICAgICAgbGV0IHRoaXNCdG4gPSAkKGUudGFyZ2V0KTtcclxuXHJcbiAgICAgICAgaWYgKHRoaXNCdG4uaGFzQ2xhc3MoJ2xvYWRpbmcnKSkgcmV0dXJuO1xyXG5cclxuICAgICAgICBfZi5hamF4KHtcclxuICAgICAgICAgICAgZGF0YToge3N1Yl9hY3Rpb246ICdzYXZlX21ldGFfZmllbGRzJywgbWV0YV9maWVsZHM6IHRoaXMuZ2V0Q3VycmVudE1ldGFGaWVsZHMoKX0sXHJcbiAgICAgICAgICAgIGJlZm9yZVNlbmQoKSB7XHJcbiAgICAgICAgICAgICAgICB0aGlzQnRuLmFkZENsYXNzKCdsb2FkaW5nJyk7XHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHN1Y2Nlc3MocmVzKSB7XHJcbiAgICAgICAgICAgICAgICB0aGlzQnRuLnJlbW92ZUNsYXNzKCdsb2FkaW5nJyk7XHJcbiAgICAgICAgICAgICAgICBsb2NhdGlvbi5yZWxvYWQoKTtcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgZXJyb3IocmVzKSB7XHJcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhyZXMpXHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICBnZXRDdXJyZW50TWV0YUZpZWxkcygpIHtcclxuICAgICAgICBsZXQgbWV0YV9maWVsZHMgPSB7fTtcclxuICAgICAgICBsZXQgbWV0YUFyciA9IEF0dHJpYnV0ZXMubWV0YUZpZWxkcztcclxuICAgICAgICAkKCd0YWJsZS52aS13cGJ1bGt5LW1ldGEtZmllbGRzLWNvbnRhaW5lciB0Ym9keSB0cicpLmVhY2goZnVuY3Rpb24gKGksIHJvdykge1xyXG4gICAgICAgICAgICBsZXQgbWV0YUtleSA9ICQocm93KS5maW5kKCcudmktd3BidWxreS1tZXRhLWtleScpLnRleHQoKTtcclxuICAgICAgICAgICAgbWV0YV9maWVsZHNbbWV0YUtleV0gPSB7XHJcbiAgICAgICAgICAgICAgICBjb2x1bW5fbmFtZTogJChyb3cpLmZpbmQoJy52aS13cGJ1bGt5LW1ldGEtY29sdW1uLW5hbWUnKS52YWwoKSxcclxuICAgICAgICAgICAgICAgIGlucHV0X3R5cGU6ICQocm93KS5maW5kKCcudmktd3BidWxreS1tZXRhLWNvbHVtbi10eXBlJykudmFsKCksXHJcbiAgICAgICAgICAgICAgICBhY3RpdmU6ICQocm93KS5maW5kKCcudmktd3BidWxreS1tZXRhLWNvbHVtbi1hY3RpdmU6Y2hlY2tlZCcpLmxlbmd0aCxcclxuICAgICAgICAgICAgICAgIG1ldGFfdmFsdWU6IG1ldGFBcnJbbWV0YUtleV0gPyBtZXRhQXJyW21ldGFLZXldLm1ldGFfdmFsdWUgOiAnJyxcclxuICAgICAgICAgICAgICAgIG11bHRpcGxlOiAkKHJvdykuZmluZCgnLnZpLXdwYnVsa3ktbWV0YS1jb2x1bW4tbXVsdGlwbGU6Y2hlY2tlZCcpLmxlbmd0aCxcclxuICAgICAgICAgICAgfTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgcmV0dXJuIG1ldGFfZmllbGRzO1xyXG4gICAgfVxyXG5cclxuICAgIGFkZE5ld01ldGFGaWVsZChlKSB7XHJcbiAgICAgICAgbGV0IGlucHV0ID0gJChlLmN1cnJlbnRUYXJnZXQpLnByZXYoKSxcclxuICAgICAgICAgICAgbWV0YUtleSA9IGlucHV0LnZhbCgpLFxyXG4gICAgICAgICAgICB2YWxpZGF0ZSA9IG1ldGFLZXkubWF0Y2goL15bXFx3XFxkXy1dKiQvZyk7XHJcblxyXG4gICAgICAgIGlmICghbWV0YUtleSB8fCAhdmFsaWRhdGUgfHwgQXR0cmlidXRlcy5tZXRhRmllbGRzW21ldGFLZXldKSByZXR1cm47XHJcblxyXG4gICAgICAgIGxldCBuZXdSb3cgPSB0aGlzLnJlbmRlclJvdyhtZXRhS2V5LCB7fSk7XHJcbiAgICAgICAgaWYgKG5ld1Jvdykge1xyXG4gICAgICAgICAgICBpbnB1dC52YWwoJycpO1xyXG4gICAgICAgICAgICAkKCd0YWJsZS52aS13cGJ1bGt5LW1ldGEtZmllbGRzLWNvbnRhaW5lciB0Ym9keScpLmFwcGVuZChuZXdSb3cpO1xyXG4gICAgICAgIH1cclxuICAgIH1cclxuXHJcbiAgICByZW1vdmVNZXRhUm93KCkge1xyXG4gICAgICAgICQodGhpcykuY2xvc2VzdCgndHInKS5yZW1vdmUoKTtcclxuICAgIH1cclxuXHJcbiAgICB2aWV3SGlzdG9yeVBvaW50KGUpIHtcclxuICAgICAgICBsZXQgdGhpc0J0biA9ICQoZS5jdXJyZW50VGFyZ2V0KSxcclxuICAgICAgICAgICAgaGlzdG9yeWlEID0gdGhpc0J0bi5kYXRhKCdpZCcpLFxyXG4gICAgICAgICAgICAkdGhpcyA9IHRoaXM7XHJcblxyXG4gICAgICAgIGlmICh0aGlzQnRuLmhhc0NsYXNzKCdsb2FkaW5nJykpIHJldHVybjtcclxuXHJcbiAgICAgICAgbGV0IGFjdGlvbiA9IHdwYnVsa3lQYXJhbXMucG9zdFR5cGUgPT09J2NvbW1lbnQnID8gJ3ZpZXdfY29tbWVudF9oaXN0b3J5X3BvaW50JyA6ICd2aWV3X2hpc3RvcnlfcG9pbnQnO1xyXG5cclxuICAgICAgICBfZi5hamF4KHtcclxuICAgICAgICAgICAgZGF0YToge3N1Yl9hY3Rpb246IGFjdGlvbiwgaWQ6IGhpc3RvcnlpRH0sXHJcbiAgICAgICAgICAgIGJlZm9yZVNlbmQoKSB7XHJcbiAgICAgICAgICAgICAgICB0aGlzQnRuLmFkZENsYXNzKCdsb2FkaW5nJyk7XHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIGNvbXBsZXRlKCkge1xyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBzdWNjZXNzKHJlcykge1xyXG4gICAgICAgICAgICAgICAgdGhpc0J0bi5yZW1vdmVDbGFzcygnbG9hZGluZycpO1xyXG5cclxuICAgICAgICAgICAgICAgIGlmIChyZXMuc3VjY2VzcyAmJiByZXMuZGF0YSkge1xyXG4gICAgICAgICAgICAgICAgICAgIGxldCBwb3N0cyA9IHJlcy5kYXRhLmNvbXBhcmU7XHJcbiAgICAgICAgICAgICAgICAgICAgbGV0IGh0bWwgPSAnJztcclxuICAgICAgICAgICAgICAgICAgICBmb3IgKGxldCBpZCBpbiBwb3N0cykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBsZXQgaXRlbSA9IHBvc3RzW2lkXTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgaHRtbCArPSBgPGRpdiBjbGFzcz1cInZpLXdwYnVsa3ktaGlzdG9yeS1wb3N0XCIgZGF0YS1wb3N0X2lkPVwiJHtpZH1cIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJ0aXRsZVwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxpIGNsYXNzPVwiZHJvcGRvd24gaWNvblwiPjwvaT5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAke2l0ZW0ubmFtZX1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8c3BhbiBjbGFzcz1cInZpLXVpIGJ1dHRvbiBtaW5pIGJhc2ljIHZpLXdwYnVsa3ktcmV2ZXJ0LXRoaXMtcG9zdFwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8aSBjbGFzcz1cImljb24gdW5kb1wiPiA8L2k+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9zcGFuPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+YDtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGxldCB0YWJsZSA9ICcnO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBmb3IgKGxldCBrZXkgaW4gaXRlbS5maWVsZHMpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGxldCBjdXJyZW50VmFsID0gdHlwZW9mIGl0ZW0uY3VycmVudFtrZXldID09PSAnc3RyaW5nJyA/IGl0ZW0uY3VycmVudFtrZXldIDogSlNPTi5zdHJpbmdpZnkoaXRlbS5jdXJyZW50W2tleV0pO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbGV0IGhpc3RvcnlWYWwgPSB0eXBlb2YgaXRlbS5oaXN0b3J5W2tleV0gPT09ICdzdHJpbmcnID8gaXRlbS5oaXN0b3J5W2tleV0gOiBKU09OLnN0cmluZ2lmeShpdGVtLmhpc3Rvcnlba2V5XSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0YWJsZSArPSBgPHRyPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx0ZD4ke2l0ZW0uZmllbGRzW2tleV19PC90ZD5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8dGQ+JHtjdXJyZW50VmFsfTwvdGQ+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHRkPiR7aGlzdG9yeVZhbH08L3RkPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx0ZCBjbGFzcz1cIlwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8c3BhbiBjbGFzcz1cInZpLXVpIGJ1dHRvbiBiYXNpYyBtaW5pIHZpLXdwYnVsa3ktcmV2ZXJ0LXRoaXMta2V5XCIgZGF0YS1wb3N0X2lkPVwiJHtpZH1cIiBkYXRhLXBvc3Rfa2V5PVwiJHtrZXl9XCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8aSBjbGFzcz1cImljb24gdW5kb1wiPiA8L2k+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvc3Bhbj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L3RkPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC90cj5gO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICB0YWJsZSA9IGA8dGFibGUgaWQ9XCJ2aS13cGJ1bGt5LWhpc3RvcnktcG9pbnQtZGV0YWlsXCIgY2xhc3M9XCJ2aS11aSBjZWxsZWQgdGFibGVcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHRoZWFkPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8dHI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8dGg+QXR0cmlidXRlPC90aD5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx0aD5DdXJyZW50IHZhbHVlIGluIGRhdGFiYXNlPC90aD5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx0aD5IaXN0b3J5PC90aD5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx0aCBjbGFzcz1cIlwiPlJldmVydDwvdGg+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvdHI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvdGhlYWQ+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDx0Ym9keT5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJHt0YWJsZX1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC90Ym9keT5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L3RhYmxlPmA7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICBodG1sICs9IGA8ZGl2IGNsYXNzPVwiY29udGVudFwiPiR7dGFibGV9PC9kaXY+PC9kaXY+YFxyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICAgICAgICAgaHRtbCA9ICQoYDxkaXYgY2xhc3M9XCJ2aS11aSBzdHlsZWQgZmx1aWQgYWNjb3JkaW9uXCI+JHtodG1sfTwvZGl2PmApO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAkKCcudmktd3BidWxreS1oaXN0b3J5LXJldmlldycpXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC5odG1sKGh0bWwpLmF0dHIoJ2RhdGEtaGlzdG9yeV9pZCcsIGhpc3RvcnlpRClcclxuICAgICAgICAgICAgICAgICAgICAgICAgLnByZXBlbmQoYDxoND5IaXN0b3J5IHBvaW50OiAke3Jlcy5kYXRhLmRhdGV9PC9oND5gKVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAuYXBwZW5kKGA8ZGl2IGNsYXNzPVwidmktdWkgYnV0dG9uIHRpbnkgdmktd3BidWxreS1yZXZlcnQtdGhpcy1wb2ludFwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAke19mLnRleHQoJ1JldmVydCBhbGwgcG9zdCBpbiB0aGlzIHBvaW50Jyl9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHA+ICR7X2YudGV4dCgnVGhlIGN1cnJlbnQgdmFsdWUgaXMgdGhlIHZhbHVlIG9mIHRoZSBwb3N0IGluIGRhdGFiYXNlJyl9PC9wPmApO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICBodG1sLmZpbmQoJy50aXRsZScpLm9uKCdjbGljaycsIChlKSA9PiAkdGhpcy5yZXZlcnRTaW5nbGVQb3N0KGUpKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgaHRtbC52aV9hY2NvcmRpb24oKTtcclxuICAgICAgICAgICAgICAgICAgICBodG1sLmZpbmQoJy50aXRsZTpmaXJzdCcpLnRyaWdnZXIoJ2NsaWNrJyk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KVxyXG4gICAgfVxyXG5cclxuICAgIHJlY292ZXIoZSkge1xyXG4gICAgICAgIGxldCB0aGlzQnRuID0gJChlLmN1cnJlbnRUYXJnZXQpLFxyXG4gICAgICAgICAgICBoaXN0b3J5SUQgPSB0aGlzQnRuLmRhdGEoJ2lkJyk7XHJcblxyXG4gICAgICAgIGlmICh0aGlzQnRuLmhhc0NsYXNzKCdsb2FkaW5nJykpIHJldHVybjtcclxuICAgICAgICBsZXQgYWN0aW9uID0gd3BidWxreVBhcmFtcy5wb3N0VHlwZSA9PT0nY29tbWVudCcgPyAncmV2ZXJ0X2hpc3RvcnlfYWxsX2NvbW1lbnRzJyA6ICdyZXZlcnRfaGlzdG9yeV9hbGxfcG9zdHMnO1xyXG4gICAgICAgIF9mLmFqYXgoe1xyXG4gICAgICAgICAgICBkYXRhOiB7c3ViX2FjdGlvbjogYWN0aW9uLCBoaXN0b3J5X2lkOiBoaXN0b3J5SUR9LFxyXG4gICAgICAgICAgICBiZWZvcmVTZW5kKCkge1xyXG4gICAgICAgICAgICAgICAgdGhpc0J0bi5hZGRDbGFzcygnbG9hZGluZycpXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIGNvbXBsZXRlKCkge1xyXG4gICAgICAgICAgICAgICAgdGhpc0J0bi5yZW1vdmVDbGFzcygnbG9hZGluZycpXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHN1Y2Nlc3MocmVzKSB7XHJcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhyZXMpO1xyXG4gICAgICAgICAgICAgICAgX2Yuc2hvd01lc3NhZ2UoIHt0aXRsZTpcIlN1Y2Nlc3NcIiwgbWVzc2FnZTogJ1JldmVydGVkIHN1Y2Nlc3NmdWxseScsIHR5cGU6IFwicG9zaXRpdmVcIiwgZHVyYXRpb246IDMwMDB9ICk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICByZXZlcnRTaW5nbGVQb3N0KGUpIHtcclxuICAgICAgICBsZXQgdGhpc0J0bjtcclxuICAgICAgICBpZiAoJChlLnRhcmdldCkuaGFzQ2xhc3MoJ3ZpLXdwYnVsa3ktcmV2ZXJ0LXRoaXMtcG9zdCcpKSB0aGlzQnRuID0gJChlLnRhcmdldCk7XHJcbiAgICAgICAgaWYgKCQoZS50YXJnZXQpLnBhcmVudCgpLmhhc0NsYXNzKCd2aS13cGJ1bGt5LXJldmVydC10aGlzLXBvc3QnKSkgdGhpc0J0biA9ICQoZS50YXJnZXQpLnBhcmVudCgpO1xyXG5cclxuICAgICAgICBpZiAodGhpc0J0bikge1xyXG4gICAgICAgICAgICBlLnN0b3BJbW1lZGlhdGVQcm9wYWdhdGlvbigpO1xyXG5cclxuICAgICAgICAgICAgbGV0IHBpZCA9IHRoaXNCdG4uY2xvc2VzdCgnLnZpLXdwYnVsa3ktaGlzdG9yeS1wb3N0JykuZGF0YSgncG9zdF9pZCcpLFxyXG4gICAgICAgICAgICAgICAgaGlzdG9yeUlEID0gdGhpc0J0bi5jbG9zZXN0KCcudmktd3BidWxreS1oaXN0b3J5LXJldmlldycpLmF0dHIoJ2RhdGEtaGlzdG9yeV9pZCcpO1xyXG5cclxuICAgICAgICAgICAgaWYgKHRoaXNCdG4uaGFzQ2xhc3MoJ2xvYWRpbmcnKSkgcmV0dXJuO1xyXG5cclxuICAgICAgICAgICAgbGV0IGFjdGlvbiA9IHdwYnVsa3lQYXJhbXMucG9zdFR5cGUgPT09J2NvbW1lbnQnID8gJ3JldmVydF9oaXN0b3J5X3NpbmdsZV9jb21tZW50JyA6ICdyZXZlcnRfaGlzdG9yeV9zaW5nbGVfcG9zdCc7XHJcblxyXG4gICAgICAgICAgICBfZi5hamF4KHtcclxuICAgICAgICAgICAgICAgIGRhdGE6IHtzdWJfYWN0aW9uOiBhY3Rpb24sIGhpc3RvcnlfaWQ6IGhpc3RvcnlJRCwgcGlkOiBwaWR9LFxyXG4gICAgICAgICAgICAgICAgYmVmb3JlU2VuZCgpIHtcclxuICAgICAgICAgICAgICAgICAgICB0aGlzQnRuLmFkZENsYXNzKCdsb2FkaW5nJylcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBjb21wbGV0ZSgpIHtcclxuICAgICAgICAgICAgICAgICAgICB0aGlzQnRuLnJlbW92ZUNsYXNzKCdsb2FkaW5nJylcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBzdWNjZXNzKHJlcykge1xyXG4gICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlcyk7XHJcbiAgICAgICAgICAgICAgICAgICAgX2Yuc2hvd01lc3NhZ2UoIHt0aXRsZTpcIlN1Y2Nlc3NcIiwgbWVzc2FnZTogJ1JldmVydGVkIHN1Y2Nlc3NmdWxseScsIHR5cGU6IFwicG9zaXRpdmVcIiwgZHVyYXRpb246IDMwMDB9ICk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH1cclxuICAgIH1cclxuXHJcbiAgICByZXZlcnRBbGxQb3N0cyhlKSB7XHJcbiAgICAgICAgbGV0IHRoaXNCdG4gPSAkKGUudGFyZ2V0KTtcclxuICAgICAgICBsZXQgaGlzdG9yeUlEID0gdGhpc0J0bi5jbG9zZXN0KCcudmktd3BidWxreS1oaXN0b3J5LXJldmlldycpLmRhdGEoJ2hpc3RvcnlfaWQnKTtcclxuXHJcbiAgICAgICAgaWYgKHRoaXNCdG4uaGFzQ2xhc3MoJ2xvYWRpbmcnKSkgcmV0dXJuO1xyXG5cclxuICAgICAgICBsZXQgYWN0aW9uID0gd3BidWxreVBhcmFtcy5wb3N0VHlwZSA9PT0nY29tbWVudCcgPyAncmV2ZXJ0X2hpc3RvcnlfYWxsX2NvbW1lbnRzJyA6ICdyZXZlcnRfaGlzdG9yeV9hbGxfcG9zdHMnO1xyXG5cclxuICAgICAgICBfZi5hamF4KHtcclxuICAgICAgICAgICAgZGF0YToge3N1Yl9hY3Rpb246IGFjdGlvbiwgaGlzdG9yeV9pZDogaGlzdG9yeUlEfSxcclxuICAgICAgICAgICAgYmVmb3JlU2VuZCgpIHtcclxuICAgICAgICAgICAgICAgIHRoaXNCdG4uYWRkQ2xhc3MoJ2xvYWRpbmcnKVxyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBjb21wbGV0ZSgpIHtcclxuICAgICAgICAgICAgICAgIHRoaXNCdG4ucmVtb3ZlQ2xhc3MoJ2xvYWRpbmcnKVxyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBzdWNjZXNzKHJlcykge1xyXG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2cocmVzKTtcclxuICAgICAgICAgICAgICAgIF9mLnNob3dNZXNzYWdlKCB7dGl0bGU6XCJTdWNjZXNzXCIsIG1lc3NhZ2U6ICdSZXZlcnRlZCBzdWNjZXNzZnVsbHknLCB0eXBlOiBcInBvc2l0aXZlXCIsIGR1cmF0aW9uOiAzMDAwfSApO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgcmV2ZXJ0UG9zdEF0dHJpYnV0ZShlKSB7XHJcbiAgICAgICAgbGV0IHRoaXNCdG4gPSAkKGUuY3VycmVudFRhcmdldCksXHJcbiAgICAgICAgICAgIGF0dHJpYnV0ZSA9IHRoaXNCdG4uZGF0YSgncG9zdF9rZXknKSxcclxuICAgICAgICAgICAgcGlkID0gdGhpc0J0bi5jbG9zZXN0KCcudmktd3BidWxreS1oaXN0b3J5LXBvc3QnKS5kYXRhKCdwb3N0X2lkJyksXHJcbiAgICAgICAgICAgIGhpc3RvcnlJRCA9IHRoaXNCdG4uY2xvc2VzdCgnLnZpLXdwYnVsa3ktaGlzdG9yeS1yZXZpZXcnKS5kYXRhKCdoaXN0b3J5X2lkJyk7XHJcblxyXG4gICAgICAgIGlmICh0aGlzQnRuLmhhc0NsYXNzKCdsb2FkaW5nJykpIHJldHVybjtcclxuXHJcbiAgICAgICAgbGV0IGFjdGlvbiA9IHdwYnVsa3lQYXJhbXMucG9zdFR5cGUgPT09J2NvbW1lbnQnID8gJ3JldmVydF9oaXN0b3J5X2NvbW1lbnRfYXR0cmlidXRlJyA6ICdyZXZlcnRfaGlzdG9yeV9wb3N0X2F0dHJpYnV0ZSc7XHJcblxyXG4gICAgICAgIF9mLmFqYXgoe1xyXG4gICAgICAgICAgICBkYXRhOiB7c3ViX2FjdGlvbjogYWN0aW9uLCBhdHRyaWJ1dGU6IGF0dHJpYnV0ZSwgaGlzdG9yeV9pZDogaGlzdG9yeUlELCBwaWQ6IHBpZH0sXHJcbiAgICAgICAgICAgIGJlZm9yZVNlbmQoKSB7XHJcbiAgICAgICAgICAgICAgICB0aGlzQnRuLmFkZENsYXNzKCdsb2FkaW5nJylcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgY29tcGxldGUoKSB7XHJcbiAgICAgICAgICAgICAgICB0aGlzQnRuLnJlbW92ZUNsYXNzKCdsb2FkaW5nJylcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgc3VjY2VzcyhyZXMpIHtcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlcyk7XHJcbiAgICAgICAgICAgICAgICBfZi5zaG93TWVzc2FnZSgge3RpdGxlOlwiU3VjY2Vzc1wiLCBtZXNzYWdlOiAnUmV2ZXJ0ZWQgUG9zdCBBdHRyaWJ1dGUgc3VjY2Vzc2Z1bGx5JywgdHlwZTogXCJwb3NpdGl2ZVwiLCBkdXJhdGlvbjogMzAwMH0gKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIGNoYW5nZVBhZ2UoZSkge1xyXG4gICAgICAgIGxldCBwYWdlID0gcGFyc2VJbnQoJChlLmN1cnJlbnRUYXJnZXQpLmF0dHIoJ2RhdGEtcGFnZScpKTtcclxuICAgICAgICBpZiAoJChlLmN1cnJlbnRUYXJnZXQpLmhhc0NsYXNzKCdhY3RpdmUnKSB8fCAkKGUuY3VycmVudFRhcmdldCkuaGFzQ2xhc3MoJ2Rpc2FibGVkJykgfHwgIXBhZ2UpIHJldHVybjtcclxuICAgICAgICB0aGlzLmxvYWRIaXN0b3J5UGFnZShwYWdlKTtcclxuICAgIH1cclxuXHJcbiAgICBjaGFuZ2VQYWdlQnlJbnB1dChlKSB7XHJcbiAgICAgICAgbGV0IHBhZ2UgPSBwYXJzZUludCgkKGUudGFyZ2V0KS52YWwoKSk7XHJcbiAgICAgICAgbGV0IG1heCA9IHBhcnNlSW50KCQoZS50YXJnZXQpLmF0dHIoJ21heCcpKTtcclxuXHJcbiAgICAgICAgaWYgKHBhZ2UgPD0gbWF4ICYmIHBhZ2UgPiAwKSB0aGlzLmxvYWRIaXN0b3J5UGFnZShwYWdlKTtcclxuICAgIH1cclxuXHJcbiAgICBjbGVhck11bHRpU2VsZWN0KCkge1xyXG4gICAgICAgICQodGhpcykucGFyZW50KCkuZmluZCgnLnZpLXVpLmRyb3Bkb3duJykuZHJvcGRvd24oJ2NsZWFyJyk7XHJcbiAgICB9XHJcblxyXG4gICAgbG9hZEhpc3RvcnlQYWdlKHBhZ2UpIHtcclxuICAgICAgICBsZXQgbG9hZGluZyA9IF9mLnNwaW5uZXIoKSxcclxuICAgICAgICAgICAgJHRoaXMgPSB0aGlzO1xyXG5cclxuICAgICAgICBpZiAocGFnZSkge1xyXG4gICAgICAgICAgICBfZi5hamF4KHtcclxuICAgICAgICAgICAgICAgIGRhdGFUeXBlOiAndGV4dCcsXHJcbiAgICAgICAgICAgICAgICBkYXRhOiB7c3ViX2FjdGlvbjogJ2xvYWRfaGlzdG9yeV9wYWdlJywgcGFnZTogcGFnZX0sXHJcbiAgICAgICAgICAgICAgICBiZWZvcmVTZW5kKCkge1xyXG4gICAgICAgICAgICAgICAgICAgICR0aGlzLnNpZGViYXIuZmluZCgnLnZpLXdwYnVsa3ktcGFnaW5hdGlvbicpLnByZXBlbmQobG9hZGluZyk7XHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgY29tcGxldGUoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgbG9hZGluZy5yZW1vdmUoKTtcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBzdWNjZXNzKHJlcykge1xyXG4gICAgICAgICAgICAgICAgICAgICR0aGlzLnBhZ2luYXRpb24ocGFnZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgJCgnI3ZpLXdwYnVsa3ktaGlzdG9yeS1wb2ludHMtbGlzdCB0Ym9keScpLmh0bWwocmVzKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG5cclxuICAgIHNhdmVSZXZpc2lvbigpIHtcclxuICAgICAgICBsZXQgYXV0b1NhdmVUaW1lID0gcGFyc2VJbnQoQXR0cmlidXRlcy5zZXR0aW5ncy5hdXRvX3NhdmVfcmV2aXNpb24pO1xyXG5cclxuICAgICAgICBpZiAoYXV0b1NhdmVUaW1lID09PSAwKSByZXR1cm47XHJcblxyXG4gICAgICAgIGxldCAkdGhpcyA9IHRoaXM7XHJcblxyXG4gICAgICAgIHRoaXMuYXV0b1NhdmVSZXZpc2lvbiA9IHNldEludGVydmFsKGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgaWYgKE9iamVjdC5rZXlzKCR0aGlzLnJldmlzaW9uKS5sZW5ndGgpIHtcclxuICAgICAgICAgICAgICAgIGxldCBjdXJyZW50UGFnZSA9ICR0aGlzLnNpZGViYXIuZmluZCgnLnZpLXdwYnVsa3ktcGFnaW5hdGlvbiBhLml0ZW0uYWN0aXZlJykuZGF0YSgncGFnZScpIHx8IDE7XHJcblxyXG4gICAgICAgICAgICAgICAgbGV0IGFjdGlvbiA9IHdwYnVsa3lQYXJhbXMucG9zdFR5cGUgPT09J2NvbW1lbnQnID8gJ2F1dG9fc2F2ZV9yZXZpc2lvbl9jb21tZW50JyA6ICdhdXRvX3NhdmVfcmV2aXNpb24nO1xyXG5cclxuICAgICAgICAgICAgICAgIF9mLmFqYXgoe1xyXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IHtzdWJfYWN0aW9uOiBhY3Rpb24sIGRhdGE6ICR0aGlzLnJldmlzaW9uLCBwYWdlOiBjdXJyZW50UGFnZSB8fCAxfSxcclxuICAgICAgICAgICAgICAgICAgICBzdWNjZXNzKHJlcykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAocmVzLnN1Y2Nlc3MpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmIChyZXMuZGF0YS5wYWdlcykgQXR0cmlidXRlcy5oaXN0b3J5UGFnZXMgPSByZXMuZGF0YS5wYWdlcztcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmIChyZXMuZGF0YS51cGRhdGVQYWdlKSAkdGhpcy5oaXN0b3J5Qm9keVRhYmxlLmh0bWwocmVzLmRhdGEudXBkYXRlUGFnZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAkdGhpcy5yZXZpc2lvbiA9IHt9O1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMucGFnaW5hdGlvbihjdXJyZW50UGFnZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICB9LCBhdXRvU2F2ZVRpbWUgKiAxMDAwKVxyXG4gICAgfVxyXG59XHJcbiIsImNvbnN0IFRlbXBsYXRlcyA9IHtcclxuICAgIG1vZGFsKGRhdGEgPSB7fSkge1xyXG4gICAgICAgIGxldCB7aGVhZGVyID0gJycsIGNvbnRlbnQgPSAnJywgYWN0aW9uc0h0bWwgPSAnJ30gPSBkYXRhO1xyXG4gICAgICAgIHJldHVybiBgPGRpdiBjbGFzcz1cInZpLXdwYnVsa3ktbW9kYWwtY29udGFpbmVyXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cInZpLXdwYnVsa3ktbW9kYWwtbWFpbiB2aS11aSBmb3JtIHNtYWxsXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDxpIGNsYXNzPVwiY2xvc2UgaWNvblwiPjwvaT5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cInZpLXdwYnVsa3ktbW9kYWwtd3JhcHBlclwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGgzIGNsYXNzPVwiaGVhZGVyXCI+JHtoZWFkZXJ9PC9oMz5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJjb250ZW50XCI+JHtjb250ZW50fTwvZGl2PlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cImFjdGlvbnNcIj4ke2FjdGlvbnNIdG1sfTwvZGl2PlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgICAgIDwvZGl2PmA7XHJcbiAgICB9LFxyXG5cclxuICAgIGRlZmF1bHRBdHRyaWJ1dGVzKGRhdGEgPSB7fSkge1xyXG4gICAgICAgIGxldCB7aHRtbH0gPSBkYXRhO1xyXG4gICAgICAgIHJldHVybiBgPHRhYmxlIGNsYXNzPVwidmktdWkgY2VsbGVkIHRhYmxlXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgPHRoZWFkPlxyXG4gICAgICAgICAgICAgICAgICAgIDx0cj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPHRoPk5hbWU8L3RoPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8dGg+QXR0cmlidXRlPC90aD5cclxuICAgICAgICAgICAgICAgICAgICA8L3RyPlxyXG4gICAgICAgICAgICAgICAgICAgIDwvdGhlYWQ+XHJcbiAgICAgICAgICAgICAgICAgICAgPHRib2R5PlxyXG4gICAgICAgICAgICAgICAgICAgICR7aHRtbH1cclxuICAgICAgICAgICAgICAgICAgICA8L3Rib2R5PlxyXG4gICAgICAgICAgICAgICAgPC90YWJsZT5gO1xyXG4gICAgfSxcclxuXHJcbn07XHJcbmV4cG9ydCBkZWZhdWx0IFRlbXBsYXRlczsiLCJpbXBvcnQgeyR9IGZyb20gXCIuL2F0dHJpYnV0ZXNcIjtcclxuaW1wb3J0IF9mIGZyb20gJy4vZnVuY3Rpb25zJztcclxuaW1wb3J0IHtQb3B1cH0gZnJvbSBcIi4vbW9kYWwtcG9wdXBcIjtcclxuXHJcbmV4cG9ydCBkZWZhdWx0IGNsYXNzIFRleHRNdWx0aUNlbGxzRWRpdCB7XHJcbiAgICBjb25zdHJ1Y3RvcihvYmosIHgsIHksIGUpIHtcclxuICAgICAgICB0aGlzLl9kYXRhID0ge307XHJcbiAgICAgICAgdGhpcy5fZGF0YS5qZXhjZWwgPSBvYmo7XHJcbiAgICAgICAgdGhpcy5fZGF0YS54ID0gcGFyc2VJbnQoeCk7XHJcbiAgICAgICAgdGhpcy5fZGF0YS55ID0gcGFyc2VJbnQoeSk7XHJcbiAgICAgICAgdGhpcy5ydW4oKTtcclxuICAgIH1cclxuXHJcbiAgICBnZXQoaWQpIHtcclxuICAgICAgICByZXR1cm4gdGhpcy5fZGF0YVtpZF0gfHwgJyc7XHJcbiAgICB9XHJcblxyXG4gICAgcnVuKCkge1xyXG4gICAgICAgIGxldCBmb3JtdWxhSHRtbCA9IHRoaXMuY29udGVudCgpO1xyXG4gICAgICAgIGxldCBjZWxsID0gJChgdGRbZGF0YS14PSR7dGhpcy5nZXQoJ3gnKSB8fCAwfV1bZGF0YS15PSR7dGhpcy5nZXQoJ3knKSB8fCAwfV1gKTtcclxuICAgICAgICBuZXcgUG9wdXAoZm9ybXVsYUh0bWwsIGNlbGwpO1xyXG4gICAgICAgIGZvcm11bGFIdG1sLm9uKCdjbGljaycsICcudmktd3BidWxreS1hcHBseS1mb3JtdWxhJywgdGhpcy5hcHBseUZvcm11bGEuYmluZCh0aGlzKSk7XHJcbiAgICAgICAgLy8gZm9ybXVsYUh0bWwub24oJ2NoYW5nZScsICcudmktd3BidWxreS10ZXh0LWlucHV0JywgdGhpcy5hcHBseUZvcm11bGEuYmluZCh0aGlzKSk7XHJcbiAgICB9XHJcblxyXG4gICAgY29udGVudCgpIHtcclxuICAgICAgICByZXR1cm4gJChgPGRpdiBjbGFzcz1cInZpLXdwYnVsa3ktZm9ybXVsYS1jb250YWluZXJcIj5cclxuICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPVwiZmllbGRcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPGlucHV0IHR5cGU9XCJ0ZXh0XCIgcGxhY2Vob2xkZXI9XCIke19mLnRleHQoJ0NvbnRlbnQnKX1cIiBjbGFzcz1cInZpLXdwYnVsa3ktdGV4dC1pbnB1dFwiPlxyXG4gICAgICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICAgICAgICAgIDxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwidmktdWkgYnV0dG9uIG1pbmkgdmktd3BidWxreS1hcHBseS1mb3JtdWxhXCI+JHtfZi50ZXh0KCdTYXZlJyl9PC9idXR0b24+XHJcbiAgICAgICAgICAgICAgICA8L2Rpdj5gKTtcclxuICAgIH1cclxuXHJcbiAgICBhcHBseUZvcm11bGEoZSkge1xyXG4gICAgICAgIGxldCBmb3JtID0gJChlLnRhcmdldCkuY2xvc2VzdCgnLnZpLXdwYnVsa3ktZm9ybXVsYS1jb250YWluZXInKSxcclxuICAgICAgICAgICAgdmFsdWUgPSBmb3JtLmZpbmQoJy52aS13cGJ1bGt5LXRleHQtaW5wdXQnKS52YWwoKSxcclxuICAgICAgICAgICAgZXhjZWxPYmogPSB0aGlzLmdldCgnamV4Y2VsJyk7XHJcblxyXG4gICAgICAgIGxldCBicmVha0NvbnRyb2wgPSBmYWxzZSwgcmVjb3JkcyA9IFtdO1xyXG4gICAgICAgIGxldCBoID0gZXhjZWxPYmouc2VsZWN0ZWRDb250YWluZXI7XHJcbiAgICAgICAgbGV0IHN0YXJ0ID0gaFsxXSwgZW5kID0gaFszXSwgeCA9IGhbMF07XHJcblxyXG4gICAgICAgIGZvciAobGV0IHkgPSBzdGFydDsgeSA8PSBlbmQ7IHkrKykge1xyXG4gICAgICAgICAgICBpZiAoZXhjZWxPYmoucmVjb3Jkc1t5XVt4XSAmJiAhZXhjZWxPYmoucmVjb3Jkc1t5XVt4XS5jbGFzc0xpc3QuY29udGFpbnMoJ3JlYWRvbmx5JykgJiYgZXhjZWxPYmoucmVjb3Jkc1t5XVt4XS5zdHlsZS5kaXNwbGF5ICE9PSAnbm9uZScgJiYgYnJlYWtDb250cm9sID09PSBmYWxzZSkge1xyXG4gICAgICAgICAgICAgICAgcmVjb3Jkcy5wdXNoKGV4Y2VsT2JqLnVwZGF0ZUNlbGwoeCwgeSwgdmFsdWUpKTtcclxuICAgICAgICAgICAgICAgIGV4Y2VsT2JqLnVwZGF0ZUZvcm11bGFDaGFpbih4LCB5LCByZWNvcmRzKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgLy8gVXBkYXRlIGhpc3RvcnlcclxuICAgICAgICBleGNlbE9iai5zZXRIaXN0b3J5KHtcclxuICAgICAgICAgICAgYWN0aW9uOiAnc2V0VmFsdWUnLFxyXG4gICAgICAgICAgICByZWNvcmRzOiByZWNvcmRzLFxyXG4gICAgICAgICAgICBzZWxlY3Rpb246IGV4Y2VsT2JqLnNlbGVjdGVkQ2VsbCxcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgLy8gVXBkYXRlIHRhYmxlIHdpdGggY3VzdG9tIGNvbmZpZ3VyYXRpb24gaWYgYXBwbGljYWJsZVxyXG4gICAgICAgIGV4Y2VsT2JqLnVwZGF0ZVRhYmxlKCk7XHJcbiAgICB9XHJcblxyXG59IiwiLy8gVGhlIG1vZHVsZSBjYWNoZVxudmFyIF9fd2VicGFja19tb2R1bGVfY2FjaGVfXyA9IHt9O1xuXG4vLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXHQvLyBDaGVjayBpZiBtb2R1bGUgaXMgaW4gY2FjaGVcblx0dmFyIGNhY2hlZE1vZHVsZSA9IF9fd2VicGFja19tb2R1bGVfY2FjaGVfX1ttb2R1bGVJZF07XG5cdGlmIChjYWNoZWRNb2R1bGUgIT09IHVuZGVmaW5lZCkge1xuXHRcdHJldHVybiBjYWNoZWRNb2R1bGUuZXhwb3J0cztcblx0fVxuXHQvLyBDcmVhdGUgYSBuZXcgbW9kdWxlIChhbmQgcHV0IGl0IGludG8gdGhlIGNhY2hlKVxuXHR2YXIgbW9kdWxlID0gX193ZWJwYWNrX21vZHVsZV9jYWNoZV9fW21vZHVsZUlkXSA9IHtcblx0XHQvLyBubyBtb2R1bGUuaWQgbmVlZGVkXG5cdFx0Ly8gbm8gbW9kdWxlLmxvYWRlZCBuZWVkZWRcblx0XHRleHBvcnRzOiB7fVxuXHR9O1xuXG5cdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuXHRfX3dlYnBhY2tfbW9kdWxlc19fW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuXHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuXHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG59XG5cbiIsIi8vIGdldERlZmF1bHRFeHBvcnQgZnVuY3Rpb24gZm9yIGNvbXBhdGliaWxpdHkgd2l0aCBub24taGFybW9ueSBtb2R1bGVzXG5fX3dlYnBhY2tfcmVxdWlyZV9fLm4gPSAobW9kdWxlKSA9PiB7XG5cdHZhciBnZXR0ZXIgPSBtb2R1bGUgJiYgbW9kdWxlLl9fZXNNb2R1bGUgP1xuXHRcdCgpID0+IChtb2R1bGVbJ2RlZmF1bHQnXSkgOlxuXHRcdCgpID0+IChtb2R1bGUpO1xuXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQoZ2V0dGVyLCB7IGE6IGdldHRlciB9KTtcblx0cmV0dXJuIGdldHRlcjtcbn07IiwiLy8gZGVmaW5lIGdldHRlciBmdW5jdGlvbnMgZm9yIGhhcm1vbnkgZXhwb3J0c1xuX193ZWJwYWNrX3JlcXVpcmVfXy5kID0gKGV4cG9ydHMsIGRlZmluaXRpb24pID0+IHtcblx0Zm9yKHZhciBrZXkgaW4gZGVmaW5pdGlvbikge1xuXHRcdGlmKF9fd2VicGFja19yZXF1aXJlX18ubyhkZWZpbml0aW9uLCBrZXkpICYmICFfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZXhwb3J0cywga2V5KSkge1xuXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIGtleSwgeyBlbnVtZXJhYmxlOiB0cnVlLCBnZXQ6IGRlZmluaXRpb25ba2V5XSB9KTtcblx0XHR9XG5cdH1cbn07IiwiX193ZWJwYWNrX3JlcXVpcmVfXy5vID0gKG9iaiwgcHJvcCkgPT4gKE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbChvYmosIHByb3ApKSIsIi8vIGRlZmluZSBfX2VzTW9kdWxlIG9uIGV4cG9ydHNcbl9fd2VicGFja19yZXF1aXJlX18uciA9IChleHBvcnRzKSA9PiB7XG5cdGlmKHR5cGVvZiBTeW1ib2wgIT09ICd1bmRlZmluZWQnICYmIFN5bWJvbC50b1N0cmluZ1RhZykge1xuXHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBTeW1ib2wudG9TdHJpbmdUYWcsIHsgdmFsdWU6ICdNb2R1bGUnIH0pO1xuXHR9XG5cdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCAnX19lc01vZHVsZScsIHsgdmFsdWU6IHRydWUgfSk7XG59OyIsImltcG9ydCBfZiBmcm9tIFwiLi9mdW5jdGlvbnNcIjtcclxuaW1wb3J0IHskLCBBdHRyaWJ1dGVzfSBmcm9tIFwiLi9hdHRyaWJ1dGVzXCI7XHJcbmltcG9ydCBDYWxjdWxhdG9yIGZyb20gXCIuL2NhbGN1bGF0b3JcIjtcclxuaW1wb3J0IFNpZGViYXIgZnJvbSBcIi4vc2lkZWJhclwiO1xyXG5pbXBvcnQgRmluZEFuZFJlcGxhY2UgZnJvbSBcIi4vZmluZC1hbmQtcmVwbGFjZVwiO1xyXG5pbXBvcnQgVGV4dE11bHRpQ2VsbHNFZGl0IGZyb20gJy4vdGV4dC1tdWx0aS1jZWxscy1lZGl0JztcclxuaW1wb3J0IHtQb3B1cH0gZnJvbSBcIi4vbW9kYWwtcG9wdXBcIjtcclxuaW1wb3J0ICogYXMgRE9NUHVyaWZ5IGZyb20gJy4vcHVyaWZ5JztcclxuXHJcbmpRdWVyeShkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCQpIHtcclxuXHJcbiAgICBjbGFzcyBCdWxrRWRpdCB7XHJcbiAgICAgICAgY29uc3RydWN0b3IoKSB7XHJcbiAgICAgICAgICAgIHRoaXMuc2lkZWJhciA9IG5ldyBTaWRlYmFyKCk7XHJcblxyXG4gICAgICAgICAgICB0aGlzLmNvbXBhcmUgPSBbXTtcclxuICAgICAgICAgICAgdGhpcy50cmFzaCA9IFtdO1xyXG4gICAgICAgICAgICB0aGlzLnVuVHJhc2ggPSBbXTtcclxuICAgICAgICAgICAgdGhpcy5yZXZpc2lvbiA9IHt9O1xyXG5cclxuICAgICAgICAgICAgdGhpcy5lZGl0b3IgPSAkKCcjdmktd3BidWxreS1jb250YWluZXInKTtcclxuICAgICAgICAgICAgdGhpcy5tZW51YmFyID0gJCgnI3ZpLXdwYnVsa3ktbWVudS1iYXInKTtcclxuXHJcbiAgICAgICAgICAgIHRoaXMubWVudWJhci5vbignY2xpY2snLCAnLnZpLXdwYnVsa3ktb3Blbi1zaWRlYmFyJywgdGhpcy5vcGVuTWVudS5iaW5kKHRoaXMpKTtcclxuICAgICAgICAgICAgdGhpcy5tZW51YmFyLm9uKCdjbGljaycsICdhLml0ZW06bm90KC52aS13cGJ1bGt5LW9wZW4tc2lkZWJhciknLCB0aGlzLmNsb3NlTWVudS5iaW5kKHRoaXMpKTtcclxuICAgICAgICAgICAgdGhpcy5tZW51YmFyLm9uKCdjbGljaycsICcudmktd3BidWxreS1uZXctcG9zdCcsIHRoaXMuYWRkTmV3UG9zdC5iaW5kKHRoaXMpKTtcclxuICAgICAgICAgICAgdGhpcy5tZW51YmFyLm9uKCdjbGljaycsICcudmktd3BidWxreS1mdWxsLXNjcmVlbi1idG4nLCB0aGlzLnRvZ2dsZUZ1bGxTY3JlZW4uYmluZCh0aGlzKSk7XHJcbiAgICAgICAgICAgIHRoaXMubWVudWJhci5vbignY2xpY2snLCAnLnZpLXdwYnVsa3ktc2F2ZS1idXR0b24nLCB0aGlzLnNhdmUuYmluZCh0aGlzKSk7XHJcbiAgICAgICAgICAgIHRoaXMubWVudWJhci5vbignY2xpY2snLCAnLnZpLXdwYnVsa3ktcGFnaW5hdGlvbiBhLml0ZW0nLCB0aGlzLmNoYW5nZVBhZ2UuYmluZCh0aGlzKSk7XHJcbiAgICAgICAgICAgIHRoaXMubWVudWJhci5vbignY2xpY2snLCAnLnZpLXdwYnVsa3ktZ2V0LXBvc3QnLCB0aGlzLnJlbG9hZEN1cnJlbnRQYWdlLmJpbmQodGhpcykpO1xyXG4gICAgICAgICAgICB0aGlzLm1lbnViYXIub24oJ2NoYW5nZScsICcudmktd3BidWxreS1nby10by1wYWdlJywgdGhpcy5jaGFuZ2VQYWdlQnlJbnB1dC5iaW5kKHRoaXMpKTtcclxuXHJcbiAgICAgICAgICAgIHRoaXMuZWRpdG9yLm9uKCdjZWxsb25jaGFuZ2UnLCAndHInLCB0aGlzLmNlbGxPbkNoYW5nZS5iaW5kKHRoaXMpKTtcclxuICAgICAgICAgICAgdGhpcy5lZGl0b3Iub24oJ2NsaWNrJywgJy5qZXhjZWxfY29udGVudCcsIHRoaXMucmVtb3ZlRXhpc3RpbmdFZGl0b3IuYmluZCh0aGlzKSk7XHJcbiAgICAgICAgICAgIHRoaXMuZWRpdG9yLm9uKCdkYmxjbGljaycsIHRoaXMucmVtb3ZlQ29udGV4dFBvcHVwKTtcclxuXHJcbiAgICAgICAgICAgIHRoaXMuc2lkZWJhci5zaWRlYmFyLm9uKCdhZnRlckFkZEZpbHRlcicsIHRoaXMuYWZ0ZXJBZGRGaWx0ZXIuYmluZCh0aGlzKSk7XHJcbiAgICAgICAgICAgIHRoaXMuc2lkZWJhci5zaWRlYmFyLm9uKCdhZnRlclNhdmVTZXR0aW5ncycsIHRoaXMuYWZ0ZXJTYXZlU2V0dGluZ3MuYmluZCh0aGlzKSk7XHJcbiAgICAgICAgICAgIHRoaXMuc2lkZWJhci5zaWRlYmFyLm9uKCdjbGljaycsICcudmktd3BidWxreS1jbG9zZS1zaWRlYmFyJywgdGhpcy5jbG9zZU1lbnUuYmluZCh0aGlzKSk7XHJcblxyXG4gICAgICAgICAgICB0aGlzLmluaXQoKTtcclxuXHJcbiAgICAgICAgICAgICQoZG9jdW1lbnQpLm9uKCdrZXlkb3duJywgdGhpcy5rZXlEb3duQ29udHJvbC5iaW5kKHRoaXMpKTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIHJlbW92ZUV4aXN0aW5nRWRpdG9yKGUpIHtcclxuICAgICAgICAgICAgaWYgKGUudGFyZ2V0ID09PSBlLmN1cnJlbnRUYXJnZXQpIHtcclxuICAgICAgICAgICAgICAgIGlmICh0aGlzLldvcmtCb29rICYmIHRoaXMuV29ya0Jvb2suZWRpdGlvbikgdGhpcy5Xb3JrQm9vay5jbG9zZUVkaXRvcih0aGlzLldvcmtCb29rLmVkaXRpb25bMF0sIHRydWUpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBrZXlEb3duQ29udHJvbChlKSB7XHJcbiAgICAgICAgICAgIGlmICgoZS5jdHJsS2V5IHx8IGUubWV0YUtleSkgJiYgIWUuc2hpZnRLZXkpIHtcclxuICAgICAgICAgICAgICAgIGlmIChlLndoaWNoID09PSA4Mykge1xyXG4gICAgICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAgICAgICAgICAgICB0aGlzLnNhdmUoKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgc3dpdGNoIChlLndoaWNoKSB7XHJcbiAgICAgICAgICAgICAgICBjYXNlIDI3OlxyXG4gICAgICAgICAgICAgICAgICAgIHRoaXMuc2lkZWJhci5zaWRlYmFyLnJlbW92ZUNsYXNzKCd2aS13cGJ1bGt5LW9wZW4nKTtcclxuICAgICAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgcmVtb3ZlQ29udGV4dFBvcHVwKCkge1xyXG4gICAgICAgICAgICAkKCcudmktd3BidWxreS1jb250ZXh0LXBvcHVwJykucmVtb3ZlQ2xhc3MoJ3ZpLXdwYnVsa3ktcG9wdXAtYWN0aXZlJylcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGluaXQoKSB7XHJcbiAgICAgICAgICAgIGlmICh3cGJ1bGt5UGFyYW1zLmNvbHVtbnMpIEF0dHJpYnV0ZXMuc2V0Q29sdW1ucyh3cGJ1bGt5UGFyYW1zLmNvbHVtbnMpO1xyXG4gICAgICAgICAgICB0aGlzLnBhZ2luYXRpb24oMSwgMSk7XHJcbiAgICAgICAgICAgIHRoaXMud29ya0Jvb2tJbml0KCk7XHJcbiAgICAgICAgICAgIGlmICggd3BidWxreVBhcmFtcy5wb3N0VHlwZSA9PT0nY29tbWVudCcgKSB7XHJcbiAgICAgICAgICAgICAgICB0aGlzLmxvYWRDb21tZW50cygpO1xyXG4gICAgICAgICAgICB9ZWxzZSB7XHJcbiAgICAgICAgICAgICAgICB0aGlzLmxvYWRQb3N0cygpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIF9mLnNldEpleGNlbCh0aGlzLldvcmtCb29rKTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGNlbGxPbkNoYW5nZShlLCBkYXRhKSB7XHJcbiAgICAgICAgICAgIGxldCB7Y29sID0gJyd9ID0gZGF0YTtcclxuXHJcbiAgICAgICAgICAgIGlmICghY29sKSByZXR1cm47XHJcblxyXG4gICAgICAgICAgICBsZXQgdHlwZSA9IEF0dHJpYnV0ZXMuaWRNYXBwaW5nW2NvbF07XHJcbiAgICAgICAgICAgIGxldCB0aGlzUm93ID0gJChlLnRhcmdldCk7XHJcblxyXG4gICAgICAgICAgICBzd2l0Y2ggKHR5cGUpIHtcclxuICAgICAgICAgICAgICAgIGNhc2UgJ3Bvc3RfZGF0ZSc6XHJcbiAgICAgICAgICAgICAgICAgICAgbGV0IHZhbHVlID0gZGF0YS52YWx1ZSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgeCA9IF9mLmdldENvbEZyb21Db2x1bW5UeXBlKCdwb3N0X3N0YXR1cycpLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjZWxsID0gdGhpc1Jvdy5maW5kKGB0ZFtkYXRhLXg9JyR7eH0nXWApLmdldCgwKSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGltZSA9IChuZXcgRGF0ZSh2YWx1ZSkpLmdldFRpbWUoKSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgbm93ID0gRGF0ZS5ub3coKSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgc3RhdHVzID0gdGltZSA+IG5vdyA/ICdmdXR1cmUnIDogJ3B1Ymxpc2gnO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICB0aGlzLldvcmtCb29rLnNldFZhbHVlKGNlbGwsIHN0YXR1cyk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIGJyZWFrO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICB3b3JrQm9va0luaXQoKSB7XHJcbiAgICAgICAgICAgIGxldCAkdGhpcyA9IHRoaXMsXHJcbiAgICAgICAgICAgICAgICBjb250ZXh0TWVudUl0ZW1zLFxyXG4gICAgICAgICAgICAgICAgb25yZXNpemVjb2x1bW4gPSBmdW5jdGlvbiAoaW5zdGFuY2UsIGNlbGwsIHdpZHRoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgX2YuYWpheCh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGFzeW5jOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBkYXRhOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBzdWJfYWN0aW9uOiAncmVzaXplX2NvbHVtbicsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb2x1bW5faWQ6IEF0dHJpYnV0ZXMuY29sdW1uc1tjZWxsXS5pZCxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbHVtbl93aWR0aDogd2lkdGggPD0gNTUgPyA1NSA6IHdpZHRoLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBiZWZvcmVTZW5kKCkge30sXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHN1Y2Nlc3MocmVzKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAocmVzLnN1Y2Nlc3MpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhyZXMuZGF0YSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGVycm9yKHJlcykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2cocmVzLmRhdGEpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYWxlcnQocmVzLmRhdGEpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb21wbGV0ZSgpIHt9XHJcbiAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICB9O1xyXG5cclxuICAgICAgICAgICAgZnVuY3Rpb24gc2V0VmFsdWVUb0NlbGwob2JqLCB2YWx1ZSkge1xyXG4gICAgICAgICAgICAgICAgbGV0IGJyZWFrQ29udHJvbCA9IGZhbHNlLCByZWNvcmRzID0gW10sIGggPSBvYmouc2VsZWN0ZWRDb250YWluZXIsIHN0YXJ0ID0gaFsxXSwgZW5kID0gaFszXSwgeCA9IGhbMF07XHJcblxyXG4gICAgICAgICAgICAgICAgZm9yIChsZXQgeSA9IHN0YXJ0OyB5IDw9IGVuZDsgeSsrKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKG9iai5yZWNvcmRzW3ldW3hdICYmICFvYmoucmVjb3Jkc1t5XVt4XS5jbGFzc0xpc3QuY29udGFpbnMoJ3JlYWRvbmx5JykgJiYgb2JqLnJlY29yZHNbeV1beF0uc3R5bGUuZGlzcGxheSAhPT0gJ25vbmUnICYmIGJyZWFrQ29udHJvbCA9PT0gZmFsc2UpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgcmVjb3Jkcy5wdXNoKG9iai51cGRhdGVDZWxsKHgsIHksIHZhbHVlKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIG9iai51cGRhdGVGb3JtdWxhQ2hhaW4oeCwgeSwgcmVjb3Jkcyk7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgIG9iai5zZXRIaXN0b3J5KHthY3Rpb246ICdzZXRWYWx1ZScsIHJlY29yZHM6IHJlY29yZHMsIHNlbGVjdGlvbjogb2JqLnNlbGVjdGVkQ2VsbH0pO1xyXG4gICAgICAgICAgICAgICAgb2JqLnVwZGF0ZVRhYmxlKCk7XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIHN3aXRjaCAoIHdwYnVsa3lQYXJhbXMucG9zdFR5cGUgKSB7XHJcbiAgICAgICAgICAgICAgICBjYXNlICdjb21tZW50JzpcclxuICAgICAgICAgICAgICAgICAgICBjb250ZXh0TWVudUl0ZW1zID0gZnVuY3Rpb24gKGl0ZW1zLCBvYmosIHgsIHksIGUpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgbGV0IGNlbGxzID0gb2JqLnNlbGVjdGVkQ29udGFpbmVyO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB4ID0gcGFyc2VJbnQoeCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHkgPSBwYXJzZUludCh5KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKHggIT09IG51bGwgJiYgeSAhPT0gbnVsbCkge1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmIChjZWxsc1swXSA9PT0gY2VsbHNbMl0pIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBzd2l0Y2ggKG9iai5vcHRpb25zLmNvbHVtbnNbeF0udHlwZSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjYXNlICd0ZXh0JzpcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW1zLnB1c2goe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlOiBfZi50ZXh0KCdFZGl0IG11bHRpcGxlIGNlbGxzJyksXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgb25jbGljayhlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG5ldyBUZXh0TXVsdGlDZWxsc0VkaXQob2JqLCB4LCB5LCBlKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpdGVtcy5wdXNoKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aXRsZTogX2YudGV4dCgnRmluZCBhbmQgUmVwbGFjZScpLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9uY2xpY2soZSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBuZXcgRmluZEFuZFJlcGxhY2Uob2JqLCB4LCB5LCBlKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGJyZWFrO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjYXNlICdudW1iZXInOlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaXRlbXMucHVzaCh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdGl0bGU6IF9mLnRleHQoJ0ZpbmQgYW5kIFJlcGxhY2UnKSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBvbmNsaWNrKGUpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbmV3IEZpbmRBbmRSZXBsYWNlKG9iaiwgeCwgeSwgZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBicmVhaztcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNhc2UgJ2NhbGVuZGFyJzpcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGxldCBjZWxsID0gJChgdGRbZGF0YS14PSR7eH1dW2RhdGEteT0ke3l9XWApLmdldCgwKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmICghJChjZWxsKS5oYXNDbGFzcygncmVhZG9ubHknKSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW1zLnB1c2goe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aXRsZTogX2YudGV4dCgnT3BlbiBkYXRlIHBpY2tlcicpLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBvbmNsaWNrKCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbGV0IHZhbHVlID0gb2JqLm9wdGlvbnMuZGF0YVt5XVt4XTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB2YXIgZWRpdG9yID0gX2YuY3JlYXRlRWRpdG9yKGNlbGwsICdpbnB1dCcsICcnLCBmYWxzZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBlZGl0b3IudmFsdWUgPSB2YWx1ZTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGVkaXRvci5zdHlsZS5sZWZ0ID0gJ3Vuc2V0JztcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBsZXQgaCA9IG9iai5zZWxlY3RlZENvbnRhaW5lcjtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGxldCBzdGFydCA9IGhbMV0sIGVuZCA9IGhbM107XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKG9iai5vcHRpb25zLnRhYmxlT3ZlcmZsb3cgPT0gdHJ1ZSB8fCBvYmoub3B0aW9ucy5mdWxsc2NyZWVuID09IHRydWUpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBvYmoub3B0aW9ucy5jb2x1bW5zW3hdLm9wdGlvbnMucG9zaXRpb24gPSB0cnVlO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgb2JqLm9wdGlvbnMuY29sdW1uc1t4XS5vcHRpb25zLnZhbHVlID0gb2JqLm9wdGlvbnMuZGF0YVt5XVt4XTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9iai5vcHRpb25zLmNvbHVtbnNbeF0ub3B0aW9ucy5vcGVuZWQgPSB0cnVlO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgb2JqLm9wdGlvbnMuY29sdW1uc1t4XS5vcHRpb25zLm9uY2xvc2UgPSBmdW5jdGlvbiAoZWwsIHZhbHVlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbGV0IHJlY29yZHMgPSBbXTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZSA9IGVsLnZhbHVlO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBmb3IgKGxldCB5ID0gc3RhcnQ7IHkgPD0gZW5kOyB5KyspIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKG9iai5yZWNvcmRzW3ldW3hdICYmICFvYmoucmVjb3Jkc1t5XVt4XS5jbGFzc0xpc3QuY29udGFpbnMoJ3JlYWRvbmx5JykgJiYgb2JqLnJlY29yZHNbeV1beF0uc3R5bGUuZGlzcGxheSAhPT0gJ25vbmUnKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICByZWNvcmRzLnB1c2gob2JqLnVwZGF0ZUNlbGwoeCwgeSwgdmFsdWUpKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9iai51cGRhdGVGb3JtdWxhQ2hhaW4oeCwgeSwgcmVjb3Jkcyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgLy8gb2JqLmNsb3NlRWRpdG9yKGNlbGwsIHRydWUpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBVcGRhdGUgaGlzdG9yeVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9iai5zZXRIaXN0b3J5KHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgYWN0aW9uOiAnc2V0VmFsdWUnLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICByZWNvcmRzOiByZWNvcmRzLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBzZWxlY3Rpb246IG9iai5zZWxlY3RlZENlbGwsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIFVwZGF0ZSB0YWJsZSB3aXRoIGN1c3RvbSBjb25maWd1cmF0aW9uIGlmIGFwcGxpY2FibGVcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBvYmoudXBkYXRlVGFibGUoKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH07XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBDdXJyZW50IHZhbHVlXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBqU3VpdGVzLmNhbGVuZGFyKGVkaXRvciwgb2JqLm9wdGlvbnMuY29sdW1uc1t4XS5vcHRpb25zKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIEZvY3VzIG9uIGVkaXRvclxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgZWRpdG9yLmZvY3VzKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKG9iai5vcHRpb25zLmNvbHVtbnNbeF0udHlwZSA9PT0gJ2N1c3RvbScgJiYgdHlwZW9mIG9iai5vcHRpb25zLmNvbHVtbnNbeF0uZWRpdG9yLnRpbnltY2VJbml0ID09PSAnZnVuY3Rpb24nKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaXRlbXMucHVzaCh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlOiBfZi50ZXh0KCdFZGl0IG11bHRpcGxlIGNlbGxzJyksXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9uY2xpY2soKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKCcudmktdWkubW9kYWwnKS5tb2RhbCgnc2hvdycpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKHRpbnltY2UuZ2V0KCd2aS13cGJ1bGt5LXRleHQtZWRpdG9yJykgPT09IG51bGwpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB3cC5lZGl0b3IuaW5pdGlhbGl6ZSgndmktd3BidWxreS10ZXh0LWVkaXRvcicsIEF0dHJpYnV0ZXMudGlueU1jZU9wdGlvbnMpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aW55bWNlLmdldCgndmktd3BidWxreS10ZXh0LWVkaXRvcicpLnNldENvbnRlbnQoJycpXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJCgnLnZpLXdwYnVsa3ktdGV4dC1lZGl0b3Itc2F2ZScpLm9mZignY2xpY2snKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbGV0IGNvbnRlbnQgPSB3cC5lZGl0b3IuZ2V0Q29udGVudCgndmktd3BidWxreS10ZXh0LWVkaXRvcicpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHNldFZhbHVlVG9DZWxsKG9iaiwgY29udGVudCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKCQodGhpcykuaGFzQ2xhc3MoJ3ZpLXdwYnVsa3ktY2xvc2UnKSkgJCgnLnZpLXVpLm1vZGFsJykubW9kYWwoJ2hpZGUnKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGxldCBwaWQgPSBudWxsO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmICh0eXBlb2YgeSA9PT0gJ29iamVjdCcpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBsZXQgeSA9IHkuZ2V0QXR0cmlidXRlKCdkYXRhLXknKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBwaWQgPSBvYmoub3B0aW9ucy5kYXRhW3ldWzFdO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBwaWQgPSAgb2JqLm9wdGlvbnMuZGF0YVt5XVsxXTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW1zLnB1c2goe3R5cGU6ICdsaW5lJ30pO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW1zLnB1c2goe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlOiBfZi50ZXh0KCdSZXBseScgKSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBvbmNsaWNrKCkge1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJCgnLnZpLXVpLm1vZGFsJykubW9kYWwoJ3Nob3cnKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKHRpbnltY2UuZ2V0KCd2aS13cGJ1bGt5LXRleHQtZWRpdG9yJykgPT09IG51bGwpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHdwLmVkaXRvci5pbml0aWFsaXplKCd2aS13cGJ1bGt5LXRleHQtZWRpdG9yJywgQXR0cmlidXRlcy50aW55TWNlT3B0aW9ucyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aW55bWNlLmdldCgndmktd3BidWxreS10ZXh0LWVkaXRvcicpLnNldENvbnRlbnQoJycpXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICQoJy52aS13cGJ1bGt5LXRleHQtZWRpdG9yLXNhdmUnKS5vZmYoJ2NsaWNrJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbGV0IGNvbnRlbnQgPSB3cC5lZGl0b3IuZ2V0Q29udGVudCgndmktd3BidWxreS10ZXh0LWVkaXRvcicpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbGV0IGggPSBvYmouc2VsZWN0ZWRDb250YWluZXIsIHN0YXJ0ID0gaFsxXSwgZW5kID0gaFszXSwgeCA9IGhbMF07XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBsZXQgbmV3X2NvbW1lbnRzID0gW107XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgZm9yIChsZXQgeSA9IHN0YXJ0OyB5IDw9IGVuZDsgeSsrKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbmV3X2NvbW1lbnRzLnB1c2goIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29tbWVudF9pZCA6IF9mLmdldERhdGFGcm9tQ2VsbChvYmosIG9iai5yZWNvcmRzW3ldWzBdKSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgcG9zdF9pZCA6IF9mLmdldERhdGFGcm9tQ2VsbChvYmosIG9iai5yZWNvcmRzW3ldWzFdKSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9ICk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMuYWRkTmV3UmVwbHkoIGNvbnRlbnQsIG5ld19jb21tZW50cyApO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKCQodGhpcykuaGFzQ2xhc3MoJ3ZpLXdwYnVsa3ktY2xvc2UnKSkgJCgnLnZpLXVpLm1vZGFsJykubW9kYWwoJ2hpZGUnKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKGNlbGxzWzFdID09PSBjZWxsc1szXSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW1zLnB1c2goe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aXRsZTogX2YudGV4dCgnVmlldyBwb3N0JyksXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9uY2xpY2soKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB3aW5kb3cub3BlbihgJHtBdHRyaWJ1dGVzLmZyb250ZW5kVXJsfT9wPSR7cGlkfSZwcmV2aWV3PXRydWVgLCAnX2JsYW5rJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICByZXR1cm4gaXRlbXM7XHJcbiAgICAgICAgICAgICAgICAgICAgfTtcclxuICAgICAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICAgICAgICAgIGRlZmF1bHQ6XHJcbiAgICAgICAgICAgICAgICAgICAgY29udGV4dE1lbnVJdGVtcyA9ICBmdW5jdGlvbiAoaXRlbXMsIG9iaiwgeCwgeSwgZSkge1xyXG4gICAgICAgICAgICAgICAgICAgIGxldCBjZWxscyA9IG9iai5zZWxlY3RlZENvbnRhaW5lcjtcclxuICAgICAgICAgICAgICAgICAgICB4ID0gcGFyc2VJbnQoeCk7XHJcbiAgICAgICAgICAgICAgICAgICAgeSA9IHBhcnNlSW50KHkpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICBpZiAoY2VsbHNbMF0gPT09IGNlbGxzWzJdKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmICh4KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAob2JqLm9wdGlvbnMuY29sdW1uc1t4XS50eXBlID09PSAnY2hlY2tib3gnKSB7XHJcblxyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpdGVtcy5wdXNoKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdGl0bGU6IF9mLnRleHQoJ0NoZWNrJyksXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9uY2xpY2soZSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgc2V0VmFsdWVUb0NlbGwob2JqLHRydWUpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW1zLnB1c2goe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aXRsZTogX2YudGV4dCgnVW5jaGVjaycpLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBvbmNsaWNrKGUpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHNldFZhbHVlVG9DZWxsKG9iaixmYWxzZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAob2JqLm9wdGlvbnMuY29sdW1uc1t4XS50eXBlID09PSAnbnVtZXJpYycpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpdGVtcy5wdXNoKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdGl0bGU6IF9mLnRleHQoJ0NhbGN1bGF0b3InKSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgb25jbGljayhlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBuZXcgQ2FsY3VsYXRvcihvYmosIHgsIHksIGUpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKG9iai5vcHRpb25zLmNvbHVtbnNbeF0udHlwZSA9PT0gJ3RleHQnKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaXRlbXMucHVzaCh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlOiBfZi50ZXh0KCdFZGl0IG11bHRpcGxlIGNlbGxzJyksXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9uY2xpY2soZSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbmV3IFRleHRNdWx0aUNlbGxzRWRpdChvYmosIHgsIHksIGUpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW1zLnB1c2goe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aXRsZTogX2YudGV4dCgnRmluZCBhbmQgUmVwbGFjZScpLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBvbmNsaWNrKGUpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG5ldyBGaW5kQW5kUmVwbGFjZShvYmosIHgsIHksIGUpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKG9iai5vcHRpb25zLmNvbHVtbnNbeF0udHlwZSA9PT0gJ2N1c3RvbScgJiYgdHlwZW9mIG9iai5vcHRpb25zLmNvbHVtbnNbeF0uZWRpdG9yLnRpbnltY2VJbml0ID09PSAnZnVuY3Rpb24nKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaXRlbXMucHVzaCh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlOiBfZi50ZXh0KCdFZGl0IG11bHRpcGxlIGNlbGxzJyksXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9uY2xpY2soKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKCcudmktdWkubW9kYWwnKS5tb2RhbCgnc2hvdycpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKHRpbnltY2UuZ2V0KCd2aS13cGJ1bGt5LXRleHQtZWRpdG9yJykgPT09IG51bGwpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB3cC5lZGl0b3IuaW5pdGlhbGl6ZSgndmktd3BidWxreS10ZXh0LWVkaXRvcicsIEF0dHJpYnV0ZXMudGlueU1jZU9wdGlvbnMpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aW55bWNlLmdldCgndmktd3BidWxreS10ZXh0LWVkaXRvcicpLnNldENvbnRlbnQoJycpXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJCgnLnZpLXdwYnVsa3ktdGV4dC1lZGl0b3Itc2F2ZScpLm9mZignY2xpY2snKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbGV0IGNvbnRlbnQgPSB3cC5lZGl0b3IuZ2V0Q29udGVudCgndmktd3BidWxreS10ZXh0LWVkaXRvcicpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHNldFZhbHVlVG9DZWxsKG9iaiwgY29udGVudCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKCQodGhpcykuaGFzQ2xhc3MoJ3ZpLXdwYnVsa3ktY2xvc2UnKSkgJCgnLnZpLXVpLm1vZGFsJykubW9kYWwoJ2hpZGUnKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgICAgICBpZiAoaXRlbXMubGVuZ3RoKSBpdGVtcy5wdXNoKHt0eXBlOiAnbGluZSd9KTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHggIT09IG51bGwgJiYgeSAhPT0gbnVsbCAmJiBjZWxsc1swXSA9PT0gY2VsbHNbMl0gJiYgY2VsbHNbMV0gPT09IGNlbGxzWzNdKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGxldCBwaWQgPSBfZi5nZXRQb3N0SWRPZkNlbGwob2JqLCB5KTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW1zLnB1c2goe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGl0bGU6IF9mLnRleHQoJ0R1cGxpY2F0ZScpLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgb25jbGljaygpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBfZi5hamF4KHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgZGF0YToge3N1Yl9hY3Rpb246ICdkdXBsaWNhdGVfcG9zdCcsIHBvc3RfaWQ6IHBpZH0sXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGJlZm9yZVNlbmQoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBfZi5sb2FkaW5nKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHN1Y2Nlc3MocmVzKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAocmVzLmRhdGEubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgcmVzLmRhdGEuZm9yRWFjaChmdW5jdGlvbiAoaXRlbSwgaSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBvYmouaW5zZXJ0Um93KDAsIHkgKyBpLCB0cnVlLCB0cnVlKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgb2JqLnNldFJvd0RhdGEoeSArIGksIGl0ZW0sIHRydWUpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBfZi5yZW1vdmVMb2FkaW5nKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICBpdGVtcy5wdXNoKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlOiBfZi50ZXh0KCdHbyB0byBlZGl0IHBhZ2UnKSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9uY2xpY2soKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgd2luZG93Lm9wZW4oYCR7QXR0cmlidXRlcy5hZG1pblVybH1wb3N0LnBocD9wb3N0PSR7cGlkfSZhY3Rpb249ZWRpdGAsICdfYmxhbmsnKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICBpdGVtcy5wdXNoKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlOiBfZi50ZXh0KCdQcmV2aWV3JyksXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBvbmNsaWNrKCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHdpbmRvdy5vcGVuKGAke0F0dHJpYnV0ZXMuZnJvbnRlbmRVcmx9P3A9JHtwaWR9JnByZXZpZXc9dHJ1ZWAsICdfYmxhbmsnKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAoaXRlbXMubGVuZ3RoKSBpdGVtcy5wdXNoKHt0eXBlOiAnbGluZSd9KTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIHJldHVybiBpdGVtcztcclxuICAgICAgICAgICAgICAgIH07XHJcblxyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAvLyBjb25zb2xlLmxvZyhBdHRyaWJ1dGVzLmNvbHVtbnMpO2RlYnVnZ2VyO1xyXG5cclxuICAgICAgICAgICAgdGhpcy5Xb3JrQm9vayA9ICQoJyN2aS13cGJ1bGt5LXNwcmVhZHNoZWV0JykuamV4Y2VsKHtcclxuICAgICAgICAgICAgICAgIGFsbG93SW5zZXJ0Um93OiBmYWxzZSxcclxuICAgICAgICAgICAgICAgIGFsbG93SW5zZXJ0Q29sdW1uOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgIGFib3V0OiBmYWxzZSxcclxuICAgICAgICAgICAgICAgIGZyZWV6ZUNvbHVtbnM6IDMsXHJcbiAgICAgICAgICAgICAgICB0YWJsZU92ZXJmbG93OiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgdGFibGVXaWR0aDogJzEwMCUnLFxyXG4gICAgICAgICAgICAgICAgdGFibGVIZWlnaHQ6ICcxMDAlJyxcclxuICAgICAgICAgICAgICAgIGNvbHVtbnM6IEF0dHJpYnV0ZXMuY29sdW1ucyxcclxuICAgICAgICAgICAgICAgIHN0cmlwSFRNTDogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICBhbGxvd0V4cG9ydDogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICBhbGxvd0RlbGV0ZUNvbHVtbjogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICBhbGxvd1JlbmFtZUNvbHVtbjogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICBhdXRvSW5jcmVtZW50OiBmYWxzZSxcclxuICAgICAgICAgICAgICAgIGFsbG93WENvcHk6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgbGF6eUxvYWRpbmc6IHRydWUsXHJcbiAgICAgICAgICAgICAgICBsb2FkaW5nU3BpbjogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIGZ1bGxzY3JlZW46IHRydWUsXHJcbiAgICAgICAgICAgICAgICB0ZXh0OiB7ZGVsZXRlU2VsZWN0ZWRSb3dzOiBgJHtfZi50ZXh0KCdEZWxldGUgc2VsZWN0ZWQgcm93cycpfWB9LFxyXG4gICAgICAgICAgICAgICAgY29udGV4dE1lbnVJdGVtcyxcclxuICAgICAgICAgICAgICAgIG9ucmVzaXplY29sdW1uLFxyXG5cclxuICAgICAgICAgICAgICAgIG9uY2hhbmdlKGluc3RhbmNlLCBjZWxsLCBjb2wsIHJvdywgdmFsdWUsIG9sZFZhbHVlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKEpTT04uc3RyaW5naWZ5KHZhbHVlKSAhPT0gSlNPTi5zdHJpbmdpZnkob2xkVmFsdWUpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICQoY2VsbCkucGFyZW50KCkudHJpZ2dlcignY2VsbG9uY2hhbmdlJywge2NlbGwsIGNvbCwgcm93LCB2YWx1ZX0pO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgbGV0IHBpZCA9IHRoaXMub3B0aW9ucy5kYXRhW3Jvd11bMF07XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICR0aGlzLmNvbXBhcmUucHVzaChwaWQpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAkdGhpcy5jb21wYXJlID0gWy4uLm5ldyBTZXQoJHRoaXMuY29tcGFyZSldO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAkdGhpcy5tZW51YmFyLmZpbmQoJy52aS13cGJ1bGt5LXNhdmUtYnV0dG9uJykuYWRkQ2xhc3MoJ3ZpLXdwYnVsa3ktc2F2ZWFibGUnKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8vIGlmICghJHRoaXMuc2lkZWJhci5yZXZpc2lvbltwaWRdKSAkdGhpcy5zaWRlYmFyLnJldmlzaW9uW3BpZF0gPSB7fTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgLy8gbGV0IGNvbHVtblR5cGUgPSBfZi5nZXRDb2x1bW5UeXBlKGNvbCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8vICR0aGlzLnNpZGViYXIucmV2aXNpb25bcGlkXVtjb2x1bW5UeXBlXSA9IG9sZFZhbHVlO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAoISR0aGlzLnJldmlzaW9uW3BpZF0pICR0aGlzLnJldmlzaW9uW3BpZF0gPSB7fTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgbGV0IGNvbHVtblR5cGUgPSBfZi5nZXRDb2x1bW5UeXBlKGNvbCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICR0aGlzLnJldmlzaW9uW3BpZF1bY29sdW1uVHlwZV0gPSBvbGRWYWx1ZTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9LFxyXG5cclxuICAgICAgICAgICAgICAgIG9uYmVmb3JlY2hhbmdlKGluc3RhbmNlLCBjZWxsLCBjb2wsIHJvdywgdmFsdWUpIHtcclxuICAgICAgICAgICAgICAgICAgICBpZiAodHlwZW9mIHZhbHVlICE9PSAnb2JqZWN0Jykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZSA9IERPTVB1cmlmeS5zYW5pdGl6ZSh2YWx1ZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIHJldHVybiB2YWx1ZTtcclxuICAgICAgICAgICAgICAgIH0sXHJcblxyXG4gICAgICAgICAgICAgICAgb25kZWxldGVyb3coZWwsIHJvd051bWJlciwgbnVtT2ZSb3dzLCByb3dSZWNvcmRzKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgZm9yIChsZXQgcm93IG9mIHJvd1JlY29yZHMpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMudHJhc2gucHVzaChyb3dbMF0uaW5uZXJUZXh0KTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKCR0aGlzLnRyYXNoLmxlbmd0aCkgJHRoaXMubWVudWJhci5maW5kKCcudmktd3BidWxreS1zYXZlLWJ1dHRvbicpLmFkZENsYXNzKCd2aS13cGJ1bGt5LXNhdmVhYmxlJyk7XHJcbiAgICAgICAgICAgICAgICB9LFxyXG5cclxuICAgICAgICAgICAgICAgIG9udW5kbyhlbCwgaGlzdG9yeVJlY29yZCkge1xyXG4gICAgICAgICAgICAgICAgICAgIGlmIChoaXN0b3J5UmVjb3JkICYmIGhpc3RvcnlSZWNvcmQuYWN0aW9uID09PSAnZGVsZXRlUm93Jykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBmb3IgKGxldCByb3cgb2YgaGlzdG9yeVJlY29yZC5yb3dEYXRhKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAkdGhpcy51blRyYXNoLnB1c2gocm93WzBdKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH0sXHJcblxyXG4gICAgICAgICAgICAgICAgb25zZWxlY3Rpb24oZWwsIHgxLCB5MSwgeDIsIHkyLCBvcmlnaW4pIHtcclxuICAgICAgICAgICAgICAgICAgICBpZiAoeDEgPT09IHgyICYmIHkxID09PSB5Mikge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBsZXQgY2VsbCA9IHRoaXMuZ2V0Q2VsbEZyb21Db29yZHMoeDEsIHkxKSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNoaWxkID0gJChjZWxsKS5jaGlsZHJlbigpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKGNoaWxkLmxlbmd0aCAmJiBjaGlsZC5oYXNDbGFzcygndmktd3BidWxreS1nYWxsZXJ5LWhhcy1pdGVtJykpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGxldCBpZHMgPSB0aGlzLm9wdGlvbnMuZGF0YVt5MV1beDFdLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGltYWdlcyA9ICcnO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmIChpZHMubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgZm9yIChsZXQgaWQgb2YgaWRzKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGxldCBzcmMgPSBBdHRyaWJ1dGVzLmltZ1N0b3JhZ2VbaWRdO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpbWFnZXMgKz0gYDxsaSBjbGFzcz1cInZpLXdwYnVsa3ktZ2FsbGVyeS1pbWFnZVwiPjxpbWcgc3JjPVwiJHtzcmN9XCI+PC9saT5gO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBuZXcgUG9wdXAoYDx1bCBjbGFzcz1cInZpLXdwYnVsa3ktZ2FsbGVyeS1pbWFnZXNcIj4ke2ltYWdlc308L3VsPmAsICQoY2VsbCkpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfSxcclxuXHJcbiAgICAgICAgICAgICAgICBvbmJlZm9yZWNvcHkoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgJHRoaXMuZmlyc3RDZWxsQ29weSA9IG51bGw7XHJcbiAgICAgICAgICAgICAgICB9LFxyXG5cclxuICAgICAgICAgICAgICAgIG9uY29weWluZyh2YWx1ZSwgeCwgeSkge1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICghJHRoaXMuZmlyc3RDZWxsQ29weSkgJHRoaXMuZmlyc3RDZWxsQ29weSA9IFt4LCB5XVxyXG4gICAgICAgICAgICAgICAgfSxcclxuXHJcbiAgICAgICAgICAgICAgICBvbmJlZm9yZXBhc3RlKGRhdGEsIHNlbGVjdGVkQ2VsbCkge1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICgkdGhpcy5maXJzdENlbGxDb3B5ICYmIHBhcnNlSW50KCR0aGlzLmZpcnN0Q2VsbENvcHlbMF0pICE9PSBwYXJzZUludChzZWxlY3RlZENlbGxbMF0pKSBkYXRhID0gJyc7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIGRhdGE7XHJcbiAgICAgICAgICAgICAgICB9LFxyXG5cclxuICAgICAgICAgICAgICAgIG9uc2Nyb2xsKGVsKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGV0IHNlbGVjdE9wZW5pbmcgPSAkKGVsKS5maW5kKCdzZWxlY3Quc2VsZWN0Mi1oaWRkZW4tYWNjZXNzaWJsZScpO1xyXG4gICAgICAgICAgICAgICAgICAgIGlmIChzZWxlY3RPcGVuaW5nLmxlbmd0aCkgc2VsZWN0T3BlbmluZy5zZWxlY3QyKCdjbG9zZScpXHJcbiAgICAgICAgICAgICAgICB9LFxyXG5cclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBjbG9zZU1lbnUoZSkge1xyXG4gICAgICAgICAgICB0aGlzLnNpZGViYXIuc2lkZWJhci5yZW1vdmVDbGFzcygndmktd3BidWxreS1vcGVuJylcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIG9wZW5NZW51KGUpIHtcclxuICAgICAgICAgICAgbGV0IHRhYiA9ICQoZS5jdXJyZW50VGFyZ2V0KS5kYXRhKCdtZW51X3RhYicpO1xyXG4gICAgICAgICAgICBsZXQgY3VycmVudFRhYiA9IHRoaXMuc2lkZWJhci5zaWRlYmFyLmZpbmQoYGEuaXRlbVtkYXRhLXRhYj0nJHt0YWJ9J11gKTtcclxuICAgICAgICAgICAgaWYgKGN1cnJlbnRUYWIuaGFzQ2xhc3MoJ2FjdGl2ZScpICYmIHRoaXMuc2lkZWJhci5zaWRlYmFyLmhhc0NsYXNzKCd2aS13cGJ1bGt5LW9wZW4nKSkge1xyXG4gICAgICAgICAgICAgICAgdGhpcy5zaWRlYmFyLnNpZGViYXIucmVtb3ZlQ2xhc3MoJ3ZpLXdwYnVsa3ktb3BlbicpO1xyXG4gICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgdGhpcy5zaWRlYmFyLnNpZGViYXIuYWRkQ2xhc3MoJ3ZpLXdwYnVsa3ktb3BlbicpO1xyXG4gICAgICAgICAgICAgICAgY3VycmVudFRhYi50cmlnZ2VyKCdjbGljaycpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBhZGROZXdQb3N0KCkge1xyXG4gICAgICAgICAgICBpZiAoX2YuaXNfbG9hZGluZygpKSByZXR1cm47XHJcbiAgICAgICAgICAgIGlmIChBdHRyaWJ1dGVzLnBvc3RUeXBlID09PSAnYXR0YWNobWVudCcpe1xyXG4gICAgICAgICAgICAgICAgaWYgKCFBdHRyaWJ1dGVzPy5hZGRfYXR0YWNobWVudF9mcmFtZSl7XHJcbiAgICAgICAgICAgICAgICAgICAgbGV0IGZyYW1lID0gd3AubWVkaWEoe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBtdWx0aXBsZTogZmFsc2UsICAvLyBTZXQgdG8gdHJ1ZSB0byBhbGxvdyBtdWx0aXBsZSBmaWxlcyB0byBiZSBzZWxlY3RlZFxyXG4gICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgICAgIGZyYW1lLm9uKCdzZWxlY3QnLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8vIEdldCBtZWRpYSBhdHRhY2htZW50IGRldGFpbHMgZnJvbSB0aGUgZnJhbWUgc3RhdGVcclxuICAgICAgICAgICAgICAgICAgICAgICAgbGV0IGF0dGFjaG1lbnQgPSBmcmFtZS5zdGF0ZSgpLmdldCgnc2VsZWN0aW9uJykuZmlyc3QoKS50b0pTT04oKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgbGV0IGlkID0gYXR0YWNobWVudD8uaWQsIGNyZWF0ZV90aW1lID0gYXR0YWNobWVudD8uZGF0ZTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKGlkICYmIGNyZWF0ZV90aW1lICYmIEF0dHJpYnV0ZXMuYWRkX2F0dGFjaG1lbnRfY3JlYXRlX3RpbWUgJiYgQXR0cmlidXRlcy5hZGRfYXR0YWNobWVudF9jcmVhdGVfdGltZSA8IGNyZWF0ZV90aW1lKXtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICQoJy52aS13cGJ1bGt5LWdldC1wb3N0JykudHJpZ2dlcignY2xpY2snKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgICAgIEF0dHJpYnV0ZXMuYWRkX2F0dGFjaG1lbnRfZnJhbWUgPSBmcmFtZTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIEF0dHJpYnV0ZXMuYWRkX2F0dGFjaG1lbnRfY3JlYXRlX3RpbWUgPSBuZXcgRGF0ZSgpLmdldFRpbWUoKTtcclxuICAgICAgICAgICAgICAgIEF0dHJpYnV0ZXMuYWRkX2F0dGFjaG1lbnRfZnJhbWUub3BlbigpO1xyXG4gICAgICAgICAgICAgICAgcmV0dXJuO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIGxldCBwb3N0TmFtZSA9IHByb21wdChfZi50ZXh0KCdQbGVhc2UgZW50ZXIgbmV3IHBvc3QgbmFtZScpKTtcclxuXHJcbiAgICAgICAgICAgIGlmIChwb3N0TmFtZSkge1xyXG4gICAgICAgICAgICAgICAgbGV0ICR0aGlzID0gdGhpcztcclxuICAgICAgICAgICAgICAgIF9mLmFqYXgoe1xyXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IHtzdWJfYWN0aW9uOiAnYWRkX25ld19wb3N0JywgcG9zdF9uYW1lOiBwb3N0TmFtZX0sXHJcbiAgICAgICAgICAgICAgICAgICAgYmVmb3JlU2VuZCgpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgX2YubG9hZGluZygpO1xyXG4gICAgICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICAgICAgc3VjY2VzcyhyZXMpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMuV29ya0Jvb2suaW5zZXJ0Um93KDAsIDAsIHRydWUsIHRydWUpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAkdGhpcy5Xb3JrQm9vay5zZXRSb3dEYXRhKDAsIHJlcy5kYXRhLCB0cnVlKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgX2YucmVtb3ZlTG9hZGluZygpO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH0pXHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGFkZE5ld1JlcGx5KCBjb250ZW50LCBuZXdfY29tbWVudHMgKSB7XHJcbiAgICAgICAgICAgIGlmIChfZi5pc19sb2FkaW5nKCkpIHJldHVybjtcclxuXHJcbiAgICAgICAgICAgIGxldCAkdGhpcyA9IHRoaXM7XHJcbiAgICAgICAgICAgIF9mLmFqYXgoe1xyXG4gICAgICAgICAgICAgICAgZGF0YToge3N1Yl9hY3Rpb246ICdhZGRfbmV3X3JlcGx5JywgY29udGVudCwgbmV3X2NvbW1lbnRzIH0sXHJcbiAgICAgICAgICAgICAgICBiZWZvcmVTZW5kKCkge1xyXG4gICAgICAgICAgICAgICAgICAgIF9mLmxvYWRpbmcoKTtcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBzdWNjZXNzKHJlcykge1xyXG4gICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlcy5kYXRhKTtcclxuICAgICAgICAgICAgICAgICAgICAkdGhpcy5pc0FkZGluZyA9IGZhbHNlO1xyXG4gICAgICAgICAgICAgICAgICAgIF9mLnJlbW92ZUxvYWRpbmcoKTtcclxuICAgICAgICAgICAgICAgICAgICAkdGhpcy5yZWxvYWRDdXJyZW50UGFnZSgpO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIGVycm9yKHJlcykge1xyXG4gICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlcyk7XHJcbiAgICAgICAgICAgICAgICAgICAgYWxlcnQocmVzLnN0YXR1c1RleHQgKyByZXMucmVzcG9uc2VUZXh0KTtcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBjb21wbGV0ZSgpIHtcclxuICAgICAgICAgICAgICAgICAgICAkdGhpcy5pc0FkZGluZyA9IGZhbHNlO1xyXG4gICAgICAgICAgICAgICAgICAgIF9mLnJlbW92ZUxvYWRpbmcoKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSlcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIHRvZ2dsZUZ1bGxTY3JlZW4oZSkge1xyXG4gICAgICAgICAgICBsZXQgYm9keSA9ICQoJy53cC1hZG1pbicpLCBzY3JlZW5CdG4gPSAkKGUuY3VycmVudFRhcmdldCk7XHJcbiAgICAgICAgICAgIGJvZHkudG9nZ2xlQ2xhc3MoJ3ZpLXdwYnVsa3ktZnVsbC1zY3JlZW4nKTtcclxuXHJcbiAgICAgICAgICAgIGlmIChib2R5Lmhhc0NsYXNzKCd2aS13cGJ1bGt5LWZ1bGwtc2NyZWVuJykpIHtcclxuICAgICAgICAgICAgICAgIHNjcmVlbkJ0bi5maW5kKCdpLmljb24nKS5yZW1vdmVDbGFzcygnZXh0ZXJuYWwgYWx0ZXJuYXRlJykuYWRkQ2xhc3MoJ3dpbmRvdyBjbG9zZSBvdXRsaW5lJyk7XHJcbiAgICAgICAgICAgICAgICBzY3JlZW5CdG4uYXR0cigndGl0bGUnLCAnRXhpdCBmdWxsIHNjcmVlbicpO1xyXG4gICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgc2NyZWVuQnRuLmZpbmQoJ2kuaWNvbicpLnJlbW92ZUNsYXNzKCd3aW5kb3cgY2xvc2Ugb3V0bGluZScpLmFkZENsYXNzKCdleHRlcm5hbCBhbHRlcm5hdGUnKTtcclxuICAgICAgICAgICAgICAgIHNjcmVlbkJ0bi5hdHRyKCd0aXRsZScsICdGdWxsIHNjcmVlbicpO1xyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAkLmFqYXgoe1xyXG4gICAgICAgICAgICAgICAgdXJsOiBBdHRyaWJ1dGVzLmFqYXhVcmwsXHJcbiAgICAgICAgICAgICAgICB0eXBlOiAncG9zdCcsXHJcbiAgICAgICAgICAgICAgICBkYXRhVHlwZTogJ2pzb24nLFxyXG4gICAgICAgICAgICAgICAgZGF0YToge1xyXG4gICAgICAgICAgICAgICAgICAgIC4uLkF0dHJpYnV0ZXMuYWpheERhdGEsXHJcbiAgICAgICAgICAgICAgICAgICAgc3ViX2FjdGlvbjogJ3NldF9mdWxsX3NjcmVlbl9vcHRpb24nLFxyXG4gICAgICAgICAgICAgICAgICAgIHN0YXR1czogYm9keS5oYXNDbGFzcygndmktd3BidWxreS1mdWxsLXNjcmVlbicpXHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgZ2V0QWxsUm93cygpIHtcclxuICAgICAgICAgICAgcmV0dXJuIHRoaXMuV29ya0Jvb2suZ2V0RGF0YShmYWxzZSwgdHJ1ZSk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBzYXZlKCkge1xyXG4gICAgICAgICAgICBsZXQgJHRoaXMgPSB0aGlzLFxyXG4gICAgICAgICAgICAgICAgcG9zdHMgPSB0aGlzLmdldEFsbFJvd3MoKSxcclxuICAgICAgICAgICAgICAgIHBvc3RzRm9yU2F2ZSA9IFtdO1xyXG5cclxuICAgICAgICAgICAgZm9yIChsZXQgcGlkIG9mIHRoaXMuY29tcGFyZSkge1xyXG4gICAgICAgICAgICAgICAgZm9yIChsZXQgcG9zdCBvZiBwb3N0cykge1xyXG4gICAgICAgICAgICAgICAgICAgIGlmIChwYXJzZUludChwb3N0WzBdKSA9PT0gcGFyc2VJbnQocGlkKSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBwb3N0c0ZvclNhdmUucHVzaChwb3N0KTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIGlmIChfZi5pc19sb2FkaW5nKCkpIHJldHVybjtcclxuXHJcbiAgICAgICAgICAgIGZ1bmN0aW9uIHNhdmVTdGVwKHN0ZXAgPSAwKSB7XHJcbiAgICAgICAgICAgICAgICBsZXQgcmFuZ2UgPSAyMCxcclxuICAgICAgICAgICAgICAgICAgICBzdGFydCA9IHN0ZXAgKiByYW5nZSxcclxuICAgICAgICAgICAgICAgICAgICBlbmQgPSBzdGFydCArIHJhbmdlLFxyXG4gICAgICAgICAgICAgICAgICAgIHBvc3RzID0gcG9zdHNGb3JTYXZlLnNsaWNlKHN0YXJ0LCBlbmQpLFxyXG4gICAgICAgICAgICAgICAgICAgIGxhc3RTdGVwID0gc3RlcCAqIHJhbmdlID49IHBvc3RzRm9yU2F2ZS5sZW5ndGg7XHJcblxyXG4gICAgICAgICAgICAgICAgaWYgKCBwb3N0cy5sZW5ndGggPT09IDAgJiYgJHRoaXMudHJhc2gubGVuZ3RoID09PSAwICYmICR0aGlzLnVuVHJhc2gubGVuZ3RoID09PSAwICYmIHN0ZXAgPT09IDAgKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgX2Yubm90aWNlKF9mLnRleHQoJ05vdGhpbmcgY2hhbmdlIHRvIHNhdmUnKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuO1xyXG4gICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgIGlmIChsYXN0U3RlcCAmJiBzdGVwID4gMCkge1xyXG4gICAgICAgICAgICAgICAgICAgIGxldCBoaXN0b3JpZXMgPSAkdGhpcy5Xb3JrQm9vay5oaXN0b3J5O1xyXG4gICAgICAgICAgICAgICAgICAgIGlmIChoaXN0b3JpZXMubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGZvciAobGV0IGhpc3Rvcnkgb2YgaGlzdG9yaWVzKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAoaGlzdG9yeS5hY3Rpb24gIT09ICdkZWxldGVSb3cnKSBjb250aW51ZTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBsZXQgaUZvckRlbCA9IFtdO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGZvciAobGV0IGkgaW4gaGlzdG9yeS5yb3dEYXRhKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKGhpc3Rvcnkucm93RGF0YVtpXVsxXSA+IDApIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaUZvckRlbC5wdXNoKHBhcnNlSW50KGkpKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKGlGb3JEZWwubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaGlzdG9yeS5yb3dEYXRhID0gaGlzdG9yeS5yb3dEYXRhLmZpbHRlcigoaXRlbSwgaSkgPT4gIWlGb3JEZWwuaW5jbHVkZXMoaSkpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGhpc3Rvcnkucm93Tm9kZSA9IGhpc3Rvcnkucm93Tm9kZS5maWx0ZXIoKGl0ZW0sIGkpID0+ICFpRm9yRGVsLmluY2x1ZGVzKGkpKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBoaXN0b3J5LnJvd1JlY29yZHMgPSBoaXN0b3J5LnJvd1JlY29yZHMuZmlsdGVyKChpdGVtLCBpKSA9PiAhaUZvckRlbC5pbmNsdWRlcyhpKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaGlzdG9yeS5udW1PZlJvd3MgPSBoaXN0b3J5Lm51bU9mUm93cyAtIGlGb3JEZWwubGVuZ3RoO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgICAgICAkdGhpcy5zYXZlUmV2aXNpb24oKTtcclxuICAgICAgICAgICAgICAgICAgICBfZi5zaG93TWVzc2FnZSgge3RpdGxlOlwiU3VjY2Vzc1wiLCBtZXNzYWdlOiAnU2F2ZWQgc3VjY2Vzc2Z1bGx5JywgdHlwZTogXCJwb3NpdGl2ZVwiLCBkdXJhdGlvbjogMzAwMH0gKTtcclxuICAgICAgICAgICAgICAgICAgICByZXR1cm47XHJcbiAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgbGV0IGFjdGlvbiA9IHdwYnVsa3lQYXJhbXMucG9zdFR5cGUgPT09J2NvbW1lbnQnID8gJ3NhdmVfY29tbWVudHMnIDogJ3NhdmVfcG9zdHMnO1xyXG5cclxuICAgICAgICAgICAgICAgIF9mLmFqYXgoe1xyXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgc3ViX2FjdGlvbjogYWN0aW9uLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBwb3N0czogSlNPTi5zdHJpbmdpZnkocG9zdHMpLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICB0cmFzaDogJHRoaXMudHJhc2gsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHVudHJhc2g6ICR0aGlzLnVuVHJhc2gsXHJcbiAgICAgICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgICAgICBiZWZvcmVTZW5kKCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBfZi5sb2FkaW5nKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgICAgICBzdWNjZXNzKHJlcykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAkdGhpcy50cmFzaCA9IFtdO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAkdGhpcy51blRyYXNoID0gW107XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICR0aGlzLmNvbXBhcmUgPSBbXTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMubWVudWJhci5maW5kKCcudmktd3BidWxreS1zYXZlLWJ1dHRvbicpLnJlbW92ZUNsYXNzKCd2aS13cGJ1bGt5LXNhdmVhYmxlJyk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICBfZi5yZW1vdmVMb2FkaW5nKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHNhdmVTdGVwKHN0ZXAgKyAxKTtcclxuICAgICAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgICAgIGVycm9yKHJlcykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBfZi5zaG93TWVzc2FnZSgge3RpdGxlOlwiRXJyb3JcIiwgbWVzc2FnZTogcmVzLnN0YXR1c1RleHQgKyByZXMucmVzcG9uc2VUZXh0LCB0eXBlOiBcIm5lZ2F0aXZlXCIsIGR1cmF0aW9uOiAzMDAwfSApO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhyZXMpXHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIHNhdmVTdGVwKCk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBsb2FkUG9zdHMocGFnZSA9IDEsIHJlQ3JlYXRlID0gZmFsc2UpIHtcclxuICAgICAgICAgICAgbGV0ICR0aGlzID0gdGhpcztcclxuXHJcbiAgICAgICAgICAgIGlmIChfZi5pc19sb2FkaW5nKCkpIHJldHVybjtcclxuXHJcbiAgICAgICAgICAgIF9mLmFqYXgoe1xyXG4gICAgICAgICAgICAgICAgZGF0YToge1xyXG4gICAgICAgICAgICAgICAgICAgIHN1Yl9hY3Rpb246ICdsb2FkX3Bvc3RzJyxcclxuICAgICAgICAgICAgICAgICAgICBwYWdlOiBwYWdlLFxyXG4gICAgICAgICAgICAgICAgICAgIHJlX2NyZWF0ZTogcmVDcmVhdGVcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBiZWZvcmVTZW5kKCkge1xyXG4gICAgICAgICAgICAgICAgICAgIF9mLmxvYWRpbmcoKTtcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBzdWNjZXNzKHJlcykge1xyXG4gICAgICAgICAgICAgICAgICAgIGlmIChyZXMuc3VjY2Vzcykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBBdHRyaWJ1dGVzLmltZ1N0b3JhZ2UgPSByZXMuZGF0YS5pbWdfc3RvcmFnZTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmIChyZUNyZWF0ZSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMuV29ya0Jvb2suZGVzdHJveSgpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgQXR0cmlidXRlcy5zZXRDb2x1bW5zKHJlcy5kYXRhLmNvbHVtbnMpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgQXR0cmlidXRlcy5pZE1hcHBpbmcgPSByZXMuZGF0YS5pZE1hcHBpbmc7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBBdHRyaWJ1dGVzLmlkTWFwcGluZ0ZsaXAgPSByZXMuZGF0YS5pZE1hcHBpbmdGbGlwO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMud29ya0Jvb2tJbml0KCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMuV29ya0Jvb2sub3B0aW9ucy5kYXRhID0gcmVzLmRhdGEucG9zdHM7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICR0aGlzLldvcmtCb29rLnNldERhdGEoKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMucGFnaW5hdGlvbihyZXMuZGF0YS5tYXhfbnVtX3BhZ2VzLCBwYWdlKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMuV29ya0Jvb2sub3JkZXJBZnRlckxvYWQoKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgX2YucmVtb3ZlTG9hZGluZygpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKCFyZXMuZGF0YS5wb3N0cy5sZW5ndGgpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIF9mLm5vdGljZShfZi50ZXh0KCdObyBwb3N0IHdhcyBmb3VuZCcpKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBsb2FkQ29tbWVudHMoIHBhZ2UgPSAxLCByZUNyZWF0ZSA9IGZhbHNlICkge1xyXG4gICAgICAgICAgICBsZXQgJHRoaXMgPSB0aGlzO1xyXG5cclxuICAgICAgICAgICAgaWYgKF9mLmlzX2xvYWRpbmcoKSkgcmV0dXJuO1xyXG5cclxuICAgICAgICAgICAgX2YuYWpheCh7XHJcbiAgICAgICAgICAgICAgICBkYXRhOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgc3ViX2FjdGlvbjogJ2xvYWRfY29tbWVudHMnLFxyXG4gICAgICAgICAgICAgICAgICAgIHBhZ2U6IHBhZ2UsXHJcbiAgICAgICAgICAgICAgICAgICAgcmVfY3JlYXRlOiByZUNyZWF0ZVxyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIGJlZm9yZVNlbmQoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgX2YubG9hZGluZygpO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIHN1Y2Nlc3MocmVzKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHJlcy5zdWNjZXNzKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmIChyZUNyZWF0ZSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMuV29ya0Jvb2suZGVzdHJveSgpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgQXR0cmlidXRlcy5zZXRDb2x1bW5zKHJlcy5kYXRhLmNvbHVtbnMpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgQXR0cmlidXRlcy5pZE1hcHBpbmcgPSByZXMuZGF0YS5pZE1hcHBpbmc7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBBdHRyaWJ1dGVzLmlkTWFwcGluZ0ZsaXAgPSByZXMuZGF0YS5pZE1hcHBpbmdGbGlwO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMud29ya0Jvb2tJbml0KCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMuV29ya0Jvb2sub3B0aW9ucy5kYXRhID0gcmVzLmRhdGEucG9zdHM7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICR0aGlzLldvcmtCb29rLnNldERhdGEoKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMucGFnaW5hdGlvbihyZXMuZGF0YS5tYXhfbnVtX3BhZ2VzLCBwYWdlKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIF9mLnJlbW92ZUxvYWRpbmcoKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmICghcmVzLmRhdGEucG9zdHMubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBfZi5ub3RpY2UoX2YudGV4dCgnTm8gcG9zdCB3YXMgZm91bmQnKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgcGFnaW5hdGlvbihtYXhQYWdlLCBjdXJyZW50UGFnZSkge1xyXG4gICAgICAgICAgICB0aGlzLm1lbnViYXIuZmluZCgnLnZpLXdwYnVsa3ktcGFnaW5hdGlvbicpLmh0bWwoX2YucGFnaW5hdGlvbihtYXhQYWdlLCBjdXJyZW50UGFnZSkpO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgY2hhbmdlUGFnZShlKSB7XHJcbiAgICAgICAgICAgIGxldCBwYWdlID0gcGFyc2VJbnQoJChlLmN1cnJlbnRUYXJnZXQpLmF0dHIoJ2RhdGEtcGFnZScpKTtcclxuICAgICAgICAgICAgaWYgKCQoZS5jdXJyZW50VGFyZ2V0KS5oYXNDbGFzcygnYWN0aXZlJykgfHwgJChlLmN1cnJlbnRUYXJnZXQpLmhhc0NsYXNzKCdkaXNhYmxlZCcpIHx8ICFwYWdlKSByZXR1cm47XHJcbiAgICAgICAgICAgIHRoaXMubG9hZFBvc3RzKHBhZ2UpO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgY2hhbmdlUGFnZUJ5SW5wdXQoZSkge1xyXG4gICAgICAgICAgICBsZXQgcGFnZSA9IHBhcnNlSW50KCQoZS50YXJnZXQpLnZhbCgpKTtcclxuICAgICAgICAgICAgbGV0IG1heCA9IHBhcnNlSW50KCQoZS50YXJnZXQpLmF0dHIoJ21heCcpKTtcclxuXHJcbiAgICAgICAgICAgIGlmIChwYWdlIDw9IG1heCAmJiBwYWdlID4gMCkgdGhpcy5sb2FkUG9zdHMocGFnZSk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICByZWxvYWRDdXJyZW50UGFnZSgpIHtcclxuICAgICAgICAgICAgaWYgKCB3cGJ1bGt5UGFyYW1zLnBvc3RUeXBlID09PSdjb21tZW50JyApIHtcclxuICAgICAgICAgICAgICAgIHRoaXMubG9hZENvbW1lbnRzKHRoaXMuZ2V0Q3VycmVudFBhZ2UoKSk7XHJcbiAgICAgICAgICAgIH1lbHNlIHtcclxuICAgICAgICAgICAgICAgIHRoaXMubG9hZFBvc3RzKHRoaXMuZ2V0Q3VycmVudFBhZ2UoKSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGdldEN1cnJlbnRQYWdlKCkge1xyXG4gICAgICAgICAgICByZXR1cm4gdGhpcy5tZW51YmFyLmZpbmQoJy52aS13cGJ1bGt5LXBhZ2luYXRpb24gLml0ZW0uYWN0aXZlJykuZGF0YSgncGFnZScpIHx8IDE7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBhZnRlckFkZEZpbHRlcihldiwgZGF0YSkge1xyXG4gICAgICAgICAgICBBdHRyaWJ1dGVzLmltZ1N0b3JhZ2UgPSBkYXRhLmltZ19zdG9yYWdlO1xyXG4gICAgICAgICAgICB0aGlzLldvcmtCb29rLm9wdGlvbnMuZGF0YSA9IGRhdGEucG9zdHM7XHJcbiAgICAgICAgICAgIHRoaXMuV29ya0Jvb2suc2V0RGF0YSgpO1xyXG4gICAgICAgICAgICB0aGlzLnBhZ2luYXRpb24oZGF0YS5tYXhfbnVtX3BhZ2VzLCAxKTtcclxuICAgICAgICAgICAgdGhpcy5Xb3JrQm9vay5vcmRlckFmdGVyTG9hZCgpO1xyXG4gICAgICAgICAgICBpZiAoIWRhdGEucG9zdHMubGVuZ3RoKSBfZi5ub3RpY2UoX2YudGV4dCgnTm8gcG9zdCB3YXMgZm91bmQnKSlcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGFmdGVyU2F2ZVNldHRpbmdzKGV2LCBkYXRhKSB7XHJcbiAgICAgICAgICAgIGlmIChkYXRhLmZpZWxkc0NoYW5nZSkge1xyXG4gICAgICAgICAgICAgICAgaWYgKCB3cGJ1bGt5UGFyYW1zLnBvc3RUeXBlID09PSdjb21tZW50JyApIHtcclxuICAgICAgICAgICAgICAgICAgICB0aGlzLmxvYWRDb21tZW50cyh0aGlzLmdldEN1cnJlbnRQYWdlKCksIHRydWUpO1xyXG4gICAgICAgICAgICAgICAgfWVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgIHRoaXMubG9hZFBvc3RzKHRoaXMuZ2V0Q3VycmVudFBhZ2UoKSwgdHJ1ZSk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIHNhdmVSZXZpc2lvbigpIHtcclxuICAgICAgICAgICAgbGV0ICR0aGlzID0gdGhpcztcclxuICAgICAgICAgICAgaWYgKE9iamVjdC5rZXlzKCR0aGlzLnJldmlzaW9uKS5sZW5ndGgpIHtcclxuICAgICAgICAgICAgICAgIGxldCBjdXJyZW50UGFnZSA9ICR0aGlzLnNpZGViYXIuc2lkZWJhci5maW5kKCcudmktd3BidWxreS1wYWdpbmF0aW9uIGEuaXRlbS5hY3RpdmUnKS5kYXRhKCdwYWdlJykgfHwgMTtcclxuXHJcbiAgICAgICAgICAgICAgICBsZXQgYWN0aW9uID0gd3BidWxreVBhcmFtcy5wb3N0VHlwZSA9PT0nY29tbWVudCcgPyAnYXV0b19zYXZlX3JldmlzaW9uX2NvbW1lbnQnIDogJ2F1dG9fc2F2ZV9yZXZpc2lvbic7XHJcblxyXG4gICAgICAgICAgICAgICAgX2YuYWpheCh7XHJcbiAgICAgICAgICAgICAgICAgICAgZGF0YToge3N1Yl9hY3Rpb246IGFjdGlvbiwgZGF0YTogJHRoaXMucmV2aXNpb24sIHBhZ2U6IGN1cnJlbnRQYWdlIHx8IDF9LFxyXG4gICAgICAgICAgICAgICAgICAgIHN1Y2Nlc3MocmVzKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmIChyZXMuc3VjY2Vzcykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKHJlcy5kYXRhLnVwZGF0ZVBhZ2UpICQoJyN2aS13cGJ1bGt5LWhpc3RvcnktcG9pbnRzLWxpc3QgdGJvZHknKS5odG1sKHJlcy5kYXRhLnVwZGF0ZVBhZ2UpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJHRoaXMucmV2aXNpb24gPSB7fTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICR0aGlzLnNpZGViYXIuc2lkZWJhci5maW5kKCcudmktd3BidWxreS1wYWdpbmF0aW9uJykuaHRtbChfZi5wYWdpbmF0aW9uKHJlcy5kYXRhLnBhZ2VzLCBjdXJyZW50UGFnZSkpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICB9XHJcblxyXG4gICAgbmV3IEJ1bGtFZGl0KCk7XHJcblxyXG59KTtcclxuIl0sIm5hbWVzIjpbXSwic291cmNlUm9vdCI6IiJ9
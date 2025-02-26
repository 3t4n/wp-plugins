/**
 * Default PlaceHolder if Custom MetaBox have not this Method
 */
rkns_js.placeholder = function (html = false) {
    return `
<div class="rkns-ph-item">
    <div class="rkns-ph-col-12">
        ${rkns_js.placeholder_content('picture')}
        ${rkns_js.placeholder_content('line')}
    </div>
    ` + (html !== false ? html : '') + `
</div>
`;
};

/**
 * Line Placeholder
 */
rkns_js.line_placeholder = function (number = 1) {
    let html = `<div class="rkns-ph-item">`;
    for (let i = 0; i < number; i++) {
        html += `
                <div class="rkns-ph-col-12">
                   <div class="rkns-ph-row">
                    <div class="rkns-ph-col-6 big"></div>
                    <div class="rkns-ph-col-4 empty big"></div>
                    <div class="rkns-ph-col-4"></div>
                    <div class="rkns-ph-col-8 empty"></div>
                    <div class="rkns-ph-col-6"></div>
                    <div class="rkns-ph-col-6 empty"></div>
                    <div class="rkns-ph-col-12"></div>
                     </div>
                </div>
            `;
    }
    html += `</div>`;
    return html;
};

/**
 * Default Circle PlaceHolder
 */
rkns_js.circle_placeholder = function () {
    return `
<div class="rkns-ph-item">
     ${rkns_js.placeholder_content('circle')}
</div>
`;
};

/**
 * Default Circle PlaceHolder
 */
rkns_js.rectangle_placeholder = function (cls = '') {
    return `
<div class="rkns-ph-item` + (cls.length > 0 ? ' ' + cls : '') + `">
    <div class="rkns-ph-col-12">
        ${rkns_js.placeholder_content('picture')}
    </div>
</div>
`;
};

/**
 * Type Of Place Holder Content
 *
 * @param type
 */
rkns_js.placeholder_content = function (type = 'line') {

    // Create Empty Html
    let html = '';
    switch (type) {
        case "picture": {
            html = `<div class="rkns-ph-picture"></div>`;
            break;
        }
        case "line": {
            html = `<div class="rkns-ph-row">
                    <div class="rkns-ph-col-6 big"></div>
                    <div class="rkns-ph-col-4 empty big"></div>
                    <div class="rkns-ph-col-2 big"></div>
                    <div class="rkns-ph-col-4"></div>
                    <div class="rkns-ph-col-8 empty"></div>
                    <div class="rkns-ph-col-6"></div>
                    <div class="rkns-ph-col-6 empty"></div>
                    <div class="rkns-ph-col-12"></div>
                     </div>`;
            break;
        }
        case "circle": {
            html = `<div class="rkns-ph-col-2"></div>
                    <div class="rkns-ph-col-8">
                        <div class="rkns-ph-avatar"></div>
                    </div>`;
            break;
        }
        default: {
            break;
        }
    }

    return html;
};
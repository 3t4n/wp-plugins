rkns_js.useronline_meta_box = {

    view: function (args = []) {
        let t = '<div class="o-table-wrapper">';
        t += `<table class="o-table o-table--visitors">
        <tr>
            <td>${rkns_js._('page')}</td>
            <td>${rkns_js._('referrer')}</td>`
            + (rkns_js.is_active('geo_ip') ? `<td>${rkns_js._('country')}</td>` : ``) + `
            <td>${rkns_js._('ip')}</td>
        </tr>`;

        args.forEach(function (value) {
            t += `<tr>
            <td><span class="rkns-text-wrap">` + (value['page']['link'].length > 2 ? `<a href="${value['page']['link']}" title="${value['page']['title']}" target="_blank" class="rkns-text-muted is-normal-text">` : ``) + value['page']['title'] + (value['page']['link'].length > 2 ? `</a>` : ``) + `</span></td>
            <td><div class="table-cell-scroller">${value['referred']}</div></td>`
                + (rkns_js.is_active('geo_ip') ? `<td><img src='${value['country']['flag']}' alt='${value['country']['name']}' class='rkns-flag rkns-flag--first'/> ${value['country']['name']}</td>` : ``) + `
            <td><a href='` + (value['hash_ip'] ? '#' : value['ip']['link']) + `'>` + (value['hash_ip'] ? value['hash_ip'] : value['ip']['value']) + `</a></td>
			</tr>`;
        });

        t += `</table></div>`;
        return t;
    }

};

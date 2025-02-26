rkns_js.top_visitors_meta_box = {

    view: function (args = []) {
        let t = '';
        t += `<div class="o-table-wrapper">`;
        t += `<table width="100%" class="o-table o-table--responsive"><tbody>
        <tr>
            <td></td>
            <td class="o-table__td--sm-width">${rkns_js._('hits')}</td>
            ` + (rkns_js.is_active('geo_ip') ? `<td>${rkns_js._('country')}</td>` : ``) + `
            ` + (rkns_js.is_active('geo_city') ? `<td>${rkns_js._('city')}</td>` : ``) + `
            <td>${rkns_js._('ip')}</td>
            <td>${rkns_js._('browser')}</td>
            <td>${rkns_js._('platform')}</td>
            <td>${rkns_js._('version')}</td>
        </tr>`;

        let i = 1;
        args.forEach(function (value) {
            t += `<tr>
            <td class="row-id">${i}</td>
            <td class="o-table__td--sm-width">${value['hits']}</td>
            ` + (rkns_js.is_active('geo_ip') ? `<td><img src='${value['country']['flag']}' alt='${value['country']['name']}' title='${value['country']['name']}' class='log-tools rkns-flag'/> ${value['country']['name']}</td>` : ``) + `
            ` + (rkns_js.is_active('geo_city') ? `<td>${value['city']}</td>` : ``) + `
            <td class="rkns-admin-column__ip">` + (value['hash_ip'] ? value['hash_ip'] : `<a href='${value['ip']['link']}'>${value['ip']['value']}</a>`) + `</td>
            <td><a class="is-normal-text" href="${value['browser']['link']}" title="${value['browser']['name']}"><img src="${value['browser']['logo']}" alt="${value['browser']['name']}" class='rkns-flag log-tools' title='${value['browser']['name']}'/> ${value['browser']['name']}</a></td>
            <td>${value['platform']}</td>
            <td>${value['version']}</td>
			</tr>`;
            i++;
        });

        t += `</tbody></table>`;
        t += `</div>`;
        return t;
    }

};

rkns_js.recent_meta_box = {

    view: function (args = []) {
        let t = '';
        t += `<div class="o-table-wrapper">`;
        t += `<table width="100%" class="o-table o-table--visitors"><thead>
        <tr>
            <th></th>
            <th>${rkns_js._('browser')}</th>
            ` + (rkns_js.is_active('geo_ip') ? `<th>${rkns_js._('country')}</th>` : ``) + `
            ` + (rkns_js.is_active('geo_city') ? `<th>${rkns_js._('city')}</th>` : ``) + `
            <th>${rkns_js._('date')}</th>
            <th class="o-table__td--sm-width">${rkns_js._('hits')}</th>
            <th class="o-table__link">${rkns_js._('ip')}</th>
            <th>${rkns_js._('referrer')}</th>
        </tr></thead><tbody>`;

        args.forEach(function (value, index) {
            t += `<tr>
            <td class="row-id">${++index}</td>
            <td><a class="is-normal-text" href="${value['browser']['link']}" title="${value['browser']['name']}"><img src="${value['browser']['logo']}" alt="${value['browser']['name']}" class='rkns-flag log-tools' title='${value['browser']['name']}'/> ${value['browser']['name']}</a></td>
            ` + (rkns_js.is_active('geo_ip') ? `<td><img src='${value['country']['flag']}' alt='${value['country']['name']}' title='${value['country']['name']}' class='rkns-flag'/> ${value['country']['name']}</td>` : ``) + `
            ` + (rkns_js.is_active('geo_city') ? `<td>${value['city']}</td>` : ``) + `
            <td>${value['date']}</td>
            <td class="o-table__td--sm-width">${value['hits']}</td>
            <td class="o-table__link o-table__ip">` + (value['hash_ip'] ? value['hash_ip'] : `<a href='${value['ip']['link']}'>${value['ip']['value']}</a>`) + `</td>
            <td class="o-table__referred">${value['referred']}</td>
			</tr>`;
        });

        t += `</tbody></table>`;
        t += `</div>`;
        return t;
    }

};

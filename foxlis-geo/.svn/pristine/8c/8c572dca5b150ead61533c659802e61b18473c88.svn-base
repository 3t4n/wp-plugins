document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener('submit', function (e) {
        const target = e.target;

        if (target.classList.contains("js-foxlis-geo-redirect-form")) {
            e.preventDefault();

            let actionList = document.querySelectorAll(".js-foxlis-geo-redirect-status");

            async function removeRows() {
                await new Promise((resolve, reject) => {
                    for (action of actionList) {
                        if (action.value === 'remove') {
                            action.closest(".foxlis_geo_row").remove();
                        }
                    }

                    resolve();
                });
            }

            removeRows().then(() => HTMLFormElement.prototype.submit.call(target));
        }
    });

    document.addEventListener('change', function (e) {
        const target = e.target;

        if (target.classList.contains("js-foxlis-geo-redirect-status")) {
            let parent = target.parentElement.parentElement;

            if (target.value === 'ask') {
                parent.querySelectorAll(".js-ask-question").forEach(function (e) {
                    e.classList.remove("hidden");
                });
            } else {
                parent.querySelectorAll(".js-ask-question").forEach(function (e) {
                    e.classList.add("hidden");
                });
            }
        }
    });

    document.addEventListener('click', function (e) {
        const target = e.target;

        if (target.classList.contains("js-foxlis-geo-redirect-add")) {
            const rows = document.querySelectorAll(".foxlis_geo_row");
            const lastRowNumber = rows.length;

            const newRowHtml =
                `<tr class="foxlis_geo_row">\n` +
                `    <th scope="row"><label for="foxlis_geo_field_redirect">${lastRowNumber + 1}. Redirect if...</label></th>\n` +
                `    <td>\n` +
                `        <div class="wrap">\n` +
                `            <select id="foxlis_geo_field_redirect"\n` +
                `                    data-custom="custom"\n` +
                `                    name="foxlis_geo_options_redirect[foxlis_geo_field_redirect_${lastRowNumber}][type]">\n` +
                `                <option value="city" selected="selected">\n` +
                `                    City\n` +
                `                </option>\n` +
                `                <option value="country">\n` +
                `                    Country\n` +
                `                </option>\n` +
                `                <option value="subdevision">\n` +
                `                    Subdevision\n` +
                `                </option>\n` +
                `                <option value="continent">\n` +
                `                    Continent\n` +
                `                </option>\n` +
                `            </select>\n` +
                `            <select\n` +
                `                    data-custom="custom"\n` +
                `                    name="foxlis_geo_options_redirect[foxlis_geo_field_redirect_${lastRowNumber}][equal]">\n` +
                `                <option value="equal">\n` +
                `                    equal\n` +
                `                </option>\n` +
                `                <option value="not_equal">\n` +
                `                    not equal\n` +
                `                </option>\n` +
                `            </select>` +
                `            <input type="text" style="vertical-align:middle"\n` +
                `                   name="foxlis_geo_options_redirect[foxlis_geo_field_redirect_${lastRowNumber}][value]" value=""\n` +
                `                   placeholder="New York"\n` +
                `                   data-maxzpsw="0">\n` +
                `            <span>redirect to*&nbsp;</span><input type="text" style="vertical-align:middle"\n` +
                `                   name="foxlis_geo_options_redirect[foxlis_geo_field_redirect_${lastRowNumber}][redirect]" value=""\n` +
                `                   placeholder="/page-URN/?query=string"\n` +
                `                   data-maxzpsw="0">\n` +
                `            <span>from*&nbsp;</span><input type="text" style="vertical-align:middle"\n` +
                `                   name="foxlis_geo_options_redirect[foxlis_geo_field_redirect_${lastRowNumber}][from*]" value=""\n` +
                `                   placeholder="/page-URN/?query=string"\n` +
                `                   data-maxzpsw="0">\n` +
                `            <select\n` +
                `                    autocomplete="off"\n` +
                `                    class="js-foxlis-geo-redirect-status"\n` +
                `                    data-custom="custom"\n` +
                `                    name="foxlis_geo_options_redirect[foxlis_geo_field_redirect_${lastRowNumber}][status]">\n` +
                `                <option value="enable">\n` +
                `                    Enable\n` +
                `                </option>\n` +
                `                <option value="once">\n` +
                `                    Once*\n` +
                `                </option>\n` +
                `                <option value="ask">\n` +
                `                    Ask*\n` +
                `                </option>\n` +
                `                <option value="disable">\n` +
                `                    Disable\n` +
                `                </option>\n` +
                `                <option value="remove">\n` +
                `                    Remove\n` +
                `                </option>\n` +
                `            </select>` +
                `        </div>\n` +
                `        <div class="wrap">\n` +
                `            <input name="foxlis_geo_options_redirect[foxlis_geo_field_redirect_${lastRowNumber}][urn]" type="checkbox" value="1"/>\n` +
                `            <span>With from* page <a href="https://en.wikipedia.org/wiki/Uniform_Resource_Name" target="_blank">URN</a></span>&nbsp;\n` +
                `            <input name="foxlis_geo_options_redirect[foxlis_geo_field_redirect_${lastRowNumber}][query]" type="checkbox" value="1"/>\n` +
                `            <span>With from* page <a href="https://en.wikipedia.org/wiki/Query_string" target="_blank">query</a></span>&nbsp;\n` +
                `            <input name="foxlis_geo_options_redirect[foxlis_geo_field_redirect_${lastRowNumber}][ignore_query]" type="checkbox" value="1"/>\n` +
                `            <span>Ignore <a href="https://en.wikipedia.org/wiki/Query_string" target="_blank">query</a> in from* <a href="https://en.wikipedia.org/wiki/Uniform_Resource_Identifier" target="_blank">URI</a> conditions</span>&nbsp;\n` +
                `            <input name="foxlis_geo_options_redirect[foxlis_geo_field_redirect_${lastRowNumber}][from*_as_regex]" type="checkbox" value="1"/>\n` +
                `            <span>Use from* as <a href="https://en.wikipedia.org/wiki/Regular_expression" target="_blank">regular expression</a></span>&nbsp;\n` +
                `        </div>\n` +
                `        <div class="wrap js-ask-question hidden">\n` +
                `            <input\n` +
                `                type="text"\n` +
                `                name="foxlis_geo_options_redirect[foxlis_geo_field_redirect_${lastRowNumber}][question]"\n` +
                `                placeholder="Your question to redirect"\n` +
                `                value=""\n` +
                `            />\n` +
                `            <input\n` +
                `                type="text"\n` +
                `                name="foxlis_geo_options_redirect[foxlis_geo_field_redirect_${lastRowNumber}][confirm]"\n` +
                `                placeholder="Your confirm button text"\n` +
                `                value=""\n` +
                `            />` +
                `            <input\n` +
                `                type="text"\n` +
                `                name="foxlis_geo_options_redirect[foxlis_geo_field_redirect_${lastRowNumber}][cancel]"\n` +
                `                placeholder="Your cancel button text"\n` +
                `                value=""\n` +
                `            />` +
                `        </div>` +
                `    </td>\n` +
                `</tr>\n`;

            rows[0].parentNode.insertAdjacentHTML("beforeend", newRowHtml);
        }
    });
})

<div class="container-fluid">
    <h1><?php esc_html_e('Cryptocurrency Price Widget', 'cryptocurrency-price-widget'); ?></h1>
    <hr>
    <div class="cr-row">
        <div class="col-12 col-lg-6">
            <h3><?php esc_html_e('Settings', 'cryptocurrency-price-widget'); ?>
            </h3>
            <form id="widget-settings"
                data-slug="<?php echo esc_attr(CRCPW_PLUGIN_SLUG); ?>"
                data-search="<?php echo esc_attr__('Search', 'cryptocurrency-price-widget'); ?>..."
                data-lang="<?php echo esc_attr($this->CRCPW_get_lang()); ?>"
                data-nonce="<?php echo esc_attr(wp_create_nonce('crcpw_nonce')); ?>"
                data-ajax-url="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="cr-row">
                                <label for="base"><?php esc_html_e('Select horizontal', 'cryptocurrency-price-widget'); ?></label>
                            </th>
                            <td>
                                <select id="base" name="base[]" data-type="flags" multiple="multiple">
                                    <option value="USD" selected>USD</option>
                                    <option value="EUR" selected>EUR</option>
                                    <option value="CNY" selected>CNY</option>
                                    <option value="GBP" selected>GBP</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="cr-row">
                                <label for="items"><?php esc_html_e('Select vertical', 'cryptocurrency-price-widget'); ?></label>
                            </th>
                            <td>
                                <select id="items" class="form-control" name="items[]" data-type="coins"
                                    multiple="multiple">
                                    <option value="BTC" selected>BTC</option>
                                    <option value="ETH" selected>ETH</option>
                                    <option value="LTC" selected>LTC</option>
                                    <option value="XMR" selected>XMR</option>
                                    <option value="DASH" selected>DASH</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="cr-row">
                                <label for="backgroundColor"><?php esc_html_e('Color', 'cryptocurrency-price-widget'); ?></label>
                            </th>
                            <td>
                                <input id="backgroundColor" name="backgroundColor" type="text" value="#fff"
                                    class="color-field">
                            </td>
                        </tr>
                        <tr>
                            <th scope="cr-row">
                                <label><?php esc_html_e('Options', 'cryptocurrency-price-widget'); ?></label>
                            </th>
                            <td>
                                <div>
                                    <input type="checkbox" name="streaming" class="form-check-input" id="streaming"
                                        value="1" checked="">
                                    <label class="form-check-label" for="streaming">⚡<?php esc_html_e('Streaming data', 'cryptocurrency-price-widget'); ?>
                                        <small>(<?php esc_html_e('Prices are updated real-time', 'cryptocurrency-price-widget'); ?></small></label>
                                </div>
                                <div>
                                    <input type="checkbox" name="striped" class="form-check-input" id="striped"
                                        value="1">
                                    <label class="form-check-label" for="striped"><?php esc_html_e('Striped', 'cryptocurrency-price-widget'); ?></label>
                                </div>
                                <div>
                                    <input type="checkbox" name="rounded" class="form-check-input" id="rounded"
                                        value="1" checked="">
                                    <label class="form-check-label" for="rounded"><?php esc_html_e('Rounded', 'cryptocurrency-price-widget'); ?></label>
                                </div>
                                <div>
                                    <input type="checkbox" name="boxShadow" class="form-check-input" id="boxShadow"
                                        value="1" checked="">
                                    <label class="form-check-label" for="boxShadow"><?php esc_html_e('Shadow', 'cryptocurrency-price-widget'); ?></label>
                                </div>
                                <div>
                                    <input type="checkbox" name="border" class="form-check-input" id="border" value="1"
                                        checked="">
                                    <label class="form-check-label" for="border"><?php esc_html_e('Border', 'cryptocurrency-price-widget'); ?></label>
                                </div>
                                <div>
                                    <input type="checkbox" name="signature" class="form-check-input" id="signature"
                                        value="1" checked="">
                                    <label class="form-check-label" for="signature"><?php esc_html_e('Signature', 'cryptocurrency-price-widget'); ?>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="col-12 col-lg-auto">
            <h3><?php esc_html_e('Preview', 'cryptocurrency-price-widget'); ?></h3>
            <div class="cr-pricelist-widget">
                <iframe id="widget-preview" title="<?php echo esc_attr('Preview', 'cryptocurrency-price-widget'); ?>"></iframe>
            </div>
        </div>
    </div>
    <hr>
    <div class="cr-row">
        <div class="col-12 col-lg-6">
            <h3><?php esc_html_e('Shortcode', 'cryptocurrency-price-widget'); ?></h3>
            <?php wp_editor("", 'widget-code', ['wpautop' => 1, 'media_buttons' => 0, 'textarea_name' => '', 'textarea_rows' => 3, 'tabindex' => null, 'teeny' => 0, 'dfw' => 0, 'tinymce' => 0, 'quicktags' => 0, 'drag_drop_upload' => false]); ?>
            <p>
                <b><?php esc_html_e('How to install', 'cryptocurrency-price-widget'); ?>:</b>
                <b><?php esc_html_e('Advice', 'cryptocurrency-price-widget'); ?>:</b>
                <?php esc_html_e('you\'ll can add shortcode anywhere: post, page and etc', 'cryptocurrency-price-widget'); ?>.
            </p>
        </div>
        <div class="col-12 col-lg-auto">
            <h3><?php esc_html_e('Note', 'cryptocurrency-price-widget'); ?></h3>
            <div class="card">
                <p>
                    <?php esc_html_e('We do everything so that you use this plugin for free', 'cryptocurrency-price-widget'); ?>.<br>
                    <?php esc_html_e('To make the plugin work in further — rate it please', 'cryptocurrency-price-widget'); ?>.<br>
                    <a href="https://wordpress.org/support/plugin/cryptocurrency-price-widget/reviews/#new-post"
                        target="_blank" rel="noopener">★ ★ ★ ★ ★</a>
                </p>
                <hr>
                <?php esc_html_e('Cryptocurrency Widgets for Website', 'cryptocurrency-price-widget'); ?>
                <a href="https://co-in.io/" target="_blank" rel="noopener">CO-IN.IO</a><br>
                Powered by <a href="https://currencyrate.today/" target="_blank" rel="noopener">CurrencyRate.today</a>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function(r) {
        r(".color-field").wpColorPicker({
            defaultColor: !1,
            change: function(t, e) {
                n(r(this).iris("color", !0).toCSS("hex"))
            },
            clear: function() {},
            hide: !0,
            palettes: ["#007BFF", "#6610F2", "#6F42C1", "#E83E8C", "#DC3545", "#FD7E14", "#FFC107",
                "#28A745", "#20C997", "#17A2B8", "#6C757D", "#343A40", "#F8F9FA", "#343A40",
                "#FFFFFF", "#333333"
            ]
        });
        var t = {
            ajax: {
                url: r("form#widget-settings").data("ajax-url"),
                dataType: "json",
                delay: 250,
                data: function(t) {
                    return {
                        action: "CRCPW_assets_data",
                        nonce: r("form#widget-settings").data("nonce"),
                        q: t.term || '',
                        type: r(this).data("type") || '',
                        page: t.page || 1
                    };
                },
                cache: true,
            },
            width: "100%",
            language: r("form#widget-settings").data("lang"),
            placeholder: r("form#widget-settings").data("search"),
            allowClear: !0,
            multiple: !0,
            tags: !0,
            templateResult: function(t) {
                return t.loading ? t.text : null != t.fiat ? (img_path_crypto =
                    "https://www.cryptocompare.com", img_path_fiat = "https://co-in.io/assets/icons", '<img src="' +
                    (1 == t.fiat ? img_path_fiat + t.text : img_path_crypto + t.text +
                        "?width=16") + '" loading="lazy"><span>&nbsp;' + t.id + "<span>") : void 0
            },
            templateSelection: function(t) {
                return "<span>" + t.id + "<span>"
            },
            maximumSelectionLength: 4,
            maximumInputLength: 10,
            escapeMarkup: function(t) {
                return t
            }
        };
        r("#base").select2(t), t.maximumSelectionLength = 15, r("#items").select2(t), r("select").on(
            "select2:select",
            function(t) {
                var e = r(this).find('[value="' + t.params.data.id + '"]');
                r(this).append(e), r(this).trigger("change")
            }), r("#color").on("change", function() {
            console.log(r(this))
        }), r('input[type="checkbox"]').on("click", function() {
            n()
        }), r("#base").on("change", function() {
            n()
        }), r("#items").on("change", function() {
            n()
        });
        var s = function(t) {
            t = t.substring(t.indexOf("?") + 1);
            for (var e, n = /([^&=]+)=?([^&]*)/g, a = /\+/g, i = function(t) {
                    return decodeURIComponent(t.replace(a, " "))
                }, o = {}; e = n.exec(t);) {
                var r = i(e[1]),
                    s = i(e[2]);
                "[]" === r.substring(r.length - 2) ? (o[r = r.substring(0, r.length - 2)] || (o[r] = []))
                    .push(s) : o[r] = s
            }
            var c = function(t, e, n) {
                for (var a = e.length - 1, i = 0; i < a; ++i) {
                    var o = e[i];
                    o in t || (t[o] = {}), t = t[o]
                }
                t[e[a]] = n
            };
            for (var g in o) {
                var l = g.split("[");
                if (1 < l.length) {
                    var u = [];
                    l.forEach(function(t, e) {
                        var n = t.replace(/[?[\]\\ ]/g, "");
                        u.push(n)
                    }), c(o, u, o[g]), delete o[g]
                }
            }
            return o
        };
        function n(t) {
            var e = r("form#widget-settings").serialize();
            for (var n in e = r.map(s(e), function(t, e) {
                    var n = {};
                    return n[e] = t, "items" == e || "base" == e ? n[e] = t.join(",") :
                        "backgroundColor" == e && (n[e] = t.replace("#", "")), n
                }), str = options = "", e) void 0 !== t ? void 0 !== e[n].backgroundColor && (e[n]
                .backgroundColor = t.substr(1)) : void 0 !== e[n].items && (Object.keys(e[n]),
                encodeURIComponent(Object.keys(e[n]).map(function(t) {
                    return e[n][t]
                }))), str += Object.keys(e[n]) + "=" + encodeURIComponent(Object.keys(e[n]).map(function(
                t) {
                return e[n][t]
            })) + "&", options += Object.keys(e[n]) + '="' + Object.keys(e[n]).map(function(t) {
                return e[n][t]
            }) + '" ';
            var a = r("form#widget-settings").data("lang");
            a = "en" != a ? a + "/" : "";
            var i = "[" + r("form#widget-settings").data("slug") + " " + options.substr(0, options.length - 1) +
                "]",
                o = "https://co-in.io/" + a + "widget/pricelist-preview/?" + str.substr(0, str.length - 1);
            r("#widget-preview").attr({
                src: o,
                scrolling: "no"
            }), r("#widget-code").text(i)
        }
        r(window).on("message", function(t) {
            var e = t.originalEvent.data;
            if ("string" == typeof e) try {
                var n = JSON.parse(e);
                r("#widget-preview").height(n.h + 15 + "px")
            } catch (t) {}
        }), n()
    });
</script>

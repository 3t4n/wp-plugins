AviviD.tracking_platform = 'likr';
/**
 * 檢查是否已載入jQuery，如果未載入，執行載入
 */
(function (w, d, s, url) {
    if (!w.jQuery) {
        var father = d.getElementsByTagName(s)[0] || d.getElementsByTagName('head')[0];
        var script = d.createElement(s);

        script.type = "text/javascript";
        script.src = url;
        father.parentNode.insertBefore(script, father);
    };
})(window, document, 'script', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js');

/**
 * 引入假原生訂閱CSS
 */
(function (w, d, s, url) {
    if (!d.getElementById('avivid_css')) {
        var father = d.getElementsByTagName('head')[0];
        var link = d.createElement(s);
        link.id = "avivid_css";
        link.type = "text/css";
        link.rel = "stylesheet";
        link.href = url;
        father.appendChild(link);
        link.addEventListener('load', function () { AviviD.status.avivid_css = 1; });
    };
})(window, document, 'link', 'https://avivid.likr.tw/avivid_css/avivid_pseudo_native_subscribe/avivid_pseudo_native_subscribe.css');


/**
 * UAParser 裝置判斷工具
 */
if (typeof (UAParser) === 'undefined') {
    (function (g, p) {
        var h = { extend: function (a, b) { var c = {}, e; for (e in a) c[e] = b[e] && 0 === b[e].length % 2 ? b[e].concat(a[e]) : a[e]; return c }, has: function (a, b) { return "string" === typeof a ? -1 !== b.toLowerCase().indexOf(a.toLowerCase()) : !1 }, lowerize: function (a) { return a.toLowerCase() }, major: function (a) { return "string" === typeof a ? a.replace(/[^\d\.]/g, "").split(".")[0] : p }, trim: function (a) { return a.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, "") } }, r = function (a, b) {
            for (var c = 0, e, f, g, d, h, l; c < b.length && !h;) {
                var k = b[c], m = b[c +
                    1]; for (e = f = 0; e < k.length && !h;)if (h = k[e++].exec(a)) for (g = 0; g < m.length; g++)l = h[++f], d = m[g], "object" === typeof d && 0 < d.length ? 2 == d.length ? this[d[0]] = "function" == typeof d[1] ? d[1].call(this, l) : d[1] : 3 == d.length ? this[d[0]] = "function" !== typeof d[1] || d[1].exec && d[1].test ? l ? l.replace(d[1], d[2]) : p : l ? d[1].call(this, l, d[2]) : p : 4 == d.length && (this[d[0]] = l ? d[3].call(this, l.replace(d[1], d[2])) : p) : this[d] = l ? l : p; c += 2
            }
        }, k = function (a, b) {
            for (var c in b) if ("object" === typeof b[c] && 0 < b[c].length) for (var e = 0; e < b[c].length; e++) {
                if (h.has(b[c][e],
                    a)) return "?" === c ? p : c
            } else if (h.has(b[c], a)) return "?" === c ? p : c; return a
        }, t = { ME: "4.90", "NT 3.11": "NT3.51", "NT 4.0": "NT4.0", 2E3: "NT 5.0", XP: ["NT 5.1", "NT 5.2"], Vista: "NT 6.0", 7: "NT 6.1", 8: "NT 6.2", "8.1": "NT 6.3", 10: ["NT 6.4", "NT 10.0"], RT: "ARM" }, u = {
            browser: [[/(opera\smini)\/([\w\.-]+)/i, /(opera\s[mobiletab]+).+version\/([\w\.-]+)/i, /(opera).+version\/([\w\.]+)/i, /(opera)[\/\s]+([\w\.]+)/i], ["name", "version"], [/(opios)[\/\s]+([\w\.]+)/i], [["name", "Opera Mini"], "version"], [/\s(opr)\/([\w\.]+)/i], [["name",
                "Opera"], "version"], [/(kindle)\/([\w\.]+)/i, /(lunascape|maxthon|netfront|jasmine|blazer)[\/\s]?([\w\.]+)*/i, /(avant\s|iemobile|slim|baidu)(?:browser)?[\/\s]?([\w\.]*)/i, /(?:ms|\()(ie)\s([\w\.]+)/i, /(rekonq)\/([\w\.]+)*/i, /(chromium|flock|rockmelt|midori|epiphany|silk|skyfire|ovibrowser|bolt|iron|vivaldi|iridium|phantomjs|bowser)\/([\w\.-]+)/i], ["name", "version"], [/(trident).+rv[:\s]([\w\.]+).+like\sgecko/i], [["name", "IE"], "version"], [/(edge)\/((\d+)?[\w\.]+)/i], ["name", "version"], [/(yabrowser)\/([\w\.]+)/i],
            [["name", "Yandex"], "version"], [/(puffin)\/([\w\.]+)/i], [["name", "Puffin"], "version"], [/((?:[\s\/])uc?\s?browser|(?:juc.+)ucweb)[\/\s]?([\w\.]+)/i], [["name", "UCBrowser"], "version"], [/(comodo_dragon)\/([\w\.]+)/i], [["name", /_/g, " "], "version"], [/(micromessenger)\/([\w\.]+)/i], [["name", "WeChat"], "version"], [/(QQ)\/([\d\.]+)/i], ["name", "version"], [/m?(qqbrowser)[\/\s]?([\w\.]+)/i], ["name", "version"], [/xiaomi\/miuibrowser\/([\w\.]+)/i], ["version", ["name", "MIUI Browser"]], [/;fbav\/([\w\.]+);/i], ["version",
                ["name", "Facebook"]], [/(headlesschrome) ([\w\.]+)/i], ["version", ["name", "Chrome Headless"]], [/\swv\).+(chrome)\/([\w\.]+)/i], [["name", /(.+)/, "$1 WebView"], "version"], [/((?:oculus|samsung)browser)\/([\w\.]+)/i], [["name", /(.+(?:g|us))(.+)/, "$1 $2"], "version"], [/android.+version\/([\w\.]+)\s+(?:mobile\s?safari|safari)*/i], ["version", ["name", "Android Browser"]], [/(chrome|omniweb|arora|[tizenoka]{5}\s?browser)\/v?([\w\.]+)/i], ["name", "version"], [/(dolfin)\/([\w\.]+)/i], [["name", "Dolphin"], "version"], [/((?:android.+)crmo|crios)\/([\w\.]+)/i],
            [["name", "Chrome"], "version"], [/(coast)\/([\w\.]+)/i], [["name", "Opera Coast"], "version"], [/fxios\/([\w\.-]+)/i], ["version", ["name", "Firefox"]], [/version\/([\w\.]+).+?mobile\/\w+\s(safari)/i], ["version", ["name", "Mobile Safari"]], [/version\/([\w\.]+).+?(mobile\s?safari|safari)/i], ["version", "name"], [/webkit.+?(mobile\s?safari|safari)(\/[\w\.]+)/i], ["name", ["version", k, { "1.0": "/8", "1.2": "/1", "1.3": "/3", "2.0": "/412", "2.0.2": "/416", "2.0.3": "/417", "2.0.4": "/419", "?": "/" }]], [/(konqueror)\/([\w\.]+)/i, /(webkit|khtml)\/([\w\.]+)/i],
            ["name", "version"], [/(navigator|netscape)\/([\w\.-]+)/i], [["name", "Netscape"], "version"], [/(swiftfox)/i, /(icedragon|iceweasel|camino|chimera|fennec|maemo\sbrowser|minimo|conkeror)[\/\s]?([\w\.\+]+)/i, /(firefox|seamonkey|k-meleon|icecat|iceape|firebird|phoenix)\/([\w\.-]+)/i, /(mozilla)\/([\w\.]+).+rv:.+gecko\/\d+/i, /(polaris|lynx|dillo|icab|doris|amaya|w3m|netsurf|sleipnir)[\/\s]?([\w\.]+)/i, /(links)\s\(([\w\.]+)/i, /(gobrowser)\/?([\w\.]+)*/i, /(ice\s?browser)\/v?([\w\._]+)/i, /(mosaic)[\/\s]([\w\.]+)/i],
            ["name", "version"]], cpu: [[/(?:(amd|x(?:(?:86|64)[_-])?|wow|win)64)[;\)]/i], [["architecture", "amd64"]], [/(ia32(?=;))/i], [["architecture", h.lowerize]], [/((?:i[346]|x)86)[;\)]/i], [["architecture", "ia32"]], [/windows\s(ce|mobile);\sppc;/i], [["architecture", "arm"]], [/((?:ppc|powerpc)(?:64)?)(?:\smac|;|\))/i], [["architecture", /ower/, "", h.lowerize]], [/(sun4\w)[;\)]/i], [["architecture", "sparc"]], [/((?:avr32|ia64(?=;))|68k(?=\))|arm(?:64|(?=v\d+;))|(?=atmel\s)avr|(?:irix|mips|sparc)(?:64)?(?=;)|pa-risc)/i],
            [["architecture", h.lowerize]]], device: [[/\((ipad|playbook);[\w\s\);-]+(rim|apple)/i], ["model", "vendor", ["type", "tablet"]], [/applecoremedia\/[\w\.]+ \((ipad)/], ["model", ["vendor", "Apple"], ["type", "tablet"]], [/(apple\s{0,1}tv)/i], [["model", "Apple TV"], ["vendor", "Apple"]], [/(archos)\s(gamepad2?)/i, /(hp).+(touchpad)/i, /(hp).+(tablet)/i, /(kindle)\/([\w\.]+)/i, /\s(nook)[\w\s]+build\/(\w+)/i, /(dell)\s(strea[kpr\s\d]*[\dko])/i], ["vendor", "model", ["type", "tablet"]], [/(kf[A-z]+)\sbuild\/[\w\.]+.*silk\//i],
            ["model", ["vendor", "Amazon"], ["type", "tablet"]], [/(sd|kf)[0349hijorstuw]+\sbuild\/[\w\.]+.*silk\//i], [["model", k, { "Fire Phone": ["SD", "KF"] }], ["vendor", "Amazon"], ["type", "mobile"]], [/\((ip[honed|\s\w*]+);.+(apple)/i], ["model", "vendor", ["type", "mobile"]], [/\((ip[honed|\s\w*]+);/i], ["model", ["vendor", "Apple"], ["type", "mobile"]], [/(blackberry)[\s-]?(\w+)/i, /(blackberry|benq|palm(?=\-)|sonyericsson|acer|asus|dell|meizu|motorola|polytron)[\s_-]?([\w-]+)*/i, /(hp)\s([\w\s]+\w)/i, /(asus)-?(\w+)/i], ["vendor",
                "model", ["type", "mobile"]], [/\(bb10;\s(\w+)/i], ["model", ["vendor", "BlackBerry"], ["type", "mobile"]], [/android.+(transfo[prime\s]{4,10}\s\w+|eeepc|slider\s\w+|nexus 7|padfone)/i], ["model", ["vendor", "Asus"], ["type", "tablet"]], [/(sony)\s(tablet\s[ps])\sbuild\//i, /(sony)?(?:sgp.+)\sbuild\//i], [["vendor", "Sony"], ["model", "Xperia Tablet"], ["type", "tablet"]], [/android.+\s([c-g]\d{4}|so[-l]\w+)\sbuild\//i], ["model", ["vendor", "Sony"], ["type", "mobile"]], [/\s(ouya)\s/i, /(nintendo)\s([wids3u]+)/i], ["vendor", "model",
                ["type", "console"]], [/android.+;\s(shield)\sbuild/i], ["model", ["vendor", "Nvidia"], ["type", "console"]], [/(playstation\s[34portablevi]+)/i], ["model", ["vendor", "Sony"], ["type", "console"]], [/(sprint\s(\w+))/i], [["vendor", k, { HTC: "APA", Sprint: "Sprint" }], ["model", k, { "Evo Shift 4G": "7373KT" }], ["type", "mobile"]], [/(lenovo)\s?(S(?:5000|6000)+(?:[-][\w+]))/i], ["vendor", "model", ["type", "tablet"]], [/(htc)[;_\s-]+([\w\s]+(?=\))|\w+)*/i, /(zte)-(\w+)*/i, /(alcatel|geeksphone|lenovo|nexian|panasonic|(?=;\s)sony)[_\s-]?([\w-]+)*/i],
            ["vendor", ["model", /_/g, " "], ["type", "mobile"]], [/(nexus\s9)/i], ["model", ["vendor", "HTC"], ["type", "tablet"]], [/d\/huawei([\w\s-]+)[;\)]/i, /(nexus\s6p)/i], ["model", ["vendor", "Huawei"], ["type", "mobile"]], [/(microsoft);\s(lumia[\s\w]+)/i], ["vendor", "model", ["type", "mobile"]], [/[\s\(;](xbox(?:\sone)?)[\s\);]/i], ["model", ["vendor", "Microsoft"], ["type", "console"]], [/(kin\.[onetw]{3})/i], [["model", /\./g, " "], ["vendor", "Microsoft"], ["type", "mobile"]], [/\s(milestone|droid(?:[2-4x]|\s(?:bionic|x2|pro|razr))?(:?\s4g)?)[\w\s]+build\//i,
                /mot[\s-]?(\w+)*/i, /(XT\d{3,4}) build\//i, /(nexus\s6)/i], ["model", ["vendor", "Motorola"], ["type", "mobile"]], [/android.+\s(mz60\d|xoom[\s2]{0,2})\sbuild\//i], ["model", ["vendor", "Motorola"], ["type", "tablet"]], [/hbbtv\/\d+\.\d+\.\d+\s+\([\w\s]*;\s*(\w[^;]*);([^;]*)/i], [["vendor", h.trim], ["model", h.trim], ["type", "smarttv"]], [/hbbtv.+maple;(\d+)/i], [["model", /^/, "SmartTV"], ["vendor", "Samsung"], ["type", "smarttv"]], [/\(dtv[\);].+(aquos)/i], ["model", ["vendor", "Sharp"], ["type", "smarttv"]], [/android.+((sch-i[89]0\d|shw-m380s|gt-p\d{4}|gt-n\d+|sgh-t8[56]9|nexus 10))/i,
                /((SM-T\w+))/i], [["vendor", "Samsung"], "model", ["type", "tablet"]], [/smart-tv.+(samsung)/i], ["vendor", ["type", "smarttv"], "model"], [/((s[cgp]h-\w+|gt-\w+|galaxy\snexus|sm-\w[\w\d]+))/i, /(sam[sung]*)[\s-]*(\w+-?[\w-]*)*/i, /sec-((sgh\w+))/i], [["vendor", "Samsung"], "model", ["type", "mobile"]], [/sie-(\w+)*/i], ["model", ["vendor", "Siemens"], ["type", "mobile"]], [/(maemo|nokia).*(n900|lumia\s\d+)/i, /(nokia)[\s_-]?([\w-]+)*/i], [["vendor", "Nokia"], "model", ["type", "mobile"]], [/android\s3\.[\s\w;-]{10}(a\d{3})/i],
            ["model", ["vendor", "Acer"], ["type", "tablet"]], [/android.+([vl]k\-?\d{3})\s+build/i], ["model", ["vendor", "LG"], ["type", "tablet"]], [/android\s3\.[\s\w;-]{10}(lg?)-([06cv9]{3,4})/i], [["vendor", "LG"], "model", ["type", "tablet"]], [/(lg) netcast\.tv/i], ["vendor", "model", ["type", "smarttv"]], [/(nexus\s[45])/i, /lg[e;\s\/-]+(\w+)*/i, /android.+lg(\-?[\d\w]+)\s+build/i], ["model", ["vendor", "LG"], ["type", "mobile"]], [/android.+(ideatab[a-z0-9\-\s]+)/i], ["model", ["vendor", "Lenovo"], ["type", "tablet"]], [/linux;.+((jolla));/i],
            ["vendor", "model", ["type", "mobile"]], [/((pebble))app\/[\d\.]+\s/i], ["vendor", "model", ["type", "wearable"]], [/android.+;\s(oppo)\s?([\w\s]+)\sbuild/i], ["vendor", "model", ["type", "mobile"]], [/crkey/i], [["model", "Chromecast"], ["vendor", "Google"]], [/android.+;\s(glass)\s\d/i], ["model", ["vendor", "Google"], ["type", "wearable"]], [/android.+;\s(pixel c)\s/i], ["model", ["vendor", "Google"], ["type", "tablet"]], [/android.+;\s(pixel xl|pixel)\s/i], ["model", ["vendor", "Google"], ["type", "mobile"]], [/android.+(\w+)\s+build\/hm\1/i,
                /android.+(hm[\s\-_]*note?[\s_]*(?:\d\w)?)\s+build/i, /android.+(mi[\s\-_]*(?:one|one[\s_]plus|note lte)?[\s_]*(?:\d\w)?)\s+build/i], [["model", /_/g, " "], ["vendor", "Xiaomi"], ["type", "mobile"]], [/android.+;\s(m[1-5]\snote)\sbuild/i], ["model", ["vendor", "Meizu"], ["type", "tablet"]], [/android.+a000(1)\s+build/i], ["model", ["vendor", "OnePlus"], ["type", "mobile"]], [/android.+[;\/]\s*(RCT[\d\w]+)\s+build/i], ["model", ["vendor", "RCA"], ["type", "tablet"]], [/android.+[;\/]\s*(Venue[\d\s]*)\s+build/i], ["model", ["vendor",
                    "Dell"], ["type", "tablet"]], [/android.+[;\/]\s*(Q[T|M][\d\w]+)\s+build/i], ["model", ["vendor", "Verizon"], ["type", "tablet"]], [/android.+[;\/]\s+(Barnes[&\s]+Noble\s+|BN[RT])(V?.*)\s+build/i], [["vendor", "Barnes & Noble"], "model", ["type", "tablet"]], [/android.+[;\/]\s+(TM\d{3}.*\b)\s+build/i], ["model", ["vendor", "NuVision"], ["type", "tablet"]], [/android.+[;\/]\s*(zte)?.+(k\d{2})\s+build/i], [["vendor", "ZTE"], "model", ["type", "tablet"]], [/android.+[;\/]\s*(gen\d{3})\s+build.*49h/i], ["model", ["vendor", "Swiss"],
                ["type", "mobile"]], [/android.+[;\/]\s*(zur\d{3})\s+build/i], ["model", ["vendor", "Swiss"], ["type", "tablet"]], [/android.+[;\/]\s*((Zeki)?TB.*\b)\s+build/i], ["model", ["vendor", "Zeki"], ["type", "tablet"]], [/(android).+[;\/]\s+([YR]\d{2}x?.*)\s+build/i, /android.+[;\/]\s+(Dragon[\-\s]+Touch\s+|DT)(.+)\s+build/i], [["vendor", "Dragon Touch"], "model", ["type", "tablet"]], [/android.+[;\/]\s*(NS-?.+)\s+build/i], ["model", ["vendor", "Insignia"], ["type", "tablet"]], [/android.+[;\/]\s*((NX|Next)-?.+)\s+build/i], ["model",
                ["vendor", "NextBook"], ["type", "tablet"]], [/android.+[;\/]\s*(Xtreme_?)?(V(1[045]|2[015]|30|40|60|7[05]|90))\s+build/i], [["vendor", "Voice"], "model", ["type", "mobile"]], [/android.+[;\/]\s*(LVTEL\-?)?(V1[12])\s+build/i], [["vendor", "LvTel"], "model", ["type", "mobile"]], [/android.+[;\/]\s*(V(100MD|700NA|7011|917G).*\b)\s+build/i], ["model", ["vendor", "Envizen"], ["type", "tablet"]], [/android.+[;\/]\s*(Le[\s\-]+Pan)[\s\-]+(.*\b)\s+build/i], ["vendor", "model", ["type", "tablet"]], [/android.+[;\/]\s*(Trio[\s\-]*.*)\s+build/i],
            ["model", ["vendor", "MachSpeed"], ["type", "tablet"]], [/android.+[;\/]\s*(Trinity)[\-\s]*(T\d{3})\s+build/i], ["vendor", "model", ["type", "tablet"]], [/android.+[;\/]\s*TU_(1491)\s+build/i], ["model", ["vendor", "Rotor"], ["type", "tablet"]], [/android.+(KS(.+))\s+build/i], ["model", ["vendor", "Amazon"], ["type", "tablet"]], [/android.+(Gigaset)[\s\-]+(Q.+)\s+build/i], ["vendor", "model", ["type", "tablet"]], [/\s(tablet|tab)[;\/]/i, /\s(mobile)(?:[;\/]|\ssafari)/i], [["type", h.lowerize], "vendor", "model"], [/(android.+)[;\/].+build/i],
            ["model", ["vendor", "Generic"]]], engine: [[/windows.+\sedge\/([\w\.]+)/i], ["version", ["name", "EdgeHTML"]], [/(presto)\/([\w\.]+)/i, /(webkit|trident|netfront|netsurf|amaya|lynx|w3m)\/([\w\.]+)/i, /(khtml|tasman|links)[\/\s]\(?([\w\.]+)/i, /(icab)[\/\s]([23]\.[\d\.]+)/i], ["name", "version"], [/rv:([\w\.]+).*(gecko)/i], ["version", "name"]], os: [[/microsoft\s(windows)\s(vista|xp)/i], ["name", "version"], [/(windows)\snt\s6\.2;\s(arm)/i, /(windows\sphone(?:\sos)*)[\s\/]?([\d\.\s]+\w)*/i, /(windows\smobile|windows)[\s\/]?([ntce\d\.\s]+\w)/i],
            ["name", ["version", k, t]], [/(win(?=3|9|n)|win\s9x\s)([nt\d\.]+)/i], [["name", "Windows"], ["version", k, t]], [/\((bb)(10);/i], [["name", "BlackBerry"], "version"], [/(blackberry)\w*\/?([\w\.]+)*/i, /(tizen)[\/\s]([\w\.]+)/i, /(android|webos|palm\sos|qnx|bada|rim\stablet\sos|meego|contiki)[\/\s-]?([\w\.]+)*/i, /linux;.+(sailfish);/i], ["name", "version"], [/(symbian\s?os|symbos|s60(?=;))[\/\s-]?([\w\.]+)*/i], [["name", "Symbian"], "version"], [/\((series40);/i], ["name"], [/mozilla.+\(mobile;.+gecko.+firefox/i], [["name",
                "Firefox OS"], "version"], [/(nintendo|playstation)\s([wids34portablevu]+)/i, /(mint)[\/\s\(]?(\w+)*/i, /(mageia|vectorlinux)[;\s]/i, /(joli|[kxln]?ubuntu|debian|[open]*suse|gentoo|(?=\s)arch|slackware|fedora|mandriva|centos|pclinuxos|redhat|zenwalk|linpus)[\/\s-]?(?!chrom)([\w\.-]+)*/i, /(hurd|linux)\s?([\w\.]+)*/i, /(gnu)\s?([\w\.]+)*/i], ["name", "version"], [/(cros)\s[\w]+\s([\w\.]+\w)/i], [["name", "Chromium OS"], "version"], [/(sunos)\s?([\w\.]+\d)*/i], [["name", "Solaris"], "version"], [/\s([frentopc-]{0,4}bsd|dragonfly)\s?([\w\.]+)*/i],
            ["name", "version"], [/(haiku)\s(\w+)/i], ["name", "version"], [/cfnetwork\/.+darwin/i, /ip[honead]+(?:.*os\s([\w]+)*\slike\smac|;\sopera)/i], [["version", /_/g, "."], ["name", "iOS"]], [/(mac\sos\sx)\s?([\w\s\.]+\w)*/i, /(macintosh|mac(?=_powerpc)\s)/i], [["name", "Mac OS"], ["version", /_/g, "."]], [/((?:open)?solaris)[\/\s-]?([\w\.]+)*/i, /(aix)\s((\d)(?=\.|\)|\s)[\w\.]*)*/i, /(plan\s9|minix|beos|os\/2|amigaos|morphos|risc\sos|openvms)/i, /(unix)\s?([\w\.]+)*/i], ["name", "version"]]
        }, m = function (a, b) {
            this.name = a; this.version =
                b
        }, v = function (a) { this.architecture = a }, w = function (a, b, c) { this.vendor = a; this.model = b; this.type = c }, f = function (a, b) {
            "object" === typeof a && (b = a, a = p); if (!(this instanceof f)) return (new f(a, b)).getResult(); var c = a || (g && g.navigator && g.navigator.userAgent ? g.navigator.userAgent : ""), e = b ? h.extend(u, b) : u, k = new m, n = new v, d = new w, q = new m, l = new m; this.getBrowser = function () { r.call(k, c, e.browser); k.major = h.major(k.version); return k }; this.getCPU = function () { r.call(n, c, e.cpu); return n }; this.getDevice = function () {
                r.call(d,
                    c, e.device); return d
            }; this.getEngine = function () { r.call(q, c, e.engine); return q }; this.getOS = function () { r.call(l, c, e.os); return l }; this.getResult = function () { return { ua: this.getUA(), browser: this.getBrowser(), engine: this.getEngine(), os: this.getOS(), device: this.getDevice(), cpu: this.getCPU() } }; this.getUA = function () { return c }; this.setUA = function (a) { c = a; k = new m; n = new v; d = new w; q = new m; l = new m; return this }; return this
        }; f.VERSION = "0.7.14"; f.BROWSER = { NAME: "name", MAJOR: "major", VERSION: "version" }; f.CPU = { ARCHITECTURE: "architecture" };
        f.DEVICE = { MODEL: "model", VENDOR: "vendor", TYPE: "type", CONSOLE: "console", MOBILE: "mobile", SMARTTV: "smarttv", TABLET: "tablet", WEARABLE: "wearable", EMBEDDED: "embedded" }; f.ENGINE = { NAME: "name", VERSION: "version" }; f.OS = { NAME: "name", VERSION: "version" }; "undefined" !== typeof exports ? ("undefined" !== typeof module && module.exports && (exports = module.exports = f), exports.UAParser = f) : "function" === typeof define && define.amd ? g.UAParser = f : g && (g.UAParser = f); var n = g && (g.jQuery || g.Zepto); if ("undefined" !== typeof n) {
            var q = new f; n.ua =
                q.getResult(); n.ua.get = function () { return q.getUA() }; n.ua.set = function (a) { q.setUA(a); a = q.getResult(); for (var b in a) n.ua[b] = a[b] }
        }
    })("object" === typeof window ? window : this);
};


/**
 * 鈴鐺程式
 */
if (window.AviviD && !document.querySelector("#web_push, #avivid_push_banner")) {
    /**
     * 版本號
     * 版本+年月+編號
     * ex: 7.3版 2020年9月3日 1版 = 7.3.2009030001
     */

    AviviD.version = 'v7.3.2101270001';

    /**
     * 偵錯模式
     */
    AviviD.status.debug = window.avivid_debug || 0;

    /**
     * CRM Type 2 參數
     * 對方給我們的會員編號
     */
    AviviD.avivid_regid = window.avivid_regid || '_';
    AviviD.status.avivid_regid = AviviD.avivid_regid;

    /**
     * User 分類標籤
     */
    AviviD.avivid_tag = window.avivid_tag || '_';
    AviviD.status.avivid_tag = AviviD.avivid_tag;

    /**
     * 裝置判斷工具
     * UAParser 初始化
     */
    AviviD.UAParser = new UAParser();
    AviviD.UAResult = AviviD.UAParser.getResult();


    /**
     * 允許新版onpage(new onpage)的電商清單(category_id)
     */
    AviviD.allow_new_onpage_category_id = [
        "20200309000002",  //iroo
        // "20200703000003", //lovingfamily
        "20191211000001",  //parentingshopping
        // "20200519000001", //polylulu
        "20190816000003",  //yoclife
        "20201026000001"   //psk
    ];
    /**
     * 建構子
     */
    AviviD.construct = function (method) {
        //確認jQuery和uuid已載入才開始執行鈴鐺程式
        if (window.jQuery && !AviviD.empty(AviviD.uuid)) {
            method();
            //如果是safari暫時無法有uuid的判斷，要等訂閱後將token+web_id寫入uuid by Wine
        } else if (window.jQuery && AviviD.detect_browser_type() == 'iOS') {
            method();
        }
        //如果jQuery未載入 等待0.05秒 再檢查一次
        else {
            setTimeout(function () { AviviD.construct(method) }, 50);
        }
    };

    /**
     * 鈴鐺起點
     */
    AviviD.main = function () {

        // set is likr cookie if from Likr push
        AviviD.set_is_likr();

        //作業系統類型
        AviviD.str_os_type = AviviD.detect_os_type();
        //作業系統類型編號
        AviviD.int_os_type = AviviD.trans_os_type_to_number(AviviD.str_os_type);
        //瀏覽器類型
        AviviD.str_browser_type = AviviD.detect_browser_type();
        //瀏覽器類型編號
        AviviD.int_browser_type = AviviD.trans_browser_type_to_number(AviviD.str_browser_type);
        //客戶端 Cookie ID
        AviviD.webuserid = AviviD.get_webuserid();
        //當前網址
        AviviD.client_href = encodeURIComponent(window.location.href);
        //AJAX用 json_data
        AviviD.ajax_data = {
            'web_id': AviviD.web_id,
            'category_id': AviviD.category_id,
            'uuid': AviviD.uuid,
            'webuserid': AviviD.webuserid,
            'os_type': AviviD.int_os_type,
            'browser_type': AviviD.int_browser_type,
            'client_href': window.location.href,
            'version': AviviD.version,
        };
        //當前GPS座標
        AviviD.geolocation = { latitude: null, longitude: null, get_interval: 10000 };

        //取得網站設定
        AviviD.get_website_info();

        //rick 20210414
        //先挑一家有集合頁的跟一家回首頁的來測試，並且要從sw的才觸發導集合頁的功能
        // var demo_list = ['20180920000003','20200521000001'];
        if(AviviD.settings.back_page_enable == '1' && (document.referrer.indexOf('firebase-messaging-sw') > -1 || (location.search.indexOf('differ_push_day') > -1) || location.search.indexOf('web_notification') > -1))
        {
            AviviD.before_page();
        }

        AviviD.onpage_flow();

        AviviD.token_uuid_mapping();

        if(AviviD.web_id == 'bogoto' && (AviviD.uuid == 'b0ff7bc7-87ae-4f6c-808e-f7c912900369' || AviviD.uuid == 'a2d95264-053f-447e-bfe5-8cf7537ed862') )
        {
            var send_log = {
                'web_id': AviviD.web_id,
                'uuid': AviviD.uuid,
                'webuserid': AviviD.webuserid,
                'already_exist': (AviviD.get_cookie('AviviD_already_exist') != null) ? AviviD.get_cookie('AviviD_already_exist') : 0,
                'already_show_sub': (AviviD.get_cookie('AviviD_show_sub') != null) ? AviviD.get_cookie('AviviD_show_sub') : 0,
                'client_href': window.location.href,
            };
            jQuery.ajax({
                url: "https://subscribe.likr.com.tw/api/receive_log.php",
                type: "POST",
                data: send_log,
                dataType: "json",
                success: function (data) {
                    AviviD.console(data);

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    AviviD.console("xhr :", xhr);
                    AviviD.console("ajaxOptions :", ajaxOptions);
                    AviviD.console("thrownError :", thrownError);
                    AviviD.console('status code : ' + xhr.status + ' , ajaxOptions : ' + ajaxOptions);
                }
            });
        }

    };
    AviviD.load_aws = function(){
        /**
         * 載入AviviD-AWS sdk

         */

        if(AviviD.aws_loaded == undefined)
        {
            (function (w, d, s, url) {
                var father = d.getElementsByTagName(s)[0] || d.getElementsByTagName('head')[0];
                var script = d.createElement(s);

                script.type = "text/javascript";
                script.src = url;
                father.parentNode.insertBefore(script, father);
            })(window, document, 'script', 'https://avivid.likr.tw/sample/aws-sdk-AviviD-min-1.000.3.js');
            AviviD.aws_loaded = 1;
        }


    }
    AviviD.before_page = function()
    {
        if (AviviD.settings.website_type) {
            //get start time
            if(AviviD.settings.website_type == '3')
            {
                window.onpopstate = function(){
                    var module = 'back_page';
                    // var data = window.btoa("web_id="+AviviD.web_id + "&uuid="+encodeURI(AviviD.uuid)+"&table=onpage_ecom_table");
                    var summary_click_url = "https://rhea-cdn.advividnetwork.com/itemPage/"+AviviD.web_id+"/"+module+"/hot";

                    location.replace(summary_click_url);
                }
            }
            else
            {
                var page_list = ['20181004000001','20181005000001','20180905000003','20180802000001','20180920000003'];
                if(page_list.includes(AviviD.category_id))
                {
                    window.onpopstate = function(){
                        var data = window.btoa('?web_id='+AviviD.web_id);
                        var redirect_url = "https://cobra.likr.com.tw/popcorn/popcorn_list.html?"+data;

                        location.replace(redirect_url);
                    }
                }
                else
                {
                    window.onpopstate = function(){
                        var redirect_url = window.location.origin;

                        location.replace(redirect_url);
                    }
                }
            }
            var stateObj = {state:'1'};
            history.pushState(stateObj, "", "");
        }
        else {
            setTimeout(function () { AviviD.before_page() }, 1000);
        }
    }
    AviviD.onpage_flow = function () {

        if (AviviD.settings.native_enable) {
            //get start time
            AviviD.time_setting();

            //onpage push
            AviviD.onpage_enable();

            //仿訂閱&仿推
            // alert(AviviD.int_os_type + "0" + AviviD.int_browser_type);
            AviviD.waterfall_ready(0);

            if (AviviD.get_cookie('AviviD_already_exist') != null) {
                AviviD.compensation();
            }

        }
        else {
            setTimeout(function () { AviviD.onpage_flow() }, 500);
        }
    }

    AviviD.waterfall_ready = function (times) {
        if (typeof AviviD.waterfall_enable === "function") {
            AviviD.waterfall_enable();
        }
        else if (times > 100) {
            return 0;
        }
        else {
            setTimeout(function () {
                AviviD.waterfall_ready(times + 1);
            }, 100);
        }
    }

    AviviD.time_setting = function () {
        AviviD.in_time = new Date().getTime();
        AviviD.timestamp = 0;
        AviviD.timeout = ("NaN" != parseFloat(AviviD.settings.onpage_timeout_cycle).toString()) ? AviviD.settings.onpage_timeout_cycle * 1000 : 50000;
        AviviD.timeOut = {
            landing: (parseFloat(AviviD.settings.onpage_timeout_first).toString() != "NaN") ? AviviD.settings.onpage_timeout_first : 50,
            browsing: (parseFloat(AviviD.settings.onpage_timeout_cycle).toString() != "NaN") ? AviviD.settings.onpage_timeout_cycle : 50,
            ad_banner: (parseFloat(AviviD.settings.ad_banner_timer).toString() != "NaN") ? AviviD.settings.ad_banner_timer : 10,
        }
        AviviD.received = 0;
        AviviD.start_browse = 0;

        AviviD.adaptive_timer = 0;
        // for new onpage
        if(AviviD.allow_new_onpage_category_id.indexOf(AviviD.category_id) != -1){
            setInterval(function () {
                AviviD.adaptive_timer++;
                if(AviviD.onpage_debug_mode){
                    console.log('動態總時間counting:'+AviviD.adaptive_timer);
                    jQuery('#onpage_seesion_time').text('使用者session時間:'+AviviD.adaptive_timer);
                    jQuery('#onpage_received').text('likr_timer 倒數到0的次數:'+AviviD.likrTimer.timesUp_times);
                }
            }, 1000);
        }

        AviviD.adaptive_timer_start = 0;  // 前次點擊/觸碰時間
        AviviD.adaptive_timer_end = 0;  // 這次點擊/觸碰時間
        AviviD.adaptive_tap_count = 0; // 此工作階段觸碰次數
        AviviD.adaptive_flag = 0; // 觸發開始動態調整推播時間的flag
        AviviD.likrTimer = {
            isScrolling: '',
            event_arr: [],
            timesUp_times: 0, // likr_timer 倒數到0的次數
            init: function () {

                AviviD.likr_timer = AviviD.timeOut.landing;
                AviviD.likr_timer_ad_banner = AviviD.timeOut.ad_banner;
                // 如果category_id是iroo ， 而且動態彈幕開啟
                setTimeout(function(){
                    // for new onpage
                    if(AviviD.allow_new_onpage_category_id.indexOf(AviviD.category_id) != -1 && AviviD.settings.adaptive_push == 1){
                        console.log('AviviD.likrTimer初始化準備偵測使用者動作');
                        jQuery('#onpage_status').text('AviviD.likrTimer初始化準備偵測使用者動作');
                        // jQuery(window).on('keydown mousemove mousedown scroll', function (e) {
                        // jQuery(window).on('keydown mousedown scroll tap swipe', function (e) {


                        if(AviviD.likrTimer.isTouchDevice()){ //如果是支援觸碰的裝置
                            this.event_arr = ['touchend'];
                            jQuery('#is_touch_device').text('可支援觸碰的裝置將採用: touchend');
                        }else{
                            this.event_arr = ['click','scroll','keydown'];
                            jQuery('#is_touch_device').text('不支援觸碰的裝置將採用: click,scroll,keydown');
                        }
                        this.event_arr.forEach(element => AviviD.likrTimer.bindAdaptiveEvent(element));
                    }else{
                        jQuery(window).on('keydown mousemove mousedown scroll', function (e) {

                            AviviD.likr_timer = (AviviD.received % 2) ? AviviD.timeOut.browsing : AviviD.timeOut.landing; // reset
                            AviviD.likr_timer_ad_banner = AviviD.timeOut.ad_banner;
                            // AviviD.likr_timer = 5;
                        });
                    }
                },1500);


                //rick:因為underwear 手機版的頁面window物件不會滾動，所以目前先客製化，之後有其他客戶有需求再統一
                //rick:他們網頁的window能滾動了，所以註解掉
                // if(AviviD.category_id == "20170720001000")//underwear
                // {
                //     var myElement=document.getElementsByClassName("st-content");
                //     myElement[0].addEventListener("scroll", function(ev){
                //         AviviD.likr_timer = (AviviD.received % 2) ? AviviD.timeOut.browsing : AviviD.timeOut.landing; // reset
                //         AviviD.likr_timer_ad_banner = AviviD.timeOut.ad_banner;
                //     });
                // }

            },
            native_init: function (method, status = null) {

                jQuery(window).on('keydown mousemove mousedown scroll', function (event) {

                    if (AviviD.start_browse == 0) {
                        AviviD.likrTimer.intervalTrigger(method, status);
                        AviviD.start_browse = 1;
                        jQuery(this).unbind(event);
                    }

                });
            },
            resetTime: function () {

                AviviD.likr_timer = (AviviD.received % 2) ? AviviD.timeOut.browsing : AviviD.timeOut.landing;
                AviviD.likr_timer_ad_banner = AviviD.timeOut.ad_banner;
                // AviviD.likr_timer = 5;
            },
            intervalTrigger_ad_banner: function (method, status = null) {
                AviviD.likrTimer.clearTimer_ad_banner();
                AviviD.intervalTimeoutId_ad_banner = setInterval(function () {
                    // AviviD.likrTimer.test.countDown();
                    AviviD.likr_timer_ad_banner--;
                    if (AviviD.likr_timer_ad_banner == 0) {
                        method(status);
                        AviviD.likrTimer.clearTimer_ad_banner();
                    }
                }, 1000);
            },
            intervalTrigger: function (method, status = null) {
                AviviD.likrTimer.clearTimer();
                AviviD.intervalTimeoutId = setInterval(function () {
                    // AviviD.likrTimer.test.countDown();
                    AviviD.likr_timer--;
                    if (AviviD.likr_timer == 0) {
                        AviviD.likrTimer.timesUp_times++;
                        method(status);
                    }
                }, 1000);
            },
            clearTimer_ad_banner: function () {
                if ('undefined' != AviviD.intervalTimeoutId_ad_banner) {
                    clearTimeout(AviviD.intervalTimeoutId_ad_banner);
                }
            },
            clearTimer: function () {
                // console.log('清除Timer嗎？');
                if ('undefined' != AviviD.intervalTimeoutId) {
                    // console.log('清除Timer了');
                    clearTimeout(AviviD.intervalTimeoutId);
                }
            },
            adaptiveRange: function(timeRange) {
                if(timeRange <= 2){
                    return 10;
                }else if(timeRange <= 4){
                    return 12;
                }else if(timeRange <= 6){
                    return 14;
                }else if(timeRange <= 8){
                    return 16;
                }else{
                    return 30;
                }
            },
            bindAdaptiveEvent: function(event){
                if(event == 'scroll'){
                    window.addEventListener(event, function ( event ) {

                        // Clear our timeout throughout the scroll
                        window.clearTimeout( AviviD.likrTimer.isScrolling );

                        // Set a timeout to run after scrolling ends
                        AviviD.likrTimer.isScrolling = setTimeout(function() {

                            // Run the callback
                            console.log( '滑動停止了' );
                            AviviD.likrTimer.likrTimerAssign();
                        }, 66);

                    }, false);
                }else{
                    window.addEventListener(event, AviviD.likrTimer.likrTimerAssign);
                }

            },
            likrTimerAssign: function(){
                // jQuery(window).on('tap swipe', function (e) {
                    AviviD.adaptive_tap_count++;
                    AviviD.likr_timer = (AviviD.received % 2) ? AviviD.timeOut.browsing : AviviD.timeOut.landing; // reset
                    AviviD.likr_timer_ad_banner = AviviD.timeOut.ad_banner;

                    if(AviviD.adaptive_tap_count == 1){
                        AviviD.adaptive_timer_end = AviviD.adaptive_timer;
                        AviviD.adaptive_flag = 0;
                    }else{
                        AviviD.adaptive_timer_start = AviviD.adaptive_timer_end;
                        AviviD.adaptive_timer_end = AviviD.adaptive_timer;
                        AviviD.adaptive_flag = 1;
                    }

                    // if(AviviD.likrTimer.timesUp_times == 0){
                    // /** 如果沒收過onpage則這一次就是landing時推播 **/
                    //     console.log('沒收過onpage採用landing時間');
                    //     jQuery('#onpage_status').text('沒收過onpage採用landing時間');
                    //     AviviD.likr_timer = AviviD.timeOut.landing;
                    // }else if(AviviD.likrTimer.timesUp_times > 0 && AviviD.adaptive_flag == 1){
                    // /** 依照使用者動作動態給予時間 **/
                    //     console.log('已收過onpage採用動態時間');
                    //     jQuery('#onpage_status').text('已收過onpage採用動態時間');
                    //     AviviD.likr_timer = AviviD.likrTimer.adaptiveRange(AviviD.adaptive_timer_end - AviviD.adaptive_timer_start);
                    //     console.log('使用者觸碰時間差:'+(AviviD.adaptive_timer_end - AviviD.adaptive_timer_start));
                    //     jQuery('#user_time_range').text('使用者觸碰時間差:'+(AviviD.adaptive_timer_end - AviviD.adaptive_timer_start));
                    //     console.log('onpage動態時間為:'+AviviD.likr_timer);
                    //     jQuery('#onpage_activity_time').text('onpage動態時間為:'+AviviD.likr_timer);
                    // }else{
                    // /** 以防萬一都沒偵測到，則預設10秒 **/
                    //     console.log('所有條件不吻合採用預設時間:10');
                    //     AviviD.likr_timer = 10;
                    // }

                    if(AviviD.likrTimer.timesUp_times < 1){
                        /** 依照使用者動作動態給予時間 **/
                        AviviD.likr_timer = AviviD.likrTimer.adaptiveRange(AviviD.adaptive_timer_end - AviviD.adaptive_timer_start);
                        if(AviviD.onpage_debug_mode == 1){
                            console.log('使用者活動中，採用動態彈幕');
                            jQuery('#onpage_status').text('使用者開始活動，採用動態彈幕');
                            console.log('使用者觸碰時間差:'+(AviviD.adaptive_timer_end - AviviD.adaptive_timer_start));
                            jQuery('#user_time_range').text('使用者觸碰時間差:'+(AviviD.adaptive_timer_end - AviviD.adaptive_timer_start));
                            console.log('onpage動態時間為:'+AviviD.likr_timer);
                            jQuery('#onpage_activity_time').text('onpage動態時間為:'+AviviD.likr_timer);
                        }
                    }else{
                        /** 一頁只跳出一次 **/
                        if(AviviD.onpage_debug_mode == 1){
                            console.log('已跳出過onpage，不再跳出');
                        }
                        AviviD.likr_timer = -1;
                    }

                // });
            },
            isTouchDevice: function(){
                return ( 'ontouchstart' in window ) ||
                        ( navigator.maxTouchPoints > 0 ) ||
                        ( navigator.msMaxTouchPoints > 0 );
            },
            test: {
                contentNone: function () {
                    function insertAfter(newNode, referenceNode) {
                        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
                    }
                    if (typeof document.getElementsByTagName("h1")[1] == "undefined") {
                        var el = document.createElement("h1");
                        el.innerHTML = "廣告預算已使用完畢，沒有廣告素材顯示";
                        insertAfter(el, document.getElementsByTagName("h1")[0]);
                    } else {
                        document.getElementsByTagName("h1")[1].innerHTML = "廣告預算已使用完畢，沒有廣告素材顯示";
                    }
                },
                countDown: function () {
                    if (typeof jQuery("html>h1").html() == "undefined") {
                        jQuery("html").prepend("<h1>推播倒數: " + AviviD.likr_timer + "</h1>");
                    } else if (AviviD.likr_timer >= 0) {
                        document.getElementsByTagName("h1")[0].innerHTML = "推播倒數: " + AviviD.likr_timer;
                    } else {
                        document.getElementsByTagName("h1")[0].innerHTML = "觸碰螢幕或</br>將滑鼠移動到視窗內，</br>使推播開始重新倒數。";
                    }
                },
                pushSuccess: function () {
                    function insertAfter(newNode, referenceNode) {
                        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
                    }
                    if (typeof document.getElementsByTagName("h1")[1] == "undefined") {
                        var el = document.createElement("h1");
                        el.innerHTML = "推播";
                        insertAfter(el, document.getElementsByTagName("h1")[0]);
                    } else {
                        document.getElementsByTagName("h1")[1].innerHTML = "推播";
                    }
                }
            }
        };
    }
    // //only for browsing 20s push
    // AviviD.timeout_push = function (timeout, cycle_enable) {
    //     AviviD.timeout_id = setTimeout(async function () {
    //         await AviviD.onpage_push('browsing');

    //         if (cycle_enable) {
    //             AviviD.interval_id = setInterval(async function () {
    //                 await AviviD.onpage_push('browsing');
    //             }, AviviD.timeout);
    //         }
    //     }, timeout);
    // }

    AviviD.visibilitychange = function (hide) {
        //計時器每個固定時間跳onpage，同一個domain共同計時，跨domain暫停
        // if (hide) {
        //     AviviD.timestamp += new Date().getTime() - AviviD.in_time;
        //     AviviD.set_cookie_days('AviviD_browse_time', AviviD.timestamp, 1);
        //     if ('undefined' != AviviD.timeout_id) {
        //         clearTimeout(AviviD.timeout_id);
        //     }
        //     if ('undefined' != AviviD.interval_id) {
        //         clearInterval(AviviD.interval_id);
        //     }

        // }
        // else {
        //     AviviD.timestamp = (!AviviD.empty(AviviD.get_cookie('AviviD_browse_time'))) ? parseInt(AviviD.get_cookie('AviviD_browse_time'), 10) : 0;
        //     // AviviD.console(AviviD.timestamp);
        //     AviviD.in_time = new Date().getTime();

        //     AviviD.timeout_push(AviviD.timeout - (AviviD.timestamp % AviviD.timeout), 0);


        // }

        //以上為上個版本的計時器=================================
        // TODO: 清除計時器
        AviviD.likrTimer.clearTimer();
        // if ('undefined' != AviviD.intervalTimeoutId) {
        //     clearTimeout(AviviD.intervalTimeoutId);
        // }
        if (!hide) {
            // TODO: 回歸預設到數秒數，重新倒數
            AviviD.likrTimer.resetTime();
            // var max_time = (parseFloat(AviviD.settings.onpage_timeout_first).toString() != "NaN") ? AviviD.settings.onpage_timeout_first : 50;
            // AviviD.likr_timer = max_time;
            // TODO: 啟動定時觸發推播
            //有出去再進來才需要，從別的分頁進來不用
            if (AviviD.leave == 1) {
                AviviD.likrTimer.intervalTrigger(AviviD.onpage_push);
            }

            // AviviD.intervalTimeoutId = setInterval(function(){
            //     AviviD.likr_timer--;
            //     if(AviviD.likr_timer == 0){
            //         AviviD.onpage_push();
            //     }
            // }
            // ,1000);
        }
        else {
            AviviD.leave = 1;
        }

    }
    /*
     * 啟動onpage推薦
     */
    AviviD.onpage_enable = function () {
        var already_exist = (AviviD.get_cookie('AviviD_already_exist') != null) ? AviviD.get_cookie('AviviD_already_exist') : 0;
        // if(already_exist == '1' && AviviD.settings.onpage_enable != '2')
        // {
        //     var ua = AviviD.UAResult;
        //     var reg_data = {
        //                 "web_id": AviviD.web_id,
        //                 "uuid": AviviD.uuid,
        //                 "browser_ver": ua.browser.version,
        //                 "os_ver": ua.os.version,
        //                 "user_agent": ua.ua,
        //                 "client_href": window.location.href,
        //                 "os_type": AviviD.int_os_type,
        //                 "browser_type": AviviD.int_browser_type,
        //     };

        //     jQuery.ajax({
        //         url: "https://load-balancer.likr.com.tw/pushServer/precount_onpage.php",
        //         type: "POST",
        //         data: reg_data,
        //         dataType: "json",
        //         success: function (data) {
        //             AviviD.console(data);

        //         },
        //         error: function (xhr, ajaxOptions, thrownError) {
        //             AviviD.console("xhr :", xhr);
        //             AviviD.console("ajaxOptions :", ajaxOptions);
        //             AviviD.console("thrownError :", thrownError);
        //             AviviD.console('status code : ' + xhr.status + ' , ajaxOptions : ' + ajaxOptions);
        //         }
        //     });
        // }
        if (AviviD.settings.onpage_enable != '0') {
            //取得文章標題
            jQuery(document).ready(function () {
                AviviD.get_article_title();
            });

        }
        if ((AviviD.settings.onpage_enable == '2') && already_exist == '1') {
            // document.onvisibilitychange = function(){
            //     AviviD.visibilitychange();
            // }



            // TODO: 初始化推播計時器
            AviviD.likrTimer.init();
            AviviD.likrTimer.native_init(AviviD.onpage_push);
            // var max_time = (parseFloat(AviviD.settings.onpage_timeout_first).toString() != "NaN") ? AviviD.settings.onpage_timeout_first : 50;
            // AviviD.likr_timer = max_time;
            // $(window).on('keydown mousemove mousedown scroll', function(e) {
            //      AviviD.likr_timer = max_time; // reset
            // });

            AviviD.page_view();

            jQuery(document).ready(function () {
                // AviviD.timeout_id = setTimeout(async function () {
                //     await AviviD.onpage_push('landing');

                //     AviviD.timeout_push(AviviD.timeout, 0);
                // }, likr_timeout);
                AviviD.leave = 0;
                window.onfocus = function () {

                    AviviD.visibilitychange(false);
                }
                window.onblur = function () {

                    AviviD.visibilitychange(true);
                }
                // TODO: 啟動定時觸發推播
                // AviviD.likrTimer.intervalTrigger(AviviD.onpage_push);
                // AviviD.intervalTimeoutId = setInterval(function(){
                //     AviviD.likr_timer--;
                //     if(AviviD.likr_timer == 0){
                //         AviviD.onpage_push();
                //     }
                // }
                // ,1000);
            });


            // setTimeout(async function(){
            //     await AviviD.onpage_push('browsing');
            // },18000);
        }
    }

    /*
     * 爬蟲格式微調
     */
    AviviD.get_article_title = function () {

        if (AviviD.web_id == 'pixnet') {
            AviviD.settings.payment_selector = (undefined != document.body.dataset.articleId) ? '#article-' + document.body.dataset.articleId + ' > h2 > a' : '_';
        }
        else {
            AviviD.settings.payment_selector = (AviviD.detect_is_mobile(AviviD.str_os_type)) ? AviviD.settings.payment_selector_m : AviviD.settings.payment_selector;
        }

        // AviviD.title = (document.querySelector(AviviD.settings.payment_selector) !== null) ? document.querySelector(AviviD.settings.payment_selector).innerHTML : '_';

        if(document.querySelector("meta[property='og:title']") !== null)
        {
            AviviD.title = document.querySelector("meta[property='og:title']").getAttribute('content');
        }
        else if(document.querySelector("title") !== null)
        {
            AviviD.title = document.querySelector("title").innerHTML;
        }
        else if(document.querySelector(AviviD.settings.payment_selector) !== null)
        {
            AviviD.title = document.querySelector(AviviD.settings.payment_selector).innerHTML;
        }
        else
        {
            AviviD.title = '_';
        }

        return AviviD.title;

    };

    /**
     * 取得url get 欄位資料
     * 支援safari
     */
    AviviD.get_urlparam = function (name) {
        //宣告正規表達式
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        /*
         * window.location.search 獲取URL ?之後的參數(包含問號)
         * substr(1) 獲取第一個字以後的字串(就是去除掉?號)
         * match(reg) 用正規表達式檢查是否符合要查詢的參數
        */
        var r = window.location.search.substr(1).match(reg);
        //如果取出的參數存在則取出參數的值否則回穿null
        if (r != null) return unescape(r[2]); return null;
    }

    /**
     * 取得uuid
     */
    AviviD.get_uuid = function () {
        AviviD.status.is_new_user_uuid = "0";

        // add for redirect page will give uuid
        // var url_string = window.location.href;
        // var url = new URL(url_string);

        if (AviviD.get_urlparam('likr_id')) {
            try {
                var new_uuid = window.atob(AviviD.get_urlparam('likr_id'));
                AviviD.set_cookie('AviviD_uuid', new_uuid);
                AviviD.set_cookie('uuid', new_uuid);
                AviviD.status.is_new_user_uuid = '1';
                AviviD.uuid = new_uuid;
            } catch (err) {
                // AviviD.console(err);
                AviviD.set_cookie('AviviD_uuid', '');
            }
        }

        var website_uuid = AviviD.get_cookie('AviviD_uuid');

        // var uuid_reset = AviviD.get_cookie("AviviD_single_push_uuid_reset");



        if (AviviD.empty(website_uuid)) {
            //如果沒有uuid但是瀏覽器又是safari，且沒有cookie權限，先擋掉報錯的狀況(先不處理uuid)
            temp_os = AviviD.detect_browser_type();
            var hasCookiePermission = document.cookie.indexOf("hasCookiePermission=true") != -1;
            if ((temp_os == 'iOS' || temp_os == 'Safari') && !hasCookiePermission) {
                // //ios safari uuid暫時產生方式
                // TODO:判斷localstorage 有沒有 uuid
                uuid = AviviD.get_ios_uuid();
                AviviD.set_cookie('AviviD_uuid', uuid);
            } else {
                // if (!uuid_reset) {
                window.addEventListener('message', function (event) {
                    AviviD.uuid_origin = event.origin;
                    if (AviviD.uuid_origin === 'https://auto-load-balancer.likr.com.tw') {
                        // var data_str = event.data;
                        // var data_array = data_str.split(',');
                        // var uuid = data_array[0];
                        // var gen_uuid = data_array[1] ? data_array[1] : 0;
                        //2020-03-26修正 split會報錯現象
                        if (event.data === null) {
                            var uuid = AviviD.get_ios_uuid();
                            // alert('cant get uuid'+uuid);
                        } else {
                            var uuid = event.data;
                            // alert('get uuid'+uuid);
                        }
                        AviviD.set_cookie('AviviD_uuid', uuid);
                        AviviD.status.is_new_user_uuid = '1';
                        AviviD.uuid = uuid;
                        // if (gen_uuid == '1') {
                        //     AviviD.set_cookie('AviviD_single_push_uuid_reset', '1');
                        // }
                        //寫入廣告系統domain的uuid
                        var ad_iframe_tag = document.createElement('iframe');
                        ad_iframe_tag.id = 'AviviD_ad_uuid_iframe';
                        ad_iframe_tag.src = 'https://sun.advividnetwork.com/include_code/uuid_iframe.html?uuid=' + uuid;
                        ad_iframe_tag.style = 'display:none';
                        if (document.body) {
                            document.body.appendChild(ad_iframe_tag);
                            var AviviD_ad_uuid_iframe = document.getElementById('AviviD_ad_uuid_iframe');
                            AviviD_ad_uuid_iframe.style.display = 'none';  // 適用舊版ie
                        }
                        AviviD.set_cookie('AviviD_refresh_uuid_status', 1);
                    }
                }, false);

                // document.write("<iframe src='https://load-balancer.likr.com.tw/pushEndPoint/subscribe/v2/api/uuid_iframe.php' style='display:none'></iframe>");
                //========================
                var iframe_tag = document.createElement('iframe');
                iframe_tag.id = 'AviviD_likr_uuid_iframe';
                iframe_tag.src = 'https://auto-load-balancer.likr.com.tw/pushEndPoint/uuid_gen/uuid_iframe.php';
                iframe_tag.style = 'display:none';
                if (document.body) {

                    document.body.appendChild(iframe_tag);
                    var AviviD_likr_uuid_iframe = document.getElementById('AviviD_likr_uuid_iframe');
                    AviviD_likr_uuid_iframe.style.display = 'none';  // 適用舊版ie

                }
                else {
                    setTimeout(function () { AviviD.get_uuid() }, 500);
                }
                // window.onload=function(){
                //     document.body.appendChild(iframe_tag);
                // }
                //========================
                // }
                // else {
                //     var uuid = AviviD.get_cookie("AviviD_uuid");
                //     return uuid;
                // }
            }


        }
        else {
            if (!AviviD.empty(AviviD.web_id)) {
                var AviviD_refresh_uuid_status = AviviD.get_cookie('AviviD_refresh_uuid_status');
                if (AviviD.empty(AviviD_refresh_uuid_status) || AviviD_refresh_uuid_status == 1) {  //如果是空的或是等於1代表兩個domain uuid不同步
                    //嘗試再拿取一次uuid 來確認是否有安全標籤
                    window.addEventListener('message', function (event) {
                        AviviD.uuid_origin = event.origin;
                        if (AviviD.uuid_origin === 'https://auto-load-balancer.likr.com.tw') {
                            if (event.data === null) {
                                var uuid = AviviD.get_ios_uuid();
                            } else {
                                var uuid = event.data;
                            }
                            AviviD.set_cookie('AviviD_uuid', uuid);
                            AviviD.status.is_new_user_uuid = '1';
                            AviviD.uuid = uuid;
                            website_uuid = uuid;
                            //寫入廣告系統domain的uuid
                            var ad_iframe_tag = document.createElement('iframe');
                            ad_iframe_tag.id = 'AviviD_ad_uuid_iframe';
                            ad_iframe_tag.src = 'https://sun.advividnetwork.com/include_code/uuid_iframe.html?uuid=' + uuid;
                            ad_iframe_tag.style = 'display:none';
                            if (document.body) {
                                document.body.appendChild(ad_iframe_tag);
                                var AviviD_ad_uuid_iframe = document.getElementById('AviviD_ad_uuid_iframe');
                                AviviD_ad_uuid_iframe.style.display = 'none';  // 適用舊版ie
                            }
                            AviviD.set_cookie('AviviD_refresh_uuid_status', 2);
                        }
                    }, false);
                    var iframe_tag = document.createElement('iframe');
                    iframe_tag.id = 'AviviD_likr_uuid_iframe';
                    iframe_tag.src = 'https://auto-load-balancer.likr.com.tw/pushEndPoint/uuid_gen/uuid_iframe.php';
                    iframe_tag.style = 'display:none';
                    if (document.body) {

                        document.body.appendChild(iframe_tag);
                        var AviviD_likr_uuid_iframe = document.getElementById('AviviD_likr_uuid_iframe');
                        AviviD_likr_uuid_iframe.style.display = 'none';  // 適用舊版ie
                    }
                    else {
                        setTimeout(function () { AviviD.get_uuid() }, 500);
                    }
                }
            }

            return website_uuid;
        }



        // var uuid = AviviD.get_cookie("AviviD_uuid");

        // if ( AviviD.empty(uuid) )
        // {

        //     //新增接聽uuid_iframe的 event
        //     window.addEventListener('message', function(event)
        //     {
        //         AviviD.uuid_origin = event.origin;
        //         if( AviviD.uuid_origin === 'https://load-balancer.likr.com.tw' )
        //         {
        //             var uuid = event.data;
        //             AviviD.set_cookie('AviviD_uuid', uuid);
        //             AviviD.status.is_new_user_uuid = '1';
        //             AviviD.uuid = uuid;
        //         }
        //     }, false);

        //     // var AviviD_uuid_iframe = document.createElement('iframe');
        //     // AviviD_uuid_iframe.src = 'https://load-balancer.likr.com.tw/pushEndPoint/subscribe/v2/api/uuid_iframe.php';
        //     // AviviD_uuid_iframe.style = 'display:none';
        //     // document.write(AviviD_uuid_iframe.outerHTML);
        //     document.write("<iframe src='https://load-balancer.likr.com.tw/pushEndPoint/subscribe/v2/api/uuid_iframe.php' style='display:none'></iframe>");
        //     //新增隱藏iframe
        //     // var AviviD_uuid_iframe = document.createElement("iframe");
        //     // AviviD_uuid_iframe.setAttribute("src", 'https://load-balancer.likr.com.tw/pushEndPoint/subscribe/v2/api/uuid_iframe.php');
        //     // AviviD_uuid_iframe.setAttribute("style", "display:none");
        //     // document.body.appendChild(AviviD_uuid_iframe);

        // }
        // else
        // {
        //     return uuid;
        // }

    };
    /** 2020/02/04 jay
     * 取得 ios_uuid
     */
    AviviD.get_ios_uuid = function () {
        var gen_uuid = function _uuid() {
            var d = Date.now();
            if (typeof performance !== 'undefined' && typeof performance.now === 'function') {
                d += performance.now(); //use high-precision timer if available
            }
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
                var r = (d + Math.random() * 16) % 16 | 0;
                d = Math.floor(d / 16);
                return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
            });
        }
        var ios_uuid = "";
        AviviD.status.is_new_user_ios_uuid = "0";
        if ((AviviD.get_cookie('AviviD_ios_uuid') == null)) {
            if (localStorage.getItem('AviviD_ios_uuid') == null) {
                ios_uuid = gen_uuid();
                AviviD.status.is_new_user_ios_uuid = "1";
            } else {
                ios_uuid = localStorage.getItem('AviviD_ios_uuid');
            }
        } else {
            ios_uuid = AviviD.get_cookie('AviviD_ios_uuid');
        }
        AviviD.set_cookie('AviviD_ios_uuid', ios_uuid);
        localStorage.setItem('AviviD_ios_uuid', ios_uuid);
        return ios_uuid;
    }
    /**
     * 取得webuserid
     */
    AviviD.get_webuserid = function () {
        var webuserid = AviviD.get_cookie('webuserid');
        AviviD.status.is_new_user_webuserid = '0';

        if (!webuserid) {
            webuserid = AviviD.gen_webuserid();
            AviviD.set_cookie('webuserid', webuserid);
            AviviD.status.is_new_user_webuserid = '1';
        }
        return webuserid;
    };

    /**
     * 產生webuserid
     */
    AviviD.gen_webuserid = function () {
        var Avivid_S4 = function () {
            return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
        };

        return (Avivid_S4() + Avivid_S4() + '-' + Avivid_S4() + '-' + Avivid_S4() + '-' + Avivid_S4() + '-' + Avivid_S4() + Avivid_S4() + Avivid_S4());
    };

    /**
     * 取得網站設定
     */
    AviviD.get_website_info = function () {

        /*********************
         * 檢查是否需要更新 END *
         *********************/

        //需要更新網站設定(20200318 開始不寫入localstorage 所以不需要檢查，每次都要讀檔案)
        // if (AviviD.status.do_update) {
        var json_data = JSON.stringify(AviviD.ajax_data);

        var URLs = "https://avivid.likr.tw/settings_file_json/" + AviviD.category_id + ".json";

        jQuery.ajax({
            type: "GET",
            url: URLs,
            dataType: "json",
            success: function (data) {

                // var data_array = result.split('\n');
                // var column = data_array[0].split(',');
                // var value = data_array[1].split(',');

                // var data = value.reduce(function (data, field, index) {
                //     data[column[index]] = field;
                //     return data;
                // }, {});

                if (data.sender_id == '_') {
                    data.sender_id = '912321621860';
                }


                AviviD.status.get_website_info = '1';


                //AviviD.console('get_website_info : ', data);

                if (AviviD.status.get_website_info == "1") {
                    AviviD.settings.is_aws = data.is_aws;
                    AviviD.settings.is_crescent = data.is_crescent;
                    AviviD.settings.icon_path = data.icon_path;
                    AviviD.settings.string_ring_icon = data.ring_icon;
                    AviviD.settings.sw_type = data.sw_type;
                    AviviD.settings.channel_id = data.channel_id;
                    AviviD.settings.push_banner_data_title = data.banner_title;
                    AviviD.settings.push_banner_data_content = data.banner_content;
                    AviviD.settings.banner_button_allow = data.banner_button_allow;
                    AviviD.settings.banner_button_deny = data.banner_button_deny;
                    AviviD.settings.push_banner_data_interval = data.banner_interval_mins;
                    AviviD.settings.push_banner_data_position = data.banner_position;
                    AviviD.settings.ring_position_top = data.ring_position_top;
                    AviviD.settings.ring_position_bottom = data.ring_position_bottom;
                    AviviD.settings.ring_position_left = data.ring_position_left;
                    AviviD.settings.ring_position_right = data.ring_position_right;
                    AviviD.settings.show_ring_after_subscribed = data.ring_display;
                    AviviD.settings.show_ring = data.show_ring;
                    AviviD.settings.ring_size_height = data.ring_size_height;
                    AviviD.settings.ring_size_width = data.ring_size_width;
                    AviviD.settings.banner_allow_btn = data.banner_allow_btn;
                    AviviD.settings.banner_cancel_btn = data.banner_cancel_btn;
                    AviviD.settings.ring_before_background_path = data.ring_before_background_path;
                    AviviD.settings.ring_after_background_path = data.ring_after_background_path;
                    AviviD.settings.new_onpage_version=data.new_onpage_version;

                    AviviD.settings.fb_banner_title = data.fb_banner_title;
                    AviviD.settings.fb_banner_content = data.fb_banner_content;
                    AviviD.settings.fb_banner_icon = data.fb_banner_icon;

                    AviviD.settings.add_ecommerce_listener = data.add_ecommerce_listener;

                    AviviD.settings.string_banner_icon = data.banner_icon;
                    AviviD.settings.ring_position_mtop = data.ring_position_mtop;
                    AviviD.settings.ring_position_mbottom = data.ring_position_mbottom;
                    AviviD.settings.ring_position_mleft = data.ring_position_mleft;
                    AviviD.settings.ring_position_mright = data.ring_position_mright;
                    AviviD.settings.show_fb_banner = data.show_fb_banner;
                    AviviD.settings.pc_show_ring = data.pc_show_ring;
                    AviviD.settings.pc_show_banner = data.pc_show_banner;
                    AviviD.settings.mobile_show_ring = data.mobile_show_ring;
                    AviviD.settings.mobile_show_banner = data.mobile_show_banner;
                    AviviD.settings.banner_follow_specify_id = data.banner_follow_specify_id;
                    AviviD.settings.banner_follow_specify_class = data.banner_follow_specify_class;
                    AviviD.settings.banner_inread_class = data.banner_inread_class;
                    AviviD.settings.banner_inread_id = data.banner_inread_id;
                    AviviD.settings.switch_language = data.switch_language;

                    AviviD.settings.banner_follow_specify_m_id = data.banner_follow_specify_m_id;
                    AviviD.settings.banner_follow_specify_m_class = data.banner_follow_specify_m_class;
                    AviviD.settings.banner_inread_m_class = data.banner_inread_m_class;
                    AviviD.settings.banner_inread_m_id = data.banner_inread_m_id;
                    AviviD.settings.ios_enable = data.ios_enable;
                    AviviD.settings.banner_cancel_twice_exp_day = data.banner_click_cancel_twice_interval_days;

                    AviviD.settings.website_type = data.website_type;

                    AviviD.settings.native_enable = data.native_enable;
                    AviviD.settings.banner_enable = data.banner_enable;
                    AviviD.settings.onpage_enable = data.onpage_enable;
                    AviviD.settings.compensation_enable = data.compensation_enable;
                    AviviD.settings.onpage_timeout_first = data.onpage_timeout_first;
                    AviviD.settings.onpage_timeout_cycle = data.onpage_timeout_cycle;
                    AviviD.settings.onpage_with_ad = data.onpage_with_ad;

                    AviviD.settings.sub_banner_customer_enable = data.sub_banner_customer_enable;
                    AviviD.settings.ad_banner_enable = data.ad_banner_enable;
                    AviviD.settings.ad_banner_with_ad = data.ad_banner_with_ad;
                    AviviD.settings.ad_banner_position = data.ad_banner_position;
                    AviviD.settings.ad_banner_pic_position = data.ad_banner_pic_position;
                    AviviD.settings.ad_banner_timer = data.ad_banner_timer;
                    AviviD.settings.ad_banner_life_cycle = data.ad_banner_life_cycle;

                    AviviD.settings.onpage_position = data.onpage_position;
                    AviviD.settings.onpage_position_vh = data.onpage_position_vh;
                    AviviD.settings.onpage_pc_position = data.onpage_pc_position;
                    AviviD.settings.onpage_pic_position = data.onpage_pic_position;

                    AviviD.settings.track_behavior_enable = data.track_behavior_enable;
                    AviviD.settings.ip_enable = data.ip_enable;

                    AviviD.settings.payment_selector = data.payment_selector;
                    AviviD.settings.payment_selector_m = data.payment_selector_m;

                    AviviD.settings.payment_url = data.payment_url;
                    AviviD.settings.payment_url_m = data.payment_url_m;

                    AviviD.settings.checkout_url = data.checkout_url;
                    AviviD.settings.checkout_url_m = data.checkout_url_m;
                    AviviD.settings.checkout_trigger_class = data.checkout_trigger_class;
                    AviviD.settings.checkout_trigger_class_m = data.checkout_trigger_class_m;
                    AviviD.settings.checkout_data_class = data.checkout_data_class;
                    AviviD.settings.checkout_data_class_m = data.checkout_data_class_m;
                    AviviD.settings.cart_url = data.cart_url;
                    AviviD.settings.cart_url_m = data.cart_url_m;
                    AviviD.settings.cart_data_class = data.cart_data_class;
                    AviviD.settings.cart_data_class_m = data.cart_data_class_m;
                    AviviD.settings.number_url = data.number_url;
                    AviviD.settings.number_url_m = data.number_url_m;
                    AviviD.settings.number_trigger_class = data.number_trigger_class;
                    AviviD.settings.number_trigger_class_m = data.number_trigger_class_m;
                    AviviD.settings.number_data_id = data.number_data_id;
                    AviviD.settings.number_data_id_m = data.number_data_id_m;

                    AviviD.settings.back_page_enable = data.back_page_enable;

                    AviviD.settings.ad_block_enabled = data.ad_block_enabled;  // seo, 推薦版位 總開關
                    AviviD.settings.ad_block_abtest_enabled = data.ad_block_abtest_enabled; // seo, 推薦版位 abtest 開關
                    AviviD.settings.ad_block_abtest_ratio = data.ad_block_abtest_ratio;// seo, 推薦版位 abtest 各版位分流機率(%)
                    AviviD.settings.ad_block_abtest_start_time = data.ad_block_abtest_start_time; // seo, 推薦版位 abtest 走期開始時間
                    AviviD.settings.ad_block_abtest_end_time = data.ad_block_abtest_end_time;     // seo, 推薦版位 abtest 走期結束時間

                    AviviD.settings.geolocation_enable = data.geolocation_enable;
                    AviviD.settings.pwa_enable = data.pwa_enable;
                    AviviD.settings.console_enable = data.console_enable;

                    AviviD.settings.SENDER_ID = data.sender_id;

                    AviviD.settings.banner_native = data.banner_native;
                    //sw scope 客製化
                    // console.log(data.sw_path);
                    // console.log(data.sw_scope);
                    if(data.sw_path == '_' || !data.sw_path )
                    {
                        AviviD.sw_path = '/firebase-messaging-sw.js';
                    }
                    else
                    {
                        AviviD.sw_path = data.sw_path;
                    }
                    if(data.sw_scope == '_' || !data.sw_scope)
                    {
                        AviviD.sw_scope = '/firebase-cloud-messaging-push-scope';
                    }
                    else
                    {
                        AviviD.sw_scope = data.sw_scope;
                    }

                    AviviD.update_time = new Date().getTime();
                    AviviD.status.update_time = AviviD.convert_timestamp_to_time(AviviD.update_time);

                    if(AviviD.settings.is_aws == 1)
                    {
                        AviviD.load_aws();
                    }



                    AviviD.switch_show_mode();
                    // if (AviviD.settings.checkout_url != '_') {
                    //     if (AviviD.settings.add_ecommerce_listener == '1') {
                    //         window.addEventListener('click', function () {
                    //             AviviD.run_get_shopping_data();
                    //         })
                    //     }
                    //     else {
                    //         AviviD.run_get_shopping_data();
                    //     }
                    // }
                }
                else {
                    AviviD.console("AviviD get_website_info : status => " + data.status + ", resText => " + data.resText);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                AviviD.console("jqXHR :", jqXHR);
                AviviD.console("textStatus :", textStatus);
                AviviD.console("errorThrown :", errorThrown);
            }
        });
        // for new onpage settings
        if(AviviD.allow_new_onpage_category_id.indexOf(AviviD.category_id) != -1){
            URLs = "https://avivid.likr.tw/settings_file/" + AviviD.web_id + ".json";
            jQuery.ajax({
                type: "GET",
                url: URLs,
                cache:false,
                credentials: 'same-origin',
                dataType: "json",
                success: function (data){
                    // console.log('iroo setting file:');
                    // console.log(data);
                    AviviD.settings.adaptive_push = parseInt(data['adaptive_push']);// 1:動態彈幕開啟 0:關閉
                    AviviD.settings.event_trigger = parseInt(data['event_trigger']);// 1:event開啟 0:關閉
                    AviviD.settings.redirect_action = parseInt(data['redirect_action']);// 1:開新視窗 0:直接轉址
                    jQuery('#adaptive_push>span').text(AviviD.settings.adaptive_push);
                    jQuery('#event_trigger>span').text(AviviD.settings.event_trigger);
                    jQuery('#redirect_action>span').text(AviviD.settings.redirect_action);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    AviviD.console("jqXHR :", jqXHR);
                    AviviD.console("textStatus :", textStatus);
                    AviviD.console("errorThrown :", errorThrown);
                }
            });
        }
        //=============================20200318 update ====================
        // }
        // //不需更新網站設定
        // else
        // {
        //     AviviD.status.get_website_info = "0";


        //     AviviD.switch_show_mode();
        //     // if (AviviD.settings.checkout_url != '_') {
        //     //     if (AviviD.settings.add_ecommerce_listener == '1') {
        //     //         window.addEventListener('click', function () {
        //     //             AviviD.run_get_shopping_data();
        //     //         })
        //     //     }
        //     //     else {
        //     //         AviviD.run_get_shopping_data();
        //     //     }
        //     // }
        // }
        //========================================================
    };

    /**
     * 選擇ring && banner顯示模式
     */
    AviviD.switch_show_mode = function () {


        AviviD.status.is_push_supported = AviviD.detect_is_push_supported();
        /**
         * 關閉 iOS
         */
        if (AviviD.settings.ios_enable == '0' && AviviD.int_os_type == '2') {
            AviviD.console('AviviD : iOS is disabled.')
            return;
        }

        // 是否為假原生訂閱
        if (AviviD.status.is_push_supported) {
            if (AviviD.settings.native_enable === "1") {
                AviviD.webpush_scheme_native();
            }
            else if (AviviD.settings.banner_enable === "1") {

                if (AviviD.int_browser_type != '5' && AviviD.int_browser_type != '6') {
                    AviviD.banner_old();
                }

            }
        }
        else {
            AviviD.console("Your Browser is not supported Push Notification");
        }

    };

    /**
     * 檢查是否支援推播
     * @return boolean
     */
    AviviD.detect_is_push_supported = function () {
        // console.log(parser.getResult());
        var ua = AviviD.UAResult;
        // os
        var iosdevice = /(ipod|iphone|ipad)/i.test(ua.ua),
            mac = /(mac os)/i.test(ua.os.name),
            chrome = /chrome/i.test(ua.browser.name),
            firefox = /firefox/i.test(ua.browser.name),
            safari = /safari/i.test(ua.browser.name),
            ie = /(Trident|MSIE)/i.test(ua.ua),
            line = /line/i.test(ua.ua),
            likeAndroid = /like android/i.test(ua.ua),
            android = !likeAndroid && /android/i.test(ua.ua),
            edge = /edge/i.test(ua.ua),
            samsung = /Samsung/i.test(ua.browser.name);;

        //Chrome 最低支援版本 GCM:49 FCM:50
        var chrome_min_support_version = (AviviD.settings.sw_type === "fcm") ? 50 : 49;

        //判斷safari OSX 版本的相關處理,只處理 OSX 高於10.9的版本
        if (chrome) {
            if (ua.browser.version.split(".", 4)[0] < chrome_min_support_version) {
                var chrome = 0;
            }
        }
        else if (firefox) {
            if (ua.browser.version.split(".", 4)[0] < 44) {
                var firefox = 0;
            }
        }

        if (chrome || firefox || samsung) {
            if (iosdevice) {
                return false;
            }
            else {
                return true;
            }
        }
        else {
            return false;
        }

    }

    AviviD.protocol_firebase_accept = function () {
        if (location.protocol == 'http:') {
            return false;
        }
        else if (location.protocol == 'https:') {
            return true;
        }
        else {
            return true;
        }
    }

    /**
     * 推播顯示方案 原生訂閱
     */
    AviviD.webpush_scheme_native = function () {
        sw_series_browser = ['Chrome', 'Firefox', 'Samsung Browser'];
        if (AviviD.in_array(AviviD.str_browser_type, sw_series_browser)) {
            AviviD.debugLog('sw_series_browser:', AviviD.str_browser_type);
            var already_exist_sub = (AviviD.get_cookie('AviviD_already_exist') != null) ? AviviD.get_cookie('AviviD_already_exist') : 0;
            if (AviviD.protocol_firebase_accept() && already_exist_sub != '1') {
                AviviD.loadFirebase();
            }else{//210505 william
                AviviD.requestGeolocation();
            }
        }
        else if (AviviD.str_browser_type == 'Safari') {
            if (AviviD.status.subscribe_status != '1') {
                AviviD.debugLog('apns:', AviviD.str_browser_type);
                if (AviviD.settings.banner_native == '2') {
                    if (AviviD.get_cookie('AviviD_already_exist') != '1') {
                        AviviD.safari_banner_subscribe(AviviD.settings.string_banner_icon, AviviD.settings.push_banner_data_title, AviviD.settings.push_banner_data_content, AviviD.settings.banner_allow_btn, AviviD.settings.banner_cancel_btn);
                    }
                }
                else {
                    if(AviviD.settings.is_aws == '1')
                    {
                        AviviD.regSafari_aws();
                    }
                    else
                    {
                        AviviD.regSafari();
                    }
                }

            }
            else {
                AviviD.debugLog('apns:', AviviD.str_browser_type);
                AviviD.debugLog('regSafari:', 'Subscribed');
                AviviD.requestGeolocation();
            }
        }
        else {
            AviviD.debugLog('AviviD: this browser is not supported push notification');
        }
    };

    //訂閱banner是否帶廣告
    AviviD.banner_sub = function()
    {
        var already_exist = (AviviD.get_cookie('AviviD_already_exist') != null) ? AviviD.get_cookie('AviviD_already_exist') : 0;

        if(already_exist == '0')
        {
            var already_show_banner = (AviviD.get_cookie('AviviD_show_banner') != null) ? AviviD.get_cookie('AviviD_show_banner') : 0;
            if(already_show_banner == '0')
            {

                if (AviviD.waterfall_subscribe_module && AviviD.highest_zindex && AviviD.subscribe_waterfall) {
                    AviviD.loadScript("https://avivid.likr.tw/api/avivid_waterfall_subscribe_v2.css", "AviviD_waterfall_subscribe");
                    AviviD.loadScript("https://avivid.likr.tw/api/avivid_waterfall_webpush.css", "AviviD_waterfall_webpush");
                    jQuery("html").append(AviviD.waterfall_subscribe_module(1, "AviviD.subscribe_agent_domain"));
                    AviviD.highest_zindex('avivid_waterfall');
                    AviviD.subscribe_waterfall(screen.width, 'avivid_waterfall_subscribe');
                }
                else {
                    setTimeout(function () { AviviD.banner_sub() }, 500);
                }

            }
            else if(already_show_banner == '1')
            {
                if(AviviD.settings.is_aws == '1')
                {
                    AviviD.requestPermissionFCM_aws();
                }
                else
                {
                    AviviD.requestPermissionFCM();
                }
            }

        }
        else
        {
            var already_show_sub = (AviviD.get_cookie('AviviD_show_sub') != null) ? AviviD.get_cookie('AviviD_show_sub') : 0;
            if (already_show_sub != '1') {
                if (AviviD.messaging && AviviD.waterfall_subscribe_module && AviviD.highest_zindex && AviviD.subscribe_waterfall) {
                    AviviD.messaging.getToken()
                        .then(function (currentToken) {
                            AviviD.console('token exists');
                        })
                        .catch(function (err) {

                            AviviD.loadScript("https://avivid.likr.tw/api/avivid_waterfall_subscribe_v2.css", "AviviD_waterfall_subscribe");
                            AviviD.loadScript("https://avivid.likr.tw/api/avivid_waterfall_webpush.css", "AviviD_waterfall_webpush");
                            jQuery("html").append(AviviD.waterfall_subscribe_module(1, "AviviD.compensation_subscribe"));
                            AviviD.highest_zindex('avivid_waterfall');
                            AviviD.subscribe_waterfall(screen.width, 'avivid_waterfall_subscribe');

                        });
                }
                else {
                    setTimeout(function () { AviviD.banner_sub() }, 500);
                }

            }
        }
    }

    AviviD.subscribe_agent_domain = function(choose)
    {
        switch (choose) {
            case 'accept':
                AviviD.set_cookie('AviviD_show_banner', '1');
                AviviD.waterfall_disappear("avivid_waterfall_subscribe");

                if(AviviD.settings.is_aws == '1')
                {
                    AviviD.requestPermissionFCM_aws();
                }
                else
                {
                    AviviD.requestPermissionFCM();
                }


                break;
            case 'block':
                AviviD.set_cookie_minutes('AviviD_show_banner', '2', AviviD.settings.ad_banner_life_cycle * 60);
                AviviD.waterfall_disappear("avivid_waterfall_subscribe");
                AviviD.waterfall_disappear('avivid_waterfall_subscribe_setting');

                break;
            default:
                break;
        }
    }

    /**
     * 檢查物件或變數是否為空
     */
    AviviD.empty = function (data) {
        if (typeof (data) == 'number' || typeof (data) == 'boolean') {
            return false;
        }

        //自訂判斷
        if (data === 'null' || data === 'undefined') {
            return true;
        }

        if (typeof (data) == 'undefined' || data === null) {
            return true;
        }

        if (typeof (data.length) != 'undefined') {
            return data.length == 0;
        }

        var count = 0;
        for (var i in data) {
            if (data.hasOwnProperty(i)) {
                count++;
            }
        }
        return count == 0;
    };

    /**
     * 取得頂級網域
     */
    AviviD.get_top_domain = function () {
        var domain = window.location.hostname;
        var isIP = /[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}/.test(domain);
        if (isIP) return domain;
        var length = domain.split('.').length;
        var domain_split_reverse = domain.split('.').reverse();
        if (length <= '2') {
            return domain;
        }
        else if (length == '3') {
            if (domain_split_reverse[1] === 'com') {
                return domain;
            }
            else {
                return domain_split_reverse[1] + "." + domain_split_reverse[0];
            }
        }
        else if (length == '4') {
            if (domain_split_reverse[0] === 'com') {
                return domain_split_reverse[1] + "." + domain_split_reverse[0];
            }
            else {
                return domain_split_reverse[2] + "." + domain_split_reverse[1] + "." + domain_split_reverse[0];
            }
        }
        else {
            return domain_split_reverse[2] + "." + domain_split_reverse[1] + "." + domain_split_reverse[0];
        }
    };

    /**
     * 寫入cookie(天數)
     * 預設 3650天(10年)
     */
    AviviD.set_cookie = function (name, value, days) {
        var domain = AviviD.get_top_domain();
        var Days = days || 3650;
        var exp = new Date();
        exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
        if(AviviD.protocol_firebase_accept())
        {
            document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString() + ";domain=" + domain + ";path=/;secure;";
        }
        else
        {
            document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString() + ";domain=" + domain + ";path=/;";
        }
    };

    /**
     * 寫入cookie(分鐘)
     * 預設 60分鐘(1小時)
     */
    AviviD.set_cookie_minutes = function (name, value, minutes) {
        var domain = AviviD.get_top_domain();
        var Mins = minutes || 60;
        var exp = new Date();
        exp.setTime(exp.getTime() + Mins * 60 * 1000);
        if(AviviD.protocol_firebase_accept())
        {
            document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString() + ";domain=" + domain + ";path=/;secure;";
        }
        else
        {
            document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString() + ";domain=" + domain + ";path=/;";
        }

    };

    /**
     * 寫入cookie(天)
     * 預設 30天(1個月)
     */
    AviviD.set_cookie_days = function (name, value, interval_days) {
        var domain = AviviD.get_top_domain();
        var interval_days = interval_days || 30;
        var days_exp = new Date();
        days_exp.setTime(days_exp.getTime() + interval_days * 24 * 60 * 60 * 1000);
        if(AviviD.protocol_firebase_accept())
        {
            document.cookie = name + "=" + escape(value) + ";expires=" + days_exp.toGMTString() + ";domain=" + domain + ";path=/;secure;";
        }
        else
        {
            document.cookie = name + "=" + escape(value) + ";expires=" + days_exp.toGMTString() + ";domain=" + domain + ";path=/;";
        }
    };

    /**
     * 取得cookie
     */
    AviviD.get_cookie = function (name) {
        var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
        if (arr != null) {
            return unescape(arr[2]);
        }
        return null;
    };

    /**
     * 刪除cookie
     */
    AviviD.delete_cookie = function (name) {
        var exp = new Date();
        exp.setTime(exp.getTime() - 1);
        var cval = AviviD.get_cookie(name);
        if (cval != null) {
            document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
        }
    };

    /**
     * 取得作業系統類型(string)
     */
    AviviD.detect_os_type = function () {
        return AviviD.UAResult.os.name;
    };

    /**
     * 作業系統類型(string) 轉 作業系統類型編號(number)
     */
    AviviD.trans_os_type_to_number = function (os_type) {
        switch (os_type) {
            case 'Android':
                return '1';
                break;
            case 'iOS':
                return '2';
                break;
            case 'Mac OS':
                return '3';
                break;
            case 'Windows':
                return '4';
                break;
            default:
                return '9';
                break;
        }
    };

    /**
     * 瀏覽器類型(string) 轉 瀏覽器類型編號(number)
     */
    AviviD.trans_browser_type_to_number = function (browser_type) {
        switch (browser_type) {
            case 'Chrome':
                return '1';
                break;
            case 'Firefox':
                return '2';
                break;
            case 'Safari':
                return '3';
                break;
            case 'iOS':
                return '4';
                break;
            case 'IE':
                return '5';
                break;
            case 'Edge':
                return '6';
                break;
            case 'Samsung Browser':
                return '8';
                break;
            case 'LINE':
                return '10';
                break;
            case 'weixin':
                return '11';
                break;
            case 'fbapp':
                return '12';
                break;
            case 'Instagram':
                return '13';
                break;
            case 'Opera':
                return '14'
                break;
            case 'Unknown':
            default:
                return '9';
                break;
        }
    };

    /**
     * 取得瀏覽器類型(string)
     */
    AviviD.detect_browser_type = function () {
        var isLINE = (navigator.userAgent.match(/line/i) != null),
            isiOS = (AviviD.UAResult.os.name == 'iOS'),
            isweixin = navigator.userAgent.toLowerCase().match(/MicroMessenger/i) == "micromessenger",//微信瀏覽器
            isfbapp = navigator.userAgent.indexOf('FBAV') > -1 || navigator.userAgent.indexOf('FBSV') > -1, //Facebook App 內瀏覽器(Android => FBAV, IOS => FBSV)
            isInstagram = navigator.userAgent.indexOf('Instagram') > -1; //Instagram 內瀏覽器
        isOpera = navigator.userAgent.indexOf("Opera") > -1 || navigator.userAgent.indexOf("OPR") > -1;

        if (isLINE) {
            return "LINE";
        } else if (isiOS) {
            return "iOS";
        } else if (isweixin) {
            return "weixin";
        } else if (isfbapp) {
            return "fbapp";
        } else if (isInstagram) {
            return "Instagram";
        } else if (isOpera) {
            return "Opera";
        } else {
            return AviviD.UAResult.browser.name;
        }
    };

    /**
     * timestamp 轉為 可閱讀的time
     * @param string|number timestamp
     * @return string
     */
    AviviD.convert_timestamp_to_time = function (timestamp) {
        var padLeft = function (str, lenght) {
            if (str.length >= lenght)
                return str;
            else
                return padLeft("0" + str, lenght);
        };

        var date = new Date(Number(timestamp));
        var time = date.getFullYear().toString() + "/"
            + padLeft((date.getMonth() + 1).toString(), 2) + "/"
            + padLeft(date.getDate().toString(), 2) + " "
            + padLeft(date.getHours().toString(), 2) + ":"
            + padLeft(date.getMinutes().toString(), 2) + ":"
            + padLeft(date.getSeconds().toString(), 2);
        return time;
    };

    /**
     * 檢查是否為行動裝置
     * @return boolean
     */
    AviviD.detect_is_mobile = function (str_os_type) {
        if (str_os_type == "Android" || str_os_type == "iOS") {
            return true;
        }
        else {
            return false;
        }
    };

    /**
     * 檢查是否為數字
     * @return boolean
     */
    AviviD.detect_is_numeric = function (n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    };



    AviviD.in_array = function (needle, haystack) {
        var length = haystack.length;
        for (var i = 0; i < length; i++) {
            if (haystack[i] == needle) return true;
        }
        return false;
    };

    AviviD.console = function (str, str2 = '') {
        if (AviviD.settings.console_enable == '1') {
            console.log(str, str2);
        }
    }

    /**
     * 引入Firebase JS
     */
    AviviD.loadFirebase = function () {
        let script_source_url;
        var sdk_version = {
                            'firebase-messaging-sw-v2':'https://avivid.likr.tw/pushEndPoint/js/firebasejs/6.6.2/firebase.js'
        };
        var sdk_path = 'https://avivid.likr.tw/pushEndPoint/js/firebasejs/4.1.3/firebase_g_scope.js';
        Object.keys(sdk_version).forEach(function(key){
            if(AviviD.sw_path.indexOf(key) > -1)
            {
                sdk_path = sdk_version[key];
            }
        });
        let _loadFirebase = function () {
            if (!window.firebase) {
                (function (w, d, s, url) {
                    var father = d.getElementsByTagName(s)[0] || d.getElementsByTagName('head')[0];
                    var script = d.createElement(s);
                    script.type = "text/javascript";
                    script.src = url;
                    father.parentNode.insertBefore(script, father);

                    script.addEventListener('load', function loadFirebase() {
                        script.removeEventListener('load', loadFirebase, false);
                        AviviD.firebaseInit();
                    }, false);
                })(window, document, 'script', sdk_path);
            }
            else {
                AviviD.firebaseInit();
            }
        }
        if (navigator.serviceWorker.controller)//檢查是否有正在運行的ServiceWorker
        {
            if (navigator.serviceWorker.controller.scriptURL.match(/.*\/firebase-messaging-sw.js$/))//如果ServiceWorker的腳本檔名為firebase-messaging-sw.js的話
            {
                if (AviviD.settings.pwa_enable == '1') {
                    script_source_url = 'https://avivid.likr.tw/pushEndPoint/js/firebasejs/4.1.3/firebase_scope.js';//將ServiceWorker註冊在網站的根域
                    window.addEventListener('beforeinstallprompt', AviviD.registerPWAEvent);
                    _loadFirebase();
                }
                else {
                    script_source_url = 'https://avivid.likr.tw/pushEndPoint/js/firebasejs/4.1.3/firebase_g_scope.js';//註冊在firebase-cloud-messaging-push-scope
                    navigator.serviceWorker.getRegistration().then(function (registration) {//取得ServiceWorker
                        registration.unregister();//將該ServiceWorker解除註冊
                        AviviD.status.subscribe_status = '0';//將訂閱狀態改成未訂閱
                        _loadFirebase();
                    });
                }
            }
            else {
                script_source_url = 'https://avivid.likr.tw/pushEndPoint/js/firebasejs/4.1.3/firebase_g_scope.js';//否則註冊在firebase-cloud-messaging-push-scope
                _loadFirebase();
            }
        }
        else {
            navigator.serviceWorker.getRegistrations().then(function (registrations) {//取得這個網站所有的ServiceWorker
                let status = 0, registration_temp = null;
                if (AviviD.settings.pwa_enable != '1') {
                    status = 2;
                }
                else {
                    for (let registration of registrations) {
                        if (registration.scope.match(/.*\/firebase-cloud-messaging-push-scope$/))//如果該ServiceWorker的作用域在firebase-cloud-messaging-push-scope
                        {
                            status |= 1;
                            registration_temp = registration;
                        }
                        else if (registration.scope.match(/.*\/$/))//如果該ServiceWorker的作用域該網站的根域
                        {
                            status |= 2;
                        }
                    }
                }

                switch (status) {
                    //當該網站的根沒有ServiceWorker
                    case 0:
                    case 1:
                        //如果該網站的firebase-cloud-messaging-push-scope作用域ServiceWorker且網站的根沒有ServiceWorker，
                        //則會將firebase-cloud-messaging-push-scope作用域ServiceWorker的解除註冊，並改在網站的根域註冊ServiceWorker，
                        //這樣子原本ServiceWorker的訂閱將會失效，不過因為訂閱權限已經是允許，所以在網站的根域註冊的ServiceWorker將會自動訂閱。
                        if (registration_temp)//如果該網站的firebase-cloud-messaging-push-scope作用域ServiceWorker
                        {
                            registration_temp.unregister();//將該ServiceWorker解除註冊
                        }
                        script_source_url = 'https://avivid.likr.tw/pushEndPoint/js/firebasejs/4.1.3/firebase_scope.js';
                        AviviD.status.subscribe_status = '0';//將訂閱狀態改成未訂閱
                        window.addEventListener('beforeinstallprompt', AviviD.registerPWAEvent);
                        break;
                    //當該網站的根有ServiceWorker
                    case 2:
                    case 3:
                        script_source_url = 'https://avivid.likr.tw/pushEndPoint/js/firebasejs/4.1.3/firebase_g_scope.js';
                        break;
                }
                _loadFirebase();
            });
        }
    }

    /**
     * 註冊PWA詢問使用者是否加該網站加入程式集事件
     */
    AviviD.registerPWAEvent = function (deferredPrompt) {
        deferredPrompt.prompt();
        deferredPrompt.userChoice.then(function (choiceResult) {
            if (choiceResult.outcome === 'accepted') {
                AviviD.console('User accepted the A2HS prompt');
            } else {
                AviviD.console('User dismissed the A2HS prompt');
            }
        });
    }

    /**
     * Firebase 初始化
     */
    AviviD.firebaseInit = function () {
        // Firebase 初始化
        var config = {
            messagingSenderId: AviviD.settings.SENDER_ID,
        };
        AviviD.firebaseApp = firebase.initializeApp(config, 'AviviD'); // (設定檔, 自訂app名稱)
        AviviD.console('AviviD.firebaseApp Init: ' + AviviD.firebaseApp.name);

        // 推播功能 初始化
        AviviD.messaging = AviviD.firebaseApp.messaging();

        // 訂閱要求
        if (AviviD.status.subscribe_status != '1') {
            if (AviviD.settings.banner_native == '0' || AviviD.settings.banner_native == '2') {

                if(AviviD.settings.ad_banner_enable == '1')
                {
                    AviviD.banner_sub();
                }
                else
                {
                    var already_exist = (AviviD.get_cookie('AviviD_already_exist') != null) ? AviviD.get_cookie('AviviD_already_exist') : 0;
                    if (already_exist == 0) {
                        if(AviviD.settings.is_aws == '1')
                        {
                            AviviD.requestPermissionFCM_aws();
                        }
                        else
                        {
                            AviviD.requestPermissionFCM();
                        }
                    }
                    else
                    {
                        AviviD.console('AviviD token exist');
                        AviviD.requestGeolocation();
                    //為了uuid產生的問題，暫時加入的重置uuid
                    // var already_uuid_reset = (AviviD.get_cookie('AviviD_uuid_reset') != null)? AviviD.get_cookie('AviviD_uuid_reset') : 0;
                    // var already_uuid_send = (AviviD.get_cookie('AviviD_uuid_send') != null)? AviviD.get_cookie('AviviD_uuid_send') : 0;
                    // if(already_uuid_reset == '1' && already_uuid_send != '1')
                    // {
                    //     AviviD.messaging.getToken()
                    //     .then(function(currentToken) {
                    //         if (currentToken)
                    //         {
                    //             // 取得 token
                    //             // AviviD.console("currentToken : " + currentToken);

                    //             var uuid_return= 'https://www.likr.com.tw/pushServer/uuid_return.php';
                    //             var fetchParams = {
                    //                 web_id: AviviD.web_id,
                    //                 category_id: AviviD.category_id,
                    //                 token: currentToken,
                    //                 uuid:AviviD.uuid
                    //             };

                    //             var uuidReturnUrlObject = AviviD.createUrlObject(uuid_return, fetchParams);

                    //             fetch(uuidReturnUrlObject).then(function(res) {
                    //                 if (res.status !== 200) {
                    //                     throw new Error('uuid_return error code: ' + res.status);
                    //                 }
                    //                 else{
                    //                     AviviD.console('uuid_return status: ok.');
                    //                     AviviD.set_cookie('AviviD_uuid_send', '1');
                    //                 }
                    //             }).catch(function(err) {
                    //                 return console.error('uuid_return error:', err);
                    //             });

                    //         }
                    //     });
                    // }
                    // else
                    // {
                    //     AviviD.console("already_uuid_reset : " + already_uuid_reset);
                    //     AviviD.console("already_uuid_send : " + already_uuid_send);
                    // }

                    }
                }


            }
            else if (AviviD.settings.banner_native == '1') {

                if (AviviD.get_cookie('AviviD_already_exist') != '1') {
                    AviviD.bannerPermission();
                }
            }
        }
        else {
            AviviD.console('AviviD.firebaseApp : Subscribed.');
        }

        // [START 程式在前景的接收訊息]
        AviviD.messaging.onMessage(function (payload) {
            AviviD.console("Message received. ", payload);
            var message = payload.data;
            navigator.serviceWorker.getRegistrations().then(function (regs) {
                AviviD.console("getRegistrations :", regs);
                if (regs) {
                    var reg = regs[0];
                    AviviD.console("useServiceWorker :", reg);
                    AviviD.messaging.getToken()
                        .then(async function (currentToken) {
                            if (currentToken) {
                                // 取得 token
                                AviviD.console("currentToken : " + currentToken);

                                // 取得showNotification所需資料
                                var pushData = await AviviD.getNotificationData(currentToken, message);
                                AviviD.console('pushData : ', pushData);
                                if (AviviD.verifyMessage(message)) {
                                    if(AviviD.settings.is_aws == '1')
                                    {
                                        //AviviD settings
                                        var fetchParams = {
                                            web_id: message.web_id,
                                            category_id: message.category_id,
                                            token: currentToken,
                                            push_id: message.push_id,
                                            msg_source: message.msg_source,
                                            sw_source: self.location.origin,
                                        };
                                         //** 初始化 Amazon Cognito 登入資料供應商
                                        AviviD_AWS.config.region = 'ap-southeast-1'; // 區域
                                        AviviD_AWS.config.credentials = new AviviD_AWS.CognitoIdentityCredentials({
                                            IdentityPoolId: 'ap-southeast-1:f46698d9-24cf-4242-8a3d-8707f45d1cfd',
                                        });
                                        let AviviD_check_status = 0;
                                        AviviD_AWS.config.credentials.get(function(err) {
                                            // attach event listener
                                            if (err) {
                                                console.error(err);
                                                return;
                                            }
                                            let AviviD_firehose = new AviviD_AWS.Firehose();
                                            let params = {
                                                //DeliveryStreamName: 'LoungeBeer',
                                                DeliveryStreamName: 'impression',
                                                Record: {
                                                    Data: JSON.stringify(fetchParams)
                                                }
                                            };
                                            AviviD_firehose.putRecord(params, function(err, data) {
                                                if (err){
                                                    // put failed
                                                    // return false;
                                                    console.error('IMPRESSION_LOG_RECEIVER error:', err);
                                                }else{
                                                    // put successful
                                                    console.log('IMPRESSION_LOG_RECEIVER res:', data);
                                                    // return true;
                                                }
                                            });
                                        });
                                    }
                                    else
                                    {
                                        //AviviD settings
                                        var IMPRESSION_LOG_RECIEVER = 'https://load-balancer.likr.com.tw/pushServer/impression_log_receiver.php';
                                        var fetchParams = {
                                            web_id: message.web_id,
                                            category_id: message.category_id,
                                            token: currentToken,
                                            push_id: message.push_id,
                                            msg_source: message.msg_source,
                                            sw_source: self.location.origin
                                        };

                                        var impressionLogRecieverUrlObject = AviviD.createUrlObject(IMPRESSION_LOG_RECIEVER, fetchParams);
                                        AviviD.console('IMPRESSION_LOG_RECIEVER urlObject :', impressionLogRecieverUrlObject);

                                        //send impression log
                                        fetch(impressionLogRecieverUrlObject).then(function (res) {
                                            if (res.status !== 200) {
                                                throw new Error('IMPRESSION_LOG_RECIEVER error code: ' + res.status);
                                            }
                                            return AviviD.console('IMPRESSION_LOG_RECIEVER res:', res);
                                        }).catch(function (err) {
                                            return console.error('IMPRESSION_LOG_RECIEVER error:', err);
                                        });
                                    }

                                    if (pushData.title != '_') {
                                        return reg.showNotification(pushData.title, pushData.content);
                                    }
                                    else {
                                        return;
                                    }
                                }
                                else {
                                    console.error('Message: Missing Parameters.');
                                    if (pushData.title != '_') {
                                        return reg.showNotification(pushData.title, pushData.content);
                                    }
                                    else {
                                        return;
                                    }
                                }
                            }
                            else {
                                console.error('getToken: No Instance ID token available. Request permission to generate one.');
                                return;
                            }
                        })
                        .catch(function (err) {
                            console.error('getToken :', err);
                            return;
                        });
                }
            });
        });
        // [END 程式在前景的接收訊息]
    }
    AviviD.requestPermissionFCM_aws = function () {
        // [START 訂閱]
        // 詢問通知權限
        AviviD.messaging.requestPermission()
            .then(function () {
                AviviD.console('Notification permission granted.');

                // 要Token
                AviviD.messaging.getToken()
                    .then(function (currentToken) {
                        if (currentToken) {
                            var ua = AviviD.UAResult;
                            var reg_data = {
                                "web_id": AviviD.web_id,
                                "token": currentToken,
                                "category_id": AviviD.category_id,
                                // "avivid_regid": AviviD.avivid_regid,
                                // "webuserid": AviviD.webuserid,
                                "uuid": AviviD.uuid,
                                // "reg_source": 'native',
                                "sw_type": 'fcm',
                                // "browser_ver": ua.browser.version,
                                // "os_ver": ua.os.version,
                                "user_agent": ua.ua,
                                "client_href": window.location.href,
                                "os_type": AviviD.int_os_type,
                                "browser_type": AviviD.int_browser_type,
                                // "avivid_tag": AviviD.avivid_tag
                            };



                            AviviD.console("FCM Register send:", reg_data);
                            AviviD.kinesis_subscription_post(reg_data);
                            // jQuery("body").append("<div>token:" + currentToken + "</div>");
                            // jQuery("body").append("<div>uuid:" + AviviD.uuid + "</div>");




                        } else {
                            AviviD.console('No Instance ID token available. Request permission to generate one.');
                        }

                    })
                    .catch(function (err) {
                        AviviD.console('An error occurred while retrieving token. ', err);
                    });
            })
            .catch(function (err) {
                AviviD.console('Unable to get permission to notify.', err);

                // AviviD.compensation();
                AviviD.set_cookie('AviviD_already_exist', '1',3);
                // AviviD.set_cookie_minutes('AviviD_show_sub', '1', AviviD.settings.ad_banner_life_cycle * 60);
            });
    };
    /**
     * FCM 原生訂閱要求通知權限 for Service Worker 系列
     */
    AviviD.requestPermissionFCM = function () {
        // [START 訂閱]
        // 詢問通知權限
        AviviD.messaging.requestPermission()
            .then(function () {
                AviviD.console('Notification permission granted.');

                // 要Token
                AviviD.messaging.getToken()
                    .then(function (currentToken) {
                        if (currentToken) {
                            var ua = AviviD.UAResult;
                            var reg_data = {
                                "web_id": AviviD.web_id,
                                "token": currentToken,
                                "category_id": AviviD.category_id,
                                "avivid_regid": AviviD.avivid_regid,
                                "webuserid": AviviD.webuserid,
                                "uuid": AviviD.uuid,
                                "reg_source": 'native',
                                "sw_type": 'fcm',
                                "browser_ver": ua.browser.version,
                                "os_ver": ua.os.version,
                                "user_agent": ua.ua,
                                "client_href": window.location.href,
                                "os_type": AviviD.int_os_type,
                                "browser_type": AviviD.int_browser_type,
                                "avivid_tag": AviviD.avivid_tag
                            };
                            // if(AviviD.web_id == 'newtalk'){
                            //     let reg_data_2 = {
                            //         "web_id": AviviD.web_id,
                            //         "token": currentToken,
                            //         "category_id": AviviD.category_id,
                            //         // "avivid_regid": AviviD.avivid_regid,
                            //         // "webuserid": AviviD.webuserid,
                            //         "uuid": AviviD.uuid,
                            //         // "reg_source": 'native',
                            //         "sw_type": 'fcm',
                            //         // "browser_ver": ua.browser.version,
                            //         // "os_ver": ua.os.version,
                            //         "user_agent": ua.ua,
                            //         "client_href": window.location.href,
                            //         "os_type": AviviD.int_os_type,
                            //         "browser_type": AviviD.int_browser_type,
                            //         // "avivid_tag": AviviD.avivid_tag
                            //     };
                            //     // AviviD.kinesis_subscription_post(reg_data_2);
                            // }

                            AviviD.console("FCM Register send:", reg_data);


                            // jQuery("body").append("<div>token:" + currentToken + "</div>");
                            // jQuery("body").append("<div>uuid:" + AviviD.uuid + "</div>");

                            jQuery.ajax({
                                url: "https://auto-load-balancer.likr.com.tw/pushServer/endPointReg_v2.php",
                                type: "POST",
                                data: reg_data,
                                dataType: "json",
                                success: function (data) {
                                    AviviD.console("FCM Register res:", data);
                                    if (data.is_insert_success) {
                                        AviviD.set_cookie('AviviD_already_exist', '1',3);
                                        var resText_arr = data.resText.split('#');
                                        if (resText_arr[1]) {
                                            AviviD.set_cookie('sub_to', resText_arr[1]);
                                        }
                                    }

                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                    AviviD.console("xhr :", xhr);
                                    AviviD.console("ajaxOptions :", ajaxOptions);
                                    AviviD.console("thrownError :", thrownError);
                                    AviviD.console('status code : ' + xhr.status + ' , ajaxOptions : ' + ajaxOptions);
                                }
                            });

                        } else {
                            AviviD.console('No Instance ID token available. Request permission to generate one.');
                        }

                    })
                    .catch(function (err) {
                        AviviD.console('An error occurred while retrieving token. ', err);
                    });
            })
            .catch(function (err) {
                AviviD.console('Unable to get permission to notify.', err);

                // AviviD.compensation();
                AviviD.set_cookie('AviviD_already_exist', '1',3);
                AviviD.set_cookie_minutes('AviviD_show_sub', '1', AviviD.settings.ad_banner_life_cycle * 60);
            });
    };

    /**
     * 請求座標
     */
    AviviD.requestGeolocation = function () {
        sendcount = 0;
        if (AviviD.settings.geolocation_enable == '1' && navigator && navigator.geolocation) {
            setTimeout(function () {
                navigator.geolocation.watchPosition(function (position) {
                    AviviD.geolocation.latitude = position.coords.latitude;
                    AviviD.geolocation.longitude = position.coords.longitude;
                    if(sendcount==0){
                        jQuery.ajax({
                            url: "https://auto-load-balancer.likr.com.tw/pushServer/location_receive.php",
                            method: "POST",
                            data: {
                                'uuid': AviviD.uuid,
                                'latitude': AviviD.geolocation.latitude,
                                'longitude': AviviD.geolocation.longitude
                            },
                            success: function (data) {
                                AviviD.console(data);
                                console.log('s');
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                AviviD.console("xhr :", xhr);
                                AviviD.console("ajaxOptions :", ajaxOptions);
                                AviviD.console("thrownError :", thrownError);
                                AviviD.console('status code : ' + xhr.status + ' , ajaxOptions : ' + ajaxOptions);
                            }
                        });
                        sendcount += 1;
                    }
                });
            }, AviviD.geolocation.get_interval);
        }
    };

    AviviD.regSafari_aws = function () {
        if ('safari' in window && 'pushNotification' in window.safari) {
            var web_id = AviviD.web_id;
            var ua = AviviD.UAResult;
            var webServiceURL = 'https://www.likr.com.tw/pushosx';
            var websitePushID = 'web.tw.com.likr.' + web_id;
            var userInfo = { "domainName": web_id };
            //確保用戶可以接收Safari推送通知。
            var checkRemotePermission = function (permissionData) {
                if (permissionData.permission === 'default') {
                    // This is a new web service URL and its validity is unknown.
                    window.safari.pushNotification.requestPermission
                        (
                            webServiceURL, // The web service URL.
                            websitePushID, //Website Push ID.
                            userInfo, //Data that you choose to send to your server to help you identify the user.
                            checkRemotePermission
                        );
                    AviviD.console('訊息通知狀態：預設');
                    AviviD.console("regSafari: ", permissionData);
                }
                else if (permissionData.permission === 'denied') {
                    //使用者封鎖通知
                    AviviD.console('訊息通知狀態：封鎖');
                    AviviD.set_cookie('ano_already_exist', '1');
                }
                else if (permissionData.permission === 'granted') {
                    AviviD.console('訊息通知狀態：允許');
                    AviviD.set_cookie('ano_already_exist', '1');
                    //The web service URL is a valid push provider, and the user said yes.
                    var token = permissionData.deviceToken;
                    localStorage.setItem('avivid_safari_token', token);
                    AviviD.console("The user granted, with token: " + token);
                    var reg_data = {
                        "web_id": AviviD.web_id,
                        "token": token,
                        "category_id": AviviD.category_id,
                        // "avivid_regid": AviviD.avivid_regid,
                        // "webuserid": AviviD.webuserid,
                        // "uuid": AviviD.uuid,
                        "uuid": token,
                        "reg_source": 'native',
                        "sw_type": 'safari',
                        // "browser_ver": ua.browser.version,
                        // "os_ver": ua.os.version,
                        "user_agent": ua.ua,
                        "client_href": window.location.href,
                        "os_type": AviviD.int_os_type,
                        "browser_type": AviviD.int_browser_type,
                        // "avivid_tag": AviviD.avivid_tag
                    };

                    AviviD.console("regSafari Register send:", reg_data);
                    AviviD.kinesis_subscription_post(reg_data);


                }
                AviviD.requestGeolocation();
            }
            var permissionData = window.safari.pushNotification.permission(websitePushID);
            checkRemotePermission(permissionData);
        }
    };

    /**
     * Safari 原生訂閱
     */
    AviviD.regSafari = function () {
        if ('safari' in window && 'pushNotification' in window.safari) {
            var web_id = AviviD.web_id;
            var ua = AviviD.UAResult;
            var webServiceURL = 'https://www.likr.com.tw/pushosx';
            var websitePushID = 'web.tw.com.likr.' + web_id;
            var userInfo = { "domainName": web_id };
            //確保用戶可以接收Safari推送通知。
            var checkRemotePermission = function (permissionData) {
                if (permissionData.permission === 'default') {
                    // This is a new web service URL and its validity is unknown.
                    window.safari.pushNotification.requestPermission
                        (
                            webServiceURL, // The web service URL.
                            websitePushID, //Website Push ID.
                            userInfo, //Data that you choose to send to your server to help you identify the user.
                            checkRemotePermission
                        );
                    AviviD.console('訊息通知狀態：預設');
                    AviviD.console("regSafari: ", permissionData);
                }
                else if (permissionData.permission === 'denied') {
                    //使用者封鎖通知
                    AviviD.console('訊息通知狀態：封鎖');
                    AviviD.set_cookie('AviviD_already_exist', '1',3);
                }
                else if (permissionData.permission === 'granted') {
                    AviviD.console('訊息通知狀態：允許');
                    AviviD.set_cookie('AviviD_already_exist', '1',3);
                    //The web service URL is a valid push provider, and the user said yes.
                    var token = permissionData.deviceToken;
                    localStorage.setItem('avivid_safari_token', token);
                    AviviD.console("The user granted, with token: " + token);
                    var reg_data = {
                        "web_id": AviviD.web_id,
                        "token": token,
                        "category_id": AviviD.category_id,
                        "avivid_regid": AviviD.avivid_regid,
                        "webuserid": AviviD.webuserid,
                        // "uuid": AviviD.uuid,
                        "uuid": token,
                        "reg_source": 'native',
                        "sw_type": 'safari',
                        "browser_ver": ua.browser.version,
                        "os_ver": ua.os.version,
                        "user_agent": ua.ua,
                        "client_href": window.location.href,
                        "os_type": AviviD.int_os_type,
                        "browser_type": AviviD.int_browser_type,
                        "avivid_tag": AviviD.avivid_tag
                    };

                    AviviD.console("regSafari Register send:", reg_data);

                    jQuery.ajax({
                        url: "https://auto-load-balancer.likr.com.tw/pushServer/endPointReg_v2.php",
                        type: "POST",
                        data: reg_data,
                        // dataType: "json",
                        success: function (data) {
                            AviviD.console("regSafari Register res:", data);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            AviviD.console("xhr :", xhr);
                            AviviD.console("ajaxOptions :", ajaxOptions);
                            AviviD.console("thrownError :", thrownError);
                            AviviD.console('status code : ' + xhr.status + ' , ajaxOptions : ' + ajaxOptions);
                        }
                    });
                    // if(AviviD.web_id == 'newtalk'){
                    //     let reg_data_2 = {
                    //         "web_id": AviviD.web_id,
                    //         "token": currentToken,
                    //         "category_id": AviviD.category_id,
                    //         // "avivid_regid": AviviD.avivid_regid,
                    //         // "webuserid": AviviD.webuserid,
                    //         "uuid": AviviD.uuid,
                    //         // "reg_source": 'native',
                    //         "sw_type": 'fcm',
                    //         // "browser_ver": ua.browser.version,
                    //         // "os_ver": ua.os.version,
                    //         "user_agent": ua.ua,
                    //         "client_href": window.location.href,
                    //         "os_type": AviviD.int_os_type,
                    //         "browser_type": AviviD.int_browser_type,
                    //         // "avivid_tag": AviviD.avivid_tag
                    //     };
                    //     // AviviD.kinesis_subscription_post(reg_data_2);
                    // }

                }
                AviviD.requestGeolocation();
            }
            var permissionData = window.safari.pushNotification.permission(websitePushID);
            checkRemotePermission(permissionData);
        }
    };

    AviviD.debugLog = function (data, data1) {
        if (!AviviD.status.debug) return;
        data1 = data1 || "";
        AviviD.console(data, data1);
    }

    AviviD.isHasActionButton = function (data) {
        if (typeof data !== "object") {
            return 0;
        }
        else if (data.button1_url || data.button2_url) {
            return 1;
        }
        else {
            return 0;
        }
    }

    AviviD.verifyMessage = function (data) {
        if (data.web_id && data.push_id && data.msg_source) {
            return 1;
        }
        else {
            return 0;
        }
    };

    AviviD.kinesis_subscription_post = function(subscription){
        //** 初始化 Amazon Cognito 登入資料供應商
       AviviD_AWS.config.region = 'ap-southeast-1'; // 區域
       AviviD_AWS.config.credentials = new AviviD_AWS.CognitoIdentityCredentials({
           IdentityPoolId: 'ap-southeast-1:f46698d9-24cf-4242-8a3d-8707f45d1cfd',
       });
       // We're going to partition Amazon Kinesis records based on an identity.
       // We need to get credentials first, then attach our event listeners.
       let AviviD_check_status = 0;
       AviviD_AWS.config.credentials.get(function(err) {
           // attach event listener
           if (err) {
               console.error(err);
               return;
           }
           let AviviD_firehose = new AviviD_AWS.Firehose();
           let params = {
               //DeliveryStreamName: 'LoungeBeer',
               DeliveryStreamName: 'subscribe',
               Record: {
                   Data: JSON.stringify(subscription)
               }
           };
           AviviD_firehose.putRecord(params, function(err, data) {
               if (err){
                   // put failed
                   // return false;
               }else{
                   // put successful
                   AviviD.set_cookie('AviviD_already_exist', '1',3);
                   // return true;
               }
           });

       });
   }
    AviviD.getNotificationData = async function (token, data) {
        var defaultData = {
            title: "_",
            content: {
                body: "點擊觀看更多資訊",
                icon: "https://www.likr.com.tw/pushEndPoint/images/avivid/image/icon.png",
                requireInteraction: true,
                data: {
                    click_url: "https://www.likr.com.tw/",
                    web_id: AviviD.web_id,
                    token: token,
                    push_id: "",
                    msg_source: "error"
                }
            }
        };

        if (!data.push_id) {
            console.error('notificationDataError: data.push_id not existed, use defaultData.');
            return defaultData;
        }
        var dt = data.dynamic_type;

        switch (dt) {
            //動態新聞
            case '1':

                var data_ajax = {
                    push_id: data.push_id,
                    token: token,
                    dynamic_type: data.dynamic_type
                };


                var NotificationData = {};

                var news_url = data.news_url;
                var payload_news = AviviD.createUrlObject(news_url, data_ajax);

                var fetch_res = fetch(payload_news).then(function (res) {
                    if (res.status !== 200) {
                        throw new Error('error code: ' + res.status);
                    }
                    return res.json();
                }).then(function (data_array) {

                    return data_array;
                }).catch(function (err) {
                    return console.error('error:', err);
                });

                var catch_res = await fetch_res;

                var title = catch_res.title;
                var msg = catch_res.msg;
                var icon = catch_res.icon;
                var image = catch_res.image;
                var click_url = catch_res.click_url;
                var button1_url = catch_res.button1_url;
                var button2_url = catch_res.button2_url;
                var button1_title = catch_res.button1_title ? catch_res.button1_title : '';
                var button1_icon = catch_res.button1_icon ? catch_res.button1_icon : '';
                var button2_title = catch_res.button2_title ? catch_res.button2_title : '';
                var button2_icon = catch_res.button2_icon ? catch_res.button2_icon : '';



                NotificationData.title = title ? title : defaultData.title;

                var content = {};
                content.body = msg ? msg : defaultData.content.body;
                content.icon = icon ? icon : defaultData.content.icon;
                content.image = image ? image : "";
                content.requireInteraction = data.requireInteraction == "false" ? false : true;
                content.renotify = data.renotify == "true" ? true : false;
                content.silent = data.silent == "true" ? true : false;
                content.tag = data.tag ? data.tag : "";
                content.data = {
                    web_id: data.web_id ? data.web_id : AviviD.web_id,
                    category_id: data.category_id ? data.category_id : "",
                    token: token,
                    push_id: data.push_id,
                    click_url: click_url ? click_url : defaultData.content.data.click_url,
                    button1_url: button1_url,
                    button2_url: button2_url,
                    msg_source: data.msg_source
                };

                var actions = [];
                if (button1_title) {
                    actions.push({ action: 'button1', title: button1_title, icon: button1_icon ? button1_icon : "" });
                }

                if (button2_title) {
                    actions.push({ action: 'button2', title: button2_title, icon: button2_icon ? button2_icon : "" });
                }

                break;
            case '2'://動態廣告（直推）

                var data_ajax = {
                    push_id: data.push_id,
                    token: token,
                    dynamic_type: data.dynamic_type
                };


                var NotificationData = {};

                var ads_url = data.ads_url;
                var payload_ads = AviviD.createUrlObject(ads_url, data_ajax);

                var fetch_res = fetch(payload_ads).then(function (res) {
                    if (res.status !== 200) {
                        throw new Error('error code: ' + res.status);
                    }
                    return res.json();
                }).then(function (data_array) {

                    return data_array;
                }).catch(function (err) {
                    return console.error('error:', err);
                });

                var catch_res = await fetch_res;

                var title = catch_res.title;
                var msg = catch_res.msg;
                var icon = catch_res.icon;
                var image = catch_res.image;
                var click_url = catch_res.click_url;
                var button1_url = catch_res.button1_url;
                var button2_url = catch_res.button2_url;
                var button1_title = catch_res.button1_title ? catch_res.button1_title : '';
                var button1_icon = catch_res.button1_icon ? catch_res.button1_icon : '';
                var button2_title = catch_res.button2_title ? catch_res.button2_title : '';
                var button2_icon = catch_res.button2_icon ? catch_res.button2_icon : '';

                NotificationData.title = title ? title : defaultData.title;

                var content = {};
                content.body = msg ? msg : defaultData.content.body;
                content.icon = icon ? icon : defaultData.content.icon;
                content.image = image ? image : "";
                content.requireInteraction = data.requireInteraction == "false" ? false : true;
                content.renotify = data.renotify == "true" ? true : false;
                content.silent = data.silent == "true" ? true : false;
                content.tag = data.tag ? data.tag : "";
                content.data = {
                    web_id: data.web_id ? data.web_id : AviviD.web_id,
                    category_id: data.category_id ? data.category_id : "",
                    token: token,
                    push_id: data.push_id,
                    click_url: click_url ? click_url : defaultData.content.data.click_url,
                    button1_url: button1_url,
                    button2_url: button2_url,
                    msg_source: data.msg_source
                };

                var actions = [];
                if (button1_title) {
                    actions.push({ action: 'button1', title: button1_title, icon: button1_icon ? button1_icon : "" });
                }

                if (button2_title) {
                    actions.push({ action: 'button2', title: button2_title, icon: button2_icon ? button2_icon : "" });
                }

                break;

            case '3'://固定內容＋動態廣告
                var data_ajax = {
                    push_id: data.push_id,
                    token: token,
                    dynamic_type: data.dynamic_type
                };


                var NotificationData = {};

                var ads_url = data.ads_url;
                var payload_ads = AviviD.createUrlObject(ads_url, data_ajax);

                var fetch_res_ads = fetch(payload_ads).then(function (res) {
                    if (res.status !== 200) {
                        throw new Error('error code: ' + res.status);
                    }
                    return res.json();
                }).then(function (data_array) {

                    return data_array;
                }).catch(function (err) {
                    return console.error('error:', err);
                });

                var catch_res_ads = await fetch_res_ads;



                var image = catch_res_ads.image;

                var button1_url = catch_res_ads.click_url;
                var button2_url = catch_res_ads.click_url2;;
                var button1_title = catch_res_ads.title ? catch_res_ads.title : '';
                var button1_icon = '';
                var button2_title = catch_res_ads.title2 ? catch_res_ads.title2 : '';
                var button2_icon = '';



                NotificationData.title = data.title ? data.title : defaultData.title;

                var content = {};
                content.body = data.body ? data.body : defaultData.content.body;
                content.icon = data.icon ? data.icon : defaultData.content.icon;
                content.image = image ? image : "";
                content.requireInteraction = data.requireInteraction == "false" ? false : true;
                content.renotify = data.renotify == "true" ? true : false;
                content.silent = data.silent == "true" ? true : false;
                content.tag = data.tag ? data.tag : "";
                content.data = {
                    web_id: data.web_id ? data.web_id : AviviD.web_id,
                    category_id: data.category_id ? data.category_id : "",
                    token: token,
                    push_id: data.push_id,
                    click_url: data.click_url ? data.click_url : defaultData.content.data.click_url,
                    button1_url: button1_url,
                    button2_url: button2_url,
                    msg_source: data.msg_source
                };

                var actions = [];
                if (button1_title) {
                    actions.push({ action: 'button1', title: button1_title, icon: button1_icon ? button1_icon : "" });
                }

                if (button2_title) {
                    actions.push({ action: 'button2', title: button2_title, icon: button2_icon ? button2_icon : "" });
                }

                break;
            case '4'://動態新聞＋動態廣告

                var data_ajax = {
                    push_id: data.push_id,
                    token: token,
                    dynamic_type: data.dynamic_type
                };


                var NotificationData = {};

                var news_url = data.news_url;
                var payload_news = AviviD.createUrlObject(news_url, data_ajax);

                var fetch_res_news = fetch(payload_news).then(function (res) {
                    if (res.status !== 200) {
                        throw new Error('error code: ' + res.status);
                    }
                    return res.json();
                }).then(function (data_array) {

                    return data_array;
                }).catch(function (err) {
                    return console.error('error:', err);
                });

                var catch_res_news = await fetch_res_news;

                ///////////////////////////////////////////
                var ads_url = data.ads_url;
                var payload_ads = AviviD.createUrlObject(ads_url, data_ajax);

                var fetch_res_ads = fetch(payload_ads).then(function (res) {
                    if (res.status !== 200) {
                        throw new Error('error code: ' + res.status);
                    }
                    return res.json();
                }).then(function (data_array) {

                    return data_array;
                }).catch(function (err) {
                    return console.error('error:', err);
                });

                var catch_res_ads = await fetch_res_ads;

                var title = catch_res_news.title;
                var msg = catch_res_news.msg;
                var icon = catch_res_news.icon;
                var image = catch_res_ads.image;
                var click_url = catch_res_news.click_url;
                var button1_url = catch_res_ads.click_url;
                var button2_url = catch_res_ads.click_url2;;
                var button1_title = catch_res_ads.title ? catch_res_ads.title : '';
                var button1_icon = '';
                var button2_title = catch_res_ads.title2 ? catch_res_ads.title2 : '';
                var button2_icon = '';



                NotificationData.title = title ? title : defaultData.title;

                var content = {};
                content.body = msg ? msg : defaultData.content.body;
                content.icon = icon ? icon : defaultData.content.icon;
                content.image = image ? image : "";
                content.requireInteraction = data.requireInteraction == "false" ? false : true;
                content.renotify = data.renotify == "true" ? true : false;
                content.silent = data.silent == "true" ? true : false;
                content.tag = data.tag ? data.tag : "";
                content.data = {
                    web_id: data.web_id ? data.web_id : AviviD.web_id,
                    category_id: data.category_id ? data.category_id : "",
                    token: token,
                    push_id: data.push_id,
                    click_url: click_url ? click_url : defaultData.content.data.click_url,
                    button1_url: button1_url,
                    button2_url: button2_url,
                    msg_source: data.msg_source
                };

                var actions = [];
                if (button1_title) {
                    actions.push({ action: 'button1', title: button1_title, icon: button1_icon ? button1_icon : "" });
                }

                if (button2_title) {
                    actions.push({ action: 'button2', title: button2_title, icon: button2_icon ? button2_icon : "" });
                }

                break;
            default:
                var NotificationData = {};
                NotificationData.title = data.title ? data.title : defaultData.title;

                var content = {};
                content.body = data.body ? data.body : defaultData.content.body;
                content.icon = data.icon ? data.icon : defaultData.content.icon;
                content.image = data.image ? data.image : "";
                content.requireInteraction = data.requireInteraction == "false" ? false : true;
                content.renotify = data.renotify == "true" ? true : false;
                content.silent = data.silent == "true" ? true : false;
                content.tag = data.tag ? data.tag : "";
                content.data = {
                    web_id: data.web_id ? data.web_id : AviviD.web_id,
                    category_id: data.category_id ? data.category_id : "",
                    token: token,
                    push_id: data.push_id,
                    click_url: data.click_url ? data.click_url : defaultData.content.data.click_url,
                    button1_url: data.button1_url,
                    button2_url: data.button2_url,
                    msg_source: data.msg_source
                };

                var actions = [];
                if (data.button1_title) {
                    actions.push({ action: 'button1', title: data.button1_title, icon: data.button1_icon ? data.button1_icon : "" });
                }

                if (data.button2_title) {
                    actions.push({ action: 'button2', title: data.button2_title, icon: data.button2_icon ? data.button2_icon : "" });
                }


        }



        if (actions.length > 0) content.actions = actions;
        if (!content.image) delete content.image;
        NotificationData.content = content;


        return NotificationData;
    };

    AviviD.createUrlObject = function (url, params) {
        var urlObject = new URL(url);
        Object.keys(params).forEach(key => urlObject.searchParams.append(key, params[key]));
        return urlObject;
    };

    /*
    撈取購物相關資訊
    */
    AviviD.send_shopping_information = function (shopping_type, shopping_info) {
        var shopping_data = {
            'shopping_type': shopping_type,
            'web_id': AviviD.web_id,
            'uuid': AviviD.uuid,
            'shopping_info': shopping_info,
            'category_id': AviviD.category_id,
            'is_likr': AviviD.get_cookie('is_likr'),
            'AviviD_cid': AviviD.get_cookie('AviviD_cid'),
        };

        var data = JSON.stringify(shopping_data);

        var URLs = 'https://elephant.likr.com.tw/elephant_api/php_redis_shopping.php';

        jQuery.ajax({
            type: 'POST',
            data: {
                data: data
            },
            url: URLs,
            dataType: 'json',

            success: function (data) {
                // AviviD.console('data :', data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // AviviD.console('jqXHR :', jqXHR);
                // AviviD.console('textStatus :', textStatus);
                // AviviD.console('errorThrown :', errorThrown);
            }
        });

    }

    /*
     * setting user cookie while user is from likr push (line,facebook)
     */
    AviviD.set_is_likr = function () {
        // var url_string = window.location.href;
        // var url = new URL(url_string);
        // alert(AviviD.get_urlparam('is_likr'));
        if (AviviD.get_urlparam('is_likr')) {
            var domain = AviviD.get_top_domain();
            var cookie = "is_likr=" + AviviD.get_urlparam('is_likr') + ";domain=" + domain + ";path=/";
            document.cookie = cookie;
        }
    }

    /**
     * 取得購物相關資訊 5.3 - Peter
     */
    // AviviD.run_get_shopping_data = function () {
    //     AviviD.settings.payment_selector = (AviviD.detect_is_mobile(AviviD.str_os_type)) ? AviviD.settings.payment_selector_m : AviviD.settings.payment_selector;
    //     AviviD.settings.payment_url = (AviviD.detect_is_mobile(AviviD.str_os_type)) ? AviviD.settings.payment_url_m : AviviD.settings.payment_url;
    //     AviviD.settings.checkout_url = (AviviD.detect_is_mobile(AviviD.str_os_type)) ? AviviD.settings.checkout_url_m : AviviD.settings.checkout_url;
    //     AviviD.settings.checkout_trigger_class = (AviviD.detect_is_mobile(AviviD.str_os_type)) ? AviviD.settings.checkout_trigger_class_m : AviviD.settings.checkout_trigger_class;
    //     AviviD.settings.checkout_data_class = (AviviD.detect_is_mobile(AviviD.str_os_type)) ? AviviD.settings.checkout_data_class_m : AviviD.settings.checkout_data_class;
    //     AviviD.settings.cart_url = (AviviD.detect_is_mobile(AviviD.str_os_type)) ? AviviD.settings.cart_url_m : AviviD.settings.cart_url;
    //     AviviD.settings.cart_data_class = (AviviD.detect_is_mobile(AviviD.str_os_type)) ? AviviD.settings.cart_data_class_m : AviviD.settings.cart_data_class;
    //     AviviD.settings.number_url = (AviviD.detect_is_mobile(AviviD.str_os_type)) ? AviviD.settings.number_url_m : AviviD.settings.number_url;
    //     AviviD.settings.number_trigger_class = (AviviD.detect_is_mobile(AviviD.str_os_type)) ? AviviD.settings.number_trigger_class_m : AviviD.settings.number_trigger_class;
    //     AviviD.settings.number_data_id = (AviviD.detect_is_mobile(AviviD.str_os_type)) ? AviviD.settings.number_data_id_m : AviviD.settings.number_data_id;

    //     if (window.location.href.slice(0, AviviD.settings.checkout_url.length) == AviviD.settings.checkout_url && document.querySelector(AviviD.settings.payment_selector) == undefined) {
    //         if (document.querySelector(AviviD.settings.checkout_trigger_class) != undefined) {
    //             AviviD.get_checkout_data = document.querySelector(AviviD.settings.checkout_trigger_class).addEventListener('click', function () {
    //                 AviviD.set_cookie_days('AviviD_cid', AviviD.uuid + '-' + new Date().getTime(), 1);
    //                 var shopping_type = 'checkout';
    //                 var shopping_info = JSON.stringify(document.querySelector(AviviD.settings.checkout_data_class).innerHTML);
    //                 AviviD.send_shopping_information(shopping_type, shopping_info);
    //             })
    //         }
    //         else {
    //             setTimeout(function () {
    //                 AviviD.run_get_shopping_data();
    //             }, 1000);
    //         }
    //     }
    //     // 等1秒之後開始抓購物車資料 太快載入會抓不到資料
    //     else if (window.location.href.slice(0, AviviD.settings.cart_url.length) == AviviD.settings.cart_url) {
    //         setTimeout(function () {
    //             if (document.querySelector(AviviD.settings.cart_data_class) != undefined && document.querySelector(AviviD.settings.cart_data_class) != null) {

    //                 var shopping_type = 'cart';
    //                 var shopping_info = JSON.stringify(document.querySelector(AviviD.settings.cart_data_class).innerHTML);
    //                 AviviD.send_shopping_information(shopping_type, shopping_info);

    //             }
    //             else {
    //                 setTimeout(function () {
    //                     AviviD.run_get_shopping_data();
    //                 }, 1000);
    //             }
    //         }, 1000);
    //     }
    //     // payment finish page
    //     else if (window.location.href.slice(0, AviviD.settings.payment_url.length) == AviviD.settings.payment_url && AviviD.settings.payment_selector == '_') {
    //         AviviD.send_shopping_information('paid', 0);
    //     }
    //     // payment finish page
    //     else if (window.location.href.slice(0, AviviD.settings.payment_url.length) == AviviD.settings.payment_url && AviviD.settings.payment_selector != '_') {
    //         if (document.querySelector(AviviD.settings.payment_selector) != undefined) {
    //             AviviD.send_shopping_information('paid', 0);
    //         }
    //         else {
    //             setTimeout(function () {
    //                 AviviD.run_get_shopping_data();
    //             }, 1000);
    //         }
    //     }
    //     else if (window.location.href.slice(0, AviviD.settings.number_url.length) == AviviD.settings.number_url) {
    //         if (document.querySelector(AviviD.settings.number_trigger_class) != undefined) {
    //             AviviD.get_number_data = document.querySelector(AviviD.settings.number_trigger_class).addEventListener('click', function () {
    //                 var shopping_type = 'number';
    //                 var shopping_info = '';
    //                 if (document.querySelector(AviviD.settings.number_data_id).length != undefined) {
    //                     for (var i = 0; i < document.querySelector(AviviD.settings.number_data_id).length; i++) {
    //                         shopping_info = shopping_info + document.querySelector(AviviD.settings.number_data_id)[i].name + ':' + document.querySelector(AviviD.settings.number_data_id)[i].value + ',';
    //                     }
    //                     var shopping_info = JSON.stringify(shopping_info);
    //                     AviviD.send_shopping_information(shopping_type, shopping_info);
    //                 }
    //                 else {
    //                     var shopping_info = JSON.stringify(document.querySelector(AviviD.settings.number_data_id).innerHTML);
    //                     AviviD.send_shopping_information(shopping_type, shopping_info);
    //                 }
    //             })
    //         }
    //         else {
    //             setTimeout(function () {
    //                 AviviD.run_get_shopping_data();
    //             }, 1000);
    //         }
    //     }
    // };
    AviviD.set_token_subscribe = function (AviviD_token) {

        var already_exist = (AviviD.get_cookie('AviviD_already_exist') != null) ? AviviD.get_cookie('AviviD_already_exist') : 0;
        if (already_exist == 0) {
            var token = AviviD.get_cookie("AviviD_token");
            if (token) {
                AviviD.console("repeat");
                return;
            }
            AviviD.set_cookie("AviviD_token", AviviD_token);
            var URLs = "https://webpush-api02.likr.com.tw/pushServer/insert_subscribe_token.php";
            jQuery.ajax({
                type: "POST",
                data: {
                    "token": AviviD_token,
                    "web_id": AviviD.web_id,
                    "category_id": AviviD.category_id,
                    "uuid": AviviD.uuid,
                    "os_type": AviviD.int_os_type,
                    "browser_type": AviviD.int_browser_type,
                    "ip": (AviviD.clientIP != undefined) ? AviviD.clientIP : '_',
                    "browser_ver": AviviD.UAResult.browser.version,
                    "os_ver": AviviD.UAResult.os.version,
                    "detect": AviviD.UAResult.ua,
                    "client_href": JSON.stringify(window.location.href)
                },
                url: URLs,
                success: function (data) {
                    AviviD.console(data);
                    AviviD.set_cookie('AviviD_already_exist', '1',3);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    AviviD.console("jqXHR :", jqXHR);
                    AviviD.console("textStatus :", textStatus);
                    AviviD.console("errorThrown :", errorThrown);
                }
            });
        }
        else {
            AviviD.console('token exist');
        }



    }

    AviviD.bannerPermission = function () {

        // var track_data = {
        //     'web_id': AviviD.web_id,
        // };
        // var json_data = JSON.stringify(track_data);

        // jQuery.ajax({
        //     url: "https://load-balancer.likr.com.tw/pushEndPoint/banner_subscribe.php",
        //     type: 'POST',
        //     dataType: 'json',
        //     data: {
        //         "json_data": json_data
        //     },
        //     // async: false,
        //     success: function (data) {
        //         AviviD.console(data);
        //         var ban_icon = data[0]['banner_icon'];
        //         var ban_title = data[0]['banner_title'];
        //         var ban_content = data[0]['banner_content'];
        AviviD.banner_subscribe(AviviD.settings.string_banner_icon, AviviD.settings.push_banner_data_title, AviviD.settings.push_banner_data_content, AviviD.settings.banner_allow_btn, AviviD.settings.banner_cancel_btn);
        //         AviviD.console(ban_icon);
        //         AviviD.console(ban_title);
        //         AviviD.console(ban_content);
        //     },
        //     error: function (xhr, ajaxOptions, thrownError) {
        //         // AviviD.console("xhr :", xhr);
        //         // AviviD.console("ajaxOptions :", ajaxOptions);
        //         // AviviD.console("thrownError :", thrownError);
        //         // AviviD.console('status code : ' + xhr.status + ' , ajaxOptions : ' + ajaxOptions);
        //     }
        // });


    };

    AviviD.safari_banner_subscribe = function (icon, title, content, allow, cancel) {
        jQuery('head').append('<style type="text/css">.avivid_push_banner{top: 50px;left: 30%;padding: 20px 20px;box-shadow: 0 1px 2px gray;color: #222;position: fixed;z-index: 999999;width: 400px;height: 130px;border:1px #AAAAAA;background-color:#f0f0f0;-webkit-box-sizing:revert;-moz-box-sizing:revert;box-sizing:revert;}</style>');
        jQuery('head').append('<style type="text/css">.avivid_icon{height: 100px; width:100px;}</style>');
        jQuery('head').append('<style type="text/css">.avivid_button_1{position: relative;bottom: -30px;left:200px;width:100px;height:30px;font-family:DFKai-sb;font-size:16px;font-weight:bold;border-radius:10px;background-color:#0066FF;color: white;outline:none;}</style>');
        jQuery('head').append('<style type="text/css">.avivid_button_2{position: relative;bottom: -30px;left:-10px;width:100px;height:30px;font-family:DFKai-sb;font-size:16px;font-weight:bold;border-radius:10px;background-color:#f0f0f0;color: black;outline:none;}</style>');
        jQuery('head').append('<style type="text/css">.avivid_title{position: relative;left:120px;top:-140px;word-break:break-all;width:280px;font-weight:bold;font-family:DFKai-sb;}');
        jQuery('head').append('<style type="text/css">.avivid_content{position: relative;left:120px;top:-130px;word-break:break-all;width:280px;font-family:DFKai-sb;}');
        var avivid_requestPermission = document.createElement('div');

        avivid_requestPermission.setAttribute('id', 'avivid_requestPermission');
        avivid_requestPermission.setAttribute('class', 'avivid_push_banner');
        avivid_requestPermission.style.display = "block";
        //塞icon
        var avivid_icon = document.createElement('img');
        avivid_icon.setAttribute('class', 'avivid_icon');
        avivid_icon.setAttribute('src', icon);
        //允許按鈕
        var avivid_button_1 = document.createElement('input');
        avivid_button_1.setAttribute('class', 'avivid_button_1');
        avivid_button_1.setAttribute('type', 'button');
        avivid_button_1.setAttribute('onclick', "AviviD.trigger_safari_requestPermission('access')");
        avivid_button_1.setAttribute('value', allow);
        //取消按鈕
        var avivid_button_2 = document.createElement('input');
        avivid_button_2.setAttribute('class', 'avivid_button_2');
        avivid_button_2.setAttribute('type', 'button');
        avivid_button_2.setAttribute('onclick', "AviviD.trigger_safari_requestPermission('denied')");
        avivid_button_2.setAttribute('value', cancel);
        //塞likr文字
        var avivid_text = document.createElement('p');
        avivid_text.setAttribute('style', 'bottom: 0px; font-size: 10px;');
        avivid_text.innerHTML = 'Powered by likr®';
        //塞訂閱標題
        var avivid_title = document.createElement('p');
        avivid_title.setAttribute('class', 'avivid_title');
        avivid_title.innerHTML = title;
        //塞訂閱內文
        var avivid_content = document.createElement('p');
        avivid_content.setAttribute('class', 'avivid_content');
        avivid_content.innerHTML = content;
        //avivid_requestPermission.src = "https://"+AviviD.web_id+".likr.com.tw/pushEndPoint/requestPermission.php";
        AviviD.console(avivid_requestPermission);
        AviviD.console(document.body);
        document.body.appendChild(avivid_requestPermission);
        avivid_requestPermission.appendChild(avivid_icon);
        avivid_requestPermission.appendChild(avivid_button_1);
        avivid_requestPermission.appendChild(avivid_button_2);
        avivid_requestPermission.appendChild(avivid_text);
        avivid_requestPermission.appendChild(avivid_title);
        avivid_requestPermission.appendChild(avivid_content);
    }

    AviviD.banner_subscribe = function (icon, title, content, allow, cancel) {
        jQuery('head').append('<style type="text/css">.avivid_push_banner{top: 0;left: 40%;padding: 20px 20px;;box-shadow: 0 1px 3px gray;color: #222;position: fixed;z-index: 999999;width: 400px;height: 150px;border:1px #AAAAAA solid;background-color:#DDDDDD;}@media(max-width: 480px){.avivid_push_banner{top: 68%;left: 4%;padding: 20px 20px;;box-shadow: 0 1px 3px gray;color: #222;position: fixed;z-index: 999999;width: 290px;height: 130px;border:1px #AAAAAA solid;background-color:#DDDDDD;}}</style>');
        jQuery('head').append('<style type="text/css">.avivid_icon{height: 100px; width:100px;} </style>');
        jQuery('head').append('<style type="text/css">.avivid_button_1{position: relative;bottom: -50px;left:200px;width:100px;background-color:#0066FF;color: white;outline:none;}@media(max-width: 480px){.avivid_button_1{position: relative;bottom: 0px;left:0px;width:110px;background-color:#0066FF;color: white;outline:none;}}</style>');
        jQuery('head').append('<style type="text/css">.avivid_button_2{position: relative;bottom: -50px;left:-10px;width:100px;background-color:#FFFFFF;color: black;outline:none;}@media(max-width: 480px){.avivid_button_2{position: relative;bottom: -30px;left:-90px;width:70px;background-color:#FFFFFF;color: black;outline:none;}}</style>');
        jQuery('head').append('<style type="text/css">.avivid_title{position: relative;left:100px;top:-140px;word-break:break-all;width:280px;}@media (max-width: 480px){.avivid_title{position: relative;left:100px;top:-140px;word-break:break-all;width:200px;}}');
        jQuery('head').append('<style type="text/css">.avivid_content{position: relative;left:100px;top:-130px;word-break:break-all;width:280px;}@media (max-width: 480px){.avivid_content{position: relative;left:100px;top:-150px;word-break:break-all;width:200px;}}');
        var avivid_requestPermission = document.createElement('div');

        avivid_requestPermission.setAttribute('id', 'avivid_requestPermission');
        avivid_requestPermission.setAttribute('class', 'avivid_push_banner');
        avivid_requestPermission.style.display = "block";
        //塞icon
        var avivid_icon = document.createElement('img');
        avivid_icon.setAttribute('class', 'avivid_icon');
        avivid_icon.setAttribute('src', icon);
        //允許按鈕
        var avivid_button_1 = document.createElement('input');
        avivid_button_1.setAttribute('class', 'avivid_button_1');
        avivid_button_1.setAttribute('type', 'button');
        avivid_button_1.setAttribute('onclick', "AviviD.trigger_requestPermission('access')");
        avivid_button_1.setAttribute('value', allow);
        //取消按鈕
        var avivid_button_2 = document.createElement('input');
        avivid_button_2.setAttribute('class', 'avivid_button_2');
        avivid_button_2.setAttribute('type', 'button');
        avivid_button_2.setAttribute('onclick', "AviviD.trigger_requestPermission('denied')");
        avivid_button_2.setAttribute('value', cancel);
        //塞likr文字
        var avivid_text = document.createElement('p');
        avivid_text.setAttribute('style', 'position:relative; bottom: 0px; font-size: 10px;');
        avivid_text.innerHTML = 'Powered by likr®';
        //塞訂閱標題
        var avivid_title = document.createElement('p');
        avivid_title.setAttribute('class', 'avivid_title');
        avivid_title.innerHTML = title;
        //塞訂閱內文
        var avivid_content = document.createElement('p');
        avivid_content.setAttribute('class', 'avivid_content');
        avivid_content.innerHTML = content;
        //avivid_requestPermission.src = "https://"+AviviD.web_id+".likr.com.tw/pushEndPoint/requestPermission.php";
        AviviD.console(avivid_requestPermission);
        AviviD.console(document.body);
        document.body.appendChild(avivid_requestPermission);
        avivid_requestPermission.appendChild(avivid_icon);
        avivid_requestPermission.appendChild(avivid_button_1);
        avivid_requestPermission.appendChild(avivid_button_2);
        avivid_requestPermission.appendChild(avivid_text);
        avivid_requestPermission.appendChild(avivid_title);
        avivid_requestPermission.appendChild(avivid_content);
    }

    AviviD.trigger_safari_requestPermission = function (trigger) {
        if (trigger == 'access') {
            document.getElementById('avivid_requestPermission').style.display = 'none';

            var already_exist = (AviviD.get_cookie('AviviD_already_exist') != null) ? AviviD.get_cookie('AviviD_already_exist') : 0;
            if (already_exist == 0) {
                if(AviviD.settings.is_aws == '1')
                {
                    AviviD.regSafari_aws();
                }
                else
                {
                    AviviD.regSafari();
                }
            }
            else {
                AviviD.console('AviviD token exist');
            }
        }
        else {
            document.getElementById('avivid_requestPermission').style.display = 'none';
            AviviD.set_cookie('AviviD_already_exist', '1', 1);
        }
    }

    AviviD.trigger_requestPermission = function (trigger) {
        if (trigger == 'access') {
            document.getElementById('avivid_requestPermission').style.display = 'none';

            var already_exist = (AviviD.get_cookie('AviviD_already_exist') != null) ? AviviD.get_cookie('AviviD_already_exist') : 0;
            if (already_exist == 0) {
                if(AviviD.settings.is_aws == '1')
                {
                    AviviD.requestPermissionFCM_aws();
                }
                else
                {
                    AviviD.requestPermissionFCM();
                }
            }
            else {
                AviviD.console('AviviD token exist');
            }
        }
        else {
            document.getElementById('avivid_requestPermission').style.display = 'none';
        }
    }



    AviviD.onpage_push = function () {
        var has_onpage_received = (AviviD.get_cookie('AviviD_has_onpage_received') != null) ? parseInt(AviviD.get_cookie('AviviD_has_onpage_received'), 10) : 0;
        var has_onpage_time = (AviviD.get_cookie('AviviD_has_onpage_time') != null) ? parseInt(AviviD.get_cookie('AviviD_has_onpage_time'), 10) : 0;
        var time = new Date();
        var timestamp = time.getTime();
        var diff_time = (timestamp - has_onpage_time) / 1000 / 60;
        var onpage_show_time = (timestamp - AviviD.in_time) / 1000;
        AviviD.in_time = timestamp;
        if (has_onpage_received < 3 && diff_time > 3) {
            navigator.serviceWorker.getRegistrations().then(async function (regs) {
                AviviD.console("getRegistrations :", regs);
                if (regs) {
                    for (var i = 0; i < regs.length; i++) {
                        if (regs[i]['active']['scriptURL'].match(/.*\/firebase-messaging-sw.js$/)) {
                            var reg = regs[i];
                        }
                    }
                    AviviD.console("useServiceWorker :", reg);

                    if (AviviD.received % 2 == 0) {
                        var type = 'landing';
                    }
                    else {
                        var type = 'browsing';
                    }
                    // 取得showNotification所需資料
                    var pushData = await AviviD.getOnpageData(type);
                    ////////////////////////記錄露出
                    // AviviD.console('pushData : ', pushData);

                    // //AviviD settings
                    // var IMPRESSION_LOG_RECIEVER = 'https://load-balancer.likr.com.tw/pushServer/impression_log_receiver.php';
                    // var fetchParams = {
                    //     web_id: AviviD.web_id,
                    //     category_id: AviviD.category_id,
                    //     msg_source: AviviD.msg_source ? AviviD.msg_source : 'onpage',
                    //     sw_source: self.location.origin
                    // };

                    // var impressionLogRecieverUrlObject = AviviD.createUrlObject(IMPRESSION_LOG_RECIEVER, fetchParams);
                    // AviviD.console('IMPRESSION_LOG_RECIEVER urlObject :', impressionLogRecieverUrlObject);

                    // //send impression log
                    // fetch(impressionLogRecieverUrlObject).then(function (res) {
                    //     if (res.status !== 200) {
                    //         throw new Error('IMPRESSION_LOG_RECIEVER error code: ' + res.status);
                    //     }
                    //     return AviviD.console('IMPRESSION_LOG_RECIEVER res:', res);
                    // }).catch(function (err) {
                    //     return console.error('IMPRESSION_LOG_RECIEVER error:', err);
                    // });
                    //////////////////////////////////


                    if (pushData.title != '_') {
                        await reg.getNotifications().then(function (pushs) {

                            pushs.forEach(function (push) {
                                setTimeout(push.close.bind(push), 500);
                            });

                        });
                        //收過幾則onpage寫入cookie
                        has_onpage_received += 1;
                        AviviD.set_cookie_days('AviviD_has_onpage_received', has_onpage_received, 1);
                        //間隔三分鐘不要出現
                        AviviD.set_cookie('AviviD_has_onpage_time', timestamp);
                        // /** test area */
                        // AviviD.likrTimer.test.pushSuccess();
                        // /** test area end */
                        return reg.showNotification(pushData.title, pushData.content);
                    }
                    else {
                        // /** test area */
                        // AviviD.likrTimer.test.contentNone();
                        // /** test area end */
                        return;
                    }


                }
            });
        }
        else {
            var error_url = 'https://kangaroo.likr.com.tw/api/onpage_error_api.php';
            var fetchParams = {
                web_id: AviviD.web_id,
                uuid: AviviD.uuid,
                msg_source: 'onpage',
                sw_source: self.location.origin,
                has_onpage_received: has_onpage_received,
                diff_time: diff_time,
                onpage_show_time: onpage_show_time,
                current_url: window.location.href,

            };

            var urlObject = AviviD.createUrlObject(error_url, fetchParams);

            //send impression log
            // fetch(urlObject); //20200831
        }

    }

    AviviD.getOnpageData = async function (onpage_type) {
        var defaultData = {
            title: "_",
            content: {
                body: "點擊觀看更多資訊",
                icon: AviviD.settings.icon_path,
                requireInteraction: true,
                data: {
                    click_url: "https://www.likr.com.tw/",
                    web_id: AviviD.web_id,
                    uuid: AviviD.uuid,
                    push_id: "",
                    msg_source: "error"
                }
            }
        };

        // ////////// 爬蟲

        //         var website_title =(null != document.querySelector(AviviD.selector)) ? document.querySelector(AviviD.selector).innerHTML : 'no_title';
        //////////
        // if(!data.push_id)
        // {
        //     console.error('notificationDataError: data.push_id not existed, use defaultData.');
        //     return defaultData;
        // }

        var ad_id = (AviviD.get_cookie('AviviD_ad_id') != null) ? AviviD.get_cookie('AviviD_ad_id') : "_";

        var ua = AviviD.UAResult;

        var data_ajax = {
            is_crescent: AviviD.settings.is_crescent,
            received: AviviD.received,
            title: AviviD.title,
            page_view: AviviD.page_view_num,
            uuid: AviviD.uuid,
            web_id: AviviD.web_id,
            onpage_type: onpage_type,
            website_type: AviviD.settings.website_type,
            browser_ver: ua.browser.version,
            os_ver: ua.os.version,
            user_agent: ua.ua,
            client_href: window.location.href,
            os_type: AviviD.int_os_type,
            browser_type: AviviD.int_browser_type,
            ad_id: ad_id,
        };


        var NotificationData = {};

        var url = 'https://load-balancer.likr.com.tw/api/get_onpage_data.php';
        var payload = AviviD.createUrlObject(url, data_ajax);

        var fetch_res = fetch(payload).then(function (res) {
            if (res.status !== 200) {
                throw new Error('error code: ' + res.status);
            }
            return res.json();
        }).then(function (data_array) {

            return data_array;
        }).catch(function (err) {
            return console.error('error:', err);
        });

        var catch_res = await fetch_res;

        //============================================================
        if ('no_ad_id' != catch_res.ad_id && null != catch_res.ad_id) {
            ad_id = ("_" == ad_id) ? catch_res.ad_id : ad_id + "," + catch_res.ad_id;
            var d = new Date();
            var y = d.getFullYear();
            var m = d.getMonth() + 1;
            var day = d.getDate();
            var today = y + '/' + m + '/' + day;
            var sd = new Date(today + ' 23:59:59');
            var now = d.getTime();
            var sd_time = sd.getTime();
            var diff = (sd_time - now) / 1000 / 60;
            AviviD.set_cookie_minutes('AviviD_ad_id', ad_id, Math.floor(diff));
        }
        //====================只要活到半夜十二點=============================
        var title = catch_res.title;
        var msg = catch_res.msg;
        var icon = catch_res.icon;
        var image = catch_res.image;
        var click_url = catch_res.click_url;
        AviviD.msg_source = catch_res.msg_source;
        // var button1_url = catch_res.button1_url;
        // var button2_url = catch_res.button2_url;
        // var button1_title = catch_res.button1_title ? catch_res.button1_title : '';
        // var button1_icon = catch_res.button1_icon ? catch_res.button1_icon : '';
        // var button2_title = catch_res.button2_title ? catch_res.button2_title : '';
        // var button2_icon = catch_res.button2_icon ? catch_res.button2_icon : '';
        var content_id = catch_res.content_id;


        NotificationData.title = title ? title : defaultData.title;

        var content = {};
        content.body = msg ? msg : defaultData.content.body;
        content.icon = icon ? icon : defaultData.content.icon;
        content.image = image ? image : "";
        content.requireInteraction = true;
        // content.renotify = data.renotify == "true" ? true : false;
        // content.silent = data.silent == "true" ? true : false;
        // content.tag = data.tag ? data.tag : "";
        content.data = {
            web_id: AviviD.web_id,
            uuid: AviviD.uuid,
            click_url: click_url ? click_url : defaultData.content.data.click_url,
            content_id: content_id ? content_id : 'default_content',
            // button1_url: button1_url,
            // button2_url: button2_url,
            msg_source: 'onpage'
        };

        // var actions = [];
        // if(button1_title)
        // {
        //     actions.push({action: 'button1', title: button1_title, icon: button1_icon ? button1_icon : ""});
        // }

        // if(button2_title)
        // {
        //     actions.push({action: 'button2', title: button2_title, icon: button2_icon ? button2_icon : ""});
        // }


        // if(actions.length > 0) content.actions = actions;
        if (!content.image) delete content.image;
        NotificationData.content = content;

        AviviD.received += 1;



        return NotificationData;

    }

    AviviD.page_view = function () {
        AviviD.page_view_num = parseInt(AviviD.get_cookie('page_view'), 10) + 1 || 1;
        if (AviviD.page_view_num == 10) {
            AviviD.page_view_num = 0;
        }

        AviviD.set_cookie_days('page_view', AviviD.page_view_num, 1);

    }
    //客戶端 UUID
    AviviD.uuid = AviviD.get_uuid();
    //票券導讀開關
    // AviviD.coupon_flag();


    // setTimeout(function () { AviviD.coupon_controller() }, 10000);


    AviviD.loadScript = function (url, id = null) {
        type = url.split(".").reverse()[0];
        switch (type) {
            case 'js':
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = url;
                // var script = document.createElement('link');
                // script.rel = "preload";
                // script.href = url;
                // script.as = "script";
                break;
            case 'css':
                var script = document.createElement('link');
                script.rel = 'stylesheet';
                script.type = 'text/css';
                if (id != null) {
                    script.id = id;
                }
                script.href = url;
                break;
            default: break;
        }
        // Adding the script tag to the head as suggested before
        var head = document.head;

        // Fire the loading
        head.appendChild(script);
    }


    AviviD.compensation_subscribe = function (choose) {


        switch (choose) {
            case 'accept':
                AviviD.set_cookie('AviviD_show_sub', '1');
                AviviD.waterfall_disappear("avivid_waterfall_subscribe");
                var url = "https://" + AviviD.web_id + ".likr.com.tw/pushEndPoint/subscribe/v2/sub.html?web_id=" + AviviD.web_id + "&client_href=" + AviviD.client_href + "&avivid_regid=" + AviviD.avivid_regid + "&category_id=" + AviviD.category_id;
                AviviD.debugLog("go_to_subscribe :", url);
                window.open(url, AviviD.web_id + '_' + AviviD.category_id, "height=130, width=320, left=100, top=50");
                //紀錄二次訂閱log
                AviviD.fcm_sec_log('a','0');
                // var data = {
                //     choose:'a',
                //     web_id:AviviD.web_id,
                //     uuid: AviviD.uuid,
                // }
                // var url = 'https://webpush-api02.likr.com.tw/pushServer/count_fcm_sec.php';
                // jQuery.ajax({
                //     url: url,
                //     type: "POST",
                //     data: data,
                //     error: function (xhr, ajaxOptions, thrownError) {
                //         console.log("xhr :", xhr);
                //         console.log("ajaxOptions :", ajaxOptions);
                //         console.log("thrownError :", thrownError);
                //         console.log('status code : ' + xhr.status + ' , ajaxOptions : ' + ajaxOptions);
                //     }
                // });

                break;
            case 'block':
                AviviD.set_cookie('AviviD_show_sub', '1', 7);
                AviviD.waterfall_disappear("avivid_waterfall_subscribe");
                AviviD.waterfall_disappear('avivid_waterfall_subscribe_setting');
                ////紀錄二次訂閱log
                AviviD.fcm_sec_log('b','0');
                // var data = {
                //     choose:'b',
                //     web_id:AviviD.web_id,
                //     uuid: AviviD.uuid,
                // }
                // var url = 'https://webpush-api02.likr.com.tw/pushServer/count_fcm_sec.php';
                // jQuery.ajax({
                //     url: url,
                //     type: "POST",
                //     data: data,
                //     error: function (xhr, ajaxOptions, thrownError) {
                //         console.log("xhr :", xhr);
                //         console.log("ajaxOptions :", ajaxOptions);
                //         console.log("thrownError :", thrownError);
                //         console.log('status code : ' + xhr.status + ' , ajaxOptions : ' + ajaxOptions);
                //     }
                // });
                break;
            default:
                break;

        }

    }
    AviviD.compensation = function () {

        var already_show_sub = (AviviD.get_cookie('AviviD_show_sub') != null) ? AviviD.get_cookie('AviviD_show_sub') : 0;
        if (AviviD.settings.compensation_enable === '1' && AviviD.settings.native_enable === '1' && AviviD.settings.banner_native === '0' && AviviD.settings.ad_banner_enable === '0') {
            if (already_show_sub != '1') {
                if (AviviD.messaging && AviviD.waterfall_subscribe_module && AviviD.highest_zindex && AviviD.subscribe_waterfall) {
                    AviviD.messaging.getToken()
                        .then(function (currentToken) {
                            AviviD.console('token exists');
                        })
                        .catch(function (err) {
                            AviviD.loadScript("https://avivid.likr.tw/api/avivid_waterfall_subscribe_v2.css", "AviviD_waterfall_subscribe");
                            AviviD.loadScript("https://avivid.likr.tw/api/avivid_waterfall_webpush.css", "AviviD_waterfall_webpush");
                            jQuery("html").append(AviviD.waterfall_subscribe_module(1, "AviviD.compensation_subscribe"));
                            AviviD.highest_zindex('avivid_waterfall');
                            AviviD.subscribe_waterfall(screen.width, 'avivid_waterfall_subscribe');

                            jQuery('#avivid_waterfall_subscribe').on('mousemove click',function(event){
                                var already_exist = (AviviD.get_cookie('AviviD_already_exist') != null) ? AviviD.get_cookie('AviviD_already_exist') : 0;
                                AviviD.fcm_sec_log('0',already_exist);
                                jQuery(this).unbind(event);
                            })
                            //紀錄二次訂閱log
                            // var already_exist = (AviviD.get_cookie('AviviD_already_exist') != null) ? AviviD.get_cookie('AviviD_already_exist') : 0;
                            // AviviD.fcm_sec_log('0',already_exist);

                            // var data = {
                            //     web_id:AviviD.web_id,
                            //     uuid: AviviD.uuid,
                            //     already_exist:already_exist,
                            // }
                            // var url = 'https://webpush-api02.likr.com.tw/pushServer/count_fcm_sec.php';
                            // jQuery.ajax({
                            //     url: url,
                            //     type: "POST",
                            //     data: data,
                            //     error: function (xhr, ajaxOptions, thrownError) {
                            //         console.log("xhr :", xhr);
                            //         console.log("ajaxOptions :", ajaxOptions);
                            //         console.log("thrownError :", thrownError);
                            //         console.log('status code : ' + xhr.status + ' , ajaxOptions : ' + ajaxOptions);
                            //     }
                            // });

                        });
                }
                else {
                    setTimeout(function () { AviviD.compensation() }, 500);
                }

            }
        }
    }
    AviviD.checktoken =  function()
    {
        if(!AviviD.firebaseApp)
        {
            AviviD.loadFirebase();
        }
        if(AviviD.messaging)
        {
            AviviD.messaging.getToken()
                .then(function(token)
                {
                    console.log(token);
                })
                .catch(function(err)
                {
                    console.log(err);
                })
        }
        else
        {
            setTimeout(function () { AviviD.checktoken() }, 500);
        }

    }
    AviviD.fcm_sec_log = function(choose,already_exist)
    {
        //紀錄二次訂閱log

        var data = {
            choose:choose,
            web_id:AviviD.web_id,
            uuid: AviviD.uuid,
            already_exist:already_exist,
        }
        var url = 'https://webpush-api02.likr.com.tw/pushServer/count_fcm_sec.php';
        jQuery.ajax({
            url: url,
            type: "POST",
            data: data,
            error: function (xhr, ajaxOptions, thrownError) {
                console.log("xhr :", xhr);
                console.log("ajaxOptions :", ajaxOptions);
                console.log("thrownError :", thrownError);
                console.log('status code : ' + xhr.status + ' , ajaxOptions : ' + ajaxOptions);
            }
        });
    }
    AviviD.banner_old = function () {
        var already_show_sub = (AviviD.get_cookie('AviviD_show_sub') != null) ? AviviD.get_cookie('AviviD_show_sub') : 0;

        if (already_show_sub != '1') {
            if (AviviD.waterfall_subscribe_module && AviviD.highest_zindex && AviviD.subscribe_waterfall) {
                AviviD.loadScript("https://avivid.likr.tw/api/avivid_waterfall_subscribe_v2.css", "AviviD_waterfall_subscribe");
                AviviD.loadScript("https://avivid.likr.tw/api/avivid_waterfall_webpush.css", "AviviD_waterfall_webpush");
                jQuery("html").append(AviviD.waterfall_subscribe_module(1, "AviviD.compensation_subscribe"));
                AviviD.highest_zindex('avivid_waterfall');
                AviviD.subscribe_waterfall(screen.width, 'avivid_waterfall_subscribe');
            }
            else {
                setTimeout(function () { AviviD.banner_old() }, 500);
            }
        }
    }
    /**
     * @todo 獲取當前web_id, token, uuid作為mapping資訊回傳subscribe
     */
    AviviD.token_uuid_mapping = function() {
        if(AviviD.get_cookie('AviviD_token_retake') == null){
            if(AviviD.messaging != undefined){
                AviviD.messaging.getToken()
                    .then(function (currentToken) {
                        if (currentToken) {
                            let AviviD_payload = {
                                'web_id' : AviviD.web_id,
                                'uuid'   : AviviD.uuid,
                                'token'  : currentToken,
                                'webuserid':AviviD.webuserid
                            };
                            jQuery.ajax({
                                url: "https://auto-load-balancer.likr.com.tw/pushServer/remapping.php",
                                type: "POST",
                                data: AviviD_payload,
                                success: function (data) {
                                    AviviD.set_cookie('AviviD_token_retake',1,30);
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                    AviviD.set_cookie('AviviD_token_retake',0,7);
                                }
                            });
                        } else {
                            AviviD.set_cookie('AviviD_token_retake',0,7);
                        }

                    }).catch(function (err) {
                        AviviD.set_cookie('AviviD_token_retake',0,7);
                    });
            }
            else {
                setTimeout(function () { AviviD.token_uuid_mapping() }, 2000);
            }

        }
    }
    //開始鈴鐺程序
    AviviD.construct(AviviD.main);
}


//detects if user uses Internet Explorer
//returns version of IE or Edge, if browser is not IE return 0
//Function to detect IE or not
AviviD.DetectIE_Version = function () {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
        // IE 10 or older, return version number
        return (parseInt(ua.substring(
            msie + 5, ua.indexOf('.', msie)), 10));
    }
    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
        // IE 11, return version number
        var rv = ua.indexOf('rv:');
        return (parseInt(ua.substring(
            rv + 3, ua.indexOf('.', rv)), 10));
    }
    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
        //Edge (IE 12+), return version number
        return (parseInt(ua.substring(
            edge + 5, ua.indexOf('.', edge)), 10));
    }
    // User uses other browser
    return 0;
}

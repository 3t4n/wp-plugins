jQuery(document).ready(function($) {
    if (gainurl.gainc != 0) {
        var cdate = new Date;
        cdate.setDate(cdate.getDate() + gainurl.gainc);
    }
    clics_num = typeof(get_gainurl_cookie('gainurl_show')) !== "undefined" ? parseInt(get_gainurl_cookie('gainurl_show')) : 0;
    if (clics_num >= (gainurl.show_after - 1) || gainurl.show_after == 0 || typeof(gainurl.show_after) === "undefined") {
        var links = document.links;
        for (var i = 0; i < links.length; i++) {
            var newHref = "https://gainurl.com/st/?api=" + gainurl.apikey + "&url=" + encodeURIComponent(links[i].href);
            for (var j = 0; j < gainurl.excerpt_urls.length; j++)
                if (gainurl.excerpt_urls[j] && links[i].href.indexOf(gainurl.excerpt_urls[j]) > -1) {
                    newHref = "";
                }
            if (newHref != "") {
                if (links[i].href.indexOf('//' + window.location.host) > -1) {
                    if (gainurl.internal == true && get_gainurl_cookie('gainurl_internal') != gainurl.gainc) {
                        links[i].rel = "nofollow";
                        links[i].className += " gainurli";
                        links[i].href = newHref;
                    }
                } else {
                    if (gainurl.external == true && get_gainurl_cookie('gainurl_external') != gainurl.gainc) {
                        links[i].rel = "nofollow";
                        links[i].className += " gainurle";
                        links[i].href = newHref;
                    }
                }
                if (typeof(gainurl.special_urls) !== "undefined" && get_gainurl_cookie('gainurl_special_urls') != gainurl.gainc)
                    for (var k = 0; k < gainurl.special_urls.length; k++)
                        if (gainurl.special_urls[k] && links[i].href == gainurl.special_urls[k]) {
                            links[i].href = "https://gainurl.com/st/?api=" + gainurl.apikey + "&url=" + encodeURIComponent(links[i].href);
                            links[i].rel = "nofollow";
                            links[i].className += " gainurlip";
                        }
            }
        }
        $(".gainurle").on("click", function() {
            show_gainurl(this.href, 'gainurl_external');
            return false;
        });
        $(".gainurli").on("click", function() {
            show_gainurl(this.href, 'gainurl_internal');
            return false;
        });
        $(".gainurlip").on("click", function() {
            show_gainurl(this.href, 'gainurl_special_urls');
            return false;
        });
    } else {
        var c = 'gainurl_show=' + (clics_num + 1) + '; path=/;';
        c += (typeof(cdate) !== "undefined") ? " expires=" + cdate.toUTCString() : "";
        document.cookie = c;
    }

    function show_gainurl(link, name) {
        var el = document.createElement("iframe");
        var div = document.createElement("div");
        document.body.appendChild(div);
        div.style.backgroundColor = "rgba(0, 0, 0, 0.6)";
        div.style.width = "100%";
        div.style.height = "100%";
        div.style.position = "fixed";
        div.style.top = 0;
        div.style.left = 0;
        div.style.zIndex = 1050;
        div.appendChild(el);
        el.id = 'iframe';
        el.style.position = "absolute";
        el.style.borderWidth = 0;
		el.style.width = "100%";
        el.style.height = "100%";
		if(document.documentElement.clientWidth < 900){
			el.style.left = 0;
		}else{
			el.style.maxWidth = "900px";
			el.style.maxHeight = "800px";
			el.style.left = "50%";
			el.style.marginLeft = "-450px";
		}
		if(document.documentElement.clientHeight < 800){
			el.style.top = 0;
		}else{
			el.style.top = "50%";
			el.style.marginTop = "-400px";
		}
        el.src = link;
        var c = name + '=' + gainurl.gainc + '; path=/;';
        c += (typeof(cdate) !== "undefined") ? " expires=" + cdate.toUTCString() : "";
        document.cookie = c;
    }

    function get_gainurl_cookie(name) {
        var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
});
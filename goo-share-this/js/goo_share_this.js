var sourceSwap = function () {
                        var $this = jQuery(this);
                        var newSource = $this.data("alt-src");
                        $this.data("alt-src", $this.css("background-image"));
                        $this.css("background-image", newSource);
                    };
					
jQuery("span.goosharethis_span").hover(sourceSwap, sourceSwap);

jQuery("div.goosh_chainH_container").hover(function() {
	jQuery( this ).find("span:first").animate({ "width": "-=35px" }, "fast" );
  },function() {
	jQuery( this ).find("span:first").animate({ "width": "+=35px" }, "fast" );
});
  
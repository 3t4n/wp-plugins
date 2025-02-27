if (typeof(jQueryadd) == "undefined") var jQueryadd = {
    version: {},
    auto: {
        disabled: false
    }
};


jQuery(function() {
    for (var k in jQueryadd.auto) {
        if (typeof(jQueryadd.auto[k]) == "function") {
            jQueryadd.auto[k]();
        }
    }
});
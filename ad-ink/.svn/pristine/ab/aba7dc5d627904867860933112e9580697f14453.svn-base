window.filter_monthdate = function (val) {
    return moment.utc(val).format("MMMM YYYY");
}

window.filter_date = function (val) {
    var d = moment.utc(val)
    return d.isValid() ? d.format("DD/MM/YYYY") : ""
}

window.filter_hour = function (val) {
    var d = moment.utc(val)
    return d.isValid() ? d.format("HH") : ""
}

window.filter_device = function (val) {
    switch (parseInt(val)) {
        case 1:
            return "Ordinateur";
            break;
        case 2:
            return "Smartphone";
            break;
        case 3:
            return "Tablette";
            break;
        default:
            return val;
    }
}

window.filter_bignumber = function (value) {
    if (value === 0 || value === undefined) {
        return "-";
    }

    var si = [{
            value: 1,
            symbol: ""
        },
        {
            value: 1e3,
            symbol: "k"
        },
        {
            value: 1e6,
            symbol: "M"
        },
        {
            value: 1e9,
            symbol: "G"
        },
        {
            value: 1e12,
            symbol: "T"
        },
        {
            value: 1e15,
            symbol: "P"
        },
        {
            value: 1e18,
            symbol: "E"
        }
    ];
    var rx = /\.0+$|(\.[0-9]*[1-9])0+$/;
    var i;
    for (i = si.length - 1; i > 0; i--) {
        if (value >= si[i].value) {
            break;
        }
    }
    return (
        (value / si[i].value)
        .toFixed(1)
        .toLocaleString("fr-FR")
        .replace(rx, "$1") + si[i].symbol
    );
}

window.filter_percentage = function (value) {
    if (value === 0 || value === undefined) {
        return "-";
    }
    return (
        (Math.round(value * 100 * 100) / 100).toLocaleString("fr-FR") +
        "%"
    );
}

window.filter_currency = function (value) {
    if (value === 0 || value === undefined) {
        return "-";
    }
    return (
        (Math.round(value * 100) / 100).toLocaleString("fr-FR") + "€"
    );
}
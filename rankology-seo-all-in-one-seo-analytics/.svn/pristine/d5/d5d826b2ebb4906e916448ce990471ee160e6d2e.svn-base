/* Start Rankology-stats Admin Js */
var rkns_js = {};

/* Get Rankology Stats global Data From Frontend */
rkns_js.global = (typeof rkns_global != 'undefined') ? rkns_global : [];

/* WordPress Global Lang */
rkns_js._ = function (key) {
    return (key in this.global.i18n ? this.global.i18n[key] : '');
};

/* Check Active Option */
rkns_js.is_active = function (option) {
    return rkns_js.global.options[option] === 1;
};
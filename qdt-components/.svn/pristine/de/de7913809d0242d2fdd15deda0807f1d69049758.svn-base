var qConfig = {
    "config": {
        "host": vars.qdt_host,
        "secure": (vars.qdt_secure==="1") ? true : false,
        "port": parseInt(vars.qdt_port),
        "prefix": vars.qdt_prefix,
        "appId": vars.qdt_appId
    },
    "connections": { 
        "vizApi": true, 
        "engineApi": true
    }
}
var QdtComponent = new window.QdtComponents(qConfig.config, qConfig.connections);
// Make sure we call jQuery
if (!$ && jQuery) var $ = jQuery;
$('.wp-qdt').each(function () {
    var type = $(this).data('type');
    var element = document.getElementById('qdt_'+$(this).data('id'));
    var props = {};
    if (type === 'QdtViz') {
        props.id = $(this).data('id');
        props.height = ($(this).data('height')) ? $(this).data('height') : '400px';
    } else if (type === 'QdtKpi') {
        props.cols = [$(this).data('expr')];
    }
    QdtComponent.render(type, props, element);
})
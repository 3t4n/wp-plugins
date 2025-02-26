( function( wp ) {
    var registerPlugin = wp.plugins.registerPlugin;
    var PluginSidebar = wp.editPost.PluginSidebar;
    var el = wp.element.createElement;

    registerPlugin( 'my-plugin-sidebar', {
        render: function() {
            return el( PluginSidebar,
                {
                    name: 'firepro-sidebar',
                    icon: 'admin-post',
                    title: 'Fireprosidebar',
                },
                'Added setting here'
            );
        },
    } );
} )( window.wp )
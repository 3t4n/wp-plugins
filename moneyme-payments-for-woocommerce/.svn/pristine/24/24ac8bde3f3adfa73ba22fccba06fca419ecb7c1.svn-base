class CustomPlugin extends ItlySdk.Plugin {
    constructor() {
        super('custom');
    }

    identify(userId, options) {
        rudderanalytics.identify(userId, options)
    }

    track(_, event, options) {
        rudderanalytics.track(event.name, event.properties, options);
    }

    page(userId, category, name, properties, options) {
        rudderanalytics.page(category, name, properties, options);
    }


}

mmeAnalytics.load({
    plugins: [new CustomPlugin()],
    environment: 'production'
});

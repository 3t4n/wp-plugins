const webpackConfig = require('./webpack.test.config.js');

module.exports = function (config) {
    config.set({
        basePath: '',
        frameworks: ['mocha', 'chai'],

        files: [
            { pattern: 'src/tests.webpack.js', watched: false }
        ],

        preprocessors: {
            'src/tests.webpack.js': ['webpack', 'sourcemap']
        },

        webpack: webpackConfig,

        // Hide webpack build information from output
        webpackMiddleware: {
            noInfo: 'errors-only'
        },

        // the default configuration
        junitReporter: {
            outputDir: '', // results will be saved as $outputDir/$browserName.xml
            outputFile: undefined, // if included, results will be saved as $outputDir/$browserName/$outputFile
            suite: 'CallUs', // suite will become the package name attribute in xml testsuite element
            useBrowserName: false, // add browser name to report and classes names
            nameFormatter: undefined, // function (browser, result) to customize the name attribute in xml testcase element
            classNameFormatter: undefined, // function (browser, result) to customize the classname attribute in xml testcase element
            properties: {} // key value pair of properties to add to the <properties> section of the report
        },

        remapOptions: {
            mapFileName: filename => filename.replace(/\?.*$/, '')
        },

        coverageReporter: {
            type: 'in-memory'
        },

        remapCoverageReporter: {
            'text-summary': null,
            json: './coverage/coverage.json',
            cobertura: './coverage/cobertura.xml',
            html: './coverage/html'
        },

        singleRun: true,

        client: {
            mocha: {
                timeout: 4000,
            }
        },
        reporters: [
            'spec',
            'junit',
            'coverage',
            'remap-coverage'
        ],

        browsers: [
            'ChromeMedia'
        ],

        customLaunchers: {
            'ChromeMedia': {
                base: 'Chrome',
                flags: ['--use-fake-ui-for-media-stream', '--use-fake-device-for-media-stream']
            },
            'ChromeMediaHeadless': {
                base: 'ChromeHeadless',
                flags: ['--use-fake-ui-for-media-stream', '--use-fake-device-for-media-stream']
            }
        },

    })
};

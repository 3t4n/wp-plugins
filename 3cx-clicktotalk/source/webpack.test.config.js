const VueLoaderPlugin = require('vue-loader').VueLoaderPlugin;
const TsconfigPathsPlugin = require('tsconfig-paths-webpack-plugin');

module.exports = {
    mode: 'development',
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
            },
            {
                test: /\.(png|jpg|gif|scss|css|mp3|wav)$/,
                use: ['null-loader']
            },
            {
                test: /\.tsx?$/,
                exclude: [
                    /node_modules/,
                    /__tests__/,
                    /\.spec\.ts$/
                ],
                loader: 'istanbul-instrumenter-loader',
                query: {
                    esModules: true
                }
            },
            {
                test: /\.tsx?$/,
                loader: 'awesome-typescript-loader',
                exclude: /node_modules/,
                options: {
                    appendTsSuffixTo: [/\.vue$/],
                }
            },
            {
                test: /\.(svg)$/,
                loader: 'vue-svg-loader'
            }
        ]
    },
    resolve: {
        mainFields: [ 'es2015', 'browser', 'module', 'main' ],
        plugins: [
            new TsconfigPathsPlugin()
        ],
        extensions: ['.vue', '.ts', '.js', '.json']
    },
    plugins: [
        new VueLoaderPlugin()
    ],
    devtool: 'inline-source-map'
};

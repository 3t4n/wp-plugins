const path = require('path')
const TerserPlugin = require('terser-webpack-plugin')
const { VueLoaderPlugin } = require('vue-loader')
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin

module.exports = {
    entry: {
        app: './lib/app/src/js/app.js',
        customizer: './lib/admin/src/js/customizer.js',
        feedback: './lib/admin/src/js/feedback/app.js',
    },
    output: {
        filename: '[name].min.js',
        path: path.resolve(__dirname, 'dist/js')
    },
    devtool: 'inline-source-map',
    node: {
        fs: 'empty'
    },
    module: {
        rules: [
            {
                test: /\.m?js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                test: /\.vue$/,
                use: {
                    loader: 'vue-loader',
                }
            }
        ]
    },
    optimization: {
        minimizer: [new TerserPlugin()],
    },
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.esm.js'
        },
        extensions: ['*', '.js', '.vue', '.json']
    },
    plugins: [
        new VueLoaderPlugin()
        // new BundleAnalyzerPlugin()
    ]
}
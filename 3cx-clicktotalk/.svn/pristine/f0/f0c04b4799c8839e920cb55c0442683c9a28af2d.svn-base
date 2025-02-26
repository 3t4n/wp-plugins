const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const HtmlWebpackPlugin = require('html-webpack-plugin');
const path = require('path');
const webpack = require('webpack');
const VueLoaderPlugin = require('vue-loader').VueLoaderPlugin;
const TerserPlugin = require('terser-webpack-plugin');
const TsconfigPathsPlugin = require('tsconfig-paths-webpack-plugin');
const package = require('./package.json');

const devtoolModuleFilenameTemplate = info => {
    let $filename = 'sources://' + info.resourcePath;
    if (info.resourcePath.match(/\.vue$/) && !info.query.match(/type=script/)) {
        $filename = 'webpack-generated:///' + info.resourcePath + '?' + info.hash;
    }
    return $filename;
};

const devtoolFallbackModuleFilenameTemplate = 'webpack:///[resource-path]?[hash]';

module.exports = (env, argv) => {
    const isProduction = argv.mode === 'production';
    const devtool = isProduction ? undefined : '#eval-source-map';

    const config = {
        entry: './src/index.ts',
        output: {
            path: path.resolve(__dirname, './dist'),
            filename: 'callus.js',
            library: 'callus',
            libraryTarget: 'umd',

            //https://www.mistergoodcat.com/post/the-joy-that-is-source-maps-with-vuejs-and-typescript
            devtoolModuleFilenameTemplate,
            devtoolFallbackModuleFilenameTemplate
        },
        module: {
            rules: [
                {
                    test: /\.vue$/,
                    loader: 'vue-loader',
                    options: {
                        shadowMode: true
                    }
                },
                {
                    test: /\.(scss|css)$/,
                    oneOf: [
                        // this matches `<style module>`
                        {
                            resourceQuery: /module/,
                            use: [
                                'vue-style-loader?shadowMode=true',
                                {
                                    loader: 'css-loader',
                                    options: {
                                        modules: true,
                                        localIdentName: '[local]_[hash:base64:5]'
                                    }
                                },
                                'postcss-loader'
                            ]
                        },
                        // this matches plain `<style>` or `<style scoped>`
                        {
                            use: [`vue-style-loader?shadowMode=true`, 'css-loader', 'postcss-loader']
                        }
                    ]
                },
                {
                    test: /\.scss$/,
                    loader: 'sass-loader'
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
                    test: /\.(png|jpg|gif|mp3|wav)$/,
                    loader: 'url-loader'
                },
                {
                    test: /\.(svg)$/,
                    loader: 'vue-svg-loader'
                }
            ]
        },
        resolve: {
            mainFields: ['es2015', 'browser', 'module', 'main'],
            plugins: [
                new TsconfigPathsPlugin()
            ],
            extensions: ['.vue', '.ts', '.js', '.json']
        },
        plugins: [
            new BundleAnalyzerPlugin({
                analyzerMode: isProduction ? 'static' : 'disable',
                reportFilename: '../report/index.html',
                openAnalyzer: false
            }),
            new webpack.DefinePlugin({
                'process.env': {
                    VERSION: JSON.stringify(package.version),
                    BUILD_DATE: JSON.stringify(new Date()),
                    BUILD_NUMBER: JSON.stringify(process.env.BUILD_NUMBER)
                }
            }),
            new VueLoaderPlugin(),
            new HtmlWebpackPlugin({
                template: 'src/index.html',
                minify: false,
                inject: 'body'
            }),
        ],
        devServer: {
            historyApiFallback: true,
            noInfo: true
        },
        performance: {
            hints: false
        },
        devtool
    };

    if (isProduction) {
        config.optimization = {
            minimizer: [
                new TerserPlugin({
                    parallel: true,
                    extractComments: false,
                    terserOptions: {
                        ecma: 6
                    }
                }),
            ]
        };

        // http://vue-loader.vuejs.org/en/workflow/production.html
        config.plugins = (config.plugins || []).concat([
            new webpack.LoaderOptionsPlugin({
                minimize: true
            })
        ])
    }

    return config;
};

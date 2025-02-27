const DependencyExtractionWebpackPlugin = require( '@woocommerce/dependency-extraction-webpack-plugin' );
const path = require('path');
const isProduction = process.env.NODE_ENV === 'production';

module.exports = {
    devtool: 'eval-source-map',
    mode: isProduction ? 'production' : 'development',
    target: 'web',
    entry:  './client/blocks/payzenstd.js',
    output: {
        filename: 'payzenstd.js',
        path: path.resolve(__dirname, 'build'),
    },
    module: {
        rules: [{
            test: /\.(js|jsx)$/,
            use: 'babel-loader',
        }]
    },
    plugins: [
        new DependencyExtractionWebpackPlugin(),
    ],
};

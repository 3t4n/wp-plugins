const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const path = require('path');
const TerserPlugin = require("terser-webpack-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");


module.exports = {
    ...defaultConfig,
    entry: {
        'gutenberg': './src/blocks.js',
        'blocks': './src/blocks.scss',
        'back': './src/admin.scss',
        'admin': './src/admin.js',
    },
    output: {
        path: path.join(__dirname, 'assets')
    },
    optimization: {
        minimize: true,
        minimizer: [
          new TerserPlugin(),
          new CssMinimizerPlugin(),
        ]
    }
}
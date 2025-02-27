const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const webpack = require('webpack');


module.exports = {
    entry: {
        admin: './src/js/admin.es6',
        'admin-menu': './src/js/admin.menu.es6',
        'admin-premium': './src/js/admin.premium.es6',
        'public-script': './src/js/public.es6',
        gutenberg: './src/js/gutenberg.block.js',
        'public-style': './src/scss/public.scss',
        'admin-style': './src/scss/admin.scss',
    },
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, 'dist'),
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader',
                ],
            },
        ],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '[name].css',
        }),
        new CopyWebpackPlugin({
            patterns: [
                {
                    from: 'src/images', // Directory di origine
                    to: '', // Directory di destinazione in 'dist'
                },
            ],
        }),
        new webpack.BannerPlugin({
            banner: `Build: ${new Date().toLocaleString()}`,
            include: /\.js$/,
        }),
    ],
    mode: 'development', // Imposta su 'production' per la distribuzione
    // mode: 'production', // Imposta su 'development' per lo sviluppo
};

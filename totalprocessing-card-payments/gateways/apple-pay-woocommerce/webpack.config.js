const path = require('path');

module.exports = {
    mode: 'production',
    entry: './assets/js/express-checkout.js',
    output: {
        filename: 'express-checkout.min.js',
        path: path.resolve(__dirname, 'build'),
    },
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env', '@babel/preset-react'],
                    },
                },
            },
        ],
    },
    resolve: {
        extensions: ['.js', '.jsx'],
    },
    externals: {
        '@woocommerce/blocks-registry': 'wc.wcBlocksRegistry',
        '@wordpress/element': 'wp.element',
    },
};

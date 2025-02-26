const path = require('path');

module.exports = {
    entry: "./src/index.js",
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'dist'),
    },
    resolve: {
        extensions: [ '.tsx', '.ts', '.js' ],
    },
    module: {
        rules: [         
            {
                test: /\.js?$/,
                loader: 'babel-loader',
                exclude: /node_modules|scripts/,
                options: {
                    presets: [["env", "react"]],
                    plugins: ["transform-class-properties", "babel-plugin-transform-object-rest-spread",]
                }
            },   
            {
                test: /\.css$/,
                use: [
                  'style-loader',
                  'css-loader'
                ]
            },
            {
              test: /\.svg$/,
              loader: "svg-inline-loader",
            },
        ],
    }
};
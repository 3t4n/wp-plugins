var path = require('path');
var webpack = require('webpack');
var helper=require('path');
module.exports = {
    entry: {
        videoblock: ['./src/block.tsx']
    },
    output: {
        filename: './[name]_bundle.js'
    },
    resolve: {
        modules: [
            path.resolve('./node_modules')
        ],
        extensions: ['.ts', '.js','.tsx']
    },
    devServer: {
         contentBase: './dist',
        hot:true,
        port:4200
   },
    devtool: 'source-map',
    module: {
        rules: [
            {
                test: /\.js$/,
                use: ["source-map-loader"],
                enforce: "pre",
                exclude:helper.resolve(__dirname,'node_modules/@types/es6-promise')
            },
            {
                test: /\.jsx$/,
                use: ["source-map-loader"],
                enforce: "pre",
                exclude:helper.resolve(__dirname,'node_modules/@types/es6-promise')
            },
            {
                test: /\.ts$/,
                use: ["ts-loader"]
            },
            {
                test: /\.tsx$/,
                use: ["ts-loader"]
            }
        ]
    }, externals: {
        "jQuery":"jQuery",
        'react':'React'
    },
    plugins:[
        new webpack.ProvidePlugin({
            Promise: 'es6-promise'
        },
            new webpack.HotModuleReplacementPlugin()
            )
    ]
};
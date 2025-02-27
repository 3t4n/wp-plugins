var webpack = require('webpack');

module.exports = {
	context: __dirname,
	mode: 'production',
	entry: './block/src/index.js',
	devtool: 'source-map',
	output: {
		path: __dirname + '/block/dist/',
		filename: 'index.js'
	},
	module: {
		rules: [{
				test: /\.js$/,
				exclude: /node_modules/,
				use: [{ 
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-react']
					}
				}],
				//loader: 'babel',
				//query: { presets: ['react'] }
			}
		]
	}
};
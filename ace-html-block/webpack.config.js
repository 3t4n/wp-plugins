module.exports = {
	entry: './aceblock.js',
	output: {
		path: __dirname,
		filename: 'aceblock.build.js',
	},
	module: {
		loaders: [
			{
				test: /.js$/,
				loader: 'babel-loader',
				exclude: /node_modules/,
			},
		],
    },
    externals: {
        'react': 'React',
        'react-dom': 'ReactDOM',
    }
};
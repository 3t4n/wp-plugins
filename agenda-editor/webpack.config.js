const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const TerserPlugin = require('terser-webpack-plugin');
const { findLastKey } = require('lodash');

module.exports = (env, argv) => {
	console.log(argv);
	const mode = argv.mode || 'development';

	return {
		entry: {
			'blocks.build': path.resolve(__dirname, 'src') + '/blocks.tsx',
			'front.dist': path.resolve(__dirname, 'src') + '/frontend/scripts.ts',
			'blocks.editor.plain': path.resolve(__dirname, 'src') + '/plainmode.scss',
			'blocks.editor.build': path.resolve(__dirname, 'src') + '/editor.scss',
			'blocks.style.build': path.resolve(__dirname, 'src') + '/style.scss'
		},
		output: {
			path: path.resolve(__dirname, 'dist'),
			filename: '[name].js'
		},
		watch: true,
		optimization: {
			minimize: true,
			minimizer: [
				new TerserPlugin({
					terserOptions:{
						format:{
							comments:false
						}
					},
					test: /\.(ts|js)x?$/,
					cache: true,
					parallel: true,
					sourceMap: false,
					extractComments: false
				}),
			],
		},
		resolve: {
			extensions: ['.ts', '.tsx', '.js', '.jsx', '.scss']
		},
		module: {
			rules: [
				{
					test: /\.s[ac]ss$/i,
					use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"]
				},
				{
					test: /\.(ts|js)x?$/,
					exclude: [/node_modules/],
					use: {
						loader: 'babel-loader',
						options: {
							presets: ["@babel/preset-typescript", "@babel/preset-env", "@babel/preset-react"]
						}
					}
				}
			],
		},
		devtool: mode === 'development' ? 'cheap-module-eval-source-map' : false,
		plugins: [
			new MiniCssExtractPlugin({ filename: '[name].css' }),
			new OptimizeCSSAssetsPlugin({})
		]
	};
}
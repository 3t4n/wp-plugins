const path = require("path");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");

module.exports = {
	mode: "development",
	entry: {
		ibpb_blocks_registration: ["./src/index.js"]
	},
	devtool: "source-map",
	plugins: [new CleanWebpackPlugin()],
	resolve: {
		modules: [
			path.resolve(__dirname, "./src"),
			path.resolve(__dirname, "node_modules")
		],
		alias: {
			src: path.resolve(__dirname, "./src")
		},
		extensions: ["*", ".js", ".jsx"]
	},
	output: {
		path: path.resolve(__dirname, "dist"),
		filename: "[name].js"
	},
	module: {
		rules: [
			{
				test: /\.(js|jsx)$/,
				exclude: /(node_modules|bower_components)/,
				use: {
					loader: "babel-loader"
				}
			}
		]
	}
};

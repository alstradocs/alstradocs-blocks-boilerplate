const path = require("path");
const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const cssnano = require('cssnano');
const autoprefixer = require('autoprefixer');
const IgnoreEmitPlugin = require( 'ignore-emit-webpack-plugin' );
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { dynamicJsFiles } = require('./config/block-assets');
const Manifest = require('webpack-manifest-plugin');

module.exports = {
	...defaultConfig,
	entry: {
		'editor': path.resolve(__dirname, "assets/scss", "editor.scss"),
		'frontend': path.resolve(__dirname, "assets/scss", "frontend.scss"),
		// Dynamic blocks
		...dynamicJsFiles(),
		
	},
	module: {
		...defaultConfig.module,
		rules: [
			{
				test: /\.tsx?$/,
				use: "ts-loader",
				exclude: /node_modules/,
			},
			...defaultConfig.module.rules,
		],
	},

	resolve: {
		...defaultConfig.resolve,
		extensions: [".tsx", ".ts", ".js", ".jsx", ".scss"],
	},

	output: {
		...defaultConfig.output
	},
	optimization: {
		...defaultConfig.optimization,
	},
	plugins: [
		new IgnoreEmitPlugin([ 'editor.js', 'editor.asset', 'frontend.js', 'frontend.asset' ]),
		...defaultConfig.plugins,
		new Manifest({})
	],
};

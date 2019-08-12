const webpack = require("webpack");
const path = require("path");
const glob = require("glob");
const devMode = process.env.NODE_ENV !== "production";
const VueLoaderPlugin = require("vue-loader/lib/plugin");
const CleanWebpackPlugin = require("clean-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const PurgecssPlugin = require("purgecss-webpack-plugin");
const ManifestPlugin = require("webpack-manifest-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const configFile = require("./config");

const inProduction = process.env.NODE_ENV === "production";
const styleHash = inProduction ? "contenthash" : "hash";
const scriptHash = inProduction ? "chunkhash" : "hash";

// LOADER HELPERS
const extractCss = {
	loader: MiniCssExtractPlugin.loader,
	options: {
		publicPath: `${configFile.assetsPath}static/css/`
	}
};

const cssLoader = {
	loader: "css-loader",
	options: { minimize: inProduction }
};
const config = {
	entry: {
		app: glob.sync("./resources/assets/+(s[ac]ss|js)/main.+(s[ac]ss|js)"),
		login: glob.sync(
			"./resources/assets/+(s[ac]ss|js)/login.+(s[ac]ss|js)"
		),
		admin: glob.sync(
			"./resources/assets/+(s[ac]ss|js)/admin.+(s[ac]ss|js)"
		),
		vendor: ["jquery", "vue"]
	},
	output: {
		path: path.resolve(__dirname, "../static/"),
		filename: devMode ? "js/[name].js" : `js/[name].[${scriptHash}].js`
	},

	module: {
		rules: [
			{
				test: /\.vue$/,
				loader: "vue-loader"
			},
			{
				test: /\.js$/,
				loader: "babel-loader"
			},
			{
				test: /\.css$/,
				use: ["vue-style-loader", extractCss, cssLoader]
			},
			{
				test: /\.scss$/,
				use: [
					"vue-style-loader",
					extractCss,
					cssLoader,
					{
						loader: "sass-loader",
						options: {
							includePaths: [
								path.resolve(
									__dirname,
									"../resources/assets/scss"
								)
							],
							data: '@import "1_settings/variables";'
						}
					}
				]
			},
			{
				test: /\.(png|jpe?g|gif|svg)$/,
				use: [
					{
						loader: "file-loader",
						options: {
							name: "[name].[ext]",
							outputPath: "images/",
							publicPath: `${configFile.fontPath}static/images/`
						}
					},
					"image-webpack-loader"
				]
			},
			{
				test: /\.(woff?|woff2?|eot?|ttf?|otf?|svg?)$/,
				use: [
					{
						loader: "file-loader",
						options: {
							limit: 10000,
							name: devMode
								? "[name].[ext]"
								: "[name].[hash:7].[ext]",
							outputPath: "fonts/",
							publicPath: `${configFile.fontPath}static/fonts/`
						}
					}
				]
			}
		]
	},

	optimization: {
		splitChunks: {
			cacheGroups: {
				vendor: {
					chunks: "all",
					name: "vendor",
					test: "vendor",
					enforce: true
				}
			}
		}
	},

	resolve: {
		alias: {
			vue$: "vue/dist/vue.esm.js",
			images: path.join(__dirname, "../resources/assets/images")
		},
		extensions: ["*", ".js", ".vue", ".json"]
	},

	plugins: [
		new webpack.ProvidePlugin({
			$: "jquery/dist/jquery.js",
			jQuery: "jquery/dist/jquery.js"
		}),
		new VueLoaderPlugin(),

		new MiniCssExtractPlugin({
			filename: devMode
				? "css/[name].css"
				: `css/[name].[${styleHash}].css`
		}),

		// removes css used in javascript, so disabled for now
		// new PurgecssPlugin({
		// 	paths: () => glob.sync(path.join(__dirname, '../resources/**/*'), { nodir: true }),
		// 	only: ['app']
		// }),

		new ManifestPlugin(),

		new BrowserSyncPlugin({
			host: "localhost",
			port: 3000,
			proxy: configFile.devUrl, // YOUR DEV-SERVER URL
			files: ["./*.php", "./resources/views/**/*.twig", "./static/*.*"]
		})
	]
};
if (process.env.NODE_ENV === "production") {
	config.plugins.push(
		new CleanWebpackPlugin(["static/css/*", "static/js/*"], {
			root: path.join(__dirname, "../"),
			watch: true
		})
	);
}
module.exports = config;

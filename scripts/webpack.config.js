'use strict';

const webpack = require('webpack');
const AssetsPlugin = require('assets-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const FriendlyErrorsPlugin = require('friendly-errors-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const path = require('path');
const fs = require('fs');

const appDirectory = fs.realpathSync(process.cwd());

function resolveApp(relativePath) {
  return path.resolve(appDirectory, relativePath);
}

const paths = {
  appSrc: resolveApp('src'),
  appBuild: resolveApp('dist'),
  appIndexJs: resolveApp('src/main.js'),
  appNodeModules: resolveApp('node_modules'),
};

const DEV = process.env.NODE_ENV === 'development';

const webpackConfig = {
  bail: !DEV,
  mode: DEV ? 'development' : 'production',
  target: 'web',
  devtool: DEV ? 'eval-cheap-source-map' : 'source-map',
  entry: [paths.appIndexJs],
  output: {
    path: paths.appBuild,
    filename: DEV ? 'scripts.js' : 'scripts.[hash:8].js',
  },
  module: {
    rules: [
      // Disable require.ensure as it's not a standard language feature.
      { parser: { requireEnsure: false } },
      // Transform ES6 with Babel
      {
        test: /\.js?$/,
        loader: 'babel-loader',
        include: paths.appSrc,
      },
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          DEV ? 'style-loader' : MiniCssExtractPlugin.loader,
          'css-loader',
          {
            loader: 'postcss-loader',
            options: {
              postcssOptions: {
                ident: 'postcss', // https://webpack.js.org/guides/migrating/#complex-options
                plugins: ['autoprefixer'],
              },
            },
          },
          'sass-loader',
        ],
      },
    ],
  },
  optimization: {
    minimize: !DEV,
    minimizer: [
      new OptimizeCSSAssetsPlugin({
        cssProcessorOptions: {
          map: {
            inline: false,
            annotation: true,
          },
        },
      }),
      new TerserPlugin({
        terserOptions: {
          compress: {
            warnings: false,
          },
        },
        extractComments: true,
      }),
    ],
  },
  plugins: [
    !DEV && new CleanWebpackPlugin(),
    new SVGSpritemapPlugin('./src/assets/icons/**/*.svg', {
      output: {
        filename: 'assets/icons.svg',
        svgo: {
          plugins: [
            {
              name: 'removeTitle',
            },
            {
              name: 'removeAttrs',
              params: { attrs: '(stroke|fill)' },
            },
          ],
        },
      },
      sprite: {
        prefix: 'icon-',
      },
      styles: {
        keepAttributes: false,
      },
    }),
    new MiniCssExtractPlugin({
      filename: DEV ? 'styles.css' : 'styles.[hash:8].css',
    }),
    new webpack.EnvironmentPlugin({
      NODE_ENV: 'development', // use 'development' unless process.env.NODE_ENV is defined
      DEBUG: false,
    }),
    new CopyPlugin({
      patterns: [{ from: 'src/assets/', to: 'assets/' }],
    }),
    new AssetsPlugin({
      path: paths.appBuild,
      removeFullPathAutoPrefix: true,
      filename: 'assets.json',
    }),
    DEV &&
      new FriendlyErrorsPlugin({
        clearConsole: false,
      }),
    DEV &&
      new BrowserSyncPlugin({
        notify: false,
        host: 'localhost',
        port: 3000,
        logLevel: 'silent',
        files: ['./theme/*.php'],
        proxy: 'http://localhost:8080/',
      }),
  ].filter(Boolean),
};

module.exports = webpackConfig;

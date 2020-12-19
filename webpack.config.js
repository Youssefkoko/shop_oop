const path = require('path')
// const postCSSPlugins = [
//   require("postcss-import"),
//   require("postcss-mixins"),
//   require('postcss-simple-vars'),
//   require('postcss-nested'),
//   require('autoprefixer'),
// ]

/** @type {import('@types/webpack').Configuration} */
module.exports = {
  entry: './app/js/App.js',
  output: {
    filename: 'bundled.js',
    path: path.resolve(__dirname, 'app')
  },
  devServer: {
    contentBase: path.join(__dirname, 'app'),
    hot: true,
    port: 3000,
    before: function(app, server){
      server._watch(["./app/**/*.html", "./**/*.css"])
    },
    host: '192.168.178.14',
  },
  mode: 'development',
  // module: {
  //   rules: [
  //     {
  //       test:/\.css$/i,
  //       use: [
  //         'style-loader', 'css-loader?url=false',
  //       { loader: "postcss-loader", options: {postcssOptions: {plugins: postCSSPlugins }}}, 

  //       ],
  //     }
  //   ]
  // }
}

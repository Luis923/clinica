const path = require('path');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  /* entry: './src/index.js', */
  output: {
    filename: 'app.js',
    path: path.resolve(__dirname, 'build')
  },
  devServer: {
    // contentBase: path.resolve(__dirname, 'build'), default,
    open: true, // para abrir el navegador
    port: 3000,
  },
  module: {
    rules:[
        {
            test: /\.jsx?$/,
            use: {
                loader: 'babel-loader',
                options: {
                    presets: [
                        '@babel/preset-env'
                    ],
                    plugins: ['@babel/plugin-proposal-optional-chaining']
                }
            }
        },
        {
            test:/\.scss$/,/* ./src/css/(sa/sc/c)ss$/ */
            use: [
                MiniCssExtractPlugin.loader,
                'css-loader',
                'sass-loader'
            ]
        },
        {
            test: /\.webp$/i,
            type: "asset"
        }
    ]
  },
  plugins: [
      new MiniCssExtractPlugin({
          filename: 'app.css'
      })
  ]
};
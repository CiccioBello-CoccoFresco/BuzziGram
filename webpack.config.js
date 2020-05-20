const autoprefixer = require('autoprefixer');
const path = require('path');

module.exports = {
  context: __dirname,
  entry: {
    registraziones: './css/registrazione.scss', 
    MDC:'./js/mdc.js',
    alunni: './js/alunni.js',
    classi: './js/classi.js',
    registrazione: './js/registrazione.js'
  }, 
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, './Pages/dist')
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].css',
            },
          },
          {loader: 'extract-loader'},
          {loader: 'css-loader'},
          {
            loader: 'postcss-loader',
            options: {
              plugins: () => [autoprefixer()]
            }
          },
          {
            loader: 'sass-loader',
            options: {
              // Prefer Dart Sass
              implementation: require('sass'),

              // See https://github.com/webpack-contrib/sass-loader/issues/804
              webpackImporter: false,
              sassOptions: {
                includePaths: ['./node_modules'],
              },
            },
          }
        ],
      },
      {
        test: /\.js$/,
        loader: 'babel-loader',
        query: {
          presets: ['@babel/preset-env'],
        },
      }
    ],
  },
};
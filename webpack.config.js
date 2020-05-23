const autoprefixer = require('autoprefixer');
const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = [{
  entry: {
    login: "./js/login.js",
    registrazione: './js/registrazione.js',
    classi: './js/classi.js',
    alunni: "./js/alunni.js",
    areaPersonale : "./js/areaPersonale.js"
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'dist/assets'),
  },
  devServer: {
    contentBase: path.join(__dirname, 'dist'),
    compress: true,
  },
  plugins: [
      new CleanWebpackPlugin(),
  ],
  module: {
    rules: [
      {
        test: /\.(png|svg|jpg|gif)$/,
        use: ['file-loader',],
      },
      {
        test: /\.s[ac]ss$/i,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].css',
            },
          },
          { loader: 'extract-loader' },
          { loader: 'css-loader' },
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
        ]
      },
      {
        test: /\.js$/,
        loader: 'babel-loader',
        query: {
          presets: ['@babel/preset-env']
        },
      }
    ]
  },
}];
const path = require("path");
const CompressionPlugin = require("compression-webpack-plugin");
module.exports = {
  mode: "production",
  entry: "./admin/js/main.js",
  output: {
    filename: "main.min.js",
    path: path.resolve(__dirname, "./admin/js"),
  },

  module: {
    rules: [
      {
        test: /.js?$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
    ],
  },
  plugins: [
    new CompressionPlugin({
      include: /\/admin\/js/,
    }),
  ],
};

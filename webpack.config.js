//webpack.config.js
var path = require('path');

var SpritesmithPlugin = require('webpack-spritesmith');

module.exports = {

    module: {
        // entry: '',
        rules: [
            {test: /\.css$/, use: [
                'style-loader',
                'css-loader',
                'stylus-loader'
            ]},
            {test: /\.png$/, use: [
                'file-loader?name=i/[hash].[ext]'
            ]}
        ]
    },
    resolve: {
        modules: ["node_modules", "spritesmith-generated"]
    },
    plugins: [
        new SpritesmithPlugin({
            src: {
                cwd: path.resolve(__dirname, 'public/imgs/sprites_img'),
                glob: '*.png'
            },
            target: {
                image: path.resolve(__dirname, 'public/imgs/sprites_generated/sprite.png'),
                css: path.resolve(__dirname, 'public/css/sprite.css')
            },
            apiOptions: {
                cssImageRef: "../imgs/sprites_generated/sprite.png"
            }
        })
    ]
    // ...
};
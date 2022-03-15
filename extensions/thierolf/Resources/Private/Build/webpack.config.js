// Webpack uses this to work with directories
const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const RemoveEmptyScriptsPlugin = require("webpack-remove-empty-scripts");
const CopyWebpackPlugin = require('copy-webpack-plugin');


// This is the main configuration object.
// Here, you write different options and tell Webpack what to do
module.exports = {
    devtool: false,
    resolve: {
        alias: {
            jquery: "./../../Public/Vendor/jquery/dist/jquery.min.js"
        }
    },
    module: {
        generator: {

        },
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules|Vendor)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env'],
                     
                    }
                }
            },
            {
                // Apply rule for .sass, .scss or .css files
                test: /\.scss$/,
            
                // Set loaders to transform files.
                // Loaders are applying from right to left(!)
                // The first loader will be applied after others
                use: [
                    {
                        // After all CSS loaders, we use a plugin to do its work.
                        // It gets all transformed CSS and extracts it into separate
                        // single bundled file
                        loader: MiniCssExtractPlugin.loader
                    }, 
                    {
                        loader: "css-loader",
                        options: {
                            sourceMap: true,
                            importLoaders: 2
                        }
                    },
                    {
                        loader: 'resolve-url-loader', 
                        options: { 
                            sourceMap: false 
                        }
                    },
                    {
                        // First we transform SASS to standard CSS
                        loader: "sass-loader",
                        options: {
                            implementation: require("sass"),
                            sourceMap: true
                        }
                    }
                ]
            },
            {
                test: /\.svg$/,
                type: "asset/inline",
                // Inline assets with the "inline" query parameter.
                resourceQuery: /inline/,
            },
            {
                // Now we apply rule for images
                test: /\.(png|jpe?g|gif)$/,
                use: [
                        {
                            // Using file-loader for these files
                            loader: "file-loader",
                
                            // In options we can set different things like format
                            // and directory to save
                            options: {
                                outputPath: 'Images'
                            }
                        }
                    ]
            },
            {
                // Apply rule for fonts files
                test: /\.(woff|woff2|ttf|otf|eot)$/,
                use: [
                    {
                        // Using file-loader too
                        loader: "file-loader",
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'Fonts/'
                        }
                    }
                ]
            }
        ],
    },
    externals: {
        "jquery": "jQuery",
        "$": "jQuery"
    },
    plugins: [
        require('autoprefixer'),
        require('cssnano'),
        new RemoveEmptyScriptsPlugin(),
        new MiniCssExtractPlugin({
            filename: 'StyleSheet/[name].css'
        }),
        new CopyWebpackPlugin({
            patterns: [
                { 
                    from: './../../Public/Vendor/jquery/dist/jquery.js', 
                    to: 'JavaScript/'
                },
                {
                    from: './../../Public/Vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
                    to: 'JavaScript/'
                },
                {
                    from: './../../Public/Vendor/wow.js/dist/wow.min.js',
                    to: 'JavaScript/'
                },
                {
                    from: './../../Public/Vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                    to: 'JavaScript/'
                },
                {
                    from: './../../Public/Vendor/animsition/dist/js/animsition.min.js',
                    to: 'JavaScript/'
                }
            ]
        })
    ],
    // Path to your entry point. From this file Webpack will begin its work
    entry: {
        // 'jquery' : './../../Public/Vendor/jquery/dist/jquery.js',
        'bootstrap' : './../../Public/Vendor/bootstrap/scss/bootstrap.scss',
        // 'bootstrap-select' : './../../Public/Vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
        // 'animsition' : './../../Public/Vendor/animsition/dist/js/animsition.min.js',
        'accordion' : './src/scss/accordion.scss',   
        'teasermenu' : './src/scss/teasermenu.scss',   
        'jquery.appear' : './../../Public/Vendor/jquery.appear/jquery.appear.js',
        'countto': './src/javascript/countto.js',
        'slick' : './../../Public/Vendor/slick-carousel/slick/slick.min.js',
        'jquery-stickit' : './../../Public/Vendor/jquery-stickit/build/jquery.stickit.min.js',
        'jquery-parallax' : './../../Public/Vendor/jquery-parallax/scripts/jquery.parallax-1.1.3.js',
        'owl.carousel' : './../../Public/Vendor/owl.carousel/dist/owl.carousel.min.js',
        'masonry-layout' : './../../Public/Vendor/masonry-layout/dist/masonry.pkgd.min.js',
        'magnific-popup' : './../../Public/Vendor/magnific-popup/dist/jquery.magnific-popup.min.js',
        // 'wow' : './../../Public/Vendor/wow.js/dist/wow.min.js',
        'main': './src/javascript/main.js',       
    },

    // Path and filename of your result bundle.
    // Webpack will bundle all JavaScript into this file
    output: {
        path: path.resolve(__dirname, '../../Public/'),
        publicPath: '',
        filename: 'JavaScript/[name].js'
    },

    // Default mode for Webpack is production.
    // Depending on mode Webpack will apply different things
    // on the final bundle. For now, we don't need production's JavaScript 
    // minifying and other things, so let's set mode to development
    mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
};
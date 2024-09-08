const Encore = require('@symfony/webpack-encore');


// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './assets/app.js') // The entry point for your Vue.js application
    .enableVueLoader() // Enable Vue loader
    .enableSourceMaps(!Encore.isProduction())
    .enableSingleRuntimeChunk()
    .enableIntegrityHashes(Encore.isProduction())
    .cleanupOutputBeforeBuild()
    .enableVersioning(Encore.isProduction())
;

module.exports = Encore.getWebpackConfig();
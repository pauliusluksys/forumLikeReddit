const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
        fallback: {
            "path": require.resolve("path-browserify"),
        }
    },
};

const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,  
  pluginOptions: {
    dotenv: {
      path: `.env.${process.env.NODE_ENV}`,
    },
  },
  devServer: {
    proxy: {
      "/api": {
        target: 'http://localhost:80',
        pathRewrite: { '^/api': '' },
      },
    }
  },
});

const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,
  devServer: {
    proxy: {
      // local mysql
      '/api': {
        target: 'http://localhost:80',
        changeOrigin: true,
        pathRewrite: { '^/api': '' }
      },
    }
  }
})



import { defineConfig } from 'vite';

export default defineConfig({
	server: {
		proxy: {
			'/': {
				target: 'http://localhost:1111/MetMusic/', // URL PHP-сервера
				changeOrigin: true,
				rewrite: path => path.replace(/^\//, ''),
			},
		},
	},
});

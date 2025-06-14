import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.jsx'],
            refresh: true,
        }),
    ],
    server: {
        historyApiFallback: true, // ✅ هذا مهم لتوجيه React
    },
});

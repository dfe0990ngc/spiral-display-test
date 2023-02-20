import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import htmlPurge from 'vite-plugin-purgecss';

export default defineConfig({
    plugins: [
        htmlPurge({
            safelist: ['fx-Revolve']
        }),
        laravel({
            input: ['resources/scss/app.scss','resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});

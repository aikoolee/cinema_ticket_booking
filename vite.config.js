import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/slideshow.css',
                'resources/js/app.js', 
                'resources/js/themetoggle.js', 
                'resources/js/slideshow.js',
                'resources/css/login.css'
            ],
            refresh: true,
        }),
    ],
});

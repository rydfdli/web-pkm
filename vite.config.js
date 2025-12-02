import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                'resources/css/detail.css',
                'resources/css/home.css',
                'resources/css/layanan.css',
                'resources/css/news.css',
                'resources/css/style.css',
                'resources/css/visi-misi.css', 
                'resources/js/app.js',
                
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});

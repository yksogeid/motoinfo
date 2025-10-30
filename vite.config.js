import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '127.0.0.1', // fuerza IPv4 en lugar de [::1]
        port: 5173,
        cors: true, // permite peticiones desde otros orígenes
        hmr: {
            host: '127.0.0.1', // o 'motoinfo.local' si prefieres
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});

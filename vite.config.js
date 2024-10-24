import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [react()],
    build: {
      outDir: './assets',
      emptyOutDir: true,
      manifest: true,
      rollupOptions: {
          input: './src/main.jsx',
      }
  },
    server: {
        port: 3000,
        open: true,
    },
});

import './bootstrap';
import '../css/app.css';

import { createInertiaApp } from "@inertiajs/react";
import { createRoot, hydrateRoot } from 'react-dom/client';
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";


createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.tsx`,
            import.meta.glob("./Pages/**/*.tsx")
        ),
    setup({ el, App, props }) {
        createRoot(el).render(<App {...props} />);
    },
});
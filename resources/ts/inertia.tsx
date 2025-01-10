import { createRoot } from "react-dom/client";
import { createInertiaApp } from "@inertiajs/inertia-react";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import React from "react";

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(
            `../Pages/${name}.tsx`,
            import.meta.glob("../Pages/**/*.tsx")
        ),
    setup({ el, App, props }) {
        // @ts-ignore
        createRoot(el).render(<App {...props} />);
    },
});

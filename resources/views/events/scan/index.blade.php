<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @env('local')
        <script type="module">
            import RefreshRuntime from "{{ Vite::asset('@react-refresh') }}"

            RefreshRuntime.injectIntoGlobalHook(window)
            window.$RefreshReg$ = () => {
            }
            window.$RefreshSig$ = () => (type) => type
            window.__vite_plugin_react_preamble_installed__ = true
        </script>
    @endenv
    @vite(['resources/css/app.css', 'resources/ts/inertia.tsx'])
    @inertiaHead
</head>
<body>
@inertia
</body>
</html>

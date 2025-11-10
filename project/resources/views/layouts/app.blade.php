<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'User Directory')</title>
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#1976d2">
    <style>
        body { font-family: sans-serif; margin:0; padding:0; }
        header { background:#1976d2; padding:1rem; }
        header a { color:white; margin-right:1rem; text-decoration:none; }
        main { padding:1rem; }
    </style>
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/service-worker.js');
            });
        }
    </script>
</head>
<body>
    <header>
        <a href="/">Users</a>
<a href="/scan-qr">Scan QR</a>    </header>
    <main>
        @yield('content')
    </main>
    <script src="https://unpkg.com/html5-qrcode"></script>
</body>
</html>

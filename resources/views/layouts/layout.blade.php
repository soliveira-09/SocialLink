<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    {{-- Link Tailwind/DaisyUi --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- Link Google Material --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body class="bg-green-600 min-h-screen">

    {{-- Cabeçalho --}}
    <header class="w-full px-4 sm:px-6">
        <h1>SocialLink</h1>
    </header>

    {{-- Conteúdo principal --}}
    <main>
        @yield('conteudo')
    </main>
</body>

</html>

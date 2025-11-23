<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Título da página, com valor padrão -->
    <title>@yield('title', 'SoundsGood')</title>
    
    <!-- Bibliotecas externas -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Estilo principal -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="48x48" href="favicon-48x48.png">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <!-- Estilos enviados por páginas específicas -->
    @stack('styles')
</head>
<body>
    
    <!-- Navbar padrão -->
    @include('partials.navbar')

    <!-- Conteúdo da página -->
    @yield('content')

    <!-- Rodapé padrão -->
    @include('partials.footer')

    <!-- Scripts principais -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts enviados por páginas específicas -->
    @stack('scripts')

</body>
</html>

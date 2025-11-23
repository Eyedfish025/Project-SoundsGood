@extends('layouts.app')

@section('title', 'SoundsGood - Meditação')

@push('styles')
<link rel="stylesheet" href="/css/pages/_atividades.css">
@endpush

@section('content')

<main class="container my-5 pt-5">

    <!-- Botão de Voltar -->
    <div class="mb-4 reveal">
        <a href="/index" class="btn btn-outline-light">
            <i class="fas fa-arrow-left me-2"></i> Voltar para Atividades
        </a>
    </div>

    <header class="text-center my-5 reveal">
        <h1 class="display-4 hero-title">Sessões de Meditação</h1>
        <p class="lead text-white-50 hero-subtitle">
            Encontre clareza, calma e equilíbrio com nossas meditações guiadas.
        </p>
    </header>

    <!-- Pesquisa e filtros -->
    <nav class="row g-3 align-items-center mb-5 reveal">
        <div class="col-md-6">
            <form action="#" method="get" class="input-group">
                <input type="search" class="form-control custom-input" name="q" placeholder="Pesquise a meditação...">
                <button type="submit" class="btn btn-search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

        <div class="col-md-3">
            <select class="form-select custom-select" aria-label="Filtro de Meditações">
                <option disabled selected>Filtrar por Duração</option>
                <option value="1">5 minutos</option>
                <option value="2">10 minutos</option>
                <option value="3">15 minutos</option>
                <option value="4">20+ minutos</option>
            </select>
        </div>

        <div class="col-md-3">
            <button class="btn btn-clear-filter w-100">Limpar Tudo</button>
        </div>
    </nav>

    <hr class="mb-5 cosmic-rift-small">

    <section class="row g-4 justify-content-center">

        <!-- Meditação Guiada -->
        <div class="col-md-6 col-lg-6">
            <div class="card activity-card h-100">
                <div class="card-img-container">
                    <img src="public\img\meditação\guiada.jpg" class="card-img-top" alt="Pessoa meditando em um ambiente sereno">
                    <a href="/meditacao-Guiada" class="btn btn-cta btn-play stretched-link" aria-label="Iniciar Meditação Guiada">
                       <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Meditação Guiada</h5>
                    <p class="card-text">Deixe nossa narração suave te conduzir a um estado de relaxamento profundo e atenção plena.</p>
                </div>
            </div>
        </div>

        <!-- Controle corpo e alma -->
        <div class="col-md-6 col-lg-6">
            <div class="card activity-card h-100">
                <div class="card-img-container">
                    <img src="public\img\meditação\corpo e alma.jpg" class="card-img-top" alt="Silhueta de pessoa com fundo cósmico">
                    <a href="/meditacao-Controle-corpo-alma" class="btn btn-cta btn-play stretched-link" aria-label="Iniciar Controle corpo e alma">
                       <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Controle seu corpo e alma</h5>
                    <p class="card-text">Uma jornada para conectar-se com seu eu interior, equilibrando mente, corpo e espírito.</p>
                </div>
            </div>
        </div>

        <!-- Aprenda a meditar -->
        <div class="col-md-6 col-lg-6">
            <div class="card activity-card h-100">
                <div class="card-img-container">
                    <img src="public\img\meditação\aprenda.jpg" class="card-img-top" alt="Pessoa sentada aprendendo a meditar">
                    <a href="/meditacao-Aprenda-Meditar" class="btn btn-cta btn-play stretched-link" aria-label="Iniciar Aprenda a meditar">
                       <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Aprenda a Meditar</h5>
                    <p class="card-text">Sessões para iniciantes, ensinando os fundamentos da meditação e da atenção plena.</p>
                </div>
            </div>
        </div>

        <!-- Mantenha a calma -->
        <div class="col-md-6 col-lg-6">
            <div class="card activity-card h-100">
                <div class="card-img-container">
                    <img src="public\img\meditação\calma.jpg" class="card-img-top" alt="Pedras empilhadas simbolizando equilíbrio">
                    <a href="/meditacao-Mantenha-Calma-3-Passos" class="btn btn-cta btn-play stretched-link" aria-label="Iniciar Mantenha a calma em 3 passos">
                       <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Mantenha a Calma em 3 Passos</h5>
                    <p class="card-text"> Uma meditação rápida para momentos de estresse, restaurando a tranquilidade rapidamente.</p>
                </div>
            </div>
        </div>

    </section>
</main>

@endsection

@push('scripts')
<script>
    function reveal() {
        var reveals = document.querySelectorAll(".reveal");
        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 150;
            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            } else {
                reveals[i].classList.remove("active");
            }
        }
    }
    window.addEventListener("scroll", reveal);
    reveal();
</script>
@endpush



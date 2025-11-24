@extends('layouts.app')

@section('title', 'SoundsGood - Técnicas de Respiração')

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
        <h1 class="display-4 hero-title">Técnicas de Respiração</h1>
        <p class="lead text-white-50 hero-subtitle">
            Escolha uma técnica abaixo para começar a sua prática de relaxamento e foco.
        </p>
    </header>

    <!-- Barra de Pesquisa -->
    <nav class="row g-3 align-items-center mb-5 reveal">
        <div class="col-md-6">
            <form action="#" method="get" class="input-group">
                <input type="search" class="form-control custom-input" name="q" placeholder="Pesquise a técnica...">
                <button type="submit" class="btn btn-search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

        <div class="col-md-3">
            <select class="form-select custom-select" aria-label="Filtro de Atividades">
                <option disabled selected>Filtrar por Objetivo</option>
                <option value="1">Relaxamento</option>
                <option value="2">Foco</option>
                <option value="3">Energia</option>
                <option value="4">Sono</option>
            </select>
        </div>

        <div class="col-md-3">
            <button class="btn btn-clear-filter w-100">Limpar Tudo</button>
        </div>
    </nav>

    <hr class="mb-5 cosmic-rift-small">

    <!-- ATIVIDADES -->
    <section class="row g-4 justify-content-center">

        <div class="col-md-6 col-lg-6">
            <div class="card activity-card h-100">
                <div class="card-img-container">
                    <img src="/img/respiração/respiração1.jpg"
                        class="card-img-top" alt="Pessoa relaxando">
                    <a href="/respiracao/4-7-8" class="btn btn-cta btn-play stretched-link"aria-label="Iniciar Técnica 4-7-8">
                    <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Técnica 4-7-8</h5>
                    <p class="card-text">
                        Uma técnica rítmica e simples para acalmar profundamente a mente e o corpo,
                        ideal para combater a insônia.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="card activity-card h-100">
                <div class="card-img-container">
                    <img src="/img/respiração/respiração 2.jpg"
                         class="card-img-top" alt="Pessoa com mão na barriga respirando">
                    <a href="/respiracao-Diafragmatica" class="btn btn-cta btn-play stretched-link"
                       aria-label="Iniciar Respiração Diafragmática">
                       <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Respiração Diafragmática</h5>
                    <p class="card-text">
                        Fortaleça seu diafragma e melhore a eficiência da sua respiração para
                        relaxamento profundo e redução do estresse.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="card activity-card h-100">
                <div class="card-img-container">
                    <img src="/img/respiração/respiração 3.jpg"
                         class="card-img-top" alt="Mulher praticando pranayama">
                    <a href="/respiracao-Alternada-Nasal" class="btn btn-cta btn-play stretched-link"
                       aria-label="Iniciar Respiração Alternada Nasal">
                       <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Respiração Alternada Nasal</h5>
                    <p class="card-text">
                        Equilibre seus hemisférios cerebrais e acalme o sistema nervoso com esta
                        poderosa prática de pranayama (Nadi Shodhana).
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="card activity-card h-100">
                <div class="card-img-container">
                    <img src="/img/respiração/respiração 4.jpg"
                         class="card-img-top" alt="Formas geométricas simbolizando foco">
                    <a href="/respiracao-Quadrada" class="btn btn-cta btn-play stretched-link"
                       aria-label="Iniciar Respiração Quadrada">
                       <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Respiração Quadrada</h5>
                    <p class="card-text">
                        Técnica usada por atletas e militares para controlar o estresse, aumentar
                        a concentração e melhorar o foco mental.
                    </p>
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


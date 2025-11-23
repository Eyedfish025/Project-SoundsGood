@extends('layouts.app')

@section('title', 'SoundsGood - Alongamento')

@push('styles')
<link rel="stylesheet" href="/css/pages/_atividades.css">
@endpush

@section('content')
<main class="container my-5 pt-5">

    <!-- Botão Voltar -->
    <div class="mb-4 reveal">
        <a href="/index" class="btn btn-outline-light">
            <i class="fas fa-arrow-left me-2"></i> Voltar para Atividades
        </a>
    </div>

    <header class="text-center my-5 reveal">
        <h1 class="display-4 hero-title">Sessões de Alongamento</h1>
        <p class="lead text-white-50 hero-subtitle">
            Melhore sua flexibilidade, alivie tensões e prepare seu corpo para o dia.
        </p>
    </header>

    <!-- Filtros -->
    <nav class="row g-3 align-items-center mb-5 reveal">
        <div class="col-md-6">
            <form action="#" method="get" class="input-group">
                <input type="search" class="form-control custom-input" name="q"
                       placeholder="Pesquise o alongamento...">
                <button type="submit" class="btn btn-search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <div class="col-md-3">
            <select class="form-select custom-select">
                <option disabled selected>Filtrar por Foco</option>
                <option value="1">Corpo Inteiro</option>
                <option value="2">Costas</option>
                <option value="3">Pernas</option>
                <option value="4">Pescoço e Ombros</option>
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-clear-filter w-100">Limpar Tudo</button>
        </div>
    </nav>

    <hr class="mb-5 cosmic-rift-small">

    <section class="row g-4 justify-content-center">

        {{-- Card 1 --}}
        <div class="col-md-6 col-lg-6">
            <div class="card activity-card h-100">
                <div class="card-img-container">
                    <img src="public\img\Alongamento\principal\dinamico.jpeg" class="card-img-top" alt="Alongamento dinâmico">
                    <a href="/alongamento-Dinamico" class="btn btn-cta btn-play stretched-link">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Alongamento Dinâmico</h5>
                    <p class="card-text">Ideal para aquecer o corpo antes de atividades físicas.</p>
                </div>
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="col-md-6 col-lg-6">
            <div class="card activity-card h-100">
                <div class="card-img-container">
                    <img src="public\img\Alongamento\principal\alongamento estatico.jpg" class="card-img-top" alt="Alongamento Estático">
                    <a href="/alongamento-Estatico" class="btn btn-cta btn-play stretched-link">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Alongamento Estático</h5>
                    <p class="card-text">Aumente sua flexibilidade com posições mantidas por um tempo.</p>
                </div>
            </div>
        </div>

        {{-- Card 3 --}}
        <div class="col-md-6 col-lg-6">
            <div class="card activity-card h-100">
                <div class="card-img-container">
                    <img src="public\img\Alongamento\principal\alongamento passivo.jpg" class="card-img-top" alt="Alongamento Passivo">
                    <a href="/alongamento-Passivo" class="btn btn-cta btn-play stretched-link">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Alongamento Passivo</h5>
                    <p class="card-text">Relaxe enquanto uma força externa alonga seus músculos.</p>
                </div>
            </div>
        </div>

        {{-- Card 4 --}}
        <div class="col-md-6 col-lg-6">
            <div class="card activity-card h-100">
                <div class="card-img-container">
                    <img src="public\img\Alongamento\principal\alongamento ativo.jpg" class="card-img-top" alt="Alongamento Ativo">
                    <a href="/alongamento-Ativo" class="btn btn-cta btn-play stretched-link">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Alongamento Ativo</h5>
                    <p class="card-text">Use seus próprios músculos para manter a posição de alongamento.</p>
                </div>
            </div>
        </div>

    </section>
</main>
@endsection

@push('scripts')
<script>
    function reveal() {
        const reveals = document.querySelectorAll(".reveal");
        const windowHeight = window.innerHeight;

        reveals.forEach(el => {
            const elementTop = el.getBoundingClientRect().top;
            const visible = 150;

            if (elementTop < windowHeight - visible) {
                el.classList.add("active");
            } else {
                el.classList.remove("active");
            }
        });
    }

    window.addEventListener("scroll", reveal);
    reveal();
</script>
@endpush

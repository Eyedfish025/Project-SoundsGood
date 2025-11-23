@extends('layouts.app')

@section('title', 'SoundsGood - Sons Calmantes')

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
        <h1 class="display-4 hero-title">Sons Calmantes</h1>
        <p class="lead text-white-50 hero-subtitle">
            Relaxe e concentre-se com nossa coleção de sons da natureza e ambientes.
        </p>
    </header>

    <!-- Filtros -->
    <nav class="row g-3 align-items-center mb-5 reveal">
        <div class="col-md-6">
            <form action="#" method="get" class="input-group">
                <input type="search" class="form-control custom-input" name="q"
                       placeholder="Pesquise o som...">
                <button type="submit" class="btn btn-search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <div class="col-md-3">
            <select class="form-select custom-select" aria-label="Filtro de Sons">
                <option disabled selected>Filtrar por Ambiente</option>
                <option value="1">Natureza</option>
                <option value="2">Instrumental</option>
                <option value="3">Animais</option>
                <option value="4">Urbano</option>
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
                    <img src="https://images.unsplash.com/photo-1563720229485-93e425b60827?q=80&w=2070" class="card-img-top" alt="Janela molhada com semáforo">
                    <a href="#" class="btn btn-cta btn-play stretched-link">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Chuva Leve</h5>
                    <p class="card-text">O som da chuva para relaxar, focar ou pegar no sono.</p>
                </div>
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="col-md-6 col-lg-6">
            <div class="card activity-card h-100">
                <div class="card-img-container">
                    <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?q=80&w=2071"
                         class="card-img-top" alt="Floresta tropical">
                    <a href="#" class="btn btn-cta btn-play stretched-link">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Floresta Tropical</h5>
                    <p class="card-text">Mergulhe no coração da natureza com sons tropicais.</p>
                </div>
            </div>
        </div>

        {{-- Card 3 --}}
        <div class="col-md-6 col-lg-6">
            <div class="card activity-card h-100">
                <div class="card-img-container">
                    <img src="https://images.unsplash.com/photo-1507525428034-b723a9ce6890?q=80&w=2070"
                         class="card-img-top" alt="Ondas do mar">
                    <a href="#" class="btn btn-cta btn-play stretched-link">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Ondas do Mar</h5>
                    <p class="card-text">Deixe o som do mar lavar o estresse e restaurar sua paz.</p>
                </div>
            </div>
        </div>

        {{-- Card 4 --}}
        <div class="col-md-6 col-lg-6">
            <div class="card activity-card h-100">
                <div class="card-img-container">
                    <img src="https://images.unsplash.com/photo-1542014740373-f73cbe33f6ec?q=80&w=2070"
                         class="card-img-top" alt="Neve caindo">
                    <a href="#" class="btn btn-cta btn-play stretched-link">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Flocos de Neve</h5>
                    <p class="card-text">Silêncio e tranquilidade perfeitos para meditação.</p>
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

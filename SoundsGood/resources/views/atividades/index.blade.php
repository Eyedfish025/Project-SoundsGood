@extends('layouts.app')

@section('title', 'Atividades - SoundsGood')

@push('styles')
<link rel="stylesheet" href="/css/pages/_atividades.css">
@endpush

@section('content')

<main class="container my-5 pt-5">

    {{-- Cabeçalho --}}
    <header class="text-center my-2 reveal">
        <h1 class="display-4 hero-title">Trabalhe em Você</h1>
        <p class="lead text-white-50 hero-subtitle">
            Temos diversas atividades e aplicações para fazer você descansar e se sentir melhor.
            Seja bem-vindo aqui sempre.
        </p>
    </header>

    {{-- Barra de busca e filtros --}}
    <nav class="row g-3 align-items-center mb-5 reveal">

        {{-- Busca --}}
        <div class="col-md-6">
            <form action="#" method="get" class="input-group">
                <input 
                    type="search" 
                    class="form-control custom-input"
                    name="q" 
                    placeholder="Pesquise a atividade..."
                >

                <button type="submit" class="btn btn-search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

        {{-- Filtro de categorias --}}
        <div class="col-md-3">
            <select class="form-select custom-select" aria-label="Filtro de Atividades">
                <option disabled selected>Filtrar por Categoria</option>
                <option value="1">Respiração</option>
                <option value="2">Sons</option>
                <option value="3">Alongamento</option>
                <option value="4">Meditação</option>
            </select>
        </div>

        {{-- Limpar --}}
        <div class="col-md-3">
            <button class="btn btn-clear-filter w-100">Limpar Tudo</button>
        </div>
    </nav>

    <hr class="mb-5 cosmic-rift-small">

    {{-- Cards de atividades --}}
    <section class="row g-4 justify-content-center">

        {{-- Respiração --}}
        <div class="col-md-6">
            <div class="card activity-card h-100">
                <img src="/img/principal/respiração.webp" class="card-img-top" alt="Mulher praticando ioga">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Técnicas de Respiração</h5>
                    <p class="card-text">Com nossas técnicas de respiração você conseguirá relaxar e manter seus pensamentos em ordem.</p>
                    <a href="/respiracao" class="btn btn-cta mt-auto align-self-start stretched-link">Começar <i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>

        {{-- Sons calmantes --}}
        <div class="col-md-6">
            <div class="card activity-card h-100">
                <img src="/img/principal/sons.webp" class="card-img-top" alt="Cachoeira em meio à natureza">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Sons Calmantes</h5>
                    <p class="card-text">Nossa seleção de sons naturais e ambientes auxiliam você a relaxar, concentrar-se ou dormir.</p>
                    <a href="/sons-calmantes" class="btn btn-cta mt-auto align-self-start stretched-link">Ouvir <i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>

        {{-- Alongamento --}}
        <div class="col-md-6">
            <div class="card activity-card h-100">
                <img src="/img/principal/alongamento.webp" class="card-img-top" alt="Mulher se alongando">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Alongamento</h5>
                    <p class="card-text">Nossa sessão de alongamentos guiados vai te ajudar com o foco em relaxamento corporal e melhoria da postura.</p>
                    <a href="/alongamento" class="btn btn-cta mt-auto align-self-start stretched-link">Praticar <i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>

        {{-- Meditação --}}
        <div class="col-md-6">
            <div class="card activity-card h-100">
                <img src="/img/principal/meditação-guiada.webp" class="card-img-top" alt="Pessoa meditando ao pôr do sol">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Meditação</h5>
                    <p class="card-text">Também trazemos sessões de meditação com áudio e narração suave para seu relaxamento mental.</p>
                    <a href="/meditacao" class="btn btn-cta mt-auto align-self-start stretched-link">Meditar <i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>

    </section>

</main>
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
@endsection

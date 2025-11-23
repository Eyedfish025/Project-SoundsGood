{{-- resources/views/respiracao-quadrada.blade.php --}}
@extends('layouts.app')

@section('title', 'SoundsGood - Respiração Quadrada')

{{-- Estilos específicos desta página --}}
@push('styles')
<link rel="stylesheet" href="/css/pages/_atividades.css">
<link rel="stylesheet" href="/css/tecnicas/respiracao.css">
@endpush

@section('content')
<main class="container my-2 pt-5">
    <header class="text-center my-2 reveal">
        <h1 class="display-4 hero-title">Respiração Quadrada</h1>
        <p class="lead text-white-50 hero-subtitle">
            Inspire, segure, expire e segure novamente, cada fase por 4 segundos. Siga as instruções.
        </p>
    </header>

    <section class="breathing-section reveal">
        <div class="breathing-circle-container">
            <div class="breathing-circle-outline"></div>
            <div class="breathing-circle" id="breathingCircle" role="button" tabindex="0" aria-label="Iniciar ou parar exercício de respiração">
                <div class="breathing-text-container">
                    <span class="breathing-instruction" id="breathingInstruction">Toque para Iniciar</span>
                    <span class="breathing-timer" id="breathingTimer"></span>
                </div>
            </div>
        </div>
        <div class="breathing-controls text-center mt-4">
            <a href="/respiracao" class="btn btn-back ms-2">Voltar</a>
        </div>
    </section>
</main>
@endsection

@push('scripts')
<script>
    function reveal() {
        const reveals = document.querySelectorAll(".reveal");
        for (let i = 0; i < reveals.length; i++) {
            const windowHeight = window.innerHeight;
            const elementTop = reveals[i].getBoundingClientRect().top;
            const elementVisible = 100;
            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            }
        }
    }
    window.addEventListener("scroll", reveal);
    reveal();

    const breathingCircle = document.getElementById('breathingCircle');
    const instructionText = document.getElementById('breathingInstruction');
    const timerText = document.getElementById('breathingTimer');

    let isBreathing = false;
    let breathCycleTimeout;
    let countdownInterval;

    breathingCircle.addEventListener('click', () => {
        isBreathing = !isBreathing;
        if (isBreathing) startBreathCycle();
        else stopBreathCycle();
    });

    breathingCircle.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            breathingCircle.click();
        }
    });

    function startBreathCycle() {
        if (!isBreathing) return;
        // Ciclo de Respiração Quadrada (Box Breathing)
        runPhase('Inspire (4s)', 4, 'breathing-inspire phase-inspire', () => {
            runPhase('Segure (4s)', 4, 'breathing-hold phase-hold', () => {
                runPhase('Expire (4s)', 4, 'breathing-expire phase-expire', () => {
                    runPhase('Segure (4s)', 4, 'breathing-hold phase-hold', startBreathCycle);
                });
            });
        });
    }

    function stopBreathCycle() {
        clearTimeout(breathCycleTimeout);
        clearInterval(countdownInterval);
        isBreathing = false;
        instructionText.textContent = 'Toque para Iniciar';
        timerText.textContent = '';
        breathingCircle.className = 'breathing-circle';
    }

    function runPhase(name, duration, animationClass, next) {
        if (!isBreathing) return;
        instructionText.textContent = name;
        breathingCircle.className = `breathing-circle ${animationClass}`;
        let counter = duration;
        timerText.textContent = counter;

        clearInterval(countdownInterval);
        countdownInterval = setInterval(() => {
            if (!isBreathing) return;
            counter--;
            timerText.textContent = counter;
            if (counter <= 0) clearInterval(countdownInterval);
        }, 1000);

        breathCycleTimeout = setTimeout(() => {
            if (isBreathing) next();
        }, duration * 1000);
    }
</script>
@endpush


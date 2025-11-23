@extends('layouts.app')

@section('title', 'SoundsGood - Mantenha a Calma em 3 Passos')

@push('styles')
<link rel="stylesheet" href="/css/pages/_atividades.css">
<link rel="stylesheet" href="/css/tecnicas/meditacao.css">
@endpush

@section('content')
<main class="container my-5 pt-5">
    <header class="text-center my-5 reveal">
        <h1 class="display-4 hero-title">Mantenha a Calma em 3 Passos</h1>
        <p class="lead text-white-50 hero-subtitle">
            Uma técnica rápida para reduzir a tensão. Siga os passos guiados e respire com atenção.
        </p>
    </header>

    <section class="exercise-section reveal">
        <div class="exercise-image-container">
            <img src="https://images.unsplash.com/photo-1529334972162-914180a36279?q=80&w=870&auto=format&fit=crop" alt="Ilustração da técnica" id="exerciseImage" class="exercise-image">
        </div>
        <div class="exercise-info">
            <h2 class="exercise-name" id="exerciseName">Pronto para começar?</h2>
            <p class="exercise-timer" id="exerciseTimer">--</p>
        </div>
        <div class="exercise-controls text-center mt-4 d-flex justify-content-center align-items-center gap-2">
            <button class="btn btn-cta" id="startStopBtn">Iniciar</button>
            <button class="btn btn-cta btn-skip" id="skipBtn" style="display: none;">Próximo Passo</button>
            <a href="/meditacao" class="btn btn-back">Voltar</a>
        </div>
    </section>
</main>

<audio id="backgroundAudio" loop>
    <source src="https://cdn.pixabay.com/audio/2022/03/15/audio_e4f2d2b9a4.mp3" type="audio/mpeg">
    Seu navegador não suporta o elemento de áudio.
</audio>
@endsection

@push('scripts')
<script>
    function reveal() {
        const reveals = document.querySelectorAll(".reveal");
        for (let i = 0; i < reveals.length; i++) {
            const windowHeight = window.innerHeight;
            const elementTop = reveals[i].getBoundingClientRect().top;
            if (elementTop < windowHeight - 100) {
                reveals[i].classList.add("active");
            }
        }
    }
    window.addEventListener("scroll", reveal);
    reveal();

    // Técnica Mantenha a Calma em 3 Passos
    const startStopBtn = document.getElementById('startStopBtn');
    const exerciseNameEl = document.getElementById('exerciseName');
    const exerciseTimerEl = document.getElementById('exerciseTimer');
    const exerciseImageEl = document.getElementById('exerciseImage');
    const skipBtn = document.getElementById('skipBtn');
    const backgroundAudio = document.getElementById('backgroundAudio');
    backgroundAudio.volume = 0.2;

    const steps = [
        { name: 'Passo 1: Inspire profundamente pelo nariz', duration: 6, image: 'https://media.giphy.com/media/3o7TKsQ29vC3OJg4Dy/giphy.gif' },
        { name: 'Passo 2: Segure a respiração por 4 segundos', duration: 4, image: 'https://media.giphy.com/media/l41YlRURhHSMaZxEA/giphy.gif' },
        { name: 'Passo 3: Expire lentamente pela boca', duration: 6, image: 'https://media.giphy.com/media/xUPGcEliCc7bETyfO8/giphy.gif' }
    ];

    let isActive = false;
    let currentStep = 0;
    let countdownInterval;
    let stepTimeout;

    startStopBtn.addEventListener('click', () => {
        isActive = !isActive;
        if (isActive) {
            currentStep = 0;
            startStopBtn.textContent = 'Parar';
            skipBtn.style.display = 'inline-block';
            backgroundAudio.play();
            runStep(steps[currentStep]);
        } else {
            stopSession();
        }
    });

    skipBtn.addEventListener('click', () => {
        if (!isActive) return;
        nextStep();
    });

    function runStep(step) {
        exerciseNameEl.textContent = step.name;
        exerciseImageEl.src = step.image;
        exerciseImageEl.alt = 'Animação: ' + step.name;
        let counter = step.duration;
        exerciseTimerEl.textContent = counter;

        countdownInterval = setInterval(() => {
            counter--;
            exerciseTimerEl.textContent = counter;
            if (counter <= 0) clearInterval(countdownInterval);
        }, 1000);

        stepTimeout = setTimeout(nextStep, step.duration * 1000);
    }

    function nextStep() {
        clearTimeout(stepTimeout);
        clearInterval(countdownInterval);
        currentStep++;
        if (currentStep >= steps.length) {
            stopSession('Sessão concluída!');
        } else {
            runStep(steps[currentStep]);
        }
    }

    function stopSession(message = 'Pronto para começar?') {
        clearTimeout(stepTimeout);
        clearInterval(countdownInterval);
        backgroundAudio.pause();
        backgroundAudio.currentTime = 0;
        isActive = false;
        currentStep = 0;
        startStopBtn.textContent = 'Iniciar';
        skipBtn.style.display = 'none';
        exerciseNameEl.textContent = message;
        exerciseTimerEl.textContent = '--';
        exerciseImageEl.src = 'https://images.unsplash.com/photo-1529334972162-914180a36279?q=80&w=870&auto=format&fit=crop';
        exerciseImageEl.alt = 'Ilustração da técnica';
    }
</script>
@endpush

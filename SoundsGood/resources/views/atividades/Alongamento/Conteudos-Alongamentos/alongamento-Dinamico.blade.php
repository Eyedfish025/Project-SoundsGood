{{-- resources/views/alongamento-dinamico.blade.php --}}
@extends('layouts.app')

@section('title', 'SoundsGood - Alongamento Dinâmico')

@push('styles')
<link rel="stylesheet" href="/css/pages/_atividades.css">
<link rel="stylesheet" href="/css/tecnicas/alongamento.css">
@endpush

@section('content')
<main class="container my-5 pt-5">
    <header class="text-center my-5 reveal">
        <h1 class="display-4 hero-title">Alongamento Dinâmico</h1>
        <p class="lead text-white-50 hero-subtitle">
            Prepare seu corpo para a atividade física com movimentos fluidos. Siga a sequência.
        </p>
    </header>

    <section class="exercise-section reveal">
        <div class="exercise-image-container">
            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?q=80&w=870&auto=format&fit=crop" 
                 alt="Ilustração do exercício" id="exerciseImage" class="exercise-image">
        </div>
        <div class="exercise-info">
            <h2 class="exercise-name" id="exerciseName">Pronto para começar?</h2>
            <p class="exercise-timer" id="exerciseTimer">--</p>
        </div>
        <div class="exercise-controls text-center mt-4 d-flex justify-content-center align-items-center gap-2">
            <button class="btn btn-cta" id="startStopBtn">Iniciar</button>
            <button class="btn btn-cta btn-skip" id="skipBtn" style="display: none;">Pular</button>
            <a href="/alongamento" class="btn btn-back">Voltar</a>
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
            if (elementTop < windowHeight - 100) {
                reveals[i].classList.add("active");
            }
        }
    }
    window.addEventListener("scroll", reveal);
    reveal();

    const startStopBtn = document.getElementById('startStopBtn');
    const exerciseNameEl = document.getElementById('exerciseName');
    const exerciseTimerEl = document.getElementById('exerciseTimer');
    const exerciseImageEl = document.getElementById('exerciseImage');
    const skipBtn = document.getElementById('skipBtn');

    const exercises = [
        { name: 'Rotação de Tronco', duration: 30, image: '/img/Alongamento/alongamento dinamico/coluna.jpeg' },
        { name: 'Círculos com os Braços', duration: 30, image: '/img/Alongamento/alongamento dinamico/rotação de braços.jpeg' },
        { name: 'Balanço de Pernas (Frente)', duration: 30, image: '/img/Alongamento/alongamento dinamico/chute.jpeg' },
        { name: 'Afundo com Rotação', duration: 40, image: '/img/Alongamento/alongamento dinamico/afundo.jpeg' },
        { name: 'Agachamento', duration: 40, image: '/img/Alongamento/alongamento dinamico/agachamento.jpeg' }
    ];

    let isStretching = false;
    let currentExerciseIndex = 0;
    let countdownInterval;
    let exerciseTimeout;

    startStopBtn.addEventListener('click', () => {
        isStretching = !isStretching;
        if (isStretching) {
            startStopBtn.textContent = 'Parar';
            skipBtn.style.display = 'inline-block';
            startExerciseCycle();
        } else {
            stopExerciseCycle();
        }
    });

    skipBtn.addEventListener('click', () => {
        if (!isStretching) return;
        clearTimeout(exerciseTimeout);
        clearInterval(countdownInterval);
        currentExerciseIndex++;
        startExerciseCycle();
    });

    function startExerciseCycle() {
        if (!isStretching || currentExerciseIndex >= exercises.length) {
            stopExerciseCycle('Sessão Finalizada!');
            return;
        }
        const exercise = exercises[currentExerciseIndex];
        runExercise(exercise, () => {
            currentExerciseIndex++;
            startExerciseCycle();
        });
    }

    function stopExerciseCycle(message = 'Pronto para começar?') {
        clearTimeout(exerciseTimeout);
        clearInterval(countdownInterval);
        isStretching = false;
        currentExerciseIndex = 0;
        startStopBtn.textContent = 'Iniciar';
        skipBtn.style.display = 'none';
        exerciseNameEl.textContent = message;
        exerciseTimerEl.textContent = '--';
        exerciseImageEl.src = 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?q=80&w=870&auto=format&fit=crop';
        exerciseImageEl.alt = 'Ilustração de uma pessoa se preparando para o exercício';
    }

    function runExercise(exercise, next) {
        exerciseNameEl.textContent = exercise.name;
        exerciseImageEl.src = exercise.image;
        exerciseImageEl.alt = 'Animação do exercício: ' + exercise.name;
        let counter = exercise.duration;
        exerciseTimerEl.textContent = counter;

        countdownInterval = setInterval(() => {
            counter--;
            exerciseTimerEl.textContent = counter;
            if (counter <= 0) clearInterval(countdownInterval);
        }, 1000);

        exerciseTimeout = setTimeout(next, exercise.duration * 1000);
    }
</script>
@endpush


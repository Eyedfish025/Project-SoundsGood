{{-- resources/views/alongamento-estatico.blade.php --}}
@extends('layouts.app')

@section('title', 'SoundsGood - Alongamento Estático')

@push('styles')
<link rel="stylesheet" href="/css/pages/_atividades.css">
<link rel="stylesheet" href="/css/tecnicas/alongamento.css">
@endpush

@section('content')
<main class="container my-5 pt-5">
    <header class="text-center my-5 reveal">
        <h1 class="display-4 hero-title">Alongamento Estático</h1>
        <p class="lead text-white-50 hero-subtitle">
            Mantenha cada posição por alguns segundos para melhorar flexibilidade e relaxar os músculos.
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

// Alongamento Estático
const startStopBtn = document.getElementById('startStopBtn');
const exerciseNameEl = document.getElementById('exerciseName');
const exerciseTimerEl = document.getElementById('exerciseTimer');
const exerciseImageEl = document.getElementById('exerciseImage');
const skipBtn = document.getElementById('skipBtn');

const exercises = [
    { name: 'Alongamento de Pescoço', duration: 20, image: 'https://i.pinimg.com/originals/7e/0a/44/7e0a442e2d6f8f93424fae2aa6d1f43a.gif' },
    { name: 'Alongamento de Ombros', duration: 20, image: 'https://i.pinimg.com/originals/5d/9b/8c/5d9b8c12f1d3f0a6e38b0ffb93b76f0a.gif' },
    { name: 'Alongamento de Quadríceps', duration: 25, image: 'https://i.pinimg.com/originals/01/1e/44/011e44b2a5b1d2c1b8c3d0b5f8d1e2f4.gif' },
    { name: 'Alongamento de Panturrilhas', duration: 25, image: 'https://i.pinimg.com/originals/6a/2c/8e/6a2c8e03b9f1b7d2c4b6f9a4d2b6c8e3.gif' },
    { name: 'Alongamento de Costas', duration: 30, image: 'https://i.pinimg.com/originals/2b/5c/6d/2b5c6d1e2a3b4c5f6a7d8e9f0b1c2d3e.gif' }
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

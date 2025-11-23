{{-- resources/views/meditacao-guiada.blade.php --}}
@extends('layouts.app')

@section('title', 'SoundsGood - Meditação Guiada')

@push('styles')
<link rel="stylesheet" href="/css/pages/_atividades.css">
<link rel="stylesheet" href="/css/tecnicas/meditacao.css">
@endpush

@section('content')
<main class="container my-5 pt-5">
    <header class="text-center my-5 reveal">
        <h1 class="display-4 hero-title">Meditação Guiada</h1>
        <p class="lead text-white-50 hero-subtitle">
            Encontre um lugar tranquilo, feche os olhos e deixe nossa voz guiar você para um estado de calma e clareza mental.
        </p>
    </header>

    <section class="exercise-section reveal">
        <div class="exercise-image-container">
            <img src=""
                 alt="Ilustração de meditação" id="exerciseImage" class="exercise-image">
        </div>
        <div class="exercise-info">
            <h2 class="exercise-name" id="exerciseName">Pronta para começar?</h2>
            <p class="exercise-timer" id="exerciseTimer">--</p>
        </div>
        <div class="exercise-controls text-center mt-4 d-flex justify-content-center align-items-center gap-2">
            <button class="btn btn-cta" id="startStopBtn">Iniciar</button>
            <button class="btn btn-cta btn-skip" id="skipBtn" style="display: none;">Pular</button>
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
        document.querySelectorAll(".reveal").forEach(el => {
            const windowHeight = window.innerHeight;
            const elementTop = el.getBoundingClientRect().top;
            if (elementTop < windowHeight - 100) el.classList.add("active");
        });
    }
    window.addEventListener("scroll", reveal);
    reveal();

    // Meditação Guiada
    const startStopBtn = document.getElementById('startStopBtn');
    const exerciseNameEl = document.getElementById('exerciseName');
    const exerciseTimerEl = document.getElementById('exerciseTimer');
    const exerciseImageEl = document.getElementById('exerciseImage');
    const skipBtn = document.getElementById('skipBtn');
    const backgroundAudio = document.getElementById('backgroundAudio');
    backgroundAudio.volume = 0.2;

    let ptBrVoice = null;
    speechSynthesis.onvoiceschanged = () => {
        const voices = speechSynthesis.getVoices();
        ptBrVoice = voices.find(v => v.lang === 'pt-BR' && (v.name.includes('Luciana') || v.name.includes('Camila') || v.name.includes('Female')));
        if (!ptBrVoice) ptBrVoice = voices.find(v => v.lang === 'pt-BR');
    };

    function speak(text) {
        speechSynthesis.cancel();
        const u = new SpeechSynthesisUtterance(text);
        u.lang = 'pt-BR';
        if (ptBrVoice) u.voice = ptBrVoice;
        speechSynthesis.speak(u);
    }

    const meditationSteps = [
        { name: 'Acomode-se confortavelmente e feche os olhos.', duration: 20, image: 'public\img\meditação\controle o corpo\pessoa sentada.jpg' },
        { name: 'Concentre-se na sua respiração. Sinta o ar entrar e sair.', duration: 45, image: 'public\img\meditação\aprenda a meditar\ar.jpg' },
        { name: 'Observe seus pensamentos sem julgamento, deixando-os passar.', duration: 60, image: 'public\img\meditação\aprenda a meditar\mente distraida.jpg' },
        { name: 'Sinta a calma se espalhar por todo o seu corpo.', duration: 45, image: 'public\img\meditação\controle o corpo\sinta a harmonia.jpg' },
        { name: 'Gentilmente, traga sua atenção de volta ao ambiente.', duration: 20, image: 'public\img\meditação\controle o corpo\pessoa sentada.jpg' }

    let isMeditating = false, currentStepIndex = 0, countdownInterval, stepTimeout;

    startStopBtn.addEventListener('click', () => {
        isMeditating = !isMeditating;
        if (isMeditating) {
            startStopBtn.textContent = 'Parar';
            skipBtn.style.display = 'inline-block';
            backgroundAudio.play();
            startMeditationCycle();
        } else {
            backgroundAudio.pause();
            stopMeditationCycle();
        }
    });

    skipBtn.addEventListener('click', () => {
        if (!isMeditating) return;
        speechSynthesis.cancel();
        clearTimeout(stepTimeout);
        clearInterval(countdownInterval);
        currentStepIndex++;
        startMeditationCycle();
    });

    function startMeditationCycle() {
        if (!isMeditating || currentStepIndex >= meditationSteps.length) {
            stopMeditationCycle('Sessão Finalizada!');
            speak('Sessão Finalizada!');
            return;
        }
        const step = meditationSteps[currentStepIndex];
        runStep(step, () => {
            currentStepIndex++;
            startMeditationCycle();
        });
    }

    function stopMeditationCycle(message = 'Pronta para começar?') {
        clearTimeout(stepTimeout);
        clearInterval(countdownInterval);
        speechSynthesis.cancel();
        backgroundAudio.pause();
        backgroundAudio.currentTime = 0;
        isMeditating = false;
        currentStepIndex = 0;
        startStopBtn.textContent = 'Iniciar';
        skipBtn.style.display = 'none';
        exerciseNameEl.textContent = message;
        exerciseTimerEl.textContent = '--';
        exerciseImageEl.src = 'https://images.unsplash.com/photo-1506126613408-4e6578741663?q=80&w=870&auto=format&fit=crop';
        exerciseImageEl.alt = 'Ilustração de meditação';
    }

    function runStep(step, next) {
        exerciseNameEl.textContent = step.name;
        exerciseImageEl.src = step.image;
        exerciseImageEl.alt = 'Animação da etapa de meditação: ' + step.name;
        speak(step.name);
        let counter = step.duration;
        exerciseTimerEl.textContent = counter;
        countdownInterval = setInterval(() => {
            counter--;
            exerciseTimerEl.textContent = counter;
            if (counter <= 0) clearInterval(countdownInterval);
        }, 1000);
        stepTimeout = setTimeout(next, step.duration * 1000);
    }
</script>
@endpush


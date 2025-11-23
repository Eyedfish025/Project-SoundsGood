{{-- resources/views/controle-corpo-alma.blade.php --}}
@extends('layouts.app')

@section('title', 'SoundsGood - Controle seu corpo e alma')

@push('styles')
<link rel="stylesheet" href="/css/pages/_atividades.css">
<link rel="stylesheet" href="/css/tecnicas/meditacao.css">
@endpush

@section('content')
<main class="container my-5 pt-5">
    <header class="text-center my-5 reveal">
        <h1 class="display-4 hero-title">Controle seu corpo e alma</h1>
        <p class="lead text-white-50 hero-subtitle">
            Aprenda a harmonizar sua mente, corpo e energia interior. Cada respiração é um passo em direção ao equilíbrio.
        </p>
    </header>

    <section class="exercise-section reveal text-center">
        <div class="exercise-image-container mb-4">
            <img src="https://images.unsplash.com/photo-1506126613408-4e6578741663?q=80&w=870&auto=format&fit=crop"
                 alt="Controle do corpo e da mente"
                 id="exerciseImage" class="exercise-image rounded">
        </div>
        <h2 class="exercise-name mb-3" id="exerciseName">Pronto para assumir o controle?</h2>
        <p class="exercise-timer fs-4 mb-4" id="exerciseTimer">--</p>
        <div class="exercise-controls d-flex justify-content-center align-items-center gap-2">
            <button class="btn btn-cta" id="startStopBtn">Iniciar</button>
            <button class="btn btn-cta btn-skip" id="skipBtn" style="display:none;">Pular Passo</button>
            <a href="/meditacao" class="btn btn-back">Voltar</a>
        </div>
    </section>
</main>

<audio id="backgroundAudio" loop>
    <source src="https://cdn.pixabay.com/audio/2022/03/15/audio_e4f2d2b9a4.mp3" type="audio/mpeg">
    Seu navegador não suporta áudio.
</audio>
@endsection

@push('scripts')
    <script>
        // Função reveal para animação ao rolar
        function reveal() {
            document.querySelectorAll(".reveal").forEach(el => {
                if (el.getBoundingClientRect().top < window.innerHeight - 100) {
                    el.classList.add("active");
                }
            });
        }
        window.addEventListener("scroll", reveal);
        reveal();

        // Meditação guiada: Controle do corpo e alma
        const startStopBtn = document.getElementById('startStopBtn');
        const skipBtn = document.getElementById('skipBtn');
        const exerciseNameEl = document.getElementById('exerciseName');
        const exerciseTimerEl = document.getElementById('exerciseTimer');
        const exerciseImageEl = document.getElementById('exerciseImage');
        const backgroundAudio = document.getElementById('backgroundAudio');
        backgroundAudio.volume = 0.2;

        let ptBrVoice = null;
        speechSynthesis.onvoiceschanged = () => {
            const voices = speechSynthesis.getVoices();
            ptBrVoice = voices.find(v => v.lang === 'pt-BR' && (v.name.includes('Luciana') || v.name.includes('Camila'))) || voices.find(v => v.lang === 'pt-BR');
        };

        function speak(text) {
            speechSynthesis.cancel();
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'pt-BR';
            if (ptBrVoice) utterance.voice = ptBrVoice;
            speechSynthesis.speak(utterance);
        }

        const meditationSteps = [
            { 
                name: 'Passo 1: Sente-se firme, feche os olhos e sinta a energia do seu corpo. Reconheça cada parte de você.', 
                duration: 30, 
                image: 'public\img\meditação\controle o corpo\pessoa sentada.jpg' 
            },
            { 
                name: 'Passo 2: Respire profundamente, sentindo cada inspiração expandir sua alma e cada expiração liberar tensões.', 
                duration: 60, 
                image: 'public\img\meditação\controle o corpo\respire firme.jpg' 
            },
            { 
                name: 'Passo 3: Observe seus pensamentos sem se apegar. Reconheça-os, mas mantenha o controle da sua mente.', 
                duration: 75, 
                image: 'public\img\meditação\controle o corpo\obseve seu pensamento.jpg' 
            },
            { 
                name: 'Passo 4: Sinta a harmonia entre corpo e alma. Inspire confiança e poder, expire ansiedade e dúvida.', 
                duration: 60, 
                image: 'public\img\meditação\controle o corpo\sinta a harmonia.jpg' 
            },
            { 
                name: 'Final: Abra os olhos lentamente. Leve este controle para suas ações e pensamentos durante o dia.', 
                duration: 20, 
                image: 'public\img\meditação\aprenda a meditar\parabens.jpg' 
            }
        ];

        let isMeditating = false;
        let currentStepIndex = 0;
        let countdownInterval;
        let stepTimeout;

        startStopBtn.addEventListener('click', () => {
            isMeditating = !isMeditating;
            if (isMeditating) {
                startStopBtn.textContent = 'Parar';
                skipBtn.style.display = 'inline-block';
                backgroundAudio.play();
                startMeditationCycle();
            } else {
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
                stopMeditationCycle('Sessão finalizada! Sinta a harmonia do corpo e alma.');
                speak('Sessão finalizada! Sinta a harmonia do corpo e alma.');
                return;
            }
            const step = meditationSteps[currentStepIndex];
            exerciseNameEl.textContent = step.name;
            exerciseImageEl.src = step.image;
            exerciseImageEl.alt = 'Meditação: ' + step.name;
            speak(step.name);

            let counter = step.duration;
            exerciseTimerEl.textContent = counter;

            countdownInterval = setInterval(() => {
                counter--;
                exerciseTimerEl.textContent = counter;
                if (counter <= 0) clearInterval(countdownInterval);
            }, 1000);

            stepTimeout = setTimeout(() => {
                currentStepIndex++;
                startMeditationCycle();
            }, step.duration * 1000);
        }

        function stopMeditationCycle(message = 'Pronto para assumir o controle?') {
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
            exerciseImageEl.alt = 'Controle do corpo e alma';
        }
    </script>
@endpush


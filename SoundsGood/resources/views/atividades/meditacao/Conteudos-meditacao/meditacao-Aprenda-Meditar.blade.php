{{-- resources/views/aprenda-meditar.blade.php --}}
@extends('layouts.app')

@section('title', 'SoundsGood - Aprenda a Meditar')

@push('styles')
<link rel="stylesheet" href="/css/pages/_atividades.css">
<link rel="stylesheet" href="/css/tecnicas/meditacao.css">
@endpush

@section('content')
<main class="container my-5 pt-5">
    <header class="text-center my-5 reveal">
        <h1 class="display-4 hero-title">Aprenda a Meditar</h1>
        <p class="lead text-white-50 hero-subtitle">
            Esta sessão para iniciantes ensinará os fundamentos para acalmar a mente e encontrar seu foco.
        </p>
    </header>

    <section class="exercise-section reveal">
        <div class="exercise-image-container">
            <img src="public\img\meditação\aprenda.jpg"
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

        // Meditação Guiada
        const startStopBtn = document.getElementById('startStopBtn');
        const exerciseNameEl = document.getElementById('exerciseName');
        const exerciseTimerEl = document.getElementById('exerciseTimer');
        const exerciseImageEl = document.getElementById('exerciseImage');
        const skipBtn = document.getElementById('skipBtn');
        const backgroundAudio = document.getElementById('backgroundAudio');
        backgroundAudio.volume = 0.2; // Define um volume baixo para o som de fundo

        let ptBrVoice = null;

        // Carrega e seleciona a voz desejada quando as vozes estiverem disponíveis
        speechSynthesis.onvoiceschanged = () => {
            const voices = speechSynthesis.getVoices();
            // Tenta encontrar uma voz feminina específica (ex: Luciana, Camila do Google)
            ptBrVoice = voices.find(voice => voice.lang === 'pt-BR' && (voice.name.includes('Luciana') || voice.name.includes('Camila') || voice.name.includes('Female')));
            // Se não encontrar, pega a primeira voz em pt-BR disponível
            if (!ptBrVoice) {
                ptBrVoice = voices.find(voice => voice.lang === 'pt-BR');
            }
        };

        function speak(text) {
            speechSynthesis.cancel();
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'pt-BR';
            if (ptBrVoice) utterance.voice = ptBrVoice; // Aplica a voz selecionada
            speechSynthesis.speak(utterance);
        }

        const meditationSteps = [
            { name: 'Passo 1: Encontre uma posição confortável, com a coluna ereta, e feche os olhos suavemente.', duration: 30, image: 'public\img\meditação\aprenda a meditar\olhos fechados.jpg' },
            { name: 'Passo 2: Leve sua atenção para a respiração. Apenas observe o ar entrando e saindo, sem forçar.', duration: 60, image: 'public\img\meditação\aprenda a meditar\ar.jpg' },
            { name: 'Passo 3: Sua mente vai se distrair. É normal. Quando perceber, gentilmente traga o foco de volta para a respiração.', duration: 75, image: 'public\img\meditação\aprenda a meditar\mente distraida.jpg' },
            { name: 'Passo 4: Permaneça nesse ciclo de observar a respiração e retornar o foco sempre que se distrair.', duration: 60, image: 'public\img\meditação\aprenda a meditar\CICLO.jpg' },
            { name: 'Parabéns por completar sua prática. Abra os olhos lentamente quando estiver pronto.', duration: 20, image: 'public\img\meditação\aprenda a meditar\parabens.jpg' }
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
                backgroundAudio.pause();
                stopMeditationCycle();
            }
        });

        skipBtn.addEventListener('click', () => {
            if (!isMeditating) return;
            speechSynthesis.cancel(); // Para a fala ao pular
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
            speechSynthesis.cancel(); // Para qualquer fala se o ciclo for interrompido
            backgroundAudio.pause();
            backgroundAudio.currentTime = 0; // Reinicia o áudio
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
            speak(step.name); // Fala a descrição da etapa
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


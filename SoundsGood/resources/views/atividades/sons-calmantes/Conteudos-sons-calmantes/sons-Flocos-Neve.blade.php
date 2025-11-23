@extends('layouts.app')

@section('title', 'SoundsGood - Sons Calmantes')

@push('styles')
    <link rel="stylesheet" href="/css/pages/_atividades.css">
    <link rel="stylesheet" href="/css/tecnicas/sons-calmantes.css">
@endpush

@section('content')
<main class="container my-5 pt-5">
    <header class="text-center my-5 reveal">
        <h1 class="display-4 hero-title">Sons Calmantes De Flocos de Neve</h1>
        <p class="lead text-white-50 hero-subtitle">
            Encontre a tranquilidade com nossa seleção de sons da natureza e ambientes.
        </p>
    </header>

    <section class="sounds-section reveal">
        <div class="row justify-content-center text-center">
            @foreach(['Flocos 1','Flocos 2','Flocos 3','Flocos 4','Flocos 5','Flocos 6'] as $sound)
            <div class="col-6 col-md-4 col-lg-2">
                <div class="sound-button-wrapper">
                    <div class="sound-label">{{ ucfirst($sound) }}</div>
                    <button class="sound-button btn-sound-control" data-sound="{{ $sound }}">
                        <i class="fas fa-play"></i>
                    </button>
                    <div class="sound-actions" data-sound-id="{{ $sound }}">
                        <i class="far fa-heart action-icon like-icon" title="Gostei"></i>
                        <i class="fas fa-share-alt action-icon share-icon" title="Compartilhar"></i>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-6 col-md-4 col-lg-2">
                <div class="sound-button-wrapper">
                    <div class="sound-label">Adicionar Som</div>
                    <button class="sound-button-add" id="addSoundBtn" title="Adicionar um novo som">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="sound-button-wrapper mt-4">
                    <a href="/sons-calmantes" class="btn btn-back">Voltar</a>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Footer é puxado pelo layout -->SoundsGood/public/audios/Sons-Calmantes/Flocos-leve/Flocos-1.mpeg

<!-- Áudios -->
<!-- Som Flocos 1 -->
<audio id="audio-Flocos 1" loop>
    <source src="audios/Sons-Calmantes/Flocos-Neve/" type="audio/mpeg">
</audio>
<audio id="audio-Flocos 2" loop>
    <source src="audios/Sons-Calmantes/Flocos-Neve/" type="audio/mpeg">
</audio>
<audio id="audio-Flocos 3" loop>
    <source src="audios/Sons-Calmantes/Flocos-Neve/" type="audio/mpeg">
</audio>
<audio id="audio-Flocos 4" loop>
    <source src="audios/Sons-Calmantes/Flocos-Neve/" type="audio/mpeg">
</audio>
<audio id="audio-Flocos 5" loop>
    <source src="audios/Sons-Calmantes/Flocos-Neve/" type="audio/mpeg">
</audio>
<audio id="audio-Flocos 6" loop>
    <source src="audios/Sons-Calmantes/Flocos-Neve/" type="audio/mpeg">
</audio>


<!-- Input oculto para upload -->
<input type="file" id="soundUploader" accept="audio/*" style="display: none;">

<!-- Modal Nomear Som -->
<div class="modal fade" id="nameSoundModal" tabindex="-1" aria-labelledby="nameSoundModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nameSoundModalLabel">Nomeie o seu Som</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Escolha um nome para o novo som que você está adicionando.</p>
                <input type="text" class="form-control custom-input" id="soundNameInput" placeholder="Ex: Flocos na Janela">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secFlocosry" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-cta" id="saveSoundNameBtn">Salvar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Função reveal ao scroll
    function reveal() {
        document.querySelectorAll(".reveal").forEach(el => {
            if (el.getBoundingClientRect().top < window.innerHeight - 100) {
                el.classList.add("active");
            }
        });
    }
    window.addEventListener("scroll", reveal);
    reveal();

    // Controle de reprodução de sons
    function addPlayButtonListener(button) {
        button.addEventListener('click', () => {
            const soundId = button.dataset.sound;
            const audio = document.getElementById(`audio-${soundId}`);
            const icon = button.querySelector('i');

            // Pausa outros áudios
            document.querySelectorAll('audio').forEach(otherAudio => {
                if (otherAudio !== audio) {
                    otherAudio.pause();
                    const otherBtn = document.querySelector(`.btn-sound-control[data-sound="${otherAudio.id.split('-')[1]}"]`);
                    if (otherBtn) {
                        otherBtn.querySelector('i').classList.replace('fa-pause','fa-play');
                        otherBtn.classList.remove('playing');
                    }
                }
            });

            if (audio.paused) {
                audio.play();
                icon.classList.replace('fa-play','fa-pause');
                button.classList.add('playing');
            } else {
                audio.pause();
                icon.classList.replace('fa-pause','fa-play');
                button.classList.remove('playing');
            }
        });
    }
    document.querySelectorAll('.btn-sound-control').forEach(addPlayButtonListener);

    // Like e share
    document.querySelectorAll('.like-icon').forEach(icon => {
        icon.addEventListener('click', () => {
            icon.classList.toggle('liked');
            icon.classList.toggle('fas');
            icon.classList.toggle('far');
        });
    });

    document.querySelectorAll('.share-icon').forEach(icon => {
        const tooltip = new bootstrap.Tooltip(icon,{title:'Link Copiado!',trigger:'manual',placement:'top'});
        icon.addEventListener('click', () => {
            const soundId = icon.closest('.sound-actions').dataset.soundId;
            const urlToCopy = `${window.location.origin}${window.location.pathname}?sound=${soundId}`;
            navigator.clipboard.writeText(urlToCopy).then(() => {
                tooltip.show();
                setTimeout(()=>tooltip.hide(),2000);
            });
        });
    });

    // Adicionar novo som
    const soundGrid = document.querySelector('.sounds-section .row');
    const addSoundBtn = document.getElementById('addSoundBtn');
    const soundUploader = document.getElementById('soundUploader');
    const nameSoundModal = new bootstrap.Modal(document.getElementById('nameSoundModal'));
    const soundNameInput = document.getElementById('soundNameInput');
    const saveSoundNameBtn = document.getElementById('saveSoundNameBtn');
    let pendingFile = null;

    addSoundBtn?.addEventListener('click',()=>soundUploader.click());
    soundUploader?.addEventListener('change',(e)=>{
        pendingFile = e.target.files[0];
        if(!pendingFile) return;
        const defaultName = pendingFile.name.split('.').slice(0,-1).join('.')||'Novo Som';
        soundNameInput.value = defaultName;
        nameSoundModal.show();
    });

    saveSoundNameBtn?.addEventListener('click',()=>{
        if(!pendingFile){ alert("Nenhum arquivo selecionado."); return;}
        const soundName = soundNameInput.value.trim() || pendingFile.name.split('.').slice(0,-1).join('.')||'Novo Som';
        const fileURL = URL.createObjectURL(pendingFile);
        const soundId = `custom${Date.now()}`;

        // Criar áudio
        const newAudio = document.createElement('audio');
        newAudio.id = `audio-${soundId}`;
        newAudio.loop = true;
        const source = document.createElement('source');
        source.src = fileURL;
        source.type = pendingFile.type;
        newAudio.appendChild(source);
        document.body.appendChild(newAudio);

        // Criar botão
        const newBtnWrapper = document.createElement('div');
        newBtnWrapper.className = 'col-6 col-md-4 col-lg-2';
        newBtnWrapper.innerHTML = `
            <div class="sound-button-wrapper">
                <div class="sound-label">${soundName}</div>
                <button class="sound-button btn-sound-control" data-sound="${soundId}">
                    <i class="fas fa-play"></i>
                </button>
                <div class="sound-actions" data-sound-id="${soundId}">
                    <i class="far fa-heart action-icon like-icon" title="Gostei"></i>
                    <i class="fas fa-share-alt action-icon share-icon" title="Compartilhar"></i>
                </div>
            </div>
        `;
        soundGrid.insertBefore(newBtnWrapper, addSoundBtn.closest('.col-6'));

        addPlayButtonListener(newBtnWrapper.querySelector('.btn-sound-control'));
        const newLike = newBtnWrapper.querySelector('.like-icon');
        newLike?.addEventListener('click',()=>{newLike.classList.toggle('liked'); newLike.classList.toggle('fas'); newLike.classList.toggle('far');});

        const newShare = newBtnWrapper.querySelector('.share-icon');
        const tooltip = new bootstrap.Tooltip(newShare,{title:'Link Copiado!',trigger:'manual',placement:'top'});
        newShare?.addEventListener('click',()=>alert("O compartilhamento de sons locais não é suportado."));

        pendingFile = null;
        soundUploader.value = '';
        nameSoundModal.hide();
    });
</script>
@endpush

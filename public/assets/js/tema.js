const options = document.querySelectorAll('.mode-toggle .option');

const celulares = {
    sistema: document.querySelector('.celular-system'),
    claro: document.querySelector('.celular-light'),
    escuro: document.querySelector('.celular-dark')
};

function clearActives() {
    options.forEach(o => o.classList.remove('active'));
    Object.values(celulares).forEach(cel => {
        if (cel) cel.classList.remove('active');
    });
}

function activateMode(mode) {
    const opt = document.querySelector(`.mode-toggle .option[data-mode="${mode}"]`);
    const cel = celulares[mode];

    if (opt) opt.classList.add('active');
    if (cel) cel.classList.add('active');

    document.documentElement.setAttribute('data-mode', mode);

    localStorage.setItem('modoSelecionado', mode);
}

// Ativa modo salvo ao carregar a página
window.addEventListener('DOMContentLoaded', () => {
    const saved = localStorage.getItem('modoSelecionado') || 'sistema';
    clearActives();
    activateMode(saved);
});

// Eventos de clique nos botões
options.forEach(opt => {
    opt.addEventListener('click', () => {
        const mode = opt.getAttribute('data-mode');
        clearActives();
        activateMode(mode);
    });
});

// Para uso com checkbox se quiser
function toggleDarkMode() {
    const checkbox = document.getElementById('darkToggle');
    if (checkbox) checkbox.checked = !checkbox.checked;
}
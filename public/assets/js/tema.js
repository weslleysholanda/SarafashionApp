const options = document.querySelectorAll('.mode-toggle .option');

const celulares = {
    sistema: document.querySelector('.celular-system'),
    claro: document.querySelector('.celular-light'),
    escuro: document.querySelector('.celular-dark')
};

function clearActives() {
    if (options.length > 0) {
        options.forEach(o => o.classList.remove('active'));
    }

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

// ✅ Só adiciona eventos se houver opções na tela
if (options.length > 0) {
    options.forEach(opt => {
        opt.addEventListener('click', () => {
            const mode = opt.getAttribute('data-mode');
            clearActives();
            activateMode(mode);
        });
    });
}

// ✅ Aplica o tema salvo sempre (mesmo se não tiver seletor, pelo menos o data-mode é aplicado)
window.addEventListener('DOMContentLoaded', () => {
    const saved = localStorage.getItem('modoSelecionado') || 'sistema';
    clearActives();
    activateMode(saved);
});

function toggleDarkMode() {
    const checkbox = document.getElementById('darkToggle');
    if (checkbox) checkbox.checked = !checkbox.checked;
}


window.addEventListener("load", () => {
    let loader = document.getElementById('loader');
    loader.style.display = "none";
});
// des que la page à finie de charger elle enleve le loader

function toggleElement(moveContainer, btnToggle, classToggle) {
    let toggleContainer = document.getElementById(moveContainer);
    let toggleBtn = document.getElementById(btnToggle);

    if (toggleContainer && toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            toggleContainer.classList.toggle(classToggle)
        })
    }
}

toggleElement('nav-menu', 'nav-btn-toggle', 'show_menu');
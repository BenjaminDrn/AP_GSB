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
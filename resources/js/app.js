import './bootstrap';

const btnProfile = document.querySelector('#btn_profile');
const profileMenu = document.querySelector('#profile');
const btnMobile = document.querySelector('#btn_mobile');
const mobileMenu = document.querySelector('#mobile_menu');
const btnMobileProfile = document.querySelector('#btn_mobile_profile');
const mobileProfileMenu = document.querySelector('#mobile_profile_menu');
const toast = document.querySelector('#toast');
const toastClose = document.querySelector('#toast_close');
const btnToggleModals = document.querySelectorAll('button[data-bs-toggle="modal"]')
const btnCloseModals = document.querySelectorAll('button[data-bs-toggle="modal_close"]')

const openCloseMenu = (element) => {
    element.classList.contains('hidden') ? element.classList.remove('hidden') : element.classList.add('hidden');
};

if (btnProfile !== null) {
    btnProfile.addEventListener('click', () => {
        openCloseMenu(profileMenu);
    });
}

btnMobile.addEventListener('click', () => {
    openCloseMenu(mobileMenu);
});

if (btnMobileProfile !== null) {
    btnMobileProfile.addEventListener('click', () => {
        openCloseMenu(mobileProfileMenu);
    });
}

if (toastClose !== null) {
    toastClose.addEventListener('click', (e) => {
        toast.style.display = 'none';
    });
}

btnToggleModals.forEach(button => {
    button.addEventListener('click', () => {
        const modal = document.querySelector(button.getAttribute('data-bs-target'));
        modal.classList.remove('hidden');
    });
});

btnCloseModals.forEach(button => {
    button.addEventListener('click', () => {
        const modal = document.querySelector(button.getAttribute('data-bs-target'));
        modal.classList.add('hidden');
    })
})

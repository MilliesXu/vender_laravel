import './bootstrap';

const btnProfile = document.querySelector('#btn_profile');
const profileMenu = document.querySelector('#profile');
const btnMobile = document.querySelector('#btn_mobile');
const mobileMenu = document.querySelector('#mobile_menu');
const btnMobileProfile = document.querySelector('#btn_mobile_profile');
const mobileProfileMenu = document.querySelector('#mobile_profile_menu');
const toast = document.querySelector('#toast');
const toastClose = document.querySelector('#toast_close');

btnProfile.addEventListener('click', () => {
    openCloseMenu(profileMenu);
});

btnMobile.addEventListener('click', () => {
    openCloseMenu(mobileMenu);
});

btnMobileProfile.addEventListener('click', () => {
    openCloseMenu(mobileProfileMenu);
});

if (toastClose !== null) {
    toastClose.addEventListener('click', (e) => {
        toast.style.display = 'none';
    });
}


const openCloseMenu = (element) => {
    element.classList.contains('hidden') ? element.classList.remove('hidden') : element.classList.add('hidden');
};

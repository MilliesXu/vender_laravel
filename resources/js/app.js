import './bootstrap';

const btnProfile = document.querySelector('#btn_profile');
const profileMenu = document.querySelector('#profile');
const btnMobile = document.querySelector('#btn_mobile');
const mobileMenu = document.querySelector('#mobile_menu');
const btnMobileProfile = document.querySelector('#btn_mobile_profile');
const mobileProfileMenu = document.querySelector('#mobile_profile_menu');
const dashboard = document.querySelector('#dashboard');
const dashboardMobile = document.querySelector('#dashboard_mobile');
const material = document.querySelector('#material');
const materialMobile = document.querySelector('#material_mobile');

btnProfile.addEventListener('click', () => {
    openCloseMenu(profileMenu);
});

btnMobile.addEventListener('click', () => {
    openCloseMenu(mobileMenu);
});

btnMobileProfile.addEventListener('click', () => {
    openCloseMenu(mobileProfileMenu);
});

dashboard.addEventListener('click', () => {
    navigationSetActive(dashboard, dashboardMobile);
});

dashboardMobile.addEventListener('click', () => {
    navigationSetActive(dashboard, dashboardMobile);
});

material.addEventListener('click', () => {
    navigationSetActive(material, materialMobile);
});

materialMobile.addEventListener('click', () => {
    navigationSetActive(material, materialMobile);
});

const openCloseMenu = (element) => {
    element.classList.contains('hidden') ? element.classList.remove('hidden') : element.classList.add('hidden');
};

const navigationSetActive = (elementActive1, elementActive2) => {
    const currents = document.querySelectorAll('.bg-gray-900');
    currents.forEach(current => {
        current.classList.replace('bg-gray-900', 'text-gray-300');
        current.classList.remove('text-white');
        current.classList.add('hover:bg-gray-700');
    });

    elementActive1.classList.replace('text-gray-300', 'bg-gray-900');
    elementActive1.classList.add('text-white');
    elementActive2.classList.remove('hover:bg-gray-700');
    elementActive2.classList.add('text-white');
}

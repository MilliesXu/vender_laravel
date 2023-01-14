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
const tags = document.querySelector('#tags');
const tagsBox = document.querySelector('#tags_box');
const addTag = document.querySelector('#add_tag');
const tagIds = document.querySelector('#tag_ids');
const tagOptions = document.querySelectorAll('#tag_options');

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
    toastClose.addEventListener('click', () => {
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

if (addTag !== null) {
    addTag.addEventListener('click', (e) => {
        e.preventDefault();
        const text = tags.options[tags.selectedIndex].text;
        const value = tags.value;

        // Check if tag value is not the default option
        if (value !== 'Choose a tag') {
            // Create new element of tag
            const tag = document.createElement('div');

            // Give the element a new id
            tag.setAttribute('id', value);

            // Give the element class
            tag.classList.add('pl-5', 'pr-3', 'rounded-lg' ,'text-white' ,'bg-gray-700', 'flex', 'ap-x-2');

            // Append child to element
            tag.innerHTML = `<p class="my-auto">
                            ${text}
                        </p>
                        <button class="px-2 text-white hover:text-gray-300">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>`;

            // Append the value into the input
            tagIds.value === '' ? tagIds.value += value : tagIds.value += `,${value}`;

            // Show the selection
            tagsBox.appendChild(tag);

            // Get all the tag options and make it to array
            const arrayTagOptions = Array.from(tagOptions);

            // Disabled the tag that has been chosen
            arrayTagOptions.filter(tag => tag.value === value).map(tag => tag.setAttribute('disabled', ''));

            // Revert the selection
            tags.selectedIndex = 0;
        }
    })
}

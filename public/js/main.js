const overlay = document.querySelector('.overlay')
const editBtn = document.querySelector('#edit-btn')
const cancelBtn = document.querySelector('#cancel-btn')
const closeBtn = document.querySelector('#close-btn')


editBtn.addEventListener('click', () => {
    overlay.classList.remove('hidden');
    overlay.classList.add('flex');
})

cancelBtn.addEventListener('click', () => {
    overlay.classList.add('hidden');
    overlay.classList.remove('flex');
})

closeBtn.addEventListener('click', (event) => {
    event.preventDefault();
    
    overlay.classList.add('hidden');
    overlay.classList.remove('flex');
})


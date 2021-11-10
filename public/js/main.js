const overlay = document.querySelector('.overlay')
const editBtn = document.querySelector('.edit-btn')
const cancelBtn = document.querySelector('.cancel-btn')
const closeBtn = document.querySelector('.close-btn')


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


function toggleForm(id) {
    document.querySelector('.reply-form-'+id).classList.toggle('hidden');
}

function toggleCommentForm() {
    document.querySelector('#thread-comment-form').classList.toggle('hidden');
}

function toggleCommentModal(id) {
    document.querySelector('.comment-overlay-'+id).classList.toggle('hidden');
    document.querySelector('.comment-overlay-'+id).classList.toggle('flex');
}

function closeCommentModal(id) {
    document.querySelector('.comment-overlay-'+id).classList.toggle('hidden');
    document.querySelector('.comment-overlay-'+id).classList.toggle('flex');
}

function toggleReplyModal(id) {
    document.querySelector('.reply-overlay-'+id).classList.toggle('hidden');
    document.querySelector('.reply-overlay-'+id).classList.toggle('flex');
}

function closeReplyModal(id) {
    document.querySelector('.reply-overlay-'+id).classList.toggle('hidden');
    document.querySelector('.reply-overlay-'+id).classList.toggle('flex');
}
const overlay = document.querySelector('.profile-overlay')
const editBtn = document.querySelector('.profile-edit')
const cancelBtn = document.querySelector('.cancel-btn')
const closeBtn = document.querySelector('.profile-close')


editBtn.addEventListener('click', () => {
    overlay.classList.remove('hidden');
    overlay.classList.add('flex');
})


closeBtn.addEventListener('click', (event) => {
    event.preventDefault();

    overlay.classList.add('hidden');
    overlay.classList.remove('flex');
})


function toggleReplies(id) {
    document.querySelector('#first-arrow-'+id).classList.toggle('hidden');
    document.querySelector('#second-arrow-'+id).classList.toggle('hidden');
    document.querySelector('#reply-'+id).classList.toggle('hidden');
}

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


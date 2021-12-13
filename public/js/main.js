const cancelBtn = document.querySelector('.cancel-btn')
const profileImg = document.querySelector('.prof')
const overlay = document.querySelector('#nav-overlay')

profileImg.addEventListener("mouseover", () => {
    document.querySelector('#nav-overlay').classList.remove('hidden');
})

profileImg.addEventListener("mouseout", () => {
    document.querySelector('#nav-overlay').classList.add('hidden');
})

overlay.addEventListener("mouseover", () => {
    document.querySelector('#nav-overlay').classList.remove('hidden');
})

overlay.addEventListener("mouseout", () => {
    document.querySelector('#nav-overlay').classList.add('hidden');
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


const loginbtn = document.getElementById('loginbtn');
const modal_container = document.getElementById('modal_container');
const closebtn = document.getElementById('closebtn');

loginbtn.addEventListener('click', () => {
    modal_container.classList.add('show');
});


closebtn.addEventListener('click', () => {
    modal_container.classList.remove('show');
});




const loginbtn = document.getElementById('loginbtn');
const modal_container = document.getElementById('modal_container');
const closebtn = document.getElementById('closebtn');

loginbtn.addEventListener('click', () => {
    modal_container.classList.add('show');
});


closebtn.addEventListener('click', () => {
    modal_container.classList.remove('show');
});

const singupbtn = document.getElementById('singupbtn');
const modal_container2 = document.getElementById('modal_container2');
const closebtn2 = document.getElementById('closebtn2');

singupbtn.addEventListener('click', () =>{
    modal_container2.classList.add('show');
})

closebtn2.addEventListener('click', () => {
    modal_container2.classList.remove('show');
})




const selected = document.querySelector(".selected");
const optionsContainer = document.querySelector(".options-container");
const optionsList = document.querySelectorAll(".option");

selected.addEventListener("click", () => {
  optionsContainer.classList.toggle("active");
});

optionsList.forEach(o => {
  o.addEventListener("click", () => {
    selected.innerHTML = o.querySelector("label").innerHTML;
    optionsContainer.classList.remove("active");
  });
});

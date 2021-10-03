//let slots = document.querySelectorAll("input[name='time-slot']");
let slots = document.querySelector(".time-slots");
slots.addEventListener("checked", function(event){
    console.log(event.target);
})
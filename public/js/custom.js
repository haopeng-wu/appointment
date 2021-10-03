console.log("hello");

/*
let slots = document.querySelectorAll("input[name='time-slot']");

for(let i = 0; i < slots.length; i++) {
    slots[i].addEventListener("change", function (event) {
        console.log(event.target);
    })
}
*/

let slots = document.querySelector(".time-slots");
slots.addEventListener("change", function (event) {
    console.log(event.target);
})
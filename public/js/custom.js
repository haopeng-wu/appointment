console.log("hello");
let slots = document.querySelectorAll("input[name='time-slot']");
//let slots = document.querySelector(".time-slots");

for(let i = 0; i < slots.length; i++) {
    slots[i].addEventListener("checked", function (event) {
        console.log(event.target);
    })
}
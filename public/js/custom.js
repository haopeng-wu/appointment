console.log("hello");
/*
# an alternative
let slots = document.querySelectorAll("input[name='time-slot']");

for(let i = 0; i < slots.length; i++) {
    slots[i].addEventListener("change", function (event) {
        console.log(event.target);
    })
}
*/
let slots = document.querySelector(".time-slots");

slots.addEventListener("change", function (event) {
    console.log(event.target.id);
    let slotLabels = document.querySelectorAll(".time-slots label");

    for(let i = 0; i < slotLabels.length; i++) {
        slotLabels[i].classList.remove("checked");
    }
    let theLable = document.querySelector(`label[for=${event.target.id}]`);
    theLable.classList.add("checked");
})

/*
let slotLabels = document.querySelectorAll(".time-slots label");

for(let i = 0; i < slotLabels.length; i++) {
    slotLabels[i].classList.add("checked");
}
*/
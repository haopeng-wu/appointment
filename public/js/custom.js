/*
for slots select color
*/
let slots = document.querySelector(".time-slots");

slots.addEventListener("change", function (event) {
    console.log(event.target.id);

    let slotLabels = document.querySelectorAll(".time-slots label");
    for(let i = 0; i < slotLabels.length; i++) {
        slotLabels[i].classList.remove("checked");
        slotLabels[i].classList.add("unchecked");
    }

    let theLable = document.querySelector(`label[for=${event.target.id}]`);
    theLable.classList.remove("unchecked");
    theLable.classList.add("checked");
})

flatpickr('.date input',{
    dateFormat: "Y-m-d",
});

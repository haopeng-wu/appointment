/*
for slots select color
*/
const availableWeekdays = require("lodash");
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
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
    minDate: "today",
    "disable": [
        function(date) {
            // return true to disable
            if(availableWeekdays.includes(date.getDay() )){
                return false;
            }
            else{
                return true;
            }
            //return (date.getDay() !== 0 && date.getDay() !== 6 && date.getDay() !== 5);
        }
    ],
    "locale": {
        "firstDayOfWeek": 1 // start week on Monday
    }
});

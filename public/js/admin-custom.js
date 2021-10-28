/*
for configure slots
 */
const firstTable = document.querySelector('form:first-of-type table');
let thead = document.createElement('thead');
thead.innerHTML = "<tr>\n" +
    "        <th>Start at</th>\n" +
    "        <th>End by</th>\n" +
    "        <th>Price</th>\n" +
    "        <th>Modify</th>\n" +
    "    </tr>";
firstTable.prepend(thead);

/*
change bookable weekdays part
 */
for(let i = 0; i < 7; i++){
    // to select the weekday label
    let theInput = document.querySelector(`.weekdays input#${'d'+(i+1)}`);
    //let theLable = document.querySelector(`.weekdays label[for=${i+1}]`);
    //theInput.setAttribute('value', bookableFlags[i+1]);
    if (bookableFlags[i+1]===1){
        theInput.setAttribute('checked', 1);
    }
}


/*
for manually booking
 */
/*
for slots select color
*/
let slots = document.querySelector(".time-slots");

slots.addEventListener("change", function (event) {
    console.log(event.target.id);

    let slotLabels = document.querySelectorAll(".time-slots label");
    for(let i = 0; i < slotLabels.length; i++) {
        slotLabels[i].classList.remove("checked");
        //slotLabels[i].classList.add("unchecked");
    }

    let theLable = document.querySelector(`label[for=${event.target.id}]`);
    //theLable.classList.remove("unchecked");
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
            if(availableWeekdays.includes(date.getDay()))
            {
                return false;
                //return true;
            }
            else{
                //return false;
                return true;
            }
        }
    ],
    "locale": {
        "firstDayOfWeek": 1 // start week on Monday
    }
});


/*
indicating the booked slots
 */
function clearClasses(element){
    for (let cssClass of element.classList){
        element.classList.remove(cssClass);
    }
}

const dateInput = document.querySelector('.date input#date');

dateInput.addEventListener('input', function (){
    /*
    Do the cleaning first:
    a) Remove all the classes of all the labels
    b) Enable all the input radio buttons by setting disabled = false
    c) Deselect all the input radios buttons
     */
    let slotLabels = document.querySelectorAll(".time-slots label");
    for(let i = 0; i < slotLabels.length; i++) {
        clearClasses(slotLabels[i]);
    }
    let slotInputs = document.querySelectorAll(".time-slots input");
    for(let i = 0; i < slotInputs.length; i++) {
        slotInputs[i].disabled = false;
        slotInputs[i].checked = false;
    }

    console.log(allFutureBooked);
    let bookedSlots = allFutureBooked[dateInput.value];
    for(let i = 0; i < bookedSlots.length; i++){
        const theLabel = document.querySelector(`label[for=slot-${bookedSlots[i]}]`);
        const theInputElement = document.querySelector(`input#slot-${bookedSlots[i]}`);
        clearClasses(theLabel);
        theLabel.classList.add('booked');
        theInputElement.disabled = true;
    }
})
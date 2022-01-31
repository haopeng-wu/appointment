/*
for slots select color
*/
let slots = document.querySelector(".time-slots");

if (slots != null){
    slots.addEventListener("change", function (event) {
        //console.log(event.target.id);

        let slotLabels = document.querySelectorAll(".time-slots label");
        for(let i = 0; i < slotLabels.length; i++) {
            slotLabels[i].classList.remove("checked");
            //slotLabels[i].classList.add("unchecked");
        }

        let theLable = document.querySelector(`label[for=${event.target.id}]`);
        //theLable.classList.remove("unchecked");
        theLable.classList.add("checked");
    })
}


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
    "locale":"ru",
});
/*
"locale": {
        "firstDayOfWeek": 1 // start week on Monday
    }
 */
/*
clear all of the element's classes
 */
function clearClasses(element){
    for (let cssClass of element.classList){
        element.classList.remove(cssClass);
    }
}

const dateInput = document.querySelector('.date input#date');

if (dateInput != null)
{
    dateInput.addEventListener('input', function (){
        /*
        Do the cleaning first:
            a) Remove all the classes of all the labels
            b) Enable all the input radio buttons by setting disabled = false
            c) Deselect all the input radios buttons
         */
        let slotLabels = document.querySelectorAll(".time-slots label");
        // Remove all the classes of all the labels
        for(let i = 0; i < slotLabels.length; i++) {
            clearClasses(slotLabels[i]);
        }
        let slotInputs = document.querySelectorAll(".time-slots input");
        for(let i = 0; i < slotInputs.length; i++) {
            // Enable all the input radio buttons by setting disabled = false
            slotInputs[i].disabled = false;
            // Deselect all the input radios buttons
            slotInputs[i].checked = false;
        }

        //console.log(allFutureBooked);
        let bookedSlots = allFutureBooked[dateInput.value];
        if(bookedSlots){
            for(let i = 0; i < bookedSlots.length; i++){
                const theLabel = document.querySelector(`label[for=slot-${bookedSlots[i]}]`);
                const theInputElement = document.querySelector(`input#slot-${bookedSlots[i]}`);
                console.log('theInputElement'+theInputElement);
                clearClasses(theLabel);
                theLabel.classList.add('booked');
                theInputElement.disabled = true;
            }
        }

        /*
        disable all the passed time slots in today
         */
        //console.log(dateInput.value);
        const selectedDate = new Date(dateInput.value);
        let todayDate = new Date();
        if (selectedDate.setHours(0, 0, 0, 0) === todayDate.setHours(0, 0, 0, 0)){
            //console.log(all_slots);
            // now disable the slots that has passed away
            console.log('Today');
            //console.log(all_slots);
            if (all_slots){
                let h = '', m = '', slotTime = '';
                let todayDate = new Date();
                let now = new Date(0, 0, 0, todayDate.getHours(), todayDate.getMinutes());
                console.log(now);
                for (const key in all_slots){
                    console.log(key);
                    h = all_slots[key].split(' - ')[0].split(':')[0];
                    m = all_slots[key].split(' - ')[0].split(':')[1];
                    slotTime = new Date(0, 0, 0, h, m);
                    console.log(now - slotTime);
                    if (now - slotTime > 0){
                        const _theLabel = document.querySelector(`label[for=slot-${key}]`);
                        const _theInputElement = document.querySelector(`input#slot-${key}`);
                        clearClasses(_theLabel);
                        _theLabel.classList.add('booked');
                        _theInputElement.disabled = true;
                    }
                }
            }
        }else {
            console.log('not today');
        }
    })
}


window.setTimeout(() => {
    let message = document.querySelector('div.message');
    if (message != null){
        message.classList.add('hide');
    }
}, 5000)


/*
for the menu drop down
 */
document.addEventListener('click', e => {
    const isDropDownButton = e.target.matches('[data-dropdown-button]');
    if (e.target.matches('.menu-top-bar .x-mark')) {
        const dropdown = document.querySelector('[data-dropdown]');
        dropdown.classList.remove('active');
    }
    if (!isDropDownButton && e.target.closest('[data-dropdown]') != null) return;

    let currentDropdown;
    if (isDropDownButton){
        currentDropdown = e.target.closest('[data-dropdown]');
        currentDropdown.classList.toggle('active');
    }

    document.querySelectorAll("[data-dropdown].active").forEach(dropdown =>{
        if (dropdown === currentDropdown) return;
        dropdown.classList.remove('active');
    })
})

/*
scroll to fade in effect on welcome page
 */

function isVisible(element){
    let elementBox = element.getBoundingClientRect();
    let distanceFromTop = -200;

    if (elementBox.top - window.innerHeight < distanceFromTop){
        return true;
    }else{
        return false;
    }
}

function scanDocument(){
    let articleList = document.querySelectorAll('.fade-in');
    articleList.forEach(function (article){
        if (isVisible(article)){
            article.classList.remove('fade-in');
        }
    })
}

document.addEventListener('scroll', scanDocument);

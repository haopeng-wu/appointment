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
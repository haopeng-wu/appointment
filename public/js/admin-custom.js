const firstTable = document.querySelector('form:first-of-type table');
let thead = document.createElement('thead');
thead.innerHTML = "<tr>\n" +
    "        <th>Start at</th>\n" +
    "        <th>End by</th>\n" +
    "        <th>Price</th>\n" +
    "        <th>Modify</th>\n" +
    "    </tr>";
firstTable.prepend(thead);


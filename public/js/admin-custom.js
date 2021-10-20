const firstTable = document.querySelector('form:first-of-type table');
const thead = document.createDocumentFragment(
    "<thead>" +
    "    <tr>" +
    "        <th>Start at</th>" +
    "        <th>End by</th>" +
    "        <th>Price</th>" +
    "        <th>Modify</th>" +
    "    </tr>" +
    "    </thead>");
firstTable.prepend(thead);
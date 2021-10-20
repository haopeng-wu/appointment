const firstTable = document.querySelector('form:first-of-type table');
const thead = document.createDocumentFragment(
    "<thead>\n" +
    "    <tr>\n" +
    "        <th>Start at</th>\n" +
    "        <th>End by</th>\n" +
    "        <th>Price</th>\n" +
    "        <th>Modify</th>\n" +
    "    </tr>\n" +
    "    </thead>");
firstTable.prepend(thead);
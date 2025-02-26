document.addEventListener('DOMContentLoaded', function () {
    const tables = document.querySelectorAll('table');
    tables.forEach((table) => {
        const rows = table.querySelectorAll('tr');
        const thead = table.querySelector('thead');

        if (rows.length > 0) {
            let headers = [];

            if (!thead) {
                // Create <thead> from the first row if it doesn't exist
                const firstRow = rows[0];
                const hasTh = Array.from(firstRow.children).some(cell => cell.tagName.toLowerCase() === 'th');

                if (!hasTh) {
                    const newThead = document.createElement('thead');
                    const cells = firstRow.querySelectorAll('td');

                    cells.forEach((cell) => {
                        const th = document.createElement('th');
                        th.textContent = cell.textContent;
                        cell.replaceWith(th);
                    });

                    newThead.appendChild(firstRow);
                    table.insertBefore(newThead, table.firstChild);
                    headers = newThead.querySelectorAll('th');
                }
            } else {
                // Use existing <th> elements in <thead>
                headers = thead.querySelectorAll('th');
            }

            // Add data-label attributes to remaining rows
            rows.forEach((row, index) => {
                if (thead && index === 0) return; // Skip the <thead> row if it exists
                row.querySelectorAll('td').forEach((cell, cellIndex) => {
                    if (headers[cellIndex]) {
                        cell.setAttribute('data-label', headers[cellIndex].textContent.trim());
                    }
                });
            });
        }
    });
});
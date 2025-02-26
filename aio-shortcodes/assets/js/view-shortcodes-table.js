document.addEventListener("DOMContentLoaded", function () {
    const table = document.querySelector("table");
    const headers = table.querySelectorAll("th");

    headers.forEach((header, index) => {
        header.addEventListener("click", function () {
            const rows = Array.from(table.querySelectorAll("tbody tr"));
            const isAscending = header.classList.contains("asc");

            rows.sort((rowA, rowB) => {
                const cellA = rowA.children[index].textContent.trim();
                const cellB = rowB.children[index].textContent.trim();

                const numA = parseInt(cellA.match(/\d+/)) || 0; // Extract numbers
                const numB = parseInt(cellB.match(/\d+/)) || 0;

                return isAscending ? numA - numB : numB - numA;
            });

            header.classList.toggle("asc", !isAscending);
            header.classList.toggle("desc", isAscending);

            rows.forEach((row) => table.querySelector("tbody").appendChild(row));
        });
    });
});

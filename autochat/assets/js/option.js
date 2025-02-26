// // Access the passed settings
if (typeof farSettings !== 'undefined') {
//     // Do whatever you want with the settings data
//     console.log(farSettings);

//     // For example, you can display the option field data
//     var myDiv = document.getElementById('chatBody');
//     if (myDiv) {
//         myDiv.innerHTML = JSON.stringify(farSettings); // Display settings data as JSON string
//     }
// }
// Access the passed settings
// Function to filter search results based on query
// function filterResults(query) {
//     var filteredResults = [];

//     // Check if farSettings is defined and has the necessary properties
//     if (typeof farSettings === 'object' && farSettings.hasOwnProperty('achat-txt') && farSettings.hasOwnProperty('achat-txtarea')) {
//         // Iterate over the keys of achat-txt
//         Object.keys(farSettings['achat-txt']).forEach(function(key) {
//             // Check if the value of achat-txt at this key matches the query
//             if (farSettings['achat-txt'][key].toLowerCase().includes(query.toLowerCase())) {
//                 // If it matches, add it to filteredResults
//                 filteredResults.push({
//                     key: key,
//                     value: farSettings['achat-txt'][key]
//                 });
//             }
//         });

//         // Iterate over the keys of achat-txtarea
//         Object.keys(farSettings['achat-txtarea']).forEach(function(key) {
//             // Check if the value of achat-txtarea at this key matches the query
//             if (farSettings['achat-txtarea'][key].toLowerCase().includes(query.toLowerCase())) {
//                 // If it matches, add it to filteredResults
//                 filteredResults.push({
//                     key: key,
//                     value: farSettings['achat-txtarea'][key]
//                 });
//             }
//         });
//     }
//     console.log(filteredResults);

//     return filteredResults;
// }
// Function to filter search results based on query
function filterResults(query) {
    var filteredResults = [];

    // Check if farSettings is defined and has the necessary properties
    if (typeof farSettings === 'object' && farSettings.hasOwnProperty('achat-txt') && farSettings.hasOwnProperty('achat-txtarea')) {
        // Iterate over the keys of achat-txt
        Object.keys(farSettings['achat-txt']).forEach(function(key) {
            // Check if the value of achat-txt at this key matches the query
            if (farSettings['achat-txt'][key].toLowerCase().includes(query.toLowerCase())) {
                // If it matches, add it to filteredResults
                filteredResults.push({
                    key: key,
                    value: farSettings['achat-txt'][key]
                });
            }
        });

        // Iterate over the keys of achat-txtarea
        Object.keys(farSettings['achat-txtarea']).forEach(function(key) {
            // Check if the value of achat-txtarea at this key matches the query
            if (farSettings['achat-txtarea'][key].toLowerCase().includes(query.toLowerCase())) {
                // If it matches, add it to filteredResults
                filteredResults.push({
                    key: key,
                    value: farSettings['achat-txtarea'][key]
                });
            }
        });
    }
    console.log(filteredResults);

    return filteredResults;
}

// Assuming searchInput is the ID of your search input field
var searchInput = document.getElementById('searchInput');

// // Listen for changes in the search input field
// if (searchInput) {
//     searchInput.addEventListener('input', function(event) {
//         var query = event.target.value.trim(); // Get the search query
//         var filteredResults = filterResults(query); // Filter results based on the query
//         displayResults(filteredResults); // Display the filtered results
//     });
// }


//     // Function to display search results
//     function displayResults(results) {
//         // Display the results to the user
//         // You can update the DOM to show the results in a list, table, etc.
//         // For demonstration, let's assume there's a div with the id 'searchResults'
//         var searchResultsDiv = document.getElementById('chatBody');
//         if (searchResultsDiv) {
//             searchResultsDiv.innerHTML = '';

//             results.forEach(function(result) {
//                 var listItem = document.createElement('li');
//                 listItem.textContent = JSON.stringify(result); // Display the result data
//                console.log(listItem);
//                 searchResultsDiv.appendChild(listItem);
//             });
//         }
//     }

//     // Listen for changes in the search input field
//     var searchInput = document.getElementById('MsgInput');
//     if (searchInput) {
//         searchInput.addEventListener('input', function(event) {
//             var query = event.target.value.trim(); // Get the search query
//             var filteredResults = filterResults(query); // Filter results based on the query
//             //console.log(filteredResults);
//             displayResults(filteredResults); // Display the filtered results
//         });
//     }
}

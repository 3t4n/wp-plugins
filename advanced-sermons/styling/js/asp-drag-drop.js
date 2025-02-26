jQuery(document).ready(() => {
    const AspOrderableTable = '#the-list';

    // Function to get the current page number
    const aspGetCurrentPage = () => {
        // Example: Extract page number from URL or dashboard controls
        // Modify this logic based on your dashboard's URL structure or pagination controls
        const urlParams = new URLSearchParams(window.location.search);
        return parseInt(urlParams.get('paged')) || 1;
    };

    const aspSaveCustomOrder = () => {
		const currentPage = aspGetCurrentPage();
		let termsPerPage = 20; // Default value

		// List of taxonomy names
		const taxonomies = ['sermon_speaker', 'sermon_series', 'sermon_topics', 'sermon_book'];

		// Determine the current taxonomy and find the corresponding input field
		const currentTaxonomy = window.asp_ajax.taxonomy;
		const termsPerPageInputId = `edit_${currentTaxonomy}_per_page`;
		const termsPerPageInput = document.getElementById(termsPerPageInputId);

		// If the input field for the current taxonomy is found, use its value
		if (termsPerPageInput) {
			termsPerPage = parseInt(termsPerPageInput.value, 10);
		}

		const numTermsOnPage = jQuery(AspOrderableTable).children('tr').length; // Number of terms on the current page
		const Order = jQuery(AspOrderableTable).sortable('serialize');

		const Query = {
			'action': 'asp_archive_order',
			'_nonce': window.asp_ajax._nonce,
			'post_type': window.asp_ajax.post_type,
			'taxonomy': currentTaxonomy,
			'order': Order,
			'page': currentPage,
			'per_page': termsPerPage,
			'numTermsOnPage': numTermsOnPage
		};

		const Data = new FormData();

		for (let Key in Query) {
			Data.append(Key, Query[Key]);
		}

		// Send the data through ajax
		fetch(window.asp_ajax.url, {
			method: 'POST',
			body: Data
		}).then((Response) => Response.json());
	};

    // Enable sorting
    jQuery(AspOrderableTable).sortable({
        placeholder: {
            element: (Element) => {
                const Columns = Element.children('td:visible').length + 1;

                return jQuery(`<tr class="ui-sortable-placeholder"><td colspan="${Columns}"></td></tr>`);
            },
            update: () => false,
        },
        items: 'tr',
        axis: 'y',
        handle: '.asp-draggable',
        update: () => {
            // Trigger the aspSaveCustomOrder function when sorting is updated
            aspSaveCustomOrder();
        },
    });

    // Function to handle term creation and trigger aspSaveCustomOrder
    const aspHandleTermCreation = () => {
        // Trigger the aspSaveCustomOrder function after a new term is created
        aspSaveCustomOrder();
    };

    // Bind the aspHandleTermCreation function to the "create term" button click event
    jQuery('#submit').on('click', () => {
        setTimeout(aspHandleTermCreation, 1000); // Wait for 1 second to ensure the new term is created
    });
});
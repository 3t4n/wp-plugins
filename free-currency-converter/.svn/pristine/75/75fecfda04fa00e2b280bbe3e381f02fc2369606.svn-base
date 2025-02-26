jQuery(document).ready(function($) {
    const combobox = document.querySelector('.combobox');
    const input = combobox.querySelector('.combobox-input');
    const list = combobox.querySelector('.combobox-list');
    const searchIcon = combobox.querySelector('.search-icon');
    const items = combobox.querySelectorAll('.combobox-item');
    const selectedFlag = combobox.querySelector('.selected-flag');

    function filterItems(searchText) {
        items.forEach(item => {
            const searchData = item.getAttribute('data-search').toLowerCase();
            if (searchData.includes(searchText.toLowerCase())) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    input.addEventListener('click', () => {
        list.classList.toggle('show');
        if (list.classList.contains('show')) {
            input.removeAttribute('readonly');
            input.classList.add('searching');
            combobox.classList.add('focus');
            searchIcon.classList.add('show');
            input.select();
        } else {
            input.setAttribute('readonly', '');
            input.classList.remove('searching');
            searchIcon.classList.remove('show');
            combobox.classList.remove('focus');
        }
    });

    input.addEventListener('input', () => {
        filterItems(input.value);
    });

    items.forEach(item => {
        item.addEventListener('click', () => {
            const currency = item.getAttribute('data-value');
            const symbol = item.getAttribute('data-symbol');
            const countryCode = item.getAttribute('data-country-code');
            const spinner = document.querySelector('.spinner-container');
            
            input.value = symbol;
            selectedFlag.className = `selected-flag fi fi-${countryCode}`;
            
            list.classList.remove('show');
            input.classList.remove('searching');
            combobox.classList.remove('focus');
            searchIcon.classList.remove('show');
            spinner.style.display='';
            input.setAttribute('readonly', '');

            // Remove 'selected' class from all items
            items.forEach(i => i.classList.remove('selected'));
            // Add 'selected' class to the clicked item
            item.classList.add('selected');

            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'convert_currency',
                    currency: currency,
                    currency_converter_nonce: currencyConverterNonce
                },
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert('Error: Could not convert currency.');
                    }
                }
            });
        });
    });

    document.addEventListener('click', (e) => {
        if (!combobox.contains(e.target)) {
            list.classList.remove('show');
            input.setAttribute('readonly', '');
            input.classList.remove('searching');
            searchIcon.classList.remove('show');
            combobox.classList.remove('focus');
        }
    });

    // Existing code for IP detection and currency suggestion
    // ... (keep the rest of your existing JavaScript code here)
});
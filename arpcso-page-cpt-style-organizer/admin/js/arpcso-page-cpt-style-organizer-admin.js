(function ($) {
	'use strict';

	$(document).ready(function () {
		const table = $('#ar-cpt-ct-table tbody');

		// Add a new row to the table
		$('#ar-add-row').on('click', function () {
			const newRow = `
                <tr>
                    <td><input type="text" name="cpt[]" required></td>
                    <td><input type="text" name="ct[]" required></td>
                    <td><button type="button" class="button ar-remove-row">Remove</button></td>
                </tr>`;
			table.append(newRow);
		});

		// Remove a row from the table
		table.on('click', '.ar-remove-row', function () {
			$(this).closest('tr').remove();
		});

		/*-------------------------------------
		  Meta box behavior for single pages
		-------------------------------------*/

		const groupSelect = document.getElementById('arpcso_page_cpt_ct_group');
		const cptRadio = document.querySelector('input[name="arpcso_page_cpt_ct_type"][value="cpt"]');
		const ctRadio = document.querySelector('input[name="arpcso_page_cpt_ct_type"][value="ct"]');
		const typeSection = document.getElementById('arpcso_page_cpt_ct_type_section');
		const archiveLabel = document.getElementById('archive_label');
		const singleLabel = document.getElementById('single_label');
		const roleSection = document.getElementById('arpcso_page_cpt_ct_role_section');

		const resetButton = $('#ar-reset-button');
		// Retrieve group data from PHP via wp_localize_script
		const groups = arCPTOrganizer.groups;

		// Function to update dynamic labels
		function updateLabels() {
			const selectedIndex = groupSelect.value;

			if (groups[selectedIndex]) {
				const cpt = groups[selectedIndex]['cpt'];
				const ct = groups[selectedIndex]['ct'];

				// Show the first group of radio buttons
				typeSection.style.display = 'block';

				// Update labels for Custom Post Type and Custom Taxonomy
				cptRadio.nextSibling.textContent = ` Custom Post Type (${cpt})`;
				ctRadio.nextSibling.textContent = ` Custom Taxonomy (${ct})`;

				// Update labels for Archive and Single
				if (cptRadio.checked) {
					roleSection.style.display = 'block';
					archiveLabel.innerHTML = `<input type="radio" name="arpcso_page_cpt_ct_role" value="archive" ${archiveLabel.querySelector('input')?.checked ? 'checked' : ''}> Archive of ${cpt}`;
					singleLabel.innerHTML = `<input type="radio" name="arpcso_page_cpt_ct_role" value="single" ${singleLabel.querySelector('input')?.checked ? 'checked' : ''}> Single ${cpt}`;
				} else if (ctRadio.checked) {
					roleSection.style.display = 'block';
					archiveLabel.innerHTML = `<input type="radio" name="arpcso_page_cpt_ct_role" value="archive" ${archiveLabel.querySelector('input')?.checked ? 'checked' : ''}> Archive of ${ct}`;
					singleLabel.innerHTML = `<input type="radio" name="arpcso_page_cpt_ct_role" value="single" ${singleLabel.querySelector('input')?.checked ? 'checked' : ''}> Single ${ct}`;
				} else {
					roleSection.style.display = 'none';
				}
			} else {
				// Reset labels if no group is selected
				typeSection.style.display = 'none';
				roleSection.style.display = 'none';
				cptRadio.nextSibling.textContent = ' Custom Post Type';
				ctRadio.nextSibling.textContent = ' Custom Taxonomy';
				archiveLabel.innerHTML = `<input type="radio" name="arpcso_page_cpt_ct_role" value="archive"> Archive`;
				singleLabel.innerHTML = `<input type="radio" name="arpcso_page_cpt_ct_role" value="single"> Single Element`;
			}
		}

		// Add listeners for change events
		groupSelect.addEventListener('change', updateLabels);
		cptRadio.addEventListener('change', updateLabels);
		ctRadio.addEventListener('change', updateLabels);

		// Initially hide sections
		typeSection.style.display = 'none';
		roleSection.style.display = 'none';

		// Perform the initial update of labels
		updateLabels();

		// Function to reset the select and radio buttons
		resetButton.on('click', function () {
			// Reset the select field
			groupSelect.value = '';

			// Reset radio buttons for type
			cptRadio.checked = false;
			ctRadio.checked = false;

			// Reset radio buttons for role
			archiveLabel.innerHTML = `<input type="radio" name="arpcso_page_cpt_ct_role" value="archive"> Archive`;
			singleLabel.innerHTML = `<input type="radio" name="arpcso_page_cpt_ct_role" value="single"> Single Element`;

			// Hide dynamic sections
			typeSection.style.display = 'none';
			roleSection.style.display = 'none';
		});
	});
})(jQuery);

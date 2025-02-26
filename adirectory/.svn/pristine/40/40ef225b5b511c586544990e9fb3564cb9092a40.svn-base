document.addEventListener('DOMContentLoaded', () => {
	const changeDirImport = document.getElementById('adqs-importer-select-dir');
	const importLoader = document.querySelector('.adqs-full-page-loader');
	const directoryIdInput = document.querySelector('.directory-id-input');
	const csvMappingForm = document.querySelector(
		'.adqs-upload-csv-step.form-mapping'
	);
	const csvInputForm = document.querySelector('.csv_input_field');
	const csvUploadBtn = document.querySelector('.adqs-up-btn');
	const csvFileName = document.querySelector('.uploaded-file-name');
	const importProgress = document.querySelector(
		'.adqs-upload-csv-step.loader-progress'
	);
	const form = document.getElementById('adqs-mapping-form');

	const sample_download_buton_csv = document.getElementById(
		'adqs-samcsv-download'
	);

	let position = 0;
	let imported = 0;
	let failed = 0;
	let attempted = 0;

	if (sample_download_buton_csv) {
		sample_download_buton_csv.addEventListener('click', (e) => {
			e.preventDefault();
			const fileUrl = e.target.dataset.csv;
			const a = document.createElement('a');
			a.href = fileUrl;
			a.download = fileUrl.split('/').pop();
			document.body.appendChild(a);
			a.click();
			document.body.removeChild(a);
		});
	}

	if (csvUploadBtn) {
		csvUploadBtn.addEventListener('click', () => csvInputForm.click());
	}

	if (csvInputForm) {
		csvInputForm.addEventListener('change', (event) => {
			const selectedFile = event.target.files[0];
			if (selectedFile) csvFileName.textContent = selectedFile.name;
		});
	}

	if (changeDirImport) {
		changeDirImport.addEventListener('change', (e) =>
			getAsyncTypeMeta(e.target.value)
		);
	}

	const getAsyncTypeMeta = async (termId) => {
		importLoader.style.display = 'flex';
		const formData = new FormData();
		formData.append('action', 'adqs_get_dir_mapped_to');
		formData.append('security', window.adqs_import.nonce);
		formData.append('termid', Number(termId));
		formData.append(
			'csvpath',
			document.querySelector('.csv_file_inp').value
		);

		try {
			const response = await fetch(window.ajaxurl, {
				method: 'POST',
				body: formData,
			});
			const result = await response.json();
			if (result.success) {
				directoryIdInput.value = termId;
				document.querySelector(
					'.adqs-dropdown-list-wrapper'
				).innerHTML = result.data.mapping_sections;
			} else {
				console.error('Failed to fetch directory mapping:', result);
			}
		} catch (error) {
			console.error('Error fetching directory mapping:', error);
		} finally {
			importLoader.style.display = 'none';
		}
	};

	const uploadImportList = async () => {
		document
			.querySelectorAll('.adqs-step-item')[1]
			.classList.replace('active', 'done');
		document.querySelectorAll('.adqs-step-item')[2].classList.add('active');
		csvMappingForm.style.display = 'none';
		importProgress.style.display = 'block';

		const formData = new FormData(form);
		formData.append('action', 'adqs_upload_import_list');
		formData.append('security', window.adqs_import.nonce);
		formData.append('position', Number(position));
		formData.append('dir_id', Number(directoryIdInput.value));

		try {
			const response = await fetch(window.ajaxurl, {
				method: 'POST',
				body: formData,
			});
			const result = await response.json();

			if (result.success) {
				position = result.data.position;
				imported += result.data.imported;
				failed += result.data.failed;
				attempted = result.data.attempted;

				document.querySelector('.progress-count').textContent =
					`Imported ${imported}/${result.data.total_post}`;
				document.querySelector('.adqs-inner-bar').style.width =
					`${result.data.percent_complete}%`;
				document.querySelector('.adqs-inner-bar').textContent =
					`${result.data.percent_complete}%`;

				if (result.data.complete) {
					importProgress.style.display = 'none';
					document.querySelector(
						'.adqs-upload-csv-step.import-complete-status'
					).style.display = 'block';
					document.querySelector(
						'.adqs-importer-status'
					).textContent =
						`${imported} listings imported.${failed} listings failed to import.`;
					document
						.querySelectorAll('.adqs-step-item')[2]
						.classList.replace('active', 'done');
					document
						.querySelectorAll('.adqs-step-item')[3]
						.classList.add('active');
					return;
				}
				uploadImportList();
			} else {
				console.error('Error in response:', result);
			}
		} catch (error) {
			console.error('Error uploading import list:', error);
		}
	};

	if (form) {
		form.addEventListener('submit', (event) => {
			event.preventDefault();
			uploadImportList();
		});
	}
});

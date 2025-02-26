function checkStatus(api_url, api_token) {
    if (!window.omIsFetching) return;

    fetch(api_url, {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${api_token}`,
            'Content-Type': 'application/json'
        }
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            updateTable(data);
        })
        .catch(error => {
            console.error('Error check status:', error);
        });
}

function updateTable(data) {
    const links = data['documents'];
    const tableBody = document.querySelector('#linksTable tbody');
    const chCnt = document.getElementById('chCnt');
    const lnkCnt = document.getElementById('lnkCnt');
    const mainStatus = document.getElementById('mainStatus');
    const finButton = document.getElementById('finButton');
    chCnt.textContent = data['embedding_count'];
    lnkCnt.textContent = data['link_count'];
    tableBody.innerHTML = '';
    if (data['source_status'] === 'trained') {
        window.omIsFetching = false;
        mainStatus.innerHTML = `<div class="text-green-300">
                     <svg class="w-5 h-5 text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                          <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                        </svg></div><div class="font-medium">Trained</div>`;
        finButton.innerHTML = `<a href="/wp-admin/admin.php?page=ordemio-settings&state=setting" class="block text-white bg-blue-700 hover:bg-blue-800 hover:text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">Finish</a>`;
    }

    links.forEach(link => {
        const row = document.createElement('tr');
        const nameCell = document.createElement('th');
        const characterCell = document.createElement('td');
        const statusCell = document.createElement('td');

        row.classList.add('bg-white');
        nameCell.innerHTML = `<div class="whitespace-nowrap overflow-hidden" style="max-width: 200px;text-overflow: ellipsis;"><a href="${link.url}"  target="_blank" class="text-blue-600 underline">${link.url}</a></div>`;
        nameCell.classList.add('px-6');
        nameCell.classList.add('py-4');
        nameCell.classList.add('font-medium');
        nameCell.classList.add('text-gray-500');
        characterCell.classList.add('px-6');
        characterCell.classList.add('py-4');
        if (link.status === 'trained') {
            characterCell.textContent = link.size;
            statusCell.innerHTML = `<span class="bg-green-100 text-green-600 text-xs font-medium inline-flex items-center px-3 py-1.5 rounded">
                    <svg class="w-4 h-4 inline-block mr-1 text-green-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                    </svg>Trained</span>`;
        } else {
            characterCell.textContent = '--';
            statusCell.innerHTML = `<span class="bg-gray-100 text-gray-600 text-xs font-medium inline-flex items-center px-3 py-1.5 rounded">Training...</span>`;
        }
        statusCell.classList.add('px-5');
        statusCell.classList.add('py-4');
        row.appendChild(nameCell);
        row.appendChild(characterCell);
        row.appendChild(statusCell);
        tableBody.appendChild(row);
    });
}

function changeToggle() {
    const form = document.getElementById('changeToggle')
    form.submit();
}
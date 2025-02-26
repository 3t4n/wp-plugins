const formData = new FormData()
formData.append('action', 'adenergizer-dismiss-review-notice')
formData.append('_ajax_nonce', adenergizerSettings.nonce)

const reviewNotice = document.querySelector('.notice.plugin-review-notice')

reviewNotice.querySelectorAll('.dismiss-button').forEach(el => {
    el.addEventListener('click', async (e) => {
        const res = await fetch(window.ajaxurl, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
            },
            body: formData,
        })
        const json = await res.json()
        if (json.success && reviewNotice) {
            reviewNotice.style.display = 'none'
        }
    })
})
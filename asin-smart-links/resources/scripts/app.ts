import Alpine from 'alpinejs'
import QRCode from 'qrcode'

// Load Events
window.addEventListener('DOMContentLoaded', () => {
    window.QRCode = QRCode
    window.Alpine = Alpine
    Alpine.data('asinData', (redirect_url) => ({
        asin: '',
        show_link: false,
     
        get_link: {
            ['@click']() {
                QRCode.toCanvas(document.getElementById('canvas'), redirect_url + this.asin)
                .then(url => {
                    this.show_link = true;
                })
                .catch(err => {
                    console.error(err)
                })
            },
        },
    }))
    Alpine.start()
});
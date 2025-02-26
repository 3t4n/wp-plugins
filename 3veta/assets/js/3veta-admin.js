/**
 * @var {object} veta_l10n
 * @property {string} clipboard_success
 * @property {string} clipboard_failed
 * @property {string} missing_domain
 * @property {string} empty_domain
 * @property {string} ajax_url
 */

document.addEventListener('DOMContentLoaded', function () {
  document.getElementById('veta-domain-save').addEventListener('click', saveDomain);
  document.getElementById('table-copy-inline-shortcode').addEventListener('click', copyInlineShortcode);
  document.getElementById('table-copy-full-page-shortcode').addEventListener('click', copyFullShortcode);
  document.getElementById('boxed-copy-inline-shortcode').addEventListener('click', copyInlineShortcode);
  document.getElementById('boxed-copy-full-page-shortcode').addEventListener('click', copyFullShortcode);
  document.getElementById('table-inline-height').addEventListener('change', changeInlineShortcode);
  document.getElementById('table-inline-width').addEventListener('change', changeInlineShortcode);
  document.getElementById('boxed-inline-height').addEventListener('change', changeInlineShortcode);
  document.getElementById('boxed-inline-width').addEventListener('change', changeInlineShortcode);

  function changeInlineShortcode(event) {
    let width = '';
    let height = '';

    // check which was the active field (was it the desktop version or the mobile one)
    if (event.target.dataset.type === 'mobile') {
      width = document.getElementById('boxed-inline-width').value + 'px';
      height = document.getElementById('boxed-inline-height').value + 'px';
    } else {
      width = document.getElementById('table-inline-width').value + 'px';
      height = document.getElementById('table-inline-height').value + 'px';
    }

    // build new shortcode with the width and height
    let text = "[3veta type='inline' width='%W%' height='%H%']";
    text = text.replace('%W%', width);
    text = text.replace('%H%', height);

    // update the value of the input field for inline shortcode
    document.querySelectorAll('.inline-shortcode-field').forEach(function (element) {
      element.value = text;
    });
  }


  function copyInlineShortcode(event) {
    if (document.getElementById('veta-domain').value === '') {
      showSnackbarMessage(veta_l10n.missing_domain);
      return;
    }
    let inlineShortCode = 'desktop-inline-shortcode';
    if (event.target.dataset.type === 'mobile') {
      inlineShortCode = 'mobile-inline-shortcode';
    }
    const shortcode = document.getElementById(inlineShortCode).value;
    navigator.clipboard.writeText(shortcode).then(function () {
      showSnackbarMessage(veta_l10n.clipboard_success);
    }, function (err) {
      console.error('Async: Could not copy text: ', err);
      showSnackbarMessage(veta_l10n.clipboard_failed);
    });
  }

  function copyFullShortcode() {
    const shortcode = '[3veta type="full"]';
    navigator.clipboard.writeText(shortcode).then(function () {
      showSnackbarMessage(veta_l10n.clipboard_success);
    }, function (err) {
      console.error('Async: Could not copy text: ', err);
      showSnackbarMessage(veta_l10n.clipboard_failed);
    });
  }

  function saveDomain(event) {
    const domainName = document.getElementById('veta-domain');
    clearErrorMessage();
    if (domainName.value === '') {
      showErrorMessage(veta_l10n.empty_domain);
      return;
    }

    changeStatusAjaxButton(true);

    let bookingPage = domainName.value;
    if (bookingPage.indexOf('http') === -1) {
      bookingPage = 'https://' + bookingPage;
      domainName.value = bookingPage;
    }

    const data = {
      action: 'veta_save_booking_page',
      url: bookingPage,
      security: document.getElementById('_nonce').value
    }
    sendAjaxCall(data)
  }

  function sendAjaxCall(data) {
    jQuery.ajax({
      url: veta_l10n.ajax_url,
      type: 'POST',
      dataType: 'JSON',
      data: data,
      success: function (response) {
        if (response.status === 1) {
          showSnackbarMessage(response.message);
        } else {
          showErrorMessage(response.message);
        }
        changeStatusAjaxButton(false);
      },
      error: function (xhr, status, error) {
        showErrorMessage(error);
        changeStatusAjaxButton(false);
      }
    });
  }

  function changeStatusAjaxButton(isActive) {
    const button = document.getElementById('veta-domain-save')
    if (isActive) {
      button.classList.add('active');
      button.disabled = true;
    } else {
      button.classList.remove('active');
      button.disabled = false;
    }
  }

  function showErrorMessage(message) {
    const domainName = document.getElementById('veta-domain');
    const errorMessage = document.querySelector('.error-message');
    errorMessage.innerHTML = message
    domainName.style.borderColor = '#FF4848';
  }

  function clearErrorMessage() {
    const domainName = document.getElementById('veta-domain');
    const errorMessage = document.querySelector('.error-message');
    errorMessage.innerHTML = ''
    domainName.style.borderColor = '#4D4D4D';
  }

  function showSnackbarMessage(message) {
    const snackbar = document.querySelector('.snackbar-message');
    snackbar.innerHTML = message;
    snackbar.classList.add('fade-in-snackbar');
    setTimeout(function () {
      snackbar.classList.remove('fade-in-snackbar');
    }, 2000);

  }

})

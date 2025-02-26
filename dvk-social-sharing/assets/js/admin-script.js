(function() {
  var form = document.getElementById('dvkss_settings');

  function toggleIconSizeRow () {
    var value = form.elements.namedItem('dvk_social_sharing[load_icon_css]').value;
    form.querySelector('.row-icon-size').style.display = value === '1' ? '' : 'none';
  }

  form.addEventListener('change', toggleIconSizeRow);
  toggleIconSizeRow();
})();

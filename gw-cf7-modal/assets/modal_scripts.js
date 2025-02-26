
function setModalMaxHeight(element) {


  this.jQueryelement     = jQuery(element);
  this.jQuerycontent     = this.jQueryelement.find('.modal-content');
  var borderWidth   = this.jQuerycontent.outerHeight() - this.jQuerycontent.innerHeight();
  var dialogMargin  = jQuery(window).width() < 768 ? 20 : 60;
  var contentHeight = jQuery(window).height() - (dialogMargin + borderWidth);
  var headerHeight  = this.jQueryelement.find('.modal-header').outerHeight() || 0;
  var footerHeight  = this.jQueryelement.find('.modal-footer').outerHeight() || 0;
  var maxHeight     = contentHeight - (headerHeight + footerHeight);

  this.jQuerycontent.css({
      'overflow': 'hidden'
  });

  this.jQueryelement
    .find('.modal-body').css({
      'max-height': maxHeight,
      'overflow-y': 'auto'
  });
}

jQuery('.modal').on('show.bs.modal', function() {
  jQuery(this).show();
  setModalMaxHeight(this);
});

jQuery(window).resize(function() {
  if (jQuery('.modal.in').length != 0) {
    setModalMaxHeight(jQuery('.modal.in'));
  }
});

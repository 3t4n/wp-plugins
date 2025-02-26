// Uploading files
var file_frame;

(function($) {


  // Add remove buttons
  $('#documents_product_data .documents-tab-woocommerce-documents')
    .on('documents-tab-woocommerce-updated', function() {

      $('tbody tr', this)
        .not('.documents-tab-woocommerce-row-processed').each(function() {

          var btn = $('<a class="remove" href="#" />')
            .bind('click', function(event) {
              event.preventDefault();
              if (!confirm(documentsTabWooCommerceL10N.removeConfirmText)) {
                return;
              }
              $(this).closest('tr').remove();
            })
            .text(documentsTabWooCommerceL10N.remove);

          $(this)
            .addClass('documents-tab-woocommerce-row-processed')
            .find('td:last-child')
            .append(btn);
        });

      $(this).children('tbody').sortable('refresh');

    })
    .children('tbody')
      .sortable({
        axis: 'y',
        helper: 'original',
        handle: 'img',

      })
      .disableSelection()
    .parent()
      .trigger('documents-tab-woocommerce-updated');

  // Add add button
  $('#documents_product_data .documents-tab-woocommerce-add-button')
    .on('click', function(event) {

      event.preventDefault();

      // If the media frame already exists, reopen it.
      if ( file_frame ) {
        file_frame.open();
        return;
      }

      // Create the media frame.
      file_frame = wp.media.frames.downloadable_file = wp.media({
        frame: 'select',
        title: documentsTabWooCommerceL10N.title,
        button: {
          text: documentsTabWooCommerceL10N.button
        },
        multiple: true
      });

      // When an image is selected, run a callback.
      file_frame.on('select', function() {
        var attachments = file_frame.state().get('selection');
        attachments.map(function(attachment) {
          attachment = attachment.toJSON();

          var $itemDOM = $('<tr />');

          var $firstTD = $('<td />');

          $('<img />')
            .attr('src', attachment.icon)
            .addClass('attachment-32x32')
            .appendTo($firstTD);

          $('<input type="hidden" name="documents_tab_woocommerce[documents][]" />')
            .val(attachment.id)
            .attr('placeholder', attachment.title)
            .appendTo($firstTD);

          $firstTD.appendTo($itemDOM);

          $('<td />')
            .text(attachment.caption ? attachment.caption : attachment.title)
            .appendTo($itemDOM);

          $('<td />')
            .text(attachment.mime)
            .appendTo($itemDOM);

          $('<td />')
            .text(attachment.filesizeHumanReadable)
            .appendTo($itemDOM);

          $('<a />')
            .attr('href', attachment.editLink)
            .attr('target', '_blank')
            .text(documentsTabWooCommerceL10N.edit)
            .appendTo($itemDOM)
            .wrap('<td />');

          $('#documents_product_data .documents-tab-woocommerce-documents')
            .append($itemDOM)
            .trigger('documents-tab-woocommerce-updated');

        });
      });

      // Finally, open the modal.
      file_frame.open();
    });

}(jQuery));

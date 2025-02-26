  var eventBound = false;
  var catIdBound = false;

  function isInt(value) {
    if (isNaN(value)) {
      return false;
    }
    var x = parseFloat(value);
    return (x | 0) === x;
  }

  jQuery(document).ready( function() {

    jQuery('#osd-ebay-listings').html('');
    jQuery('#feedOptions').validate();
    // jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery('.add-button').on('click', function() {
      location.href = jQuery(this).attr('data-href');
    });

    jQuery('.edit-button').on('click', function() {
      location.href = jQuery(this).attr('data-href');
    });

    jQuery('.delete-button').on('click', function() {
      location.href = jQuery(this).attr('data-href');
    });

    jQuery('.confirm-remove-button').on('click', function() {
      feedId = jQuery(this).attr('data-feed-id');
      location.href = 'admin.php?page=auction-feed-plugin-delete-feed&id=' + feedId + '&confirm=true';
    });

    jQuery('.cancel-remove-button').on('click', function() {
      location.href = 'admin.php?page=auction-feed-plugin';
    });
      


    jQuery('.update-btn').on('click', function() {
      sellerId         = jQuery('#sellerId').val();
      sellerIdConfim   = jQuery('#sellerId-confim').val();
      borderColour     = jQuery('#borderColour').val().replace('#','');
      backgroundColour = jQuery('#backgroundColour').val().replace('#','');
      textColour       = jQuery('#textColour').val().replace('#','');
      website          = jQuery('#website').val();

      itemsPerPage   = jQuery('#itemsPerPage').val();
      if ( itemsPerPage == '' || !isInt(itemsPerPage) ) {
        itemsPerPage = 6;
      }

      page   = jQuery('#page').val();
      if ( page == '' || !isInt(page) ) {
        page = 1;
      }

      categoryId   = jQuery('#categoryId').val();
      if (categoryId == '') {
        categoryId = 0;
      }

      keywords   = jQuery('#keywords').val();
      if (keywords == '') {
        keywords = 0;
      }

      theme    = jQuery('#theme').children('option:selected').val();
      language = jQuery('#language').children('option:selected').val();

      marketplaceId = jQuery('#marketplaceId').children('option:selected').val();
      if ( marketplaceId == '' || !isInt(marketplaceId) ) {
        marketplaceId = 3;
      }

      sortOrder = jQuery('#sortOrder').children('option:selected').val();
      if (sortOrder == '') {
        sortOrder = 'EndTimeSoonest';
      }

      listingType = jQuery('#listingType').children('option:selected').val();
      if (listingType == '') {
        listingType = 'All';
      }

      showCategories    = jQuery('#showCategories').prop('checked') ? 1 : 0;
      showSearchBox     = jQuery('#showSearchBox').prop('checked') ? 1 : 0;
      showMultiplePages = jQuery('#showMultiplePages').prop('checked') ? 1 : 0;
      showLogo          = jQuery('#showLogo').prop('checked') ? 1 : 0;
      linksInNewTab     = jQuery('#linksInNewTab').prop('checked') ? 1 : 0;
      showBorder        = jQuery('#showBorder').prop('checked') ? 1 : 0;

      if (sellerId != '') {
        link =  '/v1/' + sellerId + '/' + marketplaceId + '/' + theme + '/' + language + '/' + itemsPerPage + '/' + showCategories + '/' + showSearchBox + '/' + showMultiplePages + '/' + sortOrder + '/' + showLogo + '/' + linksInNewTab + '/' + listingType + '/' + keywords + '/' + categoryId + '/' + showBorder + '/' + borderColour + '/' + backgroundColour + '/' + textColour + '/' + page + '/'  + website + '/';

        jQuery.ajax({
          url:      'https://www.auctionfeedonyourwebsite.co.uk/wordpress' + link,
          methond:  'POST',
          dataType: 'html',
          success:  function(data) {
            jQuery('#osd-ebay-listings').html(data);
            if (!catIdBound) {
              jQuery('#categoryId').on('click', function() {
                jQuery.ajax({
                  url:      'https://www.auctionfeedonyourwebsite.co.uk/categories' + link,
                  dataType: 'html',
                  success:  function(data) {
                    jQuery('#category-ids-dropdown ul.row').html(data);
                    jQuery('#category-ids-dropdown').slideDown();
                    jQuery('#category-ids-dropdown input[type="checkbox"]').on('click', function() {
                      if (jQuery('#category-ids-dropdown input[type="checkbox"]:checked').length > 3) {
                        jQuery(this).prop('checked', false);
                        jQuery('.category-id-container .alert-container').html('<div class="alert alert-warning">Only three categories can be choosen</div>');
                        setTimeout(function() { jQuery('.category-id-container .alert-container').html(''); }, 5000);
                      }
                      else {
                        catIds      = '';
                        jQuery('#category-ids-dropdown input[type="checkbox"]:checked').each( function() {
                          if (catIds != '') {
                            catIds += ':';
                          }
                          catIds   += jQuery(this).val();
                        });
                        jQuery('#categoryId').val(catIds);
                      }
                    });
                  }
                });
              });
              catIdBound = true;
            }
            eventBound = true;
          }
        });
      }
    });
  });
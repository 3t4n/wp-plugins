  // displayResults('<style>.osd-loading-spinner-container { text-align: center; margin-top: 100px; margin-bottom: 100px; } .osd-loading-spinner-container .osd-loading-spinner { height: 120px; width: 120px; }</style><div class="osd-loading-spinner-container"><img src="https://auctionfeedonyourwebsite.co.uk/images/loading-spinner.gif" class="osd-loading-spinner"></div>');

document.addEventListener("DOMContentLoaded", function() {

  document.addEventListener('click', function (event)  {
    if ( event.target.matches('.call-ajax') ) {
      endpoint     = event.target.getAttribute('data-ajax-endpoint');
      fireAjax( endpoint, createPostVariables() );
    }
    if ( event.target.matches('.search-button') ) {
      endpoint     = event.target.getAttribute('data-ajax-endpoint');
      fireAjax( endpoint, createPostVariables() );

    }
    if ( event.target.matches('.reset-button') ) {
      endpoint   = event.target.getAttribute('data-ajax-endpoint');
      postValue  = '';
      fireAjax(endpoint, postValue);
    }
  }, false);

  document.addEventListener('change', function (event)  {
    if ( event.target.matches('#osd-category') ) {
      endpoint     = event.target.getAttribute('data-ajax-endpoint');
      fireAjax( endpoint, createPostVariables() );
    }
  }, false);

});

  function fireAjax(url, postValue) {
    displayResults('<style>.osd-loading-spinner-container { text-align: center; margin-top: 100px; margin-bottom: 100px; } .osd-loading-spinner-container .osd-loading-spinner { height: 120px; width: 120px; }</style><div class="osd-loading-spinner-container"><img src="https://auctionfeedonyourwebsite.co.uk/images/loading-spinner.gif" class="osd-loading-spinner"></div>');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(postValue);

    xhr.onreadystatechange = function () {
      var DONE = 4;
      var OK = 200;
      if (xhr.readyState === DONE) {
        if (xhr.status === OK) {
          displayResults(xhr.responseText)
        } else {
          console.log('Error: ' + xhr.status); // An error occurred during the request.
        }
      }
    }
  }


  function displayResults(htmlData) {
    console.log(htmlData);
    document.getElementById('osd-ebay-listings').innerHTML = htmlData;
  }

  function createPostVariables() {
    catElement   = document.getElementById('osd-category');
    postValue    = '';
    if (document.getElementById('osd-searchTerm') !== null) {
      postValue += 'searchTerm=' + encodeURIComponent( document.getElementById('osd-searchTerm').value.trim() );
    }
    if (document.getElementById('osd-category') !== null) {
      postValue += '&category=' + encodeURIComponent(catElement.options[catElement.selectedIndex].value) + '&categoryName=' + encodeURIComponent( catElement.options[catElement.selectedIndex].text.trim() );
    }
    console.log('postValue = ' + postValue);
    return postValue;
  }
/* global history, History */
if (typeof History !== 'undefined') {
  History.prototype.$pushState = History.prototype.pushState
  History.prototype.pushState = function () {}
  History.prototype.$replaceState = History.prototype.replaceState
  History.prototype.replaceState = function () {}

  document.addEventListener('click', function (event) {
    if (event.target && event.target.classList.contains('editor-post-publish-button')) {
      var postID = document.querySelector('#post_ID')
      if (postID) {
        history.$pushState({}, '', 'post.php?post=' + postID.value + '&action=edit')
      }
    }
  }, true)
}

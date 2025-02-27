;(function ($) {
  // Cookie Things

  let $noticeTTL = 30 // for 30 days.

  function usaVcLiteSetCookie(name, value, days) {
    var expires = ""
    if (days) {
      var date = new Date()
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000)
      expires = "; expires=" + date.toUTCString()
    }
    document.cookie = name + "=" + value + expires + "; path=/"
  }

  function usaVcLiteGetCookie(name) {
    var nameEQ = name + "="
    var cookies = document.cookie.split(";")
    for (var i = 0; i < cookies.length; i++) {
      var cookie = cookies[i]
      while (cookie.charAt(0) === " ") {
        cookie = cookie.substring(1, cookie.length)
      }
      if (cookie.indexOf(nameEQ) === 0) {
        return cookie.substring(nameEQ.length, cookie.length)
      }
    }
    return null
  }

  function usaVcLiteRemoveCookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
  }

  // usaVcLiteRemoveCookie("usa_vc_upgrade_status")

  if ($(".usa_vc_lite_remove_notice").length > 0) {
    $(".usa_vc_lite_remove_notice").each(function () {
      let $this = $(this)
      let $noticeStatusKey = $this.data("key")
      let $bnmLicenseStatus = usaVcLiteGetCookie($noticeStatusKey)

      if ($bnmLicenseStatus == null) {
        $this.closest(".notice").fadeIn()
      }

      // Click Event.

      $this.on("click", function () {
        $(this)
          .closest(".notice")
          .slideUp("slow", function () {
            usaVcLiteSetCookie($noticeStatusKey, 1, $noticeTTL)
            setTimeout(() => {
              $(this).remove()
            }, 3000)
          })
      })
    })
  }
})(jQuery)

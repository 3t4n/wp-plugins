jQuery(document).ready(function($) {
  $("#ghl_form_id").on("change", function () {
    var form_id = $(this).val(); // Get the selected form ID
    if (form_id) {
      $.ajax({
        url: ghl_form_data.ajaxurl,
        type: "POST",
        data: {
          action: "ghl_check_form_data",
          form_id: form_id,
        },
        beforeSend: function () {
          $(".ghl-form").addClass("loading");
        },
        success: function (response) {
          if (response.data.success === true) {
            console.log(response.data.api_key);
            console.log(response.data.tags);
            console.log(response.data.sub_api);
            // Update the value of the input fields
            $('input[name="apikey"]').val(response.data.api_key);
            $('input[name="tags"]').val(response.data.tags);

            document.getElementById("selected-location-id").value =
              response.data.sub_api;

            // Show the form data section
            $(".ghl-form-data").css("display", "block");
            $(".ghl-form-data").css({
              height: "auto",
              transition: "height 0.3s ease-in-out",
            });

            if (
              response.data.api_key &&
              response.data.tags &&
              response.data.sub_api
            ) {
              $(".dis-test").css("display", "block");
            } else {
              $(".dis-test").css("display", "none");
            }
            if (response.data.api_key && response.data.sub_api) {
              $(".dis-test").css("display", "block");
            }
          } else {
            // Hide the form data section
            $(".ghl-form-data").css("display", "none");
          }
        },
        error: function (error) {
          alert(error);
        },
        complete: function () {
          $(".ghl-form").removeClass("loading");
        },
      });
    } else {
      // Hide the form data section if no form is selected
      $(".ghl-form-data").css("display", "none");
    }
  });

  // Your existing code for FAQ questions toggle and notification handling
  let questions = document.querySelectorAll(".faq_question");

  questions.forEach((question) => {
    let icon = question.querySelector(".icon-shape");

    question.addEventListener("click", (event) => {
      const active = document.querySelector(".faq_question.active");
      const activeIcon = document.querySelector(".icon-shape.active");

      if (active && active !== question) {
        active.classList.toggle("active");
        activeIcon.classList.toggle("active");
        active.nextElementSibling.style.maxHeight = 0;
      }

      question.classList.toggle("active");
      icon.classList.toggle("active");

      const answer = question.nextElementSibling;

      if (question.classList.contains("active")) {
        answer.style.maxHeight = answer.scrollHeight + "px";
      } else {
        answer.style.maxHeight = 0;
      }
    });
  });

  $("#openToast").toggleClass("hide view");

  $("a.exit--toast").click(function () {
    $("#openToast").fadeOut(1000, 0);
  });

  $(document).on("click", function (e) {
    if ($(e.target).closest(".notification--reminder").length === 0) {
      $("#openToast").fadeOut(1000, 0);
    }
  });

  $("#location-table").DataTable();
 
});


	document.addEventListener("DOMContentLoaded", function () {
    var nameFieldsContainer = document.getElementById("name-fields-container");
    var addNameFieldButton = document.getElementById("add-name-field");

    addNameFieldButton.addEventListener("click", function () {
      var existingFields = Array.from(
        document.querySelectorAll('select[name="name-field-types[]"]')
      ).map(function (select) {
        return select.value;
      });

      var newFieldWrapper = document.createElement("div");
      newFieldWrapper.className = "name-field-wrapper";
      newFieldWrapper.innerHTML = `
            <select name="name-field-types[]">
                <option value="first_name" ${
                  existingFields.includes("first_name") ? "disabled" : ""
                }>First Name</option>
                <option value="last_name" ${
                  existingFields.includes("last_name") ? "disabled" : ""
                }>Last Name</option>
                <option value="middle_name" ${
                  existingFields.includes("middle_name") ? "disabled" : ""
                }>Middle Name</option>
                <option value="prefix" ${
                  existingFields.includes("prefix") ? "disabled" : ""
                }>Prefix</option>
                <option value="suffix" ${
                  existingFields.includes("suffix") ? "disabled" : ""
                }>Suffix</option>
            </select>
            <input type="text" name="name-field-values[]">
            <button type="button" class="remove-name-field">Remove</button>
        `;
      nameFieldsContainer.insertBefore(newFieldWrapper, addNameFieldButton);
    });

    nameFieldsContainer.addEventListener("click", function (event) {
      if (event.target.classList.contains("remove-name-field")) {
        var fieldWrapper = event.target.closest(".name-field-wrapper");
        fieldWrapper.remove();
      }
    });

    nameFieldsContainer.addEventListener("change", function (event) {
      if (event.target.name === "name-field-types[]") {
        var selectedValue = event.target.value;
        var selects = document.querySelectorAll(
          'select[name="name-field-types[]"]'
        );
        selects.forEach(function (select) {
          if (select !== event.target) {
            var option = select.querySelector(
              `option[value="${selectedValue}"]`
            );
            if (option) {
              option.disabled = true;
            }
          }
        });
      }
    });
  });

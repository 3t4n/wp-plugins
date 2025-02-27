jQuery(function ($) {
    function evaluateCondition(condition, formData) {
      const fieldValue = formData[condition.field] || '';
      const valueToCompare = condition.value;
  
      switch (condition.operator) {
        case 'equals':
          return fieldValue === valueToCompare;
        case 'not_equals':
          return fieldValue !== valueToCompare;
        case 'contains':
          return fieldValue.includes(valueToCompare);
        case 'does_not_contain':
          return !fieldValue.includes(valueToCompare);
        case 'starts_with':
          return fieldValue.startsWith(valueToCompare);
        case 'ends_with':
          return fieldValue.endsWith(valueToCompare);
        case 'is_empty':
          return fieldValue === '';
        case 'is_filled':
          return fieldValue !== '';
        default:
          return false;
      }
    }


    function evaluateLogicGroup(logicGroup, formData) {
        if (!Array.isArray(logicGroup.conditions)) {
            // console.error('logicGroup.conditions is not an array:', logicGroup.conditions);
            return false; // Stop evaluation if structure is invalid
        }
    
        return logicGroup.conditions.every((conditionGroup) => {
            // Handle single condition (object) directly
            if (!Array.isArray(conditionGroup)) {
                if (typeof conditionGroup === 'object' && conditionGroup !== null) {
                    // Evaluate the single condition
                    return evaluateCondition(conditionGroup, formData);
                } else {
                    // console.error('Invalid conditionGroup type, expected array or object, but got:', conditionGroup);
                    return false;
                }
            }
    
            // Handle condition groups (arrays)
            return conditionGroup.reduce((result, condition) => {
                const conditionResult = evaluateCondition(condition, formData);
    
                if (condition.combination === 'and') {
                    return result && conditionResult;
                } else if (condition.combination === 'or') {
                    return result || conditionResult;
                } else {
                    // console.warn('Unknown combination type, defaulting to last condition result:', condition.combination);
                    return conditionResult;
                }
            }, true); // Initialize with `true` to handle 'and' logic correctly
        });
    }
    
    
      
      
  
    function applyLogic(logicGroups, formData) {
      logicGroups.forEach((logicGroup) => {
        //   console.log(logicGroup);
        const shouldApply = evaluateLogicGroup(logicGroup, formData);
  
        logicGroup.hidden_fields.forEach((fieldId) => {
          if (shouldApply) {
            $(`#${fieldId}`).hide();
          } else {
            $(`#${fieldId}`).show();
          }
        });
      });
    }
  
    // Monitor form interactions
    // Function to collect form data and apply logic
    function processForm() {
      const formData = {};

      // Collect form data
      $('.primary-input').each(function () {
        const fieldId = $(this).attr('name');
        const value = $(this).val();
        formData[fieldId] = value;
      });
      // Apply logic dynamically
      var mainformid = $('.myallinone-vform').attr('data-id');
      const formLogicGroups = logicData.logicGroups.filter(
        (group) => group.form_id === mainformid
      );
      console.log(formLogicGroups);
      applyLogic(formLogicGroups, formData);
      // applyLogic(logicData.logicGroups, formData);
    }

    // Apply logic on input/change and on page load
    $(document).on('input change', '.primary-input', processForm);

    // Trigger on page load
    $(document).ready(function () {
      processForm();
    });


    

  });
  
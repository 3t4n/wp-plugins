// Admin settings local business schema multistep form

// Identify previous and next button
const btn_lb_form_previous = document.getElementById('es_local_form_before_button');
const btn_lb_form_next = document.getElementById('es_local_form_after_button');

// Identify each step in form
const es_lb_form_step_one = document.getElementById('es_local_business_step_one');
const es_lb_form_step_two = document.getElementById('es_local_business_step_two');
const es_lb_form_step_three = document.getElementById('es_local_business_step_three');
const es_lb_form_step_four = document.getElementById('es_local_business_step_four');
const es_lb_form_step_five = document.getElementById('es_local_business_step_five');

// Identify each step
const es_lb_form_marker_one = document.getElementById('es_local_progress_step_one');
const es_lb_form_marker_two = document.getElementById('es_local_progress_step_two');
const es_lb_form_marker_three = document.getElementById('es_local_progress_step_three');
const es_lb_form_marker_four = document.getElementById('es_local_progress_step_four');
const es_lb_form_marker_five = document.getElementById('es_local_progress_step_five');

// Handle when user clicks next
btn_lb_form_next.addEventListener('click', function handleClick() {
    
  if (es_lb_form_step_one.style.display === 'block') {
      
    // If currently on step 1 -> show step 2
    es_lb_form_step_one.style.display = 'none';
    es_lb_form_step_two.style.display = 'block';
    
    // Bring color to prev button to show functionality activated
    btn_lb_form_previous.style.background = '#112e76';
    
    // Step 2 marker becomes active
    es_lb_form_marker_two.className= 'active';
    

  } else if (es_lb_form_step_two.style.display === 'block') {
      
    // If currently on step 2 -> show step 3
    es_lb_form_step_two.style.display = 'none';
    es_lb_form_step_three.style.display = 'block';
    
    // Step 3 marker becomes active
    es_lb_form_marker_three.className= 'active';
    
  } else if (es_lb_form_step_three.style.display === 'block') {
      
    // If currently on step 3 -> show step 4
    es_lb_form_step_three.style.display = 'none';
    es_lb_form_step_four.style.display = 'block';
    
    // Step 4 marker becomes active
    es_lb_form_marker_four.className= 'active';
    
  } else if (es_lb_form_step_four.style.display === 'block') {
      
    // If currently on step 4 -> show step 5
    es_lb_form_step_four.style.display = 'none';
    es_lb_form_step_five.style.display = 'block';
    
    // Grey out button for last step confirmation
    btn_lb_form_next.style.background = '#d4d7d5';
    
    // Step 4 marker becomes active
    es_lb_form_marker_five.className= 'active';
    
  }
  
});

// Handle when user clicks previous
btn_lb_form_previous.addEventListener('click', function handleClick() {
    
  if (es_lb_form_step_two.style.display === 'block') {
      
    // If currently on step 2 -> show step 1
    es_lb_form_step_two.style.display = 'none';
    es_lb_form_step_one.style.display = 'block';
    
    // Grey out button for back to first step confirmation
    btn_lb_form_previous.style.background = '#d4d7d5';
    
    // Step 2 marker becomes none
    es_lb_form_marker_two.className= 'inactive';
    
    // Step 1 marker becomes active
    es_lb_form_marker_one.className= 'active';
    

  } else if (es_lb_form_step_three.style.display === 'block') {
      
    // If currently on step 3 -> show step 2
    es_lb_form_step_three.style.display = 'none';
    es_lb_form_step_two.style.display = 'block';
    
    // Step 3 marker becomes none
    es_lb_form_marker_three.className= 'inactive';
    
    // Step 2 marker becomes active
    es_lb_form_marker_two.className= 'active';
    
  } else if (es_lb_form_step_four.style.display === 'block') {
      
    // If currently on step 4 -> show step 3
    es_lb_form_step_four.style.display = 'none';
    es_lb_form_step_three.style.display = 'block';

    
    // Step 4 marker becomes none
    es_lb_form_marker_four.className= 'inactive';
    
    // Step 3 marker becomes active
    es_lb_form_marker_three.className= 'active';

  } else if (es_lb_form_step_five.style.display === 'block') {
      
    // If currently on step 5 -> show step 4
    es_lb_form_step_five.style.display = 'none';
    es_lb_form_step_four.style.display = 'block';
    
    // Bring color back to next button
    btn_lb_form_next.style.background = '#112e76';
    
    // Step 5 marker becomes none
    es_lb_form_marker_five.className= 'inactive';
    
    // Step 4 marker becomes active
    es_lb_form_marker_four.className= 'active';

  }
  
});
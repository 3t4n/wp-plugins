// Post -> monitor if schema is activated and reflect in the post settings getting started

// Identify each activated icon on dash home
const schema_status_article_icon = document.getElementById('schema_status_article_icon');
const schema_status_recipe_icon = document.getElementById('schema_status_recipe_icon');
const schema_status_video_icon = document.getElementById('schema_status_video_icon');
const schema_status_software_icon = document.getElementById('schema_status_software_icon');
const schema_status_events_icon = document.getElementById('schema_status_events_icon');
const schema_status_job_icon = document.getElementById('schema_status_job_icon');
const schema_status_person_icon = document.getElementById('schema_status_person_icon');
const schema_status_course_icon = document.getElementById('schema_status_course_icon');

// Identify each checkbox 
const schema_status_article_checkbox = document.getElementById('essdrs_article_active');
const schema_status_recipe_checkbox = document.getElementById('essdrs_recipe_active');
const schema_status_video_checkbox = document.getElementById('essdrs_video_active');
const schema_status_software_checkbox = document.getElementById('essdrs_software_app_active');
const schema_status_events_checkbox = document.getElementById('essdrs_events_active');
const schema_status_job_checkbox = document.getElementById('essdrs_job_posting_active');
const schema_status_person_checkbox = document.getElementById('essdrs_person_active');
const schema_status_course_checkbox = document.getElementById('essdrs_course_active');

// on load -> check if the schema is activated and reflect in the schema types list
if (schema_status_article_checkbox.checked ) {

    schema_status_article_icon.style.background = '#ff7601';
    schema_status_article_icon.textContent = 'activated';
    
} else {
    
    schema_status_article_icon.style.background = '#112e76';
    schema_status_article_icon.textContent = 'not activated';
    
}
if (schema_status_recipe_checkbox.checked ) {

    schema_status_recipe_icon.style.background = '#ff7601';
    schema_status_recipe_icon.textContent = 'activated';
    
} else {
    
    schema_status_recipe_icon.style.background = '#112e76';
    schema_status_recipe_icon.textContent = 'not activated';
    
}
if (schema_status_video_checkbox.checked ) {

    schema_status_video_icon.style.background = '#ff7601';
    schema_status_video_icon.textContent = 'activated';
    
} else {
    
    schema_status_video_icon.style.background = '#112e76';
    schema_status_video_icon.textContent = 'not activated';
    
}
if (schema_status_software_checkbox.checked ) {

    schema_status_software_icon.style.background = '#ff7601';
    schema_status_software_icon.textContent = 'activated';
    
} else {
    
    schema_status_software_icon.style.background = '#112e76';
    schema_status_software_icon.textContent = 'not activated';
    
}
if (schema_status_events_checkbox.checked ) {

    schema_status_events_icon.style.background = '#ff7601';
    schema_status_events_icon.textContent = 'activated';
    
} else {
    
    schema_status_events_icon.style.background = '#112e76';
    schema_status_events_icon.textContent = 'not activated';
    
}
if (schema_status_job_checkbox.checked ) {

    schema_status_job_icon.style.background = '#ff7601';
    schema_status_job_icon.textContent = 'activated';
    
} else {
    
    schema_status_job_icon.style.background = '#112e76';
    schema_status_job_icon.textContent = 'not activated';
    
}
if (schema_status_person_checkbox.checked ) {

    schema_status_person_icon.style.background = '#ff7601';
    schema_status_person_icon.textContent = 'activated';
    
} else {
    
    schema_status_person_icon.style.background = '#112e76';
    schema_status_person_icon.textContent = 'not activated';
    
}
if (schema_status_course_checkbox.checked ) {

    schema_status_course_icon.style.background = '#ff7601';
    schema_status_course_icon.textContent = 'activated';
    
} else {
    
    schema_status_course_icon.style.background = '#112e76';
    schema_status_course_icon.textContent = 'not activated';
    
}

// checkbox sliders onclick -> reflect status in the schema types table
schema_status_article_checkbox.addEventListener('click', function handleClick() {
if (schema_status_article_checkbox.checked ) {

    schema_status_article_icon.style.background = '#ff7601';
    schema_status_article_icon.textContent = 'activated';
    
} else {
    
    schema_status_article_icon.style.background = '#112e76';
    schema_status_article_icon.textContent = 'not activated';
    
}
});

schema_status_recipe_checkbox.addEventListener('click', function handleClick() {
if (schema_status_recipe_checkbox.checked ) {

    schema_status_recipe_icon.style.background = '#ff7601';
    schema_status_recipe_icon.textContent = 'activated';
    
} else {
    
    schema_status_recipe_icon.style.background = '#112e76';
    schema_status_recipe_icon.textContent = 'not activated';
    
}
});

schema_status_video_checkbox.addEventListener('click', function handleClick() {
if (schema_status_video_checkbox.checked ) {

    schema_status_video_icon.style.background = '#ff7601';
    schema_status_video_icon.textContent = 'activated';
    
} else {
    
    schema_status_video_icon.style.background = '#112e76';
    schema_status_video_icon.textContent = 'not activated';
    
}
});

schema_status_software_checkbox.addEventListener('click', function handleClick() {
if (schema_status_software_checkbox.checked ) {

    schema_status_software_icon.style.background = '#ff7601';
    schema_status_software_icon.textContent = 'activated';
    
} else {
    
    schema_status_software_icon.style.background = '#112e76';
    schema_status_software_icon.textContent = 'not activated';
    
}
});

schema_status_events_checkbox.addEventListener('click', function handleClick() {
if (schema_status_events_checkbox.checked ) {

    schema_status_events_icon.style.background = '#ff7601';
    schema_status_events_icon.textContent = 'activated';
    
} else {
    
    schema_status_events_icon.style.background = '#112e76';
    schema_status_events_icon.textContent = 'not activated';
    
}
});

schema_status_job_checkbox.addEventListener('click', function handleClick() {
if (schema_status_job_checkbox.checked ) {

    schema_status_job_icon.style.background = '#ff7601';
    schema_status_job_icon.textContent = 'activated';
    
} else {
    
    schema_status_job_icon.style.background = '#112e76';
    schema_status_job_icon.textContent = 'not activated';
    
}
});

schema_status_person_checkbox.addEventListener('click', function handleClick() {
if (schema_status_person_checkbox.checked ) {

    schema_status_person_icon.style.background = '#ff7601';
    schema_status_person_icon.textContent = 'activated';
    
} else {
    
    schema_status_person_icon.style.background = '#112e76';
    schema_status_person_icon.textContent = 'not activated';
    
}
});

schema_status_course_checkbox.addEventListener('click', function handleClick() {
if (schema_status_course_checkbox.checked ) {

    schema_status_course_icon.style.background = '#ff7601';
    schema_status_course_icon.textContent = 'activated';
    
} else {
    
    schema_status_course_icon.style.background = '#112e76';
    schema_status_course_icon.textContent = 'not activated';
    
}
});
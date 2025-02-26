// Admin settings left navigation tabs show and hide options
// Identify tabs on left
const btn_getting_started = document.getElementById('es_getting_started');
const btn_local_business = document.getElementById('es_local_business');
const btn_faq_schema = document.getElementById('es_faq_schema');
const btn_logo_schema = document.getElementById('es_logo_schema');
const btn_sitelinks = document.getElementById('es_sitelinks');
const btn_woocommerce = document.getElementById('es_woocommerce_schema');
const btn_article = document.getElementById('es_article_schema');
const btn_recipe = document.getElementById('es_recipe_schema');
const btn_video = document.getElementById('es_video_object_schema');
const btn_software = document.getElementById('es_software_application_schema');
const btn_events = document.getElementById('es_events_schema');
const btn_job = document.getElementById('es_job_posting_schema');
const btn_person = document.getElementById('es_person_schema');
const btn_course = document.getElementById('es_course_schema');

// Identify each options page
const getting_started_options = document.getElementById('es_getting_started_options');
const local_business_options = document.getElementById('es_local_business_options');
const faq_options = document.getElementById('es_faq_options');
const logo_options = document.getElementById('es_logo_options');
const sitelinks_options = document.getElementById('es_sitelinks_options');
const woocommerce_options = document.getElementById('es_woocommerce_options');
const article_options = document.getElementById('es_article_options');
const recipe_options = document.getElementById('es_recipe_options');
const video_options = document.getElementById('es_video_options');
const software_options = document.getElementById('es_software_options');
const events_options = document.getElementById('es_events_options');
const job_options = document.getElementById('es_job_options');
const person_options = document.getElementById('es_person_options');
const course_options = document.getElementById('es_course_options');

// Set admin tab landing background (getting started)
if (btn_getting_started.style.background === '') {
    btn_getting_started.classList.add('tabactive')
}

// Show getting started on click
btn_getting_started.addEventListener('click', function handleClick() {
  if (getting_started_options.style.display === 'none') {
      
    // Make getting started options tab visible
    getting_started_options.style.display = 'block';
    
    // Change tab button to active state
    btn_getting_started.classList.add('tabactive')
    
    // Hide the other schema tab option pages
    local_business_options.style.display = 'none';    
    faq_options.style.display = 'none';    
    logo_options.style.display = 'none';    
    sitelinks_options.style.display = 'none';
    woocommerce_options.style.display = 'none';
    article_options.style.display = 'none';
    recipe_options.style.display = 'none';
    video_options.style.display = 'none';
    software_options.style.display = 'none';
    events_options.style.display = 'none';
    job_options.style.display = 'none'; 
    person_options.style.display = 'none'; 
    course_options.style.display = 'none'; 
    
    // Change all other tab buttons to inactive state
    btn_local_business.classList.remove('tabactive');
    btn_faq_schema.classList.remove('tabactive');
    btn_logo_schema.classList.remove('tabactive');
    btn_sitelinks.classList.remove('tabactive');
    btn_woocommerce.classList.remove('tabactive');
    btn_article.classList.remove('tabactive');
    btn_recipe.classList.remove('tabactive');
    btn_video.classList.remove('tabactive'); 
    btn_software.classList.remove('tabactive'); 
    btn_events.classList.remove('tabactive');    
    btn_job.classList.remove('tabactive');    
    btn_person.classList.remove('tabactive'); 
    btn_course.classList.remove('tabactive');    


  } 
});

// Show local business schema on click
btn_local_business.addEventListener('click', function handleClick() {
  if (local_business_options.style.display === 'none') {
    // Make local business options tab visible
    local_business_options.style.display = 'block';
    
    // Change tab button to active state
    btn_local_business.classList.add('tabactive')
    
    // Hide the other schema tab option pages
    getting_started_options.style.display = 'none';    
    faq_options.style.display = 'none';    
    logo_options.style.display = 'none';    
    sitelinks_options.style.display = 'none';
    woocommerce_options.style.display = 'none';
    article_options.style.display = 'none';
    recipe_options.style.display = 'none';
    video_options.style.display = 'none';
    software_options.style.display = 'none';
    events_options.style.display = 'none';
    job_options.style.display = 'none'; 
    person_options.style.display = 'none'; 
    course_options.style.display = 'none'; 
    
    // Change all other tab buttons to inactive state
    btn_getting_started.classList.remove('tabactive');
    btn_faq_schema.classList.remove('tabactive');
    btn_logo_schema.classList.remove('tabactive');
    btn_sitelinks.classList.remove('tabactive');
    btn_woocommerce.classList.remove('tabactive');
    btn_article.classList.remove('tabactive');    
    btn_recipe.classList.remove('tabactive');    
    btn_video.classList.remove('tabactive');    
    btn_software.classList.remove('tabactive'); 
    btn_events.classList.remove('tabactive');    
    btn_job.classList.remove('tabactive');    
    btn_person.classList.remove('tabactive'); 
    btn_course.classList.remove('tabactive');    

  } 
  
});

// Show FAQ schema on click
btn_faq_schema.addEventListener('click', function handleClick() {
  if (faq_options.style.display === 'none') {
      
    // Make FAQ options tab visible
    faq_options.style.display = 'block';
    
    // Change tab button to active state
    btn_faq_schema.classList.add('tabactive')
    
    // Hide the other schema tab option pages
    local_business_options.style.display = 'none';    
    getting_started_options.style.display = 'none';    
    logo_options.style.display = 'none';    
    sitelinks_options.style.display = 'none';
    woocommerce_options.style.display = 'none';
    article_options.style.display = 'none';
    recipe_options.style.display = 'none';
    video_options.style.display = 'none';
    software_options.style.display = 'none';
    events_options.style.display = 'none';
    job_options.style.display = 'none'; 
    person_options.style.display = 'none'; 
    course_options.style.display = 'none';
    
    // Change all other tab buttons to inactive state
    btn_local_business.classList.remove('tabactive');
    btn_getting_started.classList.remove('tabactive');
    btn_logo_schema.classList.remove('tabactive');
    btn_sitelinks.classList.remove('tabactive');
    btn_woocommerce.classList.remove('tabactive');
    btn_article.classList.remove('tabactive');    
    btn_recipe.classList.remove('tabactive');    
    btn_video.classList.remove('tabactive');    
    btn_software.classList.remove('tabactive'); 
    btn_events.classList.remove('tabactive');    
    btn_job.classList.remove('tabactive');    
    btn_person.classList.remove('tabactive'); 
    btn_course.classList.remove('tabactive');    
    
  } 
});

// Show logo schema on click
btn_logo_schema.addEventListener('click', function handleClick() {
  if (logo_options.style.display === 'none') {

    // Make Logo options tab visible
    logo_options.style.display = 'block';
    
    // Change tab button to active state
    btn_logo_schema.classList.add('tabactive')
    
    // Hide the other schema tab option pages
    local_business_options.style.display = 'none';    
    getting_started_options.style.display = 'none';    
    faq_options.style.display = 'none';    
    sitelinks_options.style.display = 'none';
    woocommerce_options.style.display = 'none';
    article_options.style.display = 'none';
    recipe_options.style.display = 'none';
    video_options.style.display = 'none';
    software_options.style.display = 'none';
    events_options.style.display = 'none';
    job_options.style.display = 'none'; 
    person_options.style.display = 'none'; 
    course_options.style.display = 'none'; 
    
    // Change all other tab buttons to inactive state
    btn_local_business.classList.remove('tabactive');
    btn_getting_started.classList.remove('tabactive');
    btn_faq_schema.classList.remove('tabactive');
    btn_sitelinks.classList.remove('tabactive');
    btn_woocommerce.classList.remove('tabactive');
    btn_article.classList.remove('tabactive');    
    btn_recipe.classList.remove('tabactive');    
    btn_video.classList.remove('tabactive');    
    btn_software.classList.remove('tabactive'); 
    btn_events.classList.remove('tabactive');    
    btn_job.classList.remove('tabactive');    
    btn_person.classList.remove('tabactive'); 
    btn_course.classList.remove('tabactive');    
    
  } 
});

// Show sitelinks schema on click
btn_sitelinks.addEventListener('click', function handleClick() {
  if (sitelinks_options.style.display === 'none') {

    // Make Sitelinks options tab visible
    sitelinks_options.style.display = 'block';
    
    // Change tab button to active state
    btn_sitelinks.classList.add('tabactive')
    
    // Hide the other schema tab option pages
    local_business_options.style.display = 'none';    
    getting_started_options.style.display = 'none';    
    faq_options.style.display = 'none';    
    logo_options.style.display = 'none';
    woocommerce_options.style.display = 'none';
    article_options.style.display = 'none';
    recipe_options.style.display = 'none';
    video_options.style.display = 'none';
    software_options.style.display = 'none';
    events_options.style.display = 'none';
    job_options.style.display = 'none'; 
    person_options.style.display = 'none'; 
    course_options.style.display = 'none'; 
    
    // Change all other tab buttons to inactive state
    btn_local_business.classList.remove('tabactive');
    btn_getting_started.classList.remove('tabactive');
    btn_faq_schema.classList.remove('tabactive');
    btn_logo_schema.classList.remove('tabactive');
    btn_woocommerce.classList.remove('tabactive');
    btn_article.classList.remove('tabactive');    
    btn_recipe.classList.remove('tabactive');    
    btn_video.classList.remove('tabactive');    
    btn_software.classList.remove('tabactive');
    btn_events.classList.remove('tabactive');    
    btn_job.classList.remove('tabactive');    
    btn_person.classList.remove('tabactive'); 
    btn_course.classList.remove('tabactive');    

  } 
});

// Show woocommerce schema on click
btn_woocommerce.addEventListener('click', function handleClick() {
  if (woocommerce_options.style.display === 'none') {

    // Make Woocommerce options tab visible
    woocommerce_options.style.display = 'block';
    
    // Change tab button to active state
    btn_woocommerce.classList.add('tabactive')
    
    // Hide the other schema tab option pages
    local_business_options.style.display = 'none';    
    getting_started_options.style.display = 'none';    
    faq_options.style.display = 'none';    
    logo_options.style.display = 'none';
    sitelinks_options.style.display = 'none';
    article_options.style.display = 'none';
    recipe_options.style.display = 'none';
    video_options.style.display = 'none';
    software_options.style.display = 'none';
    events_options.style.display = 'none';
    job_options.style.display = 'none'; 
    person_options.style.display = 'none'; 
    course_options.style.display = 'none'; 
    
    // Change all other tab buttons to inactive state
    btn_local_business.classList.remove('tabactive');
    btn_getting_started.classList.remove('tabactive');
    btn_faq_schema.classList.remove('tabactive');
    btn_logo_schema.classList.remove('tabactive');
    btn_sitelinks.classList.remove('tabactive');
    btn_article.classList.remove('tabactive');    
    btn_recipe.classList.remove('tabactive');    
    btn_video.classList.remove('tabactive');    
    btn_software.classList.remove('tabactive'); 
    btn_events.classList.remove('tabactive');    
    btn_job.classList.remove('tabactive');    
    btn_person.classList.remove('tabactive'); 
    btn_course.classList.remove('tabactive');    

  } 
});

// Show Article schema on click
btn_article.addEventListener('click', function handleClick() {
  if (article_options.style.display === 'none') {

    // Make Article schema options tab visible
    article_options.style.display = 'block';
    
    // Change tab button to active state
    btn_article.classList.add('tabactive')
    
    // Hide the other schema tab option pages
    local_business_options.style.display = 'none';    
    getting_started_options.style.display = 'none';    
    faq_options.style.display = 'none';    
    logo_options.style.display = 'none';
    sitelinks_options.style.display = 'none';
    woocommerce_options.style.display = 'none';
    recipe_options.style.display = 'none';
    video_options.style.display = 'none';
    software_options.style.display = 'none';
    events_options.style.display = 'none';
    job_options.style.display = 'none'; 
    person_options.style.display = 'none'; 
    course_options.style.display = 'none'; 
    
    // Change all other tab buttons to inactive state
    btn_local_business.classList.remove('tabactive');
    btn_getting_started.classList.remove('tabactive');
    btn_faq_schema.classList.remove('tabactive');
    btn_logo_schema.classList.remove('tabactive');
    btn_sitelinks.classList.remove('tabactive');
    btn_woocommerce.classList.remove('tabactive');    
    btn_recipe.classList.remove('tabactive');    
    btn_video.classList.remove('tabactive');    
    btn_software.classList.remove('tabactive'); 
    btn_events.classList.remove('tabactive');    
    btn_job.classList.remove('tabactive');    
    btn_person.classList.remove('tabactive'); 
    btn_course.classList.remove('tabactive');    

  } 
});

// Show recipe schema on click
btn_recipe.addEventListener('click', function handleClick() {
    if (recipe_options.style.display === 'none') {
  
      // Make Recipe schema options tab visible
      recipe_options.style.display = 'block';
      
      // Change tab button to active state
      btn_recipe.classList.add('tabactive')
      
      // Hide the other schema tab option pages
      local_business_options.style.display = 'none';    
      getting_started_options.style.display = 'none';    
      faq_options.style.display = 'none';    
      logo_options.style.display = 'none';
      sitelinks_options.style.display = 'none';
      woocommerce_options.style.display = 'none';
      article_options.style.display = 'none';
      video_options.style.display = 'none';
      software_options.style.display = 'none';
      events_options.style.display = 'none';
      job_options.style.display = 'none'; 
      person_options.style.display = 'none'; 
      course_options.style.display = 'none'; 
      
      // Change all other tab buttons to inactive state
      btn_local_business.classList.remove('tabactive');
      btn_getting_started.classList.remove('tabactive');
      btn_faq_schema.classList.remove('tabactive');
      btn_logo_schema.classList.remove('tabactive');
      btn_sitelinks.classList.remove('tabactive');
      btn_woocommerce.classList.remove('tabactive');    
      btn_article.classList.remove('tabactive');    
      btn_video.classList.remove('tabactive');    
      btn_software.classList.remove('tabactive'); 
      btn_events.classList.remove('tabactive');    
      btn_job.classList.remove('tabactive');    
      btn_person.classList.remove('tabactive'); 
      btn_course.classList.remove('tabactive');    
  
    } 
});
// Show video object schema on click
btn_video.addEventListener('click', function handleClick() {
    if (video_options.style.display === 'none') {
  
      // Make Video schema options tab visible
      video_options.style.display = 'block';
      
      // Change tab button to active state
      btn_video.classList.add('tabactive')
      
      // Hide the other schema tab option pages
      local_business_options.style.display = 'none';    
      getting_started_options.style.display = 'none';    
      faq_options.style.display = 'none';    
      logo_options.style.display = 'none';
      sitelinks_options.style.display = 'none';
      woocommerce_options.style.display = 'none';
      recipe_options.style.display = 'none';
      article_options.style.display = 'none';
      software_options.style.display = 'none';
      events_options.style.display = 'none';
      job_options.style.display = 'none'; 
      person_options.style.display = 'none'; 
      course_options.style.display = 'none'; 
    
      // Change all other tab buttons to inactive state
      btn_local_business.classList.remove('tabactive');
      btn_getting_started.classList.remove('tabactive');
      btn_faq_schema.classList.remove('tabactive');
      btn_logo_schema.classList.remove('tabactive');
      btn_sitelinks.classList.remove('tabactive');
      btn_woocommerce.classList.remove('tabactive');    
      btn_recipe.classList.remove('tabactive');    
      btn_article.classList.remove('tabactive');    
      btn_software.classList.remove('tabactive'); 
      btn_events.classList.remove('tabactive');    
      btn_job.classList.remove('tabactive');    
      btn_person.classList.remove('tabactive'); 
      btn_course.classList.remove('tabactive');    
  
    } 
});
  
// Show Software Application schema on click
btn_software.addEventListener('click', function handleClick() {
    if (software_options.style.display === 'none') {
  
      // Make Software schema options tab visible
      software_options.style.display = 'block';
      
      // Change tab button to active state
      btn_software.classList.add('tabactive')
      
      // Hide the other schema tab option pages
      local_business_options.style.display = 'none';    
      getting_started_options.style.display = 'none';    
      faq_options.style.display = 'none';    
      logo_options.style.display = 'none';
      sitelinks_options.style.display = 'none';
      woocommerce_options.style.display = 'none';
      recipe_options.style.display = 'none';
      video_options.style.display = 'none';
      article_options.style.display = 'none';
      events_options.style.display = 'none';
      job_options.style.display = 'none'; 
      person_options.style.display = 'none'; 
      course_options.style.display = 'none'; 
      
      // Change all other tab buttons to inactive state
      btn_local_business.classList.remove('tabactive');
      btn_getting_started.classList.remove('tabactive');
      btn_faq_schema.classList.remove('tabactive');
      btn_logo_schema.classList.remove('tabactive');
      btn_sitelinks.classList.remove('tabactive');
      btn_woocommerce.classList.remove('tabactive');    
      btn_recipe.classList.remove('tabactive');    
      btn_video.classList.remove('tabactive');    
      btn_article.classList.remove('tabactive'); 
      btn_events.classList.remove('tabactive');    
      btn_job.classList.remove('tabactive');    
      btn_person.classList.remove('tabactive'); 
      btn_course.classList.remove('tabactive');    
  
    } 
});

// Show Events schema on click
btn_events.addEventListener('click', function handleClick() {
    if (events_options.style.display === 'none') {
  
      // Make Events schema options tab visible
      events_options.style.display = 'block';
      
      // Change tab button to active state
      btn_events.classList.add('tabactive')
      
      // Hide the other schema tab option pages
      local_business_options.style.display = 'none';    
      getting_started_options.style.display = 'none';    
      faq_options.style.display = 'none';    
      logo_options.style.display = 'none';
      sitelinks_options.style.display = 'none';
      woocommerce_options.style.display = 'none';
      recipe_options.style.display = 'none';
      video_options.style.display = 'none';
      software_options.style.display = 'none';
      article_options.style.display = 'none';
      job_options.style.display = 'none'; 
      person_options.style.display = 'none'; 
      course_options.style.display = 'none';      
      
      // Change all other tab buttons to inactive state
      btn_local_business.classList.remove('tabactive');
      btn_getting_started.classList.remove('tabactive');
      btn_faq_schema.classList.remove('tabactive');
      btn_logo_schema.classList.remove('tabactive');
      btn_sitelinks.classList.remove('tabactive');
      btn_woocommerce.classList.remove('tabactive');    
      btn_recipe.classList.remove('tabactive');    
      btn_video.classList.remove('tabactive');    
      btn_software.classList.remove('tabactive'); 
      btn_article.classList.remove('tabactive');    
      btn_job.classList.remove('tabactive');    
      btn_person.classList.remove('tabactive'); 
      btn_course.classList.remove('tabactive');    
  
    } 
});

// Show Job Listing schema on click
btn_job.addEventListener('click', function handleClick() {
    if (job_options.style.display === 'none') {
  
      // Make Job Posting schema options tab visible
      job_options.style.display = 'block';
      
      // Change tab button to active state
      btn_job.classList.add('tabactive')
      
      // Hide the other schema tab option pages
      local_business_options.style.display = 'none';    
      getting_started_options.style.display = 'none';    
      faq_options.style.display = 'none';    
      logo_options.style.display = 'none';
      sitelinks_options.style.display = 'none';
      woocommerce_options.style.display = 'none';
      recipe_options.style.display = 'none';
      video_options.style.display = 'none';
      software_options.style.display = 'none';
      events_options.style.display = 'none';
      article_options.style.display = 'none'; 
      person_options.style.display = 'none'; 
      course_options.style.display = 'none';  
      
      // Change all other tab buttons to inactive state
      btn_local_business.classList.remove('tabactive');
      btn_getting_started.classList.remove('tabactive');
      btn_faq_schema.classList.remove('tabactive');
      btn_logo_schema.classList.remove('tabactive');
      btn_sitelinks.classList.remove('tabactive');
      btn_woocommerce.classList.remove('tabactive');    
      btn_recipe.classList.remove('tabactive');    
      btn_video.classList.remove('tabactive');   
      btn_software.classList.remove('tabactive'); 
      btn_events.classList.remove('tabactive');    
      btn_article.classList.remove('tabactive');    
      btn_person.classList.remove('tabactive'); 
      btn_course.classList.remove('tabactive');    
  
    } 
});

// Show Person schema on click
btn_person.addEventListener('click', function handleClick() {
    if (person_options.style.display === 'none') {
  
      // Make Person schema options tab visible
      person_options.style.display = 'block';
      
      // Change tab button to active state
      btn_person.classList.add('tabactive')
      
      // Hide the other schema tab option pages
      local_business_options.style.display = 'none';    
      getting_started_options.style.display = 'none';    
      faq_options.style.display = 'none';    
      logo_options.style.display = 'none';
      sitelinks_options.style.display = 'none';
      woocommerce_options.style.display = 'none';
      recipe_options.style.display = 'none';
      video_options.style.display = 'none';
      software_options.style.display = 'none';
      events_options.style.display = 'none';
      job_options.style.display = 'none'; 
      article_options.style.display = 'none'; 
      course_options.style.display = 'none'; 
      
      // Change all other tab buttons to inactive state
      btn_local_business.classList.remove('tabactive');
      btn_getting_started.classList.remove('tabactive');
      btn_faq_schema.classList.remove('tabactive');
      btn_logo_schema.classList.remove('tabactive');
      btn_sitelinks.classList.remove('tabactive');
      btn_woocommerce.classList.remove('tabactive');    
      btn_recipe.classList.remove('tabactive');    
      btn_video.classList.remove('tabactive');    
      btn_software.classList.remove('tabactive'); 
      btn_events.classList.remove('tabactive');    
      btn_job.classList.remove('tabactive');    
      btn_article.classList.remove('tabactive'); 
      btn_course.classList.remove('tabactive');    
  
    } 
});

// Show Course schema on click
btn_course.addEventListener('click', function handleClick() {
    if (course_options.style.display === 'none') {
  
      // Make Course schema options tab visible
      course_options.style.display = 'block';
      
      // Change tab button to active state
      btn_course.classList.add('tabactive')
      
      // Hide the other schema tab option pages
      local_business_options.style.display = 'none';    
      getting_started_options.style.display = 'none';    
      faq_options.style.display = 'none';    
      logo_options.style.display = 'none';
      sitelinks_options.style.display = 'none';
      woocommerce_options.style.display = 'none';
      recipe_options.style.display = 'none';
      video_options.style.display = 'none';
      software_options.style.display = 'none';
      events_options.style.display = 'none';
      job_options.style.display = 'none'; 
      person_options.style.display = 'none'; 
      article_options.style.display = 'none';    
      
      // Change all other tab buttons to inactive state
      btn_local_business.classList.remove('tabactive');
      btn_getting_started.classList.remove('tabactive');
      btn_faq_schema.classList.remove('tabactive');
      btn_logo_schema.classList.remove('tabactive');
      btn_sitelinks.classList.remove('tabactive');
      btn_woocommerce.classList.remove('tabactive');    
      btn_recipe.classList.remove('tabactive');
      btn_video.classList.remove('tabactive');    
      btn_software.classList.remove('tabactive'); 
      btn_events.classList.remove('tabactive');    
      btn_job.classList.remove('tabactive');    
      btn_person.classList.remove('tabactive'); 
      btn_article.classList.remove('tabactive');    
  
    } 
});
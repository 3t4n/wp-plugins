<?php
function formzard_get_templates() {
    // Get the site's domain
    $site_url = get_bloginfo('url');
    $parsed_url = wp_parse_url($site_url);
    $domain = $parsed_url['host'];
    $default_sender_email = 'wordpress@' . $domain;

    return [
        [
            'id' => 'contact_us',
            'name' => __('Contact Us Form', 'formzard'),
            'description' => __('A simple contact form with name, email, and message fields.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name autocomplete:name] </label>

<label> Your email
[email* your-email autocomplete:email] </label>

<label> Subject
[text* your-subject] </label>

<label> Your message (optional)
[textarea your-message] </label>

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New message from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'From: [your-name] [your-email]\nSubject: [your-subject]\n\nMessage Body:\n[your-message]\n\n-- \nThis is a notification that a contact form was submitted on your website ([_site_title] [_site_url]).',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'event_registration',
            'name' => __('Event Registration Form', 'formzard'),
            'description' => __('A form for event registration with name, email, and attendee count.', 'formzard'),
            'category' => 'Events and Entertainment',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Number of Attendees
[number* attendees] </label>

[submit "Register"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New event registration from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new event registration:\n\nName: [your-name]\nEmail: [your-email]\nAttendees: [attendees]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'newsletter_signup',
            'name' => __('Newsletter Signup Form', 'formzard'),
            'description' => __('A form for newsletter signup with name and email fields.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

[submit "Sign Up"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New newsletter signup from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new newsletter signup:\n\nName: [your-name]\nEmail: [your-email]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'job_application',
            'name' => __('Job Application Form', 'formzard'),
            'description' => __('A form for job applications with name, email, phone, and resume fields.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Your phone
[tel* your-phone] </label>

<label> Your resume
[file* your-resume] </label>

[submit "Apply"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New job application from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new job application:\n\nName: [your-name]\nEmail: [your-email]\nPhone: [your-phone]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'survey_form',
            'name' => __('Survey Form', 'formzard'),
            'description' => __('A simple survey form with multiple choice questions.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Question 1 </label>
[radio question-1 "Option 1" "Option 2" "Option 3"]

<label> Question 2 </label>
[radio question-2 "Option 1" "Option 2" "Option 3"]

<label> Question 3 </label>
[radio question-3 "Option 1" "Option 2" "Option 3"]

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New survey response from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new survey response:\n\nQuestion 1: [question-1]\nQuestion 2: [question-2]\nQuestion 3: [question-3]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'donation_form',
            'name' => __('Donation Form', 'formzard'),
            'description' => __('A form to accept donations with name, email, and amount fields.', 'formzard'),
            'category' => 'Nonprofit and Charities',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Donation Amount
[number* donation-amount] </label>

[submit "Donate"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New donation from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have received a new donation:\n\nName: [your-name]\nEmail: [your-email]\nDonation Amount: [donation-amount]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'appointment_booking',
            'name' => __('Appointment Booking Form', 'formzard'),
            'description' => __('A form for booking appointments with name, email, phone, and date.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Your phone
[tel* your-phone] </label>

<label> Appointment Date
[date* appointment-date] </label>

[submit "Book Appointment"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New appointment booking from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new appointment booking:\n\nName: [your-name]\nEmail: [your-email]\nPhone: [your-phone]\nDate: [appointment-date]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'feedback_form',
            'name' => __('Feedback Form', 'formzard'),
            'description' => __('A form to collect user feedback with name, email, and comments.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Your Feedback
[textarea* your-feedback] </label>

[submit "Submit Feedback"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New feedback from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have new feedback:\n\nName: [your-name]\nEmail: [your-email]\nFeedback: [your-feedback]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'quote_request',
            'name' => __('Request a Quote Form', 'formzard'),
            'description' => __('A form to request a quote with name, email, phone, and details.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Your phone
[tel your-phone] </label>

<label> Project Details
[textarea* project-details] </label>

[submit "Request Quote"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New quote request from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new quote request:\n\nName: [your-name]\nEmail: [your-email]\nPhone: [your-phone]\nDetails: [project-details]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'lead_generation',
            'name' => __('Lead Generation Form', 'formzard'),
            'description' => __('A form to capture leads with name and email.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New lead from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new lead:\n\nName: [your-name]\nEmail: [your-email]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'service_inquiry',
            'name' => __('Service Inquiry Form', 'formzard'),
            'description' => __('A form to inquire about services with name, email, phone, and message fields.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Your phone
[tel your-phone] </label>

<label> Your message
[textarea* your-message] </label>

[submit "Inquire"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New service inquiry from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new service inquiry:\n\nName: [your-name]\nEmail: [your-email]\nPhone: [your-phone]\nMessage: [your-message]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'client_intake',
            'name' => __('Client Intake Form', 'formzard'),
            'description' => __('A form to gather client information with name, email, phone, and details.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Your phone
[tel* your-phone] </label>

<label> Project Details
[textarea* project-details] </label>

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New client intake from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new client intake:\n\nName: [your-name]\nEmail: [your-email]\nPhone: [your-phone]\nDetails: [project-details]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'customer_satisfaction_survey',
            'name' => __('Customer Satisfaction Survey Form', 'formzard'),
            'description' => __('A form to gather customer satisfaction feedback with multiple choice questions.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> How satisfied are you with our service? </label>
[radio satisfaction "Very Satisfied" "Satisfied" "Neutral" "Dissatisfied" "Very Dissatisfied"]

<label> How likely are you to recommend us to others? </label>
[radio recommendation "Very Likely" "Likely" "Neutral" "Unlikely" "Very Unlikely"]

<label> What can we improve?
[textarea improvements] </label>

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New customer satisfaction survey response from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new customer satisfaction survey response:\n\nName: [your-name]\nEmail: [your-email]\nSatisfaction: [satisfaction]\nRecommendation: [recommendation]\nImprovements: [improvements]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'complaint_form',
            'name' => __('Complaint Form', 'formzard'),
            'description' => __('A form to submit complaints with name, email, complaint type, and details.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Complaint Type
[select* complaint-type "Product Issue" "Service Issue" "Other"] </label>

<label> Complaint Details
[textarea* complaint-details] </label>

<label> Attach a file (optional)
[file complaint-file] </label>

[submit "Submit Complaint"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New complaint from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new complaint:\n\nName: [your-name]\nEmail: [your-email]\nComplaint Type: [complaint-type]\nDetails: [complaint-details]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[complaint-file]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'product_inquiry',
            'name' => __('Product Inquiry Form', 'formzard'),
            'description' => __('A form to inquire about products with name, email, product selection, and additional details.', 'formzard'),
            'category' => 'E-commerce',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Select Product
[select* product "Product 1" "Product 2" "Product 3"] </label>

<label> Preferred Contact Method </label>
[radio contact-method "Email" "Phone"]

<label> Additional Details
[textarea additional-details] </label>

<label> Attach a file (optional)
[file product-file] </label>

[submit "Submit Inquiry"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New product inquiry from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new product inquiry:\n\nName: [your-name]\nEmail: [your-email]\nProduct: [product]\nPreferred Contact Method: [contact-method]\nAdditional Details: [additional-details]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[product-file]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'return_refund_request',
            'name' => __('Return/Refund Request Form', 'formzard'),
            'description' => __('A form to request a return or refund with name, email, order number, reason, and additional details.', 'formzard'),
            'category' => 'E-commerce',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Order Number
[text* order-number] </label>

<label> Reason for Return/Refund
[select* reason "Defective Product" "Wrong Item Shipped" "Changed Mind" "Other"] </label>

<label> Additional Details
[textarea additional-details] </label>

<label> Attach a file (optional)
[file return-file] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit Request"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New return/refund request from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new return/refund request:\n\nName: [your-name]\nEmail: [your-email]\nOrder Number: [order-number]\nReason: [reason]\nAdditional Details: [additional-details]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[return-file]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'wishlist_request',
            'name' => __('Wishlist Request Form', 'formzard'),
            'description' => __('A form to request items for a wishlist with name, email, and item details.', 'formzard'),
            'category' => 'E-commerce',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Item Category
[select* item-category "Electronics" "Books" "Clothing" "Other"] </label>

<label> Item Priority </label>
[radio item-priority "High" "Medium" "Low"]

<label> Item Details
[textarea* item-details] </label>

<label> Attach a file (optional)
[file item-file] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit Request"]',
                'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New wishlist request from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new wishlist request:\n\nName: [your-name]\nEmail: [your-email]\nItem Category: [item-category]\nItem Priority: [item-priority]\nDetails: [item-details]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[item-file]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'wholesale_inquiry',
            'name' => __('Wholesale Inquiry Form', 'formzard'),
            'description' => __('A form to inquire about wholesale opportunities with name, email, business type, and additional details.', 'formzard'),
            'category' => 'E-commerce',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Business Type
[select* business-type "Retailer" "Distributor" "Manufacturer" "Other"] </label>

<label> Interested Products </label>
[checkbox* interested-products "Product A" "Product B" "Product C"]

<label> Preferred Contact Method </label>
[radio contact-method "Email" "Phone"]

<label> Inquiry Details
[textarea inquiry-details] </label>

<label> Attach a file (optional)
[file inquiry-file] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit Inquiry"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New wholesale inquiry from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new wholesale inquiry:\n\nName: [your-name]\nEmail: [your-email]\nBusiness Type: [business-type]\nInterested Products: [interested-products]\nPreferred Contact Method: [contact-method]\nDetails: [inquiry-details]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[inquiry-file]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'product_review_submission',
            'name' => __('Product Review Submission Form', 'formzard'),
            'description' => __('A form to submit product reviews with name, email, rating, and review details.', 'formzard'),
            'category' => 'E-commerce',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Product Rating </label>
[radio product-rating "1 Star" "2 Stars" "3 Stars" "4 Stars" "5 Stars"]

<label> Review Title
[text* review-title] </label>

<label> Review Details
[textarea* review-details] </label>

<label> Attach a photo (optional)
[file review-photo] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit Review"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New product review from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new product review:\n\nName: [your-name]\nEmail: [your-email]\nRating: [product-rating]\nTitle: [review-title]\nDetails: [review-details]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[review-photo]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'course_registration',
            'name' => __('Course Registration Form', 'formzard'),
            'description' => __('A form for course registration with name, email, course selection, and additional details.', 'formzard'),
            'category' => 'Education and Learning',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Select Course
[select* course "Course 1" "Course 2" "Course 3"] </label>

<label> Preferred Contact Method </label>
[radio contact-method "Email" "Phone"]

<label> Additional Details
[textarea additional-details] </label>

<label> Attach a file (optional)
[file course-file] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Register"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New course registration from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new course registration:\n\nName: [your-name]\nEmail: [your-email]\nCourse: [course]\nPreferred Contact Method: [contact-method]\nAdditional Details: [additional-details]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[course-file]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'payment_authorization',
            'name' => __('Payment Authorization Form', 'formzard'),
            'description' => __('A form to authorize payments with name, email, payment method, and authorization details.', 'formzard'),
            'category' => 'E-commerce',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Payment Method
[select* payment-method "Credit Card" "PayPal" "Bank Transfer"] </label>

<label> Authorization Date
[date* authorization-date] </label>

<label> Attach Authorization Document
[file* authorization-document] </label>

[acceptance terms] I authorize the payment [/acceptance]

[submit "Authorize Payment"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New payment authorization from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new payment authorization:\n\nName: [your-name]\nEmail: [your-email]\nPayment Method: [payment-method]\nAuthorization Date: [authorization-date]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[authorization-document]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'student_feedback',
            'name' => __('Student Feedback Form', 'formzard'),
            'description' => __('A form to collect feedback from students with various input types.', 'formzard'),
            'category' => 'Education and Learning',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Course Rating </label>
[radio course-rating "1 Star" "2 Stars" "3 Stars" "4 Stars" "5 Stars"]

<label> Favorite Subject
[select* favorite-subject "Math" "Science" "History" "Literature"] </label>

<label> Additional Comments
[textarea comments] </label>

<label> Attach a file (optional)
[file feedback-file] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit Feedback"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New student feedback from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have new student feedback:\n\nName: [your-name]\nEmail: [your-email]\nCourse Rating: [course-rating]\nFavorite Subject: [favorite-subject]\nComments: [comments]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[feedback-file]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'scholarship_application',
            'name' => __('Scholarship Application Form', 'formzard'),
            'description' => __('A form for scholarship applications with various input types.', 'formzard'),
            'category' => 'Education and Learning',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Date of Birth
[date* dob] </label>

<label> Select Scholarship Type
[select* scholarship-type "Merit-based" "Need-based" "Athletic" "Artistic"] </label>

<label> Academic Achievements
[textarea* academic-achievements] </label>

<label> Upload Transcript
[file* transcript] </label>

<label> Why do you deserve this scholarship?
[textarea* scholarship-reason] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Apply"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New scholarship application from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new scholarship application:\n\nName: [your-name]\nEmail: [your-email]\nDate of Birth: [dob]\nScholarship Type: [scholarship-type]\nAcademic Achievements: [academic-achievements]\nReason: [scholarship-reason]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[transcript]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'event_participation',
            'name' => __('Event Participation Form', 'formzard'),
            'description' => __('A form to participate in events with various input types.', 'formzard'),
            'category' => 'Education and Learning',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Select Event
[select* event "Event 1" "Event 2" "Event 3"] </label>

<label> Participation Type </label>
[radio participation-type "Speaker" "Attendee" "Volunteer"]

<label> Dietary Preferences </label>
[checkbox* dietary-preferences "Vegetarian" "Vegan" "Gluten-Free" "No Preference"]

<label> Upload Profile Picture
[file profile-picture] </label>

[quiz quiz-answer "Quiz: What is 2 + 2? | 4"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Participate"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New event participation from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new event participation:\n\nName: [your-name]\nEmail: [your-email]\nEvent: [event]\nParticipation Type: [participation-type]\nDietary Preferences: [dietary-preferences]\nQuiz Answer: [quiz-answer]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[profile-picture]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'online_exam',
            'name' => __('Online Exam Form', 'formzard'),
            'description' => __('A form for online exam registration with various input types.', 'formzard'),
            'category' => 'Education and Learning',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Select Exam
[select* exam "Math Exam" "Science Exam" "History Exam"] </label>

<label> Preferred Exam Date
[date* exam-date] </label>

<label> Upload ID Proof
[file* id-proof] </label>

[quiz quiz-answer "Quiz: What is the capital of France? | Paris"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Register"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New online exam registration from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new online exam registration:\n\nName: [your-name]\nEmail: [your-email]\nExam: [exam]\nPreferred Exam Date: [exam-date]\nQuiz Answer: [quiz-answer]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[id-proof]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'elearning_subscription',
            'name' => __('E-Learning Subscription Form', 'formzard'),
            'description' => __('A form for subscribing to e-learning courses with various input types.', 'formzard'),
            'category' => 'Education and Learning',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Select Course
[select* course "Course A" "Course B" "Course C"] </label>

<label> Preferred Learning Method </label>
[radio learning-method "Online" "Offline"]

<label> Subscription Duration </label>
[checkbox* subscription-duration "1 Month" "3 Months" "6 Months" "1 Year"]

<label> Preferred Start Date
[date* start-date] </label>

<label> Upload ID Proof
[file* id-proof] </label>

[quiz quiz-answer "Quiz: What is 5 + 3? | 8"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Subscribe"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New e-learning subscription from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new e-learning subscription:\n\nName: [your-name]\nEmail: [your-email]\nCourse: [course]\nLearning Method: [learning-method]\nSubscription Duration: [subscription-duration]\nPreferred Start Date: [start-date]\nQuiz Answer: [quiz-answer]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[id-proof]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'alumni_contact',
            'name' => __('Alumni Contact Form', 'formzard'),
            'description' => __('A form to contact alumni with various input types.', 'formzard'),
            'category' => 'Education and Learning',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Graduation Year
[date graduation-year] </label>

<label> Preferred Contact Method </label>
[radio contact-method "Email" "Phone"]

<label> Areas of Interest </label>
[checkbox* areas-of-interest "Networking" "Mentorship" "Events" "Donations"]

<label> Upload Profile Picture
[file profile-picture] </label>

[quiz quiz-answer "Quiz: What is the square root of 16? | 4"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New alumni contact from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new alumni contact:\n\nName: [your-name]\nEmail: [your-email]\nGraduation Year: [graduation-year]\nPreferred Contact Method: [contact-method]\nAreas of Interest: [areas-of-interest]\nQuiz Answer: [quiz-answer]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[profile-picture]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'volunteer_application',
            'name' => __('Volunteer Application Form', 'formzard'),
            'description' => __('A form for volunteer applications with various input types.', 'formzard'),
            'category' => 'Education and Learning',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Preferred Volunteer Role
[select* volunteer-role "Event Organizer" "Fundraiser" "Community Outreach" "Administrative Support"] </label>

<label> Availability </label>
[checkbox* availability "Weekdays" "Weekends" "Evenings"]

<label> Upload Resume
[file resume] </label>

<label> Why do you want to volunteer with us?
[textarea* volunteer-reason] </label>

[quiz quiz-answer "Quiz: What is 3 + 5? | 8"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Apply"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New volunteer application from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new volunteer application:\n\nName: [your-name]\nEmail: [your-email]\nPreferred Role: [volunteer-role]\nAvailability: [availability]\nReason: [volunteer-reason]\nQuiz Answer: [quiz-answer]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[resume]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'tutoring_request',
            'name' => __('Tutoring Request Form', 'formzard'),
            'description' => __('A form to request tutoring services with various input types.', 'formzard'),
            'category' => 'Education and Learning',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Subject
[select* subject "Math" "Science" "History" "Literature"] </label>

<label> Preferred Tutoring Method </label>
[radio tutoring-method "Online" "In-Person"]

<label> Preferred Tutoring Date
[date* tutoring-date] </label>

<label> Additional Details
[textarea additional-details] </label>

<label> Upload Supporting Documents (optional)
[file supporting-documents] </label>

[quiz quiz-answer "Quiz: What is 10 + 5? | 15"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Request Tutoring"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New tutoring request from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new tutoring request:\n\nName: [your-name]\nEmail: [your-email]\nSubject: [subject]\nPreferred Tutoring Method: [tutoring-method]\nPreferred Tutoring Date: [tutoring-date]\nAdditional Details: [additional-details]\nQuiz Answer: [quiz-answer]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[supporting-documents]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'workshop_registration',
            'name' => __('Workshop Registration Form', 'formzard'),
            'description' => __('A form for workshop registration with various input types.', 'formzard'),
            'category' => 'Education and Learning',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Select Workshop
[select* workshop "Workshop 1" "Workshop 2" "Workshop 3"] </label>

<label> Preferred Contact Method </label>
[radio contact-method "Email" "Phone"]

<label> Dietary Preferences </label>
[checkbox* dietary-preferences "Vegetarian" "Vegan" "Gluten-Free" "No Preference"]

<label> Upload Profile Picture
[file profile-picture] </label>

[quiz quiz-answer "Quiz: What is 3 + 4? | 7"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Register"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New workshop registration from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new workshop registration:\n\nName: [your-name]\nEmail: [your-email]\nWorkshop: [workshop]\nPreferred Contact Method: [contact-method]\nDietary Preferences: [dietary-preferences]\nQuiz Answer: [quiz-answer]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[profile-picture]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'fundraising_event_registration',
            'name' => __('Fundraising Event Registration Form', 'formzard'),
            'description' => __('A form for registering for a fundraising event with various input types.', 'formzard'),
            'category' => 'Nonprofit and Charities',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Select Event
[select* event "Gala Dinner" "Charity Run" "Auction"] </label>

<label> Participation Type </label>
[radio participation-type "Individual" "Group"]

<label> Dietary Preferences </label>
[checkbox* dietary-preferences "Vegetarian" "Vegan" "Gluten-Free" "No Preference"]

<label> Upload Profile Picture
[file profile-picture] </label>

[quiz quiz-answer "Quiz: What is 5 + 7? | 12"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Register"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New fundraising event registration from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new fundraising event registration:\n\nName: [your-name]\nEmail: [your-email]\nEvent: [event]\nParticipation Type: [participation-type]\nDietary Preferences: [dietary-preferences]\nQuiz Answer: [quiz-answer]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[profile-picture]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'patient_intake',
            'name' => __('Patient Intake Form', 'formzard'),
            'description' => __('A form to gather patient information with various input types.', 'formzard'),
            'category' => 'Healthcare',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Date of Birth
[date* dob] </label>

<label> Gender </label>
[radio gender "Male" "Female" "Other"]

<label> Medical History </label>
[checkbox* medical-history "Diabetes" "Hypertension" "Asthma" "None"]

<label> Upload Insurance Card
[file insurance-card] </label>

<label> Preferred Appointment Date
[date* appointment-date] </label>

[quiz quiz-answer "Quiz: What is 3 + 3? | 6"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New patient intake from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new patient intake:\n\nName: [your-name]\nEmail: [your-email]\nDate of Birth: [dob]\nGender: [gender]\nMedical History: [medical-history]\nPreferred Appointment Date: [appointment-date]\nQuiz Answer: [quiz-answer]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[insurance-card]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'medical_history',
            'name' => __('Medical History Form', 'formzard'),
            'description' => __('A form to collect detailed medical history with various input types.', 'formzard'),
            'category' => 'Healthcare',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Date of Birth
[date* dob] </label>

<label> Gender </label>
[radio gender "Male" "Female" "Other"]

<label> Do you have any of the following conditions? </label>
[checkbox* conditions "Diabetes" "Hypertension" "Asthma" "None"]

<label> Upload Medical Reports
[file medical-reports] </label>

<label> Preferred Appointment Date
[date* appointment-date] </label>

[quiz quiz-answer "Quiz: What is 7 + 3? | 10"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New medical history submission from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new medical history submission:\n\nName: [your-name]\nEmail: [your-email]\nDate of Birth: [dob]\nGender: [gender]\nConditions: [conditions]\nPreferred Appointment Date: [appointment-date]\nQuiz Answer: [quiz-answer]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[medical-reports]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'prescription_refill',
            'name' => __('Prescription Refill Form', 'formzard'),
            'description' => __('A form to request prescription refills with various input types.', 'formzard'),
            'category' => 'Healthcare',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Prescription Number
[text* prescription-number] </label>

<label> Preferred Refill Date
[date* refill-date] </label>

<label> Pharmacy Location
[select* pharmacy-location "Location 1" "Location 2" "Location 3"] </label>

<label> Do you have any allergies? </label>
[checkbox* allergies "None" "Penicillin" "Aspirin" "Other"]

<label> Upload Prescription
[file* prescription-file] </label>

[quiz quiz-answer "Quiz: What is 2 + 3? | 5"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Request Refill"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New prescription refill request from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new prescription refill request:\n\nName: [your-name]\nEmail: [your-email]\nPrescription Number: [prescription-number]\nPreferred Refill Date: [refill-date]\nPharmacy Location: [pharmacy-location]\nAllergies: [allergies]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[prescription-file]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'health_screening',
            'name' => __('Health Screening Form', 'formzard'),
            'description' => __('A form for health screening with various input types.', 'formzard'),
            'category' => 'Healthcare',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Date of Birth
[date* dob] </label>

<label> Gender </label>
[radio gender "Male" "Female" "Other"]

<label> Do you have any of the following symptoms? </label>
[checkbox* symptoms "Fever" "Cough" "Shortness of Breath" "None"]

<label> Upload Medical Reports (optional)
[file medical-reports] </label>

<label> Preferred Screening Date
[date* screening-date] </label>

[quiz quiz-answer "Quiz: What is 6 + 4? | 10"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New health screening submission from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new health screening submission:\n\nName: [your-name]\nEmail: [your-email]\nDate of Birth: [dob]\nGender: [gender]\nSymptoms: [symptoms]\nPreferred Screening Date: [screening-date]\nQuiz Answer: [quiz-answer]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[medical-reports]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'doctor_feedback',
            'name' => __('Doctor Feedback Form', 'formzard'),
            'description' => __('A form to collect feedback about doctors with various input types.', 'formzard'),
            'category' => 'Healthcare',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Doctor\'s Name
[text* doctor-name] </label>

<label> Rate the Doctor </label>
[radio doctor-rating "1 Star" "2 Stars" "3 Stars" "4 Stars" "5 Stars"]

<label> Date of Visit
[date* visit-date] </label>

<label> What did you like about the doctor? </label>
[checkbox* likes "Professionalism" "Communication" "Knowledge" "Punctuality"]

<label> Additional Comments
[textarea comments] </label>

<label> Upload a photo (optional)
[file feedback-photo] </label>

[quiz quiz-answer "Quiz: What is 3 + 2? | 5"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit Feedback"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New doctor feedback from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have new doctor feedback:\n\nName: [your-name]\nEmail: [your-email]\nDoctor\'s Name: [doctor-name]\nRating: [doctor-rating]\nDate of Visit: [visit-date]\nLikes: [likes]\nComments: [comments]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[feedback-photo]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'travel_inquiry',
            'name' => __('Travel Inquiry Form', 'formzard'),
            'description' => __('A form to inquire about travel packages with various input types.', 'formzard'),
            'category' => 'Travel and Hospitality',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Preferred Travel Destination
[select* travel-destination "Paris" "New York" "Tokyo" "Sydney"] </label>

<label> Travel Dates </label>
[date* travel-start-date] to [date* travel-end-date]

<label> Travel Package </label>
[radio travel-package "Standard" "Deluxe" "Luxury"]

<label> Additional Services </label>
[checkbox* additional-services "Airport Pickup" "Guided Tours" "Travel Insurance"]

<label> Upload Passport Copy
[file passport-copy] </label>

[quiz quiz-answer "Quiz: What is the capital of Japan? | Tokyo"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit Inquiry"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New travel inquiry from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new travel inquiry:\n\nName: [your-name]\nEmail: [your-email]\nPreferred Destination: [travel-destination]\nTravel Dates: [travel-start-date] to [travel-end-date]\nTravel Package: [travel-package]\nAdditional Services: [additional-services]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[passport-copy]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'tour_package_request',
            'name' => __('Tour Package Request Form', 'formzard'),
            'description' => __('A form to request tour packages with various input types.', 'formzard'),
            'category' => 'Travel and Hospitality',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Select Tour Package
[select* tour-package "Adventure" "Relaxation" "Cultural" "Family"] </label>

<label> Preferred Travel Dates </label>
[date* travel-start-date] to [date* travel-end-date]

<label> Additional Services </label>
[checkbox* additional-services "Airport Pickup" "Guided Tours" "Travel Insurance"]

<label> Upload Passport Copy
[file passport-copy] </label>

[quiz quiz-answer "Quiz: What is the capital of Italy? | Rome"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Request Tour Package"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New tour package request from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new tour package request:\n\nName: [your-name]\nEmail: [your-email]\nTour Package: [tour-package]\nTravel Dates: [travel-start-date] to [travel-end-date]\nAdditional Services: [additional-services]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[passport-copy]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'room_reservation',
            'name' => __('Room Reservation Form', 'formzard'),
            'description' => __('A form to reserve a room with various input types.', 'formzard'),
            'category' => 'Travel and Hospitality',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Room Type
[select* room-type "Single" "Double" "Suite"] </label>

<label> Check-in Date
[date* checkin-date] </label>

<label> Check-out Date
[date* checkout-date] </label>

<label> Additional Services </label>
[checkbox* additional-services "Breakfast" "Airport Pickup" "Gym Access"]

<label> Upload ID Proof
[file* id-proof] </label>

[quiz quiz-answer "Quiz: What is 5 + 5? | 10"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Reserve Room"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New room reservation from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new room reservation:\n\nName: [your-name]\nEmail: [your-email]\nRoom Type: [room-type]\nCheck-in Date: [checkin-date]\nCheck-out Date: [checkout-date]\nAdditional Services: [additional-services]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[id-proof]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'vacation_planning',
            'name' => __('Vacation Planning Form', 'formzard'),
            'description' => __('A form to plan your vacation with various input types.', 'formzard'),
            'category' => 'Travel and Hospitality',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Preferred Destination
[select* destination "Hawaii" "Bali" "Maldives" "Switzerland"] </label>

<label> Travel Dates </label>
[date* travel-start-date] to [date* travel-end-date]

<label> Travel Package </label>
[radio travel-package "Standard" "Deluxe" "Luxury"]

<label> Additional Services </label>
[checkbox* additional-services "Airport Pickup" "Guided Tours" "Travel Insurance"]

<label> Upload Travel Documents
[file travel-documents] </label>

[quiz quiz-answer "Quiz: What is the capital of France? | Paris"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Plan Vacation"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New vacation planning request from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new vacation planning request:\n\nName: [your-name]\nEmail: [your-email]\nPreferred Destination: [destination]\nTravel Dates: [travel-start-date] to [travel-end-date]\nTravel Package: [travel-package]\nAdditional Services: [additional-services]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[travel-documents]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'travel_insurance_claim',
            'name' => __('Travel Insurance Claim Form', 'formzard'),
            'description' => __('A form to submit travel insurance claims with various input types.', 'formzard'),
            'category' => 'Travel and Hospitality',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Policy Number
[text* policy-number] </label>

<label> Claim Type
[select* claim-type "Medical" "Trip Cancellation" "Lost Baggage" "Other"] </label>

<label> Incident Date
[date* incident-date] </label>

<label> Incident Details
[textarea* incident-details] </label>

<label> Upload Supporting Documents
[file* supporting-documents] </label>

[quiz quiz-answer "Quiz: What is 7 + 2? | 9"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit Claim"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New travel insurance claim from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new travel insurance claim:\n\nName: [your-name]\nEmail: [your-email]\nPolicy Number: [policy-number]\nClaim Type: [claim-type]\nIncident Date: [incident-date]\nDetails: [incident-details]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[supporting-documents]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'property_inquiry',
            'name' => __('Property Inquiry Form', 'formzard'),
            'description' => __('A form to inquire about properties with various input types.', 'formzard'),
            'category' => 'Real Estate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Property Type
[select* property-type "Apartment" "House" "Commercial"] </label>

<label> Preferred Contact Method </label>
[radio contact-method "Email" "Phone"]

<label> Inquiry Details
[textarea inquiry-details] </label>

<label> Attach Supporting Documents (optional)
[file supporting-documents] </label>

[quiz quiz-answer "Quiz: What is 10 + 10? | 20"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit Inquiry"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New property inquiry from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new property inquiry:\n\nName: [your-name]\nEmail: [your-email]\nProperty Type: [property-type]\nPreferred Contact Method: [contact-method]\nDetails: [inquiry-details]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[supporting-documents]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'rental_application',
            'name' => __('Rental Application Form', 'formzard'),
            'description' => __('A form for rental applications with various input types.', 'formzard'),
            'category' => 'Real Estate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Desired Move-in Date
[date* move-in-date] </label>

<label> Rental Type
[select* rental-type "Apartment" "House" "Condo"] </label>

<label> Do you have pets? </label>
[radio pets "Yes" "No"]

<label> Upload ID Proof
[file* id-proof] </label>

<label> Additional Comments
[textarea comments] </label>

[quiz quiz-answer "Quiz: What is 4 + 4? | 8"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit Application"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New rental application from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new rental application:\n\nName: [your-name]\nEmail: [your-email]\nDesired Move-in Date: [move-in-date]\nRental Type: [rental-type]\nPets: [pets]\nComments: [comments]\nQuiz Answer: [quiz-answer]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[id-proof]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'mortgage_prequalification',
            'name' => __('Mortgage Prequalification Form', 'formzard'),
            'description' => __('A form to prequalify for a mortgage with various input types.', 'formzard'),
            'category' => 'Real Estate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Loan Amount
[number* loan-amount] </label>

<label> Property Type
[select* property-type "Single Family Home" "Condo" "Townhouse" "Multi-Family"] </label>

<label> Employment Status </label>
[radio employment-status "Employed" "Self-Employed" "Unemployed" "Retired"]

<label> Annual Income
[number* annual-income] </label>

<label> Credit Score </label>
[radio credit-score "Excellent (750+)" "Good (700-749)" "Fair (650-699)" "Poor (<650)"]

<label> Preferred Contact Method </label>
[radio contact-method "Email" "Phone"]

<label> Upload Financial Documents
[file* financial-documents] </label>

[quiz quiz-answer "Quiz: What is 5 + 3? | 8"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Prequalify"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New mortgage prequalification from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new mortgage prequalification:\n\nName: [your-name]\nEmail: [your-email]\nLoan Amount: [loan-amount]\nProperty Type: [property-type]\nEmployment Status: [employment-status]\nAnnual Income: [annual-income]\nCredit Score: [credit-score]\nPreferred Contact Method: [contact-method]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[financial-documents]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'real_estate_agent_contact',
            'name' => __('Real Estate Agent Contact Form', 'formzard'),
            'description' => __('A form to contact a real estate agent with various input types.', 'formzard'),
            'category' => 'Real Estate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Preferred Contact Method </label>
[radio contact-method "Email" "Phone"]

<label> Property Type
[select* property-type "Apartment" "House" "Commercial"] </label>

<label> Budget Range </label>
[checkbox* budget-range "Under $100,000" "$100,000 - $300,000" "Above $300,000"]

<label> Preferred Contact Date
[date* contact-date] </label>

<label> Upload Supporting Documents (optional)
[file supporting-documents] </label>

[quiz quiz-answer "Quiz: What is 6 + 4? | 10"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Contact Agent"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New contact request from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new contact request:\n\nName: [your-name]\nEmail: [your-email]\nPreferred Contact Method: [contact-method]\nProperty Type: [property-type]\nBudget Range: [budget-range]\nPreferred Contact Date: [contact-date]\nQuiz Answer: [quiz-answer]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[supporting-documents]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'lease_agreement',
            'name' => __('Lease Agreement Form', 'formzard'),
            'description' => __('A form to submit lease agreements with various input types.', 'formzard'),
            'category' => 'Real Estate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Lease Start Date
[date* lease-start-date] </label>

<label> Lease End Date
[date* lease-end-date] </label>

<label> Property Type
[select* property-type "Apartment" "House" "Condo"] </label>

<label> Do you have pets? </label>
[radio pets "Yes" "No"]

<label> Upload Lease Document
[file* lease-document] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[quiz quiz-answer "Quiz: What is 7 + 5? | 12"]

[submit "Submit Lease"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New lease agreement from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new lease agreement submission:\n\nName: [your-name]\nEmail: [your-email]\nLease Start Date: [lease-start-date]\nLease End Date: [lease-end-date]\nProperty Type: [property-type]\nPets: [pets]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[lease-document]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'property_viewing_request',
            'name' => __('Property Viewing Request Form', 'formzard'),
            'description' => __('A form to request property viewings with various input types.', 'formzard'),
            'category' => 'Real Estate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Preferred Viewing Date
[date* viewing-date] </label>

<label> Property Type
[select* property-type "Apartment" "House" "Commercial"] </label>

<label> Preferred Contact Method </label>
[radio contact-method "Email" "Phone"]

<label> Additional Services </label>
[checkbox* additional-services "Virtual Tour" "In-Person Tour" "Agent Assistance"]

<label> Upload Supporting Documents (optional)
[file supporting-documents] </label>

[quiz quiz-answer "Quiz: What is 8 + 2? | 10"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Request Viewing"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New property viewing request from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new property viewing request:\n\nName: [your-name]\nEmail: [your-email]\nPreferred Viewing Date: [viewing-date]\nProperty Type: [property-type]\nPreferred Contact Method: [contact-method]\nAdditional Services: [additional-services]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[supporting-documents]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'home_valuation_request',
            'name' => __('Home Valuation Request Form', 'formzard'),
            'description' => __('A form to request a home valuation with various input types.', 'formzard'),
            'category' => 'Real Estate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Property Type
[select* property-type "Single Family Home" "Condo" "Townhouse" "Multi-Family"] </label>

<label> Property Address
[textarea* property-address] </label>

<label> Upload Property Photos
[file property-photos] </label>

<label> Preferred Contact Method </label>
[radio contact-method "Email" "Phone"]

<label> Preferred Valuation Date
[date* valuation-date] </label>

[quiz quiz-answer "Quiz: What is 6 + 2? | 8"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Request Valuation"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New home valuation request from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new home valuation request:\n\nName: [your-name]\nEmail: [your-email]\nProperty Type: [property-type]\nAddress: [property-address]\nPreferred Contact Method: [contact-method]\nPreferred Valuation Date: [valuation-date]\nQuiz Answer: [quiz-answer]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[property-photos]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'tenant_screening',
            'name' => __('Tenant Screening Form', 'formzard'),
            'description' => __('A form for tenant screening with various input types.', 'formzard'),
            'category' => 'Real Estate',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Date of Birth
[date* dob] </label>

<label> Employment Status </label>
[radio employment-status "Employed" "Self-Employed" "Unemployed" "Student"]

<label> Monthly Income
[number* monthly-income] </label>

<label> Do you have any pets? </label>
[radio pets "Yes" "No"]

<label> Upload ID Proof
[file* id-proof] </label>

<label> Upload Proof of Income
[file* income-proof] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[quiz quiz-answer "Quiz: What is 3 + 4? | 7"]

[submit "Submit Application"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New tenant screening application from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new tenant screening application:\n\nName: [your-name]\nEmail: [your-email]\nDate of Birth: [dob]\nEmployment Status: [employment-status]\nMonthly Income: [monthly-income]\nPets: [pets]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[id-proof],[income-proof]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'rsvp_form',
            'name' => __('RSVP Form', 'formzard'),
            'description' => __('A form to RSVP for an event with various input types.', 'formzard'),
            'category' => 'Events and Entertainment',
            'is_premium' => false,
            'form' => '<label> Your name
[text* your-name] </label>

<label> Your email
[email* your-email] </label>

<label> Will you attend? </label>
[radio will-attend "Yes" "No"]

<label> Number of Guests
[number guests] </label>

<label> Meal Preference
[select meal-preference "Vegetarian" "Non-Vegetarian" "Vegan"] </label>

<label> Upload Invitation
[file invitation-file] </label>

[quiz quiz-answer "Quiz: What is 2 + 2? | 4"]

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "RSVP"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New RSVP from [your-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new RSVP:\n\nName: [your-name]\nEmail: [your-email]\nWill Attend: [will-attend]\nNumber of Guests: [guests]\nMeal Preference: [meal-preference]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '[invitation-file]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'sponsorship_request',
            'name' => __('Sponsorship Request Form', 'formzard'),
            'description' => __('A form to request sponsorship with various input types.', 'formzard'),
            'category' => 'Events and Entertainment',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Organization Name
[text* organization-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Event/Project Name
[text* event-project-name] </label>

<label> Event/Project Date
[date* event-project-date] </label>

<label> Event/Project Location
[text* event-project-location] </label>

<label> Brief Description of the Event/Project
[textarea* event-project-description] </label>

<label> Expected Audience/Participants
[number* expected-audience] </label>

<label> Sponsorship Type Requested
[text* sponsorship-type] </label>

<label> Sponsorship Amount Requested
[number* sponsorship-amount] </label>

<label> Benefits for the Sponsor
[textarea* sponsor-benefits] </label>

<label> Advertising and Promotion Plan
[textarea* promotion-plan] </label>

<label> Social Media Links
[textarea social-media-links] </label>

<label> Upload Supporting Documents
[file supporting-documents] </label>

<label> Additional Notes or Comments
[textarea additional-notes] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit Request"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New sponsorship request from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new sponsorship request:\n\nFull Name: [full-name]\nOrganization Name: [organization-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nEvent/Project Name: [event-project-name]\nEvent/Project Date: [event-project-date]\nEvent/Project Location: [event-project-location]\nDescription: [event-project-description]\nExpected Audience: [expected-audience]\nSponsorship Type: [sponsorship-type]\nSponsorship Amount: [sponsorship-amount]\nBenefits: [sponsor-benefits]\nPromotion Plan: [promotion-plan]\nSocial Media Links: [social-media-links]\nAdditional Notes: [additional-notes]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[supporting-documents]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'talent_sponsorship_request',
            'name' => __('Talent Sponsorship Request Form', 'formzard'),
            'description' => __('A form to request sponsorship for talents with various input types.', 'formzard'),
            'category' => 'Events and Entertainment',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Date of Birth
[date* dob] </label>

<label> Address </label>
[text* street-address placeholder "Street Address"]
[text* city placeholder "City"]
[text* state placeholder "State/Province"]
[text* zip placeholder "Zip/Postal Code"]
[text* country placeholder "Country"]

<label> Talent/Skill Category
[text* talent-category] </label>

<label> Brief Description of Talent/Skill
[textarea* talent-description] </label>

<label> Years of Experience
[number* years-experience] </label>

<label> Social Media Links or Portfolio URL
[url* social-media-links] </label>

<label> Availability </label>
[radio availability "Full-time" "Part-time" "Flexible"]

<label> Upload Resume or Supporting Documents
[file* resume] </label>

<label> References (optional)
[textarea references] </label>

<label> Additional Comments
[textarea additional-comments] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit Request"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New talent sponsorship request from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new talent sponsorship request:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nDate of Birth: [dob]\nAddress: [street-address], [city], [state], [zip], [country]\nTalent/Skill Category: [talent-category]\nDescription: [talent-description]\nYears of Experience: [years-experience]\nSocial Media Links: [social-media-links]\nAvailability: [availability]\nReferences: [references]\nAdditional Comments: [additional-comments]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[resume]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'ticket_purchase',
            'name' => __('Ticket Purchase Form', 'formzard'),
            'description' => __('A form to purchase tickets with various input fields.', 'formzard'),
            'category' => 'Events and Entertainment',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Event Name
[text* event-name] </label>

<label> Event Date
[date* event-date] </label>

<label> Number of Tickets
[number* number-of-tickets] </label>

<label> Ticket Type
[select* ticket-type "General Admission" "VIP"] </label>

<label> Payment Method
[select* payment-method "Credit Card" "PayPal"] </label>

<label> Billing Address </label>
[text* street-address placeholder "Street Address"]
[text* city placeholder "City"]
[text* state placeholder "State/Province"]
[text* zip placeholder "Zip/Postal Code"]
[text* country placeholder "Country"]

<label> Additional Notes or Special Requests
[textarea additional-notes] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Purchase Ticket"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New ticket purchase from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new ticket purchase:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nEvent Name: [event-name]\nEvent Date: [event-date]\nNumber of Tickets: [number-of-tickets]\nTicket Type: [ticket-type]\nPayment Method: [payment-method]\nBilling Address: [street-address], [city], [state], [zip], [country]\nAdditional Notes: [additional-notes]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'vendor_registration',
            'name' => __('Vendor Registration Form', 'formzard'),
            'description' => __('A form for vendor registration with various input fields.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Vendor Name
[text* vendor-name] </label>

<label> Contact Person\'s Full Name
[text* contact-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Business Address </label>
[text* street-address placeholder "Street Address"]
[text* city placeholder "City"]
[text* state placeholder "State/Province"]
[text* zip placeholder "Zip/Postal Code"]
[text* country placeholder "Country"]

<label> Business Website or Social Media Links
[url business-website] </label>

<label> Type of Products/Services Offered
[textarea* products-services] </label>

<label> Tax Identification Number (if applicable)
[text tax-id] </label>

<label> Upload Business License or Certifications
[file* business-license] </label>

<label> Preferred Payment Method
[select* payment-method "Bank Transfer" "PayPal"] </label>

<label> Bank Account Details (optional)
[textarea bank-details] </label>

<label> Additional Notes or Comments
[textarea additional-notes] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Register"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New vendor registration from [vendor-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new vendor registration:\n\nVendor Name: [vendor-name]\nContact Person\'s Full Name: [contact-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nBusiness Address: [street-address], [city], [state], [zip], [country]\nBusiness Website: [business-website]\nType of Products/Services Offered: [products-services]\nTax Identification Number: [tax-id]\nPreferred Payment Method: [payment-method]\nBank Account Details: [bank-details]\nAdditional Notes: [additional-notes]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[business-license]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'workshop_signup',
            'name' => __('Workshop Signup Form', 'formzard'),
            'description' => __('A form to sign up for workshops with various input fields.', 'formzard'),
            'category' => 'Events and Entertainment',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Workshop Title
[text* workshop-title] </label>

<label> Preferred Workshop Date/Session
[date* workshop-date] </label>

<label> Profession/Occupation (optional)
[text profession] </label>

<label> Level of Experience
[select* experience-level "Beginner" "Intermediate" "Advanced"] </label>

<label> Special Requirements or Accessibility Needs
[textarea special-requirements] </label>

<label> Payment Method (if applicable)
[select payment-method "Credit Card" "PayPal" "Bank Transfer"] </label>

<label> Additional Notes or Questions
[textarea additional-notes] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Sign Up"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New workshop signup from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new workshop signup:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nWorkshop Title: [workshop-title]\nPreferred Workshop Date/Session: [workshop-date]\nProfession/Occupation: [profession]\nLevel of Experience: [experience-level]\nSpecial Requirements: [special-requirements]\nPayment Method: [payment-method]\nAdditional Notes: [additional-notes]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'event_feedback',
            'name' => __('Event Feedback Form', 'formzard'),
            'description' => __('A form to collect feedback for events with various input fields.', 'formzard'),
            'category' => 'Events and Entertainment',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Event Name
[text* event-name] </label>

<label> Event Date
[date* event-date] </label>

<label> Feedback Rating </label>
[radio feedback-rating "1 Star" "2 Stars" "3 Stars" "4 Stars" "5 Stars"]

<label> Comments
[textarea comments] </label>

[acceptance consent] I agree to be contacted regarding my feedback. [/acceptance]

<label> Upload File (optional)
[file file-upload] </label>

[submit "Submit Feedback"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New event feedback from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have new event feedback:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nEvent Name: [event-name]\nEvent Date: [event-date]\nFeedback Rating: [feedback-rating]\nComments: [comments]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[file-upload]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'contest_entry',
            'name' => __('Contest Entry Form', 'formzard'),
            'description' => __('A form to submit entries for a contest with various input fields.', 'formzard'),
            'category' => 'Events and Entertainment',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Contest Name
[text* contest-name] </label>

<label> Contest Category
[select* contest-category "Category 1" "Category 2" "Category 3"] </label>

<label> Entry Description
[textarea* entry-description] </label>

<label> Upload Entry File
[file* entry-file] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit Entry"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New contest entry from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new contest entry:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nContest Name: [contest-name]\nContest Category: [contest-category]\nEntry Description: [entry-description]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[entry-file]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'media_accreditation',
            'name' => __('Media Accreditation Form', 'formzard'),
            'description' => __('A form to request media accreditation with various input fields.', 'formzard'),
            'category' => 'Events and Entertainment',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Organization Name
[text* organization-name] </label>

<label> Job Title
[text* job-title] </label>

<label> Media Type
[select* media-type "Print" "Broadcast" "Online" "Other"] </label>

<label> Accreditation Type
[select* accreditation-type "Press" "Photographer" "Videographer" "Other"] </label>

<label> Event Name
[text* event-name] </label>

<label> Event Date
[date* event-date] </label>

<label> Upload ID
[file* id-upload] </label>

[acceptance terms] I agree to the terms and conditions [/acceptance]

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New media accreditation request from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new media accreditation request:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nOrganization Name: [organization-name]\nJob Title: [job-title]\nMedia Type: [media-type]\nAccreditation Type: [accreditation-type]\nEvent Name: [event-name]\nEvent Date: [event-date]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[id-upload]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'bug_report',
            'name' => __('Bug Report Form', 'formzard'),
            'description' => __('A form to report bugs with various input fields.', 'formzard'),
            'category' => 'Technology and Development',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel phone-number] </label>

<label> Bug Title
[text* bug-title] </label>

<label> Bug Description
[textarea* bug-description] </label>

<label> Steps to Reproduce
[textarea* steps-to-reproduce] </label>

<label> Severity Level
[select* severity-level "Low" "Medium" "High" "Critical"] </label>

<label> Affected Platform/Browser
[text* affected-platform] </label>

<label> Screenshot Upload
[file screenshot-upload] </label>

[acceptance consent] I consent to be contacted regarding this bug report. [/acceptance]

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New bug report from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new bug report:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nBug Title: [bug-title]\nBug Description: [bug-description]\nSteps to Reproduce: [steps-to-reproduce]\nSeverity Level: [severity-level]\nAffected Platform/Browser: [affected-platform]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[screenshot-upload]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'feature_request',
            'name' => __('Feature Request Form', 'formzard'),
            'description' => __('A form to request new features with various input fields.', 'formzard'),
            'category' => 'Technology and Development',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel phone-number] </label>

<label> Feature Title
[text* feature-title] </label>

<label> Feature Description
[textarea* feature-description] </label>

<label> Purpose/Use Case
[textarea* purpose-use-case] </label>

<label> Priority Level
[select* priority-level "Low" "Medium" "High" "Critical"] </label>

<label> Affected Product/Module
[text* affected-product] </label>

<label> Supporting File Upload
[file supporting-file] </label>

[acceptance consent] I consent to be contacted regarding this feature request. [/acceptance]

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New feature request from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new feature request:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nFeature Title: [feature-title]\nFeature Description: [feature-description]\nPurpose/Use Case: [purpose-use-case]\nPriority Level: [priority-level]\nAffected Product/Module: [affected-product]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[supporting-file]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'beta_tester_signup',
            'name' => __('Beta Tester Signup Form', 'formzard'),
            'description' => __('A form to sign up as a beta tester with various input fields.', 'formzard'),
            'category' => 'Technology and Development',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel phone-number] </label>

<label> Organization Name (if applicable)
[text organization-name] </label>

<label> Job Title
[text job-title] </label>

<label> Preferred Testing Platform/Device
[text* testing-platform] </label>

<label> Technical Skills/Experience
[textarea* technical-skills] </label>

<label> Availability
[select* availability "Full-time" "Part-time" "Flexible"] </label>

[acceptance nda-consent] I agree to the Non-Disclosure Agreement (NDA). [/acceptance]

<label> Additional Comments
[textarea additional-comments] </label>

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New beta tester signup from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new beta tester signup:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nOrganization Name: [organization-name]\nJob Title: [job-title]\nPreferred Testing Platform/Device: [testing-platform]\nTechnical Skills/Experience: [technical-skills]\nAvailability: [availability]\nAdditional Comments: [additional-comments]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'software_download_request',
            'name' => __('Software Download Request Form', 'formzard'),
            'description' => __('A form to request software downloads with various input fields.', 'formzard'),
            'category' => 'Technology and Development',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel phone-number] </label>

<label> Organization Name
[text organization-name] </label>

<label> Job Title
[text job-title] </label>

<label> Software Name
[text* software-name] </label>

<label> Intended Use
[textarea* intended-use] </label>

<label> Operating System
[select* operating-system "Windows" "MacOS" "Linux"] </label>

<label> Version Required
[text version-required] </label>

[acceptance consent] I agree to the terms and conditions. [/acceptance]

[submit "Submit Request"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New software download request from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new software download request:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nOrganization Name: [organization-name]\nJob Title: [job-title]\nSoftware Name: [software-name]\nIntended Use: [intended-use]\nOperating System: [operating-system]\nVersion Required: [version-required]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'api_access_request',
            'name' => __('API Access Request Form', 'formzard'),
            'description' => __('A form to request API access with various input fields.', 'formzard'),
            'category' => 'Technology and Development',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Organization Name
[text* organization-name] </label>

<label> Job Title
[text job-title] </label>

<label> API Purpose/Use Case
[textarea* api-purpose] </label>

<label> Project Description
[textarea* project-description] </label>

<label> Expected Usage Volume
[number* usage-volume] </label>

<label> IP Address for Whitelisting
[text* ip-address] </label>

[acceptance consent] I agree to the terms and conditions. [/acceptance]

[submit "Submit Request"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New API access request from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new API access request:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nOrganization Name: [organization-name]\nJob Title: [job-title]\nAPI Purpose/Use Case: [api-purpose]\nProject Description: [project-description]\nExpected Usage Volume: [usage-volume]\nIP Address: [ip-address]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'website_maintenance_request',
            'name' => __('Website Maintenance Request Form', 'formzard'),
            'description' => __('A form to request website maintenance with various input fields.', 'formzard'),
            'category' => 'Technology and Development',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Website URL
[url* website-url] </label>

<label> Issue Description
[textarea* issue-description] </label>

<label> Priority Level
[select* priority-level "Low" "Medium" "High" "Critical"] </label>

<label> Request Type
[select* request-type "Bug Fix" "Feature Update" "Content Update" "Other"] </label>

<label> Supporting File Upload
[file supporting-file] </label>

[acceptance consent] I agree to the terms and conditions. [/acceptance]

[submit "Submit Request"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New website maintenance request from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new website maintenance request:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nWebsite URL: [website-url]\nIssue Description: [issue-description]\nPriority Level: [priority-level]\nRequest Type: [request-type]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[supporting-file]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'security_incident_report',
            'name' => __('Security Incident Report Form', 'formzard'),
            'description' => __('A form to report security incidents with various input fields.', 'formzard'),
            'category' => 'Technology and Development',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Incident Title
[text* incident-title] </label>

<label> Incident Date and Time
[date* incident-datetime] </label>

<label> Affected System/Area
[text* affected-system] </label>

<label> Incident Description
[textarea* incident-description] </label>

<label> Steps Taken
[textarea* steps-taken] </label>

<label> Severity Level
[select* severity-level "Low" "Medium" "High" "Critical"] </label>

<label> Supporting Evidence Upload
[file supporting-evidence] </label>

[acceptance consent] I consent to be contacted regarding this incident report. [/acceptance]

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New security incident report from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new security incident report:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nIncident Title: [incident-title]\nIncident Date and Time: [incident-datetime]\nAffected System/Area: [affected-system]\nIncident Description: [incident-description]\nSteps Taken: [steps-taken]\nSeverity Level: [severity-level]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[supporting-evidence]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'demo_request',
            'name' => __('Demo Request Form', 'formzard'),
            'description' => __('A form to request a demo with various input fields.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Organization Name
[text* organization-name] </label>

<label> Job Title
[text* job-title] </label>

<label> Product/Service of Interest
[text* product-interest] </label>

<label> Preferred Demo Date and Time
[date* demo-datetime] </label>

<label> Specific Requirements or Questions
[textarea specific-requirements] </label>

[acceptance consent] I consent to be contacted regarding this demo request. [/acceptance]

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New demo request from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new demo request:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nOrganization Name: [organization-name]\nJob Title: [job-title]\nProduct/Service of Interest: [product-interest]\nPreferred Demo Date and Time: [demo-datetime]\nSpecific Requirements or Questions: [specific-requirements]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'saas_subscription',
            'name' => __('SaaS Subscription Form', 'formzard'),
            'description' => __('A form to subscribe to a SaaS service with various input fields.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Organization Name
[text* organization-name] </label>

<label> Job Title
[text* job-title] </label>

<label> Subscription Plan
[select* subscription-plan "Basic" "Standard" "Premium"] </label>

<label> Number of Users
[number* number-of-users] </label>

<label> Payment Method
[select* payment-method "Credit Card" "PayPal"] </label>

<label> Billing Address </label>
[text* street-address placeholder "Street Address"]
[text* city placeholder "City"]
[text* state placeholder "State/Province"]
[text* zip placeholder "Zip/Postal Code"]
[text* country placeholder "Country"]

<label> Additional Comments
[textarea additional-comments] </label>

[acceptance consent] I agree to the terms and conditions. [/acceptance]

[submit "Subscribe"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New SaaS subscription from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new SaaS subscription:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nOrganization Name: [organization-name]\nJob Title: [job-title]\nSubscription Plan: [subscription-plan]\nNumber of Users: [number-of-users]\nPayment Method: [payment-method]\nBilling Address: [street-address], [city], [state], [zip], [country]\nAdditional Comments: [additional-comments]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'project_brief',
            'name' => __('Project Brief Form', 'formzard'),
            'description' => __('A form to submit a project brief with various input fields.', 'formzard'),
            'category' => 'Creative and Freelancing',
            'is_premium' => false,
            'form' => '<label> Project Title
[text* project-title] </label>

<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Organization Name
[text organization-name] </label>

<label> Project Goals
[textarea* project-goals] </label>

<label> Target Audience
[textarea* target-audience] </label>

<label> Budget Range
[select* budget-range "Under $10,000" "$10,000 - $50,000" "Above $50,000"] </label>

<label> Deadline/Timeline
[date* deadline] </label>

<label> Key Requirements
[textarea* key-requirements] </label>

<label> Additional Notes
[textarea additional-notes] </label>

<label> File Upload
[file file-upload] </label>

[acceptance consent] I agree to the terms and conditions [/acceptance]

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New project brief from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new project brief:\n\nProject Title: [project-title]\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nOrganization Name: [organization-name]\nProject Goals: [project-goals]\nTarget Audience: [target-audience]\nBudget Range: [budget-range]\nDeadline/Timeline: [deadline]\nKey Requirements: [key-requirements]\nAdditional Notes: [additional-notes]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[file-upload]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'portfolio_submission',
            'name' => __('Portfolio Submission Form', 'formzard'),
            'description' => __('A form to submit portfolios with various input fields.', 'formzard'),
            'category' => 'Creative and Freelancing',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Portfolio Title
[text* portfolio-title] </label>

<label> Portfolio Description
[textarea* portfolio-description] </label>

<label> Category/Industry
[select* category "Design" "Photography" "Writing" "Development" "Other"] </label>

<label> Website URL (if applicable)
[url website-url] </label>

<label> File Upload
[file* portfolio-file] </label>

<label> Additional Comments
[textarea additional-comments] </label>

[acceptance consent] I agree to the terms and conditions [/acceptance]

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New portfolio submission from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new portfolio submission:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nPortfolio Title: [portfolio-title]\nDescription: [portfolio-description]\nCategory/Industry: [category]\nWebsite URL: [website-url]\nAdditional Comments: [additional-comments]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[portfolio-file]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'collaboration_request',
            'name' => __('Collaboration Request Form', 'formzard'),
            'description' => __('A form to request collaboration with various input fields.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Organization Name
[text organization-name] </label>

<label> Job Title
[text job-title] </label>

<label> Collaboration Type
[select* collaboration-type "Partnership" "Sponsorship" "Joint Venture" "Other"] </label>

<label> Project/Idea Description
[textarea* project-description] </label>

<label> Goals and Expectations
[textarea* goals-expectations] </label>

<label> Preferred Communication Method </label>
[radio communication-method "Email" "Phone"]

<label> Supporting File Upload
[file supporting-file] </label>

[acceptance consent] I agree to the terms and conditions [/acceptance]

[submit "Submit Request"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New collaboration request from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new collaboration request:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nOrganization Name: [organization-name]\nJob Title: [job-title]\nCollaboration Type: [collaboration-type]\nProject/Idea Description: [project-description]\nGoals and Expectations: [goals-expectations]\nPreferred Communication Method: [communication-method]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[supporting-file]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'artwork_commission',
            'name' => __('Artwork Commission Form', 'formzard'),
            'description' => __('A form to commission artwork with various input fields.', 'formzard'),
            'category' => 'Creative and Freelancing',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Artwork Title/Theme
[text* artwork-title] </label>

<label> Description of Request
[textarea* description-request] </label>

<label> Preferred Style
[select* preferred-style "Realism" "Abstract" "Impressionism" "Surrealism" "Other"] </label>

<label> Dimensions/Size
[text* dimensions-size] </label>

<label> Deadline
[date* deadline] </label>

<label> Budget
[number* budget] </label>

<label> Reference Image Upload
[file reference-image] </label>

<label> Additional Comments
[textarea additional-comments] </label>

[acceptance consent] I agree to the terms and conditions [/acceptance]

[submit "Submit Request"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New artwork commission request from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new artwork commission request:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nArtwork Title/Theme: [artwork-title]\nDescription of Request: [description-request]\nPreferred Style: [preferred-style]\nDimensions/Size: [dimensions-size]\nDeadline: [deadline]\nBudget: [budget]\nAdditional Comments: [additional-comments]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[reference-image]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'photography_booking',
            'name' => __('Photography Booking Form', 'formzard'),
            'description' => __('A form to book photography services with various input fields.', 'formzard'),
            'category' => 'Creative and Freelancing',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Event Type
[select* event-type "Wedding" "Birthday" "Corporate Event" "Other"] </label>

<label> Event Date and Time
[date* event-datetime] </label>

<label> Event Location
[text* event-location] </label>

<label> Photography Package
[select* photography-package "Basic" "Standard" "Premium"] </label>

<label> Additional Services </label>
[checkbox* additional-services "Photo Album" "Video Coverage" "Drone Photography"]

<label> Special Requests
[textarea special-requests] </label>

[acceptance consent] I agree to the terms and conditions [/acceptance]

[submit "Submit Booking"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New photography booking from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new photography booking:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nEvent Type: [event-type]\nEvent Date and Time: [event-datetime]\nEvent Location: [event-location]\nPhotography Package: [photography-package]\nAdditional Services: [additional-services]\nSpecial Requests: [special-requests]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'design_feedback',
            'name' => __('Design Feedback Form', 'formzard'),
            'description' => __('A form to collect feedback on design projects with various input fields.', 'formzard'),
            'category' => 'Creative and Freelancing',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel phone-number] </label>

<label> Project Name
[text* project-name] </label>

<label> Design Type
[select* design-type "Logo" "Website" "Brochure" "Other"] </label>

<label> Feedback Description
[textarea* feedback-description] </label>

<label> Areas for Improvement
[textarea areas-for-improvement] </label>

<label> Satisfaction Level </label>
[radio satisfaction-level "Very Satisfied" "Satisfied" "Neutral" "Dissatisfied" "Very Dissatisfied"]

<label> Supporting File Upload
[file supporting-file] </label>

<label> Additional Comments
[textarea additional-comments] </label>

[acceptance consent] I consent to be contacted regarding my feedback. [/acceptance]

[submit "Submit Feedback"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New design feedback from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have new design feedback:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nProject Name: [project-name]\nDesign Type: [design-type]\nFeedback Description: [feedback-description]\nAreas for Improvement: [areas-for-improvement]\nSatisfaction Level: [satisfaction-level]\nAdditional Comments: [additional-comments]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[supporting-file]',
                'use_html' => false
            ]
        ],
        [
            'id' => 'copyright_release',
            'name' => __('Copyright Release Form', 'formzard'),
            'description' => __('A form to release copyright with various input fields.', 'formzard'),
            'category' => 'Legal and Documentation',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Organization Name (if applicable)
[text organization-name] </label>

<label> Title of Work
[text* title-of-work] </label>

<label> Description of Work
[textarea* description-of-work] </label>

<label> Release Scope
[textarea* release-scope] </label>

<label> Intended Use
[textarea* intended-use] </label>

<label> Date of Agreement
[date* agreement-date] </label>

[acceptance consent] I agree to the terms and conditions. [/acceptance]

<label> Signature
[text* signature] </label>

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New copyright release from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new copyright release:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nOrganization Name: [organization-name]\nTitle of Work: [title-of-work]\nDescription of Work: [description-of-work]\nRelease Scope: [release-scope]\nIntended Use: [intended-use]\nDate of Agreement: [agreement-date]\nSignature: [signature]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'client_onboarding',
            'name' => __('Client Onboarding Form', 'formzard'),
            'description' => __('A form to onboard new clients with various input fields.', 'formzard'),
            'category' => 'Business and Corporate',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Organization Name
[text organization-name] </label>

<label> Job Title
[text job-title] </label>

<label> Business Website
[url business-website] </label>

<label> Industry Type
[select* industry-type "Technology" "Healthcare" "Finance" "Education" "Other"] </label>

<label> Project Goals
[textarea* project-goals] </label>

<label> Budget Range
[select* budget-range "Under $10,000" "$10,000 - $50,000" "Above $50,000"] </label>

<label> Preferred Communication Method </label>
[radio communication-method "Email" "Phone"]

<label> Project Timeline
[date* project-timeline] </label>

<label> Additional Notes
[textarea additional-notes] </label>

[acceptance consent] I agree to the terms and conditions [/acceptance]

[submit "Submit"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New client onboarding from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new client onboarding:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nOrganization Name: [organization-name]\nJob Title: [job-title]\nBusiness Website: [business-website]\nIndustry Type: [industry-type]\nProject Goals: [project-goals]\nBudget Range: [budget-range]\nPreferred Communication Method: [communication-method]\nProject Timeline: [project-timeline]\nAdditional Notes: [additional-notes]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'freelance_application',
            'name' => __('Freelance Application Form', 'formzard'),
            'description' => __('A form for freelancers to apply with their details and expertise.', 'formzard'),
            'category' => 'Creative and Freelancing',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Portfolio Website/Link
[url* portfolio-link] </label>

<label> Skills and Expertise
[textarea* skills-expertise] </label>

<label> Years of Experience
[number* years-experience] </label>

<label> Desired Role/Position
[text* desired-role] </label>

<label> Availability
[select* availability "Full-time" "Part-time" "Freelance"] </label>

<label> Expected Rate
[text* expected-rate] </label>

<label> Additional Comments
[textarea additional-comments] </label>

[acceptance consent] I agree to the terms and conditions [/acceptance]

[submit "Submit Application"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New freelance application from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new freelance application:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nPortfolio Link: [portfolio-link]\nSkills and Expertise: [skills-expertise]\nYears of Experience: [years-experience]\nDesired Role/Position: [desired-role]\nAvailability: [availability]\nExpected Rate: [expected-rate]\nAdditional Comments: [additional-comments]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '',
                'use_html' => false
            ]
        ],
        [
            'id' => 'creative_proposal_submission',
            'name' => __('Creative Proposal Submission Form', 'formzard'),
            'description' => __('A form to submit creative proposals with various input fields.', 'formzard'),
            'category' => 'Creative and Freelancing',
            'is_premium' => false,
            'form' => '<label> Full Name
[text* full-name] </label>

<label> Email Address
[email* email-address] </label>

<label> Phone Number
[tel* phone-number] </label>

<label> Proposal Title
[text* proposal-title] </label>

<label> Proposal Description
[textarea* proposal-description] </label>

<label> Target Audience
[textarea* target-audience] </label>

<label> Goals and Objectives
[textarea* goals-objectives] </label>

<label> Budget Estimate
[number* budget-estimate] </label>

<label> Timeline
[date* timeline] </label>

<label> Supporting File Upload
[file supporting-file] </label>

<label> Additional Comments
[textarea additional-comments] </label>

[acceptance consent] I agree to the terms and conditions [/acceptance]

[submit "Submit Proposal"]',
            'mail' => [
                'active' => true,
                'recipient' => '[_site_admin_email]',
                'subject' => 'New creative proposal submission from [full-name]',
                'sender' => '[_site_title] <' . $default_sender_email . '>',
                'body' => 'You have a new creative proposal submission:\n\nFull Name: [full-name]\nEmail Address: [email-address]\nPhone Number: [phone-number]\nProposal Title: [proposal-title]\nProposal Description: [proposal-description]\nTarget Audience: [target-audience]\nGoals and Objectives: [goals-objectives]\nBudget Estimate: [budget-estimate]\nTimeline: [timeline]\nAdditional Comments: [additional-comments]',
                'additional_headers' => 'Reply-To: [email-address]',
                'attachments' => '[supporting-file]',
                'use_html' => false
            ]
        ]
    ];
}

function formzard_load_template( $template_id ) {
    global $formzard_fs;
    $templates = formzard_get_templates();

    foreach ( $templates as $template ) {
        if ( $template['id'] === $template_id ) {
            if ( $template['is_premium'] && ! $formzard_fs->can_use_premium_code() ) {
                wp_die( __( 'You must purchase a premium license to use this template.', 'formzard' ) );
            }
            return $template;
        }
    }

    wp_die( __( 'Template not found.', 'formzard' ) );
}
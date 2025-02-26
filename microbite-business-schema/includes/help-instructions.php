<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


function mbbsc_instuctions_page() {

$url = !empty($options['url']) ? $options['url'] : get_home_url();
$url_test = esc_url($url);
	
$mbbsc_instructions = <<< END



<div class="wrap">
    <h1>Microbite Business Schema Plugin: Overview</h1>

    <div id="plugin-info">
        
        <p>
            Boost your local business or organization's visibility online with the Microbite Business Schema Plugin, your ally in navigating the complex world of search engine optimization.
        </p>

        <p>
            Specializing in local business and organization schema. </p>
            <p>This plugin provides a straightforward dropdown menu for selecting your exact business type, simplifying the process of tailoring your site's schema markup. 
            </p>
            <p>
            With this targeted approach, your site becomes a beacon for search engines, enhancing your rankings and spotlighting your presence in search engine results pages (SERPs).
        </p>

        <h2>Key Features</h2>

        <ul>
            <li>Specialized support for local business and organization schema types, with a simple dropdown selection process.</li>
            <li>Effortless WordPress admin settings for comprehensive site-wide and specific page markup adjustments.</li>
            <li>Generation of precise JSON-LD format schema, the format most esteemed by search engines for its clarity and impact.</li>
            <li>Access to premier tools and resources for validating the effectiveness and accuracy of your schema markup.</li>
        </ul>

        <h2>Implementation and Validation</h2>

        <p>
            Accuracy in your schema markup is crucial for achieving optimal results. We recommend these tools for thorough validation and testing:
        </p>

        <ul>
            <li>Google's Rich Results Test: <a href="https://search.google.com/test/rich-results?url=$url_test" target="_blank">Test Wesbite</a></li>
            <li>Schema Markup Validator: <a href="https://validator.schema.org/#url=$url_test" target="_blank">Test Tool</a></li>
        </ul>

        <p>
            Regular consultation of the latest plugin documentation and resources is advised to ensure the best outcomes.
        </p>

        <h2>Supported Business Categories</h2>

        <p>The Microbite Business Schema Plugin supports a wide range of local business and organization types. Here are some of the categories you can select from:</p>

        <ul>
            <li><strong>General Business:</strong> Local Business, Animal Shelter, Library, Real-Estate Agent, Travel Agency, etc.</li>
            <li><strong>Automotive Business:</strong> Auto Repair, Auto Dealer, Motorcycle Repair, Auto Parts Store, etc.</li>
            <li><strong>Emergency Services:</strong> Hospital, Fire Station, Police Station.</li>
            <li><strong>Entertainment Business:</strong> Art Gallery, Casino, Comedy Club, Movie Theater, Night Club, etc.</li>
            <li><strong>Financial Service:</strong> Bank or Credit Union, Accounting Service, Insurance Agency.</li>
            <li><strong>Food Establishment:</strong> Bakery, Brewery, Restaurant, Cafe or Coffee Shop, Fast-Food Restaurant, etc.</li>
            <li><strong>Health and Beauty Business:</strong> Beauty Salon, Health Club, Nail Salon, Tattoo Parlor.</li>
            <li><strong>Home and Construction Business:</strong> Electrician, General Contractor, Locksmith, Moving Company, Plumber, etc.</li>
            <li><strong>Legal Service:</strong> Attorney, Notary.</li>
            <li><strong>Lodging Business:</strong> Hotel, Resort, Motel, Bed and Breakfast, Hostel, etc.</li>
            <li><strong>Medical Business:</strong> Dentist, Hospital, Medical Clinic, Physiotherapy, Psychiatry, etc.</li>
            <li><strong>Sports Activity Location:</strong> Golf Course, Health Club, Stadium or Arena, Tennis Complex, etc.</li>
            <li><strong>Store:</strong> Book Store, Clothing Store, Electronics Store, Grocery Store, Pet Store, etc.</li>
        </ul>

        <h2>Choosing the Right Category</h2>

        <p>
            Deciding on the most suitable schema category for your business? Our <a href="https://docs.google.com/spreadsheets/d/1yQASatKzwEJctdwarbXKGiaA9qst0MkIaON9ciFgvzU/edit?usp=sharing" target="_blank">collaborative Google Spreadsheet</a> outlines a variety of business and organization categories, offering an invaluable guide for your selection process.
        </p>
    </div>
</div>

END;

	echo $mbbsc_instructions;
	
        ?>






        <?php

}

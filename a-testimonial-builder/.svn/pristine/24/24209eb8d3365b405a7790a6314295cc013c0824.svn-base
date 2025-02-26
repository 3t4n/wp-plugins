<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
?>
<div class="wrap">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="text-center mb-0">
                    <h1 class="h3 mb-0 font-weight-normal"><?php esc_html_e('My Profile Details', 'a-testimonial-builder'); ?></h1>
                </div>
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="form-horizontal">
                    <?php wp_nonce_field('atbs_settings', 'atbs_nonce'); ?>
                    <input type="hidden" name="action" value="atbs_profile">
                    <div class="form-group">
                        <div class="row row-mb">
                            <div class="col-md-12 col-lg-12 mobile-mt">
                                <label><?php esc_html_e('Email', 'a-testimonial-builder'); ?> *</label>
                                <div class="flex-nw">
                                    <input type="text" id="user-email" class="form-control" name="fields[email]" value="<?php echo esc_attr($profile['email'] ?? '') ?>" readonly="readonly" placeholder="<?php esc_html_e('Enter email', 'a-testimonial-builder'); ?>" aria-required="true" aria-invalid="false">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Name -->
                    <div class="form-group">
                        <div class="row row-mb">
                            <div class="col-md-6 col-lg-6">
                                <label><?php esc_html_e('First Name', 'a-testimonial-builder'); ?></label>
                                <input type="text" id="user-first_name" class="form-control" name="fields[first_name]" value="<?php echo esc_attr($profile['first_name'] ?? '') ?>" placeholder="<?php esc_html_e('Enter first name', 'a-testimonial-builder'); ?>">
                            </div>
                            <div class="col-md-6 col-lg-6 mobile-mt">
                                <label><?php esc_html_e('Last Name', 'a-testimonial-builder'); ?></label>
                                <input type="text" id="user-last_name" class="form-control" name="fields[last_name]" value="<?php echo esc_attr($profile['last_name'] ?? '') ?>" placeholder="<?php esc_html_e('Enter last name', 'a-testimonial-builder'); ?>">
                            </div>

                        </div>
                    </div>

                    <!-- Merchant -->
                    <div class="form-group">
                        <div class="row row-mb">
                            <div class="col-md-6 col-lg-6">
                                <label><?php esc_html_e('Merchant Name', 'a-testimonial-builder'); ?></label>
                                <input type="text" id="user-merchant_name" class="form-control" name="fields[merchant_name]" value="<?php echo esc_attr($profile['merchant_name'] ?? '') ?>" placeholder="<?php esc_html_e('Enter merchant name', 'a-testimonial-builder'); ?>">
                            </div>
                            <div class="col-md-6 col-lg-6 mobile-mt">
                                <label><?php esc_html_e('Merchant Email', 'a-testimonial-builder'); ?></label>
                                <div class="flex-nw">
                                    <input type="text" id="user-merchant_email" class="form-control" name="fields[merchant_email]" value="<?php echo esc_attr($profile['merchant_email'] ?? '') ?>" placeholder="<?php esc_html_e('Enter merchant email', 'a-testimonial-builder'); ?>">
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Phone - Email -->
                    <div class="form-group">
                        <div class="row row-mb">
                            <div class="col-md-6 col-lg-6">
                                <label><?php esc_html_e('Phone', 'a-testimonial-builder'); ?></label>
                                <div class="flex-nw">
                                    <input type="tel" id="user-phone" class="form-control phone" name="fields[phone]" value="<?php echo esc_attr($profile['phone'] ?? '') ?>" autocomplete="off" placeholder="(201) 555-0123">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 mobile-mt">
                                <label><?php esc_html_e('SMS Phone', 'a-testimonial-builder'); ?></label>
                                <div class="flex-nw">
                                    <input type="tel" id="user-sms_phone" class="form-control phone" name="fields[sms_phone]" value="<?php echo esc_attr($profile['sms_phone'] ?? '') ?>" autocomplete="off" placeholder="(201) 555-0123">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- State - Country -->
                    <div class="form-group">
                        <div class="row row-mb">
                            <div class="col-md-6 col-lg-6">
                                <label><?php esc_html_e('State', 'a-testimonial-builder'); ?></label>
                                <input type="text" id="user-state" class="form-control" name="fields[state]" value="<?php echo esc_attr($profile['state'] ?? '') ?>" placeholder="<?php esc_html_e('Enter state', 'a-testimonial-builder'); ?>">
                            </div>
                            <div class="col-md-6 col-lg-6 mobile-mt">
                                <label><?php esc_html_e('Country', 'a-testimonial-builder'); ?></label>
                                <input type="text" id="user-country" class="form-control" name="fields[country]" value="<?php echo esc_attr($profile['country'] ?? '') ?>" placeholder="<?php esc_html_e('Enter country', 'a-testimonial-builder'); ?>">
                            </div>
                        </div>
                    </div>

                    <!-- City - Address -->
                    <div class="form-group">
                        <div class="row row-mb">
                            <div class="col-md-6 col-lg-6">
                                <label><?php esc_html_e('City', 'a-testimonial-builder'); ?></label>
                                <input type="text" id="user-city" class="form-control" name="fields[city]" value="<?php echo esc_attr($profile['city'] ?? '') ?>" placeholder="<?php esc_html_e('Enter city', 'a-testimonial-builder'); ?>">
                            </div>

                            <div class="col-md-6 col-lg-6 mobile-mt">
                                <label><?php esc_html_e('Address', 'a-testimonial-builder'); ?></label>
                                <input type="text" id="user-address" class="form-control" name="fields[address]" value="<?php echo esc_attr($profile['address'] ?? '') ?>" placeholder="<?php esc_html_e('Enter address', 'a-testimonial-builder'); ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Code - Website -->
                    <div class="form-group">
                        <div class="row row-mb">
                            <div class="col-md-6 col-lg-6">
                                <label><?php esc_html_e('Postal Code', 'a-testimonial-builder'); ?></label>
                                <input type="text" id="user-postal_code" class="form-control" name="fields[postal_code]" value="<?php echo esc_attr($profile['postal_code'] ?? '') ?>" placeholder="<?php esc_html_e('Enter postal code', 'a-testimonial-builder'); ?>">
                            </div>
                            <div class="col-md-6 col-lg-6 mobile-mt">
                                <label><?php esc_html_e('Website URL', 'a-testimonial-builder'); ?></label>
                                <input type="text" id="user-website" class="form-control" name="fields[website]" value="<?php echo esc_attr($profile['website'] ?? '') ?>" placeholder="<?php esc_html_e('Enter website url', 'a-testimonial-builder'); ?>">
                            </div>

                        </div>
                    </div>

                    <!-- Video - Category -->
                    <div class="form-group">
                        <div class="row row-mb">
                            <div class="col-md-12 col-lg-12 mobile-mt">
                                <label><?php esc_html_e('Business Category', 'a-testimonial-builder'); ?></label>
                                <select id="user-business_category_id" class="form-control" name="fields[business_category_id]" title="<?php esc_html_e('Choose business category', 'a-testimonial-builder'); ?>">
                                    <optgroup label="<?php esc_html_e('Arts, crafts, and collectibles', 'a-testimonial-builder'); ?>">
                                        <option value="2000"><?php esc_html_e('Antiques', 'a-testimonial-builder'); ?></option>
                                        <option value="2001"><?php esc_html_e('Art and craft supplies', 'a-testimonial-builder'); ?></option>
                                        <option value="2002"><?php esc_html_e('Art dealers and galleries', 'a-testimonial-builder'); ?></option>
                                        <option value="2003"><?php esc_html_e('Camera and photographic supplies', 'a-testimonial-builder'); ?></option>
                                        <option value="2004"><?php esc_html_e('Digital art', 'a-testimonial-builder'); ?></option>
                                        <option value="2006"><?php esc_html_e('Music store (instruments and sheet music)', 'a-testimonial-builder'); ?></option>
                                        <option value="2007"><?php esc_html_e('Sewing, needlework, and fabrics', 'a-testimonial-builder'); ?></option>
                                        <option value="2008"><?php esc_html_e('Stamp and coin', 'a-testimonial-builder'); ?></option>
                                        <option value="2009"><?php esc_html_e('Stationary, printing and writing paper', 'a-testimonial-builder'); ?></option>
                                        <option value="2010"><?php esc_html_e('Vintage and collectibles', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Baby', 'a-testimonial-builder'); ?>">
                                        <option value="2011"><?php esc_html_e('Clothing', 'a-testimonial-builder'); ?></option>
                                        <option value="2012"><?php esc_html_e('Furniture', 'a-testimonial-builder'); ?></option>
                                        <option value="2013"><?php esc_html_e('Baby products (other)', 'a-testimonial-builder'); ?></option>
                                        <option value="2014"><?php esc_html_e('Safety and health', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Beauty and fragrances', 'a-testimonial-builder'); ?>">
                                        <option value="2015"><?php esc_html_e('Bath and body', 'a-testimonial-builder'); ?></option>
                                        <option value="2016"><?php esc_html_e('Fragrances and perfumes', 'a-testimonial-builder'); ?></option>
                                        <option value="2017"><?php esc_html_e('Makeup and cosmetics', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Books and magazines', 'a-testimonial-builder'); ?>">
                                        <option value="2018"><?php esc_html_e('Audio books', 'a-testimonial-builder'); ?></option>
                                        <option value="2019"><?php esc_html_e('Digital content', 'a-testimonial-builder'); ?></option>
                                        <option value="2020"><?php esc_html_e('Educational and textbooks', 'a-testimonial-builder'); ?></option>
                                        <option value="2021"><?php esc_html_e('Fiction and nonfiction', 'a-testimonial-builder'); ?></option>
                                        <option value="2022"><?php esc_html_e('Magazines', 'a-testimonial-builder'); ?></option>
                                        <option value="2023"><?php esc_html_e('Publishing and printing', 'a-testimonial-builder'); ?></option>
                                        <option value="2024"><?php esc_html_e('Rare and used books', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Business to business', 'a-testimonial-builder'); ?>">
                                        <option value="2025"><?php esc_html_e('Accounting', 'a-testimonial-builder'); ?></option>
                                        <option value="2026"><?php esc_html_e('Advertising', 'a-testimonial-builder'); ?></option>
                                        <option value="2027"><?php esc_html_e('Agricultural', 'a-testimonial-builder'); ?></option>
                                        <option value="2028"><?php esc_html_e('Architectural, engineering, and surveying services', 'a-testimonial-builder'); ?></option>
                                        <option value="2029"><?php esc_html_e('Chemicals and allied products', 'a-testimonial-builder'); ?></option>
                                        <option value="2030"><?php esc_html_e('Commercial photography, art, and graphics', 'a-testimonial-builder'); ?></option>
                                        <option value="2031"><?php esc_html_e('Construction', 'a-testimonial-builder'); ?></option>
                                        <option value="2032"><?php esc_html_e('Consulting services', 'a-testimonial-builder'); ?></option>
                                        <option value="2033"><?php esc_html_e('Educational services', 'a-testimonial-builder'); ?></option>
                                        <option value="2034"><?php esc_html_e('Equipment rentals and leasing services', 'a-testimonial-builder'); ?></option>
                                        <option value="2035"><?php esc_html_e('Equipment repair services', 'a-testimonial-builder'); ?></option>
                                        <option value="2036"><?php esc_html_e('Hiring services', 'a-testimonial-builder'); ?></option>
                                        <option value="2037"><?php esc_html_e('Industrial and manufacturing supplies', 'a-testimonial-builder'); ?></option>
                                        <option value="2038"><?php esc_html_e('Mailing lists', 'a-testimonial-builder'); ?></option>
                                        <option value="2039"><?php esc_html_e('Marketing', 'a-testimonial-builder'); ?></option>
                                        <option value="2040"><?php esc_html_e('Multi-level marketing', 'a-testimonial-builder'); ?></option>
                                        <option value="2041"><?php esc_html_e('Office and commercial furniture', 'a-testimonial-builder'); ?></option>
                                        <option value="2042"><?php esc_html_e('Office supplies and equipment', 'a-testimonial-builder'); ?></option>
                                        <option value="2043"><?php esc_html_e('Publishing and printing', 'a-testimonial-builder'); ?></option>
                                        <option value="2044"><?php esc_html_e('Quick copy and reproduction services', 'a-testimonial-builder'); ?></option>
                                        <option value="2045"><?php esc_html_e('Shipping and packing', 'a-testimonial-builder'); ?></option>
                                        <option value="2046"><?php esc_html_e('Stenographic and secretarial support services', 'a-testimonial-builder'); ?></option>
                                        <option value="2047"><?php esc_html_e('Wholesale', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Clothing, accessories, and shoes', 'a-testimonial-builder'); ?>">
                                        <option value="2048"><?php esc_html_e('Children\'s clothing', 'a-testimonial-builder'); ?></option>
                                        <option value="2049"><?php esc_html_e('Men\'s clothing', 'a-testimonial-builder'); ?></option>
                                        <option value="2050"><?php esc_html_e('Women\'s clothing', 'a-testimonial-builder'); ?></option>
                                        <option value="2051"><?php esc_html_e('Shoes', 'a-testimonial-builder'); ?></option>
                                        <option value="2052"><?php esc_html_e('Military and civil service uniforms', 'a-testimonial-builder'); ?></option>
                                        <option value="2053"><?php esc_html_e('Accessories', 'a-testimonial-builder'); ?></option>
                                        <option value="2054"><?php esc_html_e('Retail (fine jewelry and watches)', 'a-testimonial-builder'); ?></option>
                                        <option value="2055"><?php esc_html_e('Wholesale (precious stones and metals)', 'a-testimonial-builder'); ?></option>
                                        <option value="2056"><?php esc_html_e('Fashion jewelry', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Computers, accessories, and services', 'a-testimonial-builder'); ?>">
                                        <option value="2057"><?php esc_html_e('Computer and data processing services', 'a-testimonial-builder'); ?></option>
                                        <option value="2058"><?php esc_html_e('Desktops, laptops, and notebooks', 'a-testimonial-builder'); ?></option>
                                        <option value="2059"><?php esc_html_e('Digital content', 'a-testimonial-builder'); ?></option>
                                        <option value="2060"><?php esc_html_e('eCommerce services', 'a-testimonial-builder'); ?></option>
                                        <option value="2061"><?php esc_html_e('Maintenance and repair services', 'a-testimonial-builder'); ?></option>
                                        <option value="2062"><?php esc_html_e('Monitors and projectors', 'a-testimonial-builder'); ?></option>
                                        <option value="2063"><?php esc_html_e('Networking', 'a-testimonial-builder'); ?></option>
                                        <option value="2064"><?php esc_html_e('Online gaming', 'a-testimonial-builder'); ?></option>
                                        <option value="2065"><?php esc_html_e('Parts and accessories', 'a-testimonial-builder'); ?></option>
                                        <option value="2066"><?php esc_html_e('Peripherals', 'a-testimonial-builder'); ?></option>
                                        <option value="2067"><?php esc_html_e('Software', 'a-testimonial-builder'); ?></option>
                                        <option value="2068"><?php esc_html_e('Training services', 'a-testimonial-builder'); ?></option>
                                        <option value="2069"><?php esc_html_e('Web hosting and design', 'a-testimonial-builder'); ?></option>
                                        <option value="2298"><?php esc_html_e('Apple Mac Support Specialists', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Education', 'a-testimonial-builder'); ?>">
                                        <option value="2070"><?php esc_html_e('Business and secretarial schools', 'a-testimonial-builder'); ?></option>
                                        <option value="2071"><?php esc_html_e('Child daycare services', 'a-testimonial-builder'); ?></option>
                                        <option value="2072"><?php esc_html_e('Colleges and universities', 'a-testimonial-builder'); ?></option>
                                        <option value="2073"><?php esc_html_e('Dance halls, studios, and schools', 'a-testimonial-builder'); ?></option>
                                        <option value="2074"><?php esc_html_e('Elementary and secondary schools', 'a-testimonial-builder'); ?></option>
                                        <option value="2075"><?php esc_html_e('Vocational and trade schools', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Electronics and telecom', 'a-testimonial-builder'); ?>">
                                        <option value="2076"><?php esc_html_e('Cameras, camcorders, and equipment', 'a-testimonial-builder'); ?></option>
                                        <option value="2078"><?php esc_html_e('Cell phones, PDAs, and pagers', 'a-testimonial-builder'); ?></option>
                                        <option value="2079"><?php esc_html_e('General electronic accessories', 'a-testimonial-builder'); ?></option>
                                        <option value="2080"><?php esc_html_e('Home audio', 'a-testimonial-builder'); ?></option>
                                        <option value="2081"><?php esc_html_e('Home electronics', 'a-testimonial-builder'); ?></option>
                                        <option value="2082"><?php esc_html_e('Security and surveillance', 'a-testimonial-builder'); ?></option>
                                        <option value="2083"><?php esc_html_e('Telecommunication equipment and sales', 'a-testimonial-builder'); ?></option>
                                        <option value="2084"><?php esc_html_e('Telecommunication services', 'a-testimonial-builder'); ?></option>
                                        <option value="2085"><?php esc_html_e('Telephone cards', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Entertainment and media', 'a-testimonial-builder'); ?>">
                                        <option value="2086"><?php esc_html_e('Memorabilia', 'a-testimonial-builder'); ?></option>
                                        <option value="2087"><?php esc_html_e('Movie tickets', 'a-testimonial-builder'); ?></option>
                                        <option value="2088"><?php esc_html_e('Movies (DVDs, videotapes)', 'a-testimonial-builder'); ?></option>
                                        <option value="2089"><?php esc_html_e('Music (CDs, cassettes and albums)', 'a-testimonial-builder'); ?></option>
                                        <option value="2090"><?php esc_html_e('Cable, satellite, and other pay TV and radio', 'a-testimonial-builder'); ?></option>
                                        <option value="2091"><?php esc_html_e('Adult digital content', 'a-testimonial-builder'); ?></option>
                                        <option value="2092"><?php esc_html_e('Concert tickets', 'a-testimonial-builder'); ?></option>
                                        <option value="2093"><?php esc_html_e('Theater tickets', 'a-testimonial-builder'); ?></option>
                                        <option value="2094"><?php esc_html_e('Toys and games', 'a-testimonial-builder'); ?></option>
                                        <option value="2095"><?php esc_html_e('Slot machines', 'a-testimonial-builder'); ?></option>
                                        <option value="2096"><?php esc_html_e('Digital content', 'a-testimonial-builder'); ?></option>
                                        <option value="2097"><?php esc_html_e('Entertainers', 'a-testimonial-builder'); ?></option>
                                        <option value="2098"><?php esc_html_e('Gambling', 'a-testimonial-builder'); ?></option>
                                        <option value="2099"><?php esc_html_e('Online games', 'a-testimonial-builder'); ?></option>
                                        <option value="2100"><?php esc_html_e('Video games and systems', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Financial services and products', 'a-testimonial-builder'); ?>">
                                        <option value="2101"><?php esc_html_e('Accounting', 'a-testimonial-builder'); ?></option>
                                        <option value="2102"><?php esc_html_e('Collection agency', 'a-testimonial-builder'); ?></option>
                                        <option value="2103"><?php esc_html_e('Commodities and futures exchange', 'a-testimonial-builder'); ?></option>
                                        <option value="2104"><?php esc_html_e('Consumer credit reporting agencies', 'a-testimonial-builder'); ?></option>
                                        <option value="2105"><?php esc_html_e('Debt counseling service', 'a-testimonial-builder'); ?></option>
                                        <option value="2106"><?php esc_html_e('Credit union', 'a-testimonial-builder'); ?></option>
                                        <option value="2107"><?php esc_html_e('Currency dealer and currency exchange', 'a-testimonial-builder'); ?></option>
                                        <option value="2108"><?php esc_html_e('Escrow', 'a-testimonial-builder'); ?></option>
                                        <option value="2109"><?php esc_html_e('Finance company', 'a-testimonial-builder'); ?></option>
                                        <option value="2110"><?php esc_html_e('Financial and investment advice', 'a-testimonial-builder'); ?></option>
                                        <option value="2111"><?php esc_html_e('Insurance (auto and home)', 'a-testimonial-builder'); ?></option>
                                        <option value="2112"><?php esc_html_e('Insurance (life and annuity)', 'a-testimonial-builder'); ?></option>
                                        <option value="2113"><?php esc_html_e('Investments (general)', 'a-testimonial-builder'); ?></option>
                                        <option value="2114"><?php esc_html_e('Money service business', 'a-testimonial-builder'); ?></option>
                                        <option value="2115"><?php esc_html_e('Mortgage brokers or dealers', 'a-testimonial-builder'); ?></option>
                                        <option value="2116"><?php esc_html_e('Online gaming currency', 'a-testimonial-builder'); ?></option>
                                        <option value="2117"><?php esc_html_e('Paycheck lender or cash advance', 'a-testimonial-builder'); ?></option>
                                        <option value="2118"><?php esc_html_e('Prepaid and stored value cards', 'a-testimonial-builder'); ?></option>
                                        <option value="2119"><?php esc_html_e('Real estate agent', 'a-testimonial-builder'); ?></option>
                                        <option value="2120"><?php esc_html_e('Remittance', 'a-testimonial-builder'); ?></option>
                                        <option value="2121"><?php esc_html_e('Rental property management', 'a-testimonial-builder'); ?></option>
                                        <option value="2122"><?php esc_html_e('Security brokers and dealers', 'a-testimonial-builder'); ?></option>
                                        <option value="2123"><?php esc_html_e('Wire transfer and money order', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Food retail and service', 'a-testimonial-builder'); ?>">
                                        <option value="2124"><?php esc_html_e('Alcoholic beverages', 'a-testimonial-builder'); ?></option>
                                        <option value="2125"><?php esc_html_e('Catering services', 'a-testimonial-builder'); ?></option>
                                        <option value="2126"><?php esc_html_e('Coffee and tea', 'a-testimonial-builder'); ?></option>
                                        <option value="2127"><?php esc_html_e('Gourmet foods', 'a-testimonial-builder'); ?></option>
                                        <option value="2128"><?php esc_html_e('Specialty and miscellaneous food stores', 'a-testimonial-builder'); ?></option>
                                        <option value="2129"><?php esc_html_e('Restaurant', 'a-testimonial-builder'); ?></option>
                                        <option value="2130"><?php esc_html_e('Tobacco', 'a-testimonial-builder'); ?></option>
                                        <option value="2131"><?php esc_html_e('Vitamins and supplements', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Gifts and flowers', 'a-testimonial-builder'); ?>">
                                        <option value="2132"><?php esc_html_e('Florist', 'a-testimonial-builder'); ?></option>
                                        <option value="2133"><?php esc_html_e('Gift, card, novelty, and souvenir shops', 'a-testimonial-builder'); ?></option>
                                        <option value="2134"><?php esc_html_e('Gourmet foods', 'a-testimonial-builder'); ?></option>
                                        <option value="2135"><?php esc_html_e('Nursery plants and flowers', 'a-testimonial-builder'); ?></option>
                                        <option value="2136"><?php esc_html_e('Party supplies', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Government', 'a-testimonial-builder'); ?>">
                                        <option value="2137"><?php esc_html_e('Government services (not elsewhere classified)', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Health and personal care', 'a-testimonial-builder'); ?>">
                                        <option value="2138"><?php esc_html_e('Drugstore (excluding prescription drugs)', 'a-testimonial-builder'); ?></option>
                                        <option value="2139"><?php esc_html_e('Drugstore (including prescription drugs)', 'a-testimonial-builder'); ?></option>
                                        <option value="2140"><?php esc_html_e('Dental care', 'a-testimonial-builder'); ?></option>
                                        <option value="2141"><?php esc_html_e('Medical care', 'a-testimonial-builder'); ?></option>
                                        <option value="2142"><?php esc_html_e('Medical equipment and supplies', 'a-testimonial-builder'); ?></option>
                                        <option value="2143"><?php esc_html_e('Vision care', 'a-testimonial-builder'); ?></option>
                                        <option value="2144"><?php esc_html_e('Vitamins and supplements', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Home and garden', 'a-testimonial-builder'); ?>">
                                        <option value="2145"><?php esc_html_e('Antiques', 'a-testimonial-builder'); ?></option>
                                        <option value="2146"><?php esc_html_e('Appliances', 'a-testimonial-builder'); ?></option>
                                        <option value="2147"><?php esc_html_e('Art dealers and galleries', 'a-testimonial-builder'); ?></option>
                                        <option value="2148"><?php esc_html_e('Bed and bath', 'a-testimonial-builder'); ?></option>
                                        <option value="2149"><?php esc_html_e('Construction material', 'a-testimonial-builder'); ?></option>
                                        <option value="2150"><?php esc_html_e('Drapery, window covering, and upholstery', 'a-testimonial-builder'); ?></option>
                                        <option value="2151"><?php esc_html_e('Exterminating and disinfecting services', 'a-testimonial-builder'); ?></option>
                                        <option value="2152"><?php esc_html_e('Fireplace, and fireplace screens', 'a-testimonial-builder'); ?></option>
                                        <option value="2153"><?php esc_html_e('Furniture', 'a-testimonial-builder'); ?></option>
                                        <option value="2154"><?php esc_html_e('Garden supplies', 'a-testimonial-builder'); ?></option>
                                        <option value="2155"><?php esc_html_e('Glass, paint, and wallpaper', 'a-testimonial-builder'); ?></option>
                                        <option value="2156"><?php esc_html_e('Hardware and tools', 'a-testimonial-builder'); ?></option>
                                        <option value="2157"><?php esc_html_e('Home decor', 'a-testimonial-builder'); ?></option>
                                        <option value="2158"><?php esc_html_e('Housewares', 'a-testimonial-builder'); ?></option>
                                        <option value="2159"><?php esc_html_e('Kitchenware', 'a-testimonial-builder'); ?></option>
                                        <option value="2160"><?php esc_html_e('Landscaping', 'a-testimonial-builder'); ?></option>
                                        <option value="2161"><?php esc_html_e('Rugs and carpets', 'a-testimonial-builder'); ?></option>
                                        <option value="2162"><?php esc_html_e('Security and surveillance equipment', 'a-testimonial-builder'); ?></option>
                                        <option value="2163"><?php esc_html_e('Swimming pools and spas', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Nonprofit', 'a-testimonial-builder'); ?>">
                                        <option value="2164"><?php esc_html_e('Charity', 'a-testimonial-builder'); ?></option>
                                        <option value="2165"><?php esc_html_e('Political', 'a-testimonial-builder'); ?></option>
                                        <option value="2166"><?php esc_html_e('Religious', 'a-testimonial-builder'); ?></option>
                                        <option value="2167"><?php esc_html_e('Other', 'a-testimonial-builder'); ?></option>
                                        <option value="2168"><?php esc_html_e('Personal', 'a-testimonial-builder'); ?></option>
                                        <option value="2169"><?php esc_html_e('Educational', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Pets and animals', 'a-testimonial-builder'); ?>">
                                        <option value="2171"><?php esc_html_e('Medication and supplements', 'a-testimonial-builder'); ?></option>
                                        <option value="2172"><?php esc_html_e('Pet shops, pet food, and supplies', 'a-testimonial-builder'); ?></option>
                                        <option value="2173"><?php esc_html_e('Specialty or rare pets', 'a-testimonial-builder'); ?></option>
                                        <option value="2174"><?php esc_html_e('Veterinary services', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Religion and spirituality (for profit)', 'a-testimonial-builder'); ?>">
                                        <option value="2175"><?php esc_html_e('Membership services', 'a-testimonial-builder'); ?></option>
                                        <option value="2176"><?php esc_html_e('Merchandise', 'a-testimonial-builder'); ?></option>
                                        <option value="2177"><?php esc_html_e('Services (not elsewhere classified)', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Retail (not elsewhere classified)', 'a-testimonial-builder'); ?>">
                                        <option value="2178"><?php esc_html_e('Chemicals and allied products', 'a-testimonial-builder'); ?></option>
                                        <option value="2179"><?php esc_html_e('Department store', 'a-testimonial-builder'); ?></option>
                                        <option value="2180"><?php esc_html_e('Discount store', 'a-testimonial-builder'); ?></option>
                                        <option value="2181"><?php esc_html_e('Durable goods', 'a-testimonial-builder'); ?></option>
                                        <option value="2182"><?php esc_html_e('Non-durable goods', 'a-testimonial-builder'); ?></option>
                                        <option value="2183"><?php esc_html_e('Used and secondhand store', 'a-testimonial-builder'); ?></option>
                                        <option value="2184"><?php esc_html_e('Variety store', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Services - other', 'a-testimonial-builder'); ?>">
                                        <option value="2185"><?php esc_html_e('Advertising', 'a-testimonial-builder'); ?></option>
                                        <option value="2186"><?php esc_html_e('Shopping services and buying clubs', 'a-testimonial-builder'); ?></option>
                                        <option value="2187"><?php esc_html_e('Career services', 'a-testimonial-builder'); ?></option>
                                        <option value="2188"><?php esc_html_e('Carpentry', 'a-testimonial-builder'); ?></option>
                                        <option value="2189"><?php esc_html_e('Child care services', 'a-testimonial-builder'); ?></option>
                                        <option value="2190"><?php esc_html_e('Cleaning and maintenance', 'a-testimonial-builder'); ?></option>
                                        <option value="2191"><?php esc_html_e('Commercial photography', 'a-testimonial-builder'); ?></option>
                                        <option value="2192"><?php esc_html_e('Computer and data processing services', 'a-testimonial-builder'); ?></option>
                                        <option value="2193"><?php esc_html_e('Computer network services', 'a-testimonial-builder'); ?></option>
                                        <option value="2194"><?php esc_html_e('Consulting services', 'a-testimonial-builder'); ?></option>
                                        <option value="2195"><?php esc_html_e('Counseling services', 'a-testimonial-builder'); ?></option>
                                        <option value="2196"><?php esc_html_e('Courier services', 'a-testimonial-builder'); ?></option>
                                        <option value="2197"><?php esc_html_e('Dental care', 'a-testimonial-builder'); ?></option>
                                        <option value="2198"><?php esc_html_e('eCommerce services', 'a-testimonial-builder'); ?></option>
                                        <option value="2199"><?php esc_html_e('Electrical and small appliance repair', 'a-testimonial-builder'); ?></option>
                                        <option value="2200"><?php esc_html_e('Entertainment', 'a-testimonial-builder'); ?></option>
                                        <option value="2201"><?php esc_html_e('Equipment rental and leasing services', 'a-testimonial-builder'); ?></option>
                                        <option value="2202"><?php esc_html_e('Event and wedding planning', 'a-testimonial-builder'); ?></option>
                                        <option value="2203"><?php esc_html_e('Gambling', 'a-testimonial-builder'); ?></option>
                                        <option value="2204"><?php esc_html_e('General contractors', 'a-testimonial-builder'); ?></option>
                                        <option value="2205"><?php esc_html_e('Graphic and commercial design', 'a-testimonial-builder'); ?></option>
                                        <option value="2206"><?php esc_html_e('Health and beauty spas', 'a-testimonial-builder'); ?></option>
                                        <option value="2207"><?php esc_html_e('IDs, licenses, and passports', 'a-testimonial-builder'); ?></option>
                                        <option value="2208"><?php esc_html_e('Importing and exporting', 'a-testimonial-builder'); ?></option>
                                        <option value="2209"><?php esc_html_e('Information retrieval services', 'a-testimonial-builder'); ?></option>
                                        <option value="2210"><?php esc_html_e('Insurance - auto and home', 'a-testimonial-builder'); ?></option>
                                        <option value="2211"><?php esc_html_e('Insurance - life and annuity', 'a-testimonial-builder'); ?></option>
                                        <option value="2212"><?php esc_html_e('Landscaping and horticultural', 'a-testimonial-builder'); ?></option>
                                        <option value="2213"><?php esc_html_e('Legal services and attorneys', 'a-testimonial-builder'); ?></option>
                                        <option value="2214"><?php esc_html_e('Local delivery service', 'a-testimonial-builder'); ?></option>
                                        <option value="2215"><?php esc_html_e('Lottery and contests', 'a-testimonial-builder'); ?></option>
                                        <option value="2216"><?php esc_html_e('Medical care', 'a-testimonial-builder'); ?></option>
                                        <option value="2217"><?php esc_html_e('Membership clubs and organizations', 'a-testimonial-builder'); ?></option>
                                        <option value="2218"><?php esc_html_e('Misc. publishing and printing', 'a-testimonial-builder'); ?></option>
                                        <option value="2219"><?php esc_html_e('Moving and storage', 'a-testimonial-builder'); ?></option>
                                        <option value="2220"><?php esc_html_e('Online dating', 'a-testimonial-builder'); ?></option>
                                        <option value="2221"><?php esc_html_e('Photofinishing', 'a-testimonial-builder'); ?></option>
                                        <option value="2222"><?php esc_html_e('Photographic studios - portraits', 'a-testimonial-builder'); ?></option>
                                        <option value="2223"><?php esc_html_e('Protective and security services', 'a-testimonial-builder'); ?></option>
                                        <option value="2224"><?php esc_html_e('Quick copy and reproduction services', 'a-testimonial-builder'); ?></option>
                                        <option value="2225"><?php esc_html_e('Radio, television, and stereo repair', 'a-testimonial-builder'); ?></option>
                                        <option value="2226"><?php esc_html_e('Real estate agent', 'a-testimonial-builder'); ?></option>
                                        <option value="2227"><?php esc_html_e('Rental property management', 'a-testimonial-builder'); ?></option>
                                        <option value="2228"><?php esc_html_e('Reupholstery and furniture repair', 'a-testimonial-builder'); ?></option>
                                        <option value="2229"><?php esc_html_e('Services (not elsewhere classified)', 'a-testimonial-builder'); ?></option>
                                        <option value="2230"><?php esc_html_e('Shipping and packing', 'a-testimonial-builder'); ?></option>
                                        <option value="2231"><?php esc_html_e('Swimming pool services', 'a-testimonial-builder'); ?></option>
                                        <option value="2232"><?php esc_html_e('Tailors and alterations', 'a-testimonial-builder'); ?></option>
                                        <option value="2233"><?php esc_html_e('Telecommunication service', 'a-testimonial-builder'); ?></option>
                                        <option value="2234"><?php esc_html_e('Utilities', 'a-testimonial-builder'); ?></option>
                                        <option value="2235"><?php esc_html_e('Vision care', 'a-testimonial-builder'); ?></option>
                                        <option value="2236"><?php esc_html_e('Watch, clock, and jewelry repair', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Sports and outdoors', 'a-testimonial-builder'); ?>">
                                        <option value="2237"><?php esc_html_e('Athletic shoes', 'a-testimonial-builder'); ?></option>
                                        <option value="2238"><?php esc_html_e('Bicycle shop, service, and repair', 'a-testimonial-builder'); ?></option>
                                        <option value="2239"><?php esc_html_e('Boating, sailing and accessories', 'a-testimonial-builder'); ?></option>
                                        <option value="2240"><?php esc_html_e('Camping and outdoors', 'a-testimonial-builder'); ?></option>
                                        <option value="2241"><?php esc_html_e('Dance halls, studios, and schools', 'a-testimonial-builder'); ?></option>
                                        <option value="2242"><?php esc_html_e('Exercise and fitness', 'a-testimonial-builder'); ?></option>
                                        <option value="2243"><?php esc_html_e('Fan gear and memorabilia', 'a-testimonial-builder'); ?></option>
                                        <option value="2244"><?php esc_html_e('Firearm accessories', 'a-testimonial-builder'); ?></option>
                                        <option value="2245"><?php esc_html_e('Firearms', 'a-testimonial-builder'); ?></option>
                                        <option value="2246"><?php esc_html_e('Hunting', 'a-testimonial-builder'); ?></option>
                                        <option value="2247"><?php esc_html_e('Knives', 'a-testimonial-builder'); ?></option>
                                        <option value="2248"><?php esc_html_e('Martial arts weapons', 'a-testimonial-builder'); ?></option>
                                        <option value="2249"><?php esc_html_e('Sport games and toys', 'a-testimonial-builder'); ?></option>
                                        <option value="2250"><?php esc_html_e('Sporting equipment', 'a-testimonial-builder'); ?></option>
                                        <option value="2251"><?php esc_html_e('Swimming pools and spas', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Toys and hobbies', 'a-testimonial-builder'); ?>">
                                        <option value="2252"><?php esc_html_e('Arts and crafts', 'a-testimonial-builder'); ?></option>
                                        <option value="2253"><?php esc_html_e('Camera and photographic supplies', 'a-testimonial-builder'); ?></option>
                                        <option value="2254"><?php esc_html_e('Hobby, toy, and game shops', 'a-testimonial-builder'); ?></option>
                                        <option value="2255"><?php esc_html_e('Memorabilia', 'a-testimonial-builder'); ?></option>
                                        <option value="2256"><?php esc_html_e('Music store - instruments and sheet music', 'a-testimonial-builder'); ?></option>
                                        <option value="2257"><?php esc_html_e('Stamp and coin', 'a-testimonial-builder'); ?></option>
                                        <option value="2258"><?php esc_html_e('Stationary, printing, and writing paper', 'a-testimonial-builder'); ?></option>
                                        <option value="2259"><?php esc_html_e('Vintage and collectibles', 'a-testimonial-builder'); ?></option>
                                        <option value="2260"><?php esc_html_e('Video games and systems', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Travel', 'a-testimonial-builder'); ?>">
                                        <option value="2261"><?php esc_html_e('Airlines', 'a-testimonial-builder'); ?></option>
                                        <option value="2262"><?php esc_html_e('Auto rental', 'a-testimonial-builder'); ?></option>
                                        <option value="2263"><?php esc_html_e('Bus line', 'a-testimonial-builder'); ?></option>
                                        <option value="2264"><?php esc_html_e('Cruises', 'a-testimonial-builder'); ?></option>
                                        <option value="2265"><?php esc_html_e('Lodging and accommodations', 'a-testimonial-builder'); ?></option>
                                        <option value="2266"><?php esc_html_e('Luggage and leather goods', 'a-testimonial-builder'); ?></option>
                                        <option value="2267"><?php esc_html_e('Recreational services', 'a-testimonial-builder'); ?></option>
                                        <option value="2268"><?php esc_html_e('Sporting and recreation camps', 'a-testimonial-builder'); ?></option>
                                        <option value="2269"><?php esc_html_e('Taxicabs and limousines', 'a-testimonial-builder'); ?></option>
                                        <option value="2270"><?php esc_html_e('Timeshares', 'a-testimonial-builder'); ?></option>
                                        <option value="2271"><?php esc_html_e('Tours', 'a-testimonial-builder'); ?></option>
                                        <option value="2272"><?php esc_html_e('Trailer parks or campgrounds', 'a-testimonial-builder'); ?></option>
                                        <option value="2273"><?php esc_html_e('Transportation services - other', 'a-testimonial-builder'); ?></option>
                                        <option value="2274"><?php esc_html_e('Travel agency', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Vehicle sales', 'a-testimonial-builder'); ?>">
                                        <option value="2275"><?php esc_html_e('Auto dealer - new and used', 'a-testimonial-builder'); ?></option>
                                        <option value="2276"><?php esc_html_e('Auto dealer - used only', 'a-testimonial-builder'); ?></option>
                                        <option value="2277"><?php esc_html_e('Aviation', 'a-testimonial-builder'); ?></option>
                                        <option value="2278"><?php esc_html_e('Boat dealer', 'a-testimonial-builder'); ?></option>
                                        <option value="2279"><?php esc_html_e('Mobile home dealer', 'a-testimonial-builder'); ?></option>
                                        <option value="2280"><?php esc_html_e('Motorcycle dealer', 'a-testimonial-builder'); ?></option>
                                        <option value="2281"><?php esc_html_e('Recreational and utility trailer dealer', 'a-testimonial-builder'); ?></option>
                                        <option value="2282"><?php esc_html_e('Recreational vehicle dealer', 'a-testimonial-builder'); ?></option>
                                        <option value="2283"><?php esc_html_e('Vintage and collectibles', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?php esc_html_e('Vehicle service and accessories', 'a-testimonial-builder'); ?>">
                                        <option value="2284"><?php esc_html_e('New parts and supplies - motor vehicle', 'a-testimonial-builder'); ?></option>
                                        <option value="2285"><?php esc_html_e('Used parts - motor vehicle', 'a-testimonial-builder'); ?></option>
                                        <option value="2286"><?php esc_html_e('Audio and video', 'a-testimonial-builder'); ?></option>
                                        <option value="2287"><?php esc_html_e('Auto body repair and paint', 'a-testimonial-builder'); ?></option>
                                        <option value="2288"><?php esc_html_e('Auto rental', 'a-testimonial-builder'); ?></option>
                                        <option value="2289"><?php esc_html_e('Auto service', 'a-testimonial-builder'); ?></option>
                                        <option value="2290"><?php esc_html_e('Automotive tire supply and service', 'a-testimonial-builder'); ?></option>
                                        <option value="2291"><?php esc_html_e('Boat rental and leases', 'a-testimonial-builder'); ?></option>
                                        <option value="2292"><?php esc_html_e('Car wash', 'a-testimonial-builder'); ?></option>
                                        <option value="2293"><?php esc_html_e('Motor home and recreational vehicle rental', 'a-testimonial-builder'); ?></option>
                                        <option value="2294"><?php esc_html_e('Tools and equipment', 'a-testimonial-builder'); ?></option>
                                        <option value="2295"><?php esc_html_e('Towing service', 'a-testimonial-builder'); ?></option>
                                        <option value="2296"><?php esc_html_e('Truck and utility trailer rental', 'a-testimonial-builder'); ?></option>
                                        <option value="2297"><?php esc_html_e('Accessories', 'a-testimonial-builder'); ?></option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>

                    <p class="submit">
                        <input type="submit" name="submit" class="button button-primary" value="<?php esc_html_e('Save profile', 'a-testimonial-builder'); ?>">
                    </p>

                </form>
            </div>
        </div>
    </div>
</div>
<?php
if (is_array($profile['business_category_id'])) {
    $profile['business_category_id'] = reset($profile['business_category_id']);
}

if (isset($profile['business_category_id']) && !empty($profile['business_category_id'])) {
    // Add your main script to ensure it's registered
    wp_enqueue_script('main-script-handle');

    // Create the inline script
    $inline_script = "
        document.addEventListener('DOMContentLoaded', function () {
            const categoryField = document.getElementById('user-business_category_id');
            if (categoryField) {
                categoryField.value = '" . esc_js($profile['business_category_id']) . "';
            }
        });
    ";
    // Attach the inline script to your main script
    wp_add_inline_script('main-script-handle', $inline_script);
}
?>
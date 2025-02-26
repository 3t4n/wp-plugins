<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


function mbbsc_type_callback() {
    $options = get_option('mbbsc_options');
    $defaultType = 'LocalBusiness'; // Set default type if none is set

    $schemaTypes = [
        [
            'label' => __('General', 'microbite-business-schema'),
            'options' => [
					'LocalBusiness'            => __( 'Local business', 'microbite-business-schema' ),
					'AnimalShelter'            => __( 'Animal shelter', 'microbite-business-schema' ),
					'ArchiveOrganization'      => __( 'Archive organization', 'microbite-business-schema' ),
					'ChildCare'                => __( 'Child care', 'microbite-business-schema' ),
					'DryCleaningOrLaundry'     => __( 'Dry cleaning or laundry', 'microbite-business-schema' ),
					'EmploymentAgency'         => __( 'Employment agency', 'microbite-business-schema' ),
					'InternetCafe'             => __( 'Internet cafe', 'microbite-business-schema' ),
					'Library'                  => __( 'Library', 'microbite-business-schema' ),
					'ProfessionalService'      => __( 'Professional service', 'microbite-business-schema' ),
					'RadioStation'             => __( 'Radio station', 'microbite-business-schema' ),
					'RealEstateAgent'          => __( 'Real-estate agent', 'microbite-business-schema' ),
					'RecyclingCenter'          => __( 'Recycling center', 'microbite-business-schema' ),
					'SelfStorage'              => __( 'Self storage', 'microbite-business-schema' ),
					'ShoppingCenter'           => __( 'Shopping center', 'microbite-business-schema' ),
					'TelevisionStation'        => __( 'Television station', 'microbite-business-schema' ),
					'TouristInformationCenter' => __( 'Tourist information center', 'microbite-business-schema' ),
					'TravelAgency'             => __( 'Travel agency', 'microbite-business-schema' ),
				],
        ],
        [
				'label'   => __( 'Automotive business', 'microbite-business-schema' ),
				'options' => [
					'AutoBodyShop'       => __( 'Auto body shop', 'microbite-business-schema' ),
					'AutoDealer'         => __( 'Auto dealer', 'microbite-business-schema' ),
					'AutoPartsStore'     => __( 'Auto parts store', 'microbite-business-schema' ),
					'AutoRental'         => __( 'Auto rental', 'microbite-business-schema' ),
					'AutoRepair'         => __( 'Auto repair', 'microbite-business-schema' ),
					'AutoWash'           => __( 'Auto wash', 'microbite-business-schema' ),
					'GasStation'         => __( 'Gas station', 'microbite-business-schema' ),
					'MotorcycleDealer'   => __( 'Motorcycle dealer', 'microbite-business-schema' ),
					'MotorcycleRepair'   => __( 'Motorcycle repair', 'microbite-business-schema' ),
					'AutomotiveBusiness' => __( 'Other', 'microbite-business-schema' ),
				],
			],
        [
				'label'   => __( 'Emergency service', 'microbite-business-schema' ),
				'options' => [
					'FireStation'      => __( 'Fire station', 'microbite-business-schema' ),
					'Hospital'         => __( 'Hospital', 'microbite-business-schema' ),
					'PoliceStation'    => __( 'Police station', 'microbite-business-schema' ),
					'EmergencyService' => __( 'Other', 'microbite-business-schema' ),
				],
			],
			[
				'label'   => __( 'Entertainment business', 'microbite-business-schema' ),
				'options' => [
					'AdultEntertainment'    => __( 'Adult entertainment', 'microbite-business-schema' ),
					'AmusementPark'         => __( 'Amusement park', 'microbite-business-schema' ),
					'ArtGallery'            => __( 'Art gallery', 'microbite-business-schema' ),
					'Casino'                => __( 'Casino', 'microbite-business-schema' ),
					'ComedyClub'            => __( 'Comedy club', 'microbite-business-schema' ),
					'MovieTheater'          => __( 'Movie theater', 'microbite-business-schema' ),
					'NightClub'             => __( 'Night club', 'microbite-business-schema' ),
					'EntertainmentBusiness' => __( 'Other', 'microbite-business-schema' ),
				],
			],
			[
				'label'   => __( 'Financial service', 'microbite-business-schema' ),
				'options' => [
					'AccountingService' => __( 'Accounting service', 'microbite-business-schema' ),
					'AutomatedTeller'   => __( 'Automated teller', 'microbite-business-schema' ),
					'BankOrCreditUnion' => __( 'Bank or credit union', 'microbite-business-schema' ),
					'InsuranceAgency'   => __( 'Insurance agency', 'microbite-business-schema' ),
					'FinancialService'  => __( 'Other', 'microbite-business-schema' ),
				],
			],
			[
				'label'   => __( 'Food establishment', 'microbite-business-schema' ),
				'options' => [
					'Bakery'             => __( 'Bakery', 'microbite-business-schema' ),
					'BarOrPub'           => __( 'Bar or pub', 'microbite-business-schema' ),
					'Brewery'            => __( 'Brewery', 'microbite-business-schema' ),
					'CafeOrCoffeeShop'   => __( 'Cafe or coffee shop', 'microbite-business-schema' ),
					'Distillery'         => __( 'Distillery', 'microbite-business-schema' ),
					'FastFoodRestaurant' => __( 'Fast-food restaurant', 'microbite-business-schema' ),
					'IceCreamShop'       => __( 'Ice-cream shop', 'microbite-business-schema' ),
					'Restaurant'         => __( 'Restaurant', 'microbite-business-schema' ),
					'Winery'             => __( 'Winery', 'microbite-business-schema' ),
					'FoodEstablishment'  => __( 'Other', 'microbite-business-schema' ),
				],
			],
			[
				'label'   => __( 'Government office', 'microbite-business-schema' ),
				'options' => [
					'PostOffice'       => __( 'Post office', 'microbite-business-schema' ),
					'GovernmentOffice' => __( 'Other', 'microbite-business-schema' ),
				],
			],
			[
				'label'   => __( 'Health and beauty business', 'microbite-business-schema' ),
				'options' => [
					'BeautySalon'             => __( 'Beauty salon', 'microbite-business-schema' ),
					'DaySpa'                  => __( 'Day spa', 'microbite-business-schema' ),
					'HairSalon'               => __( 'Hair salon', 'microbite-business-schema' ),
					'HealthClub'              => __( 'Health club', 'microbite-business-schema' ),
					'NailSalon'               => __( 'Nail salon', 'microbite-business-schema' ),
					'TattooParlor'            => __( 'Tattoo parlor', 'microbite-business-schema' ),
					'HealthAndBeautyBusiness' => __( 'Other', 'microbite-business-schema' ),
				],
			],
			[
				'label'   => __( 'Home and construction business', 'microbite-business-schema' ),
				'options' => [
					'Electrician'                 => __( 'Electrician', 'microbite-business-schema' ),
					'GeneralContractor'           => __( 'General contractor', 'microbite-business-schema' ),
					'HVACBusiness'                => __( 'HVAC business', 'microbite-business-schema' ),
					'HousePainter'                => __( 'House painter', 'microbite-business-schema' ),
					'Locksmith'                   => __( 'Locksmith', 'microbite-business-schema' ),
					'MovingCompany'               => __( 'Moving company', 'microbite-business-schema' ),
					'Plumber'                     => __( 'Plumber', 'microbite-business-schema' ),
					'RoofingContractor'           => __( 'Roofing contractor', 'microbite-business-schema' ),
					'HomeAndConstructionBusiness' => __( 'Other', 'microbite-business-schema' ),
				],
			],
			[
				'label'   => __( 'Legal service', 'microbite-business-schema' ),
				'options' => [
					'Attorney'     => __( 'Attorney', 'microbite-business-schema' ),
					'Notary'       => __( 'Notary', 'microbite-business-schema' ),
					'LegalService' => __( 'Other', 'microbite-business-schema' ),
				],
			],
			[
				'label'   => __( 'Lodging business', 'microbite-business-schema' ),
				'options' => [
					'BedAndBreakfast' => __( 'Bed and breakfast', 'microbite-business-schema' ),
					'Campground'      => __( 'Campground', 'microbite-business-schema' ),
					'Hostel'          => __( 'Hostel', 'microbite-business-schema' ),
					'Hotel'           => __( 'Hotel', 'microbite-business-schema' ),
					'Motel'           => __( 'Motel', 'microbite-business-schema' ),
					'Resort'          => __( 'Resort', 'microbite-business-schema' ),
					'LodgingBusiness' => __( 'Other', 'microbite-business-schema' ),
				],
			],
			[
				'label'   => __( 'Medical business', 'microbite-business-schema' ),
				'options' => [
					'CommunityHealth' => __( 'Community health', 'microbite-business-schema' ),
					'Dentist'         => __( 'Dentist', 'microbite-business-schema' ),
					'Dermatology'     => __( 'Dermatology', 'microbite-business-schema' ),
					'DietNutrition'   => __( 'Diet nutrition', 'microbite-business-schema' ),
					'Emergency'       => __( 'Emergency', 'microbite-business-schema' ),
					'Geriatric'       => __( 'Geriatric', 'microbite-business-schema' ),
					'Gynecologic'     => __( 'Gynecologic', 'microbite-business-schema' ),
					'MedicalClinic'   => __( 'Medical clinic', 'microbite-business-schema' ),
					'Midwifery'       => __( 'Midwifery', 'microbite-business-schema' ),
					'Nursing'         => __( 'Nursing', 'microbite-business-schema' ),
					'Obstetric'       => __( 'Obstetric', 'microbite-business-schema' ),
					'Oncologic'       => __( 'Oncologic', 'microbite-business-schema' ),
					'Optician'        => __( 'Optician', 'microbite-business-schema' ),
					'Optometric'      => __( 'Optometric', 'microbite-business-schema' ),
					'Otolaryngologic' => __( 'Otolaryngologic', 'microbite-business-schema' ),
					'Pediatric'       => __( 'Pediatric', 'microbite-business-schema' ),
					'Pharmacy'        => __( 'Pharmacy', 'microbite-business-schema' ),
					'Physician'       => __( 'Physician', 'microbite-business-schema' ),
					'Physiotherapy'   => __( 'Physiotherapy', 'microbite-business-schema' ),
					'PlasticSurgery'  => __( 'Plastic surgery', 'microbite-business-schema' ),
					'Podiatric'       => __( 'Podiatric', 'microbite-business-schema' ),
					'PrimaryCare'     => __( 'Primary care', 'microbite-business-schema' ),
					'Psychiatric'     => __( 'Psychiatric', 'microbite-business-schema' ),
					'PublicHealth'    => __( 'Public health', 'microbite-business-schema' ),
					'MedicalBusiness' => __( 'Other', 'microbite-business-schema' ),
				],
			],
			[
				'label'   => __( 'Sports activity location', 'microbite-business-schema' ),
				'options' => [
					'BowlingAlley'           => __( 'Bowling alley', 'microbite-business-schema' ),
					'ExerciseGym'            => __( 'Exercise gym', 'microbite-business-schema' ),
					'GolfCourse'             => __( 'Golf course', 'microbite-business-schema' ),
					'HealthClub'             => __( 'Health club', 'microbite-business-schema' ),
					'PublicSwimmingPool'     => __( 'Public swimming pool', 'microbite-business-schema' ),
					'SkiResort'              => __( 'SkiResort', 'microbite-business-schema' ),
					'SportsClub'             => __( 'Sports club', 'microbite-business-schema' ),
					'StadiumOrArena'         => __( 'Stadium or arena', 'microbite-business-schema' ),
					'TennisComplex'          => __( 'Tennis complex', 'microbite-business-schema' ),
					'SportsActivityLocation' => __( 'Other', 'microbite-business-schema' ),
				],
			],
			[
				'label'   => __( 'Store', 'microbite-business-schema' ),
				'options' => [
					'AutoPartsStore'       => __( 'Auto parts store', 'microbite-business-schema' ),
					'BikeStore'            => __( 'Bike store', 'microbite-business-schema' ),
					'BookStore'            => __( 'Book store', 'microbite-business-schema' ),
					'ClothingStore'        => __( 'Clothing store', 'microbite-business-schema' ),
					'ComputerStore'        => __( 'Computer store', 'microbite-business-schema' ),
					'ConvenienceStore'     => __( 'Convenience store', 'microbite-business-schema' ),
					'DepartmentStore'      => __( 'Department store', 'microbite-business-schema' ),
					'ElectronicsStore'     => __( 'Electronics store', 'microbite-business-schema' ),
					'Florist'              => __( 'Florist', 'microbite-business-schema' ),
					'FurnitureStore'       => __( 'Furniture store', 'microbite-business-schema' ),
					'GardenStore'          => __( 'Garden store', 'microbite-business-schema' ),
					'GroceryStore'         => __( 'Grocery store', 'microbite-business-schema' ),
					'HardwareStore'        => __( 'Hardware store', 'microbite-business-schema' ),
					'HobbyShop'            => __( 'Hobby shop', 'microbite-business-schema' ),
					'HomeGoodsStore'       => __( 'Home goods store', 'microbite-business-schema' ),
					'JewelryStore'         => __( 'Jewelry store', 'microbite-business-schema' ),
					'LiquorStore'          => __( 'Liquor store', 'microbite-business-schema' ),
					'MensClothingStore'    => __( 'Mens clothing store', 'microbite-business-schema' ),
					'MobilePhoneStore'     => __( 'Mobile phone store', 'microbite-business-schema' ),
					'MovieRentalStore'     => __( 'Movie rental store', 'microbite-business-schema' ),
					'MusicStore'           => __( 'Music store', 'microbite-business-schema' ),
					'OfficeEquipmentStore' => __( 'Office equipment store', 'microbite-business-schema' ),
					'OutletStore'          => __( 'Outlet store', 'microbite-business-schema' ),
					'PawnShop'             => __( 'Pawn shop', 'microbite-business-schema' ),
					'PetStore'             => __( 'Pet store', 'microbite-business-schema' ),
					'ShoeStore'            => __( 'Shoe store', 'microbite-business-schema' ),
					'SportingGoodsStore'   => __( 'Sporting goods store', 'microbite-business-schema' ),
					'TireShop'             => __( 'Tire shop', 'microbite-business-schema' ),
					'ToyStore'             => __( 'Toy store', 'microbite-business-schema' ),
					'WholesaleStore'       => __( 'Wholesale store', 'microbite-business-schema' ),
					'Store'                => __( 'Other', 'microbite-business-schema' ),
				],
			]
        
        // Add the rest of your categories here
    ];

    echo '<select id="mbbsc_type" name="mbbsc_options[type]">';
    foreach ($schemaTypes as $category) {
        echo '<optgroup label="' . esc_attr($category['label']) . '">';
        foreach ($category['options'] as $value => $label) {
            $selected = (isset($options['type']) && $options['type'] === $value) ? ' selected' : '';
            echo '<option value="' . esc_attr($value) . '"' . esc_attr($selected) . '>' . esc_html($label) . '</option>';
        }
        echo '</optgroup>';
    }
    echo '</select>';
}

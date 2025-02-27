<?php

namespace ElementsHiveForBreakdance\DesignLibrary;

use function Breakdance\DesignLibrary\setDesignSets;
use function Breakdance\DesignLibrary\getRegisteredDesignSets;

add_filter("breakdance_design_library_providers", "\ElementsHiveForBreakdance\DesignLibrary\setupElementsHiveDesignLibraryProviders");


function setupElementsHiveDesignLibraryProviders($providers) {

    $ehProviders = [
        '0' => [
            "name" => "Elements Hive Demo Sections",
            "url" => 'https://demos.elementshive.com',
            "type" => "sections",
            "fullSiteImportEnabled" => false,
        ],
        '1' => [
            "name" => "Elements Hive /IxB Landing Page",
            "url" => 'https://ixb.elementshive.com',
            "type" => "complete_site",
            "fullSiteImportEnabled" => true,
        ],
    ];

    return deleteDuplicatesProviders(array_merge($providers, $ehProviders));
}

function deleteDuplicatesProviders($providers) {
    return array_values(array_column($providers, null, 'url'));
}

function deleteOldElementsHiveDemoSectionsLink() {
    $designSets = getRegisteredDesignSets();

    $demoSectionsUrl = "https://demos.elementshive.com";

    // Find the key of the element
    $key = array_search($demoSectionsUrl, $designSets);

    // If the element is found, remove it
    if ($key !== false) {
        unset($designSets[$key]);
    }

    setDesignSets($designSets);

}

deleteOldElementsHiveDemoSectionsLink();

/* Use this style when/if https://breakdance.canny.io/features/p/design-library-custom-providers is implemented */
// $ehSites = [
//     '0' => [
//         "name" => "Elements Hive Demo Sections",
//         "url" => 'https://demos.elementshive.com',
//         "type" => "sections",
//         "fullSiteImportEnabled" => false,
//     ],
// ];


// $currentSites = getRegisteredDesignSets();


// $ehSites = [
//     'https://demos.elementshive.com'
// ];

// $matches = array_intersect($currentSites, $ehSites);

// if(empty($matches)) {
//     setDesignSets(array_merge($currentSites ?: [], $ehSites));
// }

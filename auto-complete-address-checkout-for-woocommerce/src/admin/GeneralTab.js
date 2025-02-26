import { useState, useEffect } from 'react';
import { PanelBody, CheckboxControl, Button, Spinner, TextControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

const GeneralTab = () => {
    const [isEnabled, setIsEnabled] = useState(false);
    const [googlePlacesApiKey, setGooglePlacesApiKey] = useState('');
    const [specificCountry, setSpecificCountry] = useState('');
    const [addressOptions, setAddressOptions] = useState({
        streetNumber: false,
        postcode: false,
        locality: false,
        state: false,
        country: false,
    });
    const [placeTypes, setPlaceTypes] = useState('');
    const [isSaving, setIsSaving] = useState(false);
    const [loading, setLoading] = useState(true);

    const optionNames = {
        enabled: 'gmacaw_enabled',
        googlePlacesApiKey: 'gmacaw_google_places_api_key',
        specificCountry: 'gmacaw_specific_country',
        addressOptions: 'gmacaw_address_options',
        placeTypes: 'gmacaw_place_types',
    };

    useEffect(() => {
        // Fetch settings from the REST API
        fetch(gmacaw_wp_ajax.getsettings, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-WP-Nonce': gmacaw_wp_ajax.nonce,
            },
        })
            .then((response) => response.json())
            .then((data) => {
                setIsEnabled(data[optionNames.enabled] === '1');
                setGooglePlacesApiKey(data[optionNames.googlePlacesApiKey] || '');
                setSpecificCountry(data[optionNames.specificCountry] || '');
                setAddressOptions(data[optionNames.addressOptions] || {
                    streetNumber: false,
                    postcode: false,
                    locality: false,
                    state: false,
                    country: false,
                });
                setPlaceTypes(data[optionNames.placeTypes] || '');
                setLoading(false);
            })
            .catch((error) => {
                console.error('Error fetching settings:', error);
                setLoading(false);
            });
    }, []);

    const saveSettings = () => {
        setIsSaving(true);

        const settings = {
            [optionNames.enabled]: isEnabled ? '1' : '0',
            [optionNames.googlePlacesApiKey]: googlePlacesApiKey,
            [optionNames.specificCountry]: specificCountry,
            [optionNames.addressOptions]: addressOptions, // Ensure addressOptions is formatted as an object
            [optionNames.placeTypes]: placeTypes,
        };

        fetch(gmacaw_wp_ajax.savedata, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-WP-Nonce': gmacaw_wp_ajax.nonce, // Ensure the nonce is included for authentication
            },
            body: JSON.stringify({settings:settings}),
        })
        .then((response) => response.json())
        .then((data) => {
            setIsSaving(false);
            if (data.success) {  // Check for a success property in the response
                alert(__('Settings saved!', 'custom-fields-checkout-block-for-woocommerce'));
            } else {
                alert(__('Failed to save settings.', 'custom-fields-checkout-block-for-woocommerce'));
            }
        })
        .catch((error) => {
            setIsSaving(false);
            console.error('Error saving settings:', error);
            alert(__('Failed to save settings.', 'custom-fields-checkout-block-for-woocommerce'));
        });
    };

    const toggleAddressOption = (key) => {
        setAddressOptions((prev) => ({
            ...prev,
            [key]: !prev[key],
        }));
    };

    return (
        <PanelBody title={__('General Settings', 'custom-fields-checkout-block-for-woocommerce')} initialOpen={true}>
            {loading ? (
                <Spinner />
            ) : (
                <>
                    <div>
                        <CheckboxControl
                            label={__('Enable', 'custom-fields-checkout-block-for-woocommerce')}
                            checked={isEnabled}
                            onChange={setIsEnabled}
                        />
                    </div>
                    <div>
                        <TextControl
                            label={__('Google Places API Key', 'custom-fields-checkout-block-for-woocommerce')}
                            value={googlePlacesApiKey}
                            onChange={setGooglePlacesApiKey}
                        />
                        <div>
                            <p>
                            Google requires an API key to retrieve Auto Complete Address for job listings. Acquire an API key from the <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/places-autocomplete">Google Maps API developer site</a>.
                            </p>
                        </div>
                    </div>
                    <div>
                        <TextControl
                            label={__('Specific Country Address Show', 'custom-fields-checkout-block-for-woocommerce')}
                            value={specificCountry}
                            onChange={setSpecificCountry}
                        />
                        <div>
                            <p>
                            <strong>Default is blank</strong> it will be show all Country address if you want to particular country address than add two digit code <strong>Example: France for add fr</strong> <a href="https://codesmade.com/demo/country-code-list/">Get Country Code list</a>
                            </p>
                        </div>
                    </div>
                    
                    <div>
                        <div class="mb-10" >
                        <label  class="bold" >Address Field showing</label>
                        </div>
                        {['streetNumber', 'postcode', 'locality', 'state', 'country'].map((field) => (
                            <CheckboxControl
                                key={field}
                                label={__(field.charAt(0).toUpperCase() + field.slice(1), 'custom-fields-checkout-block-for-woocommerce')}
                                checked={addressOptions[field]}
                                onChange={() => toggleAddressOption(field)}
                            />
                        ))}

                    </div>
                    <div>
                        <TextControl
                            label={__('Place Types', 'custom-fields-checkout-block-for-woocommerce')}
                            placeholder="airport,art_gallery"
                            value={placeTypes}
                            onChange={setPlaceTypes}
                        />
                        <div>
                            <p>
                            <strong>Default is blank</strong> You can setup place type there. example if you want art gallery than you need to add there <strong>art_gallery</strong>.<a href="https://developers.google.com/maps/documentation/places/web-service/supported_type">Get Place Type</a>
                            </p>
                        </div>
                    </div>
                    <Button isPrimary onClick={saveSettings} disabled={isSaving}>
                        {isSaving ? <Spinner /> : __('Save Settings', 'custom-fields-checkout-block-for-woocommerce')}
                    </Button>
                </>
            )}
        </PanelBody>
    );
};

export default GeneralTab;

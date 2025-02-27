import {useState, createContext, useEffect} from "@wordpress/element";
import apiFetch from '@wordpress/api-fetch';

const {__} = wp.i18n;

export const SettingsContext = createContext();

function SettingsContextProvider(props) {

    const defaultSettings = {
            headline: __('Protected Area', 'content-protector'),
            instruction: __('This content is password-protected. Please verify with a password to unlock the content.', 'content-protector'),
            placeholder: __('Enter your password..', 'content-protector'),
            error: __('Sorry, there was an error.', 'content-protector'),
            button_label: __('Unlock', 'content-protector'),
            password_length: 6,
            include_uppercase: false,
            include_numbers: false,
            show_password: false,
            form_max_width: "600px",
            center_form: false,
            form_background_color: '#FAFAFA',
            form_margin: {
                top: '0',
                left: '0',
                right: '0',
                bottom: '0',
            },
            form_padding: {
                top: '10px',
                left: '30px',
                right: '30px',
                bottom: '30px',
            },
            form_border_radius: 0,
            headline_font_color: '#6804cc',
            headline_font_size: 24,
            headline_font_weight: 500,
            instruction_font_color: '#000',
            instruction_font_size: 16,
            instruction_font_weight: '300',
            button_background_color: '#6804cc',
            button_font_color: '#fff',
            button_background_color_hover: '#000',
            button_font_color_hover: '#fff',
            button_margin: {
                top: '0',
                left: '0',
                right: '0',
                bottom: '0',
            },
            button_padding: {
                top: '10px',
                left: '10px',
                right: '10px',
                bottom: '10px',
            },
            button_border_radius: 0,
            button_font_size: 16,
            button_font_weight: '300',
            unlock_mode: false,
            disable_cookie: false,
            cookie_duration: 2,
            cookie_duration_unit: 'days',
            third_party_shortcodes: '',
            use_concurrent: false,
            number_of_concurrents: 1,
            track_ip: false,
            recaptcha_version: 'v3',
            recaptcha_site_key: '',
            recaptcha_secret: '',
            recaptcha_language: 'en',
            bitly_token: ''
        }
    ;

    const [settingsSaved, setSettingsSaved] = useState(false);
    const [settings, setSettings] = useState(defaultSettings);
    const [configs, setConfigs] = useState({});

    const getSettings = () => {
        apiFetch({path: '/passster/v1/settings'}).then((options) => {
            setSettings(options);
        });
    }

    const saveSettings = () => {
        apiFetch({
            path: '/passster/v1/settings',
            method: 'POST',
            data: settings,
        });
    }

    const resetSettings = () => {
        setSettings(defaultSettings);

        apiFetch({
            path: '/passster/v1/settings',
            method: 'POST',
            data: defaultSettings,
        });
    }

    const resetConcurrent = () => {
        apiFetch({
            path: '/passster/v1/reset-concurrent',
            method: 'POST',
            reset: true,
        });
    }

    const migrateSettings = () => {
        apiFetch({
            path: '/passster/v1/migrate',
            method: 'POST',
            migrate: true,
        });
    }

    const importSettings = (newSettings) => {
        setSettings(newSettings);

        apiFetch({
            path: '/passster/v1/settings',
            method: 'POST',
            data: newSettings,
        });
    }

    const updateSetting = (key, value) => {
        setSettings({...settings, [key]: value});
    };

    const getStatus = () => {
        apiFetch({path: '/passster/v1/system-status'}).then((configs) => {
            setConfigs(configs);
        });
    }

    useEffect(() => {
        getSettings();
        getStatus();
    }, []);


    return (
        <SettingsContext.Provider
            value={{
                settings,
                configs,
                settingsSaved,
                setSettingsSaved,
                updateSetting,
                setSettings,
                saveSettings,
                resetSettings,
                importSettings,
                resetConcurrent,
                migrateSettings
            }}
        >
            {props.children}
        </SettingsContext.Provider>
    );
}

export default SettingsContextProvider;

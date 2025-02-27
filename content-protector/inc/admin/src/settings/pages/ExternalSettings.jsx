import {
    Button,
    Card,
    CardBody,
    CardHeader,
    __experimentalSpacer as Spacer,
    Notice,
    Animate,
    TextControl,
    SelectControl, Dashicon
} from "@wordpress/components";
import {useContext, useEffect, useState} from '@wordpress/element';
import {SettingsContext} from "../context/SettingsContext";

const {__} = wp.i18n;

function ExternalSettings() {
    const {settings, updateSetting, saveSettings, settingsSaved, setSettingsSaved} = useContext(SettingsContext);
    const [recaptchaVersion, setRecaptchaVersion] = useState('v3');

    const setSavingSettings = () => {
        saveSettings();
        setSettingsSaved(true);

        setTimeout(function () {
            setSettingsSaved(false);
        }, 2000);
    }

    useEffect(() => {
        if (settings.recaptcha_version) {
            setRecaptchaVersion(settings.recaptcha_version);
        }
    }, [settings]);

    return (<div className={"inner-settings"}>
        <Card>
            <CardHeader>
                <b>{__('reCAPTCHA', 'content-protector')}</b>
            </CardHeader>
            <CardBody>
                {options.is_pro ?
                    <>
                        <SelectControl
                            label={__('reCAPTCHA Type', 'content-protector')}
                            value={recaptchaVersion}
                            options={[
                                {label: __('Google reCAPTCHA V2 (Checkbox)', 'content-protector'), value: 'v2'},
                                {label: __('Google reCAPTCHA V3 (invisible CAPTCHA)', 'content-protector'), value: 'v3'},
                                {label: __('hCAPTCHA', 'content-protector'), value: 'hcaptcha'},
                            ]}
                            onChange={(value) => {
                                setRecaptchaVersion(value);
                                updateSetting("recaptcha_version", value);
                            }}
                        />
                        <TextControl
                            label={__('Site Key', 'content-protector')}
                            help={__('Add your reCAPTCHA Site Key here.', 'content-protector')}
                            value={settings.recaptcha_site_key}
                            onChange={(value) => {
                                updateSetting("recaptcha_site_key", value);
                            }}
                        />
                        <TextControl
                            label={__('Secret', 'content-protector')}
                            help={__('Add your reCAPTCHA Secret here.', 'content-protector')}
                            value={settings.recaptcha_secret}
                            onChange={(value) => {
                                updateSetting("recaptcha_secret", value);
                            }}
                        />
                        <TextControl
                            label={__('Language', 'content-protector')}
                            help={__('Add your language here. For example, ‘en’ for English or ‘de’ for German.', 'content-protector')}
                            placeholder={"en"}
                            value={settings.recaptcha_language}
                            onChange={(value) => {
                                updateSetting("recaptcha_language", value);
                            }}
                        /><
                />
                    :
                    <p>{__('reCAPTCHA is only available within the pro version of Passster.', 'content-protector')}
                        <Button className="button button-primary" style={{marginLeft: "10px", paddingTop: "2px"}}
                                href="https://patrickposner.dev/plugins/passster" target="_blank">
                            {__('Get Passster PRO', 'content-protector')}
                        </Button>
                    </p>
                }
            </CardBody>
        </Card>
        <Spacer margin={5}/>
        <Card>
            <CardHeader>
                <b>{__('Bit.ly', 'content-protector')}</b>
            </CardHeader>


            <CardBody>
                {options.is_pro ?
                    <TextControl
                        label={__('Bit.ly Access Token', 'content-protector')}
                        help={__('Add your Bit.ly access token here.', 'content-protector')}
                        value={settings.bitly_token}
                        onChange={(value) => {
                            updateSetting("bitly_token", value);
                        }}
                    />
                    :
                    <p>{__('Bit.ly is only available within the pro version of Passster.', 'content-protector')}
                        <Button className="button button-primary" style={{marginLeft: "10px", paddingTop: "2px"}}
                                href="https://patrickposner.dev/plugins/passster" target="_blank">
                            {__('Get Passster PRO', 'content-protector')}
                        </Button>
                    </p>
                }
            </CardBody>
        </Card>
        {settingsSaved &&
            <Animate type="slide-in" options={{origin: 'top'}}>
                {() => (
                    <Notice status="success" isDismissible={false}>
                        <p>
                            {__('Settings saved successfully.', 'content-protector')}
                        </p>
                    </Notice>
                )}
            </Animate>
        }
        <div className={"save-settings"}>
            <Button onClick={setSavingSettings}
                    variant="primary">{__('Save Settings', 'content-protector')}</Button>
        </div>
    </div>)
}

export default ExternalSettings;
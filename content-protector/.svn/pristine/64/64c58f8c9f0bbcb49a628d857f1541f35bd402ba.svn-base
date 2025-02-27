import {
    Button,
    Card,
    CardBody,
    CardHeader,
    __experimentalSpacer as Spacer,
    Notice,
    Animate,
    TextControl,
    TextareaControl,
    ToggleControl
} from "@wordpress/components";
import {useContext, useEffect, useState} from '@wordpress/element';
import {SettingsContext} from "../context/SettingsContext";

const {__} = wp.i18n;

function GeneralSettings() {
    const {settings, updateSetting, saveSettings, settingsSaved, setSettingsSaved} = useContext(SettingsContext);
    const [includeUppercase, setIncludeUppercase] = useState(false);
    const [includeNumbers, setIncludeNumbers] = useState(false);

    const setSavingSettings = () => {
        saveSettings();
        setSettingsSaved(true);

        setTimeout(function () {
            setSettingsSaved(false);
        }, 2000);
    }

    useEffect(() => {
        if (settings.include_uppercase) {
            setIncludeUppercase(settings.include_uppercase);
        }

        if (settings.include_numbers) {
            setIncludeNumbers(settings.include_numbers);
        }
    }, [settings]);

    return (<div className={"inner-settings"}>
        <Card>
            <CardHeader>
                {__('Form Labels & Description', 'content-protector')}
            </CardHeader>
            <CardBody>
                <p>{__('Edit the text that’s used within the password form on this page. You can overwrite these settings individually per area/page.', 'content-protector')}</p>
                <TextControl
                    label={__('Headline', 'content-protector')}
                    help={__('This is the headline of your password-protection form.', 'content-protector')}
                    value={settings.headline}
                    onChange={(value) => {
                        updateSetting("headline", value);
                    }}
                />
                <TextareaControl
                    label={__('Instruction', 'content-protector')}
                    help={__('The instruction text appears before the password input field. Use it for hints or additional explanation.', 'content-protector')}
                    value={settings.instruction}
                    onChange={(value) => {
                        updateSetting("instruction", value);
                    }}
                />
                <TextControl
                    label={__('Placeholder', 'content-protector')}
                    help={__('Edit the placeholder text of the password field.', 'content-protector')}
                    value={settings.placeholder}
                    onChange={(value) => {
                        updateSetting("placeholder", value);
                    }}
                />
                <TextareaControl
                    label={__('Error', 'content-protector')}
                    help={__('Edit the error message that appears if a user enters the wrong password.', 'content-protector')}
                    value={settings.error}
                    onChange={(value) => {
                        updateSetting("error", value);
                    }}
                />
                <TextControl
                    label={__('Button Label', 'content-protector')}
                    help={__('Edit the text that appears on the button.', 'content-protector')}
                    value={settings.button_label}
                    onChange={(value) => {
                        updateSetting("button_label", value);
                    }}
                />

            </CardBody>
        </Card>
        <Spacer margin={5}/>
        <Card>
            <CardHeader>
                {__('Generating Passwords', 'content-protector')}
            </CardHeader>
            <CardBody>
                <TextControl
                    label={__('Password length', 'content-protector')}
                    help={__('Set a default length for generated passwords.', 'content-protector')}
                    type={"number"}
                    value={settings.password_length}
                    onChange={(value) => {
                        updateSetting("password_length", value);
                    }}
                />

                <ToggleControl
                    label={__('Include uppercase characters', 'content-protector')}
                    help={
                        includeUppercase
                            ? __('Include uppercase characters in passwords.', 'content-protector')
                            : __('Generate passwords only with lowercase.', 'content-protector')
                    }
                    checked={includeUppercase}
                    onChange={(value) => {
                        setIncludeUppercase(value);
                        updateSetting("include_uppercase", value);
                    }}
                />

                <ToggleControl
                    label={__('Include numbers', 'content-protector')}
                    help={
                        includeNumbers
                            ? __('Include numbers in passwords.', 'content-protector')
                            : __('Generate passwords without numbers.', 'content-protector')
                    }
                    checked={includeNumbers}
                    onChange={(value) => {
                        setIncludeNumbers(value);
                        updateSetting("include_numbers", value);
                    }}
                />
            </CardBody>
        </Card>
        <Spacer margin={5}/>
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

export default GeneralSettings;
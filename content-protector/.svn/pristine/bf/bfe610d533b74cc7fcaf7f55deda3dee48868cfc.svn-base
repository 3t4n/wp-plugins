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
    ToggleControl, SelectControl,
} from "@wordpress/components";
import {useContext, useEffect, useState} from '@wordpress/element';
import {SettingsContext} from "../context/SettingsContext";

const {__} = wp.i18n;

function AdvancedSettings() {
    const {
        settings,
        updateSetting,
        saveSettings,
        settingsSaved,
        setSettingsSaved,
        resetConcurrent
    } = useContext(SettingsContext);
    const [unlockMode, setUnlockMode] = useState(false);
    const [disableCookie, setDisableCookie] = useState(false);
    const [useConcurrent, setUseConcurrent] = useState(false);
    const [isConcurrentReset, setIsConcurrentReset] = useState(false);
    const [trackIp, setTrackIp] = useState(false);

    const setSavingSettings = () => {
        saveSettings();
        setSettingsSaved(true);

        setTimeout(function () {
            setSettingsSaved(false);
        }, 2000);
    }

    const runResetConcurrent = () => {
        setIsConcurrentReset(true);
        resetConcurrent();

        setTimeout(function () {
            setIsConcurrentReset(false);
        }, 2000);
    }

    useEffect(() => {
        if (settings.unlock_mode) {
            setUnlockMode(settings.unlock_mode);
        }

        if (settings.disable_cookie) {
            setDisableCookie(settings.disable_cookie);
        }

        if (settings.use_concurrent) {
            setUseConcurrent(settings.use_concurrent);
        }

        if (settings.track_ip) {
            setTrackIp(settings.track_ip);
        }
    }, [settings]);

    return (<div className={"inner-settings"}>
        <Card>
            <CardHeader>
                <b>{__('Usage Mode', 'content-protector')}</b>
            </CardHeader>
            <CardBody>
                <ToggleControl
                    label={__('Use Ajax', 'content-protector')}
                    help={
                        unlockMode
                            ? __('You are using Ajax for unlocking content. Make sure to add any shortcodes of a page into the Third-Party-Shortcodes setting.', 'content-protector')
                            : __('Unlock content with Ajax (no reload). It is not recommended for entire pages or when using a Third-Party Page Builder.', 'content-protector')
                    }
                    checked={unlockMode}
                    onChange={(value) => {
                        setUnlockMode(value);
                        updateSetting("unlock_mode", value);
                    }}
                />
                {unlockMode &&
                    <ToggleControl
                        label={__('Disable Cookie', 'content-protector')}
                        help={
                            disableCookie
                                ? __('Each time a user visits the protected content it needs to be unlocked again.', 'content-protector')
                                : __('The password is stored in a cookie. Next time the content is unlocked automatically.', 'content-protector')
                        }
                        checked={disableCookie}
                        onChange={(value) => {
                            setDisableCookie(value);
                            updateSetting("disable_cookie", value);
                        }}
                    />
                }
                {!disableCookie &&
                    <>
                        <TextControl
                            label={__('Cookie Lifetime', 'content-protector')}
                            help={__('The lifetime of your cookie is based on this number and the lifetime unit below. Once a cookie expires, the user will need to enter the password again.', 'content-protector')}
                            type={'number'}
                            value={settings.cookie_duration}
                            onChange={(value) => {
                                updateSetting("cookie_duration", value);
                            }}
                        />
                        <SelectControl
                            label={__('Cookie Lifetime Unit', 'content-protector')}
                            value={settings.cookie_duration_unit}
                            options={[
                                {label: __('Days', 'content-protector'), value: 'days'},
                                {label: __('Hours', 'content-protector'), value: 'hours'},
                                {label: __('Minutes', 'content-protector'), value: 'minutes'},
                            ]}
                            onChange={(value) => {
                                updateSetting("cookie_duration_unit", value);
                            }}
                        />
                    </>
                }
                {unlockMode &&
                    <TextareaControl
                        label={__('Third-Party-Shortcodes', 'content-protector')}
                        help={__('Add a comma separated list of shortcodes you want to use inside of Passster. You can also use {post-id} to add the ID of the current page/post dynamically. ', 'content-protector')}
                        value={settings.third_party_shortcodes}
                        onChange={(value) => {
                            updateSetting("third_party_shortcodes", value);
                        }}
                    />
                }
            </CardBody>
        </Card>
        {options.is_pro &&
            <>
                <Spacer margin={5}/>
                <Card>
                    <CardHeader>
                        <b>{__('Concurrent Usage', 'content-protector')}</b>
                    </CardHeader>
                    <CardBody>
                        <ToggleControl
                            label={__('Track Concurrent Usage', 'content-protector')}
                            help={
                                useConcurrent
                                    ? __('Track and prevent concurrent usage of the same password.', 'content-protector')
                                    : __('Do not track concurrent usages. A password can be used without any limitations to unlock your content.', 'content-protector')
                            }
                            checked={useConcurrent}
                            onChange={(value) => {
                                setUseConcurrent(value);
                                updateSetting("use_concurrent", value);
                            }}
                        />
                        <TextControl
                            label={__('Number of Allowed Concurrent Usages', 'content-protector')}
                            help={__('Limit the number of logins with one password at the same time. It will create a custom database table to track the usage of the passwords. It uses the current IP of the user to recognize them. You can use the shortcode [passster-logout] to handle the logout.', 'content-protector')}
                            value={settings.number_of_concurrents}
                            type={'number'}
                            onChange={(value) => {
                                updateSetting("number_of_concurrents", value);
                            }}
                        />
                        <Button onClick={runResetConcurrent}
                                variant="secondary">{__('Reset Concurrent Data', 'content-protector')}</Button>
                        {isConcurrentReset ?
                            <Animate type="slide-in" options={{origin: 'top'}}>
                                {() => (
                                    <Notice status="success" isDismissible={false}>
                                        <p>
                                            {__('Concurrent data resetted successfully.', 'content-protector')}
                                        </p>
                                    </Notice>
                                )}
                            </Animate>
                            :
                            ''
                        }
                    </CardBody>
                </Card>
                <Spacer margin={5}/>
                <Card>
                    <CardHeader>
                        <b>{__('Statistics', 'content-protector')}</b>
                    </CardHeader>
                    <CardBody>
                        <ToggleControl
                            label={__('Track IP', 'content-protector')}
                            help={
                                trackIp
                                    ? __('Track the IP of the user in statistics.', 'content-protector')
                                    : __('Do not track the IP of the user in statistics', 'content-protector')
                            }
                            checked={trackIp}
                            onChange={(value) => {
                                setTrackIp(value);
                                updateSetting("track_ip", value);
                            }}
                        />
                    </CardBody>
                </Card>
            </>
        }
        {!options.is_pro && (
            <>
                <Spacer margin={5} />
                <Card>
                    <CardHeader>
                        <b>{__('Concurrent Usage', 'content-protector')}</b>
                    </CardHeader>
                    <CardBody>
                        {__('Keep track of how often a password is used at the same time to prevent abuse and unallowed sharing.', 'content-protector')}
                        <Spacer margin={10} />
                        <div>
                            <Button
                                href="https://passster.com/#free-vs-pro"
                                target="_blank"
                                className="button"
                                style={{ marginRight: '10px' }}
                            >{__('Lite vs Pro', 'content-protector')}</Button>
                            <Button
                                href="https://passster.com/#pricing"
                                target="_blank"
                                className="button-primary button"
                            >{__('Get Passster PRO!', 'content-protector')}</Button>
                        </div>
                    </CardBody>
                </Card>
            </>
        )}
        {
            settingsSaved &&
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

export default AdvancedSettings;
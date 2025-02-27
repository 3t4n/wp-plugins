import {
    Button,
    Card,
    CardBody,
    CardHeader,
    __experimentalSpacer as Spacer,
    Notice,
    Animate,
    ToggleControl, SelectControl,
} from "@wordpress/components";
import {useContext, useEffect, useState} from '@wordpress/element';
import {SettingsContext} from "../context/SettingsContext";
import apiFetch from "@wordpress/api-fetch";
import {MultiSelectControl} from '@codeamp/block-components';

const {__} = wp.i18n;

function GlobalProtectionSettings() {
    const {settings, updateSetting, saveSettings, settingsSaved, setSettingsSaved} = useContext(SettingsContext);
    const [activateGlobalProtection, setActivateGlobalProtection] = useState(false);
    const [pages, setPages] = useState(false);
    const [excludablePages, setExcludablePages] = useState(false);
    const [globalProtectionId, setGlobalProtectionId] = useState(settings.global_protection_id);
    const [editUrl, setEditUrl] = useState(options.global_edit_url);

    const setSavingSettings = () => {
        saveSettings();
        setSettingsSaved(true);

        setTimeout(function () {
            setSettingsSaved(false);
        }, 2000);
    }

    const updateEditUrl = (global_protection_id) => {
        apiFetch({path: '/passster/v1/edit-url?post_id=' + global_protection_id}).then((url) => {
            setEditUrl(url);
        });
    }

    useEffect(() => {
        // Get global page selection
        apiFetch({path: '/passster/v1/pages'}).then((fetched_pages) => {
            let pages = fetched_pages;

            pages.unshift({label: __('No page selected', 'content-protector'), value: 0});
            setPages(pages);
        });

        // Get excludable page selection
        apiFetch({path: '/passster/v1/excludable-pages'}).then((fetched_pages) => {
            setExcludablePages(fetched_pages);
        });

        if(settings.activate_global_protection) {
            setActivateGlobalProtection(settings.activate_global_protection);
        }
    }, []);

    return (<div className={"inner-settings"}>
        <Card>
            <CardHeader>
                {__('Global Protection', 'content-protector')}
            </CardHeader>
            <CardBody>
                <ToggleControl
                    label={__('Activate Global Protection', 'content-protector')}
                    help={
                        activateGlobalProtection
                            ? __('Global Password Protection is activated.', 'content-protector')
                            : __('Global Password Protection is deactivated.', 'content-protector')
                    }
                    checked={activateGlobalProtection}
                    onChange={(value) => {
                        setActivateGlobalProtection(value);
                        updateSetting("activate_global_protection", value);
                    }}
                />
                {activateGlobalProtection &&
                    <>
                        <SelectControl
                            label={__('Select a Page', 'content-protector')}
                            options={pages}
                            help={__('Visitors who still need to submit the correct password will be redirected to this page. Please follow the link below to set it up.', 'content-protector')}
                            value={globalProtectionId}
                            onChange={(value) => {
                                updateSetting("global_protection_id", value);
                                setGlobalProtectionId(value);
                                updateEditUrl(value);
                            }}
                        />
                        {globalProtectionId &&
                            <a href={editUrl}>{__('Customize the Global Protection Page', 'content-protector')}</a>
                        }
                        {excludablePages &&
                            <>
                                <Spacer margin={5}/>
                                <label
                                    className={"formatted-label"}>{__('Exclude pages', 'content-protector')}</label>
                                <div className={"ps-multi-select"}>
                                    <MultiSelectControl
                                        value={settings.exclude_pages}
                                        options={excludablePages}
                                        onChange={(value) => {
                                            updateSetting("exclude_pages", value);
                                        }}
                                    />
                                </div>
                                <p id="inspector-select-control-0__help"
                                   className="components-base-control__help css-1n1x27z ej5x27r1">
                                    {__('Select pages that should not be affected by global protection. This can be useful for information about data privacy or terms of use pages.', 'content-protector')}
                                </p>
                            </>
                        }
                    </>
                }
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

export default GlobalProtectionSettings;
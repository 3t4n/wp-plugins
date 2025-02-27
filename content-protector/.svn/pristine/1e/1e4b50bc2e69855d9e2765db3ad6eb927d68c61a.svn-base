import {
    Card,
    CardBody,
    CardHeader,
    __experimentalSpacer as Spacer,
    Button,
    Notice,
    Animate,
    ClipboardButton
} from "@wordpress/components";
import {useState, useContext} from "@wordpress/element";
import {SettingsContext} from "../context/SettingsContext";

const {__} = wp.i18n;

function Utilities() {

    const {settings, importSettings, saveSettings, resetSettings, migrateSettings} = useContext(SettingsContext);
    const [isExport, setIsExport] = useState(false);
    const [isImport, setIsImport] = useState(false);
    const [isReset, setIsReset] = useState(false);
    const [isMigrate, setIsMigrate] = useState(false);
    const [hasCopied, setHasCopied] = useState(false);
    const [importData, setImportData] = useState(false);

    const setImportDataValue = event => {
        setImportData(JSON.parse(event.target.value));
    };

    const runImportSettings = () => {
        importSettings(importData);
        setIsImport(true);

        setTimeout(function () {
            setIsImport(false);
        }, 2000);
    }

    const runResetSettings = () => {
        resetSettings();
        setIsReset(true);

        setTimeout(function () {
            setIsReset(false);
        }, 2000);
    }

    const runMigrateSettings = () => {
        migrateSettings();
        saveSettings();
        setIsMigrate(true);

        setTimeout(function () {
            setIsMigrate(false);
        }, 2000);
    }

    return (
        <div className={"inner-settings"}>
            <Card>
                <CardHeader>
                    <b>{__('Migrate Settings', 'content-protector')}</b>
                </CardHeader>
                <CardBody>
                    <p>{__('Migrate all of your customizer settings and options within version 4 of Passster.', 'content-protector')}</p>
                    <p>
                        <Button onClick={runMigrateSettings}
                                variant="primary">{__('Migrate settings', 'content-protector')}</Button>
                    </p>
                    {isMigrate ?
                        <Animate type="slide-in" options={{origin: 'top'}}>
                            {() => (
                                <Notice status="success" isDismissible={false}>
                                    <p>
                                        {__('Settings migration successfully.', 'content-protector')}
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
                    <b>{__('Export', 'content-protector')}</b>
                </CardHeader>
                <CardBody>
                    {!isExport ?
                        <p>
                            <Button onClick={setIsExport}
                                    variant="primary">{__('Export Settings', 'content-protector')}</Button>
                        </p>
                        :
                        <>
                            <p>
                                <code>{JSON.stringify(settings)}</code>
                            </p>
                            <p>
                                <ClipboardButton
                                    variant="secondary"
                                    text={JSON.stringify(settings)}
                                    onCopy={() => setHasCopied(true)}
                                    onFinishCopy={() => setHasCopied(false)}
                                >
                                    {hasCopied ? __('Copied!', 'content-protector') : __('Copy export data', 'content-protector')}
                                </ClipboardButton>
                            </p>
                        </>
                    }
                </CardBody>
            </Card>
            <Spacer margin={5}/>
            <Card>
                <CardHeader>
                    <b>{__('Import', 'content-protector')}</b>
                </CardHeader>
                <CardBody>
                    <p>
                        {__('Paste in the JSON string you got from your export to import all settings for the plugin.', 'content-protector')}
                    </p>
                    <p>
                        <textarea rows="8" cols="60" name="import-data" onChange={setImportDataValue}></textarea>
                    </p>
                    <p>
                        <Button onClick={runImportSettings}
                                variant="primary">{__('Import Settings', 'content-protector')}</Button>
                    </p>
                    {isImport ?
                        <Animate type="slide-in" options={{origin: 'top'}}>
                            {() => (
                                <Notice status="success" isDismissible={false}>
                                    <p>
                                        {__('Settings imported successfully.', 'content-protector')}
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
                    <b>{__('Reset Plugin Data', 'content-protector')}</b>
                </CardHeader>
                <CardBody>
                    <p>{__('By clicking the following button, you will reset all plugin settings. This can be useful if you want to import a new set of settings or you want a fresh start.', 'content-protector')}</p>
                    <p>
                        <Button onClick={runResetSettings}
                                variant="secondary">{__('Reset Plugin Settings', 'content-protector')}</Button>
                    </p>
                    {isReset ?
                        <Animate type="slide-in" options={{origin: 'top'}}>
                            {() => (
                                <Notice status="success" isDismissible={false}>
                                    <p>
                                        {__('Settings resetted successfully.', 'content-protector')}
                                    </p>
                                </Notice>
                            )}
                        </Animate>
                        :
                        ''
                    }
                </CardBody>
            </Card>
        </div>
    )
}

export default Utilities;
import {
    TextControl,
    TextareaControl,
    ToggleControl,
    SelectControl,
    __experimentalSpacer as Spacer,
    Button,
    Animate, Notice, Card, CardBody, CardHeader, ClipboardButton,
} from "@wordpress/components";
import {useEffect, useState} from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';
import {Flex, FlexBlock, FlexItem} from '@wordpress/components';
import { GeneratePassword } from "js-generate-password";
import DataTable from 'react-data-table-component';

const {__} = wp.i18n;

function Metabox() {
    const [postId] = useState(options.post_id);
    const [meta, setMeta] = useState(options.meta);
    const [expirationMode, setExpirationMode] = useState("first_usage");
    const [expireAfterUsage, setExpireAfterUsage] = useState(false);
    const [numberOfPasswords, setNumberOfPasswords] = useState(5);
    const [isReset, setIsReset] = useState(false);

    const saveMeta = (meta_key, value) => {
        apiFetch({
            path: '/passster/v1/meta?meta_key=' + meta_key + '&post_id=' + postId,
            method: 'POST',
            data: {meta_value: value},
        });

        setMeta({...meta, [meta_key]: value});
    }

    const deleteMeta = (meta_key) => {
        apiFetch({
            path: '/passster/v1/meta?meta_key=' + meta_key + '&post_id=' + postId,
            method: 'POST',
            data: {delete: true},
        });
    }

    const generatePasswords = () => {
        let passwords = '';

        if (meta.passster_passwords !== undefined) {
            passwords = meta.passster_passwords;
        }

        if ('' !== passwords) {
            passwords = passwords + ',';
        }

        for (let i = 0; i < numberOfPasswords; i++) {

            let password = GeneratePassword({
                length: options.password_length,
                uppercase: options.include_uppercase,
                numbers: options.include_numbers,
                symbols: false,
            });

            passwords = passwords += password + ',';
        }

        passwords = passwords.slice(0, -1);

        saveMeta("passster_passwords", passwords);
    }

    const columns = [
        {
            name: __('Password', 'content-protector'),
            selector: row => row.password,
            sortable: true,
        },
        {
            name: __('Number of usages', 'content-protector'),
            selector: row => row.usage,
            sortable: true,
        },
        {
            name: __('Expires in', 'content-protector'),
            selector: row => row.time,
            sortable: true,
        },
        {
            name: __('Expired', 'content-protector'),
            selector: row => row.expired,
            sortable: true,
        },
    ];

    const runResetStatistics = () => {
        // Delete Meta.
        deleteMeta('passster_expired_passwords');
        deleteMeta('passster_expired_passwords_statistics');

        setIsReset(true);

        setTimeout(function () {
            setIsReset(false);
        }, 2000);
    }

    useEffect(() => {
        if (meta.passster_expire_mode) {
            setExpirationMode(meta.passster_expire_mode);
        }

        if (meta.passster_expire_passwords) {
            setExpireAfterUsage(true);
        }

    }, [postId, meta]);


    return (<div className={"paswword-list-settings"}>
        <Spacer margin={5}/>
        <Card className={"add-passwords"}>
            <CardHeader>
                <b>{__('Add Passwords', 'content-protector')}</b>
            </CardHeader>
            <CardBody>
                <TextareaControl
                    label={__('Passwords', 'content-protector')}
                    placeholder={__('password1,password2,password3', 'content-protector')}
                    rows={"15"}
                    help={__('Add a comma-separated list of passwords.', 'content-protector')}
                    value={meta.passster_passwords}
                    onChange={(value) => {
                        saveMeta("passster_passwords", value);
                    }}
                />
                <Flex justify={"left"}>
                    <FlexItem>
                        <FlexBlock>
                            <TextControl
                                label={__('Number of passwords to generate', 'content-protector')}
                                help={__("How many passwords do you want to generate? We automatically add the generated passwords to your password list.", 'content-protector')}
                                type={"number"}
                                value={numberOfPasswords}
                                onChange={(value) => {
                                    setNumberOfPasswords(value);
                                }}
                            />
                        </FlexBlock>
                    </FlexItem>
                    <FlexItem>
                        <FlexBlock>
                            <Button style={{top: "-5px", position: "relative"}} onClick={generatePasswords}
                                    variant="primary">{__('Generate passwords', 'content-protector')}</Button>
                        </FlexBlock>
                    </FlexItem>
                </Flex>
            </CardBody>
        </Card>
        <Spacer margin={5}/>
        <Card className={"expire-passswords"}>
            <CardHeader>
                <b>{__('Expiration', 'content-protector')}</b>
            </CardHeader>
            <CardBody>
                <SelectControl
                    label={__('Choose an expiration mode', 'content-protector')}
                    value={meta.passster_expire_mode}
                    options={[
                        {label: __('First Usage', 'content-protector'), value: 'first_usage'},
                        {label: __('Number of usages', 'content-protector'), value: 'number_of_usages'},
                        {label: __('By Interval', 'content-protector'), value: 'interval'},
                    ]}
                    onChange={(value) => {

                        // Reset existing values.
                        if (value === 'first_usage') {
                            saveMeta("passster_expire_usage", '');
                            saveMeta("passster_expire_time", '');
                            saveMeta("passster_expire_time_unit", 'day');
                        } else if (value === 'number_of_usages') {
                            saveMeta("passster_expire_passwords", false);
                            saveMeta("passster_expire_time", '');
                            saveMeta("passster_expire_time_unit", 'day');
                        } else if (value === 'interval') {
                            saveMeta("passster_expire_usage", '');
                            saveMeta("passster_expire_passwords", false);
                        }

                        saveMeta("passster_expire_mode", value);
                        setExpirationMode(value);
                    }}
                />
                <Spacer margin={5}/>
                {'first_usage' === expirationMode &&
                    <ToggleControl
                        label={__('Expire Password after usage', 'content-protector')}
                        help={__("The password will be immediately removed from the password list after it's first usage.", 'content-protector')}
                        checked={expireAfterUsage}
                        onChange={(value) => {
                            setExpireAfterUsage(value);
                            saveMeta("passster_expire_passwords", value);
                        }}
                    />
                }
                <Spacer margin={5}/>
                {'number_of_usages' === expirationMode &&
                    <TextControl
                        label={__('Expire after number of usage', 'content-protector')}
                        help={__("The password will be removed from the password list after the number of usage is reached.", 'content-protector')}
                        type={"number"}
                        value={meta.passster_expire_usage}
                        onChange={(value) => {
                            saveMeta("passster_expire_usage", value);
                        }}
                    />
                }
                <Spacer margin={5}/>
                {'interval' === expirationMode &&
                    <Flex justify={"left"}>
                        <FlexItem>
                            <FlexBlock>
                                <TextControl
                                    label={__('Expire after a time interval', 'content-protector')}
                                    help={__("Expire the password after a specific time interval. It starts tracking once the password is used for the first time.", 'content-protector')}
                                    type={"number"}
                                    value={meta.passster_expire_time}
                                    onChange={(value) => {
                                        saveMeta("passster_expire_time", value);
                                    }}
                                />
                            </FlexBlock>
                        </FlexItem>
                        <FlexItem>
                            <FlexBlock>
                                <SelectControl
                                    className={"time-unit-select"}
                                    label={__('Time Unit', 'content-protector')}
                                    value={meta.passster_expire_time_unit}
                                    options={[
                                        {label: __('Days', 'content-protector'), value: 'day'},
                                        {label: __('Hours', 'content-protector'), value: 'hour'},
                                        {label: __('Weeks', 'content-protector'), value: 'week'},
                                        {label: __('Months', 'content-protector'), value: 'month'}
                                    ]}
                                    onChange={(value) => {
                                        saveMeta("passster_expire_time_unit", value);
                                    }}
                                />
                            </FlexBlock>
                        </FlexItem>
                    </Flex>
                }
            </CardBody>
        </Card>
        <Spacer margin={5}/>
        {meta.passster_expired_passwords_statistics &&
            <Card>
                <CardHeader>
                    <b>{__('Usage', 'content-protector')}</b>
                </CardHeader>
                <CardBody>
                    <DataTable
                        columns={columns}
                        data={meta.passster_expired_passwords_statistics}
                        pagination
                    />
                    <Button onClick={runResetStatistics}
                            variant="secondary">{__('Reset Expiration Statistics', 'content-protector')}</Button>

                    {isReset ?
                        <Animate type="slide-in" options={{origin: 'top'}}>
                            {() => (
                                <Notice status="success" className={"expiration-notice"} isDismissible={false}>
                                    <p>
                                        {__('Expiration Statistics resetted successfully.', 'content-protector')}
                                    </p>
                                </Notice>
                            )}
                        </Animate>
                        :
                        ''
                    }
                </CardBody>
            </Card>
        }
    </div>)
}

export default Metabox;
import {
    TextControl,
    TextareaControl,
    ToggleControl,
    SelectControl,
    ClipboardButton,
    __experimentalSpacer as Spacer,
    Button,
    FlexItem, FlexBlock,
} from "@wordpress/components";
import {useEffect, useState} from '@wordpress/element';
import {useSelect} from "@wordpress/data";
import apiFetch from '@wordpress/api-fetch';
import {GeneratePassword} from "js-generate-password";

const {__} = wp.i18n;

function Metabox() {
    const [postID, setPostID] = useState();
    const [meta, setMeta] = useState(options.meta);
    const [activateProtection, setActivateProtection] = useState(false);
    const [protectionType, setProtectionType] = useState('password');
    const [userRoles, setUserRoles] = useState();
    const [protectChildPages, setProtectChildPages] = useState(false);
    const [showUserSettings, setShowUserSettings] = useState(false);
    const [showOverwriteTexts, setShowOverwriteTexts] = useState(false);
    const [showMiscSettings, setShowMiscSettings] = useState(false);
    const [hasCopied, setHasCopied] = useState(false);
    const [hasLinkCopied, setHasLinkCopied] = useState(false);
    const [unlockLink, setUnlockLink] = useState(false);
    const [numberOfPasswords, setNumberOfPasswords] = useState(3);
    const [passwordGenerateType, setPasswordGenerateType] = useState('password');
    const [generatedPassword, setGeneratedPassword] = useState(meta.passster_password);
    const [generatedPasswords, setGeneratedPasswords] = useState(meta.passster_passwords);
    const [fetchedChildPages, setFetchedChildPages] = useState();
    const [multiplePasswordLists, setMultiplePasswordLists] = useState([]);

    const fetchPostID = () => {

        if (!fetchCorePostId) {
            let urlParams = new URLSearchParams(window.location.search);
            let postID = urlParams.get('post');

            // Now set the post ID:
            setPostID(postID);
        }
    }

    const fetchCorePostId = useSelect((select) => {
        const {getCurrentPostId} = select('core/editor');

        if (getCurrentPostId()) {
            setPostID(getCurrentPostId());
            return true;
        } else {
            return false;
        }
    }, []);

    const saveMeta = (meta_key, value) => {
        apiFetch({
            path: '/passster/v1/meta?meta_key=' + meta_key + '&post_id=' + postID,
            method: 'POST',
            data: {meta_value: value},
        });

        setMeta({...meta, [meta_key]: value});
    }

    const saveChildMeta = (childID, meta_key, value) => {
        apiFetch({
            path: '/passster/v1/meta?meta_key=' + meta_key + '&post_id=' + childID,
            method: 'POST',
            data: {meta_value: value},
        });
    }

    const getChildPages = (postID) => {
        apiFetch({path: '/passster/v1/child-pages?post_id=' + postID}).then((childs) => {
            setFetchedChildPages(childs);
        });
    }

    const password_lists = useSelect(
        (select) => {
            const {getEntityRecords} = select('core');

            return getEntityRecords('postType', 'password_lists', {
                per_page: -1,
                order: 'asc',
                status: 'publish'
            });
        },
        []
    );

    const generatePasswords = () => {
        if ('passwords' === passwordGenerateType) {
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

            setGeneratedPasswords(passwords);
            saveMeta("passster_passwords", passwords);

        } else if ('password' === passwordGenerateType) {
            let password = GeneratePassword({
                length: options.password_length,
                uppercase: options.include_uppercase,
                numbers: options.include_numbers,
                symbols: false,
            });

            setGeneratedPassword(password);
            saveMeta("passster_password", password);
        }
    }

    const getSelectablePasswordLists = () => {
        if (!password_lists) {
            return [];
        }

        const options = [];

        // Add no role.
        options.push({
            label: __('No Password List', 'content-protector'),
            value: 0,
        });

        password_lists.map(function (password_list) {
            if (password_list.title.raw && password_list.title.raw !== '') {
                options.push({
                    label: password_list.title.raw,
                    value: password_list.id,
                });
            }
            return password_list;
        });

        return options;
    };

    const getSelectableUserRoles = () => {
        if (!userRoles) {
            return [];
        }

        const options = [];

        // Add no role.
        options.push({
            label: __('No Role', 'content-protector'),
            value: 'no-role',
        });

        for (const userRole in userRoles) {
            options.push({
                label: userRoles[userRole].name,
                value: userRole,
            });
        }

        return options;
    };

    const getAreaShortcode = () => {
        let shortcode = '';

        if (!activateProtection) {
            return shortcode;
        }

        // Modify based on protection type.
        switch (meta.passster_protection_type) {
            case 'password':
                shortcode = '[passster password="' + meta.passster_password + '" ';
                break;
            case 'passwords':
                shortcode = '[passster passwords="' + meta.passster_passwords + '" ';
                break;
            case 'password_list':
                shortcode = '[passster password_list="' + meta.passster_password_list + '" ';
                break;
            case 'password_lists':
                shortcode = '[passster password_lists="' + meta.passster_password_lists.join('|') + '" ';
                break;
            case 'recaptcha':
                shortcode = '[passster recaptcha="true" ';
                break;
            default:
                shortcode = '[passster password="' + meta.passster_password + '" ';
        }

        shortcode += 'area="' + postID + '" ';

        if (showUserSettings) {
            // Modify based on user restriction.
            if ('' !== meta.passster_user_restriction) {
                if ('user-role' === meta.passster_user_restriction_type && 'no-role' !== meta.passster_user_restriction) {
                    shortcode += 'role="' + meta.passster_user_restriction + '" ';
                } else {
                    if ('no-role' !== meta.passster_user_restriction) {
                        shortcode += 'user="' + meta.passster_user_restriction + '" ';
                    }
                }
            }
        }

        if (showOverwriteTexts) {
            // Modify based on changed defaults.
            if ('' !== meta.passster_headline) {
                shortcode += 'headline="' + meta.passster_headline + '" ';
            }

            if ('' !== meta.passster_instruction) {
                shortcode += 'instruction="' + meta.passster_instruction + '" ';
            }

            if ('' !== meta.passster_placeholder) {
                shortcode += 'placeholder="' + meta.passster_placeholder + '" ';
            }

            if ('' !== meta.passster_button) {
                shortcode += 'button="' + meta.passster_button + '" ';
            }

            if ('' !== meta.passster_id) {
                shortcode += 'id="' + meta.passster_id + '" ';
            }
        }

        if (showMiscSettings) {
            // Modify based on misc settings.
            if ('' !== meta.passster_redirect_url) {
                shortcode += 'redirect="' + meta.passster_redirect_url + '" ';
            }

            if ('yes' === meta.passster_hide) {
                shortcode += 'hide="true" ';
            }
        }

        shortcode = shortcode.replace(/\s?$/, '');
        shortcode += ']';

        return shortcode;
    }

    const generateUnlockLink = () => {
        let link = '';

        switch (protectionType) {
            case 'password':
                link = apiFetch({
                    path: '/passster/v1/link?password=' + meta.passster_password + '&post_id=' + postID + '&is_list=false',
                    method: 'GET',
                }).then((res) => {
                    setUnlockLink(res);
                });
                break;
            case 'passwords':
                let passwords = meta.passster_passwords.split(',');

                link = apiFetch({
                    path: '/passster/v1/link?password=' + passwords[0] + '&post_id=' + postID + '&is_list=false',
                    method: 'GET',
                }).then((res) => {
                    setUnlockLink(res);
                });

                break;
            case 'password_list':
                link = apiFetch({
                    path: '/passster/v1/link?password=' + meta.passster_password_list + '&post_id=' + postID + '&is_list=true',
                    method: 'GET',
                }).then((res) => {
                    setUnlockLink(res);
                });
                break;
            case 'password_lists':
                link = apiFetch({
                    path: '/passster/v1/link?password=' + meta.passster_password_lists + '&post_id=' + postID + '&is_list=true' + '&is_multiple=true',
                    method: 'GET',
                }).then((res) => {
                    setUnlockLink(res);
                });
                break;
        }
    }

    const showShortcode = () => {
        let show = false;

        switch (meta.passster_protection_type) {
            case 'password':
                if (meta.passster_password) {
                    show = true;
                }
                break;
            case 'passwords':
                if (meta.passster_password) {
                    show = true;
                }

                break;
            case 'password_list':
                if (meta.passster_password_list) {
                    show = true;
                }
                break;
            case 'password_lists':
                if (meta.passster_password_lists) {
                    show = true;
                }
                break;
            case 'recaptcha':
                show = true;
                break;
        }

        return show;
    }

    const updateChildPages = (useChild) => {
        if (useChild) {
            // Maybe fetch child pages.
            getChildPages(postID);

            if (fetchedChildPages) {
                fetchedChildPages.forEach(function (childID) {

                    // Update meta for these pages.
                    saveChildMeta(childID, "passster_activate_protection", activateProtection);
                    saveChildMeta(childID, "passster_protection_type", protectionType);

                    if (options.is_pro) {
                        switch (protectionType) {
                            case 'password':
                                saveChildMeta(childID, "passster_password", meta.passster_password);
                                break;
                            case 'passwords':
                                saveChildMeta(childID, "passster_passwords", meta.passster_passwords);
                                break;
                            case 'password_list':
                                saveChildMeta(childID, "passster_password_list", meta.passster_password_list);
                                break;
                            case 'password_lists':
                                saveChildMeta(childID, "passster_password_lists", meta.passster_password_lists);
                                break;
                        }
                    } else {
                        saveChildMeta(childID, "passster_password", meta.passster_password);
                    }

                    if (options.is_pro) {
                        // Maybe overwrite user restriction.
                        if (showUserSettings) {
                            saveChildMeta(childID, "passster_activate_user_restriction", showUserSettings);
                            saveChildMeta(childID, "passster_user_restriction_type", meta.passster_user_restriction_type);
                            saveChildMeta(childID, "passster_user_restriction", meta.passster_user_restriction);
                        }
                    }

                    // Maybe overwrite labels.
                    if (showOverwriteTexts) {
                        saveChildMeta(childID, "passster_activate_overwrite_defaults", showOverwriteTexts);
                        saveChildMeta(childID, "passster_headline", meta.passster_headline);
                        saveChildMeta(childID, "passster_instruction", meta.passster_instruction);
                        saveChildMeta(childID, "passster_placeholder", meta.passster_placeholder);
                        saveChildMeta(childID, "passster_button", meta.passster_button);
                        saveChildMeta(childID, "passster_id", meta.passster_id);
                    }

                    // Maybe overwrite miscs.
                    if (showMiscSettings) {
                        saveChildMeta(childID, "passster_activate_misc_settings", showMiscSettings);
                        saveChildMeta(childID, "passster_hide", meta.passster_hide);
                        saveChildMeta(childID, "passster_redirect_url", meta.passster_redirect_url);
                    }
                });
            }
        } else {
            // Maybe fetch child pages.
            getChildPages(postID);

            if (fetchedChildPages) {
                fetchedChildPages.forEach(function (childID) {

                    // Update meta for these pages.
                    saveChildMeta(childID, "passster_activate_protection", false);
                    saveChildMeta(childID, "passster_protection_type", "");

                    if (options.is_pro) {
                        saveChildMeta(childID, "passster_password", "");
                        saveChildMeta(childID, "passster_passwords", "");
                        saveChildMeta(childID, "passster_password_list", 0);

                        // Clear user restriction.
                        saveChildMeta(childID, "passster_user_restriction_type", "username");
                        saveChildMeta(childID, "passster_user_restriction", "");
                    } else {
                        saveChildMeta(childID, "passster_password", "");
                    }

                    // Clear labels.
                    saveChildMeta(childID, "passster_headline", "");
                    saveChildMeta(childID, "passster_instruction", "");
                    saveChildMeta(childID, "passster_placeholder", "");
                    saveChildMeta(childID, "passster_button", "");
                    saveChildMeta(childID, "passster_id", "");

                    // Clear miscs.
                    saveChildMeta(childID, "passster_hide", "");
                    saveChildMeta(childID, "passster_redirect_url", "");
                });
            }
        }

    }

    useEffect(() => {

        fetchPostID();

        if (options.is_pro) {
            // Setup user roles.
            apiFetch({path: '/passster/v1/user-roles'}).then((value) => {
                setUserRoles(value);
            });
        }

        if (meta.passster_password_lists) {
            setMultiplePasswordLists(meta.passster_password_lists);
        }

        // Check for post type.
        if ('protected_areas' === options.post_type) {
            setActivateProtection(true);
        }

        // Check if global protection.
        if (options.global_protection_id == postID) {
            setActivateProtection(true);
        }

        // Toggle settings.
        if (meta.passster_activate_protection) {
            setActivateProtection(true);
        } else {
            if ('protected_areas' !== options.post_type && options.global_protection_id != postID) {
                setActivateProtection(false);
            }
        }

        if (meta.passster_protect_child_pages) {
            setProtectChildPages(true);

        }

        if (protectChildPages) {
            updateChildPages(true);
        } else {
            updateChildPages(false);
        }


        if (options.is_pro) {
            if (meta.passster_activate_user_restriction) {
                setShowUserSettings(true);
            }
        }

        if (meta.passster_activate_overwrite_defaults) {
            setShowOverwriteTexts(true);
        }

        if (meta.passster_activate_misc_settings) {
            setShowMiscSettings(true);
        }

        if (meta.passster_password) {
            setGeneratedPassword(meta.passster_password);
        }

        if (options.is_pro) {
            if (meta.passster_passwords) {
                setGeneratedPassword(meta.passster_passwords);
            }
        }

        setProtectionType(meta.passster_protection_type);

        if (options.is_pro) {
            // Genenerate encrypted unlock link.
            generateUnlockLink();
        }

        // Save shortcode to meta.
        if (showShortcode()) {
            saveMeta("passster_area_shortcode", getAreaShortcode());
        } else {
            saveMeta("passster_area_shortcode", "");
        }

    }, [postID]);

    return (<div className={"meta-settings"}>
        {'protected_areas' !== options.post_type &&
            <ToggleControl
                label={__('Activate Protection', 'content-protector')}
                checked={activateProtection}
                onChange={(value) => {
                    setActivateProtection(value);
                    saveMeta("passster_activate_protection", value);
                }}
            />
        }
        {activateProtection &&
            <>
                {'page' === options.post_type &&
                    <ToggleControl
                        label={__('Protect Child Pages', 'content-protector')}
                        checked={protectChildPages}
                        onChange={(value) => {
                            setProtectChildPages(value);
                            saveMeta("passster_protect_child_pages", value);
                            updateChildPages(value);
                        }}
                    />
                }
                {options.is_pro ?
                    <>
                        <SelectControl
                            label={__('Protection Mode', 'content-protector')}
                            value={protectionType}
                            options={[{
                                label: __('Password', 'content-protector'), value: 'password'
                            }, {
                                label: __('Passwords', 'content-protector'), value: 'passwords'
                            }, {
                                label: __('Password List', 'content-protector'), value: 'password_list'
                            }, {
                                label: __('Password Lists', 'content-protector'), value: 'password_lists'
                            }, {label: __('reCAPTCHA', 'content-protector'), value: 'recaptcha'},]}
                            onChange={(value) => {
                                saveMeta("passster_protection_type", value);
                                setProtectionType(value);
                            }}
                        />
                        {protectionType == 'password' &&
                            <>
                                <TextControl
                                    label={__('Password', 'content-protector')}
                                    placeholder={"password1"}
                                    value={generatedPassword}
                                    onChange={(value) => {
                                        setGeneratedPassword(value);
                                        saveMeta("passster_password", value);
                                    }}
                                />
                                <Spacer margin={5}/>
                                <Button
                                    style={{top: "-5px", position: "relative"}}
                                    onClick={() => {
                                        setPasswordGenerateType('password');
                                        generatePasswords();
                                    }}
                                    variant="secondary">{__('Generate password', 'content-protector')}
                                </Button>
                            </>
                        }
                        {protectionType == 'passwords' &&
                            <>
                                <TextControl
                                    label={__('Passwords', 'content-protector')}
                                    placeholder={"password1,password2,password3"}
                                    value={generatedPasswords}
                                    onChange={(value) => {
                                        setGeneratedPasswords(value);
                                        saveMeta("passster_passwords", value);
                                    }}
                                />
                                <FlexItem>
                                    <FlexBlock>
                                        <TextControl
                                            label={__('Number of passwords to generate', 'content-protector')}
                                            help={__("How many passwords do you want to generate?", 'content-protector')}
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
                                        <Button
                                            style={{top: "-5px", position: "relative"}}
                                            onClick={() => {
                                                setPasswordGenerateType('passwords');
                                                generatePasswords();
                                            }}
                                            variant="secondary">{__('Generate password', 'content-protector')}
                                        </Button>
                                    </FlexBlock>
                                </FlexItem>
                            </>
                        }
                        {protectionType == 'password_list' &&
                            <>
                                <SelectControl
                                    label={__('Password List', 'content-protector')}
                                    options={getSelectablePasswordLists()}
                                    value={meta.passster_password_list}
                                    onChange={(value) => {
                                        saveMeta("passster_password_list", value);
                                    }}
                                />
                            </>}
                        {protectionType == 'password_lists' && multiplePasswordLists &&
                            <>
                                <SelectControl
                                    multiple
                                    label={__('Password Lists', 'content-protector')}
                                    options={getSelectablePasswordLists()}
                                    value={meta.passster_password_lists}
                                    onChange={(value) => {
                                        setMultiplePasswordLists(value);
                                        saveMeta("passster_password_lists", value);
                                    }}
                                />
                            </>
                        }
                    </>
                    :
                    <>
                        <TextControl
                            label={__('Password', 'content-protector')}
                            placeholder={"password1"}
                            value={generatedPassword}
                            onChange={(value) => {
                                setGeneratedPassword(value);
                                saveMeta("passster_password", value);
                            }}
                        />
                        <Spacer margin={5}/>
                        <Button
                            style={{top: "-5px", position: "relative"}}
                            onClick={() => {
                                setPasswordGenerateType('password');
                                generatePasswords();
                            }}
                            variant="secondary">{__('Generate password', 'content-protector')}
                        </Button>
                    </>
                }
                <Spacer margin={5}/>
                {options.is_pro &&
                    <>
                        <ToggleControl
                            label={__('User Restriction', 'content-protector')}
                            checked={showUserSettings}
                            onChange={(value) => {
                                setShowUserSettings(value);
                                saveMeta("passster_activate_user_restriction", value);
                            }}
                        />
                        {showUserSettings &&
                            <>
                                <SelectControl
                                    label={__('Choose User Restriction Type', 'content-protector')}
                                    options={[{
                                        label: __('Username', 'content-protector'), value: 'username'
                                    }, {label: __('User Role', 'content-protector'), value: 'user-role'},]}
                                    value={meta.passster_user_restriction_type}
                                    onChange={(value) => {
                                        saveMeta("passster_user_restriction_type", value);
                                    }}
                                />
                                {meta.passster_user_restriction_type === 'user-role' ?
                                    <SelectControl
                                        label={__('User Role', 'content-protector')}
                                        value={meta.passster_user_restriction}
                                        placeholder={"subscriber"}
                                        options={getSelectableUserRoles()}
                                        onChange={(value) => {
                                            saveMeta("passster_user_restriction", value);
                                        }}
                                    />
                                    :
                                    <TextControl
                                        label={__('Username', 'content-protector')}
                                        value={meta.passster_user_restriction}
                                        placeholder={"user_a"}
                                        onChange={(value) => {
                                            saveMeta("passster_user_restriction", value);
                                        }}
                                    />
                                }
                            </>}
                        <Spacer margin={5}/>
                    </>
                }
                <ToggleControl
                    label={__('Overwrite Defaults', 'content-protector')}
                    checked={showOverwriteTexts}
                    onChange={(value) => {
                        setShowOverwriteTexts(value);
                        saveMeta("passster_activate_overwrite_defaults", value);
                    }}
                />
                {showOverwriteTexts && <>
                    <TextControl
                        label={__('Headline', 'content-protector')}
                        placeholder={__('Protected Area', 'content-protector')}
                        help={__('This is the headline of your password-protection form.', 'content-protector')}
                        value={meta.passster_headline}
                        onChange={(value) => {
                            saveMeta("passster_headline", value);
                        }}
                    />
                    <TextareaControl
                        label={__('Instruction', 'content-protector')}
                        placeholder={__('This content is password-protected. Please verify with a password to unlock the content.', 'content-protector')}
                        help={__('The instruction text appears before the password input field. Use it for hints or additional explanation.', 'content-protector')}
                        value={meta.passster_instruction}
                        onChange={(value) => {
                            saveMeta("passster_instruction", value);
                        }}
                    />
                    <TextControl
                        label={__('Placeholder', 'content-protector')}
                        placeholder={__('Enter your password..', 'content-protector')}
                        help={__('Edit the placeholder text of the password field.', 'content-protector')}
                        value={meta.passster_placeholder}
                        onChange={(value) => {
                            saveMeta("passster_placeholder", value);
                        }}
                    />
                    <TextControl
                        label={__('Button Label', 'content-protector')}
                        placeholder={__('Unlock', 'content-protector')}
                        help={__('Edit the text that appears on the button.', 'content-protector')}
                        value={meta.passster_button}
                        onChange={(value) => {
                            saveMeta("passster_button", value);
                        }}
                    />
                    <TextControl
                        label={__('Unique ID', 'content-protector')}
                        placeholder={__('my-custom-id', 'content-protector')}
                        help={__('Give your password form a unique ID.', 'content-protector')}
                        value={meta.passster_id}
                        onChange={(value) => {
                            saveMeta("passster_id", value);
                        }}
                    />
                </>}
                <Spacer margin={5}/>
                <ToggleControl
                    label={__('Misc Settings', 'content-protector')}
                    checked={showMiscSettings}
                    onChange={(value) => {
                        setShowMiscSettings(value);
                        saveMeta("passster_activate_misc_settings", value);
                    }}
                />
                {showMiscSettings && <>
                    <SelectControl
                        label={__('Hide/Show', 'content-protector')}
                        options={[{label: __('No', 'content-protector'), value: 'no'}, {
                            label: __('Yes', 'content-protector'), value: 'yes'
                        },]}
                        value={meta.passster_hide}
                        help={__('Hide this password form. It will not show the password form, but it will show the unlocked content.', 'content-protector')}
                        onChange={(value) => {
                            saveMeta("passster_hide", value);
                        }}
                    />
                    <TextControl
                        label={__('Redirect', 'content-protector')}
                        placeholder={"https://your-url.com"}
                        type={"url"}
                        help={__('Redirect the user to this URL once they submit the correct password.', 'content-protector')}
                        value={meta.passster_redirect_url}
                        onChange={(value) => {
                            saveMeta("passster_redirect_url", value);
                        }}
                    />
                </>}
                <Spacer margin={5}/>

                {'protected_areas' === options.post_type && showShortcode() ?
                    <ClipboardButton
                        variant="primary"
                        text={getAreaShortcode()}
                        onCopy={() => setHasCopied(true)}
                        onFinishCopy={() => setHasCopied(false)}
                    >
                        {hasCopied ? __('Copied!', 'content-protector') : __('Copy Shortcode', 'content-protector')}
                    </ClipboardButton>
                    :
                    <>
                        {protectionType === 'password' && meta.passster_password &&
                            <ClipboardButton
                                variant="secondary"
                                text={unlockLink}
                                onCopy={() => setHasLinkCopied(true)}
                                onFinishCopy={() => setHasLinkCopied(false)}
                            >
                                {hasLinkCopied ? __('Copied Link!', 'content-protector') : __('Copy Unlock Link', 'content-protector')}
                            </ClipboardButton>
                        }
                        {protectionType === 'passwords' && meta.passster_passwords &&
                            <ClipboardButton
                                variant="secondary"
                                text={unlockLink}
                                onCopy={() => setHasLinkCopied(true)}
                                onFinishCopy={() => setHasLinkCopied(false)}
                            >
                                {hasLinkCopied ? __('Copied Link!', 'content-protector') : __('Copy Unlock Link', 'content-protector')}
                            </ClipboardButton>
                        }
                        {protectionType === 'password_list' && meta.passster_password_list &&
                            <ClipboardButton
                                variant="secondary"
                                text={unlockLink}
                                onCopy={() => setHasLinkCopied(true)}
                                onFinishCopy={() => setHasLinkCopied(false)}
                            >
                                {hasLinkCopied ? __('Copied Link!', 'content-protector') : __('Copy Unlock Link', 'content-protector')}
                            </ClipboardButton>
                        }
                    </>
                }
            </>
        }

    </div>)
}

export default Metabox;
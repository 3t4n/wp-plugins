// eslint-disable-next-line import/no-extraneous-dependencies
import { createRoot } from '@wordpress/element';

import Settings from './settings/Settings'
import Statistics from './statistics/Statistics'
import Meta from './meta/general/Meta'
import PasswordListMeta from './meta/password-lists/PasswordListMeta'

if (options.screen === 'meta') {
    let meta = createRoot(document.getElementById('passster-metabox'));
    meta.render(<Meta/>);
} else if (options.screen === 'password-lists') {
    let lists_meta = createRoot(document.getElementById('password-lists-metabox'));
    lists_meta.render(<PasswordListMeta/>);
} else if (options.screen === 'passster-statistics') {
    let lists_meta = createRoot(document.getElementById('passster-statistics'));
    lists_meta.render(<Statistics/>);
} else if (options.screen === 'passster-settings') {
    let settings = createRoot(document.getElementById('passster-settings'));
    settings.render(<Settings/>);
}


import './admin.scss';
import domReady from '@wordpress/dom-ready';
import { createRoot } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import { Panel, TabPanel } from '@wordpress/components';

// Import the tab components
import GeneralTab from './admin/GeneralTab';

const SettingsPage = () => {

    return (
        <Panel>
            <GeneralTab />
        </Panel>
    );
};

domReady(() => {
    const rootElement = document.getElementById('gmacaw-admin-root');
    
    if (rootElement) {
        const root = createRoot(rootElement);
        root.render(<SettingsPage />);
    } else {
        console.warn("Element with ID 'gmacaw-admin-root' not found.");
    }
});


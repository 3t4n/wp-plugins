import GeneralSettings from '../pages/GeneralSettings';
import DesignSettings from '../pages/DesignSettings';
import GlobalProtectionSettings from '../pages/GlobalProtectionSettings';
import WooIntegrationSettings from '../pages/WooIntegrationSettings';
import AdvancedSettings from '../pages/AdvancedSettings';
import ExternalSettings from '../pages/ExternalSettings';
import SystemStatus from '../pages/SystemStatus';
import Utilities from '../pages/Utilities';
import { useState, useEffect, useContext } from '@wordpress/element';
import { Flex, FlexItem,
	// eslint-disable-next-line @wordpress/no-unsafe-wp-apis
	__experimentalNavigatorProvider as NavigatorProvider,
	// eslint-disable-next-line @wordpress/no-unsafe-wp-apis
	__experimentalNavigatorScreen as NavigatorScreen,
	// eslint-disable-next-line @wordpress/no-unsafe-wp-apis
	__experimentalNavigatorButton as NavigatorButton,
	Button,
	Dashicon,
	Card,
	CardBody,
	CardDivider,
} from '@wordpress/components';

const { __ } = wp.i18n;

function SettingsPage() {
	const [ activeItem, setActiveItem ] = useState( '/' );
	const [ initialSet, setInitialSet ] = useState( false );

	useEffect( () => {
		if ( ! initialSet ) {
			setActiveItem( '/' );
			setInitialSet( true );
		}
	} );

	return (
		<div className={ 'plugin-settings-container' }>
			<NavigatorProvider initialPath="/">
				<Flex>
					<FlexItem>
						<Card className={ 'plugin-nav' }>
							<div className={ 'plugin-logo' }>
								<img alt="Logo"
									src={ options.logo } />
							</div>
							{ /* eslint-disable-next-line no-undef */ }
							<p>Version: <b>{ options.version }</b></p>
							{ ! options.is_pro && (
								<div className={ 'save-settings' }>
									<Button href="https://passster.com/#pricing" target="_blank"
										variant="primary">{ __( 'Passster PRO', 'content-protector' ) }</Button>
								</div>
							) }
							<CardBody>
								<NavigatorButton onClick={ () => setActiveItem( '/' ) }
									className={ activeItem === '/' ? 'is-active-item' : '' } path="/">
									{ __( 'General', 'content-protector' ) }
								</NavigatorButton>
								<NavigatorButton onClick={ () => setActiveItem( '/design-settings' ) }
									className={ activeItem === '/design-settings' ? 'is-active-item' : '' }
									path="/design-settings">
									{ __( 'Design', 'content-protector' ) }
								</NavigatorButton>
								<NavigatorButton onClick={ () => setActiveItem( '/advanced-settings' ) }
									className={ activeItem === '/advanced-settings' ? 'is-active-item' : '' }
									path="/advanced-settings">
									{ __( 'Advanced', 'content-protector' ) }
								</NavigatorButton>
							</CardBody>
							<CardDivider />
							<CardBody>
								<NavigatorButton onClick={ () => setActiveItem( '/global-protection' ) }
									className={ activeItem === '/global-protection' ? 'is-active-item' : '' }
									path="/global-protection">
									{ __( 'Global Protection', 'content-protector' ) }
								</NavigatorButton>
								<NavigatorButton onClick={ () => setActiveItem( '/woo-integration' ) }
									className={ activeItem === '/woo-integration' ? 'is-active-item' : '' }
									path="/woo-integration">
									{ __( 'WooCommerce Integration', 'content-protector' ) }
								</NavigatorButton>
							</CardBody>
							<CardDivider />
							<CardBody>
								<NavigatorButton onClick={ () => setActiveItem( '/external-settings' ) }
									className={ activeItem === '/external-settings' ? 'is-active-item' : '' }
									path="/external-settings">
									{ __( 'External Services', 'content-protector' ) }
								</NavigatorButton>
								<NavigatorButton onClick={ () => setActiveItem( '/system-status' ) }
									className={ activeItem === '/system-status' ? 'is-active-item' : '' }
									path="/system-status">
									{ __( 'System Status', 'content-protector' ) }
								</NavigatorButton>
								<NavigatorButton onClick={ () => setActiveItem( '/utilities' ) }
									className={ activeItem === '/utilities' ? 'is-active-item' : '' }
									path="/utilities">
									{ __( 'Utilities', 'content-protector' ) }
								</NavigatorButton>
							</CardBody>
							<CardDivider />
							<CardBody>
								<Button href="https://patrickposner.dev/passster/docs/" target="_blank">
									{ __( 'Documentation', 'content-protector' ) } <small><Dashicon
										icon="admin-links" /></small>
								</Button>
								<Button href="https://patrickposner.dev/passster/changelogs/" target="_blank">
									{ __( 'Changelog', 'content-protector' ) } <small><Dashicon
										icon="admin-links" /></small>
								</Button>
								<Button href="https://passster.com/#free-vs-pro" target="_blank"
									style={ { color: '#6804cc' } }>
									{ __( 'Lite vs. Pro', 'content-protector' ) } <small><Dashicon
										icon="admin-links" /></small>
								</Button>
							</CardBody>
						</Card>
					</FlexItem>
					{ activeItem === '/' &&
					<FlexItem isBlock={ true }>
						<NavigatorScreen path="/">
							<div className={ 'plugin-settings' }>
								<GeneralSettings />
							</div>
						</NavigatorScreen>
					</FlexItem>
					}
					{ activeItem === '/design-settings' &&
					<FlexItem isBlock={ true }>
						<NavigatorScreen path="/design-settings">
							<div className={ 'plugin-settings' }>
								<DesignSettings />
							</div>
						</NavigatorScreen>
					</FlexItem>
					}
					{ activeItem === '/global-protection' &&
					<FlexItem isBlock={ true }>
						<NavigatorScreen path="/global-protection">
							<div className={ 'plugin-settings' }>
								<GlobalProtectionSettings />
							</div>
						</NavigatorScreen>
					</FlexItem>
					}
					{ activeItem === '/woo-integration' &&
					<FlexItem isBlock={ true }>
						<NavigatorScreen path="/woo-integration">
							<div className={ 'plugin-settings' }>
								<WooIntegrationSettings />
							</div>
						</NavigatorScreen>
					</FlexItem>
					}
					{ activeItem === '/advanced-settings' &&
					<FlexItem isBlock={ true }>
						<NavigatorScreen path="/advanced-settings">
							<div className={ 'plugin-settings' }>
								<AdvancedSettings />
							</div>
						</NavigatorScreen>
					</FlexItem>
					}
					{ activeItem === '/external-settings' &&
					<FlexItem isBlock={ true }>
						<NavigatorScreen path="/external-settings">
							<div className={ 'plugin-settings' }>
								<ExternalSettings />
							</div>
						</NavigatorScreen>
					</FlexItem>
					}
					{ activeItem === '/system-status' &&
					<FlexItem isBlock={ true }>
						<NavigatorScreen path="/system-status">
							<div className={ 'plugin-settings' }>
								<SystemStatus />
							</div>
						</NavigatorScreen>
					</FlexItem>
					}
					{ activeItem === '/utilities' &&
					<FlexItem isBlock={ true }>
						<NavigatorScreen path="/utilities">
							<div className={ 'plugin-settings' }>
								<Utilities />
							</div>
						</NavigatorScreen>
					</FlexItem>
					}
				</Flex>
			</NavigatorProvider>
		</div>
	);
}

export default SettingsPage;

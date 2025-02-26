import { sprintf, __ } from '@wordpress/i18n';
import { registerPaymentMethod } from '@woocommerce/blocks-registry';
import { decodeEntities } from '@wordpress/html-entities';
import { getSetting } from '@woocommerce/settings';
import { useState, useEffect } from '@wordpress/element';

const settings = getSetting('ankapay_data', {});

const defaultLabel = __('ANKA Pay', 'anka-commerce');
const label = decodeEntities(settings.title) || defaultLabel;

const Content = () => decodeEntities(settings.description || '');

const Icon = () => {
  const [iconUrl, setIconUrl] = useState(settings.defaultIcon);

  useEffect(() => {
    wp.apiFetch({ path: '/anka-commerce/v1/woocommerce/get-icon-url' })
      .then((icon_url) => {
        setIconUrl(icon_url);
      })
      .catch((error) => {
        console.error('Error fetching ANKA Pay icon:', error);
      });
  }, []);

  return <img src={iconUrl} alt="ANKA Pay" style={{ float: 'right' }} />;
};

const Label = () => (
  <span style={{ width: '100%' }}>
    {label}
    <Icon />
  </span>
);

const Anka_Pay = {
  name: 'ankapay',
  label: <Label />,
  content: <Content />,
  edit: <Content />,
  icon: <Icon />,
  canMakePayment: () => true,
  ariaLabel: label,
  supports: {
    features: settings.supports,
  },
};

registerPaymentMethod(Anka_Pay);

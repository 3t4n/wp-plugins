import React from 'react';

import FormSection from '../../../components/FormSection';
import FormSubSection from '../../../components/FormSubSection';

export default function ShortcodesSection() {
  const shortcodes = [
    {
      code: 'dydo_button',
      title: 'Button to open modal',
      description: 'Button to open the donations modal',
    },
    {
      code: 'dydo_donation',
      title: 'Donation Checkout',
      description: 'Modal where the user can configure the amount they want to donate',
    },
    {
      code: 'dydo_your_donations',
      title: 'Donation list',
      description: 'Onetime and Recurring donations list per user',
    },
    {
      code: 'dydo_manage_payments',
      title: 'Donation Manage Payment',
      description: 'Manage Payment View',
    }
  ];

  return (
    <>
      <FormSection title="Shortcodes">
        {
          shortcodes.map((item, index) => (
            <FormSubSection key={index} title={item.title} description={item.description}>
              [{item.code}]
            </FormSubSection>
          ))
        }
      </FormSection>
    </>
  );
}

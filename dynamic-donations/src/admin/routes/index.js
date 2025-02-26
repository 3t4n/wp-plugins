import React from 'react';

import {
  Dashboard,
  Payments,
  Woocommerce,
  Stripe,
  Appearance,
  Settings,
  SettingsGeneral,
  SettingsParagraphs,
  SettingsCurrencies,
  SettingsAmounts,
  SettingsLicense,
  SettingsReceipts,
  Donations,
  Activate,
  LicenseExpires,
  Shortcodes,
  ExpiredCards

} from '../pages';

export const private_routes = [
  {
    path: '/',
    exact: true,
    component: Dashboard,
  },
  {
    path: '/payments/woocommerce',
    component: Woocommerce,
  },
  {
    path: '/payments/stripe',
    component: Stripe,
  },
  {
    path: '/payments',
    component: Payments,
  },
  {
    path: '/donations',
    component: Donations,
  },
  {
    path: '/appearance',
    component: Appearance,
  },
  {
    path: '/expired-cards',
    component: ExpiredCards,
  },
  {
    path: '/settings/general',
    component: SettingsGeneral,
  },
  {
    path: '/settings/paragraphs',
    component: SettingsParagraphs,
  },
  {
    path: '/settings/currencies',
    component: SettingsCurrencies,
  },
  {
    path: '/settings/amounts',
    component: SettingsAmounts,
  },
  {
    path: '/settings/license',
    component: SettingsLicense,
  },
  {
    path: '/settings/receipts',
    component: SettingsReceipts,
  },
  {
    path: '/settings',
    component: Settings,
  },
  {
    path: '/shortcodes',
    component: Shortcodes,
  },
];

export const public_routes = [
  {
    path: '/activate',
    component: Activate,
  },
  {
    path: '/license-expires',
    component: LicenseExpires,
  },
];

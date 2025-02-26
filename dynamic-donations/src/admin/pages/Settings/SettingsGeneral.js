import React from 'react';
import {Layout} from '../../layouts';


import SettingsNav from './components/SettingsNav';
import FormSection from '../../components/FormSection';
import SettingsGeneralSectionRedirect from './components/SettingsGeneralSectionRedirect';
import SettingsGeneralSectionDescriptionEnable from './components/SettingsGeneralSectionDescriptionEnable';
import SettingsGeneralSectionCurrenciesEnable from './components/SettingsGeneralSectionCurrenciesEnable';

const SettingsGeneral = () => {
  return (
    <Layout title="Settings">
      <SettingsNav />
      <FormSection title="Enable">
        <SettingsGeneralSectionDescriptionEnable />
        <SettingsGeneralSectionCurrenciesEnable />
      </FormSection>
      <SettingsGeneralSectionRedirect />
    </Layout>
  );
}

export default SettingsGeneral;

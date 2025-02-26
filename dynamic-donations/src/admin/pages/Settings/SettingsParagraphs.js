import React from 'react';
import {Layout} from '../../layouts';


import SettingsNav from './components/SettingsNav';
import SettingsParagraphsSectionScreens from './components/SettingsParagraphsSectionScreens';
import SettingsParagraphsSectionButtons from './components/SettingsParagraphsSectionButtons';

const SettingsParagraphs = (props) => {
  return (
    <Layout title="Settings">
      <SettingsNav />
      <SettingsParagraphsSectionScreens />
      <SettingsParagraphsSectionButtons />
    </Layout>
  );
}

export default SettingsParagraphs;

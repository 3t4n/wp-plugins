import React, { useState } from "react";
import { useSelector } from 'react-redux';
import {Layout} from '../../layouts';
;
import SettingsNav from "./components/SettingsNav";
import SettingsCurrenciesSectionOptions from "./components/SettingsCurrenciesSectionOptions";
import SettingsCurrenciesSectionWoocommerce from "./components/SettingsCurrenciesSectionWoocommerce";

const SettingsCurrencies = () => {
  const {plugin} = useSelector((state) => state.global);
  const [paymentGateway, setPaymentGateway] = useState(() => plugin.options.paymentGateway || '');
  return (
    <Layout title={"Currencies"}>
      <SettingsNav />
      { paymentGateway=== 'woocommerce' ? <SettingsCurrenciesSectionWoocommerce /> : <SettingsCurrenciesSectionOptions /> }
    </Layout>
  );
};

export default SettingsCurrencies;

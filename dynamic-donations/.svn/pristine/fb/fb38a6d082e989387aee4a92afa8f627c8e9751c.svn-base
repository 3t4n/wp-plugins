import React from "react";
import { useSelector } from "react-redux";
import {Box } from "@material-ui/core";
import { makeStyles } from "@material-ui/core";
import {Layout} from '../../layouts';
;
import DashboardStripeDonationChart from "./components/DashboardStripeDonationChart";
import DashboardWoocommerceDonationChart from "./components/DashboardWoocommerceDonationChart";

const useStyle = makeStyles((theme) => ({
  title: {
    color: theme.palette.primary.main,
  },
}));

export default function Dashboard() {
  const classes = useStyle();
  const { plugin } = useSelector((state) => state.global);

  return (
    <Layout>
      <Box>
        {plugin.options.paymentGateway==='stripe' && <DashboardStripeDonationChart />}
        {plugin.options.paymentGateway==='woocommerce' && <DashboardWoocommerceDonationChart />}
      </Box>
    </Layout>
  );
}

import React, { useState } from "react";
import { useSelector, useDispatch } from "react-redux";
import { Link } from "react-router-dom";
import {
  TableContainer,
  Table,
  TableHead,
  TableBody,
  TableRow,
  TableCell,
  Button,
  Paper,
  withStyles,
  Box,
} from "@material-ui/core";
import { Settings as SettingsIcon } from "@material-ui/icons";
import {Layout} from '../../layouts';
;
import GreenSwitch from "../../components/GreenSwitch";
import { WPRequest } from "../../http-common";
import { updatePluginData } from '../../redux/actions/global.actions';

const StyledTableCell = withStyles((theme) => ({
  head: {
    // background: '#f6f8fb',
    fontWeight: "bold",
  },
}))(TableCell);

export default function Payments() {
  const { plugin } = useSelector((state) => state.global);
  const dispatch = useDispatch();
  const [paymentGateway, setPaymentGateway] = useState(
    plugin.options.paymentGateway
  );
  const handleChange = async (event) => {
    setPaymentGateway(event.target.value);

    try {
      const res = await WPRequest({
        action: "dydo_save_payment_gateway",
        paymentGateway: event.target.value,
      });
      console.log(res);
      await dispatch(
        updatePluginData({
          ...plugin,
          options: {
            ...plugin.options,
            paymentGateway: res.data,
          },
        })
      );
    } catch (e) {
      console.log(e);
    }
  };

  return (
    <Layout title="Payment Gateways">
      <TableContainer component={Paper}>
        <Table>
          <TableHead>
            <TableRow>
              <StyledTableCell scope={"row"}>Payment</StyledTableCell>
              <StyledTableCell>Donation type</StyledTableCell>
              <StyledTableCell align={"right"}>Actions</StyledTableCell>
            </TableRow>
          </TableHead>
          <TableBody>
            <TableRow>
              <TableCell scope={"row"}>Stripe</TableCell>
              <TableCell>One Time, Recurring</TableCell>
              <TableCell align={"right"}>
                <Box display="inline-block" mr={2}>
                  <GreenSwitch
                    onChange={handleChange}
                    value="stripe"
                    checked={paymentGateway === "stripe"}
                  />
                </Box>
                <Button
                  size={"small"}
                  variant={"outlined"}
                  color={"primary"}
                  startIcon={<SettingsIcon />}
                  component={Link}
                  to={"/payments/stripe"}
                  disabled={paymentGateway !== "stripe"}
                  disableElevation
                >
                  Configure
                </Button>
              </TableCell>
            </TableRow>
            <TableRow>
              <TableCell>Woocommerce</TableCell>
              <TableCell>One time</TableCell>
              <TableCell align={"right"}>
                <Box display="inline-block" mr={2}>
                  <GreenSwitch
                    onChange={handleChange}
                    value="woocommerce"
                    checked={paymentGateway === "woocommerce"}
                  />
                </Box>
                <Button
                  size={"small"}
                  variant={"outlined"}
                  color={"primary"}
                  startIcon={<SettingsIcon />}
                  component={Link}
                  to={"/payments/woocommerce"}
                  disabled
                  disableElevation
                >
                  Configure
                </Button>
              </TableCell>
            </TableRow>
          </TableBody>
        </Table>
      </TableContainer>
    </Layout>
  );
}

import React from "react";
import { useSelector } from "react-redux";
import { useLocation, Link } from "react-router-dom";
import { Button, Box } from "@material-ui/core";

const SettingsNav = () => {
  const location = useLocation();
  const { options } = useSelector((state) => state.global.plugin);
  return (
    <Box mb={4}>
      <Button
        component={Link}
        to="/settings/general"
        color="primary"
        variant={
          location.pathname === "/settings/general" ? "contained" : "text"
        }
        style={{ marginRight: "20px" }}
      >
        General
      </Button>
      <Button
        component={Link}
        to="/settings/paragraphs"
        color="primary"
        variant={
          location.pathname === "/settings/paragraphs" ? "contained" : "text"
        }
        style={{ marginRight: "20px" }}
      >
        Paragraphs
      </Button>
      <Button
        component={Link}
        to="/settings/currencies"
        color="primary"
        variant={
          location.pathname === "/settings/currencies" ? "contained" : "text"
        }
        style={{ marginRight: "20px" }}
      >
        Currencies
      </Button>
      <Button
        component={Link}
        to="/settings/amounts"
        color="primary"
        variant={
          location.pathname === "/settings/amounts" ? "contained" : "text"
        }
        style={{ marginRight: "20px" }}
      >
        Amounts
      </Button>
      <Button
        component={Link}
        to="/settings/license"
        color="primary"
        variant={
          location.pathname === "/settings/license" ? "contained" : "text"
        }
        style={{ marginRight: "20px" }}
      >
        License
      </Button>
      { options.paymentGateway ==='stripe' &&
        (<Button
          component={Link}
          to="/settings/receipts"
          color="primary"
          variant={
            location.pathname === "/settings/receipts" ? "contained" : "text"
          }
          style={{ marginRight: "20px" }}
        >
          Receipts
        </Button>)
      }
    </Box>
  );
};

export default SettingsNav;

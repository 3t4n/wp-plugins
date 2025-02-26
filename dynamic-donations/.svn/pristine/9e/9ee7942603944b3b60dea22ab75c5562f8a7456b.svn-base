import React, { useState } from "react";
import { useSelector } from "react-redux";
import {
  FormControl,
  Button,
  Select,
  Box,
  InputLabel,
  Chip,
} from "@material-ui/core";
const SettingsOnlyPro = ({ children }) => {
  const { plugin } = useSelector((state) => state.global);
  const isLicensePro = plugin?.isLicensePro;
  return (
    <Box position="relative">
      {!isLicensePro && (
        <Box
          position="absolute"
          width="100%"
          height="100%"
          alignItems="center"
          justifyContent="center"
          style={{
            display: "flex",
            zIndex: 2,
            backgroundColor: "#e8f4fdad",
          }}
        >
          <Chip label="Only Pro" color="secondary" />
        </Box>
      )}
      {children}
    </Box>
  );
};

export default SettingsOnlyPro;

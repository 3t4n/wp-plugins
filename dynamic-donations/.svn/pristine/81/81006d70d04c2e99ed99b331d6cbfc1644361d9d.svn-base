import React from 'react';
import { Link } from 'react-router-dom';
import { Alert, AlertTitle } from '@material-ui/lab';
import { Box } from '@material-ui/core';
import { PWP_SITE_BASE_URL } from '../config/constants';
import { useSelector } from 'react-redux';

const Upgrade = () => {
  const {plugin} = useSelector((state) => state.global);

  return (
    plugin?.license?.product_id === 'pwp-dydo-free'
      ?
        <Box mb={5}>
          <Alert severity="info">
            <AlertTitle>Upgrade</AlertTitle>
            If you want to have full access, {' '}
            <strong>get a license key PRO <a href={PWP_SITE_BASE_URL} target="_blank">here</a></strong> {', '}
            or if you have a license key, {' '}
            <strong>you can configure it <Link to="/settings/license">here</Link></strong>
          </Alert>
        </Box>
      : <></>
  );
};

export default Upgrade;

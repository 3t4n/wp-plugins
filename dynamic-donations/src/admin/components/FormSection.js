import React from 'react';
import PropTypes from 'prop-types';
import {
  Box,
  Divider,
  Paper,
  Typography,
} from '@material-ui/core';

const FormSection = (props) => {
  const {
    children,
    title,
    description,
  } = props;

  return (
    <Box mb={5}>
      <Paper>
        <Box p={2}>
          <Typography variant={'h6'}>
            <Box fontWeight={'fontWeightNormal'}>{title}</Box>
          </Typography>
          {description && (<Typography variant="body2">{description}</Typography>)}
        </Box>
        <Divider />
        {children}
      </Paper>
    </Box>
  );
}

FormSection.propTypes = {
  children: PropTypes.node,
  title: PropTypes.string.isRequired,
  description: PropTypes.string,
}

export default FormSection;
